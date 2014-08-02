<?php

namespace REST\v1\Company\ACL\BranchUser\Filter;

use REST\v1\Company\ACL\BranchUser\Filter\BranchUserFilter;


class BranchUserFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter($userLevel)
    {
        $branchUserFilter = new BranchUserFilter();
        $inputFilter = $branchUserFilter->getInputFilter();

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

