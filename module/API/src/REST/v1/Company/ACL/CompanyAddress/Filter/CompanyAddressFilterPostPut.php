<?php 

namespace REST\v1\Company\ACL\CompanyAddress\Filter;

use REST\v1\Company\ACL\CompanyAddress\Filter\CompanyAddressFilter;


class CompanyAddressFilterPostPut
{

    public function getInputFilter($userLevel)
    {
        $companyAddrtessFilter = new CompanyAddressFilter();
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

