<?php

namespace Company\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\V1\REST\ACL\UserAcl\Form\UserAclFormPostPut;
use Company\V1\REST\ACL\UserAcl\Form\UserAclFormGET;
use Company\V1\REST\ACL\User\Form\UserFormGET;
//==============FILTERS==============
use Company\V1\REST\ACL\UserAcl\Filter\UserAclFilterPostPut;
//=============PROPEL===============
use UseraclQuery;
use Useracl;
use BasePeer;
use UserQuery;
//=============SHARED===============
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;


class UserAclController extends AbstractRestfulController
{
    protected $table = 'useracl';
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
        return new UseraclQuery;
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
                'More Info' => WEBSITE_API_DOCS.'/useracl'
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

            switch ($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    $request = $this->getRequest()->getPost();

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $useraclArray = array();
                        $useraclArray['iduser'] = $request->iduser ? (int) $request->iduser : null;
                        $useraclArray['module_name'] = $request->module_name ? $request->module_name : null;
                        $useraclArray['user_accesslevel'] = $request->user_accesslevel ? $request->user_accesslevel : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $useraclArray = array();
                        $useraclArray['iduser'] = isset($requestArray['iduser']) ? (int) $requestArray['iduser'] : null;
                        $useraclArray['module_name'] = isset($requestArray['module_name']) ? $requestArray['module_name'] : null;
                        $useraclArray['user_accesslevel'] = isset($requestArray['user_accesslevel']) ? $requestArray['user_accesslevel'] : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
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
            $useraclForm = UserAclFormGET::init($userLevel);
            $useraclForm->setData($useraclArray);

            //Le ponemos el filtro a nuestro formulario
            $useraclFilter = new UserAclFilterPostPut();

            $useraclForm->setInputFilter($useraclFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($useraclForm->isValid()){

                $userQuery = new UserQuery();
                $result = $userQuery->create()->filterByIdcompany($idCompany)->filterByIduser($useraclArray['iduser'])->find();

                // Si existe el idclient y pertenece a su idcompany
                if($result->count()==1){

                    //Insertamos en nuestra base de datos
                    $useracl = new Useracl();

                    $useracl->setIduser($useraclArray['iduser'])
                        ->setModuleName($useraclArray['module_name'])
                        ->setUserAccesslevel($useraclArray['user_accesslevel'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$useracl->getIduseracl());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$useracl->getIduseracl(),
                        ),
                    );
                    foreach ($useracl->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['iduser']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $user = $useracl->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);

                    $userArray = array();
                    foreach ($userForm->getElements() as $key=>$value){
                        $userArray[$key] = $user[$key];
                    }

                    $bodyResponse ['_embedded'] = array(
                        'user' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$useracl->getIduser()),
                            ),
                        ),
                    );

