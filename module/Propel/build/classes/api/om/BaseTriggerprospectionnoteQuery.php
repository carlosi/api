<?php


/**
 * Base class that represents a query for the 'triggerprospectionnote' table.
 *
 *
 *
 * @method TriggerprospectionnoteQuery orderByIdtriggerprospectionnote($order = Criteria::ASC) Order by the idtriggerprospectionnote column
 * @method TriggerprospectionnoteQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method TriggerprospectionnoteQuery orderByIdtriggerprospection($order = Criteria::ASC) Order by the idtriggerprospection column
 * @method TriggerprospectionnoteQuery orderByTriggerprospectionnoteNote($order = Criteria::ASC) Order by the triggerprospectionnote_note column
 * @method TriggerprospectionnoteQuery orderByTriggerprospectionnoteDate($order = Criteria::ASC) Order by the triggerprospectionnote_date column
 *
 * @method TriggerprospectionnoteQuery groupByIdtriggerprospectionnote() Group by the idtriggerprospectionnote column
 * @method TriggerprospectionnoteQuery groupByIduser() Group by the iduser column
 * @method TriggerprospectionnoteQuery groupByIdtriggerprospection() Group by the idtriggerprospection column
 * @method TriggerprospectionnoteQuery groupByTriggerprospectionnoteNote() Group by the triggerprospectionnote_note column
 * @method TriggerprospectionnoteQuery groupByTriggerprospectionnoteDate() Group by the triggerprospectionnote_date column
 *
 * @method TriggerprospectionnoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TriggerprospectionnoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TriggerprospectionnoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TriggerprospectionnoteQuery leftJoinTriggerprospection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospection relation
 * @method TriggerprospectionnoteQuery rightJoinTriggerprospection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospection relation
 * @method TriggerprospectionnoteQuery innerJoinTriggerprospection($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospection relation
 *
 * @method TriggerprospectionnoteQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method TriggerprospectionnoteQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method TriggerprospectionnoteQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Triggerprospectionnote findOne(PropelPDO $con = null) Return the first Triggerprospectionnote matching the query
 * @method Triggerprospectionnote findOneOrCreate(PropelPDO $con = null) Return the first Triggerprospectionnote matching the query, or a new Triggerprospectionnote object populated from the query conditions when no match is found
 *
 * @method Triggerprospectionnote findOneByIduser(int $iduser) Return the first Triggerprospectionnote filtered by the iduser column
 * @method Triggerprospectionnote findOneByIdtriggerprospection(int $idtriggerprospection) Return the first Triggerprospectionnote filtered by the idtriggerprospection column
 * @method Triggerprospectionnote findOneByTriggerprospectionnoteNote(string $triggerprospectionnote_note) Return the first Triggerprospectionnote filtered by the triggerprospectionnote_note column
 * @method Triggerprospectionnote findOneByTriggerprospectionnoteDate(string $triggerprospectionnote_date) Return the first Triggerprospectionnote filtered by the triggerprospectionnote_date column
 *
 * @method array findByIdtriggerprospectionnote(int $idtriggerprospectionnote) Return Triggerprospectionnote objects filtered by the idtriggerprospectionnote column
 * @method array findByIduser(int $iduser) Return Triggerprospectionnote objects filtered by the iduser column
 * @method array findByIdtriggerprospection(int $idtriggerprospection) Return Triggerprospectionnote objects filtered by the idtriggerprospection column
 * @method array findByTriggerprospectionnoteNote(string $triggerprospectionnote_note) Return Triggerprospectionnote objects filtered by the triggerprospectionnote_note column
 * @method array findByTriggerprospectionnoteDate(string $triggerprospectionnote_date) Return Triggerprospectionnote objects filtered by the triggerprospectionnote_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseTriggerprospectionnoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTriggerprospectionnoteQuery object.
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
            $modelName = 'Triggerprospectionnote';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TriggerprospectionnoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TriggerprospectionnoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TriggerprospectionnoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TriggerprospectionnoteQuery) {
            return $criteria;
        }
        $query = new TriggerprospectionnoteQuery(null, null, $modelAlias);

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
     * @return   Triggerprospectionnote|Triggerprospectionnote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TriggerprospectionnotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TriggerprospectionnotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Triggerprospectionnote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtriggerprospectionnote($key, $con = null)
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
     * @return                 Triggerprospectionnote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtriggerprospectionnote`, `iduser`, `idtriggerprospection`, `triggerprospectionnote_note`, `triggerprospectionnote_date` FROM `triggerprospectionnote` WHERE `idtriggerprospectionnote` = :p0';
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
            $obj = new Triggerprospectionnote();
            $obj->hydrate($row);
            TriggerprospectionnotePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Triggerprospectionnote|Triggerprospectionnote[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Triggerprospectionnote[]|mixed the list of results, formatted by the current formatter
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
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtriggerprospectionnote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtriggerprospectionnote(1234); // WHERE idtriggerprospectionnote = 1234
     * $query->filterByIdtriggerprospectionnote(array(12, 34)); // WHERE idtriggerprospectionnote IN (12, 34)
     * $query->filterByIdtriggerprospectionnote(array('min' => 12)); // WHERE idtriggerprospectionnote >= 12
     * $query->filterByIdtriggerprospectionnote(array('max' => 12)); // WHERE idtriggerprospectionnote <= 12
     * </code>
     *
     * @param     mixed $idtriggerprospectionnote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospectionnote($idtriggerprospectionnote = null, $comparison = null)
    {
        if (is_array($idtriggerprospectionnote)) {
            $useMinMax = false;
            if (isset($idtriggerprospectionnote['min'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $idtriggerprospectionnote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospectionnote['max'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $idtriggerprospectionnote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $idtriggerprospectionnote, $comparison);
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
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionnotePeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idtriggerprospection column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtriggerprospection(1234); // WHERE idtriggerprospection = 1234
     * $query->filterByIdtriggerprospection(array(12, 34)); // WHERE idtriggerprospection IN (12, 34)
     * $query->filterByIdtriggerprospection(array('min' => 12)); // WHERE idtriggerprospection >= 12
     * $query->filterByIdtriggerprospection(array('max' => 12)); // WHERE idtriggerprospection <= 12
     * </code>
     *
     * @see       filterByTriggerprospection()
     *
     * @param     mixed $idtriggerprospection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospection($idtriggerprospection = null, $comparison = null)
    {
        if (is_array($idtriggerprospection)) {
            $useMinMax = false;
            if (isset($idtriggerprospection['min'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospection['max'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection, $comparison);
    }

    /**
     * Filter the query on the triggerprospectionnote_note column
     *
     * Example usage:
     * <code>
     * $query->filterByTriggerprospectionnoteNote('fooValue');   // WHERE triggerprospectionnote_note = 'fooValue'
     * $query->filterByTriggerprospectionnoteNote('%fooValue%'); // WHERE triggerprospectionnote_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $triggerprospectionnoteNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByTriggerprospectionnoteNote($triggerprospectionnoteNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($triggerprospectionnoteNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $triggerprospectionnoteNote)) {
                $triggerprospectionnoteNote = str_replace('*', '%', $triggerprospectionnoteNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TriggerprospectionnotePeer::TRIGGERPROSPECTIONNOTE_NOTE, $triggerprospectionnoteNote, $comparison);
    }

    /**
     * Filter the query on the triggerprospectionnote_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTriggerprospectionnoteDate('2011-03-14'); // WHERE triggerprospectionnote_date = '2011-03-14'
     * $query->filterByTriggerprospectionnoteDate('now'); // WHERE triggerprospectionnote_date = '2011-03-14'
     * $query->filterByTriggerprospectionnoteDate(array('max' => 'yesterday')); // WHERE triggerprospectionnote_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $triggerprospectionnoteDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function filterByTriggerprospectionnoteDate($triggerprospectionnoteDate = null, $comparison = null)
    {
        if (is_array($triggerprospectionnoteDate)) {
            $useMinMax = false;
            if (isset($triggerprospectionnoteDate['min'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::TRIGGERPROSPECTIONNOTE_DATE, $triggerprospectionnoteDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($triggerprospectionnoteDate['max'])) {
                $this->addUsingAlias(TriggerprospectionnotePeer::TRIGGERPROSPECTIONNOTE_DATE, $triggerprospectionnoteDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionnotePeer::TRIGGERPROSPECTIONNOTE_DATE, $triggerprospectionnoteDate, $comparison);
    }

    /**
     * Filter the query by a related Triggerprospection object
     *
     * @param   Triggerprospection|PropelObjectCollection $triggerprospection The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionnoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospection($triggerprospection, $comparison = null)
    {
        if ($triggerprospection instanceof Triggerprospection) {
            return $this
                ->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTION, $triggerprospection->getIdtriggerprospection(), $comparison);
        } elseif ($triggerprospection instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTION, $triggerprospection->toKeyValue('PrimaryKey', 'Idtriggerprospection'), $comparison);
        } else {
            throw new PropelException('filterByTriggerprospection() only accepts arguments of type Triggerprospection or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Triggerprospection relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function joinTriggerprospection($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Triggerprospection');

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
            $this->addJoinObject($join, 'Triggerprospection');
        }

        return $this;
    }

    /**
     * Use the Triggerprospection relation Triggerprospection object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TriggerprospectionQuery A secondary query class using the current class as primary query
     */
    public function useTriggerprospectionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTriggerprospection($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Triggerprospection', 'TriggerprospectionQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionnoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TriggerprospectionnotePeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TriggerprospectionnotePeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
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
     * @param   Triggerprospectionnote $triggerprospectionnote Object to remove from the list of results
     *
     * @return TriggerprospectionnoteQuery The current query, for fluid interface
     */
    public function prune($triggerprospectionnote = null)
    {
        if ($triggerprospectionnote) {
            $this->addUsingAlias(TriggerprospectionnotePeer::IDTRIGGERPROSPECTIONNOTE, $triggerprospectionnote->getIdtriggerprospectionnote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
