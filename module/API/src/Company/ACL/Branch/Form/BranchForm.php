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
            'options' => array(
                'label' => 'Id Sucursal',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
            'options' => array(
                'label' => 'Id Compañía',
            ),

        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_name',
            'options' => array(
                'label' => 'Sucursal',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_iso_codecountry',
            'options' => array(
                'label' => 'País',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address',
            'options' => array(
                'label' => 'Dirección',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_address2',
            'options' => array(
                'label' => 'Colonia',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_city',
            'options' => array(
                'label' => 'Ciudad',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_state',
            'options' => array(
                'label' => 'Estado',
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'branch_zipcode',
            'options' => array(
                'label' => 'Código postal',
            ),
        ));
    }
}
