<?php

namespace Company\Controller;

use Company\ACL\BankAccount\Form\BankAccountFormGET;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\ACL\BranchUser\Form\BranchUserFormGET;
use Company\ACL\BranchUser\Form\BranchUserFormPostPut;
use Company\ACL\Branch\Form\BranchFormGET;
use Company\ACL\User\Form\UserFormGET;
//==============FILTERS==============
use Company\ACL\BranchUser\Filter\BranchUserFilterPostPut;
//=============PROPEL===============
use BranchUserQuery;
use BranchUser;
use BranchQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\Functions\ArrayManage;
use Shared\Functions\SessionManager;


class BranchUserController extends AbstractRestfulController
{
    protected $table = 'branch_user';
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
        return new BranchUserQuery();
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
                'More Info' => WEBSITE_API_DOCS.'/'.$this->table
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
                        $branchuserArray = array();
                        $branchuserArray['idbranch'] = $request->idbranch ? (int) $request->idbranch : null;
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
                        $branchuserArray = array();

                        $branchuserArray['idbranch'] = isset($requestArray['idbranch']) ? (int) $requestArray['idbranch'] : null;
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

            // Obtenemos el iduser del token
            $branchuserArray['iduser'] = isset($idUser) ? (int) $idUser : null;

            //Le ponemos los datos a nuestro formulario
            $branchuserForm = BranchUserFormPostPut::init($userLevel);
            $branchuserForm->setData($branchuserArray);

            //Le ponemos el filtro a nuestro formulario
            $branchuserFilter = new BranchUserFilterPostPut();

