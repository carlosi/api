<?php

/**
 * ClientcommentForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientcomment\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ClientcommentForm
 * @package API\REST\V1\ACL\Company\Clientcomment\Form
 */
class ClientcommentForm extends Form
{
    public function __construct(){
        parent::__construct('ClientcommentForm');
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