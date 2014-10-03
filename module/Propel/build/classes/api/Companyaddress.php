<?php

//// FORMS ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressForm;
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressFormGET;
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressFormToShowUpdate;
use API\REST\V1\ACL\Company\Companyaddress\Form\CompanyaddressFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Company\Companyaddress\Filter\CompanyaddressFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'companyaddress' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Companyaddress extends BaseCompanyaddress
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return CompanyQuery::create()->filterByIdcompany($idResource)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return CompanyaddressQuery::create()->filterByIdcompany($idResource)
            ->filterByIdcompanyaddress($idResourceChild)
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
    public function saveResouce($dataArray,$idCompany,$userLevel, $data){

        foreach ($dataArray as $dataKey => $dataValue){
            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
        }
        $this->save();

        //Las columnas permitidas de nuestros foreign keys
        $allowedCompanyaddressColumns = array();

        $company = null;
        //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
        if(array_key_exists("idcompany", $dataArray)){

            //Instanciamos nuestro objeto Company
            $company = $this->getCompany();

            //Instanciamos nuestro formulario companyFormGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm   = CompanyFormGET::init($userLevel);

            foreach ($companyForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $allowedCompanyaddressColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $allowedCompanyaddressColumns[$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
        //1. El objeto branch "this"
        //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
        //3. Las columnas permitidas e los foreignKeys
        //4. el objeto company que va ir como __embebed = "company"
        $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyaddressColumns),array($company));
        $this->save();
        return array('status_code' => 201, 'details' => $bodyResponse);

    }

    /**
     * @param $companyaddress
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($companyaddress, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $companyaddressArray = $companyaddress->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($companyaddressArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address/'.$companyaddress->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($companyaddressArray as $companyaddressKey => $companyaddressValue){
            $body[$companyaddressKey] = $companyaddressValue; // Los datos del recurso
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
     *
     * @param type $id
     * @param array $allowedColumns
     * @return type
     */

    public function getEntity($id){
        $entity = CompanyaddressQuery::create()->findPk($id);
        return $entity;
    }

    /**
     *
     * @param type $entity
     * @param array $allowedColumns
     * @return array
     */

    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad company en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        $response = array();

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $companyaddressForm = CompanyaddressFormGET::init($userLevel);
        $companyForm = CompanyFormGET::init($userLevel);

        foreach($companyaddressForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                }
            }
        }
        $response["ACL"]["company"]=array(
            "idcompany" =>  $companyForm->get("idcompany")->getOption('label'),
            "company_name" =>  $companyForm->get("company_name")->getOption('label'),
        );

        $response['_links'] = array(
            "self" => array(
                "href" =>  URL_API."/v".API_VERSION."/".MODULE."/company/".ID_RESOURCE.'/address/'.$entity->getIdcompanyaddress(),
            ),
        );
        foreach($companyaddressForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        $company = $entity->getCompany();
        $response["company"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/company/".$company->getIdcompany(),
                ),
            ),
            "idcompany" => $company->getIdcompany(),
            "company_name" => $company->getCompanyName(),
        );
        return $response;
    }
    /////////// End get ///////////


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
        $companyaddressQuery = new CompanyaddressQuery();

        //Los Filtros
        if($filters!=null){
            foreach($filters as $filter){
                $params = $companyaddressQuery->getParams();
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
                            $companyaddressQuery->addOr('companyaddress'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $companyaddressQuery->addAnd('companyaddress.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $companyaddressQuery->addOr('companyaddress.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $companyaddressQuery->filterBy(BasePeer::translateFieldname('companyaddress', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $companyaddressQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $companyaddressQuery->filterByIdcompany($idCompany)->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address'),
            'last' => array('href' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address?page='.$result->getLastPage()),
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
        $companyaddressFormGET = CompanyaddressFormGET::init($userLevel);
        $CompanyFormGET = CompanyFormGET::init($userLevel);
        $companyaddressArray = array();
        $companyQuery = CompanyQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $companyaddressQuery = CompanyaddressQuery::create()->filterByIdcompanyaddress($item['idcompanyaddress'])->findOne();
            $address = $companyaddressQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/company/'.$address['idcompany'].'/address/'.$address['idcompanyaddress']),
                ),
            );

            foreach($companyaddressFormGET->getElements() as $key=>$value){
                $row[$key] = $address[$key];
            }

            array_push($companyaddressArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($companyaddressFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // End ACL //
        unset($acl['idcompany']);
        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'company' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/company/'.$companyQuery['idcompany']),
                ),
                'idcompany' => $companyQuery['idcompany'],
                'company_name' => $companyQuery['company_name'],
            ),
            'addresses' => $companyaddressArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['addresses'] = array(
                    'address' => $companyaddressArray
                );
                break;
            }
        }

        return $response;

    }
    ///// End getList /////

    /////////// Start update ///////////
    public function updateResource($data, $idCompany, $userLevel, $request, $response){

        $idcompanyaddress = $data['idcompanyaddress'];
        //Instanciamos nuestra companyaddressQuery
        $companyaddressQuery = CompanyaddressQuery::create();

        //Verificamos que el idcompanyaddress que se quiere modificar exista y que pretenece a la compañia
        if($companyaddressQuery->create()->filterByIdcompanyaddress($idcompanyaddress)->filterByIdCompany($idCompany)->exists()){

            //Instanciamos nuestra companyaddressQuery
            $companyaddressPKQuery = $companyaddressQuery->findPk($idcompanyaddress);
            $companyaddressFormToShowUpdate = CompanyaddressFormToShowUpdate::init($userLevel);

            // La funcion resourceData retorna un array de los datos que son enviados por el body
            $companyaddressArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Companyaddress');

            // Instanciamos el formulario companyaddressForm()
            $companyaddressForm = new CompanyaddressForm();
            // Insertamos los valores que tiene el registro por defecto a nuestro companyaddressArray
            foreach($companyaddressPKQuery as $key => $value){
                foreach($companyaddressForm->getElements() as $keys => $values){
                    // Validamos que solo se inserten las columnas de nuestro formulario
                    if($key == $keys){
                        if(!is_null($value) && is_null($companyaddressArray[$keys])){
                            $companyaddressArray[$key] = $value;
                        }
                    }
                }
            }

            //Remplzamos los datos de la companyaddress por lo que se van a modificar
            foreach ($companyaddressArray as $key => $value){
                $companyaddressPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            // Instanciamos nuestro formulario CompanyaddressFormPostPut
            $companyaddressFormPostPut = CompanyaddressFormPostPut::init($userLevel);
            //Le ponemos los datos a nuestro formulario
            $companyaddressFormPostPut->setData($companyaddressArray);

            // Instanciamos nuestro filtro CompanyaddressFilterPostPut
            $companyaddressFilterPostPut = new CompanyaddressFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $companyaddressFormPostPut->setInputFilter($companyaddressFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($companyaddressFormPostPut->isValid()){

                //Si hay valores por modificar
                if($companyaddressPKQuery->isModified()){

                    $companyaddressPKQuery->save();

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => URL_API.'/v'.API_VERSION.'/'.MODULE.'/company/'.ID_RESOURCE.'/address/'.$companyaddressPKQuery->getIdcompanyaddress(),
                        ),
                    );

                    foreach ($companyaddressPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idcompany']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $objectCompany = $companyaddressPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm = CompanyFormGET::init($userLevel);

                    $companyArray = array();
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $objectCompany[$key];
                    }
                    $bodyResponse['company'] = array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.MODULE.'/company/'.$companyaddressPKQuery->getIdcompany()),
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
                    $messageArray = array();
                    foreach ($companyaddressFormToShowUpdate->getElements() as $key => $value){
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
                foreach ($companyaddressFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idcompanyaddress';
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
            CompanyaddressQuery::create()->filterByIdcompanyaddress($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}
