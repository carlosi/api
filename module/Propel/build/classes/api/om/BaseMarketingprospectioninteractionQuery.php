<?php


/**
 * Base class that represents a query for the 'marketingprospectioninteraction' table.
 *
 *
 *
 * @method MarketingprospectioninteractionQuery orderByIdmarketingprospectioninteraction($order = Criteria::ASC) Order by the idmarketingprospectioninteraction column
 * @method MarketingprospectioninteractionQuery orderByIdmarketingprospectionuser($order = Criteria::ASC) Order by the idmarketingprospectionuser column
 * @method MarketingprospectioninteractionQuery orderByMarketingprospectioninteractionType($order = Criteria::ASC) Order by the marketingprospectioninteraction_type column
 * @method MarketingprospectioninteractionQuery orderByMarketingprospectioninteractionDate($order = Criteria::ASC) Order by the marketingprospectioninteraction_date column
 * @method MarketingprospectioninteractionQuery orderByMarketingprospectioninteractionComment($order = Criteria::ASC) Order by the marketingprospectioninteraction_comment column
 *
 * @method MarketingprospectioninteractionQuery groupByIdmarketingprospectioninteraction() Group by the idmarketingprospectioninteraction column
 * @method MarketingprospectioninteractionQuery groupByIdmarketingprospectionuser() Group by the idmarketingprospectionuser column
 * @method MarketingprospectioninteractionQuery groupByMarketingprospectioninteractionType() Group by the marketingprospectioninteraction_type column
 * @method MarketingprospectioninteractionQuery groupByMarketingprospectioninteractionDate() Group by the marketingprospectioninteraction_date column
 * @method MarketingprospectioninteractionQuery groupByMarketingprospectioninteractionComment() Group by the marketingprospectioninteraction_comment column
 *
 * @method MarketingprospectioninteractionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingprospectioninteractionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingprospectioninteractionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingprospectioninteractionQuery leftJoinMarketingprospectionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectioninteractionQuery rightJoinMarketingprospectionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectioninteractionQuery innerJoinMarketingprospectionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospectionuser relation
 *
 * @method Marketingprospectioninteraction findOne(PropelPDO $con = null) Return the first Marketingprospectioninteraction matching the query
 * @method Marketingprospectioninteraction findOneOrCreate(PropelPDO $con = null) Return the first Marketingprospectioninteraction matching the query, or a new Marketingprospectioninteraction object populated from the query conditions when no match is found
 *
 * @method Marketingprospectioninteraction findOneByIdmarketingprospectionuser(int $idmarketingprospectionuser) Return the first Marketingprospectioninteraction filtered by the idmarketingprospectionuser column
 * @method Marketingprospectioninteraction findOneByMarketingprospectioninteractionType(string $marketingprospectioninteraction_type) Return the first Marketingprospectioninteraction filtered by the marketingprospectioninteraction_type column
 * @method Marketingprospectioninteraction findOneByMarketingprospectioninteractionDate(string $marketingprospectioninteraction_date) Return the first Marketingprospectioninteraction filtered by the marketingprospectioninteraction_date column
 * @method Marketingprospectioninteraction findOneByMarketingprospectioninteractionComment(string $marketingprospectioninteraction_comment) Return the first Marketingprospectioninteraction filtered by the marketingprospectioninteraction_comment column
 *
 * @method array findByIdmarketingprospectioninteraction(int $idmarketingprospectioninteraction) Return Marketingprospectioninteraction objects filtered by the idmarketingprospectioninteraction column
 * @method array findByIdmarketingprospectionuser(int $idmarketingprospectionuser) Return Marketingprospectioninteraction objects filtered by the idmarketingprospectionuser column
 * @method array findByMarketingprospectioninteractionType(string $marketingprospectioninteraction_type) Return Marketingprospectioninteraction objects filtered by the marketingprospectioninteraction_type column
 * @method array findByMarketingprospectioninteractionDate(string $marketingprospectioninteraction_date) Return Marketingprospectioninteraction objects filtered by the marketingprospectioninteraction_date column
 * @method array findByMarketingprospectioninteractionComment(string $marketingprospectioninteraction_comment) Return Marketingprospectioninteraction objects filtered by the marketingprospectioninteraction_comment column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectioninteractionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingprospectioninteractionQuery object.
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
            $modelName = 'Marketingprospectioninteraction';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingprospectioninteractionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingprospectioninteractionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingprospectioninteractionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingprospectioninteractionQuery) {
            return $criteria;
        }
        $query = new MarketingprospectioninteractionQuery(null, null, $modelAlias);

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
     * @return   Marketingprospectioninteraction|Marketingprospectioninteraction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingprospectioninteractionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingprospectioninteractionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingprospectioninteraction A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingprospectioninteraction($key, $con = null)
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
     * @return                 Marketingprospectioninteraction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingprospectioninteraction`, `idmarketingprospectionuser`, `marketingprospectioninteraction_type`, `marketingprospectioninteraction_date`, `marketingprospectioninteraction_comment` FROM `marketingprospectioninteraction` WHERE `idmarketingprospectioninteraction` = :p0';
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
            $obj = new Marketingprospectioninteraction();
            $obj->hydrate($row);
            MarketingprospectioninteractionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingprospectioninteraction|Marketingprospectioninteraction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingprospectioninteraction[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketingprospectioninteraction column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingprospectioninteraction(1234); // WHERE idmarketingprospectioninteraction = 1234
     * $query->filterByIdmarketingprospectioninteraction(array(12, 34)); // WHERE idmarketingprospectioninteraction IN (12, 34)
     * $query->filterByIdmarketingprospectioninteraction(array('min' => 12)); // WHERE idmarketingprospectioninteraction >= 12
     * $query->filterByIdmarketingprospectioninteraction(array('max' => 12)); // WHERE idmarketingprospectioninteraction <= 12
     * </code>
     *
     * @param     mixed $idmarketingprospectioninteraction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospectioninteraction($idmarketingprospectioninteraction = null, $comparison = null)
    {
        if (is_array($idmarketingprospectioninteraction)) {
            $useMinMax = false;
            if (isset($idmarketingprospectioninteraction['min'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $idmarketingprospectioninteraction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospectioninteraction['max'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $idmarketingprospectioninteraction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $idmarketingprospectioninteraction, $comparison);
    }

    /**
     * Filter the query on the idmarketingprospectionuser column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingprospectionuser(1234); // WHERE idmarketingprospectionuser = 1234
     * $query->filterByIdmarketingprospectionuser(array(12, 34)); // WHERE idmarketingprospectionuser IN (12, 34)
     * $query->filterByIdmarketingprospectionuser(array('min' => 12)); // WHERE idmarketingprospectionuser >= 12
     * $query->filterByIdmarketingprospectionuser(array('max' => 12)); // WHERE idmarketingprospectionuser <= 12
     * </code>
     *
     * @see       filterByMarketingprospectionuser()
     *
     * @param     mixed $idmarketingprospectionuser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospectionuser($idmarketingprospectionuser = null, $comparison = null)
    {
        if (is_array($idmarketingprospectionuser)) {
            $useMinMax = false;
            if (isset($idmarketingprospectionuser['min'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospectionuser['max'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser, $comparison);
    }

    /**
     * Filter the query on the marketingprospectioninteraction_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectioninteractionType('fooValue');   // WHERE marketingprospectioninteraction_type = 'fooValue'
     * $query->filterByMarketingprospectioninteractionType('%fooValue%'); // WHERE marketingprospectioninteraction_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketingprospectioninteractionType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectioninteractionType($marketingprospectioninteractionType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketingprospectioninteractionType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketingprospectioninteractionType)) {
                $marketingprospectioninteractionType = str_replace('*', '%', $marketingprospectioninteractionType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::MARKETINGPROSPECTIONINTERACTION_TYPE, $marketingprospectioninteractionType, $comparison);
    }

    /**
     * Filter the query on the marketingprospectioninteraction_date column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectioninteractionDate('2011-03-14'); // WHERE marketingprospectioninteraction_date = '2011-03-14'
     * $query->filterByMarketingprospectioninteractionDate('now'); // WHERE marketingprospectioninteraction_date = '2011-03-14'
     * $query->filterByMarketingprospectioninteractionDate(array('max' => 'yesterday')); // WHERE marketingprospectioninteraction_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $marketingprospectioninteractionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectioninteractionDate($marketingprospectioninteractionDate = null, $comparison = null)
    {
        if (is_array($marketingprospectioninteractionDate)) {
            $useMinMax = false;
            if (isset($marketingprospectioninteractionDate['min'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::MARKETINGPROSPECTIONINTERACTION_DATE, $marketingprospectioninteractionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingprospectioninteractionDate['max'])) {
                $this->addUsingAlias(MarketingprospectioninteractionPeer::MARKETINGPROSPECTIONINTERACTION_DATE, $marketingprospectioninteractionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::MARKETINGPROSPECTIONINTERACTION_DATE, $marketingprospectioninteractionDate, $comparison);
    }

    /**
     * Filter the query on the marketingprospectioninteraction_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectioninteractionComment('fooValue');   // WHERE marketingprospectioninteraction_comment = 'fooValue'
     * $query->filterByMarketingprospectioninteractionComment('%fooValue%'); // WHERE marketingprospectioninteraction_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketingprospectioninteractionComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectioninteractionComment($marketingprospectioninteractionComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketingprospectioninteractionComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketingprospectioninteractionComment)) {
                $marketingprospectioninteractionComment = str_replace('*', '%', $marketingprospectioninteractionComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketingprospectioninteractionPeer::MARKETINGPROSPECTIONINTERACTION_COMMENT, $marketingprospectioninteractionComment, $comparison);
    }

    /**
     * Filter the query by a related Marketingprospectionuser object
     *
     * @param   Marketingprospectionuser|PropelObjectCollection $marketingprospectionuser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectioninteractionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospectionuser($marketingprospectionuser, $comparison = null)
    {
        if ($marketingprospectionuser instanceof Marketingprospectionuser) {
            return $this
                ->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionuser->getIdmarketingprospectionuser(), $comparison);
        } elseif ($marketingprospectionuser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionuser->toKeyValue('PrimaryKey', 'Idmarketingprospectionuser'), $comparison);
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
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
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
     * @param   Marketingprospectioninteraction $marketingprospectioninteraction Object to remove from the list of results
     *
     * @return MarketingprospectioninteractionQuery The current query, for fluid interface
     */
    public function prune($marketingprospectioninteraction = null)
    {
        if ($marketingprospectioninteraction) {
            $this->addUsingAlias(MarketingprospectioninteractionPeer::IDMARKETINGPROSPECTIONINTERACTION, $marketingprospectioninteraction->getIdmarketingprospectioninteraction(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
