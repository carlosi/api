<?php


/**
 * Base class that represents a query for the 'clientfile' table.
 *
 *
 *
 * @method ClientfileQuery orderByIdclientfile($order = Criteria::ASC) Order by the idclientfile column
 * @method ClientfileQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClientfileQuery orderByClientfileUrl($order = Criteria::ASC) Order by the clientfile_url column
 * @method ClientfileQuery orderByClientfileNote($order = Criteria::ASC) Order by the clientfile_note column
 * @method ClientfileQuery orderByClientfileUploaddate($order = Criteria::ASC) Order by the clientfile_uploaddate column
 *
 * @method ClientfileQuery groupByIdclientfile() Group by the idclientfile column
 * @method ClientfileQuery groupByIdclient() Group by the idclient column
 * @method ClientfileQuery groupByClientfileUrl() Group by the clientfile_url column
 * @method ClientfileQuery groupByClientfileNote() Group by the clientfile_note column
 * @method ClientfileQuery groupByClientfileUploaddate() Group by the clientfile_uploaddate column
 *
 * @method ClientfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientfileQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClientfileQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClientfileQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Clientfile findOne(PropelPDO $con = null) Return the first Clientfile matching the query
 * @method Clientfile findOneOrCreate(PropelPDO $con = null) Return the first Clientfile matching the query, or a new Clientfile object populated from the query conditions when no match is found
 *
 * @method Clientfile findOneByIdclient(int $idclient) Return the first Clientfile filtered by the idclient column
 * @method Clientfile findOneByClientfileUrl(string $clientfile_url) Return the first Clientfile filtered by the clientfile_url column
 * @method Clientfile findOneByClientfileNote(string $clientfile_note) Return the first Clientfile filtered by the clientfile_note column
 * @method Clientfile findOneByClientfileUploaddate(string $clientfile_uploaddate) Return the first Clientfile filtered by the clientfile_uploaddate column
 *
 * @method array findByIdclientfile(int $idclientfile) Return Clientfile objects filtered by the idclientfile column
 * @method array findByIdclient(int $idclient) Return Clientfile objects filtered by the idclient column
 * @method array findByClientfileUrl(string $clientfile_url) Return Clientfile objects filtered by the clientfile_url column
 * @method array findByClientfileNote(string $clientfile_note) Return Clientfile objects filtered by the clientfile_note column
 * @method array findByClientfileUploaddate(string $clientfile_uploaddate) Return Clientfile objects filtered by the clientfile_uploaddate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientfileQuery object.
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
            $modelName = 'Clientfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientfileQuery) {
            return $criteria;
        }
        $query = new ClientfileQuery(null, null, $modelAlias);

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
     * @return   Clientfile|Clientfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclientfile($key, $con = null)
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
     * @return                 Clientfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclientfile`, `idclient`, `clientfile_url`, `clientfile_note`, `clientfile_uploaddate` FROM `clientfile` WHERE `idclientfile` = :p0';
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
            $obj = new Clientfile();
            $obj->hydrate($row);
            ClientfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientfile|Clientfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientfile[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idclientfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclientfile(1234); // WHERE idclientfile = 1234
     * $query->filterByIdclientfile(array(12, 34)); // WHERE idclientfile IN (12, 34)
     * $query->filterByIdclientfile(array('min' => 12)); // WHERE idclientfile >= 12
     * $query->filterByIdclientfile(array('max' => 12)); // WHERE idclientfile <= 12
     * </code>
     *
     * @param     mixed $idclientfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByIdclientfile($idclientfile = null, $comparison = null)
    {
        if (is_array($idclientfile)) {
            $useMinMax = false;
            if (isset($idclientfile['min'])) {
                $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $idclientfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclientfile['max'])) {
                $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $idclientfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $idclientfile, $comparison);
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
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClientfilePeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClientfilePeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfilePeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the clientfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByClientfileUrl('fooValue');   // WHERE clientfile_url = 'fooValue'
     * $query->filterByClientfileUrl('%fooValue%'); // WHERE clientfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByClientfileUrl($clientfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientfileUrl)) {
                $clientfileUrl = str_replace('*', '%', $clientfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientfilePeer::CLIENTFILE_URL, $clientfileUrl, $comparison);
    }

    /**
     * Filter the query on the clientfile_note column
     *
     * Example usage:
     * <code>
     * $query->filterByClientfileNote('fooValue');   // WHERE clientfile_note = 'fooValue'
     * $query->filterByClientfileNote('%fooValue%'); // WHERE clientfile_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientfileNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByClientfileNote($clientfileNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientfileNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientfileNote)) {
                $clientfileNote = str_replace('*', '%', $clientfileNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientfilePeer::CLIENTFILE_NOTE, $clientfileNote, $comparison);
    }

    /**
     * Filter the query on the clientfile_uploaddate column
     *
     * Example usage:
     * <code>
     * $query->filterByClientfileUploaddate('2011-03-14'); // WHERE clientfile_uploaddate = '2011-03-14'
     * $query->filterByClientfileUploaddate('now'); // WHERE clientfile_uploaddate = '2011-03-14'
     * $query->filterByClientfileUploaddate(array('max' => 'yesterday')); // WHERE clientfile_uploaddate < '2011-03-13'
     * </code>
     *
     * @param     mixed $clientfileUploaddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function filterByClientfileUploaddate($clientfileUploaddate = null, $comparison = null)
    {
        if (is_array($clientfileUploaddate)) {
            $useMinMax = false;
            if (isset($clientfileUploaddate['min'])) {
                $this->addUsingAlias(ClientfilePeer::CLIENTFILE_UPLOADDATE, $clientfileUploaddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientfileUploaddate['max'])) {
                $this->addUsingAlias(ClientfilePeer::CLIENTFILE_UPLOADDATE, $clientfileUploaddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfilePeer::CLIENTFILE_UPLOADDATE, $clientfileUploaddate, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClientfilePeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientfilePeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Clientfile $clientfile Object to remove from the list of results
     *
     * @return ClientfileQuery The current query, for fluid interface
     */
    public function prune($clientfile = null)
    {
        if ($clientfile) {
            $this->addUsingAlias(ClientfilePeer::IDCLIENTFILE, $clientfile->getIdclientfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
