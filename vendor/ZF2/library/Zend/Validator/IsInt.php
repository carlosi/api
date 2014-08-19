<?php

/**
 * IsInt.php
 * BuyBuy
 *
 * Created by Daniel Castanedo on 15/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace Zend\Validator;

use Traversable;

class IsInt extends AbstractValidator
{
    const NOT_INT = 'notInt';

    /**
     * Validation failure message template definitions
     *
     * @var array
     */

    protected $messageTemplates = array(
        self::NOT_INT => "must be type Integer",
    );

    public function isValid($value)
    {

        if(intval($value) > 1){
            return true;
        }else{
            $this->error(self::NOT_INT);
            return false;
        }
    }
}