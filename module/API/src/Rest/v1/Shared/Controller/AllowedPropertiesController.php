<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Shared\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Shared\Functions\SessionManager;

use Company\ACL\UserAcl\UserForm;

class AllowedPropertiesController extends AbstractRestfulController
{
    
    public function getToken(){
        return $this->params('token');
    }
    
    public function getList() {
        
        //Obtenemos el recurso del cual se quieren conocer las propiedades permitidas
        $resource = $this->params('resource') ? $this->params('resource') : null;
        
        //Convertimos el primer caracter del recuros en mayuscula
        $resource = ucfirst($resource);
        
        //Verificamos que el recurso existe
        if(class_exists($resource)){
            
            $form = $resource.'Form';
            //$filter = $this->getFilter($resource.'Filter', $userLevel);
            
            $resourceForm = __NAMESPACE__.'\\'.$form;
            
            var_dump($resourceForm);
            
            $resourceFilter = new $filter;
            

            
            
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_404); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 404 . ' Not Found',
                    'Title' => 'Resource not found',
                    'Details' => $resource. 'Not found',
                    'More Info' => URL_API_DOCS
                ),
            );
            return new JsonModel($bodyResponse);
        }

        
    
        
        //Obtenemos el token por medio de nuestra funcion getToken. Ya no es necesario validarlo por que esto ya lo hizo el tokenListener.
        $token = $this->getToken();
        
        //Obtenemos el IdUser propietario del token
        $idUser = SessionManager::getIDUser($token);
        
        //Obtenemos el IdCompany al que pertenece el usuario
        $idCompany = SessionManager::getIDCompany($token);
        
        //Obtenemnos el nivel de acceso del usuario para el recurso
        $userLevel = SessionManager::getUserLevelToCompany($idUser);
        
        //verificamos si el usuario tiene permisos de cualquier tipo. NOTA: nivel 0 significa que no tiene permisos de nada sobre recurso
        if($userLevel!=0){
            
        }else{
            //Modifiamos el Header de nuestra respuesta
            $response = $this->getResponse();
            $response->setStatusCode(\Zend\Http\Response::STATUS_CODE_403); //Access Denied
            $bodyResponse = array(
                'Error' => array(
                    'HTTP Status' => 403 . ' Forbidden',
                    'Title' => 'Access denied',
                    'Details' => 'Sorry but you does not have permission over this resource. Please contact with your supervisor',
                ),
            );
            return new JsonModel($bodyResponse);
        } 
    }
    
    public function getForm($nameForm,$userLevel){
        
    }
    
}

    							