                    //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                    foreach ($userArray as $key=>$value){
                        $bodyResponse ['_embedded']['user'][$key] = $value;
                    }

                    return new JsonModel($bodyResponse);
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid iduser',
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
                foreach ($useraclForm->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
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
            $useraclForm = UserAclFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($useraclForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($useraclForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $userForm   = UserFormGET::init($userLevel);

            //Eliminamos el idclient si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists('iduser',$acl)){
                unset($acl['iduser']);
                $userColumns = array();
                foreach ($userForm->getElements() as $element){
                    $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
            }

            $acl['_embedded'] = array(
                'user' =>  $userColumns,
            );

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $useracl = $this->getQuery()->create()->filterByIduseracl($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $useraclArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$useracl->getIduseracl(),
                    ),
                    "ACL" => $acl,
                );
                foreach ($useraclForm->getElements() as $key=>$value){
                    $useraclArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($useraclArray['iduser']);

                //Agregamos el campo embedded a nuestro arreglo
                $user = $useracl->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                $userArray = array();
                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $user[$key];
                }

                $useraclArray ['_embedded'] = array(
                    'user' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/client/'.$useracl->getIduser()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded'][company']
                foreach ($userArray as $key=>$value){
                    $useraclArray ['_embedded']['user'][$key] = $value;
                }

                return new JsonModel($useraclArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid iduseracl',
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
            $useraclForm = UserAclFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($useraclForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($useraclForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $userForm   = UserFormGET::init($userLevel);

            //Eliminamos el idclient si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists('iduser',$acl)){
                unset($acl['iduser']);
                $userColumns = array();
                foreach ($userForm->getElements() as $element){
                    $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
            }

            $acl['_embedded'] = array(
                'user' =>  $userColumns,
            );

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'iduseracl';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $useraclArray = array();

            foreach ($result['data'] as $item){
                $useracl = UserAclQuery::create()->filterByIduseracl($item['iduseracl'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['iduseracl']),
                    ),
                );
                foreach ($useraclForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['iduser']);
                //Agregamos el campo embedded a nuestro arreglo
                $user = $useracl->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $userForm = UserFormGET::init($userLevel);

                $userArray = array();
                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $user[$key];
                }

                $row['_embedded'] = array(
                    'user' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/user/'.$useracl->getIdUser()),
                        ),
                    ),
                );
                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($userArray as $key=>$value){
                    $row['_embedded']['user'][$key] = $value;
                }

                array_push($useraclArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('usersacl'=> $useraclArray),
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

            $requestContentType = $this->getRequest()->getHeaders('ContentType')->getMediaType();

            switch ($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    $request = $this->getRequest()->getPost();

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $useraclArray = array();
                        $useraclArray['iduser'] = $request->iduser ? (int) $request->iduser : null;
                        $useraclArray['module_name'] = $request->module_name ? $request->module_name : null;
                        $useraclArray['user_accesslevel'] = $request->user_accesslevel ? $request->user_accesslevel : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $useraclArray = array();
                        $useraclArray['iduser'] = isset($requestArray['iduser']) ? (int) $requestArray['iduser'] : null;
                        $useraclArray['module_name'] = isset($requestArray['module_name']) ? $requestArray['module_name'] : null;
                        $useraclArray['user_accesslevel'] = isset($requestArray['user_accesslevel']) ? $requestArray['user_accesslevel'] : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
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

            $userQuery = new UserQuery();
            $result = $userQuery->create()->filterByIdcompany($idCompany)->filterByIduser($useraclArray['iduser'])->find();

            // Si el idclient existe y pertenece al idcompany del usuario
            if($result->count()==1){
                //Verificamos que el iduseracl que se quiere modificar exista y que pretenece a la compañia
                if($this->getQuery()->create()->useUserQuery()->filterByIdCompany($idCompany)->endUse()->filterByIduseracl($id)->exists()){

                    //Instanciamos nuestra branch
                    $useracl = $this->getQuery()->create()->useUserQuery()->filterByIdCompany($idCompany)->endUse()->findPk($id);

                    //Remplzamos los datos de useracl por lo que se van a modificar
                    foreach ($data as $key => $value){
                        $useracl->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $useraclForm = UserAclFormPostPut::init($userLevel);
                    $useraclForm->setData($useracl->toArray(BasePeer::TYPE_FIELDNAME));

                    //Le ponemos el filtro a nuestro formulario
                    $useraclFilter = new UserAclFilterPostPut();
                    $useraclForm->setInputFilter($useraclFilter->getInputFilter($userLevel));
                    //Si los valores son validos
                    if($useraclForm->isValid()){
                        //Si hay valores por modificar
                        if($useracl->isModified()){
                            $useracl->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => WEBSITE_API.'/'. $this->table.'/'.$useracl->getIduseracl(),
                                ),
                            );

                            foreach ($useracl->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['iduser']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $user = $useracl->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $userForm = UserFormGET::init($userLevel);

                            $userArray = array();
                            foreach ($userForm->getElements() as $key=>$value){
                                $userArray[$key] = $user[$key];
                            }

                            $bodyResponse ['_embedded'] = array(
                                'user' => array(
                                    '_links' => array(
                                        'self' => array('href' => WEBSITE_API.'/user/'.$useracl->getIdUser()),
                                    ),
                                ),
                            );
                            //Agregamos los datos de user a nuestro arreglo $row['_embedded']['user']
                            foreach ($userArray as $key=>$value){
                                $bodyResponse ['_embedded']['user'][$key] = $value;
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
                        foreach ($useraclForm->getMessages() as $key => $value){
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
                            'Details' => 'Invalid iduseracl',
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
                        'Details' => 'Invalid iduser',
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

            $idExist = ArrayManage::getCompanyIdForDelete($this->getQuery(), $idCompany, $id);
            //Verificamos que el id que se desea eliminar exista y que pertenezca a la compañia
            if($idExist){
                $useracl = $this->getQuery()->create()->findOneByIduseracl($id);
                $useracl->delete();

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
                        'Details' => 'Invalid iduseracl',
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
}