<?php 
namespace Company\V1\REST\ACL\Client\Form;

use Company\V1\REST\ACL\Client\Form\ClientForm;

class ClientFormGET{
    
    public static function init($userLevel){
        
        $clientForm = new ClientForm();
     
        switch ($userLevel){

            case 5: {
                $clientForm->remove('client_iso_codecountry');
                //$clientForm->remove('client_iso_codephone');
                //$clientForm->remove('client_email');
                //$clientForm->remove('client_email2');
                //$clientForm->remove('client_password');
                //$clientForm->remove('client_cellular');
                $clientForm->remove('client_phone');
                //$clientForm->remove('client_language');
                //$clientForm->remove('client_type');

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
    
