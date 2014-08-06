<?php 

namespace Company\ACL\CompanyAddrtess\Filter;

use Company\ACL\CompanyAddrtess\Filter\CompanyAddrtessFilter;


class CompanyAddrtessFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $companyAddrtessFilter = new CompanyAddrtessFilter();
        $inputFilter = $companyAddrtessFilter->getInputFilter();
           
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

