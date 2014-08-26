<?php


/**
 * Base class that represents a query for the 'marketingprospectionnote' table.
 *
 *
 *
 * @method MarketingprospectionnoteQuery orderByIdmarketingprospectionnote($order = Criteria::ASC) Order by the idmarketingprospectionnote column
 * @method MarketingprospectionnoteQuery orderByIdmarketingprospectionuser($order = Criteria::ASC) Order by the idmarketingprospectionuser column
 * @method MarketingprospectionnoteQuery orderByMarketingprospectionnoteNote($order = Criteria::ASC) Order by the marketingprospectionnote_note column
 * @method MarketingprospectionnoteQuery orderByMarketingprospectionnoteDate($order = Criteria::ASC) Order by the marketingprospectionnote_date column
 *
 * @method MarketingprospectionnoteQuery groupByIdmarketingprospectionnote() Group by the idmarketingprospectionnote column
 * @method MarketingprospectionnoteQuery groupByIdmarketingprospectionuser() Group by the idmarketingprospectionuser column
 * @method MarketingprospectionnoteQuery groupByMarketingprospectionnoteNote() Group by the marketingprospectionnote_note column
 * @method MarketingprospectionnoteQuery groupByMarketingprospectionnoteDate() Group by the marketingprospectionnote_date column
 *
 * @method MarketingprospectionnoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingprospectionnoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingprospectionnoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingprospectionnoteQuery leftJoinMarketingprospectionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectionnoteQuery rightJoinMarketingprospectionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospectionuser relation
 * @method MarketingprospectionnoteQuery innerJoinMarketingprospectionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospectionuser relation
 *
 * @method Marketingprospectionnote findOne(PropelPDO $con = null) Return the first Marketingprospectionnote matching the query
 * @method Marketingprospectionnote findOneOrCreate(PropelPDO $con = null) Return the first Marketingprospectionnote matching the query, or a new Marketingprospectionnote object populated from the query conditions when no match is found
 *
 * @method Marketingprospectionnote findOneByIdmarketingprospectionuser(int $idmarketingprospectionuser) Return the first Marketingprospectionnote filtered by the idmarketingprospectionuser column
 * @method Marketingprospectionnote findOneByMarketingprospectionnoteNote(string $marketingprospectionnote_note) Return the first Marketingprospectionnote filtered by the marketingprospectionnote_note column
 * @method Marketingprospectionnote findOneByMarketingprospectionnoteDate(string $marketingprospectionnote_date) Return the first Marketingprospectionnote filtered by the marketingprospectionnote_date column
 *
 * @method array findByIdmarketingprospectionnote(int $idmarketingprospectionnote) Return Marketingprospectionnote objects filtered by the idmarketingprospectionnote column
 * @method array findByIdmarketingprospectionuser(int $idmarketingprospectionuser) Return Marketingprospectionnote objects filtered by the idmarketingprospectionuser column
 * @method array findByMarketingprospectionnoteNote(string $marketingprospectionnote_note) Return Marketingprospectionnote objects filtered by the marketingprospectionnote_note column
 * @method array findByMarketingprospectionnoteDate(string $marketingprospectionnote_date) Return Marketingprospectionnote objects filtered by the marketingprospectionnote_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectionnoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingprospectionnoteQuery object.
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
            $modelName = 'Marketingprospectionnote';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingprospectionnoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingprospectionnoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingprospectionnoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingprospectionnoteQuery) {
            return $criteria;
        }
        $query = new MarketingprospectionnoteQuery(null, null, $modelAlias);

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
     * @return   Marketingprospectionnote|Marketingprospectionnote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingprospectionnotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingprospectionnotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingprospectionnote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingprospectionnote($key, $con = null)
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
     * @return                 Marketingprospectionnote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingprospectionnote`, `idmarketingprospectionuser`, `marketingprospectionnote_note`, `marketingprospectionnote_date` FROM `marketingprospectionnote` WHERE `idmarketingprospectionnote` = :p0';
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
            $obj = new Marketingprospectionnote();
            $obj->hydrate($row);
            MarketingprospectionnotePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingprospectionnote|Marketingprospectionnote[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingprospectionnote[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketingprospectionnote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingprospectionnote(1234); // WHERE idmarketingprospectionnote = 1234
     * $query->filterByIdmarketingprospectionnote(array(12, 34)); // WHERE idmarketingprospectionnote IN (12, 34)
     * $query->filterByIdmarketingprospectionnote(array('min' => 12)); // WHERE idmarketingprospectionnote >= 12
     * $query->filterByIdmarketingprospectionnote(array('max' => 12)); // WHERE idmarketingprospectionnote <= 12
     * </code>
     *
     * @param     mixed $idmarketingprospectionnote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospectionnote($idmarketingprospectionnote = null, $comparison = null)
    {
        if (is_array($idmarketingprospectionnote)) {
            $useMinMax = false;
            if (isset($idmarketingprospectionnote['min'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $idmarketingprospectionnote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospectionnote['max'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $idmarketingprospectionnote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $idmarketingprospectionnote, $comparison);
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
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospectionuser($idmarketingprospectionuser = null, $comparison = null)
    {
        if (is_array($idmarketingprospectionuser)) {
            $useMinMax = false;
            if (isset($idmarketingprospectionuser['min'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospectionuser['max'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser, $comparison);
    }

    /**
     * Filter the query on the marketingprospectionnote_note column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectionnoteNote('fooValue');   // WHERE marketingprospectionnote_note = 'fooValue'
     * $query->filterByMarketingprospectionnoteNote('%fooValue%'); // WHERE marketingprospectionnote_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketingprospectionnoteNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectionnoteNote($marketingprospectionnoteNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketingprospectionnoteNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketingprospectionnoteNote)) {
                $marketingprospectionnoteNote = str_replace('*', '%', $marketingprospectionnoteNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_NOTE, $marketingprospectionnoteNote, $comparison);
    }

    /**
     * Filter the query on the marketingprospectionnote_date column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketingprospectionnoteDate('2011-03-14'); // WHERE marketingprospectionnote_date = '2011-03-14'
     * $query->filterByMarketingprospectionnoteDate('now'); // WHERE marketingprospectionnote_date = '2011-03-14'
     * $query->filterByMarketingprospectionnoteDate(array('max' => 'yesterday')); // WHERE marketingprospectionnote_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $marketingprospectionnoteDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByMarketingprospectionnoteDate($marketingprospectionnoteDate = null, $comparison = null)
    {
        if (is_array($marketingprospectionnoteDate)) {
            $useMinMax = false;
            if (isset($marketingprospectionnoteDate['min'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE, $marketingprospectionnoteDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marketingprospectionnoteDate['max'])) {
                $this->addUsingAlias(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE, $marketingprospectionnoteDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE, $marketingprospectionnoteDate, $comparison);
    }

    /**
     * Filter the query by a related Marketingprospectionuser object
     *
     * @param   Marketingprospectionuser|PropelObjectCollection $marketingprospectionuser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionnoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospectionuser($marketingprospectionuser, $comparison = null)
    {
        if ($marketingprospectionuser instanceof Marketingprospectionuser) {
            return $this
                ->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionuser->getIdmarketingprospectionuser(), $comparison);
        } elseif ($marketingprospectionuser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionuser->toKeyValue('PrimaryKey', 'Idmarketingprospectionuser'), $comparison);
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
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
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
     * @param   Marketingprospectionnote $marketingprospectionnote Object to remove from the list of results
     *
     * @return MarketingprospectionnoteQuery The current query, for fluid interface
     */
    public function prune($marketingprospectionnote = null)
    {
        if ($marketingprospectionnote) {
            $this->addUsingAlias(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $marketingprospectionnote->getIdmarketingprospectionnote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
