<?php 

namespace REST\v1\Project\ACL\ProjectActivityUser\Filter;

use REST\v1\Project\ACL\ProjectActivityUser\Filter\ProjectActivityUserFilter;


class ProjectActivityUserFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $projectActivityUserFilter = new ProjectActivityUserFilter();
        $inputFilter = $projectActivityUserFilter->getInputFilter();
           
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

