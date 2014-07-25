<?php


/**
 * Base class that represents a query for the 'chatpublicp_attachedfile' table.
 *
 *
 *
 * @method ChatpublicpAttachedfileQuery orderByIdchatpublicpAttachedfile($order = Criteria::ASC) Order by the idchatpublicp_attachedfile column
 * @method ChatpublicpAttachedfileQuery orderByIdchatpublic($order = Criteria::ASC) Order by the idchatpublic column
 * @method ChatpublicpAttachedfileQuery orderByChatpublicpAttachedfileUrl($order = Criteria::ASC) Order by the chatpublicp_attachedfile_url column
 *
 * @method ChatpublicpAttachedfileQuery groupByIdchatpublicpAttachedfile() Group by the idchatpublicp_attachedfile column
 * @method ChatpublicpAttachedfileQuery groupByIdchatpublic() Group by the idchatpublic column
 * @method ChatpublicpAttachedfileQuery groupByChatpublicpAttachedfileUrl() Group by the chatpublicp_attachedfile_url column
 *
 * @method ChatpublicpAttachedfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ChatpublicpAttachedfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ChatpublicpAttachedfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ChatpublicpAttachedfileQuery leftJoinChatpublic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatpublic relation
 * @method ChatpublicpAttachedfileQuery rightJoinChatpublic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatpublic relation
 * @method ChatpublicpAttachedfileQuery innerJoinChatpublic($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatpublic relation
 *
 * @method ChatpublicpAttachedfile findOne(PropelPDO $con = null) Return the first ChatpublicpAttachedfile matching the query
 * @method ChatpublicpAttachedfile findOneOrCreate(PropelPDO $con = null) Return the first ChatpublicpAttachedfile matching the query, or a new ChatpublicpAttachedfile object populated from the query conditions when no match is found
 *
 * @method ChatpublicpAttachedfile findOneByIdchatpublic(int $idchatpublic) Return the first ChatpublicpAttachedfile filtered by the idchatpublic column
 * @method ChatpublicpAttachedfile findOneByChatpublicpAttachedfileUrl(string $chatpublicp_attachedfile_url) Return the first ChatpublicpAttachedfile filtered by the chatpublicp_attachedfile_url column
 *
 * @method array findByIdchatpublicpAttachedfile(int $idchatpublicp_attachedfile) Return ChatpublicpAttachedfile objects filtered by the idchatpublicp_attachedfile column
 * @method array findByIdchatpublic(int $idchatpublic) Return ChatpublicpAttachedfile objects filtered by the idchatpublic column
 * @method array findByChatpublicpAttachedfileUrl(string $chatpublicp_attachedfile_url) Return ChatpublicpAttachedfile objects filtered by the chatpublicp_attachedfile_url column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatpublicpAttachedfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseChatpublicpAttachedfileQuery object.
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
            $modelName = 'ChatpublicpAttachedfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChatpublicpAttachedfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ChatpublicpAttachedfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChatpublicpAttachedfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChatpublicpAttachedfileQuery) {
            return $criteria;
        }
        $query = new ChatpublicpAttachedfileQuery(null, null, $modelAlias);

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
     * @return   ChatpublicpAttachedfile|ChatpublicpAttachedfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatpublicpAttachedfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChatpublicpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ChatpublicpAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdchatpublicpAttachedfile($key, $con = null)
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
     * @return                 ChatpublicpAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idchatpublicp_attachedfile`, `idchatpublic`, `chatpublicp_attachedfile_url` FROM `chatpublicp_attachedfile` WHERE `idchatpublicp_attachedfile` = :p0';
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
            $obj = new ChatpublicpAttachedfile();
            $obj->hydrate($row);
            ChatpublicpAttachedfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ChatpublicpAttachedfile|ChatpublicpAttachedfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ChatpublicpAttachedfile[]|mixed the list of results, formatted by the current formatter
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
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idchatpublicp_attachedfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdchatpublicpAttachedfile(1234); // WHERE idchatpublicp_attachedfile = 1234
     * $query->filterByIdchatpublicpAttachedfile(array(12, 34)); // WHERE idchatpublicp_attachedfile IN (12, 34)
     * $query->filterByIdchatpublicpAttachedfile(array('min' => 12)); // WHERE idchatpublicp_attachedfile >= 12
     * $query->filterByIdchatpublicpAttachedfile(array('max' => 12)); // WHERE idchatpublicp_attachedfile <= 12
     * </code>
     *
     * @param     mixed $idchatpublicpAttachedfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatpublicpAttachedfile($idchatpublicpAttachedfile = null, $comparison = null)
    {
        if (is_array($idchatpublicpAttachedfile)) {
            $useMinMax = false;
            if (isset($idchatpublicpAttachedfile['min'])) {
                $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $idchatpublicpAttachedfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatpublicpAttachedfile['max'])) {
                $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $idchatpublicpAttachedfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $idchatpublicpAttachedfile, $comparison);
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
     * @see       filterByChatpublic()
     *
     * @param     mixed $idchatpublic The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatpublic($idchatpublic = null, $comparison = null)
    {
        if (is_array($idchatpublic)) {
            $useMinMax = false;
            if (isset($idchatpublic['min'])) {
                $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLIC, $idchatpublic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatpublic['max'])) {
                $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLIC, $idchatpublic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLIC, $idchatpublic, $comparison);
    }

    /**
     * Filter the query on the chatpublicp_attachedfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByChatpublicpAttachedfileUrl('fooValue');   // WHERE chatpublicp_attachedfile_url = 'fooValue'
     * $query->filterByChatpublicpAttachedfileUrl('%fooValue%'); // WHERE chatpublicp_attachedfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chatpublicpAttachedfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByChatpublicpAttachedfileUrl($chatpublicpAttachedfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chatpublicpAttachedfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chatpublicpAttachedfileUrl)) {
                $chatpublicpAttachedfileUrl = str_replace('*', '%', $chatpublicpAttachedfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatpublicpAttachedfilePeer::CHATPUBLICP_ATTACHEDFILE_URL, $chatpublicpAttachedfileUrl, $comparison);
    }

    /**
     * Filter the query by a related Chatpublic object
     *
     * @param   Chatpublic|PropelObjectCollection $chatpublic The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatpublicpAttachedfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatpublic($chatpublic, $comparison = null)
    {
        if ($chatpublic instanceof Chatpublic) {
            return $this
                ->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLIC, $chatpublic->getIdchatpublic(), $comparison);
        } elseif ($chatpublic instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLIC, $chatpublic->toKeyValue('PrimaryKey', 'Idchatpublic'), $comparison);
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
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function joinChatpublic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useChatpublicQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChatpublic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Chatpublic', 'ChatpublicQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChatpublicpAttachedfile $chatpublicpAttachedfile Object to remove from the list of results
     *
     * @return ChatpublicpAttachedfileQuery The current query, for fluid interface
     */
    public function prune($chatpublicpAttachedfile = null)
    {
        if ($chatpublicpAttachedfile) {
            $this->addUsingAlias(ChatpublicpAttachedfilePeer::IDCHATPUBLICP_ATTACHEDFILE, $chatpublicpAttachedfile->getIdchatpublicpAttachedfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
