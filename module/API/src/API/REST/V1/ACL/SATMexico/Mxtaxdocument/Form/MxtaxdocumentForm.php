<?php

/**
 * MxtaxdocumentForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MxtaxdocumentForm
 * @package API\REST\V1\ACL\SATMexico\Mxtaxdocument\Form
 */
class MxtaxdocumentForm extends Form
{
    public function __construct(){
        parent::__construct('MxtaxdocumentForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idmxtaxdocument',
            'options' => array(
                'label' => 'Id factura, documento mexicano'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idclienttax',
            'options' => array(
                'label' => 'Id factura del cliente'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idorder',
            'options' => array(
                'label' => 'Id Orden'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_folio',
            'options' => array(
                'label' => 'Folio de la factura, documento mexicano'
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_version',
            'options' => array(
                'label' => 'Versión de la factura, documento mexicano'
            ),
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
                'label' => 'Tipo de factura, documento mexicano'
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
                'label' => 'Estado de factura, documento mexicano'
            ),
            'attributes' => array(
                'CANCELLED' => 'CANCELLED' //set selected to 'CANCELLED'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_url_xml',
            'options' => array(
                'label' => 'URL del XML de la factura, documento mexicano'
            )
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'mxtaxdocument_url_pdf',
            'options' => array(
                'label' => 'URL del PDF de la factura, documento mexicano'
            )
        ));
    }
}
