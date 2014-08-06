<?php

/**
 * HttpResponse
 *
 * @author Daniel Castanedo <daniel.b@hostdime.com.mx>
 * @version 1.0
 * 
 */

namespace Shared\Functions;

use Zend\Http\Response;

class HttpResponse {
    
    public function create($resource,array $halResource=null, array $halCollection=null){
          
        $body = array(
            "_links" => array(
                "self" => array(
                    "href" =>URL_API.'/v'.API_VERSION.'/'.RESOURCE.'/'.$resource->getPrimaryKey()
                ),
            ),
        );
        
    }   
}


