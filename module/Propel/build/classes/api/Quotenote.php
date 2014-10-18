<?php

/**
 * Quotenote.php
 * BuyBuy
 *
 * Created by Buybuy on 16/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// FORMS ////
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Salesforce\Quote\Form\QuoteFormGET;
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteForm;
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteFormGET;
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteFormToShowUpdate;
use API\REST\V1\ACL\Salesforce\Quotenote\Form\QuotenoteFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Salesforce\Quotenote\Filter\QuotenoteFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'quotenote' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Quotenote extends BaseQuotenote
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
        return QuotenoteQuery::create()
            ->filterByIdquotenote($idResourceChild)
            ->useUserQuery()
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
    public function saveResouce($dataArray,$idCompany,$userLevel,$data=null){
        $iduser = UserQuery::create()->filterByIduser($dataArray['iduser'])->filterByIdcompany($idCompany)->exists();
        $idquote = QuoteQuery::create()->filterByIdquote($dataArray['idquote'])->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->exists();
        if($iduser){
            if($idquote){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->setQuotenoteDate(date('Y-m-d H:i:s'));
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
                $allowedUserColumns = array();

                $user = null;
                if(array_key_exists("iduser", $dataArray)){

                    //Instanciamos nuestro objeto User
                    $user = $this->getUser();

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm   = UserFormGET::init($userLevel);

                    foreach ($userForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedUserColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedUserColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto quotenote "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso idquote y iduser),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "quote y user"
                $bodyResponse = $this->createBodyResponse($this,array('idquote', 'iduser'),array('quote' => $allowedQuoteColumns, 'user' => $allowedUserColumns),array($quote, $user));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = 'Invalid idquote';
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = 'Invalid iduser';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $quotenote
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($quotenote, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $quotenoteArray = $quotenote->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($quotenoteArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note/'.$quotenote->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($quotenoteArray as $quotenoteKey => $quotenoteValue){
            $body[$quotenoteKey] = $quotenoteValue; // Los datos del recurso
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
        $body['user'] = array(
            'iduser' => $body['user']['iduser'],
            'user_nickname' => $body['user']['user_nickname'],
        );


        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return mixed|Quotenote|Quotenote[]
     */
    public function getEntity($id){
        $entity = QuotenoteQuery::create()->findPk($id);
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
        $quotenoteForm = QuotenoteFormGET::init($userLevel);
        $quoteForm = QuoteFormGET::init($userLevel);
        $userForm = UserFormGET::init($userLevel);

        foreach($quotenoteForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                if($element->getAttribute('name')!="idquote"){
                    if($element->getAttribute('name')!="iduser"){
                        $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }
        }
        $response["ACL"]["quote"]=array(
            "idquote" =>  $quoteForm->get("idquote")->getOption('label'),
            "quote_status" =>  $quoteForm->get("quote_status")->getOption('label'),
        );
        $response["ACL"]["user"]=array(
            "iduser" =>  $userForm->get("iduser")->getOption('label'),
            "user_nickname" =>  $userForm->get("user_nickname")->getOption('label'),
        );

        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/quote/".ID_RESOURCE.'/note/'.$entity->getIdquotenote(),
            ),
        );
        foreach($quotenoteForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idquote"){
                    if($element->getAttribute('name')!="iduser"){
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
        $user = $entity->getUser();
        $response["user"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/company/user/".$user->getIduser(),
                ),
            ),
            "iduser" => $user->getIduser(),
            "user_nickname" => $user->getUserNickname()
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
        $quotenoteQuery = new QuotenoteQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $quotenoteQuery->getParams();
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
                            $quotenoteQuery->addOr('quotenote'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $quotenoteQuery->addAnd('quotenote.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $quotenoteQuery->addOr('quotenote.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $quotenoteQuery->filterBy(BasePeer::translateFieldname('quotenote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $quotenoteQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $quotenoteQuery->filterByIdquote(ID_RESOURCE)->useQuoteQuery()->useTriggerprospectionQuery()->useClientQuery()->filterByIdcompany($idCompany)->endUse()->endUse()->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note?page='.$result->getLastPage()),
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
        $quotenoteFormGET = QuotenoteFormGET::init($userLevel);
        $quoteFormGET = QuoteFormGET::init($userLevel);
        $userFormGET = UserFormGET::init($userLevel);

        $quotenoteArray = array();
        $quoteQuery = QuoteQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $quotenoteQuery = QuotenoteQuery::create()->filterByIdquotenote($item['idquotenote'])->findOne();
            $note = $quotenoteQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$note['idquote'].'/note/'.$note['idquotenote']),
                ),
            );

            foreach($quotenoteFormGET->getElements() as $key=>$value){
                $row[$key] = $note[$key];
            }


            // Solamente utilicamos estas 2 lineas en la respuesta de "user"
            $userQuery = UserQuery::create()->filterByIduser($item['iduser'])->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['user'] = array(
                "user" => array(
                    "_links" => array(
                        'self' => array('href' => URL_API.'/company/user/'.$user['iduser']),
                    ),
                    'iduser' => $user['iduser'],
                    'user_nickname' => $user['user_nickname'],
                ),
            );

            foreach($userFormGET->getElements() as $key=>$value){
                $row[$key] = $user[$key];
            }

            // Eliminamos el iduser del quotenote
            unset($row['idquote']);
            unset($row['iduser']);

            array_push($quotenoteArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($quotenoteFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        //unset($acl['idquote']);
        //unset($acl['iduser']);
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
            'quotes' => $quotenoteArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['quotes'] = array(
                    'quote' => $quotenoteArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $iduser = isset($data['iduser'])?$data['iduser']:null;
        $idquotenote = $data['idquotenote'];
        //Instanciamos nuestra quotenoteQuery
        $quotenoteQuery = QuotenoteQuery::create();

        //Verificamos que el idquotenote que se quiere modificar exista y que pretenece a la compañia
        if($quotenoteQuery->create()->filterByIdquotenote($idquotenote)->useQuoteQuery()->useTriggerprospectionQuery()->useClientQuery()->filterByIdCompany($idCompany)->endUse()->endUse()->endUse()->exists()){

            //Instanciamos nuestra quotenoteQuery
            $quotenotePKQuery = $quotenoteQuery->findPk($idquotenote);
            $quotenoteFormToShowUpdate = QuotenoteFormToShowUpdate::init($userLevel);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $quotenoteArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Quotenote');

            // Instanciamos el formulario quotenoteForm()
            $quotenoteForm = new QuotenoteForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro quotenoteArray
            foreach($quotenotePKQuery as $key => $value){
                foreach($quotenoteForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($quotenoteArray[$keys])){
                            $quotenoteArray[$key] = $value;
                        }
                    }
                }
            }
            // Instanciamos nuestro objeto UserQuery y obtenemos el iduser del registro a actualizar
            $userQuery = UserQuery::create()->filterByIduser($quotenotePKQuery->getIduser())->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);
            // Insertamos el iduser que tiene el registro por defecto a nuestro $quotenoteArray
            $quotenoteArray['iduser'] = $user['iduser'];


            //Remplzamos los datos de la quotenote por lo que se van a modificar
            foreach ($quotenoteArray as $key => $value){
                $quotenotePKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Si desean cambiar el idstaff
            if(isset($iduser)){
                // Instanciamos nuestro objeto UserQuery y obtenemos el iduser del registro a actualizar y validamos si pertenece a la misma compañia
                $userQueryByIduser = UserQuery::create()->filterByIduser($iduser)->filterByIdcompany($idCompany)->findOne();
                // Si $userQueryByIduser tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $userQueryByIduser es null, entonces no pertenece a la misma compañia
                if($userQueryByIduser != null){
                    $userByIduser = $userQueryByIduser->toArray(BasePeer::TYPE_FIELDNAME);
                    $quotenoteArray['iduser'] = $userByIduser['iduser'];
                    $quotenotePKQuery->setByName('iduser', $userByIduser['iduser'], BasePeer::TYPE_FIELDNAME);
                }else{
                    $bodyResponse = 'Invalid iduser';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario QuotenoteFormPostPut
            $quotenoteFormPostPut = QuotenoteFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $quotenoteFormPostPut->setData($quotenoteArray);

            // Instanciamos nuestro filtro QuotenoteFilterPostPut
            $quotenoteFilterPostPut = new QuotenoteFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $quotenoteFormPostPut->setInputFilter($quotenoteFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($quotenoteFormPostPut->isValid()){

                //Si hay valores por modificar
                if($quotenotePKQuery->isModified()){

                    $quotenotePKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/quote/'.ID_RESOURCE.'/note/'.$quotenotePKQuery->getIdquotenote(),
                        ),
                    );

                    foreach ($quotenotePKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idquote']);
                    unset($bodyResponse['iduser']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectQuote = $quotenotePKQuery->getQuote()->toArray(BasePeer::TYPE_FIELDNAME);
                    $objectUser = $quotenotePKQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario quoteGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $quoteForm = QuoteFormGET::init($userLevel);
                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);

                    $quoteArray = array();
                    foreach ($quoteForm->getElements() as $key=>$value){
                        $quoteArray[$key] = $objectQuote[$key];
                    }
                    $bodyResponse['quote'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/quote/'.$quotenotePKQuery->getIdquote()),
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

                    $userArray = array();
                    foreach ($userForm->getElements() as $key=>$value){
                        $userArray[$key] = $objectUser[$key];
                    }
                    $bodyResponse['user'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/company/user/'.$quotenotePKQuery->getIduser()),
                        ),
                    );

                    //Agregamos los datos de user a nuestro arreglo $row['_embedded']['user']
                    foreach ($userArray as $key=>$value){
                        $bodyResponse['user'][$key] = $value;
                    }

                    $bodyResponse['user'] = array(
                        'iduser' => $bodyResponse['user']['iduser'],
                        'user_nickname' => $bodyResponse['user']['user_nickname'],
                    );

                    return array('status_code' => 200, 'details' => $bodyResponse);

                }else{
                    $messageArray = array();
                    foreach ($quotenoteFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($quotenoteFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idquotenote';
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
            QuotenoteQuery::create()->filterByIdquotenote($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
