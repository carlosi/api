<?php


/**
 * Base class that represents a query for the 'chatpublic' table.
 *
 *
 *
 * @method ChatpublicQuery orderByIdchatpublic($order = Criteria::ASC) Order by the idchatpublic column
 * @method ChatpublicQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ChatpublicQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ChatpublicQuery orderByChatpublicMessage($order = Criteria::ASC) Order by the chatpublic_message column
 * @method ChatpublicQuery orderByChatpublicDate($order = Criteria::ASC) Order by the chatpublic_date column
 *
 * @method ChatpublicQuery groupByIdchatpublic() Group by the idchatpublic column
 * @method ChatpublicQuery groupByIduser() Group by the iduser column
 * @method ChatpublicQuery groupByIdclient() Group by the idclient column
 * @method ChatpublicQuery groupByChatpublicMessage() Group by the chatpublic_message column
 * @method ChatpublicQuery groupByChatpublicDate() Group by the chatpublic_date column
 *
 * @method ChatpublicQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ChatpublicQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ChatpublicQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ChatpublicQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ChatpublicQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ChatpublicQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method ChatpublicQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ChatpublicQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ChatpublicQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method ChatpublicQuery leftJoinChatpublicpAttachedfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the ChatpublicpAttachedfile relation
 * @method ChatpublicQuery rightJoinChatpublicpAttachedfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ChatpublicpAttachedfile relation
 * @method ChatpublicQuery innerJoinChatpublicpAttachedfile($relationAlias = null) Adds a INNER JOIN clause to the query using the ChatpublicpAttachedfile relation
 *
 * @method Chatpublic findOne(PropelPDO $con = null) Return the first Chatpublic matching the query
 * @method Chatpublic findOneOrCreate(PropelPDO $con = null) Return the first Chatpublic matching the query, or a new Chatpublic object populated from the query conditions when no match is found
 *
 * @method Chatpublic findOneByIduser(int $iduser) Return the first Chatpublic filtered by the iduser column
 * @method Chatpublic findOneByIdclient(int $idclient) Return the first Chatpublic filtered by the idclient column
 * @method Chatpublic findOneByChatpublicMessage(string $chatpublic_message) Return the first Chatpublic filtered by the chatpublic_message column
 * @method Chatpublic findOneByChatpublicDate(string $chatpublic_date) Return the first Chatpublic filtered by the chatpublic_date column
 *
 * @method array findByIdchatpublic(int $idchatpublic) Return Chatpublic objects filtered by the idchatpublic column
 * @method array findByIduser(int $iduser) Return Chatpublic objects filtered by the iduser column
 * @method array findByIdclient(int $idclient) Return Chatpublic objects filtered by the idclient column
 * @method array findByChatpublicMessage(string $chatpublic_message) Return Chatpublic objects filtered by the chatpublic_message column
 * @method array findByChatpublicDate(string $chatpublic_date) Return Chatpublic objects filtered by the chatpublic_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatpublicQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseChatpublicQuery object.
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
            $modelName = 'Chatpublic';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChatpublicQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ChatpublicQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChatpublicQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChatpublicQuery) {
            return $criteria;
        }
        $query = new ChatpublicQuery(null, null, $modelAlias);

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
     * @return   Chatpublic|Chatpublic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatpublicPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChatpublicPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Chatpublic A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdchatpublic($key, $con = null)
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
     * @return                 Chatpublic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idchatpublic`, `iduser`, `idclient`, `chatpublic_message`, `chatpublic_date` FROM `chatpublic` WHERE `idchatpublic` = :p0';
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
            $obj = new Chatpublic();
            $obj->hydrate($row);
            ChatpublicPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Chatpublic|Chatpublic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Chatpublic[]|mixed the list of results, formatted by the current formatter
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
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idchatpublic column
     *
     * Example usage:
     * <code>
     * $query->filterByIdchatpublic(1234); // WHERE idchatpublic = 1234
     * $query->filterByIdchatpublic(array(12, 34)); // WHERE idchatpublic IN (12, 34)
     * $query->filterByIdchatpublic(array('min' => 12)); // WHERE idchatpublic >= 12
     * $query->filterByIdchatpublic(array('max' => 12)); // WHERE idchatpublic <= 12
     * </code>
     *
     * @param     mixed $idchatpublic The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByIdchatpublic($idchatpublic = null, $comparison = null)
    {
        if (is_array($idchatpublic)) {
            $useMinMax = false;
            if (isset($idchatpublic['min'])) {
                $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $idchatpublic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatpublic['max'])) {
                $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $idchatpublic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $idchatpublic, $comparison);
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
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ChatpublicPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ChatpublicPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclient(1234); // WHERE idclient = 1234
     * $query->filterByIdclient(array(12, 34)); // WHERE idclient IN (12, 34)
     * $query->filterByIdclient(array('min' => 12)); // WHERE idclient >= 12
     * $query->filterByIdclient(array('max' => 12)); // WHERE idclient <= 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ChatpublicPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ChatpublicPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the chatpublic_message column
     *
     * Example usage:
     * <code>
     * $query->filterByChatpublicMessage('fooValue');   // WHERE chatpublic_message = 'fooValue'
     * $query->filterByChatpublicMessage('%fooValue%'); // WHERE chatpublic_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chatpublicMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByChatpublicMessage($chatpublicMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chatpublicMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chatpublicMessage)) {
                $chatpublicMessage = str_replace('*', '%', $chatpublicMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatpublicPeer::CHATPUBLIC_MESSAGE, $chatpublicMessage, $comparison);
    }

    /**
     * Filter the query on the chatpublic_date column
     *
     * Example usage:
     * <code>
     * $query->filterByChatpublicDate('2011-03-14'); // WHERE chatpublic_date = '2011-03-14'
     * $query->filterByChatpublicDate('now'); // WHERE chatpublic_date = '2011-03-14'
     * $query->filterByChatpublicDate(array('max' => 'yesterday')); // WHERE chatpublic_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $chatpublicDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function filterByChatpublicDate($chatpublicDate = null, $comparison = null)
    {
        if (is_array($chatpublicDate)) {
            $useMinMax = false;
            if (isset($chatpublicDate['min'])) {
                $this->addUsingAlias(ChatpublicPeer::CHATPUBLIC_DATE, $chatpublicDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($chatpublicDate['max'])) {
                $this->addUsingAlias(ChatpublicPeer::CHATPUBLIC_DATE, $chatpublicDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicPeer::CHATPUBLIC_DATE, $chatpublicDate, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatpublicQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ChatpublicPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatpublicPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatpublicQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ChatpublicPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatpublicPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Filter the query by a related ChatpublicpAttachedfile object
     *
     * @param   ChatpublicpAttachedfile|PropelObjectCollection $chatpublicpAttachedfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatpublicQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatpublicpAttachedfile($chatpublicpAttachedfile, $comparison = null)
    {
        if ($chatpublicpAttachedfile instanceof ChatpublicpAttachedfile) {
            return $this
                ->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $chatpublicpAttachedfile->getIdchatpublic(), $comparison);
        } elseif ($chatpublicpAttachedfile instanceof PropelObjectCollection) {
            return $this
                ->useChatpublicpAttachedfileQuery()
                ->filterByPrimaryKeys($chatpublicpAttachedfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChatpublicpAttachedfile() only accepts arguments of type ChatpublicpAttachedfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ChatpublicpAttachedfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function joinChatpublicpAttachedfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ChatpublicpAttachedfile');

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
            $this->addJoinObject($join, 'ChatpublicpAttachedfile');
        }

        return $this;
    }

    /**
     * Use the ChatpublicpAttachedfile relation ChatpublicpAttachedfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChatpublicpAttachedfileQuery A secondary query class using the current class as primary query
     */
    public function useChatpublicpAttachedfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChatpublicpAttachedfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ChatpublicpAttachedfile', 'ChatpublicpAttachedfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Chatpublic $chatpublic Object to remove from the list of results
     *
     * @return ChatpublicQuery The current query, for fluid interface
     */
    public function prune($chatpublic = null)
    {
        if ($chatpublic) {
            $this->addUsingAlias(ChatpublicPeer::IDCHATPUBLIC, $chatpublic->getIdchatpublic(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
