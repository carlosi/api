<?php

//// Form ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\SalesForce\Marketingchannel\Form\MarketingchannelFormGET;

/**
 * Skeleton subclass for representing a row from the 'marketingchannel' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Marketingchannel extends BaseMarketingchannel
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValid($idResource,$idCompany){
        return MarketingchannelQuery::create()->filterByIdmarketingchannel($idResource)->filterByIdcompany($idCompany)->exists();
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
        $marketingchannelQuery = new MarketingchannelQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $marketingchannelQuery->getParams();
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
                            $marketingchannelQuery->addOr('marketingchannel.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $marketingchannelQuery->addAnd('marketingchannel.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $marketingchannelQuery->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $marketingchannelQuery->addOr('marketingchannel.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $marketingchannelQuery->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $marketingchannelQuery->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $marketingchannelQuery ->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $marketingchannelQuery->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $marketingchannelQuery->filterBy(BasePeer::translateFieldname('marketingchannel', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $marketingchannelQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $marketingchannelQuery->filterByIdCompany($idcompany)->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/marketingchannel?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/marketingchannel?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/marketingchannel?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/marketingchannel'),
            'last' => array('href' => URL_API.'/marketingchannel?page='.$result->getLastPage()),
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
        $marketingchannelFormGET = MarketingchannelFormGET::init($userLevel);
        $marketingchannelArray = array();
        foreach ($getCollection['data'] as $item){

            $marketingchannelQuery = MarketingchannelQuery::create()->filterByIdmarketingchannel($item['idmarketingchannel'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/marketingchannel/'.$item['idmarketingchannel']),
                ),
            );

            foreach ($marketingchannelFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idcompany']);

            array_push($marketingchannelArray, $row);
        }

        // Start Company //
        // Instanciamos el objeto de CompanyQuery
        $companyQuery = $marketingchannelQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $companyFormGET = CompanyFormGET::init($userLevel);

        $companyArray = array();
        foreach ($companyFormGET->getElements() as $key=>$value){
            $companyArray[$key] = $companyQuery[$key];
        }

        //Agregamos los datos de user a nuestro arreglo $row['company']
        foreach ($companyArray as $key=>$value){
            $row[$key] = $value;
        }
        // End Company //

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($marketingchannelFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
        if(key_exists('idcompany',$acl)){
            unset($acl['idcompany']);
            $companyColumns = array();
            foreach ($companyFormGET->getElements() as $element){
                $companyColumns[$element->getAttribute('name')] =  $element->getOption('label');
            }
            // Mostramos las columnas que son relevantes a la respuesta:
            $companyColumns = array(
                'idcompany' => $companyColumns['idcompany'],
                'company_name' => $companyColumns['company_name'],
            );
            $acl['company'] = $companyColumns;
        }

        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'company' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/company/'.$marketingchannelQuery->getIdcompany()),
                ),
                'idcompany' => $row['idcompany'],
                'company_name' => $row['company_name'],
            ),
            'marketingchannels' => $marketingchannelArray,
        );
        switch(TYPE_RESPONSE){
               case "xml" :{
                $response['marketingchannels'] = array(
                    'marketingchannel' => $marketingchannelArray
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
        $entity = MarketingchannelQuery::create()->findPk($id);
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
                    "href" =>  URL_API."/v".API_VERSION."/marketingchannel/".$entity->getIdmarketingchannel(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $marketingchannelForm = MarketingchannelFormGET::init($userLevel);
        $companyForm = CompanyFormGET::init($userLevel);

        foreach ($marketingchannelForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        $response["ACL"]["company"]=array(
            "idcompany" =>  $companyForm->get("idcompany")->getOption('label'),
            "company_name" =>  $companyForm->get("company_name")->getOption('label'),
        );

        $company = $entity->getCompany();
        $response["company"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/company/".$company->getIdcompany(),
                ),
            ),
            "idcompany" => $company->getIdcompany(),
            "company_name" => $company->getCompanyName()
        );
        return $response;
    }
    /////////// End get ///////////
}
