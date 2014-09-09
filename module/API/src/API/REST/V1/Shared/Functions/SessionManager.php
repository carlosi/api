<?php 

namespace API\REST\V1\Shared\Functions;

use BranchUserAcl;
use Exception;
use TokenQuery;
use UserQuery;
use Useracl;

class SessionManager {

        
    public static function getUserLevelToCompany($iduser){
        if (is_int($iduser)){
            $userLevel = BranchUserAclQuery::create()->findByIduser($iduser);
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
            $userLevel = BranchUserAclQuery::create()->filterByIduser($iduser)->find();
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
            $userLevel = BranchUserAclQuery::create()->filterByIduser($iduser)->find();
            foreach($userLevel as $level){
                if($level->getModuleName() == "contents"){
                    return (int) $level->getUserAccesslevel();
                }
            }
            return false;
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

?>