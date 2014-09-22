<?php

/**
 * HttpRequest.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\Functions;

// - ZF2 - //
use Zend\Http\Response;
use Zend\View\Model\JsonModel;

/**
 * Class HttpRequest
 * @package API\REST\V1\Shared\Functions
 */
class HttpRequest
{
    /**
     * @param $data
     * @param $request
     * @param $response
     * @param $resource
     * @return array|JsonModel
     */
    public static function resourceCreateData($data, $request, $response, $resourceName){

        // Instanciamos el Formulario "resourceForm"
        $resourceForm = ResourceManager::getResourceForm($resourceName);

        // Obtenemos los elementos del Formulario "resourceForm"
        $elementsForm = $resourceForm->getElements();

        // Obtenemos el Content-Type del request
        $requestContentType = $request->getHeaders('ContentType')->getMediaType();

        switch ($requestContentType){
            case 'application/x-www-form-urlencoded':{

                if($data != null){
                    $dataArray = array();
                    foreach($elementsForm as $key=>$value){
                        if(isset($data[$key])){
                            $dataArray[$key] = $data[$key] ? $data[$key] : null;
                        }
                    }
                    return $dataArray;

                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The body is empty',
                            'Details' => "The body can`t be empty'",
                        ),
                    );
                    return $bodyResponse;
                }
                break;
            }
            case 'application/json':{

                $requestContent = $request->getContent();
                $requestArray = json_decode($requestContent, true);

                if($data != null){

                    $dataArray = array();
                    foreach($elementsForm as $key=>$value){
                        $dataArray[$key] = isset($requestArray[$key]) ? $requestArray[$key] : null;
                    }
                    return $dataArray;
                }else{
                    //Modifiamos el Header de nuestra respuesta
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
        }
    }

    public static function resourceUpdateData($data, $request, $response, $resourceName, $resourceDataArray){

        // Instanciamos el Formulario "resourceForm"
        $resourceForm = ResourceManager::getResourceForm($resourceName);

        // Obtenemos los elementos del Formulario "resourceForm"
        $elementsForm = $resourceForm->getElements();

        // Obtenemos el Content-Type del request
        $requestContentType = $request->getHeaders('ContentType')->getMediaType();

        switch ($requestContentType){
            case 'application/x-www-form-urlencoded':{

                if($data != null){
                    $dataArray = array();
                    foreach($elementsForm as $key=>$value){
                        if(isset($data[$key])){
                            $dataArray[$key] = $data[$key] ? $data[$key] : $resourceDataArray[$key];
                        }
                    }
                    return $dataArray;

                }else{
                    //Modifiamos el Header de nuestra respuesta
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                    $bodyResponse = array(
                        'Error' => array(
                            'HTTP_Status' => 400 . ' Bad Request',
                            'Title' => 'The body is empty',
                            'Details' => "The body can`t be empty'",
                        ),
                    );
                    return $bodyResponse;
                }
                break;
            }
            case 'application/json':{

                $requestContent = $request->getContent();
                $requestArray = json_decode($requestContent, true);

                if($data != null){

                    $dataArray = array();
                    foreach($elementsForm as $key=>$value){
                        $dataArray[$key] = isset($requestArray[$key]) ? $requestArray[$key] : $resourceDataArray[$key];
                    }
                    return $dataArray;
                }else{
                    //Modifiamos el Header de nuestra respuesta
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
        }
    }
}