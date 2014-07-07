<?php
namespace Company\ACL\Branch\Form;

use Zend\Form\Form;

class BranchForm extends Form
{
    public function __construct()
    {
        parent::__construct('BranchForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idbranch',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_name',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'branch_iso_codecountry',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'MX' => 'MX',
                    'US' => 'US',
                    'ES' => 'ES'
                ),
            ),
            'attributes' => array(
                'MX' => 'MX' //set selected to 'MX'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address2',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_city',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_state',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_zipcode',
        ));
    }
}
