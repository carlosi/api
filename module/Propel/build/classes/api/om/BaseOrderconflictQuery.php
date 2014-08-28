<?php


/**
 * Base class that represents a query for the 'orderconflict' table.
 *
 *
 *
 * @method OrderconflictQuery orderByIdorderconflict($order = Criteria::ASC) Order by the idorderconflict column
 * @method OrderconflictQuery orderByIdorderitem($order = Criteria::ASC) Order by the idorderitem column
 * @method OrderconflictQuery orderByOrderconflictDate($order = Criteria::ASC) Order by the orderconflict_date column
 *
 * @method OrderconflictQuery groupByIdorderconflict() Group by the idorderconflict column
 * @method OrderconflictQuery groupByIdorderitem() Group by the idorderitem column
 * @method OrderconflictQuery groupByOrderconflictDate() Group by the orderconflict_date column
 *
 * @method OrderconflictQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderconflictQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderconflictQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderconflictQuery leftJoinOrderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderitem relation
 * @method OrderconflictQuery rightJoinOrderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderitem relation
 * @method OrderconflictQuery innerJoinOrderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderitem relation
 *
 * @method OrderconflictQuery leftJoinOrderconflictComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderconflictComment relation
 * @method OrderconflictQuery rightJoinOrderconflictComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderconflictComment relation
 * @method OrderconflictQuery innerJoinOrderconflictComment($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderconflictComment relation
 *
 * @method Orderconflict findOne(PropelPDO $con = null) Return the first Orderconflict matching the query
 * @method Orderconflict findOneOrCreate(PropelPDO $con = null) Return the first Orderconflict matching the query, or a new Orderconflict object populated from the query conditions when no match is found
 *
 * @method Orderconflict findOneByIdorderitem(int $idorderitem) Return the first Orderconflict filtered by the idorderitem column
 * @method Orderconflict findOneByOrderconflictDate(string $orderconflict_date) Return the first Orderconflict filtered by the orderconflict_date column
 *
 * @method array findByIdorderconflict(int $idorderconflict) Return Orderconflict objects filtered by the idorderconflict column
 * @method array findByIdorderitem(int $idorderitem) Return Orderconflict objects filtered by the idorderitem column
 * @method array findByOrderconflictDate(string $orderconflict_date) Return Orderconflict objects filtered by the orderconflict_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderconflictQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderconflictQuery object.
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
            $modelName = 'Orderconflict';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderconflictQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderconflictQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderconflictQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderconflictQuery) {
            return $criteria;
        }
        $query = new OrderconflictQuery(null, null, $modelAlias);

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
     * @return   Orderconflict|Orderconflict[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderconflictPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderconflictPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orderconflict A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorderconflict($key, $con = null)
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
     * @return                 Orderconflict A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorderconflict`, `idorderitem`, `orderconflict_date` FROM `orderconflict` WHERE `idorderconflict` = :p0';
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
            $obj = new Orderconflict();
            $obj->hydrate($row);
            OrderconflictPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Orderconflict|Orderconflict[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Orderconflict[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idorderconflict column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderconflict(1234); // WHERE idorderconflict = 1234
     * $query->filterByIdorderconflict(array(12, 34)); // WHERE idorderconflict IN (12, 34)
     * $query->filterByIdorderconflict(array('min' => 12)); // WHERE idorderconflict >= 12
     * $query->filterByIdorderconflict(array('max' => 12)); // WHERE idorderconflict <= 12
     * </code>
     *
     * @param     mixed $idorderconflict The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function filterByIdorderconflict($idorderconflict = null, $comparison = null)
    {
        if (is_array($idorderconflict)) {
            $useMinMax = false;
            if (isset($idorderconflict['min'])) {
                $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $idorderconflict['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderconflict['max'])) {
                $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $idorderconflict['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $idorderconflict, $comparison);
    }

    /**
     * Filter the query on the idorderitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderitem(1234); // WHERE idorderitem = 1234
     * $query->filterByIdorderitem(array(12, 34)); // WHERE idorderitem IN (12, 34)
     * $query->filterByIdorderitem(array('min' => 12)); // WHERE idorderitem >= 12
     * $query->filterByIdorderitem(array('max' => 12)); // WHERE idorderitem <= 12
     * </code>
     *
     * @see       filterByOrderitem()
     *
     * @param     mixed $idorderitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function filterByIdorderitem($idorderitem = null, $comparison = null)
    {
        if (is_array($idorderitem)) {
            $useMinMax = false;
            if (isset($idorderitem['min'])) {
                $this->addUsingAlias(OrderconflictPeer::IDORDERITEM, $idorderitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderitem['max'])) {
                $this->addUsingAlias(OrderconflictPeer::IDORDERITEM, $idorderitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictPeer::IDORDERITEM, $idorderitem, $comparison);
    }

    /**
     * Filter the query on the orderconflict_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderconflictDate('2011-03-14'); // WHERE orderconflict_date = '2011-03-14'
     * $query->filterByOrderconflictDate('now'); // WHERE orderconflict_date = '2011-03-14'
     * $query->filterByOrderconflictDate(array('max' => 'yesterday')); // WHERE orderconflict_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $orderconflictDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function filterByOrderconflictDate($orderconflictDate = null, $comparison = null)
    {
        if (is_array($orderconflictDate)) {
            $useMinMax = false;
            if (isset($orderconflictDate['min'])) {
                $this->addUsingAlias(OrderconflictPeer::ORDERCONFLICT_DATE, $orderconflictDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderconflictDate['max'])) {
                $this->addUsingAlias(OrderconflictPeer::ORDERCONFLICT_DATE, $orderconflictDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictPeer::ORDERCONFLICT_DATE, $orderconflictDate, $comparison);
    }

    /**
     * Filter the query by a related Orderitem object
     *
     * @param   Orderitem|PropelObjectCollection $orderitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderconflictQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderitem($orderitem, $comparison = null)
    {
        if ($orderitem instanceof Orderitem) {
            return $this
                ->addUsingAlias(OrderconflictPeer::IDORDERITEM, $orderitem->getIdorderitem(), $comparison);
        } elseif ($orderitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderconflictPeer::IDORDERITEM, $orderitem->toKeyValue('PrimaryKey', 'Idorderitem'), $comparison);
        } else {
            throw new PropelException('filterByOrderitem() only accepts arguments of type Orderitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function joinOrderitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderitem');

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
            $this->addJoinObject($join, 'Orderitem');
        }

        return $this;
    }

    /**
     * Use the Orderitem relation Orderitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderitemQuery A secondary query class using the current class as primary query
     */
    public function useOrderitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderitem', 'OrderitemQuery');
    }

    /**
     * Filter the query by a related OrderconflictComment object
     *
     * @param   OrderconflictComment|PropelObjectCollection $orderconflictComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderconflictQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderconflictComment($orderconflictComment, $comparison = null)
    {
        if ($orderconflictComment instanceof OrderconflictComment) {
            return $this
                ->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $orderconflictComment->getIdorderconflict(), $comparison);
        } elseif ($orderconflictComment instanceof PropelObjectCollection) {
            return $this
                ->useOrderconflictCommentQuery()
                ->filterByPrimaryKeys($orderconflictComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderconflictComment() only accepts arguments of type OrderconflictComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderconflictComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function joinOrderconflictComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderconflictComment');

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
            $this->addJoinObject($join, 'OrderconflictComment');
        }

        return $this;
    }

    /**
     * Use the OrderconflictComment relation OrderconflictComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderconflictCommentQuery A secondary query class using the current class as primary query
     */
    public function useOrderconflictCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderconflictComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderconflictComment', 'OrderconflictCommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Orderconflict $orderconflict Object to remove from the list of results
     *
     * @return OrderconflictQuery The current query, for fluid interface
     */
    public function prune($orderconflict = null)
    {
        if ($orderconflict) {
            $this->addUsingAlias(OrderconflictPeer::IDORDERCONFLICT, $orderconflict->getIdorderconflict(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
