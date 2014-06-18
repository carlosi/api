<?php

namespace Company\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use BasePeer;
//==============FORMS================
use Company\ACL\User\UserForm;
use Company\ACL\User\Form\UserFormGET;
use Company\ACL\User\Form\UserFormPostPut;
//==============FILTERS==============
use Company\ACL\User\Filter\UserFilter;
use Company\ACL\User\Filter\UserFilterGET;
use Company\ACL\User\Filter\UserFilterPostPut;


use User;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;
use TokenQuery;
use UserQuery;

use UseraclQuery;
use Useracl;


class UserController extends AbstractRestfulController
{
    protected $table = 'user';
    protected $collectionOptions = array('GET','POST');
    protected $entityOptions = array('GET', 'POST', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','nin','gt','lt','from','to','like');
    
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
                'More Info' => 'http://buybuy.com/api/docs/user'
            ),
        );
        return new JsonModel(array('test'));     
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
            
            $request = $this->getRequest();
            
            //Cachamos los datos a insertar en un arreglo
            $userArray = array();
            $userArray['user_nickname'] = $this->getRequest()->getPost()->user_nickname ? $this->getRequest()->getPost()->user_nickname : null;
            $userArray['user_password'] = $this->getRequest()->getPost()->user_password ? $this->getRequest()->getPost()->user_password : null;
            $userArray['user_type'] = $this->getRequest()->getPost()->user_type ? $this->getRequest()->getPost()->user_type : null;
            $userArray['user_status'] = $this->getRequest()->getPost()->user_status ? $this->getRequest()->getPost()->user_status : 'active';
            
            //Le ponemos los datos a nuestro formulario
            $userForm = UserFormPostPut::init($userLevel);
            $userForm->setData($userArray);
            
            //Le ponemos el filtro a nuestro formulario
            $userFilter = new UserFilterPostPut();
            
            $userForm->setInputFilter($userFilter->getInputFilter($userLevel));
            //Si los valores son validos
            if($userForm->isValid()){
                //Verificamos que user_nickname no exista ya en nuestra base de datos.
                if(\UserQuery::create()->filterByIdCompany($idCompany)->filterByUserNickname($userArray['user_nickname'])->find()->count()==0){
                     //Insertamos en nuestra base de datos
                    $user = new \User();
                    $user->setIdCompany($idCompany)
                         ->setUserNickname($userArray['user_nickname'])
                         ->setUserPassword($userArray['user_password'])
                         ->setUserType($userArray['user_type'])
                         ->setUserStatus($userArray['user_status'])
                         ->save();


                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);
                    return new JsonModel($userArray);
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'Resource data pre-validation error',
                            'Details' => 'user_nickname already exists',
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
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //BAD REQUEST
                $bodyResponse = array(
                    'Success' => array(
                        'HTTP Status' => 200 . ' OK',
                        'Title' => 'User with id '.$id.' was deleted successfully!',
                        'Details' => $user->toArray(BasePeer::TYPE_FIELDNAME),
                    ),
                );
                return new JsonModel($bodyResponse);
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
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                
                $user = array();
                foreach ($userForm->getElements() as $key=>$value){
                    $user[$key] = $result[$key];
                }
                return new JsonModel($user);
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
            
            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($userForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }    
            
            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'iduser';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;        
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion
            
            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $userArray = array();

            foreach ($result['data'] as $user){
                 $row = array();
                 foreach ($userForm->getElements() as $key=>$value){
                    $row[$key] = $user[$key];
                 }
                 array_push($userArray, $row);
            }
            
            $response = array(
                'resume' => $result['resume'],
                'data' => $userArray,
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
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //BAD REQUEST
                        $bodyResponse = array(
                            'Success' => array(
                                'HTTP Status' => 200 . ' OK',
                                'Title' => 'User with id '.$id.' was updated successfully!',
                                'Details' => $user->toArray(BasePeer::TYPE_FIELDNAME),
                            ),
                        );
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
    }
         
    }
        
    
    
}