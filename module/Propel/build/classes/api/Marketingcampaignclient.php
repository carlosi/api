<?php

use API\REST\V1\ACL\Company\Client\Form\ClientFormGet;

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
    public function isIdValid($idResource,$idCompany){
        return MarketingcampaignQuery::create()->filterByIdmarketingcampaign($idResource)->useMarketingchannelQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdChildValid($idResource,$idResourceChild){
        return MarketingcampaignclientQuery::create()->filterByIdclient($idResource)
            ->filterByIdmarketingcampaign($idResourceChild)->exists();
    }

    public function getEntity($id){
        return ClientQuery::create()->findPk($id);
    }

    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad branch en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);
        $marketingcampaignArray = MarketingcampaignQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/marketingcampaign/".$marketingcampaignArray['idmarketingcampaign']."/client/".$entityArray['idclient'],
                ),
            ),
        );

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $clientForm = ClientFormGET::init($userLevel);

        foreach ($clientForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                //$response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        //Los datos de la entidad
        $response["marketingcampaign"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/marketingcampaign/".$marketingcampaignArray['idmarketingcampaign'],
                ),
            ),
            "idmarketingcampaign" => $marketingcampaignArray['idmarketingcampaign'],
            "marketingcampaign_name" => $marketingcampaignArray['marketingcampaigh_name']
        );

        foreach ($clientForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response['client'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response['client'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }

        //var_dump($response);
        return $response;
    }

    public function getCollection($idResource,$idCompany, $page, $limit, $filters, $order, $dir){
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
                        $marketingcampaignclientQuery->useClientQuery()->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN)->endUse();
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
        $result =  $marketingcampaignclientQuery->useClientQuery()->filterByIdcompany($idCompany)->endUse()->useMarketingcampaignQuery()->filterByIdmarketingcampaign($idResource)->endUse()->paginate($page,$limit);

        var_dump($result);
        $links = array(
            'self' => array('href' => URL_API.'/marketingcampaign/'.$idResource.'/client?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/marketingcampaign/'.$idResource.'client?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/marketingcampaign/'.$idResource.'client?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/marketingcampaign/'.$idResource.'client'),
            'last' => array('href' => URL_API.'/marketingcampaign/'.$idResource.'client?page='.$result->getLastPage()),
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

    public function getCollectionResponse($getCollection, $userLevel){
        // Instanciamos el Formulario GET de nuestro recurso department
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientArray = array();
        $marketingcampaignArray = MarketingcampaignQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $marketingcampaignclientQuery = MarketingcampaignclientQuery::create()->filterByIdmarketingcampaign($item['idmarketingcampaign'])->findOne();
            $client = $marketingcampaignclientQuery->getClient()->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$client['idclient']),
                ),
            );

            foreach ($clientFormGET->getElements() as $key=>$value){
                $row[$key] = $client[$key];
            }

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
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'marketingcampaign' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/marketingcampaign/'.$marketingcampaignArray['idmarketingcampaign']),
                ),
                'idmarketingcampaign' => $branchArray['idmarketingcampaign'],
                'marketingcampaign_name' => $branchArray['marketingcampaign_name'],
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
}
