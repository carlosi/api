<?php

use API\REST\V1\ACL\Company\Client\Form\ClientFormGET;
use API\REST\V1\Shared\Functions\HttpResponse;
/**
 * Skeleton subclass for representing a row from the 'clientaddress' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Clientaddress extends BaseClientaddress
{

    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){
        if($this->idclientByidCompanyFind($dataArray["idclient"], $idCompany)->count()==1){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->setIdclient($dataArray['idclient']);
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedClientColumns = array();
            $client = null;

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idclient", $dataArray)){

                //Instanciamos nuestro objeto Client
                $client = $this->getClient();

                //Instanciamos nuestro formulario clientGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $clientForm   = ClientFormGET::init($userLevel);

                foreach ($clientForm->getElements() as $element){
                    if($element->getOption('value_options')!=null){
                        $allowedClientColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                    }else{
                        $allowedClientColumns[$element->getAttribute('name')] = $element->getOption('label');
                    }
                }
            }
            //Mnadamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
            //1. El objeto "$this" que es clientaddress
            //2. Los elementos que van a ir como _embebed para removerlos(en este caso idclient),
            //3. Las columnas permitidas e los foreignKeys
            //4. el objeto client que va ir como __embebed
            $bodyResponse = HttpResponse::createBodyResonse($this,array('idclient'),array('client' => $allowedClientColumns),array($client));
            $this->save();
            return array('statusCode' => 201, 'bodyResponse' => $bodyResponse);

        }else{
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 400 . ' Bad Request',
                    'Title' => 'The request data is invalid',
                    'Details' => 'Invalid idclient',
                ),
            );
            return array('statusCode' => 400, 'bodyResponse' => $bodyResponse);
        }
    }

    /**
     * @param $idclient
     * @param $idCompany
     * @return array|mixed|PropelObjectCollection
     */
    public function idclientByidCompanyFind($idclient, $idCompany){
        $clientQuery = new ClientQuery();
        $result = $clientQuery->create()->filterByIdcompany($idCompany)->filterByIdclient($idclient)->find();

        return $result;
    }

}