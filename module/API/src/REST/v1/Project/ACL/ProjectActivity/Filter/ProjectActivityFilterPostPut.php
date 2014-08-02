<?php 

namespace REST\v1\Project\ACL\ProjectActivity\Filter;

use REST\v1\Project\ACL\ProjectActivity\Filter\ProjectActivityFilter;


class ProjectActivityFilterPostPut
{
    public function getInputFilter($userLevel)
    {
        $projectActivityFilter = new ProjectActivityFilter();
        $inputFilter = $projectActivityFilter->getInputFilter();
           
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

