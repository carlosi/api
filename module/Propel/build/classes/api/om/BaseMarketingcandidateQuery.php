<?php


/**
 * Base class that represents a query for the 'marketingcandidate' table.
 *
 *
 *
 * @method MarketingcandidateQuery orderByIdmarketingcandidate($order = Criteria::ASC) Order by the idmarketingcandidate column
 * @method MarketingcandidateQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method MarketingcandidateQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method MarketingcandidateQuery orderByMarketingcandidateSaleexpectation($order = Criteria::ASC) Order by the marketingcandidate_saleexpectation column
 * @method MarketingcandidateQuery orderByMarketingcandidateLevelexpectation($order = Criteria::ASC) Order by the marketingcandidate_levelexpectation column
 *
 * @method MarketingcandidateQuery groupByIdmarketingcandidate() Group by the idmarketingcandidate column
 * @method MarketingcandidateQuery groupByIduser() Group by the iduser column
 * @method MarketingcandidateQuery groupByIdclient() Group by the idclient column
 * @method MarketingcandidateQuery groupByMarketingcandidateSaleexpectation() Group by the marketingcandidate_saleexpectation column
 * @method MarketingcandidateQuery groupByMarketingcandidateLevelexpectation() Group by the marketingcandidate_levelexpectation column
 *
 * @method MarketingcandidateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingcandidateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingcandidateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingcandidateQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method MarketingcandidateQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method MarketingcandidateQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method MarketingcandidateQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method MarketingcandidateQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method MarketingcandidateQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Marketingcandidate findOne(PropelPDO $con = null) Return the first Marketingcandidate matching the query
 * @method Marketingcandidate findOneOrCreate(PropelPDO $con = null) Return the first Marketingcandidate matching the query, or a new Marketingcandidate object populated from the query conditions when no match is found
 *
 * @method Marketingcandidate findOneByIduser(int $iduser) Return the first Marketingcandidate filtered by the iduser column
 * @method Marketingcandidate findOneByIdclient(int $idclient) Return the first Marketingcandidate filtered by the idclient column
 * @method Marketingcandidate findOneByMarketingcandidateSaleexpectation(string $marketingcandidate_saleexpectation) Return the first Marketingcandidate filtered by the marketingcandidate_saleexpectation column
 * @method Marketingcandidate findOneByMarketingcandidateLevelexpectation(int $marketingcandidate_levelexpectation) Return the first Marketingcandidate filtered by the marketingcandidate_levelexpectation column
 *
 * @method array findByIdmarketingcandidate(int $idmarketingcandidate) Return Marketingcandidate objects filtered by the idmarketingcandidate column
 * @method array findByIduser(int $iduser) Return Marketingcandidate objects filtered by the iduser column
 * @method array findByIdclient(int $idclient) Return Marketingcandidate objects filtered by the idclient column
 * @method array findByMarketingcandidateSaleexpectation(string $marketingcandidate_saleexpectation) Return Marketingcandidate objects filtered by the marketingcandidate_saleexpectation column
 * @method array findByMarketingcandidateLevelexpectation(int $marketingcandidate_levelexpectation) Return Marketingcandidate objects filtered by the marketingcandidate_levelexpectation column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingcandidateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingcandidateQuery object.
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
            $modelName = 'Marketingcandidate';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingcandidateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingcandidateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingcandidateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingcandidateQuery) {
            return $criteria;
        }
        $query = new MarketingcandidateQuery(null, null, $modelAlias);

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
     * @return   Marketingcandidate|Marketingcandidate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingcandidatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingcandidatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingcandidate A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingcandidate($key, $con = null)
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
     * @return                 Marketingcandidate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingcandidate`, `iduser`, `idclient`, `marketingcandidate_saleexpectation`, `marketingcandidate_levelexpectation` FROM `marketingcandidate` WHERE `idmarketingcandidate` = :p0';
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
            $obj = new Marketingcandidate();
            $obj->hydrate($row);
            MarketingcandidatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingcandidate|Marketingcandidate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingcandidate[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketingcandidate column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingcandidate(1234); // WHERE idmarketingcandidate = 1234
     * $query->filterByIdmarketingcandidate(array(12, 34)); // WHERE idmarketingcandidate IN (12, 34)
     * $query->filterByIdmarketingcandidate(array('min' => 12)); // WHERE idmarketingcandidate >= 12
     * $query->filterByIdmarketingcandidate(array('max' => 12)); // WHERE idmarketingcandidate <= 12
     * </code>
     *
     * @param     mixed $idmarketingcandidate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByIdmarketingcandidate($idmarketingcandidate = null, $comparison = null)
    {
        if (is_array($idmarketingcandidate)) {
            $useMinMax = false;
            if (isset($idmarketingcandidate['min'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $idmarketingcandidate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingcandidate['max'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $idmarketingcandidate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $idmarketingcandidate, $comparison);
    }

    /**
     * Filter the query on the iduser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE iduser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE iduser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE iduser >= 12
     * $query->filterByIduser(array('max' => 12)); // WHERE iduser <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcandidatePeer::IDUSER, $iduser, $comparison);
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
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(MarketingcandidatePeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcandidatePeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the marketingcandidate_saleexpectation column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingcandidateSaleexpectation(1234); // WHERE marketingcandidate_saleexpectation = 1234
     * $query->filterByMarketingcandidateSaleexpectation(array(12, 34)); // WHERE marketingcandidate_saleexpectation IN (12, 34)
     * $query->filterByMarketingcandidateSaleexpectation(array('min' => 12)); // WHERE marketingcandidate_saleexpectation >= 12
     * $query->filterByMarketingcandidateSaleexpectation(array('max' => 12)); // WHERE marketingcandidate_saleexpectation <= 12
     * </code>
     *
     * @param     mixed $marketingcandidateSaleexpectation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByMarketingcandidateSaleexpectation($marketingcandidateSaleexpectation = null, $comparison = null)
    {
        if (is_array($marketingcandidateSaleexpectation)) {
            $useMinMax = false;
            if (isset($marketingcandidateSaleexpectation['min'])) {
                $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_SALEEXPECTATION, $marketingcandidateSaleexpectation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingcandidateSaleexpectation['max'])) {
                $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_SALEEXPECTATION, $marketingcandidateSaleexpectation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_SALEEXPECTATION, $marketingcandidateSaleexpectation, $comparison);
    }

    /**
     * Filter the query on the marketingcandidate_levelexpectation column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingcandidateLevelexpectation(1234); // WHERE marketingcandidate_levelexpectation = 1234
     * $query->filterByMarketingcandidateLevelexpectation(array(12, 34)); // WHERE marketingcandidate_levelexpectation IN (12, 34)
     * $query->filterByMarketingcandidateLevelexpectation(array('min' => 12)); // WHERE marketingcandidate_levelexpectation >= 12
     * $query->filterByMarketingcandidateLevelexpectation(array('max' => 12)); // WHERE marketingcandidate_levelexpectation <= 12
     * </code>
     *
     * @param     mixed $marketingcandidateLevelexpectation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function filterByMarketingcandidateLevelexpectation($marketingcandidateLevelexpectation = null, $comparison = null)
    {
        if (is_array($marketingcandidateLevelexpectation)) {
            $useMinMax = false;
            if (isset($marketingcandidateLevelexpectation['min'])) {
                $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_LEVELEXPECTATION, $marketingcandidateLevelexpectation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingcandidateLevelexpectation['max'])) {
                $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_LEVELEXPECTATION, $marketingcandidateLevelexpectation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingcandidatePeer::MARKETINGCANDIDATE_LEVELEXPECTATION, $marketingcandidateLevelexpectation, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcandidateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(MarketingcandidatePeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingcandidatePeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return MarketingcandidateQuery The current query, for fluid interface
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
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingcandidateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(MarketingcandidatePeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingcandidatePeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Marketingcandidate $marketingcandidate Object to remove from the list of results
     *
     * @return MarketingcandidateQuery The current query, for fluid interface
     */
    public function prune($marketingcandidate = null)
    {
        if ($marketingcandidate) {
            $this->addUsingAlias(MarketingcandidatePeer::IDMARKETINGCANDIDATE, $marketingcandidate->getIdmarketingcandidate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
