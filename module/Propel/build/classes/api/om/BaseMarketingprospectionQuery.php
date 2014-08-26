<?php


/**
 * Base class that represents a query for the 'marketingprospection' table.
 *
 *
 *
 * @method MarketingprospectionQuery orderByIdmarketingprospection($order = Criteria::ASC) Order by the idmarketingprospection column
 * @method MarketingprospectionQuery orderByIdmarketingcampaignclient($order = Criteria::ASC) Order by the idmarketingcampaignclient column
 * @method MarketingprospectionQuery orderByMarketingprospectionSaleexpectation($order = Criteria::ASC) Order by the marketingprospection_saleexpectation column
 * @method MarketingprospectionQuery orderByMarketingprospectionLevelexpectation($order = Criteria::ASC) Order by the marketingprospection_levelexpectation column
 * @method MarketingprospectionQuery orderByMarketingprospectionStartdate($order = Criteria::ASC) Order by the marketingprospection_startdate column
 *
 * @method MarketingprospectionQuery groupByIdmarketingprospection() Group by the idmarketingprospection column
 * @method MarketingprospectionQuery groupByIdmarketingcampaignclient() Group by the idmarketingcampaignclient column
 * @method MarketingprospectionQuery groupByMarketingprospectionSaleexpectation() Group by the marketingprospection_saleexpectation column
 * @method MarketingprospectionQuery groupByMarketingprospectionLevelexpectation() Group by the marketingprospection_levelexpectation column
 * @method MarketingprospectionQuery groupByMarketingprospectionStartdate() Group by the marketingprospection_startdate column
 *
 * @method MarketingprospectionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingprospectionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingprospectionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingprospectionQuery leftJoinMarketingcampaignclient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcampaignclient relation
 * @method MarketingprospectionQuery rightJoinMarketingcampaignclient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcampaignclient relation
 * @method MarketingprospectionQuery innerJoinMarketingcampaignclient($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcampaignclient relation
 *
 * @method MarketingprospectionQuery leftJoinMarketingprospectionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectionQuery rightJoinMarketingprospectionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectionQuery innerJoinMarketingprospectionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospectionuser relation
 *
 * @method Marketingprospection findOne(PropelPDO $con = null) Return the first Marketingprospection matching the query
 * @method Marketingprospection findOneOrCreate(PropelPDO $con = null) Return the first Marketingprospection matching the query, or a new Marketingprospection object populated from the query conditions when no match is found
 *
 * @method Marketingprospection findOneByIdmarketingcampaignclient(int $idmarketingcampaignclient) Return the first Marketingprospection filtered by the idmarketingcampaignclient column
 * @method Marketingprospection findOneByMarketingprospectionSaleexpectation(string $marketingprospection_saleexpectation) Return the first Marketingprospection filtered by the marketingprospection_saleexpectation column
 * @method Marketingprospection findOneByMarketingprospectionLevelexpectation(int $marketingprospection_levelexpectation) Return the first Marketingprospection filtered by the marketingprospection_levelexpectation column
 * @method Marketingprospection findOneByMarketingprospectionStartdate(string $marketingprospection_startdate) Return the first Marketingprospection filtered by the marketingprospection_startdate column
 *
 * @method array findByIdmarketingprospection(int $idmarketingprospection) Return Marketingprospection objects filtered by the idmarketingprospection column
 * @method array findByIdmarketingcampaignclient(int $idmarketingcampaignclient) Return Marketingprospection objects filtered by the idmarketingcampaignclient column
 * @method array findByMarketingprospectionSaleexpectation(string $marketingprospection_saleexpectation) Return Marketingprospection objects filtered by the marketingprospection_saleexpectation column
 * @method array findByMarketingprospectionLevelexpectation(int $marketingprospection_levelexpectation) Return Marketingprospection objects filtered by the marketingprospection_levelexpectation column
 * @method array findByMarketingprospectionStartdate(string $marketingprospection_startdate) Return Marketingprospection objects filtered by the marketingprospection_startdate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingprospectionQuery object.
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
            $modelName = 'Marketingprospection';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingprospectionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingprospectionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingprospectionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingprospectionQuery) {
            return $criteria;
        }
        $query = new MarketingprospectionQuery(null, null, $modelAlias);

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
     * @return   Marketingprospection|Marketingprospection[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingprospectionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingprospectionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingprospection A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingprospection($key, $con = null)
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
     * @return                 Marketingprospection A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingprospection`, `idmarketingcampaignclient`, `marketingprospection_saleexpectation`, `marketingprospection_levelexpectation`, `marketingprospection_startdate` FROM `marketingprospection` WHERE `idmarketingprospection` = :p0';
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
            $obj = new Marketingprospection();
            $obj->hydrate($row);
            MarketingprospectionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingprospection|Marketingprospection[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingprospection[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketingprospection column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingprospection(1234); // WHERE idmarketingprospection = 1234
     * $query->filterByIdmarketingprospection(array(12, 34)); // WHERE idmarketingprospection IN (12, 34)
     * $query->filterByIdmarketingprospection(array('min' => 12)); // WHERE idmarketingprospection >= 12
     * $query->filterByIdmarketingprospection(array('max' => 12)); // WHERE idmarketingprospection <= 12
     * </code>
     *
     * @param     mixed $idmarketingprospection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospection($idmarketingprospection = null, $comparison = null)
    {
        if (is_array($idmarketingprospection)) {
            $useMinMax = false;
            if (isset($idmarketingprospection['min'])) {
                $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $idmarketingprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospection['max'])) {
                $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $idmarketingprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $idmarketingprospection, $comparison);
    }

    /**
     * Filter the query on the idmarketingcampaignclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingcampaignclient(1234); // WHERE idmarketingcampaignclient = 1234
     * $query->filterByIdmarketingcampaignclient(array(12, 34)); // WHERE idmarketingcampaignclient IN (12, 34)
     * $query->filterByIdmarketingcampaignclient(array('min' => 12)); // WHERE idmarketingcampaignclient >= 12
     * $query->filterByIdmarketingcampaignclient(array('max' => 12)); // WHERE idmarketingcampaignclient <= 12
     * </code>
     *
     * @see       filterByMarketingcampaignclient()
     *
     * @param     mixed $idmarketingcampaignclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByIdmarketingcampaignclient($idmarketingcampaignclient = null, $comparison = null)
    {
        if (is_array($idmarketingcampaignclient)) {
            $useMinMax = false;
            if (isset($idmarketingcampaignclient['min'])) {
                $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingcampaignclient['max'])) {
                $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient, $comparison);
    }

    /**
     * Filter the query on the marketingprospection_saleexpectation column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectionSaleexpectation(1234); // WHERE marketingprospection_saleexpectation = 1234
     * $query->filterByMarketingprospectionSaleexpectation(array(12, 34)); // WHERE marketingprospection_saleexpectation IN (12, 34)
     * $query->filterByMarketingprospectionSaleexpectation(array('min' => 12)); // WHERE marketingprospection_saleexpectation >= 12
     * $query->filterByMarketingprospectionSaleexpectation(array('max' => 12)); // WHERE marketingprospection_saleexpectation <= 12
     * </code>
     *
     * @param     mixed $marketingprospectionSaleexpectation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectionSaleexpectation($marketingprospectionSaleexpectation = null, $comparison = null)
    {
        if (is_array($marketingprospectionSaleexpectation)) {
            $useMinMax = false;
            if (isset($marketingprospectionSaleexpectation['min'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_SALEEXPECTATION, $marketingprospectionSaleexpectation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingprospectionSaleexpectation['max'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_SALEEXPECTATION, $marketingprospectionSaleexpectation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_SALEEXPECTATION, $marketingprospectionSaleexpectation, $comparison);
    }

    /**
     * Filter the query on the marketingprospection_levelexpectation column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectionLevelexpectation(1234); // WHERE marketingprospection_levelexpectation = 1234
     * $query->filterByMarketingprospectionLevelexpectation(array(12, 34)); // WHERE marketingprospection_levelexpectation IN (12, 34)
     * $query->filterByMarketingprospectionLevelexpectation(array('min' => 12)); // WHERE marketingprospection_levelexpectation >= 12
     * $query->filterByMarketingprospectionLevelexpectation(array('max' => 12)); // WHERE marketingprospection_levelexpectation <= 12
     * </code>
     *
     * @param     mixed $marketingprospectionLevelexpectation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectionLevelexpectation($marketingprospectionLevelexpectation = null, $comparison = null)
    {
        if (is_array($marketingprospectionLevelexpectation)) {
            $useMinMax = false;
            if (isset($marketingprospectionLevelexpectation['min'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_LEVELEXPECTATION, $marketingprospectionLevelexpectation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingprospectionLevelexpectation['max'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_LEVELEXPECTATION, $marketingprospectionLevelexpectation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_LEVELEXPECTATION, $marketingprospectionLevelexpectation, $comparison);
    }

    /**
     * Filter the query on the marketingprospection_startdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectionStartdate('2011-03-14'); // WHERE marketingprospection_startdate = '2011-03-14'
     * $query->filterByMarketingprospectionStartdate('now'); // WHERE marketingprospection_startdate = '2011-03-14'
     * $query->filterByMarketingprospectionStartdate(array('max' => 'yesterday')); // WHERE marketingprospection_startdate < '2011-03-13'
     * </code>
     *
     * @param     mixed $marketingprospectionStartdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectionStartdate($marketingprospectionStartdate = null, $comparison = null)
    {
        if (is_array($marketingprospectionStartdate)) {
            $useMinMax = false;
            if (isset($marketingprospectionStartdate['min'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_STARTDATE, $marketingprospectionStartdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingprospectionStartdate['max'])) {
                $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_STARTDATE, $marketingprospectionStartdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionPeer::MARKETINGPROSPECTION_STARTDATE, $marketingprospectionStartdate, $comparison);
    }

    /**
     * Filter the query by a related Marketingcampaignclient object
     *
     * @param   Marketingcampaignclient|PropelObjectCollection $marketingcampaignclient The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcampaignclient($marketingcampaignclient, $comparison = null)
    {
        if ($marketingcampaignclient instanceof Marketingcampaignclient) {
            return $this
                ->addUsingAlias(MarketingprospectionPeer::IDMARKETINGCAMPAIGNCLIENT, $marketingcampaignclient->getIdmarketingcampaignclient(), $comparison);
        } elseif ($marketingcampaignclient instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingprospectionPeer::IDMARKETINGCAMPAIGNCLIENT, $marketingcampaignclient->toKeyValue('PrimaryKey', 'Idmarketingcampaignclient'), $comparison);
        } else {
            throw new PropelException('filterByMarketingcampaignclient() only accepts arguments of type Marketingcampaignclient or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingcampaignclient relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function joinMarketingcampaignclient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingcampaignclient');

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
            $this->addJoinObject($join, 'Marketingcampaignclient');
        }

        return $this;
    }

    /**
     * Use the Marketingcampaignclient relation Marketingcampaignclient object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingcampaignclientQuery A secondary query class using the current class as primary query
     */
    public function useMarketingcampaignclientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingcampaignclient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingcampaignclient', 'MarketingcampaignclientQuery');
    }

    /**
     * Filter the query by a related Marketingprospectionuser object
     *
     * @param   Marketingprospectionuser|PropelObjectCollection $marketingprospectionuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospectionuser($marketingprospectionuser, $comparison = null)
    {
        if ($marketingprospectionuser instanceof Marketingprospectionuser) {
            return $this
                ->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $marketingprospectionuser->getIdmarketingprospection(), $comparison);
        } elseif ($marketingprospectionuser instanceof PropelObjectCollection) {
            return $this
                ->useMarketingprospectionuserQuery()
                ->filterByPrimaryKeys($marketingprospectionuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingprospectionuser() only accepts arguments of type Marketingprospectionuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingprospectionuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function joinMarketingprospectionuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingprospectionuser');

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
            $this->addJoinObject($join, 'Marketingprospectionuser');
        }

        return $this;
    }

    /**
     * Use the Marketingprospectionuser relation Marketingprospectionuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingprospectionuserQuery A secondary query class using the current class as primary query
     */
    public function useMarketingprospectionuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingprospectionuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingprospectionuser', 'MarketingprospectionuserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Marketingprospection $marketingprospection Object to remove from the list of results
     *
     * @return MarketingprospectionQuery The current query, for fluid interface
     */
    public function prune($marketingprospection = null)
    {
        if ($marketingprospection) {
            $this->addUsingAlias(MarketingprospectionPeer::IDMARKETINGPROSPECTION, $marketingprospection->getIdmarketingprospection(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
