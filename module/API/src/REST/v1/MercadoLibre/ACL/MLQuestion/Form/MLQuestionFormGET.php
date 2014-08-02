<?php
namespace REST\v1\MercadoLibre\ACL\MLQuestion\Form;

use REST\v1\MercadoLibre\ACL\MLQuestion\Form\MLQuestionForm;

class MLQuestionFormGET{

    public static function init($userLevel){

        $mlQuestionForm = new MLQuestionForm();

        switch ($userLevel){

            case 5: {


                break;
            }

            case 4: {


                break;
            }

            case 3: {

                $mlQuestionForm->remove('mlquestion_answer');
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $mlQuestionForm;
    }

}

