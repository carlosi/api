<?php 

namespace Company\V1\REST\ACL\Departament\Filter;

use Company\V1\REST\ACL\Departament\Filter\DepartamentFilter;


class DepartamentFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $departamentFilter = new DepartamentFilter();
        $inputFilter = $departamentFilter->getInputFilter();
           
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

