<?php

/**
 * ResourceAPI.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\Functions;

// - Propel - //
use Client;
use ClientQuery;
use UseraclQuery;
use TokenQuery;
use UserQuery;
use Exception;

/**
 * Class ResourceAPI
 * @package API\REST\V1\Shared\Functions
 */
class ResourceManager{

    /**
     * @param $resource
     * @return mixed
     */
    public static function getResource($resource){

        //Creamos el objeto del recurso
        $objectResource = new $resource;

        //Insertamos el objetoQuery en nuestra base de datos
        return $objectResource;
    }

    /**
     * @param $resource
     * @return mixed
     */
    public static function getResourceQuery($resource){

        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
        $resourceQuery = $resource."Query";

        //Creamos el objetoQuery del recurso
        $objectResourceQuery = new $resourceQuery;

        //Insertamos el objetoQuery en nuestra base de datos
        return $objectResourceQuery;
    }


    /**
     * @param $resource
     * @return mixed
     */
    public static function getResourceForm($resource){
        // - autoload_classmap.php //
        require __DIR__ . '/../../../../../../autoload_classmap.php';
        $namespaceResource = array();
        foreach($className as $key => $value){
            $namespaceResource[$key] = '\\'.$key;
        }

         // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Creamos el objeto de las FormPostPut
        $namespaceResource = array_search('\\API\\REST\\V1\\ACL\\'.$module.'\\'.$resource.'\\Form\\'.$resource.'Form', $namespaceResource);
        $objetResourceForm = new $namespaceResource;

        //Insertamos el objetoQuery en nuestra base de datos
        return $objetResourceForm;
    }

    /**
     * @param $resource
     * @return mixed
     */
    public static function getResourceFormGET($resource){
        // - autoload_classmap.php //
        require __DIR__ . '/../../../../../../autoload_classmap.php';
        $namespaceResource = array();
        foreach($className as $key => $value){
            $namespaceResource[$key] = '\\'.$key;
        }

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Creamos el objeto de las FormPostPut
        $namespaceResource = array_search('\\API\\REST\\V1\\ACL\\'.$module.'\\'.$resource.'\\Form\\'.$resource.'FormGET', $namespaceResource);
        $objetResourceForm = new $namespaceResource;

        //Insertamos el objetoQuery en nuestra base de datos
        return $objetResourceForm;
    }

    /**
     * @param $resource
     * @return mixed
     */
    public static function getResourceFormPostPut($resource){
        // - autoload_classmap.php //
        require __DIR__ . '/../../../../../../autoload_classmap.php';
        $namespaceResource = array();
        foreach($className as $key => $value){
            $namespaceResource[$key] = '\\'.$key;
        }

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Creamos el objeto de las FormPostPut
        $namespaceResource = array_search('\\API\\REST\\V1\\ACL\\'.$module.'\\'.$resource.'\\Form\\'.$resource.'FormPostPut', $namespaceResource);
        $objetResourceFormPostPut = new $namespaceResource;

        //Insertamos el objetoQuery en nuestra base de datos
        return $objetResourceFormPostPut;
    }

    /**
     * @param $resource
     * @return mixed
     */
    public static function getResourceFilterPostPut($resource){
        // - autoload_classmap.php //
        require __DIR__ . '/../../../../../../autoload_classmap.php';
        $namespaceResource = array();
        foreach($className as $key => $value){
            $namespaceResource[$key] = '\\'.$key;
        }

        // Obtenemos el Modulo (por ejemplo: Company, Sales, Contents, Shipping, etc)
        $module = ResourceManager::getModule($resource);

        //Creamos el objeto de las FormPostPut
        $namespaceResource = array_search('\\API\\REST\\V1\\ACL\\'.$module.'\\'.$resource.'\\Filter\\'.$resource.'FilterPostPut', $namespaceResource);
        $objectResourceFilterPostPut = new $namespaceResource;
        //Insertamos el objetoQuery en nuestra base de datos
        return $objectResourceFilterPostPut;
    }

