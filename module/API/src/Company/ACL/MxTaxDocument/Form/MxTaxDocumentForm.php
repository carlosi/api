<?php

namespace Company\ACL\MxTaxDocument\Form;

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
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'mxtaxdocument_status',
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
