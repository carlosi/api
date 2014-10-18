<?php

/**
 * Branch.php
 * BuyBuy
 *
 * Created by Buybuy on 13/10/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\Company\Branch\Form\BranchFormGET;
use API\REST\V1\ACL\Company\Branch\Form\BranchFormPostPut;
use API\REST\V1\ACL\Company\Branch\Form\BranchFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Company\Branch\Filter\BranchFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'branch' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Branch extends BaseBranch
{
    public function isIdValidResource($idResource,$idCompany){
        return BranchQuery::create()->filterByIdbranch($idResource)->filterByIdcompany($idCompany)->exists();
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

        if(!$this->branchnameExist($dataArray["branch_name"], $idCompany)){
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
            //1. El objeto branch "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto company que va ir como __embebed = "company"
            $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));
            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);

        }else{
            $bodyResponse = "branch_name ". "'".$dataArray["branch_name"]."'". " already exists";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $branchname
     * @param $idCompany
     * @return bool
     */
    public function branchnameExist($branchname, $idCompany){
        return BranchQuery::create()->filterByBranchName($branchname)->filterByIdcompany($idCompany)->exists();
    }

    /**
     * @param $branch
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($branch, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $branchArray = $branch->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($branchArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/branch/'.$branch->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($branchArray as $branchKey => $branchValue){
            $body[$branchKey] = $branchValue; // Los datos del recurso
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
     * @return Branch|Branch[]|mixed
     */
    public function getEntity($id){
        $entity = BranchQuery::create()->findPk($id);
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
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/branch/".$entity->getIdbranch(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $branchForm = BranchFormGET::init($userLevel);
//        $companyForm = CompanyFormGET::init($userLevel);

        foreach ($branchForm->getElements() as $element){
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
//        $response["ACL"]["company"]=array(
//            "idcompany" =>  $companyForm->get("idcompany")->getOption('label'),
//            "company_name" =>  $companyForm->get("company_name")->getOption('label'),
//        );

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
        $branchQuery = new BranchQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $branchQuery->getParams();
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
                            $branchQuery->addOr('branch.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $branchQuery->addAnd('branch.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $branchQuery->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $branchQuery->addOr('branch.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $branchQuery->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $branchQuery->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $branchQuery ->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $branchQuery->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $branchQuery->filterBy(BasePeer::translateFieldname('branch', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $branchQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $branchQuery->filterByIdCompany($idcompany)->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/branch?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/branch?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/branch?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/branch'),
            'last' => array('href' => URL_API.'/'.MODULE.'/branch?page='.$result->getLastPage()),
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
        $branchFormGET = BranchFormGET::init($userLevel);
        $branchArray = array();
        foreach ($getCollection['data'] as $item){

            $branchQuery = BranchQuery::create()->filterByIdbranch($item['idbranch'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/branch/'.$item['idbranch']),
                ),
            );

            foreach ($branchFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idcompany']);

            array_push($branchArray, $row);
        }

        // Start Company //
        // Instanciamos el objeto de CompanyQuery
        $companyQuery = $branchQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

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
        foreach ($branchFormGET->getElements() as $element){
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
                    'self' => array('href' => URL_API.'/company/'.$branchQuery->getIdcompany()),
                ),
                'idcompany' => $row['idcompany'],
                'company_name' => $row['company_name'],
            ),
            'branches' => $branchArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['branches'] = array(
                    'branch' => $branchArray
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
        $branchQuery = BranchQuery::create();

        //Verificamos que el Id branch que se quiere modificar exista y que pretenece a la compañia
        if($branchQuery->create()->filterByIdCompany($idCompany)->filterByIdbranch($id)->exists()){

            //Instanciamos nuestra branchQuery
            $branchPKQuery = $branchQuery->findPk($id);
            $branchFormToShowUpdate = BranchFormToShowUpdate::init($userLevel);

            // Si branch_name tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['branch_name'] = isset($data['branch_name'])?$data['branch_name']:$branchPKQuery->getBranchName();

            $branchDataArray = $branchPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la branch por lo que se van a modificar
            foreach ($data as $key => $value){
                $branchPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $branchArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Branch', $branchDataArray);

            unset($branchArray['idbranch']);
            unset($branchArray['idcompany']);

            // Instanciamos nuestro formulario resourceFormPostPut
            $branchFormPostPut = BranchFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $branchFormPostPut->setData($branchArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $branchFilterPostPut = new BranchFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $branchFormPostPut->setInputFilter($branchFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($branchFormPostPut->isValid()){

                //Si hay valores por modificar
                if($branchPKQuery->isModified()){
                    if($data['branch_name'] == $branchDataArray['branch_name']){

                        $branchPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/branch/'.$branchPKQuery->getIdbranch(),
                            ),
                        );

                        foreach ($branchPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idcompany']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $objectCompany = $branchPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $companyForm = CompanyFormGET::init($userLevel);

                        $companyArray = array();
                        foreach ($companyForm->getElements() as $key=>$value){
                            $companyArray[$key] = $objectCompany[$key];
                        }
                        $bodyResponse['company'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/company/'.$branchPKQuery->getIdCompany()),
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

                        return array('status_code' => 200, 'details' => $bodyResponse);

                    }else{


                        //Verificamos que branch_name no exista ya en nuestra base de datos.
                        if($branchQuery->filterByIdCompany($idCompany)->filterByBranchName($data['branch_name'])->find()->count()==0){

                            $branchPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/branch/'.$branchPKQuery->getIdbranch(),
                                ),
                            );

                            foreach ($branchPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idcompany']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectCompany = $branchPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $companyForm = CompanyFormGET::init($userLevel);

                            $companyArray = array();
                            foreach ($companyForm->getElements() as $key=>$value){
                                $companyArray[$key] = $objectCompany[$key];
                            }
                            $bodyResponse['company'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/company/'.$branchPKQuery->getIdCompany()),
                                ),
                            );

                            //Agregamos los datod de company a nuestro arreglo $row['_embedded']['company']
                            foreach ($companyArray as $key=>$value){
                                $bodyResponse['company'][$key] = $value;
                            }

                            $bodyResponse['company'] = array(
                                'idcompany' => $bodyResponse['company']['idcompany'],
                                'company_name' => $bodyResponse['company']['company_name'],
                            );

                            return array('status_code' => 200, 'details' => $bodyResponse);

                        }else{
                            $bodyResponse = "branch_name ". "'".$branchArray['branch_name']."'". " already exists";
                            return array('status_code' => 409, 'details' => $bodyResponse);
                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($branchFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);                 }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($branchFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idbranch';
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
            BranchQuery::create()->filterByIdbranch($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}