    /**
     * @param $resource
     * @return mixed
     */
    public static function getModule($resource){
        // - autoload_classmap.php //
        require __DIR__ . '/../../../../../../autoload_classmap.php';

        foreach($className as $key => $value){
            if(substr_count($key, $resource)){
                if(substr_count($key, "Company\\".$resource)){
                    $module = 'Company';
                    break;
                }
                if(substr_count($key, "Contents\\".$resource)){
                    $module = 'Contents';
                    break;
                }
                if(substr_count($key, "Expense\\".$resource)){
                    $module = 'Expense';
                    break;
                }
                if(substr_count($key, "MercadoLibre\\".$resource)){
                    $module = 'MercadoLibre';
                    break;
                }
                if(substr_count($key, "Production\\".$resource)){
                    $module = 'Production';
                    break;
                }
                if(substr_count($key, "Project\\".$resource)){
                    $module = 'Project';
                    break;
                }
                if(substr_count($key, "Sales\\".$resource)){
                    $module = 'Sales';
                    break;
                }
                if(substr_count($key, "SATMexico\\".$resource)){
                    $module = 'SATMexico';
                    break;
                }
                if(substr_count($key, "Shipping\\".$resource)){
                    $module = 'Shipping';
                    break;
                }
            }
        }

        $array = array(
            'Company' => 'Company',
            'Contents' => 'Contents',
            'Expense' => 'Expense',
            'MercadoLibre' => 'MercadoLibre',
            'Production' => 'Production',
            'Project' => 'Project',
            'Sales' => 'Sales',
            'SATMexico' => 'SATMexico',
            'Shipping' => 'Shipping',
        );

        return $array[$module];

    }

    /**
     * @param $iduser
     * @param $module
     * @return int
     */
    public static function getUserLevels($iduser, $module){
        $module = strtolower($module);
        if (is_int($iduser)){
            $userLevel = UseraclQuery::create()->filterByIduser($iduser)->find();
            foreach($userLevel as $level){
                if($level->getModuleName() == $module){
                    return (int)$level->getUserAccesslevel();
                }
            }
            return 0;
        }
    }

    /**
     * @param null $token
     * @return mixed
     * @throws Exception
     */
    public static function getIDUser($token=null){
        if($token != null){
            $token = TokenQuery::create()->filterByToken($token)->findOne();
            if(!empty($token)){
                return $token->getIduser();
            }else{
                throw new Exception('Invalid Token');
            }
        }else{
            throw new Exception('Token can not be null');
        }
    }

    /**
     * @param null $token
     * @return mixed
     * @throws Exception
     */
    static function getIDCompany($token=null){
        if($token != null){
            $token = TokenQuery::create()->filterByToken($token)->findOne();
            if(!empty($token)){
                $idUser = $token->getIduser();
                $user = UserQuery::create()->findOneByIduser($idUser);
                return $user->getIdcompany();
            }else{
                throw new Exception('Invalid Token');
            }
        }else{
            throw new Exception('Token can not be null');
        }
    }

    /**
     * @param $iduser
     * @return mixed
     */
    public static function getValidToken($iduser){
        $currentDate = date('Y-m-d H:i:s');
        $tokenList = \TokenQuery::create()->filterByIduser($iduser)->find();
        foreach ($tokenList as $token){
            if($currentDate < $token->getExpiresIn()){
                return $token;
            }
        }
        //Si no encontro token validos, genera uno nuevo y lo retorna PENDIENTE
    }
    /**
     * @param null $token
     * @return bool
     */
    public static function TokenIsValid($token=null){
        $currentDate = date('Y-m-d H:i:s');
        if($token != null){
            //Verificamos que exista el token en la base de datos.
            $token = TokenQuery::create()->filterByToken($token)->findOne();
            if(!empty($token)){
                //Verificamos que no este expirado
                if($currentDate < $token->getExpiresIn()){
                    return true;
                }else{
                    return false;
                }
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }
}