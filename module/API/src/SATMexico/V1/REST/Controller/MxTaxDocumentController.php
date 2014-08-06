<?php

namespace SATMexico\V1\REST\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

//==============FORMS================
use SATMexico\V1\REST\ACL\MxTaxDocument\Form\MxTaxDocumentFormPostPut;
use SATMexico\V1\REST\ACL\ClientTax\Form\ClientTaxFormGET;
use Sales\V1\REST\ACL\Order\Form\OrderFormGET;
use SATMexico\V1\REST\ACL\MxTaxDocument\Form\MxTaxDocumentFormGET;
//==============FILTERS==============
use SATMexico\V1\REST\ACL\MxTaxDocument\Filter\MxTaxDocumentFilterPostPut;
//=============PROPEL===============
use MxtaxdocumentQuery;
use Mxtaxdocument;

use ClientQuery;
use OrderQuery;
use ClienttaxQuery;
use BasePeer;
//=============SHARED===============
use Zend\Http\Request;
use Shared\V1\REST\Functions\ArrayManage;
use Shared\V1\REST\Functions\SessionManager;

class MxTaxDocumentController extends AbstractRestfulController
{
    protected $table = 'mxtaxdocument';
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
        return new MxtaxdocumentQuery();
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
                        $mxtaxdocumentArray = array();
                        $mxtaxdocumentArray['idclienttax'] = $request->idclienttax ? (int) $request->idclienttax : null;
                        $mxtaxdocumentArray['idorder'] = $request->idorder ? (int) $request->idorder : null;
                        $mxtaxdocumentArray['mxtaxdocument_folio'] = $request->mxtaxdocument_folio ? $request->mxtaxdocument_folio : null;
                        $mxtaxdocumentArray['mxtaxdocument_version'] = $request->mxtaxdocument_version ? $request->mxtaxdocument_version : null;
                        $mxtaxdocumentArray['mxtaxdocument_type'] = $request->mxtaxdocument_type ? $request->mxtaxdocument_type : null;
                        $mxtaxdocumentArray['mxtaxdocument_status'] = $request->mxtaxdocument_status ? $request->mxtaxdocument_status : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_xml'] = $request->mxtaxdocument_url_xml ? $request->mxtaxdocument_url_xml : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_pdf'] = $request->mxtaxdocument_url_pdf ? $request->mxtaxdocument_url_pdf : null;
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
                        $mxtaxdocumentArray = array();
                        $mxtaxdocumentArray['idclienttax'] = isset($requestArray['idclienttax']) ? (int) $requestArray['idclienttax'] : null;
                        $mxtaxdocumentArray['idorder'] = isset($requestArray['idorder']) ? (int) $requestArray['idorder'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_folio'] = isset($requestArray['mxtaxdocument_folio']) ? $requestArray['mxtaxdocument_folio'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_version'] = isset($requestArray['mxtaxdocument_version']) ? $requestArray['mxtaxdocument_version'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_type'] = isset($requestArray['mxtaxdocument_type']) ? $requestArray['mxtaxdocument_type'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_status'] = isset($requestArray['mxtaxdocument_status']) ? $requestArray['mxtaxdocument_status'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_xml'] = isset($requestArray['mxtaxdocument_url_xml']) ? $requestArray['mxtaxdocument_url_xml'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_pdf'] = isset($requestArray['mxtaxdocument_url_pdf']) ? $requestArray['mxtaxdocument_url_pdf'] : null;
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
            $mxtaxdocumentForm = MxTaxDocumentFormPostPut::init($userLevel);
            $mxtaxdocumentForm->setData($mxtaxdocumentArray);

            //Le ponemos el filtro a nuestro formulario
            $mxtaxdocumentFilter = new MxTaxDocumentFilterPostPut();

            $mxtaxdocumentForm->setInputFilter($mxtaxdocumentFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($mxtaxdocumentForm->isValid()){

                $clienttaxQuery = new ClienttaxQuery();
                $clienttaxQuery = $clienttaxQuery->create()->findOneByIdclienttax($mxtaxdocumentArray['idclienttax']);

                $idclientOfClienttax = $clienttaxQuery->getIdclient();

                $orderQuery = new OrderQuery();
                $orderQuery = $orderQuery->create()->findOneByIdorder($mxtaxdocumentArray['idorder']);

                $idclientOfOrder = $orderQuery->getIdclient();

                $clientQuery = new ClientQuery();
                $idclientOfClientOfClienttax = $clientQuery->create()->filterByIdcompany($idCompany)->findOneByIdclient($idclientOfClienttax);
                $idclientOfClientOfOrder = $clientQuery->create()->filterByIdcompany($idCompany)->findOneByIdclient($idclientOfOrder);

                // Si existe el idclient de la tabla clienttax es igual al idclient de la tabla order y pertenece a su idcompany
                if($idclientOfClientOfClienttax == $idclientOfClientOfOrder){

                    //Insertamos en nuestra base de datos
                    $mxtaxdocument = new Mxtaxdocument();

                    $mxtaxdocument->setIdclienttax($mxtaxdocumentArray['idclienttax'])
                        ->setIdorder($mxtaxdocumentArray['idorder'])
                        ->setMxtaxdocumentFolio($mxtaxdocumentArray['mxtaxdocument_folio'])
                        ->setMxtaxdocumentVersion($mxtaxdocumentArray['mxtaxdocument_version'])
                        ->setMxtaxdocumentType($mxtaxdocumentArray['mxtaxdocument_type'])
                        ->setMxtaxdocumentStatus($mxtaxdocumentArray['mxtaxdocument_status'])
                        ->setMxtaxdocumentUrlXml($mxtaxdocumentArray['mxtaxdocument_url_xml'])
                        ->setMxtaxdocumentUrlPdf($mxtaxdocumentArray['mxtaxdocument_url_pdf'])
                        ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$mxtaxdocument->getIdclienttax());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$mxtaxdocument->getIdclienttax(),
                        ),
                    );
                    foreach ($mxtaxdocument->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclienttax']);
                    unset($bodyResponse['idorder']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $clienttax = $mxtaxdocument->getClienttax()->toArray(BasePeer::TYPE_FIELDNAME);
                    $order = $mxtaxdocument->getOrder()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clienttaxGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clienttaxForm = ClientTaxFormGET::init($userLevel);
                    //Instanciamos nuestro formulario orderGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $orderForm = OrderFormGET::init($userLevel);

                    $clienttaxArray = array();
                    foreach ($clienttaxForm->getElements() as $key=>$value){
                        $clienttaxArray[$key] = $clienttax[$key];
                    }
                    $orderArray = array();
                    foreach ($orderForm->getElements() as $key=>$value){
                        $orderArray[$key] = $order[$key];
                    }

                    $bodyResponse ['_embedded'] = array(
                        'clienttax' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$mxtaxdocument->getIdclienttax()),
                            ),
                        ),
                        'order' => array(
                            '_links' => array(
                                'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$mxtaxdocument->getIdorder()),
                            ),
                        ),
                    );

                    //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                    foreach ($clienttaxArray as $key=>$value){
                        $bodyResponse ['_embedded']['clienttax'][$key] = $value;
                    }
                    //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                    foreach ($orderArray as $key=>$value){
                        $bodyResponse ['_embedded']['order'][$key] = $value;
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
                foreach ($mxtaxdocumentForm->getMessages() as $key => $value){
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
            $mxtaxdocumentForm = MxTaxDocumentFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($mxtaxdocumentForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            if($result!=null){
                $mxtaxdocument = $this->getQuery()->create()->filterByIdmxtaxdocument($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $mxtaxdocumentArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$id,
                    ),
                );
                foreach ($mxtaxdocumentForm->getElements() as $key=>$value){
                    $mxtaxdocumentArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($mxtaxdocumentArray['idclienttax']);
                unset($mxtaxdocumentArray['idorder']);

                //Agregamos el campo embedded a nuestro arreglo
                $clienttax = $mxtaxdocument->getClienttax()->toArray(BasePeer::TYPE_FIELDNAME);
                $order = $mxtaxdocument->getOrder()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clienttaxGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clienttaxForm   = ClientTaxFormGET::init($userLevel);

                //Instanciamos nuestro formulario orderGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $orderForm   = OrderFormGET::init($userLevel);

                $clienttaxArray = array();
                foreach ($clienttaxForm->getElements() as $key=>$value){
                    $clientArray[$key] = $clienttax[$key];
                }
                $orderArray = array();
                foreach ($orderForm->getElements() as $key=>$value){
                    $orderArray[$key] = $order[$key];
                }

                $mxtaxdocumentArray ['_embedded'] = array(
                    'clienttax' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/clienttax/'.$mxtaxdocument->getIdclienttax()),
                        ),
                    ),
                    'order' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/order/'.$mxtaxdocument->getIdorder()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['clienttax']
                foreach ($clienttaxArray as $key=>$value){
                    $mxtaxdocumentArray ['_embedded']['clienttax'][$key] = $value;
                }
                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['order']
                foreach ($orderArray as $key=>$value){
                    $mxtaxdocumentArray ['_embedded']['order'][$key] = $value;
                }


                if(!$mxtaxdocumentArray['mxtaxdocument_folio']){
                    unset($mxtaxdocumentArray['mxtaxdocument_folio']);
                }if(!$mxtaxdocumentArray['mxtaxdocument_url_xml']){
                    unset($mxtaxdocumentArray['mxtaxdocument_url_xml']);
                }if(!$mxtaxdocumentArray['mxtaxdocument_url_pdf']){
                    unset($mxtaxdocumentArray['mxtaxdocument_url_pdf']);
                }

                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();

                foreach ($mxtaxdocumentForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el idclienttax si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idclienttax',$acl)){
                    unset($acl['idclienttax']);
                    $clienttaxColumns = array();
                    foreach ($clienttaxForm->getElements() as $element){
                        $clienttaxColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                //Eliminamos el idorder si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idorder',$acl)){
                    unset($acl['idorder']);
                    $orderColumns = array();
                    foreach ($orderForm->getElements() as $element){
                        $orderColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }

                $acl['_embedded'] = array(
                    'clienttax' =>  $clienttaxColumns,
                    'order' =>  $orderColumns,
                );

                if(isset($acl)){
                    $mxtaxdocumentArray['ACL'] = $acl;
                }

                return new JsonModel($mxtaxdocumentArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid idmxtaxdocument',
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
            $mxtaxdocumentForm = MxTaxDocumentFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($mxtaxdocumentForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idmxtaxdocument';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $mxtaxdocumentArray = array();

            foreach ($result['data'] as $item){
                $mxtaxdocument = $this->getQuery()->create()->filterByIdmxtaxdocument($item['idmxtaxdocument'])->findOne();

                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idmxtaxdocument']),
                    ),
                );
                foreach ($mxtaxdocumentForm->getElements() as $key=>$value){

                    $row[$key] = $item[$key];
                }
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idclienttax']);
                unset($row['idorder']);

                //Agregamos el campo embedded a nuestro arreglo
                $clienttax = $mxtaxdocument->getClienttax()->toArray(BasePeer::TYPE_FIELDNAME);
                $order = $mxtaxdocument->getOrder()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clienttaxGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clienttaxForm = ClientTaxFormGET::init($userLevel);
                $clienttaxArray = array();
                foreach ($clienttaxForm->getElements() as $key=>$value){
                    $clienttaxArray[$key] = $clienttax[$key];
                }

                //Instanciamos nuestro formulario orderGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $orderForm = OrderFormGET::init($userLevel);
                $orderArray = array();
                foreach ($orderForm->getElements() as $key=>$value){
                    $orderArray[$key] = $order[$key];
                }

                $row['_embedded'] = array(
                    'clienttax' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/clienttax/'.$mxtaxdocument->getIdclienttax()),
                        ),
                    ),
                    'order' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/order/'.$mxtaxdocument->getIdorder()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['clienttax']
                foreach ($clienttaxArray as $key=>$value){
                    $row['_embedded']['clienttax'][$key] = $value;
                }

                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['order']
                foreach ($orderArray as $key=>$value){
                    $row['_embedded']['order'][$key] = $value;
                }

                // Si las columnas que no son requeridas estan vacias no las mostramos
                if(!$row['mxtaxdocument_folio']){
                    unset($row['mxtaxdocument_folio']);
                }
                if(!$row['mxtaxdocument_url_xml']){
                    unset($row['mxtaxdocument_url_xml']);
                }
                if(!$row['mxtaxdocument_url_pdf']){
                    unset($row['mxtaxdocument_url_pdf']);
                }

                array_push($mxtaxdocumentArray, $row);
                /*
                 * ACL
                 */

                //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                $acl = array();
                foreach ($mxtaxdocumentForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $acl[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }

                //Eliminamos el id idclienttax Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idclienttax',$acl)){
                    unset($acl['idclienttax']);
                    $clienttaxColumns = array();
                    foreach ($clienttaxForm->getElements() as $element){
                        $clienttaxColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                //Eliminamos el id idorder Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                if(key_exists('idorder',$acl)){
                    unset($acl['idorder']);
                    $orderColumns = array();
                    foreach ($orderForm->getElements() as $element){
                        $orderColumns[$element->getAttribute('name')] =  $element->getOption('label');
                    }
                }
                $acl['_embedded'] = array(
                    'clienttax' =>  $clienttaxColumns,
                    'order' =>  $orderColumns,
                );
            }

            $response = array(
                '_links' => $result['links'],
                'resume' => $result['resume'],
                '_embedded' => array('mxtaxdocuments'=> $mxtaxdocumentArray),
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
                        $mxtaxdocumentArray = array();
                        $mxtaxdocumentArray['idclienttax'] = $request->idclienttax ? (int) $request->idclienttax : null;
                        $mxtaxdocumentArray['idorder'] = $request->idorder ? (int) $request->idorder : null;
                        $mxtaxdocumentArray['mxtaxdocument_folio'] = $request->mxtaxdocument_folio ? $request->mxtaxdocument_folio : null;
                        $mxtaxdocumentArray['mxtaxdocument_version'] = $request->mxtaxdocument_version ? $request->mxtaxdocument_version : null;
                        $mxtaxdocumentArray['mxtaxdocument_type'] = $request->mxtaxdocument_type ? $request->mxtaxdocument_type : null;
                        $mxtaxdocumentArray['mxtaxdocument_status'] = $request->mxtaxdocument_status ? $request->mxtaxdocument_status : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_xml'] = $request->mxtaxdocument_url_xml ? $request->mxtaxdocument_url_xml : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_pdf'] = $request->mxtaxdocument_url_pdf ? $request->mxtaxdocument_url_pdf : null;
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
                        $mxtaxdocumentArray = array();
                        $mxtaxdocumentArray['idclienttax'] = isset($requestArray['idclienttax']) ? (int) $requestArray['idclienttax'] : null;
                        $mxtaxdocumentArray['idorder'] = isset($requestArray['idorder']) ? (int) $requestArray['idorder'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_folio'] = isset($requestArray['mxtaxdocument_folio']) ? $requestArray['mxtaxdocument_folio'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_version'] = isset($requestArray['mxtaxdocument_version']) ? $requestArray['mxtaxdocument_version'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_type'] = isset($requestArray['mxtaxdocument_type']) ? $requestArray['mxtaxdocument_type'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_status'] = isset($requestArray['mxtaxdocument_status']) ? $requestArray['mxtaxdocument_status'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_xml'] = isset($requestArray['mxtaxdocument_url_xml']) ? $requestArray['mxtaxdocument_url_xml'] : null;
                        $mxtaxdocumentArray['mxtaxdocument_url_pdf'] = isset($requestArray['mxtaxdocument_url_pdf']) ? $requestArray['mxtaxdocument_url_pdf'] : null;
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


            $clienttaxQuery = new ClienttaxQuery();
            $clienttaxQueryForidclientax = $clienttaxQuery->findOneByIdclienttax($mxtaxdocumentArray['idclienttax']);
            $idclientOfClienttax = $clienttaxQueryForidclientax->getIdclient();

            $orderQuery = new OrderQuery();
            $orderQueryForidorder = $orderQuery->findOneByIdorder($mxtaxdocumentArray['idorder']);
            $idclientOfOrder = $orderQueryForidorder->getIdclient();

            if($idclientOfClienttax == $idclientOfOrder){

                $client = new ClientQuery();
                $result = $client->create()->filterByIdcompany($idCompany)->filterByIdclient($idclientOfClienttax);

                // Si el idclient existe y pertenece al idcompany del usuario
                if($result->count()==1){
                    //Verificamos que el idclientcomment que se quiere modificar exista y que pretenece a la compañia
                    if($this->getQuery()->create()->useClienttaxQuery()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->endUse()->filterByIdclienttax($id)->exists()){

                        //Instanciamos nuestra branch
                        $mxtaxdocument = $this->getQuery()->create()->useClienttaxQuery()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->endUse()->findPk($id);

                        //Remplzamos los datos de clientcomment por lo que se van a modificar
                        foreach ($data as $key => $value){
                            $mxtaxdocument->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                        }

                        //Le ponemos los datos a nuestro formulario
                        $mxtaxdocumentForm = MxTaxDocumentFormPostPut::init($userLevel);
                        $mxtaxdocumentForm->setData($mxtaxdocument->toArray(BasePeer::TYPE_FIELDNAME));

                        //Le ponemos el filtro a nuestro formulario
                        $mxtaxdocumentFilter = new MxTaxDocumentFilterPostPut();
                        $mxtaxdocumentForm->setInputFilter($mxtaxdocumentFilter->getInputFilter($userLevel));
                        //Si los valores son validos
                        if($mxtaxdocumentForm->isValid()){
                            //Si hay valores por modificar
                            if($mxtaxdocument->isModified()){
                                $mxtaxdocument->save();
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                                //Le damos formato a nuestra respuesta
                                $bodyResponse = array(
                                    "_links" => array(
                                        'self' => WEBSITE_API.'/'. $this->table.'/'.$mxtaxdocument->getIdMxtaxdocument(),
                                    ),
                                );

                                foreach ($mxtaxdocument->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                    $bodyResponse[$key] = $value;
                                }

                                //Eliminamos los campos que hacen referencia a otras tablas
                                unset($bodyResponse['idclienttax']);
                                unset($bodyResponse['idorder']);

                                //Agregamos el campo embedded a nuestro arreglo
                                $clienttax = $mxtaxdocument->getClienttax()->toArray(BasePeer::TYPE_FIELDNAME);
                                $order = $mxtaxdocument->getOrder()->toArray(BasePeer::TYPE_FIELDNAME);

                                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                                $clienttaxForm = ClientTaxFormGET::init($userLevel);
                                $orderForm = OrderFormGET::init($userLevel);

                                $clienttaxArray = array();
                                foreach ($clienttaxForm->getElements() as $key=>$value){
                                    $clienttaxArray[$key] = $clienttax[$key];
                                }
                                $orderArray = array();
                                foreach ($orderForm->getElements() as $key=>$value){
                                    $orderArray[$key] = $order[$key];
                                }

                                $bodyResponse ['_embedded'] = array(
                                    'clienttax' => array(
                                        '_links' => array(
                                            'self' => array('href' => WEBSITE_API.'/clienttax/'.$mxtaxdocument->getIdClienttax()),
                                        ),
                                    ),
                                    'order' => array(
                                        '_links' => array(
                                            'self' => array('href' => WEBSITE_API.'/order/'.$mxtaxdocument->getIdOrder()),
                                        ),
                                    ),
                                );
                                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['clienttax']
                                foreach ($clienttaxArray as $key=>$value){
                                    $bodyResponse ['_embedded']['clienttax'][$key] = $value;
                                }
                                //Agregamos los datos de user a nuestro arreglo $row['_embedded']['order']
                                foreach ($orderArray as $key=>$value){
                                    $bodyResponse ['_embedded']['order'][$key] = $value;
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
                            foreach ($mxtaxdocumentForm->getMessages() as $key => $value){
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
                    }}else{
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
                $mxtaxdocument = $this->getQuery()->create()->findOneByIdmxtaxdocument($id);
                $mxtaxdocument->delete();

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
                        'Details' => 'Invalid idmxtaxdocument',
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