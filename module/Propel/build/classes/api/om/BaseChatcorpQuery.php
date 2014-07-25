<?php


/**
 * Base class that represents a query for the 'chatcorp' table.
 *
 *
 *
 * @method ChatcorpQuery orderByIdchatcorp($order = Criteria::ASC) Order by the idchatcorp column
 * @method ChatcorpQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ChatcorpQuery orderByChatcorpMessage($order = Criteria::ASC) Order by the chatcorp_message column
 * @method ChatcorpQuery orderByChatcorpDate($order = Criteria::ASC) Order by the chatcorp_date column
 *
 * @method ChatcorpQuery groupByIdchatcorp() Group by the idchatcorp column
 * @method ChatcorpQuery groupByIduser() Group by the iduser column
 * @method ChatcorpQuery groupByChatcorpMessage() Group by the chatcorp_message column
 * @method ChatcorpQuery groupByChatcorpDate() Group by the chatcorp_date column
 *
 * @method ChatcorpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ChatcorpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ChatcorpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ChatcorpQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ChatcorpQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ChatcorpQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method ChatcorpQuery leftJoinChatcorpAttachedfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the ChatcorpAttachedfile relation
 * @method ChatcorpQuery rightJoinChatcorpAttachedfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ChatcorpAttachedfile relation
 * @method ChatcorpQuery innerJoinChatcorpAttachedfile($relationAlias = null) Adds a INNER JOIN clause to the query using the ChatcorpAttachedfile relation
 *
 * @method Chatcorp findOne(PropelPDO $con = null) Return the first Chatcorp matching the query
 * @method Chatcorp findOneOrCreate(PropelPDO $con = null) Return the first Chatcorp matching the query, or a new Chatcorp object populated from the query conditions when no match is found
 *
 * @method Chatcorp findOneByIduser(int $iduser) Return the first Chatcorp filtered by the iduser column
 * @method Chatcorp findOneByChatcorpMessage(string $chatcorp_message) Return the first Chatcorp filtered by the chatcorp_message column
 * @method Chatcorp findOneByChatcorpDate(string $chatcorp_date) Return the first Chatcorp filtered by the chatcorp_date column
 *
 * @method array findByIdchatcorp(int $idchatcorp) Return Chatcorp objects filtered by the idchatcorp column
 * @method array findByIduser(int $iduser) Return Chatcorp objects filtered by the iduser column
 * @method array findByChatcorpMessage(string $chatcorp_message) Return Chatcorp objects filtered by the chatcorp_message column
 * @method array findByChatcorpDate(string $chatcorp_date) Return Chatcorp objects filtered by the chatcorp_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatcorpQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseChatcorpQuery object.
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
            $modelName = 'Chatcorp';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChatcorpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ChatcorpQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChatcorpQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChatcorpQuery) {
            return $criteria;
        }
        $query = new ChatcorpQuery(null, null, $modelAlias);

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
     * @return   Chatcorp|Chatcorp[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatcorpPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Chatcorp A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdchatcorp($key, $con = null)
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
     * @return                 Chatcorp A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idchatcorp`, `iduser`, `chatcorp_message`, `chatcorp_date` FROM `chatcorp` WHERE `idchatcorp` = :p0';
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
            $obj = new Chatcorp();
            $obj->hydrate($row);
            ChatcorpPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Chatcorp|Chatcorp[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Chatcorp[]|mixed the list of results, formatted by the current formatter
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
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idchatcorp column
     *
     * Example usage:
     * <code>
     * $query->filterByIdchatcorp(1234); // WHERE idchatcorp = 1234
     * $query->filterByIdchatcorp(array(12, 34)); // WHERE idchatcorp IN (12, 34)
     * $query->filterByIdchatcorp(array('min' => 12)); // WHERE idchatcorp >= 12
     * $query->filterByIdchatcorp(array('max' => 12)); // WHERE idchatcorp <= 12
     * </code>
     *
     * @param     mixed $idchatcorp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByIdchatcorp($idchatcorp = null, $comparison = null)
    {
        if (is_array($idchatcorp)) {
            $useMinMax = false;
            if (isset($idchatcorp['min'])) {
                $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $idchatcorp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatcorp['max'])) {
                $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $idchatcorp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $idchatcorp, $comparison);
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
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ChatcorpPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ChatcorpPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatcorpPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the chatcorp_message column
     *
     * Example usage:
     * <code>
     * $query->filterByChatcorpMessage('fooValue');   // WHERE chatcorp_message = 'fooValue'
     * $query->filterByChatcorpMessage('%fooValue%'); // WHERE chatcorp_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chatcorpMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByChatcorpMessage($chatcorpMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chatcorpMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chatcorpMessage)) {
                $chatcorpMessage = str_replace('*', '%', $chatcorpMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatcorpPeer::CHATCORP_MESSAGE, $chatcorpMessage, $comparison);
    }

    /**
     * Filter the query on the chatcorp_date column
     *
     * Example usage:
     * <code>
     * $query->filterByChatcorpDate('2011-03-14'); // WHERE chatcorp_date = '2011-03-14'
     * $query->filterByChatcorpDate('now'); // WHERE chatcorp_date = '2011-03-14'
     * $query->filterByChatcorpDate(array('max' => 'yesterday')); // WHERE chatcorp_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $chatcorpDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function filterByChatcorpDate($chatcorpDate = null, $comparison = null)
    {
        if (is_array($chatcorpDate)) {
            $useMinMax = false;
            if (isset($chatcorpDate['min'])) {
                $this->addUsingAlias(ChatcorpPeer::CHATCORP_DATE, $chatcorpDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chatcorpDate['max'])) {
                $this->addUsingAlias(ChatcorpPeer::CHATCORP_DATE, $chatcorpDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatcorpPeer::CHATCORP_DATE, $chatcorpDate, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatcorpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ChatcorpPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatcorpPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return ChatcorpQuery The current query, for fluid interface
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
     * Filter the query by a related ChatcorpAttachedfile object
     *
     * @param   ChatcorpAttachedfile|PropelObjectCollection $chatcorpAttachedfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatcorpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatcorpAttachedfile($chatcorpAttachedfile, $comparison = null)
    {
        if ($chatcorpAttachedfile instanceof ChatcorpAttachedfile) {
            return $this
                ->addUsingAlias(ChatcorpPeer::IDCHATCORP, $chatcorpAttachedfile->getIdchatcorp(), $comparison);
        } elseif ($chatcorpAttachedfile instanceof PropelObjectCollection) {
            return $this
                ->useChatcorpAttachedfileQuery()
                ->filterByPrimaryKeys($chatcorpAttachedfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChatcorpAttachedfile() only accepts arguments of type ChatcorpAttachedfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ChatcorpAttachedfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function joinChatcorpAttachedfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ChatcorpAttachedfile');

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
            $this->addJoinObject($join, 'ChatcorpAttachedfile');
        }

        return $this;
    }

    /**
     * Use the ChatcorpAttachedfile relation ChatcorpAttachedfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChatcorpAttachedfileQuery A secondary query class using the current class as primary query
     */
    public function useChatcorpAttachedfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChatcorpAttachedfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ChatcorpAttachedfile', 'ChatcorpAttachedfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Chatcorp $chatcorp Object to remove from the list of results
     *
     * @return ChatcorpQuery The current query, for fluid interface
     */
    public function prune($chatcorp = null)
    {
        if ($chatcorp) {
            $this->addUsingAlias(ChatcorpPeer::IDCHATCORP, $chatcorp->getIdchatcorp(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
