<?php

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\ACL\User\UserForm;
use Company\ACL\User\Form\UserFormGET;
use Company\ACL\User\Form\UserFormPostPut;
use Company\ACL\Company\Form\CompanyForm;
use Company\ACL\Company\Form\CompanyFormGET;
//==============FILTERS==============
use Company\ACL\User\Filter\UserFilter;
use Company\ACL\User\Filter\UserFilterGET;
use Company\ACL\User\Filter\UserFilterPostPut;
//=============PROPEL===============
use User;
use Useracl;
use TokenQuery;
use UserQuery;
use UseraclQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;


class UserController extends AbstractRestfulController
{
    protected $table = 'user';
    protected $collectionOptions = array('GET');
    protected $entityOptions = array('GET', 'POST', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','gt','lt','from','to','like');

    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una collecion
        return $this->collectionOptions;
    }
    
    public function getQuery(){
        return new UserQuery;
    }
    
    public function getToken(){
        return $this->params('token');
    }
    
    public function options()
    {
        $response = $this->getResponse();
        $response->getHeaders()
                 ->addHeaderLine('Allow', implode(',', $this->_getOptions()));

        //Retornamos la respuesta
        $body = array(
            'Success' => array(
                'HTTP Status' => '200' ,
                'Allow' => implode(',', $this->_getOptions()),
                'More Info' => WEBSITE_API_DOCS.'/user'
            ),
        );
        return new JsonModel($body);     

    }

