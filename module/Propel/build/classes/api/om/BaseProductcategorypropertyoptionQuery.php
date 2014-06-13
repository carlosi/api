<?php


/**
 * Base class that represents a query for the 'productcategorypropertyoption' table.
 *
 *
 *
 * @method ProductcategorypropertyoptionQuery orderByIdproductcategorypropertyoption($order = Criteria::ASC) Order by the idproductcategorypropertyoption column
 * @method ProductcategorypropertyoptionQuery orderByIdproductcategoryproperty($order = Criteria::ASC) Order by the idproductcategoryproperty column
 * @method ProductcategorypropertyoptionQuery orderByProductcategorypropertyoptionName($order = Criteria::ASC) Order by the productcategorypropertyoption_name column
 *
 * @method ProductcategorypropertyoptionQuery groupByIdproductcategorypropertyoption() Group by the idproductcategorypropertyoption column
 * @method ProductcategorypropertyoptionQuery groupByIdproductcategoryproperty() Group by the idproductcategoryproperty column
 * @method ProductcategorypropertyoptionQuery groupByProductcategorypropertyoptionName() Group by the productcategorypropertyoption_name column
 *
 * @method ProductcategorypropertyoptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductcategorypropertyoptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductcategorypropertyoptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductcategorypropertyoptionQuery leftJoinProductcategoryproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategoryproperty relation
 * @method ProductcategorypropertyoptionQuery rightJoinProductcategoryproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategoryproperty relation
 * @method ProductcategorypropertyoptionQuery innerJoinProductcategoryproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategoryproperty relation
 *
 * @method Productcategorypropertyoption findOne(PropelPDO $con = null) Return the first Productcategorypropertyoption matching the query
 * @method Productcategorypropertyoption findOneOrCreate(PropelPDO $con = null) Return the first Productcategorypropertyoption matching the query, or a new Productcategorypropertyoption object populated from the query conditions when no match is found
 *
 * @method Productcategorypropertyoption findOneByIdproductcategoryproperty(int $idproductcategoryproperty) Return the first Productcategorypropertyoption filtered by the idproductcategoryproperty column
 * @method Productcategorypropertyoption findOneByProductcategorypropertyoptionName(string $productcategorypropertyoption_name) Return the first Productcategorypropertyoption filtered by the productcategorypropertyoption_name column
 *
 * @method array findByIdproductcategorypropertyoption(int $idproductcategorypropertyoption) Return Productcategorypropertyoption objects filtered by the idproductcategorypropertyoption column
 * @method array findByIdproductcategoryproperty(int $idproductcategoryproperty) Return Productcategorypropertyoption objects filtered by the idproductcategoryproperty column
 * @method array findByProductcategorypropertyoptionName(string $productcategorypropertyoption_name) Return Productcategorypropertyoption objects filtered by the productcategorypropertyoption_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductcategorypropertyoptionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductcategorypropertyoptionQuery object.
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
            $modelName = 'Productcategorypropertyoption';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductcategorypropertyoptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductcategorypropertyoptionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductcategorypropertyoptionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductcategorypropertyoptionQuery) {
            return $criteria;
        }
        $query = new ProductcategorypropertyoptionQuery(null, null, $modelAlias);

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
     * @return   Productcategorypropertyoption|Productcategorypropertyoption[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductcategorypropertyoptionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductcategorypropertyoptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productcategorypropertyoption A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductcategorypropertyoption($key, $con = null)
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
     * @return                 Productcategorypropertyoption A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductcategorypropertyoption`, `idproductcategoryproperty`, `productcategorypropertyoption_name` FROM `productcategorypropertyoption` WHERE `idproductcategorypropertyoption` = :p0';
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
            $obj = new Productcategorypropertyoption();
            $obj->hydrate($row);
            ProductcategorypropertyoptionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productcategorypropertyoption|Productcategorypropertyoption[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productcategorypropertyoption[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductcategorypropertyoption column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductcategorypropertyoption(1234); // WHERE idproductcategorypropertyoption = 1234
     * $query->filterByIdproductcategorypropertyoption(array(12, 34)); // WHERE idproductcategorypropertyoption IN (12, 34)
     * $query->filterByIdproductcategorypropertyoption(array('min' => 12)); // WHERE idproductcategorypropertyoption >= 12
     * $query->filterByIdproductcategorypropertyoption(array('max' => 12)); // WHERE idproductcategorypropertyoption <= 12
     * </code>
     *
     * @param     mixed $idproductcategorypropertyoption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function filterByIdproductcategorypropertyoption($idproductcategorypropertyoption = null, $comparison = null)
    {
        if (is_array($idproductcategorypropertyoption)) {
            $useMinMax = false;
            if (isset($idproductcategorypropertyoption['min'])) {
                $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $idproductcategorypropertyoption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategorypropertyoption['max'])) {
                $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $idproductcategorypropertyoption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $idproductcategorypropertyoption, $comparison);
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
     * @see       filterByProductcategoryproperty()
     *
     * @param     mixed $idproductcategoryproperty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function filterByIdproductcategoryproperty($idproductcategoryproperty = null, $comparison = null)
    {
        if (is_array($idproductcategoryproperty)) {
            $useMinMax = false;
            if (isset($idproductcategoryproperty['min'])) {
                $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategoryproperty['max'])) {
                $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTY, $idproductcategoryproperty, $comparison);
    }

    /**
     * Filter the query on the productcategorypropertyoption_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductcategorypropertyoptionName('fooValue');   // WHERE productcategorypropertyoption_name = 'fooValue'
     * $query->filterByProductcategorypropertyoptionName('%fooValue%'); // WHERE productcategorypropertyoption_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productcategorypropertyoptionName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function filterByProductcategorypropertyoptionName($productcategorypropertyoptionName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productcategorypropertyoptionName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productcategorypropertyoptionName)) {
                $productcategorypropertyoptionName = str_replace('*', '%', $productcategorypropertyoptionName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductcategorypropertyoptionPeer::PRODUCTCATEGORYPROPERTYOPTION_NAME, $productcategorypropertyoptionName, $comparison);
    }

    /**
     * Filter the query by a related Productcategoryproperty object
     *
     * @param   Productcategoryproperty|PropelObjectCollection $productcategoryproperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductcategorypropertyoptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategoryproperty($productcategoryproperty, $comparison = null)
    {
        if ($productcategoryproperty instanceof Productcategoryproperty) {
            return $this
                ->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTY, $productcategoryproperty->getIdproductcategoryproperty(), $comparison);
        } elseif ($productcategoryproperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTY, $productcategoryproperty->toKeyValue('PrimaryKey', 'Idproductcategoryproperty'), $comparison);
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
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Productcategorypropertyoption $productcategorypropertyoption Object to remove from the list of results
     *
     * @return ProductcategorypropertyoptionQuery The current query, for fluid interface
     */
    public function prune($productcategorypropertyoption = null)
    {
        if ($productcategorypropertyoption) {
            $this->addUsingAlias(ProductcategorypropertyoptionPeer::IDPRODUCTCATEGORYPROPERTYOPTION, $productcategorypropertyoption->getIdproductcategorypropertyoption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
