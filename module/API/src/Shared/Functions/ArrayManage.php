<?php

namespace Shared\Functions;

use BasePeer;

class ArrayManage{

    // Los componentes SELECT de un Form, llevan 2 componentes, la parte Visible al usuario y la invisible. Esta funcion convierte el array recibido para lograr dicha estructura.
    public function duplicatearray(array $array=null){
        if($array!=null){
            $array_new = array();
            for($x=0;$x<count($array);$x++){
                $array_new = array(strtolower($array[$x])=>strtolower($array[$x]))+$array_new;
            }
            return $array_new;
        }else{
            return $array;
        }
    }
    public function duplicatearrayExactly(array $array=null){
        if($array!=null){
            $array_new = array();
            for($x=0;$x<count($array);$x++){
                $array_new = array($array[$x]=>$array[$x])+$array_new;
            }
            return $array_new;
        }else{
            return $array;
        }
    }

    public static function getIdCompanyForListId($query, $idcompany, $id)
    {

        // Si el $query es  del recurso Company
        if($query->getModelName() == 'Company'){
            $result = $query->create()->findPk($id);
        }

        // Iniciamos el Join de 1er nivel

        $foreingKey = array_keys($query->getTablemap()->getForeignKeys());

        $countForeingKey = count($foreingKey);

        if($countForeingKey == 1){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idForeingKeyJoin = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin = substr($idForeingKeyJoin, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery = ucfirst($tableJoin);

            $result = $query->create('alias')
                ->join('alias.'.$useQuery.' alias2')
                ->useQuery('alias2')
                    ->filterByIdCompany($idcompany)
                ->endUse()
                ->findPk($id);
        }

        if($countForeingKey == 2){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idsForeingKeyJoin = array_keys($query->getTablemap()->getForeignKeys());

            $idForeingKeyJoin1 = $idsForeingKeyJoin[0];
            $idForeingKeyJoin2 = $idsForeingKeyJoin[1];
            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin1 = substr($idForeingKeyJoin1, 2);
            $tableJoin2 = substr($idForeingKeyJoin2, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery1 = ucfirst($tableJoin1);
            $useQuery2 = ucfirst($tableJoin2);

            $result = $query->create('alias')
                ->join('alias.'.$useQuery1.' alias2')
                ->useQuery('alias2')
                    ->filterByIdCompany($idcompany)
                ->endUse()
                ->join('alias.'.$useQuery2.' alias2')
                ->useQuery('alias2')
                    ->filterByIdCompany($idcompany)
                ->endUse()
                ->findPk($id);

        }
        return $result;
    }

    public static function getIdCompanyForList($query, $idcompany, $page, $limit)
    {

        // Guardamos y validamos si XXXQuery() contiene la columna "idcompany"
        $hasIdCompany = $query->getTableMap()->hasColumn('idcompany');
        if(!$hasIdCompany){

            // Iniciamos el Join de 1er nivel
            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idForeingKeyJoin = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin = substr($idForeingKeyJoin, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery = ucfirst($tableJoin);

            // Iniciamos el Join de 2do nivel
            $class = $useQuery."Query";
            $queryJoin = new $class;

            $hasIdCompanyJoin1 = $queryJoin->getTablemap()->hasColumn('idcompany');

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idForeingKeyJoin2 = key($queryJoin->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin2 = substr($idForeingKeyJoin2, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery2 = ucfirst($tableJoin2);

            // Iniciamos el Join de 3er nivel
            $class = $useQuery2."Query";
            $queryJoin2 = new $class;

            $hasIdCompanyJoin2 = $queryJoin2->getTablemap()->hasColumn('idcompany');

            if($hasIdCompanyJoin1){

                /**
                 * example Query generated for a MySQL database:
                 *
                 * $query = 'SELECT table1.* from table1
                 * INNER JOIN table2 ON table1.id = table2.id
                 * WHERE table2.idcompany = :p1'; // :p1 => $idcompany
                 */

                $result = $query->create('alias')
                    ->join('alias.'.$useQuery.' alias2')
                    ->useQuery('alias2')
                    ->filterByIdCompany($idcompany)
                    ->endUse()
                    ->paginate($page,$limit);

            }else if($hasIdCompanyJoin2){

                $result = $query->create('alias')
                    ->join('alias.'.$useQuery.' alias2')
                        ->join('alias2.'.$useQuery2.' alias3')
                        ->useQuery('alias3')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                    ->paginate($page,$limit);
            }
        }else{
            // Si el $query es del recurso Company
            if($query->getModelName() == 'Company'){
                $result = $query->create()->paginate($page,$limit);
            }else{
                $result = $query->create()->filterByIdCompany($idcompany)->paginate($page,$limit);
            }
        }
        return $result;
    }

    public static function getCompanyIdForDelete($query, $idcompany, $id){

        // Si el $query es  del recurso Company
        if($query->getModelName() == 'Company'){
            $result = $query->create()->findPk($id);
        }

        // Iniciamos el Join de 1er nivel
        $foreingKey = array_keys($query->getTablemap()->getForeignKeys());

        $countForeingKey = count($foreingKey);

        if($countForeingKey == 1){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idForeingKeyJoin = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin = substr($idForeingKeyJoin, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery = ucfirst($tableJoin);

            $result = $query->create('alias')
                ->join('alias.'.$useQuery.' alias2')
                ->useQuery('alias2')
                ->filterByIdCompany($idcompany)
                ->endUse()
                ->filterByPrimaryKey($id)
                ->exists();
        }

        if($countForeingKey == 2){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idsForeingKeyJoin = array_keys($query->getTablemap()->getForeignKeys());

            $idForeingKeyJoin1 = $idsForeingKeyJoin[0];
            $idForeingKeyJoin2 = $idsForeingKeyJoin[1];
            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin1 = substr($idForeingKeyJoin1, 2);
            $tableJoin2 = substr($idForeingKeyJoin2, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQuery1 = ucfirst($tableJoin1);
            $useQuery2 = ucfirst($tableJoin2);

            $result = $query->create('alias')
                ->join('alias.'.$useQuery1.' alias2')
                ->useQuery('alias2')
                ->filterByIdCompany($idcompany)
                ->endUse()
                ->join('alias.'.$useQuery2.' alias2')
                ->useQuery('alias2')
                ->filterByIdCompany($idcompany)
                ->endUse()
                ->filterByPrimaryKey($id)
                ->exists();

        }
        return $result;
    }

    /*Funcion para ejecutar una consulto a la base de datos. $query debe ser una variable de tipo Query que genera propel por ejemplo:
    ClientQuery, CompanyQuery, BranchQuery, etc....
    */
    public static function executeQuery($query, $table, $idcompany,$page,$limit, array $filters=null, $order, $dir){
        
        //Los Filtros
        if($filters!=null){
            echo "Entro";
            foreach ($filters as $filter){
                //var_dump("attribute: ".$filter['attribute']);
                $params = $query->getParams();
                
                if(isset($filter['in'])){
                    
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] == $param['column']){
                                $flag = true;
                            }else{
                                $flag=false;
                            }
                        }
                        if($flag){
                            $query->addOr($table.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $query->addAnd($table.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $query->addOr($table.'.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                          ->add(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $query->filterBy(BasePeer::translateFieldname($table, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $query->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result = ArrayManage::getIdCompanyForList($query, $idcompany, $page, $limit);


        $links = array(
           'self' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getPage()),
           'prev' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getPreviousPage()),
           'next' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getNextPage()),
           'first' => array('href' => WEBSITE_API.'/'.$table),
           'last' => array('href' => WEBSITE_API.'/'.$table.'?page='.$result->getLastPage()),
        );

        if($result->getPreviousPage() == 1){
            unset($links['prev']);
        }
        if($result->isLastPage()){
            unset($links['next']);
        }

        $resume = array(
            'currentPage' => $result->getPage(),
            'itemsPerPage' => $result->getMaxPerPage(),
            'totalItems' => $result->count(),
            'lastPage' => $result->getLastPage(),
        );

        $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

        $resultArray = array(
            'links' => $links,
            'resume' => $resume,
            'data' => $data
        );

        //Retornamos nuestro resultado
        return $resultArray;

    }

    public static function getFilter_isvalid($filters,array $allowedFilters, array $allowedColumns){
    if(is_array($filters)){ //Verificamos que sea un array
        $validFilters = array();
        foreach ($filters as $filter){
            if(count($filter)==2){ //Por cada elemento de nuestro arreglo, este debe de ser un valor de tipo arreglo con dos elementos[attribute|in,neq,nin,etc] o tres elementeos[attribute|from|to]
                foreach ($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame attribute
                        if(in_array($filter['attribute'], $allowedColumns)){// Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach ($filter as $key=>$value){//Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [in|neq|nin|gt|lt]
                                if(in_array($key, $allowedFilters)){
                                    array_push($validFilters, $filter);
                                }
                            }
                        }
                    }
                }
            }else if(count($filter)==3){
                foreach($filter as $key=>$value){
                    if($key == 'attribute'){ //Comprobamos que uno de los elementos se llame [attribute]
                        if(in_array($filter['attribute'], $allowedColumns)){ // Verficamos que el atributo por el quiera filtrar, el usuario tenga acceso
                            foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento [from]
                                if($key == 'from'){
                                    foreach($filter as $key=>$value){ //Comenazamos a recorrer nuevamente nuestro arreglo para comprobrar el otro elemento[to]
                                        if($key == 'to'){
                                            array_push($validFilters,$filter);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!empty($validFilters)){
            return $validFilters;
        }else{
            return null;
        }
    }
    return null;
    }

}