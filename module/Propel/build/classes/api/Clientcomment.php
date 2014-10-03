<?php


//// FORMS ////
use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentForm;
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentFormGET;
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentFormToShowUpdate;
use API\REST\V1\ACL\Company\Clientcomment\Form\ClientcommentFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Company\Clientcomment\Filter\ClientcommentFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;


/**
 * Skeleton subclass for representing a row from the 'clientcomment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Clientcomment extends BaseClientcomment
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
        return ClientcommentQuery::create()->filterByIdclient($idResource)
            ->filterByIdclientcomment($idResourceChild)
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

        // Agregamos por defecto la fecha del server en la columna clientcomment_date
        $dataArray['clientcomment_date'] = date("Y-m-d H:i:s");

        foreach ($dataArray as $dataKey => $dataValue){
            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
        }
        $this->save();

        //Las columnas permitidas de nuestros foreign keys
        $allowedClientcommentColumns = array();

        $client = null;
        //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
        if(array_key_exists("idclient", $dataArray)){

            //Instanciamos nuestro objeto Client
            $client = $this->getClient();

            //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $clientForm   = ClientFormGET::init($userLevel);

            foreach ($clientForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $allowedClientcommentColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $allowedClientcommentColumns[$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
        //1. El objeto branch "this"
        //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
        //3. Las columnas permitidas e los foreignKeys
        //4. el objeto company que va ir como __embebed = "client"
        $bodyResponse = $this->createBodyResponse($this,array('idclient'),array('client' => $allowedClientcommentColumns),array($client));
        $this->save();
        return array('status_code' => 201, 'details' => $bodyResponse);

    }

    /**
     * @param $clientcomment
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($clientcomment, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $clientcommentArray = $clientcomment->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($clientcommentArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment/'.$clientcomment->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($clientcommentArray as $clientcommentKey => $clientcommentValue){
            $body[$clientcommentKey] = $clientcommentValue; // Los datos del recurso
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
        $entity = ClientcommentQuery::create()->findPk($id);
        return $entity;
    }

    /**
     *
     * @param type $entity
     * @param array $allowedColumns
     * @return array
     */

    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad clientcomment en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        $response = array();

        //El ACL
        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $clientcommentForm = ClientcommentFormGET::init($userLevel);
        $clientForm = ClientFormGET::init($userLevel);

        foreach($clientcommentForm->getElements() as $element){
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

        //Los Links
        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/client/".ID_RESOURCE.'/comment/'.$entity->getIdclientcomment(),
            ),
        );

        foreach($clientcommentForm->getElements() as $element){
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
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/client/".$client->getIdclient(),
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
        $clientcommentQuery = new ClientcommentQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $clientcommentQuery->getParams();
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
                            $clientcommentQuery->addOr('clientcomment'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $clientcommentQuery->addAnd('clientcomment.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $clientcommentQuery->addOr('clientcomment.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $clientcommentQuery->filterBy(BasePeer::translateFieldname('clientcomment', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $clientcommentQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $clientcommentQuery->useClientQuery()->filterByIdcompany($idCompany)->filterByIdclient(ID_RESOURCE)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment?page='.$result->getLastPage()),
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
        $clientcommentFormGET = ClientcommentFormGET::init($userLevel);
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientcommentArray = array();
        $clientQuery = ClientQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $clientcommentQuery = ClientcommentQuery::create()->filterByIdclientcomment($item['idclientcomment'])->findOne();
            $comment = $clientcommentQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$comment['idclient'].'/comment/'.$comment['idclientcomment']),
                ),
            );

            foreach($clientcommentFormGET->getElements() as $key=>$value){
                $row[$key] = $comment[$key];
            }

            array_push($clientcommentArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($clientcommentFormGET->getElements() as $element){
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
            'comments' => $clientcommentArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['comments'] = array(
                    'comment' => $clientcommentArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $idclientcomment = $data['idclientcomment'];
        //Instanciamos nuestra clientcommentQuery
        $clientcommentQuery = ClientcommentQuery::create();

        //Verificamos que el idclientcomment que se quiere modificar exista y que pretenece a la compañia
        if($clientcommentQuery->create()->filterByIdclientcomment($idclientcomment)->useClientQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra clientcommentQuery
            $clientcommentPKQuery = $clientcommentQuery->findPk($idclientcomment);
            $clientcommentFormToShowUpdate = ClientcommentFormToShowUpdate::init($userLevel);

            $clientcommentDataArray = $clientcommentPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $clientcommentArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Clientcomment');

            // Actualizamos clientcomment_date con la fecha del server actual.
            $clientcommentArray['clientcomment_date'] = date("Y-m-d H:i:s");

            // Instanciamos el formulario clientcommentForm()
            $clientcommentForm = new ClientcommentForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro clientcommentArray
            foreach($clientcommentPKQuery as $key => $value){
                foreach($clientcommentForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($clientcommentArray[$keys])){
                            $clientcommentArray[$key] = $value;
                        }
                    }
                }
            }

            //Remplzamos los datos de la clientcomment por lo que se van a modificar
            foreach ($clientcommentArray as $key => $value){
                $clientcommentPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Instanciamos nuestro formulario ClientcommentFormPostPut
            $clientcommentFormPostPut = ClientcommentFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $clientcommentFormPostPut->setData($clientcommentArray);

            // Instanciamos nuestro filtro ClientcommentFilterPostPut
            $clientcommentFilterPostPut = new ClientcommentFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $clientcommentFormPostPut->setInputFilter($clientcommentFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($clientcommentFormPostPut->isValid()){

                //Si hay valores por modificar
                if($clientcommentPKQuery->isModified()){

                    $clientcommentPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.ID_RESOURCE.'/comment/'.$clientcommentPKQuery->getIdclientcomment(),
                        ),
                    );

                    foreach ($clientcommentPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectClient = $clientcommentPKQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $objectClient[$key];
                    }
                    $bodyResponse['client'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$clientcommentPKQuery->getIdclient()),
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
                    foreach ($clientcommentFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($clientcommentFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idclientcomment';
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
            ClientcommentQuery::create()->filterByIdclientcomment($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}

