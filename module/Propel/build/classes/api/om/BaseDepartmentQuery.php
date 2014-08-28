<?php


/**
 * Base class that represents a query for the 'department' table.
 *
 *
 *
 * @method DepartmentQuery orderByIddepartment($order = Criteria::ASC) Order by the iddepartment column
 * @method DepartmentQuery orderByDepartmentName($order = Criteria::ASC) Order by the department_name column
 * @method DepartmentQuery orderByDepartmentType($order = Criteria::ASC) Order by the department_type column
 *
 * @method DepartmentQuery groupByIddepartment() Group by the iddepartment column
 * @method DepartmentQuery groupByDepartmentName() Group by the department_name column
 * @method DepartmentQuery groupByDepartmentType() Group by the department_type column
 *
 * @method DepartmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepartmentQuery leftJoinBranchdepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branchdepartment relation
 * @method DepartmentQuery rightJoinBranchdepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branchdepartment relation
 * @method DepartmentQuery innerJoinBranchdepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Branchdepartment relation
 *
 * @method DepartmentQuery leftJoinDepartmentleader($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departmentleader relation
 * @method DepartmentQuery rightJoinDepartmentleader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departmentleader relation
 * @method DepartmentQuery innerJoinDepartmentleader($relationAlias = null) Adds a INNER JOIN clause to the query using the Departmentleader relation
 *
 * @method DepartmentQuery leftJoinDepartmentmember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departmentmember relation
 * @method DepartmentQuery rightJoinDepartmentmember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departmentmember relation
 * @method DepartmentQuery innerJoinDepartmentmember($relationAlias = null) Adds a INNER JOIN clause to the query using the Departmentmember relation
 *
 * @method DepartmentQuery leftJoinProject($relationAlias = null) Adds a LEFT JOIN clause to the query using the Project relation
 * @method DepartmentQuery rightJoinProject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Project relation
 * @method DepartmentQuery innerJoinProject($relationAlias = null) Adds a INNER JOIN clause to the query using the Project relation
 *
 * @method Department findOne(PropelPDO $con = null) Return the first Department matching the query
 * @method Department findOneOrCreate(PropelPDO $con = null) Return the first Department matching the query, or a new Department object populated from the query conditions when no match is found
 *
 * @method Department findOneByDepartmentName(string $department_name) Return the first Department filtered by the department_name column
 * @method Department findOneByDepartmentType(string $department_type) Return the first Department filtered by the department_type column
 *
 * @method array findByIddepartment(int $iddepartment) Return Department objects filtered by the iddepartment column
 * @method array findByDepartmentName(string $department_name) Return Department objects filtered by the department_name column
 * @method array findByDepartmentType(string $department_type) Return Department objects filtered by the department_type column
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
        $sql = 'SELECT `iddepartment`, `department_name`, `department_type` FROM `department` WHERE `iddepartment` = :p0';
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
     * Filter the query on the department_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentName('fooValue');   // WHERE department_name = 'fooValue'
     * $query->filterByDepartmentName('%fooValue%'); // WHERE department_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departmentName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByDepartmentName($departmentName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departmentName)) {
                $departmentName = str_replace('*', '%', $departmentName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DepartmentPeer::DEPARTMENT_NAME, $departmentName, $comparison);
    }

    /**
     * Filter the query on the department_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentType('fooValue');   // WHERE department_type = 'fooValue'
     * $query->filterByDepartmentType('%fooValue%'); // WHERE department_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departmentType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function filterByDepartmentType($departmentType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departmentType)) {
                $departmentType = str_replace('*', '%', $departmentType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DepartmentPeer::DEPARTMENT_TYPE, $departmentType, $comparison);
    }

    /**
     * Filter the query by a related Branchdepartment object
     *
     * @param   Branchdepartment|PropelObjectCollection $branchdepartment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranchdepartment($branchdepartment, $comparison = null)
    {
        if ($branchdepartment instanceof Branchdepartment) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $branchdepartment->getIddepartament(), $comparison);
        } elseif ($branchdepartment instanceof PropelObjectCollection) {
            return $this
                ->useBranchdepartmentQuery()
                ->filterByPrimaryKeys($branchdepartment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBranchdepartment() only accepts arguments of type Branchdepartment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Branchdepartment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinBranchdepartment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Branchdepartment');

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
            $this->addJoinObject($join, 'Branchdepartment');
        }

        return $this;
    }

    /**
     * Use the Branchdepartment relation Branchdepartment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchdepartmentQuery A secondary query class using the current class as primary query
     */
    public function useBranchdepartmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranchdepartment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Branchdepartment', 'BranchdepartmentQuery');
    }

    /**
     * Filter the query by a related Departmentleader object
     *
     * @param   Departmentleader|PropelObjectCollection $departmentleader  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartmentleader($departmentleader, $comparison = null)
    {
        if ($departmentleader instanceof Departmentleader) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $departmentleader->getIddepartment(), $comparison);
        } elseif ($departmentleader instanceof PropelObjectCollection) {
            return $this
                ->useDepartmentleaderQuery()
                ->filterByPrimaryKeys($departmentleader->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDepartmentleader() only accepts arguments of type Departmentleader or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departmentleader relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinDepartmentleader($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departmentleader');

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
            $this->addJoinObject($join, 'Departmentleader');
        }

        return $this;
    }

    /**
     * Use the Departmentleader relation Departmentleader object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentleaderQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentleaderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartmentleader($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departmentleader', 'DepartmentleaderQuery');
    }

    /**
     * Filter the query by a related Departmentmember object
     *
     * @param   Departmentmember|PropelObjectCollection $departmentmember  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartmentmember($departmentmember, $comparison = null)
    {
        if ($departmentmember instanceof Departmentmember) {
            return $this
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $departmentmember->getIddepartment(), $comparison);
        } elseif ($departmentmember instanceof PropelObjectCollection) {
            return $this
                ->useDepartmentmemberQuery()
                ->filterByPrimaryKeys($departmentmember->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDepartmentmember() only accepts arguments of type Departmentmember or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departmentmember relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentQuery The current query, for fluid interface
     */
    public function joinDepartmentmember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departmentmember');

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
            $this->addJoinObject($join, 'Departmentmember');
        }

        return $this;
    }

    /**
     * Use the Departmentmember relation Departmentmember object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentmemberQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentmemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartmentmember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departmentmember', 'DepartmentmemberQuery');
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
                ->addUsingAlias(DepartmentPeer::IDDEPARTMENT, $project->getIddepartment(), $comparison);
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
