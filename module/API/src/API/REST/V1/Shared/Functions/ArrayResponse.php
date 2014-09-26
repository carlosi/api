<?php

namespace API\REST\V1\Shared\Functions;

use Zend\View\Model\JsonModel;

class ArrayResponse{

    public static function getResponse($code, $title = null, $message = null, $response=null){

            switch ($code){

                case 400:{
                    if(isset($response)){
                        $response->setStatusCode(400); //BAD REQUEST
                    }
                    //Resource data pre-validation error
                    if($message!=null){
                        $body = array(
                            'error' => array(
                                'status_code' => 400 . ' Bad Request',
                                'title' => isset($title) ? $title : 'Resource data pre-validation error',
                                'details' => $message,
                                'more_info' => URL_API_DOCS
                            ),
                        );
                    }else{
                        $body = array(
                            'error' => array(
                                'status_code' => 400 . ' Bad Request',
                                'title' => 'Bad Request',
                                'details' => 'The request cannot be fulfilled due to bad syntax.',
                                'more_info' => URL_API_DOCS
                            ),
                        );
                        break;
                    }
                    break;
                }
                case 403:{
                    if(isset($response)){
                        $response->setStatusCode(403); //Forbidden
                    }
                    //Resource data pre-validation error
                    if($message!=null){
                        $body = array(
                            'error' => array(
                                'status_code' => 403,
                                'title' => 'Forbidden' ,
                                'details' => 'The request was a valid request, but the server is refusing to respond to it.',
                                'more_info' => URL_API_DOCS
                            ),
                        );
                    }else{
                        $body = array(
                            'error' => array(
                                'status_code' => 403,
                                'title' => 'Forbidden' ,
                                'details' => 'The request was a valid request, but the server is refusing to respond to it.',
                                'more_info' => URL_API_DOCS
                            ),
                        );
                        break;
                    }
                    break;
                }
                default:{
                        $status			= "error";
                        $description            = "Code Unknown";
                        break;
                }
            }

            return $body;

	}

	public function getCode($code=null){

		$description 	= null;
		$status		= null;

		switch ($code){
			case 200:{
				$status			= "success";
				$description            = "OK";
				break;
			}
			case 201:{
				$status			= "success";
				$description            = "Created";
				break;
			}
			default:{
				$status			= "error";
				$description            = "Code Unknown";
				break;
			}
		}

		return array(
			"status"		=> $status,
			"code" 			=> $code,
			"description"           => $description,
		);

	}



}

?>
