<?php


/**
 * Base class that represents a query for the 'product' table.
 *
 *
 *
 * @method ProductQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method ProductQuery orderByIdproductmain($order = Criteria::ASC) Order by the idproductmain column
 * @method ProductQuery orderByPropertyArray($order = Criteria::ASC) Order by the property_array column
 * @method ProductQuery orderByProductStatus($order = Criteria::ASC) Order by the product_status column
 *
 * @method ProductQuery groupByIdproduct() Group by the idproduct column
 * @method ProductQuery groupByIdproductmain() Group by the idproductmain column
 * @method ProductQuery groupByPropertyArray() Group by the property_array column
 * @method ProductQuery groupByProductStatus() Group by the product_status column
 *
 * @method ProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method ProductQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method ProductQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method ProductQuery leftJoinOrderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderitem relation
 * @method ProductQuery rightJoinOrderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderitem relation
 * @method ProductQuery innerJoinOrderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderitem relation
 *
 * @method ProductQuery leftJoinProductproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productproperty relation
 * @method ProductQuery rightJoinProductproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productproperty relation
 * @method ProductQuery innerJoinProductproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productproperty relation
 *
 * @method Product findOne(PropelPDO $con = null) Return the first Product matching the query
 * @method Product findOneOrCreate(PropelPDO $con = null) Return the first Product matching the query, or a new Product object populated from the query conditions when no match is found
 *
 * @method Product findOneByIdproductmain(int $idproductmain) Return the first Product filtered by the idproductmain column
 * @method Product findOneByPropertyArray(string $property_array) Return the first Product filtered by the property_array column
 * @method Product findOneByProductStatus(string $product_status) Return the first Product filtered by the product_status column
 *
 * @method array findByIdproduct(int $idproduct) Return Product objects filtered by the idproduct column
 * @method array findByIdproductmain(int $idproductmain) Return Product objects filtered by the idproductmain column
 * @method array findByPropertyArray(string $property_array) Return Product objects filtered by the property_array column
 * @method array findByProductStatus(string $product_status) Return Product objects filtered by the product_status column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductQuery object.
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
            $modelName = 'Product';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductQuery) {
            return $criteria;
        }
        $query = new ProductQuery(null, null, $modelAlias);

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
     * @return   Product|Product[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproduct($key, $con = null)
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
     * @return                 Product A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproduct`, `idproductmain`, `property_array`, `product_status` FROM `product` WHERE `idproduct` = :p0';
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
            $obj = new Product();
            $obj->hydrate($row);
            ProductPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Product|Product[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Product[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $keys, Criteria::IN);
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
     * @param     mixed $idproduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the idproductmain column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductmain(1234); // WHERE idproductmain = 1234
     * $query->filterByIdproductmain(array(12, 34)); // WHERE idproductmain IN (12, 34)
     * $query->filterByIdproductmain(array('min' => 12)); // WHERE idproductmain >= 12
     * $query->filterByIdproductmain(array('max' => 12)); // WHERE idproductmain <= 12
     * </code>
     *
     * @see       filterByProductmain()
     *
     * @param     mixed $idproductmain The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByIdproductmain($idproductmain = null, $comparison = null)
    {
        if (is_array($idproductmain)) {
            $useMinMax = false;
            if (isset($idproductmain['min'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCTMAIN, $idproductmain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmain['max'])) {
                $this->addUsingAlias(ProductPeer::IDPRODUCTMAIN, $idproductmain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductPeer::IDPRODUCTMAIN, $idproductmain, $comparison);
    }

    /**
     * Filter the query on the property_array column
     *
     * Example usage:
     * <code>
     * $query->filterByPropertyArray('fooValue');   // WHERE property_array = 'fooValue'
     * $query->filterByPropertyArray('%fooValue%'); // WHERE property_array LIKE '%fooValue%'
     * </code>
     *
     * @param     string $propertyArray The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByPropertyArray($propertyArray = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($propertyArray)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $propertyArray)) {
                $propertyArray = str_replace('*', '%', $propertyArray);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PROPERTY_ARRAY, $propertyArray, $comparison);
    }

    /**
     * Filter the query on the product_status column
     *
     * Example usage:
     * <code>
     * $query->filterByProductStatus('fooValue');   // WHERE product_status = 'fooValue'
     * $query->filterByProductStatus('%fooValue%'); // WHERE product_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function filterByProductStatus($productStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productStatus)) {
                $productStatus = str_replace('*', '%', $productStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductPeer::PRODUCT_STATUS, $productStatus, $comparison);
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCTMAIN, $productmain->getIdproductmain(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCTMAIN, $productmain->toKeyValue('PrimaryKey', 'Idproductmain'), $comparison);
        } else {
            throw new PropelException('filterByProductmain() only accepts arguments of type Productmain or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmain relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinProductmain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmain');

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
            $this->addJoinObject($join, 'Productmain');
        }

        return $this;
    }

    /**
     * Use the Productmain relation Productmain object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainQuery A secondary query class using the current class as primary query
     */
    public function useProductmainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmain($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmain', 'ProductmainQuery');
    }

    /**
     * Filter the query by a related Orderitem object
     *
     * @param   Orderitem|PropelObjectCollection $orderitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderitem($orderitem, $comparison = null)
    {
        if ($orderitem instanceof Orderitem) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCT, $orderitem->getIdproduct(), $comparison);
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
     * @return ProductQuery The current query, for fluid interface
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
     * Filter the query by a related Productproperty object
     *
     * @param   Productproperty|PropelObjectCollection $productproperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductproperty($productproperty, $comparison = null)
    {
        if ($productproperty instanceof Productproperty) {
            return $this
                ->addUsingAlias(ProductPeer::IDPRODUCT, $productproperty->getIdproduct(), $comparison);
        } elseif ($productproperty instanceof PropelObjectCollection) {
            return $this
                ->useProductpropertyQuery()
                ->filterByPrimaryKeys($productproperty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductproperty() only accepts arguments of type Productproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function joinProductproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productproperty');

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
            $this->addJoinObject($join, 'Productproperty');
        }

        return $this;
    }

    /**
     * Use the Productproperty relation Productproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductpropertyQuery A secondary query class using the current class as primary query
     */
    public function useProductpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productproperty', 'ProductpropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Product $product Object to remove from the list of results
     *
     * @return ProductQuery The current query, for fluid interface
     */
    public function prune($product = null)
    {
        if ($product) {
            $this->addUsingAlias(ProductPeer::IDPRODUCT, $product->getIdproduct(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
