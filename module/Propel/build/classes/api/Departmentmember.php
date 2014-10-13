<?php

////// FORMS //////
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\Staff\Form\StaffFormGET;
use API\REST\V1\ACL\Company\Departmentmember\Form\DepartmentmemberForm;
use API\REST\V1\ACL\Company\Departmentmember\Form\DepartmentmemberFormGET;
use API\REST\V1\ACL\Company\Departmentmember\Form\DepartmentmemberFormPostPut;

////// Filters //////
use API\REST\V1\ACL\Company\Departmentmember\Filter\DepartmentmemberFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'departmentmember' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Departmentmember extends BaseDepartmentmember
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return DepartmentQuery::create()->filterByIddepartment($idResource)->filterByIdcompany($idCompany)->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return StaffQuery::create()
            ->filterByIdstaff($idResourceChild)
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
        $userQuery = new UserQuery();
        $userQueryEntity = $userQuery->create()->filterByIduser($dataArray['iduser'])->findOne();
        $idcompany = $userQueryEntity->getIdcompany();
        if($idCompany == $idcompany){
            $departmentmemberQuery = DepartmentmemberQuery::create();
            $existsDepartmentmemberOnDepartment = $departmentmemberQuery->filterByIddepartment($dataArray['iddepartment'])->filterByIduser($dataArray['iduser'])->exists();
            if(!$existsDepartmentmemberOnDepartment){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey, $dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedDepartmentColumns = array();

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iddepartment", $dataArray)){

                    //Instanciamos nuestro objeto Company
                    $department = $this->getDepartment();

                    //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $departmentForm   = DepartmentFormGET::init($userLevel);

                    foreach ($departmentForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedDepartmentColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedDepartmentColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }

                //Las columnas permitidas de nuestros foreign keys
                $allowedUserColumns = array();

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iduser", $dataArray)){

                    //Instanciamos nuestro objeto Company
                    $user = $this->getUser();

                    //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
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
                //1. El objeto department "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto departmentmember que va ir como __embebed = "department"
                $bodyResponse = $this->createBodyResponse($this,array('iddepartment','iduser'),array('department' => $allowedDepartmentColumns, 'user' => $allowedUserColumns),array($department, $user));

                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = "idmember ". "'".$dataArray["iduser"]."'". " already exists in the iddepartment "."'".$dataArray["iddepartment"]."'";
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = "Invalid idmember.";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $departmentmember
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return mixed
     */
    public function createBodyResponse($departmentmember, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $departmentmemberArray = $departmentmember->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($departmentmemberArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

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
        $departmentmemberQuery = new DepartmentmemberQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $departmentmemberQuery->getParams();
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
                            $departmentmemberQuery->addOr('departmentmember'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $departmentmemberQuery->addAnd('departmentmember.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $departmentmemberQuery->addOr('departmentmember.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $departmentmemberQuery->filterBy(BasePeer::translateFieldname('departmentmember', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $departmentmemberQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $departmentmemberQuery->useDepartmentQuery()->filterByIdcompany($idCompany)->filterByIddepartment(ID_RESOURCE)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/member?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/member?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/member?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/member'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/member?page='.$result->getLastPage()),
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
        // Instanciamos el Formulario GET de nuestro recurso departmentmember
        $departmentmemberFormGET = DepartmentmemberFormGET::init($userLevel);
        $departmentFormGET = DepartmentFormGET::init($userLevel);
        $staffFormGET = StaffFormGET::init($userLevel);

        $departmentQuery = DepartmentQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        $departmentmemberArray = array();
        foreach ($getCollection['data'] as $item){

            $departmentmemberQuery = DepartmentmemberQuery::create()->filterByIddepartmentmember($item['iddepartmentmember'])->findOne();
            $member = $departmentmemberQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$member['iddepartment'].'/member/'.$member['iddepartmentmember']),
                ),
            );

            foreach($departmentmemberFormGET->getElements() as $key=>$value){
                $row[$key] = $member[$key];
            }

            // Solamente utilicamos estas 2 lineas en la respuesta de "member"
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
            // Eliminamos el iduser del departmentmember
            unset($row['iduser']);

            array_push($departmentmemberArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($departmentmemberFormGET->getElements() as $element){
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
            'members' => $departmentmemberArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['members'] = array(
                    'member' => $departmentmemberArray,
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start delete ///////////
    /**
     * @param $id
     * @param $userLevel
     * @return bool
     */
    public function deleteEntity($id,$userLevel) {

        //Reglas de negocio
        if($userLevel>=4){
            DepartmentmemberQuery::create()->filterByIddepartmentmember($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}