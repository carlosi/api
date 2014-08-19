<?php

use API\REST\V1\Shared\Functions\HttpResponse;
use API\REST\V1\ACL\Company\Company\Form\CompanyFormGET;

class Client extends BaseClient
{

    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){
        
        if(!$this->clientfullnameExist($dataArray["client_fullname"], $idCompany)){
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
            //Mnadamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros 
            //1. El objeto client
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idcompany),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto company que va ir como __embebed
            $bodyResponse = HttpResponse::createBodyResponse($this,array('idcompany'),array('company' => $allowedCompanyColumns),array($company));
            $this->setClientPassword(hash('sha256', $dataArray["client_password"]));
            $this->save();
            return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);
               
        }else{
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 400 . ' Bad Request',
                    'Title' => 'Resource data pre-validation error',
                    'Details' => "client_fullname ". "'".$dataArray["client_fullname"]."'". " already exists",
                ),
            );
            return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
        } 
    }

    /**
     * @param $clientfullname
     * @param $idCompany
     * @return bool
     */
    public function clientfullnameExist($clientfullname, $idCompany){
        return ClientQuery::create()->filterByClientFullname($clientfullname)->filterByIdcompany($idCompany)->exists();
    }

}
