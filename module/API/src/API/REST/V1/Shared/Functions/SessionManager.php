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
}

?>