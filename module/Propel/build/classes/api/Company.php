<?php

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\Company\Company\Form\CompanyFormPostPut;
use API\REST\V1\ACL\Company\Company\Form\CompanyFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Company\Company\Filter\CompanyFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'company' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Company extends BaseCompany
{
    public function isIdValidResource($idResource,$idCompany){
        return CompanyQuery::create()->filterByIdcompany($idResource)->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        if(!$this->companynameExist($dataArray["company_name"], $idCompany)){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->save();

            //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
            //1. El objeto company "this"
            $bodyResponse = $this->createBodyResponse($this);
            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);

        }else{
            $bodyResponse = "company_name ". "'".$dataArray["company_name"]."'". " already exists";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $companyname
     * @param $idCompany
     * @return bool
     */
    public function companynameExist($companyname, $idCompany){
        return CompanyQuery::create()->filterByCompanyName($companyname)->exists();
    }

    /**
     * @param $company
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($company, array $voidElements = null, array $allowedColumns = null, array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $companyArray = $company->toArray(\BasePeer::TYPE_FIELDNAME);

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.$company->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($companyArray as $companyKey => $companyValue){
            $body[$companyKey] = $companyValue; // Los datos del recurso
        }

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////

    /////////// Start get ///////////
    /**
     * @param $id
     * @return Company|Company[]|mixed
     */
    public function getEntity($id){
        $entity = CompanyQuery::create()->findPk($id);
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
        $companyForm = CompanyFormGET::init($userLevel);

        foreach($companyForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                if($element->getAttribute('name')){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }

        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/company/".$entity->getIdcompany(),
            ),
        );
        foreach($companyForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')){
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }

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
        $companyQuery = new CompanyQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $companyQuery->getParams();
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
                            $companyQuery->addOr('company.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $companyQuery->addAnd('company.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $companyQuery->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $companyQuery->addOr('company.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $companyQuery->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $companyQuery->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $companyQuery ->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $companyQuery->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $companyQuery->filterBy(BasePeer::translateFieldname('company', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $companyQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $companyQuery->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/company?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/company?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/company?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/company'),
            'last' => array('href' => URL_API.'/'.MODULE.'/company?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso company
        $companyFormGET = CompanyFormGET::init($userLevel);
        $companyArray = array();
        foreach ($getCollection['data'] as $item){
            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/company/'.$item['idcompany']),
                ),
            );

            foreach ($companyFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idcompany']);

            array_push($companyArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($companyFormGET->getElements() as $element){
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
            'companies' => $companyArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['companies'] = array(
                    'company' => $companyArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){

        //Instanciamos nuestra companyQuery
        $companyQuery = CompanyQuery::create();

        //Verificamos que el Id company que se quiere modificar exista y que pretenece a la compañia
        if($companyQuery->create()->filterByIdcompany($id)->exists()){

            //Instanciamos nuestra companyQuery
            $companyPKQuery = $companyQuery->findPk($id);
            $companyFormToShowUpdate = CompanyFormToShowUpdate::init($userLevel);

            // Si company tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['company_name'] = isset($data['company_name'])?$data['company_name']:$companyPKQuery->getCompanyName();

            $companyDataArray = $companyPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la company por lo que se van a modificar
            foreach ($data as $key => $value){
                $companyPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $companyArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Company', $companyDataArray);

            unset($companyArray['idcompany']);

            // Instanciamos nuestro formulario resourceFormPostPut
            $companyFormPostPut = CompanyFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $companyFormPostPut->setData($companyArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $companyFilterPostPut = new CompanyFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $companyFormPostPut->setInputFilter($companyFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($companyFormPostPut->isValid()){

                //Si hay valores por modificar
                if($companyPKQuery->isModified()){
                    if($data['company_name'] == $companyDataArray['company_name']){

                        $companyPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/company/'.$companyPKQuery->getIdcompany(),
                            ),
                        );

                        foreach ($companyPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        return array('status_code' => 200, 'details' => $bodyResponse);

                    }else{

                        //Verificamos que company_name no exista ya en nuestra base de datos.
                        if($companyQuery->filterByCompanyName($data['company_name'])->find()->count()==0){

                            $companyPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/company/'.$companyPKQuery->getIdcompany(),
                                ),
                            );

                            foreach ($companyPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            return array('status_code' => 200, 'details' => $bodyResponse);

                        }else{
                            $bodyResponse = "company_name ". "'".$companyArray['company_name']."'". " already exists";
                            return array('status_code' => 409, 'details' => $bodyResponse);                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($companyFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);                 }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($companyFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idcompany';
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
            CompanyQuery::create()->filterByIdcompany($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}