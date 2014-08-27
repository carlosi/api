<?php


/**
 * Base class that represents a query for the 'quote' table.
 *
 *
 *
 * @method QuoteQuery orderByIdquote($order = Criteria::ASC) Order by the idquote column
 * @method QuoteQuery orderByIdtriggerprospection($order = Criteria::ASC) Order by the idtriggerprospection column
 * @method QuoteQuery orderByQuoteDateexpiration($order = Criteria::ASC) Order by the quote_dateexpiration column
 * @method QuoteQuery orderByQuoteStatus($order = Criteria::ASC) Order by the quote_status column
 *
 * @method QuoteQuery groupByIdquote() Group by the idquote column
 * @method QuoteQuery groupByIdtriggerprospection() Group by the idtriggerprospection column
 * @method QuoteQuery groupByQuoteDateexpiration() Group by the quote_dateexpiration column
 * @method QuoteQuery groupByQuoteStatus() Group by the quote_status column
 *
 * @method QuoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuoteQuery leftJoinTriggerprospection($relationAlias = null) Adds a LEFT JOIN clause to the query using the Triggerprospection relation
 * @method QuoteQuery rightJoinTriggerprospection($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Triggerprospection relation
 * @method QuoteQuery innerJoinTriggerprospection($relationAlias = null) Adds a INNER JOIN clause to the query using the Triggerprospection relation
 *
 * @method QuoteQuery leftJoinQuoteitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quoteitem relation
 * @method QuoteQuery rightJoinQuoteitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quoteitem relation
 * @method QuoteQuery innerJoinQuoteitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Quoteitem relation
 *
 * @method QuoteQuery leftJoinQuoutenote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quoutenote relation
 * @method QuoteQuery rightJoinQuoutenote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quoutenote relation
 * @method QuoteQuery innerJoinQuoutenote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quoutenote relation
 *
 * @method Quote findOne(PropelPDO $con = null) Return the first Quote matching the query
 * @method Quote findOneOrCreate(PropelPDO $con = null) Return the first Quote matching the query, or a new Quote object populated from the query conditions when no match is found
 *
 * @method Quote findOneByIdtriggerprospection(int $idtriggerprospection) Return the first Quote filtered by the idtriggerprospection column
 * @method Quote findOneByQuoteDateexpiration(string $quote_dateexpiration) Return the first Quote filtered by the quote_dateexpiration column
 * @method Quote findOneByQuoteStatus(string $quote_status) Return the first Quote filtered by the quote_status column
 *
 * @method array findByIdquote(int $idquote) Return Quote objects filtered by the idquote column
 * @method array findByIdtriggerprospection(int $idtriggerprospection) Return Quote objects filtered by the idtriggerprospection column
 * @method array findByQuoteDateexpiration(string $quote_dateexpiration) Return Quote objects filtered by the quote_dateexpiration column
 * @method array findByQuoteStatus(string $quote_status) Return Quote objects filtered by the quote_status column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuoteQuery object.
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
            $modelName = 'Quote';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuoteQuery) {
            return $criteria;
        }
        $query = new QuoteQuery(null, null, $modelAlias);

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
     * @return   Quote|Quote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdquote($key, $con = null)
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
     * @return                 Quote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idquote`, `idtriggerprospection`, `quote_dateexpiration`, `quote_status` FROM `quote` WHERE `idquote` = :p0';
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
            $obj = new Quote();
            $obj->hydrate($row);
            QuotePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quote|Quote[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quote[]|mixed the list of results, formatted by the current formatter
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
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotePeer::IDQUOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotePeer::IDQUOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idquote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquote(1234); // WHERE idquote = 1234
     * $query->filterByIdquote(array(12, 34)); // WHERE idquote IN (12, 34)
     * $query->filterByIdquote(array('min' => 12)); // WHERE idquote >= 12
     * $query->filterByIdquote(array('max' => 12)); // WHERE idquote <= 12
     * </code>
     *
     * @param     mixed $idquote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByIdquote($idquote = null, $comparison = null)
    {
        if (is_array($idquote)) {
            $useMinMax = false;
            if (isset($idquote['min'])) {
                $this->addUsingAlias(QuotePeer::IDQUOTE, $idquote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquote['max'])) {
                $this->addUsingAlias(QuotePeer::IDQUOTE, $idquote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotePeer::IDQUOTE, $idquote, $comparison);
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
     * @see       filterByTriggerprospection()
     *
     * @param     mixed $idtriggerprospection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByIdtriggerprospection($idtriggerprospection = null, $comparison = null)
    {
        if (is_array($idtriggerprospection)) {
            $useMinMax = false;
            if (isset($idtriggerprospection['min'])) {
                $this->addUsingAlias(QuotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtriggerprospection['max'])) {
                $this->addUsingAlias(QuotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotePeer::IDTRIGGERPROSPECTION, $idtriggerprospection, $comparison);
    }

    /**
     * Filter the query on the quote_dateexpiration column
     *
     * Example usage:
     * <code>
     * $query->filterByQuoteDateexpiration('2011-03-14'); // WHERE quote_dateexpiration = '2011-03-14'
     * $query->filterByQuoteDateexpiration('now'); // WHERE quote_dateexpiration = '2011-03-14'
     * $query->filterByQuoteDateexpiration(array('max' => 'yesterday')); // WHERE quote_dateexpiration < '2011-03-13'
     * </code>
     *
     * @param     mixed $quoteDateexpiration The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByQuoteDateexpiration($quoteDateexpiration = null, $comparison = null)
    {
        if (is_array($quoteDateexpiration)) {
            $useMinMax = false;
            if (isset($quoteDateexpiration['min'])) {
                $this->addUsingAlias(QuotePeer::QUOTE_DATEEXPIRATION, $quoteDateexpiration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quoteDateexpiration['max'])) {
                $this->addUsingAlias(QuotePeer::QUOTE_DATEEXPIRATION, $quoteDateexpiration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotePeer::QUOTE_DATEEXPIRATION, $quoteDateexpiration, $comparison);
    }

    /**
     * Filter the query on the quote_status column
     *
     * Example usage:
     * <code>
     * $query->filterByQuoteStatus('fooValue');   // WHERE quote_status = 'fooValue'
     * $query->filterByQuoteStatus('%fooValue%'); // WHERE quote_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quoteStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function filterByQuoteStatus($quoteStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quoteStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quoteStatus)) {
                $quoteStatus = str_replace('*', '%', $quoteStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuotePeer::QUOTE_STATUS, $quoteStatus, $comparison);
    }

    /**
     * Filter the query by a related Triggerprospection object
     *
     * @param   Triggerprospection|PropelObjectCollection $triggerprospection The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTriggerprospection($triggerprospection, $comparison = null)
    {
        if ($triggerprospection instanceof Triggerprospection) {
            return $this
                ->addUsingAlias(QuotePeer::IDTRIGGERPROSPECTION, $triggerprospection->getIdtriggerprospection(), $comparison);
        } elseif ($triggerprospection instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuotePeer::IDTRIGGERPROSPECTION, $triggerprospection->toKeyValue('PrimaryKey', 'Idtriggerprospection'), $comparison);
        } else {
            throw new PropelException('filterByTriggerprospection() only accepts arguments of type Triggerprospection or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Triggerprospection relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function joinTriggerprospection($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Triggerprospection');

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
            $this->addJoinObject($join, 'Triggerprospection');
        }

        return $this;
    }

    /**
     * Use the Triggerprospection relation Triggerprospection object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TriggerprospectionQuery A secondary query class using the current class as primary query
     */
    public function useTriggerprospectionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTriggerprospection($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Triggerprospection', 'TriggerprospectionQuery');
    }

    /**
     * Filter the query by a related Quoteitem object
     *
     * @param   Quoteitem|PropelObjectCollection $quoteitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuoteitem($quoteitem, $comparison = null)
    {
        if ($quoteitem instanceof Quoteitem) {
            return $this
                ->addUsingAlias(QuotePeer::IDQUOTE, $quoteitem->getIdquote(), $comparison);
        } elseif ($quoteitem instanceof PropelObjectCollection) {
            return $this
                ->useQuoteitemQuery()
                ->filterByPrimaryKeys($quoteitem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuoteitem() only accepts arguments of type Quoteitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quoteitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function joinQuoteitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quoteitem');

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
            $this->addJoinObject($join, 'Quoteitem');
        }

        return $this;
    }

    /**
     * Use the Quoteitem relation Quoteitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoteitemQuery A secondary query class using the current class as primary query
     */
    public function useQuoteitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuoteitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quoteitem', 'QuoteitemQuery');
    }

    /**
     * Filter the query by a related Quoutenote object
     *
     * @param   Quoutenote|PropelObjectCollection $quoutenote  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuoutenote($quoutenote, $comparison = null)
    {
        if ($quoutenote instanceof Quoutenote) {
            return $this
                ->addUsingAlias(QuotePeer::IDQUOTE, $quoutenote->getIdquote(), $comparison);
        } elseif ($quoutenote instanceof PropelObjectCollection) {
            return $this
                ->useQuoutenoteQuery()
                ->filterByPrimaryKeys($quoutenote->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuoutenote() only accepts arguments of type Quoutenote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quoutenote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function joinQuoutenote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quoutenote');

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
            $this->addJoinObject($join, 'Quoutenote');
        }

        return $this;
    }

    /**
     * Use the Quoutenote relation Quoutenote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoutenoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoutenoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuoutenote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quoutenote', 'QuoutenoteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Quote $quote Object to remove from the list of results
     *
     * @return QuoteQuery The current query, for fluid interface
     */
    public function prune($quote = null)
    {
        if ($quote) {
            $this->addUsingAlias(QuotePeer::IDQUOTE, $quote->getIdquote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
