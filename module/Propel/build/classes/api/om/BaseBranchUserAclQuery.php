<?php


/**
 * Base class that represents a query for the 'branch_user_acl' table.
 *
 *
 *
 * @method BranchUserAclQuery orderByIdbranchUserAcl($order = Criteria::ASC) Order by the idbranch_user_acl column
 * @method BranchUserAclQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method BranchUserAclQuery orderByIdbranch($order = Criteria::ASC) Order by the idbranch column
 * @method BranchUserAclQuery orderByModuleName($order = Criteria::ASC) Order by the module_name column
 * @method BranchUserAclQuery orderByUserAccesslevel($order = Criteria::ASC) Order by the user_accesslevel column
 *
 * @method BranchUserAclQuery groupByIdbranchUserAcl() Group by the idbranch_user_acl column
 * @method BranchUserAclQuery groupByIduser() Group by the iduser column
 * @method BranchUserAclQuery groupByIdbranch() Group by the idbranch column
 * @method BranchUserAclQuery groupByModuleName() Group by the module_name column
 * @method BranchUserAclQuery groupByUserAccesslevel() Group by the user_accesslevel column
 *
 * @method BranchUserAclQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BranchUserAclQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BranchUserAclQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BranchUserAclQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method BranchUserAclQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method BranchUserAclQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method BranchUserAclQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method BranchUserAclQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method BranchUserAclQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method BranchUserAcl findOne(PropelPDO $con = null) Return the first BranchUserAcl matching the query
 * @method BranchUserAcl findOneOrCreate(PropelPDO $con = null) Return the first BranchUserAcl matching the query, or a new BranchUserAcl object populated from the query conditions when no match is found
 *
 * @method BranchUserAcl findOneByIduser(int $iduser) Return the first BranchUserAcl filtered by the iduser column
 * @method BranchUserAcl findOneByIdbranch(int $idbranch) Return the first BranchUserAcl filtered by the idbranch column
 * @method BranchUserAcl findOneByModuleName(string $module_name) Return the first BranchUserAcl filtered by the module_name column
 * @method BranchUserAcl findOneByUserAccesslevel(string $user_accesslevel) Return the first BranchUserAcl filtered by the user_accesslevel column
 *
 * @method array findByIdbranchUserAcl(int $idbranch_user_acl) Return BranchUserAcl objects filtered by the idbranch_user_acl column
 * @method array findByIduser(int $iduser) Return BranchUserAcl objects filtered by the iduser column
 * @method array findByIdbranch(int $idbranch) Return BranchUserAcl objects filtered by the idbranch column
 * @method array findByModuleName(string $module_name) Return BranchUserAcl objects filtered by the module_name column
 * @method array findByUserAccesslevel(string $user_accesslevel) Return BranchUserAcl objects filtered by the user_accesslevel column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranchUserAclQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBranchUserAclQuery object.
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
            $modelName = 'BranchUserAcl';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BranchUserAclQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BranchUserAclQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BranchUserAclQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BranchUserAclQuery) {
            return $criteria;
        }
        $query = new BranchUserAclQuery(null, null, $modelAlias);

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
     * @return   BranchUserAcl|BranchUserAcl[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BranchUserAclPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BranchUserAclPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BranchUserAcl A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbranchUserAcl($key, $con = null)
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
     * @return                 BranchUserAcl A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbranch_user_acl`, `iduser`, `idbranch`, `module_name`, `user_accesslevel` FROM `branch_user_acl` WHERE `idbranch_user_acl` = :p0';
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
            $obj = new BranchUserAcl();
            $obj->hydrate($row);
            BranchUserAclPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BranchUserAcl|BranchUserAcl[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BranchUserAcl[]|mixed the list of results, formatted by the current formatter
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
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbranch_user_acl column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranchUserAcl(1234); // WHERE idbranch_user_acl = 1234
     * $query->filterByIdbranchUserAcl(array(12, 34)); // WHERE idbranch_user_acl IN (12, 34)
     * $query->filterByIdbranchUserAcl(array('min' => 12)); // WHERE idbranch_user_acl >= 12
     * $query->filterByIdbranchUserAcl(array('max' => 12)); // WHERE idbranch_user_acl <= 12
     * </code>
     *
     * @param     mixed $idbranchUserAcl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByIdbranchUserAcl($idbranchUserAcl = null, $comparison = null)
    {
        if (is_array($idbranchUserAcl)) {
            $useMinMax = false;
            if (isset($idbranchUserAcl['min'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $idbranchUserAcl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranchUserAcl['max'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $idbranchUserAcl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $idbranchUserAcl, $comparison);
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
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserAclPeer::IDUSER, $iduser, $comparison);
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
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByIdbranch($idbranch = null, $comparison = null)
    {
        if (is_array($idbranch)) {
            $useMinMax = false;
            if (isset($idbranch['min'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDBRANCH, $idbranch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranch['max'])) {
                $this->addUsingAlias(BranchUserAclPeer::IDBRANCH, $idbranch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchUserAclPeer::IDBRANCH, $idbranch, $comparison);
    }

    /**
     * Filter the query on the module_name column
     *
     * Example usage:
     * <code>
     * $query->filterByModuleName('fooValue');   // WHERE module_name = 'fooValue'
     * $query->filterByModuleName('%fooValue%'); // WHERE module_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $moduleName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByModuleName($moduleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($moduleName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $moduleName)) {
                $moduleName = str_replace('*', '%', $moduleName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchUserAclPeer::MODULE_NAME, $moduleName, $comparison);
    }

    /**
     * Filter the query on the user_accesslevel column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAccesslevel('fooValue');   // WHERE user_accesslevel = 'fooValue'
     * $query->filterByUserAccesslevel('%fooValue%'); // WHERE user_accesslevel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userAccesslevel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function filterByUserAccesslevel($userAccesslevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userAccesslevel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userAccesslevel)) {
                $userAccesslevel = str_replace('*', '%', $userAccesslevel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchUserAclPeer::USER_ACCESSLEVEL, $userAccesslevel, $comparison);
    }

    /**
     * Filter the query by a related Branch object
     *
     * @param   Branch|PropelObjectCollection $branch The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchUserAclQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranch($branch, $comparison = null)
    {
        if ($branch instanceof Branch) {
            return $this
                ->addUsingAlias(BranchUserAclPeer::IDBRANCH, $branch->getIdbranch(), $comparison);
        } elseif ($branch instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchUserAclPeer::IDBRANCH, $branch->toKeyValue('PrimaryKey', 'Idbranch'), $comparison);
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
     * @return BranchUserAclQuery The current query, for fluid interface
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
     * @return                 BranchUserAclQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(BranchUserAclPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchUserAclPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return BranchUserAclQuery The current query, for fluid interface
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
     * @param   BranchUserAcl $branchUserAcl Object to remove from the list of results
     *
     * @return BranchUserAclQuery The current query, for fluid interface
     */
    public function prune($branchUserAcl = null)
    {
        if ($branchUserAcl) {
            $this->addUsingAlias(BranchUserAclPeer::IDBRANCH_USER_ACL, $branchUserAcl->getIdbranchUserAcl(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
