<?php

namespace Company\ACL\ClientFile;

use Zend\Form\Form;

class ClientFileForm extends Form{

    public function __construct(){
        parent::__construct('ClientFileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclientfile',

        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'idclient',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientfile_url',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientfile_note',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'clientfile_uploaddate',
        ));
    }
}

