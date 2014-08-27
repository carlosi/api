<?php


/**
 * Base class that represents a query for the 'user' table.
 *
 *
 *
 * @method UserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method UserQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method UserQuery orderByUserNickname($order = Criteria::ASC) Order by the user_nickname column
 * @method UserQuery orderByUserPassword($order = Criteria::ASC) Order by the user_password column
 * @method UserQuery orderByUserType($order = Criteria::ASC) Order by the user_type column
 * @method UserQuery orderByUserStatus($order = Criteria::ASC) Order by the user_status column
 *
 * @method UserQuery groupByIduser() Group by the iduser column
 * @method UserQuery groupByIdcompany() Group by the idcompany column
 * @method UserQuery groupByUserNickname() Group by the user_nickname column
 * @method UserQuery groupByUserPassword() Group by the user_password column
 * @method UserQuery groupByUserType() Group by the user_type column
 * @method UserQuery groupByUserStatus() Group by the user_status column
 *
 * @method UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method UserQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method UserQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method UserQuery leftJoinBranchUserAcl($relationAlias = null) Adds a LEFT JOIN clause to the query using the BranchUserAcl relation
 * @method UserQuery rightJoinBranchUserAcl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BranchUserAcl relation
 * @method UserQuery innerJoinBranchUserAcl($relationAlias = null) Adds a INNER JOIN clause to the query using the BranchUserAcl relation
 *
 * @method UserQuery leftJoinChatcorp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatcorp relation
 * @method UserQuery rightJoinChatcorp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatcorp relation
 * @method UserQuery innerJoinChatcorp($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatcorp relation
 *
 * @method UserQuery leftJoinChatpublic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatpublic relation
 * @method UserQuery rightJoinChatpublic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatpublic relation
 * @method UserQuery innerJoinChatpublic($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatpublic relation
 *
 * @method UserQuery leftJoinDepartmentleader($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departmentleader relation
 * @method UserQuery rightJoinDepartmentleader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departmentleader relation
 * @method UserQuery innerJoinDepartmentleader($relationAlias = null) Adds a INNER JOIN clause to the query using the Departmentleader relation
 *
 * @method UserQuery leftJoinDepartmentmember($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departmentmember relation
 * @method UserQuery rightJoinDepartmentmember($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departmentmember relation
 * @method UserQuery innerJoinDepartmentmember($relationAlias = null) Adds a INNER JOIN clause to the query using the Departmentmember relation
 *
 * @method UserQuery leftJoinLoguser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Loguser relation
 * @method UserQuery rightJoinLoguser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Loguser relation
 * @method UserQuery innerJoinLoguser($relationAlias = null) Adds a INNER JOIN clause to the query using the Loguser relation
 *
 * @method UserQuery leftJoinMlquestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mlquestion relation
 * @method UserQuery rightJoinMlquestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mlquestion relation
 * @method UserQuery innerJoinMlquestion($relationAlias = null) Adds a INNER JOIN clause to the query using the Mlquestion relation
 *
 * @method UserQuery leftJoinOrdercomment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ordercomment relation
 * @method UserQuery rightJoinOrdercomment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ordercomment relation
 * @method UserQuery innerJoinOrdercomment($relationAlias = null) Adds a INNER JOIN clause to the query using the Ordercomment relation
 *
 * @method UserQuery leftJoinOrderconflictComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderconflictComment relation
 * @method UserQuery rightJoinOrderconflictComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderconflictComment relation
 * @method UserQuery innerJoinOrderconflictComment($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderconflictComment relation
 *
 * @method UserQuery leftJoinOrderfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderfile relation
 * @method UserQuery rightJoinOrderfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderfile relation
 * @method UserQuery innerJoinOrderfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderfile relation
 *
 * @method UserQuery leftJoinProductionordercomment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionordercomment relation
 * @method UserQuery rightJoinProductionordercomment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionordercomment relation
 * @method UserQuery innerJoinProductionordercomment($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionordercomment relation
 *
 * @method UserQuery leftJoinProductionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionuser relation
 * @method UserQuery rightJoinProductionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionuser relation
 * @method UserQuery innerJoinProductionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionuser relation
 *
 * @method UserQuery leftJoinProjectactivitypost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivitypost relation
 * @method UserQuery rightJoinProjectactivitypost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivitypost relation
 * @method UserQuery innerJoinProjectactivitypost($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivitypost relation
 *
 * @method UserQuery leftJoinProjectactivityuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivityuser relation
 * @method UserQuery rightJoinProjectactivityuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivityuser relation
 * @method UserQuery innerJoinProjectactivityuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivityuser relation
 *
 * @method UserQuery leftJoinProspectioninterest($relationAlias = null) Adds a LEFT JOIN clause to the query using the Prospectioninterest relation
 * @method UserQuery rightJoinProspectioninterest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Prospectioninterest relation
 * @method UserQuery innerJoinProspectioninterest($relationAlias = null) Adds a INNER JOIN clause to the query using the Prospectioninterest relation
 *
 * @method UserQuery leftJoinQuoutenote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quoutenote relation
 * @method UserQuery rightJoinQuoutenote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quoutenote relation
 * @method UserQuery innerJoinQuoutenote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quoutenote relation
 *
 * @method UserQuery leftJoinStaff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Staff relation
 * @method UserQuery rightJoinStaff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Staff relation
 * @method UserQuery innerJoinStaff($relationAlias = null) Adds a INNER JOIN clause to the query using the Staff relation
 *
 * @method UserQuery leftJoinToken($relationAlias = null) Adds a LEFT JOIN clause to the query using the Token relation
 * @method UserQuery rightJoinToken($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Token relation
 * @method UserQuery innerJoinToken($relationAlias = null) Adds a INNER JOIN clause to the query using the Token relation
 *
 * @method UserQuery leftJoinTriggerprospectionnote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospectionnote relation
 * @method UserQuery rightJoinTriggerprospectionnote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospectionnote relation
 * @method UserQuery innerJoinTriggerprospectionnote($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospectionnote relation
 *
 * @method UserQuery leftJoinTriggerprospectionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospectionuser relation
 * @method UserQuery rightJoinTriggerprospectionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospectionuser relation
 * @method UserQuery innerJoinTriggerprospectionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospectionuser relation
 *
 * @method UserQuery leftJoinUseraccesslog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Useraccesslog relation
 * @method UserQuery rightJoinUseraccesslog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Useraccesslog relation
 * @method UserQuery innerJoinUseraccesslog($relationAlias = null) Adds a INNER JOIN clause to the query using the Useraccesslog relation
 *
 * @method User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method User findOneByIdcompany(int $idcompany) Return the first User filtered by the idcompany column
 * @method User findOneByUserNickname(string $user_nickname) Return the first User filtered by the user_nickname column
 * @method User findOneByUserPassword(string $user_password) Return the first User filtered by the user_password column
 * @method User findOneByUserType(string $user_type) Return the first User filtered by the user_type column
 * @method User findOneByUserStatus(string $user_status) Return the first User filtered by the user_status column
 *
 * @method array findByIduser(int $iduser) Return User objects filtered by the iduser column
 * @method array findByIdcompany(int $idcompany) Return User objects filtered by the idcompany column
 * @method array findByUserNickname(string $user_nickname) Return User objects filtered by the user_nickname column
 * @method array findByUserPassword(string $user_password) Return User objects filtered by the user_password column
 * @method array findByUserType(string $user_type) Return User objects filtered by the user_type column
 * @method array findByUserStatus(string $user_status) Return User objects filtered by the user_status column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserQuery object.
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
            $modelName = 'User';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserQuery) {
            return $criteria;
        }
        $query = new UserQuery(null, null, $modelAlias);

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
     * @return   User|User[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 User A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIduser($key, $con = null)
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
     * @return                 User A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iduser`, `idcompany`, `user_nickname`, `user_password`, `user_type`, `user_status` FROM `user` WHERE `iduser` = :p0';
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
            $obj = new User();
            $obj->hydrate($row);
            UserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return User|User[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|User[]|mixed the list of results, formatted by the current formatter
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
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserPeer::IDUSER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserPeer::IDUSER, $keys, Criteria::IN);
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
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(UserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(UserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idcompany column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompany(1234); // WHERE idcompany = 1234
     * $query->filterByIdcompany(array(12, 34)); // WHERE idcompany IN (12, 34)
     * $query->filterByIdcompany(array('min' => 12)); // WHERE idcompany >= 12
     * $query->filterByIdcompany(array('max' => 12)); // WHERE idcompany <= 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(UserPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(UserPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the user_nickname column
     *
     * Example usage:
     * <code>
     * $query->filterByUserNickname('fooValue');   // WHERE user_nickname = 'fooValue'
     * $query->filterByUserNickname('%fooValue%'); // WHERE user_nickname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userNickname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUserNickname($userNickname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userNickname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userNickname)) {
                $userNickname = str_replace('*', '%', $userNickname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USER_NICKNAME, $userNickname, $comparison);
    }

    /**
     * Filter the query on the user_password column
     *
     * Example usage:
     * <code>
     * $query->filterByUserPassword('fooValue');   // WHERE user_password = 'fooValue'
     * $query->filterByUserPassword('%fooValue%'); // WHERE user_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userPassword The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUserPassword($userPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userPassword)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userPassword)) {
                $userPassword = str_replace('*', '%', $userPassword);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USER_PASSWORD, $userPassword, $comparison);
    }

    /**
     * Filter the query on the user_type column
     *
     * Example usage:
     * <code>
     * $query->filterByUserType('fooValue');   // WHERE user_type = 'fooValue'
     * $query->filterByUserType('%fooValue%'); // WHERE user_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUserType($userType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userType)) {
                $userType = str_replace('*', '%', $userType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USER_TYPE, $userType, $comparison);
    }

    /**
     * Filter the query on the user_status column
     *
     * Example usage:
     * <code>
     * $query->filterByUserStatus('fooValue');   // WHERE user_status = 'fooValue'
     * $query->filterByUserStatus('%fooValue%'); // WHERE user_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function filterByUserStatus($userStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userStatus)) {
                $userStatus = str_replace('*', '%', $userStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserPeer::USER_STATUS, $userStatus, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(UserPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type Company or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

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
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
    }

    /**
     * Filter the query by a related BranchUserAcl object
     *
     * @param   BranchUserAcl|PropelObjectCollection $branchUserAcl  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranchUserAcl($branchUserAcl, $comparison = null)
    {
        if ($branchUserAcl instanceof BranchUserAcl) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $branchUserAcl->getIduser(), $comparison);
        } elseif ($branchUserAcl instanceof PropelObjectCollection) {
            return $this
                ->useBranchUserAclQuery()
                ->filterByPrimaryKeys($branchUserAcl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBranchUserAcl() only accepts arguments of type BranchUserAcl or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BranchUserAcl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinBranchUserAcl($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BranchUserAcl');

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
            $this->addJoinObject($join, 'BranchUserAcl');
        }

        return $this;
    }

    /**
     * Use the BranchUserAcl relation BranchUserAcl object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchUserAclQuery A secondary query class using the current class as primary query
     */
    public function useBranchUserAclQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranchUserAcl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BranchUserAcl', 'BranchUserAclQuery');
    }

    /**
     * Filter the query by a related Chatcorp object
     *
     * @param   Chatcorp|PropelObjectCollection $chatcorp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatcorp($chatcorp, $comparison = null)
    {
        if ($chatcorp instanceof Chatcorp) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $chatcorp->getIduser(), $comparison);
        } elseif ($chatcorp instanceof PropelObjectCollection) {
            return $this
                ->useChatcorpQuery()
                ->filterByPrimaryKeys($chatcorp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChatcorp() only accepts arguments of type Chatcorp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Chatcorp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinChatcorp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Chatcorp');

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
            $this->addJoinObject($join, 'Chatcorp');
        }

        return $this;
    }

    /**
     * Use the Chatcorp relation Chatcorp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChatcorpQuery A secondary query class using the current class as primary query
     */
    public function useChatcorpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChatcorp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Chatcorp', 'ChatcorpQuery');
    }

    /**
     * Filter the query by a related Chatpublic object
     *
     * @param   Chatpublic|PropelObjectCollection $chatpublic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatpublic($chatpublic, $comparison = null)
    {
        if ($chatpublic instanceof Chatpublic) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $chatpublic->getIduser(), $comparison);
        } elseif ($chatpublic instanceof PropelObjectCollection) {
            return $this
                ->useChatpublicQuery()
                ->filterByPrimaryKeys($chatpublic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChatpublic() only accepts arguments of type Chatpublic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Chatpublic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinChatpublic($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Chatpublic');

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
            $this->addJoinObject($join, 'Chatpublic');
        }

        return $this;
    }

    /**
     * Use the Chatpublic relation Chatpublic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChatpublicQuery A secondary query class using the current class as primary query
     */
    public function useChatpublicQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinChatpublic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Chatpublic', 'ChatpublicQuery');
    }

    /**
     * Filter the query by a related Departmentleader object
     *
     * @param   Departmentleader|PropelObjectCollection $departmentleader  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartmentleader($departmentleader, $comparison = null)
    {
        if ($departmentleader instanceof Departmentleader) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $departmentleader->getIduser(), $comparison);
        } elseif ($departmentleader instanceof PropelObjectCollection) {
            return $this
                ->useDepartmentleaderQuery()
                ->filterByPrimaryKeys($departmentleader->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDepartmentleader() only accepts arguments of type Departmentleader or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departmentleader relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinDepartmentleader($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departmentleader');

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
            $this->addJoinObject($join, 'Departmentleader');
        }

        return $this;
    }

    /**
     * Use the Departmentleader relation Departmentleader object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentleaderQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentleaderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartmentleader($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departmentleader', 'DepartmentleaderQuery');
    }

    /**
     * Filter the query by a related Departmentmember object
     *
     * @param   Departmentmember|PropelObjectCollection $departmentmember  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartmentmember($departmentmember, $comparison = null)
    {
        if ($departmentmember instanceof Departmentmember) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $departmentmember->getIduser(), $comparison);
        } elseif ($departmentmember instanceof PropelObjectCollection) {
            return $this
                ->useDepartmentmemberQuery()
                ->filterByPrimaryKeys($departmentmember->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDepartmentmember() only accepts arguments of type Departmentmember or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Departmentmember relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinDepartmentmember($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Departmentmember');

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
            $this->addJoinObject($join, 'Departmentmember');
        }

        return $this;
    }

    /**
     * Use the Departmentmember relation Departmentmember object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentmemberQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentmemberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartmentmember($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Departmentmember', 'DepartmentmemberQuery');
    }

    /**
     * Filter the query by a related Loguser object
     *
     * @param   Loguser|PropelObjectCollection $loguser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLoguser($loguser, $comparison = null)
    {
        if ($loguser instanceof Loguser) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $loguser->getIduser(), $comparison);
        } elseif ($loguser instanceof PropelObjectCollection) {
            return $this
                ->useLoguserQuery()
                ->filterByPrimaryKeys($loguser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLoguser() only accepts arguments of type Loguser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Loguser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinLoguser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Loguser');

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
            $this->addJoinObject($join, 'Loguser');
        }

        return $this;
    }

    /**
     * Use the Loguser relation Loguser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   LoguserQuery A secondary query class using the current class as primary query
     */
    public function useLoguserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLoguser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Loguser', 'LoguserQuery');
    }

    /**
     * Filter the query by a related Mlquestion object
     *
     * @param   Mlquestion|PropelObjectCollection $mlquestion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMlquestion($mlquestion, $comparison = null)
    {
        if ($mlquestion instanceof Mlquestion) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $mlquestion->getIduser(), $comparison);
        } elseif ($mlquestion instanceof PropelObjectCollection) {
            return $this
                ->useMlquestionQuery()
                ->filterByPrimaryKeys($mlquestion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMlquestion() only accepts arguments of type Mlquestion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mlquestion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinMlquestion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mlquestion');

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
            $this->addJoinObject($join, 'Mlquestion');
        }

        return $this;
    }

    /**
     * Use the Mlquestion relation Mlquestion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MlquestionQuery A secondary query class using the current class as primary query
     */
    public function useMlquestionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMlquestion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mlquestion', 'MlquestionQuery');
    }

    /**
     * Filter the query by a related Ordercomment object
     *
     * @param   Ordercomment|PropelObjectCollection $ordercomment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrdercomment($ordercomment, $comparison = null)
    {
        if ($ordercomment instanceof Ordercomment) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $ordercomment->getIduser(), $comparison);
        } elseif ($ordercomment instanceof PropelObjectCollection) {
            return $this
                ->useOrdercommentQuery()
                ->filterByPrimaryKeys($ordercomment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrdercomment() only accepts arguments of type Ordercomment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ordercomment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinOrdercomment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ordercomment');

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
            $this->addJoinObject($join, 'Ordercomment');
        }

        return $this;
    }

    /**
     * Use the Ordercomment relation Ordercomment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrdercommentQuery A secondary query class using the current class as primary query
     */
    public function useOrdercommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrdercomment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ordercomment', 'OrdercommentQuery');
    }

    /**
     * Filter the query by a related OrderconflictComment object
     *
     * @param   OrderconflictComment|PropelObjectCollection $orderconflictComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderconflictComment($orderconflictComment, $comparison = null)
    {
        if ($orderconflictComment instanceof OrderconflictComment) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $orderconflictComment->getIduser(), $comparison);
        } elseif ($orderconflictComment instanceof PropelObjectCollection) {
            return $this
                ->useOrderconflictCommentQuery()
                ->filterByPrimaryKeys($orderconflictComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderconflictComment() only accepts arguments of type OrderconflictComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderconflictComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinOrderconflictComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderconflictComment');

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
            $this->addJoinObject($join, 'OrderconflictComment');
        }

        return $this;
    }

    /**
     * Use the OrderconflictComment relation OrderconflictComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderconflictCommentQuery A secondary query class using the current class as primary query
     */
    public function useOrderconflictCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderconflictComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderconflictComment', 'OrderconflictCommentQuery');
    }

    /**
     * Filter the query by a related Orderfile object
     *
     * @param   Orderfile|PropelObjectCollection $orderfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderfile($orderfile, $comparison = null)
    {
        if ($orderfile instanceof Orderfile) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $orderfile->getIduser(), $comparison);
        } elseif ($orderfile instanceof PropelObjectCollection) {
            return $this
                ->useOrderfileQuery()
                ->filterByPrimaryKeys($orderfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrderfile() only accepts arguments of type Orderfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinOrderfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderfile');

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
            $this->addJoinObject($join, 'Orderfile');
        }

        return $this;
    }

    /**
     * Use the Orderfile relation Orderfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderfileQuery A secondary query class using the current class as primary query
     */
    public function useOrderfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderfile', 'OrderfileQuery');
    }

    /**
     * Filter the query by a related Productionordercomment object
     *
     * @param   Productionordercomment|PropelObjectCollection $productionordercomment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionordercomment($productionordercomment, $comparison = null)
    {
        if ($productionordercomment instanceof Productionordercomment) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $productionordercomment->getIduser(), $comparison);
        } elseif ($productionordercomment instanceof PropelObjectCollection) {
            return $this
                ->useProductionordercommentQuery()
                ->filterByPrimaryKeys($productionordercomment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionordercomment() only accepts arguments of type Productionordercomment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionordercomment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinProductionordercomment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionordercomment');

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
            $this->addJoinObject($join, 'Productionordercomment');
        }

        return $this;
    }

    /**
     * Use the Productionordercomment relation Productionordercomment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionordercommentQuery A secondary query class using the current class as primary query
     */
    public function useProductionordercommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionordercomment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionordercomment', 'ProductionordercommentQuery');
    }

    /**
     * Filter the query by a related Productionuser object
     *
     * @param   Productionuser|PropelObjectCollection $productionuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionuser($productionuser, $comparison = null)
    {
        if ($productionuser instanceof Productionuser) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $productionuser->getIduser(), $comparison);
        } elseif ($productionuser instanceof PropelObjectCollection) {
            return $this
                ->useProductionuserQuery()
                ->filterByPrimaryKeys($productionuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionuser() only accepts arguments of type Productionuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinProductionuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionuser');

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
            $this->addJoinObject($join, 'Productionuser');
        }

        return $this;
    }

    /**
     * Use the Productionuser relation Productionuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionuserQuery A secondary query class using the current class as primary query
     */
    public function useProductionuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionuser', 'ProductionuserQuery');
    }

    /**
     * Filter the query by a related Projectactivitypost object
     *
     * @param   Projectactivitypost|PropelObjectCollection $projectactivitypost  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivitypost($projectactivitypost, $comparison = null)
    {
        if ($projectactivitypost instanceof Projectactivitypost) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $projectactivitypost->getIduser(), $comparison);
        } elseif ($projectactivitypost instanceof PropelObjectCollection) {
            return $this
                ->useProjectactivitypostQuery()
                ->filterByPrimaryKeys($projectactivitypost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectactivitypost() only accepts arguments of type Projectactivitypost or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projectactivitypost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinProjectactivitypost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projectactivitypost');

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
            $this->addJoinObject($join, 'Projectactivitypost');
        }

        return $this;
    }

    /**
     * Use the Projectactivitypost relation Projectactivitypost object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectactivitypostQuery A secondary query class using the current class as primary query
     */
    public function useProjectactivitypostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectactivitypost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projectactivitypost', 'ProjectactivitypostQuery');
    }

    /**
     * Filter the query by a related Projectactivityuser object
     *
     * @param   Projectactivityuser|PropelObjectCollection $projectactivityuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivityuser($projectactivityuser, $comparison = null)
    {
        if ($projectactivityuser instanceof Projectactivityuser) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $projectactivityuser->getIduser(), $comparison);
        } elseif ($projectactivityuser instanceof PropelObjectCollection) {
            return $this
                ->useProjectactivityuserQuery()
                ->filterByPrimaryKeys($projectactivityuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectactivityuser() only accepts arguments of type Projectactivityuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projectactivityuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinProjectactivityuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projectactivityuser');

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
            $this->addJoinObject($join, 'Projectactivityuser');
        }

        return $this;
    }

    /**
     * Use the Projectactivityuser relation Projectactivityuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectactivityuserQuery A secondary query class using the current class as primary query
     */
    public function useProjectactivityuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectactivityuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projectactivityuser', 'ProjectactivityuserQuery');
    }

    /**
     * Filter the query by a related Prospectioninterest object
     *
     * @param   Prospectioninterest|PropelObjectCollection $prospectioninterest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProspectioninterest($prospectioninterest, $comparison = null)
    {
        if ($prospectioninterest instanceof Prospectioninterest) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $prospectioninterest->getIduser(), $comparison);
        } elseif ($prospectioninterest instanceof PropelObjectCollection) {
            return $this
                ->useProspectioninterestQuery()
                ->filterByPrimaryKeys($prospectioninterest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProspectioninterest() only accepts arguments of type Prospectioninterest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Prospectioninterest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinProspectioninterest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Prospectioninterest');

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
            $this->addJoinObject($join, 'Prospectioninterest');
        }

        return $this;
    }

    /**
     * Use the Prospectioninterest relation Prospectioninterest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProspectioninterestQuery A secondary query class using the current class as primary query
     */
    public function useProspectioninterestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProspectioninterest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Prospectioninterest', 'ProspectioninterestQuery');
    }

    /**
     * Filter the query by a related Quoutenote object
     *
     * @param   Quoutenote|PropelObjectCollection $quoutenote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuoutenote($quoutenote, $comparison = null)
    {
        if ($quoutenote instanceof Quoutenote) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $quoutenote->getIduser(), $comparison);
        } elseif ($quoutenote instanceof PropelObjectCollection) {
            return $this
                ->useQuoutenoteQuery()
                ->filterByPrimaryKeys($quoutenote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuoutenote() only accepts arguments of type Quoutenote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quoutenote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinQuoutenote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quoutenote');

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
            $this->addJoinObject($join, 'Quoutenote');
        }

        return $this;
    }

    /**
     * Use the Quoutenote relation Quoutenote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoutenoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoutenoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuoutenote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quoutenote', 'QuoutenoteQuery');
    }

    /**
     * Filter the query by a related Staff object
     *
     * @param   Staff|PropelObjectCollection $staff  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStaff($staff, $comparison = null)
    {
        if ($staff instanceof Staff) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $staff->getIduser(), $comparison);
        } elseif ($staff instanceof PropelObjectCollection) {
            return $this
                ->useStaffQuery()
                ->filterByPrimaryKeys($staff->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStaff() only accepts arguments of type Staff or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Staff relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinStaff($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Staff');

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
            $this->addJoinObject($join, 'Staff');
        }

        return $this;
    }

    /**
     * Use the Staff relation Staff object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StaffQuery A secondary query class using the current class as primary query
     */
    public function useStaffQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStaff($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Staff', 'StaffQuery');
    }

    /**
     * Filter the query by a related Token object
     *
     * @param   Token|PropelObjectCollection $token  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByToken($token, $comparison = null)
    {
        if ($token instanceof Token) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $token->getIduser(), $comparison);
        } elseif ($token instanceof PropelObjectCollection) {
            return $this
                ->useTokenQuery()
                ->filterByPrimaryKeys($token->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByToken() only accepts arguments of type Token or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Token relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinToken($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Token');

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
            $this->addJoinObject($join, 'Token');
        }

        return $this;
    }

    /**
     * Use the Token relation Token object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TokenQuery A secondary query class using the current class as primary query
     */
    public function useTokenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinToken($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Token', 'TokenQuery');
    }

    /**
     * Filter the query by a related Triggerprospectionnote object
     *
     * @param   Triggerprospectionnote|PropelObjectCollection $triggerprospectionnote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospectionnote($triggerprospectionnote, $comparison = null)
    {
        if ($triggerprospectionnote instanceof Triggerprospectionnote) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $triggerprospectionnote->getIduser(), $comparison);
        } elseif ($triggerprospectionnote instanceof PropelObjectCollection) {
            return $this
                ->useTriggerprospectionnoteQuery()
                ->filterByPrimaryKeys($triggerprospectionnote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTriggerprospectionnote() only accepts arguments of type Triggerprospectionnote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Triggerprospectionnote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinTriggerprospectionnote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Triggerprospectionnote');

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
            $this->addJoinObject($join, 'Triggerprospectionnote');
        }

        return $this;
    }

    /**
     * Use the Triggerprospectionnote relation Triggerprospectionnote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TriggerprospectionnoteQuery A secondary query class using the current class as primary query
     */
    public function useTriggerprospectionnoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTriggerprospectionnote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Triggerprospectionnote', 'TriggerprospectionnoteQuery');
    }

    /**
     * Filter the query by a related Triggerprospectionuser object
     *
     * @param   Triggerprospectionuser|PropelObjectCollection $triggerprospectionuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospectionuser($triggerprospectionuser, $comparison = null)
    {
        if ($triggerprospectionuser instanceof Triggerprospectionuser) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $triggerprospectionuser->getIduser(), $comparison);
        } elseif ($triggerprospectionuser instanceof PropelObjectCollection) {
            return $this
                ->useTriggerprospectionuserQuery()
                ->filterByPrimaryKeys($triggerprospectionuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTriggerprospectionuser() only accepts arguments of type Triggerprospectionuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Triggerprospectionuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinTriggerprospectionuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Triggerprospectionuser');

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
            $this->addJoinObject($join, 'Triggerprospectionuser');
        }

        return $this;
    }

    /**
     * Use the Triggerprospectionuser relation Triggerprospectionuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TriggerprospectionuserQuery A secondary query class using the current class as primary query
     */
    public function useTriggerprospectionuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTriggerprospectionuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Triggerprospectionuser', 'TriggerprospectionuserQuery');
    }

    /**
     * Filter the query by a related Useraccesslog object
     *
     * @param   Useraccesslog|PropelObjectCollection $useraccesslog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUseraccesslog($useraccesslog, $comparison = null)
    {
        if ($useraccesslog instanceof Useraccesslog) {
            return $this
                ->addUsingAlias(UserPeer::IDUSER, $useraccesslog->getIduser(), $comparison);
        } elseif ($useraccesslog instanceof PropelObjectCollection) {
            return $this
                ->useUseraccesslogQuery()
                ->filterByPrimaryKeys($useraccesslog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUseraccesslog() only accepts arguments of type Useraccesslog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Useraccesslog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function joinUseraccesslog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Useraccesslog');

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
            $this->addJoinObject($join, 'Useraccesslog');
        }

        return $this;
    }

    /**
     * Use the Useraccesslog relation Useraccesslog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UseraccesslogQuery A secondary query class using the current class as primary query
     */
    public function useUseraccesslogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUseraccesslog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Useraccesslog', 'UseraccesslogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   User $user Object to remove from the list of results
     *
     * @return UserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserPeer::IDUSER, $user->getIduser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
