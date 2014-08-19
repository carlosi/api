<?php


/**
 * Base class that represents a query for the 'productcategorystaticproperty' table.
 *
 *
 *
 * @method ProductcategorystaticpropertyQuery orderByIdproductcategorystaticproperty($order = Criteria::ASC) Order by the idproductcategorystaticproperty column
 * @method ProductcategorystaticpropertyQuery orderByIdproductcategory($order = Criteria::ASC) Order by the idproductcategory column
 * @method ProductcategorystaticpropertyQuery orderByProductcategorystaticpropertyKey($order = Criteria::ASC) Order by the productcategorystaticproperty_key column
 * @method ProductcategorystaticpropertyQuery orderByProductcategorystaticpropertyVisiblename($order = Criteria::ASC) Order by the productcategorystaticproperty_visiblename column
 *
 * @method ProductcategorystaticpropertyQuery groupByIdproductcategorystaticproperty() Group by the idproductcategorystaticproperty column
 * @method ProductcategorystaticpropertyQuery groupByIdproductcategory() Group by the idproductcategory column
 * @method ProductcategorystaticpropertyQuery groupByProductcategorystaticpropertyKey() Group by the productcategorystaticproperty_key column
 * @method ProductcategorystaticpropertyQuery groupByProductcategorystaticpropertyVisiblename() Group by the productcategorystaticproperty_visiblename column
 *
 * @method ProductcategorystaticpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductcategorystaticpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductcategorystaticpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductcategorystaticpropertyQuery leftJoinProductcategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategory relation
 * @method ProductcategorystaticpropertyQuery rightJoinProductcategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategory relation
 * @method ProductcategorystaticpropertyQuery innerJoinProductcategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategory relation
 *
 * @method Productcategorystaticproperty findOne(PropelPDO $con = null) Return the first Productcategorystaticproperty matching the query
 * @method Productcategorystaticproperty findOneOrCreate(PropelPDO $con = null) Return the first Productcategorystaticproperty matching the query, or a new Productcategorystaticproperty object populated from the query conditions when no match is found
 *
 * @method Productcategorystaticproperty findOneByIdproductcategory(int $idproductcategory) Return the first Productcategorystaticproperty filtered by the idproductcategory column
 * @method Productcategorystaticproperty findOneByProductcategorystaticpropertyKey(string $productcategorystaticproperty_key) Return the first Productcategorystaticproperty filtered by the productcategorystaticproperty_key column
 * @method Productcategorystaticproperty findOneByProductcategorystaticpropertyVisiblename(string $productcategorystaticproperty_visiblename) Return the first Productcategorystaticproperty filtered by the productcategorystaticproperty_visiblename column
 *
 * @method array findByIdproductcategorystaticproperty(int $idproductcategorystaticproperty) Return Productcategorystaticproperty objects filtered by the idproductcategorystaticproperty column
 * @method array findByIdproductcategory(int $idproductcategory) Return Productcategorystaticproperty objects filtered by the idproductcategory column
 * @method array findByProductcategorystaticpropertyKey(string $productcategorystaticproperty_key) Return Productcategorystaticproperty objects filtered by the productcategorystaticproperty_key column
 * @method array findByProductcategorystaticpropertyVisiblename(string $productcategorystaticproperty_visiblename) Return Productcategorystaticproperty objects filtered by the productcategorystaticproperty_visiblename column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductcategorystaticpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductcategorystaticpropertyQuery object.
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
            $modelName = 'Productcategorystaticproperty';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductcategorystaticpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductcategorystaticpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductcategorystaticpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductcategorystaticpropertyQuery) {
            return $criteria;
        }
        $query = new ProductcategorystaticpropertyQuery(null, null, $modelAlias);

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
     * @return   Productcategorystaticproperty|Productcategorystaticproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductcategorystaticpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductcategorystaticpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productcategorystaticproperty A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductcategorystaticproperty($key, $con = null)
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
     * @return                 Productcategorystaticproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductcategorystaticproperty`, `idproductcategory`, `productcategorystaticproperty_key`, `productcategorystaticproperty_visiblename` FROM `productcategorystaticproperty` WHERE `idproductcategorystaticproperty` = :p0';
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
            $obj = new Productcategorystaticproperty();
            $obj->hydrate($row);
            ProductcategorystaticpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productcategorystaticproperty|Productcategorystaticproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productcategorystaticproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductcategorystaticproperty column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductcategorystaticproperty(1234); // WHERE idproductcategorystaticproperty = 1234
     * $query->filterByIdproductcategorystaticproperty(array(12, 34)); // WHERE idproductcategorystaticproperty IN (12, 34)
     * $query->filterByIdproductcategorystaticproperty(array('min' => 12)); // WHERE idproductcategorystaticproperty >= 12
     * $query->filterByIdproductcategorystaticproperty(array('max' => 12)); // WHERE idproductcategorystaticproperty <= 12
     * </code>
     *
     * @param     mixed $idproductcategorystaticproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductcategorystaticproperty($idproductcategorystaticproperty = null, $comparison = null)
    {
        if (is_array($idproductcategorystaticproperty)) {
            $useMinMax = false;
            if (isset($idproductcategorystaticproperty['min'])) {
                $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $idproductcategorystaticproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategorystaticproperty['max'])) {
                $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $idproductcategorystaticproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $idproductcategorystaticproperty, $comparison);
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
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductcategory($idproductcategory = null, $comparison = null)
    {
        if (is_array($idproductcategory)) {
            $useMinMax = false;
            if (isset($idproductcategory['min'])) {
                $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORY, $idproductcategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategory['max'])) {
                $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORY, $idproductcategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORY, $idproductcategory, $comparison);
    }

    /**
     * Filter the query on the productcategorystaticproperty_key column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategorystaticpropertyKey('fooValue');   // WHERE productcategorystaticproperty_key = 'fooValue'
     * $query->filterByProductcategorystaticpropertyKey('%fooValue%'); // WHERE productcategorystaticproperty_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productcategorystaticpropertyKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByProductcategorystaticpropertyKey($productcategorystaticpropertyKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productcategorystaticpropertyKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productcategorystaticpropertyKey)) {
                $productcategorystaticpropertyKey = str_replace('*', '%', $productcategorystaticpropertyKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::PRODUCTCATEGORYSTATICPROPERTY_KEY, $productcategorystaticpropertyKey, $comparison);
    }

    /**
     * Filter the query on the productcategorystaticproperty_visiblename column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategorystaticpropertyVisiblename('fooValue');   // WHERE productcategorystaticproperty_visiblename = 'fooValue'
     * $query->filterByProductcategorystaticpropertyVisiblename('%fooValue%'); // WHERE productcategorystaticproperty_visiblename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productcategorystaticpropertyVisiblename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function filterByProductcategorystaticpropertyVisiblename($productcategorystaticpropertyVisiblename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productcategorystaticpropertyVisiblename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productcategorystaticpropertyVisiblename)) {
                $productcategorystaticpropertyVisiblename = str_replace('*', '%', $productcategorystaticpropertyVisiblename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategorystaticpropertyPeer::PRODUCTCATEGORYSTATICPROPERTY_VISIBLENAME, $productcategorystaticpropertyVisiblename, $comparison);
    }

    /**
     * Filter the query by a related Productcategory object
     *
     * @param   Productcategory|PropelObjectCollection $productcategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategorystaticpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategory($productcategory, $comparison = null)
    {
        if ($productcategory instanceof Productcategory) {
            return $this
                ->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORY, $productcategory->getIdproductcategory(), $comparison);
        } elseif ($productcategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORY, $productcategory->toKeyValue('PrimaryKey', 'Idproductcategory'), $comparison);
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
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Productcategorystaticproperty $productcategorystaticproperty Object to remove from the list of results
     *
     * @return ProductcategorystaticpropertyQuery The current query, for fluid interface
     */
    public function prune($productcategorystaticproperty = null)
    {
        if ($productcategorystaticproperty) {
            $this->addUsingAlias(ProductcategorystaticpropertyPeer::IDPRODUCTCATEGORYSTATICPROPERTY, $productcategorystaticproperty->getIdproductcategorystaticproperty(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
