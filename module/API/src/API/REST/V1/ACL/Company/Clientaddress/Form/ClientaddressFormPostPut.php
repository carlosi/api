<?php

/**
 * ClientaddressFormPostPut.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Form;

// - ACL - //
use API\REST\V1\ACL\Company\Clientaddress\Form\ClientaddressForm;

/**
 * Class ClientaddressFormPostPut
 * @package API\REST\V1\ACL\Company\Clientaddress\Form
 */
class ClientaddressFormPostPut{

    /**
     * @param $userLevel
     * @return ClientaddressForm
     */
    public static function init($userLevel){

        $ClientaddressForm = new ClientaddressForm();

        switch ($userLevel){

            case 5: {
                $ClientaddressForm->remove('clientaddress_iso_codecountry');

                break;
            }

            case 4: {


                break;
            }

            case 3: {


                $ClientaddressForm->remove('clientaddress_iso_codecountry');
                $ClientaddressForm->add(array(
                    'type' => 'Select',
                    'name' => 'clientaddress_iso_codecountry',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('MX'),
                    ),
                ));

                $ClientaddressForm->remove('clientaddress_iso_codephone');
                $ClientaddressForm->add(array(
                    'type' => 'Select',
                    'name' => 'clientaddress_iso_codephone',
                    'options' => array(
                        'disable_inarray_validator' => true,
                        'value_options' => array('+52'),
                    ),
                ));
                break;
            }

            case 2: {
                break;
            }

            case 1: {
                break;
            }
        }

        return $ClientaddressForm;
    }

}

