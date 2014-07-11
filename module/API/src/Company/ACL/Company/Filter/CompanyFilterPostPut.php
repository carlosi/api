<?php 

namespace Company\ACL\Company\Filter;

use Company\ACL\Company\Filter\CompanyFilter;


class CompanyFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $companyFilter = new CompanyFilter();
        $inputFilter = $companyFilter->getInputFilter();
           
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

