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
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\JsonModel;

use BranchQuery;
use Branch;
use Company\ACL\Branch\BranchFormGET;

class BranchController extends AbstractRestfulController
{
    protected $collectionOptions = array('GET','POST');
    protected $entityOptions = array('GET', 'PATCH', 'PUT', 'DELETE');
    
    public function _getOptions()
    {
        if($this->params()->fromRoute('id',false)){
            //Recibimos un ID, Retornamos un item en especifico
            return $this->entityOptions;
        }
        //De lo contrario retornamos una collecion
        return $this->collectionOptions;
    }
    
    public function option()
    {
        $response = $this->getResponse();
        
        $response->getHeaders()
                 ->addHeaderLine('Allow', implode(',', $this->_getOptions()));
        
        //Retprnamos la respuesta
        return $response; 
    }
    
    public function setEventManager(EventManagerInterface $events) 
    {
        $this->events = $events;
        
        $events->attach('dispatch',array($this,'checkOptions'),900);
    }
    
    public function checkOptions($e)
    {  
        if(in_array($e->getRequest()->getMethod(),$this->_getOptions())){
            //Metodo aceptado, hacemos la peticion correspondiente
            return;
        }
        
        //Metodo no permitido
        $response = $this->getResponse();
        $response->setStatusCode(405);
        
        
    }
    
    public function create($data) 
    {
        
        $branch = new Branch();
        $branch->setIdcompany(1)
               ->setBranchName('HostDime Mexico');
        $branch->save();
        $response = $this->getResponse();
        $response->setStatusCode(201);
        
        return new JsonModel($branch->toArray());
               
        
    }

    public function delete($id) {
        
    }

    public function get($id) {
        
    }

    public function getList() {
        $result = BranchQuery::create()->find();
        $response = $this->getResponse();
        $response->setStatusCode(404);
        return new JsonModel($result);
    }

    public function update($id, $data) {
        
    }

}
    							