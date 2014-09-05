<?php

use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressFormGET;

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
    public function isIdValid($idResource,$idCompany){
        return ClientQuery::create()->filterByIdclient($idResource)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdChildValid($idResource,$idResourceChild){
        return ClientaddressQuery::create()->filterByIdclient($idResource)
            ->filterByIdclientaddress($idResourceChild)
            ->exists();
    }

    ///// Start getList /////
    /**
     * @param $idResource
     * @param $idCompany
     * @param $page
     * @param $limit
     * @param $filters
     * @param $order
     * @param $dir
     * @return array
     */
    public function getCollection($idResource, $idCompany, $page, $limit, $filters, $order, $dir){
        $clientaddressQuery = new ClientaddressQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
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
        $result =  $clientaddressQuery->useClientQuery()->filterByIdcompany($idCompany)->filterByIdclient($idResource)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/client/'.$idResource.'/address?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/client/'.$idResource.'/address?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/client/'.$idResource.'/address?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/client/'.$idResource.'/address'),
            'last' => array('href' => URL_API.'/client/'.$idResource.'/address?page='.$result->getLastPage()),
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
                    'self' => array('href' => URL_API.'/client/'.$address['idclient'].'/address'),
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
                    'self' => array('href' => URL_API.'/client/'.$clientQuery['idclient']),
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
}
