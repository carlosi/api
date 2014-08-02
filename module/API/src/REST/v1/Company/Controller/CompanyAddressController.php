<?php

namespace REST\v1\Company\Controller;

use REST\v1\Company\ACL\CompanyAddress\Form\CompanyAddressFormGET;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use REST\v1\Company\ACL\CompanyAddress\Form\CompanyAddressFormPostPut;
use REST\v1\Company\ACL\Company\Form\CompanyFormPostPut;
use REST\v1\Company\ACL\Company\Form\CompanyFormGET;
//==============FILTERS==============
use REST\v1\Company\ACL\CompanyAddress\Filter\CompanyAddressFilterPostPut;
//=============PROPEL===============
use CompanyaddressQuery;
use Companyaddress;
use BasePeer;
//=============SHARED===============
use REST\v1\Shared\Functions\ArrayManage;
use REST\v1\Shared\Functions\SessionManager;

class CompanyAddressController extends AbstractRestfulController
{
    protected $table = 'companyaddress';
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
        return new CompanyaddressQuery();
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
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = $request->companyaddress_iso_codecountry ? $request->companyaddress_iso_codecountry : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = $request->companyaddress_iso_codephone ? $request->companyaddress_iso_codephone : null;
                        $companyaddressArray['companyaddress_addressee'] = $request->companyaddress_addressee ? $request->companyaddress_addressee : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = $request->companyaddress_addressee_cellular ? $request->companyaddress_addressee_cellular : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = $request->companyaddress_addressee_phone ? $request->companyaddress_addressee_phone : null;
                        $companyaddressArray['companyaddress_address'] = $request->companyaddress_address ? $request->companyaddress_address : null;
                        $companyaddressArray['companyaddress_address2'] = $request->companyaddress_address2 ? $request->companyaddress_address2 : null;
                        $companyaddressArray['companyaddress_city'] = $request->companyaddress_city ? $request->companyaddress_city : null;
                        $companyaddressArray['companyaddress_state'] = $request->companyaddress_state ? $request->companyaddress_state : null;
                        $companyaddressArray['companyaddress_zipcode'] = $request->companyaddress_zipcode ? $request->companyaddress_zipcode : null;

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
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = isset($requestArray['companyaddress_iso_codecountry']) ? $requestArray['companyaddress_iso_codecountry'] : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = isset($requestArray['companyaddress_iso_codephone']) ? $requestArray['companyaddress_iso_codephone'] : null;
                        $companyaddressArray['companyaddress_addressee'] = isset($requestArray['companyaddress_addressee']) ? $requestArray['companyaddress_addressee'] : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = isset($requestArray['companyaddress_addressee_cellular']) ? $requestArray['companyaddress_addressee_cellular'] : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = isset($requestArray['companyaddress_addressee_phone']) ? $requestArray['companyaddress_addressee_phone'] : null;
                        $companyaddressArray['companyaddress_address'] = isset($requestArray['companyaddress_address']) ? $requestArray['companyaddress_address'] : null;
                        $companyaddressArray['companyaddress_address2'] = isset($requestArray['companyaddress_address2']) ? $requestArray['companyaddress_address2'] : null;
                        $companyaddressArray['companyaddress_city'] = isset($requestArray['companyaddress_city']) ? $requestArray['companyaddress_city'] : null;
                        $companyaddressArray['companyaddress_state'] = isset($requestArray['companyaddress_state']) ? $requestArray['companyaddress_state'] : null;
                        $companyaddressArray['companyaddress_zipcode'] = isset($requestArray['companyaddress_zipcode']) ? $requestArray['companyaddress_zipcode'] : null;
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
            $companyaddressForm = CompanyAddressFormPostPut::init($userLevel);
            $companyaddressForm->setData($companyaddressArray);

            //Le ponemos el filtro a nuestro formulario
            $companyaddressFilter = new CompanyAddressFilterPostPut();

