<?php

namespace Shared\Functions;

use BasePeer;

class ArrayManage{
    
    // Los componentes SELECT de un Form, llevan 2 componentes, la parte Visible al usuario y la invisible. Esta funcion convierte el array recibido para lograr dicha estructura.
    public function duplicatearray(array $array=null){
        if($array!=null){
            $array_new = array();
            for($x=0;$x<count($array);$x++){
                $array_new = array(strtolower($array[$x])=>strtolower($array[$x]))+$array_new;
            }
            return $array_new;
        }else{
            return $array;
        }
    }
    public function duplicatearrayExactly(array $array=null){
        if($array!=null){
            $array_new = array();
            for($x=0;$x<count($array);$x++){
                $array_new = array($array[$x]=>$array[$x])+$array_new;
            }
            return $array_new;
        }else{
            return $array;
        }
    }


    /*Funcion para ejecutar una consulto a la base de datos. $query debe ser una variable de tipo Query que genera propel por ejemplo:
    ClientQuery, CompanyQuery, BranchQuery, etc....
    */
    public static function executeQuery($query, $table, $idcompany,$page,$limit, array $filters=null, $order, $dir){
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $query->getParams();
                var_dump($params);
                if(isset($filter['in'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $query->addOr($table.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                            }
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $query->addOr($table.'.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                          ->add(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $query->orderBy($order, $dir);
        }


        //Page y limit
        $result = $query->filterByIdCompany($idcompany)->paginate($page,$limit);
            
        $links = array(
           'self' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getPage()),
           'prev' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getPreviousPage()),
           'next' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getNextPage()),
           'first' => array('href' => WEBSITE_API.'/'.$table),
           'last' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getLastPage()),
        );
       
        if($result->getPreviousPage() == 1){
            unset($links['prev']);
        }
        if($result->isLastPage()){
            unset($links['next']);
        }
       
        
        $resume = array(
            'currentPage' => $result->getPage(),
            'itemsPerPage' => $result->getMaxPerPage(),
            'totalItems' => $result->count(),
            'lastPage' => $result->getLastPage(),
        );
        
        $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);
        
   
    
        $resultArray = array(
            'links' => $links,
            'resume' => $resume,
            'data' => $data
        );

        //Retornamos nuestro resultado
        return $resultArray;

    }

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