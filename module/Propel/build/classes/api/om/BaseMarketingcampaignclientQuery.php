<?php


/**
 * Base class that represents a query for the 'marketingcampaignclient' table.
 *
 *
 *
 * @method MarketingcampaignclientQuery orderByIdmarketingcampaignclient($order = Criteria::ASC) Order by the idmarketingcampaignclient column
 * @method MarketingcampaignclientQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method MarketingcampaignclientQuery orderByIdmarketingcampaign($order = Criteria::ASC) Order by the idmarketingcampaign column
 *
 * @method MarketingcampaignclientQuery groupByIdmarketingcampaignclient() Group by the idmarketingcampaignclient column
 * @method MarketingcampaignclientQuery groupByIdclient() Group by the idclient column
 * @method MarketingcampaignclientQuery groupByIdmarketingcampaign() Group by the idmarketingcampaign column
 *
 * @method MarketingcampaignclientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingcampaignclientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingcampaignclientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingcampaignclientQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method MarketingcampaignclientQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method MarketingcampaignclientQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method MarketingcampaignclientQuery leftJoinMarketingcampaign($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcampaign relation
 * @method MarketingcampaignclientQuery rightJoinMarketingcampaign($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcampaign relation
 * @method MarketingcampaignclientQuery innerJoinMarketingcampaign($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcampaign relation
 *
 * @method Marketingcampaignclient findOne(PropelPDO $con = null) Return the first Marketingcampaignclient matching the query
 * @method Marketingcampaignclient findOneOrCreate(PropelPDO $con = null) Return the first Marketingcampaignclient matching the query, or a new Marketingcampaignclient object populated from the query conditions when no match is found
 *
 * @method Marketingcampaignclient findOneByIdclient(int $idclient) Return the first Marketingcampaignclient filtered by the idclient column
 * @method Marketingcampaignclient findOneByIdmarketingcampaign(int $idmarketingcampaign) Return the first Marketingcampaignclient filtered by the idmarketingcampaign column
 *
 * @method array findByIdmarketingcampaignclient(int $idmarketingcampaignclient) Return Marketingcampaignclient objects filtered by the idmarketingcampaignclient column
 * @method array findByIdclient(int $idclient) Return Marketingcampaignclient objects filtered by the idclient column
 * @method array findByIdmarketingcampaign(int $idmarketingcampaign) Return Marketingcampaignclient objects filtered by the idmarketingcampaign column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingcampaignclientQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingcampaignclientQuery object.
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
            $modelName = 'Marketingcampaignclient';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingcampaignclientQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingcampaignclientQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingcampaignclientQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingcampaignclientQuery) {
            return $criteria;
        }
        $query = new MarketingcampaignclientQuery(null, null, $modelAlias);

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
     * @return   Marketingcampaignclient|Marketingcampaignclient[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingcampaignclientPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingcampaignclientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingcampaignclient A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingcampaignclient($key, $con = null)
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
     * @return                 Marketingcampaignclient A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingcampaignclient`, `idclient`, `idmarketingcampaign` FROM `marketingcampaignclient` WHERE `idmarketingcampaignclient` = :p0';
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
            $obj = new Marketingcampaignclient();
            $obj->hydrate($row);
            MarketingcampaignclientPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingcampaignclient|Marketingcampaignclient[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingcampaignclient[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $keys, Criteria::IN);
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
     * @param     mixed $idmarketingcampaignclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function filterByIdmarketingcampaignclient($idmarketingcampaignclient = null, $comparison = null)
    {
        if (is_array($idmarketingcampaignclient)) {
            $useMinMax = false;
            if (isset($idmarketingcampaignclient['min'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingcampaignclient['max'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $idmarketingcampaignclient, $comparison);
    }

    /**
     * Filter the query on the idclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclient(1234); // WHERE idclient = 1234
     * $query->filterByIdclient(array(12, 34)); // WHERE idclient IN (12, 34)
     * $query->filterByIdclient(array('min' => 12)); // WHERE idclient >= 12
     * $query->filterByIdclient(array('max' => 12)); // WHERE idclient <= 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignclientPeer::IDCLIENT, $idclient, $comparison);
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
     * @see       filterByMarketingcampaign()
     *
     * @param     mixed $idmarketingcampaign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function filterByIdmarketingcampaign($idmarketingcampaign = null, $comparison = null)
    {
        if (is_array($idmarketingcampaign)) {
            $useMinMax = false;
            if (isset($idmarketingcampaign['min'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingcampaign['max'])) {
                $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGN, $idmarketingcampaign, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcampaignclientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(MarketingcampaignclientPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingcampaignclientPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Filter the query by a related Marketingcampaign object
     *
     * @param   Marketingcampaign|PropelObjectCollection $marketingcampaign The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcampaignclientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcampaign($marketingcampaign, $comparison = null)
    {
        if ($marketingcampaign instanceof Marketingcampaign) {
            return $this
                ->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGN, $marketingcampaign->getIdmarketingcampaign(), $comparison);
        } elseif ($marketingcampaign instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGN, $marketingcampaign->toKeyValue('PrimaryKey', 'Idmarketingcampaign'), $comparison);
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
     * @return MarketingcampaignclientQuery The current query, for fluid interface
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
     * @param   Marketingcampaignclient $marketingcampaignclient Object to remove from the list of results
     *
     * @return MarketingcampaignclientQuery The current query, for fluid interface
     */
    public function prune($marketingcampaignclient = null)
    {
        if ($marketingcampaignclient) {
            $this->addUsingAlias(MarketingcampaignclientPeer::IDMARKETINGCAMPAIGNCLIENT, $marketingcampaignclient->getIdmarketingcampaignclient(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
