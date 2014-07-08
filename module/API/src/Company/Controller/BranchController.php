<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\ACL\Branch\Form\BranchFormGET;
use Company\ACL\Branch\Form\BranchFormPostPut;
use Company\ACL\Branch\Filter\BranchFilterPostPut;
use Company\ACL\Company\CompanyFormGET;
//=============PROPEL===============
use Branch;
use BranchQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;

class BranchController extends AbstractRestfulController
{
    protected $table = 'branch';
    protected $collectionOptions = array('GET','POST');
    protected $entityOptions = array('GET', 'PATCH', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','gt','lt','from','to','like');

    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una colección
        return $this->collectionOptions;
    }

    public function getToken(){
        return $this->params('token');
    }

    public function getQuery(){
        return new BranchQuery;
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
                'More Info' => WEBSITE_API_DOCS.'/branch'
            ),
        );
        return new JsonModel($body);
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
            $branchForm = BranchFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $result = BranchQuery::create()->filterByIdCompany($idCompany)->findOneByIdbranch($id);

            //Si si existe el id solicitado y pertenece a la compañia
            if($result!=null){
                $branch = BranchQuery::create()->filterByIdBranch($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $branchArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API . '/' . $this->table.'/'.$id,
                    ),
                );
                foreach ($branchForm->getElements() as $key=>$value){
                    $branchArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($branchArray['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $branch->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $companyForm = CompanyFormGET::init($userLevel);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                $branchArray ['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API . '/company/' . $branch->getIdCompany()),
                        ),
                    ),
                );

                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $branchArray ['_embedded']['company'][$key] = $value;
                }

                return new JsonModel($branchArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid ID Branch',
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
            $branchForm = BranchFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idbranch';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $branchArray = array();

            foreach ($result['data'] as $item){
                $branch = $this->getQuery()->create()->filterByIdbranch($item['idbranch'])->findOne();
                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idbranch']),
                    ),
                );
                foreach ($branchForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idcompany']);

                //Obtenemos los datos de nuestra Company
                $company = $branch->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $companyForm = CompanyFormGET::init($userLevel);

                //Creamos Array para almacenar los datos de nuestro $company
                $companyArray = array();

                //Obtenemos los datos de nuestra Company dependiendo del nivel de usuario.
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                //Agregamos el campo embedded a nuestro arreglo
                $row['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API . '/company/' . $branch->getIdCompany()),
                        ),
                    ),
                );
                //Agregamos los datod de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $row['_embedded']['company'][$key] = $value;
                }
                array_push($branchArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('branches'=> $branchArray),
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
                    $branchArray = array();
                    $branchArray['branch_name'] = $this->getRequest()->getPost()->branch_name ? $this->getRequest()->getPost()->branch_name : null;
                    $branchArray['branch_iso_codecountry'] = $this->getRequest()->getPost()->branch_iso_codecountry ? $this->getRequest()->getPost()->branch_iso_codecountry : null;
                    $branchArray['branch_address'] = $this->getRequest()->getPost()->branch_address ? $this->getRequest()->getPost()->branch_address : null;
                    $branchArray['branch_address2'] = $this->getRequest()->getPost()->branch_address2 ? $this->getRequest()->getPost()->branch_address2 : null;
                    $branchArray['branch_city'] = $this->getRequest()->getPost()->branch_city ? $this->getRequest()->getPost()->branch_city : null;
                    $branchArray['branch_state'] = $this->getRequest()->getPost()->branch_state ? $this->getRequest()->getPost()->branch_state : null;
                    $branchArray['branch_zipcode'] = $this->getRequest()->getPost()->branch_zipcode ? $this->getRequest()->getPost()->branch_zipcode : null;

                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    //Cachamos los datos a insertar en un arreglo
                    $branchArray = array();

                    $branchArray['branch_name'] = isset($requestArray['branch_name']) ? $requestArray['branch_name'] : null;
                    $branchArray['branch_iso_codecountry'] = isset($requestArray['branch_iso_codecountry']) ? $requestArray['branch_iso_codecountry'] : null;
                    $branchArray['branch_address'] = isset($requestArray['branch_address']) ? $requestArray['branch_address'] : null;
                    $branchArray['branch_address2'] = isset($requestArray['branch_address2']) ? $requestArray['branch_address2'] : null;
                    $branchArray['branch_city'] = isset($requestArray['branch_city']) ? $requestArray['branch_city'] : null;
                    $branchArray['branch_state'] = isset($requestArray['branch_state']) ? $requestArray['branch_state'] : null;
                    $branchArray['branch_zipcode'] = isset($requestArray['branch_zipcode']) ? $requestArray['branch_zipcode'] : null;

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
            $branchForm = BranchFormPostPut::init($userLevel);
            $branchForm->setData($branchArray);

            //Le ponemos el filtro a nuestro formulario
            $branchFilter = new BranchFilterPostPut();

            $branchForm->setInputFilter($branchFilter->getInputFilter($userLevel));
            //Si los valores son validos
            if($branchForm->isValid()){
                //Verificamos que branch_name no exista ya en nuestra base de datos.
                if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByBranchName($branchArray['branch_name'])->find()->count()==0){
                    //Insertamos en nuestra base de datos
                    $branch = new \Branch();
                    $branch->setIdCompany($idCompany)
                        ->setBranchName($branchArray['branch_name'])
                        ->setBranchIsoCodecountry($branchArray['branch_iso_codecountry'])
                        ->setBranchAddress($branchArray['branch_address'])
                        ->setBranchAddress2($branchArray['branch_address2'])
                        ->setBranchCity($branchArray['branch_city'])
                        ->setBranchState($branchArray['branch_state'])
                        ->setBranchZipcode($branchArray['branch_zipcode'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$branch->getIdbranch());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$branch->getIdbranch(),
                        ),
                    );
                    foreach ($branch->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idcompany']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $company = $branch->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm = CompanyFormGET::init($userLevel);

                    $companyArray = array();
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $company[$key];
                    }
                    $bodyResponse ['_embedded'] = array(
                        'company' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$branch->getIdCompany()),
                            ),
                        ),
                    );

                    //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
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
                            'Details' => "branch_name". " '".$branchArray['branch_name']."'". " already exists",
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
                foreach ($branchForm->getMessages() as $key => $value){
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
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdbranch($id)->exists()){

                //Instanciamos nuestra branch
                $branch = $this->getQuery()->create()->findPk($id);

                //Remplzamos los datos de la branch por lo que se van a modificar
                foreach ($data as $key => $value){
                    $branch->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                }

                //Le ponemos los datos a nuestro formulario
                $branchForm = BranchFormPostPut::init($userLevel);
                $branchForm->setData($branch->toArray(BasePeer::TYPE_FIELDNAME));

                //Le ponemos el filtro a nuestro formulario
                $branchFilter = new BranchFilterPostPut();
                $branchForm->setInputFilter($branchFilter->getInputFilter($userLevel));
                //Si los valores son validos
                if($branchForm->isValid()){
                    //Si hay valores por modificar
                    if($branch->isModified()){
                        $branch->save();
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => WEBSITE_API.'/'. $this->table.'/'.$branch->getIdbranch(),
                            ),
                        );

                        foreach ($branch->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idcompany']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $company = $branch->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $companyForm = CompanyFormGET::init($userLevel);

                        $companyArray = array();
                        foreach ($companyForm->getElements() as $key=>$value){
                            $companyArray[$key] = $company[$key];
                        }
                        $bodyResponse ['_embedded'] = array(
                            'company' => array(
                                '_links' => array(
                                    'self' => array('href' => WEBSITE_API.'/company/'.$branch->getIdCompany()),
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
                    foreach ($branchForm->getMessages() as $key => $value){
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
                        'Details' => 'Invalid id Branch',
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
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdbranch($id)->exists()){
                $branch = $this->getQuery()->create()->findOneByIdbranch($id);
                $branch->delete();

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
                        'Details' => 'Invalid id Branch',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }
    }
}
    							