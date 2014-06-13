<?php


/**
 * Base class that represents a query for the 'department' table.
 *
 *
 *
 * @method DepartmentQuery orderByIddepartment($order = Criteria::ASC) Order by the iddepartment column
 * @method DepartmentQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method DepartmentQuery orderByDepartamentName($order = Criteria::ASC) Order by the departament_name column
 *
 * @method DepartmentQuery groupByIddepartment() Group by the iddepartment column
 * @method DepartmentQuery groupByIdcompany() Group by the idcompany column
 * @method DepartmentQuery groupByDepartamentName() Group by the departament_name column
 *
 * @method DepartmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepartmentQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method DepartmentQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method DepartmentQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method DepartmentQuery leftJoinDepartamentmember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departamentmember relation
 * @method DepartmentQuery rightJoinDepartamentmember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departamentmember relation
 * @method DepartmentQuery innerJoinDepartamentmember($relationAlias = null) Adds a INNER JOIN clause to the query using the Departamentmember relation
 *
 * @method DepartmentQuery leftJoinProject($relationAlias = null) Adds a LEFT JOIN clause to the query using the Project relation
 * @method DepartmentQuery rightJoinProject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Project relation
 * @method DepartmentQuery innerJoinProject($relationAlias = null) Adds a INNER JOIN clause to the query using the Project relation
 *
 * @method Department findOne(PropelPDO $con = null) Return the first Department matching the query
 * @method Department findOneOrCreate(PropelPDO $con = null) Return the first Department matching the query, or a new Department object populated from the query conditions when no match is found
 *
 * @method Department findOneByIdcompany(int $idcompany) Return the first Department filtered by the idcompany column
 * @method Department findOneByDepartamentName(string $departament_name) Return the first Department filtered by the departament_name column
 *
 * @method array findByIddepartment(int $iddepartment) Return Department objects filtered by the iddepartment column
 * @method array findByIdcompany(int $idcompany) Return Department objects filtered by the idcompany column
 * @method array findByDepartamentName(string $departament_name) Return Department objects filtered by the departament_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepartmentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepartmentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'api';
        }
        if (null === $modelName) {
            $modelName = 'Department';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepartmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DepartmentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepartmentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepartmentQuery) {
            return $criteria;
        }
        $query = new DepartmentQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Department|Department[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepartmentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepartmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Department A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIddepartment($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Department A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iddepartment`, `idcompany`, `departament_name` FROM `department` WHERE `iddepartment` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Department();
            $obj->hydrate($row);
            DepartmentPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Department|Department[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Department[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddepartment column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartment(1234); // WHERE iddepartment = 1234
     * $query->filterByIddepartment(array(12, 34)); // WHERE iddepartment IN (12, 34)
     * $query->filterByIddepartment(array('min' => 12)); // WHERE iddepartment >= 12
     * $query->filterByIddepartment(array('max' => 12)); // WHERE iddepartment <= 12
     * </code>
     *
     * @param     mixed $iddepartment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByIddepartment($iddepartment = null, $comparison = null)
    {
        if (is_array($iddepartment)) {
            $useMinMax = false;
            if (isset($iddepartment['min'])) {
                $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $iddepartment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartment['max'])) {
                $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $iddepartment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $iddepartment, $comparison);
    }

    /**
     * Filter the query on the idcompany column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompany(1234); // WHERE idcompany = 1234
     * $query->filterByIdcompany(array(12, 34)); // WHERE idcompany IN (12, 34)
     * $query->filterByIdcompany(array('min' => 12)); // WHERE idcompany >= 12
     * $query->filterByIdcompany(array('max' => 12)); // WHERE idcompany <= 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(DepartmentPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(DepartmentPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the departament_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartamentName('fooValue');   // WHERE departament_name = 'fooValue'
     * $query->filterByDepartamentName('%fooValue%'); // WHERE departament_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departamentName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByDepartamentName($departamentName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departamentName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departamentName)) {
                $departamentName = str_replace('*', '%', $departamentName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DepartmentPeer::DEPARTAMENT_NAME, $departamentName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartmentPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type Company or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
    }

    /**
     * Filter the query by a related Departamentmember object
     *
     * @param   Departamentmember|PropelObjectCollection $departamentmember  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartamentmember($departamentmember, $comparison = null)
    {
        if ($departamentmember instanceof Departamentmember) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $departamentmember->getIddepartament(), $comparison);
        } elseif ($departamentmember instanceof PropelObjectCollection) {
            return $this
                ->useDepartamentmemberQuery()
                ->filterByPrimaryKeys($departamentmember->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDepartamentmember() only accepts arguments of type Departamentmember or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departamentmember relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinDepartamentmember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departamentmember');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Departamentmember');
        }

        return $this;
    }

    /**
     * Use the Departamentmember relation Departamentmember object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartamentmemberQuery A secondary query class using the current class as primary query
     */
    public function useDepartamentmemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartamentmember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departamentmember', 'DepartamentmemberQuery');
    }

    /**
     * Filter the query by a related Project object
     *
     * @param   Project|PropelObjectCollection $project  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProject($project, $comparison = null)
    {
        if ($project instanceof Project) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $project->getIddepartament(), $comparison);
        } elseif ($project instanceof PropelObjectCollection) {
            return $this
                ->useProjectQuery()
                ->filterByPrimaryKeys($project->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProject() only accepts arguments of type Project or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Project relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinProject($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Project');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Project');
        }

        return $this;
    }

    /**
     * Use the Project relation Project object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectQuery A secondary query class using the current class as primary query
     */
    public function useProjectQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Project', 'ProjectQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Department $department Object to remove from the list of results
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function prune($department = null)
    {
        if ($department) {
            $this->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $department->getIddepartment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
