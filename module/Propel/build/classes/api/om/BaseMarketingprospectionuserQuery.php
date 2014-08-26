<?php


/**
 * Base class that represents a query for the 'marketingprospectionuser' table.
 *
 *
 *
 * @method MarketingprospectionuserQuery orderByIdmarketingprospectionuser($order = Criteria::ASC) Order by the idmarketingprospectionuser column
 * @method MarketingprospectionuserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method MarketingprospectionuserQuery orderByIdmarketingprospection($order = Criteria::ASC) Order by the idmarketingprospection column
 *
 * @method MarketingprospectionuserQuery groupByIdmarketingprospectionuser() Group by the idmarketingprospectionuser column
 * @method MarketingprospectionuserQuery groupByIduser() Group by the iduser column
 * @method MarketingprospectionuserQuery groupByIdmarketingprospection() Group by the idmarketingprospection column
 *
 * @method MarketingprospectionuserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketingprospectionuserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketingprospectionuserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MarketingprospectionuserQuery leftJoinMarketingprospection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospection relation
 * @method MarketingprospectionuserQuery rightJoinMarketingprospection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospection relation
 * @method MarketingprospectionuserQuery innerJoinMarketingprospection($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospection relation
 *
 * @method MarketingprospectionuserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method MarketingprospectionuserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method MarketingprospectionuserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method MarketingprospectionuserQuery leftJoinMarketingprospectioninteraction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospectioninteraction relation
 * @method MarketingprospectionuserQuery rightJoinMarketingprospectioninteraction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospectioninteraction relation
 * @method MarketingprospectionuserQuery innerJoinMarketingprospectioninteraction($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospectioninteraction relation
 *
 * @method MarketingprospectionuserQuery leftJoinMarketingprospectionnote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingprospectionnote relation
 * @method MarketingprospectionuserQuery rightJoinMarketingprospectionnote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingprospectionnote relation
 * @method MarketingprospectionuserQuery innerJoinMarketingprospectionnote($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingprospectionnote relation
 *
 * @method Marketingprospectionuser findOne(PropelPDO $con = null) Return the first Marketingprospectionuser matching the query
 * @method Marketingprospectionuser findOneOrCreate(PropelPDO $con = null) Return the first Marketingprospectionuser matching the query, or a new Marketingprospectionuser object populated from the query conditions when no match is found
 *
 * @method Marketingprospectionuser findOneByIduser(int $iduser) Return the first Marketingprospectionuser filtered by the iduser column
 * @method Marketingprospectionuser findOneByIdmarketingprospection(int $idmarketingprospection) Return the first Marketingprospectionuser filtered by the idmarketingprospection column
 *
 * @method array findByIdmarketingprospectionuser(int $idmarketingprospectionuser) Return Marketingprospectionuser objects filtered by the idmarketingprospectionuser column
 * @method array findByIduser(int $iduser) Return Marketingprospectionuser objects filtered by the iduser column
 * @method array findByIdmarketingprospection(int $idmarketingprospection) Return Marketingprospectionuser objects filtered by the idmarketingprospection column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectionuserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketingprospectionuserQuery object.
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
            $modelName = 'Marketingprospectionuser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketingprospectionuserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketingprospectionuserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketingprospectionuserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketingprospectionuserQuery) {
            return $criteria;
        }
        $query = new MarketingprospectionuserQuery(null, null, $modelAlias);

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
     * @return   Marketingprospectionuser|Marketingprospectionuser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketingprospectionuserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketingprospectionuserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketingprospectionuser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketingprospectionuser($key, $con = null)
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
     * @return                 Marketingprospectionuser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketingprospectionuser`, `iduser`, `idmarketingprospection` FROM `marketingprospectionuser` WHERE `idmarketingprospectionuser` = :p0';
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
            $obj = new Marketingprospectionuser();
            $obj->hydrate($row);
            MarketingprospectionuserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketingprospectionuser|Marketingprospectionuser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketingprospectionuser[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $keys, Criteria::IN);
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
     * @param     mixed $idmarketingprospectionuser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospectionuser($idmarketingprospectionuser = null, $comparison = null)
    {
        if (is_array($idmarketingprospectionuser)) {
            $useMinMax = false;
            if (isset($idmarketingprospectionuser['min'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospectionuser['max'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $idmarketingprospectionuser, $comparison);
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
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionuserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idmarketingprospection column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketingprospection(1234); // WHERE idmarketingprospection = 1234
     * $query->filterByIdmarketingprospection(array(12, 34)); // WHERE idmarketingprospection IN (12, 34)
     * $query->filterByIdmarketingprospection(array('min' => 12)); // WHERE idmarketingprospection >= 12
     * $query->filterByIdmarketingprospection(array('max' => 12)); // WHERE idmarketingprospection <= 12
     * </code>
     *
     * @see       filterByMarketingprospection()
     *
     * @param     mixed $idmarketingprospection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function filterByIdmarketingprospection($idmarketingprospection = null, $comparison = null)
    {
        if (is_array($idmarketingprospection)) {
            $useMinMax = false;
            if (isset($idmarketingprospection['min'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $idmarketingprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketingprospection['max'])) {
                $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $idmarketingprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $idmarketingprospection, $comparison);
    }

    /**
     * Filter the query by a related Marketingprospection object
     *
     * @param   Marketingprospection|PropelObjectCollection $marketingprospection The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospection($marketingprospection, $comparison = null)
    {
        if ($marketingprospection instanceof Marketingprospection) {
            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $marketingprospection->getIdmarketingprospection(), $comparison);
        } elseif ($marketingprospection instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $marketingprospection->toKeyValue('PrimaryKey', 'Idmarketingprospection'), $comparison);
        } else {
            throw new PropelException('filterByMarketingprospection() only accepts arguments of type Marketingprospection or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingprospection relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function joinMarketingprospection($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingprospection');

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
            $this->addJoinObject($join, 'Marketingprospection');
        }

        return $this;
    }

    /**
     * Use the Marketingprospection relation Marketingprospection object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingprospectionQuery A secondary query class using the current class as primary query
     */
    public function useMarketingprospectionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingprospection($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingprospection', 'MarketingprospectionQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return MarketingprospectionuserQuery The current query, for fluid interface
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
     * Filter the query by a related Marketingprospectioninteraction object
     *
     * @param   Marketingprospectioninteraction|PropelObjectCollection $marketingprospectioninteraction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospectioninteraction($marketingprospectioninteraction, $comparison = null)
    {
        if ($marketingprospectioninteraction instanceof Marketingprospectioninteraction) {
            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectioninteraction->getIdmarketingprospectionuser(), $comparison);
        } elseif ($marketingprospectioninteraction instanceof PropelObjectCollection) {
            return $this
                ->useMarketingprospectioninteractionQuery()
                ->filterByPrimaryKeys($marketingprospectioninteraction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingprospectioninteraction() only accepts arguments of type Marketingprospectioninteraction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingprospectioninteraction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function joinMarketingprospectioninteraction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingprospectioninteraction');

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
            $this->addJoinObject($join, 'Marketingprospectioninteraction');
        }

        return $this;
    }

    /**
     * Use the Marketingprospectioninteraction relation Marketingprospectioninteraction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingprospectioninteractionQuery A secondary query class using the current class as primary query
     */
    public function useMarketingprospectioninteractionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingprospectioninteraction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingprospectioninteraction', 'MarketingprospectioninteractionQuery');
    }

    /**
     * Filter the query by a related Marketingprospectionnote object
     *
     * @param   Marketingprospectionnote|PropelObjectCollection $marketingprospectionnote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MarketingprospectionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingprospectionnote($marketingprospectionnote, $comparison = null)
    {
        if ($marketingprospectionnote instanceof Marketingprospectionnote) {
            return $this
                ->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionnote->getIdmarketingprospectionuser(), $comparison);
        } elseif ($marketingprospectionnote instanceof PropelObjectCollection) {
            return $this
                ->useMarketingprospectionnoteQuery()
                ->filterByPrimaryKeys($marketingprospectionnote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingprospectionnote() only accepts arguments of type Marketingprospectionnote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingprospectionnote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function joinMarketingprospectionnote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingprospectionnote');

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
            $this->addJoinObject($join, 'Marketingprospectionnote');
        }

        return $this;
    }

    /**
     * Use the Marketingprospectionnote relation Marketingprospectionnote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingprospectionnoteQuery A secondary query class using the current class as primary query
     */
    public function useMarketingprospectionnoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingprospectionnote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingprospectionnote', 'MarketingprospectionnoteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Marketingprospectionuser $marketingprospectionuser Object to remove from the list of results
     *
     * @return MarketingprospectionuserQuery The current query, for fluid interface
     */
    public function prune($marketingprospectionuser = null)
    {
        if ($marketingprospectionuser) {
            $this->addUsingAlias(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $marketingprospectionuser->getIdmarketingprospectionuser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