            $companyaddressForm->setInputFilter($companyaddressFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($companyaddressForm->isValid()){

                //Insertamos en nuestra base de datos
                $companyaddress = new CompanyAddress();

                $companyaddress->setIdcompany($idCompany)
                    ->setCompanyaddressIsoCodecountry($companyaddressArray['companyaddress_iso_codecountry'])
                    ->setCompanyaddressIsoCodephone($companyaddressArray['companyaddress_iso_codephone'])
                    ->setCompanyaddressAddressee($companyaddressArray['companyaddress_addressee'])
                    ->setCompanyaddressAddresseeCellular($companyaddressArray['companyaddress_addressee_cellular'])
                    ->setCompanyaddressAddresseePhone($companyaddressArray['companyaddress_addressee_phone'])
                    ->setCompanyaddressAddress($companyaddressArray['companyaddress_address'])
                    ->setCompanyaddressAddress2($companyaddressArray['companyaddress_address2'])
                    ->setCompanyaddressCity($companyaddressArray['companyaddress_city'])
                    ->setCompanyaddressState($companyaddressArray['companyaddress_state'])
                    ->setCompanyaddressZipcode($companyaddressArray['companyaddress_zipcode'])
                    ->save();

                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompanyaddress());
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                //Le damos formato a nuestra respuesta
                $bodyResponse = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompanyaddress(),
                    ),
                );
                foreach ($companyaddress->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                    $bodyResponse[$key] = $value;
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($bodyResponse['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $companyaddress->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $companyForm = CompanyFormPostPut::init($userLevel);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }

                $bodyResponse ['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompany()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                foreach ($companyArray as $key=>$value){
                    $bodyResponse ['_embedded']['company'][$key] = $value;
                }

                return new JsonModel($bodyResponse);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($companyaddressForm->getMessages() as $key => $value){
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
            $companyaddressForm = CompanyAddressFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($companyaddressForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($companyaddressForm->getElements() as $element){
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

            $result = $this->getQuery()->create()->filterByIdCompany($idCompany)->findOneByIdcompanyaddress($id);

            //Si si existe el id solicitado y pertenece a la compañia
            if($result!=null){
                $companyaddress = $this->getQuery()->create()->filterByIdcompanyaddress($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $companyaddressArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API . '/' . $this->table.'/'.$id,
                    ),
                    "ACL" => $acl
                );
                foreach ($companyaddressForm->getElements() as $key=>$value){
                    $companyaddressArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($companyaddressArray['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $companyaddress->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                $companyaddressArray['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API . '/company/' . $companyaddress->getIdCompany()),
                        ),
                    ),
                );

                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $companyaddressArray['_embedded']['company'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('companyaddress_iso_codecountry', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_iso_codecountry']){
                        unset($companyaddressArray['companyaddress_iso_codecountry']);
                    }
                }
                if(key_exists('companyaddress_iso_codephone', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_iso_codephone']){
                        unset($companyaddressArray['companyaddress_iso_codephone']);
                    }
                }
                if(key_exists('companyaddress_addressee', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_addressee']){
                        unset($companyaddressArray['companyaddress_addressee']);
                    }
                }
                if(key_exists('companyaddress_addressee_cellular', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_addressee_cellular']){
                        unset($companyaddressArray['companyaddress_addressee_cellular']);
                    }
                }
                if(key_exists('companyaddress_addressee_phone', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_addressee_phone']){
                        unset($companyaddressArray['companyaddress_addressee_phone']);
                    }
                }
                if(key_exists('companyaddress_address', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_address']){
                        unset($companyaddressArray['companyaddress_address']);
                    }
                }
                if(key_exists('companyaddress_address2', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_address2']){
                        unset($companyaddressArray['companyaddress_address2']);
                    }
                }
                if(key_exists('companyaddress_city', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_city']){
                        unset($companyaddressArray['companyaddress_city']);
                    }
                }
                if(key_exists('companyaddress_state', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_state']){
                        unset($companyaddressArray['companyaddress_state']);
                    }
                }
                if(key_exists('companyaddress_zipcode', $companyaddressArray)){
                    if(!$companyaddressArray['companyaddress_zipcode']){
                        unset($companyaddressArray['companyaddress_zipcode']);
                    }
                }

                return new JsonModel($companyaddressArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idcompanyaddress',
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
            $companyaddressForm = CompanyAddressFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($companyaddressForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
            * ACL
            */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($companyaddressForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    //array_push($acl, array($element->getAttribute('name') => array('value_options' => $element->getOption('value_options'))));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                    //array_push($acl, $element->getAttribute('name'));
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
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idcompanyaddress';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;

            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;

            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $companyaddressArray = array();

            foreach ($result['data'] as $item){
                $companyaddress = $this->getQuery()->create()->filterByIdcompanyaddress($item['idcompanyaddress'])->findOne();
                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idcompanyaddress']),
                    ),
                );
                foreach ($companyaddressForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idcompany']);

                //Obtenemos los datos de nuestra Company
                $company = $companyaddress->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

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
                            'self' => array('href' => WEBSITE_API . '/company/' . $companyaddress->getIdcompany()),
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
                if(key_exists('companyaddress_iso_codecountry', $row)){
                    if(!$row['companyaddress_iso_codecountry']){
                        unset($row['companyaddress_iso_codecountry']);
                    }
                }
                if(key_exists('companyaddress_iso_codephone', $row)){
                    if(!$row['companyaddress_iso_codephone']){
                        unset($row['companyaddress_iso_codephone']);
                    }
                }
                if(key_exists('companyaddress_addressee', $row)){
                    if(!$row['companyaddress_addressee']){
                        unset($row['companyaddress_addressee']);
                    }
                }
                if(key_exists('companyaddress_addressee_cellular', $row)){
                    if(!$row['companyaddress_addressee_cellular']){
                        unset($row['companyaddress_addressee_cellular']);
                    }
                }
                if(key_exists('companyaddress_addressee_phone', $row)){
                    if(!$row['companyaddress_addressee_phone']){
                        unset($row['companyaddress_addressee_phone']);
                    }
                }
                if(key_exists('companyaddress_address', $row)){
                    if(!$row['companyaddress_address']){
                        unset($row['companyaddress_address']);
                    }
                }
                if(key_exists('companyaddress_address2', $row)){
                    if(!$row['companyaddress_address2']){
                        unset($row['companyaddress_address2']);
                    }
                }
                if(key_exists('companyaddress_city', $row)){
                    if(!$row['companyaddress_city']){
                        unset($row['companyaddress_city']);
                    }
                }
                if(key_exists('companyaddress_state', $row)){
                    if(!$row['companyaddress_state']){
                        unset($row['companyaddress_state']);
                    }
                }
                if(key_exists('companyaddress_zipcode', $row)){
                    if(!$row['companyaddress_zipcode']){
                        unset($row['companyaddress_zipcode']);
                    }
                }
                array_push($companyaddressArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('sucursales'=> $companyaddressArray),
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
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = $request->companyaddress_iso_codecountry ? $request->companyaddress_iso_codecountry : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = $request->companyaddress_iso_codephone ? $request->companyaddress_iso_codephone : null;
                        $companyaddressArray['companyaddress_addressee'] = $request->companyaddress_addressee ? $request->companyaddress_addressee : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = $request->companyaddress_addressee_cellular ? $request->companyaddress_addressee_cellular : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = $request->companyaddress_addressee_phone ? $request->companyaddress_addressee_phone : null;
                        $companyaddressArray['companyaddress_address'] = $request->companyaddress_address ? $request->companyaddress_address : null;
                        $companyaddressArray['companyaddress_address2'] = $request->companyaddress_address2 ? $request->companyaddress_address2 : null;
                        $companyaddressArray['companyaddress_city'] = $request->companyaddress_city ? $request->companyaddress_city : null;
                        $companyaddressArray['companyaddress_state'] = $request->companyaddress_state ? $request->companyaddress_state : null;
                        $companyaddressArray['companyaddress_zipcode'] = $request->companyaddress_zipcode ? $request->companyaddress_zipcode : null;

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
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = isset($requestArray['companyaddress_iso_codecountry']) ? $requestArray['companyaddress_iso_codecountry'] : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = isset($requestArray['companyaddress_iso_codephone']) ? $requestArray['companyaddress_iso_codephone'] : null;
                        $companyaddressArray['companyaddress_addressee'] = isset($requestArray['companyaddress_addressee']) ? $requestArray['companyaddress_addressee'] : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = isset($requestArray['companyaddress_addressee_cellular']) ? $requestArray['companyaddress_addressee_cellular'] : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = isset($requestArray['companyaddress_addressee_phone']) ? $requestArray['companyaddress_addressee_phone'] : null;
                        $companyaddressArray['companyaddress_address'] = isset($requestArray['companyaddress_address']) ? $requestArray['companyaddress_address'] : null;
                        $companyaddressArray['companyaddress_address2'] = isset($requestArray['companyaddress_address2']) ? $requestArray['companyaddress_address2'] : null;
                        $companyaddressArray['companyaddress_city'] = isset($requestArray['companyaddress_city']) ? $requestArray['companyaddress_city'] : null;
                        $companyaddressArray['companyaddress_state'] = isset($requestArray['companyaddress_state']) ? $requestArray['companyaddress_state'] : null;
                        $companyaddressArray['companyaddress_zipcode'] = isset($requestArray['companyaddress_zipcode']) ? $requestArray['companyaddress_zipcode'] : null;
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

            //Verificamos que el Id del usuario que se quiere modificar exista y que pretenece a la compañia
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdcompanyaddress($id)->exists()){

                //Instanciamos nuestra branch
                $companyaddress = $this->getQuery()->create()->findPk($id);

                //Remplzamos los datos de la companyaddress por lo que se van a modificar
                foreach ($data as $key => $value){
                    $companyaddress->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                }

                //Le ponemos los datos a nuestro formulario
                $companyaddressForm = CompanyAddressFormPostPut::init($userLevel);
                $companyaddressForm->setData($companyaddress->toArray(BasePeer::TYPE_FIELDNAME));

                //Le ponemos el filtro a nuestro formulario
                $companyaddressFilter = new CompanyAddressFilterPostPut();
                $companyaddressForm->setInputFilter($companyaddressFilter->getInputFilter($userLevel));

                //Si los valores son validos
                if($companyaddressForm->isValid()){

                    //Si hay valores por modificar
                    if($companyaddress->isModified()){

                        $companyaddress->save();

                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => WEBSITE_API.'/'. $this->table.'/'.$companyaddress->getIdcompanyaddress(),
                            ),
                        );

                        foreach ($companyaddress->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idcompany']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $company = $companyaddress->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $companyForm = CompanyFormGET::init($userLevel);

                        $companyArray = array();
                        foreach ($companyForm->getElements() as $key=>$value){
                            $companyArray[$key] = $company[$key];
                        }
                        $bodyResponse ['_embedded'] = array(
                            'company' => array(
                                '_links' => array(
                                    'self' => array('href' => WEBSITE_API.'/company/'.$companyaddress->getIdCompany()),
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
                    foreach ($companyaddressForm->getMessages() as $key => $value){
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
                        'Details' => 'Invalid idcompanyaddress',
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
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdcompanyaddress($id)->exists()){
                $companyaddress = $this->getQuery()->create()->findOneByIdcompanyaddress($id);
                $companyaddress->delete();

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
                        'Details' => 'Invalid idcompanyaddress',
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