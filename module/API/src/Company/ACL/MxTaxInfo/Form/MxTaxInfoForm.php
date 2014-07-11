<?php

namespace Company\ACL\MxTaxInfo\Form;

use Zend\Form\Form;

class MxTaxInfoForm extends Form
{
    public function __construct(){
        parent::__construct('MxTaxInfoForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmxtaxinfo',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxinfo_rfc',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxinfo_razonsocial',
        ));
    }
}