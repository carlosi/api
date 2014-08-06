<?php 

namespace Company\V1\REST\ACL\Staff\Filter;

use Company\V1\REST\ACL\Staff\Filter\StaffFilter;


class StaffFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $staffFilter = new StaffFilter();
        $inputFilter = $staffFilter->getInputFilter();
           
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

