<?php

////// FORMS //////
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\Branch\Form\BranchFormGET;
use API\REST\V1\ACL\Company\Branchdepartment\Form\BranchdepartmentForm;
use API\REST\V1\ACL\Company\Branchdepartment\Form\BranchdepartmentFormPostPut;

////// Filters //////
use API\REST\V1\ACL\Company\Branchdepartment\Filter\BranchdepartmentFilterPostPut;

class Branchdepartment extends BaseBranchdepartment
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return BranchQuery::create()->filterByIdbranch($idResource)->filterByIdcompany($idCompany)->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    // Esta funcion podría llamarse isIdValidRelational
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return BranchdepartmentQuery::create()->filterByIdbranch($idResource)
            ->filterByIddepartment($idResourceChild)->exists();
    }

    /**
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceAlternative($idResourceChild){
        return DepartmentQuery::create()
            ->filterByIddepartment($idResourceChild)
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

        $branchdepartmentQuery = BranchdepartmentQuery::create();

        $existsDepartmentOnBranch = $branchdepartmentQuery->filterByIdbranch($dataArray['idbranch'])->filterByIddepartment($dataArray['iddepartment'])->exists();
        if(!$existsDepartmentOnBranch){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey, $dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedCompanyColumns = array();

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idbranch", $dataArray)){

                //Instanciamos nuestro objeto Company
                $branch = $this->getBranch();

                //Instanciamos nuestro formulario branchGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $branchForm   = BranchFormGET::init($userLevel);

                foreach ($branchForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedBranchColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedBranchColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }

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

            //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
            //1. El objeto branch "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto branch que va ir como __embebed = "branch"
            $bodyResponse = $this->createBodyResponse($this,array('idbranch','iddepartment'),array('branch' => $allowedBranchColumns, 'department' => $allowedDepartmentColumns),array($branch, $department));

            $this->save();
            return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);
        }else{
            $bodyResponse = array(
                'Error' => array(
                    'HTTP_Status' => 400 . ' Bad Request',
                    'Title' => 'Resource data pre-validation error',
                    'Details' => "iddepartment ". "'".$dataArray["iddepartment"]."'". " already exists in the idbranch "."'".$dataArray["idbranch"]."'",
                ),
            );
            return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
        }
    }

    /**
     * @param $branchdepartment
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($branchdepartment, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $branchdepartmentArray = $branchdepartment->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($branchdepartmentArray[$element]);
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

    /////////// Start get /////////////
    /**
     * @param $id
     * @return Department|Department[]|mixed
     */
    public function getEntity($id){
        return DepartmentQuery::create()->findPk($id);
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad branch en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);
        $branchArray = BranchQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/branch/".$branchArray['idbranch']."/department/".$entityArray['iddepartment'],
                ),
            ),
        );

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $departmentForm = DepartmentFormGET::init($userLevel);

        foreach ($departmentForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                //$response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    //$response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        //Los datos de la entidad
        $response["branch"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/branch/".$branchArray['idbranch'],
                ),
            ),
            "idbranch" => $branchArray['idbranch'],
            "branch_name" => $branchArray['branch_name']
        );

        foreach ($departmentForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response['department'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response['department'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }

        //var_dump($response);
        return $response;
    }
    /////////// Start get ///////////

    /////////// Start getList ///////////
    /**
     * @param $idResource
     * @param $idCompany
     * @param $page
     * @param $limit
     * @param $filters
     * @param $order
     * @param $dir
     * @return array
     */
    public function getCollection($idCompany, $page, $limit, $filters, $order, $dir){
        $branchdepartmentQuery = new BranchdepartmentQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $branchdepartmentQuery->getParams();
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
                            $branchdepartmentQuery->addOr('department'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $branchdepartmentQuery->addAnd('department.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $branchdepartmentQuery ->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN)->endUse();
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $branchdepartmentQuery->addOr('department.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL)->endUse();
                    }
                }
                if(isset($filter['gt'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN)->endUse();
                }
                if(isset($filter['lt'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN)->endUse();
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $branchdepartmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE)->endUse();
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $branchdepartmentQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $branchdepartmentQuery->useBranchQuery()->filterByIdcompany($idCompany)->filterByIdbranch(ID_RESOURCE)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/branch/'.ID_RESOURCE.'/department?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/branch/'.ID_RESOURCE.'/department?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/branch/'.ID_RESOURCE.'/department?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/branch/'.ID_RESOURCE.'/department'),
            'last' => array('href' => URL_API.'/'.MODULE.'/branch/'.ID_RESOURCE.'/department?page='.$result->getLastPage()),
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
        $departmentFormGET = DepartmentFormGET::init($userLevel);
        $departmentArray = array();
        $branchArray = BranchQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $branchDepartmentQuery = BranchdepartmentQuery::create()->filterByIdbranchdepartment($item['idbranchdepartment'])->findOne();
            $department = $branchDepartmentQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/department/'.$department['iddepartment']),
                ),
            );

            foreach ($departmentFormGET->getElements() as $key=>$value){
                $row[$key] = $department[$key];
            }

            array_push($departmentArray, $row);
        }

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
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'branch' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/branch/'.$branchArray['idbranch']),
                ),
                'idbranch' => $branchArray['idbranch'],
                'branch_name' => $branchArray['branch_name'],
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
    /////////// Start getList ///////////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        //Instanciamos nuestra branchdepartmentQuery
        $branchdepartmentQuery = BranchdepartmentQuery::create();
        $branchdepartmentData = $branchdepartmentQuery->filterByIdbranch($data['idbranch'])->filterByIddepartment($data['iddepartment'])->find();
        $branchdepartmentArray = $branchdepartmentData->getArrayCopy('idbranchdepartment');

        // Obtenemos el idbranchdepartment que se desea modificar
        $idbranchdepartment = (key($branchdepartmentArray));

        //Verificamos que el Id branch que se quiere modificar exista y que pretenece a la compañia
        if($branchdepartmentQuery->create()->filterByIdbranchdepartment($idbranchdepartment)->useBranchQuery()->filterByIdCompany($idCompany)->endUse()->exists()){

            //Instanciamos nuestra branchQuery
            $branchdepartmentPkQuery = $branchdepartmentQuery->findPk($idbranchdepartment);

            //Remplzamos los datos de la branchdepartment por lo que se van a modificar
            foreach ($data as $key => $value){
                $branchdepartmentPkQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Instanciamos el Formulario "resourceForm"
            $resourceForm = new BranchdepartmentForm();

            // Obtenemos los elementos del Formulario "resourceForm"
            $elementsForm = $resourceForm->getElements();

            // Recorremos los elementos de nuestro formulario y le insertamos los valores a $dataArray
            if($data != null){
                $dataArray = array();
                foreach($elementsForm as $key=>$value){
                    $dataArray[$key] = isset($data[$key]) ? $data[$key] : null;
                }
            }

            $branchdepartmentArray = array();
            foreach($elementsForm as $key=>$value){
                $branchdepartmentArray[$key] = isset($dataArray[$key]) ? $dataArray[$key] : null;
            }

            // Instanciamos nuestro formulario resourceFormPostPut
            $branchdepartmentFormPostPut = BranchdepartmentFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $branchdepartmentFormPostPut->setData($branchdepartmentArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $branchdepartmentFilterPostPut = new BranchdepartmentFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $branchdepartmentFormPostPut->setInputFilter($branchdepartmentFilterPostPut->getInputFilter($userLevel));
            // Si los valores son validos
            if($branchdepartmentFormPostPut->isValid()){

                // Si hay valores por modificar
                if($branchdepartmentPkQuery->isModified()){

                    // Verificamos que iddepartment no exista ya en el idbranch de nuestro recurso.
                    if($branchdepartmentQuery->filterByIdbranch($data['idbranch'])->filterByIddepartment($data['iddepartment'])->useBranchQuery()->filterByIdCompany($idCompany)->endUse()->find()->count()==1){

                        $branchdepartmentPkQuery->save();
                        // Modifiamos el Header de nuestra respuesta
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                        // Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/branchdepartment/'.$branchdepartmentPkQuery->getIdbranchdepartment(),
                            ),
                        );

                        foreach ($branchdepartmentPkQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        // Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idbranch']);
                        unset($bodyResponse['iddepartment']);

                        // Agregamos el campo embedded a nuestro arreglo
                        $objectBranch = $branchdepartmentPkQuery->getBranch()->toArray(BasePeer::TYPE_FIELDNAME);
                        $objectDepartment = $branchdepartmentPkQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

                        // Instanciamos nuestro formulario branchGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $branchForm = BranchFormGET::init($userLevel);
                        // Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $departmentForm = DepartmentFormGET::init($userLevel);

                        $branchArray = array();
                        foreach ($branchForm->getElements() as $key=>$value){
                            $branchArray[$key] = $objectBranch[$key];
                        }
                        $departmentArray = array();
                        foreach ($branchForm->getElements() as $key=>$value){
                            $departmentArray[$key] = $objectDepartment[$key];
                        }

                        $bodyResponse['branch'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/company/branch/'.$branchdepartmentPkQuery->getIdbranch()),
                            ),
                        );
                        $bodyResponse['department'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/company/department/'.$branchdepartmentPkQuery->getIddepartament()),
                            ),
                        );

                        //Agregamos los datos de branch a nuestro arreglo $row['branch']
                        foreach ($branchArray as $key=>$value){
                            $bodyResponse['branch'][$key] = $value;
                        }
                        //Agregamos los datos de department a nuestro arreglo $row['department']
                        foreach ($departmentArray as $key=>$value){
                            $bodyResponse['department'][$key] = $value;
                        }

                        $bodyResponse['department'] = array(
                            'iddepartment' => $bodyResponse['department']['iddepartment'],
                            'department_name' => $bodyResponse['department']['department_name'],
                        );

                        return $bodyResponse;

                    }else{

                        //Modifiamos el Header de nuestra respuesta
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => "the iddepartment ". "'".$branchdepartmentArray['iddepartment']."'". " already exists in the idbranch ". "'".$branchdepartmentArray['idbranch'],
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
                $bodyResponse = JSonResponse::getResponseBody(400, $messageArray);
                return $bodyResponse;
            }
        }else{

            //Modifiamos el Header de nuestra respuesta
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
            $bodyResponse = array(
                'Error' => array(
                    'HTTP_Status' => 400 . ' Bad Request',
                    'Title' => 'Resource data pre-validation error',
                    'Details' => "iddepartment ". "'".$data["iddepartment"]."'". " not exists in the idbranch "."'".$data["idbranch"]."'",
                ),
            );
            return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
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
            BranchdepartmentQuery::create()->filterByIdbranchdepartment($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}