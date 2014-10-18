<?php

/**
 * Triggerprospection.php
 * BuyBuy
 *
 * Created by Buybuy on 14/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormGET;
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormPostPut;
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Salesforce\Triggerprospection\Filter\TriggerprospectionFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'triggerprospection' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Triggerprospection extends BaseTriggerprospection
{
    public function isIdValidResource($idResource,$idCompany){
        return TriggerprospectionQuery::create()->filterByIdtriggerprospection($idResource)->useClientQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        // validamos que el idclient que nos envian, exista y corresponda a la compañia
        $idclient = ClientQuery::create()->filterByIdclient($dataArray['idclient'])->filterByIdcompany($idCompany)->exists();
        if($idclient){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->setTriggerprospectionDate(date("Y-m-d H:i:s"));
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedClientColumns = array();
            $client = null;

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idclient", $dataArray)){

                //Instanciamos nuestro objeto Client
                $client = $this->getClient();

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clientForm   = ClientFormGET::init($userLevel);

                foreach ($clientForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedClientColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedClientColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }
            //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
            //1. El objeto triggerprospection "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idclient),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto company que va ir como __embebed = "client"
            $bodyResponse = $this->createBodyResponse($this,array('idclient'),array('client' => $allowedClientColumns),array($client));
            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);
        }else{
            $bodyResponse = 'Invalid idclient';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $triggerprospection
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($triggerprospection, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $triggerprospectionArray = $triggerprospection->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($triggerprospectionArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/triggerprospection/'.$triggerprospection->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($triggerprospectionArray as $triggerprospectionKey => $triggerprospectionValue){
            $body[$triggerprospectionKey] = $triggerprospectionValue; // Los datos del recurso
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
                                $body[$halResourceName][$column] = isset($halResourceArray[$column]) ? $halResourceArray[$column] : null;
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
                                $body[$halResourceName][$column] =  isset($halResourceArray[$column]) ? $halResourceArray[$column] : null;
                            }
                        }
                    }
                }
            }
        }
        $body['client'] = array(
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
     * @param $id
     * @return Triggerprospection|Triggerprospection[]|mixed
     */
    public function getEntity($id){
        $entity = TriggerprospectionQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad triggerprospection en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/triggerprospection/".$entity->getIdtriggerprospection(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);
//        $clientForm = ClientFormGET::init($userLevel);

        foreach ($triggerprospectionForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idclient"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
//        $response["ACL"]["client"]=array(
//            "idclient" =>  $clientForm->get("idclient")->getOption('label'),
//            "client_firstname" =>  $clientForm->get("client_firstname")->getOption('label'),
//        );

        $client = $entity->getClient();
        $response["client"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/company/client/".$client->getIdclient(),
                ),
            ),
            "idclient" => $client->getIdclient(),
            "client_firstname" => $client->getClientFirstName(),
            "client_lastname" => $client->getClientLastName()
        );

        return $response;
    }
    /////////// End get ///////////

    /////////// Start getList ///////////
    /**
     * @param $idcompany
     * @param $page
     * @param $limit
     * @param array $filters
     * @param $order
     * @param $dir
     * @return array
     */
    public function getCollection($idcompany, $page, $limit, array $filters=null, $order, $dir){
        $triggerprospectionQuery = new TriggerprospectionQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $triggerprospectionQuery->getParams();
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
                            $triggerprospectionQuery->addOr('triggerprospection.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $triggerprospectionQuery->addAnd('triggerprospection.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $triggerprospectionQuery->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $triggerprospectionQuery->addOr('triggerprospection.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $triggerprospectionQuery->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $triggerprospectionQuery->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $triggerprospectionQuery ->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $triggerprospectionQuery->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $triggerprospectionQuery->filterBy(BasePeer::translateFieldname('triggerprospection', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $triggerprospectionQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $triggerprospectionQuery->useClientQuery()->filterByIdCompany($idcompany)->endUse()->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/triggerprospection?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/triggerprospection?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/triggerprospection'),
            'last' => array('href' => URL_API.'/'.MODULE.'/triggerprospection?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso triggerprospection
        $triggerprospectionFormGET = TriggerprospectionFormGET::init($userLevel);
        $triggerprospectionArray = array();
        foreach ($getCollection['data'] as $item){

            $triggerprospectionQuery = TriggerprospectionQuery::create()->filterByIdtriggerprospection($item['idtriggerprospection'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$item['idtriggerprospection']),
                ),
            );

            foreach ($triggerprospectionFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            $clientQuery = ClientQuery::create()->filterByIdclient($item['idclient'])->findOne();
            $client = $clientQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['client'] = array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/company/client/'.$client['idclient']),
                ),
                'idclient' => $client['idclient'],
                'client_firstname' => $client['client_firstname'],
                'client_lastname' => $client['client_lastname']
            );
            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idclient']);

            array_push($triggerprospectionArray, $row);
        }

        // Start Client //
        // Instanciamos el objeto de ClientQuery
        $clientQuery = $triggerprospectionQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $clientFormGET = ClientFormGET::init($userLevel);

        $clientArray = array();
        foreach ($clientFormGET->getElements() as $key=>$value){
            $clientArray[$key] = $clientQuery[$key];
        }

        //Agregamos los datos de user a nuestro arreglo $row['client']
        foreach ($clientArray as $key=>$value){
            $row[$key] = $value;
        }
        // End Client //

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($triggerprospectionFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el id client Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
        if(key_exists('idclient',$acl)){
            unset($acl['idclient']);
            $clientColumns = array();
            foreach ($clientFormGET->getElements() as $element){
                $clientColumns[$element->getAttribute('name')] =  $element->getOption('label');
            }
            // Mostramos las columnas que son relevantes a la respuesta:
            $clientColumns = array(
                'idclient' => $clientColumns['idclient'],
                'client_firstname' => $clientColumns['client_firstname'],
                'client_lastname' => $clientColumns['client_lastname']
            );
            $acl['client'] = $clientColumns;
        }
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'triggerprospections' => $triggerprospectionArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['triggerprospections'] = array(
                    'triggerprospection' => $triggerprospectionArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){
        $idclient = isset($data['idclient'])?$data['idclient']:null;
        //Instanciamos nuestra triggerprospectionQuery
        $triggerprospectionQuery = TriggerprospectionQuery::create();

        //Verificamos que el Id triggerprospection que se quiere modificar exista y que pretenece a la compañia
        if($triggerprospectionQuery->create()->filterByIdtriggerprospection($id)->useClientQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra triggerprospectionQuery
            $triggerprospectionPKQuery = $triggerprospectionQuery->findPk($id);
            $triggerprospectionFormToShowUpdate = TriggerprospectionFormToShowUpdate::init($userLevel);

            // Si idclient tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['idclient'] = isset($data['idclient'])?$data['idclient']:$triggerprospectionPKQuery->getIdclient();

            $triggerprospectionDataArray = $triggerprospectionPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la triggerprospection por lo que se van a modificar
            foreach ($data as $key => $value){
                $triggerprospectionPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $triggerprospectionArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Triggerprospection', $triggerprospectionDataArray);

            // Si desean cambiar el $idclient
            if(isset($idclient)){
                // Instanciamos nuestro objeto ClientQuery y validamos si el idclient del registro a actualizar sí pertenece a la misma compañia
                $clientQueryByIdclient = ClientQuery::create()->filterByIdclient($idclient)->filterByIdcompany($idCompany)->findOne();
                // Si $clientQueryByIdclient tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $clientQueryByIdclient es null, entonces no pertenece a la misma compañia
                if($clientQueryByIdclient != null){
                    $clientByIdclient = $clientQueryByIdclient->toArray(BasePeer::TYPE_FIELDNAME);
                    // Asignamos a nuestro arreglo el valor del idclient
                    $triggerprospectionArray['idclient'] = $clientByIdclient['idclient'];
                    // Preparamos el valor del idclient para actualizar el registro en la base de datos
                    $triggerprospectionPKQuery->setByName('idclient', $clientByIdclient['idclient'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid idclient';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario resourceFormPostPut
            $triggerprospectionFormPostPut = TriggerprospectionFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $triggerprospectionFormPostPut->setData($triggerprospectionArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $triggerprospectionFilterPostPut = new TriggerprospectionFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $triggerprospectionFormPostPut->setInputFilter($triggerprospectionFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($triggerprospectionFormPostPut->isValid()){

                //Si hay valores por modificar
                if($triggerprospectionPKQuery->isModified()){

                    $triggerprospectionPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.MODULE.'/triggerprospection/'.$triggerprospectionPKQuery->getIdtriggerprospection(),
                        ),
                    );

                    foreach ($triggerprospectionPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idclient']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectClient = $triggerprospectionPKQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $clientForm = ClientFormGET::init($userLevel);

                    $clientArray = array();
                    foreach ($clientForm->getElements() as $key=>$value){
                        $clientArray[$key] = $objectClient[$key];
                    }
                    $bodyResponse['client'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$triggerprospectionPKQuery->getIdclient()),
                        ),
                    );

                    //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
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
                    foreach ($triggerprospectionFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);
                }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($triggerprospectionFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idtriggerprospection';
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
            TriggerprospectionQuery::create()->filterByIdtriggerprospection($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}