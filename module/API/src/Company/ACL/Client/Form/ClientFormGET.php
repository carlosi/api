<?php 
namespace Company\ACL\Client\Form;

use Company\ACL\Client\Form\ClientForm;

class ClientFormGET{
    
    public static function init($userLevel){
        
        $clientForm = new ClientForm();
     
        switch ($userLevel){

            case 5: {
                
                break;
            }
            
            case 4: {               
                

                break;
            }
            
            case 3: {

                    $clientForm->remove('client_password');
                break;
            }
            
            case 2: {
                break;
            }
            
            case 1: {
                break;
            }              
        }

        return $clientForm;
    }
     
    }
    
