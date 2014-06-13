<?php


/**
 * Base class that represents a query for the 'productcategoryproperty' table.
 *
 *
 *
 * @method ProductcategorypropertyQuery orderByIdproductcategoryproperty($order = Criteria::ASC) Order by the idproductcategoryproperty column
 * @method ProductcategorypropertyQuery orderByIdproductcategory($order = Criteria::ASC) Order by the idproductcategory column
 * @method ProductcategorypropertyQuery orderByProductcategorypropertyName($order = Criteria::ASC) Order by the productcategoryproperty_name column
 *
 * @method ProductcategorypropertyQuery groupByIdproductcategoryproperty() Group by the idproductcategoryproperty column
 * @method ProductcategorypropertyQuery groupByIdproductcategory() Group by the idproductcategory column
 * @method ProductcategorypropertyQuery groupByProductcategorypropertyName() Group by the productcategoryproperty_name column
 *
 * @method ProductcategorypropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductcategorypropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductcategorypropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductcategorypropertyQuery leftJoinProductcategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategory relation
 * @method ProductcategorypropertyQuery rightJoinProductcategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategory relation
 * @method ProductcategorypropertyQuery innerJoinProductcategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategory relation
 *
 * @method ProductcategorypropertyQuery leftJoinProductcategorypropertyoption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategorypropertyoption relation
 * @method ProductcategorypropertyQuery rightJoinProductcategorypropertyoption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategorypropertyoption relation
 * @method ProductcategorypropertyQuery innerJoinProductcategorypropertyoption($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategorypropertyoption relation
 *
 * @method Productcategoryproperty findOne(PropelPDO $con = null) Return the first Productcategoryproperty matching the query
 * @method Productcategoryproperty findOneOrCreate(PropelPDO $con = null) Return the first Productcategoryproperty matching the query, or a new Productcategoryproperty object populated from the query conditions when no match is found
 *
 * @method Productcategoryproperty findOneByIdproductcategory(int $idproductcategory) Return the first Productcategoryproperty filtered by the idproductcategory column
 * @method Productcategoryproperty findOneByProductcategorypropertyName(string $productcategoryproperty_name) Return the first Productcategoryproperty filtered by the productcategoryproperty_name column
 *
 * @method array findByIdproductcategoryproperty(int $idproductcategoryproperty) Return Productcategoryproperty objects filtered by the idproductcategoryproperty column
 * @method array findByIdproductcategory(int $idproductcategory) Return Productcategoryproperty objects filtered by the idproductcategory column
 * @method array findByProductcategorypropertyName(string $productcategoryproperty_name) Return Productcategoryproperty objects filtered by the productcategoryproperty_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductcategorypropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductcategorypropertyQuery object.
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
            $modelName = 'Productcategoryproperty';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductcategorypropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductcategorypropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductcategorypropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductcategorypropertyQuery) {
            return $criteria;
        }
        $query = new ProductcategorypropertyQuery(null, null, $modelAlias);

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
     * @return   Productcategoryproperty|Productcategoryproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductcategorypropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductcategorypropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productcategoryproperty A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductcategoryproperty($key, $con = null)
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
     * @return                 Productcategoryproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductcategoryproperty`, `idproductcategory`, `productcategoryproperty_name` FROM `productcategoryproperty` WHERE `idproductcategoryproperty` = :p0';
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
            $obj = new Productcategoryproperty();
            $obj->hydrate($row);
            ProductcategorypropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productcategoryproperty|Productcategoryproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productcategoryproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductcategoryproperty column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductcategoryproperty(1234); // WHERE idproductcategoryproperty = 1234
     * $query->filterByIdproductcategoryproperty(array(12, 34)); // WHERE idproductcategoryproperty IN (12, 34)
     * $query->filterByIdproductcategoryproperty(array('min' => 12)); // WHERE idproductcategoryproperty >= 12
     * $query->filterByIdproductcategoryproperty(array('max' => 12)); // WHERE idproductcategoryproperty <= 12
     * </code>
     *
     * @param     mixed $idproductcategoryproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductcategoryproperty($idproductcategoryproperty = null, $comparison = null)
    {
        if (is_array($idproductcategoryproperty)) {
            $useMinMax = false;
            if (isset($idproductcategoryproperty['min'])) {
                $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategoryproperty['max'])) {
                $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty, $comparison);
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
     * @see       filterByProductcategory()
     *
     * @param     mixed $idproductcategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductcategory($idproductcategory = null, $comparison = null)
    {
        if (is_array($idproductcategory)) {
            $useMinMax = false;
            if (isset($idproductcategory['min'])) {
                $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORY, $idproductcategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategory['max'])) {
                $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORY, $idproductcategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORY, $idproductcategory, $comparison);
    }

    /**
     * Filter the query on the productcategoryproperty_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategorypropertyName('fooValue');   // WHERE productcategoryproperty_name = 'fooValue'
     * $query->filterByProductcategorypropertyName('%fooValue%'); // WHERE productcategoryproperty_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productcategorypropertyName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function filterByProductcategorypropertyName($productcategorypropertyName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productcategorypropertyName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productcategorypropertyName)) {
                $productcategorypropertyName = str_replace('*', '%', $productcategorypropertyName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyPeer::PRODUCTCATEGORYPROPERTY_NAME, $productcategorypropertyName, $comparison);
    }

    /**
     * Filter the query by a related Productcategory object
     *
     * @param   Productcategory|PropelObjectCollection $productcategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategorypropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategory($productcategory, $comparison = null)
    {
        if ($productcategory instanceof Productcategory) {
            return $this
                ->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORY, $productcategory->getIdproductcategory(), $comparison);
        } elseif ($productcategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORY, $productcategory->toKeyValue('PrimaryKey', 'Idproductcategory'), $comparison);
        } else {
            throw new PropelException('filterByProductcategory() only accepts arguments of type Productcategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productcategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function joinProductcategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productcategory');

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
            $this->addJoinObject($join, 'Productcategory');
        }

        return $this;
    }

    /**
     * Use the Productcategory relation Productcategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductcategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductcategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productcategory', 'ProductcategoryQuery');
    }

    /**
     * Filter the query by a related Productcategorypropertyoption object
     *
     * @param   Productcategorypropertyoption|PropelObjectCollection $productcategorypropertyoption  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategorypropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategorypropertyoption($productcategorypropertyoption, $comparison = null)
    {
        if ($productcategorypropertyoption instanceof Productcategorypropertyoption) {
            return $this
                ->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $productcategorypropertyoption->getIdproductcategoryproperty(), $comparison);
        } elseif ($productcategorypropertyoption instanceof PropelObjectCollection) {
            return $this
                ->useProductcategorypropertyoptionQuery()
                ->filterByPrimaryKeys($productcategorypropertyoption->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductcategorypropertyoption() only accepts arguments of type Productcategorypropertyoption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productcategorypropertyoption relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function joinProductcategorypropertyoption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productcategorypropertyoption');

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
            $this->addJoinObject($join, 'Productcategorypropertyoption');
        }

        return $this;
    }

    /**
     * Use the Productcategorypropertyoption relation Productcategorypropertyoption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategorypropertyoptionQuery A secondary query class using the current class as primary query
     */
    public function useProductcategorypropertyoptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductcategorypropertyoption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productcategorypropertyoption', 'ProductcategorypropertyoptionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productcategoryproperty $productcategoryproperty Object to remove from the list of results
     *
     * @return ProductcategorypropertyQuery The current query, for fluid interface
     */
    public function prune($productcategoryproperty = null)
    {
        if ($productcategoryproperty) {
            $this->addUsingAlias(ProductcategorypropertyPeer::IDPRODUCTCATEGORYPROPERTY, $productcategoryproperty->getIdproductcategoryproperty(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
