<?php


/**
 * Base class that represents a query for the 'prospectioninterest' table.
 *
 *
 *
 * @method ProspectioninterestQuery orderByIdprospectioninterest($order = Criteria::ASC) Order by the idprospectioninterest column
 * @method ProspectioninterestQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ProspectioninterestQuery orderByIdtriggerprospection($order = Criteria::ASC) Order by the idtriggerprospection column
 * @method ProspectioninterestQuery orderByProspectioninterestLevel($order = Criteria::ASC) Order by the prospectioninterest_level column
 * @method ProspectioninterestQuery orderByProspectioninterestDate($order = Criteria::ASC) Order by the prospectioninterest_date column
 * @method ProspectioninterestQuery orderByProspectioninterestNote($order = Criteria::ASC) Order by the prospectioninterest_note column
 *
 * @method ProspectioninterestQuery groupByIdprospectioninterest() Group by the idprospectioninterest column
 * @method ProspectioninterestQuery groupByIduser() Group by the iduser column
 * @method ProspectioninterestQuery groupByIdtriggerprospection() Group by the idtriggerprospection column
 * @method ProspectioninterestQuery groupByProspectioninterestLevel() Group by the prospectioninterest_level column
 * @method ProspectioninterestQuery groupByProspectioninterestDate() Group by the prospectioninterest_date column
 * @method ProspectioninterestQuery groupByProspectioninterestNote() Group by the prospectioninterest_note column
 *
 * @method ProspectioninterestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProspectioninterestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProspectioninterestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProspectioninterestQuery leftJoinTriggerprospection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospection relation
 * @method ProspectioninterestQuery rightJoinTriggerprospection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospection relation
 * @method ProspectioninterestQuery innerJoinTriggerprospection($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospection relation
 *
 * @method ProspectioninterestQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ProspectioninterestQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ProspectioninterestQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Prospectioninterest findOne(PropelPDO $con = null) Return the first Prospectioninterest matching the query
 * @method Prospectioninterest findOneOrCreate(PropelPDO $con = null) Return the first Prospectioninterest matching the query, or a new Prospectioninterest object populated from the query conditions when no match is found
 *
 * @method Prospectioninterest findOneByIduser(int $iduser) Return the first Prospectioninterest filtered by the iduser column
 * @method Prospectioninterest findOneByIdtriggerprospection(int $idtriggerprospection) Return the first Prospectioninterest filtered by the idtriggerprospection column
 * @method Prospectioninterest findOneByProspectioninterestLevel(string $prospectioninterest_level) Return the first Prospectioninterest filtered by the prospectioninterest_level column
 * @method Prospectioninterest findOneByProspectioninterestDate(string $prospectioninterest_date) Return the first Prospectioninterest filtered by the prospectioninterest_date column
 * @method Prospectioninterest findOneByProspectioninterestNote(string $prospectioninterest_note) Return the first Prospectioninterest filtered by the prospectioninterest_note column
 *
 * @method array findByIdprospectioninterest(int $idprospectioninterest) Return Prospectioninterest objects filtered by the idprospectioninterest column
 * @method array findByIduser(int $iduser) Return Prospectioninterest objects filtered by the iduser column
 * @method array findByIdtriggerprospection(int $idtriggerprospection) Return Prospectioninterest objects filtered by the idtriggerprospection column
 * @method array findByProspectioninterestLevel(string $prospectioninterest_level) Return Prospectioninterest objects filtered by the prospectioninterest_level column
 * @method array findByProspectioninterestDate(string $prospectioninterest_date) Return Prospectioninterest objects filtered by the prospectioninterest_date column
 * @method array findByProspectioninterestNote(string $prospectioninterest_note) Return Prospectioninterest objects filtered by the prospectioninterest_note column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProspectioninterestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProspectioninterestQuery object.
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
            $modelName = 'Prospectioninterest';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProspectioninterestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProspectioninterestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProspectioninterestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProspectioninterestQuery) {
            return $criteria;
        }
        $query = new ProspectioninterestQuery(null, null, $modelAlias);

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
     * @return   Prospectioninterest|Prospectioninterest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProspectioninterestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Prospectioninterest A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdprospectioninterest($key, $con = null)
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
     * @return                 Prospectioninterest A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idprospectioninterest`, `iduser`, `idtriggerprospection`, `prospectioninterest_level`, `prospectioninterest_date`, `prospectioninterest_note` FROM `prospectioninterest` WHERE `idprospectioninterest` = :p0';
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
            $obj = new Prospectioninterest();
            $obj->hydrate($row);
            ProspectioninterestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Prospectioninterest|Prospectioninterest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Prospectioninterest[]|mixed the list of results, formatted by the current formatter
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
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idprospectioninterest column
     *
     * Example usage:
     * <code>
     * $query->filterByIdprospectioninterest(1234); // WHERE idprospectioninterest = 1234
     * $query->filterByIdprospectioninterest(array(12, 34)); // WHERE idprospectioninterest IN (12, 34)
     * $query->filterByIdprospectioninterest(array('min' => 12)); // WHERE idprospectioninterest >= 12
     * $query->filterByIdprospectioninterest(array('max' => 12)); // WHERE idprospectioninterest <= 12
     * </code>
     *
     * @param     mixed $idprospectioninterest The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByIdprospectioninterest($idprospectioninterest = null, $comparison = null)
    {
        if (is_array($idprospectioninterest)) {
            $useMinMax = false;
            if (isset($idprospectioninterest['min'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $idprospectioninterest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprospectioninterest['max'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $idprospectioninterest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $idprospectioninterest, $comparison);
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
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::IDUSER, $iduser, $comparison);
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
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospection($idtriggerprospection = null, $comparison = null)
    {
        if (is_array($idtriggerprospection)) {
            $useMinMax = false;
            if (isset($idtriggerprospection['min'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospection['max'])) {
                $this->addUsingAlias(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $idtriggerprospection, $comparison);
    }

    /**
     * Filter the query on the prospectioninterest_level column
     *
     * Example usage:
     * <code>
     * $query->filterByProspectioninterestLevel('fooValue');   // WHERE prospectioninterest_level = 'fooValue'
     * $query->filterByProspectioninterestLevel('%fooValue%'); // WHERE prospectioninterest_level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prospectioninterestLevel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByProspectioninterestLevel($prospectioninterestLevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prospectioninterestLevel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prospectioninterestLevel)) {
                $prospectioninterestLevel = str_replace('*', '%', $prospectioninterestLevel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL, $prospectioninterestLevel, $comparison);
    }

    /**
     * Filter the query on the prospectioninterest_date column
     *
     * Example usage:
     * <code>
     * $query->filterByProspectioninterestDate('2011-03-14'); // WHERE prospectioninterest_date = '2011-03-14'
     * $query->filterByProspectioninterestDate('now'); // WHERE prospectioninterest_date = '2011-03-14'
     * $query->filterByProspectioninterestDate(array('max' => 'yesterday')); // WHERE prospectioninterest_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $prospectioninterestDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByProspectioninterestDate($prospectioninterestDate = null, $comparison = null)
    {
        if (is_array($prospectioninterestDate)) {
            $useMinMax = false;
            if (isset($prospectioninterestDate['min'])) {
                $this->addUsingAlias(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE, $prospectioninterestDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prospectioninterestDate['max'])) {
                $this->addUsingAlias(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE, $prospectioninterestDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE, $prospectioninterestDate, $comparison);
    }

    /**
     * Filter the query on the prospectioninterest_note column
     *
     * Example usage:
     * <code>
     * $query->filterByProspectioninterestNote('fooValue');   // WHERE prospectioninterest_note = 'fooValue'
     * $query->filterByProspectioninterestNote('%fooValue%'); // WHERE prospectioninterest_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prospectioninterestNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function filterByProspectioninterestNote($prospectioninterestNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prospectioninterestNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prospectioninterestNote)) {
                $prospectioninterestNote = str_replace('*', '%', $prospectioninterestNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE, $prospectioninterestNote, $comparison);
    }

    /**
     * Filter the query by a related Triggerprospection object
     *
     * @param   Triggerprospection|PropelObjectCollection $triggerprospection The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProspectioninterestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospection($triggerprospection, $comparison = null)
    {
        if ($triggerprospection instanceof Triggerprospection) {
            return $this
                ->addUsingAlias(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $triggerprospection->getIdtriggerprospection(), $comparison);
        } elseif ($triggerprospection instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $triggerprospection->toKeyValue('PrimaryKey', 'Idtriggerprospection'), $comparison);
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
     * @return ProspectioninterestQuery The current query, for fluid interface
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
     * @return                 ProspectioninterestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ProspectioninterestPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProspectioninterestPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return ProspectioninterestQuery The current query, for fluid interface
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
     * @param   Prospectioninterest $prospectioninterest Object to remove from the list of results
     *
     * @return ProspectioninterestQuery The current query, for fluid interface
     */
    public function prune($prospectioninterest = null)
    {
        if ($prospectioninterest) {
            $this->addUsingAlias(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $prospectioninterest->getIdprospectioninterest(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
