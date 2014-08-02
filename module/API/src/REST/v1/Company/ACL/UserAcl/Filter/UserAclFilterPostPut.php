<?php 

namespace REST\v1\Company\ACL\UserAcl\Filter;

use REST\v1\Company\ACL\UserAcl\Filter\UserAclFilter;


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

