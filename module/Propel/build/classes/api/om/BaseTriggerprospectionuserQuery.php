<?php


/**
 * Base class that represents a query for the 'triggerprospectionuser' table.
 *
 *
 *
 * @method TriggerprospectionuserQuery orderByIdtriggerprospectionuser($order = Criteria::ASC) Order by the idtriggerprospectionuser column
 * @method TriggerprospectionuserQuery orderByIdtriggerprospection($order = Criteria::ASC) Order by the idtriggerprospection column
 * @method TriggerprospectionuserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 *
 * @method TriggerprospectionuserQuery groupByIdtriggerprospectionuser() Group by the idtriggerprospectionuser column
 * @method TriggerprospectionuserQuery groupByIdtriggerprospection() Group by the idtriggerprospection column
 * @method TriggerprospectionuserQuery groupByIduser() Group by the iduser column
 *
 * @method TriggerprospectionuserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TriggerprospectionuserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TriggerprospectionuserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TriggerprospectionuserQuery leftJoinTriggerprospection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospection relation
 * @method TriggerprospectionuserQuery rightJoinTriggerprospection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospection relation
 * @method TriggerprospectionuserQuery innerJoinTriggerprospection($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospection relation
 *
 * @method TriggerprospectionuserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method TriggerprospectionuserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method TriggerprospectionuserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Triggerprospectionuser findOne(PropelPDO $con = null) Return the first Triggerprospectionuser matching the query
 * @method Triggerprospectionuser findOneOrCreate(PropelPDO $con = null) Return the first Triggerprospectionuser matching the query, or a new Triggerprospectionuser object populated from the query conditions when no match is found
 *
 * @method Triggerprospectionuser findOneByIdtriggerprospection(int $idtriggerprospection) Return the first Triggerprospectionuser filtered by the idtriggerprospection column
 * @method Triggerprospectionuser findOneByIduser(int $iduser) Return the first Triggerprospectionuser filtered by the iduser column
 *
 * @method array findByIdtriggerprospectionuser(int $idtriggerprospectionuser) Return Triggerprospectionuser objects filtered by the idtriggerprospectionuser column
 * @method array findByIdtriggerprospection(int $idtriggerprospection) Return Triggerprospectionuser objects filtered by the idtriggerprospection column
 * @method array findByIduser(int $iduser) Return Triggerprospectionuser objects filtered by the iduser column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseTriggerprospectionuserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTriggerprospectionuserQuery object.
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
            $modelName = 'Triggerprospectionuser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TriggerprospectionuserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TriggerprospectionuserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TriggerprospectionuserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TriggerprospectionuserQuery) {
            return $criteria;
        }
        $query = new TriggerprospectionuserQuery(null, null, $modelAlias);

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
     * @return   Triggerprospectionuser|Triggerprospectionuser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TriggerprospectionuserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TriggerprospectionuserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Triggerprospectionuser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtriggerprospectionuser($key, $con = null)
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
     * @return                 Triggerprospectionuser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtriggerprospectionuser`, `idtriggerprospection`, `iduser` FROM `triggerprospectionuser` WHERE `idtriggerprospectionuser` = :p0';
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
            $obj = new Triggerprospectionuser();
            $obj->hydrate($row);
            TriggerprospectionuserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Triggerprospectionuser|Triggerprospectionuser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Triggerprospectionuser[]|mixed the list of results, formatted by the current formatter
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
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtriggerprospectionuser column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtriggerprospectionuser(1234); // WHERE idtriggerprospectionuser = 1234
     * $query->filterByIdtriggerprospectionuser(array(12, 34)); // WHERE idtriggerprospectionuser IN (12, 34)
     * $query->filterByIdtriggerprospectionuser(array('min' => 12)); // WHERE idtriggerprospectionuser >= 12
     * $query->filterByIdtriggerprospectionuser(array('max' => 12)); // WHERE idtriggerprospectionuser <= 12
     * </code>
     *
     * @param     mixed $idtriggerprospectionuser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospectionuser($idtriggerprospectionuser = null, $comparison = null)
    {
        if (is_array($idtriggerprospectionuser)) {
            $useMinMax = false;
            if (isset($idtriggerprospectionuser['min'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $idtriggerprospectionuser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospectionuser['max'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $idtriggerprospectionuser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $idtriggerprospectionuser, $comparison);
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
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospection($idtriggerprospection = null, $comparison = null)
    {
        if (is_array($idtriggerprospection)) {
            $useMinMax = false;
            if (isset($idtriggerprospection['min'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospection['max'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTION, $idtriggerprospection, $comparison);
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
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(TriggerprospectionuserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionuserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query by a related Triggerprospection object
     *
     * @param   Triggerprospection|PropelObjectCollection $triggerprospection The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospection($triggerprospection, $comparison = null)
    {
        if ($triggerprospection instanceof Triggerprospection) {
            return $this
                ->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTION, $triggerprospection->getIdtriggerprospection(), $comparison);
        } elseif ($triggerprospection instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTION, $triggerprospection->toKeyValue('PrimaryKey', 'Idtriggerprospection'), $comparison);
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
     * @return TriggerprospectionuserQuery The current query, for fluid interface
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
     * @return                 TriggerprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TriggerprospectionuserPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TriggerprospectionuserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return TriggerprospectionuserQuery The current query, for fluid interface
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
     * @param   Triggerprospectionuser $triggerprospectionuser Object to remove from the list of results
     *
     * @return TriggerprospectionuserQuery The current query, for fluid interface
     */
    public function prune($triggerprospectionuser = null)
    {
        if ($triggerprospectionuser) {
            $this->addUsingAlias(TriggerprospectionuserPeer::IDTRIGGERPROSPECTIONUSER, $triggerprospectionuser->getIdtriggerprospectionuser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
