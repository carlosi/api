<?php

namespace Company\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FILTERS==============
use Company\V1\REST\ACL\Client\Filter\ClientFilterPostPut;
//==============FORMS================
use Company\V1\REST\ACL\Client\Form\ClientFormPostPut;
use Company\V1\REST\ACL\Company\Form\CompanyFormGET;
use Company\V1\REST\ACL\Client\Form\ClientFormGET;
//=============PROPEL===============
use ClientQuery;
use Client;
use BasePeer;
//=============SHARED===============
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class ClientController extends AbstractRestfulController
{
    protected $table = 'client';
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
        return new ClientQuery;
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
                'More Info' => URL_API_DOCS.'/'.$this->table
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

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $clientArray = array();
                        $clientArray['client_iso_codecountry'] = $this->getRequest()->getPost()->client_iso_codecountry ? $this->getRequest()->getPost()->client_iso_codecountry : null;
                        $clientArray['client_iso_codephone'] = $this->getRequest()->getPost()->client_iso_codephone ? $this->getRequest()->getPost()->client_iso_codephone : null;
                        $clientArray['client_fullname'] = $this->getRequest()->getPost()->client_fullname ? $this->getRequest()->getPost()->client_fullname : null;
                        $clientArray['client_email'] = $this->getRequest()->getPost()->client_email ? $this->getRequest()->getPost()->client_email : null;
                        $clientArray['client_email2'] = $this->getRequest()->getPost()->client_email2 ? $this->getRequest()->getPost()->client_email2 : null;
                        $clientArray['client_password'] = $this->getRequest()->getPost()->client_password ? $this->getRequest()->getPost()->client_password : null;
                        $clientArray['client_cellular'] = $this->getRequest()->getPost()->client_cellular ? $this->getRequest()->getPost()->client_cellular : null;
                        $clientArray['client_phone'] = $this->getRequest()->getPost()->client_phone ? $this->getRequest()->getPost()->client_phone : null;
                        $clientArray['client_language'] = $this->getRequest()->getPost()->client_language ? $this->getRequest()->getPost()->client_language : null;
                        $clientArray['client_status'] = $this->getRequest()->getPost()->client_status ? $this->getRequest()->getPost()->client_status : null;
                        $clientArray['client_type'] = $this->getRequest()->getPost()->client_type ? $this->getRequest()->getPost()->client_type : null;
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
                        $clientArray = array();

                        $clientArray['client_iso_codecountry'] = isset($requestArray['client_iso_codecountry']) ? $requestArray['client_iso_codecountry'] : null;
                        $clientArray['client_iso_codephone'] = isset($requestArray['client_iso_codephone']) ? $requestArray['client_iso_codephone'] : null;
                        $clientArray['client_fullname'] = isset($requestArray['client_fullname']) ? $requestArray['client_fullname'] : null;
                        $clientArray['client_email'] = isset($requestArray['client_email']) ? $requestArray['client_email'] : null;
                        $clientArray['client_email2'] = isset($requestArray['client_email2']) ? $requestArray['client_email2'] : null;
                        $clientArray['client_password'] = isset($requestArray['client_password']) ? $requestArray['client_password'] : null;
                        $clientArray['client_cellular'] = isset($requestArray['client_cellular']) ? $requestArray['client_cellular'] : null;
                        $clientArray['client_phone'] = isset($requestArray['client_phone']) ? $requestArray['client_phone'] : null;
                        $clientArray['client_language'] = isset($requestArray['client_language']) ? $requestArray['client_language'] : null;
                        $clientArray['client_status'] = isset($requestArray['client_status']) ? $requestArray['client_status'] : null;
                        $clientArray['client_type'] = isset($requestArray['client_type']) ? $requestArray['client_type'] : null;

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
                    'More Info' => URL_API_DOCS
                );

                return new JsonModel($body);

                break;
                }
            }

            //Le ponemos los datos a nuestro formulario
            $clientForm = ClientFormPostPut::init($userLevel);
            $clientForm->setData($clientArray);

            //Le ponemos el filtro a nuestro formulario
            $clientFilter = new ClientFilterPostPut();

            $clientForm->setInputFilter($clientFilter->getInputFilter($userLevel));
            //Si los valores son validos
            if($clientForm->isValid()){
                //Encriptamos el password
                $password = hash('sha256', $clientArray['client_password']);

                //Verificamos que client_fullname no exista ya en nuestra base de datos.
                if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByClientFullname($clientArray['client_fullname'])->find()->count() == 0){
                    //Insertamos en nuestra base de datos
                    $client = new Client();
                    $client->setIdCompany($idCompany)
                        ->setClientIsoCodecountry($clientArray['client_iso_codecountry'])
                        ->setClientIsoCodephone($clientArray['client_iso_codephone'])
                        ->setClientFullname($clientArray['client_fullname'])
                        ->setClientEmail($clientArray['client_email'])
                        ->setClientEmail2($clientArray['client_email2'])
                        ->setClientPassword($password)
                        ->setClientCellular($clientArray['client_cellular'])
                        ->setClientPhone($clientArray['client_phone'])
                        ->setClientLanguage($clientArray['client_language'])
                        ->setClientStatus($clientArray['client_status'])
                        ->setClientType($clientArray['client_type'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', URL_API.'/'.$this->table.'/'.$client->getIdclient());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.$this->table.'/'.$client->getIdclient(),
                        ),
                    );
                    foreach ($client->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idcompany']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $company = $client->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm = CompanyFormGET::init($userLevel);

                    $companyArray = array();
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $company[$key];
                    }
                    $bodyResponse ['_embedded'] = array(
                        'company' => array(
                            '_links' => array(
                                'self' => array('href' =>  URL_API.'/'.$this->table.'/'.$client->getIdCompany()),
                            ),
                        ),
                    );

                    //Agregamos los datos de company a nuestro arreglo $row['_embedded']['company']
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
                            'Details' => "client_fullname". " '".$clientArray['client_fullname']."'". " already exists",
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
                foreach ($clientForm->getMessages() as $key => $value){
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
            $clientForm = ClientFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($clientForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm = CompanyFormGET::init($userLevel);

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

            $result = ClientQuery::create()->filterByIdCompany($idCompany)->findOneByIdclient($id);

            //Si si existe el id solicitado y pertenece a la compañia
            if($result!=null){
                $client = ClientQuery::create()->filterByIdclient($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $clientArray = array(
                    "_links" => array(
                        'self' => URL_API . '/' . $this->table.'/'.$id,
                    ),
                    "ACL" => $acl,
                );
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($clientArray['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $client->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                $clientArray ['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API . '/company/' . $client->getIdCompany()),
                        ),
                    ),
                );

                //Agregamos los datos de company a nuestro arreglo $row['_embedded']['company']
                foreach ($companyArray as $key=>$value){
                    $clientArray ['_embedded']['company'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('client_iso_codecountry', $clientArray)){
                    if(!$clientArray['client_iso_codecountry']){
                        unset($clientArray['client_iso_codecountry']);
                    }
                }
                if(key_exists('client_iso_codephone', $clientArray)){
                    if(!$clientArray['client_iso_codephone']){
                        unset($clientArray['client_iso_codephone']);
                    }
                }
                if(key_exists('client_email', $clientArray)){
                    if(!$clientArray['client_email']){
                        unset($clientArray['client_email']);
                    }
                }
                if(key_exists('client_email2', $clientArray)){
                    if(!$clientArray['client_email2']){
                        unset($clientArray['client_email2']);
                    }
                }
                if(key_exists('client_password', $clientArray)){
                    if(!$clientArray['client_password']){
                        unset($clientArray['client_password']);
                    }
                }
                if(key_exists('client_cellular', $clientArray)){
                    if(!$clientArray['client_cellular']){
                        unset($clientArray['client_cellular']);
                    }
                }
                if(key_exists('client_phone', $clientArray)){
                    if(!$clientArray['client_phone']){
                        unset($clientArray['client_phone']);
                    }
                }
                if(key_exists('client_language', $clientArray)){
                    if(!$clientArray['client_language']){
                        unset($clientArray['client_language']);
                    }
                }
                if(key_exists('client_type', $clientArray)){
                    if(!$clientArray['client_type']){
                        unset($clientArray['client_type']);
                    }
                }

                return new JsonModel($clientArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id client',
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
            $clientForm = ClientFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($clientForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm = CompanyFormGET::init($userLevel);

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
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idclient';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;

            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;

            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $clientArray = array();

            foreach ($result['data'] as $item){
                $client = $this->getQuery()->create()->filterByIdclient($item['idclient'])->findOne();
                $row = array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/'.$this->table.'/'.$item['idclient']),
                    ),
                );
                foreach ($clientForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idcompany']);

                //Obtenemos los datos de nuestra Company
                $company = $client->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

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
                            'self' => array('href' => URL_API . '/company/' . $client->getIdcompany()),
                        ),
                    ),
                );
                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $row['_embedded']['company'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists("client_iso_codecountry", $row)){
                    if(!$row['client_iso_codecountry']){
                        unset($row['client_iso_codecountry']);
                    }
                }
                if(key_exists("client_iso_codephone", $row)){
                    if(!$row['client_iso_codephone']){
                        unset($row['client_iso_codephone']);
                    }
                }
                if(key_exists("client_email", $row)){
                    if(!$row['client_email'] || $row['client_email'] == null){
                        unset($row['client_email']);
                    }
                }
                if(key_exists("client_email2", $row)){
                    if(!$row['client_email2']){
                        unset($row['client_email2']);
                    }
                }
                if(key_exists("client_password", $row)){
                    if(!$row['client_password']){
                        unset($row['client_password']);
                    }
                }
                if(key_exists("client_cellular", $row)){
                    if(!$row['client_cellular']){
                        unset($row['client_cellular']);
                    }
                }
                if(key_exists("client_phone", $row)){
                    if(!$row['client_phone']){
                        unset($row['client_phone']);
                    }
                }
                if(key_exists("client_language", $row)){
                    if(!$row['client_language']){
                        unset($row['client_language']);
                    }
                }
                if(key_exists("client_type", $row)){
                    if(!$row['client_type']){
                        unset($row['client_type']);
                    }
                }
                array_push($clientArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('clients'=> $clientArray),
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

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $clientArray = array();
                        $clientArray['client_iso_codecountry'] = $this->getRequest()->getPost()->client_iso_codecountry ? $this->getRequest()->getPost()->client_iso_codecountry : null;
                        $clientArray['client_iso_codephone'] = $this->getRequest()->getPost()->client_iso_codephone ? $this->getRequest()->getPost()->client_iso_codephone : null;
                        $clientArray['client_fullname'] = $this->getRequest()->getPost()->client_fullname ? $this->getRequest()->getPost()->client_fullname : null;
                        $clientArray['client_email'] = $this->getRequest()->getPost()->client_email ? $this->getRequest()->getPost()->client_email : null;
                        $clientArray['client_email2'] = $this->getRequest()->getPost()->client_email2 ? $this->getRequest()->getPost()->client_email2 : null;
                        $clientArray['client_password'] = $this->getRequest()->getPost()->client_password ? $this->getRequest()->getPost()->client_password : null;
                        $clientArray['client_cellular'] = $this->getRequest()->getPost()->client_cellular ? $this->getRequest()->getPost()->client_cellular : null;
                        $clientArray['client_phone'] = $this->getRequest()->getPost()->client_phone ? $this->getRequest()->getPost()->client_phone : null;
                        $clientArray['client_language'] = $this->getRequest()->getPost()->client_language ? $this->getRequest()->getPost()->client_language : null;
                        $clientArray['client_status'] = $this->getRequest()->getPost()->client_status ? $this->getRequest()->getPost()->client_status : null;
                        $clientArray['client_type'] = $this->getRequest()->getPost()->client_type ? $this->getRequest()->getPost()->client_type : null;
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
                        $clientArray = array();

                        $clientArray['client_iso_codecountry'] = isset($requestArray['client_iso_codecountry']) ? $requestArray['client_iso_codecountry'] : null;
                        $clientArray['client_iso_codephone'] = isset($requestArray['client_iso_codephone']) ? $requestArray['client_iso_codephone'] : null;
                        $clientArray['client_fullname'] = isset($requestArray['client_fullname']) ? $requestArray['client_fullname'] : null;
                        $clientArray['client_email'] = isset($requestArray['client_email']) ? $requestArray['client_email'] : null;
                        $clientArray['client_email2'] = isset($requestArray['client_email2']) ? $requestArray['client_email2'] : null;
                        $clientArray['client_password'] = isset($requestArray['client_password']) ? $requestArray['client_password'] : null;
                        $clientArray['client_cellular'] = isset($requestArray['client_cellular']) ? $requestArray['client_cellular'] : null;
                        $clientArray['client_phone'] = isset($requestArray['client_phone']) ? $requestArray['client_phone'] : null;
                        $clientArray['client_language'] = isset($requestArray['client_language']) ? $requestArray['client_language'] : null;
                        $clientArray['client_status'] = isset($requestArray['client_status']) ? $requestArray['client_status'] : null;
                        $clientArray['client_type'] = isset($requestArray['client_type']) ? $requestArray['client_type'] : null;

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
                    'More Info' => URL_API_DOCS
                );

                return new JsonModel($body);

                break;
                }
            }

            //Verificamos que el Iduser que se quiere modificar exista y que pretenece a la compañia
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdclient($id)->exists()){

                //Instanciamos nuestro client
                $client = $this->getQuery()->create()->findPk($id);

                //Si se quiere modificar el password
                if(isset($clientArray['client_password'])){
                    $password = $clientArray['client_password'];
                    $clientArray['client_password'] = hash('sha256', $clientArray['client_password']);
                }

                //Remplzamos los datos de client por lo que se van a modificar
                foreach ($data as $key => $value){
                    $client->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                }

                //Le ponemos los datos a nuestro formulario
                $clientForm = ClientFormPostPut::init($userLevel);
                $clientForm->setData($client->toArray(BasePeer::TYPE_FIELDNAME));

                //Le ponemos el filtro a nuestro formulario
                $clientFilter = new ClientFilterPostPut();
                $clientForm->setInputFilter($clientFilter->getInputFilter($userLevel));
                //Si los valores son validos
                if($clientForm->isValid()){
                    //Si hay valores por modificar
                    if($client->isModified()){

                        //Verificamos que client_fullname no exista ya en nuestra base de datos.
                        $hasClientFullname = $this->getQuery()->create()->filterByIdCompany($idCompany)->filterByClientFullname($clientArray['client_fullname'])->find()->count()==0;
                        if($hasClientFullname){
                            $client->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'. $this->table.'/'.$client->getIdclient(),
                                ),
                            );

                            foreach ($client->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Si existe la variable password, esto quiere decir que el campo password fue modificamo y lo mostraos de lo contrario lo ocultamos
                            if(isset($password)){
                                $bodyResponse['client_password'] = $password;
                            }else{
                                unset($bodyResponse['client_password']);
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idcompany']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $company = $client->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $companyForm = CompanyFormGET::init($userLevel);

                            $companyArray = array();
                            foreach ($companyForm->getElements() as $key=>$value){
                                $companyArray[$key] = $company[$key];
                            }
                            $bodyResponse ['_embedded'] = array(
                                'company' => array(
                                    '_links' => array(
                                        'self' => array('href' => URL_API.'/company/'.$client->getIdCompany()),
                                    ),
                                ),
                            );

                            //Agregamos los datos de company a nuestro arreglo $row['_embedded']['company']
                            foreach ($companyArray as $key=>$value){
                                $bodyResponse ['_embedded']['company'][$key] = $value;
                            }

                            return new JsonModel($bodyResponse);

                        }else{

                            $clientQuery = $this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdclient($id)->findOneByClientFullname($clientArray['client_fullname']);

                            $validClientFullname = $clientQuery ? $clientQuery : null;

                            $client_fullname = $validClientFullname == null ? $validClientFullname : $clientQuery->getClientFullname();

                            //Si user_nickname request es igual al user_nickname de nuestra base de datos.
                            if($client_fullname == $clientArray['client_fullname']){

                                $client->save();
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                                //Le damos formato a nuestra respuesta
                                $bodyResponse = array(
                                    "_links" => array(
                                        'self' => URL_API.'/'. $this->table.'/'.$client->getIdclient(),
                                    ),
                                );

                                foreach ($client->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                    $bodyResponse[$key] = $value;
                                }

                                //Si existe la variable password, esto quiere decir que el campo password fue modificamo y lo mostraos de lo contrario lo ocultamos
                                if(isset($password)){
                                    $bodyResponse['client_password'] = $password;
                                }else{
                                    unset($bodyResponse['client_password']);
                                }

                                //Eliminamos los campos que hacen referencia a otras tablas
                                unset($bodyResponse['idcompany']);

                                //Agregamos el campo embedded a nuestro arreglo
                                $company = $client->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                                $companyForm = CompanyFormGET::init($userLevel);

                                $companyArray = array();
                                foreach ($companyForm->getElements() as $key=>$value){
                                    $companyArray[$key] = $company[$key];
                                }
                                $bodyResponse ['_embedded'] = array(
                                    'company' => array(
                                        '_links' => array(
                                            'self' => array('href' => URL_API.'/company/'.$client->getIdCompany()),
                                        ),
                                    ),
                                );

                                //Agregamos los datos de company a nuestro arreglo $row['_embedded']['company']
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
                                        'Details' => "client_fullname ". "'".$clientArray['client_fullname']."'". " already exists",
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
                    foreach ($clientForm->getMessages() as $key => $value){
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
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idclient',
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
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdclient($id)->exists()){
                $client = $this->getQuery()->create()->findOneByIdclient($id);
                $client->delete();

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
                        'Details' => 'Invalid id client',
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