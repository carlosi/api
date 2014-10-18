<?php

/**
 * Triggerprospectionnote.php
 * BuyBuy
 *
 * Created by Buybuy on 14/10/2014.
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
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form\TriggerprospectionnoteFormGET;
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form\TriggerprospectionnoteFormPostPut;
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Form\TriggerprospectionnoteFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Salesforce\Triggerprospectionnote\Filter\TriggerprospectionnoteFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'triggerprospectionnote' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Triggerprospectionnote extends BaseTriggerprospectionnote
{
    public function isIdValidResource($idResource,$idCompany){
        return TriggerprospectionnoteQuery::create()->filterByIdTriggerprospectionnote($idResource)->useUserQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        // validamos que el idclient que nos envian, exista y corresponda a la compañia
        $iduser = UserQuery::create()->filterByIduser($dataArray['iduser'])->filterByIdcompany($idCompany)->exists();
        $idtriggerprospection = TriggerprospectionQuery::create()->filterByIdtriggerprospection($dataArray['idtriggerprospection'])->useClientQuery()->filterByIdcompany($idCompany)->endUse()->exists();
        if($iduser){
            if($idtriggerprospection){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->setTriggerprospectionnoteDate(date("Y-m-d H:i:s"));
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedUserColumns = array();
                $user = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
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

                $allowedTriggerprospectionColumns = array();
                $triggerprospection = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("idtriggerprospection", $dataArray)){

                    //Instanciamos nuestro objeto Triggerprospection
                    $triggerprospection = $this->getTriggerprospection();

                    //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $triggerprospectionForm   = TriggerprospectionFormGET::init($userLevel);

                    foreach ($triggerprospectionForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedTriggerprospectionColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedTriggerprospectionColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto triggerprospection "this"
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
     * @param $triggerprospectionnote
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($triggerprospectionnote, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $triggerprospectionnoteArray = $triggerprospectionnote->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($triggerprospectionnoteArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/triggerprospectionnote/'.$triggerprospectionnote->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($triggerprospectionnoteArray as $triggerprospectionnoteKey => $triggerprospectionnoteValue){
            $body[$triggerprospectionnoteKey] = $triggerprospectionnoteValue; // Los datos del recurso
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
     * @return Triggerprospectionnote|Triggerprospectionnote[]|mixed
     */
    public function getEntity($id){
        $entity = TriggerprospectionnoteQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad Triggerprospectionnote en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/triggerprospectionnote/".$entity->getIdtriggerprospectionnote(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $triggerprospectionnoteForm = TriggerprospectionnoteFormGET::init($userLevel);
//        $userForm = UserFormGET::init($userLevel);
//        $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

        foreach ($triggerprospectionnoteForm->getElements() as $element){

            if($element->getAttribute('name')!="iduser"){
                if($element->getAttribute('name')!="idtriggerprospection"){
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        foreach ($triggerprospectionnoteForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
            }
        }
//        $response["ACL"]["user"]=array(
//            "iduser" =>  $userForm->get("iduser")->getOption('label'),
//            "user_nickname" =>  $userForm->get("user_nickname")->getOption('label'),
//        );

//        $response["ACL"]["triggerprospection"]=array(
//            "idtriggerprospection" =>  $triggerprospectionForm->get("idtriggerprospection")->getOption('label'),
//            "triggerprospection_date" =>  $triggerprospectionForm->get("triggerprospection_date")->getOption('label'),
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
            "user_nickname" =>  $user->getUserNickname()
        );

        $triggerprospection = $entity->getTriggerprospection();
        $response["triggerprospection"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/triggerprospection/".$triggerprospection->getIdtriggerprospection(),
                ),
            ),
            "idtriggerprospection" => $triggerprospection->getIdtriggerprospection(),
            "triggerprospection_by" =>  $triggerprospection->getTriggerprospectionBy()
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
        $triggerprospectionnoteQuery = new TriggerprospectionnoteQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $triggerprospectionnoteQuery->getParams();
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
                            $triggerprospectionnoteQuery->addOr('triggerprospectionnote.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $triggerprospectionnoteQuery->addAnd('triggerprospectionnote.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $triggerprospectionnoteQuery->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $triggerprospectionnoteQuery->addOr('triggerprospectionnote.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $triggerprospectionnoteQuery->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $triggerprospectionnoteQuery->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $triggerprospectionnoteQuery ->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $triggerprospectionnoteQuery->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $triggerprospectionnoteQuery->filterBy(BasePeer::translateFieldname('triggerprospectionnote', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $triggerprospectionnoteQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $triggerprospectionnoteQuery->useUserQuery()->filterByIdCompany($idcompany)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote'),
            'last' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso triggerprospection
        $triggerprospectionnoteFormGET = TriggerprospectionnoteFormGET::init($userLevel);
        $triggerprospectionnoteArray = array();
        foreach ($getCollection['data'] as $item){

            $triggerprospectionnoteQuery = TriggerprospectionnoteQuery::create()->filterByIdtriggerprospectionnote($item['idtriggerprospectionnote'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospectionnote/'.$item['idtriggerprospectionnote']),
                ),
            );

            foreach ($triggerprospectionnoteFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            $userQuery = UserQuery::create()->filterByIduser($item['iduser'])->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['user'] = array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/company/user/'.$user['iduser']),
                ),
                'iduser' => $user['iduser'],
                'user_nickname' => $user['user_nickname'],
            );
            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['iduser']);

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

            array_push($triggerprospectionnoteArray, $row);
        }

        // Start User //
        // Instanciamos el objeto de UserQuery
        $userQuery = $triggerprospectionnoteQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

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
        // Instanciamos el objeto de TriggerprospectionQuery
        $triggerprospectionQuery = $triggerprospectionnoteQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

        //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
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
        foreach ($triggerprospectionnoteFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el id user Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
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
            'triggerprospections' => $triggerprospectionnoteArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['triggerprospections'] = array(
                    'triggerprospection' => $triggerprospectionnoteArray
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
        //Instanciamos nuestra triggerprospectionQuery
        $triggerprospectionnoteQuery = TriggerprospectionnoteQuery::create();

        //Verificamos que el Id triggerprospectionnote que se quiere modificar exista y que pretenece a la compañia
        if($triggerprospectionnoteQuery->create()->filterByIdtriggerprospectionnote($id)->useUserQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra triggerprospectionnoteQuery
            $triggerprospectionnotePKQuery = $triggerprospectionnoteQuery->findPk($id);
            $triggerprospectionnoteFormToShowUpdate = TriggerprospectionnoteFormToShowUpdate::init($userLevel);

            // Si idclient tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['iduser'] = isset($data['iduser'])?$data['iduser']:$triggerprospectionnotePKQuery->getIduser();
            // Si idtriggerprospection tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['idtriggerprospection'] = isset($data['idtriggerprospection'])?$data['idtriggerprospection']:$triggerprospectionnotePKQuery->getIdtriggerprospection();

            $triggerprospectionnoteDataArray = $triggerprospectionnotePKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la triggerprospectionnote por lo que se van a modificar
            foreach ($data as $key => $value){
                $triggerprospectionnotePKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $triggerprospectionnoteArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Triggerprospectionnote', $triggerprospectionnoteDataArray);

            // Si desean cambiar el $iduser
            if(isset($iduser)){
                // Instanciamos nuestro objeto UserQuery y validamos si el idclient del registro a actualizar sí pertenece a la misma compañia
                $iduserQueryByIduser = UserQuery::create()->filterByIduser($iduser)->filterByIdcompany($idCompany)->findOne();
                // Si $clientQueryByIdclient tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $clientQueryByIdclient es null, entonces no pertenece a la misma compañia
                if($iduserQueryByIduser != null){
                    $userByIduser = $iduserQueryByIduser->toArray(BasePeer::TYPE_FIELDNAME);
                    // Asignamos a nuestro arreglo el valor del idclient
                    $triggerprospectionnoteArray['iduser'] = $userByIduser['iduser'];
                    // Preparamos el valor del idclient para actualizar el registro en la base de datos
                    $triggerprospectionnotePKQuery->setByName('iduser', $userByIduser['iduser'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid iduser';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Si desean cambiar el $idtriggerprospection
            if(isset($idtriggerprospection)){
                // Instanciamos nuestro objeto TriggerprospectionQuery y validamos si el idclient del registro a actualizar sí pertenece a la misma compañia
                $idtriggerprospectionQueryByIdtriggerprospection = TriggerprospectionQuery::create()->filterByIdtriggerprospection($idtriggerprospection)->useClientQuery()->filterByIdcompany($idCompany)->endUse()->findOne();
                // Si $idtriggerprospectionQueryByIdtriggerprospection tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $idtriggerprospectionQueryByIdtriggerprospection es null, entonces no pertenece a la misma compañia
                if($idtriggerprospectionQueryByIdtriggerprospection != null){
                    $triggerprospectionByIdtriggerprospection = $idtriggerprospectionQueryByIdtriggerprospection->toArray(BasePeer::TYPE_FIELDNAME);
                    // Asignamos a nuestro arreglo el valor del idclient
                    $triggerprospectionnoteArray['idtriggerprospection'] = $triggerprospectionByIdtriggerprospection['idtriggerprospection'];
                    // Preparamos el valor del idclient para actualizar el registro en la base de datos
                    $triggerprospectionnotePKQuery->setByName('idtriggerprospection', $triggerprospectionByIdtriggerprospection['idtriggerprospection'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid idtriggerprospection';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario resourceFormPostPut
            $triggerprospectionnoteFormPostPut = TriggerprospectionnoteFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $triggerprospectionnoteFormPostPut->setData($triggerprospectionnoteArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $triggerprospectionnotenoteFilterPostPut = new TriggerprospectionnoteFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $triggerprospectionnoteFormPostPut->setInputFilter($triggerprospectionnotenoteFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($triggerprospectionnoteFormPostPut->isValid()){

                //Si hay valores por modificar
                if($triggerprospectionnotePKQuery->isModified()){

                    $triggerprospectionnotePKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/'.MODULE.'/triggerprospectionnote/'.$triggerprospectionnotePKQuery->getIdtriggerprospectionnote(),
                        ),
                    );

                    foreach ($triggerprospectionnotePKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['iduser']);
                    unset($bodyResponse['idtriggerprospection']);

                    // Start Embedded User
                    $objectUser = $triggerprospectionnotePKQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);

                    $userArray = array();
                    foreach ($userForm->getElements() as $key=>$value){
                        $userArray[$key] = $objectUser[$key];
                    }
                    $bodyResponse['user'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/company/user/'.$triggerprospectionnotePKQuery->getIduser()),
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
                    // End Embedded User

                    // Start Embedded Triggerprospection
                    // Agregamos el campo embedded Triggerprospection a nuestro arreglo
                    $objectTriggerprospection = $triggerprospectionnotePKQuery->getTriggerprospection()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario triggerprospectionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $triggerprospectionForm = TriggerprospectionFormGET::init($userLevel);

                    $triggerprospectionArray = array();
                    foreach ($triggerprospectionForm->getElements() as $key=>$value){
                        $triggerprospectionArray[$key] = $objectTriggerprospection[$key];
                    }
                    $bodyResponse['triggerprospection'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$triggerprospectionnotePKQuery->getIdtriggerprospection()),
                        ),
                    );

                    // Agregamos los datos de triggerprospection a nuestro arreglo $row['_embedded']['triggerprospection']
                    foreach ($triggerprospectionArray as $key=>$value){
                        $bodyResponse['triggerprospection'][$key] = $value;
                    }

                    $bodyResponse['triggerprospection'] = array(
                        'idtriggerprospection' => $bodyResponse['triggerprospection']['idtriggerprospection'],
                        'triggerprospection_by' => $bodyResponse['triggerprospection']['triggerprospection_by'],
                    );
                    // End Embedded Triggerprospection

                    return array('status_code' => 200, 'details' => $bodyResponse);

                }else{
                    $messageArray = array();
                    foreach ($triggerprospectionnoteFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);
                }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($triggerprospectionnoteFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idtriggerprospectionnote';
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
            TriggerprospectionnoteQuery::create()->filterByIdtriggerprospectionnote($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}