<?php
namespace Production\V1\REST\ACL\ProductionOrderComment\Form;

use Production\V1\REST\ACL\ProductionOrderComment\Form\ProductionOrderCommentForm;

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

