<?php

//// Form ////
use API\REST\V1\ACL\SalesForce\Marketingchannel\Form\MarketingchannelFormGET;
use API\REST\V1\ACL\SalesForce\Marketingcampaign\Form\MarketingcampaignFormGET;

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
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValid($idResource,$idCompany){
        return MarketingcampaignQuery::create()->filterByIdmarketingcampaign($idResource)->useMarketingchannelQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

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
            'self' => array('href' => URL_API.'/marketingcampaign?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/marketingcampaign?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/marketingcampaign?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/marketingcampaign'),
            'last' => array('href' => URL_API.'/marketingcampaign?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso branch
        $marketingcampaignFormGET = MarketingcampaignFormGET::init($userLevel);
        $marketingcampaignArray = array();
        foreach ($getCollection['data'] as $item){

            $marketingcampaignQuery = MarketingcampaignQuery::create()->filterByIdmarketingcampaign($item['idmarketingcampaign'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/marketingcampaign/'.$item['idmarketingcampaign']),
                ),
            );

            foreach ($marketingcampaignFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idmarketingchannel']);

            array_push($marketingcampaignArray, $row);
        }

        // Start Marketingchannel //
        // Instanciamos el objeto de MarketingchannelQuery
        $marketingchannelQuery = $marketingcampaignQuery->getMarketingchannel()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
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

        //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
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
            'marketingchannel' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/marketingchannel/'.$marketingcampaignQuery->getIdmarketingchannel()),
                ),
                'idmarketingchannel' => $row['idmarketingchannel'],
                'marketingchannel_name' => $row['marketingchannel_name'],
            ),
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

    /////////// Start get ///////////
    /**
     * @param $id
     * @return Marketingchannel|Marketingchannel[]|mixed
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
        //Obtenemos nuestra entidad branch en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/marketingcampaign/".$entity->getIdmarketingcampaign(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $marketingcampaignFormGET = MarketingcampaignFormGET::init($userLevel);
        $marketingchannelFormGET = MarketingchannelFormGET::init($userLevel);

        foreach ($marketingcampaignFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idmarketingcampaign"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        $response["ACL"]["marketingchannel"]=array(
            "idmarketingchannel" =>  $marketingchannelFormGET->get("idmarketingchannel")->getOption('label'),
            "marketingchannel_name" =>  $marketingchannelFormGET->get("marketingchannel_name")->getOption('label'),
        );

        $marketingchannel = $entity->getMarketingchannel();
        $response["marketingchannel"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/marketingchannel/".$marketingchannel->getIdmarketingchannel(),
                ),
            ),
            "idmarketingchannel" => $marketingchannel->getIdmarketingchannel(),
            "marketingchannel_name" => $marketingchannel->getMarketingchannelName()
        );
        return $response;
    }
    /////////// End get ///////////
}
