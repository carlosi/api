<?php 
namespace REST\v1\Shared\Form;

use Zend\Form\Form;
use Shared\Functions\ArrayManage;

class TableFilterForm extends Form
{
    
    public function __construct(array $table_like=null,array $table_order=null,array $order_by=null,array $order=null,array $column_like=null,$words=null)
    {
    	$ArrayManage	= new ArrayManage();
  	
        parent::__construct('FilterForm');
        $this->setAttribute('method', 'post');
       
        
        $this->add(array(
                'type' => 'Select',
                'name' => 'table_like',
        		'options' => array(
                        'value_options' =>$ArrayManage->duplicatearray($table_like),
                 )
        ));
       
        $this->add(array(
         		'type' => 'Select',
         		'name' => 'table_order',
         		'options' => array(
         				'value_options' =>$ArrayManage->duplicatearray($table_order),
         		)
         ));
       
        $this->add(array(
        		'type' => 'Select',
        		'name' => 'order_by',
        		'options' => array(
        				'value_options' =>$ArrayManage->duplicatearray($order_by),
        		)
        ));
       
        $this->add(array(
        		'type' => 'Select',
        		'name' => 'order',
        		'options' => array(
        				'value_options' =>$ArrayManage->duplicatearray($order),
        		)
        ));
        
        $this->add(array(
        		'type' => 'Select',
        		'name' => 'column_like',
        		'options' => array(
        				'value_options' =>$ArrayManage->duplicatearray($column_like),
        		)
        ));
        
        $this->add(array(
        		'type' => 'Text',
        		'name' => 'words',
        		'attributes' => array(
        				'value'  => $words,
        		),
        ));
        
    }
}