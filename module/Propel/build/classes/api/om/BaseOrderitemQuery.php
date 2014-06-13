<?php


/**
 * Base class that represents a query for the 'orderitem' table.
 *
 *
 *
 * @method OrderitemQuery orderByIdorderitem($order = Criteria::ASC) Order by the idorderitem column
 * @method OrderitemQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method OrderitemQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method OrderitemQuery orderByOrderitemNote($order = Criteria::ASC) Order by the orderitem_note column
 * @method OrderitemQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method OrderitemQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method OrderitemQuery groupByIdorderitem() Group by the idorderitem column
 * @method OrderitemQuery groupByIdorder() Group by the idorder column
 * @method OrderitemQuery groupByIdproduct() Group by the idproduct column
 * @method OrderitemQuery groupByOrderitemNote() Group by the orderitem_note column
 * @method OrderitemQuery groupByQuantity() Group by the quantity column
 * @method OrderitemQuery groupByValue() Group by the value column
 *
 * @method OrderitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderitemQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method OrderitemQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method OrderitemQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method OrderitemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method OrderitemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method OrderitemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method OrderitemQuery leftJoinProductionorderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionorderitem relation
 * @method OrderitemQuery rightJoinProductionorderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionorderitem relation
 * @method OrderitemQuery innerJoinProductionorderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionorderitem relation
 *
 * @method Orderitem findOne(PropelPDO $con = null) Return the first Orderitem matching the query
 * @method Orderitem findOneOrCreate(PropelPDO $con = null) Return the first Orderitem matching the query, or a new Orderitem object populated from the query conditions when no match is found
 *
 * @method Orderitem findOneByIdorder(int $idorder) Return the first Orderitem filtered by the idorder column
 * @method Orderitem findOneByIdproduct(int $idproduct) Return the first Orderitem filtered by the idproduct column
 * @method Orderitem findOneByOrderitemNote(string $orderitem_note) Return the first Orderitem filtered by the orderitem_note column
 * @method Orderitem findOneByQuantity(string $quantity) Return the first Orderitem filtered by the quantity column
 * @method Orderitem findOneByValue(string $value) Return the first Orderitem filtered by the value column
 *
 * @method array findByIdorderitem(int $idorderitem) Return Orderitem objects filtered by the idorderitem column
 * @method array findByIdorder(int $idorder) Return Orderitem objects filtered by the idorder column
 * @method array findByIdproduct(int $idproduct) Return Orderitem objects filtered by the idproduct column
 * @method array findByOrderitemNote(string $orderitem_note) Return Orderitem objects filtered by the orderitem_note column
 * @method array findByQuantity(string $quantity) Return Orderitem objects filtered by the quantity column
 * @method array findByValue(string $value) Return Orderitem objects filtered by the value column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderitemQuery object.
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
            $modelName = 'Orderitem';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderitemQuery) {
            return $criteria;
        }
        $query = new OrderitemQuery(null, null, $modelAlias);

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
     * @return   Orderitem|Orderitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orderitem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorderitem($key, $con = null)
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
     * @return                 Orderitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorderitem`, `idorder`, `idproduct`, `orderitem_note`, `quantity`, `value` FROM `orderitem` WHERE `idorderitem` = :p0';
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
            $obj = new Orderitem();
            $obj->hydrate($row);
            OrderitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Orderitem|Orderitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Orderitem[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $keys, Criteria::IN);
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
     * @param     mixed $idorderitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByIdorderitem($idorderitem = null, $comparison = null)
    {
        if (is_array($idorderitem)) {
            $useMinMax = false;
            if (isset($idorderitem['min'])) {
                $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $idorderitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderitem['max'])) {
                $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $idorderitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $idorderitem, $comparison);
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
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(OrderitemPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(OrderitemPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the idproduct column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproduct(1234); // WHERE idproduct = 1234
     * $query->filterByIdproduct(array(12, 34)); // WHERE idproduct IN (12, 34)
     * $query->filterByIdproduct(array('min' => 12)); // WHERE idproduct >= 12
     * $query->filterByIdproduct(array('max' => 12)); // WHERE idproduct <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $idproduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(OrderitemPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(OrderitemPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the orderitem_note column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderitemNote('fooValue');   // WHERE orderitem_note = 'fooValue'
     * $query->filterByOrderitemNote('%fooValue%'); // WHERE orderitem_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderitemNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByOrderitemNote($orderitemNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderitemNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderitemNote)) {
                $orderitemNote = str_replace('*', '%', $orderitemNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::ORDERITEM_NOTE, $orderitemNote, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity >= 12
     * $query->filterByQuantity(array('max' => 12)); // WHERE quantity <= 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OrderitemPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OrderitemPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value >= 12
     * $query->filterByValue(array('max' => 12)); // WHERE value <= 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(OrderitemPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(OrderitemPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderitemPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(OrderitemPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderitemPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
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
     * @return OrderitemQuery The current query, for fluid interface
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
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(OrderitemPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderitemPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Filter the query by a related Productionorderitem object
     *
     * @param   Productionorderitem|PropelObjectCollection $productionorderitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionorderitem($productionorderitem, $comparison = null)
    {
        if ($productionorderitem instanceof Productionorderitem) {
            return $this
                ->addUsingAlias(OrderitemPeer::IDORDERITEM, $productionorderitem->getIdorderitem(), $comparison);
        } elseif ($productionorderitem instanceof PropelObjectCollection) {
            return $this
                ->useProductionorderitemQuery()
                ->filterByPrimaryKeys($productionorderitem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionorderitem() only accepts arguments of type Productionorderitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionorderitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function joinProductionorderitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionorderitem');

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
            $this->addJoinObject($join, 'Productionorderitem');
        }

        return $this;
    }

    /**
     * Use the Productionorderitem relation Productionorderitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionorderitemQuery A secondary query class using the current class as primary query
     */
    public function useProductionorderitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionorderitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionorderitem', 'ProductionorderitemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Orderitem $orderitem Object to remove from the list of results
     *
     * @return OrderitemQuery The current query, for fluid interface
     */
    public function prune($orderitem = null)
    {
        if ($orderitem) {
            $this->addUsingAlias(OrderitemPeer::IDORDERITEM, $orderitem->getIdorderitem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
