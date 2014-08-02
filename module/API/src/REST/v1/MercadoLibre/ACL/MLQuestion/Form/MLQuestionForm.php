<?php
namespace REST\v1\MercadoLibre\ACL\MLQuestion\Form;

use Zend\Form\Form;


class MLQuestionForm extends Form
{
    public function __construct()
    {
        parent::__construct('MLQuestionForm');
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
