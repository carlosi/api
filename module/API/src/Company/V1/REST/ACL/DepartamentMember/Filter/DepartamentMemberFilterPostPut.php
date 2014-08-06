<?php 

namespace Company\V1\REST\ACL\DepartamentMember\Filter;

use Company\V1\REST\ACL\DepartamentMember\Filter\DepartamentMemberFilter;


class DepartamentMemberFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $departamentMemberFilter = new DepartamentMemberFilter();
        $inputFilter = $departamentMemberFilter->getInputFilter();
           
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

