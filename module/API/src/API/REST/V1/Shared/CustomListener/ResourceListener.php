<?php

/**
 * ResourceListener.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Shared\CustomListener;

// - ZF2 - //
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\View\Model\JsonModel;
use Zend\Http\Response;

// - Functions - //
use API\REST\V1\Shared\Functions\HttpRequest;
use API\REST\V1\Shared\Functions\ResourceManager;
use API\REST\V1\Shared\Functions\ArrayResponse;

/**
 * Class ResourceListener
 * @package API\REST\V1\Shared\CustomListener
 */
class ResourceListener implements ListenerAggregateInterface {

    /*Primero registramos el listener y asignamos una proridad alta (1000 es la mas alta)
     * para que se ejecute lo antes posible dentro del stack de
     * listeners registrados en el evento.
     */

    protected $listeners = array();

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events){

        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 850);

    }

    /**
     * @param EventManagerInterface $events
     */
    //El método detach() lo unico que hace es remover el listener del evento
    public function detach(EventManagerInterface $events){

        foreach ($this->listeners as $index => $listener){

            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    //Se toma desiciones personales para la aplicación
    public function onDispatch(MvcEvent $e){

        $response = $e->getResponse();
        $responseHeaders = $response->getHeaders();
        $request  = $e->getRequest();
        $typeResponse = $e->getRouteMatch()->getParam('typeResponse');
        define('RESOURCE', $e->getRouteMatch()->getParam('resource'));
        define('RESOURCE_CHILD', $e->getRouteMatch()->getParam('resourceChild'));
        define('ID_RESOURCE', $e->getRouteMatch()->getParam('id'));
        define('ID_RESOURCE_CHILD', $e->getRouteMatch()->getParam('idChild'));

        $writer = new \Zend\Config\Writer\Xml();

        $method = $request->getMethod();
        switch($method){

            case 'POST':{

                ////// Start Resource Not Allowed //////

                // Estos recursos están habilitados en resource y en resourceChild de nuestro module.config.php
                // Es por eso que necesitamos invalidarlos manualmente y sugerir el método que sí está habilitado.
                switch(RESOURCE){
                    case "branch":{
                        switch(RESOURCE_CHILD){
                            case "staff":{
                                $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access this resources you need to use the GET method.', 'Method POST is not allowed');
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }

                ////// End Resource Not Allowed //////

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    // Entra directo al LoginController (API\REST\V1\Login\Controller\LoginController)
                    break;
                }
                if($routeName == "documentation"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the documentation you need to use the GET method.', 'Method POST is not allowed');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                    }
                    break;
                }

                ////// Start Resource Relational //////

                if(RESOURCE_CHILD == 'department'){
                    if(ID_RESOURCE != null){
                        $resourcenameChild = RESOURCE_CHILD;
                        // La inicial de nuestro string la hacemos mayuscula
                        $resourceNameChild = ucfirst($resourcenameChild);
                        // Verificamos que exista el recurso
                        $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                        // Si el resource y el resourceChild pertenecen al mismo módulo
                        if($moduleResource == $moduleResourceChild){
                            switch($resourcenameChild){
                                case "department" :{
                                    // Start resourceRelational
                                    $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                    // La inicial de nuestro string la hacemos mayuscula
                                    $resourceNameChild = ucfirst($resourcenameChild);

                                    define('MODULE_RESOURCE', $moduleResource);
                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                    if(ID_RESOURCE_CHILD != null){

                                        return;

                                    }else{

                                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id department can´t be null.', 'The id department is required');
                                        switch(TYPE_RESPONSE){
                                            case "xml":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                return $response->setContent($writer->toString($bodyResponse));
                                                $e->stopPropagation();
                                                break;
                                            }
                                            case "json":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                $jsonModel = new JsonModel($bodyResponse);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                            }
                                            default: {
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                $jsonModel = new JsonModel($bodyResponse);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                            }
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                    }else{
                        // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id can´t be null', 'Invalid request');
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }
                    break;
                }
                if(RESOURCE_CHILD == 'client'){
                    if(ID_RESOURCE != null){
                        if(RESOURCE == 'marketingcampaign'){
                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si el resource y el resourceChild pertenecen al mismo módulo
                            if($moduleResource == $moduleResourceChild){
                                // Ésta condición jamás se cumplirá suponiendo que solamente sea
                                // el RESOURCE = marketingcampaign y RESOURCE_CHIDL = client

                                echo "Entro porque el RESOURCE_CHILD = client y el RESOURCE pertenece al módulo de client";
                                exit();
                            }else{
                                // Toca pensar como manejar los privileguios de los modulos permitidos para los usuarios
                                // O, dicho de otra forma, el usuario, qué módulos tiene contratados.
                                if($moduleResource == 'Salesforce' && $moduleResourceChild == 'Company'){
                                    switch($resourcenameChild){
                                        case "client" :{
                                            // Start resourceRelational
                                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                            // La inicial de nuestro string la hacemos mayuscula
                                            $resourceNameChild = ucfirst($resourcenameChild);
                                            // seteamos el valor de $moduleResourceChild por 'Salesforce' porque
                                            // el recursoRelacional (marketingcampaignclient) pertenece al
                                            // módulo de Salesforce
                                            $moduleResourceChild = "Salesforce";
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                            if(ID_RESOURCE_CHILD != null){

                                                return;

                                            }else{

                                                $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id client can´t be null.', 'The id client is required');
                                                switch(TYPE_RESPONSE){
                                                    case "xml":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                        return $response->setContent($writer->toString($bodyResponse));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                    $jsonModel = new JsonModel($bodyResponse);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }
                                            break;
                                        }
                                    }
                                }
                            }
                        }else{
                            $bodyResponse = ArrayResponse::getResponse(404, $response);
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                    }else{
                        // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id can´t be null', 'Invalid request');
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }
                    break;
                }
                if(RESOURCE_CHILD == 'user'){
                    if(ID_RESOURCE != null){
                         if(RESOURCE == 'triggerprospection'){
                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si el resource y el resourceChild pertenecen al mismo módulo
                            if($moduleResource == $moduleResourceChild){
                                // Ésta condición jamás se cumplirá suponiendo que solamente sea
                                // el RESOURCE = marketingcampaign y RESOURCE_CHIDL = client

                                echo "Entro porque el RESOURCE_CHILD = client y el RESOURCE pertenece al módulo de client y eso es un ERROR";
                                exit();
                            }else{
                                // Toca pensar como manejar los privileguios de los modulos permitidos para los usuarios
                                // O, dicho de otra forma, el usuario, qué módulos tiene contratados.
                                if($moduleResource == 'Salesforce' && $moduleResourceChild == 'Company'){
                                    switch($resourcenameChild){
                                        case "user" :{
                                            // Start resourceRelational
                                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                            // La inicial de nuestro string la hacemos mayuscula
                                            $resourceNameChild = ucfirst($resourcenameChild);
                                            // seteamos el valor de $moduleResourceChild por 'Salesforce' porque
                                            // el recursoRelacional (marketingcampaignclient) pertenece al
                                            // módulo de Salesforce
                                            $moduleResourceChild = "Salesforce";
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                            if(ID_RESOURCE_CHILD != null){

                                                return;

                                            }else{

                                                $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id user can´t be null.', 'The id client is required');
                                                switch(TYPE_RESPONSE){
                                                    case "xml":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                        return $response->setContent($writer->toString($bodyResponse));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                    $jsonModel = new JsonModel($bodyResponse);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }
                                            break;
                                        }
                                    }
                                }
                            }
                        }else{
                             $bodyResponse = ArrayResponse::getResponse(404, $response);
                             switch(TYPE_RESPONSE){
                                 case "xml":{
                                     $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                     return $response->setContent($writer->toString($bodyResponse));
                                     $e->stopPropagation();
                                     break;
                                 }
                                 case "json":{
                                     $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                     $jsonModel = new JsonModel($bodyResponse);
                                     $jsonModel->setTerminal(true);
                                     $e->setResult($jsonModel);
                                     $e->setViewModel($jsonModel)->stopPropagation();
                                     break;
                                 }
                                 default: {
                                 $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                 $jsonModel = new JsonModel($bodyResponse);
                                 $jsonModel->setTerminal(true);
                                 $e->setResult($jsonModel);
                                 $e->setViewModel($jsonModel)->stopPropagation();
                                 break;
                                 }
                             }
                         }
                    }else{
                        // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id can´t be null', 'Invalid request');
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }
                    break;
                }
                ////// End Resource Relational //////

                ////// Start Resource //////
                if(RESOURCE != null){
                    $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                    switch($requestContentType){
                        case "application/x-www-form-urlencoded" :{

                            break;
                        }
                        case 'application/json':{

                            break;
                        }
                        default :{

                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'Not received Content-Type Header. Please add a Content-Type Header.', 'The Content-Type is required');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                            }
                        }
                    }

                    if(RESOURCE_CHILD != null){
                        if(ID_RESOURCE != null){
                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceName = ucfirst(RESOURCE);
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                            // Si sí existe el recurso
                            if($moduleResourceChild){
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Si el resource y el resourceChild pertenecen al mismo módulo
                                if($moduleResource == $moduleResourceChild){

                                    // Si el module de resource y el module de resourceChild son iguales

                                }else{

                                    // Entrará en casos como resourceAlternative, sin embargo, eso lo debemos delimitar dentro de "Resource Not Allowed" de este mismo ResourceListener.php
                                    // En lo lógico, deberá entrará en casos como clienttax ya que este recurso es un resourceChild que pertenece al módulo de SATMexico.
                                    // "client" es el RESOURCE y "tax" es el CHILD, en concatenación "clienttax" esto sería un RESOURCE_CHILD
                                    // el resource (client), pertenece al módulo de Company pero,
                                    // el resourceChild (clienttax), pertenece al modulo de SATMexico.

                                    $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                    $resourceNameChild = ucfirst($resourcenameChild);
                                    define('MODULE_RESOURCE', $moduleResource);
                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                }
                            }else{
                                // Entró porque haremos una concatenación del resource con el resourceChild
                                // Ejemplo: clientaddress, clientfile, quoteitem, quotenote, etc
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                                // Si sí existe el recurso
                                if($moduleResourceChild){

                                    define('MODULE_RESOURCE', $moduleResource);
                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                }else{

                                    $bodyResponse = ArrayResponse::getResponse(404, $response);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse));
                                            $e->stopPropagation();
                                            break;
                                        }
                                        case "json":{
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                            $jsonModel = new JsonModel($bodyResponse);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                        }
                                        default: {
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                        }
                                    }
                                }
                            }
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }

                        break;
                    }else{
                        $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                        $resourceNameChild = ucfirst($resourcenameChild);
                        define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                        define('NAME_RESOURCE_CHILD', $resourceNameChild);
                    }
                    define('MODULE_RESOURCE', ucfirst($e->getRouteMatch()->getMatchedRouteName()));
                }// No creamos un else porque el ApiProplemListener.php se encarga de dar respuesta 404, a recursos que no existen como ejemplo: Branchaddres, Branchfile, etc.

                ////// End Resource //////

                break;
            }
            case 'GET':{

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the login you need to use the POST method', 'Method GET is not allowed');
                }
                if($routeName == "documentation"){
                    // Entra directo al IndexController de Documentation (API\REST\V1\Documentation\Controller\IndexController)
                    break;
                }
                // Si resource es diferente de null
                if(RESOURCE != null){
                    if(RESOURCE_CHILD != null){
                        if(ID_RESOURCE != null){
                            // Almacenamos RESOURCE.RESOURCE_CHILD en una variable
                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Almacenamos el modulo al que pertenece resource
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                            // Si resourceChild pertenece a un modulo (Esto significa que resourceChild sí es un recurso)
                            if($moduleResourceChild){
                                // Si el resource y el resourceChild pertenecen al mismo módulo
                                if($moduleResource == $moduleResourceChild){
                                    switch(RESOURCE_CHILD){
                                        case "department" :{
                                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                            // La inicial de nuestro string la hacemos mayuscula
                                            $resourceNameChild = ucfirst($resourcenameChild);
                                            // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                            // Si existe el modulo de resourceChild (En este caso si existe).
                                            if($moduleResourceChild){
                                                define('MODULE_RESOURCE', $moduleResource);
                                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                                if(ID_RESOURCE_CHILD != null){
                                                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET_COLLECTION, POST, DELETE', 'Method GET_ENTITY is not allowed');
                                                    switch(TYPE_RESPONSE){
                                                        case "xml":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                            return $response->setContent($writer->toString($bodyResponse));
                                                            $e->stopPropagation();
                                                            break;
                                                        }
                                                        case "json":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                            $jsonModel = new JsonModel($bodyResponse);
                                                            $jsonModel->setTerminal(true);
                                                            $e->setResult($jsonModel);
                                                            $e->setViewModel($jsonModel)->stopPropagation();
                                                            break;
                                                        }
                                                        default: {
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                        }
                                                    }
                                                }else{
                                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                    $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                    return;
                                                }
                                            }
                                            break;
                                        }
                                        case "staff" :{
                                            switch(RESOURCE){
                                                case "branch":{

                                                    $resourcename = RESOURCE;
                                                    // La inicial de nuestro string la hacemos mayuscula
                                                    $resourceName = ucfirst($resourcename);
                                                    // Almacenamos el modulo al que pertenece resource.
                                                    $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());

                                                    $resourcenameChild = RESOURCE_CHILD;
                                                    // La inicial de nuestro string la hacemos mayuscula
                                                    $resourceNameChild = ucfirst($resourcenameChild);
                                                    // Almacenamos el modulo al que pertenece resourceChild.
                                                    $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                                    define('MODULE_RESOURCE', $moduleResource);
                                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                                    define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                    $e->getRouteMatch()->setParam('action', 'getListResourceAlternative');
                                                    return;

                                                break;
                                                }
                                                // No creamos un default para este switch porque es redundante...
                                                // el ApiProblemListener.php se encarga de la respuesta 404 de rutas
                                                // que no existen como: Branchaddress, Branchfile, etc...
                                            }
                                            break;
                                        }
                                    }
                                }else{
                                    // Si resource y resourceChild no pertenecen al mismo módulo
                                    switch(RESOURCE_CHILD){
                                        case "client" :{
                                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                            // La inicial de nuestro string la hacemos mayuscula
                                            $resourceNameChild = ucfirst($resourcenameChild);
                                            // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                            // Si existe el modulo de resourceChild.
                                            if($moduleResourceChild){

                                                define('MODULE_RESOURCE', $moduleResource);
                                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                                if(ID_RESOURCE_CHILD != null){
                                                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET_COLLECTION, POST, DELETE', 'Method GET_ENTITY is not allowed');
                                                    switch(TYPE_RESPONSE){
                                                        case "xml":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                            return $response->setContent($writer->toString($bodyResponse));
                                                            $e->stopPropagation();
                                                            break;
                                                        }
                                                        case "json":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                            $jsonModel = new JsonModel($bodyResponse);
                                                            $jsonModel->setTerminal(true);
                                                            $e->setResult($jsonModel);
                                                            $e->setViewModel($jsonModel)->stopPropagation();
                                                            break;
                                                        }
                                                        default: {
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                        }
                                                    }
                                                }else{
                                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                    $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                    return;
                                                }
                                            }
                                            break;
                                        }
                                        case "user" :{
                                            $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                            // La inicial de nuestro string la hacemos mayuscula
                                            $resourceNameChild = ucfirst($resourcenameChild);
                                            // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                            // Si existe el modulo de resourceChild.
                                            if($moduleResourceChild){

                                                define('MODULE_RESOURCE', $moduleResource);
                                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                                if(ID_RESOURCE_CHILD != null){
                                                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET_COLLECTION, POST, DELETE', 'Method GET_ENTITY is not allowed');
                                                    switch(TYPE_RESPONSE){
                                                        case "xml":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                            return $response->setContent($writer->toString($bodyResponse));
                                                            $e->stopPropagation();
                                                            break;
                                                        }
                                                        case "json":{
                                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                            $jsonModel = new JsonModel($bodyResponse);
                                                            $jsonModel->setTerminal(true);
                                                            $e->setResult($jsonModel);
                                                            $e->setViewModel($jsonModel)->stopPropagation();
                                                            break;
                                                        }
                                                        default: {
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                        }
                                                    }
                                                }else{
                                                    $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                    $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                    return;
                                                }
                                            }
                                            break;
                                        }
                                    }
                                }
                           }else{

                                // Los casos de resourceChild que no son un recurso y que no permiten GET_ENTITY
                                switch(RESOURCE_CHILD){
                                    case "leader" :{
                                        $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                        // La inicial de nuestro string la hacemos mayuscula
                                        $resourceNameChild = ucfirst($resourcenameChild);
                                        // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                        // Si existe el modulo de resourceChild (En este caso si existe. El módulo de department     es Company).
                                        if($moduleResourceChild){
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                            if(ID_RESOURCE_CHILD != null){
                                                $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET_COLLECTION, POST, PUT, DELETE', 'Method GET_ENTITY is not allowed');
                                                switch(TYPE_RESPONSE){
                                                    case "xml":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                        return $response->setContent($writer->toString($bodyResponse));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                    $jsonModel = new JsonModel($bodyResponse);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }else{
                                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                return;
                                            }
                                        }
                                        break;
                                    }
                                    case "member" :{
                                        $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                        // La inicial de nuestro string la hacemos mayuscula
                                        $resourceNameChild = ucfirst($resourcenameChild);
                                        // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                        $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                        // Si existe el modulo de resourceChild (En este caso si existe. El módulo de department     es Company).
                                        if($moduleResourceChild){
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                            if(ID_RESOURCE_CHILD != null){
                                                $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET_COLLECTION, POST, DELETE', 'Method GET_ENTITY is not allowed');
                                                switch(TYPE_RESPONSE){
                                                    case "xml":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                        return $response->setContent($writer->toString($bodyResponse));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                    $jsonModel = new JsonModel($bodyResponse);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }else{
                                                $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                                $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                                return;
                                            }
                                        }
                                        break;
                                    }
                                }
                                // Almacenamos RESOURCE.RESOURCE_CHILD en una variable
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourceNameChild = ucfirst($resourcenameChild);
                                // Verificamos que exista el recurso resourceChild, si sí, almacenamos el modulo al que pertenece.
                                $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                // Si no existe el modulo de resourceChild el resourceChild no existe
                                if($moduleResourceChild){
                                    define('MODULE_RESOURCE', $moduleResource);
                                    define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                    define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                    define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                                    if(ID_RESOURCE_CHILD != null){

                                        $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                        $e->getRouteMatch()->setParam('action', 'getResourceChild');
                                        return;

                                    }else{

                                        $e->getRouteMatch()->setParam('controller', 'API\REST\V1\Controller\ResourceController');
                                        $e->getRouteMatch()->setParam('action', 'getListResourceChild');
                                        return;

                                    }
                                }else{
                                    // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                                    $bodyResponse = ArrayResponse::getResponse(404, $response);
                                    switch(TYPE_RESPONSE){
                                        case "xml":{
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                            return $response->setContent($writer->toString($bodyResponse));
                                            $e->stopPropagation();
                                            break;
                                        }
                                        case "json":{
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                            $jsonModel = new JsonModel($bodyResponse);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                        }
                                        default: {
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                        }
                                    }
                                }
                            }
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ucfirst($e->getRouteMatch()->getMatchedRouteName()));
                }// No creamos un else porque el ApiProplemListener.php se encarga de dar respuesta 404, a recursos que no existen.
                break;
            }
            case 'PUT':{

                ////// Start Resource Not Allowed //////

                // Estos recursos están habilitados en resource y en resourceChild de nuestro module.config.php
                // Es por eso que necesitamos invalidarlos manualmente y sugerir el método que si está habilitado
                switch(RESOURCE){
                    case "branch":{
                        switch(RESOURCE_CHILD){
                            case "staff":{
                                $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access this resources you need to use the GET method', 'Method PUT is not allowed');
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }
                    }
                }
                ////// End Resource Not Allowed //////

                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the login you need to use the POST method.', 'Method PUT is not allowed');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                    break;
                }
                if($routeName == "documentation"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the documentation you need to use the GET method.', 'Method PUT is not allowed');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                    break;
                }

                ////// Start Resource Relational //////

                switch(RESOURCE_CHILD){
                    case "department":{
                        if(ID_RESOURCE != null){

                            $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET, POST, DELETE', 'Method PUT is not allowed');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                            break;
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case "member":{
                        if(ID_RESOURCE != null){

                            $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET, POST, DELETE', 'Method PUT is not allowed');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                            break;
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case "client":{
                        if(ID_RESOURCE != null){

                            $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET, POST, DELETE', 'Method PUT is not allowed');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                            break;
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }
                    case "user":{
                        if(ID_RESOURCE != null){

                            $bodyResponse = ArrayResponse::getResponse(405, $response, 'Methods allowed: GET, POST, DELETE', 'Method PUT is not allowed');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                            break;
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }
                }

                ////// End Resource Relational //////

                if(RESOURCE != null){
                    $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                    switch($requestContentType){
                        case "application/x-www-form-urlencoded" :{

                            break;
                        }
                        case 'application/json':{

                            break;
                        }
                        default :{
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'Not received Content-Type Header. Please add a Content-Type Header.', 'The Content-Type is required');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                    }
                    if(RESOURCE_CHILD != null){
                        if(ID_RESOURCE != null){

                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceName = ucfirst(RESOURCE);
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                            // Si sí existe el recurso
                            if($moduleResourceChild){
                                // Si el resource y el resourceChild pertenecen al mismo módulo
                                if($moduleResource == $moduleResourceChild){
                                    switch($resourcenameChild){
                                        case "department" :{
                                            define('MODULE_RESOURCE', $moduleResource);
                                            define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                            define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                            define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                                            if(ID_RESOURCE_CHILD != null){

                                                return;

                                            }else{
                                                $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id department can´t be null.', 'The id department is required');
                                                switch(TYPE_RESPONSE){
                                                    case "xml":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                        return $response->setContent($writer->toString($bodyResponse));
                                                        $e->stopPropagation();
                                                        break;
                                                    }
                                                    case "json":{
                                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                        $jsonModel = new JsonModel($bodyResponse);
                                                        $jsonModel->setTerminal(true);
                                                        $e->setResult($jsonModel);
                                                        $e->setViewModel($jsonModel)->stopPropagation();
                                                        break;
                                                    }
                                                    default: {
                                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                    $jsonModel = new JsonModel($bodyResponse);
                                                    $jsonModel->setTerminal(true);
                                                    $e->setResult($jsonModel);
                                                    $e->setViewModel($jsonModel)->stopPropagation();
                                                    break;
                                                    }
                                                }
                                            }
                                            break;
                                        }
                                    }
                                }else{

                                    // Si resource y resorceChild son de modulos diferentes
                                    // Tomar el modulo de recourceChild, dandole prioridad para trabajar.

                                }
                            }else{
                                // Si resourceChild no es un recurso

                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);
                                $moduleResourceChild = ResourceManager::getModule($resourceNameChild);

                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);
                            }
                            if(ID_RESOURCE_CHILD != null){

                                return;

                            }else{
                                $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id'.RESOURCE_CHILD.' can´t be null.', 'The id is required');
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                        break;
                    }

                    // If request id is null
                    if(ID_RESOURCE == null){
                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The request id'.RESOURCE.' can´t be null.', 'The id is required');
                        switch(TYPE_RESPONSE){
                            case "xml":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                return $response->setContent($writer->toString($bodyResponse));
                                $e->stopPropagation();
                                break;
                            }
                            case "json":{
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                            }
                            default: {
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                            }
                        }
                    }else{

                        $requestContentType = $e->getRequest()->getHeaders('ContentType')->getMediaType();

                        switch($requestContentType){
                            case "application/x-www-form-urlencoded" :{

                                break;
                            }
                            case 'application/json':{

                                break;
                            }
                            default :{
                                $bodyResponse = ArrayResponse::getResponse(409, $response, 'Not received Content-Type Header. Please add a Content-Type Header.', 'The Content-Type is required');
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }
                    }
                    define('MODULE_RESOURCE', ucfirst($e->getRouteMatch()->getMatchedRouteName()));
                }else{
                    $bodyResponse = ArrayResponse::getResponse(404, $response);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
                break;
            }
            case 'DELETE':{

                ////// Start Resource Not Allowed //////

                // Estos recursos están habilitados en resource y en resourceChild de nuestro module.config.php
                // Es por eso que necesitamos invalidarlos manualmente y sugerir el método que si está habilitado
                switch(RESOURCE){
                    case "branch":{
                        switch(RESOURCE_CHILD){
                            case "staff":{
                                $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access this resources you need to use the GET method.', 'Method DELETE is not allowed');
                                switch(TYPE_RESPONSE){
                                    case "xml":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                        return $response->setContent($writer->toString($bodyResponse));
                                        $e->stopPropagation();
                                        break;
                                    }
                                    case "json":{
                                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                        $jsonModel = new JsonModel($bodyResponse);
                                        $jsonModel->setTerminal(true);
                                        $e->setResult($jsonModel);
                                        $e->setViewModel($jsonModel)->stopPropagation();
                                        break;
                                    }
                                    default: {
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                    }
                                }
                            }
                        }
                    }
                }

                ////// End Resource Not Allowed //////


                $routeName = $e->getRouteMatch()->getMatchedRouteName();
                if($routeName == "login"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the login you need to use the POST method.', 'Method DELETE is not allowed');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                    break;
                }
                if($routeName == "documentation"){
                    $bodyResponse = ArrayResponse::getResponse(405, $response, 'To access the documentation you need to use the POST method.', 'Method DELETE is not allowed');
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                    break;
                }
                if(RESOURCE != null){
                    if(RESOURCE_CHILD != null){
                        if(ID_RESOURCE != null){
                            $resourcenameChild = RESOURCE_CHILD;
                            // La inicial de nuestro string la hacemos mayuscula
                            $resourceName = ucfirst(RESOURCE);
                            $resourceNameChild = ucfirst($resourcenameChild);
                            // Verificamos que exista el recurso
                            $moduleResource = ucfirst($e->getRouteMatch()->getMatchedRouteName());
                            $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                            // Si sí existe el recurso
                            if($moduleResourceChild){
                                $resourcenameChild = RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);
                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                            }else{
                                // La inicial de nuestro string la hacemos mayuscula
                                $resourcenameChild = RESOURCE.RESOURCE_CHILD;
                                $resourceNameChild = ucfirst($resourcenameChild);

                                // Verificamos que exista el recurso
                                $moduleResourceChild = ResourceManager::getModule($resourceNameChild);
                                define('MODULE_RESOURCE', $moduleResource);
                                define('LOWER_NAME_RESOURCE_CHILD', $resourcenameChild);
                                define('NAME_RESOURCE_CHILD', $resourceNameChild);
                                define('MODULE_RESOURCE_CHILD', $moduleResourceChild);

                            }
                            switch(RESOURCE_CHILD){
                                case "department" :{

                                    if(ID_RESOURCE_CHILD != null){

                                        return;

                                    }else{
                                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id department can´t be null.', 'The id department is required');
                                        switch(TYPE_RESPONSE){
                                            case "xml":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                return $response->setContent($writer->toString($bodyResponse));
                                                $e->stopPropagation();
                                                break;
                                            }
                                            case "json":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                $jsonModel = new JsonModel($bodyResponse);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                            }
                                            default: {
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                            $jsonModel = new JsonModel($bodyResponse);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                            }
                                        }
                                    }
                                    break;
                                }
                                case "address" :{

                                    if(ID_RESOURCE_CHILD != null){

                                        return;

                                    }else{

                                        $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id address can´t be null.', 'The id address is required');
                                        switch(TYPE_RESPONSE){
                                            case "xml":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                                return $response->setContent($writer->toString($bodyResponse));
                                                $e->stopPropagation();
                                                break;
                                            }
                                            case "json":{
                                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                                $jsonModel = new JsonModel($bodyResponse);
                                                $jsonModel->setTerminal(true);
                                                $e->setResult($jsonModel);
                                                $e->setViewModel($jsonModel)->stopPropagation();
                                                break;
                                            }
                                            default: {
                                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                            $jsonModel = new JsonModel($bodyResponse);
                                            $jsonModel->setTerminal(true);
                                            $e->setResult($jsonModel);
                                            $e->setViewModel($jsonModel)->stopPropagation();
                                            break;
                                            }
                                        }
                                    }
                                    break;
                                }
                            }

                            break;
                        }else{
                            // Si el resource mas el resourceChild no existe, ejemplo: Branchfile, Brancg address.
                            $bodyResponse = ArrayResponse::getResponse(409, $response, 'The id' . RESOURCE . ' can´t be null', 'Invalid request');
                            switch(TYPE_RESPONSE){
                                case "xml":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                                    return $response->setContent($writer->toString($bodyResponse));
                                    $e->stopPropagation();
                                    break;
                                }
                                case "json":{
                                    $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                    $jsonModel = new JsonModel($bodyResponse);
                                    $jsonModel->setTerminal(true);
                                    $e->setResult($jsonModel);
                                    $e->setViewModel($jsonModel)->stopPropagation();
                                    break;
                                }
                                default: {
                                $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                                $jsonModel = new JsonModel($bodyResponse);
                                $jsonModel->setTerminal(true);
                                $e->setResult($jsonModel);
                                $e->setViewModel($jsonModel)->stopPropagation();
                                break;
                                }
                            }
                        }
                    }
                }else{
                    $bodyResponse = ArrayResponse::getResponse(404, $response);
                    switch(TYPE_RESPONSE){
                        case "xml":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/xhtml+xml'));
                            return $response->setContent($writer->toString($bodyResponse));
                            $e->stopPropagation();
                            break;
                        }
                        case "json":{
                            $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                            $jsonModel = new JsonModel($bodyResponse);
                            $jsonModel->setTerminal(true);
                            $e->setResult($jsonModel);
                            $e->setViewModel($jsonModel)->stopPropagation();
                            break;
                        }
                        default: {
                        $responseHeaders->addHeaders(array('Content-type' => 'application/json'));
                        $jsonModel = new JsonModel($bodyResponse);
                        $jsonModel->setTerminal(true);
                        $e->setResult($jsonModel);
                        $e->setViewModel($jsonModel)->stopPropagation();
                        break;
                        }
                    }
                }
            }
            break;
        }
    }
}