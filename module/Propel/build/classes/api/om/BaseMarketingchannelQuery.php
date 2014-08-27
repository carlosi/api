<?php


/**
 * Base class that represents a query for the 'marketingchannel' table.
 *
 *
 *
 * @method MarketingchannelQuery orderByIdmarketingchannel($order = Criteria::ASC) Order by the idmarketingchannel column
 * @method MarketingchannelQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method MarketingchannelQuery orderByMarketingchannelName($order = Criteria::ASC) Order by the marketingchannel_name column
 *
 * @method MarketingchannelQuery groupByIdmarketingchannel() Group by the idmarketingchannel column
 * @method MarketingchannelQuery groupByIdcompany() Group by the idcompany column
 * @method MarketingchannelQuery groupByMarketingchannelName() Group by the marketingchannel_name column
 *
 * @method MarketingchannelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingchannelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingchannelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingchannelQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method MarketingchannelQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method MarketingchannelQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method MarketingchannelQuery leftJoinMarketingcampaign($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcampaign relation
 * @method MarketingchannelQuery rightJoinMarketingcampaign($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcampaign relation
 * @method MarketingchannelQuery innerJoinMarketingcampaign($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcampaign relation
 *
 * @method Marketingchannel findOne(PropelPDO $con = null) Return the first Marketingchannel matching the query
 * @method Marketingchannel findOneOrCreate(PropelPDO $con = null) Return the first Marketingchannel matching the query, or a new Marketingchannel object populated from the query conditions when no match is found
 *
 * @method Marketingchannel findOneByIdcompany(int $idcompany) Return the first Marketingchannel filtered by the idcompany column
 * @method Marketingchannel findOneByMarketingchannelName(string $marketingchannel_name) Return the first Marketingchannel filtered by the marketingchannel_name column
 *
 * @method array findByIdmarketingchannel(int $idmarketingchannel) Return Marketingchannel objects filtered by the idmarketingchannel column
 * @method array findByIdcompany(int $idcompany) Return Marketingchannel objects filtered by the idcompany column
 * @method array findByMarketingchannelName(string $marketingchannel_name) Return Marketingchannel objects filtered by the marketingchannel_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingchannelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingchannelQuery object.
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
            $modelName = 'Marketingchannel';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingchannelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingchannelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingchannelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingchannelQuery) {
            return $criteria;
        }
        $query = new MarketingchannelQuery(null, null, $modelAlias);

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
     * @return   Marketingchannel|Marketingchannel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingchannelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingchannelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingchannel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingchannel($key, $con = null)
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
     * @return                 Marketingchannel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingchannel`, `idcompany`, `marketingchannel_name` FROM `marketingchannel` WHERE `idmarketingchannel` = :p0';
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
            $obj = new Marketingchannel();
            $obj->hydrate($row);
            MarketingchannelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingchannel|Marketingchannel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingchannel[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $keys, Criteria::IN);
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
     * @param     mixed $idmarketingchannel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function filterByIdmarketingchannel($idmarketingchannel = null, $comparison = null)
    {
        if (is_array($idmarketingchannel)) {
            $useMinMax = false;
            if (isset($idmarketingchannel['min'])) {
                $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $idmarketingchannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingchannel['max'])) {
                $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $idmarketingchannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $idmarketingchannel, $comparison);
    }

    /**
     * Filter the query on the idcompany column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompany(1234); // WHERE idcompany = 1234
     * $query->filterByIdcompany(array(12, 34)); // WHERE idcompany IN (12, 34)
     * $query->filterByIdcompany(array('min' => 12)); // WHERE idcompany >= 12
     * $query->filterByIdcompany(array('max' => 12)); // WHERE idcompany <= 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(MarketingchannelPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(MarketingchannelPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingchannelPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the marketingchannel_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingchannelName('fooValue');   // WHERE marketingchannel_name = 'fooValue'
     * $query->filterByMarketingchannelName('%fooValue%'); // WHERE marketingchannel_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketingchannelName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function filterByMarketingchannelName($marketingchannelName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketingchannelName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketingchannelName)) {
                $marketingchannelName = str_replace('*', '%', $marketingchannelName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketingchannelPeer::MARKETINGCHANNEL_NAME, $marketingchannelName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingchannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(MarketingchannelPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingchannelPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type Company or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

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
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
    }

    /**
     * Filter the query by a related Marketingcampaign object
     *
     * @param   Marketingcampaign|PropelObjectCollection $marketingcampaign  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingchannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcampaign($marketingcampaign, $comparison = null)
    {
        if ($marketingcampaign instanceof Marketingcampaign) {
            return $this
                ->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $marketingcampaign->getIdmarketingchannel(), $comparison);
        } elseif ($marketingcampaign instanceof PropelObjectCollection) {
            return $this
                ->useMarketingcampaignQuery()
                ->filterByPrimaryKeys($marketingcampaign->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingcampaign() only accepts arguments of type Marketingcampaign or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingcampaign relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function joinMarketingcampaign($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingcampaign');

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
            $this->addJoinObject($join, 'Marketingcampaign');
        }

        return $this;
    }

    /**
     * Use the Marketingcampaign relation Marketingcampaign object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingcampaignQuery A secondary query class using the current class as primary query
     */
    public function useMarketingcampaignQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingcampaign($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingcampaign', 'MarketingcampaignQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Marketingchannel $marketingchannel Object to remove from the list of results
     *
     * @return MarketingchannelQuery The current query, for fluid interface
     */
    public function prune($marketingchannel = null)
    {
        if ($marketingchannel) {
            $this->addUsingAlias(MarketingchannelPeer::IDMARKETINGCHANNEL, $marketingchannel->getIdmarketingchannel(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
