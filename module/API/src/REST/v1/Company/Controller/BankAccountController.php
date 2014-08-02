<?php

namespace REST\v1\Company\Controller;

use REST\v1\Company\ACL\BankAccount\Form\BankAccountFormGET;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use REST\v1\Company\ACL\BankAccount\Form\BankAccountFormPostPut;
use REST\v1\Company\ACL\Company\Form\CompanyFormGET;
//==============FILTERS==============
use REST\v1\Company\ACL\BankAccount\Filter\BankAccountFilterPostPut;
//=============PROPEL===============
use BankaccountQuery;
use Bankaccount;
use BaseBankaccountPeer;
use BasePeer;
//=============SHARED===============
use REST\v1\Shared\Functions\ArrayManage;
use REST\v1\Shared\Functions\SessionManager;


class BankAccountController extends AbstractRestfulController
{
    protected $table = 'bankaccount';
    protected $collectionOptions = array('GET');
    protected $entityOptions = array('GET', 'POST', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','gt','lt','from','to','like');

    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una collecion
        return $this->collectionOptions;
    }

    public function getQuery(){
        return new BankaccountQuery;
    }

    public function getToken(){
        return $this->params('token');
    }

    public function options()
    {
        $response = $this->getResponse();
        $response->getHeaders()
            ->addHeaderLine('Allow', implode(',', $this->_getOptions()));

        //Retornamos la respuesta
        $body = array(
            'Success' => array(
                'HTTP Status' => '200' ,
                'Allow' => implode(',', $this->_getOptions()),
                'More Info' => WEBSITE_API_DOCS.'/'.$this->table
            ),
        );
        return new JsonModel($body);

    }

    public function create($data) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            $requestContentType = $this->getRequest()->getHeaders('ContentType')->getMediaType();

