<?php

/**
 * Marketingcampaignclient.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

////// FORMS //////
use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Salesforce\Marketingcampaign\Form\MarketingcampaignFormGET;

/**
 * Skeleton subclass for representing a row from the 'marketingcampaignclient' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Marketingcampaignclient extends BaseMarketingcampaignclient
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return MarketingcampaignQuery::create()
            ->filterByIdmarketingcampaign($idResource)
            ->useMarketingchannelQuery()
            ->filterByIdcompany($idCompany)
            ->endUse()
            ->exists();
    }

    /**
     * @param $idResourceChild
     * @param $idCompany
     * @return mixed
     */
    public function isIdValidResurceChild($idResourceChild, $idCompany){
        return ClientQuery::create()
            ->filterByIdclient($idResourceChild)
            ->filterByIdcompany($idCompany)
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

        $marketingcampaignclientQuery = MarketingcampaignclientQuery::create();

        $existsClientOnMarketingcampaign = $marketingcampaignclientQuery->filterByIdmarketingcampaign($dataArray['idmarketingcampaign'])->filterByIdclient($dataArray['idclient'])->exists();
        if(!$existsClientOnMarketingcampaign){
            // Preparamos nuestro recurso para insertamos los datos el idclient y el id marketingcampaign en la base de datos
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey, $dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedMarketingcampaignColumns = array();

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idmarketingcampaign", $dataArray)){

                //Instanciamos nuestro objeto Marketingcampaign
                $marketingcampaign = $this->getMarketingcampaign();

                //Instanciamos nuestro formulario marketingcampaignGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $marketingcampaignForm   = MarketingcampaignFormGET::init($userLevel);

                foreach ($marketingcampaignForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedMarketingcampaignColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedMarketingcampaignColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }

            //Las columnas permitidas de nuestros foreign keys
            $allowedClientColumns = array();

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idclient", $dataArray)){

                //Instanciamos nuestro objeto Company
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
            //1. El objeto marketingcampaignclient "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idmarketingcampaign y idclient),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto branchdepartment que va ir como __embebed = "marketingcampaign" y "client"
            $bodyResponse = $this->createBodyResponse($this,array('idmarketingcampaign','idclient'),array('marketingcampaign' => $allowedMarketingcampaignColumns, 'client' => $allowedClientColumns),array($marketingcampaign, $client));

            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);
        }else{
            $bodyResponse = "idclient ". "'".$dataArray["idclient"]."'". " already exists in the idmarketingcampaign "."'".$dataArray["idmarketingcampaign"]."'";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $marketingcampaignclient
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return mixed
     */
    public function createBodyResponse($marketingcampaignclient, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $marketingcampaignclientArray = $marketingcampaignclient->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($marketingcampaignclientArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        /*
        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch/department/'.$branchdepartment->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($branchdepartmentArray as $branchdepartmentKey => $branchdepartmentValue){
            $body[$branchdepartmentKey] = $branchdepartmentValue; // Los datos del recurso
        }
        */

        //Verificamos si hay elementos recursos _embebed
        if($halResources!=null){
            foreach ($halResources as $halResource){
                $class = get_class($halResource);
                if($class == "Client"){
                    if($halResource!=null){
                        if(!isset($body[strtolower(get_class($halResource))])){
                            $body[strtolower(get_class($halResource))] = array(
                                "_links" => array(
                                    "self" => array(
                                        "href" =>URL_API.'/v'.API_VERSION.'/company/'.strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
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
                                        "href" =>URL_API.'/v'.API_VERSION.'/company/'.strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
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
                }else{
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
        }

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start getList ///////////
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
        $marketingcampaignclientQuery = new MarketingcampaignclientQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $marketingcampaignclientQuery->getParams();
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
                            $marketingcampaignclientQuery->addOr('client'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $marketingcampaignclientQuery->addAnd('client.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $marketingcampaignclientQuery ->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN)->endUse();
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $marketingcampaignclientQuery->addOr('client.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $marketingcampaignclientQuery->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL)->endUse();
                    }
                }
                if(isset($filter['gt'])){
                    $marketingcampaignclientQuery->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN)->endUse();
                }
                if(isset($filter['lt'])){
                    $marketingcampaignclientQuery->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN)->endUse();
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $marketingcampaignclientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $marketingcampaignclientQuery->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE)->endUse();
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $marketingcampaignclientQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $marketingcampaignclientQuery->useMarketingcampaignQuery()->filterByIdmarketingcampaign(ID_RESOURCE)->useMarketingchannelQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.ID_RESOURCE.'/client?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.ID_RESOURCE.'/client?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.ID_RESOURCE.'/client?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.ID_RESOURCE.'/client'),
            'last' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.ID_RESOURCE.'/client?page='.$result->getLastPage()),
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
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientArray = array();
        $marketingcampaignArray = MarketingcampaignQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $marketingcampaignClientQuery = MarketingcampaignclientQuery::create()->filterByIdmarketingcampaignclient($item['idmarketingcampaignclient'])->findOne();
            $client = $marketingcampaignClientQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/company/client/'.$client['idclient']),
                ),
            );

            foreach ($clientFormGET->getElements() as $key=>$value){
                $row[$key] = $client[$key];
            }

            // Eliminamos idcompany
            unset($row['idcompany']);
            unset($row['client_iso_codephone']);
            unset($row['client_email']);
            unset($row['client_email2']);
            unset($row['client_password']);
            unset($row['client_cellular']);
            unset($row['client_language']);
            unset($row['client_status']);
            unset($row['client_type']);
            unset($row['client_type']);

            array_push($clientArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($clientFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // eliminamos el idcompany
        unset($acl['idcompany']);
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'marketingcampaign' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/marketingcampaign/'.$marketingcampaignArray['idmarketingcampaign']),
                ),
                'idmarketingcampaign' => $marketingcampaignArray['idmarketingcampaign'],
                'marketingcampaign_name' => $marketingcampaignArray['marketingcampaign_name'],
            ),
            'clients' => $clientArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['clients'] = array(
                    'client' => $clientArray
                );
                break;
            }
        }

        return $response;

    }
    /////////// Start getList ///////////

    /////////// Start delete ///////////
    /**
     * @param $id
     * @param $userLevel
     * @return bool
     */
    public function deleteEntity($id,$userLevel) {

        //Reglas de negocio
        if($userLevel>=4){
            MarketingcampaignclientQuery::create()->filterByIdmarketingcampaignclient($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}