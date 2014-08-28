<?php


/**
 * Base class that represents a query for the 'token' table.
 *
 *
 *
 * @method TokenQuery orderByIdtoken($order = Criteria::ASC) Order by the idtoken column
 * @method TokenQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method TokenQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method TokenQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method TokenQuery orderByExpiresIn($order = Criteria::ASC) Order by the expires_in column
 *
 * @method TokenQuery groupByIdtoken() Group by the idtoken column
 * @method TokenQuery groupByIduser() Group by the iduser column
 * @method TokenQuery groupByToken() Group by the token column
 * @method TokenQuery groupByCreatedAt() Group by the created_at column
 * @method TokenQuery groupByExpiresIn() Group by the expires_in column
 *
 * @method TokenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TokenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TokenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TokenQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method TokenQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method TokenQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Token findOne(PropelPDO $con = null) Return the first Token matching the query
 * @method Token findOneOrCreate(PropelPDO $con = null) Return the first Token matching the query, or a new Token object populated from the query conditions when no match is found
 *
 * @method Token findOneByIduser(int $iduser) Return the first Token filtered by the iduser column
 * @method Token findOneByToken(string $token) Return the first Token filtered by the token column
 * @method Token findOneByCreatedAt(string $created_at) Return the first Token filtered by the created_at column
 * @method Token findOneByExpiresIn(string $expires_in) Return the first Token filtered by the expires_in column
 *
 * @method array findByIdtoken(int $idtoken) Return Token objects filtered by the idtoken column
 * @method array findByIduser(int $iduser) Return Token objects filtered by the iduser column
 * @method array findByToken(string $token) Return Token objects filtered by the token column
 * @method array findByCreatedAt(string $created_at) Return Token objects filtered by the created_at column
 * @method array findByExpiresIn(string $expires_in) Return Token objects filtered by the expires_in column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseTokenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTokenQuery object.
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
            $modelName = 'Token';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TokenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TokenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TokenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TokenQuery) {
            return $criteria;
        }
        $query = new TokenQuery(null, null, $modelAlias);

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
     * @return   Token|Token[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TokenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TokenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Token A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtoken($key, $con = null)
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
     * @return                 Token A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtoken`, `iduser`, `token`, `created_at`, `expires_in` FROM `token` WHERE `idtoken` = :p0';
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
            $obj = new Token();
            $obj->hydrate($row);
            TokenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Token|Token[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Token[]|mixed the list of results, formatted by the current formatter
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
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TokenPeer::IDTOKEN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TokenPeer::IDTOKEN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtoken column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtoken(1234); // WHERE idtoken = 1234
     * $query->filterByIdtoken(array(12, 34)); // WHERE idtoken IN (12, 34)
     * $query->filterByIdtoken(array('min' => 12)); // WHERE idtoken >= 12
     * $query->filterByIdtoken(array('max' => 12)); // WHERE idtoken <= 12
     * </code>
     *
     * @param     mixed $idtoken The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByIdtoken($idtoken = null, $comparison = null)
    {
        if (is_array($idtoken)) {
            $useMinMax = false;
            if (isset($idtoken['min'])) {
                $this->addUsingAlias(TokenPeer::IDTOKEN, $idtoken['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtoken['max'])) {
                $this->addUsingAlias(TokenPeer::IDTOKEN, $idtoken['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::IDTOKEN, $idtoken, $comparison);
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
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(TokenPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(TokenPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $token)) {
                $token = str_replace('*', '%', $token);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TokenPeer::TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TokenPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TokenPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the expires_in column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiresIn('2011-03-14'); // WHERE expires_in = '2011-03-14'
     * $query->filterByExpiresIn('now'); // WHERE expires_in = '2011-03-14'
     * $query->filterByExpiresIn(array('max' => 'yesterday')); // WHERE expires_in < '2011-03-13'
     * </code>
     *
     * @param     mixed $expiresIn The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function filterByExpiresIn($expiresIn = null, $comparison = null)
    {
        if (is_array($expiresIn)) {
            $useMinMax = false;
            if (isset($expiresIn['min'])) {
                $this->addUsingAlias(TokenPeer::EXPIRES_IN, $expiresIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiresIn['max'])) {
                $this->addUsingAlias(TokenPeer::EXPIRES_IN, $expiresIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TokenPeer::EXPIRES_IN, $expiresIn, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TokenQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(TokenPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TokenPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return TokenQuery The current query, for fluid interface
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
     * @param   Token $token Object to remove from the list of results
     *
     * @return TokenQuery The current query, for fluid interface
     */
    public function prune($token = null)
    {
        if ($token) {
            $this->addUsingAlias(TokenPeer::IDTOKEN, $token->getIdtoken(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
