<?php


/**
 * Base class that represents a query for the 'productmainproperty' table.
 *
 *
 *
 * @method ProductmainpropertyQuery orderByIdproductmainproperty($order = Criteria::ASC) Order by the idproductmainproperty column
 * @method ProductmainpropertyQuery orderByIdproductmain($order = Criteria::ASC) Order by the idproductmain column
 * @method ProductmainpropertyQuery orderByProductmainpropertyKey($order = Criteria::ASC) Order by the productmainproperty_key column
 * @method ProductmainpropertyQuery orderByProductmainpropertyVisiblename($order = Criteria::ASC) Order by the productmainproperty_visiblename column
 * @method ProductmainpropertyQuery orderByProductmainpropertyType($order = Criteria::ASC) Order by the productmainproperty_type column
 *
 * @method ProductmainpropertyQuery groupByIdproductmainproperty() Group by the idproductmainproperty column
 * @method ProductmainpropertyQuery groupByIdproductmain() Group by the idproductmain column
 * @method ProductmainpropertyQuery groupByProductmainpropertyKey() Group by the productmainproperty_key column
 * @method ProductmainpropertyQuery groupByProductmainpropertyVisiblename() Group by the productmainproperty_visiblename column
 * @method ProductmainpropertyQuery groupByProductmainpropertyType() Group by the productmainproperty_type column
 *
 * @method ProductmainpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductmainpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductmainpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductmainpropertyQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method ProductmainpropertyQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method ProductmainpropertyQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method ProductmainpropertyQuery leftJoinProductproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productproperty relation
 * @method ProductmainpropertyQuery rightJoinProductproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productproperty relation
 * @method ProductmainpropertyQuery innerJoinProductproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productproperty relation
 *
 * @method Productmainproperty findOne(PropelPDO $con = null) Return the first Productmainproperty matching the query
 * @method Productmainproperty findOneOrCreate(PropelPDO $con = null) Return the first Productmainproperty matching the query, or a new Productmainproperty object populated from the query conditions when no match is found
 *
 * @method Productmainproperty findOneByIdproductmain(int $idproductmain) Return the first Productmainproperty filtered by the idproductmain column
 * @method Productmainproperty findOneByProductmainpropertyKey(string $productmainproperty_key) Return the first Productmainproperty filtered by the productmainproperty_key column
 * @method Productmainproperty findOneByProductmainpropertyVisiblename(string $productmainproperty_visiblename) Return the first Productmainproperty filtered by the productmainproperty_visiblename column
 * @method Productmainproperty findOneByProductmainpropertyType(string $productmainproperty_type) Return the first Productmainproperty filtered by the productmainproperty_type column
 *
 * @method array findByIdproductmainproperty(int $idproductmainproperty) Return Productmainproperty objects filtered by the idproductmainproperty column
 * @method array findByIdproductmain(int $idproductmain) Return Productmainproperty objects filtered by the idproductmain column
 * @method array findByProductmainpropertyKey(string $productmainproperty_key) Return Productmainproperty objects filtered by the productmainproperty_key column
 * @method array findByProductmainpropertyVisiblename(string $productmainproperty_visiblename) Return Productmainproperty objects filtered by the productmainproperty_visiblename column
 * @method array findByProductmainpropertyType(string $productmainproperty_type) Return Productmainproperty objects filtered by the productmainproperty_type column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductmainpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductmainpropertyQuery object.
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
            $modelName = 'Productmainproperty';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductmainpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductmainpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductmainpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductmainpropertyQuery) {
            return $criteria;
        }
        $query = new ProductmainpropertyQuery(null, null, $modelAlias);

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
     * @return   Productmainproperty|Productmainproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductmainpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductmainpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productmainproperty A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductmainproperty($key, $con = null)
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
     * @return                 Productmainproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductmainproperty`, `idproductmain`, `productmainproperty_key`, `productmainproperty_visiblename`, `productmainproperty_type` FROM `productmainproperty` WHERE `idproductmainproperty` = :p0';
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
            $obj = new Productmainproperty();
            $obj->hydrate($row);
            ProductmainpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productmainproperty|Productmainproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productmainproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $keys, Criteria::IN);
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
     * @param     mixed $idproductmainproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductmainproperty($idproductmainproperty = null, $comparison = null)
    {
        if (is_array($idproductmainproperty)) {
            $useMinMax = false;
            if (isset($idproductmainproperty['min'])) {
                $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmainproperty['max'])) {
                $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $idproductmainproperty, $comparison);
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
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByIdproductmain($idproductmain = null, $comparison = null)
    {
        if (is_array($idproductmain)) {
            $useMinMax = false;
            if (isset($idproductmain['min'])) {
                $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAIN, $idproductmain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmain['max'])) {
                $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAIN, $idproductmain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAIN, $idproductmain, $comparison);
    }

    /**
     * Filter the query on the productmainproperty_key column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainpropertyKey('fooValue');   // WHERE productmainproperty_key = 'fooValue'
     * $query->filterByProductmainpropertyKey('%fooValue%'); // WHERE productmainproperty_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainpropertyKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByProductmainpropertyKey($productmainpropertyKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainpropertyKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainpropertyKey)) {
                $productmainpropertyKey = str_replace('*', '%', $productmainpropertyKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainpropertyPeer::PRODUCTMAINPROPERTY_KEY, $productmainpropertyKey, $comparison);
    }

    /**
     * Filter the query on the productmainproperty_visiblename column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainpropertyVisiblename('fooValue');   // WHERE productmainproperty_visiblename = 'fooValue'
     * $query->filterByProductmainpropertyVisiblename('%fooValue%'); // WHERE productmainproperty_visiblename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainpropertyVisiblename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByProductmainpropertyVisiblename($productmainpropertyVisiblename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainpropertyVisiblename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainpropertyVisiblename)) {
                $productmainpropertyVisiblename = str_replace('*', '%', $productmainpropertyVisiblename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainpropertyPeer::PRODUCTMAINPROPERTY_VISIBLENAME, $productmainpropertyVisiblename, $comparison);
    }

    /**
     * Filter the query on the productmainproperty_type column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainpropertyType('fooValue');   // WHERE productmainproperty_type = 'fooValue'
     * $query->filterByProductmainpropertyType('%fooValue%'); // WHERE productmainproperty_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainpropertyType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function filterByProductmainpropertyType($productmainpropertyType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainpropertyType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainpropertyType)) {
                $productmainpropertyType = str_replace('*', '%', $productmainpropertyType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainpropertyPeer::PRODUCTMAINPROPERTY_TYPE, $productmainpropertyType, $comparison);
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAIN, $productmain->getIdproductmain(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAIN, $productmain->toKeyValue('PrimaryKey', 'Idproductmain'), $comparison);
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
     * @return ProductmainpropertyQuery The current query, for fluid interface
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
     * Filter the query by a related Productproperty object
     *
     * @param   Productproperty|PropelObjectCollection $productproperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductproperty($productproperty, $comparison = null)
    {
        if ($productproperty instanceof Productproperty) {
            return $this
                ->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $productproperty->getIdproductmainproperty(), $comparison);
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
     * @return ProductmainpropertyQuery The current query, for fluid interface
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
     * @param   Productmainproperty $productmainproperty Object to remove from the list of results
     *
     * @return ProductmainpropertyQuery The current query, for fluid interface
     */
    public function prune($productmainproperty = null)
    {
        if ($productmainproperty) {
            $this->addUsingAlias(ProductmainpropertyPeer::IDPRODUCTMAINPROPERTY, $productmainproperty->getIdproductmainproperty(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
