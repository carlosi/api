<?php


/**
 * Base class that represents a query for the 'quoutenote' table.
 *
 *
 *
 * @method QuoutenoteQuery orderByIdquoutenote($order = Criteria::ASC) Order by the idquoutenote column
 * @method QuoutenoteQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method QuoutenoteQuery orderByIdquote($order = Criteria::ASC) Order by the idquote column
 * @method QuoutenoteQuery orderByQuoutenoteNote($order = Criteria::ASC) Order by the quoutenote_note column
 * @method QuoutenoteQuery orderByQuoutenoteDate($order = Criteria::ASC) Order by the quoutenote_date column
 *
 * @method QuoutenoteQuery groupByIdquoutenote() Group by the idquoutenote column
 * @method QuoutenoteQuery groupByIduser() Group by the iduser column
 * @method QuoutenoteQuery groupByIdquote() Group by the idquote column
 * @method QuoutenoteQuery groupByQuoutenoteNote() Group by the quoutenote_note column
 * @method QuoutenoteQuery groupByQuoutenoteDate() Group by the quoutenote_date column
 *
 * @method QuoutenoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuoutenoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuoutenoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuoutenoteQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method QuoutenoteQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method QuoutenoteQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method QuoutenoteQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method QuoutenoteQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method QuoutenoteQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Quoutenote findOne(PropelPDO $con = null) Return the first Quoutenote matching the query
 * @method Quoutenote findOneOrCreate(PropelPDO $con = null) Return the first Quoutenote matching the query, or a new Quoutenote object populated from the query conditions when no match is found
 *
 * @method Quoutenote findOneByIduser(int $iduser) Return the first Quoutenote filtered by the iduser column
 * @method Quoutenote findOneByIdquote(int $idquote) Return the first Quoutenote filtered by the idquote column
 * @method Quoutenote findOneByQuoutenoteNote(string $quoutenote_note) Return the first Quoutenote filtered by the quoutenote_note column
 * @method Quoutenote findOneByQuoutenoteDate(string $quoutenote_date) Return the first Quoutenote filtered by the quoutenote_date column
 *
 * @method array findByIdquoutenote(int $idquoutenote) Return Quoutenote objects filtered by the idquoutenote column
 * @method array findByIduser(int $iduser) Return Quoutenote objects filtered by the iduser column
 * @method array findByIdquote(int $idquote) Return Quoutenote objects filtered by the idquote column
 * @method array findByQuoutenoteNote(string $quoutenote_note) Return Quoutenote objects filtered by the quoutenote_note column
 * @method array findByQuoutenoteDate(string $quoutenote_date) Return Quoutenote objects filtered by the quoutenote_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuoutenoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuoutenoteQuery object.
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
            $modelName = 'Quoutenote';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuoutenoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuoutenoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuoutenoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuoutenoteQuery) {
            return $criteria;
        }
        $query = new QuoutenoteQuery(null, null, $modelAlias);

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
     * @return   Quoutenote|Quoutenote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuoutenotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuoutenotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quoutenote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdquoutenote($key, $con = null)
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
     * @return                 Quoutenote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idquoutenote`, `iduser`, `idquote`, `quoutenote_note`, `quoutenote_date` FROM `quoutenote` WHERE `idquoutenote` = :p0';
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
            $obj = new Quoutenote();
            $obj->hydrate($row);
            QuoutenotePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quoutenote|Quoutenote[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quoutenote[]|mixed the list of results, formatted by the current formatter
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
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idquoutenote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquoutenote(1234); // WHERE idquoutenote = 1234
     * $query->filterByIdquoutenote(array(12, 34)); // WHERE idquoutenote IN (12, 34)
     * $query->filterByIdquoutenote(array('min' => 12)); // WHERE idquoutenote >= 12
     * $query->filterByIdquoutenote(array('max' => 12)); // WHERE idquoutenote <= 12
     * </code>
     *
     * @param     mixed $idquoutenote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByIdquoutenote($idquoutenote = null, $comparison = null)
    {
        if (is_array($idquoutenote)) {
            $useMinMax = false;
            if (isset($idquoutenote['min'])) {
                $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $idquoutenote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquoutenote['max'])) {
                $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $idquoutenote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $idquoutenote, $comparison);
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
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(QuoutenotePeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(QuoutenotePeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoutenotePeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idquote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquote(1234); // WHERE idquote = 1234
     * $query->filterByIdquote(array(12, 34)); // WHERE idquote IN (12, 34)
     * $query->filterByIdquote(array('min' => 12)); // WHERE idquote >= 12
     * $query->filterByIdquote(array('max' => 12)); // WHERE idquote <= 12
     * </code>
     *
     * @see       filterByQuote()
     *
     * @param     mixed $idquote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByIdquote($idquote = null, $comparison = null)
    {
        if (is_array($idquote)) {
            $useMinMax = false;
            if (isset($idquote['min'])) {
                $this->addUsingAlias(QuoutenotePeer::IDQUOTE, $idquote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquote['max'])) {
                $this->addUsingAlias(QuoutenotePeer::IDQUOTE, $idquote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoutenotePeer::IDQUOTE, $idquote, $comparison);
    }

    /**
     * Filter the query on the quoutenote_note column
     *
     * Example usage:
     * <code>
     * $query->filterByQuoutenoteNote('fooValue');   // WHERE quoutenote_note = 'fooValue'
     * $query->filterByQuoutenoteNote('%fooValue%'); // WHERE quoutenote_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quoutenoteNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByQuoutenoteNote($quoutenoteNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quoutenoteNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quoutenoteNote)) {
                $quoutenoteNote = str_replace('*', '%', $quoutenoteNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuoutenotePeer::QUOUTENOTE_NOTE, $quoutenoteNote, $comparison);
    }

    /**
     * Filter the query on the quoutenote_date column
     *
     * Example usage:
     * <code>
     * $query->filterByQuoutenoteDate('2011-03-14'); // WHERE quoutenote_date = '2011-03-14'
     * $query->filterByQuoutenoteDate('now'); // WHERE quoutenote_date = '2011-03-14'
     * $query->filterByQuoutenoteDate(array('max' => 'yesterday')); // WHERE quoutenote_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $quoutenoteDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function filterByQuoutenoteDate($quoutenoteDate = null, $comparison = null)
    {
        if (is_array($quoutenoteDate)) {
            $useMinMax = false;
            if (isset($quoutenoteDate['min'])) {
                $this->addUsingAlias(QuoutenotePeer::QUOUTENOTE_DATE, $quoutenoteDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quoutenoteDate['max'])) {
                $this->addUsingAlias(QuoutenotePeer::QUOUTENOTE_DATE, $quoutenoteDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoutenotePeer::QUOUTENOTE_DATE, $quoutenoteDate, $comparison);
    }

    /**
     * Filter the query by a related Quote object
     *
     * @param   Quote|PropelObjectCollection $quote The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoutenoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($quote, $comparison = null)
    {
        if ($quote instanceof Quote) {
            return $this
                ->addUsingAlias(QuoutenotePeer::IDQUOTE, $quote->getIdquote(), $comparison);
        } elseif ($quote instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuoutenotePeer::IDQUOTE, $quote->toKeyValue('PrimaryKey', 'Idquote'), $comparison);
        } else {
            throw new PropelException('filterByQuote() only accepts arguments of type Quote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function joinQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quote');

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
            $this->addJoinObject($join, 'Quote');
        }

        return $this;
    }

    /**
     * Use the Quote relation Quote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quote', 'QuoteQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoutenoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(QuoutenotePeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuoutenotePeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return QuoutenoteQuery The current query, for fluid interface
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
     * @param   Quoutenote $quoutenote Object to remove from the list of results
     *
     * @return QuoutenoteQuery The current query, for fluid interface
     */
    public function prune($quoutenote = null)
    {
        if ($quoutenote) {
            $this->addUsingAlias(QuoutenotePeer::IDQUOUTENOTE, $quoutenote->getIdquoutenote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
