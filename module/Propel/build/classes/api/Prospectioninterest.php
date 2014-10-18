<?php

/**
 * Prospectioninterest.php
 * BuyBuy
 *
 * Created by Buybuy on 17/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormGET;
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestForm;
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestFormGET;
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestFormPostPut;
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Form\ProspectioninterestFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Salesforce\Prospectioninterest\Filter\ProspectioninterestFilterPostPut;


/**
 * Skeleton subclass for representing a row from the 'prospectioninterest' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Prospectioninterest extends BaseProspectioninterest
{
    public function isIdValidResource($idResource,$idCompany){
        return ProspectioninterestQuery::create()->filterByIdprospectioninterest($idResource)->useUserQuery()->filterByIdcompany($idCompany)->endUse()->exists();
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
        $iduser = UserQuery::create()->filterByIduser($dataArray['iduser'])->filterByIdcompany($idCompany)->exists();
        $idtriggerprospection = TriggerprospectionQuery::create()->filterByIdtriggerprospection($dataArray['idtriggerprospection'])->useClientQuery()->filterByIdcompany($idCompany)->endUse()->exists();
        if($iduser){
            if($idtriggerprospection){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->setProspectioninterestDate(date("Y-m-d H:i:s"));
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedUserColumns = array();
                $user = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iduser", $dataArray)){

                    //Instanciamos nuestro objeto User
                    $user = $this->getUser();

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);

                    foreach ($userForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedUserColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedUserColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Las columnas permitidas de nuestros foreign keys
                $allowedTriggerprospectionColumns = array();
                $triggerprospection = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("idtriggerprospection", $dataArray)){

                    //Instanciamos nuestro objeto User
                    $triggerprospection = $this->getTriggerprospection();

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
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
                //1. El objeto user "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso iduser y idtriggerprospection),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "user y triggerprospection"
                $bodyResponse = $this->createBodyResponse($this,array('iduser', 'idtriggerprospection'),array('user' => $allowedUserColumns, 'triggerprospection' => $allowedTriggerprospectionColumns),array($user, $triggerprospection));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = 'Invalid idtriggerprospection';
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = 'Invalid iduser';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $prospectioninterest
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($prospectioninterest, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $prospectioninterestArray = $prospectioninterest->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($prospectioninterestArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/prospectioninterest/'.$prospectioninterest->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($prospectioninterestArray as $prospectioninterestKey => $prospectioninterestValue){
            $body[$prospectioninterestKey] = $prospectioninterestValue; // Los datos del recurso
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

        $body['user'] = array(
            'iduser' => $body['user']['iduser'],
            'user_nickname' => $body['user']['user_nickname'],
        );
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
     * @return Prospectioninterest|Prospectioninterest[]|mixed
     */
    public function getEntity($id){
        $entity = ProspectioninterestQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad prospectioninterest en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/prospectioninterest/".$entity->getIdprospectioninterest(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $prospectioninterestForm = ProspectioninterestFormGET::init($userLevel);
//        $userForm = UserFormGET::init($userLevel);
//        $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

        foreach ($prospectioninterestForm->getElements() as $element){
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
//        $response["ACL"]["user"]=array(
//            "iduser" =>  $userForm->get("iduser")->getOption('label'),
//            "user_nickname" =>  $userForm->get("user_nickname")->getOption('label'),
//        );
//        $response["ACL"]["triggerprospection"]=array(
//            "idtriggerprospection" =>  $triggerprospectionForm->get("idtriggerprospection")->getOption('label'),
//            "triggerprospection_by" =>  $triggerprospectionForm->get("triggerprospection_by")->getOption('label'),
//        );

        $user = $entity->getUser();
        $response["user"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/company/user/".$user->getIduser(),
                ),
            ),
            "iduser" => $user->getIduser(),
            "user_nickname" => $user->getUserNickName()
        );
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
        unset($response['iduser']);
        unset($response['idtriggerprospection']);

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
        $prospectioninterestQuery = new ProspectioninterestQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $prospectioninterestQuery->getParams();
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
                            $prospectioninterestQuery->addOr('prospectioninterest.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $prospectioninterestQuery->addAnd('prospectioninterest.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $prospectioninterestQuery->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $prospectioninterestQuery->addOr('prospectioninterest.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $prospectioninterestQuery->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $prospectioninterestQuery->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $prospectioninterestQuery ->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $prospectioninterestQuery->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $prospectioninterestQuery->filterBy(BasePeer::translateFieldname('prospectioninterest', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $prospectioninterestQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $prospectioninterestQuery->useUserQuery()->filterByIdCompany($idcompany)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest'),
            'last' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso prospectioninterest
        $prospectioninterestFormGET = ProspectioninterestFormGET::init($userLevel);
        $prospectioninterestArray = array();
        foreach ($getCollection['data'] as $item){

            $prospectioninterestQuery = ProspectioninterestQuery::create()->filterByIdprospectioninterest($item['idprospectioninterest'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/prospectioninterest/'.$item['idprospectioninterest']),
                ),
            );

            foreach ($prospectioninterestFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            // Solamente utilicamos estas 2 lineas en la respuesta de "leader"
            $userQuery = UserQuery::create()->filterByIduser($item['iduser'])->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['user'] = array(
                'user' => array(
                    '_links' => array(
                        'self' => array('href' => URL_API.'/company/user/'.$user['iduser']),
                    ),
                    'iduser' => $user['iduser'],
                    'user_nickname' => $user['user_nickname'],
                ),
            );

            // Solamente utilicamos estas 2 lineas en la respuesta de "leader"
            $triggerprospectionQuery = TriggerprospectionQuery::create()->filterByIdtriggerprospection($item['idtriggerprospection'])->findOne();
            $triggerprospection = $triggerprospectionQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['triggerprospection'] = array(
                'triggerprospection' => array(
                    '_links' => array(
                        'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$triggerprospection['idtriggerprospection']),
                    ),
                    'idtriggerprospection' => $triggerprospection['idtriggerprospection'],
                    'triggerprospection_by' => $triggerprospection['triggerprospection_by'],
                ),
            );

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['iduser']);
            unset($row['idtriggerprospection']);

            array_push($prospectioninterestArray, $row);
        }

        // Start User //
        // Instanciamos el objeto de UserQuery
        $userQuery = $prospectioninterestQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $userFormGET = UserFormGET::init($userLevel);

        $userArray = array();
        foreach ($userFormGET->getElements() as $key=>$value){
            $userArray[$key] = $userQuery[$key];
        }

        //Agregamos los datos de user a nuestro arreglo $row['user']
        foreach ($userArray as $key=>$value){
            $row[$key] = $value;
        }
        // End User //

        // Start Triggerprospection //
        // Instanciamos el objeto de UserQuery
        $triggerprospectionQuery = $prospectioninterestQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
        $triggerprospectionFormGET = triggerprospectionFormGET::init($userLevel);

        $triggerprospectionArray = array();
        foreach ($triggerprospectionFormGET->getElements() as $key=>$value){
            $triggerprospectionArray[$key] = $triggerprospectionQuery[$key];
        }

        //Agregamos los datos de triggerprospection a nuestro arreglo $row['triggerprospection']
        foreach ($userArray as $key=>$value){
            $row[$key] = $value;
        }
        // End User //

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($prospectioninterestFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el iduser Si es visible y lo agregamos como embbeded toda la informacion de user a la que tiene visible el usuario
        if(key_exists('iduser',$acl)){
            unset($acl['iduser']);
            $userColumns = array();
            foreach ($userFormGET->getElements() as $element){
                $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
            }
            // Mostramos las columnas que son relevantes a la respuesta:
            $userColumns = array(
                'iduser' => $userColumns['iduser'],
                'user_nickname' => $userColumns['user_nickname'],
            );
            $acl['user'] = $userColumns;
        }
        //Eliminamos el idtriggerprospection Si es visible y lo agregamos como embbeded toda la informacion de triggerprospection a la que tiene visible el usuario
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
            'prospectioninterests' => $prospectioninterestArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['prospectioninterests'] = array(
                    'prospectioninterest' => $prospectioninterestArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){

        $iduser = isset($data['iduser'])?$data['iduser']:null;
        $idtriggerprospection = isset($data['idtriggerprospection'])?$data['idtriggerprospection']:null;
        //Instanciamos nuestra ProspectioninterestQuery
        $prospectioninterestQuery = ProspectioninterestQuery::create();

        //Verificamos que el idprospectioninterest que se quiere modificar exista y que pretenece a la compañia
        if($prospectioninterestQuery->create()->filterByIdprospectioninterest($id)->useUserQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra prospectioninterestQuery
            $prospectioninterestPKQuery = $prospectioninterestQuery->findPk($id);
            $prospectioninterestFormToShowUpdate = ProspectioninterestFormToShowUpdate::init($userLevel);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $prospectioninterestArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Prospectioninterest');

            // Instanciamos el formulario prospectioninterestForm()
            $prospectioninterestForm = new ProspectioninterestForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro prospectioninterestArray
            foreach($prospectioninterestPKQuery as $key => $value){
                foreach($prospectioninterestForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($prospectioninterestArray[$keys])){
                            $prospectioninterestArray[$key] = $value;
                        }
                    }
                }
            }

            // Instanciamos nuestro objeto UserQuery y obtenemos el idproduct del registro a actualizar
            $userQuery = UserQuery::create()->filterByIduser($prospectioninterestPKQuery->getIduser())->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);
            // Insertamos el iduser que tiene el registro por defecto a nuestro prospectioninterestArray
            $prospectioninterestArray['iduser'] = $user['iduser'];

            // Instanciamos nuestro objeto triggerprospectionQuery y obtenemos el idproduct del registro a actualizar
            $triggerprospectionQuery = TriggerprospectionQuery::create()->filterByIdtriggerprospection($prospectioninterestPKQuery->getIdtriggerprospection())->findOne();
            $triggerprospection = $triggerprospectionQuery->toArray(BasePeer::TYPE_FIELDNAME);
            // Insertamos el idtriggerprospection que tiene el registro por defecto a nuestro prospectioninterestArray
            $prospectioninterestArray['idtriggerprospection'] = $triggerprospection['idtriggerprospection'];

            //Remplzamos los datos de la prospectioninterest por lo que se van a modificar
            foreach ($prospectioninterestArray as $key => $value){
                $prospectioninterestPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Si desean cambiar el iduser
            if(isset($iduser)){
                // Instanciamos nuestro objeto UserQuery y obtenemos el iduser del regustro a actualizar y validamos si pertenece a la misma compañia
                $userQueryByIduser = UserQuery::create()->filterByIduser($iduser)->filterByIdcompany($idCompany)->findOne();
                // Si $userQueryByIduser tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $userQueryByIduser es null, entonces no pertenece a la misma compañia
                if($userQueryByIduser != null){
                    $userByIduser = $userQueryByIduser->toArray(BasePeer::TYPE_FIELDNAME);
                    $prospectioninterestArray['iduser'] = $userByIduser['iduser'];
                    $prospectioninterestPKQuery->setByName('iduser', $userByIduser['iduser'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid iduser';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }
            // Si desean cambiar el idtriggerprospection
            if(isset($idtriggerprospection)){
                // Instanciamos nuestro objeto ProductQuery y obtenemos el idproduct del regustro a actualizar y validamos si pertenece a la misma compañia
                $triggerprospectionQueryByIdtriggerprospection = TriggerprospectionQuery::create()->filterByIdtriggerprospection($idtriggerprospection)->useClientQuery()->filterByIdcompany($idCompany)->endUse()->findOne();
                // Si $triggerprospectionQueryByIdtriggerprospection tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $triggerprospectionQueryByIdtriggerprospection es null, entonces no pertenece a la misma compañia
                if($triggerprospectionQueryByIdtriggerprospection != null){
                    $triggerprospectionByIdtriggerprospection = $triggerprospectionQueryByIdtriggerprospection->toArray(BasePeer::TYPE_FIELDNAME);
                    $prospectioninterestArray['idtriggerprospection'] = $triggerprospectionByIdtriggerprospection['idtriggerprospection'];
                    $prospectioninterestPKQuery->setByName('idtriggerprospection', $triggerprospectionByIdtriggerprospection['idtriggerprospection'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid idtriggerprospection';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario ProspectioninterestFormPostPut
            $prospectioninterestFormPostPut = ProspectioninterestFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $prospectioninterestFormPostPut->setData($prospectioninterestArray);

            // Instanciamos nuestro filtro ProspectioninterestFilterPostPut
            $prospectioninterestFilterPostPut = new ProspectioninterestFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $prospectioninterestFormPostPut->setInputFilter($prospectioninterestFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($prospectioninterestFormPostPut->isValid()){

                //Si hay valores por modificar
                if($prospectioninterestPKQuery->isModified()){

                    $prospectioninterestPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/prospectioninterest/'.$prospectioninterestPKQuery->getIdprospectioninterest(),
                        ),
                    );

                    foreach ($prospectioninterestPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['iduser']);
                    unset($bodyResponse['idtriggerprospection']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectUser = $prospectioninterestPKQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);
                    $objectTriggerprospection = $prospectioninterestPKQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);
                    //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

                    $userArray = array();
                    foreach ($userForm->getElements() as $key=>$value){
                        $userArray[$key] = $objectUser[$key];
                    }
                    $bodyResponse['user'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/company/user/'.$prospectioninterestPKQuery->getIduser()),
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

                    $triggerprospectionArray = array();
                    foreach ($triggerprospectionForm->getElements() as $key=>$value){
                        $triggerprospectionArray[$key] = $objectTriggerprospection[$key];
                    }
                    $bodyResponse['triggerprospection'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$prospectioninterestPKQuery->getIdtriggerprospection()),
                        ),
                    );

                    //Agregamos los datos de product a nuestro arreglo $row['_embedded']['product']
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
                    foreach ($prospectioninterestFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($prospectioninterestFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idprospectioninterest';
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
            ProspectioninterestQuery::create()->filterByIdprospectioninterest($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}