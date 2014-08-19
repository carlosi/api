<?php


/**
 * ClientaddressFilter.php
 * BuyBuy
 *
 * Created by Carlos Esparza on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

/*
 * Los comentarios de cada "$inputFilter" son datos del SQL Model dna.
 * En algunos casos el parámetro Not Null es igual a verdadero (NN = true), sin embargo,
 * en algunos filtros, el  parámetro 'require' es 'false',
 * esto se debe a que el campo no es un dato requerido para el usuario, sin embargo,
 * estos datos nosotros los seteamos internamente.
 * Por ejemplo el id del PK, es NN = true en nuetsro SQL Model dna,
 * pero en los filtros ($inputFilter) el parámetro require es falso ('require' => 'false') para que
 * en la tabla el PK sea autoincrementable.
 * Otro ejemplo es el id relacionado a otra tabla,
 * lo seteamos en el Controlador por medio del token, desde el cual obtenemos el idcompany.
 */

namespace API\REST\V1\ACL\Company\Clientaddress\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\Factory as InputFactory;

/**
 * Class ClientaddressFilter
 * @package API\REST\V1\ACL\Company\Clientaddress\Filter
 */
class ClientaddressFilter implements InputFilterAwareInterface
{

    /**
     * @var
     */
    protected $inputFilter;

    /**
     * @param InputFilterInterface $inputFilter
     * @return void|InputFilterAwareInterface
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }

    /**
     * @return InputFilter|InputFilterInterface
     */
    public function getInputFilter()
	{
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            // idclientaddress: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idclientaddress',
                'required' => false,
                'filters'  => array(
                        array('name' => 'Int'),
                ),
            ));

            // idclient: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idclient',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\IsInt',
                    )
                )
            ));

            // clientaddress_iso_codecountry: DataType = VARCHAR(5), NN = false
            $inputFilter->add($factory->createInput(array(
                'name' => 'clientaddress_iso_codecountry',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            )));

            // clientaddress_iso_codephone: DataType = VARCHAR(5), NN = false
            $inputFilter->add($factory->createInput(array(
                'name' => 'clientaddress_iso_codephone',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            )));

            // clientaddress_addressee: DataType = VARCHAR(45), NN = true
            $inputFilter->add(array(
                'name' => 'clientaddress_addressee',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            ));

            // clientaddress_addressee_cellular: DataType = VARCHAR(16), NN = false
            $inputFilter->add(array(
                'name' => 'clientaddress_addressee_cellular',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '16',
                        ),
                    ),
                ),
            ));

            // dlientaddress_addressee_phone: DataType = VARCHAR(16), NN = false
            $inputFilter->add(array(
                'name' => 'clientaddress_addressee_phone',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '16',
                        ),
                    ),
                ),
            ));

            // dlientaddress_address: DataType = VARCHAR(45), NN = true
            $inputFilter->add(array(
                'name' => 'clientaddress_address',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            ));

            // dlientaddress_address2: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'clientaddress_address2',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            ));

            // dlientaddress_city: DataType = VARCHAR(45), NN = true
            $inputFilter->add(array(
                'name' => 'clientaddress_city',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            ));

            // dlientaddress_state: DataType = VARCHAR(45), NN = true
            $inputFilter->add(array(
                'name' => 'clientaddress_state',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '45',
                        ),
                    ),
                ),
            ));

            // dlientaddress_zipcode: DataType = VARCHAR(5), NN = true
            $inputFilter->add(array(
                'name' => 'clientaddress_zipcode',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '5',
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
	
}

?>

