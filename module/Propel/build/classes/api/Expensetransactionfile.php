<?php


use API\REST\V1\ACL\Expense\Expensetransaction\Form\ExpensetransactionFormGET;
use API\REST\V1\Shared\Functions\HttpResponse;
/**
 * Skeleton subclass for representing a row from the 'expensetransactionfile' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Expensetransactionfile extends BaseExpensetransactionfile
{

    // START CREATE //
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function saveResouce($dataArray,$idCompany,$userLevel){

        $resultExpensetransaction = Expensetransactionfile::idexpensetransactionFind($dataArray["idexpensetransaction"], $idCompany);

        if($resultExpensetransaction->count()==1){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->setIdexpensetransaction($dataArray['idexpensetransaction']);
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedClientColumns = array();
            $expensetransaction = null;

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idexpensetransaction", $dataArray)){

                //Instanciamos nuestro objeto Expensetransaction
                $expensetransaction = $this->getExpensetransaction();

                //Instanciamos nuestro formulario ExpensetransactionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $expensetransactionForm   = ExpensetransactionFormGET::init($userLevel);

                foreach ($expensetransactionForm->getElements() as $element){
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
            $bodyResponse = HttpResponse::createBodyResponse($this,array('idexpensetransaction'),array('expensetransaction' => $allowedClientColumns),array($expensetransaction));
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
     * @param $idexpensetransaction
     * @param $idCompany
     * @return array|mixed|PropelObjectCollection
     */
    public function idexpensetransactionFind($idexpensetransaction, $idCompany){
        $ExpensetransactionQuery = new ExpensetransactionQuery();
        $Expensetransaction = $ExpensetransactionQuery->create()->filterByIdexpensetransaction($idexpensetransaction)->find();
        $arrayExpensetransaction = $Expensetransaction->getArrayCopy();
        $idexpenseitem = $arrayExpensetransaction[0]->getidexpenseitem();

        $ExpenseitemQuery = new ExpenseitemQuery();
        $Expenseitem = $ExpenseitemQuery->create()->filterByIdexpenseitem($idexpenseitem)->find();
        $arrayExpenseitem = $Expenseitem->getArrayCopy();
        $idexpensecategory = $arrayExpenseitem[0]->getidexpensecategory();

        $ExpensetransactionQuery = new ExpensetransactionQuery();
        $result = $ExpensetransactionQuery->create()
            ->filterByIdexpensetransaction($idexpensetransaction)
            ->useExpenseitemQuery()
                ->filterByIdexpenseitem($idexpenseitem)
                    ->useExpensecategoryQuery()
                        ->filterByIdexpensecategory($idexpensecategory)
                        ->filterByIdcompany($idCompany)
                    ->endUse()
            ->endUse()
            ->find();

        return $result;
    }

    // END CREATE //

    // START LIST-ID //
    /**
     * @param $dataArray
     * @param $idCompany
     * @param $userLevel
     * @return array
     */
    public function listResouce($dataArray,$idCompany,$userLevel){

        $resultExpensetransaction = Expensetransactionfile::idexpensetransactionFind($dataArray["idexpensetransaction"], $idCompany);

        if($resultExpensetransaction->count()==1){
            foreach ($dataArray as $dataKey => $dataValue){
                $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
            }
            $this->setIdexpensetransaction($dataArray['idexpensetransaction']);
            $this->save();

            //Las columnas permitidas de nuestros foreign keys
            $allowedClientColumns = array();
            $expensetransaction = null;

            //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
            if(array_key_exists("idexpensetransaction", $dataArray)){

                //Instanciamos nuestro objeto Expensetransaction
                $expensetransaction = $this->getExpensetransaction();

                //Instanciamos nuestro formulario ExpensetransactionGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $expensetransactionForm   = ExpensetransactionFormGET::init($userLevel);

                foreach ($expensetransactionForm->getElements() as $element){
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
            $bodyResponse = HttpResponse::createBodyResonse($this,array('idexpensetransaction'),array('expensetransaction' => $allowedClientColumns),array($expensetransaction));
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
    // END LISTID //

}
