<?php

/**
 * ExpensetransactionFileForm.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Expense\Expensetransactionfile\Form;

// - ZF2 - //
use Zend\Form\Form;

/**
 * Class ExpensetransactionfileForm
 * @package API\REST\V1\ACL\Expense\Expensetransactionfile\Form
 */
class ExpensetransactionfileForm extends Form
{
    public function __construct(){
        parent::__construct('ExpensetransactionfileForm');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransactionfile',
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'idexpensetransaction'
        ));
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'expensetransactionfile_url',
        ));
    }
}