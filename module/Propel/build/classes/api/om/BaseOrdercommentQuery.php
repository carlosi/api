<?php


/**
 * Base class that represents a query for the 'ordercomment' table.
 *
 *
 *
 * @method OrdercommentQuery orderByIdordercomment($order = Criteria::ASC) Order by the idordercomment column
 * @method OrdercommentQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrdercommentQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method OrdercommentQuery orderByOrdercommentNote($order = Criteria::ASC) Order by the ordercomment_note column
 * @method OrdercommentQuery orderByOrdercommentDate($order = Criteria::ASC) Order by the ordercomment_date column
 *
 * @method OrdercommentQuery groupByIdordercomment() Group by the idordercomment column
 * @method OrdercommentQuery groupByIdorder() Group by the idorder column
 * @method OrdercommentQuery groupByIduser() Group by the iduser column
 * @method OrdercommentQuery groupByOrdercommentNote() Group by the ordercomment_note column
 * @method OrdercommentQuery groupByOrdercommentDate() Group by the ordercomment_date column
 *
 * @method OrdercommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrdercommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrdercommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrdercommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method OrdercommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method OrdercommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method OrdercommentQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method OrdercommentQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method OrdercommentQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Ordercomment findOne(PropelPDO $con = null) Return the first Ordercomment matching the query
 * @method Ordercomment findOneOrCreate(PropelPDO $con = null) Return the first Ordercomment matching the query, or a new Ordercomment object populated from the query conditions when no match is found
 *
 * @method Ordercomment findOneByIdorder(int $idorder) Return the first Ordercomment filtered by the idorder column
 * @method Ordercomment findOneByIduser(int $iduser) Return the first Ordercomment filtered by the iduser column
 * @method Ordercomment findOneByOrdercommentNote(string $ordercomment_note) Return the first Ordercomment filtered by the ordercomment_note column
 * @method Ordercomment findOneByOrdercommentDate(string $ordercomment_date) Return the first Ordercomment filtered by the ordercomment_date column
 *
 * @method array findByIdordercomment(int $idordercomment) Return Ordercomment objects filtered by the idordercomment column
 * @method array findByIdorder(int $idorder) Return Ordercomment objects filtered by the idorder column
 * @method array findByIduser(int $iduser) Return Ordercomment objects filtered by the iduser column
 * @method array findByOrdercommentNote(string $ordercomment_note) Return Ordercomment objects filtered by the ordercomment_note column
 * @method array findByOrdercommentDate(string $ordercomment_date) Return Ordercomment objects filtered by the ordercomment_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrdercommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrdercommentQuery object.
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
            $modelName = 'Ordercomment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrdercommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrdercommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrdercommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrdercommentQuery) {
            return $criteria;
        }
        $query = new OrdercommentQuery(null, null, $modelAlias);

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
     * @return   Ordercomment|Ordercomment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrdercommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrdercommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Ordercomment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdordercomment($key, $con = null)
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
     * @return                 Ordercomment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idordercomment`, `idorder`, `iduser`, `ordercomment_note`, `ordercomment_date` FROM `ordercomment` WHERE `idordercomment` = :p0';
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
            $obj = new Ordercomment();
            $obj->hydrate($row);
            OrdercommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Ordercomment|Ordercomment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Ordercomment[]|mixed the list of results, formatted by the current formatter
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
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idordercomment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdordercomment(1234); // WHERE idordercomment = 1234
     * $query->filterByIdordercomment(array(12, 34)); // WHERE idordercomment IN (12, 34)
     * $query->filterByIdordercomment(array('min' => 12)); // WHERE idordercomment >= 12
     * $query->filterByIdordercomment(array('max' => 12)); // WHERE idordercomment <= 12
     * </code>
     *
     * @param     mixed $idordercomment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByIdordercomment($idordercomment = null, $comparison = null)
    {
        if (is_array($idordercomment)) {
            $useMinMax = false;
            if (isset($idordercomment['min'])) {
                $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $idordercomment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idordercomment['max'])) {
                $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $idordercomment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $idordercomment, $comparison);
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
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrdercommentPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrdercommentPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdercommentPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the iduser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE iduser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE iduser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE iduser >= 12
     * $query->filterByIduser(array('max' => 12)); // WHERE iduser <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(OrdercommentPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(OrdercommentPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdercommentPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the ordercomment_note column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdercommentNote('fooValue');   // WHERE ordercomment_note = 'fooValue'
     * $query->filterByOrdercommentNote('%fooValue%'); // WHERE ordercomment_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordercommentNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByOrdercommentNote($ordercommentNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordercommentNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ordercommentNote)) {
                $ordercommentNote = str_replace('*', '%', $ordercommentNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrdercommentPeer::ORDERCOMMENT_NOTE, $ordercommentNote, $comparison);
    }

    /**
     * Filter the query on the ordercomment_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdercommentDate('2011-03-14'); // WHERE ordercomment_date = '2011-03-14'
     * $query->filterByOrdercommentDate('now'); // WHERE ordercomment_date = '2011-03-14'
     * $query->filterByOrdercommentDate(array('max' => 'yesterday')); // WHERE ordercomment_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $ordercommentDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function filterByOrdercommentDate($ordercommentDate = null, $comparison = null)
    {
        if (is_array($ordercommentDate)) {
            $useMinMax = false;
            if (isset($ordercommentDate['min'])) {
                $this->addUsingAlias(OrdercommentPeer::ORDERCOMMENT_DATE, $ordercommentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ordercommentDate['max'])) {
                $this->addUsingAlias(OrdercommentPeer::ORDERCOMMENT_DATE, $ordercommentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdercommentPeer::ORDERCOMMENT_DATE, $ordercommentDate, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrdercommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(OrdercommentPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdercommentPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrdercommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(OrdercommentPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdercommentPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
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
     * @return OrdercommentQuery The current query, for fluid interface
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
     * @param   Ordercomment $ordercomment Object to remove from the list of results
     *
     * @return OrdercommentQuery The current query, for fluid interface
     */
    public function prune($ordercomment = null)
    {
        if ($ordercomment) {
            $this->addUsingAlias(OrdercommentPeer::IDORDERCOMMENT, $ordercomment->getIdordercomment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
