<?php

/**
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

namespace REST\v1\Company\ACL\CompanyAddress\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class CompanyAddressFilter implements InputFilterAwareInterface
{

    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
            throw new \Exception("Not used");
    }
    
	public function getInputFilter()
	{
        if(!$this->inputFilter)
        {
            $inputFilter = new InputFilter();

            // idcompanyaddress: DataType = INT, PK = true, NN = true, AI = true
            $inputFilter->add(array(
                'name'     => 'idcompanyaddress',
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

            // companyaddress_iso_codecountry: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_iso_codecountry',
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

            // companyaddress_iso_codephone: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_iso_codephone',
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

            // companyaddress_addressee: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_addressee',
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

            // companyaddress_addressee_cellular: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_addressee_cellular',
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

            // companyaddress_addressee_phone: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_addressee_phone',
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

            // companyaddress_address: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_address',
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

            // companyaddress_address2: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_address2',
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

            // companyaddress_city: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_city',
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

            // companyaddress_state: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_state',
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

            // companyaddress_zipcode: DataType = VARCHAR(45), NN = false
            $inputFilter->add(array(
                'name' => 'companyaddress_zipcode',
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
	
}

?>

