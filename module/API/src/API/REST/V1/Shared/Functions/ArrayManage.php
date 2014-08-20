<?php

/**
 * ArrayManage.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\Functions;

// - Propel - //
use BasePeer;

/**
 * Class ArrayManage
 * @package API\REST\V1\Shared\Functions
 */
class ArrayManage
{
    /**
     * @param $resourceQuery
     * @return bool|mixed
     */
    public static function getForeingKeys($resourceQuery){

        // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
        $foreingKeys = array_keys($resourceQuery->getTablemap()->getForeignKeys());

        // Contamos los ForeingKey que tiene el recurso
        $countForeingKeys = count($foreingKeys);
        if($countForeingKeys == 1){
            if($countForeingKeys == 1){

                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idForeingKey = key($resourceQuery->getTablemap()->getForeignKeys());

                return $idForeingKey;
            }
            if($countForeingKeys == 2){
                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idsForeingKey = array_keys($resourceQuery->getTablemap()->getForeignKeys());

                return $idsForeingKey;
            }
        }
        if($countForeingKeys == 2){
            // Si el ForeingKey en la posición 1 del array tiene el string "id"
            $hasId = stripos('id', $foreingKeys[1]);
            if($hasId){

                if($countForeingKeys == 1){
                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idForeingKey = key($resourceQuery->getTablemap()->getForeignKeys());
                    return $idForeingKey;
                }
                if($countForeingKeys == 2){
                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idsForeingKey = array_keys($resourceQuery->getTablemap()->getForeignKeys());

                    return $idsForeingKey;
                }
            }else{

                // Contamos los ForeingKey que tiene el recurso
                $countForeingKeys = count($foreingKeys);

                if($countForeingKeys == 2){
                    // Obtenemos un string del primer id de la llave foranea de nuestro XXXQuery()
                    $idsForeingKey = array_keys($resourceQuery->getTablemap()->getForeignKeys());

                    // Eliminamos el ForeingKey que no tiene objeto, que no cuenta con un recurso
                    unset($idsForeingKey[1]);

                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idForeingKey = key($resourceQuery->getTablemap()->getForeignKeys());

                    return $idForeingKey;
                }
            }
        }
    }

    /**
     * @param $resourceFormGET
     * @param $resourceQuery
     * @param $result
     * @param $userLevel
     * @return array
     */
    public static function getResourceResult($resourceFormGET, $resourceQuery, $result, $userLevel){

        $idForeingKey = ArrayManage::getForeingKeys($resourceQuery);

        $resourceArray = array();
        foreach ($result['data'] as $item){

            $resourceQueryPK = $resourceQuery::create()->filterByPrimaryKey($item['id'.RESOURCE])->findOne();

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/'.RESOURCE.'/'.$item['id'.RESOURCE]),
                ),
            );
            foreach ($resourceFormGET->getElements() as $key=>$value){

                $row[$key] = $item[$key];
            }

