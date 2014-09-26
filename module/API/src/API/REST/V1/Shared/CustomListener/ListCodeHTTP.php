<?php

class ListCodeHTTP{

    public function code(){

        //// Success ////
        $body = array(
            'HTTP_Status' => '200' ,
            'Title' => 'OK' ,
            'Details' => 'Successful.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'HTTP_Status' => '201' ,
            'Title' => 'Created' ,
            'Details' => 'The request has been fulfilled and resulted in a new resource being created.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'HTTP_Status' => '204' ,
            'Title' => 'No Content' ,
            'Details' => 'The server successfully processed the request, but is not returning any content.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );

        //// Redirection ////
        $body = array(
            'HTTP_Status' => '301' ,
            'Title' => 'Moved Permanently' ,
            'Details' => 'This and all future requests should be directed to the given URI.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'HTTP_Status' => '304' ,
            'Title' => 'Not Modified' ,
            'Details' => 'The resource has not been modified.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );

        //// Client Error ////
        $body = array(
            'HTTP_Status' => '400' ,
            'Title' => 'Bad Request' ,
            'Details' => 'The request cannot be fulfilled due to bad syntax.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'HTTP_Status' => '401' ,
            'Title' => 'Unauthorized' ,
            'Details' => 'Invalid or expired token.',
            'More_Info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '402' ,
            'title' => 'Payment Required' ,
            'details' => 'The request was a valid request, but to use the resource it requires purchase the module to which it belongs.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '403' ,
            'title' => 'Forbidden' ,
            'details' => 'The request was a valid request, but the server is refusing to respond to it.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '404' ,
            'title' => 'Not Found' ,
            'details' => 'The requested resource could not be found.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '405' ,
            'title' => 'Method Not Allowed' ,
            'details' => 'A request was made of a resource using a request method not supported by that resource.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '406' ,
            'title' => 'Not Acceptable' ,
            'details' => 'The requested resource is only capable of generating content not acceptable according to the Accept headers sent in the request.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '409' ,
            'title' => 'Conflict' ,
            'details' => 'Indicates that the request could not be processed because of conflict in the request.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '415' ,
            'title' => 'Unsupported Media Type' ,
            'details' => 'The request entity has a media type which the server or resource does not support.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '498' ,
            'title' => 'Token expired/invalid' ,
            'details' => 'Token expired or invalid.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '499' ,
            'title' => 'Token required' ,
            'details' => 'Token is required.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );
        $body = array(
            'status_code' => '500' ,
            'title' => 'Internal Server Error' ,
            'details' => 'Internal Server Error.',
            'more_info' => 'http://buybuy.com.mx/v'.VERSION.'/documentation'
        );

    }
}