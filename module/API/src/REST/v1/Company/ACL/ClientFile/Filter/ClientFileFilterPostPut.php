<?php 

namespace REST\v1\Company\ACL\ClientFile\Filter;

use REST\v1\Company\ACL\ClientFile\Filter\ClientFileFilter;


class ClientFileFilterPostPut
{

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
    public function getInputFilter($userLevel)
    {
        $clientFileFilter = new ClientFileFilter();
        $inputFilter = $clientFileFilter->getInputFilter();
           
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