            if(is_array($idForeingKey)){

                $idForeingKey1 = $idForeingKey[0];
                $idForeingKey2 = $idForeingKey[1];
                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row[$idForeingKey1]);
                unset($row[$idForeingKey2]);

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $nameForeingKey1 = substr($idForeingKey[0], 2);
                $nameForeingKey2 = substr($idForeingKey[1], 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $NameForeingKey1 = ucfirst($nameForeingKey1);
                $getQueryForeingKey1 = 'get'.$NameForeingKey1;
                $NameForeingKey2 = ucfirst($nameForeingKey2);
                $getQueryForeingKey2 = 'get'.$NameForeingKey2;

                // Instanciamos el objeto de nuestro FK
                $objectForeingKey1 = $resourceQueryPK->$getQueryForeingKey1()->toArray(BasePeer::TYPE_FIELDNAME);
                $objectForeingKey2 = $resourceQueryPK->$getQueryForeingKey2()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $nameForeingKey1FormGET = ResourceManager::getResourceFormGET($NameForeingKey1);
                $foreingKey1FormGET = $nameForeingKey1FormGET::init($userLevel);
                $nameForeingKey2FormGET = ResourceManager::getResourceFormGET($NameForeingKey2);
                $foreingKey2FormGET = $nameForeingKey2FormGET::init($userLevel);

                // Guardamos los elementos de nuestro Formulario en un Array
                $foreingKey1Array = array();
                foreach ($foreingKey1FormGET->getElements() as $key=>$value){
                    $foreingKey1Array[$key] = $objectForeingKey1[$key];
                }
                $foreingKey2Array = array();
                foreach ($foreingKey2FormGET->getElements() as $key=>$value){
                    $foreingKey2Array[$key] = $objectForeingKey2[$key];
                }

                // Hacemos Mayúscula la inicial de id del ForeingKey para hacer uso en una cuery de Propel de tipo "get"
                $IdForeingKey1 = ucfirst($idForeingKey1);
                $getIdForeingKey1 = 'get'.$IdForeingKey1;
                $IdForeingKey2 = ucfirst($idForeingKey2);
                $getIdForeingKey2 = 'get'.$IdForeingKey2;

                $row['_embedded'] = array(
                    $nameForeingKey1 => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.$nameForeingKey1.'/'.$resourceQueryPK->$getIdForeingKey1()),
                        ),
                    ),
                    $nameForeingKey2 => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.$nameForeingKey2.'/'.$resourceQueryPK->$getIdForeingKey2()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($foreingKey1Array as $key=>$value){
                    $row['_embedded'][$nameForeingKey1][$key] = $value;
                }
                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($foreingKey2Array as $key=>$value){
                    $row['_embedded'][$nameForeingKey2][$key] = $value;
                }
                array_push($resourceArray, $row);

            }else{

                //Eliminamos los campos que hacen referencia a otras tablas
                unset($row[$idForeingKey]);

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $nameForeingKey = substr($idForeingKey, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $NameForeingKey = ucfirst($nameForeingKey);
                $getQueryForeingKey = 'get'.$NameForeingKey;

                // Instanciamos el objeto de nuestro FK
                $objectForeingKey = $resourceQueryPK->$getQueryForeingKey()->toArray(BasePeer::TYPE_FIELDNAME);

                //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                $nameForeingKeyFormGET = ResourceManager::getResourceFormGET($NameForeingKey);
                $foreingKeyFormGET = $nameForeingKeyFormGET::init($userLevel);

                $foreingKeyArray = array();
                foreach ($foreingKeyFormGET->getElements() as $key=>$value){
                    $foreingKeyArray[$key] = $objectForeingKey[$key];
                }

                $IdForeingKey = ucfirst($idForeingKey);
                $getIdForeingKey = 'get'.$IdForeingKey;

                $row['_embedded'] = array(
                    $nameForeingKey => array(
                        '_links' => array(
                            'self' => array('href' => URL_API.'/'.$nameForeingKey.'/'.$resourceQueryPK->$getIdForeingKey()),
                        ),
                    ),
                );

                //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
                foreach ($foreingKeyArray as $key=>$value){
                    $row['_embedded'][$nameForeingKey][$key] = $value;
                }
                array_push($resourceArray, $row);
            }
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($resourceFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        if(is_array($idForeingKey)){

            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists($idForeingKey1,$acl)){
                unset($acl[$idForeingKey1]);
                $foreingKey1Columns = array();
                foreach ($foreingKey1FormGET->getElements() as $element){
                    $foreingKey1Columns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    $nameForeingKey1 =>  $foreingKey1Columns,
                );
            }
            if(key_exists($idForeingKey2,$acl)){
                unset($acl[$idForeingKey2]);
                $foreingKey2Columns = array();
                foreach ($foreingKey2FormGET->getElements() as $element){
                    $foreingKey2Columns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    $nameForeingKey2 =>  $foreingKey2Columns,
                );
            }
        }else{
            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists($idForeingKey,$acl)){
                unset($acl[$idForeingKey]);
                $foreingKeyColumns = array();
                foreach ($foreingKeyFormGET->getElements() as $element){
                    $foreingKeyColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    $nameForeingKey =>  $foreingKeyColumns,
                );
            }
        }
        // End ACL //

        $response = array(
            '_links' => $result['links'],
            'ACL' => $acl,
            'resume' => $result['resume'],
            '_embedded' => array(RESOURCE => $resourceArray),
        );

        return $response;
    }

    public static function getResourceResultId($id, $resourceFormGET, $resourceQuery, $result, $userLevel){

        //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
        $allowedColumns = array();
        foreach ($resourceFormGET->getElements() as $key=>$value){
            array_push($allowedColumns, $key);
        }

        $resourceQueryPK = $resourceQuery::create()->filterByPrimaryKey($id)->findOne();
        $result = $result->toArray(BasePeer::TYPE_FIELDNAME);

        $resourceArray = array(
            "_links" => array(
                'self' => URL_API . '/' .RESOURCE.'/'.$id,
            ),
            'ACL' => null,
        );
        foreach ($resourceFormGET->getElements() as $key=>$value){
            $resourceArray[$key] = $result[$key];
        }

        $idForeingKey = ArrayManage::getForeingKeys($resourceQuery);

        if(is_array($idForeingKey)){

            $idForeingKey1 = $idForeingKey[0];
            $idForeingKey2 = $idForeingKey[1];
            //Eliminamos los campos que hacen referencia a otras tablas
            unset($resourceArray[$idForeingKey1]);
            unset($resourceArray[$idForeingKey2]);

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $nameForeingKey1 = substr($idForeingKey[0], 2);
            $nameForeingKey2 = substr($idForeingKey[1], 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $NameForeingKey1 = ucfirst($nameForeingKey1);
            $getQueryForeingKey1 = 'get'.$NameForeingKey1;
            $NameForeingKey2 = ucfirst($nameForeingKey2);
            $getQueryForeingKey2 = 'get'.$NameForeingKey2;

            // Instanciamos el objeto de nuestro FK
            $objectForeingKey1 = $resourceQueryPK->$getQueryForeingKey1()->toArray(BasePeer::TYPE_FIELDNAME);
            $objectForeingKey2 = $resourceQueryPK->$getQueryForeingKey2()->toArray(BasePeer::TYPE_FIELDNAME);

            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $nameForeingKey1FormGET = ResourceManager::getResourceFormGET($NameForeingKey1);
            $foreingKey1FormGET = $nameForeingKey1FormGET::init($userLevel);
            $nameForeingKey2FormGET = ResourceManager::getResourceFormGET($NameForeingKey2);
            $foreingKey2FormGET = $nameForeingKey2FormGET::init($userLevel);

            // Guardamos los elementos de nuestro Formulario en un Array
            $foreingKey1Array = array();
            foreach ($foreingKey1FormGET->getElements() as $key=>$value){
                $foreingKey1Array[$key] = $objectForeingKey1[$key];
            }
            $foreingKey2Array = array();
            foreach ($foreingKey2FormGET->getElements() as $key=>$value){
                $foreingKey2Array[$key] = $objectForeingKey2[$key];
            }

            // Hacemos Mayúscula la inicial de id del ForeingKey para hacer uso en una cuery de Propel de tipo "get"
            $IdForeingKey1 = ucfirst($idForeingKey1);
            $getIdForeingKey1 = 'get'.$IdForeingKey1;
            $IdForeingKey2 = ucfirst($idForeingKey2);
            $getIdForeingKey2 = 'get'.$IdForeingKey2;

            $resourceArray['_embedded'] = array(
                $nameForeingKey1 => array(
                    '_links' => array(
                        'self' => array('href' => URL_API.'/'.$nameForeingKey1.'/'.$resourceQueryPK->$getIdForeingKey1()),
                    ),
                ),
                $nameForeingKey2 => array(
                    '_links' => array(
                        'self' => array('href' => URL_API.'/'.$nameForeingKey2.'/'.$resourceQueryPK->$getIdForeingKey2()),
                    ),
                ),
            );

            //Agregamos los datos de los foreingKey a nuestro arreglo $resourceArray
            foreach ($foreingKey1Array as $key=>$value){
                $resourceArray['_embedded'][$nameForeingKey1][$key] = $value;
            }
            //Agregamos los datos de user a nuestro arreglo $row['_embedded'][company']
            foreach ($foreingKey2Array as $key=>$value){
                $resourceArray['_embedded'][$nameForeingKey2][$key] = $value;
            }
        }else{

            //Eliminamos los campos que hacen referencia a otras tablas
            unset($resourceArray[$idForeingKey]);

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $nameForeingKey = substr($idForeingKey, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $NameForeingKey = ucfirst($nameForeingKey);
            $getQueryForeingKey = 'get'.$NameForeingKey;

            // Instanciamos el objeto de nuestro FK
            $objectForeingKey = $resourceQueryPK->$getQueryForeingKey()->toArray(BasePeer::TYPE_FIELDNAME);

            //Instanciamos nuestro formulario companyGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
            $nameForeingKeyFormGET = ResourceManager::getResourceFormGET($NameForeingKey);
            $foreingKeyFormGET = $nameForeingKeyFormGET::init($userLevel);

            $foreingKeyArray = array();
            foreach ($foreingKeyFormGET->getElements() as $key=>$value){
                $foreingKeyArray[$key] = $objectForeingKey[$key];
            }

            $IdForeingKey = ucfirst($idForeingKey);
            $getIdForeingKey = 'get'.$IdForeingKey;

            $resourceArray['_embedded'] = array(
                $nameForeingKey => array(
                    '_links' => array(
                        'self' => array('href' => URL_API .'/'.$nameForeingKey.'/'.$resourceQueryPK->$getIdForeingKey()),
                    ),
                ),
            );

            //Agregamos los datos de resourceForeingKey a nuestro arreglo $resourceArray['_embedded'][$nameForeingKey']
            foreach ($foreingKeyArray as $key=>$value){
                $resourceArray['_embedded'][$nameForeingKey][$key] = $value;
            }
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($resourceFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }

        if(is_array($idForeingKey)){

            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists($idForeingKey1,$acl)){
                unset($acl[$idForeingKey1]);
                $foreingKey1Columns = array();
                foreach ($foreingKey1FormGET->getElements() as $element){
                    $foreingKey1Columns[$element->getAttribute('name')] =  $element->getOption('label');
                }
            }
            if(key_exists($idForeingKey2,$acl)){
                unset($acl[$idForeingKey2]);
                $foreingKey2Columns = array();
                foreach ($foreingKey2FormGET->getElements() as $element){
                    $foreingKey2Columns[$element->getAttribute('name')] =  $element->getOption('label');
                }
            }

            $acl['_embedded'] = array(
                $nameForeingKey1 =>  $foreingKey1Columns,
                $nameForeingKey2 =>  $foreingKey2Columns,
            );
        }else{
            //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
            if(key_exists($idForeingKey,$acl)){
                unset($acl[$idForeingKey]);
                $foreingKeyColumns = array();
                foreach ($foreingKeyFormGET->getElements() as $element){
                    $foreingKeyColumns[$element->getAttribute('name')] =  $element->getOption('label');
                }
                $acl['_embedded'] = array(
                    $nameForeingKey =>  $foreingKeyColumns,
                );
            }
        }

        $resourceArray['ACL'] = $acl;
        // End ACL //

        return $resourceArray;

        ///////////////////////////////////////////////

        /*
        //Eliminamos los campos que hacen referencia a otras tablas
        unset($resourceArray['idcompany']);

        //Agregamos el campo embedded a nuestro arreglo
        $company = $resourceQuery->getCompany()->toArray(BasePeer::TYPE_FIELDNAME);

        $companyArray = array();
        foreach ($companyForm->getElements() as $key=>$value){
            $companyArray[$key] = $company[$key];
        }
        $clientArray ['_embedded'] = array(
            'company' => array(
                '_links' => array(
                    'self' => array('href' => URL_API . '/company/' . $resourceQuery->getIdCompany()),
                ),
            ),
        );

        //Agregamos los datos de company a nuestro arreglo $row['_embedded']['company']
        foreach ($companyArray as $key=>$value){
            $clientArray ['_embedded']['company'][$key] = $value;
        }

        // Si las columnas son eliminadas desde el nivel de usuario no hacemos nada
        // Si las columnas que no son requeridas estan vacías
        // no las mostramos
        if(key_exists('client_iso_codecountry', $clientArray)){
            if(!$clientArray['client_iso_codecountry']){
                unset($clientArray['client_iso_codecountry']);
            }
        }
        if(key_exists('client_iso_codephone', $clientArray)){
            if(!$clientArray['client_iso_codephone']){
                unset($clientArray['client_iso_codephone']);
            }
        }
        if(key_exists('client_email', $clientArray)){
            if(!$clientArray['client_email']){
                unset($clientArray['client_email']);
            }
        }
        if(key_exists('client_email2', $clientArray)){
            if(!$clientArray['client_email2']){
                unset($clientArray['client_email2']);
            }
        }
        if(key_exists('client_password', $clientArray)){
            if(!$clientArray['client_password']){
                unset($clientArray['client_password']);
            }
        }
        if(key_exists('client_cellular', $clientArray)){
            if(!$clientArray['client_cellular']){
                unset($clientArray['client_cellular']);
            }
        }
        if(key_exists('client_phone', $clientArray)){
            if(!$clientArray['client_phone']){
                unset($clientArray['client_phone']);
            }
        }
        if(key_exists('client_language', $clientArray)){
            if(!$clientArray['client_language']){
                unset($clientArray['client_language']);
            }
        }
        if(key_exists('client_type', $clientArray)){
            if(!$clientArray['client_type']){
                unset($clientArray['client_type']);
            }
        }

        return new JsonModel($resourceArray);

        */

    }

    /**
     * @param $query
     * @param $idcompany
     * @param $id
     * @return mixed
     */
    public static function getIdCompanyForListId($query, $idcompany, $id)
    {

        // Si el $query es  del recurso Company
        if($query->getModelName() == 'Company'){
            $result = $query->create()->findPk($id);
        }

        // Iniciamos los Joins
        // Guardamos y validamos si XXXQuery() contiene la columna "idcompany"
        $hasIdCompany = $query->getTableMap()->hasColumn('idcompany');
        if(!$hasIdCompany){

            // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
            $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

            // Contamos los ForeingKey que tiene el recurso
            $countFkLevel0 = count($fkLevel0);

            // Si el recurso solamente cuenta con 1 ForeingKey
            if($countFkLevel0 == 1){

                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $resourceJoinLevel1 = substr($idFkLevel1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $useQueryFkLevel1 = ucfirst($resourceJoinLevel1);

                //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

                $resourceQueryFKLevel1 = new $queryFkJoinLevel1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompany = $resourceQueryFKLevel1->create()->getTableMap()->hasColumn('idcompany');

                // Si el objeto tiene una columna llamada idcompany
                if($hasIdCompany){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFkLevel1.' alias2')
                        ->useQuery('alias2')
                        ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->findPk($id);
                }else{

                    //Pendiente
                    //...
                }
            }

            // Si el recurso tiene 2 ForeingKeys
            if($countFkLevel0 == 2){

                // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

                // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                $idFk1Level1 = $idsFkLevel1[0];
                $idFk2Level1 = $idsFkLevel1[1];

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $resourceJoin1Level1 = substr($idFk1Level1, 2);
                $resourceJoin2Level1 = substr($idFk2Level1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
                $useQueryFk1Level1 = ucfirst($resourceJoin1Level1);
                $useQueryFk2Level1 = ucfirst($resourceJoin2Level1);

                // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
                $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

                //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                $getQueryFk1Level1 = new $queryFkJoin1Level1;
                $getQueryFk2Level1 = new $queryFkJoin2Level1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
                $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

                // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                    if($hasIdCompanyQueryFk1Level1 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->findPk($id);
                    }
                    if($hasIdCompanyQueryFk2Level1 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk2Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->findPk($id);
                    }

                }else{

                    // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                    $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                    //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                    // Contamos los ForeingKey que tiene el recurso
                    $countFkLevel2 = count($idsFk1Level2);

                    // Si el recurso solamente cuenta con 1 ForeingKey
                    if($countFkLevel2 == 1){

                        // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                        $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $resourceJoinLevel2 = substr($idFkLevel2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQueryFkLevel2 = ucfirst($resourceJoinLevel2);

                        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                        $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                        //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                        $getQueryFkLevel2 = new $queryFkJoinLevel2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                        // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                        if($hasIdCompanyQueryFkLevel2 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                ->useQuery('alias3')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->endUse()
                                ->findPk($id);
                        }else{

                            //Pendiente
                            //...
                        }
                    }

                    if($countFkLevel2 == 2){

                        // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                        $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                        // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                        $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                        $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $resourceJoin1 = substr($idForeingKeyJoin1, 2);
                        $resourceJoin2 = substr($idForeingKeyJoin2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQuery1 = ucfirst($resourceJoin1);
                        $useQuery2 = ucfirst($resourceJoin2);

                        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                        $queryForeingKeyJoin1 = $useQuery1."Query";
                        $queryForeingKeyJoin2 = $useQuery2."Query";

                        //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                        $getQuery1 = new $queryForeingKeyJoin1;
                        $getQuery2 = new $queryForeingKeyJoin2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                        $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                        // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                        if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                            if($hasIdCompanyQ1 == true){
                                $result = $query->create('alias')
                                    ->join('alias.'.$useQuery1.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->findPk($id);
                            }
                            if($hasIdCompanyQ2 == true){
                                $result = $query->create('alias')
                                    ->join('alias.'.$useQuery2.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->findPk($id);
                            }
                        }else{

                            //Pendiente
                            //...
                        }

                    }
                }
            }
        }else{
            // Si el $query es del recurso Company
            if($query->getModelName() == 'Company'){
                $result = $query->findPk($id);
            }else{
                $result = $query->create()->filterByIdCompany($idcompany)->findPk($id);
            }
        }

        return $result;
    }

    /**
     * @param $query
     * @param $idcompany
     * @param $page
     * @param $limit
     * @return mixed
     */
    public static function getIdCompanyForList($query, $idcompany, $page, $limit){

        // Guardamos y validamos si XXXQuery() contiene la columna "idcompany"
        $hasIdCompany = $query->getTableMap()->hasColumn('idcompany');
        if(!$hasIdCompany){

            // Iniciamos los Joins
            // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
            $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

            // Contamos los ForeingKey que tiene el recurso
            $countFkLevel0 = count($fkLevel0);

            // Si el recurso solamente cuenta con 1 ForeingKey
            if($countFkLevel0 == 1){

                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $resourceJoinLevel1 = substr($idFkLevel1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $useQueryFkLevel1 = ucfirst($resourceJoinLevel1);

                //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

                $getQueryLevel1 = new $queryFkJoinLevel1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompany = $getQueryLevel1->create()->getTableMap()->hasColumn('idcompany');

                // Si el objeto tiene una columna llamada idcompany
                if($hasIdCompany){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFkLevel1.' alias2')
                        ->useQuery('alias2')
                        ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->paginate($page, $limit);
                }else{

                    // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
                    $fkLevel1 = array_keys($getQueryLevel1->getTablemap()->getForeignKeys());

                    // Contamos los ForeingKey que tiene el recurso
                    $countFkLevel1 = count($fkLevel1);

                    // Si el recurso solamente cuenta con 1 ForeingKey
                    if($countFkLevel1 == 1){

                        // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                        $idFkLevel2 = key($getQueryLevel1->getTablemap()->getForeignKeys());

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $resourceJoinLevel2 = substr($idFkLevel2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQueryFkLevel2 = ucfirst($resourceJoinLevel2);

                        //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                        $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                        $getQueryLevel2 = new $queryFkJoinLevel2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompany = $getQueryLevel2->create()->getTableMap()->hasColumn('idcompany');

                        // Si el objeto tiene una columna llamada idcompany
                        if($hasIdCompany){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFkLevel1.' alias2')
                                ->useQuery('alias2')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->paginate($page, $limit);
                        }else{
                            // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
                            $fkLevel2 = array_keys($getQueryLevel2->getTablemap()->getForeignKeys());

                            // Contamos los ForeingKey que tiene el recurso
                            $countFkLevel2 = count($fkLevel2);

                            // Si el recurso solamente cuenta con 1 ForeingKey
                            if($countFkLevel2 == 1){

                                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                                $idFkLevel3 = key($getQueryLevel2->getTablemap()->getForeignKeys());

                                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                                $resourceJoinLevel3 = substr($idFkLevel3, 2);

                                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                                $useQueryFkLevel3 = ucfirst($resourceJoinLevel3);

                                //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                                $queryFkJoinLevel3 = $useQueryFkLevel3."Query";

                                $getQueryLevel3 = new $queryFkJoinLevel3;

                                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                                $hasIdCompany = $getQueryLevel3->create()->getTableMap()->hasColumn('idcompany');

                                // Si el objeto tiene una columna llamada idcompany
                                if($hasIdCompany){
                                    $result = $query->create('alias')
                                        ->join('alias.'.$useQueryFkLevel1.' alias2')
                                        ->useQuery('alias2')
                                            ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                            ->useQuery('alias3')
                                                ->join('alias3.'.$useQueryFkLevel3.' alias4')
                                                ->useQuery('alias4')
                                                    ->filterByIdCompany($idcompany)
                                                ->endUse()
                                            ->endUse()
                                        ->endUse()
                                        ->paginate($page, $limit);
                                }else{

                                    // En caso de que exista recursos que requieran un nivel 3 para llegar al idcompany
                                }
                            }
                        }
                    }
                }
            }

            // Si el recurso tiene 2 ForeingKeys
            if($countFkLevel0 == 2){

                // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

                // Si el ForeingKey en la posición 1 del array tiene el string "id"
                $hasId = stripos('id', $idsFkLevel1[1]);
                if($hasId){
                    // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                    $idFk1Level1 = $idsFkLevel1[0];
                    $idFk2Level1 = $idsFkLevel1[1];

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $resourceJoin1Level1 = substr($idFk1Level1, 2);
                    $resourceJoin2Level1 = substr($idFk2Level1, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
                    $useQueryFk1Level1 = ucfirst($resourceJoin1Level1);
                    $useQueryFk2Level1 = ucfirst($resourceJoin2Level1);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
                    $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

                    //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                    $getQueryFk1Level1 = new $queryFkJoin1Level1;
                    $getQueryFk2Level1 = new $queryFkJoin2Level1;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
                    $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

                    // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                    if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                        if($hasIdCompanyQueryFk1Level1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->paginate($page, $limit);
                        }
                        if($hasIdCompanyQueryFk2Level1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk2Level1.' alias2')
                                ->useQuery('alias2')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->paginate($page, $limit);
                        }

                        // Si los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                        if($hasIdCompanyQueryFk1Level1 == true && $hasIdCompanyQueryFk2Level1 == true){

                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->_and()
                                ->join('alias.'.$useQueryFk2Level1.' alias3')
                                ->useQuery('alias3')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->paginate($page, $limit);
                        }

                    }else{

                        // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                        $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                        //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                        // Contamos los ForeingKey que tiene el recurso
                        $countFkLevel2 = count($idsFk1Level2);

                        // Si el recurso solamente cuenta con 1 ForeingKey
                        if($countFkLevel2 == 1){

                            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                            $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                            // Eliminamos los 2 primeros caracteres (id) de nuestro string
                            $resourceJoinLevel2 = substr($idFkLevel2, 2);

                            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                            $useQueryFkLevel2 = ucfirst($resourceJoinLevel2);

                            // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                            $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                            //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                            $getQueryFkLevel2 = new $queryFkJoinLevel2;

                            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                            $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                            // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                            if($hasIdCompanyQueryFkLevel2 == true){
                                $result = $query->create('alias')
                                    ->join('alias.'.$useQueryFk1Level1.' alias2')
                                    ->useQuery('alias2')
                                    ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                    ->useQuery('alias3')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->endUse()
                                    ->paginate($page, $limit);
                            }else{

                                //Pendiente
                                //...
                            }
                        }

                        if($countFkLevel2 == 2){

                            // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                            $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                            // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                            $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                            $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                            // Eliminamos los 2 primeros caracteres (id) de nuestro string
                            $resourceJoin1 = substr($idForeingKeyJoin1, 2);
                            $resourceJoin2 = substr($idForeingKeyJoin2, 2);

                            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                            $useQuery1 = ucfirst($resourceJoin1);
                            $useQuery2 = ucfirst($resourceJoin2);

                            // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                            $queryForeingKeyJoin1 = $useQuery1."Query";
                            $queryForeingKeyJoin2 = $useQuery2."Query";

                            //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                            $getQuery1 = new $queryForeingKeyJoin1;
                            $getQuery2 = new $queryForeingKeyJoin2;

                            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                            $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                            $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                            // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                            if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                                if($hasIdCompanyQ1 == true){
                                    $result = $query->create('alias')
                                        ->join('alias.'.$useQuery1.' alias2')
                                        ->useQuery('alias2')
                                        ->filterByIdCompany($idcompany)
                                        ->endUse()
                                        ->paginate($page, $limit);
                                }
                                if($hasIdCompanyQ2 == true){
                                    $result = $query->create('alias')
                                        ->join('alias.'.$useQuery2.' alias2')
                                        ->useQuery('alias2')
                                        ->filterByIdCompany($idcompany)
                                        ->endUse()
                                        ->paginate($page, $limit);
                                }
                            }else{

                                //Pendiente
                                //...

                            }

                        }
                    }
                }else{

                    // Recursos con ForeingKey que no son Objetos
                    // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                    $idFk1Level1 = $idsFkLevel1[0];

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $resourceJoin1Level1 = substr($idFk1Level1, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
                    $useQueryFk1Level1 = ucfirst($resourceJoin1Level1);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryFkJoin1Level1 = $useQueryFk1Level1."Query";

                    //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                    $getQueryFk1Level1 = new $queryFkJoin1Level1;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');

                    // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                    if($hasIdCompanyQueryFk1Level1 == true){

                        if($hasIdCompanyQueryFk1Level1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->paginate($page, $limit);
                        }

                    }
                }
            }
        }else{
            // Si el $query es del recurso Company
            if($query->getModelName() == 'Company'){
                $result = $query->paginate($page,$limit);
            }else{
                $result = $query->filterByIdCompany($idcompany)->paginate($page,$limit);
            }
        }
        return $result;
    }

    /**
     * @param $query
     * @param $idcompany
     * @param $id
     * @return mixed
     */
    public static function getCompanyIdForDelete($query, $idcompany, $id){

        // Si el $query es  del recurso Company
        if($query->getModelName() == 'Company'){
            $result = $query->create()->findPk($id);
        }

        // Iniciamos los Joins

        // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
        $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

        // Contamos los ForeingKey que tiene el recurso
        $countFkLevel0 = count($fkLevel0);

        // Si el recurso solamente cuenta con 1 ForeingKey
        if($countFkLevel0 == 1){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $resourceJoinLevel1 = substr($idFkLevel1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQueryFkLevel1 = ucfirst($resourceJoinLevel1);

            //Creamos el objeto de las Queries para validar si tienen idcompany como columna
            $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

            $getQueryLevel1 = new $queryFkJoinLevel1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompany = $getQueryLevel1->create()->getTableMap()->hasColumn('idcompany');

            // Si el objeto tiene una columna llamada idcompany
            if($hasIdCompany){
                $result = $query->create('alias')
                    ->join('alias.'.$useQueryFkLevel1.' alias2')
                    ->useQuery('alias2')
                        ->filterByIdCompany($idcompany)
                    ->endUse()
                    ->filterByPrimaryKey($id)
                    ->exists();
            }else{

                //Pendiente
                //...

            }
        }

        // Si el recurso tiene 2 ForeingKeys
        if($countFkLevel0 == 2){

            // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
            $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

            // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
            $idFk1Level1 = $idsFkLevel1[0];
            $idFk2Level1 = $idsFkLevel1[1];

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $resourceJoin1Level1 = substr($idFk1Level1, 2);
            $resourceJoin2Level1 = substr($idFk2Level1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
            $useQueryFk1Level1 = ucfirst($resourceJoin1Level1);
            $useQueryFk2Level1 = ucfirst($resourceJoin2Level1);

            // En este paso ya tenemos UserQuery, ClientQuery, etc..)
            $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
            $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

            //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
            $getQueryFk1Level1 = new $queryFkJoin1Level1;
            $getQueryFk2Level1 = new $queryFkJoin2Level1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
            $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

            // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
            if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                if($hasIdCompanyQueryFk1Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk1Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->filterByPrimaryKey($id)
                        ->exists();
                }
                if($hasIdCompanyQueryFk2Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk2Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->filterByPrimaryKey($id)
                        ->exists();
                }

            }else{

                // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                // Contamos los ForeingKey que tiene el recurso
                $countFkLevel2 = count($idsFk1Level2);

                // Si el recurso solamente cuenta con 1 ForeingKey
                if($countFkLevel2 == 1){

                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $resourceJoinLevel2 = substr($idFkLevel2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQueryFkLevel2 = ucfirst($resourceJoinLevel2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                    //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                    $getQueryFkLevel2 = new $queryFkJoinLevel2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                    // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                    if($hasIdCompanyQueryFkLevel2 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                    ->useQuery('alias3')
                                        ->filterByIdCompany($idcompany)
                                    ->endUse()
                                ->endUse()
                            ->filterByPrimaryKey($id)
                            ->exists();
                    }else{

                        //Pendiente
                        //...
                    }
                }

                if($countFkLevel2 == 2){

                    // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                    $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                    // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                    $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                    $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $resourceJoin1 = substr($idForeingKeyJoin1, 2);
                    $resourceJoin2 = substr($idForeingKeyJoin2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQuery1 = ucfirst($resourceJoin1);
                    $useQuery2 = ucfirst($resourceJoin2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryForeingKeyJoin1 = $useQuery1."Query";
                    $queryForeingKeyJoin2 = $useQuery2."Query";

                    //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                    $getQuery1 = new $queryForeingKeyJoin1;
                    $getQuery2 = new $queryForeingKeyJoin2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                    $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                    // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                    if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                        if($hasIdCompanyQ1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery1.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->filterByPrimaryKey($id)
                                ->exists();
                        }
                        if($hasIdCompanyQ2 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery2.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->filterByPrimaryKey($id)
                                ->exists();
                        }
                    }else{

                        //Pendiente
                        //...

                    }

                }
            }
        }
        return $result;
    }


    /**
     * @param $query
     * @param $resource
     * @param $idcompany
     * @param $page
     * @param $limit
     * @param array $filters
     * @param $order
     * @param $dir
     * @return array
     */
    /*Funcion para ejecutar una consulto a la base de datos. $query debe ser una variable de tipo Query que genera propel por ejemplo:
    ClientQuery, CompanyQuery, BranchQuery, etc....
    */
    public static function executeQuery($query, $resource, $idcompany, $page, $limit, array $filters=null, $order, $dir){

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $query->getParams();
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
                            $query->addOr($resource.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $query->addAnd($resource.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $query->addOr($resource.'.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                          ->add(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $query->filterBy(BasePeer::translateFieldname($resource, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $query->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = ArrayManage::getIdCompanyForList($query, $idcompany, $page, $limit);

        $links = array(
           'self' => array('href' => URL_API.'/'.$resource.'?page='.$result->getPage()),
           'prev' => array('href' => URL_API.'/'.$resource.'?page='.$result->getPreviousPage()),
           'next' => array('href' => URL_API.'/'.$resource.'?page='.$result->getNextPage()),
           'first' => array('href' => URL_API.'/'.$resource),
           'last' => array('href' => URL_API.'/'.$resource.'?page='.$result->getLastPage()),
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
     * @param $filters
     * @param array $allowedFilters
     * @param array $allowedColumns
     * @return array|null
     */
    public static function getFilter_isvalid($filters,array $allowedFilters, array $allowedColumns){
    if(is_array($filters)){ //Verificamos que sea un array
        $validFilters = array();
        foreach ($filters as $filter){
            if(count($filter)==2){ //Por cada elemento de nuestro arreglo, este debe de ser un valor de tipo arreglo con dos elementos[attribute|in,neq,nin,etc] o tres elementeos[attribute|from|to]
                foreach ($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame attribute
                        if(in_array($filter['attribute'], $allowedColumns)){// Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach ($filter as $key=>$value){//Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [in|neq|nin|gt|lt]
                                if(in_array($key, $allowedFilters)){
                                    array_push($validFilters, $filter);
                                }
                            }
                        }
                    }
                }
            }else if(count($filter)==3){
                foreach($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame [attribute]
                        if(in_array($filter['attribute'], $allowedColumns)){ // Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [from]
                                if($key == 'from'){
                                    foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento[to]
                                        if($key == 'to'){
                                            array_push($validFilters,$filter);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!empty($validFilters)){
            return $validFilters;
        }else{
            return null;
        }
    }
    return null;
    }

}