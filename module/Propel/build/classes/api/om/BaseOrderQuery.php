<?php


/**
 * Base class that represents a query for the 'order' table.
 *
 *
 *
 * @method OrderQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrderQuery orderByIdbranch($order = Criteria::ASC) Order by the idbranch column
 * @method OrderQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method OrderQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method OrderQuery orderByOrderStatus($order = Criteria::ASC) Order by the order_status column
 * @method OrderQuery orderByOrderPayment($order = Criteria::ASC) Order by the order_payment column
 * @method OrderQuery orderByOrderPaymentmode($order = Criteria::ASC) Order by the order_paymentmode column
 * @method OrderQuery orderByOrderDelivery($order = Criteria::ASC) Order by the order_delivery column
 *
 * @method OrderQuery groupByIdorder() Group by the idorder column
 * @method OrderQuery groupByIdbranch() Group by the idbranch column
 * @method OrderQuery groupByIdclient() Group by the idclient column
 * @method OrderQuery groupByCreatedAt() Group by the created_at column
 * @method OrderQuery groupByOrderStatus() Group by the order_status column
 * @method OrderQuery groupByOrderPayment() Group by the order_payment column
 * @method OrderQuery groupByOrderPaymentmode() Group by the order_paymentmode column
 * @method OrderQuery groupByOrderDelivery() Group by the order_delivery column
 *
 * @method OrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method OrderQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method OrderQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method OrderQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method OrderQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method OrderQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method OrderQuery leftJoinBankordertransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankordertransaction relation
 * @method OrderQuery rightJoinBankordertransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankordertransaction relation
 * @method OrderQuery innerJoinBankordertransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankordertransaction relation
 *
 * @method OrderQuery leftJoinMxtaxdocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mxtaxdocument relation
 * @method OrderQuery rightJoinMxtaxdocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mxtaxdocument relation
 * @method OrderQuery innerJoinMxtaxdocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Mxtaxdocument relation
 *
 * @method OrderQuery leftJoinOrdercomment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ordercomment relation
 * @method OrderQuery rightJoinOrdercomment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ordercomment relation
 * @method OrderQuery innerJoinOrdercomment($relationAlias = null) Adds a INNER JOIN clause to the query using the Ordercomment relation
 *
 * @method OrderQuery leftJoinOrderfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderfile relation
 * @method OrderQuery rightJoinOrderfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderfile relation
 * @method OrderQuery innerJoinOrderfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderfile relation
 *
 * @method OrderQuery leftJoinOrderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderitem relation
 * @method OrderQuery rightJoinOrderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderitem relation
 * @method OrderQuery innerJoinOrderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderitem relation
 *
 * @method OrderQuery leftJoinOrderrecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderrecord relation
 * @method OrderQuery rightJoinOrderrecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderrecord relation
 * @method OrderQuery innerJoinOrderrecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderrecord relation
 *
 * @method OrderQuery leftJoinOrdershipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ordershipping relation
 * @method OrderQuery rightJoinOrdershipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ordershipping relation
 * @method OrderQuery innerJoinOrdershipping($relationAlias = null) Adds a INNER JOIN clause to the query using the Ordershipping relation
 *
 * @method Order findOne(PropelPDO $con = null) Return the first Order matching the query
 * @method Order findOneOrCreate(PropelPDO $con = null) Return the first Order matching the query, or a new Order object populated from the query conditions when no match is found
 *
 * @method Order findOneByIdbranch(int $idbranch) Return the first Order filtered by the idbranch column
 * @method Order findOneByIdclient(int $idclient) Return the first Order filtered by the idclient column
 * @method Order findOneByCreatedAt(string $created_at) Return the first Order filtered by the created_at column
 * @method Order findOneByOrderStatus(string $order_status) Return the first Order filtered by the order_status column
 * @method Order findOneByOrderPayment(string $order_payment) Return the first Order filtered by the order_payment column
 * @method Order findOneByOrderPaymentmode(string $order_paymentmode) Return the first Order filtered by the order_paymentmode column
 * @method Order findOneByOrderDelivery(string $order_delivery) Return the first Order filtered by the order_delivery column
 *
 * @method array findByIdorder(int $idorder) Return Order objects filtered by the idorder column
 * @method array findByIdbranch(int $idbranch) Return Order objects filtered by the idbranch column
 * @method array findByIdclient(int $idclient) Return Order objects filtered by the idclient column
 * @method array findByCreatedAt(string $created_at) Return Order objects filtered by the created_at column
 * @method array findByOrderStatus(string $order_status) Return Order objects filtered by the order_status column
 * @method array findByOrderPayment(string $order_payment) Return Order objects filtered by the order_payment column
 * @method array findByOrderPaymentmode(string $order_paymentmode) Return Order objects filtered by the order_paymentmode column
 * @method array findByOrderDelivery(string $order_delivery) Return Order objects filtered by the order_delivery column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderQuery object.
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
            $modelName = 'Order';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderQuery) {
            return $criteria;
        }
        $query = new OrderQuery(null, null, $modelAlias);

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
     * @return   Order|Order[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Order A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorder($key, $con = null)
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
     * @return                 Order A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorder`, `idbranch`, `idclient`, `created_at`, `order_status`, `order_payment`, `order_paymentmode`, `order_delivery` FROM `order` WHERE `idorder` = :p0';
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
            $obj = new Order();
            $obj->hydrate($row);
            OrderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Order|Order[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Order[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderPeer::IDORDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderPeer::IDORDER, $keys, Criteria::IN);
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
     * @param     mixed $idorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrderPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrderPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderPeer::IDORDER, $idorder, $comparison);
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
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByIdbranch($idbranch = null, $comparison = null)
    {
        if (is_array($idbranch)) {
            $useMinMax = false;
            if (isset($idbranch['min'])) {
                $this->addUsingAlias(OrderPeer::IDBRANCH, $idbranch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranch['max'])) {
                $this->addUsingAlias(OrderPeer::IDBRANCH, $idbranch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderPeer::IDBRANCH, $idbranch, $comparison);
    }

    /**
     * Filter the query on the idclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclient(1234); // WHERE idclient = 1234
     * $query->filterByIdclient(array(12, 34)); // WHERE idclient IN (12, 34)
     * $query->filterByIdclient(array('min' => 12)); // WHERE idclient >= 12
     * $query->filterByIdclient(array('max' => 12)); // WHERE idclient <= 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(OrderPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(OrderPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(OrderPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(OrderPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the order_status column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderStatus('fooValue');   // WHERE order_status = 'fooValue'
     * $query->filterByOrderStatus('%fooValue%'); // WHERE order_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByOrderStatus($orderStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderStatus)) {
                $orderStatus = str_replace('*', '%', $orderStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderPeer::ORDER_STATUS, $orderStatus, $comparison);
    }

    /**
     * Filter the query on the order_payment column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderPayment('fooValue');   // WHERE order_payment = 'fooValue'
     * $query->filterByOrderPayment('%fooValue%'); // WHERE order_payment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderPayment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByOrderPayment($orderPayment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderPayment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderPayment)) {
                $orderPayment = str_replace('*', '%', $orderPayment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderPeer::ORDER_PAYMENT, $orderPayment, $comparison);
    }

    /**
     * Filter the query on the order_paymentmode column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderPaymentmode('fooValue');   // WHERE order_paymentmode = 'fooValue'
     * $query->filterByOrderPaymentmode('%fooValue%'); // WHERE order_paymentmode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderPaymentmode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByOrderPaymentmode($orderPaymentmode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderPaymentmode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderPaymentmode)) {
                $orderPaymentmode = str_replace('*', '%', $orderPaymentmode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderPeer::ORDER_PAYMENTMODE, $orderPaymentmode, $comparison);
    }

    /**
     * Filter the query on the order_delivery column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderDelivery('fooValue');   // WHERE order_delivery = 'fooValue'
     * $query->filterByOrderDelivery('%fooValue%'); // WHERE order_delivery LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderDelivery The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function filterByOrderDelivery($orderDelivery = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderDelivery)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderDelivery)) {
                $orderDelivery = str_replace('*', '%', $orderDelivery);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderPeer::ORDER_DELIVERY, $orderDelivery, $comparison);
    }

    /**
     * Filter the query by a related Branch object
     *
     * @param   Branch|PropelObjectCollection $branch The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranch($branch, $comparison = null)
    {
        if ($branch instanceof Branch) {
            return $this
                ->addUsingAlias(OrderPeer::IDBRANCH, $branch->getIdbranch(), $comparison);
        } elseif ($branch instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderPeer::IDBRANCH, $branch->toKeyValue('PrimaryKey', 'Idbranch'), $comparison);
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
     * @return OrderQuery The current query, for fluid interface
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
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(OrderPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Filter the query by a related Bankordertransaction object
     *
     * @param   Bankordertransaction|PropelObjectCollection $bankordertransaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankordertransaction($bankordertransaction, $comparison = null)
    {
        if ($bankordertransaction instanceof Bankordertransaction) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $bankordertransaction->getIdorder(), $comparison);
        } elseif ($bankordertransaction instanceof PropelObjectCollection) {
            return $this
                ->useBankordertransactionQuery()
                ->filterByPrimaryKeys($bankordertransaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBankordertransaction() only accepts arguments of type Bankordertransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bankordertransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinBankordertransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bankordertransaction');

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
            $this->addJoinObject($join, 'Bankordertransaction');
        }

        return $this;
    }

    /**
     * Use the Bankordertransaction relation Bankordertransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BankordertransactionQuery A secondary query class using the current class as primary query
     */
    public function useBankordertransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBankordertransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bankordertransaction', 'BankordertransactionQuery');
    }

    /**
     * Filter the query by a related Mxtaxdocument object
     *
     * @param   Mxtaxdocument|PropelObjectCollection $mxtaxdocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMxtaxdocument($mxtaxdocument, $comparison = null)
    {
        if ($mxtaxdocument instanceof Mxtaxdocument) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $mxtaxdocument->getIdorder(), $comparison);
        } elseif ($mxtaxdocument instanceof PropelObjectCollection) {
            return $this
                ->useMxtaxdocumentQuery()
                ->filterByPrimaryKeys($mxtaxdocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMxtaxdocument() only accepts arguments of type Mxtaxdocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mxtaxdocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinMxtaxdocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mxtaxdocument');

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
            $this->addJoinObject($join, 'Mxtaxdocument');
        }

        return $this;
    }

    /**
     * Use the Mxtaxdocument relation Mxtaxdocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MxtaxdocumentQuery A secondary query class using the current class as primary query
     */
    public function useMxtaxdocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMxtaxdocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mxtaxdocument', 'MxtaxdocumentQuery');
    }

    /**
     * Filter the query by a related Ordercomment object
     *
     * @param   Ordercomment|PropelObjectCollection $ordercomment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrdercomment($ordercomment, $comparison = null)
    {
        if ($ordercomment instanceof Ordercomment) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $ordercomment->getIdorder(), $comparison);
        } elseif ($ordercomment instanceof PropelObjectCollection) {
            return $this
                ->useOrdercommentQuery()
                ->filterByPrimaryKeys($ordercomment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrdercomment() only accepts arguments of type Ordercomment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ordercomment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinOrdercomment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ordercomment');

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
            $this->addJoinObject($join, 'Ordercomment');
        }

        return $this;
    }

    /**
     * Use the Ordercomment relation Ordercomment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrdercommentQuery A secondary query class using the current class as primary query
     */
    public function useOrdercommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrdercomment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ordercomment', 'OrdercommentQuery');
    }

    /**
     * Filter the query by a related Orderfile object
     *
     * @param   Orderfile|PropelObjectCollection $orderfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderfile($orderfile, $comparison = null)
    {
        if ($orderfile instanceof Orderfile) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $orderfile->getIdorder(), $comparison);
        } elseif ($orderfile instanceof PropelObjectCollection) {
            return $this
                ->useOrderfileQuery()
                ->filterByPrimaryKeys($orderfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderfile() only accepts arguments of type Orderfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinOrderfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderfile');

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
            $this->addJoinObject($join, 'Orderfile');
        }

        return $this;
    }

    /**
     * Use the Orderfile relation Orderfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderfileQuery A secondary query class using the current class as primary query
     */
    public function useOrderfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderfile', 'OrderfileQuery');
    }

    /**
     * Filter the query by a related Orderitem object
     *
     * @param   Orderitem|PropelObjectCollection $orderitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderitem($orderitem, $comparison = null)
    {
        if ($orderitem instanceof Orderitem) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $orderitem->getIdorder(), $comparison);
        } elseif ($orderitem instanceof PropelObjectCollection) {
            return $this
                ->useOrderitemQuery()
                ->filterByPrimaryKeys($orderitem->getPrimaryKeys())
                ->endUse();
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
     * @return OrderQuery The current query, for fluid interface
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
     * Filter the query by a related Orderrecord object
     *
     * @param   Orderrecord|PropelObjectCollection $orderrecord  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderrecord($orderrecord, $comparison = null)
    {
        if ($orderrecord instanceof Orderrecord) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $orderrecord->getIdorder(), $comparison);
        } elseif ($orderrecord instanceof PropelObjectCollection) {
            return $this
                ->useOrderrecordQuery()
                ->filterByPrimaryKeys($orderrecord->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderrecord() only accepts arguments of type Orderrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderrecord relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinOrderrecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderrecord');

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
            $this->addJoinObject($join, 'Orderrecord');
        }

        return $this;
    }

    /**
     * Use the Orderrecord relation Orderrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderrecordQuery A secondary query class using the current class as primary query
     */
    public function useOrderrecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderrecord($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderrecord', 'OrderrecordQuery');
    }

    /**
     * Filter the query by a related Ordershipping object
     *
     * @param   Ordershipping|PropelObjectCollection $ordershipping  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrdershipping($ordershipping, $comparison = null)
    {
        if ($ordershipping instanceof Ordershipping) {
            return $this
                ->addUsingAlias(OrderPeer::IDORDER, $ordershipping->getIdorder(), $comparison);
        } elseif ($ordershipping instanceof PropelObjectCollection) {
            return $this
                ->useOrdershippingQuery()
                ->filterByPrimaryKeys($ordershipping->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrdershipping() only accepts arguments of type Ordershipping or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ordershipping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function joinOrdershipping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ordershipping');

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
            $this->addJoinObject($join, 'Ordershipping');
        }

        return $this;
    }

    /**
     * Use the Ordershipping relation Ordershipping object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrdershippingQuery A secondary query class using the current class as primary query
     */
    public function useOrdershippingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrdershipping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ordershipping', 'OrdershippingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Order $order Object to remove from the list of results
     *
     * @return OrderQuery The current query, for fluid interface
     */
    public function prune($order = null)
    {
        if ($order) {
            $this->addUsingAlias(OrderPeer::IDORDER, $order->getIdorder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
