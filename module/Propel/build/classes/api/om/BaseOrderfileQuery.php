<?php


/**
 * Base class that represents a query for the 'orderfile' table.
 *
 *
 *
 * @method OrderfileQuery orderByIdorderfile($order = Criteria::ASC) Order by the idorderfile column
 * @method OrderfileQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method OrderfileQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrderfileQuery orderByOrderfileUrl($order = Criteria::ASC) Order by the orderfile_url column
 * @method OrderfileQuery orderByOrderfileNote($order = Criteria::ASC) Order by the orderfile_note column
 * @method OrderfileQuery orderByOrderfileUploaddate($order = Criteria::ASC) Order by the orderfile_uploaddate column
 *
 * @method OrderfileQuery groupByIdorderfile() Group by the idorderfile column
 * @method OrderfileQuery groupByIduser() Group by the iduser column
 * @method OrderfileQuery groupByIdorder() Group by the idorder column
 * @method OrderfileQuery groupByOrderfileUrl() Group by the orderfile_url column
 * @method OrderfileQuery groupByOrderfileNote() Group by the orderfile_note column
 * @method OrderfileQuery groupByOrderfileUploaddate() Group by the orderfile_uploaddate column
 *
 * @method OrderfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderfileQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method OrderfileQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method OrderfileQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method OrderfileQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method OrderfileQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method OrderfileQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Orderfile findOne(PropelPDO $con = null) Return the first Orderfile matching the query
 * @method Orderfile findOneOrCreate(PropelPDO $con = null) Return the first Orderfile matching the query, or a new Orderfile object populated from the query conditions when no match is found
 *
 * @method Orderfile findOneByIduser(int $iduser) Return the first Orderfile filtered by the iduser column
 * @method Orderfile findOneByIdorder(int $idorder) Return the first Orderfile filtered by the idorder column
 * @method Orderfile findOneByOrderfileUrl(string $orderfile_url) Return the first Orderfile filtered by the orderfile_url column
 * @method Orderfile findOneByOrderfileNote(string $orderfile_note) Return the first Orderfile filtered by the orderfile_note column
 * @method Orderfile findOneByOrderfileUploaddate(string $orderfile_uploaddate) Return the first Orderfile filtered by the orderfile_uploaddate column
 *
 * @method array findByIdorderfile(int $idorderfile) Return Orderfile objects filtered by the idorderfile column
 * @method array findByIduser(int $iduser) Return Orderfile objects filtered by the iduser column
 * @method array findByIdorder(int $idorder) Return Orderfile objects filtered by the idorder column
 * @method array findByOrderfileUrl(string $orderfile_url) Return Orderfile objects filtered by the orderfile_url column
 * @method array findByOrderfileNote(string $orderfile_note) Return Orderfile objects filtered by the orderfile_note column
 * @method array findByOrderfileUploaddate(string $orderfile_uploaddate) Return Orderfile objects filtered by the orderfile_uploaddate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderfileQuery object.
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
            $modelName = 'Orderfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderfileQuery) {
            return $criteria;
        }
        $query = new OrderfileQuery(null, null, $modelAlias);

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
     * @return   Orderfile|Orderfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orderfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorderfile($key, $con = null)
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
     * @return                 Orderfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorderfile`, `iduser`, `idorder`, `orderfile_url`, `orderfile_note`, `orderfile_uploaddate` FROM `orderfile` WHERE `idorderfile` = :p0';
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
            $obj = new Orderfile();
            $obj->hydrate($row);
            OrderfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Orderfile|Orderfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Orderfile[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idorderfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderfile(1234); // WHERE idorderfile = 1234
     * $query->filterByIdorderfile(array(12, 34)); // WHERE idorderfile IN (12, 34)
     * $query->filterByIdorderfile(array('min' => 12)); // WHERE idorderfile >= 12
     * $query->filterByIdorderfile(array('max' => 12)); // WHERE idorderfile <= 12
     * </code>
     *
     * @param     mixed $idorderfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByIdorderfile($idorderfile = null, $comparison = null)
    {
        if (is_array($idorderfile)) {
            $useMinMax = false;
            if (isset($idorderfile['min'])) {
                $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $idorderfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderfile['max'])) {
                $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $idorderfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $idorderfile, $comparison);
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
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(OrderfilePeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(OrderfilePeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::IDUSER, $iduser, $comparison);
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
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrderfilePeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrderfilePeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the orderfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderfileUrl('fooValue');   // WHERE orderfile_url = 'fooValue'
     * $query->filterByOrderfileUrl('%fooValue%'); // WHERE orderfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByOrderfileUrl($orderfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderfileUrl)) {
                $orderfileUrl = str_replace('*', '%', $orderfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::ORDERFILE_URL, $orderfileUrl, $comparison);
    }

    /**
     * Filter the query on the orderfile_note column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderfileNote('fooValue');   // WHERE orderfile_note = 'fooValue'
     * $query->filterByOrderfileNote('%fooValue%'); // WHERE orderfile_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderfileNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByOrderfileNote($orderfileNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderfileNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderfileNote)) {
                $orderfileNote = str_replace('*', '%', $orderfileNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::ORDERFILE_NOTE, $orderfileNote, $comparison);
    }

    /**
     * Filter the query on the orderfile_uploaddate column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderfileUploaddate('2011-03-14'); // WHERE orderfile_uploaddate = '2011-03-14'
     * $query->filterByOrderfileUploaddate('now'); // WHERE orderfile_uploaddate = '2011-03-14'
     * $query->filterByOrderfileUploaddate(array('max' => 'yesterday')); // WHERE orderfile_uploaddate < '2011-03-13'
     * </code>
     *
     * @param     mixed $orderfileUploaddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function filterByOrderfileUploaddate($orderfileUploaddate = null, $comparison = null)
    {
        if (is_array($orderfileUploaddate)) {
            $useMinMax = false;
            if (isset($orderfileUploaddate['min'])) {
                $this->addUsingAlias(OrderfilePeer::ORDERFILE_UPLOADDATE, $orderfileUploaddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderfileUploaddate['max'])) {
                $this->addUsingAlias(OrderfilePeer::ORDERFILE_UPLOADDATE, $orderfileUploaddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderfilePeer::ORDERFILE_UPLOADDATE, $orderfileUploaddate, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(OrderfilePeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderfilePeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return OrderfileQuery The current query, for fluid interface
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
     * @return                 OrderfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(OrderfilePeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderfilePeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
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
     * @return OrderfileQuery The current query, for fluid interface
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
     * @param   Orderfile $orderfile Object to remove from the list of results
     *
     * @return OrderfileQuery The current query, for fluid interface
     */
    public function prune($orderfile = null)
    {
        if ($orderfile) {
            $this->addUsingAlias(OrderfilePeer::IDORDERFILE, $orderfile->getIdorderfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
