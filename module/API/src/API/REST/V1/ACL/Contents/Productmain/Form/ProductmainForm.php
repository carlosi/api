<?php

/**
 * ProductmainForm.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Contents\Productmain\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ProductmainForm
 * @package API\REST\V1\ACL\Contents\Productmain\Form
 */
class ProductmainForm extends Form
{
    public function __construct()
    {
        parent::__construct('ProductmainForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductmain',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idcompany',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idproductcategory',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_name',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmain_unit',
            'options' => array(
                'disable_inarray_validator' => true,
                'value_options' => array(
                    'KILO' => 'KILO',
                    'METRO CUADRADO' => 'METRO CUADRADO',
                    'CABEZA' => 'CABEZA',
                    'KILOWATT' => 'KILOWATT',
                    'KILOWATT/HORA' => 'KILOWATT/HORA',
                    'GRAMO NETO' => 'GRAMO NETO',
                    'DOCENAS' => 'DOCENAS',
                    'GRAMO' => 'GRAMO',
                    'METRO CÚBICO' => 'METRO CÚBICO',
                    'LITRO' => 'LITRO',
                    'MILLAR' => 'MILLAR',
                    'TONELADA' => 'TONELADA',
                    'DECENAS' => 'DECENAS',
                    'CAJA' => 'CAJA',
                    'METRO LINEAL' => 'METRO LINEAL',
                    'PIEZA' => 'PIEZA',
                    'PAR' => 'PAR',
                    'JUEGO' => 'JUEGO',
                    'BARRIL' => 'BARRIL',
                    'CIENTOS' => 'CIENTOS',
                    'BOTELLA' => 'BOTELLA',
                ),
            ),
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_discount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_eachpieces',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_maxdiscount',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'productmain_baseproperty',
        ));
        $this->add(array(
            'type' => 'Select',
            'name' => 'productmain_type',
            'options' => array(
                'disable_inarray_validator' => true,
                'vañue_options' => array(
                    'COMPLEMENT' => 'COMPLEMENT',
                    'PRODUCT' => 'PRODUCT',
                ),
            ),
        ));
    }
}
