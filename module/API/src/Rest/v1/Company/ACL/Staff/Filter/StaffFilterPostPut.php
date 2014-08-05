<?php 

namespace Company\ACL\Staff\Filter;

use Company\ACL\Staff\Filter\StaffFilter;


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

