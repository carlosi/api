<?php

//// FORMS ////
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\Staff\Form\StaffFormGET;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderForm;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormGET;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormToShowUpdate;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Company\Departmentleader\Filter\DepartmentleaderFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'departmentleader' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Departmentleader extends BaseDepartmentleader
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return DepartmentQuery::create()->filterByIddepartment($idResource)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return DepartmentleaderQuery::create()->filterByIddepartment($idResource)
            ->filterByIddepartmentleader($idResourceChild)
            ->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @param $data
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel, $data=null){

        if(!$this->userDepartmentLeaderExist($dataArray["iduser"], $dataArray["iddepartment"], $dataArray["departmentleader_title"])){
            foreach ($dataArray as $dataKey => $dataValue){
                if($dataKey != "idstaff"){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
            }
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedDepartmentleaderColumns = array();
            $department = null;

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("iddepartment", $dataArray)){

                //Instanciamos nuestro objeto Department
                $department = $this->getDepartment();

                //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $departmentForm = DepartmentFormGET::init($userLevel);

                foreach ($departmentForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedDepartmentleaderColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedDepartmentleaderColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }

            //Las columnas permitidas de nuestros foreign keys
            $allowedStaffColumns = array();
            $staffQueryEntity = null;
            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idstaff", $dataArray)){

                //Instanciamos nuestro objeto Department
                $staffQuery = new StaffQuery();
                $staffQueryEntity = $staffQuery->create()->filterByIdstaff($dataArray['idstaff'])->findOne();

                //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $staffForm = StaffFormGET::init($userLevel);

                foreach ($staffForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedStaffColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedStaffColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }
            //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
            //1. El objeto departmentleader "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso iddepartment y idstaff),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto department y user que va ir como __embebed = "department", "staff"
            $bodyResponse = $this->createBodyResponse($this,array('iddepartment', 'idstaff'),array('department' => $allowedDepartmentleaderColumns, 'staff' => $allowedStaffColumns),array($department, $staffQueryEntity));
            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);
        }else{
            $bodyResponse = "This idstaff=".$dataArray['idstaff']." already exist as a "."'".$dataArray['departmentleader_title']."'"." in the iddepartment=".$dataArray['iddepartment'];
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $iduser
     * @param $iddepartment
     * @param $departmentleaderTitle
     * @return bool
     */
    public function userDepartmentLeaderExist($iduser, $iddepartment, $departmentleaderTitle){
        return DepartmentleaderQuery::create()->filterByIduser($iduser)->filterByIddepartment($iddepartment)->filterByDepartmentleaderTitle($departmentleaderTitle)->exists();
    }

    /**
     * @param $departmentleader
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($departmentleader, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $departmentleaderArray = $departmentleader->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($departmentleaderArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader/'.$departmentleader->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($departmentleaderArray as $departmentleaderKey => $departmentleaderValue){
            $body[$departmentleaderKey] = $departmentleaderValue; // Los datos del recurso
        }

        // Eliminamos el iduser del body de la respuesta
        unset($body['iduser']);

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

        $body['department'] = array(
            'iddepartment' => $body['department']['iddepartment'],
            'department_name' => $body['department']['department_name'],
        );
        $body['staff'] = array(
            'idstaff' => $body['staff']['idstaff'],
            'staff_name' => $body['staff']['staff_name'],
            'staff_firstname' => $body['staff']['staff_firstname'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

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
        $departmentleaderQuery = new DepartmentleaderQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $departmentleaderQuery->getParams();
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
                            $departmentleaderQuery->addOr('departmentleader'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $departmentleaderQuery->addAnd('departmentleader.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $departmentleaderQuery->addOr('departmentleader.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $departmentleaderQuery->filterBy(BasePeer::translateFieldname('departmentleader', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $departmentleaderQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $departmentleaderQuery->useDepartmentQuery()->filterByIdcompany($idCompany)->filterByIddepartment(ID_RESOURCE)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader?page='.$result->getLastPage()),
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
        // Instanciamos el Formulario GET de nuestro recurso departmentleader
        $departmentleaderFormGET = DepartmentleaderFormGET::init($userLevel);
        $departmentFormGET = DepartmentFormGET::init($userLevel);
        $staffFormGET = StaffFormGET::init($userLevel);

        $departmentQuery = DepartmentQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        $departmentleaderArray = array();
        foreach ($getCollection['data'] as $item){

            $departmentleaderQuery = DepartmentleaderQuery::create()->filterByIddepartmentleader($item['iddepartmentleader'])->findOne();
            $leader = $departmentleaderQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$leader['iddepartment'].'/leader/'.$leader['iddepartmentleader']),
                ),
            );

            foreach($departmentleaderFormGET->getElements() as $key=>$value){
                if($key != "idstaff"){
                    $row[$key] = $leader[$key];
                }
            }

            // Solamente utilicamos estas 2 lineas en la respuesta de "leader"
            $staffQuery = StaffQuery::create()->filterByIduser($item['iduser'])->findOne();
            $staff = $staffQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row['staff'] = array(
                'staff' => array(
                    '_links' => array(
                        'self' => array('href' => URL_API.'/'.MODULE.'/staff/'.$staff['idstaff']),
                    ),
                    'idstaff' => $staff['idstaff'],
                    'staff_name' => $staff['staff_name'],
                    'staff_firstname' => $staff['staff_firstname'],
                ),
            );
            // Eliminamos el iduser del departmentleader
            unset($row['iduser']);

            array_push($departmentleaderArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($departmentleaderFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        foreach ($departmentFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl['department'][$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl['department'][$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        foreach ($staffFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl['staff'][$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl['staff'][$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // Eliminamos el iddepartment del ACL
        unset($acl['iddepartment']);
        // Eliminamos el iduser del ACL
        unset($acl['iduser']);
        // Eliminamos el idstaff del ACL
        unset($acl['idstaff']);

        // Eliminamos el idcompany del ACL
        unset($acl['department']['idcompany']);
        // Eliminamos el department_type del ACL
        unset($acl['department']['department_type']);

        // Eliminamos el iduser del ACL
        unset($acl['staff']['iduser']);
        // Eliminamos el staff_email del ACL
        unset($acl['staff']['staff_email']);
        // Eliminamos el staff_email2 del ACL
        unset($acl['staff']['staff_email2']);
        // Eliminamos el staff_phone del ACL
        unset($acl['staff']['staff_phone']);
        // Eliminamos el staff_cellular del ACL
        unset($acl['staff']['staff_cellular']);
        // Eliminamos el staff_language del ACL
        unset($acl['staff']['staff_language']);
        // Eliminamos el staff_iso_codecountry del ACL
        unset($acl['staff']['staff_iso_codecountry']);
        // Eliminamos el staff_iso_codephone del ACL
        unset($acl['staff']['staff_iso_codephone']);

        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'department' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$departmentQuery['iddepartment']),
                ),
                'iddepartment' => $departmentQuery['iddepartment'],
                'department_name' => $departmentQuery['department_name'],
            ),
            'leaders' => $departmentleaderArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['leaders'] = array(
                    'leader' => $departmentleaderArray,
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $idstaff = isset($data['idstaff'])?$data['idstaff']:null;
        $iddepartmentleader = $data['iddepartmentleader'];
        //Instanciamos nuestra departmentleaderQuery
        $departmentleaderQuery = DepartmentleaderQuery::create();

        //Verificamos que el iddepartmentleader que se quiere modificar exista y que pretenece a la compañia
        if($departmentleaderQuery->create()->filterByIddepartmentleader($iddepartmentleader)->useDepartmentQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            $departmentleaderFormToShowUpdate = DepartmentleaderFormToShowUpdate::init($userLevel);

            //Instanciamos nuestra departmentleaderQuery
            $departmentleaderPKQuery = $departmentleaderQuery->findPk($iddepartmentleader);
            $departmentleader = $departmentleaderPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $departmentleaderArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Departmentleader');

            // Instanciamos el formulario departmentleaderForm()
            $departmentleaderForm = new DepartmentleaderForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro departmentleaderArray
            foreach($departmentleader as $key => $value){
                foreach($departmentleaderForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($departmentleaderArray[$keys])){
                            $departmentleaderArray[$key] = $value;
                        }
                    }
                }
            }
            // Instanciamos nuestro objeto StaffQuery y obtenemos el staff que le pertenee al iduser del regustro a actualizar
            $staffQuery = StaffQuery::create()->filterByIduser($departmentleaderPKQuery->getIduser())->findOne();
            $staff = $staffQuery->toArray(BasePeer::TYPE_FIELDNAME);
            // Insertamos el idstaff que tiene el registro por defecto a nuestro departmentleaderArray
            $departmentleaderArray['idstaff'] = $staff['idstaff'];

            //Remplzamos los datos de la departmentleader por lo que se van a modificar
            foreach ($departmentleaderArray as $key => $value){
                if($key != 'idstaff'){
                    $departmentleaderPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                }
            }

            // Si desean cambiar el idstaff
            if(isset($idstaff)){
                // Instanciamos nuestro objeto StaffQuery y obtenemos el staff que le pertenee al iduser del regustro a actualizar
                $staffQueryByIdstaff = StaffQuery::create()->filterByIdstaff($idstaff)->findOne();
                $staffByIdstaff = $staffQueryByIdstaff->toArray(BasePeer::TYPE_FIELDNAME);
                $departmentleaderArray['iduser'] = $staffByIdstaff['iduser'];
                $departmentleaderArray['idstaff'] = $staffByIdstaff['idstaff'];
            }

            // Instanciamos nuestro formulario DepartmentleaderFormPostPut
            $departmentleaderFormPostPut = DepartmentleaderFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $departmentleaderFormPostPut->setData($departmentleaderArray);

            // Instanciamos nuestro filtro DepartmentleaderFilterPostPut
            $departmentleaderFilterPostPut = new DepartmentleaderFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $departmentleaderFormPostPut->setInputFilter($departmentleaderFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($departmentleaderFormPostPut->isValid()){

                /*
                 * Si hacemos cambios pero no los valida el "isModified()"
                 */

                //Si hay valores por modificar
                if($departmentleaderPKQuery->isModified()){
                    if($data['departmentleader_title'] == $departmentleader['departmentleader_title']){

                        $departmentleaderPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader/'.$departmentleaderPKQuery->getIddepartmentleader(),
                            ),
                        );

                        foreach ($departmentleaderPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['iduser']);
                        unset($bodyResponse['iddepartment']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $objectDepartment = $departmentleaderPKQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $departmentForm = DepartmentFormGET::init($userLevel);

                        $departmentArray = array();
                        foreach ($departmentForm->getElements() as $key=>$value){
                            $departmentArray[$key] = $objectDepartment[$key];
                        }
                        $bodyResponse['department'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$departmentleaderPKQuery->getIddepartment()),
                            ),
                        );

                        //Agregamos los datod de company a nuestro arreglo $row['_embedded']['department']
                        foreach ($departmentArray as $key=>$value){
                            $bodyResponse['department'][$key] = $value;
                        }

                        $bodyResponse['department'] = array(
                            'iddepartment' => $bodyResponse['department']['iddepartment'],
                            'department_name' => $bodyResponse['department']['department_name'],
                        );

                        //Instanciamos nuestro formulario staffGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $staffForm = StaffFormGET::init($userLevel);

                        $staffArray = array();
                        foreach ($staffForm->getElements() as $key=>$value){
                            $staffArray[$key] = $staff[$key];
                        }
                        $bodyResponse['staff'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/'.MODULE.'/staff/'.$staff['idstaff']),
                            ),
                        );

                        //Agregamos los datod de company a nuestro arreglo $row['_embedded']['staff']
                        foreach ($staffArray as $key=>$value){
                            $bodyResponse['staff'][$key] = $value;
                        }

                        $bodyResponse['staff'] = array(
                            'idstaff' => $bodyResponse['staff']['idstaff'],
                            'staff_name' => $bodyResponse['staff']['staff_name'],
                            'staff_firstname' => $bodyResponse['staff']['staff_firstname'],
                        );

                        return array('status_code' => 200, 'details' => $bodyResponse);

                    }else{

                        //Verificamos que departmentleader_title no este asignado al mismo staff en al mismo deparment.
                        if(!$this->userDepartmentLeaderExist($departmentleader["iduser"], $departmentleader["iddepartment"], $data["departmentleader_title"])){

                            $departmentleaderPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader/'.$departmentleaderPKQuery->getIddepartmentleader(),
                                ),
                            );

                            foreach ($departmentleaderPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['iduser']);
                            unset($bodyResponse['iddepartment']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectDepartment = $departmentleaderPKQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $departmentForm = DepartmentFormGET::init($userLevel);

                            $departmentArray = array();
                            foreach ($departmentForm->getElements() as $key=>$value){
                                $departmentArray[$key] = $objectDepartment[$key];
                            }
                            $bodyResponse['department'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$departmentleaderPKQuery->getIddepartment()),
                                ),
                            );

                            //Agregamos los datod de company a nuestro arreglo $row['_embedded']['department']
                            foreach ($departmentArray as $key=>$value){
                                $bodyResponse['department'][$key] = $value;
                            }

                            $bodyResponse['department'] = array(
                                'iddepartment' => $bodyResponse['department']['iddepartment'],
                                'department_name' => $bodyResponse['department']['department_name'],
                            );

                            //Instanciamos nuestro formulario staffGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $staffForm = StaffFormGET::init($userLevel);

                            $staffArray = array();
                            foreach ($staffForm->getElements() as $key=>$value){
                                $staffArray[$key] = $staff[$key];
                            }
                            $bodyResponse['staff'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/'.MODULE.'/staff/'.$staff['idstaff']),
                                ),
                            );

                            //Agregamos los datod de company a nuestro arreglo $row['_embedded']['staff']
                            foreach ($staffArray as $key=>$value){
                                $bodyResponse['staff'][$key] = $value;
                            }

                            $bodyResponse['staff'] = array(
                                'idstaff' => $bodyResponse['staff']['idstaff'],
                                'staff_name' => $bodyResponse['staff']['staff_name'],
                                'staff_firstname' => $bodyResponse['staff']['staff_firstname'],
                            );

                            return array('status_code' => 200, 'details' => $bodyResponse);

                        }else{
                            $bodyResponse = "This idstaff=".$departmentleaderArray['idstaff']." already exist as a "."'".$data['departmentleader_title']."'"." in the iddepartment=".$dataArray['iddepartment'];
                            return array('status_code' => 409, 'details' => $bodyResponse);
                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($departmentleaderFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($departmentleaderFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid iddepartmentleader';
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
            ClientaddressQuery::create()->filterByIdclientaddress($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
