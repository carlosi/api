<?php

/**
 * ProductmainFilter.php
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

namespace API\REST\V1\ACL\Contents\Productmain\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

/**
 * Class ProductmainFilter
 * @package API\REST\V1\ACL\Contents\Productmain\Filter
 */
class ProductmainFilter implements InputFilterAwareInterface
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

            // idproductmain: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idproductmain',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idcompany: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idcompany',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // idproductcategory: DataType = INT, NN = true
            $inputFilter->add(array(
                'name'     => 'idproductcategory',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // productmain_name: DataType = VARCHAR(255), NN = true
            $inputFilter->add(array(
                'name'     => 'productmain_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            ));

            // productmain_unit: DataType = ENUM, NN = true
            $inputFilter->add(array(
                'name' => 'productmain_unit',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('KILO','METRO CUADRADO','CABEZA','KILOWATT','KILOWATT/HORA','GRAMO NETO','DOCENAS','GRAMO','METRO CÚBICO','LITRO','MILLAR','TONELADA','DECENAS','CAJA','METRO LINEAL','PIEZA','PAR','JUEGO','BARRIL','CIENTOS','BOTELLA'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: KILO | METRO CUADRADO | CABEZA | KILOWATT | KILOWATT/HORA | GRAMO NETO | DOCENAS | GRAMO | METRO CÚBICO | LITRO | MILLAR | TONELADA | DECENAS | CAJA | METRO LINEAL | PIEZA | PAR | JUEGO | BARRIL | CIENTOS | BOTELLA '
                            ),
                        ),
                    ),
                ),
            ));

            // productmain_discount: DataType = INT, NN = false
            $inputFilter->add(array(
                'name'     => 'productmain_discount',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // productmain_eachpieces: DataType = INT, NN = false
            $inputFilter->add(array(
                'name'     => 'productmain_eachpieces',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // productmain_maxdiscount: DataType = INT, NN = false
            $inputFilter->add(array(
                'name'     => 'productmain_maxdiscount',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            // productmain_baseproperty: DataType = TEXT, NN = true
            $inputFilter->add(array(
                'name'     => 'productmain_baseproperty',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                        ),
                    ),
                ),
            ));

            // productmain_type: DataType = ENUM, NN = false
            $inputFilter->add(array(
                'name' => 'productmain_type',
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\InArray',
                        'options' => array(
                            'haystack' => array('COMPLEMENT','PRODUCT'),
                            'messages' => array(
                                'notInArray' => 'is not a valid input. Valid inputs: COMPLEMENT | PRODUCT '
                            ),
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

