<?php


/**
 * Base class that represents a query for the 'triggerprospection' table.
 *
 *
 *
 * @method TriggerprospectionQuery orderByIdtriggerprospection($order = Criteria::ASC) Order by the idtriggerprospection column
 * @method TriggerprospectionQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method TriggerprospectionQuery orderByTriggerprospectionDate($order = Criteria::ASC) Order by the triggerprospection_date column
 * @method TriggerprospectionQuery orderByTriggerprospectionBy($order = Criteria::ASC) Order by the triggerprospection_by column
 *
 * @method TriggerprospectionQuery groupByIdtriggerprospection() Group by the idtriggerprospection column
 * @method TriggerprospectionQuery groupByIdclient() Group by the idclient column
 * @method TriggerprospectionQuery groupByTriggerprospectionDate() Group by the triggerprospection_date column
 * @method TriggerprospectionQuery groupByTriggerprospectionBy() Group by the triggerprospection_by column
 *
 * @method TriggerprospectionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TriggerprospectionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TriggerprospectionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TriggerprospectionQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method TriggerprospectionQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method TriggerprospectionQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method TriggerprospectionQuery leftJoinProspectioninterest($relationAlias = null) Adds a LEFT JOIN clause to the query using the Prospectioninterest relation
 * @method TriggerprospectionQuery rightJoinProspectioninterest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Prospectioninterest relation
 * @method TriggerprospectionQuery innerJoinProspectioninterest($relationAlias = null) Adds a INNER JOIN clause to the query using the Prospectioninterest relation
 *
 * @method TriggerprospectionQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method TriggerprospectionQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method TriggerprospectionQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method TriggerprospectionQuery leftJoinTriggerprospectionnote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospectionnote relation
 * @method TriggerprospectionQuery rightJoinTriggerprospectionnote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospectionnote relation
 * @method TriggerprospectionQuery innerJoinTriggerprospectionnote($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospectionnote relation
 *
 * @method TriggerprospectionQuery leftJoinTriggerprospectionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospectionuser relation
 * @method TriggerprospectionQuery rightJoinTriggerprospectionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospectionuser relation
 * @method TriggerprospectionQuery innerJoinTriggerprospectionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospectionuser relation
 *
 * @method Triggerprospection findOne(PropelPDO $con = null) Return the first Triggerprospection matching the query
 * @method Triggerprospection findOneOrCreate(PropelPDO $con = null) Return the first Triggerprospection matching the query, or a new Triggerprospection object populated from the query conditions when no match is found
 *
 * @method Triggerprospection findOneByIdclient(int $idclient) Return the first Triggerprospection filtered by the idclient column
 * @method Triggerprospection findOneByTriggerprospectionDate(string $triggerprospection_date) Return the first Triggerprospection filtered by the triggerprospection_date column
 * @method Triggerprospection findOneByTriggerprospectionBy(string $triggerprospection_by) Return the first Triggerprospection filtered by the triggerprospection_by column
 *
 * @method array findByIdtriggerprospection(int $idtriggerprospection) Return Triggerprospection objects filtered by the idtriggerprospection column
 * @method array findByIdclient(int $idclient) Return Triggerprospection objects filtered by the idclient column
 * @method array findByTriggerprospectionDate(string $triggerprospection_date) Return Triggerprospection objects filtered by the triggerprospection_date column
 * @method array findByTriggerprospectionBy(string $triggerprospection_by) Return Triggerprospection objects filtered by the triggerprospection_by column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseTriggerprospectionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTriggerprospectionQuery object.
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
            $modelName = 'Triggerprospection';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TriggerprospectionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TriggerprospectionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TriggerprospectionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TriggerprospectionQuery) {
            return $criteria;
        }
        $query = new TriggerprospectionQuery(null, null, $modelAlias);

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
     * @return   Triggerprospection|Triggerprospection[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TriggerprospectionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TriggerprospectionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Triggerprospection A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtriggerprospection($key, $con = null)
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
     * @return                 Triggerprospection A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtriggerprospection`, `idclient`, `triggerprospection_date`, `triggerprospection_by` FROM `triggerprospection` WHERE `idtriggerprospection` = :p0';
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
            $obj = new Triggerprospection();
            $obj->hydrate($row);
            TriggerprospectionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Triggerprospection|Triggerprospection[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Triggerprospection[]|mixed the list of results, formatted by the current formatter
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
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtriggerprospection column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtriggerprospection(1234); // WHERE idtriggerprospection = 1234
     * $query->filterByIdtriggerprospection(array(12, 34)); // WHERE idtriggerprospection IN (12, 34)
     * $query->filterByIdtriggerprospection(array('min' => 12)); // WHERE idtriggerprospection >= 12
     * $query->filterByIdtriggerprospection(array('max' => 12)); // WHERE idtriggerprospection <= 12
     * </code>
     *
     * @param     mixed $idtriggerprospection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospection($idtriggerprospection = null, $comparison = null)
    {
        if (is_array($idtriggerprospection)) {
            $useMinMax = false;
            if (isset($idtriggerprospection['min'])) {
                $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospection['max'])) {
                $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $idtriggerprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $idtriggerprospection, $comparison);
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
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(TriggerprospectionPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(TriggerprospectionPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the triggerprospection_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTriggerprospectionDate('2011-03-14'); // WHERE triggerprospection_date = '2011-03-14'
     * $query->filterByTriggerprospectionDate('now'); // WHERE triggerprospection_date = '2011-03-14'
     * $query->filterByTriggerprospectionDate(array('max' => 'yesterday')); // WHERE triggerprospection_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $triggerprospectionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByTriggerprospectionDate($triggerprospectionDate = null, $comparison = null)
    {
        if (is_array($triggerprospectionDate)) {
            $useMinMax = false;
            if (isset($triggerprospectionDate['min'])) {
                $this->addUsingAlias(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE, $triggerprospectionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($triggerprospectionDate['max'])) {
                $this->addUsingAlias(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE, $triggerprospectionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE, $triggerprospectionDate, $comparison);
    }

    /**
     * Filter the query on the triggerprospection_by column
     *
     * Example usage:
     * <code>
     * $query->filterByTriggerprospectionBy('fooValue');   // WHERE triggerprospection_by = 'fooValue'
     * $query->filterByTriggerprospectionBy('%fooValue%'); // WHERE triggerprospection_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $triggerprospectionBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function filterByTriggerprospectionBy($triggerprospectionBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($triggerprospectionBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $triggerprospectionBy)) {
                $triggerprospectionBy = str_replace('*', '%', $triggerprospectionBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TriggerprospectionPeer::TRIGGERPROSPECTION_BY, $triggerprospectionBy, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return TriggerprospectionQuery The current query, for fluid interface
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
     * Filter the query by a related Prospectioninterest object
     *
     * @param   Prospectioninterest|PropelObjectCollection $prospectioninterest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProspectioninterest($prospectioninterest, $comparison = null)
    {
        if ($prospectioninterest instanceof Prospectioninterest) {
            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $prospectioninterest->getIdtriggerprospection(), $comparison);
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
     * @return TriggerprospectionQuery The current query, for fluid interface
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
     * Filter the query by a related Quote object
     *
     * @param   Quote|PropelObjectCollection $quote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($quote, $comparison = null)
    {
        if ($quote instanceof Quote) {
            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $quote->getIdtriggerprospection(), $comparison);
        } elseif ($quote instanceof PropelObjectCollection) {
            return $this
                ->useQuoteQuery()
                ->filterByPrimaryKeys($quote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuote() only accepts arguments of type Quote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function joinQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quote');

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
            $this->addJoinObject($join, 'Quote');
        }

        return $this;
    }

    /**
     * Use the Quote relation Quote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quote', 'QuoteQuery');
    }

    /**
     * Filter the query by a related Triggerprospectionnote object
     *
     * @param   Triggerprospectionnote|PropelObjectCollection $triggerprospectionnote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TriggerprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospectionnote($triggerprospectionnote, $comparison = null)
    {
        if ($triggerprospectionnote instanceof Triggerprospectionnote) {
            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $triggerprospectionnote->getIdtriggerprospection(), $comparison);
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
     * @return TriggerprospectionQuery The current query, for fluid interface
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
     * @return                 TriggerprospectionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospectionuser($triggerprospectionuser, $comparison = null)
    {
        if ($triggerprospectionuser instanceof Triggerprospectionuser) {
            return $this
                ->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $triggerprospectionuser->getIdtriggerprospection(), $comparison);
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
     * @return TriggerprospectionQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Triggerprospection $triggerprospection Object to remove from the list of results
     *
     * @return TriggerprospectionQuery The current query, for fluid interface
     */
    public function prune($triggerprospection = null)
    {
        if ($triggerprospection) {
            $this->addUsingAlias(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $triggerprospection->getIdtriggerprospection(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
