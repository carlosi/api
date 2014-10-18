<?php

/**
 * Quoteitem.php
 * BuyBuy
 *
 * Created by Buybuy on 16/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// FORMS ////
use API\REST\V1\ACL\Contents\Product\Form\ProductFormGET;
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteFormGET;
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemForm;
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemFormGET;
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemFormToShowUpdate;
use API\REST\V1\ACL\Salesforce\Quoteitem\Form\QuoteitemFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Salesforce\Quoteitem\Filter\QuoteitemFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'quoteitem' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Quoteitem extends BaseQuoteitem
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return QuoteQuery::create()->filterByIdquote($idResource)
            ->useTriggerprospectionQuery()
            ->useClientQuery()
            ->filterByIdcompany($idCompany)
            ->endUse()
            ->endUse()
            ->exists();
    }

    /**
     * @param $idResourceChild
     * @param $idCompany
     * @return mixed
     */
    public function isIdValidResurceChild($idResourceChild, $idCompany){
        return QuoteitemQuery::create()
            ->filterByIdquoteitem($idResourceChild)
            ->useQuoteQuery()
                ->useTriggerprospectionQuery()
                    ->useClientQuery()
                        ->filterByIdcompany($idCompany)
                    ->endUse()
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
    public function saveResouce($dataArray,$idCompany,$userLevel,$data=null){
        $idquote = QuoteQuery::create()->filterByIdquote($dataArray['idquote'])->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->exists();
        $idproduct = ProductQuery::create()->filterByIdproduct($dataArray['idproduct'])->useProductmainQuery()->filterByIdcompany($idCompany)->endUse()->exists();
        if($idproduct){
            if($idquote){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedQuoteColumns = array();

                $quote = null;
                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("idquote", $dataArray)){

                    //Instanciamos nuestro objeto Quote
                    $quote = $this->getQuote();

                    //Instanciamos nuestro formulario quoteGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $quoteForm   = QuoteFormGET::init($userLevel);

                    foreach ($quoteForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedQuoteColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedQuoteColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }

                //Las columnas permitidas de nuestros foreign keys
                $allowedProductColumns = array();

                $product = null;
                if(array_key_exists("idproduct", $dataArray)){

                    //Instanciamos nuestro objeto Product
                    $product = $this->getProduct();

                    //Instanciamos nuestro formulario productGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $productForm = ProductFormGET::init($userLevel);

                    foreach ($productForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedProductColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedProductColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto quoteitem "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso idquote y ididproduct),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "quote y product"
                $bodyResponse = $this->createBodyResponse($this,array('idquote', 'idproduct'),array('quote' => $allowedQuoteColumns, 'product' => $allowedProductColumns),array($quote, $product));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = 'Invalid idquote';
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = 'Invalid idproduct';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $quoteitem
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($quoteitem, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $quoteitemArray = $quoteitem->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($quoteitemArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item/'.$quoteitem->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($quoteitemArray as $quoteitemKey => $quoteitemValue){
            $body[$quoteitemKey] = $quoteitemValue; // Los datos del recurso
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

        $body['quote'] = array(
            'idquote' => $body['quote']['idquote'],
            'quote_status' => $body['quote']['quote_status'],
        );
        $body['product'] = array(
            'idproduct' => $body['product']['idproduct'],
            'product_status' => $body['product']['product_status'],
        );


        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return mixed|Quoteitem|Quoteitem[]
     */
    public function getEntity($id){
        $entity = QuoteitemQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad company en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        $response = array();

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $quoteitemForm = QuoteitemFormGET::init($userLevel);
        $quoteForm = QuoteFormGET::init($userLevel);
        $productForm = ProductFormGET::init($userLevel);

        foreach($quoteitemForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                if($element->getAttribute('name')!="idquote"){
                    if($element->getAttribute('name')!="idproduct"){
                        $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }
        }
        $response["ACL"]["quote"]=array(
            "idquote" =>  $quoteForm->get("idquote")->getOption('label'),
            "quote_status" =>  $quoteForm->get("quote_status")->getOption('label'),
        );
        $response["ACL"]["product"]=array(
            "idproduct" =>  $productForm->get("idproduct")->getOption('label'),
            "product_status" =>  $productForm->get("product_status")->getOption('label'),
        );

        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/quote/".ID_RESOURCE.'/item/'.$entity->getIdquoteitem(),
            ),
        );
        foreach($quoteitemForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idquote"){
                    if($element->getAttribute('name')!="idproduct"){
                        $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                    }
                }
            }
        }
        $quote = $entity->getQuote();
        $response["quote"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/quote/".$quote->getIdquote(),
                ),
            ),
            "idquote" => $quote->getIdquote(),
            "quote_status" => $quote->getQuoteStatus()
        );
        $product = $entity->getProduct();
        $response["product"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/contents/product/".$product->getIdproduct(),
                ),
            ),
            "idproduct" => $product->getIdproduct(),
            "product_status" => $product->getProductStatus()
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
        $quoteitemQuery = new QuoteitemQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $quoteitemQuery->getParams();
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
                            $quoteitemQuery->addOr('quoteitem'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $quoteitemQuery->addAnd('quoteitem.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $quoteitemQuery->addOr('quoteitem.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $quoteitemQuery->filterBy(BasePeer::translateFieldname('quoteitem', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $quoteitemQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $quoteitemQuery->filterByIdquote(ID_RESOURCE)->useQuoteQuery()->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item?page='.$result->getLastPage()),
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
        $quoteitemFormGET = QuoteitemFormGET::init($userLevel);
        $quoteFormGET = QuoteFormGET::init($userLevel);
        $productFormGET = ProductFormGET::init($userLevel);

        $quoteitemArray = array();
        $quoteQuery = QuoteQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $quoteitemQuery = QuoteitemQuery::create()->filterByIdquoteitem($item['idquoteitem'])->findOne();
            $item = $quoteitemQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$item['idquote'].'/item/'.$item['idquoteitem']),
                ),
            );

            foreach($quoteitemFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }


            // Solamente utilicamos estas 2 lineas en la respuesta de "product"
            $productQuery = ProductQuery::create()->filterByIdproduct($item['idproduct'])->findOne();
            $product = $productQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['product'] = array(
                "product" => array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/contents/product/'.$product['idproduct']),
                    ),
                    'idproduct' => $product['idproduct'],
                    'product_status' => $product['product_status'],
                ),
            );

            foreach($productFormGET->getElements() as $key=>$value){
                $row[$key] = $product[$key];
            }

            // Eliminamos el idproduct del quoteitem
            unset($row['idquote']);
            unset($row['idproduct']);

            array_push($quoteitemArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($quoteitemFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        //unset($acl['idquote']);
        //unset($acl['idproduct']);
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'quote' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$quoteQuery['idquote']),
                ),
                'idquote' => $quoteQuery['idquote'],
                'quote_status' => $quoteQuery['quote_status'],
            ),
            'quotes' => $quoteitemArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['quotes'] = array(
                    'quote' => $quoteitemArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $idproduct = isset($data['idproduct'])?$data['idproduct']:null;
        $idquoteitem = $data['idquoteitem'];
        //Instanciamos nuestra quoteitemQuery
        $quoteitemQuery = QuoteitemQuery::create();

        //Verificamos que el idquoteitem que se quiere modificar exista y que pretenece a la compañia
        if($quoteitemQuery->create()->filterByIdquoteitem($idquoteitem)->useQuoteQuery()->useTriggerprospectionQuery()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->endUse()->endUse()->exists()){

            //Instanciamos nuestra quoteitemQuery
            $quoteitemPKQuery = $quoteitemQuery->findPk($idquoteitem);
            $quoteitemFormToShowUpdate = QuoteitemFormToShowUpdate::init($userLevel);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $quoteitemArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Quoteitem');

            // Instanciamos el formulario quoteitemForm()
            $quoteitemForm = new QuoteitemForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro quoteitemArray
            foreach($quoteitemPKQuery as $key => $value){
                foreach($quoteitemForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($quoteitemArray[$keys])){
                            $quoteitemArray[$key] = $value;
                        }
                    }
                }
            }

            // Instanciamos nuestro objeto ProductQuery y obtenemos el idproduct del registro a actualizar
            $productQuery = ProductQuery::create()->filterByIdproduct($quoteitemPKQuery->getIdproduct())->findOne();
            $product = $productQuery->toArray(BasePeer::TYPE_FIELDNAME);
            // Insertamos el idproduct que tiene el registro por defecto a nuestro quoteitemArray
            $quoteitemArray['idproduct'] = $product['idproduct'];

            //Remplzamos los datos de la quoteitem por lo que se van a modificar
            foreach ($quoteitemArray as $key => $value){
                $quoteitemPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Si desean cambiar el idproduct
            if(isset($idproduct)){
                // Instanciamos nuestro objeto ProductQuery y obtenemos el idproduct del regustro a actualizar y validamos si pertenece a la misma compañia
                $productQueryByIdproduct = ProductQuery::create()->filterByIdproduct($idproduct)->useProductmainQuery()->filterByIdcompany($idCompany)->endUse()->findOne();
                // Si $productQueryByIdproduct tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $productQueryByIdproduct es null, entonces no pertenece a la misma compañia
                if($productQueryByIdproduct != null){
                    $productByIdproduct = $productQueryByIdproduct->toArray(BasePeer::TYPE_FIELDNAME);
                    $quoteitemArray['idproduct'] = $productByIdproduct['idproduct'];
                    $quoteitemPKQuery->setByName('idproduct', $productByIdproduct['idproduct'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid idproduct';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario QuoteitemFormPostPut
            $quoteitemFormPostPut = QuoteitemFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $quoteitemFormPostPut->setData($quoteitemArray);

            // Instanciamos nuestro filtro QuoteitemFilterPostPut
            $quoteitemFilterPostPut = new QuoteitemFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $quoteitemFormPostPut->setInputFilter($quoteitemFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($quoteitemFormPostPut->isValid()){

                //Si hay valores por modificar
                if($quoteitemPKQuery->isModified()){

                    $quoteitemPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/item/'.$quoteitemPKQuery->getIdquoteitem(),
                        ),
                    );

                    foreach ($quoteitemPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idquote']);
                    unset($bodyResponse['idproduct']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectQuote = $quoteitemPKQuery->getQuote()->toArray(BasePeer::TYPE_FIELDNAME);
                    $objectProduct = $quoteitemPKQuery->getProduct()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario quoteGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $quoteForm = QuoteFormGET::init($userLevel);
                    //Instanciamos nuestro formulario productGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $productForm = ProductFormGET::init($userLevel);

                    $quoteArray = array();
                    foreach ($quoteForm->getElements() as $key=>$value){
                        $quoteArray[$key] = $objectQuote[$key];
                    }
                    $bodyResponse['quote'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$quoteitemPKQuery->getIdquote()),
                        ),
                    );

                    //Agregamos los datos de quote a nuestro arreglo $row['_embedded']['quote']
                    foreach ($quoteArray as $key=>$value){
                        $bodyResponse['quote'][$key] = $value;
                    }

                    $bodyResponse['quote'] = array(
                        'idquote' => $bodyResponse['quote']['idquote'],
                        'quote_status' => $bodyResponse['quote']['quote_status'],
                    );

                    $productArray = array();
                    foreach ($productForm->getElements() as $key=>$value){
                        $productArray[$key] = $objectProduct[$key];
                    }
                    $bodyResponse['product'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/contents/product/'.$quoteitemPKQuery->getIdproduct()),
                        ),
                    );

                    //Agregamos los datos de product a nuestro arreglo $row['_embedded']['product']
                    foreach ($productArray as $key=>$value){
                        $bodyResponse['product'][$key] = $value;
                    }

                    $bodyResponse['product'] = array(
                        'idproduct' => $bodyResponse['product']['idproduct'],
                        'product_status' => $bodyResponse['product']['product_status'],
                    );

                    return array('status_code' => 200, 'details' => $bodyResponse);

                }else{
                    $messageArray = array();
                    foreach ($quoteitemFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($quoteitemFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idquoteitem';
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
            QuoteitemQuery::create()->filterByIdquoteitem($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
