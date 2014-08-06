<?php

namespace SatMexico\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use SATMexico\V1\REST\ACL\ClientTax\Form\ClientTaxFormPostPut;
use Company\V1\REST\ACL\Client\Form\ClientFormGET;
use SATMexico\V1\REST\ACL\ClientTax\Form\ClientTaxFormGET;
//==============FILTERS==============
use SATMexico\V1\REST\ACL\ClientTax\Filter\ClientTaxFilterPostPut;
//=============PROPEL===============
use Clienttax;
use ClientQuery;
use BasePeer;
use ClienttaxQuery;
//=============SHARED===============
use Zend\Http\Request;
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class ClientTaxController extends AbstractRestfulController
{
    protected $table = 'clienttax';
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
        return new ClienttaxQuery();
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
                        $clienttaxArray = array();
                        $clienttaxArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clienttaxArray['clienttax_iso_codecountry'] = $request->clienttax_iso_codecountry ? $request->clienttax_iso_codecountry : null;
                        $clienttaxArray['clienttax_iso_codephone'] = $request->clienttax_iso_codephone ? $request->clienttax_iso_codephone : null;
                        $clienttaxArray['clienttax_taxesid'] = $request->clienttax_taxesid ? $request->clienttax_taxesid : null;
                        $clienttaxArray['clienttax_address'] = $request->clienttax_address ? $request->clienttax_address : null;
                        $clienttaxArray['clienttax_address2'] = $request->clienttax_address2 ? $request->clienttax_address2 : null;
                        $clienttaxArray['clienttax_city'] = $request->clienttax_city ? $request->clienttax_city : null;
                        $clienttaxArray['clienttax_state'] = $request->clienttax_state ? $request->clienttax_state : null;
                        $clienttaxArray['clienttax_zipcode'] = $request->clienttax_zipcode ? $request->clienttax_zipcode : null;
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
                        $clienttaxArray = array();
                        $clienttaxArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clienttaxArray['clienttax_iso_codecountry'] = isset($requestArray['clienttax_iso_codecountry']) ? $requestArray['clienttax_iso_codecountry'] : null;
                        $clienttaxArray['clienttax_iso_codephone'] = isset($requestArray['clienttax_iso_codephone']) ? $requestArray['clienttax_iso_codephone'] : null;
                        $clienttaxArray['clienttax_name'] = isset($requestArray['clienttax_name']) ? $requestArray['clienttax_name'] : null;
                        $clienttaxArray['clienttax_taxesid'] = isset($requestArray['clienttax_taxesid']) ? $requestArray['clienttax_taxesid'] : null;
                        $clienttaxArray['clienttax_address'] = isset($requestArray['clienttax_address']) ? $requestArray['clienttax_address'] : null;
                        $clienttaxArray['clienttax_address2'] = isset($requestArray['clienttax_address2']) ? $requestArray['clienttax_address2'] : null;
                        $clienttaxArray['clienttax_city'] = isset($requestArray['clienttax_city']) ? $requestArray['clienttax_city'] : null;
                        $clienttaxArray['clienttax_state'] = isset($requestArray['clienttax_state']) ? $requestArray['clienttax_state'] : null;
                        $clienttaxArray['clienttax_zipcode'] = isset($requestArray['clienttax_zipcode']) ? $requestArray['clienttax_zipcode'] : null;
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
            $clienttaxForm = ClientTaxFormPostPut::init($userLevel);
            $clienttaxForm->setData($clienttaxArray);

            //Le ponemos el filtro a nuestro formulario
            $clienttaxFilter = new ClientTaxFilterPostPut();

            $clienttaxForm->setInputFilter($clienttaxFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($clienttaxForm->isValid()){

                $clientQuery = new ClientQuery();
                $result = $clientQuery->create()->filterByIdcompany($idCompany)->filterByIdclient($clienttaxArray['idclient'])->find();

                // Si existe el idclient y pertenece a su idcompany
                if($result->count()==1){

                    //Insertamos en nuestra base de datos
                    $clienttax = new Clienttax();

                    $clienttax->setIdclient($clienttaxArray['idclient'])
                        ->setClienttaxIsoCodecountry($clienttaxArray['clienttax_iso_codecountry'])
                        ->setClienttaxIsoCodephone($clienttaxArray['clienttax_iso_codephone'])
                        ->setClienttaxName($clienttaxArray['clienttax_name'])
                        ->setClienttaxTaxesid($clienttaxArray['clienttax_taxesid'])
                        ->setClienttaxAddress($clienttaxArray['clienttax_address'])
                        ->setClienttaxAddress2($clienttaxArray['clienttax_address2'])
                        ->setClienttaxCity($clienttaxArray['clienttax_city'])
                        ->setClienttaxState($clienttaxArray['clienttax_state'])
                        ->setClienttaxZipcode($clienttaxArray['clienttax_zipcode'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', URL_API.'/'.$this->table.'/'.$clienttax->getIdclienttax());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.$this->table.'/'.$clienttax->getIdclienttax(),
                        ),
                    );
                    foreach ($clienttax->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $client = $clienttax->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $client[$key];
                    }

                    $bodyResponse ['_embedded'] = array(
                        'client' => array(
                            '_links' => array(
                                'self' => array('href' =>  URL_API.'/'.$this->table.'/'.$clienttax->getIdclient()),
                            ),
                        ),
                    );

                    //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                    foreach ($clientArray as $key=>$value){
                        $bodyResponse ['_embedded']['client'][$key] = $value;
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
                            'Details' => 'Invalid idclient',
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
                foreach ($clienttaxForm->getMessages() as $key => $value){
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
            $clienttaxForm = ClientTaxFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clienttaxForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $clienttax = ClienttaxQuery::create()->filterByIdclienttax($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $clienttaxArray = array(
                    "_links" => array(
                        'self' => URL_API.'/'. $this->table.'/'.$id,
                    ),
                );
                foreach ($clienttaxForm->getElements() as $key=>$value){
                    $clienttaxArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($clienttaxArray['idclient']);

                //Agregamos el campo embedded a nuestro arreglo
                $client = $clienttax->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clientForm   = ClientFormGET::init($userLevel);

                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $clientfileArray ['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/client/'.$clienttax->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded'][company']
                foreach ($clientArray as $key=>$value){
                    $clientfileArray ['_embedded']['client'][$key] = $value;
                }

                if(!$clienttaxArray['clienttax_iso_codecountry']){
                    unset($clienttaxArray['clienttax_iso_codecountry']);
                }
                if(!$clienttaxArray['clienttax_iso_codephone']){
                    unset($clienttaxArray['clienttax_iso_codephone']);
                }
                if(!$clienttaxArray['clienttax_name']){
                    unset($clienttaxArray['clienttax_name']);
                }
                if(!$clienttaxArray['clienttax_taxesid']){
                    unset($clienttaxArray['clienttax_taxesid']);
                }
                if(!$clienttaxArray['clienttax_address']){
                    unset($clienttaxArray['clienttax_address']);
                }
                if(!$clienttaxArray['clienttax_address2']){
                    unset($clienttaxArray['clienttax_address2']);
                }
                if(!$clienttaxArray['clienttax_city']){
                    unset($clienttaxArray['clienttax_city']);
                }
                if(!$clienttaxArray['clienttax_state']){
                    unset($clienttaxArray['clienttax_state']);
                }
                if(!$clienttaxArray['clienttax_zipcode']){
                    unset($clienttaxArray['clienttax_zipcode']);
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();

                foreach ($clienttaxForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el idclient si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idclient',$acl)){
                    unset($acl['idclient']);
                    $clientColumns = array();
                    foreach ($clientForm->getElements() as $element){
                        $clientColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }

                $acl['_embedded'] = array(
                    'client' =>  $clientColumns,
                );

                if(isset($acl)){
                    $clienttaxArray['ACL'] = $acl;
                }

                return new JsonModel($clienttaxArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idclienttax',
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
            $clienttaxForm = ClientTaxFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clienttaxForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idclienttax';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $clienttaxArray = array();

            foreach ($result['data'] as $item){
                $clienttax = ClienttaxQuery::create()->filterByIdclienttax($item['idclienttax'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/'.$this->table.'/'.$item['idclienttax']),
                    ),
                );
                foreach ($clienttaxForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idclient']);
                //Agregamos el campo embedded a nuestro arreglo
                $client = $clienttax->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clientForm = ClientFormGET::init($userLevel);
                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $row['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/client/'.$clienttax->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($clientArray as $key=>$value){
                    $row['_embedded']['client'][$key] = $value;
                }

                if(!$row['clienttax_iso_codecountry']){
                    unset($row['clienttax_iso_codecountry']);
                }
                if(!$row['clienttax_iso_codephone']){
                    unset($row['clienttax_iso_codephone']);
                }
                if(!$row['clienttax_name']){
                    unset($row['clienttax_name']);
                }
                if(!$row['clienttax_taxesid']){
                    unset($row['clienttax_taxesid']);
                }
                if(!$row['clienttax_address']){
                    unset($row['clienttax_address']);
                }
                if(!$row['clienttax_address2']){
                    unset($row['clienttax_address2']);
                }
                if(!$row['clienttax_city']){
                    unset($row['clienttax_city']);
                }
                if(!$row['clienttax_state']){
                    unset($row['clienttax_state']);
                }
                if(!$row['clienttax_zipcode']){
                    unset($row['clienttax_zipcode']);
                }
                array_push($clienttaxArray, $row);
                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();
                foreach ($clienttaxForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el id idclient Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idclient',$acl)){
                    unset($acl['idclient']);
                    $clientColumns = array();
                    foreach ($clientForm->getElements() as $element){
                        $clientColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                $acl['_embedded'] = array(
                    'client' =>  $clientColumns,
                );
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('clienttaxes'=> $clienttaxArray),
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
                        $clienttaxArray = array();
                        $clienttaxArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clienttaxArray['clienttax_iso_codecountry'] = $request->clienttax_iso_codecountry ? $request->clienttax_iso_codecountry : null;
                        $clienttaxArray['clienttax_iso_codephone'] = $request->clienttax_iso_codephone ? $request->clienttax_iso_codephone : null;
                        $clienttaxArray['clienttax_taxesid'] = $request->clienttax_taxesid ? $request->clienttax_taxesid : null;
                        $clienttaxArray['clienttax_address'] = $request->clienttax_address ? $request->clienttax_address : null;
                        $clienttaxArray['clienttax_address2'] = $request->clienttax_address2 ? $request->clienttax_address2 : null;
                        $clienttaxArray['clienttax_city'] = $request->clienttax_city ? $request->clienttax_city : null;
                        $clienttaxArray['clienttax_state'] = $request->clienttax_state ? $request->clienttax_state : null;
                        $clienttaxArray['clienttax_zipcode'] = $request->clienttax_zipcode ? $request->clienttax_zipcode : null;
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
                        $clienttaxArray = array();
                        $clienttaxArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clienttaxArray['clienttax_iso_codecountry'] = isset($requestArray['clienttax_iso_codecountry']) ? $requestArray['clienttax_iso_codecountry'] : null;
                        $clienttaxArray['clienttax_iso_codephone'] = isset($requestArray['clienttax_iso_codephone']) ? $requestArray['clienttax_iso_codephone'] : null;
                        $clienttaxArray['clienttax_name'] = isset($requestArray['clienttax_name']) ? $requestArray['clienttax_name'] : null;
                        $clienttaxArray['clienttax_taxesid'] = isset($requestArray['clienttax_taxesid']) ? $requestArray['clienttax_taxesid'] : null;
                        $clienttaxArray['clienttax_address'] = isset($requestArray['clienttax_address']) ? $requestArray['clienttax_address'] : null;
                        $clienttaxArray['clienttax_address2'] = isset($requestArray['clienttax_address2']) ? $requestArray['clienttax_address2'] : null;
                        $clienttaxArray['clienttax_city'] = isset($requestArray['clienttax_city']) ? $requestArray['clienttax_city'] : null;
                        $clienttaxArray['clienttax_state'] = isset($requestArray['clienttax_state']) ? $requestArray['clienttax_state'] : null;
                        $clienttaxArray['clienttax_zipcode'] = isset($requestArray['clienttax_zipcode']) ? $requestArray['clienttax_zipcode'] : null;
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

            $client = new ClientQuery();
            $result = $client->create()->filterByIdcompany($idCompany)->filterByIdclient($clienttaxArray['idclient'])->find();

            // Si el idclient existe y pertenece al idcompany del usuario
            if($result->count()==1){
                //Verificamos que el idclientfile que se quiere modificar exista y que pretenece a la compañia
                if($this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->filterByIdclienttax($id)->exists()){

                    //Instanciamos nuestra branch
                    $clienttax = $this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->findPk($id);

                    //Remplzamos los datos de clientfile por lo que se van a modificar
                    foreach ($data as $key => $value){
                        $clienttax->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $clienttaxForm = ClientTaxFormPostPut::init($userLevel);
                    $clienttaxForm->setData($clienttax->toArray(BasePeer::TYPE_FIELDNAME));

                    //Le ponemos el filtro a nuestro formulario
                    $clienttaxFilter = new ClientTaxFilterPostPut();
                    $clienttaxForm->setInputFilter($clienttaxFilter->getInputFilter($userLevel));
                    //Si los valores son validos
                    if($clienttaxForm->isValid()){
                        //Si hay valores por modificar
                        if($clienttax->isModified()){
                            $clienttax->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'. $this->table.'/'.$clienttax->getIdClient(),
                                ),
                            );

                            foreach ($clienttax->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idclient']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $client = $clienttax->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $clientForm = ClientFormGET::init($userLevel);

                            $clientArray = array();
                            foreach ($clientForm->getElements() as $key=>$value){
                                $clientArray[$key] = $client[$key];
                            }

                            $bodyResponse ['_embedded'] = array(
                                'client' => array(
                                    '_links' => array(
                                        'self' => array('href' => URL_API.'/client/'.$clienttax->getIdClient()),
                                    ),
                                ),
                            );
                            //Agregamos los datos de user a nuestro arreglo $row['_embedded']['client']
                            foreach ($clientArray as $key=>$value){
                                $bodyResponse ['_embedded']['client'][$key] = $value;
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
                        foreach ($clienttaxForm->getMessages() as $key => $value){
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
                            'Details' => 'Invalid idclienttax',
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

            $idExist = ArrayManage::getCompanyIdForDelete($this->getQuery(), $idCompany, $id);
            //Verificamos que el id que se desea eliminar exista y que pertenezca a la compañia
            if($idExist){
                $clienttax = $this->getQuery()->create()->findOneByIdclienttax($id);
                $clienttax->delete();

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
                        'Details' => 'Invalid idclienttax',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }
    }
}