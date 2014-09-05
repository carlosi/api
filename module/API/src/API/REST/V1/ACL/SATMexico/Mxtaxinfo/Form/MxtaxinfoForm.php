<?php

/**
 * MxtaxinfoForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class MxtaxinfoForm
 * @package API\REST\V1\ACL\SATMexico\Mxtaxinfo\Form
 */
class MxtaxinfoForm extends Form
{
    public function __construct(){
        parent::__construct('MxtaxinfoForm');

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