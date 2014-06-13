<?php
/**
 * Created by PhpStorm.
 * User: carlosesparza
 * Date: 09/05/14
 * Time: 12:52
 */

namespace Sales\ACL\ProductCategoryPropertyOption;

use  Sales\Acl\ProductCategoryPropertyOption\ProductCategoryPropertyOptionForm;

class ProductCategoryPropertyOptionFormGET
{
    public static function init($userlevel){
        $productCategoryPropertyOptionForm = new ProductCategoryPropertyOptionForm();

        switch($userlevel){

            case 5: {

                break;
            }
            case 4: {

                break;
            }
            case 3: {

                $productCategoryPropertyOptionForm->remove('productcategorypropertyoption_name');
                break;
            }
            case 2: {

                break;
            }
            case 1: {

                break;
            }
        }

        return $productCategoryPropertyOptionForm;
    }
} 