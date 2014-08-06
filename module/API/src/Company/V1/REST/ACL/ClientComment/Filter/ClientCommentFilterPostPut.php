<?php 

namespace Company\V1\REST\ACL\ClientComment\Filter;

use Company\V1\REST\ACL\ClientComment\Filter\ClientCommentFilter;


class ClientCommentFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
    public function getInputFilter($userLevel)
    {
        $clientCommentFilter = new ClientCommentFilter();
        $inputFilter = $clientCommentFilter->getInputFilter();
           
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

