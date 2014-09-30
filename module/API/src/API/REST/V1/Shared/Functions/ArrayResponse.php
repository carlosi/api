<?php

namespace API\REST\V1\Shared\Functions;

use Zend\View\Model\JsonModel;

class ArrayResponse{

    public static function getResponse($code, $response=null, $message = null, $title = null){

        switch ($code){

            //// Success ////
            case 200:{
                if(isset($response)){
                    $response->setStatusCode(200);
                }
                if($message!=null){
                    $body = array(
                        'status_code' => 200 . ' OK',
                        'title' => isset($title) ? $title : 'OK' ,
                        'details' => $message,
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }else{

                    $body = array(
                        'HTTP_Status' => 200 . ' OK',
                        'title' => 'OK' ,
                        'details' => 'Successful.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }
                break;
            }
            case 201:{
                if(isset($response)){
                    $response->setStatusCode(201);
                }
                if($message!=null){
                    $body = array(
                        'status_code' => 201 . ' Created',
                        'title' => isset($title) ? $title : 'Created',
                        'details' => $message,
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }else{
                    $body = array(
                        'status_code' => 201 . ' Created',
                        'title' => 'Created',
                        'details' => 'The request has been fulfilled and resulted in a new resource being created.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }
                break;
            }
            case 204:{
                if(isset($response)){
                    $response->setStatusCode(204);
                }
                if($message!=null){
                    $body = array(
                        'status_code' => 204 . ' No Content',
                        'title' => isset($title) ? $title : 'No Content',
                        'details' => $message,
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }else{
                    $body = array(
                        'status_code' => 204 . ' No Content',
                        'title' => 'No Content',
                        'details' => 'The server successfully processed the request, but is not returning any content.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }
                break;
            }
            //// Redirection ////
            case 301:{
                if(isset($response)){
                    $response->setStatusCode(301);
                }
                if($message!=null){
                    $body = array(
                        'status_code' => 301 . ' Moved Permanently',
                        'title' => isset($title) ? $title : 'Moved Permanently',
                        'details' => $message,
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }else{
                    $body = array(
                        'status_code' => 301 . ' Moved Permanently',
                        'title' => 'Moved Permanently',
                        'details' => 'This and all future requests should be directed to the given URI.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }
                break;
            }
            case 304:{
                if(isset($response)){
                    $response->setStatusCode(304);
                }
                if($message!=null){
                    $body = array(
                        'status_code' => 304 . ' Not Modified',
                        'title' => isset($title) ? $title : 'Not Modified',
                        'details' => $message,
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }else{
                    $body = array(
                        'status_code' => 304 . ' Not Modified',
                        'title' => 'Not Modified',
                        'details' => 'The resource has not been modified.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    );
                }
                break;
            }
            //// Client Error ////
            case 400:{
                if(isset($response)){
                    $response->setStatusCode(400);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 400 . ' Bad Request',
                            'title' => isset($title) ? $title : 'Resource data pre-validation error',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 400 . ' Bad Request',
                            'title' => 'Bad Request',
                            'details' => 'The request cannot be fulfilled due to bad syntax.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 402:{
                if(isset($response)){
                    $response->setStatusCode(402);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 402 . ' Payment Required',
                            'title' => isset($title) ? $title : 'Payment Required',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 402 . ' Payment Required',
                            'title' => 'Payment Required',
                            'details' => 'The request was a valid request, but to use the resource it requires purchase the module to which it belongs.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 403:{
                if(isset($response)){
                    $response->setStatusCode(403);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 403 . ' Forbidden',
                            'title' => isset($title) ? $title : 'Forbidden',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 403 . ' Forbidden',
                            'title' => 'Forbidden' ,
                            'details' => 'The request was a valid request, but the server is refusing to respond to it.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 404:{
                if(isset($response)){
                    $response->setStatusCode(404);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 404 . ' Not Found',
                            'title' => isset($title) ? $title : 'Not Found',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 404 . ' Not Found',
                            'title' => 'Not Found' ,
                            'details' => 'The requested resource could not be found.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 405:{
                if(isset($response)){
                    $response->setStatusCode(405);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 405 . ' Method Not Allowed',
                            'title' => isset($title) ? $title : 'Method Not Allowed',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 405 . ' Method Not Allowed',
                            'title' => 'Method Not Allowed' ,
                            'details' => 'A request was made of a resource using a request method not supported by that resource.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 406:{
                if(isset($response)){
                    $response->setStatusCode(406);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 406 . ' Not Acceptable',
                            'title' => isset($title) ? $title : 'Not Acceptable',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 406 . ' Not Acceptable',
                            'title' => 'Not Acceptable' ,
                            'details' => 'The requested resource is only capable of generating content not acceptable according to the Accept headers sent in the request.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 409:{
                if(isset($response)){
                    $response->setStatusCode(409);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => isset($title) ? $title : 'Conflict',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 409 . ' Conflict',
                            'title' => 'Conflict' ,
                            'details' => 'Indicates that the request could not be processed because of conflict in the request.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 415:{
                if(isset($response)){
                    $response->setStatusCode(415);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 415 . ' Unsupported Media Type',
                            'title' => isset($title) ? $title : 'Unsupported Media Type',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 415 . ' Unsupported Media Type',
                            'title' => 'Unsupported Media Type' ,
                            'details' => 'The request entity has a media type which the server or resource does not support.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 498:{
                if(isset($response)){
                    $response->setStatusCode(498);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 498 . ' Token expired/invalid',
                            'title' => isset($title) ? $title : 'Token expired/invalid',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 498 . ' Token expired/invalid',
                            'title' => 'Token expired/invalid' ,
                            'details' => 'Token expired or invalid.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            case 500:{
                if(isset($response)){
                    $response->setStatusCode(500);
                }
                if($message!=null){
                    $body = array(
                        'error' => array(
                            'status_code' => 500 . ' Internal Server Error',
                            'title' => isset($title) ? $title : 'Internal Server Error',
                            'details' => $message,
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }else{
                    $body = array(
                        'error' => array(
                            'status_code' => 500 . ' Internal Server Error',
                            'title' => 'Internal Server Error' ,
                            'details' => 'Internal Server Error.',
                            'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                        ),
                    );
                }
                break;
            }
            default:{
                $body = array(
                    'error' => array(
                        'status_code' => 'Code Unknown',
                        'title' => 'Error' ,
                        'details' => 'Error Unknown.',
                        'more_info' => defined("URL_API_DOCS") ? URL_API_DOCS : 'http://api.rest.buybuy.com.mx/documentation'
                    ),
                );
                break;
            }
        }
        return $body;
	}
}

?>
