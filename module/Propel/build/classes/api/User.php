<?php

/**
 * User
 *
 * @author Daniel Castanedo <daniel.b@hostdime.com.mx>
 * @version 1.0
 * 
 */

use Zend\View\Model\JsonModel;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;

class User extends BaseUser
{
    
    /**
     * check if an user_nickname exist for some especific company.
     *
     * @param  string $user_nickname
     * @param  int $idCompany
     * @return bodyResponse if user_nickname exist or false if not
     */
    
    public function UserNicknameExist($user_nickname, $idCompany){
        
        if(UserQuery::create()->filterByUserNickname($user_nickname)->filterByIdcompany($idCompany)->exists()){
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 400 . ' Bad Request',
                    'Title' => 'Resource data pre-validation error',
                    'Details' => "user_nickname ". "'".$user_nickname."'". " already exists",
                ),
            );    
            return $bodyResponse; 
        }else{
            return false;
        }
    }
    
    /**
     * check if an iduser exist for some especific company.
     *
     * @param  int iduser
     * @param  int $idcompany
     * @return bodyResponse if user_nickname exist or false if not
     */
    
    public function IdUserExist($iduser, $idCompany){
        
        if(UserQuery::create()->filterByIduser($iduser)->filterByIdcompany($idCompany)->exists()){
            return true;
        }else{
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 404 . 'Not Found',
                    'Title' => 'Not Found',
                    'Details' => "id not found",
                    'More Info' => URL_API_DOCS,
                ),
            );    
            return $bodyResponse; 
        }
    }   
}

?>