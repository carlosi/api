<?php 

namespace Shared\Functions;

use UseraclQuery;
use Exception;
use TokenQuery;
use UserQuery;
use Useracl;

class SessionManager {
	
	
	public static function getPropertyValuesOfBody($entityBody=null,$postdata){
	
		$postdata = (array) $postdata->getPost();
		
		// Si la petición viene por POST
		if(count($postdata)>0){
			
		
			$array_data = array();
			foreach ($postdata as $data=>$value){
				$array_data[$data] = $value;
			}
			
			
			return json_encode($array_data);
		} 
		// Si la petición viene por BODY
		elseif ($entityBody!=null){
			
			$entity_array = json_decode($entityBody,true);
			return  $entity_array;
		
		// La petición es por BODY pero Nula.		
		}else{
			
			return false;
		
		}
	}

        public static function getUserLevels($iduser){
            $array_levels = array();
            $user = new Useracl();
            if (is_int($iduser)){
                $userLevel = UseraclQuery::create()->filterByIduser($iduser)->find();
                foreach($userLevel as $level){
                    $array_levels[$level->getModuleName()] = $level->getUserAccesslevel();
                }
                return $array_levels;
            }       
	}
        
        public static function getUserLevelToCompany($iduser){
            if (is_int($iduser)){
                $userLevel = UseraclQuery::create()->findByIduser($iduser);
                foreach($userLevel as $level){
                    if($level->getModuleName() == "company"){
                        return (int)$level->getUserAccesslevel();
                    }
                }
               return 0;
            }
	}
        
	public static function getUserLevelToSales($iduser){
            if (is_int($iduser)){
                $userLevel = UseraclQuery::create()->filterByIduser($iduser)->find();
                foreach($userLevel as $level){
                    if($level->getModuleName() == "sales"){
                        return (int) $level->getUserAccesslevel();
                    }
                }
                return false;
            }
	}
        
	public static function getUserLevelToContents($iduser){
            if (is_int($iduser)){
                $userLevel = UseraclQuery::create()->filterByIduser($iduser)->find();
                foreach($userLevel as $level){
                    if($level->getModuleName() == "contents"){
                        return (int) $level->getUserAccesslevel();
                    }
                }
                return false;
            }
	}
        
	public static function getUserLevelToManufacture($iduser){
            if (is_int($iduser)){
                $userLevel = UseraclQuery::create()->filterByIduser($iduser)->find();
                foreach($userLevel as $level){
                    if($level->getModuleName() == "manufacture"){
                        return (int) $level->getUserAccesslevel();
                    }
                }
                return false;
            }
	}
        
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
        
	public static function getIDCompany($token=null){
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
}

?>