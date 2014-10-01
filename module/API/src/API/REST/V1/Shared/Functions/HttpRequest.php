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

// Functions //
use API\REST\V1\Shared\Functions\ArrayResponse;

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
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                    $bodyResponse = array(
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => 'Conflict',
                            'details' => "The body data is incorrect or empty",
                            'more_info' => URL_API_DOCS
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
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                    $bodyResponse = array(
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => 'The body is empty',
                            'details' => "The body can`t be empty",
                            'more_info' => URL_API_DOCS
                        ),
                    );
                    return $bodyResponse;
                }
                break;
            }
        }
    }

    public static function resourceUpdateData($data, $request, $response, $resourceName, $resourceDataArray=null){

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
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                    $bodyResponse = array(
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => 'Conflict',
                            'details' => "The body data is incorrect or empty",
                            'more_info' => URL_API_DOCS
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
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => 'The body is empty',
                            'details' => "The body can`t be empty",
                            'more_info' => URL_API_DOCS
                        ),
                    );
                    return $bodyResponse;
                }
                break;
            }
        }
    }
}