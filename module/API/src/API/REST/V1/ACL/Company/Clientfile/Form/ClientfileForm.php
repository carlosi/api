<?php

/**
 * ClientfileForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientfile\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ClientfileForm
 * @package API\REST\V1\ACL\Company\Clientfile\Form
 */
class ClientfileForm extends Form{

    public function __construct(){
        parent::__construct('ClientfileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientfile',
            'options' => array(
                'label' => 'Id Archivo'
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
            'name' => 'clientfile_url',
            'options' => array(
                'label' => 'Ruta del archivo'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientfile_note',
            'options' => array(
                'label' => 'Nota'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientfile_uploaddate',
            'options' => array(
                'label' => 'Fecha de creación'
            ),
        ));
    }
}

