<?php

/**
 * User
 *
 * @author Daniel Castanedo <daniel.b@hostdime.com.mx>
 * @version 1.0
 * 
 */

class User extends BaseUser
{
    
    /**
     * check if an user_nickname exist for some especific company.
     *
     * @param  string $user_nickname
     * @param  int $idCompany
     * @return true if user_nickname exist or false if not
     */
    
    public function UserNicknameExist($user_nickname, $idCompany){

        return UserQuery::create()->filterByUserNickname($user_nickname)->filterByIdcompany($idCompany)->exists();

    }
    
    public function save2($dataArray,$idCompany){
        foreach ($dataArray as $dataKey => $dataValue){
            $this->setByName($dataKey,$dataValue,  BasePeer::TYPE_FIELDNAME);
        }
        $this->setIdcompany($idCompany);
        //$this->save();
    }
    
    
    
}
