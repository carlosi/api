<?php


/**
 * Base class that represents a query for the 'branchdepartment' table.
 *
 *
 *
 * @method BranchdepartmentQuery orderByIdbranchdepartment($order = Criteria::ASC) Order by the idbranchdepartment column
 * @method BranchdepartmentQuery orderByIdbranch($order = Criteria::ASC) Order by the idbranch column
 * @method BranchdepartmentQuery orderByIddepartment($order = Criteria::ASC) Order by the iddepartment column
 *
 * @method BranchdepartmentQuery groupByIdbranchdepartment() Group by the idbranchdepartment column
 * @method BranchdepartmentQuery groupByIdbranch() Group by the idbranch column
 * @method BranchdepartmentQuery groupByIddepartment() Group by the iddepartment column
 *
 * @method BranchdepartmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BranchdepartmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BranchdepartmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BranchdepartmentQuery leftJoinDepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Department relation
 * @method BranchdepartmentQuery rightJoinDepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Department relation
 * @method BranchdepartmentQuery innerJoinDepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Department relation
 *
 * @method BranchdepartmentQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method BranchdepartmentQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method BranchdepartmentQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method Branchdepartment findOne(PropelPDO $con = null) Return the first Branchdepartment matching the query
 * @method Branchdepartment findOneOrCreate(PropelPDO $con = null) Return the first Branchdepartment matching the query, or a new Branchdepartment object populated from the query conditions when no match is found
 *
 * @method Branchdepartment findOneByIdbranch(int $idbranch) Return the first Branchdepartment filtered by the idbranch column
 * @method Branchdepartment findOneByIddepartment(int $iddepartment) Return the first Branchdepartment filtered by the iddepartment column
 *
 * @method array findByIdbranchdepartment(int $idbranchdepartment) Return Branchdepartment objects filtered by the idbranchdepartment column
 * @method array findByIdbranch(int $idbranch) Return Branchdepartment objects filtered by the idbranch column
 * @method array findByIddepartment(int $iddepartment) Return Branchdepartment objects filtered by the iddepartment column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranchdepartmentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBranchdepartmentQuery object.
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
            $modelName = 'Branchdepartment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BranchdepartmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BranchdepartmentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BranchdepartmentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BranchdepartmentQuery) {
            return $criteria;
        }
        $query = new BranchdepartmentQuery(null, null, $modelAlias);

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
     * @return   Branchdepartment|Branchdepartment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BranchdepartmentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BranchdepartmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Branchdepartment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbranchdepartment($key, $con = null)
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
     * @return                 Branchdepartment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbranchdepartment`, `idbranch`, `iddepartment` FROM `branchdepartment` WHERE `idbranchdepartment` = :p0';
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
            $obj = new Branchdepartment();
            $obj->hydrate($row);
            BranchdepartmentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Branchdepartment|Branchdepartment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Branchdepartment[]|mixed the list of results, formatted by the current formatter
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
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbranchdepartment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranchdepartment(1234); // WHERE idbranchdepartment = 1234
     * $query->filterByIdbranchdepartment(array(12, 34)); // WHERE idbranchdepartment IN (12, 34)
     * $query->filterByIdbranchdepartment(array('min' => 12)); // WHERE idbranchdepartment >= 12
     * $query->filterByIdbranchdepartment(array('max' => 12)); // WHERE idbranchdepartment <= 12
     * </code>
     *
     * @param     mixed $idbranchdepartment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function filterByIdbranchdepartment($idbranchdepartment = null, $comparison = null)
    {
        if (is_array($idbranchdepartment)) {
            $useMinMax = false;
            if (isset($idbranchdepartment['min'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $idbranchdepartment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranchdepartment['max'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $idbranchdepartment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $idbranchdepartment, $comparison);
    }

    /**
     * Filter the query on the idbranch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranch(1234); // WHERE idbranch = 1234
     * $query->filterByIdbranch(array(12, 34)); // WHERE idbranch IN (12, 34)
     * $query->filterByIdbranch(array('min' => 12)); // WHERE idbranch >= 12
     * $query->filterByIdbranch(array('max' => 12)); // WHERE idbranch <= 12
     * </code>
     *
     * @see       filterByBranch()
     *
     * @param     mixed $idbranch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function filterByIdbranch($idbranch = null, $comparison = null)
    {
        if (is_array($idbranch)) {
            $useMinMax = false;
            if (isset($idbranch['min'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDBRANCH, $idbranch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranch['max'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDBRANCH, $idbranch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchdepartmentPeer::IDBRANCH, $idbranch, $comparison);
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
     * @see       filterByDepartment()
     *
     * @param     mixed $iddepartment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function filterByIddepartment($iddepartment = null, $comparison = null)
    {
        if (is_array($iddepartment)) {
            $useMinMax = false;
            if (isset($iddepartment['min'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDDEPARTAMENT, $iddepartment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartment['max'])) {
                $this->addUsingAlias(BranchdepartmentPeer::IDDEPARTAMENT, $iddepartment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchdepartmentPeer::IDDEPARTAMENT, $iddepartment, $comparison);
    }

    /**
     * Filter the query by a related Department object
     *
     * @param   Department|PropelObjectCollection $department The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchdepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartment($department, $comparison = null)
    {
        if ($department instanceof Department) {
            return $this
                ->addUsingAlias(BranchdepartmentPeer::IDDEPARTAMENT, $department->getIddepartment(), $comparison);
        } elseif ($department instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchdepartmentPeer::IDDEPARTAMENT, $department->toKeyValue('PrimaryKey', 'Iddepartment'), $comparison);
        } else {
            throw new PropelException('filterByDepartment() only accepts arguments of type Department or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Department relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function joinDepartment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Department');

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
            $this->addJoinObject($join, 'Department');
        }

        return $this;
    }

    /**
     * Use the Department relation Department object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Department', 'DepartmentQuery');
    }

    /**
     * Filter the query by a related Branch object
     *
     * @param   Branch|PropelObjectCollection $branch The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchdepartmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranch($branch, $comparison = null)
    {
        if ($branch instanceof Branch) {
            return $this
                ->addUsingAlias(BranchdepartmentPeer::IDBRANCH, $branch->getIdbranch(), $comparison);
        } elseif ($branch instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchdepartmentPeer::IDBRANCH, $branch->toKeyValue('PrimaryKey', 'Idbranch'), $comparison);
        } else {
            throw new PropelException('filterByBranch() only accepts arguments of type Branch or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Branch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function joinBranch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Branch');

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
            $this->addJoinObject($join, 'Branch');
        }

        return $this;
    }

    /**
     * Use the Branch relation Branch object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchQuery A secondary query class using the current class as primary query
     */
    public function useBranchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Branch', 'BranchQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Branchdepartment $branchdepartment Object to remove from the list of results
     *
     * @return BranchdepartmentQuery The current query, for fluid interface
     */
    public function prune($branchdepartment = null)
    {
        if ($branchdepartment) {
            $this->addUsingAlias(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $branchdepartment->getIdbranchdepartment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
