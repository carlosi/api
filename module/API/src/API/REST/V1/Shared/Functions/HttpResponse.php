<?php

/**
 * HttpResponse
 *
 * @author Daniel Castanedo <daniel.b@hostdime.com.mx>
 * @version 1.0
 *
 */

namespace API\REST\V1\Shared\Functions;

use Zend\Http\Response;

class HttpResponse {

    public static function createBodyResponse($resource, array $voidElements = null, array $allowedColumns,array $halResources=null, array $halCollection=null){
        
        //Guardamos en un arrglo los datos de nuestro recurso
        $resourceArray = $resource->toArray(\BasePeer::TYPE_FIELDNAME);
        
        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($resourceArray[$element]);
            }
        }
   
        //Comnezamos a darle formato a nuestra respuesta.
        
        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.RESOURCE.'/'.$resource->getPrimaryKey()
                ),
            ),
        );

        //Los datos del recurso
        
        foreach ($resourceArray as $resourceKey => $resourceValue){
            $body[$resourceKey] = $resourceValue; // Los datos del recurso
        }
         
         //Verificamos si hay elementos recursos _embebed
         if($halResources!=null){    
             foreach ($halResources as $halResource){
                 if($halResource!=null){
                    if(!isset($body['_embedded'])){
                        $body['_embedded'] = array(
                            strtolower(get_class($halResource)) => array(
                               "_links" => array(
                                   "self" => array(
                                       "href" =>URL_API.'/v'.API_VERSION.'/'.  strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                   ),
                               ),
                            ),   
                        );
                        $halResourceArray = $halResource->toArray(\BasePeer::TYPE_FIELDNAME);
                        $halResourceName = strtolower(get_class($halResource));
     
                        //Los datos del recurso __embedded
                        if(isset($allowedColumns[$halResourceName])){
                           foreach($allowedColumns[$halResourceName] as $column => $value){
                               $body['_embedded'][$halResourceName][$column] = $halResourceArray[$column];
                           }
                       }                  
                    }else{
                        $body['_embedded'][strtolower(get_class($halResource))] = array(
                               "_links" => array(
                                   "self" => array(
                                       "href" =>URL_API.'/v'.API_VERSION.'/'. strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                   ),
                               ),
                        );
                        if(isset($allowedColumns[$halResourceName])){
                           foreach($allowedColumns[$halResourceName] as $column){
                               $body['_embedded'][$halResourceName][$column] = $halResourceArray[$column];
                           }
                       }  
                    }
                 }
             } 
             
             
         }
         //Verificamos si hay elementos colecciones _embebed 

         
         
         
         
         return $body;
    }
    
    public static function getBodyResponse($resource, array $voidElements = null, array $allowedColumns, array $halResources=null, array $halCollection=null){
        
        //Guardamos en un arrglo los datos de nuestro recurso
        $resourceArray = $resource->toArray(\BasePeer::TYPE_FIELDNAME);
        

        //Comnezamos a darle formato a nuestra respuesta.
        
        //Los links
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.RESOURCE.'/'.$resource->getPrimaryKey()
                ),
            ),
        );
        //El ACL
        foreach ($allowedColumns[RESOURCE] as $column => $value){
            $body[$column] = $resourceArray[$column]; // Los datos del recurso
            $body["ACL"][$column] = $value;
        }
        foreach ($allowedColumns as $column => $columnValue){
            if($column != RESOURCE && !empty($value)){
                foreach ($allowedColumns[$column] as $key => $value){
                    $body["ACL"]['_embedded'][$column][$key] = $value;
                }
            }
        }
        
        //Verificamos si hay elementos que hay que remover
        if($voidElements!=null){
            foreach ($voidElements as $element){
                unset($body[$element]);
            }
        }
                
        //Verificamos si hay elementos recursos _embebed
         if($halResources!=null){    
             foreach ($halResources as $halResource){
                 if($halResource!=null){
                    if(!isset($body['_embedded'])){
                        $body['_embedded'] = array(
                            strtolower(get_class($halResource)) => array(
                               "_links" => array(
                                   "self" => array(
                                       "href" =>URL_API.'/v'.API_VERSION.'/'.  strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                   ),
                               ),
                            ),   
                        );
                        $halResourceArray = $halResource->toArray(\BasePeer::TYPE_FIELDNAME);
                        $halResourceName = strtolower(get_class($halResource));
     
                        //Los datos del recurso __embedded
                        if(isset($allowedColumns[$halResourceName])){
                           foreach($allowedColumns[$halResourceName] as $column => $value){
                               $body['_embedded'][$halResourceName][$column] = $halResourceArray[$column];
                           }
                       }                  
                    }else{
                        $body['_embedded'][strtolower(get_class($halResource))] = array(
                               "_links" => array(
                                   "self" => array(
                                       "href" =>URL_API.'/v'.API_VERSION.'/'. strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                   ),
                               ),
                        );
                        if(isset($allowedColumns[$halResourceName])){
                           foreach($allowedColumns[$halResourceName] as $column){
                               $body['_embedded'][$halResourceName][$column] = $halResourceArray[$column];
                           }
                       }  
                    }
                 }
             } 
             
             //Verificamos si hay elementos colecciones _embebed 
         }

         return $body;
    }
                                              
    public static function getListBodyResponse($result, $resourceQuery, array $voidElements = null, array $allowedColumns, array $halResources=null, array $halCollection=null){
        
        //Comnezamos a darle formato a nuestra respuesta.
        
        //Los links
        $body = array(
            '_links' => $result["links"]
        );
        
        //El ACL
        foreach ($allowedColumns[RESOURCE] as $column => $value){
            $body["ACL"][$column] = $value;
        }
        foreach ($allowedColumns as $column => $ColumnValue){
            if($column != RESOURCE && !empty($value)){
                foreach ($allowedColumns[$column] as $key => $value){
                    $body["ACL"]['_embedded'][$column][$key] = $value;
                }
            }
        }
        
        //Paginacion
        $body["resume"] = $result["resume"];
        

        //La Coleccion
        $body['_embedded'][RESOURCE.'s'] = array();
        foreach ($result['data'] as $item){
            $resource = $resourceQuery->findPK(reset($item));
            $row = array(
                "_links" => array(
                    'self' => array("href" =>URL_API.'/v'.API_VERSION.'/'. RESOURCE.'/'.$resource->getPrimaryKey()),
                ),
            );
            foreach ($allowedColumns[RESOURCE] as $key=>$value){
                $row[$key] = $item[$key];
            }
            foreach ($voidElements as $voidElement){
                unset($row[$voidElement]);
            }
            //Verificamos si hay elementos recursos _embebed
            if($halResources!=null){
                foreach ($halResources as $halResource){
                    $halResourceObject = call_user_method($halResource, $resource);
                    $halResourceArray = $halResourceObject->toArray(\BasePeer::TYPE_FIELDNAME);
                    if(!isset($row['_embedded'])){
                        $row['_embedded']= array(
                            strtolower(get_class($halResourceObject)) => array(
                               "_links" => array(
                                   "self" => array(
                                       "href" =>URL_API.'/v'.API_VERSION.'/'.  strtolower(get_class($halResourceObject)).'/'.$halResourceObject->getPrimaryKey()
                                   ),
                               ),
                            ),   
                        );
                        foreach($allowedColumns[strtolower(get_class($halResourceObject))] as $columnKey => $columnValue){
                            $row['_embedded'][strtolower(get_class($halResourceObject))][$columnKey] = $halResourceArray[$columnKey];
                        }
                    }
                }
            }else{
                
            }
            //Verificamos si hay elementos recursos _collections
            array_push($body['_embedded'][RESOURCE.'s'] , $row);
        }
        
        return $body;
    }

    public static function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        foreach ($array as $k => $v) {
            if (is_array($v)) { //nested array
                arrayToXml($v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }
        
}
