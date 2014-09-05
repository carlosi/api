<?php

use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Company\Clientfile\Form\ClientfileFormGET;

/**
 * Skeleton subclass for representing a row from the 'clientfile' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Clientfile extends BaseClientfile
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
        return ClientfileQuery::create()->filterByIdclient($idResource)
            ->filterByIdclientfile($idResourceChild)
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
        $clientfileQuery = new ClientfileQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $clientfileQuery->getParams();
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
                            $clientfileQuery->addOr('clientfile'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $clientfileQuery->addAnd('clientfile.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $clientfileQuery->addOr('clientfile.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $clientfileQuery->filterBy(BasePeer::translateFieldname('clientfile', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $clientfileQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $clientfileQuery->useClientQuery()->filterByIdcompany($idCompany)->filterByIdclient($idResource)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/client/'.$idResource.'/file?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/client/'.$idResource.'/file?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/client/'.$idResource.'/file?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/client/'.$idResource.'/file'),
            'last' => array('href' => URL_API.'/client/'.$idResource.'/file?page='.$result->getLastPage()),
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
        $clientfileFormGET = ClientfileFormGET::init($userLevel);
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientfileArray = array();
        $clientQuery = ClientQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $clientfileQuery = ClientfileQuery::create()->filterByIdclientfile($item['idclientfile'])->findOne();
            $clientfile = $clientfileQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/client/'.$clientfile['idclient'].'/file'),
                ),
            );

            foreach($clientfileFormGET->getElements() as $key=>$value){
                $row[$key] = $clientfile[$key];
            }

            array_push($clientfileArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($clientfileFormGET->getElements() as $element){
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
            'files' => $clientfileArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['files'] = array(
                    'file' => $clientfileArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////
}