            switch($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    $request = $this->getRequest();

                    //Cachamos los datos a insertar en un arreglo
                    $bankaccountArray = array();
                    $bankaccountArray['bankaccount_name'] = $request->getPost()->bankaccount_name ? $request->getPost()->bankaccount_name : null;
                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    //Cachamos los datos a insertar en un arreglo
                    $bankaccountArray = array();
                    $bankaccountArray['bankaccount_name'] = isset($requestArray['bankaccount_name']) ? $requestArray['bankaccount_name'] : null;

                    break;
                }
                default :{
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                $body = array(
                    'HTTP Status' => '400' ,
                    'Title' => 'Bad Request' ,
                    'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                    'More Info' => WEBSITE_API_DOCS
                );

                return new JsonModel($body);
                break;
                }
            }

            //Le ponemos los datos a nuestro formulario
            $bankaccountForm = BankAccountFormPostPut::init($userLevel);
            $bankaccountForm->setData($bankaccountArray);

            //Le ponemos el filtro a nuestro formulario
            $bankaccountFilter = new BankAccountFilterPostPut();

            $bankaccountForm->setInputFilter($bankaccountFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($bankaccountForm->isValid()){
                //Verificamos que bankaccount_name no exista ya en nuestra base de datos.
                if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByBankaccountName($bankaccountArray['bankaccount_name'])->find()->count()==0){
                    //Insertamos en nuestra base de datos
                    $bankaccount = new Bankaccount();
                    $bankaccount->setIdCompany($idCompany)
                                ->setBankaccountName($bankaccountArray['bankaccount_name'])
                                ->save();

                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/bankaccount/'.$bankaccount->getIdbankaccount());
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                    //Le damos formato a nuestra respuesta
                    $bodyResponse = array(
                        "_links" => array(
                            'self' => WEBSITE_API.'/'.$this->table.'/'.$bankaccount->getIdbankaccount(),
                        ),
                    );
                    foreach ($bankaccount->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                        $bodyResponse[$key] = $value;
                    }

                    //Eliminamos los campos que hacen referencia a otras tablas
                    unset($bodyResponse['idcompany']);

                    //Agregamos el campo embedded a nuestro arreglo
                    $company = $bankaccount->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                    //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $companyForm = CompanyFormGET::init($userLevel);

                    $companyArray = array();
                    foreach ($companyForm->getElements() as $key=>$value){
                        $companyArray[$key] = $company[$key];
                    }
                    $bodyResponse ['_embedded'] = array(
                        'company' => array(
                            '_links' => array(
                                'self' => array('href' => WEBSITE_API.'/company/'.$bankaccount->getIdCompany()),
                            ),
                        ),
                    );

                    //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                    foreach ($companyArray as $key=>$value){
                        $bodyResponse ['_embedded']['company'][$key] = $value;
                    }

                    return new JsonModel($bodyResponse);

                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'Resource data pre-validation error',
                            'Details' => "bankaccount_name ". "'".$bankaccountArray['bankaccount_name']."'". " already exists",
                        ),
                    );
                    return new JsonModel($bodyResponse);
                }
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($bankaccountForm->getMessages() as $key => $value){
                    foreach($value as $val){
                        //Obtenemos el valor de la columna con error
                        $message = $key.' '.$val;
                        array_push($messageArray, $message);
                    }
                }
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'Resource data pre-validation error',
                        'Details' => $messageArray,
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Acces Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }

    public function get($id) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $bankaccountForm = BankAccountFormGET::init($userLevel);

            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($bankaccountForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
             * ACL
             */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();

            foreach ($bankaccountForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                }
            }

            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm = CompanyFormGET::init($userLevel);

            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists('idcompany',$acl)){
                unset($acl['idcompany']);
                $companyColumns = array();
                foreach ($companyForm->getElements() as $element){
                    $companyColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }

                $acl['_embedded'] = array(
                    'company' =>  $companyColumns,
                );
            }

            $result = ArrayManage::getIdCompanyForListId($this->getQuery(), $idCompany, $id);

            //Si si existe el id solicitado y pertenece a la compañia
            if($result!=null){
                $bankaccount = $this->getQuery()->create()->filterByIdbankaccount($id)->findOne();
                $result = $result->toArray(BasePeer::TYPE_FIELDNAME);
                $bankaccountArray = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'. $this->table.'/'.$id,
                    ),
                    "ACL" => $acl
                );
                foreach ($bankaccountForm->getElements() as $key=>$value){
                    $bankaccountArray[$key] = $result[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($bankaccountArray['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $bankaccount->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                $bankaccountArray ['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/company/'.$bankaccount->getIdCompany()),
                        ),
                    ),
                );

                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $bankaccountArray ['_embedded']['company'][$key] = $value;
                }

                return new JsonModel($bankaccountArray);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid Id bankaccount',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }

    public function getList() {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $bankaccountForm = BankAccountFormGET::init($userLevel);


            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($bankaccountForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }

            /*
                 * ACL
                 */

            //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
            $acl = array();
            foreach ($bankaccountForm->getElements() as $element){
                if($element->getOption('value_options')!=null){
                    $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    //array_push($acl, array($element->getAttribute('name') => array('value_options' => $element->getOption('value_options'))));
                }else{
                    $acl[$element->getAttribute('name')] = $element->getOption('label');
                    //array_push($acl, $element->getAttribute('name'));
                }
            }


            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $companyForm = CompanyFormGET::init($userLevel);

            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists('idcompany',$acl)){
                unset($acl['idcompany']);
                $companyColumns = array();
                foreach ($companyForm->getElements() as $element){
                    $companyColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    'company' =>  $companyColumns,
                );
            }

            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idbankaccount';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion

            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);

            $bankaccountArray = array();

            foreach ($result['data'] as $item){
                $bankaccount = $this->getQuery()->create()->filterByIdbankaccount($item['idbankaccount'])->findOne();
                $row = array(
                    "_links" => array(
                        'self' => array('href' => WEBSITE_API.'/'.$this->table.'/'.$item['idbankaccount']),
                    ),
                );
                foreach ($bankaccountForm->getElements() as $key=>$value){
                    $row[$key] = $item[$key];
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row['idcompany']);
                //Agregamos el campo embedded a nuestro arreglo
                $company = $bankaccount->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                $companyArray = array();

                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }
                $row['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' => WEBSITE_API.'/company/'.$bankaccount->getIdCompany()),
                        ),
                    ),
                );
                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                foreach ($companyArray as $key=>$value){
                    $row['_embedded']['company'][$key] = $value;
                }
                array_push($bankaccountArray, $row);
            }

            $response = array(
                '_links' => $result['links'],
                'ACL' => $acl,
                'resume' => $result['resume'],
                '_embedded' => array('bankaccounts'=> $bankaccountArray),
            );

            return new JsonModel($response);

        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }

    public function update($id,$data) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){

            $requestContentType = $this->getRequest()->getHeaders('ContentType')->getMediaType();

            switch($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $bankaccountArray = array();
                        $bankaccountArray['bankaccount_name'] = isset($data['bankaccount_name']) ? $data['bankaccount_name'] : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
                    break;
                }
                case 'application/json':{

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $bankaccountArray = array();
                        $bankaccountArray['bankaccount_name'] = isset($data['bankaccount_name']) ? $data['bankaccount_name'] : null;
                    }else{
                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'The body is empty',
                                'Details' => "The body can`t be empty'",
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }

                    break;
                }
                default :{
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                $body = array(
                    'HTTP Status' => '400' ,
                    'Title' => 'Bad Request' ,
                    'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                    'More Info' => WEBSITE_API_DOCS
                );

                return new JsonModel($body);
                break;
                }
            }

            //Verificamos que el Id del usuario que se quiere modificar exista y que pretenece a la compañia
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdbankaccount($id)->exists()){

                //Instanciamos nuestro user
                $bankaccount = $this->getQuery()->create()->findPk($id);

                //Si se quiere modificar el bankaccount_name
                if(isset($data['bankaccount_name']) && $data['bankaccount_name'] != null){

                    //Remplzamos los datos de la cuenta bancaria por lo que se van a modifica
                    foreach ($data as $value){
                        $bankaccount->setBankaccountName($value, BasePeer::TYPE_FIELDNAME);
                    }

                    //Le ponemos los datos a nuestro formulario
                    $bankaccountForm = BankAccountFormPostPut::init($userLevel);
                    $bankaccountForm->setData($bankaccount->toArray(BasePeer::TYPE_FIELDNAME));


                    //Le ponemos el filtro a nuestro formulario
                    $bankaccountFilter = new BankAccountFilterPostPut();
                    $bankaccountForm->setInputFilter($bankaccountFilter->getInputFilter($userLevel));

                    //Si los valores son validos
                    if($bankaccountForm->isValid()){
                        //Si hay valores por modificar
                        if($bankaccount->isModified()){
                            //Verificamos que bankaccount_name no exista ya en nuestra base de datos.
                            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByBankaccountName($data['bankaccount_name'])->find()->count()==0){

                                $bankaccount->save();
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK

                                //Le damos formato a nuestra respuesta
                                $bodyResponse = array(
                                    "_links" => array(
                                        'self' => WEBSITE_API.'/'. $this->table.'/'.$bankaccount->getIdbankaccount(),
                                    ),
                                );

                                foreach ($bankaccount->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                                    $bodyResponse[$key] = $value;
                                }

                                //Eliminamos los campos que hacen referencia a otras tablas
                                unset($bodyResponse['idcompany']);

                                //Agregamos el campo embedded a nuestro arreglo
                                $company = $bankaccount->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                                $companyForm = CompanyFormGET::init($userLevel);

                                $companyArray = array();
                                foreach ($companyForm->getElements() as $key=>$value){
                                    $companyArray[$key] = $company[$key];
                                }
                                $bodyResponse ['_embedded'] = array(
                                    'company' => array(
                                        '_links' => array(
                                            'self' => array('href' => WEBSITE_API.'/company/'.$bankaccount->getIdCompany()),
                                        ),
                                    ),
                                );

                                //Agregamos los datos de company a nuestro arreglo $row['_embedded'][company']
                                foreach ($companyArray as $key=>$value){
                                    $bodyResponse ['_embedded']['company'][$key] = $value;
                                }

                                return new JsonModel($bodyResponse);
                            }else{
                                //Modifiamos el Header de nuestra respuesta
                                $response = $this->getResponse();
                                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                                $bodyResponse = array(
                                    'Error' => array(
                                        'HTTP Status' => 400 . ' Bad Request',
                                        'Title' => 'Resource data pre-validation error',
                                        'Details' => "bankaccount_name ". "'".$bankaccountArray['bankaccount_name']."'". " already exists",
                                    ),
                                );
                                return new JsonModel($bodyResponse);
                            }
                        }else{

                            //Modifiamos el Header de nuestra respuesta
                            $response = $this->getResponse();
                            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                            $bodyResponse = array(
                                'Error' => array(
                                    'HTTP Status' => 400 . ' Bad Request',
                                    'Title' => 'No changes were found',
                                ),
                            );
                            return new JsonModel($bodyResponse);
                        }

                    }else{

                        //Modifiamos el Header de nuestra respuesta
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                        //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                        $messageArray = array();
                        foreach ($bankaccountForm->getMessages() as $key => $value){
                            foreach($value as $val){
                                //Obtenemos el valor de la columna con error
                                $message = $key.' '.$val;
                                array_push($messageArray, $message);
                            }
                        }
                        $bodyResponse = array(
                            'Error' => array(
                                'HTTP Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => $messageArray,
                            ),
                        );
                        return new JsonModel($bodyResponse);
                    }
                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP Status' => 400 . ' Bad Request',
                            'Title' => 'No changes were found',
                        ),
                    );
                    return new JsonModel($bodyResponse);
                }
            }else{

                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id bankaccount',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{

            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }
    public function delete($id) {

        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();

        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);

        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);

        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);

        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            //Verificamos que el id que se desea eliminar exista y que pertenezca a la compañia
            if($this->getQuery()->create()->filterByIdCompany($idCompany)->filterByIdbankaccount($id)->exists()){
                $bankaccount = $this->getQuery()->create()->findOneByIdbankaccount($id);
                $bankaccount->delete();

                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_204); //NOT CONTENT
            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'The request data is invalid',
                        'Details' => 'Invalid id bankaccount',
                    ),
                );
                return new JsonModel($bodyResponse);
            }
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //ACCESS DENIED
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        }
    }
}