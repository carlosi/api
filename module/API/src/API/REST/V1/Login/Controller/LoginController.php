<?php

/**
 * LoginController.php
 * BuyBuy
 *
 * Created by Buybuy on 12/08/2014.
 * Copyright (c) 2014 Buybuy. All rightreserved.
 */

namespace API\REST\V1\Login\Controller;

// - ZF2 - //
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

// - Shared - //
use API\REST\V1\Shared\Functions\SessionManager;

/**
 * Class LoginController
 * @package API\REST\V1\Login\Controller
 */
class LoginController extends AbstractActionController
{
    /**
     * @return JsonModel
     */
    public function loginAction(){

        $requestContentType = $this->getRequest()->getHeaders('ContentType')->getMediaType();

            
             switch($requestContentType){
                case 'application/x-www-form-urlencoded':{
                    
                    $request = $this->getRequest();
 
                    $user_nickname = $this->getRequest()->getPost()->user_nickname ? $this->getRequest()->getPost()->user_nickname : null;
                    $user_password = $this->getRequest()->getPost()->user_password ? hash('sha256', $this->getRequest()->getPost()->user_password) : null;
                    break;
                }
                case 'application/json':{

                    $requestContent = $this->getRequest()->getContent();
                    $requestArray = json_decode($requestContent, true);
                    
                    if($requestArray != null){
                        
                        $user_nickname = isset($requestArray['user_nickname']) ? $requestArray['user_nickname'] : null;
                        $user_password = isset($requestArray['user_password']) ? hash('sha256', $requestArray['user_password']) : null;

                        break;
                    }else{
                        
                        $response = $this->getResponse();
                        $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                        $response->getHeaders()->addHeaderLine('Message', 'Sintax Error');
                        $statusCode = $response->getStatusCode();

                        $body = array(
                            'HTTP Status' => $statusCode,
                            'Title' => 'Bad Request' ,
                            'Details' => 'JSON Sintax Error',
                            'More Info' => "http://buybuy.com/api/docs"
                        );
                        
                        return new JsonModel($body);
                    }
                    
                }
                default :{
                    $response = $this->getResponse();
                    $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400);
                    $body = array(
                        'HTTP Status' => '400' ,
                        'Title' => 'Bad Request' ,
                        'Details' => 'Not received Content-Type Header. Please add a Content-Type Header',
                        'More Info' => "http://buybuy.com/api/docs"
                    );

                    return new JsonModel($body);
                    break;
                }
             }
             
             //Si se recibio el nombre de usuario y la contraseña
             if($user_nickname != null && $user_password != null){
                 //Validamos los datos
                 if(\UserQuery::create()->filterByUserNickname($user_nickname)->filterByUserPassword($user_password)->exists()){
                     //Instanciamos nuestro usuario
                     $user = \UserQuery::create()->filterByUserNickname($user_nickname)->filterByUserPassword($user_password)->findOne();
                     $userArray = \UserQuery::create()->filterByUserNickname($user_nickname)->filterByUserPassword($user_password)->findOne()->toArray(\BasePeer::TYPE_FIELDNAME);
                     //Validamos que el usuario tenga status active              
                     if($user->getUserStatus() == 'active'){
                         //Comenzamos a darle formato a nuestra respuesta
                         $loginArray = array(
                            'User' => array(
                                'id' => $user->getIdUser(),
                                'user_nickname' => $user->getUserNickname(),
                                'user_status' => $user->getUserStatus(), 
                                'user_type' => $user->getUserType(),
                            ),                       
                        );
                        $company = $user->getCompany();
                        $loginArray['Company'] = array(
                            'id' => $user->getIdCompany(),
                            'company_name' => $company->getCompanyName(),
                        );
                        $loginArray['ACL'] = array(
                            'to_company' => (int)SessionManager::getUserLevelToCompany($user->getIdUser()),
                            'to_sales' => (int)SessionManager::getUserLevelToSales($user->getIdUser()),
                            'to_contents' => (int)SessionManager::getUserLevelToContents($user->getIdUser()),
                        );
                        $token = SessionManager::getValidToken($user->getIdUser());
                        $loginArray['Token'] = array(
                            'access_token' => $token->getToken(),
                            'created_at' => $token->getCreatedAt(),
                            'expires_in' => $token->getExpiresIn(),                     
                        );
                        return new JsonModel($loginArray);
                     }
                 }     
             }
             
             //Modifiamos el Header de nuestra respuesta
                $response = $this->getResponse();
                $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_400); //BAD REQUEST
                $bodyResponse = array(
                    'Error' => array(
                        'HTTP Status' => 400 . ' Bad Request',
                        'Title' => 'Resource data pre-validation error',
                        'Details' => "user_nickname and/or user_password are invalid"
                    ),
                );
                return new JsonModel($bodyResponse);
            
            
    }
}