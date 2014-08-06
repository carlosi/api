<?php

namespace Shared\V1\REST\Functions;

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

        // Iniciamos los Joins

        // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
        $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

        // Contamos los ForeingKey que tiene el recurso
        $countFkLevel0 = count($fkLevel0);

        // Si el recurso solamente cuenta con 1 ForeingKey
        if($countFkLevel0 == 1){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoinLevel1 = substr($idFkLevel1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQueryFkLevel1 = ucfirst($tableJoinLevel1);

            //Creamos el objeto de las Queries para validar si tienen idcompany como columna
            $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

            $getQueryLevel1 = new $queryFkJoinLevel1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompany = $getQueryLevel1->create()->getTableMap()->hasColumn('idcompany');

            // Si el objeto tiene una columna llamada idcompany
            if($hasIdCompany){
                $result = $query->create('alias')
                    ->join('alias.'.$useQueryFkLevel1.' alias2')
                    ->useQuery('alias2')
                    ->filterByIdCompany($idcompany)
                    ->endUse()
                    ->findPk($id);
            }else{

            }
        }

        // Si el recurso tiene 2 ForeingKeys
        if($countFkLevel0 == 2){

            // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
            $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

            // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
            $idFk1Level1 = $idsFkLevel1[0];
            $idFk2Level1 = $idsFkLevel1[1];

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin1Level1 = substr($idFk1Level1, 2);
            $tableJoin2Level1 = substr($idFk2Level1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
            $useQueryFk1Level1 = ucfirst($tableJoin1Level1);
            $useQueryFk2Level1 = ucfirst($tableJoin2Level1);

            // En este paso ya tenemos UserQuery, ClientQuery, etc..)
            $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
            $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

            //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
            $getQueryFk1Level1 = new $queryFkJoin1Level1;
            $getQueryFk2Level1 = new $queryFkJoin2Level1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
            $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

            // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
            if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                if($hasIdCompanyQueryFk1Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk1Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->findPk($id);
                }
                if($hasIdCompanyQueryFk2Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk2Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->findPk($id);
                }

            }else{

                // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                // Contamos los ForeingKey que tiene el recurso
                $countFkLevel2 = count($idsFk1Level2);

                // Si el recurso solamente cuenta con 1 ForeingKey
                if($countFkLevel2 == 1){

                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $tableJoinLevel2 = substr($idFkLevel2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQueryFkLevel2 = ucfirst($tableJoinLevel2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                    //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                    $getQueryFkLevel2 = new $queryFkJoinLevel2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                    // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                    if($hasIdCompanyQueryFkLevel2 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                ->useQuery('alias3')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                            ->endUse()
                            ->findPk($id);
                    }else{

                        //Pendiente
                        //...
                    }
                }

                if($countFkLevel2 == 2){

                    // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                    $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                    // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                    $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                    $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $tableJoin1 = substr($idForeingKeyJoin1, 2);
                    $tableJoin2 = substr($idForeingKeyJoin2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQuery1 = ucfirst($tableJoin1);
                    $useQuery2 = ucfirst($tableJoin2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryForeingKeyJoin1 = $useQuery1."Query";
                    $queryForeingKeyJoin2 = $useQuery2."Query";

                    //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                    $getQuery1 = new $queryForeingKeyJoin1;
                    $getQuery2 = new $queryForeingKeyJoin2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                    $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                    // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                    if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                        if($hasIdCompanyQ1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery1.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->findPk($id);
                        }
                        if($hasIdCompanyQ2 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery2.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->findPk($id);
                        }
                    }else{

                    }

                }
            }
        }
        return $result;
    }
    public static function getIdCompanyForList($query, $idcompany, $page, $limit){

        // Guardamos y validamos si XXXQuery() contiene la columna "idcompany"
        $hasIdCompany = $query->getTableMap()->hasColumn('idcompany');
        if(!$hasIdCompany){

            // Iniciamos los Joins

            // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
            $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

            // Contamos los ForeingKey que tiene el recurso
            $countFkLevel0 = count($fkLevel0);

            // Si el recurso solamente cuenta con 1 ForeingKey
            if($countFkLevel0 == 1){

                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $tableJoinLevel1 = substr($idFkLevel1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $useQueryFkLevel1 = ucfirst($tableJoinLevel1);

                //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

                $getQueryLevel1 = new $queryFkJoinLevel1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompany = $getQueryLevel1->create()->getTableMap()->hasColumn('idcompany');

                // Si el objeto tiene una columna llamada idcompany
                if($hasIdCompany){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFkLevel1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->paginate($page, $limit);
                }else{

                }
            }

            // Si el recurso tiene 2 ForeingKeys
            if($countFkLevel0 == 2){

                // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

                // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                $idFk1Level1 = $idsFkLevel1[0];
                $idFk2Level1 = $idsFkLevel1[1];

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $tableJoin1Level1 = substr($idFk1Level1, 2);
                $tableJoin2Level1 = substr($idFk2Level1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
                $useQueryFk1Level1 = ucfirst($tableJoin1Level1);
                $useQueryFk2Level1 = ucfirst($tableJoin2Level1);

                // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
                $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

                //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                $getQueryFk1Level1 = new $queryFkJoin1Level1;
                $getQueryFk2Level1 = new $queryFkJoin2Level1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
                $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

                // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                    if($hasIdCompanyQueryFk1Level1 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page, $limit);
                    }
                    if($hasIdCompanyQueryFk2Level1 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk2Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page, $limit);
                    }

                }else{

                    // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                    $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                    //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                    // Contamos los ForeingKey que tiene el recurso
                    $countFkLevel2 = count($idsFk1Level2);

                    // Si el recurso solamente cuenta con 1 ForeingKey
                    if($countFkLevel2 == 1){

                        // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                        $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $tableJoinLevel2 = substr($idFkLevel2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQueryFkLevel2 = ucfirst($tableJoinLevel2);

                        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                        $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                        //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                        $getQueryFkLevel2 = new $queryFkJoinLevel2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                        // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                        if($hasIdCompanyQueryFkLevel2 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                ->useQuery('alias3')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->endUse()
                                ->paginate($page, $limit);
                        }else{

                            //Pendiente
                            //...
                        }
                    }

                    if($countFkLevel2 == 2){

                        // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                        $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                        // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                        $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                        $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $tableJoin1 = substr($idForeingKeyJoin1, 2);
                        $tableJoin2 = substr($idForeingKeyJoin2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQuery1 = ucfirst($tableJoin1);
                        $useQuery2 = ucfirst($tableJoin2);

                        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                        $queryForeingKeyJoin1 = $useQuery1."Query";
                        $queryForeingKeyJoin2 = $useQuery2."Query";

                        //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                        $getQuery1 = new $queryForeingKeyJoin1;
                        $getQuery2 = new $queryForeingKeyJoin2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                        $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                        // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                        if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                            if($hasIdCompanyQ1 == true){
                                $result = $query->create('alias')
                                    ->join('alias.'.$useQuery1.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page, $limit);
                            }
                            if($hasIdCompanyQ2 == true){
                                $result = $query->create('alias')
                                    ->join('alias.'.$useQuery2.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page, $limit);
                            }
                        }else{

                        }

                    }
                }
            }
        }else{

            // Si el $query es del recurso Company
            if($query->getModelName() == 'Company'){
                $result = $query->paginate($page,$limit);
            }else{
                $result = $query->filterByIdCompany($idcompany)->paginate($page,$limit);
            }
        }
        return $result;
    }

    public static function getCompanyIdForDelete($query, $idcompany, $id){

        // Si el $query es  del recurso Company
        if($query->getModelName() == 'Company'){
            $result = $query->create()->findPk($id);
        }

        // Iniciamos los Joins

        // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
        $fkLevel0 = array_keys($query->getTablemap()->getForeignKeys());

        // Contamos los ForeingKey que tiene el recurso
        $countFkLevel0 = count($fkLevel0);

        // Si el recurso solamente cuenta con 1 ForeingKey
        if($countFkLevel0 == 1){

            // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
            $idFkLevel1 = key($query->getTablemap()->getForeignKeys());

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoinLevel1 = substr($idFkLevel1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
            $useQueryFkLevel1 = ucfirst($tableJoinLevel1);

            //Creamos el objeto de las Queries para validar si tienen idcompany como columna
            $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

            $getQueryLevel1 = new $queryFkJoinLevel1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompany = $getQueryLevel1->create()->getTableMap()->hasColumn('idcompany');

            // Si el objeto tiene una columna llamada idcompany
            if($hasIdCompany){
                $result = $query->create('alias')
                    ->join('alias.'.$useQueryFkLevel1.' alias2')
                    ->useQuery('alias2')
                        ->filterByIdCompany($idcompany)
                    ->endUse()
                    ->filterByPrimaryKey($id)
                    ->exists();
            }else{

            }
        }

        // Si el recurso tiene 2 ForeingKeys
        if($countFkLevel0 == 2){

            // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
            $idsFkLevel1 = array_keys($query->getTablemap()->getForeignKeys());

            // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
            $idFk1Level1 = $idsFkLevel1[0];
            $idFk2Level1 = $idsFkLevel1[1];

            // Eliminamos los 2 primeros caracteres (id) de nuestro string
            $tableJoin1Level1 = substr($idFk1Level1, 2);
            $tableJoin2Level1 = substr($idFk2Level1, 2);

            // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
            $useQueryFk1Level1 = ucfirst($tableJoin1Level1);
            $useQueryFk2Level1 = ucfirst($tableJoin2Level1);

            // En este paso ya tenemos UserQuery, ClientQuery, etc..)
            $queryFkJoin1Level1 = $useQueryFk1Level1."Query";
            $queryFkJoin2Level1 = $useQueryFk2Level1."Query";

            //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
            $getQueryFk1Level1 = new $queryFkJoin1Level1;
            $getQueryFk2Level1 = new $queryFkJoin2Level1;

            // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
            $hasIdCompanyQueryFk1Level1 = $getQueryFk1Level1->create()->getTableMap()->hasColumn('idcompany');
            $hasIdCompanyQueryFk2Level1 = $getQueryFk2Level1->create()->getTableMap()->hasColumn('idcompany');

            // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
            if($hasIdCompanyQueryFk1Level1 == true || $hasIdCompanyQueryFk2Level1 == true){

                if($hasIdCompanyQueryFk1Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk1Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->filterByPrimaryKey($id)
                        ->exists();
                }
                if($hasIdCompanyQueryFk2Level1 == true){
                    $result = $query->create('alias')
                        ->join('alias.'.$useQueryFk2Level1.' alias2')
                        ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->filterByPrimaryKey($id)
                        ->exists();
                }

            }else{

                // Obtenemos el (los) ForeingKey (s) que tiene (n) el recurso (tabla)
                $idsFk1Level2 = array_keys($getQueryFk1Level1->getTablemap()->getForeignKeys());
                //$idsFk2Level2 = array_keys($getQueryFk2Level1->getTablemap()->getForeignKeys());

                // Contamos los ForeingKey que tiene el recurso
                $countFkLevel2 = count($idsFk1Level2);

                // Si el recurso solamente cuenta con 1 ForeingKey
                if($countFkLevel2 == 1){

                    // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                    $idFkLevel2 = key($getQueryFk1Level1->getTablemap()->getForeignKeys());

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $tableJoinLevel2 = substr($idFkLevel2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQueryFkLevel2 = ucfirst($tableJoinLevel2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                    //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                    $getQueryFkLevel2 = new $queryFkJoinLevel2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                    // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                    if($hasIdCompanyQueryFkLevel2 == true){
                        $result = $query->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                    ->useQuery('alias3')
                                        ->filterByIdCompany($idcompany)
                                    ->endUse()
                                ->endUse()
                            ->filterByPrimaryKey($id)
                            ->exists();
                    }else{

                        //Pendiente
                        //...
                    }
                }

                if($countFkLevel2 == 2){

                    // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                    $idsForeingKeyJoinQ1 = array_keys($query->getTablemap()->getForeignKeys());

                    // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                    $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                    $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                    // Eliminamos los 2 primeros caracteres (id) de nuestro string
                    $tableJoin1 = substr($idForeingKeyJoin1, 2);
                    $tableJoin2 = substr($idForeingKeyJoin2, 2);

                    // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                    $useQuery1 = ucfirst($tableJoin1);
                    $useQuery2 = ucfirst($tableJoin2);

                    // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                    $queryForeingKeyJoin1 = $useQuery1."Query";
                    $queryForeingKeyJoin2 = $useQuery2."Query";

                    //Creamos el objeto de Query de los 2 recursos para validar si tienen idcompany como columna
                    $getQuery1 = new $queryForeingKeyJoin1;
                    $getQuery2 = new $queryForeingKeyJoin2;

                    // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                    $hasIdCompanyQ1 = $getQuery1->create()->getTableMap()->hasColumn('idcompany');
                    $hasIdCompanyQ2 = $getQuery2->create()->getTableMap()->hasColumn('idcompany');

                    // Si uno de los 2 recursos (tambien llamados Objetos o Tablas) tiene la columna idcompany
                    if($hasIdCompanyQ1 == true || $hasIdCompanyQ2 == true){
                        if($hasIdCompanyQ1 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery1.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->filterByPrimaryKey($id)
                                ->exists();
                        }
                        if($hasIdCompanyQ2 == true){
                            $result = $query->create('alias')
                                ->join('alias.'.$useQuery2.' alias2')
                                ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->filterByPrimaryKey($id)
                                ->exists();
                        }
                    }else{

                    }

                }
            }
        }
        return $result;
    }


    /*Funcion para ejecutar una consulto a la base de datos. $query debe ser una variable de tipo Query que genera propel por ejemplo:
    ClientQuery, CompanyQuery, BranchQuery, etc....
    */
    public static function executeQuery($query, $table, $idcompany,$page,$limit, array $filters=null, $order, $dir){
        
        //Los Filtros
        if($filters!=null){
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
           'self' => array('href' => URL_API.'/'.$table.'?page='.$result->getPage()),
           'prev' => array('href' => URL_API.'/'.$table.'?page='.$result->getPreviousPage()),
           'next' => array('href' => URL_API.'/'.$table.'?page='.$result->getNextPage()),
           'first' => array('href' => URL_API.'/'.$table),
           'last' => array('href' => URL_API.'/'.$table.'?page='.$result->getLastPage()),
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