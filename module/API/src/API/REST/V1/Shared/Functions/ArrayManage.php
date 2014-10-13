<?php

/**
 * ArrayManage.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\Functions;

// - Propel - //
use BasePeer;

/**
 * Class ArrayManage
 * @package API\REST\V1\Shared\Functions
 */
class ArrayManage
{
    /**
     * @param $filters
     * @param array $allowedFilters
     * @param array $allowedColumns
     * @return array|null
     */
    public static function getFilter_isvalid($filters,array $allowedFilters, array $allowedColumns){

    if(is_array($filters)){ //Verificamos que sea un array
        $validFilters = array();
        foreach ($filters as $filter){
            if(count($filter)==2){ //Por cada elemento de nuestro arreglo, este debe de ser un valor de tipo arreglo con dos elementos[attribute|in,neq,nin,etc] o tres elementeos[attribute|from|to]
                foreach ($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame attribute
                        if(in_array($filter['attribute'], $allowedColumns)){// Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach ($filter as $key=>$value){//Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [in|neq|nin|gt|lt]
                                if(in_array($key, $allowedFilters)){
                                    array_push($validFilters, $filter);
                                }
                            }
                        }
                    }
                }
            }else if(count($filter)==3){
                foreach($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame [attribute]
                        if(in_array($filter['attribute'], $allowedColumns)){ // Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [from]
                                if($key == 'from'){
                                    foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento[to]
                                        if($key == 'to'){
                                            array_push($validFilters,$filter);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!empty($validFilters)){
            return $validFilters;
        }else{
            return null;
        }
    }
    return null;
    }
}