<?php

/**
 * HttpResponse
 *
 * @author Daniel Castanedo <daniel.b@hostdime.com.mx>
 * @version 1.0
 *
 */

namespace Shared\V1\REST\Functions;

use Zend\Http\Response;

class HttpResponse {

    public static function createBodyResonse($resource, array $voidElements = null, array $halResources=null, array $halCollection=null){
        
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
        foreach ($resourceArray as $key=>$value){
            $body[$key]=$value;
         }
         
         //Verificamos si hay elementos recursos _embebed 
         if($halResources!=null){
             
             foreach ($halResources as $halResource){
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
                     foreach ($halResource->toArray(\BasePeer::TYPE_FIELDNAME) as $key => $value){
                         $body['_embedded'][strtolower(get_class($halResource))][$key] = $value;
                     }
                 }else{
                     $body['_embedded'][strtolower(get_class($halResource))] = array(
                            "_links" => array(
                                "self" => array(
                                    "href" =>URL_API.'/v'.API_VERSION.'/'. strtolower(get_class($halResource)).'/'.$halResource->getPrimaryKey()
                                ),
                            ),
                     );
                     foreach ($halResource->toArray(\BasePeer::TYPE_FIELDNAME) as $key => $value){
                         $body['_embedded'][strtolower(get_class($halResource))][$key] = $value;
                     }
                 }
             }     
         }
         return $body;
    }
}
