<?php

namespace Company\ACL\ClientComment\Form;

use Zend\Form\Form;

class ClientCommentForm extends Form
{
    public function __construct(){
        parent::__construct('ClientCommentForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientcomment',
            'options' => array(
                'label' => 'Id Comentario'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclient',
            'options' => array(
                'label' => 'Id Cliente'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientcomment_note',
            'options' => array(
                'label' => 'Nota'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientcomment_date',
            'options' => array(
                'label' => 'Fecha de creación'
            )
        ));
    }
}