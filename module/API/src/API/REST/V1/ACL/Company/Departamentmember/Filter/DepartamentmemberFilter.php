<?php

/**
 * DepartamentmemberFilter.php
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

namespace API\REST\V1\ACL\Company\Departamentmember\Filter;

// - ZF2 - //
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

/**
 * Class DepartamentmemberFilter
 * @package API\REST\V1\ACL\Company\Departamentmember\Filter
 */
class DepartamentmemberFilter implements InputFilterAwareInterface
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

                // iddepartamentmember: DataType = INT, PK = true, NN = true, AI = true
                $inputFilter->add(array(
                    'name'     => 'iddepartamentmember',
                    'required' => false,
                    'filters'  => array(
                                    array('name' => 'Int'),
                    ),
                ));

                // iddepartament: DataType = INT,  NN = true
                $inputFilter->add(array(
                    'name'     => 'iddepartament',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                // iduser: DataType = INT, NN = true
                $inputFilter->add(array(
                    'name'     => 'iduser',
                    'required' => false,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                ));

                $this->inputFilter = $inputFilter;
            }

            return $this->inputFilter;
    }
	
}

?>

