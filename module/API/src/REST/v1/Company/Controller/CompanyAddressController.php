<?php

namespace REST\v1\Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;

//==============FORMS================
use REST\v1\Company\ACL\CompanyAddress\Form\CompanyAddressFormPostPut;
use REST\v1\Company\ACL\Company\Form\CompanyFormPostPut;
//==============FILTERS==============
use REST\v1\Company\ACL\CompanyAddress\Filter\CompanyAddressFilterPostPut;
//=============PROPEL===============
use CompanyaddressQuery;
use Companyaddress;
use BasePeer;
//=============SHARED===============
use REST\v1\Shared\Functions\ArrayManage;
use REST\v1\Shared\Functions\SessionManager;

class CompanyAddressController extends AbstractRestfulController
{
    protected $table = 'companyaddress';
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
        return new CompanyaddressQuery();
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

            switch ($requestContentType){
                case 'application/x-www-form-urlencoded':{

                    $request = $this->getRequest()->getPost();

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = $request->companyaddress_iso_codecountry ? $request->companyaddress_iso_codecountry : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = $request->companyaddress_iso_codephone ? $request->companyaddress_iso_codephone : null;
                        $companyaddressArray['companyaddress_addressee'] = $request->companyaddress_addressee ? $request->companyaddress_addressee : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = $request->companyaddress_addressee_cellular ? $request->companyaddress_addressee_cellular : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = $request->companyaddress_addressee_phone ? $request->companyaddress_addressee_phone : null;
                        $companyaddressArray['companyaddress_address'] = $request->companyaddress_address ? $request->companyaddress_address : null;
                        $companyaddressArray['companyaddress_address2'] = $request->companyaddress_address2 ? $request->companyaddress_address2 : null;
                        $companyaddressArray['companyaddress_city'] = $request->companyaddress_city ? $request->companyaddress_city : null;
                        $companyaddressArray['companyaddress_state'] = $request->companyaddress_state ? $request->companyaddress_state : null;
                        $companyaddressArray['companyaddress_zipcode'] = $request->companyaddress_zipcode ? $request->companyaddress_zipcode : null;

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

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);

                    if($data != null){
                        //Cachamos los datos a insertar en un arreglo
                        $companyaddressArray = array();
                        $companyaddressArray['companyaddress_iso_codecountry'] = isset($requestArray['companyaddress_iso_codecountry']) ? $requestArray['companyaddress_iso_codecountry'] : null;
                        $companyaddressArray['companyaddress_iso_codephone'] = isset($requestArray['companyaddress_iso_codephone']) ? $requestArray['companyaddress_iso_codephone'] : null;
                        $companyaddressArray['companyaddress_addressee'] = isset($requestArray['companyaddress_addressee']) ? $requestArray['companyaddress_addressee'] : null;
                        $companyaddressArray['companyaddress_addressee_cellular'] = isset($requestArray['companyaddress_addressee_cellular']) ? $requestArray['companyaddress_addressee_cellular'] : null;
                        $companyaddressArray['companyaddress_addressee_phone'] = isset($requestArray['companyaddress_addressee_phone']) ? $requestArray['companyaddress_addressee_phone'] : null;
                        $companyaddressArray['companyaddress_address'] = isset($requestArray['companyaddress_address']) ? $requestArray['companyaddress_address'] : null;
                        $companyaddressArray['companyaddress_address2'] = isset($requestArray['companyaddress_address2']) ? $requestArray['companyaddress_address2'] : null;
                        $companyaddressArray['companyaddress_city'] = isset($requestArray['companyaddress_city']) ? $requestArray['companyaddress_city'] : null;
                        $companyaddressArray['companyaddress_state'] = isset($requestArray['companyaddress_state']) ? $requestArray['companyaddress_state'] : null;
                        $companyaddressArray['companyaddress_zipcode'] = isset($requestArray['companyaddress_zipcode']) ? $requestArray['companyaddress_zipcode'] : null;
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

            //Le ponemos los datos a nuestro formulario
            $companyaddressForm = CompanyAddressFormPostPut::init($userLevel);
            $companyaddressForm->setData($companyaddressArray);

            //Le ponemos el filtro a nuestro formulario
            $companyaddressFilter = new CompanyAddressFilterPostPut();

            $companyaddressForm->setInputFilter($companyaddressFilter->getInputFilter($userLevel));

            //Si los valores son validos
            if($companyaddressForm->isValid()){

                //Insertamos en nuestra base de datos
                $companyaddress = new CompanyAddress();

                $companyaddress->setIdcompany($idCompany)
                    ->setCompanyaddressIsoCodecountry($companyaddressArray['companyaddress_iso_codecountry'])
                    ->setCompanyaddressIsoCodephone($companyaddressArray['companyaddress_iso_codephone'])
                    ->setCompanyaddressAddressee($companyaddressArray['companyaddress_addressee'])
                    ->setCompanyaddressAddresseeCellular($companyaddressArray['companyaddress_addressee_cellular'])
                    ->setCompanyaddressAddresseePhone($companyaddressArray['companyaddress_addressee_phone'])
                    ->setCompanyaddressAddress($companyaddressArray['companyaddress_address'])
                    ->setCompanyaddressAddress2($companyaddressArray['companyaddress_address2'])
                    ->setCompanyaddressCity($companyaddressArray['companyaddress_city'])
                    ->setCompanyaddressState($companyaddressArray['companyaddress_state'])
                    ->setCompanyaddressZipcode($companyaddressArray['companyaddress_zipcode'])
                    ->save();

                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->getHeaders()->addHeaderLine('Location', WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompanyaddress());
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_201);

                //Le damos formato a nuestra respuesta
                $bodyResponse = array(
                    "_links" => array(
                        'self' => WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompanyaddress(),
                    ),
                );
                foreach ($companyaddress->toArray(BasePeer::TYPE_FIELDNAME) as $key => $value){
                    $bodyResponse[$key] = $value;
                }

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($bodyResponse['idcompany']);

                //Agregamos el campo embedded a nuestro arreglo
                $company = $companyaddress->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $companyForm = CompanyFormPostPut::init($userLevel);

                $companyArray = array();
                foreach ($companyForm->getElements() as $key=>$value){
                    $companyArray[$key] = $company[$key];
                }

                $bodyResponse ['_embedded'] = array(
                    'company' => array(
                        '_links' => array(
                            'self' => array('href' =>  WEBSITE_API.'/'.$this->table.'/'.$companyaddress->getIdcompany()),
                        ),
                    ),
                );

                //Agregamos los datos de client a nuestro arreglo $row['_embedded']['client']
                foreach ($companyArray as $key=>$value){
                    $bodyResponse ['_embedded']['company'][$key] = $value;
                }

                return new JsonModel($bodyResponse);

            }else{
                //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                //Identificamos cual fue la columna que dio problemas y la enviamos como mensaje
                $messageArray = array();
                foreach ($companyaddressForm->getMessages() as $key => $value){
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
}