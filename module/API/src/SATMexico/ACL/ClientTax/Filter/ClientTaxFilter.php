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

namespace SATMexico\ACL\ClientTax\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class ClientTaxFilter implements InputFilterAwareInterface
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

                // idclienttax: DataType = INT, PK = true, NN = true, AI = true
                $inputFilter->add(array(
                    'name'     => 'idclienttax',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // idclient: DateType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'idclient',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // clienttax_iso_codecountry: DataType = VARCHAR(5), NN = false
                $inputFilter->add(array(
                    'name' => 'clienttax_iso_codecountry',
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
                                'max' => '5',
                            ),
                        ),
                    ),
                ));

                // clienttax_iso_codephone: DataType = VARCHAR(5), NN = false
                $inputFilter->add(array(
                    'name' => 'clienttax_iso_codephone',
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
                                'max' => '5',
                            ),
                        ),
                    ),
                ));

                // clienttax_name: DataType = VARCHAR(90), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_name',
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
                                'max' => '90',
                            ),
                        ),
                    ),
                ));

                // clienttax_taxesid: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_taxesid',
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

                // clienttax_address: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_address',
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

                // clienttax_address2: DataType = VARCHAR(45), NN = false
                $inputFilter->add(array(
                    'name' => 'clienttax_address2',
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

                // clienttax_city: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_city',
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

                // clienttax_state: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_state',
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

                // clienttax_zipcode: DataType = VARCHAR(5), NN = true
                $inputFilter->add(array(
                    'name' => 'clienttax_zipcode',
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

