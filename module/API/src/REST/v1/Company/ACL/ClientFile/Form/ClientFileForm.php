<?php

namespace REST\v1\Company\ACL\ClientFile\Form;

use Zend\Form\Form;

class ClientFileForm extends Form{

    public function __construct(){
        parent::__construct('ClientFileForm');

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

