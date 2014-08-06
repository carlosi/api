<?php
namespace SATMexico\ACL\MxTaxDocument\Form;

use SATMexico\ACL\MxTaxDocument\Form\MxTaxDocumentForm;

class MxTaxDocumentFormPostPut{

    public static function init($userLevel){

        $mxTaxDocumentForm = new MxTaxDocumentForm();

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

        return $mxTaxDocumentForm;
    }

}

