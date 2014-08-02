<?php
namespace REST\v1\Production\ACL\ProductionOrderComment\Form;

use REST\v1\Production\ACL\ProductionOrderComment\Form\ProductionOrderCommentForm;

class ProductionOrderCommentFormGET{

    public static function init($userLevel){

        $productionOrderCommentForm = new ProductionOrderCommentForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $productionOrderCommentForm->remove('productionordercomment_comment');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $productionOrderCommentForm;
    }

}

