<?php

/**
 * Quote.php
 * BuyBuy
 *
 * Created by Buybuy on 15/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormGET;
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteFormGET;
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteFormPostPut;
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Salesforce\Quote\Filter\QuoteFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'quote' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Quote extends BaseQuote
{
    public function isIdValidResource($idResource,$idCompany){
        return QuoteQuery::create()
            ->filterByIdquote($idResource)
            ->useTriggerprospectionQuery()
                ->useClientQuery()
                    ->filterByIdcompany($idCompany)
                ->endUse()
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

        foreach ($dataArray as $dataKey => $dataValue){
            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
        }
        $this->save();

        //Las columnas permitidas de nuestros foreign keys
        $allowedTriggerprospectionColumns = array();
        $triggerprospection = null;

        //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
        if(array_key_exists("idtriggerprospection", $dataArray)){

            //Instanciamos nuestro objeto Triggerprospection
            $triggerprospection = $this->getTriggerprospection();

            //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

            foreach ($triggerprospectionForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $allowedTriggerprospectionColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $allowedTriggerprospectionColumns[$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
        //1. El objeto quote "this"
        //2. Los elementos que van a ir como _embebed para removerlos(en este caso idtriggerprospection),
        //3. Las columnas permitidas e los foreignKeys
        //4. el objeto triggerprospection que va ir como __embebed = "triggerprospection"
        $bodyResponse = $this->createBodyResponse($this,array('idtriggerprospection'),array('triggerprospection' => $allowedTriggerprospectionColumns),array($triggerprospection));
        $this->save();
        return array('status_code' => 201, 'details' => $bodyResponse);
    }

    /**
     * @param $quote
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($quote, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $quoteArray = $quote->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($quoteArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.$quote->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($quoteArray as $quoteKey => $quoteValue){
            $body[$quoteKey] = $quoteValue; // Los datos del recurso
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

        $body['triggerprospection'] = array(
            'idtriggerprospection' => $body['triggerprospection']['idtriggerprospection'],
            'triggerprospection_by' => $body['triggerprospection']['triggerprospection_by'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return Quote|Quote[]|mixed
     */
    public function getEntity($id){
        $entity = QuoteQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){

        //Obtenemos nuestra entidad quote en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/quote/".$entity->getIdquote(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $quoteForm = QuoteFormGET::init($userLevel);

//        $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

        foreach ($quoteForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idtriggerprospection"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
//        $response["ACL"]["triggerprospection"]=array(
//            "idtriggerprospection" =>  $triggerprospectionForm->get("idtriggerprospection")->getOption('label'),
//            "triggerprospection_by" =>  $triggerprospectionForm->get("triggerprospection_by")->getOption('label'),
//        );

        $triggerprospection = $entity->getTriggerprospection();
        $response["triggerprospection"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/triggerprospection/".$triggerprospection->getIdtriggerprospection(),
                ),
            ),
            "idtriggerprospection" => $triggerprospection->getIdtriggerprospection(),
            "triggerprospection_by" => $triggerprospection->getTriggerprospectionBy()
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
        $quoteQuery = new QuoteQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $quoteQuery->getParams();
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
                            $quoteQuery->addOr('quote.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $quoteQuery->addAnd('quote.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $quoteQuery->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $quoteQuery->addOr('quote.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $quoteQuery->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $quoteQuery->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $quoteQuery ->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $quoteQuery->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $quoteQuery->filterBy(BasePeer::translateFieldname('quote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $quoteQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $quoteQuery->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idcompany)->endUse()->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/quote?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/quote?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/quote?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/quote'),
            'last' => array('href' => URL_API.'/'.MODULE.'/quote?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso quote
        $quoteFormGET = QuoteFormGET::init($userLevel);
        $quoteArray = array();
        foreach ($getCollection['data'] as $item){

            $quoteQuery = QuoteQuery::create()->filterByIdquote($item['idquote'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$item['idquote']),
                ),
            );

            foreach ($quoteFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            $triggerprospectionQuery = TriggerprospectionQuery::create()->filterByIdtriggerprospection($item['idtriggerprospection'])->findOne();
            $triggerprospection = $triggerprospectionQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['triggerprospection'] = array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$triggerprospection['idtriggerprospection']),
                ),
                'idtriggerprospection' => $triggerprospection['idtriggerprospection'],
                'triggerprospection_by' => $triggerprospection['triggerprospection_by'],
            );

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idtriggerprospection']);

            array_push($quoteArray, $row);
        }

        // Start Triggerprospection //
        // Instanciamos el objeto de TriggerprospectionQuery
        $triggerprospectionQuery = $quoteQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $triggerprospectionFormGET = TriggerprospectionFormGET::init($userLevel);

        $triggerprospectionArray = array();
        foreach ($triggerprospectionFormGET->getElements() as $key=>$value){
            $triggerprospectionArray[$key] = $triggerprospectionQuery[$key];
        }

        //Agregamos los datos de triggerprospection a nuestro arreglo $row['triggerprospection']
        foreach ($triggerprospectionArray as $key=>$value){
            $row[$key] = $value;
        }
        // End Triggerprospection //

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($quoteFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el idtriggerprospection Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
        if(key_exists('idtriggerprospection',$acl)){
            unset($acl['idtriggerprospection']);
            $triggerprospectionColumns = array();
            foreach ($triggerprospectionFormGET->getElements() as $element){
                $triggerprospectionColumns[$element->getAttribute('name')] =  $element->getOption('label');
            }
            // Mostramos las columnas que son relevantes a la respuesta:
            $triggerprospectionColumns = array(
                'idtriggerprospection' => $triggerprospectionColumns['idtriggerprospection'],
                'triggerprospection_by' => $triggerprospectionColumns['triggerprospection_by'],
            );
            $acl['triggerprospection'] = $triggerprospectionColumns;
        }
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'quotes' => $quoteArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['quotes'] = array(
                    'quote' => $quoteArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){

        //Instanciamos nuestra quoteQuery
        $quoteQuery = QuoteQuery::create();

        //Verificamos que el idquote que se quiere modificar exista y que pretenece a la compañia
        if($quoteQuery->create()->filterByIdquote($id)->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->exists()){

            //Instanciamos nuestra quoteQuery
            $quotePKQuery = $quoteQuery->findPk($id);
            $quoteFormToShowUpdate = QuoteFormToShowUpdate::init($userLevel);

            $quoteDataArray = $quotePKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la quote por lo que se van a modificar
            foreach ($data as $key => $value){
                $quotePKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $quoteArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Quote', $quoteDataArray);

            // Instanciamos nuestro formulario resourceFormPostPut
            $quoteFormPostPut = QuoteFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $quoteFormPostPut->setData($quoteArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $quoteFilterPostPut = new QuoteFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $quoteFormPostPut->setInputFilter($quoteFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($quoteFormPostPut->isValid()){

                //Si hay valores por modificar
                if($quotePKQuery->isModified()){

                    $quotePKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.MODULE.'/quote/'.$quotePKQuery->getIdquote(),
                        ),
                    );

                    // Convertimos nuestro objeto del registro en array y lo almacenamos en $bodyRespoonse
                    foreach ($quotePKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idtriggerprospection']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectTriggerprospection = $quotePKQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

                    $triggerprospectionArray = array();
                    foreach ($triggerprospectionForm->getElements() as $key=>$value){
                        $triggerprospectionArray[$key] = $objectTriggerprospection[$key];
                    }
                    $bodyResponse['triggerprospection'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$quotePKQuery->getIdTriggerprospection()),
                        ),
                    );

                    //Agregamos los datos de triggerprospection a nuestro arreglo $row['_embedded']['triggerprospection']
                    foreach ($triggerprospectionArray as $key=>$value){
                        $bodyResponse['triggerprospection'][$key] = $value;
                    }

                    $bodyResponse['triggerprospection'] = array(
                        'idtriggerprospection' => $bodyResponse['triggerprospection']['idtriggerprospection'],
                        'triggerprospection_by' => $bodyResponse['triggerprospection']['triggerprospection_by'],
                    );

                    return array('status_code' => 200, 'details' => $bodyResponse);
                }else{
                    $messageArray = array();
                    foreach ($quoteFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);                 }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($quoteFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idquote';
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
            QuoteQuery::create()->filterByIdquote($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}