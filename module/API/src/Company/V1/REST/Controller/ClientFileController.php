<?php

namespace Company\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use Company\V1\REST\ACL\ClientFile\Form\ClientFileFormPostPut;
use Company\V1\REST\ACL\Client\Form\ClientFormGET;
use Company\V1\REST\ACL\ClientFile\Form\ClientFileFormGET;
//==============FILTERS==============
use Company\V1\REST\ACL\ClientFile\Filter\ClientFileFilterPostPut;
//=============PROPEL===============
use Clientfile;
use ClientQuery;
use BasePeer;
use ClientfileQuery;
//=============SHARED===============
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class ClientFileController extends AbstractRestfulController
{
    protected $table = 'clientfile';
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
        return new ClientfileQuery();
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
                        $clientfileArray = array();
                        $clientfileArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clientfileArray['clientfile_url'] = $request->clientfile_url ? $request->clientfile_url : null;
                        $clientfileArray['clientfile_note'] = $request->clientfile_note ? $request->clientfile_note : null;
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
                        $clientfileArray = array();
                        $clientfileArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clientfileArray['clientfile_url'] = isset($requestArray['clientfile_url']) ? $requestArray['clientfile_url'] : null;
                        $clientfileArray['clientfile_note'] = isset($requestArray['clientfile_note']) ? $requestArray['clientfile_note'] : null;
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

            // Agregamos la fecha del servidor para clientcomment_date
            $clientfileArray['clientfile_uploaddate'] = date('Y-m-d H:i:s');

            //Le ponemos los datos a nuestro formulario
            $clientfileForm = ClientFileFormPostPut::init($userLevel);
            $clientfileForm->setData($clientfileArray);

            //Le ponemos el filtro a nuestro formulario
            $clientfileFilter = new ClientFileFilterPostPut();

            $clientfileForm->setInputFilter($clientfileFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($clientfileForm->isValid()){

                $clientQuery = new ClientQuery();
                $result = $clientQuery->create()->filterByIdcompany($idCompany)->filterByIdclient($clientfileArray['idclient'])->find();

                // Si existe el idclient y pertenece a su idcompany
                if($result->count()==1){

                    //Insertamos en nuestra base de datos
                    $clientfile = new Clientfile();

                    $clientfile->setIdclient($clientfileArray['idclient'])
                        ->setClientfileUrl($clientfileArray['clientfile_url'])
                        ->setClientfileNote($clientfileArray['clientfile_note'])
                        ->setClientfileUploaddate($clientfileArray['clientfile_uploaddate'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', URL_API.'/'.$this->table.'/'.$clientfile->getIdclientfile());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.$this->table.'/'.$clientfile->getIdclientfile(),
                        ),
                    );
                    foreach ($clientfile->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $client = $clientfile->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $client[$key];
                    }

                    $bodyResponse ['_embedded'] = array(
                        'client' => array(
                            '_links' => array(
                                'self' => array('href' =>  URL_API.'/'.$this->table.'/'.$clientfile->getIdclient()),
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
                foreach ($clientfileForm->getMessages() as $key => $value){
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
            $clientfileForm = ClientFileFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientfileForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($clientfileForm->getElements() as $element){
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
                $clientfile = $this->getQuery()->create()->filterByIdclientfile($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $clientfileArray = array(
                    "_links" => array(
                        'self' => URL_API.'/'. $this->table.'/'.$id,
                    ),
                    "ACL" => $acl,
                );
                foreach ($clientfileForm->getElements() as $key=>$value){
                    $clientfileArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($clientfileArray['idclient']);

                //Agregamos el campo embedded a nuestro arreglo
                $client = $clientfile->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $clientfileArray ['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/client/'.$clientfile->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded'][company']
                foreach ($clientArray as $key=>$value){
                    $clientfileArray ['_embedded']['client'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('clientfile_url', $clientfileArray)){
                    if(!$clientfileArray['clientfile_url']){
                        unset($clientfileArray['clientfile_url']);
                    }
                }
                if(key_exists('clientfile_note', $clientfileArray)){
                    if(!$clientfileArray['clientfile_note']){
                        unset($clientfileArray['clientfile_note']);
                    }
                }
                if(key_exists('clientfile_uploaddate', $clientfileArray)){
                    if(!$clientfileArray['clientfile_uploaddate']){
                        unset($clientfileArray['clientfile_uploaddate']);
                    }
                }

                return new JsonModel($clientfileArray);

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
            $clientfileForm = ClientFileFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($clientfileForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($clientfileForm->getElements() as $element){
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
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idclientfile';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $clientfileArray = array();

            foreach ($result['data'] as $item){
                $clientfile = $this->getQuery()->create()->filterByIdclientfile($item['idclientfile'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/'.$this->table.'/'.$item['idclientfile']),
                    ),
                );
                foreach ($clientfileForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idclient']);
                //Agregamos el campo embedded a nuestro arreglo
                $client = $clientfile->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                $clientArray = array();
                foreach ($clientForm->getElements() as $key=>$value){
                    $clientArray[$key] = $client[$key];
                }

                $row['_embedded'] = array(
                    'client' => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/client/'.$clientfile->getIdclient()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($clientArray as $key=>$value){
                    $row['_embedded']['client'][$key] = $value;
                }

                // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
                // Si las columnas que no son requeridas estan vacías
                // no las mostramos
                if(key_exists('clientfile_url', $row)){
                    if(!$row['clientfile_url']){
                        unset($row['clientfile_url']);
                    }
                }
                if(key_exists('clientfile_note', $row)){
                    if(!$row['clientfile_note']){
                        unset($row['clientfile_note']);
                    }
                }
                if(key_exists('clientfile_uploaddate', $row)){
                    if(!$row['clientfile_uploaddate']){
                        unset($row['clientfile_uploaddate']);
                    }
                }
                array_push($clientfileArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('clientfiles'=> $clientfileArray),
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
                        $clientfileArray = array();
                        $clientfileArray['idclient'] = $request->idclient ? (int) $request->idclient : null;
                        $clientfileArray['clientfile_url'] = $request->clientfile_url ? $request->clientfile_url : null;
                        $clientfileArray['clientfile_note'] = $request->clientfile_note ? $request->clientfile_note : null;
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
                        $clientfileArray = array();
                        $clientfileArray['idclient'] = isset($requestArray['idclient']) ? (int) $requestArray['idclient'] : null;
                        $clientfileArray['clientfile_url'] = isset($requestArray['clientfile_url']) ? $requestArray['clientfile_url'] : null;
                        $clientfileArray['clientfile_note'] = isset($requestArray['clientfile_note']) ? (int) $requestArray['clientfile_note'] : null;
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

            // Agregamos la fecha del servidor para clientcomment_date
            $clientfileArray['clientfile_uploaddate'] = date('Y-m-d H:i:s');

            $client = new ClientQuery();
            $result = $client->create()->filterByIdcompany($idCompany)->filterByIdclient($clientfileArray['idclient'])->find();

            // Si el idclient existe y pertenece al idcompany del usuario
            if($result->count()==1){
                //Verificamos que el idclientfile que se quiere modificar exista y que pretenece a la compañia
                if($this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->filterByIdclientfile($id)->exists()){

                    //Instanciamos nuestra ClientfileQuery
                    $clientfile = $this->getQuery()->create()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->findPk($id);

                    //Remplzamos los datos de clientfile por lo que se van a modificar
                    foreach ($data as $key => $value){
                        $clientfile->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $clientfileForm = ClientFileFormPostPut::init($userLevel);
                    $clientfileForm->setData($clientfile->toArray(BasePeer::TYPE_FIELDNAME));

                    //Le ponemos el filtro a nuestro formulario
                    $clientfileFilter = new ClientFileFilterPostPut();
                    $clientfileForm->setInputFilter($clientfileFilter->getInputFilter($userLevel));
                    //Si los valores son validos
                    if($clientfileForm->isValid()){
                        //Si hay valores por modificar
                        if($clientfile->isModified()){
                            $clientfile->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'. $this->table.'/'.$clientfile->getIdClient(),
                                ),
                            );

                            foreach ($clientfile->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idclient']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $client = $clientfile->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $clientForm = ClientFormGET::init($userLevel);

                            $clientArray = array();
                            foreach ($clientForm->getElements() as $key=>$value){
                                $clientArray[$key] = $client[$key];
                            }

                            $bodyResponse ['_embedded'] = array(
                                'client' => array(
                                    '_links' => array(
                                        'self' => array('href' => URL_API.'/client/'.$clientfile->getIdClient()),
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
                        foreach ($clientfileForm->getMessages() as $key => $value){
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
                            'Details' => 'Invalid idclientfile',
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
                $clientfile = $this->getQuery()->create()->findOneByIdclientfile($id);
                $clientfile->delete();

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