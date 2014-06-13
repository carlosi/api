<?php
namespace Company\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Shared\Functions\SessionManager;
use Shared\Functions\ArrayManage;

use Criteria;
use Client;
use ClientQuery;
use TokenQuery;
use UserQuery;
use BasePeer;

use Company\ACL\Client\ClientFormGET;
use Shared\Functions\JSonResponse;                            

class ClientController extends AbstractActionController
{   
    
    private $table = "client";
    
    public function getURL(){
        return $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
    
    public function getMethod($userLevel){
        $JsonResponse = new JSonResponse();
        
        //Verificamos si nos has enviado un ID del recurso
        $id= (int) $this->params()->fromRoute('idclient') ? (int)$this->params()->fromRoute('idclient')  : null;
        
        //Si si nos enviaron un ID
        if($id!=null){
            $clientQuery = ClientQuery::create()->findPk($id);
            //verificamos que exista el id
            if($clientQuery!=null){
                $client = $clientQuery->toArray(BasePeer::TYPE_FIELDNAME);
                return $JsonResponse->getResponse(200,$client);
            }else{
                return false;
            }
        }  
    }
    
    public function postMethod(){
        /* - hacer un foreach en <las propiedades recibidas en body o post> si la propiedad no existe como elemento en el formulario /Sales/Form/Search/Order.php desecharla.
         * - en cada propiedad revisar si su valor es un array, tomamos el valor y hacemos check (en el valor del MultiSelect), si el valor recibido no es una opción en el elemento del formulario /Sales/Form/Search/Order.php desechamos el valor.
        * - Si el valor de la propiedad es un String, asegurarnos entonces que la propiedad sea un tipo Hidden, si lo es ponemos como valor el string.
        * - Una vez se haya hecho el SetData, hacemos el isValid
        * - Si el isValid aplicamos el Filtrado al Consultar
        *
        * */
    }
    
    public function putMethod(){
        
    }
    
    public function deleteMethod(){
    
    }
    
    public function getEntity($id, $userLevel){
        
        $arrayManage = new ArrayManage();
        $clientQuery = \ClientQuery::create()->findPk($id);
        
        //verificamos que exista el id
        if($clientQuery!=null){
            $list = $clientQuery->toArray(BasePeer::TYPE_FIELDNAME);

            $client = array();
            $clientForm = ClientFormGET::init(3);

            foreach ($clientForm->getElements() as $key=>$value){
                $row = array();
                $row[$key] = $list[$key];
                 array_push($client, $row);
            }
            return $client;
        }else{
            return false;
        }   
    }
    
    public function getCollection($limit=50, $orderBy='client_name', $order='ASC', array $conditions=null, $column_like=null, $word=null, $exactly=false){
        $arrayManage = new ArrayManage();
        $clientQuery = new ClientQuery();
        $list = $arrayManage->executeQuery($clientQuery, $this->table,$limit,$conditions,$orderBy,$order,$column_like,$word,$exactly);
        $client = array();
        $clientForm = ClientFormGET::init(1);
            
        foreach ($list as $item){
            $row = array();
            foreach ((array)$clientForm->getElements() as $key=>$value){
                $row[$key] = $item[$key];
            }
            array_push($client, $row);
        }
        return $client;
    }
    
    public function indexAction(){
        $JsonResponse = new JSonResponse();
        
        $sessionManager = new SessionManager();
        
        // Obtenemos el método empleado por cURL; en caso de no indentificar el método ponemos GET por default.
        $method    = (string)  $_SERVER['REQUEST_METHOD']  ? (string)   $_SERVER['REQUEST_METHOD']  : "GET";
        
        //Dependiendo del metodo es la forma en la que vamos a obtener el token.
        
        //Obtenemos el parametro token, de la URL, sino tiene valor, le asignamos NULL por Defecto
        $token  = (string)  $this->params()->fromRoute('token')  ? (string) $this->params()->fromRoute('token'): null;

        //token valido de prueba
        $tokenTest = "049824082dddd09815b81bb8d8a97981af9a66802b0fb84d696d0b746fe7301f7bd";
          
        //Verificamos que el token este puesto y sea valido
        if($sessionManager->TokenIsValid($tokenTest)){
            
            //Obtenemos el id del usuario propietario del token
            $iduser = TokenQuery::create()->findOneByToken($tokenTest)->getIduser();
            
            //Obtenemos el nivel del usuario para Sales por medio de su id
            $userLevel = $sessionManager->getUserLevelToSales($iduser);
            
            //Dependiendo del metodo de la peticion mandamos a llamar a la funcion correspondiente
            switch ($method){
                case "GET":{
                    //Verificamos si nos has enviado un ID del recurso si no le asignamos null por defecto
                    $id= (int) $this->params()->fromRoute('idclient') ? (int)$this->params()->fromRoute('idclient')  : null;
                    if($id!=null){
                        $client = $this->getEntity($id,$userLevel);
                        //Si tuvo exito la consulta getEntity
                        if($client){
                            return $JsonResponse->getResponse(200,$client);
                        }else{
                            return $JsonResponse->getResponse();
                        }
                    }else{
                        
                        //Valores getcollection por default
                        $limit   =   (int)$this->params()->fromRoute('limit')       ? (int)$this->params()->fromRoute('limit')     : 25;
                        $orderBy =   (String)$this->params()->fromRoute('orderBy')  ? (String)$this->params()->fromRoute('orderBy'): 'client_name';
                        $order   =   (String)$this->params()->fromRoute('orderBy')  ? (String)$this->params()->fromRoute('orderBy'): 'ASC';
                        
                       $clients = $this->getCollection($limit, $orderBy, $order);
                       return $JsonResponse->getResponse(200,$clients);
                    }
                } 
                case "POST":{
                    break;
                }
            
                case "PUT":{
                    break;
                }
                case "DELETE":{
                    break;    
                }  
            }
            
        }

    }
        
        public function GETAction(){

            $JsonResponse = new JSonResponse();
            return $JsonResponse->getResponse(200);
//            
//            //Verificamos si nos has enviado un ID del recurso
//            $id= (int) $this->params()->fromRoute('idclient') ? (int)$this->params()->fromRoute('idclient')  : null;
//
//            //Si no nos fue enviado nada ningun ID invocamos la funcion getCollection de lo contrario la entidad del ID enviado
//            if ($id==null){
//                return $this->getCollection();
//            }else{
//                $client = $this->getEntity($id);
//                var_dump($JsonResponse->getResponse(200, $client));
//                return $JsonResponse->getResponse(200, $client);
//            }
            
          
            
//               //Obtenemos el id del usuario propietario del token
//                $iduser = TokenQuery::create()->findOneByToken($tokenTest)->getIduser();
//                //Obtenemos el usuario por medio del idUser
//                $userLevel = $sessionManager->getUserLevelToCompany($iduser);
//                //Instanciamos nuestro formulario de acuerdo al nivel del Usuario
//                $clientFormGET = ClientFormGET::init($userLevel);
//                // Verificamos si está puesto el IDPK como parametro en la URL
//                $idclient = (int) $this->params()->fromRoute('idclient') ? (int)$this->params()->fromRoute('idclient')  : null;
//                //Si nos enviaron un idclient
//                if($idclient!=null){
//                    $client = $this->getEntity($idclient);
//                    return $JsonResponse->getResponse(200, $client);
//                }
             
            
//            
//            
//            
//            $JsonResponse = new JSonResponse();
//            
//            $entityBody = file_get_contents('php://input');
//            
//            var_dump($idclient);
            //$this->getCollection();
//            $limit = 50;
//            $conditions = array('client_status' => array('active','pending','testing'),'idcompany' => 1, 'client_iso_codecountry' => array('MX','US')); //CON OR y con AND
//            $orderBy = 'client_name';
//            $order = 'ASC';
//            $column_like = 'client_name';
//            $word = 'Dan';
//            $exactly = false;  
//            
//            
//            
//           $arrayManage = new ArrayManage();
//           
//           $result = $arrayManage->executeQuery($q, $this->table,null,$conditions);
//           
//           
//           var_dump($result);
//            

//             $clientForm = ClientFormGET::init(3);
//             
//
//             $sessionManager = new SessionManager();
//             var_dump($sessionManager->getIDCompany("049824082dddd09815b81bb8d8a97981af9a66802b0fb84d696d0b746fe7301f7bd"));
//
//             var_dump(\ClientQuery::create()->find());
        }       
}