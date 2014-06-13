<?php


/**
 * Base class that represents a query for the 'clientcomment' table.
 *
 *
 *
 * @method ClientcommentQuery orderByIdclientcomment($order = Criteria::ASC) Order by the idclientcomment column
 * @method ClientcommentQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClientcommentQuery orderByClientcommentNote($order = Criteria::ASC) Order by the clientcomment_note column
 * @method ClientcommentQuery orderByClientcommentDate($order = Criteria::ASC) Order by the clientcomment_date column
 *
 * @method ClientcommentQuery groupByIdclientcomment() Group by the idclientcomment column
 * @method ClientcommentQuery groupByIdclient() Group by the idclient column
 * @method ClientcommentQuery groupByClientcommentNote() Group by the clientcomment_note column
 * @method ClientcommentQuery groupByClientcommentDate() Group by the clientcomment_date column
 *
 * @method ClientcommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientcommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientcommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientcommentQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClientcommentQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClientcommentQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Clientcomment findOne(PropelPDO $con = null) Return the first Clientcomment matching the query
 * @method Clientcomment findOneOrCreate(PropelPDO $con = null) Return the first Clientcomment matching the query, or a new Clientcomment object populated from the query conditions when no match is found
 *
 * @method Clientcomment findOneByIdclient(int $idclient) Return the first Clientcomment filtered by the idclient column
 * @method Clientcomment findOneByClientcommentNote(string $clientcomment_note) Return the first Clientcomment filtered by the clientcomment_note column
 * @method Clientcomment findOneByClientcommentDate(string $clientcomment_date) Return the first Clientcomment filtered by the clientcomment_date column
 *
 * @method array findByIdclientcomment(int $idclientcomment) Return Clientcomment objects filtered by the idclientcomment column
 * @method array findByIdclient(int $idclient) Return Clientcomment objects filtered by the idclient column
 * @method array findByClientcommentNote(string $clientcomment_note) Return Clientcomment objects filtered by the clientcomment_note column
 * @method array findByClientcommentDate(string $clientcomment_date) Return Clientcomment objects filtered by the clientcomment_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientcommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientcommentQuery object.
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
            $modelName = 'Clientcomment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientcommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientcommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientcommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientcommentQuery) {
            return $criteria;
        }
        $query = new ClientcommentQuery(null, null, $modelAlias);

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
     * @return   Clientcomment|Clientcomment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientcommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientcommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientcomment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclientcomment($key, $con = null)
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
     * @return                 Clientcomment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclientcomment`, `idclient`, `clientcomment_note`, `clientcomment_date` FROM `clientcomment` WHERE `idclientcomment` = :p0';
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
            $obj = new Clientcomment();
            $obj->hydrate($row);
            ClientcommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientcomment|Clientcomment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientcomment[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idclientcomment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclientcomment(1234); // WHERE idclientcomment = 1234
     * $query->filterByIdclientcomment(array(12, 34)); // WHERE idclientcomment IN (12, 34)
     * $query->filterByIdclientcomment(array('min' => 12)); // WHERE idclientcomment >= 12
     * $query->filterByIdclientcomment(array('max' => 12)); // WHERE idclientcomment <= 12
     * </code>
     *
     * @param     mixed $idclientcomment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByIdclientcomment($idclientcomment = null, $comparison = null)
    {
        if (is_array($idclientcomment)) {
            $useMinMax = false;
            if (isset($idclientcomment['min'])) {
                $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $idclientcomment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclientcomment['max'])) {
                $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $idclientcomment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $idclientcomment, $comparison);
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
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClientcommentPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClientcommentPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientcommentPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the clientcomment_note column
     *
     * Example usage:
     * <code>
     * $query->filterByClientcommentNote('fooValue');   // WHERE clientcomment_note = 'fooValue'
     * $query->filterByClientcommentNote('%fooValue%'); // WHERE clientcomment_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientcommentNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByClientcommentNote($clientcommentNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientcommentNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientcommentNote)) {
                $clientcommentNote = str_replace('*', '%', $clientcommentNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientcommentPeer::CLIENTCOMMENT_NOTE, $clientcommentNote, $comparison);
    }

    /**
     * Filter the query on the clientcomment_date column
     *
     * Example usage:
     * <code>
     * $query->filterByClientcommentDate('2011-03-14'); // WHERE clientcomment_date = '2011-03-14'
     * $query->filterByClientcommentDate('now'); // WHERE clientcomment_date = '2011-03-14'
     * $query->filterByClientcommentDate(array('max' => 'yesterday')); // WHERE clientcomment_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $clientcommentDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function filterByClientcommentDate($clientcommentDate = null, $comparison = null)
    {
        if (is_array($clientcommentDate)) {
            $useMinMax = false;
            if (isset($clientcommentDate['min'])) {
                $this->addUsingAlias(ClientcommentPeer::CLIENTCOMMENT_DATE, $clientcommentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientcommentDate['max'])) {
                $this->addUsingAlias(ClientcommentPeer::CLIENTCOMMENT_DATE, $clientcommentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientcommentPeer::CLIENTCOMMENT_DATE, $clientcommentDate, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientcommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClientcommentPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientcommentPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return ClientcommentQuery The current query, for fluid interface
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
     * @param   Clientcomment $clientcomment Object to remove from the list of results
     *
     * @return ClientcommentQuery The current query, for fluid interface
     */
    public function prune($clientcomment = null)
    {
        if ($clientcomment) {
            $this->addUsingAlias(ClientcommentPeer::IDCLIENTCOMMENT, $clientcomment->getIdclientcomment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
