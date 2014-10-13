<?php

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Company\Staff\Form\StaffFormGET;
use API\REST\V1\ACL\Company\Staff\Form\StaffFormPostPut;
use API\REST\V1\ACL\Company\Staff\Form\StaffFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Company\Staff\Filter\StaffFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'staff' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Staff extends BaseStaff
{
    public function isIdValidResource($idResource,$idCompany){
        return StaffQuery::create()->filterByIdstaff($idResource)->useUserQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        // validamos que el iduser que nos envian, exista y corresponda a la compañia
        $iduser = UserQuery::create()->filterByIduser($dataArray['iduser'])->filterByIdcompany($idCompany)->exists();
        if($iduser){
            $iduserExist = $this->iduserExist($dataArray['iduser'], $idCompany);
            if(!$iduserExist){
                foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedUserColumns = array();
                $user = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iduser", $dataArray)){

                    //Instanciamos nuestro objeto User
                    $user = $this->getUser();

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userFormGET = UserFormGET::init($userLevel);

                    foreach ($userFormGET->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedUserColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedUserColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto staff "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "company"
                $bodyResponse = $this->createBodyResponse($this,array('iduser'),array('user' => $allowedUserColumns),array($user));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = "The iduser: '".$dataArray['iduser']."' was been assigned for other staff.";
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = 'Invalid iduser';
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $iduser
     * @param $idCompany
     * @return bool
     */
    public function iduserExist($iduser, $idCompany){
        return StaffQuery::create()->filterByIduser($iduser)->useUserQuery()->filterByIdcompany($idCompany)->endUse()->exists();
    }
    /**
     * @param $staff
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($staff, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $staffArray = $staff->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($staffArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/staff/'.$staff->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($staffArray as $staffKey => $staffValue){
            $body[$staffKey] = $staffValue; // Los datos del recurso
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

        $body[strtolower(get_class($halResource))] = array(
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
     * @return Staff|Staff[]|mixed
     */
    public function getEntity($id){
        $entity = StaffQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad staff en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/staff/".$entity->getIdstaff(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $staffForm = StaffFormGET::init($userLevel);
//        $userForm = UserFormGET::init($userLevel);

        foreach ($staffForm->getElements() as $element){
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

        $user = $entity->getUser();
        $response["user"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/user/".$user->getIduser(),
                ),
            ),
            "iduser" => $user->getIduser(),
            "user_nickname" => $user->getUsernickname()
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
        $staffQuery = new StaffQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $staffQuery->getParams();
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
                            $staffQuery->addOr('staff.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $staffQuery->addAnd('staff.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $staffQuery->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $staffQuery->addOr('staff.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $staffQuery->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $staffQuery->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $staffQuery ->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $staffQuery->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $staffQuery->filterBy(BasePeer::translateFieldname('staff', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $staffQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $staffQuery->useUserQuery()->filterByIdCompany($idcompany)->endUse()->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/staff?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/staff?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/staff?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/staff'),
            'last' => array('href' => URL_API.'/'.MODULE.'/staff?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso staff
        $staffFormGET = StaffFormGET::init($userLevel);
        $staffArray = array();
        foreach ($getCollection['data'] as $item){

            $staffQuery = StaffQuery::create()->filterByIdstaff($item['idstaff'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/staff/'.$item['idstaff']),
                ),
            );

            foreach ($staffFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            // Agregamos en la respuesta el iduser y nick_name al que pertenece el staff.
            $userQuery = UserQuery::create()->filterByIduser($item['iduser'])->findOne();
            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['user'] = array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/user/'.$user['iduser']),
                ),
                'iduser' => $user['iduser'],
                'user_nickname' => $user['user_nickname'],
            );
            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['iduser']);

            array_push($staffArray, $row);
        }

        // Start User //
        // Instanciamos el objeto de UserQuery
        $userQuery = $staffQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

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

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($staffFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
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
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'staffs' => $staffArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['staffs'] = array(
                    'staff' => $staffArray
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
        //Instanciamos nuestra staffQuery
        $staffQuery = StaffQuery::create();

        //Verificamos que el Id staff que se quiere modificar exista y que pretenece a la compañia
        if($staffQuery->create()->filterByIdstaff($id)->useUserQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestro staffQuery
            $staffPKQuery = $staffQuery->findPk($id);
            $staffFormToShowUpdate = StaffFormToShowUpdate::init($userLevel);

            // Si iduser tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['iduser'] = isset($data['iduser'])?$data['iduser']:$staffPKQuery->getIduser();

            $staffDataArray = $staffPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la staff por lo que se van a modificar
            foreach ($data as $key => $value){
                $staffPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $staffArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Staff', $staffDataArray);

            unset($staffArray['idstaff']);

            // Si desean cambiar el iduser
            if(isset($iduser)){
                // Instanciamos nuestro objeto StaffQuery y obtenemos el staff que le pertenee al iduser del regustro a actualizar y validamos si pertenece a la misma compañia
                $userQueryByIduser = UserQuery::create()->filterByIduser($iduser)->filterByIdcompany($idCompany)->findOne();
                // Si $userQueryByIduser tiene un valor, significa que si es de la misma compañia el usuario al que se desea actualizar
                // Si $userQueryByIduser es null, entonces no pertenece a la misma compañia
                if($userQueryByIduser != null){
                    $userByIduser = $userQueryByIduser->toArray(BasePeer::TYPE_FIELDNAME);
                    $staffArray['iduser'] = $userByIduser['iduser'];
                    $staffPKQuery->setByName('iduser', $userByIduser['iduser'], BasePeer::TYPE_FIELDNAME);

                }else{
                    $bodyResponse = 'Invalid iduser';
                    return array('status_code' => 409, 'details' => $bodyResponse);
                }
            }

            // Instanciamos nuestro formulario resourceFormPostPut
            $staffFormPostPut = StaffFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $staffFormPostPut->setData($staffArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $staffFilterPostPut = new StaffFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $staffFormPostPut->setInputFilter($staffFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($staffFormPostPut->isValid()){

                //Si hay valores por modificar
                if($staffPKQuery->isModified()){
                    if($data['iduser'] == $staffDataArray['iduser']){

                        $staffPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/staff/'.$staffPKQuery->getIdstaff(),
                            ),
                        );

                        foreach ($staffPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['iduser']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $objectUser = $staffPKQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $userForm = UserFormGET::init($userLevel);

                        $userArray = array();
                        foreach ($userForm->getElements() as $key=>$value){
                            $companyArray[$key] = $objectUser[$key];
                        }
                        $bodyResponse['user'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/user/'.$staffPKQuery->getIdUser()),
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


                        //Verificamos que iduser no exista ya en nuestra base de datos.
                        if($staffQuery->filterByIduser($data['iduser'])->useUserQuery()->filterByIdCompany($idCompany)->endUse()->find()->count()==0){

                            $staffPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/staff/'.$staffPKQuery->getIdstaff(),
                                ),
                            );

                            foreach ($staffPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['iduser']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectUser = $staffPKQuery->getUser()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $userForm = UserFormGET::init($userLevel);

                            $userArray = array();
                            foreach ($userForm->getElements() as $key=>$value){
                                $userArray[$key] = $objectUser[$key];
                            }
                            $bodyResponse['user'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/user/'.$staffPKQuery->getIdUser()),
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
                            $bodyResponse = "The iduser: '".$staffArray['iduser']."' was been assigned for other staff.";
                            return array('status_code' => 409, 'details' => $bodyResponse);

                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($staffFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);                 }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($staffFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idstaff';
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
            StaffQuery::create()->filterByIdstaff($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}