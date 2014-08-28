<?php


/**
 * Base class that represents a query for the 'ordershipping' table.
 *
 *
 *
 * @method OrdershippingQuery orderByIdordershipping($order = Criteria::ASC) Order by the idordershipping column
 * @method OrdershippingQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrdershippingQuery orderByIdshipping($order = Criteria::ASC) Order by the idshipping column
 *
 * @method OrdershippingQuery groupByIdordershipping() Group by the idordershipping column
 * @method OrdershippingQuery groupByIdorder() Group by the idorder column
 * @method OrdershippingQuery groupByIdshipping() Group by the idshipping column
 *
 * @method OrdershippingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrdershippingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrdershippingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrdershippingQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method OrdershippingQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method OrdershippingQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method OrdershippingQuery leftJoinShipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Shipping relation
 * @method OrdershippingQuery rightJoinShipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Shipping relation
 * @method OrdershippingQuery innerJoinShipping($relationAlias = null) Adds a INNER JOIN clause to the query using the Shipping relation
 *
 * @method Ordershipping findOne(PropelPDO $con = null) Return the first Ordershipping matching the query
 * @method Ordershipping findOneOrCreate(PropelPDO $con = null) Return the first Ordershipping matching the query, or a new Ordershipping object populated from the query conditions when no match is found
 *
 * @method Ordershipping findOneByIdorder(int $idorder) Return the first Ordershipping filtered by the idorder column
 * @method Ordershipping findOneByIdshipping(int $idshipping) Return the first Ordershipping filtered by the idshipping column
 *
 * @method array findByIdordershipping(int $idordershipping) Return Ordershipping objects filtered by the idordershipping column
 * @method array findByIdorder(int $idorder) Return Ordershipping objects filtered by the idorder column
 * @method array findByIdshipping(int $idshipping) Return Ordershipping objects filtered by the idshipping column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrdershippingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrdershippingQuery object.
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
            $modelName = 'Ordershipping';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrdershippingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrdershippingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrdershippingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrdershippingQuery) {
            return $criteria;
        }
        $query = new OrdershippingQuery(null, null, $modelAlias);

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
     * @return   Ordershipping|Ordershipping[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrdershippingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrdershippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Ordershipping A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdordershipping($key, $con = null)
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
     * @return                 Ordershipping A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idordershipping`, `idorder`, `idshipping` FROM `ordershipping` WHERE `idordershipping` = :p0';
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
            $obj = new Ordershipping();
            $obj->hydrate($row);
            OrdershippingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Ordershipping|Ordershipping[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Ordershipping[]|mixed the list of results, formatted by the current formatter
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
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idordershipping column
     *
     * Example usage:
     * <code>
     * $query->filterByIdordershipping(1234); // WHERE idordershipping = 1234
     * $query->filterByIdordershipping(array(12, 34)); // WHERE idordershipping IN (12, 34)
     * $query->filterByIdordershipping(array('min' => 12)); // WHERE idordershipping >= 12
     * $query->filterByIdordershipping(array('max' => 12)); // WHERE idordershipping <= 12
     * </code>
     *
     * @param     mixed $idordershipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function filterByIdordershipping($idordershipping = null, $comparison = null)
    {
        if (is_array($idordershipping)) {
            $useMinMax = false;
            if (isset($idordershipping['min'])) {
                $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $idordershipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idordershipping['max'])) {
                $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $idordershipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $idordershipping, $comparison);
    }

    /**
     * Filter the query on the idorder column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorder(1234); // WHERE idorder = 1234
     * $query->filterByIdorder(array(12, 34)); // WHERE idorder IN (12, 34)
     * $query->filterByIdorder(array('min' => 12)); // WHERE idorder >= 12
     * $query->filterByIdorder(array('max' => 12)); // WHERE idorder <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $idorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrdershippingPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrdershippingPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdershippingPeer::IDORDER, $idorder, $comparison);
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
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function filterByIdshipping($idshipping = null, $comparison = null)
    {
        if (is_array($idshipping)) {
            $useMinMax = false;
            if (isset($idshipping['min'])) {
                $this->addUsingAlias(OrdershippingPeer::IDSHIPPING, $idshipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idshipping['max'])) {
                $this->addUsingAlias(OrdershippingPeer::IDSHIPPING, $idshipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdershippingPeer::IDSHIPPING, $idshipping, $comparison);
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrdershippingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(OrdershippingPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdershippingPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type Order or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation Order object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
    }

    /**
     * Filter the query by a related Shipping object
     *
     * @param   Shipping|PropelObjectCollection $shipping The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrdershippingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShipping($shipping, $comparison = null)
    {
        if ($shipping instanceof Shipping) {
            return $this
                ->addUsingAlias(OrdershippingPeer::IDSHIPPING, $shipping->getIdshipping(), $comparison);
        } elseif ($shipping instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdershippingPeer::IDSHIPPING, $shipping->toKeyValue('PrimaryKey', 'Idshipping'), $comparison);
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
     * @return OrdershippingQuery The current query, for fluid interface
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
     * @param   Ordershipping $ordershipping Object to remove from the list of results
     *
     * @return OrdershippingQuery The current query, for fluid interface
     */
    public function prune($ordershipping = null)
    {
        if ($ordershipping) {
            $this->addUsingAlias(OrdershippingPeer::IDORDERSHIPPING, $ordershipping->getIdordershipping(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
