<?php 

namespace REST\v1\Project\ACL\ProjectActivityPost\Filter;

use REST\v1\Project\ACL\ProjectActivityPost\Filter\ProjectActivityPostFilter;


class ProjectActivityPostFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $projectActivityPostFilter = new ProjectActivityPostFilter();
        $inputFilter = $projectActivityPostFilter->getInputFilter();
           
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

