<?php

/**
 * Marketingcampaign.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Salesforce\Marketingchannel\Form\MarketingchannelFormGET;
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignFormGET;
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignFormPostPut;
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Filter\MarketingcampaignFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'marketingcampaign' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Marketingcampaign extends BaseMarketingcampaign
{
    public function isIdValidResource($idResource,$idCompany){
        return MarketingcampaignQuery::create()
            ->filterByIdmarketingcampaign($idResource)
            ->useMarketingchannelQuery()
            ->filterByIdcompany($idCompany)
            ->endUse()
            ->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @param null $data
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel, $data=null){

        // validamos que el idmarketingchannel que nos envian, exista y corresponda a la compañia
        $idmarketingchannel = MarketingchannelQuery::create()->filterByIdmarketingchannel($dataArray['idmarketingchannel'])->filterByIdcompany($idCompany)->exists();
        if($idmarketingchannel){
            if(!$this->marketingcampaignnameByidmarketingchannelExist($dataArray["marketingcampaign_name"], $dataArray["idmarketingchannel"], $idCompany)){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->setMarketingcampaignCreatedAt(date("Y-m-d H:i:s"));
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedMarketingchannelColumns = array();
                $marketingchannel = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("idmarketingchannel", $dataArray)){

                    //Instanciamos nuestro objeto Marketingchannel
                    $marketingchannel = $this->getMarketingchannel();

                    //Instanciamos nuestro formulario marketingchannelET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $marketingchannelForm   = MarketingchannelFormGET::init($userLevel);

                    foreach ($marketingchannelForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedMarketingchannelColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedMarketingchannelColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto marketingcampaign "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso idmarketingchannel),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "marketingchannel"
                $bodyResponse = $this->createBodyResponse($this,array('idmarketingchannel'),array('marketingchannel' => $allowedMarketingchannelColumns),array($marketingchannel));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);

            }else{
                $bodyResponse = "marketingcampaign_name ". "'".$dataArray["marketingcampaign_name"]."'". " already exists in the idmarketingchannel ". "'".$dataArray["idmarketingchannel"]."'";
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = 'Invalid idmarketingchannel';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $marketingcampaignname
     * @param $idmarketingchannel
     * @param $idCompany
     * @return bool
     */
    public function marketingcampaignnameByidmarketingchannelExist($marketingcampaignname, $idmarketingchannel, $idCompany){
        return MarketingcampaignQuery::create()->filterByMarketingcampaignName($marketingcampaignname)->filterByIdmarketingchannel($idmarketingchannel)->useMarketingchannelQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

    /**
     * @param $marketingcampaign
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($marketingcampaign, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $marketingcampaignArray = $marketingcampaign->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($marketingcampaignArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/marketingcampaign/'.$marketingcampaign->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($marketingcampaignArray as $marketingcampaignKey => $marketingcampaignValue){
            $body[$marketingcampaignKey] = $marketingcampaignValue; // Los datos del recurso
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
            'idmarketingchannel' => $body['marketingchannel']['idmarketingchannel'],
            'marketingchannel_name' => $body['marketingchannel']['marketingchannel_name'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return Marketingcampaign|Marketingcampaign[]|mixed
     */
    public function getEntity($id){
        $entity = MarketingcampaignQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad marketingcampaign en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/marketingcampaign/".$entity->getIdmarketingcampaign(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $marketingcampaignForm = MarketingcampaignFormGET::init($userLevel);
//        $marketingchannelForm = MarketingchannelFormGET::init($userLevel);

        foreach ($marketingcampaignForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idmarketingchannel"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
//        $response["ACL"]["marketingchannel"]=array(
//            "idmarketingchannel" =>  $marketingchannelForm->get("idmarketingchannel")->getOption('label'),
//            "marketingchannel_name" =>  $marketingchannelForm->get("marketingchannel_name")->getOption('label'),
//        );

        $marketingchannel = $entity->getMarketingchannel();
        $response["marketingchannel"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/marketingchannel/".$marketingchannel->getIdmarketingchannel(),
                ),
            ),
            "idmarketingchannel" => $marketingchannel->getIdmarketingchannel(),
            "marketingchannel_name" => $marketingchannel->getMarketingchannelName()
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
        $marketingcampaignQuery = new MarketingcampaignQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $marketingcampaignQuery->getParams();
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
                            $marketingcampaignQuery->addOr('marketingcampaign.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $marketingcampaignQuery->addAnd('marketingcampaign.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $marketingcampaignQuery->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $marketingcampaignQuery->addOr('marketingcampaign.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $marketingcampaignQuery->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $marketingcampaignQuery->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $marketingcampaignQuery ->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $marketingcampaignQuery->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $marketingcampaignQuery->filterBy(BasePeer::translateFieldname('marketingcampaign', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $marketingcampaignQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $marketingcampaignQuery->useMarketingchannelQuery()->filterByIdCompany($idcompany)->endUse()->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign'),
            'last' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso marketingcampaign
        $marketingcampaignFormGET = MarketingcampaignFormGET::init($userLevel);
        $marketingcampaignArray = array();
        foreach ($getCollection['data'] as $item){

            $marketingcampaignQuery = MarketingcampaignQuery::create()->filterByIdmarketingcampaign($item['idmarketingcampaign'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.$item['idmarketingcampaign']),
                ),
            );

            foreach ($marketingcampaignFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            $marketingchannelQuery = MarketingchannelQuery::create()->filterByIdmarketingchannel($item['idmarketingchannel'])->findOne();
            $marketingchannel = $marketingchannelQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['marketingchannel'] = array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/marketingchannel/'.$marketingchannel['idmarketingchannel']),
                ),
                'idmarketingchannel' => $marketingchannel['idmarketingchannel'],
                'marketingchannel_name' => $marketingchannel['marketingchannel_name'],
            );
            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idmarketingchannel']);

            array_push($marketingcampaignArray, $row);
        }

        // Start Marketingchannel //
        // Instanciamos el objeto de MarketingchannelQuery
        $marketingchannelQuery = $marketingcampaignQuery->getMarketingchannel()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario marketingchannelGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $marketingchannelFormGET = MarketingchannelFormGET::init($userLevel);

        $marketingchannelArray = array();
        foreach ($marketingchannelFormGET->getElements() as $key=>$value){
            $marketingchannelArray[$key] = $marketingchannelQuery[$key];
        }

        //Agregamos los datos de user a nuestro arreglo $row['marketingchannel']
        foreach ($marketingchannelArray as $key=>$value){
            $row[$key] = $value;
        }
        // End Marketingchannel //

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($marketingcampaignFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el id marketingchannel Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
        if(key_exists('idmarketingchannel',$acl)){
            unset($acl['idmarketingchannel']);
            $marketingchannelColumns = array();
            foreach ($marketingchannelFormGET->getElements() as $element){
                $marketingchannelColumns[$element->getAttribute('name')] =  $element->getOption('label');
            }
            // Mostramos las columnas que son relevantes a la respuesta:
            $marketingchannelColumns = array(
                'idmarketingchannel' => $marketingchannelColumns['idmarketingchannel'],
                'marketingchannel_name' => $marketingchannelColumns['marketingchannel_name'],
            );
            $acl['marketingchannel'] = $marketingchannelColumns;
        }
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'marketingcampaigns' => $marketingcampaignArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['marketingcampaigns'] = array(
                    'marketingcampaign' => $marketingcampaignArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){
        $idmarketingchannel = isset($data['idmarketingchannel'])?$data['idmarketingchannel']:null;
        //Instanciamos nuestra marketingcampaignQuery
        $marketingcampaignQuery = MarketingcampaignQuery::create();

        //Verificamos que el Id marketingcampaign que se quiere modificar exista y que pretenece a la compañia
        if($marketingcampaignQuery->create()->filterByIdmarketingcampaign($id)->useMarketingchannelQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra marketingcampaignQuery
            $marketingcampaignPKQuery = $marketingcampaignQuery->findPk($id);
            $marketingcampaignFormToShowUpdate = MarketingcampaignFormToShowUpdate::init($userLevel);

            // Si idmarketingchannel tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['idmarketingchannel'] = isset($data['idmarketingchannel'])?$data['idmarketingchannel']:$marketingcampaignPKQuery->getIdmarketingchannel();
            // Si marketingcampaign_name tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['marketingcampaign_name'] = isset($data['marketingcampaign_name'])?$data['marketingcampaign_name']:$marketingcampaignPKQuery->getMarketingcampaignName();

            $marketingcampaignDataArray = $marketingcampaignPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la marketingcampaign por lo que se van a modificar
            foreach ($data as $key => $value){
                $marketingcampaignPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $marketingcampaignArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Marketingcampaign', $marketingcampaignDataArray);

            unset($marketingcampaignArray['idmarketingcampaign']);
            unset($marketingcampaignArray['idmarketingchannel']);

            // Si desean cambiar el $idmarketingchannel
            if(isset($idmarketingchannel)){
                // Instanciamos nuestro objeto MarketingchannelQuery y validamos si el idmarketingchannel del registro a actualizar sí pertenece a la misma compañia
                $marketingchannelQueryByIdmarketingchannel = MarketingchannelQuery::create()->filterByIdmarketingchannel($idmarketingchannel)->filterByIdcompany($idCompany)->findOne();
                // Si $marketingchannelQueryByIdmarketingchannel tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $marketingchannelQueryByIdmarketingchannel es null, entonces no pertenece a la misma compañia
                if($marketingchannelQueryByIdmarketingchannel != null){
                    $marketingchannelByIdmarketingchannel = $marketingchannelQueryByIdmarketingchannel->toArray(BasePeer::TYPE_FIELDNAME);
                    // Asignamos a nuestro arreglo el valor del idmarketingchannel
                    $marketingcampaignArray['idmarketingchannel'] = $marketingchannelByIdmarketingchannel['idmarketingchannel'];
                    // Preparamos el valor del idmarketingchannel para actualizar el registro en la base de datos
                    $marketingcampaignPKQuery->setByName('idmarketingchannel', $marketingchannelByIdmarketingchannel['idmarketingchannel'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid idmarketingchannel';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario resourceFormPostPut
            $marketingcampaignFormPostPut = MarketingcampaignFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $marketingcampaignFormPostPut->setData($marketingcampaignArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $marketingcampaignFilterPostPut = new MarketingcampaignFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $marketingcampaignFormPostPut->setInputFilter($marketingcampaignFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($marketingcampaignFormPostPut->isValid()){

                //Si hay valores por modificar
                if($marketingcampaignPKQuery->isModified()){
                    if($data['marketingcampaign_name'] == $marketingcampaignDataArray['marketingcampaign_name']){

                        $marketingcampaignPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/marketingcampaign/'.$marketingcampaignPKQuery->getIdmarketingcampaign(),
                            ),
                        );

                        foreach ($marketingcampaignPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idmarketingchannel']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $objectMarketingchannel = $marketingcampaignPKQuery->getMarketingchannel()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario marketingchannelGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $marketingchannelForm = MarketingchannelFormGET::init($userLevel);

                        $marketingchannelArray = array();
                        foreach ($marketingchannelForm->getElements() as $key=>$value){
                            $marketingchannelArray[$key] = $objectMarketingchannel[$key];
                        }
                        $bodyResponse['marketingchannel'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/'.MODULE.'/marketingchannel/'.$marketingcampaignPKQuery->getIdmarketingchannel()),
                            ),
                        );

                        //Agregamos los datos de marketingchannel a nuestro arreglo $row['_embedded']['marketingchannel']
                        foreach ($marketingchannelArray as $key=>$value){
                            $bodyResponse['marketingchannel'][$key] = $value;
                        }

                        $bodyResponse['marketingchannel'] = array(
                            'idmarketingchannel' => $bodyResponse['marketingchannel']['idmarketingchannel'],
                            'marketingchannel_name' => $bodyResponse['marketingchannel']['marketingchannel_name'],
                        );

                        return array('status_code' => 200, 'details' => $bodyResponse);

                    }else{


                        //Verificamos que marketingcampaign_name no exista ya en nuestra base de datos.
                        if($marketingcampaignQuery->filterByMarketingcampaignName($data['marketingcampaign_name'])->useMarketingchannelQuery()->filterByIdCompany($idCompany)->endUse()->find()->count()==0){

                            $marketingcampaignPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/marketingcampaign/'.$marketingcampaignPKQuery->getIdmarketingcampaign(),
                                ),
                            );

                            foreach ($marketingcampaignPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idmarketingchannel']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectMarketingchannel = $marketingcampaignPKQuery->getMarketingchannel()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $marketingchannelForm = MarketingchannelFormGET::init($userLevel);

                            $marketingchannelArray = array();
                            foreach ($marketingchannelForm->getElements() as $key=>$value){
                                $marketingchannelArray[$key] = $objectMarketingchannel[$key];
                            }
                            $bodyResponse['marketingchannel'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/'.MODULE.'/marketingchannel/'.$marketingcampaignPKQuery->getIdMarketingchannel()),
                                ),
                            );

                            //Agregamos los datos de marketingchannel a nuestro arreglo $row['_embedded']['marketingchannel']
                            foreach ($marketingchannelArray as $key=>$value){
                                $bodyResponse['marketingchannel'][$key] = $value;
                            }

                            $bodyResponse['marketingchannel'] = array(
                                'idmarketingchannel' => $bodyResponse['marketingchannel']['idmarketingchannel'],
                                'marketingchannel_name' => $bodyResponse['marketingchannel']['marketingchannel_name'],
                            );

                            return array('status_code' => 200, 'details' => $bodyResponse);

                        }else{
                            $bodyResponse = "marketingcampaign_name ". "'".$marketingcampaignArray['marketingcampaign_name']."'". " already exists";
                            return array('status_code' => 409, 'details' => $bodyResponse);
                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($marketingcampaignFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($marketingcampaignFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idmarketingcampaign';
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
            MarketingcampaignQuery::create()->filterByIdmarketingcampaign($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}