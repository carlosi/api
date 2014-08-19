<?php


/**
 * Base class that represents a query for the 'orderconflict_comment' table.
 *
 *
 *
 * @method OrderconflictCommentQuery orderByIdorderconflictComment($order = Criteria::ASC) Order by the idorderconflict_comment column
 * @method OrderconflictCommentQuery orderByIdorderconflict($order = Criteria::ASC) Order by the idorderconflict column
 * @method OrderconflictCommentQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method OrderconflictCommentQuery orderByOrderconflictComment($order = Criteria::ASC) Order by the orderconflict_comment column
 * @method OrderconflictCommentQuery orderByOrderconflictCommentDate($order = Criteria::ASC) Order by the orderconflict_comment_date column
 *
 * @method OrderconflictCommentQuery groupByIdorderconflictComment() Group by the idorderconflict_comment column
 * @method OrderconflictCommentQuery groupByIdorderconflict() Group by the idorderconflict column
 * @method OrderconflictCommentQuery groupByIduser() Group by the iduser column
 * @method OrderconflictCommentQuery groupByOrderconflictComment() Group by the orderconflict_comment column
 * @method OrderconflictCommentQuery groupByOrderconflictCommentDate() Group by the orderconflict_comment_date column
 *
 * @method OrderconflictCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrderconflictCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrderconflictCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrderconflictCommentQuery leftJoinOrderconflict($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderconflict relation
 * @method OrderconflictCommentQuery rightJoinOrderconflict($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderconflict relation
 * @method OrderconflictCommentQuery innerJoinOrderconflict($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderconflict relation
 *
 * @method OrderconflictCommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method OrderconflictCommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method OrderconflictCommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method OrderconflictComment findOne(PropelPDO $con = null) Return the first OrderconflictComment matching the query
 * @method OrderconflictComment findOneOrCreate(PropelPDO $con = null) Return the first OrderconflictComment matching the query, or a new OrderconflictComment object populated from the query conditions when no match is found
 *
 * @method OrderconflictComment findOneByIdorderconflict(int $idorderconflict) Return the first OrderconflictComment filtered by the idorderconflict column
 * @method OrderconflictComment findOneByIduser(int $iduser) Return the first OrderconflictComment filtered by the iduser column
 * @method OrderconflictComment findOneByOrderconflictComment(string $orderconflict_comment) Return the first OrderconflictComment filtered by the orderconflict_comment column
 * @method OrderconflictComment findOneByOrderconflictCommentDate(string $orderconflict_comment_date) Return the first OrderconflictComment filtered by the orderconflict_comment_date column
 *
 * @method array findByIdorderconflictComment(int $idorderconflict_comment) Return OrderconflictComment objects filtered by the idorderconflict_comment column
 * @method array findByIdorderconflict(int $idorderconflict) Return OrderconflictComment objects filtered by the idorderconflict column
 * @method array findByIduser(int $iduser) Return OrderconflictComment objects filtered by the iduser column
 * @method array findByOrderconflictComment(string $orderconflict_comment) Return OrderconflictComment objects filtered by the orderconflict_comment column
 * @method array findByOrderconflictCommentDate(string $orderconflict_comment_date) Return OrderconflictComment objects filtered by the orderconflict_comment_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrderconflictCommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrderconflictCommentQuery object.
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
            $modelName = 'OrderconflictComment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrderconflictCommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrderconflictCommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrderconflictCommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrderconflictCommentQuery) {
            return $criteria;
        }
        $query = new OrderconflictCommentQuery(null, null, $modelAlias);

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
     * @return   OrderconflictComment|OrderconflictComment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderconflictCommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrderconflictCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrderconflictComment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdorderconflictComment($key, $con = null)
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
     * @return                 OrderconflictComment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idorderconflict_comment`, `idorderconflict`, `iduser`, `orderconflict_comment`, `orderconflict_comment_date` FROM `orderconflict_comment` WHERE `idorderconflict_comment` = :p0';
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
            $obj = new OrderconflictComment();
            $obj->hydrate($row);
            OrderconflictCommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrderconflictComment|OrderconflictComment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrderconflictComment[]|mixed the list of results, formatted by the current formatter
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
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idorderconflict_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderconflictComment(1234); // WHERE idorderconflict_comment = 1234
     * $query->filterByIdorderconflictComment(array(12, 34)); // WHERE idorderconflict_comment IN (12, 34)
     * $query->filterByIdorderconflictComment(array('min' => 12)); // WHERE idorderconflict_comment >= 12
     * $query->filterByIdorderconflictComment(array('max' => 12)); // WHERE idorderconflict_comment <= 12
     * </code>
     *
     * @param     mixed $idorderconflictComment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByIdorderconflictComment($idorderconflictComment = null, $comparison = null)
    {
        if (is_array($idorderconflictComment)) {
            $useMinMax = false;
            if (isset($idorderconflictComment['min'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $idorderconflictComment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderconflictComment['max'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $idorderconflictComment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $idorderconflictComment, $comparison);
    }

    /**
     * Filter the query on the idorderconflict column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderconflict(1234); // WHERE idorderconflict = 1234
     * $query->filterByIdorderconflict(array(12, 34)); // WHERE idorderconflict IN (12, 34)
     * $query->filterByIdorderconflict(array('min' => 12)); // WHERE idorderconflict >= 12
     * $query->filterByIdorderconflict(array('max' => 12)); // WHERE idorderconflict <= 12
     * </code>
     *
     * @see       filterByOrderconflict()
     *
     * @param     mixed $idorderconflict The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByIdorderconflict($idorderconflict = null, $comparison = null)
    {
        if (is_array($idorderconflict)) {
            $useMinMax = false;
            if (isset($idorderconflict['min'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT, $idorderconflict['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderconflict['max'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT, $idorderconflict['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT, $idorderconflict, $comparison);
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
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictCommentPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the orderconflict_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderconflictComment('fooValue');   // WHERE orderconflict_comment = 'fooValue'
     * $query->filterByOrderconflictComment('%fooValue%'); // WHERE orderconflict_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderconflictComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByOrderconflictComment($orderconflictComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderconflictComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderconflictComment)) {
                $orderconflictComment = str_replace('*', '%', $orderconflictComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderconflictCommentPeer::ORDERCONFLICT_COMMENT, $orderconflictComment, $comparison);
    }

    /**
     * Filter the query on the orderconflict_comment_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderconflictCommentDate('2011-03-14'); // WHERE orderconflict_comment_date = '2011-03-14'
     * $query->filterByOrderconflictCommentDate('now'); // WHERE orderconflict_comment_date = '2011-03-14'
     * $query->filterByOrderconflictCommentDate(array('max' => 'yesterday')); // WHERE orderconflict_comment_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $orderconflictCommentDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function filterByOrderconflictCommentDate($orderconflictCommentDate = null, $comparison = null)
    {
        if (is_array($orderconflictCommentDate)) {
            $useMinMax = false;
            if (isset($orderconflictCommentDate['min'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::ORDERCONFLICT_COMMENT_DATE, $orderconflictCommentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderconflictCommentDate['max'])) {
                $this->addUsingAlias(OrderconflictCommentPeer::ORDERCONFLICT_COMMENT_DATE, $orderconflictCommentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderconflictCommentPeer::ORDERCONFLICT_COMMENT_DATE, $orderconflictCommentDate, $comparison);
    }

    /**
     * Filter the query by a related Orderconflict object
     *
     * @param   Orderconflict|PropelObjectCollection $orderconflict The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderconflictCommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderconflict($orderconflict, $comparison = null)
    {
        if ($orderconflict instanceof Orderconflict) {
            return $this
                ->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT, $orderconflict->getIdorderconflict(), $comparison);
        } elseif ($orderconflict instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT, $orderconflict->toKeyValue('PrimaryKey', 'Idorderconflict'), $comparison);
        } else {
            throw new PropelException('filterByOrderconflict() only accepts arguments of type Orderconflict or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderconflict relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function joinOrderconflict($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderconflict');

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
            $this->addJoinObject($join, 'Orderconflict');
        }

        return $this;
    }

    /**
     * Use the Orderconflict relation Orderconflict object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderconflictQuery A secondary query class using the current class as primary query
     */
    public function useOrderconflictQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderconflict($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderconflict', 'OrderconflictQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrderconflictCommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(OrderconflictCommentPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderconflictCommentPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return OrderconflictCommentQuery The current query, for fluid interface
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
     * @param   OrderconflictComment $orderconflictComment Object to remove from the list of results
     *
     * @return OrderconflictCommentQuery The current query, for fluid interface
     */
    public function prune($orderconflictComment = null)
    {
        if ($orderconflictComment) {
            $this->addUsingAlias(OrderconflictCommentPeer::IDORDERCONFLICT_COMMENT, $orderconflictComment->getIdorderconflictComment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
