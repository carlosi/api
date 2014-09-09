<?php

namespace API\REST\V1\Shared\Functions;

use Zend\View\Model\JsonModel;


class ArrayResponse {
	
	public static function getResponseBody($code=null, array $messageArray= null){
            
            switch ($code){
                
                case 403:{
                    $responseBody = array(
                        'Error' => array(
                            'HTTP_Status' => 403 . ' Forbidden',
                            'Title' => 'Access denied',
                            'Details' => 'Sorry but you does not have permission over this resource',
                        ),
                    );
                    break;
                }
                
                case 400:{
                    //Resource data pre-validation error
                    if($messageArray!=null){
                        $responseBody = array(
                            'Error' => array(
                                'HTTP_Status' => 400 . ' Bad Request',
                                'Title' => 'Resource data pre-validation error',
                                'Details' => $messageArray,
                            ),
                        );
                    }else{
                        //.. $mesageArray = null
                    }
                    break;
                }

                default:{
                        $status			= "error";
                        $description            = "Code Unknown";
                        break;
                }
            }
            
            return $responseBody;

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
