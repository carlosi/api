<?php

//// Shared ////
use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayManage;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

//// Form ////
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;
use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\ACL\Company\Client\Form\ClientFormPostPut;
use API\REST\V1\ACL\Company\Client\Form\ClientFormToShowUpdate;

//// Filter ////
use API\REST\V1\ACL\Company\Client\Filter\ClientFilterPostPut;

/**
 * Skeleton subclass for representing a row from the 'client' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Client extends BaseClient
{
    public function isIdValidResource($idResource,$idCompany){
        return ClientQuery::create()->filterByIdclient($idResource)->filterByIdcompany($idCompany)->exists();
    }

    /////////// Start create ///////////
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        if(!$this->clientemailExist($dataArray["client_email"], $idCompany)){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->setIdcompany($idCompany);
            $encryptPassword = hash('sha256', $dataArray['client_password']);
            $this->setClientpassword($encryptPassword);
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
            //1. El objeto client "this"
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto company que va ir como __embebed = "company"
            $bodyResponse = $this->createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));
            $this->save();
            return array('status_code' => 201, 'details' => $bodyResponse);

        }else{
            $bodyResponse = "client_email ". "'".$dataArray["client_email"]."'". " already exists";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $clientname
     * @param $idCompany
     * @return bool
     */
    public function clientemailExist($clientemail, $idCompany){
        return ClientQuery::create()->filterByClientEmail($clientemail)->filterByIdcompany($idCompany)->exists();
    }

    /**
     * @param $client
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($client, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $clientArray = $client->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($clientArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/client/'.$client->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($clientArray as $clientKey => $clientValue){
            $body[$clientKey] = $clientValue; // Los datos del recurso
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
     * @return Client|Client[]|mixed
     */
    public function getEntity($id){
        $entity = ClientQuery::create()->findPk($id);
        return $entity;
    }

    /**
     * @param $entity
     * @param $userLevel
     * @return array
     */
    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad client en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/".MODULE."/client/".$entity->getIdclient(),
                ),
            ),
        );
        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $clientForm = ClientFormGET::init($userLevel);

        // $companyForm = CompanyFormGET::init($userLevel);

        foreach ($clientForm->getElements() as $element){
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
        $clientQuery = new ClientQuery();
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $clientQuery->getParams();
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
                            $clientQuery->addOr('client.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $clientQuery->addAnd('client.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $clientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $clientQuery->addOr('client.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $clientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $clientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $clientQuery ->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $clientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $clientQuery->filterBy(BasePeer::translateFieldname('client', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $clientQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = $clientQuery->filterByIdCompany($idcompany)->paginate($page,$limit);


        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/client?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/client?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/client?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/client'),
            'last' => array('href' => URL_API.'/'.MODULE.'/client?page='.$result->getLastPage()),
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

        // Instanciamos el Formulario GET de nuestro recurso client
        $clientFormGET = ClientFormGET::init($userLevel);
        $clientArray = array();
        foreach ($getCollection['data'] as $item){

            $clientQuery = ClientQuery::create()->filterByIdclient($item['idclient'])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.MODULE.'/client/'.$item['idclient']),
                ),
            );

            foreach ($clientFormGET->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($row['idcompany']);

            array_push($clientArray, $row);
        }

        // Start Company //
        // Instanciamos el objeto de CompanyQuery
        $companyQuery = $clientQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

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
        foreach ($clientFormGET->getElements() as $element){
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
                    'self' => array('href' => URL_API.'/company/'.$clientQuery->getIdcompany()),
                ),
                'idcompany' => $row['idcompany'],
                'company_name' => $row['company_name'],
            ),
            'clients' => $clientArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['clients'] = array(
                    'client' => $clientArray
                );
                break;
            }
        }

        return $response;
    }
    /////////// End getList ///////////

    /////////// Start update ///////////
    public function updateResource($id, $data, $idCompany, $userLevel, $request, $response){

        //Instanciamos nuestra clientQuery
        $clientQuery = ClientQuery::create();

        //Verificamos que el Id client que se quiere modificar exista y que pretenece a la compañia
        if($clientQuery->create()->filterByIdCompany($idCompany)->filterByIdclient($id)->exists()){

            //Instanciamos nuestra clientQuery
            $clientPKQuery = $clientQuery->findPk($id);
            $clientFormToShowUpdate = ClientFormToShowUpdate::init($userLevel);

            // Si client_email tiene un valor, lo almacenamos, de lo contrario le asignamos el valor que tiene en la base de datos
            $data['client_email'] = isset($data['client_email'])?$data['client_email']:$clientPKQuery->getClientEmail();

            $clientDataArray = $clientPKQuery->toArray(BasePeer::TYPE_FIELDNAME);

            //Remplzamos los datos de la client por lo que se van a modificar
            foreach ($data as $key => $value){
                $clientPKQuery->setByName($key, $value, BasePeer::TYPE_FIELDNAME);
            }

            $clientArray = HttpRequest::resourceUpdateData($data, $request, $response, 'Client', $clientDataArray);

            unset($clientArray['idclient']);
            unset($clientArray['idcompany']);

            // Instanciamos nuestro formulario resourceFormPostPut
            $clientFormPostPut = ClientFormPostPut::init($userLevel);

            //Le ponemos los datos a nuestro formulario
            $clientFormPostPut->setData($clientArray);

            // Instanciamos nuestro filtro resourceFilterPostPut
            $clientFilterPostPut = new ClientFilterPostPut();

            //Le ponemos el filtro a nuestro formulario
            $clientFormPostPut->setInputFilter($clientFilterPostPut->getInputFilter($userLevel));
            //Si los valores son validos
            if($clientFormPostPut->isValid()){

                //Si hay valores por modificar
                if($clientPKQuery->isModified()){

                    if($data['client_email'] == $clientDataArray['client_email']){

                        if(isset($data['client_password'])){
                            $password = $clientArray['client_password'];
                            $encryptPassword = hash('sha256',$password);
                            $clientPKQuery->setClientpassword($encryptPassword);
                        }
                        $clientPKQuery->save();

                        //Le damos formato a nuestra respuesta
                        $bodyResponse = array(
                            "_links" => array(
                                'self' => URL_API.'/'.MODULE.'/client/'.$clientPKQuery->getIdclient(),
                            ),
                        );

                        // Convertimos nuestro objeto del registro en array y lo almacenamos en $bodyRespoonse
                        foreach ($clientPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                            $bodyResponse[$key] = $value;
                        }

                        //Si existe la variable password, esto quiere decir que el campo password fue modificamo y lo mostramos, de lo contrario lo ocultamos
                        if(isset($password)){
                            $bodyResponse['client_password'] = $password;
                        }else{
                            unset($bodyResponse['client_password']);
                        }
                        //Eliminamos los campos que hacen referencia a otras tablas
                        unset($bodyResponse['idcompany']);

                        //Agregamos el campo embedded a nuestro arreglo
                        $objectCompany = $clientPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $companyForm = CompanyFormGET::init($userLevel);

                        $companyArray = array();
                        foreach ($companyForm->getElements() as $key=>$value){
                            $companyArray[$key] = $objectCompany[$key];
                        }
                        $bodyResponse['company'] = array(
                            '_links' => array(
                                'self' => array('href' => URL_API.'/company/'.$clientPKQuery->getIdCompany()),
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

                        //Verificamos que client_email no exista ya en nuestra base de datos.
                        if($clientQuery->filterByIdCompany($idCompany)->filterByClientEmail($data['client_email'])->find()->count()==0){

                            if(isset($data['client_password'])){
                                $encryptPassword = hash('sha256', $data['client_password']);
                                $clientPKQuery->setClientpassword($encryptPassword);
                            }
                            $clientPKQuery->save();

                            //Le damos formato a nuestra respuesta
                            $bodyResponse = array(
                                "_links" => array(
                                    'self' => URL_API.'/'.MODULE.'/client/'.$clientPKQuery->getIdclient(),
                                ),
                            );

                            foreach ($clientPKQuery->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                $bodyResponse[$key] = $value;
                            }

                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($bodyResponse['idcompany']);

                            //Agregamos el campo embedded a nuestro arreglo
                            $objectCompany = $clientPKQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $companyForm = CompanyFormGET::init($userLevel);

                            $companyArray = array();
                            foreach ($companyForm->getElements() as $key=>$value){
                                $companyArray[$key] = $objectCompany[$key];
                            }
                            $bodyResponse['company'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/company/'.$clientPKQuery->getIdCompany()),
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
                            $bodyResponse = "client_email ". "'".$clientArray['client_email']."'". " already exists";
                            return array('status_code' => 409, 'details' => $bodyResponse);                        }
                    }
                }else{
                    $messageArray = array();
                    foreach ($clientFormToShowUpdate->getElements() as $key => $value){
                        //Obtenemos el nombre de la columna
                        $message = $key;
                        array_push($messageArray, $message);
                    }
                    $bodyResponse = "No changes were found";
                    return array('status_code' => 304, 'details' => $bodyResponse, 'columns_to_do_changes' => $messageArray);                 }
            }else{
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($clientFormPostPut->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                return array('status_code' => 409, 'details' => $messageArray);
            }
        }else{

            $bodyResponse = 'Invalid idclient';
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
            ClientQuery::create()->filterByIdclient($id)->delete();
            return true;
        }
        return false;

    }
    /////////// End delete ///////////
}