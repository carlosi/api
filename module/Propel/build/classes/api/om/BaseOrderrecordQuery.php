<?php


/**
 * Base class that represents a query for the 'orderrecord' table.
 *
 *
 *
 * @method OrderrecordQuery orderByIdorderrecord($order = Criteria::ASC) Order by the idorderrecord column
 * @method OrderrecordQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrderrecordQuery orderByOrderrecordDate($order = Criteria::ASC) Order by the orderrecord_date column
 * @method OrderrecordQuery orderByOrderrecordEvent($order = Criteria::ASC) Order by the orderrecord_event column
 * @method OrderrecordQuery orderByOrderrecordNote($order = Criteria::ASC) Order by the orderrecord_note column
 *
 * @method OrderrecordQuery groupByIdorderrecord() Group by the idorderrecord column
 * @method OrderrecordQuery groupByIdorder() Group by the idorder column
 * @method OrderrecordQuery groupByOrderrecordDate() Group by the orderrecord_date column
 * @method OrderrecordQuery groupByOrderrecordEvent() Group by the orderrecord_event column
 * @method OrderrecordQuery groupByOrderrecordNote() Group by the orderrecord_note column
 *
 * @method OrderrecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderrecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderrecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderrecordQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method OrderrecordQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method OrderrecordQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Orderrecord findOne(PropelPDO $con = null) Return the first Orderrecord matching the query
 * @method Orderrecord findOneOrCreate(PropelPDO $con = null) Return the first Orderrecord matching the query, or a new Orderrecord object populated from the query conditions when no match is found
 *
 * @method Orderrecord findOneByIdorder(int $idorder) Return the first Orderrecord filtered by the idorder column
 * @method Orderrecord findOneByOrderrecordDate(string $orderrecord_date) Return the first Orderrecord filtered by the orderrecord_date column
 * @method Orderrecord findOneByOrderrecordEvent(string $orderrecord_event) Return the first Orderrecord filtered by the orderrecord_event column
 * @method Orderrecord findOneByOrderrecordNote(string $orderrecord_note) Return the first Orderrecord filtered by the orderrecord_note column
 *
 * @method array findByIdorderrecord(int $idorderrecord) Return Orderrecord objects filtered by the idorderrecord column
 * @method array findByIdorder(int $idorder) Return Orderrecord objects filtered by the idorder column
 * @method array findByOrderrecordDate(string $orderrecord_date) Return Orderrecord objects filtered by the orderrecord_date column
 * @method array findByOrderrecordEvent(string $orderrecord_event) Return Orderrecord objects filtered by the orderrecord_event column
 * @method array findByOrderrecordNote(string $orderrecord_note) Return Orderrecord objects filtered by the orderrecord_note column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderrecordQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderrecordQuery object.
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
            $modelName = 'Orderrecord';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderrecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderrecordQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderrecordQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderrecordQuery) {
            return $criteria;
        }
        $query = new OrderrecordQuery(null, null, $modelAlias);

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
     * @return   Orderrecord|Orderrecord[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderrecordPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderrecordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orderrecord A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorderrecord($key, $con = null)
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
     * @return                 Orderrecord A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorderrecord`, `idorder`, `orderrecord_date`, `orderrecord_event`, `orderrecord_note` FROM `orderrecord` WHERE `idorderrecord` = :p0';
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
            $obj = new Orderrecord();
            $obj->hydrate($row);
            OrderrecordPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Orderrecord|Orderrecord[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Orderrecord[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idorderrecord column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderrecord(1234); // WHERE idorderrecord = 1234
     * $query->filterByIdorderrecord(array(12, 34)); // WHERE idorderrecord IN (12, 34)
     * $query->filterByIdorderrecord(array('min' => 12)); // WHERE idorderrecord >= 12
     * $query->filterByIdorderrecord(array('max' => 12)); // WHERE idorderrecord <= 12
     * </code>
     *
     * @param     mixed $idorderrecord The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByIdorderrecord($idorderrecord = null, $comparison = null)
    {
        if (is_array($idorderrecord)) {
            $useMinMax = false;
            if (isset($idorderrecord['min'])) {
                $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $idorderrecord['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderrecord['max'])) {
                $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $idorderrecord['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $idorderrecord, $comparison);
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
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrderrecordPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrderrecordPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderrecordPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the orderrecord_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderrecordDate('2011-03-14'); // WHERE orderrecord_date = '2011-03-14'
     * $query->filterByOrderrecordDate('now'); // WHERE orderrecord_date = '2011-03-14'
     * $query->filterByOrderrecordDate(array('max' => 'yesterday')); // WHERE orderrecord_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $orderrecordDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByOrderrecordDate($orderrecordDate = null, $comparison = null)
    {
        if (is_array($orderrecordDate)) {
            $useMinMax = false;
            if (isset($orderrecordDate['min'])) {
                $this->addUsingAlias(OrderrecordPeer::ORDERRECORD_DATE, $orderrecordDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderrecordDate['max'])) {
                $this->addUsingAlias(OrderrecordPeer::ORDERRECORD_DATE, $orderrecordDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderrecordPeer::ORDERRECORD_DATE, $orderrecordDate, $comparison);
    }

    /**
     * Filter the query on the orderrecord_event column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderrecordEvent('fooValue');   // WHERE orderrecord_event = 'fooValue'
     * $query->filterByOrderrecordEvent('%fooValue%'); // WHERE orderrecord_event LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderrecordEvent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByOrderrecordEvent($orderrecordEvent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderrecordEvent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderrecordEvent)) {
                $orderrecordEvent = str_replace('*', '%', $orderrecordEvent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderrecordPeer::ORDERRECORD_EVENT, $orderrecordEvent, $comparison);
    }

    /**
     * Filter the query on the orderrecord_note column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderrecordNote('fooValue');   // WHERE orderrecord_note = 'fooValue'
     * $query->filterByOrderrecordNote('%fooValue%'); // WHERE orderrecord_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderrecordNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function filterByOrderrecordNote($orderrecordNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderrecordNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderrecordNote)) {
                $orderrecordNote = str_replace('*', '%', $orderrecordNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderrecordPeer::ORDERRECORD_NOTE, $orderrecordNote, $comparison);
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(OrderrecordPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderrecordPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
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
     * @return OrderrecordQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Orderrecord $orderrecord Object to remove from the list of results
     *
     * @return OrderrecordQuery The current query, for fluid interface
     */
    public function prune($orderrecord = null)
    {
        if ($orderrecord) {
            $this->addUsingAlias(OrderrecordPeer::IDORDERRECORD, $orderrecord->getIdorderrecord(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
