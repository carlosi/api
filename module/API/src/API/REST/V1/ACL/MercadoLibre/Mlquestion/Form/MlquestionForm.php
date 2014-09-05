<?php

/**
 * MlquestionForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\MercadoLibre\Mlquestion\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MlquestionForm
 * @package API\REST\V1\ACL\MercadoLibre\Mlquestion\Form
 */
class MlquestionForm extends Form
{
    public function __construct()
    {
        parent::__construct('MlquestionForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmlquestion',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmlitem',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'iduser',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlnickname',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlquestion_question',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlquestion_questiondate',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlquestion_answer',

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mlquestion_answerdate',

        ));
    }
}
