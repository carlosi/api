<?php

namespace REST\v1\Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use REST\v1\Company\ACL\ClientComment\Form\ClientCommentFormPostPut;
use REST\v1\Company\ACL\Client\Form\ClientFormGET;
use REST\v1\Company\ACL\ClientComment\Form\ClientCommentFormGET;
//==============FILTERS==============
use REST\v1\Company\ACL\ClientComment\Filter\ClientCommentFilterPostPut;
//=============PROPEL===============
use Clientcomment;
use ClientQuery;
use BasePeer;
use ClientcommentQuery;
//=============SHARED===============
use REST\v1\Shared\Functions\ArrayManage;
use REST\v1\Shared\Functions\SessionManager;

class ClientCommentController extends AbstractRestfulController
{
    protected $table = 'clientcomment';
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
        return new ClientcommentQuery();
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
                        $clientcommentArray = array();
                        $clientcommentArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clientcommentArray['clientcomment_note'] = $request->clientcomment_note ? $request->clientcomment_note : null;
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
                        $clientcommentArray = array();
                        $clientcommentArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clientcommentArray['clientcomment_note'] = isset($requestArray['clientcomment_note']) ? $requestArray['clientcomment_note'] : null;
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

            // Agregamos la fecha del servidor para clientcomment_date
            $clientcommentArray['clientcomment_date'] = date('Y-m-d H:i:s');

            //Le ponemos los datos a nuestro formulario
            $clientcommentForm = ClientCommentFormPostPut::init($userLevel);
            $clientcommentForm->setData($clientcommentArray);

            //Le ponemos el filtro a nuestro formulario
            $clientcommentFilter = new ClientCommentFilterPostPut();

            $clientcommentForm->setInputFilter($clientcommentFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($clientcommentForm->isValid()){

                $clientQuery = new ClientQuery();
                $result = $clientQuery->create()->filterByIdcompany($idCompany)->filterByIdclient($clientcommentArray['idclient'])->find();

                // Si existe el idclient y pertenece a su idcompany
                if($result->count()==1){

                    //Insertamos en nuestra base de datos
                    $clientcomment = new Clientcomment();

                    $clientcomment->setIdclient($clientcommentArray['idclient'])
                        ->setClientcommentNote($clientcommentArray['clientcomment_note'])
                        ->setClientcommentDate($clientcommentArray['clientcomment_date'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$clientcomment->getIdclientcomment());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$clientcomment->getIdclientcomment(),
                        ),
                    );
                    foreach ($clientcomment->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $client = $clientcomment->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $client[$key];
                    }

                    $bodyResponse ['_embedded'] = array(
                        'client' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$clientcomment->getIdclient()),
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
                foreach ($clientcommentForm->getMessages() as $key => $value){
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
            $clientcommentForm = ClientCommentFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientcommentForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($clientcommentForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $clientForm   = ClientFormGET::init($userLevel);

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

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $clientcomment = ClientcommentQuery::create()->filterByIdclientcomment($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $clientcommentArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$clientcomment->getIdclientcomment(),
                    ),
                    "ACL" => $acl,
                );
                foreach ($clientcommentForm->getElements() as $key=>$value){
                    $clientaddressArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($clientcommentArray['idclient']);

                //Agregamos el campo embedded a nuestro arreglo
                $client = $clientcomment->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $clientcommentArray ['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/client/'.$clientcomment->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded'][company']
                foreach ($clientArray as $key=>$value){
                    $clientcommentArray ['_embedded']['client'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('clientcomment_note', $clientcommentArray)){
                    if(!$clientcommentArray['clientcomment_note']){
                        unset($clientcommentArray['clientcomment_note']);
                    }
                }
                if(key_exists('clientcomment_date', $clientcommentArray)){
                    if(!$clientcommentArray['clientcomment_date']){
                        unset($clientcommentArray['clientcomment_date']);
                    }
                }

                return new JsonModel($clientaddressArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idclientcomment',
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
            $clientcommentForm = ClientCommentFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientcommentForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($clientcommentForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $clientForm = ClientFormGET::init($userLevel);

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

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idclientcomment';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $clientcommentArray = array();

            foreach ($result['data'] as $item){
                $clientcomment = ClientcommentQuery::create()->filterByIdclientcomment($item['idclientcomment'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idclientcomment']),
                    ),
                );
                foreach ($clientcommentForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idclient']);
                //Agregamos el campo embedded a nuestro arreglo
                $client = $clientcomment->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $row['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/client/'.$clientcomment->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['client']
                foreach ($clientArray as $key=>$value){
                    $row['_embedded']['client'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('clientcomment_note', $row)){
                    if(!$row['clientcomment_note']){
                        unset($row['clientcomment_note']);
                    }
                }
                if(key_exists('clientcomment_date', $row)){
                    if(!$row['clientcomment_date']){
                        unset($row['clientcomment_date']);
                    }
                }
                array_push($clientcommentArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('clientcomments'=> $clientcommentArray),
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
                        $clientcommentArray = array();
                        $clientcommentArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clientcommentArray['clientcomment_note'] = $request->clientcomment_note ? $request->clientcomment_note : null;
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
                        $clientcommentArray = array();
                        $clientcommentArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clientcommentArray['clientcomment_note'] = isset($requestArray['clientcomment_note']) ? $requestArray['clientcomment_note'] : null;
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

            $clientQuery = new ClientQuery();
            $result = $clientQuery->create()->filterByIdcompany($idCompany)->filterByIdclient($clientcommentArray['idclient'])->find();

            // Si el idclient existe y pertenece al idcompany del usuario
            if($result->count()==1){
                //Verificamos que el idclientcomment que se quiere modificar exista y que pretenece a la compañia
                if($this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->filterByIdclientcomment($id)->exists()){

                    //Instanciamos nuestra branch
                    $clientcomment = $this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->findPk($id);

                    //Remplzamos los datos de clientcomment por lo que se van a modificar
                    foreach ($data as $key => $value){
                        $clientcomment->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $clientcommentForm = ClientCommentFormPostPut::init($userLevel);
                    $clientcommentForm->setData($clientcomment->toArray(BasePeer::TYPE_FIELDNAME));

                    //Le ponemos el filtro a nuestro formulario
                    $clientcommentFilter = new ClientCommentFilterPostPut();
                    $clientcommentForm->setInputFilter($clientcommentFilter->getInputFilter($userLevel));
                    //Si los valores son validos
                    if($clientcommentForm->isValid()){
                        //Si hay valores por modificar
                        if($clientcomment->isModified()){
                            $clientcomment->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => WEBSITE_API.'/'. $this->table.'/'.$clientcomment->getIdclientcomment(),
                                ),
                            );

                            foreach ($clientcomment->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idclient']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $client = $clientcomment->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $clientForm = ClientFormGET::init($userLevel);

                            $clientArray = array();
                            foreach ($clientForm->getElements() as $key=>$value){
                                $clientArray[$key] = $client[$key];
                            }

                            $bodyResponse ['_embedded'] = array(
                                'client' => array(
                                    '_links' => array(
                                        'self' => array('href' => WEBSITE_API.'/client/'.$clientcomment->getIdClient()),
                                    ),
                                ),
                            );
                            //Agregamos los datos de user a nuestro arreglo $row['_embedded']['user']
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
                        foreach ($clientcommentForm->getMessages() as $key => $value){
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
                            'Details' => 'Invalid idclientcomment',
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
                $clientcomment = $this->getQuery()->create()->findOneByIdclientcomment($id);
                $clientcomment->delete();

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
                        'Details' => 'Invalid idclientcomment',
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