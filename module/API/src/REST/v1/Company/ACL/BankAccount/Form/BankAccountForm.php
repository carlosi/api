<?php

namespace REST\v1\Company\ACL\BankAccount\Form;

use Zend\Form\Form;

class BankAccountForm extends Form
{
    public function __construct()
    {
        parent::__construct('BankAccountForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbankaccount',
            'options' => array(
                'label' => 'Id Sucursal'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañía'
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'bankaccount_name',
            'options' => array(
                'label' => 'Cuenta bancaria'
            ),
        ));
    }
}