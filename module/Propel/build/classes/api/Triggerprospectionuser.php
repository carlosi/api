<?php

/**
 * Triggerprospectionuser.php
 * BuyBuy
 *
 * Created by Buybuy on 14/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

////// FORMS //////
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Salesforce\Triggerprospection\Form\TriggerprospectionFormGET;

/**
 * Skeleton subclass for representing a row from the 'triggerprospectionuser' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Triggerprospectionuser extends BaseTriggerprospectionuser
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return TriggerprospectionQuery::create()
            ->filterByIdTriggerprospection($idResource)
            ->useClientQuery()
            ->filterByIdcompany($idCompany)
            ->endUse()
            ->exists();
    }

    /**
     * @param $idResourceChild
     * @param $idCompany
     * @return mixed
     */
    public function isIdValidResurceChild($idResourceChild, $idCompany){
        return UserQuery::create()
            ->filterByIduser($idResourceChild)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        $triggerprospectionuserQuery = TriggerprospectionuserQuery::create();

        $existsUserOnTriggerprospection = $triggerprospectionuserQuery->filterByIdtriggerprospection($dataArray['idtriggerprospection'])->filterByIduser($dataArray['iduser'])->exists();
        if(!$existsUserOnTriggerprospection){
            // Preparamos nuestro recurso para insertamos los datos el iduser y el idtriggerprospection en la base de datos
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey, $dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedTriggerprospectionColumns = array();

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

            //Las columnas permitidas de nuestros foreign keys
            $allowedUserColumns = array();

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("iduser", $dataArray)){

                //Instanciamos nuestro objeto Company
                $user = $this->getUser();

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
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
            //1. El objeto triggerprospectionuser "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso iduser),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto branchdepartment que va ir como __embebed = "triggerprospection" y "user"
            $bodyResponse = $this->createBodyResponse($this,array('idtriggerprospection','iduser'),array('triggerprospection' => $allowedTriggerprospectionColumns, 'user' => $allowedUserColumns),array($triggerprospection, $user));

            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);
        }else{
            $bodyResponse = "iduser ". "'".$dataArray["iduser"]."'". " already exists in the idtriggerprospection "."'".$dataArray["idtriggerprospection"]."'";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $triggerprospectionuser
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return mixed
     */
    public function createBodyResponse($triggerprospectionuser, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $triggerprospectionuserArray = $triggerprospectionuser->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($triggerprospectionuserArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        /*
        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch/department/'.$branchdepartment->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($branchdepartmentArray as $branchdepartmentKey => $branchdepartmentValue){
            $body[$branchdepartmentKey] = $branchdepartmentValue; // Los datos del recurso
        }
        */

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

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start getList ///////////
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
        $triggerprospectionuserQuery = new TriggerprospectionuserQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $triggerprospectionuserQuery->getParams();
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
                            $triggerprospectionuserQuery->addOr('user'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $triggerprospectionuserQuery->addAnd('user.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $triggerprospectionuserQuery ->useUserQuery()->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN)->endUse();
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $triggerprospectionuserQuery->addOr('user.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $triggerprospectionuserQuery->useUserQuery()->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL)->endUse();
                    }
                }
                if(isset($filter['gt'])){
                    $triggerprospectionuserQuery->useUserQuery()->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN)->endUse();
                }
                if(isset($filter['lt'])){
                    $triggerprospectionuserQuery->useUserQuery()->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN)->endUse();
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $triggerprospectionuserQuery->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $triggerprospectionuserQuery->useUserQuery()->filterBy(BasePeer::translateFieldname('user', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE)->endUse();
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $triggerprospectionuserQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $triggerprospectionuserQuery->useTriggerprospectionQuery()->filterByIdtriggerprospection(ID_RESOURCE)->endUse()->useUserQuery()->filterByIdcompany($idCompany)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.ID_RESOURCE.'/user?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.ID_RESOURCE.'/user?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.ID_RESOURCE.'/user?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.ID_RESOURCE.'/user'),
            'last' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.ID_RESOURCE.'/user?page='.$result->getLastPage()),
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
        $userFormGET = UserFormGET::init($userLevel);
        $userArray = array();
        $triggerprospectionArray = TriggerprospectionQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $triggerprospectionuserQuery = TriggerprospectionuserQuery::create()->filterByIdtriggerprospectionuser($item['idtriggerprospectionuser'])->findOne();
            $user = $triggerprospectionuserQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/company/client/'.$user['iduser']),
                ),
            );

            foreach ($userFormGET->getElements() as $key=>$value){
                $row[$key] = $user[$key];
            }

            // Eliminamos idcompany
            unset($row['idcompany']);
            unset($row['user_type']);
            unset($row['user_status']);
            array_push($userArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($userFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // eliminamos el idcompany
        unset($acl['idcompany']);
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'triggerprospection' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/triggerprospection/'.$triggerprospectionArray['idtriggerprospection']),
                ),
                'idtriggerprospection' => $triggerprospectionArray['idtriggerprospection'],
                'triggerprospection_by' => $triggerprospectionArray['triggerprospection_by'],
            ),
            'users' => $userArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['users'] = array(
                    'user' => $userArray
                );
                break;
            }
        }

        return $response;

    }
    /////////// Start getList ///////////

    /////////// Start delete ///////////
    /**
     * @param $id
     * @param $userLevel
     * @return bool
     */
    public function deleteEntity($id,$userLevel) {

        //Reglas de negocio
        if($userLevel>=4){
            TriggerprospectionuserQuery::create()->filterByIdtriggerprospectionuser($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}