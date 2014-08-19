<?php


/**
 * Base class that represents a query for the 'bankexpensetransaction' table.
 *
 *
 *
 * @method BankexpensetransactionQuery orderByIdbankexpensetransaction($order = Criteria::ASC) Order by the idbankexpensetransaction column
 * @method BankexpensetransactionQuery orderByIdbankaccount($order = Criteria::ASC) Order by the idbankaccount column
 * @method BankexpensetransactionQuery orderByIdexpensetransaction($order = Criteria::ASC) Order by the idexpensetransaction column
 * @method BankexpensetransactionQuery orderByBankexpensetransactionAmount($order = Criteria::ASC) Order by the bankexpensetransaction_amount column
 * @method BankexpensetransactionQuery orderByBankexpensetransactionDate($order = Criteria::ASC) Order by the bankexpensetransaction_date column
 *
 * @method BankexpensetransactionQuery groupByIdbankexpensetransaction() Group by the idbankexpensetransaction column
 * @method BankexpensetransactionQuery groupByIdbankaccount() Group by the idbankaccount column
 * @method BankexpensetransactionQuery groupByIdexpensetransaction() Group by the idexpensetransaction column
 * @method BankexpensetransactionQuery groupByBankexpensetransactionAmount() Group by the bankexpensetransaction_amount column
 * @method BankexpensetransactionQuery groupByBankexpensetransactionDate() Group by the bankexpensetransaction_date column
 *
 * @method BankexpensetransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BankexpensetransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BankexpensetransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BankexpensetransactionQuery leftJoinBankaccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankaccount relation
 * @method BankexpensetransactionQuery rightJoinBankaccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankaccount relation
 * @method BankexpensetransactionQuery innerJoinBankaccount($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankaccount relation
 *
 * @method BankexpensetransactionQuery leftJoinExpensetransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensetransaction relation
 * @method BankexpensetransactionQuery rightJoinExpensetransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensetransaction relation
 * @method BankexpensetransactionQuery innerJoinExpensetransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensetransaction relation
 *
 * @method Bankexpensetransaction findOne(PropelPDO $con = null) Return the first Bankexpensetransaction matching the query
 * @method Bankexpensetransaction findOneOrCreate(PropelPDO $con = null) Return the first Bankexpensetransaction matching the query, or a new Bankexpensetransaction object populated from the query conditions when no match is found
 *
 * @method Bankexpensetransaction findOneByIdbankaccount(int $idbankaccount) Return the first Bankexpensetransaction filtered by the idbankaccount column
 * @method Bankexpensetransaction findOneByIdexpensetransaction(int $idexpensetransaction) Return the first Bankexpensetransaction filtered by the idexpensetransaction column
 * @method Bankexpensetransaction findOneByBankexpensetransactionAmount(string $bankexpensetransaction_amount) Return the first Bankexpensetransaction filtered by the bankexpensetransaction_amount column
 * @method Bankexpensetransaction findOneByBankexpensetransactionDate(string $bankexpensetransaction_date) Return the first Bankexpensetransaction filtered by the bankexpensetransaction_date column
 *
 * @method array findByIdbankexpensetransaction(int $idbankexpensetransaction) Return Bankexpensetransaction objects filtered by the idbankexpensetransaction column
 * @method array findByIdbankaccount(int $idbankaccount) Return Bankexpensetransaction objects filtered by the idbankaccount column
 * @method array findByIdexpensetransaction(int $idexpensetransaction) Return Bankexpensetransaction objects filtered by the idexpensetransaction column
 * @method array findByBankexpensetransactionAmount(string $bankexpensetransaction_amount) Return Bankexpensetransaction objects filtered by the bankexpensetransaction_amount column
 * @method array findByBankexpensetransactionDate(string $bankexpensetransaction_date) Return Bankexpensetransaction objects filtered by the bankexpensetransaction_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBankexpensetransactionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBankexpensetransactionQuery object.
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
            $modelName = 'Bankexpensetransaction';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BankexpensetransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BankexpensetransactionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BankexpensetransactionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BankexpensetransactionQuery) {
            return $criteria;
        }
        $query = new BankexpensetransactionQuery(null, null, $modelAlias);

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
     * @return   Bankexpensetransaction|Bankexpensetransaction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BankexpensetransactionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BankexpensetransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bankexpensetransaction A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbankexpensetransaction($key, $con = null)
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
     * @return                 Bankexpensetransaction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbankexpensetransaction`, `idbankaccount`, `idexpensetransaction`, `bankexpensetransaction_amount`, `bankexpensetransaction_date` FROM `bankexpensetransaction` WHERE `idbankexpensetransaction` = :p0';
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
            $obj = new Bankexpensetransaction();
            $obj->hydrate($row);
            BankexpensetransactionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bankexpensetransaction|Bankexpensetransaction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bankexpensetransaction[]|mixed the list of results, formatted by the current formatter
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
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbankexpensetransaction column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbankexpensetransaction(1234); // WHERE idbankexpensetransaction = 1234
     * $query->filterByIdbankexpensetransaction(array(12, 34)); // WHERE idbankexpensetransaction IN (12, 34)
     * $query->filterByIdbankexpensetransaction(array('min' => 12)); // WHERE idbankexpensetransaction >= 12
     * $query->filterByIdbankexpensetransaction(array('max' => 12)); // WHERE idbankexpensetransaction <= 12
     * </code>
     *
     * @param     mixed $idbankexpensetransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByIdbankexpensetransaction($idbankexpensetransaction = null, $comparison = null)
    {
        if (is_array($idbankexpensetransaction)) {
            $useMinMax = false;
            if (isset($idbankexpensetransaction['min'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $idbankexpensetransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbankexpensetransaction['max'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $idbankexpensetransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $idbankexpensetransaction, $comparison);
    }

    /**
     * Filter the query on the idbankaccount column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbankaccount(1234); // WHERE idbankaccount = 1234
     * $query->filterByIdbankaccount(array(12, 34)); // WHERE idbankaccount IN (12, 34)
     * $query->filterByIdbankaccount(array('min' => 12)); // WHERE idbankaccount >= 12
     * $query->filterByIdbankaccount(array('max' => 12)); // WHERE idbankaccount <= 12
     * </code>
     *
     * @see       filterByBankaccount()
     *
     * @param     mixed $idbankaccount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByIdbankaccount($idbankaccount = null, $comparison = null)
    {
        if (is_array($idbankaccount)) {
            $useMinMax = false;
            if (isset($idbankaccount['min'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDBANKACCOUNT, $idbankaccount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbankaccount['max'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDBANKACCOUNT, $idbankaccount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankexpensetransactionPeer::IDBANKACCOUNT, $idbankaccount, $comparison);
    }

    /**
     * Filter the query on the idexpensetransaction column
     *
     * Example usage:
     * <code>
     * $query->filterByIdexpensetransaction(1234); // WHERE idexpensetransaction = 1234
     * $query->filterByIdexpensetransaction(array(12, 34)); // WHERE idexpensetransaction IN (12, 34)
     * $query->filterByIdexpensetransaction(array('min' => 12)); // WHERE idexpensetransaction >= 12
     * $query->filterByIdexpensetransaction(array('max' => 12)); // WHERE idexpensetransaction <= 12
     * </code>
     *
     * @see       filterByExpensetransaction()
     *
     * @param     mixed $idexpensetransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByIdexpensetransaction($idexpensetransaction = null, $comparison = null)
    {
        if (is_array($idexpensetransaction)) {
            $useMinMax = false;
            if (isset($idexpensetransaction['min'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensetransaction['max'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankexpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction, $comparison);
    }

    /**
     * Filter the query on the bankexpensetransaction_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByBankexpensetransactionAmount(1234); // WHERE bankexpensetransaction_amount = 1234
     * $query->filterByBankexpensetransactionAmount(array(12, 34)); // WHERE bankexpensetransaction_amount IN (12, 34)
     * $query->filterByBankexpensetransactionAmount(array('min' => 12)); // WHERE bankexpensetransaction_amount >= 12
     * $query->filterByBankexpensetransactionAmount(array('max' => 12)); // WHERE bankexpensetransaction_amount <= 12
     * </code>
     *
     * @param     mixed $bankexpensetransactionAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByBankexpensetransactionAmount($bankexpensetransactionAmount = null, $comparison = null)
    {
        if (is_array($bankexpensetransactionAmount)) {
            $useMinMax = false;
            if (isset($bankexpensetransactionAmount['min'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_AMOUNT, $bankexpensetransactionAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankexpensetransactionAmount['max'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_AMOUNT, $bankexpensetransactionAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_AMOUNT, $bankexpensetransactionAmount, $comparison);
    }

    /**
     * Filter the query on the bankexpensetransaction_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBankexpensetransactionDate('2011-03-14'); // WHERE bankexpensetransaction_date = '2011-03-14'
     * $query->filterByBankexpensetransactionDate('now'); // WHERE bankexpensetransaction_date = '2011-03-14'
     * $query->filterByBankexpensetransactionDate(array('max' => 'yesterday')); // WHERE bankexpensetransaction_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $bankexpensetransactionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function filterByBankexpensetransactionDate($bankexpensetransactionDate = null, $comparison = null)
    {
        if (is_array($bankexpensetransactionDate)) {
            $useMinMax = false;
            if (isset($bankexpensetransactionDate['min'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_DATE, $bankexpensetransactionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankexpensetransactionDate['max'])) {
                $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_DATE, $bankexpensetransactionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankexpensetransactionPeer::BANKEXPENSETRANSACTION_DATE, $bankexpensetransactionDate, $comparison);
    }

    /**
     * Filter the query by a related Bankaccount object
     *
     * @param   Bankaccount|PropelObjectCollection $bankaccount The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankexpensetransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankaccount($bankaccount, $comparison = null)
    {
        if ($bankaccount instanceof Bankaccount) {
            return $this
                ->addUsingAlias(BankexpensetransactionPeer::IDBANKACCOUNT, $bankaccount->getIdbankaccount(), $comparison);
        } elseif ($bankaccount instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BankexpensetransactionPeer::IDBANKACCOUNT, $bankaccount->toKeyValue('PrimaryKey', 'Idbankaccount'), $comparison);
        } else {
            throw new PropelException('filterByBankaccount() only accepts arguments of type Bankaccount or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bankaccount relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function joinBankaccount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bankaccount');

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
            $this->addJoinObject($join, 'Bankaccount');
        }

        return $this;
    }

    /**
     * Use the Bankaccount relation Bankaccount object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BankaccountQuery A secondary query class using the current class as primary query
     */
    public function useBankaccountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBankaccount($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bankaccount', 'BankaccountQuery');
    }

    /**
     * Filter the query by a related Expensetransaction object
     *
     * @param   Expensetransaction|PropelObjectCollection $expensetransaction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankexpensetransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensetransaction($expensetransaction, $comparison = null)
    {
        if ($expensetransaction instanceof Expensetransaction) {
            return $this
                ->addUsingAlias(BankexpensetransactionPeer::IDEXPENSETRANSACTION, $expensetransaction->getIdexpensetransaction(), $comparison);
        } elseif ($expensetransaction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BankexpensetransactionPeer::IDEXPENSETRANSACTION, $expensetransaction->toKeyValue('PrimaryKey', 'Idexpensetransaction'), $comparison);
        } else {
            throw new PropelException('filterByExpensetransaction() only accepts arguments of type Expensetransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expensetransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function joinExpensetransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expensetransaction');

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
            $this->addJoinObject($join, 'Expensetransaction');
        }

        return $this;
    }

    /**
     * Use the Expensetransaction relation Expensetransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpensetransactionQuery A secondary query class using the current class as primary query
     */
    public function useExpensetransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpensetransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expensetransaction', 'ExpensetransactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bankexpensetransaction $bankexpensetransaction Object to remove from the list of results
     *
     * @return BankexpensetransactionQuery The current query, for fluid interface
     */
    public function prune($bankexpensetransaction = null)
    {
        if ($bankexpensetransaction) {
            $this->addUsingAlias(BankexpensetransactionPeer::IDBANKEXPENSETRANSACTION, $bankexpensetransaction->getIdbankexpensetransaction(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