            $branchuserForm->setInputFilter($branchuserFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($branchuserForm->isValid()){

                $branch = new \BranchQuery();
                $result = $branch->create()->filterByIdcompany($idCompany)->filterByIdbranch($branchuserArray['idbranch'])->find();

                if($result->count()==1){
                    //Insertamos en nuestra base de datos
                    $branchuser = new BranchUser();

                    $branchuser->setIdbranch($branchuserArray['idbranch'])
                        ->setIduser($branchuserArray['iduser'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$branchuser->getIdbranchUser());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$branchuser->getIdbranchUser(),
                        ),
                    );
                    foreach ($branchuser->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idbranch']);
                    unset($bodyResponse['iduser']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $branch = $branchuser->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                    $user = $branchuser->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $branchForm = BranchFormGET::init($userLevel);
                    $userForm = UserFormGET::init($userLevel);

                    $branchArray = array();
                    foreach ($branchForm->getElements() as $key=>$value){
                        $branchArray[$key] = $branch[$key];
                    }
                    $userArray = array();
                    foreach ($userForm->getElements() as $key=>$value){
                        $userArray[$key] = $user[$key];
                    }
                    $bodyResponse ['_embedded'] = array(
                        'branch' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$branchuser->getIdbranch()),
                            ),
                        ),
                        'user' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$branchuser->getIduser()),
                            ),
                        ),
                    );

                    //Agregamos los datos de branch a nuestro arreglo $row['_embedded']['branch']
                    foreach ($branchArray as $key=>$value){
                        $bodyResponse ['_embedded']['branch'][$key] = $value;
                    }
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
                            'Title' => 'The request data is required',
                            'Details' => 'Invalid idbranch',
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
                foreach ($branchuserForm->getMessages() as $key => $value){
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
            $branchuserForm = BranchUserFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchuserForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $branchuser = BranchuserQuery::create()->filterByIdbranchUser($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $branchuserArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$id,
                    ),
                );
                foreach ($branchuserForm->getElements() as $key=>$value){
                    $branchuserArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($branchuserArray['idbranch']);
                unset($branchuserArray['iduser']);

                //Agregamos el campo embedded a nuestro arreglo
                $branch = $branchuser->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                $user = $branchuser->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario branchGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $branchForm = BranchFormGET::init($userLevel);
                //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $userForm   = UserFormGET::init($userLevel);

                $branchArray = array();
                foreach ($branchForm->getElements() as $key=>$value){
                    $branchArray[$key] = $branch[$key];
                }
                $userArray = array();
                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $user[$key];
                }
                $branchuserArray ['_embedded'] = array(
                    'branch' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/branch/'.$branchuser->getIdbranch()),
                        ),
                    ),
                    'user' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/user/'.$branchuser->getIduser()),
                        ),
                    ),
                );

                //Agregamos los datos de branch a nuestro arreglo $row['_embedded']['branch']
                foreach ($branchArray as $key=>$value){
                    $branchuserArray ['_embedded']['branch'][$key] = $value;
                }
                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['user']
                foreach ($userArray as $key=>$value){
                    $branchuserArray ['_embedded']['user'][$key] = $value;
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();

                foreach ($branchuserForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el idbranch si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idbranch',$acl)){
                    unset($acl['idbranch']);
                    $branchColumns = array();
                    foreach ($branchForm->getElements() as $element){
                        $branchColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                //Eliminamos el iduser si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('iduser',$acl)){
                    unset($acl['iduser']);
                    $userColumns = array();
                    foreach ($userForm->getElements() as $element){
                        $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }

                $acl['_embedded'] = array(
                    'branch' =>  $branchColumns,
                    'user' =>  $userColumns,
                );

                if(isset($acl)){
                    $branchuserArray['ACL'] = $acl;
                }

                return new JsonModel($branchuserArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idbranch_user',
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
            $branchuserForm = BranchUserFormGET::init($userLevel);


            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchuserForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idbranchuser';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion


            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $branchuserArray = array();

            foreach ($result['data'] as $item){
                $branchuser = $this->getQuery()->create()->filterByIdbranchUser($item['idbranch_user'])->findOne();
                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idbranch_user']),
                    ),
                );
                foreach ($branchuserForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idbranch']);
                unset($row['iduser']);
                //Agregamos el campo embedded a nuestro arreglo
                $branch = $branchuser->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                $user = $branchuser->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $branchForm = BranchFormGET::init($userLevel);
                $userForm = UserFormGET::init($userLevel);

                $branchArray = array();

                foreach ($branchForm->getElements() as $key=>$value){
                    $branchArray[$key] = $branch[$key];
                }
                $userArray = array();

                foreach ($userForm->getElements() as $key=>$value){
                    $userArray[$key] = $user[$key];
                }
                $row['_embedded'] = array(
                    'branch' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/branch/'.$branchuser->getIdbranch()),
                        ),
                    ),
                    'user' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/user/'.$branchuser->getIduser()),
                        ),
                    ),
                );
                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($branchArray as $key=>$value){
                    $row['_embedded']['branch'][$key] = $value;
                }
                foreach ($userArray as $key=>$value){
                    $row['_embedded']['user'][$key] = $value;
                }
                array_push($branchuserArray, $row);

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();
                foreach ($branchuserForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idbranch',$acl)){
                    unset($acl['idbranch']);
                    $branchColumns = array();
                    foreach ($branchForm->getElements() as $element){
                        $branchColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                if(key_exists('iduser',$acl)){
                    unset($acl['iduser']);
                    $userColumns = array();
                    foreach ($userForm->getElements() as $element){
                        $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                $acl['_embedded'] = array(
                    'branch' =>  $branchColumns,
                    'user' =>  $userColumns,
                );
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('branchusers'=> $branchuserArray),
            );
            if(isset($acl)){
                $response['ACL'] = $acl;
            }

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
                        $branchuserArray = array();
                        $branchuserArray['idbranch'] = $request->idbranch ? $request->idbranch : null;
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
                        $branchuserArray = array();

                        $branchuserArray['idbranch'] = isset($requestArray['idbranch']) ? $requestArray['idbranch'] : null;
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

            // Obtenemos el iduser del token
            $branchuserArray['iduser'] = isset($idUser) ? $idUser : null;

            $branch = new BranchQuery();
            $result = $branch->create()->filterByIdcompany($idCompany)->filterByIdbranch($branchuserArray['idbranch'])->find();

            if($result->count()==1){
                //Verificamos que el idbranch_user que se quiere modificar exista y que pretenece a la compañia
                if($this->getQuery()->create()->useUserQuery()->filterByIdCompany($idCompany)->endUse()->filterByIdbranchUser($id)->exists()){

                    //Instanciamos nuestra branch
                    $branchuser = $this->getQuery()->create()->useUserQuery()->filterByIdCompany($idCompany)->endUse()->findPk($id);

                    //Si se quiere modificar el idbranch
                    if(isset($data['idbranch']) && $data['idbranch'] != null){
                        //Remplzamos los datos de branchuser por lo que se van a modificar
                        foreach ($data as $key => $value){
                            $branchuser->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                        }

                        //Le ponemos los datos a nuestro formulario
                        $branchuserForm = BranchUserFormPostPut::init($userLevel);
                        $branchuserForm->setData($branchuser->toArray(BasePeer::TYPE_FIELDNAME));

                        //Le ponemos el filtro a nuestro formulario
                        $branchuserFilter = new BranchUserFilterPostPut();
                        $branchuserForm->setInputFilter($branchuserFilter->getInputFilter($userLevel));
                        //Si los valores son validos
                        if($branchuserForm->isValid()){
                            //Si hay valores por modificar
                            if($branchuser->isModified()){
                                $branchuser->save();
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                                //Le damos formato a nuestra respuesta
                                $bodyResponse = array(
                                    "_links" => array(
                                        'self' => WEBSITE_API.'/'. $this->table.'/'.$branchuser->getIdbranch(),
                                    ),
                                );

                                foreach ($branchuser->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                    $bodyResponse[$key] = $value;
                                }

                                //Eliminamos los campos que hacen referencia a otras tablas
                                unset($bodyResponse['idbranch']);
                                unset($bodyResponse['iduser']);

                                //Agregamos el campo embedded a nuestro arreglo
                                $branch = $branchuser->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                                $user = $branchuser->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                                $branchForm = BranchFormGET::init($userLevel);
                                $userForm = UserFormGET::init($userLevel);

                                $branchArray = array();
                                foreach ($branchForm->getElements() as $key=>$value){
                                    $branchArray[$key] = $branch[$key];
                                }
                                $userArray = array();
                                foreach ($userForm->getElements() as $key=>$value){
                                    $userArray[$key] = $user[$key];
                                }

                                $bodyResponse ['_embedded'] = array(
                                    'branch' => array(
                                        '_links' => array(
                                            'self' => array('href' => WEBSITE_API.'/company/'.$branchuser->getIdBranch()),
                                        ),
                                    ),
                                    'user' => array(
                                        '_links' => array(
                                            'self' => array('href' => WEBSITE_API.'/company/'.$branchuser->getIduser()),
                                        ),
                                    ),
                                );

                                //Agregamos los datos de branch a nuestro arreglo $row['_embedded']['branch']
                                foreach ($branchArray as $key=>$value){
                                    $bodyResponse ['_embedded']['branch'][$key] = $value;
                                }
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
                            foreach ($branchuserForm->getMessages() as $key => $value){
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
                                'Title' => 'No changes were found',
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
                            'Details' => 'Invalid id branch',
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
                        'Title' => 'The idbranch is invalid',
                        'Details' => 'Invalid idbranch',
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
                $branchuser = $this->getQuery()->create()->findOneByIdbranchUser($id);
                $branchuser->delete();

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
                        'Details' => 'Invalid id branch_user',
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