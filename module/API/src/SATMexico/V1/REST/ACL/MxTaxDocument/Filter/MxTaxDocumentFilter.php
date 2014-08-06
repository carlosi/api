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

namespace SATMexico\V1\REST\ACL\MxTaxDocument\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

class MxTaxDocumentFilter implements InputFilterAwareInterface
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

                // idmxtaxdocument: DataType = INT, PK = true, NN = true, AI = false
                $inputFilter->add(array(
                    'name'     => 'idmxtaxdocument',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // idclienttax: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'idclienttax',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // idorder: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'idorder',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // mxtaxdocument_folio: DataType = VARCHAR(45), NN = false
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_folio',
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

                // mxtaxdocument_version: DataType = VARCHAR(45), NN = true
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_version',
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

                // mxtaxdocument_type: DataType = ENUM, NN = true
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_type',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('ingreso','egreso'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: ingreso | egreso '
                                ),
                            ),
                        ),
                    ),
                ));

                // mxtaxdocument_status: DataType = ENUM, NN = true
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_status',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim')
                    ),
                    'validators' => array(
                        array(
                            'name' => 'Zend\Validator\InArray',
                            'options' => array(
                                'haystack' => array('CREATED','CANCELLED'),
                                'messages' => array(
                                    'notInArray' => 'is not a valid input. Valid inputs: CREATED | CANCELLED '
                                ),
                            ),
                        ),
                    ),
                ));

                // mxtaxdocument_url_xml: DataType = TEXT, NN = false
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_url_xml',
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
                            ),
                        ),
                    ),
                ));

                // mxtaxdocument_url_pdf: DataType = TEXT, NN = false
                $inputFilter->add(array(
                    'name' => 'mxtaxdocument_url_pdf',
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

