<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Company\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

use BranchQuery;
use Shared\Functions\SessionManager;
use Shared\Functions\ArrayManage;
use Company\ACL\Branch\BranchFormGET;

class BranchController extends AbstractRestfulController
{
    
    protected $table = 'branch';
    protected $collectionOptions = array('GET');
    protected $entityOptions = array('GET', 'POST', 'PUT', 'DELETE');
    protected $getFilters = array('neq','in','nin','gt','lt','from','to','like');
    
    public function getQuery(){
        return new BranchQuery();
    }
    
    public function getToken(){
       return $this->params('token');
    }
    
   public function getList(){
       
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
            
            //Instanciamos nuestro formulario de acuerdo al nivel del usuario que realiza la peticion.
            $branchForm = BranchFormGET::init($userLevel);
            
            //Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel?
            $allowedColumns = array();
            foreach ($branchForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            
            //Verificamos que si nos envian filtros por GET si no ponemos valores por default
            $limit= (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 10;
            if($limit>100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir= $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order= in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idbranch';
            $page= (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;
            $filters = $this->params()->fromQuery('filter') ? $this->params()->fromQuery('filter') : null;        
            if($filters!=null) $filters = ArrayManage::getFilter_isvalid($filters, $this->getFilters, $allowedColumns); // Si nos envian filtros hacemos la validacion
            
            $result = ArrayManage::executeQuery($this->getQuery(), $this->table, $idCompany,$page,$limit,$filters,$order,$dir);
            var_dump($result);
            $branchArray = array();
            
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
    

}
    							