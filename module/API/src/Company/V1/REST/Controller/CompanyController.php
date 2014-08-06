<?php

namespace Company\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\V1\REST\ACL\Company\Form\CompanyFormPostPut;
use Company\V1\REST\ACL\Company\Form\CompanyFormGET;
//==============FILTERS==============
use Company\V1\REST\ACL\Company\Filter\CompanyFilterPostPut;
//=============PROPEL===============
use CompanyQuery;
use Company;
use BasePeer;
//=============SHARED===============
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class CompanyController extends AbstractRestfulController
{
    protected $table = 'company';
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
        return new CompanyQuery();
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

                    $request = $this->getRequest()->getPost();

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $companyArray = array();
                        $companyArray['company_name'] = $request->company_name ?  $request->company_name : null;
                        $companyArray['company_timezone'] = $request->company_timezone ? $request->company_timezone : null;
                        $companyArray['company_iso_codecountry'] = $request->company_iso_codecountry ? $request->company_iso_codecountry : null;
                        $companyArray['company_address'] = $request->company_address ? $request->company_address : null;
                        $companyArray['company_address2'] = $request->company_address2 ? $request->company_address2 : null;
                        $companyArray['company_city'] = $request->company_city ? $request->company_city : null;
                        $companyArray['company_state'] = $request->company_state ? $request->company_state : null;
                        $companyArray['company_zipcode'] = $request->company_zipcode ? $request->company_zipcode : null;
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
                        $companyArray = array();
                        $companyArray['company_name'] = isset($requestArray['company_name']) ? $requestArray['company_name'] : null;
                        $companyArray['company_timezone'] = isset($requestArray['company_timezone']) ? $requestArray['company_timezone'] : null;
                        $companyArray['company_iso_codecountry'] = isset($requestArray['company_iso_codecountry']) ? $requestArray['company_iso_codecountry'] : null;
                        $companyArray['company_address'] = isset($requestArray['company_address']) ? $requestArray['company_address'] : null;
                        $companyArray['company_address2'] = isset($requestArray['company_address2']) ? $requestArray['company_address2'] : null;
                        $companyArray['company_city'] = isset($requestArray['company_city']) ? $requestArray['idclcompany_cityient'] : null;
                        $companyArray['company_state'] = isset($requestArray['company_state']) ? $requestArray['company_state'] : null;
                        $companyArray['company_zipcode'] = isset($requestArray['company_zipcode']) ? $requestArray['company_zipcode'] : null;
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
            $companyForm = CompanyFormPostPut::init($userLevel);
            $companyForm->setData($companyArray);

            //Le ponemos el filtro a nuestro formulario
            $companyFilter = new CompanyFilterPostPut();

            $companyForm->setInputFilter($companyFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($companyForm->isValid()){

                // Verificamos que la compañia pueda crear compañias
                if($idCompany == 1){
                    $companyQuery = $this->getQuery()->create()->filterByCompanyName($companyArray['company_name'])->find();
                    //Verificamos que company_name no exista ya en nuestra base de datos.
                    if($companyQuery->count()==0){

                        //Insertamos en nuestra base de datos
                        $company = new Company();

                        $company->setCompanyName($companyArray['company_name'])
                            ->setCompanyTimezone($companyArray['company_timezone'])
                            ->setCompanyIsoCodecountry($companyArray['company_iso_codecountry'])
                            ->setCompanyAddress($companyArray['company_address'])
                            ->setCompanyAddress2($companyArray['company_address2'])
                            ->setCompanyCity($companyArray['company_city'])
                            ->setCompanyState($companyArray['company_state'])
                            ->setCompanyZipcode($companyArray['company_zipcode'])
                            ->save();

                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->getHeaders()->addHeaderLine('Location', URL_API.'/'.$this->table.'/'.$company->getIdcompany());
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.$this->table.'/'.$company->getIdcompany(),
                            ),
                        );
                        foreach ($company->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        return new JsonModel($bodyResponse);
                    }else{
                        //Modificamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => "company_name ". "'".$companyArray['company_name']."'". " already exists",
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
                            'Details' => 'Sorry but you does not have permission over this resource.',
                            'More Info' => URL_API_DOCS
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
                foreach ($companyForm->getMessages() as $key => $value){
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

            // Verificamos que la compañia pueda crear compañias
            if($idCompany == 1){

                //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
                $companyForm = CompanyFormGET::init($userLevel);

                //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
                $allowedColumns = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    array_push($allowedColumns, $key);
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();

                foreach ($companyForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                $result = ArrayManage::getIdCompanyForListId($this->getQuery(), null, $id);

                if($result!=null){
                    $company = $this->getQuery()->create()->filterByIdcompany($id)->findOne();
                    $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                    $companyArray = array(
                        "_links" => array(
                            'self' => URL_API.'/'. $this->table.'/'.$id,
                        ),
                    );
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $result[$key];
                    }

                    // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                    // Si las columnas que no son requeridas estan vacías
                    // no las mostramos
                    if(key_exists('company_timezone', $companyArray)){
                        if(!$companyArray['company_timezone']){
                            unset($companyArray['company_timezone']);
                        }
                    }
                    if(key_exists('company_iso_codecountry', $companyArray)){
                        if(!$companyArray['company_iso_codecountry']){
                            unset($companyArray['company_iso_codecountry']);
                        }
                    }
                    if(key_exists('company_address', $companyArray)){
                        if(!$companyArray['company_address']){
                            unset($companyArray['company_address']);
                        }
                    }
                    if(key_exists('company_address2', $companyArray)){
                        if(!$companyArray['company_address2']){
                            unset($companyArray['company_address2']);
                        }
                    }
                    if(key_exists('company_city', $companyArray)){
                        if(!$companyArray['company_city']){
                            unset($companyArray['company_city']);
                        }
                    }
                    if(key_exists('company_state', $companyArray)){
                        if(!$companyArray['company_state']){
                            unset($companyArray['company_state']);
                        }
                    }
                    if(key_exists('company_zipcode', $companyArray)){
                        if(!$companyArray['company_zipcode']){
                            unset($companyArray['company_zipcode']);
                        }
                    }

                    return new JsonModel($companyArray);

                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'The request data is invalid',
                            'Details' => 'Invalid idcompany',
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
                        'Details' => 'Sorry but you does not have permission over this resource.',
                        'More Info' => URL_API_DOCS
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
            // Verificamos que la compañia pueda crear compañias
            if($idCompany == 1){

                //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
                $companyForm = CompanyFormGET::init($userLevel);

                //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
                $allowedColumns = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    array_push($allowedColumns, $key);
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();
                foreach ($companyForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Verificamos que si nos envian filtros por GET si no ponemos valores por default
                $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
                if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
                $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
                $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idcompany';
                $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
                $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
                if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

                $result = ArrayManage::executeQuery($this->getQuery(), $this->table, null, $page, $limit, $filters, $order, $dir);

                $companyArray = array();

                foreach ($result['data'] as $item){

                    $row = array(
                        "_links" => array(
                            'self' => array('href' => URL_API.'/'.$this->table.'/'.$item['idcompany']),
                        ),
                    );
                    foreach ($companyForm->getElements() as $key=>$value){
                        $row[$key] = $item[$key];
                    }

                    // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                    // Si las columnas que no son requeridas estan vacías
                    // no las mostramos
                    if(key_exists('company_timezone', $row)){
                        if(!$row['company_timezone']){
                            unset($row['company_timezone']);
                        }
                    }
                    if(key_exists('company_iso_codecountry', $row)){
                        if(!$row['company_iso_codecountry']){
                            unset($row['company_iso_codecountry']);
                        }
                    }
                    if(key_exists('company_address', $row)){
                        if(!$row['company_address']){
                            unset($row['company_address']);
                        }
                    }
                    if(key_exists('company_address2', $row)){
                        if(!$row['company_address2']){
                            unset($row['company_address2']);
                        }
                    }
                    if(key_exists('company_city', $row)){
                        if(!$row['company_city']){
                            unset($row['company_city']);
                        }
                    }
                    if(key_exists('company_state', $row)){
                        if(!$row['company_state']){
                            unset($row['company_state']);
                        }
                    }
                    if(key_exists('company_zipcode', $row)){
                        if(!$row['company_zipcode']){
                            unset($row['company_zipcode']);
                        }
                    }
                    array_push($companyArray, $row);
                }

                $response = array(
                    '_links' => $result['links'],
                    'resume' => $result['resume'],
                    '_embedded' => array('companies'=> $companyArray),
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
                        $companyArray = array();
                        $companyArray['company_name'] = $request->company_name ?  $request->company_name : null;
                        $companyArray['company_timezone'] = $request->company_timezone ? $request->company_timezone : null;
                        $companyArray['company_iso_codecountry'] = $request->company_iso_codecountry ? $request->company_iso_codecountry : null;
                        $companyArray['company_address'] = $request->company_address ? $request->company_address : null;
                        $companyArray['company_address2'] = $request->company_address2 ? $request->company_address2 : null;
                        $companyArray['company_city'] = $request->company_city ? $request->company_city : null;
                        $companyArray['company_state'] = $request->company_state ? $request->company_state : null;
                        $companyArray['company_zipcode'] = $request->company_zipcode ? $request->company_zipcode : null;
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
                        $companyArray = array();
                        $companyArray['company_name'] = isset($requestArray['company_name']) ? $requestArray['company_name'] : null;
                        $companyArray['company_timezone'] = isset($requestArray['company_timezone']) ? $requestArray['company_timezone'] : null;
                        $companyArray['company_iso_codecountry'] = isset($requestArray['company_iso_codecountry']) ? $requestArray['company_iso_codecountry'] : null;
                        $companyArray['company_address'] = isset($requestArray['company_address']) ? $requestArray['company_address'] : null;
                        $companyArray['company_address2'] = isset($requestArray['company_address2']) ? $requestArray['company_address2'] : null;
                        $companyArray['company_city'] = isset($requestArray['company_city']) ? $requestArray['idclcompany_cityient'] : null;
                        $companyArray['company_state'] = isset($requestArray['company_state']) ? $requestArray['company_state'] : null;
                        $companyArray['company_zipcode'] = isset($requestArray['company_zipcode']) ? $requestArray['company_zipcode'] : null;
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


            // Verificamos que la compañia pueda crear compañias
            if($idCompany == 1){
                //Verificamos que idcompany exista.
                if($this->getQuery()->create()->filterByIdcompany($id)->exists()){

                    //Instanciamos nuestra CompanyQuery
                    $company = $this->getQuery()->create()->findPk($id);

                    //Remplzamos los datos de company por lo que se van a modificar
                    foreach ($data as $key => $value){
                        $company->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $companyForm = CompanyFormPostPut::init($userLevel);
                    $companyForm->setData($company->toArray(BasePeer::TYPE_FIELDNAME));

                    //Le ponemos el filtro a nuestro formulario
                    $companyFilter = new CompanyFilterPostPut();
                    $companyForm->setInputFilter($companyFilter->getInputFilter($userLevel));
                    //Si los valores son validos
                    if($companyForm->isValid()){
                        //Si hay valores por modificar
                        if($company->isModified()){
                            $company->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'. $this->table.'/'.$company->getIdcompany(),
                                ),
                            );

                            foreach ($company->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
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
                        foreach ($companyForm->getMessages() as $key => $value){
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
                            'Details' => 'Invalid idcompany',
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
                        'Details' => 'Sorry but you does not have permission over this resource.',
                        'More Info' => URL_API_DOCS
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

            if($idCompany == 1){
                $idExist = ArrayManage::getCompanyIdForDelete($this->getQuery(), null, $id);
                //Verificamos que el id que se desea eliminar exista y que pertenezca a la compañia
                if($idExist){
                    $company = $this->getQuery()->create()->findOneByIdCompany($id);
                    $company->delete();

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
                            'Details' => 'Invalid idclientfile',
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
                        'Details' => 'Sorry but you does not have permission over this resource.',
                        'More Info' => URL_API_DOCS
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