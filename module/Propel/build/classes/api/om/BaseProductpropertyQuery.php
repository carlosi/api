<?php


/**
 * Base class that represents a query for the 'productproperty' table.
 *
 *
 *
 * @method ProductpropertyQuery orderByIdproductproperty($order = Criteria::ASC) Order by the idproductproperty column
 * @method ProductpropertyQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method ProductpropertyQuery orderByIdproductmainproperty($order = Criteria::ASC) Order by the idproductmainproperty column
 * @method ProductpropertyQuery orderByProductpropertyValue($order = Criteria::ASC) Order by the productproperty_value column
 *
 * @method ProductpropertyQuery groupByIdproductproperty() Group by the idproductproperty column
 * @method ProductpropertyQuery groupByIdproduct() Group by the idproduct column
 * @method ProductpropertyQuery groupByIdproductmainproperty() Group by the idproductmainproperty column
 * @method ProductpropertyQuery groupByProductpropertyValue() Group by the productproperty_value column
 *
 * @method ProductpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductpropertyQuery leftJoinProductmainproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmainproperty relation
 * @method ProductpropertyQuery rightJoinProductmainproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmainproperty relation
 * @method ProductpropertyQuery innerJoinProductmainproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmainproperty relation
 *
 * @method ProductpropertyQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProductpropertyQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProductpropertyQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method Productproperty findOne(PropelPDO $con = null) Return the first Productproperty matching the query
 * @method Productproperty findOneOrCreate(PropelPDO $con = null) Return the first Productproperty matching the query, or a new Productproperty object populated from the query conditions when no match is found
 *
 * @method Productproperty findOneByIdproduct(int $idproduct) Return the first Productproperty filtered by the idproduct column
 * @method Productproperty findOneByIdproductmainproperty(int $idproductmainproperty) Return the first Productproperty filtered by the idproductmainproperty column
 * @method Productproperty findOneByProductpropertyValue(string $productproperty_value) Return the first Productproperty filtered by the productproperty_value column
 *
 * @method array findByIdproductproperty(int $idproductproperty) Return Productproperty objects filtered by the idproductproperty column
 * @method array findByIdproduct(int $idproduct) Return Productproperty objects filtered by the idproduct column
 * @method array findByIdproductmainproperty(int $idproductmainproperty) Return Productproperty objects filtered by the idproductmainproperty column
 * @method array findByProductpropertyValue(string $productproperty_value) Return Productproperty objects filtered by the productproperty_value column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductpropertyQuery object.
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
            $modelName = 'Productproperty';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductpropertyQuery) {
            return $criteria;
        }
        $query = new ProductpropertyQuery(null, null, $modelAlias);

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
     * @return   Productproperty|Productproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productproperty A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductproperty($key, $con = null)
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
     * @return                 Productproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductproperty`, `idproduct`, `idproductmainproperty`, `productproperty_value` FROM `productproperty` WHERE `idproductproperty` = :p0';
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
            $obj = new Productproperty();
            $obj->hydrate($row);
            ProductpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productproperty|Productproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductproperty column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductproperty(1234); // WHERE idproductproperty = 1234
     * $query->filterByIdproductproperty(array(12, 34)); // WHERE idproductproperty IN (12, 34)
     * $query->filterByIdproductproperty(array('min' => 12)); // WHERE idproductproperty >= 12
     * $query->filterByIdproductproperty(array('max' => 12)); // WHERE idproductproperty <= 12
     * </code>
     *
     * @param     mixed $idproductproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductproperty($idproductproperty = null, $comparison = null)
    {
        if (is_array($idproductproperty)) {
            $useMinMax = false;
            if (isset($idproductproperty['min'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $idproductproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductproperty['max'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $idproductproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $idproductproperty, $comparison);
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
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductpropertyPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the idproductmainproperty column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductmainproperty(1234); // WHERE idproductmainproperty = 1234
     * $query->filterByIdproductmainproperty(array(12, 34)); // WHERE idproductmainproperty IN (12, 34)
     * $query->filterByIdproductmainproperty(array('min' => 12)); // WHERE idproductmainproperty >= 12
     * $query->filterByIdproductmainproperty(array('max' => 12)); // WHERE idproductmainproperty <= 12
     * </code>
     *
     * @see       filterByProductmainproperty()
     *
     * @param     mixed $idproductmainproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductmainproperty($idproductmainproperty = null, $comparison = null)
    {
        if (is_array($idproductmainproperty)) {
            $useMinMax = false;
            if (isset($idproductmainproperty['min'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmainproperty['max'])) {
                $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty, $comparison);
    }

    /**
     * Filter the query on the productproperty_value column
     *
     * Example usage:
     * <code>
     * $query->filterByProductpropertyValue('fooValue');   // WHERE productproperty_value = 'fooValue'
     * $query->filterByProductpropertyValue('%fooValue%'); // WHERE productproperty_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productpropertyValue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function filterByProductpropertyValue($productpropertyValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productpropertyValue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productpropertyValue)) {
                $productpropertyValue = str_replace('*', '%', $productpropertyValue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductpropertyPeer::PRODUCTPROPERTY_VALUE, $productpropertyValue, $comparison);
    }

    /**
     * Filter the query by a related Productmainproperty object
     *
     * @param   Productmainproperty|PropelObjectCollection $productmainproperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmainproperty($productmainproperty, $comparison = null)
    {
        if ($productmainproperty instanceof Productmainproperty) {
            return $this
                ->addUsingAlias(ProductpropertyPeer::IDPRODUCTMAINPROPERTY, $productmainproperty->getIdproductmainproperty(), $comparison);
        } elseif ($productmainproperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductpropertyPeer::IDPRODUCTMAINPROPERTY, $productmainproperty->toKeyValue('PrimaryKey', 'Idproductmainproperty'), $comparison);
        } else {
            throw new PropelException('filterByProductmainproperty() only accepts arguments of type Productmainproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmainproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function joinProductmainproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmainproperty');

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
            $this->addJoinObject($join, 'Productmainproperty');
        }

        return $this;
    }

    /**
     * Use the Productmainproperty relation Productmainproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainpropertyQuery A secondary query class using the current class as primary query
     */
    public function useProductmainpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmainproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmainproperty', 'ProductmainpropertyQuery');
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(ProductpropertyPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductpropertyPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
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
     * @return ProductpropertyQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Productproperty $productproperty Object to remove from the list of results
     *
     * @return ProductpropertyQuery The current query, for fluid interface
     */
    public function prune($productproperty = null)
    {
        if ($productproperty) {
            $this->addUsingAlias(ProductpropertyPeer::IDPRODUCTPROPERTY, $productproperty->getIdproductproperty(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
