<?php

use API\REST\V1\ACL\Company\Department\Form\DepartmentFormGET;

class Branchdepartment extends BaseBranchdepartment
{
    public function isIdValid($idResource,$idCompany){
        return BranchQuery::create()->filterByIdbranch($idResource)->filterByIdcompany($idCompany)->exists();
    }
    public function isIdChildValid($idResource,$idResourceChild){
        return BranchdepartmentQuery::create()->filterByIdbranch($idResource)
            ->filterByIddepartment($idResourceChild)->exists();
    }

    public function getEntity($id){
        return DepartmentQuery::create()->findPk($id);
    }

    public function getEntityResponse($entity,$userLevel){
        //Obtenemos nuestra entidad branch en forma de arreglo
        $entityArray = $entity->toArray(BasePeer::TYPE_FIELDNAME);
        $branchArray = BranchQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        //Los Links
        $response = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/branch/".$branchArray['idbranch']."/department/".$entityArray['iddepartment'],
                ),
            ),
        );

        //El ACL

        //Instanciamos nuestros formularios para obtener las columnas que el usuario va poder tener acceso
        $departmentForm = DepartmentFormGET::init($userLevel);

        foreach ($departmentForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response["ACL"][$element->getAttribute('name')] = array('label' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
                //$response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response["ACL"][$element->getAttribute('name')] = $element->getOption('label');
                    //$response[$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }
        //Los datos de la entidad
        $response["branch"] = array(
            "_links" => array(
                "self" => array(
                    "href" =>  URL_API."/v".API_VERSION."/branch/".$branchArray['idbranch'],
                ),
            ),
            "idbranch" => $branchArray['idbranch'],
            "branch_name" => $branchArray['branch_name']
        );

        foreach ($departmentForm->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $response['department'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
            }else{
                if($element->getAttribute('name')!="idcompany"){
                    $response['department'][$element->getAttribute('name')] = $entityArray[$element->getAttribute('name')];
                }
            }
        }

        //var_dump($response);
        return $response;
    }

    public function getCollection($idResource,$idCompany, $page, $limit, $filters, $order, $dir){
        $branchdepartmentQuery = new BranchdepartmentQuery();

        //Los Filtros
        if($filters!=null){
            foreach ($filters as $filter){
                $params = $branchdepartmentQuery->getParams();
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
                            $branchdepartmentQuery->addOr('department'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }else{
                            $branchdepartmentQuery->addAnd('department.'.$filter['attribute'], $filter['in'], \Criteria::IN);
                        }
                    }else{
                        $branchdepartmentQuery ->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['in'], \Criteria::IN)->endUse();
                    }
                }
                if(isset($filter['neq'])){
                    if(!empty($params)){
                        foreach($params as $param){
                            if($filter['attribute'] = $param['column']){
                                $branchdepartmentQuery->addOr('department.'.$filter['attribute'], $filter['neq'], \Criteria::NOT_EQUAL);
                            }
                        }
                    }else{
                        $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['neq'], \Criteria::NOT_EQUAL)->endUse();
                    }
                }
                if(isset($filter['gt'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['gt'], \Criteria::GREATER_THAN)->endUse();
                }
                if(isset($filter['lt'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['lt'], \Criteria::LESS_THAN)->endUse();
                }
                if(isset($filter['from']) && isset($filter['to'])){
                    $branchdepartmentQuery->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['from'], \Criteria::GREATER_EQUAL)
                        ->add(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['to'], \Criteria::LESS_EQUAL);
                }
                if(isset($filter['like'])){
                    $branchdepartmentQuery->useDepartmentQuery()->filterBy(BasePeer::translateFieldname('department', $filter['attribute'], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME), $filter['like'], \Criteria::LIKE)->endUse();
                }
            }
        }
        //Order y Dir
        if($order !=null || $dir !=null){
            $branchdepartmentQuery->orderBy($order, $dir);
        }

        // Obtenemos el filtrado por medio del idcompany del recurso.
        $result =  $branchdepartmentQuery->useBranchQuery()->filterByIdcompany($idCompany)->filterByIdbranch($idResource)->endUse()->paginate($page,$limit);

        $links = array(
            'self' => array('href' => URL_API.'/branch/'.$idResource.'/department?page='.$result->getPage()),
            'prev' => array('href' => URL_API.'/branch/'.$idResource.'department?page='.$result->getPreviousPage()),
            'next' => array('href' => URL_API.'/branch/'.$idResource.'department?page='.$result->getNextPage()),
            'first' => array('href' => URL_API.'/branch/'.$idResource.'department'),
            'last' => array('href' => URL_API.'/branch/'.$idResource.'department?page='.$result->getLastPage()),
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

    public function getCollectionResponse($getCollection, $userLevel){
        // Instanciamos el Formulario GET de nuestro recurso department
        $departmentFormGET = DepartmentFormGET::init($userLevel);
        $departmentArray = array();
        $branchArray = BranchQuery::create()->findPk(ID_RESOURCE)->toArray(BasePeer::TYPE_FIELDNAME);

        foreach ($getCollection['data'] as $item){

            $branchDepartmentQuery = BranchdepartmentQuery::create()->filterByIdbranchdepartment($item['idbranchdepartment'])->findOne();
            $department = $branchDepartmentQuery->getDepartment()->toArray(BasePeer::TYPE_FIELDNAME);

            $row = array(
                "_links" => array(
                    'self' => array('href' => URL_API.'/department/'.$department['iddepartment']),
                ),
            );

            foreach ($departmentFormGET->getElements() as $key=>$value){
                $row[$key] = $department[$key];
            }

            array_push($departmentArray, $row);
        }

        // Start ACL //
        //Guardamos en un arreglo las columnas y los atributos a los que el usuario tiene permiso
        $acl = array();
        foreach ($departmentFormGET->getElements() as $element){
            if($element->getOption('value_options')!=null){
                $acl[$element->getAttribute('name')] = array('viewName' => $element->getOption('label') ,'value_options' => $element->getOption('value_options'));
            }else{
                $acl[$element->getAttribute('name')] = $element->getOption('label');
            }
        }
        // End ACL //

        $response = array(
            '_links' => $getCollection['links'],
            'ACL' => $acl,
            'resume' => $getCollection['resume'],
            'branch' => array(
                '_links' => array(
                    'self' => array('href' => URL_API.'/branch/'.$branchArray['idbranch']),
                ),
                'idbranch' => $branchArray['idbranch'],
                'branch_name' => $branchArray['branch_name'],
            ),
            'departments' => $departmentArray,
        );
        switch(TYPE_RESPONSE){
            case "xml" :{
                $response['departments'] = array(
                    'department' => $departmentArray
                );
                break;
            }
        }

        return $response;

    }
}