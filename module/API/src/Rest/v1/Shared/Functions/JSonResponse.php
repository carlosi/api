<?php 
namespace Shared\Functions;

use Zend\View\Model\JsonModel;


class JSonResponse {
	
	public function getResponse($code=null,array $data=null){
            
		$codeDetails = $this->getCode($code);
		
		$response = array(
				"status"		=>	$codeDetails["status"],
				"code"			=>	$codeDetails["code"],
				"description"           =>	$codeDetails["description"],
		);
		
		if($data!=null){
                    $response["data"] = $data;
		}
		$responseJson = new JsonModel($response);
		$responseJson->setTerminal(true);
		return $responseJson;
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