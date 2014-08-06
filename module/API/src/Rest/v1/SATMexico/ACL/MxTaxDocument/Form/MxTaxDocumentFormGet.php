<?php

namespace SATMexico\ACL\MxTaxDocument\Form;

use SATMexico\ACL\MxTaxDocument\Form\MxTaxDocumentForm;

class MxTaxDocumentFormGET
{
    public static function init($userlevel){
        $mxTaxDocumentForm = new MxTaxDocumentForm();

        switch($userlevel){
            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $mxTaxDocumentForm->remove('mxtaxdocument_folio');
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