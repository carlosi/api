<?php

//// FORMS ////
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderForm;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormGET;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormToShowUpdate;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormPostPut;

//// FILTERS ////
use API\REST\V1\ACL\Company\Departmentleader\Filter\DepartmentleaderFilterPostPut;

//// SHARED ////
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Skeleton subclass for representing a row from the 'departmentleader' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.api
 */
class Departmentleader extends BaseDepartmentleader
{
    /**
     * @param $idResource
     * @param $idCompany
     * @return bool
     */
    public function isIdValidResource($idResource,$idCompany){
        return DepartmentQuery::create()->filterByIddepartment($idResource)
            ->filterByIdcompany($idCompany)
            ->exists();
    }

    /**
     * @param $idResource
     * @param $idResourceChild
     * @return bool
     */
    public function isIdValidResurceChild($idResource,$idResourceChild){
        return DepartmentleaderQuery::create()->filterByIddepartment($idResource)
            ->filterByIddepartmentleader($idResourceChild)
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
        if(isset($data['idstaff'])){
            if(!$this->userDepartmentLeaderExist($dataArray["iduser"], $dataArray["iddepartment"], $dataArray["departmentleader_title"])){
                foreach ($dataArray as $dataKey => $dataValue){
                    $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
                }
                $this->save();

                //Las columnas permitidas de nuestros foreign keys
                $allowedDepartmentleaderColumns = array();
                $department = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iddepartment", $dataArray)){

                    //Instanciamos nuestro objeto Department
                    $department = $this->getDepartment();

                    //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $departmentForm = DepartmentFormGET::init($userLevel);

                    foreach ($departmentForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedDepartmentleaderColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedDepartmentleaderColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }

                //Las columnas permitidas de nuestros foreign keys
                $allowedUserColumns = array();
                $user = null;

                //Validamos los foreign Keys a los que va tener acceso el usuario para instanciar nuestros formularios
                if(array_key_exists("iduser", $dataArray)){

                    //Instanciamos nuestro objeto Department
                    $user = $this->getUser();

                    //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                    $userForm = UserFormGET::init($userLevel);

                    foreach ($userForm->getElements() as $element){
                        if($element->getOption('value_options')!=null){
                            $allowedUserColumns[$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                        }else{
                            $allowedUserColumns[$element->getAttribute('name')] = $element->getOption('label');
                        }
                    }
                }
                //Mandamos a llamar a nuestra funcion create para darle el formato a nuestra respuesta pasandole los siguientes parametros
                //1. El objeto branch "this"
                //2. Los elementos que van a ir como _embebed para removerlos(en este caso iddepartment y iduser),
                //3. Las columnas permitidas e los foreignKeys
                //4. el objeto department y user que va ir como __embebed = "department", "user"
                $bodyResponse = $this->createBodyResponse($this,array('iddepartment', 'iduser'),array('department' => $allowedDepartmentleaderColumns, 'user' => $allowedUserColumns),array($department, $user));
                $this->save();
                return array('status_code' => 201, 'details' => $bodyResponse);
            }else{
                $bodyResponse = "This idstaff=".$data['idstaff']." already exist as a "."'".$dataArray['departmentleader_title']."'"." in the iddepartment=".$dataArray['iddepartment'];
                return array('status_code' => 409, 'details' => $bodyResponse);
            }
        }else{
            $bodyResponse = "idstaff value is required and can't be empty";
            return array('status_code' => 409, 'details' => $bodyResponse);
        }
    }

    /**
     * @param $branchname
     * @param $idCompany
     * @return bool
     */
    public function userDepartmentLeaderExist($iduser, $iddepartment, $departmentleaderTitle){
        return DepartmentleaderQuery::create()->filterByIduser($iduser)->filterByIddepartment($iddepartment)->filterByDepartmentleaderTitle($departmentleaderTitle)->exists();
    }

    /**
     * @param $departmentleader
     * @param array $voidElements
     * @param array $allowedColumns
     * @param array $halResources
     * @return array
     */
    public function createBodyResponse($departmentleader, array $voidElements = null, array $allowedColumns,array $halResources=null){

        //Guardamos en un arrglo los datos de nuestro recurso
        $departmentleaderArray = $departmentleader->toArray(\BasePeer::TYPE_FIELDNAME);

        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($departmentleaderArray[$element]);
            }
        }

        //Comnezamos a darle formato a nuestra respuesta.

        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.MODULE.'/department/'.ID_RESOURCE.'/leader/'.$departmentleader->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        foreach ($departmentleaderArray as $departmentleaderKey => $departmentleaderValue){
            $body[$departmentleaderKey] = $departmentleaderValue; // Los datos del recurso
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

        $body['department'] = array(
            'iddepartment' => $body['department']['iddepartment'],
            'department_name' => $body['department']['department_name'],
        );
        $body['user'] = array(
            'iduser' => $body['user']['iduser'],
            'user_nickname' => $body['user']['user_nickname'],
        );

        // Retornamos nuestra respuesta
        return $body;
    }
    /////////// End create ///////////
}
