<?php


/**
 * Base class that represents a query for the 'productmainphoto' table.
 *
 *
 *
 * @method ProductmainphotoQuery orderByIdproductmainphoto($order = Criteria::ASC) Order by the idproductmainphoto column
 * @method ProductmainphotoQuery orderByIdproductmain($order = Criteria::ASC) Order by the idproductmain column
 * @method ProductmainphotoQuery orderByProductmainphotoUrl($order = Criteria::ASC) Order by the productmainphoto_url column
 * @method ProductmainphotoQuery orderByProductmainphotoWidth($order = Criteria::ASC) Order by the productmainphoto_width column
 * @method ProductmainphotoQuery orderByProductmainphotoHeight($order = Criteria::ASC) Order by the productmainphoto_height column
 * @method ProductmainphotoQuery orderByProductmainphotoStatus($order = Criteria::ASC) Order by the productmainphoto_status column
 * @method ProductmainphotoQuery orderByProductmainphotoType($order = Criteria::ASC) Order by the productmainphoto_type column
 *
 * @method ProductmainphotoQuery groupByIdproductmainphoto() Group by the idproductmainphoto column
 * @method ProductmainphotoQuery groupByIdproductmain() Group by the idproductmain column
 * @method ProductmainphotoQuery groupByProductmainphotoUrl() Group by the productmainphoto_url column
 * @method ProductmainphotoQuery groupByProductmainphotoWidth() Group by the productmainphoto_width column
 * @method ProductmainphotoQuery groupByProductmainphotoHeight() Group by the productmainphoto_height column
 * @method ProductmainphotoQuery groupByProductmainphotoStatus() Group by the productmainphoto_status column
 * @method ProductmainphotoQuery groupByProductmainphotoType() Group by the productmainphoto_type column
 *
 * @method ProductmainphotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductmainphotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductmainphotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductmainphotoQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method ProductmainphotoQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method ProductmainphotoQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method Productmainphoto findOne(PropelPDO $con = null) Return the first Productmainphoto matching the query
 * @method Productmainphoto findOneOrCreate(PropelPDO $con = null) Return the first Productmainphoto matching the query, or a new Productmainphoto object populated from the query conditions when no match is found
 *
 * @method Productmainphoto findOneByIdproductmain(int $idproductmain) Return the first Productmainphoto filtered by the idproductmain column
 * @method Productmainphoto findOneByProductmainphotoUrl(string $productmainphoto_url) Return the first Productmainphoto filtered by the productmainphoto_url column
 * @method Productmainphoto findOneByProductmainphotoWidth(string $productmainphoto_width) Return the first Productmainphoto filtered by the productmainphoto_width column
 * @method Productmainphoto findOneByProductmainphotoHeight(string $productmainphoto_height) Return the first Productmainphoto filtered by the productmainphoto_height column
 * @method Productmainphoto findOneByProductmainphotoStatus(string $productmainphoto_status) Return the first Productmainphoto filtered by the productmainphoto_status column
 * @method Productmainphoto findOneByProductmainphotoType(string $productmainphoto_type) Return the first Productmainphoto filtered by the productmainphoto_type column
 *
 * @method array findByIdproductmainphoto(int $idproductmainphoto) Return Productmainphoto objects filtered by the idproductmainphoto column
 * @method array findByIdproductmain(int $idproductmain) Return Productmainphoto objects filtered by the idproductmain column
 * @method array findByProductmainphotoUrl(string $productmainphoto_url) Return Productmainphoto objects filtered by the productmainphoto_url column
 * @method array findByProductmainphotoWidth(string $productmainphoto_width) Return Productmainphoto objects filtered by the productmainphoto_width column
 * @method array findByProductmainphotoHeight(string $productmainphoto_height) Return Productmainphoto objects filtered by the productmainphoto_height column
 * @method array findByProductmainphotoStatus(string $productmainphoto_status) Return Productmainphoto objects filtered by the productmainphoto_status column
 * @method array findByProductmainphotoType(string $productmainphoto_type) Return Productmainphoto objects filtered by the productmainphoto_type column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductmainphotoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductmainphotoQuery object.
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
            $modelName = 'Productmainphoto';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductmainphotoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductmainphotoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductmainphotoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductmainphotoQuery) {
            return $criteria;
        }
        $query = new ProductmainphotoQuery(null, null, $modelAlias);

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
     * @return   Productmainphoto|Productmainphoto[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductmainphotoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductmainphotoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productmainphoto A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductmainphoto($key, $con = null)
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
     * @return                 Productmainphoto A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductmainphoto`, `idproductmain`, `productmainphoto_url`, `productmainphoto_width`, `productmainphoto_height`, `productmainphoto_status`, `productmainphoto_type` FROM `productmainphoto` WHERE `idproductmainphoto` = :p0';
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
            $obj = new Productmainphoto();
            $obj->hydrate($row);
            ProductmainphotoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productmainphoto|Productmainphoto[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productmainphoto[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductmainphoto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductmainphoto(1234); // WHERE idproductmainphoto = 1234
     * $query->filterByIdproductmainphoto(array(12, 34)); // WHERE idproductmainphoto IN (12, 34)
     * $query->filterByIdproductmainphoto(array('min' => 12)); // WHERE idproductmainphoto >= 12
     * $query->filterByIdproductmainphoto(array('max' => 12)); // WHERE idproductmainphoto <= 12
     * </code>
     *
     * @param     mixed $idproductmainphoto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByIdproductmainphoto($idproductmainphoto = null, $comparison = null)
    {
        if (is_array($idproductmainphoto)) {
            $useMinMax = false;
            if (isset($idproductmainphoto['min'])) {
                $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $idproductmainphoto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmainphoto['max'])) {
                $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $idproductmainphoto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $idproductmainphoto, $comparison);
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
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByIdproductmain($idproductmain = null, $comparison = null)
    {
        if (is_array($idproductmain)) {
            $useMinMax = false;
            if (isset($idproductmain['min'])) {
                $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAIN, $idproductmain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmain['max'])) {
                $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAIN, $idproductmain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAIN, $idproductmain, $comparison);
    }

    /**
     * Filter the query on the productmainphoto_url column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainphotoUrl('fooValue');   // WHERE productmainphoto_url = 'fooValue'
     * $query->filterByProductmainphotoUrl('%fooValue%'); // WHERE productmainphoto_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainphotoUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByProductmainphotoUrl($productmainphotoUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainphotoUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainphotoUrl)) {
                $productmainphotoUrl = str_replace('*', '%', $productmainphotoUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::PRODUCTMAINPHOTO_URL, $productmainphotoUrl, $comparison);
    }

    /**
     * Filter the query on the productmainphoto_width column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainphotoWidth('fooValue');   // WHERE productmainphoto_width = 'fooValue'
     * $query->filterByProductmainphotoWidth('%fooValue%'); // WHERE productmainphoto_width LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainphotoWidth The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByProductmainphotoWidth($productmainphotoWidth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainphotoWidth)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainphotoWidth)) {
                $productmainphotoWidth = str_replace('*', '%', $productmainphotoWidth);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::PRODUCTMAINPHOTO_WIDTH, $productmainphotoWidth, $comparison);
    }

    /**
     * Filter the query on the productmainphoto_height column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainphotoHeight('fooValue');   // WHERE productmainphoto_height = 'fooValue'
     * $query->filterByProductmainphotoHeight('%fooValue%'); // WHERE productmainphoto_height LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainphotoHeight The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByProductmainphotoHeight($productmainphotoHeight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainphotoHeight)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainphotoHeight)) {
                $productmainphotoHeight = str_replace('*', '%', $productmainphotoHeight);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::PRODUCTMAINPHOTO_HEIGHT, $productmainphotoHeight, $comparison);
    }

    /**
     * Filter the query on the productmainphoto_status column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainphotoStatus('fooValue');   // WHERE productmainphoto_status = 'fooValue'
     * $query->filterByProductmainphotoStatus('%fooValue%'); // WHERE productmainphoto_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainphotoStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByProductmainphotoStatus($productmainphotoStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainphotoStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainphotoStatus)) {
                $productmainphotoStatus = str_replace('*', '%', $productmainphotoStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::PRODUCTMAINPHOTO_STATUS, $productmainphotoStatus, $comparison);
    }

    /**
     * Filter the query on the productmainphoto_type column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainphotoType('fooValue');   // WHERE productmainphoto_type = 'fooValue'
     * $query->filterByProductmainphotoType('%fooValue%'); // WHERE productmainphoto_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainphotoType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function filterByProductmainphotoType($productmainphotoType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainphotoType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainphotoType)) {
                $productmainphotoType = str_replace('*', '%', $productmainphotoType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainphotoPeer::PRODUCTMAINPHOTO_TYPE, $productmainphotoType, $comparison);
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainphotoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAIN, $productmain->getIdproductmain(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAIN, $productmain->toKeyValue('PrimaryKey', 'Idproductmain'), $comparison);
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
     * @return ProductmainphotoQuery The current query, for fluid interface
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
     * @param   Productmainphoto $productmainphoto Object to remove from the list of results
     *
     * @return ProductmainphotoQuery The current query, for fluid interface
     */
    public function prune($productmainphoto = null)
    {
        if ($productmainphoto) {
            $this->addUsingAlias(ProductmainphotoPeer::IDPRODUCTMAINPHOTO, $productmainphoto->getIdproductmainphoto(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
