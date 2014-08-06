<?php 

namespace Project\V1\REST\ACL\Project\Filter;

use Project\V1\REST\ACL\Project\Filter\ProjectFilter;


class ProjectFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $projectFilter = new ProjectFilter();
        $inputFilter = $projectFilter->getInputFilter();
           
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

