<?php


/**
 * Base class that represents a query for the 'marketingcampaign' table.
 *
 *
 *
 * @method MarketingcampaignQuery orderByIdmarketingcampaign($order = Criteria::ASC) Order by the idmarketingcampaign column
 * @method MarketingcampaignQuery orderByIdmarketingchannel($order = Criteria::ASC) Order by the idmarketingchannel column
 * @method MarketingcampaignQuery orderByMarketingcampaignName($order = Criteria::ASC) Order by the marketingcampaign_name column
 * @method MarketingcampaignQuery orderByMarketingcampaignCreatedAt($order = Criteria::ASC) Order by the marketingcampaign_created_at column
 *
 * @method MarketingcampaignQuery groupByIdmarketingcampaign() Group by the idmarketingcampaign column
 * @method MarketingcampaignQuery groupByIdmarketingchannel() Group by the idmarketingchannel column
 * @method MarketingcampaignQuery groupByMarketingcampaignName() Group by the marketingcampaign_name column
 * @method MarketingcampaignQuery groupByMarketingcampaignCreatedAt() Group by the marketingcampaign_created_at column
 *
 * @method MarketingcampaignQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingcampaignQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingcampaignQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingcampaignQuery leftJoinMarketingchannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingchannel relation
 * @method MarketingcampaignQuery rightJoinMarketingchannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingchannel relation
 * @method MarketingcampaignQuery innerJoinMarketingchannel($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingchannel relation
 *
 * @method MarketingcampaignQuery leftJoinMarketingcampaignclient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcampaignclient relation
 * @method MarketingcampaignQuery rightJoinMarketingcampaignclient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcampaignclient relation
 * @method MarketingcampaignQuery innerJoinMarketingcampaignclient($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcampaignclient relation
 *
 * @method Marketingcampaign findOne(PropelPDO $con = null) Return the first Marketingcampaign matching the query
 * @method Marketingcampaign findOneOrCreate(PropelPDO $con = null) Return the first Marketingcampaign matching the query, or a new Marketingcampaign object populated from the query conditions when no match is found
 *
 * @method Marketingcampaign findOneByIdmarketingchannel(int $idmarketingchannel) Return the first Marketingcampaign filtered by the idmarketingchannel column
 * @method Marketingcampaign findOneByMarketingcampaignName(string $marketingcampaign_name) Return the first Marketingcampaign filtered by the marketingcampaign_name column
 * @method Marketingcampaign findOneByMarketingcampaignCreatedAt(string $marketingcampaign_created_at) Return the first Marketingcampaign filtered by the marketingcampaign_created_at column
 *
 * @method array findByIdmarketingcampaign(int $idmarketingcampaign) Return Marketingcampaign objects filtered by the idmarketingcampaign column
 * @method array findByIdmarketingchannel(int $idmarketingchannel) Return Marketingcampaign objects filtered by the idmarketingchannel column
 * @method array findByMarketingcampaignName(string $marketingcampaign_name) Return Marketingcampaign objects filtered by the marketingcampaign_name column
 * @method array findByMarketingcampaignCreatedAt(string $marketingcampaign_created_at) Return Marketingcampaign objects filtered by the marketingcampaign_created_at column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingcampaignQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingcampaignQuery object.
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
            $modelName = 'Marketingcampaign';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingcampaignQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingcampaignQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingcampaignQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingcampaignQuery) {
            return $criteria;
        }
        $query = new MarketingcampaignQuery(null, null, $modelAlias);

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
     * @return   Marketingcampaign|Marketingcampaign[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingcampaignPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingcampaignPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingcampaign A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingcampaign($key, $con = null)
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
     * @return                 Marketingcampaign A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingcampaign`, `idmarketingchannel`, `marketingcampaign_name`, `marketingcampaign_created_at` FROM `marketingcampaign` WHERE `idmarketingcampaign` = :p0';
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
            $obj = new Marketingcampaign();
            $obj->hydrate($row);
            MarketingcampaignPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingcampaign|Marketingcampaign[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingcampaign[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketingcampaign column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingcampaign(1234); // WHERE idmarketingcampaign = 1234
     * $query->filterByIdmarketingcampaign(array(12, 34)); // WHERE idmarketingcampaign IN (12, 34)
     * $query->filterByIdmarketingcampaign(array('min' => 12)); // WHERE idmarketingcampaign >= 12
     * $query->filterByIdmarketingcampaign(array('max' => 12)); // WHERE idmarketingcampaign <= 12
     * </code>
     *
     * @param     mixed $idmarketingcampaign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByIdmarketingcampaign($idmarketingcampaign = null, $comparison = null)
    {
        if (is_array($idmarketingcampaign)) {
            $useMinMax = false;
            if (isset($idmarketingcampaign['min'])) {
                $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingcampaign['max'])) {
                $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign, $comparison);
    }

    /**
     * Filter the query on the idmarketingchannel column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingchannel(1234); // WHERE idmarketingchannel = 1234
     * $query->filterByIdmarketingchannel(array(12, 34)); // WHERE idmarketingchannel IN (12, 34)
     * $query->filterByIdmarketingchannel(array('min' => 12)); // WHERE idmarketingchannel >= 12
     * $query->filterByIdmarketingchannel(array('max' => 12)); // WHERE idmarketingchannel <= 12
     * </code>
     *
     * @see       filterByMarketingchannel()
     *
     * @param     mixed $idmarketingchannel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByIdmarketingchannel($idmarketingchannel = null, $comparison = null)
    {
        if (is_array($idmarketingchannel)) {
            $useMinMax = false;
            if (isset($idmarketingchannel['min'])) {
                $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCHANNEL, $idmarketingchannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingchannel['max'])) {
                $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCHANNEL, $idmarketingchannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCHANNEL, $idmarketingchannel, $comparison);
    }

    /**
     * Filter the query on the marketingcampaign_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingcampaignName('fooValue');   // WHERE marketingcampaign_name = 'fooValue'
     * $query->filterByMarketingcampaignName('%fooValue%'); // WHERE marketingcampaign_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketingcampaignName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByMarketingcampaignName($marketingcampaignName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketingcampaignName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketingcampaignName)) {
                $marketingcampaignName = str_replace('*', '%', $marketingcampaignName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketingcampaignPeer::MARKETINGCAMPAIGN_NAME, $marketingcampaignName, $comparison);
    }

    /**
     * Filter the query on the marketingcampaign_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingcampaignCreatedAt('2011-03-14'); // WHERE marketingcampaign_created_at = '2011-03-14'
     * $query->filterByMarketingcampaignCreatedAt('now'); // WHERE marketingcampaign_created_at = '2011-03-14'
     * $query->filterByMarketingcampaignCreatedAt(array('max' => 'yesterday')); // WHERE marketingcampaign_created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $marketingcampaignCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function filterByMarketingcampaignCreatedAt($marketingcampaignCreatedAt = null, $comparison = null)
    {
        if (is_array($marketingcampaignCreatedAt)) {
            $useMinMax = false;
            if (isset($marketingcampaignCreatedAt['min'])) {
                $this->addUsingAlias(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT, $marketingcampaignCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingcampaignCreatedAt['max'])) {
                $this->addUsingAlias(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT, $marketingcampaignCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT, $marketingcampaignCreatedAt, $comparison);
    }

    /**
     * Filter the query by a related Marketingchannel object
     *
     * @param   Marketingchannel|PropelObjectCollection $marketingchannel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcampaignQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingchannel($marketingchannel, $comparison = null)
    {
        if ($marketingchannel instanceof Marketingchannel) {
            return $this
                ->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCHANNEL, $marketingchannel->getIdmarketingchannel(), $comparison);
        } elseif ($marketingchannel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCHANNEL, $marketingchannel->toKeyValue('PrimaryKey', 'Idmarketingchannel'), $comparison);
        } else {
            throw new PropelException('filterByMarketingchannel() only accepts arguments of type Marketingchannel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingchannel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function joinMarketingchannel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingchannel');

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
            $this->addJoinObject($join, 'Marketingchannel');
        }

        return $this;
    }

    /**
     * Use the Marketingchannel relation Marketingchannel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingchannelQuery A secondary query class using the current class as primary query
     */
    public function useMarketingchannelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingchannel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingchannel', 'MarketingchannelQuery');
    }

    /**
     * Filter the query by a related Marketingcampaignclient object
     *
     * @param   Marketingcampaignclient|PropelObjectCollection $marketingcampaignclient  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcampaignQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcampaignclient($marketingcampaignclient, $comparison = null)
    {
        if ($marketingcampaignclient instanceof Marketingcampaignclient) {
            return $this
                ->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $marketingcampaignclient->getIdmarketingcampaign(), $comparison);
        } elseif ($marketingcampaignclient instanceof PropelObjectCollection) {
            return $this
                ->useMarketingcampaignclientQuery()
                ->filterByPrimaryKeys($marketingcampaignclient->getPrimaryKeys())
                ->endUse();
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
     * @return MarketingcampaignQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Marketingcampaign $marketingcampaign Object to remove from the list of results
     *
     * @return MarketingcampaignQuery The current query, for fluid interface
     */
    public function prune($marketingcampaign = null)
    {
        if ($marketingcampaign) {
            $this->addUsingAlias(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $marketingcampaign->getIdmarketingcampaign(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