    public function create($data) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);
        
        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            
            $requestContentType = $this->getRequest()->getHeaders('ContentType')->getMediaType();
            
             switch($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    $request = $this->getRequest();

                    //Cachamos los datos a insertar en un arreglo
                    $userArray = array();
                    $userArray['user_nickname'] = $this->getRequest()->getPost()->user_nickname ? $this->getRequest()->getPost()->user_nickname : null;
                    //$password = $this->getRequest()->getPost()->user_password;
                    $userArray['user_password'] = $this->getRequest()->getPost()->user_password ? $this->getRequest()->getPost()->user_password : null;
                    $userArray['user_type'] = $this->getRequest()->getPost()->user_type ? $this->getRequest()->getPost()->user_type : null;
                    $userArray['user_status'] = $this->getRequest()->getPost()->user_status ? $this->getRequest()->getPost()->user_status : 'pending';

                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    //Cachamos los datos a insertar en un arreglo
                    $userArray = array();
                    $userArray['user_nickname'] = isset($requestArray['user_nickname']) ? $requestArray['user_nickname'] : null;
                    //$password = isset($requestArray['user_password']) ? $requestArray['user_password'] : null;
                    $userArray['user_password'] = isset($requestArray['user_password']) ? $requestArray['user_password'] : null;
                    $userArray['user_type'] = isset($requestArray['user_type']) ? $requestArray['user_type'] : null;
                    $userArray['user_status'] = isset($requestArray['user_status']) ? $requestArray['user_status'] : 'pending';

                    break;
                }
                default :{
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                    $body = array(
                        'HTTP Status' => '400' ,
                        'Title' => 'Bad Request' ,
                        'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                        'More Info' => WEBSITE_API_DOCS
                    );

                    return new JsonModel($body);
                    break;
                }
            }
            
            //Le ponemos los datos a nuestro formulario
            $userForm = UserFormPostPut::init($userLevel);
            $userForm->setData($userArray);
            
            //Le ponemos el filtro a nuestro formulario
            $userFilter = new UserFilterPostPut();
            
            $userForm->setInputFilter($userFilter->getInputFilter($userLevel));
            //var_dump($userForm->getInputFilter());
            
            //Si los valores son validos
            if($userForm->isValid()){
                //Encriptamos el password
                $password = hash('sha256', $userArray['user_password']);
                //Verificamos que user_nickname no exista ya en nuestra base de datos.
                if(\UserQuery::create()->filterByIdCompany($idCompany)->filterByUserNickname($userArray['user_nickname'])->find()->count()==0){
                    //Insertamos en nuestra base de datos
                    $user = new \User();
                    $user->setIdCompany($idCompany)
                         ->setUserNickname($userArray['user_nickname'])
                         ->setUserPassword($password)
                         ->setUserType($userArray['user_type'])
                         ->setUserStatus($userArray['user_status'])
                         ->save();
                    
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/user/'.$user->getIdUser());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);
                    
                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                             'self' => WEBSITE_API.'/'.$this->table.'/'.$user->getIdUser(),
                         ),           
                    );
                    foreach ($user->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }                    
                    $bodyResponse['user_password'] = $userArray['user_password']; // Remplazamos el password ya que de lo contrario no lo trairia encriptado
                    
                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idcompany']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $company = $user->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm = CompanyFormGET::init($userLevel);

                    $companyArray = array();
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $company[$key];
                    }                 
                    $bodyResponse ['_embedded'] = array(
                         'company' => array(
                             '_links' => array(
                                 'self' => array('href' => WEBSITE_API.'/company/'.$user->getIdCompany()),
                             ),
                         ),
                    );

                    //Agregamos los datod de company a nuestro arreglo $row['_embedded'][company']
                   foreach ($companyArray as $key=>$value){
                         $bodyResponse ['_embedded']['company'][$key] = $value;
                   }
                   
                   return new JsonModel($bodyResponse);

                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'Resource data pre-validation error',
                            'Details' => "user_nickname ". "'".$userArray['user_nickname']."'". " already exists",
                        ),
                    );
                    return new JsonModel($bodyResponse);
                } 
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($userForm->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $columnError = $key;
                        $message = $key.' '.$val; 
                        array_push($messageArray, $message);
                    }                
                }
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'Resource data pre-validation error',
                        'Details' => $messageArray,
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Acces Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);       
        } 
    }
    
    public function delete($id) {
        
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);
        
        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Verificamos que el id que se desea eliminar exista y que pertenezca a la compañia
            if(\UserQuery::create()->filterByIdCompany($idCompany)->filterByIdUser($id)->exists()){
                $user = \UserQuery::create()->findOneByIdUser($id);
                $user->delete();
                
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_204); //NOT CONTENT
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id User',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }
    }

    public function get($id) {
    
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);
        
        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            
            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $userForm = UserFormGET::init($userLevel);
            
            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($userForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            
            $result = UserQuery::create()->filterByIdCompany($idCompany)->findOneByIdUser($id);
            
            //Si si existe el id solicitado y pertenece a la compañia
            if($result!=null){
                $user = UserQuery::create()->filterByIdUser($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);           
                $userArray = array(
                    "_links" => array(
                         'self' => WEBSITE_API.'/'. $this->table.'/'.$id,
                     ),
                );
                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $result[$key];
                }
                
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($userArray['idcompany']);
                
                //Agregamos el campo embedded a nuestro arreglo
                $company = $user->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);
                
                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $companyForm = CompanyFormGET::init($userLevel);
                
                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }                 
                $userArray ['_embedded'] = array(
                     'company' => array(
                         '_links' => array(
                             'self' => array('href' => WEBSITE_API.'/company/'.$user->getIdCompany()),
                         ),
                     ),
                );
                
                //Agregamos los datod de company a nuestro arreglo $row['_embedded'][company']
               foreach ($companyArray as $key=>$value){
                     $userArray ['_embedded']['company'][$key] = $value;
               }
                        
                return new JsonModel($userArray);
                
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid ID User',
                    ),
                );
                return new JsonModel($bodyResponse);
            }                    
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }

    public function getList() {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            
            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $userForm = UserFormGET::init($userLevel);
            
            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm = CompanyFormGET::init($userLevel);
     
            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($userForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            
            /*
             * ACL
             */

           //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($userForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    //array_push($acl, array($element->getAttribute('name') => array('value_options' => $element->getOption('value_options'))));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                    //array_push($acl, $element->getAttribute('name'));
                }
            }

            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists('idcompany',$acl)){
                unset($acl['idcompany']);
                $companyColumns = array();
                foreach ($companyForm->getElements() as $element){
                   $companyColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    'company' =>  $companyColumns,
                );
            }
            
            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'iduser';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;        
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            //Realizamos nuestra peticion
            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);
            
            $userArray = array();
            
            foreach ($result['data'] as $item){
                
                 $user = UserQuery::create()->filterByIdUser($item['iduser'])->findOne();
                 $row = array(
                     "_links" => array(
                         'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['iduser']),
                     ),
                 );
                 foreach ($userForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                 }

                 //Eliminamos los campos que hacen referencia a otras tablas
                 //unset($row['idcompany']);
                 //Agregamos el campo embedded a nuestro arreglo
                 $company = $user->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                 

                 $companyArray = array();

                 foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                 }
                 $row['_embedded'] = array(
                     'company' => array(
                         '_links' => array(
                             'self' => array('href' => WEBSITE_API.'/company/'.$user->getIdCompany()),
                         ),
                     ),
                 );
                 //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                 foreach ($companyArray as $key=>$value){
                     $row['_embedded']['company'][$key] = $value;
                 }
                 array_push($userArray, $row);
            }
            
            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('users'=> $userArray),
            );
      
            return new JsonModel($response);
  
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }      
    }

    public function update($id,$data) {
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
                
            //Verificamos que el Id del usuario que se quiere modificar exista y que pretenece a la compañia
            if(\UserQuery::create()->filterByIdCompany($idCompany)->filterByIdUser($id)->exists()){
                    
                //Instanciamos nuestro user
                $user = UserQuery::create()->findPk($id);
                
                //Si se quiere modificar el password
                if(isset($data['user_password'])){
                    $password = $data['user_password'];
                    $data['user_password'] = hash('sha256', $data['user_password']);
                }
                
                //Si se quiere modificar el user_nickanme
                if(isset($data['user_nickname'])){
                    //Verificamos que user_nickname no exista ya en nuestra base de datos.
                    if(\UserQuery::create()->filterByIdCompany($idCompany)->filterByUserNickname($data['user_nickname'])->find()->count()==0){
                        //Remplzamos los datos del usuario por lo que se van a modifica
                        foreach ($data as $key => $value){
                            $user->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                        }
                        
                        //Le ponemos los datos a nuestro formulario
                        $userForm = UserFormPostPut::init($userLevel);
                        $userForm->setData($user->toArray(BasePeer::TYPE_FIELDNAME));
                        

                        //Le ponemos el filtro a nuestro formulario
                        $userFilter = new UserFilterPostPut();
                        $userForm->setInputFilter($userFilter->getInputFilter($userLevel));
      
                        //Si los valores son validos
                        if($userForm->isValid()){
                            //Si hay valores por modificar
                            if($user->isModified()){
                                $user->save();
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK
                            
                                //Le damos formato a nuestra respuesta
                                $bodyResponse = array(
                                    "_links" => array(
                                        'self' => 'http://dev.api.buybuy.com.mx/'. $this->table.'/'.$user->getIdUser(),
                                    ),           
                                );  

                                foreach ($user->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                    $bodyResponse[$key] = $value;
                                }
                        

                                //Si existe la variable password, esto quiere decir que el campo password fue modificamo y lo mostraos de lo contrario lo ocultamos
                                if(isset($password)){
                                    $bodyResponse['user_password'] = $password;
                                }else{
                                    unset($bodyResponse['user_password']);
                                }
                        
                                //Eliminamos los campos que hacen referencia a otras tablas
                                unset($bodyResponse['idcompany']);

                                //Agregamos el campo embedded a nuestro arreglo
                                $company = $user->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                                $companyForm = CompanyFormGET::init($userLevel);

                                $companyArray = array();
                                foreach ($companyForm->getElements() as $key=>$value){
                                    $companyArray[$key] = $company[$key];
                                }                 
                                $bodyResponse ['_embedded'] = array(
                                     'company' => array(
                                         '_links' => array(
                                             'self' => array('href' => 'http://dev.api.buybuy.com.mx/company/'.$user->getIdCompany()),
                                         ),
                                     ),
                                );

                                //Agregamos los datod de company a nuestro arreglo $row['_embedded'][company']
                               foreach ($companyArray as $key=>$value){
                                     $bodyResponse ['_embedded']['company'][$key] = $value;
                               }

                               return new JsonModel($bodyResponse);
                        }else{
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                            $bodyResponse = array(
                                'Error' => array(
                                    'HTTP Status' => 400 . ' Bad Request',
                                    'Title' => 'No changes were found',
                                ),
                            );
                            return new JsonModel($bodyResponse);   
                        }     

                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                        $messageArray = array();
                        foreach ($userForm->getMessages() as $key => $value){
                            foreach($value as $val){
                                //Obtenemos el valor de la columna con error
                                $columnError = $key;
                                $message = $key.' '.$val; 
                                array_push($messageArray, $message);
                            }                
                        }
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => $messageArray,
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
                }else{

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid id User',
                        ),
                    );
                    return new JsonModel($bodyResponse);
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 403 . ' Forbidden',
                        'Title' => 'Access denied',
                        'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
         }                
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 400 . ' Bad Request',
                    'Title' => 'Resource data pre-validation error',
                    'Details' => "user_nickname ". "'".$data['user_nickname']."'". " already exists",
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }          
}