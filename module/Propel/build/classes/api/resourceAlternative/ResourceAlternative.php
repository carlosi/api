<?php
/**
 * Created by PhpStorm.
 * User: carlosesparza
 * Date: 18/09/14
 * Time: 16:54
 */

//// Functions ////
use API\REST\V1\Shared\Functions\ResourceManager;

//// Forms ////
use API\REST\V1\ACL\Company\User\Form\UserFormGET;
use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;
use API\REST\V1\ACL\Company\Departmentleader\Form\DepartmentleaderFormGET;

class ResourceAlternative {

    /////////// Start getList ///////////

    /////////// Start get ///////////

    /**
     * @param $resourceAlternativeQuery
     * @param $idcompany
     * @param $page
     * @param $limit
     * @param array $filters
     * @param $order
     * @param $dir
     * @return array
     */
    public function getCollectionAlternative($resourceAlternativeQuery, $idcompany, $page, $limit, array $filters=null, $order, $dir){
        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $resourceAlternativeQuery->getParams();
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
                            $resourceAlternativeQuery->addOr(RESOURCE_CHILD.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $resourceAlternativeQuery->addAnd(RESOURCE_CHILD.'.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN);
                    }
                }

                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $resourceAlternativeQuery->addOr(RESOURCE_CHILD.'.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL);
                    }
                }
                if(isset($filter['gt'])){
                    $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN);
                }
                if(isset($filter['lt'])){
                    $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN);
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $resourceAlternativeQuery->filterBy(BasePeer::translateFieldname(RESOURCE_CHILD, $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE);
                }
            }
        }

        //Order y Dir
        if($order !=null || $dir !=null){
            $resourceAlternativeQuery->orderBy($order, $dir);
        }

        //// Start the Joins ////

        // Guardamos y validamos si XXXQuery() contiene la columna "idcompany"
        $hasIdCompany = $resourceAlternativeQuery->getTableMap()->hasColumn('idcompany');
        if(!$hasIdCompany){

            // Obtenemos el (los) ForeingKey (s) que tiene el recurso (tabla)
            $fkLevel0 = array_keys($resourceAlternativeQuery->getTablemap()->getForeignKeys());

            // Contamos los ForeingKey que tiene el recurso
            $countFkLevel0 = count($fkLevel0);

            // Si el recurso solamente cuenta con 1 ForeingKey
            if($countFkLevel0 == 1){

                // Obtenemos un string del id de la llave foranea de nuestro XXXQuery()
                $idFkLevel1 = key($resourceAlternativeQuery->getTablemap()->getForeignKeys());

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $resourceJoinLevel1 = substr($idFkLevel1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                $useQueryFkLevel1 = ucfirst($resourceJoinLevel1);

                //Creamos el objeto de las Queries para validar si tienen idcompany como columna
                $queryFkJoinLevel1 = $useQueryFkLevel1."Query";

                $resourceQueryFKLevel1 = new $queryFkJoinLevel1;

                // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                $hasIdCompany = $resourceQueryFKLevel1->create()->getTableMap()->hasColumn('idcompany');

                // Si el objeto tiene una columna llamada idcompany
                if($hasIdCompany){
                    $useResourceQuery = "use".$useQueryFkLevel1."Query";
                    $result = $resourceAlternativeQuery
                        ->$useResourceQuery()
                            ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->paginate($page,$limit);

                    /*
                     * De esta forma, no funcionan los filters
                    $result = $resourceAlternativeQuery->create('alias')
                        ->join('alias.'.$useQueryFkLevel1.' alias2')
                        ->useQuery('alias2')
                        ->filterByIdCompany($idcompany)
                        ->endUse()
                        ->paginate($page,$limit);
                    */
                }else{

                    //Pendiente
                    //...
                }
            }

            // Si el recurso tiene 2 ForeingKeys
            if($countFkLevel0 == 2){

                // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                $idsFkLevel1 = array_keys($resourceAlternativeQuery->getTablemap()->getForeignKeys());

                // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                $idFk1Level1 = $idsFkLevel1[0];
                $idFk2Level1 = $idsFkLevel1[1];

                // Eliminamos los 2 primeros caracteres (id) de nuestro string
                $resourceJoin1Level1 = substr($idFk1Level1, 2);
                $resourceJoin2Level1 = substr($idFk2Level1, 2);

                // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, Branch, etc..)
                $useQueryFk1Level1 = ucfirst($resourceJoin1Level1);
                $useQueryFk2Level1 = ucfirst($resourceJoin2Level1);

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
                        $useResourceQuery = "use".$useQueryFk1Level1."Query";
                        $result = $resourceAlternativeQuery
                            ->$useResourceQuery()
                                ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page,$limit);

                        /*
                         * De esta forma no funcionan los filters
                        $result = $resourceAlternativeQuery->create('alias')
                            ->join('alias.'.$useQueryFk1Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page,$limit);
                         */

                    }
                    if($hasIdCompanyQueryFk2Level1 == true){
                        $useResourceQuery = "use".$useQueryFk2Level1."Query";
                        $result = $resourceAlternativeQuery
                            ->$useResourceQuery()
                                ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page,$limit);
                        /*
                         * De esta forma no funcionan los filters
                        $result = $resourceAlternativeQuery->create('alias')
                            ->join('alias.'.$useQueryFk2Level1.' alias2')
                            ->useQuery('alias2')
                            ->filterByIdCompany($idcompany)
                            ->endUse()
                            ->paginate($page,$limit);
                         */
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
                        $resourceJoinLevel2 = substr($idFkLevel2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQueryFkLevel2 = ucfirst($resourceJoinLevel2);

                        // En este paso ya tenemos UserQuery, ClientQuery, etc..)
                        $queryFkJoinLevel2 = $useQueryFkLevel2."Query";

                        //Creamos el objeto de Query del recurso para validar si tiene idcompany como columna
                        $getQueryFkLevel2 = new $queryFkJoinLevel2;

                        // Comprobamos si existe idcompany en el Objeto y lo almacenamos en una variable booleana
                        $hasIdCompanyQueryFkLevel2 = $getQueryFkLevel2->create()->getTableMap()->hasColumn('idcompany');

                        // Si el recursos (tambien llamado Objeto o Tabla) tienen la columna idcompany
                        if($hasIdCompanyQueryFkLevel2 == true){

                            $useResourceQuery = "use".$useQueryFk1Level1."Query";
                            $useResource2Query = "use".$useQueryFkLevel2."Query";
                            $result = $resourceAlternativeQuery
                                ->$useResourceQuery()
                                    ->$useResource2Query()
                                        ->filterByIdCompany($idcompany)
                                    ->endUse()
                                ->endUse()
                                ->paginate($page,$limit);

                            /*
                             * De esta forma no funcionan los filters
                            $result = $resourceAlternativeQuery->create('alias')
                                ->join('alias.'.$useQueryFk1Level1.' alias2')
                                ->useQuery('alias2')
                                ->join('alias2.'.$useQueryFkLevel2.' alias3')
                                ->useQuery('alias3')
                                ->filterByIdCompany($idcompany)
                                ->endUse()
                                ->endUse()
                                ->paginate($page,$limit);
                            */

                        }else{

                            //Pendiente
                            //...
                        }
                    }

                    if($countFkLevel2 == 2){

                        // Obtenemos un array de los ids de los ForeingKeys de nuestro recurso
                        $idsForeingKeyJoinQ1 = array_keys($resourceAlternativeQuery->getTablemap()->getForeignKeys());

                        // Obtenemos el valor (ids) en string de cada ForeingKey de nuestro recurso
                        $idForeingKeyJoin1 = $idsForeingKeyJoinQ1[0];
                        $idForeingKeyJoin2 = $idsForeingKeyJoinQ1[1];

                        // Eliminamos los 2 primeros caracteres (id) de nuestro string
                        $resourceJoin1 = substr($idForeingKeyJoin1, 2);
                        $resourceJoin2 = substr($idForeingKeyJoin2, 2);

                        // La inicial de nuestro string la hacemos mayuscula (En este paso ya tenemos User, Client, etc..)
                        $useQuery1 = ucfirst($resourceJoin1);
                        $useQuery2 = ucfirst($resourceJoin2);

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

                                $useResourceQuery = "use".$useQuery1."Query";
                                $result = $resourceAlternativeQuery
                                    ->$useResourceQuery()
                                        ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page,$limit);

                                /*
                                 * De esta forma no funcionan los filters

                                $result = $resourceAlternativeQuery->create('alias')
                                    ->join('alias.'.$useQuery1.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page,$limit);
                                 */
                            }
                            if($hasIdCompanyQ2 == true){

                                $useResourceQuery = "use".$useQuery2."Query";
                                $result = $resourceAlternativeQuery
                                    ->$useResourceQuery()
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page,$limit);

                                /*
                                 * De esta forma no funcionan los filters

                                $result = $resourceAlternativeQuery->create('alias')
                                    ->join('alias.'.$useQuery2.' alias2')
                                    ->useQuery('alias2')
                                    ->filterByIdCompany($idcompany)
                                    ->endUse()
                                    ->paginate($page,$limit);
                                */
                            }
                        }else{

                            //Pendiente
                            //...
                        }

                    }
                }
            }
        }else{

            $result = $resourceAlternativeQuery->filterByIdCompany($idcompany)->paginate($page,$limit);

        }
        //// End the Joins ////

        $links = array(
            'self' => array('href' => URL_API.'/'.MODULE.'/'.RESOURCE.'/'.ID_RESOURCE.'/'.RESOURCE_CHILD.'?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/'.MODULE.'/'.RESOURCE.'/'.ID_RESOURCE.'/'.RESOURCE_CHILD.'?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/'.MODULE.'/'.RESOURCE.'/'.ID_RESOURCE.'/'.RESOURCE_CHILD.'?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/'.MODULE.'/'.RESOURCE.'/'.ID_RESOURCE.'/'.RESOURCE_CHILD.''),
            'last' => array('href' => URL_API.'/'.MODULE.'/'.RESOURCE.'/'.ID_RESOURCE.'/'.RESOURCE_CHILD.'?page='.$result->getLastPage()),
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

    /**
     * @param $getCollectionAlternative
     * @param $getCollectionAlternative
     * @param $userLevel
     * @return array
     */
    public function getCollectionResponse($getCollectionAlternative, $userLevel){

        switch(RESOURCE){
            case "branch":{
                switch(RESOURCE_CHILD){
                    case "staff":{
                        // Instanciamos nuestro formulario resourceFormPostPut
                        $resourceAlternativeFormGET = ResourceManager::getResourceFormGET(ucfirst(RESOURCE_CHILD));
                        $FormAlternativeFormGET = $resourceAlternativeFormGET::init($userLevel);

                        $resourceAlternativeArray = array();
                        foreach ($getCollectionAlternative['data'] as $item){

                            $row = array(
                                "_links" => array(
                                    'self' => array('href' => URL_API.'/'.MODULE.'/staff/'.$item['idstaff']),
                                ),
                            );

                            foreach ($FormAlternativeFormGET->getElements() as $key=>$value){
                                $row[$key] = $item[$key];
                            }

                            // Agregamos en la respuesta el iduser y nick_name al que pertenece el staff.
                            $userQuery = UserQuery::create()->filterByIduser($item['iduser'])->findOne();
                            $user = $userQuery->toArray(BasePeer::TYPE_FIELDNAME);

                            $row['user'] = array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/'.MODULE.'/user/'.$user['iduser']),
                                ),
                                'iduser' => $user['iduser'],
                                'user_nickname' => $user['user_nickname'],
                            );
                            //Eliminamos los campos que hacen referencia a otras tablas
                            unset($row['iduser']);
                            array_push($resourceAlternativeArray, $row);
                        }

                        // Start ACL //
                        // Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
                        $acl = array();
                        foreach ($FormAlternativeFormGET->getElements() as $element){
                            if($element->getOption('value_options')!=null){
                                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                            }else{
                                $acl[$element->getAttribute('name')] = $element->getOption('label');
                            }
                        }

                        //Instanciamos nuestro formulario userGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $userFormGET = UserFormGET::init($userLevel);
                        //Eliminamos el id company Si es visible y lo agregamos como embbeded toda la informacion de company a la que tiene visible el usuario
                        if(key_exists('iduser',$acl)){
                            unset($acl['iduser']);
                            $userColumns = array();
                            foreach ($userFormGET->getElements() as $element){
                                $userColumns[$element->getAttribute('name')] =  $element->getOption('label');
                            }
                            // Mostramos las columnas que son relevantes a la respuesta:
                            $userColumns = array(
                                'iduser' => $userColumns['iduser'],
                                'user_nickname' => $userColumns['user_nickname'],
                            );
                            $acl['user'] = $userColumns;
                        }
                        // End ACL //

                        //// Start Branch ////

                        $branchQuery = BranchQuery::create()->filterByIdbranch(ID_RESOURCE)->findOne();
                        $branchArray = $branchQuery->toArray(BasePeer::TYPE_FIELDNAME);

                        //Los datos de la entidad
                        $responseBranch = array(
                            "_links" => array(
                                "self" => array(
                                    "href" =>  URL_API."/v".API_VERSION."/branch/".$branchArray['idbranch'],
                                ),
                            ),
                            "idbranch" => $branchArray['idbranch'],
                            "branch_name" => $branchArray['branch_name']
                        );
                        //// End Branch ////

                        /**
                        //// Start Department ////
                        // Start Departmentmember //

                        // instanciamos el objeto DepartmentmemberQuery
                        $deparmentmemberQuery = DepartmentmemberQuery::create()->filterByIduser($idUser)->findOne();

                        // Si el usuario pertenece a departmentmember
                        if($deparmentmemberQuery){
                            // Instanciamos el objeto de CompanyQuery
                            $departmentQuery = $deparmentmemberQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

                            //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                            $departmentFormGET = DepartmentFormGET::init($userLevel);

                            $departmentArray = array();
                            foreach ($departmentFormGET->getElements() as $key=>$value){
                                $departmentArray[$key] = $departmentQuery[$key];
                            }

                            //Agregamos los datos de department a nuestro arreglo $row['departmentmember']
                            foreach ($departmentArray as $key=>$value){
                                $row[$key] = $value;
                            }
                            $departmentResponse = array(
                                'department' => array(
                                    '_links' => array(
                                        'self' => array('href' => URL_API.'/company/department/'.$deparmentmemberQuery->getIddepartment()),
                                    ),
                                    'iddepartment' => $row['iddepartment'],
                                    'department_name' => $row['department_name'],
                                ),
                            );
                            // Agregamos a nuestra respuesta los datos de departmentmember del idUser
                            foreach($resourceAlternativeArray as $key => $value){
                                $resourceAlternativeArray[$key]['departmentmember'] = $departmentResponse;
                            }
                        }
                        // End Departmentmember //

                        // Start Departmentleader //

                        // instanciamos el objeto DepartmentleaderQuery
                        $departmentleaderQuery = DepartmentleaderQuery::create()->filterByIduser($idUser)->find();

                        if(count($departmentleaderQuery->getArrayCopy()) == 1){
                            $departmentLeaderArray = $departmentleaderQuery->getArrayCopy();
                            $departmentLeaderArrays = array();
                            foreach($departmentLeaderArray as $key => $value){
                                // Guardamos en un array el objeto del departmentleader al que pertenece el idUser
                                $departmentLeaderArrays[$key] = $value->toArray(BasePeer::TYPE_FIELDNAME);
                            }
                            $departmentleaderQuery = DepartmentleaderQuery::create()->filterByIduser($idUser)->findOne();
                        }elseif(count($departmentleaderQuery->getArrayCopy()) >= 2){
                            $departmentLeaderArray = $departmentleaderQuery->getArrayCopy();
                            $departmentLeaderArrays = array();
                            foreach($departmentLeaderArray as $key => $value){
                                // Guardamos en un array los objetos de cada departmentleader al que pertenece el idUser
                                $departmentLeaderArrays[$key] = $value->toArray(BasePeer::TYPE_FIELDNAME);
                            }
                            // Instanciamos el objeto de DepartmentleaderQuery con un findOne()
                            // para poder instanciar mas abajo al objeto Department y traer sus datos para mostrarlos en la vista
                            $departmentleaderQuery = DepartmentleaderQuery::create()->filterByIduser($idUser)->findOne();
                        }

                        //Instanciamos nuestro formulario departmentleaderGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $departmentleaderFormGET = DepartmentleaderFormGET::init($userLevel);

                        // Almacenamos en un array los departmentleader a los que pertenece el idUser
                        $departmentleaderArray = array();
                        foreach ($departmentleaderFormGET->getElements() as $key=>$value){
                            for($i=0;$i>=count($departmentLeaderArrays);$i++){
                                $departmentleaderArray[$i][$key] = $departmentLeaderArrays[$i][$key];
                            }
                        }

                        // Instanciamos el objeto de Department y traemos los datos en un array
                        // dependiendo del departamento al que pertenece el idUser.
                        $departmentQuery = $departmentleaderQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

                        //Instanciamos nuestro formulario departmentGET para obtener los datos que el usuario de acuerdo a su nivel va tener accesso
                        $departmentFormGET = DepartmentFormGET::init($userLevel);

                        $departmentArray = array();
                        foreach ($departmentFormGET->getElements() as $key=>$value){
                            $departmentArray[$key] = $departmentQuery[$key];
                        }

                        //Agregamos los datos de department a nuestro arreglo $row['department']
                        foreach ($departmentArray as $key=>$value){
                            $row[$key] = $value;
                        }

                        // Agregamos en un array los departmentleader_title a los que pertenece el idUser
                        $departmentleadertitleArray = array();
                        foreach($departmentLeaderArrays as $key => $value){
                            $departmentleadertitleArray[$key] = $departmentLeaderArrays[$key]['departmentleader_title'];
                        }
                        $departmentResponse = array(
                            'departmentleader_title' => array(
                                $departmentleadertitleArray
                            ),
                            'department' => array(
                                '_links' => array(
                                    'self' => array('href' => URL_API.'/company/department/'.$departmentleaderQuery->getIddepartment()),
                                ),
                                'iddepartment' => $row['iddepartment'],
                                'department_name' => $row['department_name'],
                            ),
                        );
                        // Agregamos a nuestra respuesta los datos de departmentleader del idUser
                        foreach($resourceAlternativeArray as $key => $value){
                            $resourceAlternativeArray[$key]['departmentleader'] = $departmentResponse;
                        }

                        // End Departmentleader //
                        //// End Department ////

                         **/
                        $response = array(
                            '_links' => $getCollectionAlternative['links'],
                            'ACL'    => $acl,
                            'resume' => $getCollectionAlternative['resume'],
                            'branch' => $responseBranch,
                            'staffs' => $resourceAlternativeArray,
                        );
                        switch(TYPE_RESPONSE){
                            case "xml" :{
                                $response['staffs'] = array(
                                    'staff' => $resourceAlternativeArray,
                                );
                                break;
                            }
                        }
                        break;
                    }// End resourceChild: staff //
                }
                break;
            }// End resource: branch //
        }
        return $response;
    }
    /////////// End getList ///////////

} 