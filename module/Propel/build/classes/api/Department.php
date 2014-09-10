<?php

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormPostPut;
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Company\Department\Filter\DepartmentFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'department' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Department extends BaseDepartment
{
    public function isIdValidResource($idResource,$idCompany){
        return DepartmentQuery::create()->filterByIddepartment($idResource)->filterByIdcompany($idCompany)->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @param $data
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel, $data){
        if($dataArray['department_type'] == 'local'){
            // Obtenemos el idbranch
            $idbranch = isset($data['idbranch']) ? $data['idbranch'] : null;
            // Instanciamos BranchQuery
            $branchQuery = new BranchQuery();
            if($idbranch != null){
                // Si existe el idbranch dependiendo de la company a la que pertenece el usuario
                $existsBranch = $branchQuery->filterByIdbranch($data['idbranch'])->filterByIdcompany($idCompany)->exists();
                if($existsBranch){
                    // Si department_name no existe
                    if(!$this->departmentnameExist($dataArray["department_name"], $idCompany)){

                        foreach ($dataArray as $dataKey => $dataValue){
                            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                        }
                        $this->setIdcompany($idCompany);
                        $this->save();

                        //Las columnas permitidas de nuestros foreign keys
                        $allowedCompanyColumns = array();
                        $company = null;

                        //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                        if(array_key_exists("idcompany", $dataArray)){

                            //Instanciamos nuestro objeto Company
                            $company = $this->getCompany();

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $companyForm   = CompanyFormGET::init($userLevel);

                            foreach ($companyForm->getElements() as $element){
                                if($element->getOption('value_options')!=null){
                                    $allowedCompanyColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                                }else{
                                    $allowedCompanyColumns[$element->getAttribute('name')] = $element->getOption('label');
                                }
                            }
                        }
                        //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                        //1. El objeto department "this"
                        //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
                        //3. Las columnas permitidas e los foreignKeys
                        //4. el objeto company que va ir como __embebed = "company"
                        $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));
                        $branchesByIdCompany = $branchQuery->filterByIdCompany($idCompany)->find();
                        $branchesCollection = $branchesByIdCompany->getArrayCopy();
                        foreach($branchesCollection as $key => $value){
                            $key = "branch";
                            $bodyResponse[$key] = array(
                                "_links" => array(
                                    "self" => array(
                                        "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch/'.$value->getIdbranch()
                                    ),
                                ),
                                "branch_name" => $value->getBranchname()
                            );
                        }
                        $this->save();
                        return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);

                    }else{
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => "department_name ". "'".$dataArray["department_name"]."'". " already exists",
                            ),
                        );
                        return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
                    }
                }else{
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'Resource data pre-validation error',
                            'Details' => "idbranch ". "'".$data["idbranch"]."'". " not exists in your branches",
                            'More_Info' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch',
                        ),
                    );
                    return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
                }
            }else{
                // Si department_name no existe
                if(!$this->departmentnameExist($dataArray["department_name"], $idCompany)){

                    foreach ($dataArray as $dataKey => $dataValue){
                        $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                    }
                    $this->setIdcompany($idCompany);
                    $this->save();

                    //Las columnas permitidas de nuestros foreign keys
                    $allowedCompanyColumns = array();
                    $company = null;

                    //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                    if(array_key_exists("idcompany", $dataArray)){

                        //Instanciamos nuestro objeto Company
                        $company = $this->getCompany();

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $companyForm   = CompanyFormGET::init($userLevel);

                        foreach ($companyForm->getElements() as $element){
                            if($element->getOption('value_options')!=null){
                                $allowedCompanyColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                            }else{
                                $allowedCompanyColumns[$element->getAttribute('name')] = $element->getOption('label');
                            }
                        }
                    }
                    //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                    //1. El objeto department "this"
                    //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
                    //3. Las columnas permitidas e los foreignKeys
                    //4. el objeto company que va ir como __embebed = "company"
                    $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));
                    $this->save();
                    return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);

                }else{
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'Resource data pre-validation error',
                            'Details' => "department_name ". "'".$dataArray["department_name"]."'". " already exists",
                        ),
                    );
                    return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
                }
            }
        }
        if($dataArray['department_type'] == 'global'){
            // Instanciamos BranchQuery
            $branchQuery = new BranchQuery();
            $branchesByIdCompany = $branchQuery->filterByIdCompany($idCompany)->find();
            // Si department_name no existe
            if(!$this->departmentnameExist($dataArray["department_name"], $idCompany)){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->setIdcompany($idCompany);
                $this->save();

                $idbranchArray = array();
                $branchesCollection = $branchesByIdCompany->getArrayCopy();
                foreach($branchesCollection as $key => $value){
                    // Agregamos el departamento que acaba de crear en branchdepartment en todas las branches de la company.
                    $branchdepartment = new Branchdepartment();
                    $branchdepartment->setIdbranch($value->getIdbranch())
                        ->setIddepartment($this->getIddepartment())
                        ->save();
                }

                //Las columnas permitidas de nuestros foreign keys
                $allowedCompanyColumns = array();
                $company = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("idcompany", $dataArray)){

                    //Instanciamos nuestro objeto Company
                    $company = $this->getCompany();

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm   = CompanyFormGET::init($userLevel);

                    foreach ($companyForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedCompanyColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedCompanyColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto department "this"
                //2. Los elementos que van a ir como _embebed para removerlos (en este caso idcompany),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto company que va ir como __embebed = "company"
                $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));

                foreach($branchesCollection as $key => $value){
                    $bodyResponse['branch'.$key] = array(
                        "_links" => array(
                            "self" => array(
                                "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch/'.$value->getIdbranch()
                            ),
                        ),
                        "branch_name" => $value->getBranchname()
                    );
                }
                $this->save();
                return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);

            }else{
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'Resource data pre-validation error',
                        'Details' => "department_name ". "'".$dataArray["department_name"]."'". " already exists",
                    ),
                );
                return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
            }

        }
    }

    /**
     * @param $departmentname
     * @param $idCompany
     * @return bool
     */
    public function departmentnameExist($departmentname, $idCompany){
        return DepartmentQuery::create()->filterByDepartmentName($departmentname)->filterByIdcompany($idCompany)->exists();
    }

    /**
     * @param $department
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($department, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $departmentArray = $department->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($departmentArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.$department->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($departmentArray as $departmentKey => $departmentValue){
            $body[$departmentKey] = $departmentValue; // Los datos del recurso
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
            'idcompany' => $body['company']['idcompany'],
            'company_name' => $body['company']['company_name'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return Department|Department[]|mixed
     */
    public function getEntity($id){
        $entity = DepartmentQuery::create()->findPk($id);
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
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/department/".$entity->getIddepartment(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $departmentForm = DepartmentFormGET::init($userLevel);
        $companyForm = CompanyFormGET::init($userLevel);

        foreach ($departmentForm->getElements() as $element){
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
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/company/".$company->getIdcompany(),
                ),
            ),
            "idcompany" => $company->getIdcompany(),
            "company_name" => $company->getCompanyName()
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
        $departmentQuery = new DepartmentQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $departmentQuery->getParams();
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
                            $departmentQuery->addOr('department.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $departmentQuery->addAnd('department.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $departmentQuery ->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $departmentQuery->addOr('department.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $departmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $departmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $departmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $departmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $departmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $departmentQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $departmentQuery->filterByIdCompany($idcompany)->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/department?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/department?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/department?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/department'),
            'last' => array('href' => URL_API.'/'.MODULE.'/department?page='.$result->getLastPage()),
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
        $departmentFormGET = DepartmentFormGET::init($userLevel);
        $departmentArray = array();
        foreach ($getCollection['data'] as $item){

            $departmentQuery = DepartmentQuery::create()->filterByIddepartment($item['iddepartment'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/department/'.$item['iddepartment']),
                ),
            );

            foreach ($departmentFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idcompany']);

            array_push($departmentArray, $row);
        }

        // Start Company //
        // Instanciamos el objeto de CompanyQuery
        $companyQuery = $departmentQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

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
        foreach ($departmentFormGET->getElements() as $element){
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
                    'self' => array('href' => URL_API.'/company/'.$departmentQuery->getIdcompany()),
                ),
                'idcompany' => $row['idcompany'],
                'company_name' => $row['company_name'],
            ),
            'departments' => $departmentArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['departments'] = array(
                    'department' => $departmentArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){

        //Instanciamos nuestra branchQuery
        $departmentQuery = DepartmentQuery::create();

        //Verificamos que el Id department que se quiere modificar exista y que pretenece a la compañia
        if($departmentQuery->create()->filterByIdCompany($idCompany)->filterByIddepartment($id)->exists()){

            //Instanciamos nuestra DepartmentQuery
            $departmentPKQuery = $departmentQuery->findPk($id);
            $departmentFormToShowUpdate = DepartmentFormToShowUpdate::init($userLevel);

            //Si se quiere modificar el department_name
            if(isset($data['department_name']) && $data['department_name'] != null){
                //Remplzamos los datos de la branch por lo que se van a modificar
                foreach ($data as $key => $value){
                    $departmentPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
                }

                $departmentArray = HttpRequest::resourceData($data, $request, $response, 'Department');

                // Instanciamos nuestro formulario resourceFormPostPut
                $departmentFormPostPut = DepartmentFormPostPut::init($userLevel);
                //Le ponemos los datos a nuestro formulario
                $departmentFormPostPut->setData($departmentArray);

                // Instanciamos nuestro filtro resourceFilterPostPut
                $departmentFilterPostPut = new DepartmentFilterPostPut();

                //Le ponemos el filtro a nuestro formulario
                $departmentFormPostPut->setInputFilter($departmentFilterPostPut->getInputFilter($userLevel));
                //Si los valores son validos
                if($departmentFormPostPut->isValid()){

                    //Si hay valores por modificar
                    if($departmentPKQuery->isModified()){

                        //Verificamos que bankaccount_name no exista ya en nuestra base de datos.
                        if($departmentQuery->filterByIdCompany($idCompany)->filterByDepartmentName($data['department_name'])->find()->count()==0){

                            $departmentPKQuery->save();
                            //Modifiamos el Header de nuestra respuesta
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/department/'.$departmentPKQuery->getIddepartment(),
                                ),
                            );

                            foreach ($departmentPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idcompany']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectCompany = $departmentPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $companyForm = CompanyFormGET::init($userLevel);

                            $companyArray = array();
                            foreach ($companyForm->getElements() as $key=>$value){
                                $companyArray[$key] = $objectCompany[$key];
                            }
                            $bodyResponse['company'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/company/'.$departmentPKQuery->getIdCompany()),
                                ),
                            );

                            //Agregamos los datod de company a nuestro arreglo $row['_embedded'][company']
                            foreach ($companyArray as $key=>$value){
                                $bodyResponse['company'][$key] = $value;
                            }

                            $bodyResponse['company'] = array(
                                'idcompany' => $bodyResponse['company']['idcompany'],
                                'company_name' => $bodyResponse['company']['company_name'],
                            );

                            return $bodyResponse;

                        }else{

                            //Modifiamos el Header de nuestra respuesta
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                            $bodyResponse = array(
                                'Error' => array(
                                    'HTTP_Status' => 400 . ' Bad Request',
                                    'Title' => 'Resource data pre-validation error',
                                    'Details' => "department_name ". "'".$departmentArray['department_name']."'". " already exists",
                                ),
                            );
                            return $bodyResponse;
                        }
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'No changes were found',
                            ),
                        );
                        return $bodyResponse;
                    }
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                    $messageArray = array();
                    foreach ($FormPostPut->getMessages() as $key => $value){
                        foreach($value as $val){
                            //Obtenemos el valor de la columna con error
                            $message = $key.' '.$val;
                            array_push($messageArray, $message);
                        }
                    }
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = ArrayResponse::getResponseBody(400, $messageArray);
                    return $bodyResponse;
                }
                //Si el formulario no fue valido
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $messageArray = array();
                foreach ($branchFormToShowUpdate->getElements() as $key => $value){
                    //Obtenemos el nombre de la columna
                    $message = $key;
                    array_push($messageArray, $message);
                }
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP_Status' => 400 . ' Bad Request',
                        'Title' => 'No changes were found',
                        'Columns_to_do_changes' => $messageArray,
                    ),
                );
                return $bodyResponse;
            }
        }else{

            //Modifiamos el Header de nuestra respuesta
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
            $bodyResponse = array(
                'Error' => array(
                    'HTTP_Status' => 400 . ' Bad Request',
                    'Title' => 'The request data is invalid',
                    'Details' => 'Invalid idbranch',
                ),
            );
            return $bodyResponse;
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
            DepartmentQuery::create()->filterByIddepartment($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
