<?php


/**
 * Base class that represents a query for the 'productcategory' table.
 *
 *
 *
 * @method ProductcategoryQuery orderByIdproductcategory($order = Criteria::ASC) Order by the idproductcategory column
 * @method ProductcategoryQuery orderByCategoryName($order = Criteria::ASC) Order by the category_name column
 * @method ProductcategoryQuery orderByProductcategoryDependency($order = Criteria::ASC) Order by the productcategory_dependency column
 * @method ProductcategoryQuery orderByProductcategoryProperty($order = Criteria::ASC) Order by the productcategory_property column
 *
 * @method ProductcategoryQuery groupByIdproductcategory() Group by the idproductcategory column
 * @method ProductcategoryQuery groupByCategoryName() Group by the category_name column
 * @method ProductcategoryQuery groupByProductcategoryDependency() Group by the productcategory_dependency column
 * @method ProductcategoryQuery groupByProductcategoryProperty() Group by the productcategory_property column
 *
 * @method ProductcategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductcategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductcategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductcategoryQuery leftJoinProductcategoryRelatedByProductcategoryDependency($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductcategoryRelatedByProductcategoryDependency relation
 * @method ProductcategoryQuery rightJoinProductcategoryRelatedByProductcategoryDependency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductcategoryRelatedByProductcategoryDependency relation
 * @method ProductcategoryQuery innerJoinProductcategoryRelatedByProductcategoryDependency($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductcategoryRelatedByProductcategoryDependency relation
 *
 * @method ProductcategoryQuery leftJoinProductcategoryRelatedByIdproductcategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductcategoryRelatedByIdproductcategory relation
 * @method ProductcategoryQuery rightJoinProductcategoryRelatedByIdproductcategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductcategoryRelatedByIdproductcategory relation
 * @method ProductcategoryQuery innerJoinProductcategoryRelatedByIdproductcategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductcategoryRelatedByIdproductcategory relation
 *
 * @method ProductcategoryQuery leftJoinProductcategoryproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategoryproperty relation
 * @method ProductcategoryQuery rightJoinProductcategoryproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategoryproperty relation
 * @method ProductcategoryQuery innerJoinProductcategoryproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategoryproperty relation
 *
 * @method ProductcategoryQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method ProductcategoryQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method ProductcategoryQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method Productcategory findOne(PropelPDO $con = null) Return the first Productcategory matching the query
 * @method Productcategory findOneOrCreate(PropelPDO $con = null) Return the first Productcategory matching the query, or a new Productcategory object populated from the query conditions when no match is found
 *
 * @method Productcategory findOneByCategoryName(string $category_name) Return the first Productcategory filtered by the category_name column
 * @method Productcategory findOneByProductcategoryDependency(int $productcategory_dependency) Return the first Productcategory filtered by the productcategory_dependency column
 * @method Productcategory findOneByProductcategoryProperty(string $productcategory_property) Return the first Productcategory filtered by the productcategory_property column
 *
 * @method array findByIdproductcategory(int $idproductcategory) Return Productcategory objects filtered by the idproductcategory column
 * @method array findByCategoryName(string $category_name) Return Productcategory objects filtered by the category_name column
 * @method array findByProductcategoryDependency(int $productcategory_dependency) Return Productcategory objects filtered by the productcategory_dependency column
 * @method array findByProductcategoryProperty(string $productcategory_property) Return Productcategory objects filtered by the productcategory_property column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductcategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductcategoryQuery object.
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
            $modelName = 'Productcategory';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductcategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductcategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductcategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductcategoryQuery) {
            return $criteria;
        }
        $query = new ProductcategoryQuery(null, null, $modelAlias);

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
     * @return   Productcategory|Productcategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductcategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductcategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productcategory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductcategory($key, $con = null)
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
     * @return                 Productcategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductcategory`, `category_name`, `productcategory_dependency`, `productcategory_property` FROM `productcategory` WHERE `idproductcategory` = :p0';
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
            $obj = new Productcategory();
            $obj->hydrate($row);
            ProductcategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productcategory|Productcategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productcategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductcategory column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductcategory(1234); // WHERE idproductcategory = 1234
     * $query->filterByIdproductcategory(array(12, 34)); // WHERE idproductcategory IN (12, 34)
     * $query->filterByIdproductcategory(array('min' => 12)); // WHERE idproductcategory >= 12
     * $query->filterByIdproductcategory(array('max' => 12)); // WHERE idproductcategory <= 12
     * </code>
     *
     * @param     mixed $idproductcategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByIdproductcategory($idproductcategory = null, $comparison = null)
    {
        if (is_array($idproductcategory)) {
            $useMinMax = false;
            if (isset($idproductcategory['min'])) {
                $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $idproductcategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategory['max'])) {
                $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $idproductcategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $idproductcategory, $comparison);
    }

    /**
     * Filter the query on the category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryName('fooValue');   // WHERE category_name = 'fooValue'
     * $query->filterByCategoryName('%fooValue%'); // WHERE category_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryName($categoryName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $categoryName)) {
                $categoryName = str_replace('*', '%', $categoryName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategoryPeer::CATEGORY_NAME, $categoryName, $comparison);
    }

    /**
     * Filter the query on the productcategory_dependency column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategoryDependency(1234); // WHERE productcategory_dependency = 1234
     * $query->filterByProductcategoryDependency(array(12, 34)); // WHERE productcategory_dependency IN (12, 34)
     * $query->filterByProductcategoryDependency(array('min' => 12)); // WHERE productcategory_dependency >= 12
     * $query->filterByProductcategoryDependency(array('max' => 12)); // WHERE productcategory_dependency <= 12
     * </code>
     *
     * @see       filterByProductcategoryRelatedByProductcategoryDependency()
     *
     * @param     mixed $productcategoryDependency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByProductcategoryDependency($productcategoryDependency = null, $comparison = null)
    {
        if (is_array($productcategoryDependency)) {
            $useMinMax = false;
            if (isset($productcategoryDependency['min'])) {
                $this->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $productcategoryDependency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productcategoryDependency['max'])) {
                $this->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $productcategoryDependency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $productcategoryDependency, $comparison);
    }

    /**
     * Filter the query on the productcategory_property column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategoryProperty('fooValue');   // WHERE productcategory_property = 'fooValue'
     * $query->filterByProductcategoryProperty('%fooValue%'); // WHERE productcategory_property LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productcategoryProperty The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function filterByProductcategoryProperty($productcategoryProperty = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productcategoryProperty)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productcategoryProperty)) {
                $productcategoryProperty = str_replace('*', '%', $productcategoryProperty);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_PROPERTY, $productcategoryProperty, $comparison);
    }

    /**
     * Filter the query by a related Productcategory object
     *
     * @param   Productcategory|PropelObjectCollection $productcategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategoryRelatedByProductcategoryDependency($productcategory, $comparison = null)
    {
        if ($productcategory instanceof Productcategory) {
            return $this
                ->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $productcategory->getIdproductcategory(), $comparison);
        } elseif ($productcategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $productcategory->toKeyValue('PrimaryKey', 'Idproductcategory'), $comparison);
        } else {
            throw new PropelException('filterByProductcategoryRelatedByProductcategoryDependency() only accepts arguments of type Productcategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductcategoryRelatedByProductcategoryDependency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function joinProductcategoryRelatedByProductcategoryDependency($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductcategoryRelatedByProductcategoryDependency');

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
            $this->addJoinObject($join, 'ProductcategoryRelatedByProductcategoryDependency');
        }

        return $this;
    }

    /**
     * Use the ProductcategoryRelatedByProductcategoryDependency relation Productcategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductcategoryRelatedByProductcategoryDependencyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProductcategoryRelatedByProductcategoryDependency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductcategoryRelatedByProductcategoryDependency', 'ProductcategoryQuery');
    }

    /**
     * Filter the query by a related Productcategory object
     *
     * @param   Productcategory|PropelObjectCollection $productcategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategoryRelatedByIdproductcategory($productcategory, $comparison = null)
    {
        if ($productcategory instanceof Productcategory) {
            return $this
                ->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $productcategory->getProductcategoryDependency(), $comparison);
        } elseif ($productcategory instanceof PropelObjectCollection) {
            return $this
                ->useProductcategoryRelatedByIdproductcategoryQuery()
                ->filterByPrimaryKeys($productcategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductcategoryRelatedByIdproductcategory() only accepts arguments of type Productcategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductcategoryRelatedByIdproductcategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function joinProductcategoryRelatedByIdproductcategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductcategoryRelatedByIdproductcategory');

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
            $this->addJoinObject($join, 'ProductcategoryRelatedByIdproductcategory');
        }

        return $this;
    }

    /**
     * Use the ProductcategoryRelatedByIdproductcategory relation Productcategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductcategoryRelatedByIdproductcategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProductcategoryRelatedByIdproductcategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductcategoryRelatedByIdproductcategory', 'ProductcategoryQuery');
    }

    /**
     * Filter the query by a related Productcategoryproperty object
     *
     * @param   Productcategoryproperty|PropelObjectCollection $productcategoryproperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategoryproperty($productcategoryproperty, $comparison = null)
    {
        if ($productcategoryproperty instanceof Productcategoryproperty) {
            return $this
                ->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $productcategoryproperty->getIdproductcategory(), $comparison);
        } elseif ($productcategoryproperty instanceof PropelObjectCollection) {
            return $this
                ->useProductcategorypropertyQuery()
                ->filterByPrimaryKeys($productcategoryproperty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductcategoryproperty() only accepts arguments of type Productcategoryproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productcategoryproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function joinProductcategoryproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productcategoryproperty');

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
            $this->addJoinObject($join, 'Productcategoryproperty');
        }

        return $this;
    }

    /**
     * Use the Productcategoryproperty relation Productcategoryproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategorypropertyQuery A secondary query class using the current class as primary query
     */
    public function useProductcategorypropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductcategoryproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productcategoryproperty', 'ProductcategorypropertyQuery');
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $productmain->getIdproductcategory(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            return $this
                ->useProductmainQuery()
                ->filterByPrimaryKeys($productmain->getPrimaryKeys())
                ->endUse();
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
     * @return ProductcategoryQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Productcategory $productcategory Object to remove from the list of results
     *
     * @return ProductcategoryQuery The current query, for fluid interface
     */
    public function prune($productcategory = null)
    {
        if ($productcategory) {
            $this->addUsingAlias(ProductcategoryPeer::IDPRODUCTCATEGORY, $productcategory->getIdproductcategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
