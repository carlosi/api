<?php 

namespace REST\v1\Company\ACL\DepartamentMember\Filter;

use REST\v1\Company\ACL\DepartamentMember\Filter\DepartamentMemberFilter;


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

