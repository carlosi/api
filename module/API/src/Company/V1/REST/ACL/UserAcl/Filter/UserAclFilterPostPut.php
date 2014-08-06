<?php 

namespace Company\V1\REST\ACL\UserAcl\Filter;

use Company\V1\REST\ACL\UserAcl\Filter\UserAclFilter;


class UserAclFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $userAclFilter = new UserAclFilter();
        $inputFilter = $userAclFilter->getInputFilter();
           
        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $inputFilter;
    }
}

?>

