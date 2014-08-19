<?php


/**
 * Base class that represents a query for the 'chatcorp_attachedfile' table.
 *
 *
 *
 * @method ChatcorpAttachedfileQuery orderByIdchatcorpAttachedfile($order = Criteria::ASC) Order by the idchatcorp_attachedfile column
 * @method ChatcorpAttachedfileQuery orderByIdchatcorp($order = Criteria::ASC) Order by the idchatcorp column
 * @method ChatcorpAttachedfileQuery orderByChatcorpAttachedfileUrl($order = Criteria::ASC) Order by the chatcorp_attachedfile_url column
 *
 * @method ChatcorpAttachedfileQuery groupByIdchatcorpAttachedfile() Group by the idchatcorp_attachedfile column
 * @method ChatcorpAttachedfileQuery groupByIdchatcorp() Group by the idchatcorp column
 * @method ChatcorpAttachedfileQuery groupByChatcorpAttachedfileUrl() Group by the chatcorp_attachedfile_url column
 *
 * @method ChatcorpAttachedfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ChatcorpAttachedfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ChatcorpAttachedfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ChatcorpAttachedfileQuery leftJoinChatcorp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatcorp relation
 * @method ChatcorpAttachedfileQuery rightJoinChatcorp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatcorp relation
 * @method ChatcorpAttachedfileQuery innerJoinChatcorp($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatcorp relation
 *
 * @method ChatcorpAttachedfile findOne(PropelPDO $con = null) Return the first ChatcorpAttachedfile matching the query
 * @method ChatcorpAttachedfile findOneOrCreate(PropelPDO $con = null) Return the first ChatcorpAttachedfile matching the query, or a new ChatcorpAttachedfile object populated from the query conditions when no match is found
 *
 * @method ChatcorpAttachedfile findOneByIdchatcorp(int $idchatcorp) Return the first ChatcorpAttachedfile filtered by the idchatcorp column
 * @method ChatcorpAttachedfile findOneByChatcorpAttachedfileUrl(string $chatcorp_attachedfile_url) Return the first ChatcorpAttachedfile filtered by the chatcorp_attachedfile_url column
 *
 * @method array findByIdchatcorpAttachedfile(int $idchatcorp_attachedfile) Return ChatcorpAttachedfile objects filtered by the idchatcorp_attachedfile column
 * @method array findByIdchatcorp(int $idchatcorp) Return ChatcorpAttachedfile objects filtered by the idchatcorp column
 * @method array findByChatcorpAttachedfileUrl(string $chatcorp_attachedfile_url) Return ChatcorpAttachedfile objects filtered by the chatcorp_attachedfile_url column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatcorpAttachedfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseChatcorpAttachedfileQuery object.
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
            $modelName = 'ChatcorpAttachedfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChatcorpAttachedfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ChatcorpAttachedfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChatcorpAttachedfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ChatcorpAttachedfileQuery) {
            return $criteria;
        }
        $query = new ChatcorpAttachedfileQuery(null, null, $modelAlias);

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
     * @return   ChatcorpAttachedfile|ChatcorpAttachedfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChatcorpAttachedfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ChatcorpAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdchatcorpAttachedfile($key, $con = null)
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
     * @return                 ChatcorpAttachedfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idchatcorp_attachedfile`, `idchatcorp`, `chatcorp_attachedfile_url` FROM `chatcorp_attachedfile` WHERE `idchatcorp_attachedfile` = :p0';
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
            $obj = new ChatcorpAttachedfile();
            $obj->hydrate($row);
            ChatcorpAttachedfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ChatcorpAttachedfile|ChatcorpAttachedfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ChatcorpAttachedfile[]|mixed the list of results, formatted by the current formatter
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
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idchatcorp_attachedfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdchatcorpAttachedfile(1234); // WHERE idchatcorp_attachedfile = 1234
     * $query->filterByIdchatcorpAttachedfile(array(12, 34)); // WHERE idchatcorp_attachedfile IN (12, 34)
     * $query->filterByIdchatcorpAttachedfile(array('min' => 12)); // WHERE idchatcorp_attachedfile >= 12
     * $query->filterByIdchatcorpAttachedfile(array('max' => 12)); // WHERE idchatcorp_attachedfile <= 12
     * </code>
     *
     * @param     mixed $idchatcorpAttachedfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatcorpAttachedfile($idchatcorpAttachedfile = null, $comparison = null)
    {
        if (is_array($idchatcorpAttachedfile)) {
            $useMinMax = false;
            if (isset($idchatcorpAttachedfile['min'])) {
                $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $idchatcorpAttachedfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatcorpAttachedfile['max'])) {
                $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $idchatcorpAttachedfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $idchatcorpAttachedfile, $comparison);
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
     * @see       filterByChatcorp()
     *
     * @param     mixed $idchatcorp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByIdchatcorp($idchatcorp = null, $comparison = null)
    {
        if (is_array($idchatcorp)) {
            $useMinMax = false;
            if (isset($idchatcorp['min'])) {
                $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP, $idchatcorp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idchatcorp['max'])) {
                $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP, $idchatcorp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP, $idchatcorp, $comparison);
    }

    /**
     * Filter the query on the chatcorp_attachedfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByChatcorpAttachedfileUrl('fooValue');   // WHERE chatcorp_attachedfile_url = 'fooValue'
     * $query->filterByChatcorpAttachedfileUrl('%fooValue%'); // WHERE chatcorp_attachedfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chatcorpAttachedfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function filterByChatcorpAttachedfileUrl($chatcorpAttachedfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chatcorpAttachedfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chatcorpAttachedfileUrl)) {
                $chatcorpAttachedfileUrl = str_replace('*', '%', $chatcorpAttachedfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChatcorpAttachedfilePeer::CHATCORP_ATTACHEDFILE_URL, $chatcorpAttachedfileUrl, $comparison);
    }

    /**
     * Filter the query by a related Chatcorp object
     *
     * @param   Chatcorp|PropelObjectCollection $chatcorp The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ChatcorpAttachedfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatcorp($chatcorp, $comparison = null)
    {
        if ($chatcorp instanceof Chatcorp) {
            return $this
                ->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP, $chatcorp->getIdchatcorp(), $comparison);
        } elseif ($chatcorp instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP, $chatcorp->toKeyValue('PrimaryKey', 'Idchatcorp'), $comparison);
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
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChatcorpAttachedfile $chatcorpAttachedfile Object to remove from the list of results
     *
     * @return ChatcorpAttachedfileQuery The current query, for fluid interface
     */
    public function prune($chatcorpAttachedfile = null)
    {
        if ($chatcorpAttachedfile) {
            $this->addUsingAlias(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $chatcorpAttachedfile->getIdchatcorpAttachedfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
