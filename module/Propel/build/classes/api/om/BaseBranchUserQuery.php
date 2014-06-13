<?php


/**
 * Base class that represents a query for the 'branch_user' table.
 *
 *
 *
 * @method BranchUserQuery orderByIdbranchUser($order = Criteria::ASC) Order by the idbranch_user column
 * @method BranchUserQuery orderByIdbranch($order = Criteria::ASC) Order by the idbranch column
 * @method BranchUserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 *
 * @method BranchUserQuery groupByIdbranchUser() Group by the idbranch_user column
 * @method BranchUserQuery groupByIdbranch() Group by the idbranch column
 * @method BranchUserQuery groupByIduser() Group by the iduser column
 *
 * @method BranchUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BranchUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BranchUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BranchUserQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method BranchUserQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method BranchUserQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method BranchUserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method BranchUserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method BranchUserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method BranchUser findOne(PropelPDO $con = null) Return the first BranchUser matching the query
 * @method BranchUser findOneOrCreate(PropelPDO $con = null) Return the first BranchUser matching the query, or a new BranchUser object populated from the query conditions when no match is found
 *
 * @method BranchUser findOneByIdbranch(int $idbranch) Return the first BranchUser filtered by the idbranch column
 * @method BranchUser findOneByIduser(int $iduser) Return the first BranchUser filtered by the iduser column
 *
 * @method array findByIdbranchUser(int $idbranch_user) Return BranchUser objects filtered by the idbranch_user column
 * @method array findByIdbranch(int $idbranch) Return BranchUser objects filtered by the idbranch column
 * @method array findByIduser(int $iduser) Return BranchUser objects filtered by the iduser column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranchUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBranchUserQuery object.
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
            $modelName = 'BranchUser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BranchUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BranchUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BranchUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BranchUserQuery) {
            return $criteria;
        }
        $query = new BranchUserQuery(null, null, $modelAlias);

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
     * @return   BranchUser|BranchUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BranchUserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BranchUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BranchUser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbranchUser($key, $con = null)
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
     * @return                 BranchUser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbranch_user`, `idbranch`, `iduser` FROM `branch_user` WHERE `idbranch_user` = :p0';
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
            $obj = new BranchUser();
            $obj->hydrate($row);
            BranchUserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BranchUser|BranchUser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BranchUser[]|mixed the list of results, formatted by the current formatter
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
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbranch_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranchUser(1234); // WHERE idbranch_user = 1234
     * $query->filterByIdbranchUser(array(12, 34)); // WHERE idbranch_user IN (12, 34)
     * $query->filterByIdbranchUser(array('min' => 12)); // WHERE idbranch_user >= 12
     * $query->filterByIdbranchUser(array('max' => 12)); // WHERE idbranch_user <= 12
     * </code>
     *
     * @param     mixed $idbranchUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function filterByIdbranchUser($idbranchUser = null, $comparison = null)
    {
        if (is_array($idbranchUser)) {
            $useMinMax = false;
            if (isset($idbranchUser['min'])) {
                $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $idbranchUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranchUser['max'])) {
                $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $idbranchUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $idbranchUser, $comparison);
    }

    /**
     * Filter the query on the idbranch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranch(1234); // WHERE idbranch = 1234
     * $query->filterByIdbranch(array(12, 34)); // WHERE idbranch IN (12, 34)
     * $query->filterByIdbranch(array('min' => 12)); // WHERE idbranch >= 12
     * $query->filterByIdbranch(array('max' => 12)); // WHERE idbranch <= 12
     * </code>
     *
     * @see       filterByBranch()
     *
     * @param     mixed $idbranch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function filterByIdbranch($idbranch = null, $comparison = null)
    {
        if (is_array($idbranch)) {
            $useMinMax = false;
            if (isset($idbranch['min'])) {
                $this->addUsingAlias(BranchUserPeer::IDBRANCH, $idbranch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranch['max'])) {
                $this->addUsingAlias(BranchUserPeer::IDBRANCH, $idbranch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserPeer::IDBRANCH, $idbranch, $comparison);
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
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(BranchUserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(BranchUserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query by a related Branch object
     *
     * @param   Branch|PropelObjectCollection $branch The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranch($branch, $comparison = null)
    {
        if ($branch instanceof Branch) {
            return $this
                ->addUsingAlias(BranchUserPeer::IDBRANCH, $branch->getIdbranch(), $comparison);
        } elseif ($branch instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchUserPeer::IDBRANCH, $branch->toKeyValue('PrimaryKey', 'Idbranch'), $comparison);
        } else {
            throw new PropelException('filterByBranch() only accepts arguments of type Branch or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Branch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function joinBranch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Branch');

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
            $this->addJoinObject($join, 'Branch');
        }

        return $this;
    }

    /**
     * Use the Branch relation Branch object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchQuery A secondary query class using the current class as primary query
     */
    public function useBranchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Branch', 'BranchQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(BranchUserPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchUserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return BranchUserQuery The current query, for fluid interface
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
     * @param   BranchUser $branchUser Object to remove from the list of results
     *
     * @return BranchUserQuery The current query, for fluid interface
     */
    public function prune($branchUser = null)
    {
        if ($branchUser) {
            $this->addUsingAlias(BranchUserPeer::IDBRANCH_USER, $branchUser->getIdbranchUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
