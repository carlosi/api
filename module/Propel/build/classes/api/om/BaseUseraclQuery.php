<?php


/**
 * Base class that represents a query for the 'useracl' table.
 *
 *
 *
 * @method UseraclQuery orderByIduseracl($order = Criteria::ASC) Order by the iduseracl column
 * @method UseraclQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method UseraclQuery orderByModuleName($order = Criteria::ASC) Order by the module_name column
 * @method UseraclQuery orderByUserAccesslevel($order = Criteria::ASC) Order by the user_accesslevel column
 *
 * @method UseraclQuery groupByIduseracl() Group by the iduseracl column
 * @method UseraclQuery groupByIduser() Group by the iduser column
 * @method UseraclQuery groupByModuleName() Group by the module_name column
 * @method UseraclQuery groupByUserAccesslevel() Group by the user_accesslevel column
 *
 * @method UseraclQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UseraclQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UseraclQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UseraclQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method UseraclQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method UseraclQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Useracl findOne(PropelPDO $con = null) Return the first Useracl matching the query
 * @method Useracl findOneOrCreate(PropelPDO $con = null) Return the first Useracl matching the query, or a new Useracl object populated from the query conditions when no match is found
 *
 * @method Useracl findOneByIduser(int $iduser) Return the first Useracl filtered by the iduser column
 * @method Useracl findOneByModuleName(string $module_name) Return the first Useracl filtered by the module_name column
 * @method Useracl findOneByUserAccesslevel(string $user_accesslevel) Return the first Useracl filtered by the user_accesslevel column
 *
 * @method array findByIduseracl(int $iduseracl) Return Useracl objects filtered by the iduseracl column
 * @method array findByIduser(int $iduser) Return Useracl objects filtered by the iduser column
 * @method array findByModuleName(string $module_name) Return Useracl objects filtered by the module_name column
 * @method array findByUserAccesslevel(string $user_accesslevel) Return Useracl objects filtered by the user_accesslevel column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseUseraclQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUseraclQuery object.
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
            $modelName = 'Useracl';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UseraclQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UseraclQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UseraclQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UseraclQuery) {
            return $criteria;
        }
        $query = new UseraclQuery(null, null, $modelAlias);

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
     * @return   Useracl|Useracl[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UseraclPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UseraclPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Useracl A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIduseracl($key, $con = null)
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
     * @return                 Useracl A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iduseracl`, `iduser`, `module_name`, `user_accesslevel` FROM `useracl` WHERE `iduseracl` = :p0';
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
            $obj = new Useracl();
            $obj->hydrate($row);
            UseraclPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Useracl|Useracl[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Useracl[]|mixed the list of results, formatted by the current formatter
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
     * @return UseraclQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UseraclPeer::IDUSERACL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UseraclQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UseraclPeer::IDUSERACL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iduseracl column
     *
     * Example usage:
     * <code>
     * $query->filterByIduseracl(1234); // WHERE iduseracl = 1234
     * $query->filterByIduseracl(array(12, 34)); // WHERE iduseracl IN (12, 34)
     * $query->filterByIduseracl(array('min' => 12)); // WHERE iduseracl >= 12
     * $query->filterByIduseracl(array('max' => 12)); // WHERE iduseracl <= 12
     * </code>
     *
     * @param     mixed $iduseracl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UseraclQuery The current query, for fluid interface
     */
    public function filterByIduseracl($iduseracl = null, $comparison = null)
    {
        if (is_array($iduseracl)) {
            $useMinMax = false;
            if (isset($iduseracl['min'])) {
                $this->addUsingAlias(UseraclPeer::IDUSERACL, $iduseracl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduseracl['max'])) {
                $this->addUsingAlias(UseraclPeer::IDUSERACL, $iduseracl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseraclPeer::IDUSERACL, $iduseracl, $comparison);
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
     * @return UseraclQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(UseraclPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(UseraclPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseraclPeer::IDUSER, $iduser, $comparison);
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
     * @return UseraclQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UseraclPeer::MODULE_NAME, $moduleName, $comparison);
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
     * @return UseraclQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UseraclPeer::USER_ACCESSLEVEL, $userAccesslevel, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UseraclQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(UseraclPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UseraclPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return UseraclQuery The current query, for fluid interface
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
     * @param   Useracl $useracl Object to remove from the list of results
     *
     * @return UseraclQuery The current query, for fluid interface
     */
    public function prune($useracl = null)
    {
        if ($useracl) {
            $this->addUsingAlias(UseraclPeer::IDUSERACL, $useracl->getIduseracl(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
