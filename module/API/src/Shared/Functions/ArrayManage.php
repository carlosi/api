<?php

namespace Shared\Functions;

use Map\UserTableMap;
use Propel\Runtime\Map\TableMap;
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
                }
            }
            
            //Order y Dir
            if($order !=null || $dir !=null){
                $query->orderBy($order, $dir);
            }
            
              
            //Page y limit
            $result = $query->filterByIdCompany($idcompany)->paginate($page,$limit);
            
            $resume = array(
                'current page' => $result->getPage(),
                'items per page' => $result->getMaxPerPage(),
                'total items' => $result->count(),
                'last page' => $result->getLastPage(),
            );
            
            $resultArray = array(
                'resume' => $resume,
                'data' => $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME),
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
                                foreach ($filter as $key=>$value){//Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [in|neq|nin]
                                    if(in_array($key, $allowedFilters)){
                                        array_push($validFilters, $filter);
                                    }
                                }
                            }  
                        }
                    }
                }else if(count($filter)==3){ //PENDIENTE
                    
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