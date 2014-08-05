<?php

namespace SATMexico\ACL\MxTaxDocument\Form;

use Zend\Form\Form;

class MxTaxDocumentForm extends Form
{
    public function __construct(){
        parent::__construct('MxTaxDocumentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmxtaxdocument',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclienttax',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_folio',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_version',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'mxtaxdocument_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'ingreso' => 'ingreso',
                    'egreso'  => 'egreso',
                ),
            ),
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'mxtaxdocument_status',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'CREATED'   => 'CREATED',
                    'CANCELLED' => 'CANCELLED',
                ),
            ),
            'attributes' => array(
                'CANCELLED' => 'CANCELLED' //set selected to 'CANCELLED'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_url_xml',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_url_pdf',
        ));
    }
}
