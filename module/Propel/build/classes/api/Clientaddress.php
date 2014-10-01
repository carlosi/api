<?php

//// FORMS ////
use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressForm;
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressFormGET;
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressFormToShowUpdate;
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Company\Clientaddress\Filter\ClientaddressFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'clientaddress' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Clientaddress extends BaseClientaddress
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return ClientQuery::create()->filterByIdclient($idResource)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return ClientaddressQuery::create()->filterByIdclient($idResource)
            ->filterByIdclientaddress($idResourceChild)
            ->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel, $data){

        foreach ($dataArray as $dataKey => $dataValue){
            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
        }
        $this->save();

        //Las columnas permitidas de nuestros foreign keys
        $allowedClientaddressColumns = array();

        $client = null;
        //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
        if(array_key_exists("idclient", $dataArray)){

            //Instanciamos nuestro objeto Client
            $client = $this->getClient();

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $clientForm   = ClientFormGET::init($userLevel);

            foreach ($clientForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $allowedClientaddressColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $allowedClientaddressColumns[$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
        //1. El objeto branch "this"
        //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
        //3. Las columnas permitidas e los foreignKeys
        //4. el objeto company que va ir como __embebed = "client"
        $bodyResponse = $this->createBodyResponse($this,array('idclient'),array('client' => $allowedClientaddressColumns),array($client));
        $this->save();
        return array('status_code' => 201, 'details' => $bodyResponse);

    }

    /**
     * @param $clientaddress
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($clientaddress, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $clientaddressArray = $clientaddress->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($clientaddressArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address/'.$clientaddress->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($clientaddressArray as $clientaddressKey => $clientaddressValue){
            $body[$clientaddressKey] = $clientaddressValue; // Los datos del recurso
        }

        //Verificamos si hay elementos recursos _embebed
        if($halResources!=null){
            foreach ($halResources as $halResource){
                if($halResource!=null){
                    if(!isset($body[strtolower(get_class($halResource))])){
                        $body[strtolower(get_class($halResource))] = array(
                            "_links" => array(
                                "self" => array(
                                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/'.strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                ),
                            ),
                        );
                        $halResourceArray = $halResource->toArray(\BasePeer::TYPE_FIELDNAME);
                        $halResourceName = strtolower(get_class($halResource));

                        //Los datos del recurso __embedded
                        if(isset($allowedColumns[$halResourceName])){
                            foreach($allowedColumns[$halResourceName] as $column => $value){
                                $body[$halResourceName][$column] = $halResourceArray[$column];
                            }
                        }
                    }else{
                        $body[strtolower(get_class($halResource))] = array(
                            "_links" => array(
                                "self" => array(
                                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/'.strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                ),
                            ),
                        );
                        if(isset($allowedColumns[$halResourceName])){
                            foreach($allowedColumns[$halResourceName] as $column){
                                $body[$halResourceName][$column] = $halResourceArray[$column];
                            }
                        }
                    }
                }
            }
        }

        $body[strtolower(get_class($halResource))] = array(
            'idclient' => $body['client']['idclient'],
            'client_firstname' => $body['client']['client_firstname'],
            'client_lastname' => $body['client']['client_lastname'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     *
     * @param type $id
     * @param array $allowedColumns
     * @return type
     */

    public function getEntity($id){
        $entity = ClientaddressQuery::create()->findPk($id);
        return $entity;
    }

    /**
     *
     * @param type $entity
     * @param array $allowedColumns
     * @return array
     */

    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad branch en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        $response = array();

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $clientaddressForm = ClientaddressFormGET::init($userLevel);
        $clientForm = ClientFormGET::init($userLevel);

        foreach($clientaddressForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                if($element->getAttribute('name')!="idclient"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        $response["ACL"]["client"]=array(
            "idclient" =>  $clientForm->get("idclient")->getOption('label'),
            "client_firstname" =>  $clientForm->get("client_firstname")->getOption('label'),
            "client_lastname" =>  $clientForm->get("client_lastname")->getOption('label'),
        );

        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/client/".ID_RESOURCE.'/address/'.$entity->getIdclientaddress(),
            ),
        );
        foreach($clientaddressForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idclient"){
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        $client = $entity->getClient();
        $response["client"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/client/".ID_RESOURCE.'/address/'.$client->getIdclient(),
                ),
            ),
            "idclient" => $client->getIdclient(),
            "client_firstname" => $client->getClientFirstName(),
            "client_lastname" => $client->getClientLastName()
        );
        return $response;
    }
    /////////// End get ///////////


    ///// Start getList /////
    /**
     * @param $idCompany
     * @param $page
     * @param $limit
     * @param $filters
     * @param $order
     * @param $dir
     * @return array
     */
    public function getCollection($idCompany, $page, $limit, $filters, $order, $dir){
        $clientaddressQuery = new ClientaddressQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $clientaddressQuery->getParams();
                if(isset($filter['in'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] == $param['column']){
                                $flag = true;
                            }else{
                                $flag=false;
                            }
                        }
                        if($flag){
                            $clientaddressQuery->addOr('clientaddress'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $clientaddressQuery->addAnd('clientaddress.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $clientaddressQuery->addOr('clientaddress.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $clientaddressQuery->filterBy(BasePeer::translateFieldname('clientaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $clientaddressQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $clientaddressQuery->useClientQuery()->filterByIdcompany($idCompany)->filterByIdclient(ID_RESOURCE)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address?page='.$result->getLastPage()),
        );

        if($result->getPreviousPage() == 1){
            unset($links['prev']);
        }
        if($result->isLastPage()){
            unset($links['next']);
        }

        $resume = array(
            'currentPage' => $result->getPage(),
            'itemsPerPage' => $result->getMaxPerPage(),
            'totalItems' => $result->count(),
            'lastPage' => $result->getLastPage(),
        );

        $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

        $resultArray = array(
            'links' => $links,
            'resume' => $resume,
            'data' => $data
        );

        //Retornamos nuestro resultado
        return $resultArray;

    }

    /**
     * @param $getCollection
     * @param $userLevel
     * @return array
     */
    public function getCollectionResponse($getCollection, $userLevel){
        // Instanciamos el Formulario GET de nuestro recurso department
        $clientaddressFormGET = ClientaddressFormGET::init($userLevel);
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientaddressArray = array();
        $clientQuery = ClientQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $clientaddressQuery = ClientaddressQuery::create()->filterByIdclientaddress($item['idclientaddress'])->findOne();
            $address = $clientaddressQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$address['idclient'].'/address'),
                ),
            );

            foreach($clientaddressFormGET->getElements() as $key=>$value){
                $row[$key] = $address[$key];
            }

            array_push($clientaddressArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($clientaddressFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // End ACL //
        unset($acl['idclient']);
        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'client' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$clientQuery['idclient']),
                ),
                'idclient' => $clientQuery['idclient'],
                'client_firstname' => $clientQuery['client_firstname'],
                'client_lastname' => $clientQuery['client_lastname'],
            ),
            'addresses' => $clientaddressArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['addresses'] = array(
                    'address' => $clientaddressArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $idclientaddress = $data['idclientaddress'];
        $idclient = $data['idclient'];
        //Instanciamos nuestra clientaddressQuery
        $clientaddressQuery = ClientaddressQuery::create();

        //Verificamos que el idclientaddress que se quiere modificar exista y que pretenece a la compañia
        if($clientaddressQuery->create()->filterByIdclientaddress($idclientaddress)->useClientQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra clientaddressQuery
            $clientaddressPKQuery = $clientaddressQuery->findPk($idclientaddress);
            $clientaddressFormToShowUpdate = ClientaddressFormToShowUpdate::init($userLevel);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $clientaddressArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Clientaddress');

            // Instanciamos el formulario clientaddressForm()
            $clientaddressForm = new ClientaddressForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro clientaddressArray
            foreach($clientaddressPKQuery as $key => $value){
                foreach($clientaddressForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($clientaddressArray[$keys])){
                            $clientaddressArray[$key] = $value;
                        }
                    }
                }
            }

            //Remplzamos los datos de la clientaddress por lo que se van a modificar
            foreach ($clientaddressArray as $key => $value){
                $clientaddressPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Instanciamos nuestro formulario ClientaddressFormPostPut
            $clientaddressFormPostPut = ClientaddressFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $clientaddressFormPostPut->setData($clientaddressArray);

            // Instanciamos nuestro filtro ClientaddressFilterPostPut
            $clientaddressFilterPostPut = new ClientaddressFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $clientaddressFormPostPut->setInputFilter($clientaddressFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($clientaddressFormPostPut->isValid()){

                //Si hay valores por modificar
                if($clientaddressPKQuery->isModified()){

                    $clientaddressPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/address/'.$clientaddressPKQuery->getIdclientaddress(),
                        ),
                    );

                    foreach ($clientaddressPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectClient = $clientaddressPKQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $objectClient[$key];
                    }
                    $bodyResponse['client'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$clientaddressPKQuery->getIdclient()),
                        ),
                    );

                    //Agregamos los datod de company a nuestro arreglo $row['_embedded']['client']
                    foreach ($clientArray as $key=>$value){
                        $bodyResponse['client'][$key] = $value;
                    }

                    $bodyResponse['client'] = array(
                        'idclient' => $bodyResponse['client']['idclient'],
                        'client_firstname' => $bodyResponse['client']['client_firstname'],
                        'client_lastname' => $bodyResponse['client']['client_lastname'],
                    );

                    return array('status_code' => 200, 'details' => $bodyResponse);

                }else{
                    $messageArray = array();
                    foreach ($clientaddressFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = 'No changes were found';
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);
                }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($clientaddressFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idclientaddress';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }
    /////////// End update ///////////

    /////////// Start delete ///////////
    /**
     * @param $id
     * @param $userLevel
     * @return bool
     */
    public function deleteEntity($id,$userLevel) {

        //Reglas de negocio
        if($userLevel>=4){
            ClientaddressQuery::create()->filterByIdclientaddress($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
