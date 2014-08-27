<?php


/**
 * Base class that represents a query for the 'shipping_history' table.
 *
 *
 *
 * @method ShippingHistoryQuery orderByIdshippingHistory($order = Criteria::ASC) Order by the idshipping_history column
 * @method ShippingHistoryQuery orderByIdshipping($order = Criteria::ASC) Order by the idshipping column
 * @method ShippingHistoryQuery orderByIdemployee($order = Criteria::ASC) Order by the idemployee column
 * @method ShippingHistoryQuery orderByShippingHistoryMsg($order = Criteria::ASC) Order by the shipping_history_msg column
 * @method ShippingHistoryQuery orderByShippingHistoryDate($order = Criteria::ASC) Order by the shipping_history_date column
 *
 * @method ShippingHistoryQuery groupByIdshippingHistory() Group by the idshipping_history column
 * @method ShippingHistoryQuery groupByIdshipping() Group by the idshipping column
 * @method ShippingHistoryQuery groupByIdemployee() Group by the idemployee column
 * @method ShippingHistoryQuery groupByShippingHistoryMsg() Group by the shipping_history_msg column
 * @method ShippingHistoryQuery groupByShippingHistoryDate() Group by the shipping_history_date column
 *
 * @method ShippingHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ShippingHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ShippingHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ShippingHistoryQuery leftJoinShipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipping relation
 * @method ShippingHistoryQuery rightJoinShipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipping relation
 * @method ShippingHistoryQuery innerJoinShipping($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipping relation
 *
 * @method ShippingHistory findOne(PropelPDO $con = null) Return the first ShippingHistory matching the query
 * @method ShippingHistory findOneOrCreate(PropelPDO $con = null) Return the first ShippingHistory matching the query, or a new ShippingHistory object populated from the query conditions when no match is found
 *
 * @method ShippingHistory findOneByIdshipping(int $idshipping) Return the first ShippingHistory filtered by the idshipping column
 * @method ShippingHistory findOneByIdemployee(int $idemployee) Return the first ShippingHistory filtered by the idemployee column
 * @method ShippingHistory findOneByShippingHistoryMsg(string $shipping_history_msg) Return the first ShippingHistory filtered by the shipping_history_msg column
 * @method ShippingHistory findOneByShippingHistoryDate(string $shipping_history_date) Return the first ShippingHistory filtered by the shipping_history_date column
 *
 * @method array findByIdshippingHistory(int $idshipping_history) Return ShippingHistory objects filtered by the idshipping_history column
 * @method array findByIdshipping(int $idshipping) Return ShippingHistory objects filtered by the idshipping column
 * @method array findByIdemployee(int $idemployee) Return ShippingHistory objects filtered by the idemployee column
 * @method array findByShippingHistoryMsg(string $shipping_history_msg) Return ShippingHistory objects filtered by the shipping_history_msg column
 * @method array findByShippingHistoryDate(string $shipping_history_date) Return ShippingHistory objects filtered by the shipping_history_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseShippingHistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseShippingHistoryQuery object.
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
            $modelName = 'ShippingHistory';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ShippingHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ShippingHistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ShippingHistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ShippingHistoryQuery) {
            return $criteria;
        }
        $query = new ShippingHistoryQuery(null, null, $modelAlias);

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
     * @return   ShippingHistory|ShippingHistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ShippingHistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ShippingHistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ShippingHistory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdshippingHistory($key, $con = null)
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
     * @return                 ShippingHistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idshipping_history`, `idshipping`, `idemployee`, `shipping_history_msg`, `shipping_history_date` FROM `shipping_history` WHERE `idshipping_history` = :p0';
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
            $obj = new ShippingHistory();
            $obj->hydrate($row);
            ShippingHistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ShippingHistory|ShippingHistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ShippingHistory[]|mixed the list of results, formatted by the current formatter
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
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idshipping_history column
     *
     * Example usage:
     * <code>
     * $query->filterByIdshippingHistory(1234); // WHERE idshipping_history = 1234
     * $query->filterByIdshippingHistory(array(12, 34)); // WHERE idshipping_history IN (12, 34)
     * $query->filterByIdshippingHistory(array('min' => 12)); // WHERE idshipping_history >= 12
     * $query->filterByIdshippingHistory(array('max' => 12)); // WHERE idshipping_history <= 12
     * </code>
     *
     * @param     mixed $idshippingHistory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByIdshippingHistory($idshippingHistory = null, $comparison = null)
    {
        if (is_array($idshippingHistory)) {
            $useMinMax = false;
            if (isset($idshippingHistory['min'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $idshippingHistory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idshippingHistory['max'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $idshippingHistory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $idshippingHistory, $comparison);
    }

    /**
     * Filter the query on the idshipping column
     *
     * Example usage:
     * <code>
     * $query->filterByIdshipping(1234); // WHERE idshipping = 1234
     * $query->filterByIdshipping(array(12, 34)); // WHERE idshipping IN (12, 34)
     * $query->filterByIdshipping(array('min' => 12)); // WHERE idshipping >= 12
     * $query->filterByIdshipping(array('max' => 12)); // WHERE idshipping <= 12
     * </code>
     *
     * @see       filterByShipping()
     *
     * @param     mixed $idshipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByIdshipping($idshipping = null, $comparison = null)
    {
        if (is_array($idshipping)) {
            $useMinMax = false;
            if (isset($idshipping['min'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING, $idshipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idshipping['max'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING, $idshipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING, $idshipping, $comparison);
    }

    /**
     * Filter the query on the idemployee column
     *
     * Example usage:
     * <code>
     * $query->filterByIdemployee(1234); // WHERE idemployee = 1234
     * $query->filterByIdemployee(array(12, 34)); // WHERE idemployee IN (12, 34)
     * $query->filterByIdemployee(array('min' => 12)); // WHERE idemployee >= 12
     * $query->filterByIdemployee(array('max' => 12)); // WHERE idemployee <= 12
     * </code>
     *
     * @param     mixed $idemployee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByIdemployee($idemployee = null, $comparison = null)
    {
        if (is_array($idemployee)) {
            $useMinMax = false;
            if (isset($idemployee['min'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDEMPLOYEE, $idemployee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idemployee['max'])) {
                $this->addUsingAlias(ShippingHistoryPeer::IDEMPLOYEE, $idemployee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingHistoryPeer::IDEMPLOYEE, $idemployee, $comparison);
    }

    /**
     * Filter the query on the shipping_history_msg column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingHistoryMsg('fooValue');   // WHERE shipping_history_msg = 'fooValue'
     * $query->filterByShippingHistoryMsg('%fooValue%'); // WHERE shipping_history_msg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingHistoryMsg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByShippingHistoryMsg($shippingHistoryMsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingHistoryMsg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingHistoryMsg)) {
                $shippingHistoryMsg = str_replace('*', '%', $shippingHistoryMsg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingHistoryPeer::SHIPPING_HISTORY_MSG, $shippingHistoryMsg, $comparison);
    }

    /**
     * Filter the query on the shipping_history_date column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingHistoryDate('2011-03-14'); // WHERE shipping_history_date = '2011-03-14'
     * $query->filterByShippingHistoryDate('now'); // WHERE shipping_history_date = '2011-03-14'
     * $query->filterByShippingHistoryDate(array('max' => 'yesterday')); // WHERE shipping_history_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $shippingHistoryDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function filterByShippingHistoryDate($shippingHistoryDate = null, $comparison = null)
    {
        if (is_array($shippingHistoryDate)) {
            $useMinMax = false;
            if (isset($shippingHistoryDate['min'])) {
                $this->addUsingAlias(ShippingHistoryPeer::SHIPPING_HISTORY_DATE, $shippingHistoryDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingHistoryDate['max'])) {
                $this->addUsingAlias(ShippingHistoryPeer::SHIPPING_HISTORY_DATE, $shippingHistoryDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingHistoryPeer::SHIPPING_HISTORY_DATE, $shippingHistoryDate, $comparison);
    }

    /**
     * Filter the query by a related Shipping object
     *
     * @param   Shipping|PropelObjectCollection $shipping The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ShippingHistoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShipping($shipping, $comparison = null)
    {
        if ($shipping instanceof Shipping) {
            return $this
                ->addUsingAlias(ShippingHistoryPeer::IDSHIPPING, $shipping->getIdshipping(), $comparison);
        } elseif ($shipping instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShippingHistoryPeer::IDSHIPPING, $shipping->toKeyValue('PrimaryKey', 'Idshipping'), $comparison);
        } else {
            throw new PropelException('filterByShipping() only accepts arguments of type Shipping or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Shipping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function joinShipping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Shipping');

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
            $this->addJoinObject($join, 'Shipping');
        }

        return $this;
    }

    /**
     * Use the Shipping relation Shipping object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ShippingQuery A secondary query class using the current class as primary query
     */
    public function useShippingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShipping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Shipping', 'ShippingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ShippingHistory $shippingHistory Object to remove from the list of results
     *
     * @return ShippingHistoryQuery The current query, for fluid interface
     */
    public function prune($shippingHistory = null)
    {
        if ($shippingHistory) {
            $this->addUsingAlias(ShippingHistoryPeer::IDSHIPPING_HISTORY, $shippingHistory->getIdshippingHistory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
