<?php


/**
 * Base class that represents a query for the 'chatpublic_attachedfile' table.
 *
 *
 *
 * @method ChatpublicAttachedfileQuery orderByIdchatpublicAttachedfile($order = Criteria::ASC) Order by the idchatpublic_attachedfile column
 * @method ChatpublicAttachedfileQuery orderByIdchatpublic($order = Criteria::ASC) Order by the idchatpublic column
 * @method ChatpublicAttachedfileQuery orderByChatpublicAttachedfileUrl($order = Criteria::ASC) Order by the chatpublic_attachedfile_url column
 *
 * @method ChatpublicAttachedfileQuery groupByIdchatpublicAttachedfile() Group by the idchatpublic_attachedfile column
 * @method ChatpublicAttachedfileQuery groupByIdchatpublic() Group by the idchatpublic column
 * @method ChatpublicAttachedfileQuery groupByChatpublicAttachedfileUrl() Group by the chatpublic_attachedfile_url column
 *
 * @method ChatpublicAttachedfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ChatpublicAttachedfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ChatpublicAttachedfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ChatpublicAttachedfileQuery leftJoinChatpublic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatpublic relation
 * @method ChatpublicAttachedfileQuery rightJoinChatpublic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatpublic relation
 * @method ChatpublicAttachedfileQuery innerJoinChatpublic($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatpublic relation
 *
 * @method ChatpublicAttachedfile findOne(PropelPDO $con = null) Return the first ChatpublicAttachedfile matching the query
 * @method ChatpublicAttachedfile findOneOrCreate(PropelPDO $con = null) Return the first ChatpublicAttachedfile matching the query, or a new ChatpublicAttachedfile object populated from the query conditions when no match is found
 *
 * @method ChatpublicAttachedfile findOneByIdchatpublic(int $idchatpublic) Return the first ChatpublicAttachedfile filtered by the idchatpublic column
 * @method ChatpublicAttachedfile findOneByChatpublicAttachedfileUrl(string $chatpublic_attachedfile_url) Return the first ChatpublicAttachedfile filtered by the chatpublic_attachedfile_url column
 *
 * @method array findByIdchatpublicAttachedfile(int $idchatpublic_attachedfile) Return ChatpublicAttachedfile objects filtered by the idchatpublic_attachedfile column
 * @method array findByIdchatpublic(int $idchatpublic) Return ChatpublicAttachedfile objects filtered by the idchatpublic column
 * @method array findByChatpublicAttachedfileUrl(string $chatpublic_attachedfile_url) Return ChatpublicAttachedfile objects filtered by the chatpublic_attachedfile_url column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatpublicAttachedfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseChatpublicAttachedfileQuery object.
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
            $modelName = 'ChatpublicAttachedfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChatpublicAttachedfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ChatpublicAttachedfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChatpublicAttachedfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChatpublicAttachedfileQuery) {
            return $criteria;
        }
        $query = new ChatpublicAttachedfileQuery(null, null, $modelAlias);

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
     * @return   ChatpublicAttachedfile|ChatpublicAttachedfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatpublicAttachedfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChatpublicAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ChatpublicAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdchatpublicAttachedfile($key, $con = null)
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
     * @return                 ChatpublicAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idchatpublic_attachedfile`, `idchatpublic`, `chatpublic_attachedfile_url` FROM `chatpublic_attachedfile` WHERE `idchatpublic_attachedfile` = :p0';
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
            $obj = new ChatpublicAttachedfile();
            $obj->hydrate($row);
            ChatpublicAttachedfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ChatpublicAttachedfile|ChatpublicAttachedfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ChatpublicAttachedfile[]|mixed the list of results, formatted by the current formatter
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
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idchatpublic_attachedfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdchatpublicAttachedfile(1234); // WHERE idchatpublic_attachedfile = 1234
     * $query->filterByIdchatpublicAttachedfile(array(12, 34)); // WHERE idchatpublic_attachedfile IN (12, 34)
     * $query->filterByIdchatpublicAttachedfile(array('min' => 12)); // WHERE idchatpublic_attachedfile >= 12
     * $query->filterByIdchatpublicAttachedfile(array('max' => 12)); // WHERE idchatpublic_attachedfile <= 12
     * </code>
     *
     * @param     mixed $idchatpublicAttachedfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatpublicAttachedfile($idchatpublicAttachedfile = null, $comparison = null)
    {
        if (is_array($idchatpublicAttachedfile)) {
            $useMinMax = false;
            if (isset($idchatpublicAttachedfile['min'])) {
                $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $idchatpublicAttachedfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatpublicAttachedfile['max'])) {
                $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $idchatpublicAttachedfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $idchatpublicAttachedfile, $comparison);
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
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatpublic($idchatpublic = null, $comparison = null)
    {
        if (is_array($idchatpublic)) {
            $useMinMax = false;
            if (isset($idchatpublic['min'])) {
                $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $idchatpublic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatpublic['max'])) {
                $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $idchatpublic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $idchatpublic, $comparison);
    }

    /**
     * Filter the query on the chatpublic_attachedfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByChatpublicAttachedfileUrl('fooValue');   // WHERE chatpublic_attachedfile_url = 'fooValue'
     * $query->filterByChatpublicAttachedfileUrl('%fooValue%'); // WHERE chatpublic_attachedfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chatpublicAttachedfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function filterByChatpublicAttachedfileUrl($chatpublicAttachedfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chatpublicAttachedfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chatpublicAttachedfileUrl)) {
                $chatpublicAttachedfileUrl = str_replace('*', '%', $chatpublicAttachedfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatpublicAttachedfilePeer::CHATPUBLIC_ATTACHEDFILE_URL, $chatpublicAttachedfileUrl, $comparison);
    }

    /**
     * Filter the query by a related Chatpublic object
     *
     * @param   Chatpublic|PropelObjectCollection $chatpublic The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatpublicAttachedfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatpublic($chatpublic, $comparison = null)
    {
        if ($chatpublic instanceof Chatpublic) {
            return $this
                ->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $chatpublic->getIdchatpublic(), $comparison);
        } elseif ($chatpublic instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $chatpublic->toKeyValue('PrimaryKey', 'Idchatpublic'), $comparison);
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
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
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
     * @param   ChatpublicAttachedfile $chatpublicAttachedfile Object to remove from the list of results
     *
     * @return ChatpublicAttachedfileQuery The current query, for fluid interface
     */
    public function prune($chatpublicAttachedfile = null)
    {
        if ($chatpublicAttachedfile) {
            $this->addUsingAlias(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $chatpublicAttachedfile->getIdchatpublicAttachedfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
