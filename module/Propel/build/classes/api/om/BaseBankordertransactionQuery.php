<?php


/**
 * Base class that represents a query for the 'bankordertransaction' table.
 *
 *
 *
 * @method BankordertransactionQuery orderByIdbankordertransaction($order = Criteria::ASC) Order by the idbankordertransaction column
 * @method BankordertransactionQuery orderByIdbankaccount($order = Criteria::ASC) Order by the idbankaccount column
 * @method BankordertransactionQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method BankordertransactionQuery orderByBankordertransactionAmount($order = Criteria::ASC) Order by the bankordertransaction_amount column
 * @method BankordertransactionQuery orderByBankordertransactionDate($order = Criteria::ASC) Order by the bankordertransaction_date column
 * @method BankordertransactionQuery orderByBankordertransactionPaymentmethod($order = Criteria::ASC) Order by the bankordertransaction_paymentmethod column
 * @method BankordertransactionQuery orderByBankordertransactionLast4ofAccount($order = Criteria::ASC) Order by the bankordertransaction_last4of_account column
 *
 * @method BankordertransactionQuery groupByIdbankordertransaction() Group by the idbankordertransaction column
 * @method BankordertransactionQuery groupByIdbankaccount() Group by the idbankaccount column
 * @method BankordertransactionQuery groupByIdorder() Group by the idorder column
 * @method BankordertransactionQuery groupByBankordertransactionAmount() Group by the bankordertransaction_amount column
 * @method BankordertransactionQuery groupByBankordertransactionDate() Group by the bankordertransaction_date column
 * @method BankordertransactionQuery groupByBankordertransactionPaymentmethod() Group by the bankordertransaction_paymentmethod column
 * @method BankordertransactionQuery groupByBankordertransactionLast4ofAccount() Group by the bankordertransaction_last4of_account column
 *
 * @method BankordertransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BankordertransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BankordertransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BankordertransactionQuery leftJoinBankaccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankaccount relation
 * @method BankordertransactionQuery rightJoinBankaccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankaccount relation
 * @method BankordertransactionQuery innerJoinBankaccount($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankaccount relation
 *
 * @method BankordertransactionQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method BankordertransactionQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method BankordertransactionQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Bankordertransaction findOne(PropelPDO $con = null) Return the first Bankordertransaction matching the query
 * @method Bankordertransaction findOneOrCreate(PropelPDO $con = null) Return the first Bankordertransaction matching the query, or a new Bankordertransaction object populated from the query conditions when no match is found
 *
 * @method Bankordertransaction findOneByIdbankaccount(int $idbankaccount) Return the first Bankordertransaction filtered by the idbankaccount column
 * @method Bankordertransaction findOneByIdorder(int $idorder) Return the first Bankordertransaction filtered by the idorder column
 * @method Bankordertransaction findOneByBankordertransactionAmount(string $bankordertransaction_amount) Return the first Bankordertransaction filtered by the bankordertransaction_amount column
 * @method Bankordertransaction findOneByBankordertransactionDate(string $bankordertransaction_date) Return the first Bankordertransaction filtered by the bankordertransaction_date column
 * @method Bankordertransaction findOneByBankordertransactionPaymentmethod(string $bankordertransaction_paymentmethod) Return the first Bankordertransaction filtered by the bankordertransaction_paymentmethod column
 * @method Bankordertransaction findOneByBankordertransactionLast4ofAccount(string $bankordertransaction_last4of_account) Return the first Bankordertransaction filtered by the bankordertransaction_last4of_account column
 *
 * @method array findByIdbankordertransaction(int $idbankordertransaction) Return Bankordertransaction objects filtered by the idbankordertransaction column
 * @method array findByIdbankaccount(int $idbankaccount) Return Bankordertransaction objects filtered by the idbankaccount column
 * @method array findByIdorder(int $idorder) Return Bankordertransaction objects filtered by the idorder column
 * @method array findByBankordertransactionAmount(string $bankordertransaction_amount) Return Bankordertransaction objects filtered by the bankordertransaction_amount column
 * @method array findByBankordertransactionDate(string $bankordertransaction_date) Return Bankordertransaction objects filtered by the bankordertransaction_date column
 * @method array findByBankordertransactionPaymentmethod(string $bankordertransaction_paymentmethod) Return Bankordertransaction objects filtered by the bankordertransaction_paymentmethod column
 * @method array findByBankordertransactionLast4ofAccount(string $bankordertransaction_last4of_account) Return Bankordertransaction objects filtered by the bankordertransaction_last4of_account column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBankordertransactionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBankordertransactionQuery object.
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
            $modelName = 'Bankordertransaction';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BankordertransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BankordertransactionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BankordertransactionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BankordertransactionQuery) {
            return $criteria;
        }
        $query = new BankordertransactionQuery(null, null, $modelAlias);

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
     * @return   Bankordertransaction|Bankordertransaction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BankordertransactionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bankordertransaction A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbankordertransaction($key, $con = null)
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
     * @return                 Bankordertransaction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbankordertransaction`, `idbankaccount`, `idorder`, `bankordertransaction_amount`, `bankordertransaction_date`, `bankordertransaction_paymentmethod`, `bankordertransaction_last4of_account` FROM `bankordertransaction` WHERE `idbankordertransaction` = :p0';
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
            $obj = new Bankordertransaction();
            $obj->hydrate($row);
            BankordertransactionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bankordertransaction|Bankordertransaction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bankordertransaction[]|mixed the list of results, formatted by the current formatter
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
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbankordertransaction column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbankordertransaction(1234); // WHERE idbankordertransaction = 1234
     * $query->filterByIdbankordertransaction(array(12, 34)); // WHERE idbankordertransaction IN (12, 34)
     * $query->filterByIdbankordertransaction(array('min' => 12)); // WHERE idbankordertransaction >= 12
     * $query->filterByIdbankordertransaction(array('max' => 12)); // WHERE idbankordertransaction <= 12
     * </code>
     *
     * @param     mixed $idbankordertransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByIdbankordertransaction($idbankordertransaction = null, $comparison = null)
    {
        if (is_array($idbankordertransaction)) {
            $useMinMax = false;
            if (isset($idbankordertransaction['min'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $idbankordertransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbankordertransaction['max'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $idbankordertransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $idbankordertransaction, $comparison);
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
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByIdbankaccount($idbankaccount = null, $comparison = null)
    {
        if (is_array($idbankaccount)) {
            $useMinMax = false;
            if (isset($idbankaccount['min'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDBANKACCOUNT, $idbankaccount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbankaccount['max'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDBANKACCOUNT, $idbankaccount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::IDBANKACCOUNT, $idbankaccount, $comparison);
    }

    /**
     * Filter the query on the idorder column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorder(1234); // WHERE idorder = 1234
     * $query->filterByIdorder(array(12, 34)); // WHERE idorder IN (12, 34)
     * $query->filterByIdorder(array('min' => 12)); // WHERE idorder >= 12
     * $query->filterByIdorder(array('max' => 12)); // WHERE idorder <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $idorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(BankordertransactionPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the bankordertransaction_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByBankordertransactionAmount(1234); // WHERE bankordertransaction_amount = 1234
     * $query->filterByBankordertransactionAmount(array(12, 34)); // WHERE bankordertransaction_amount IN (12, 34)
     * $query->filterByBankordertransactionAmount(array('min' => 12)); // WHERE bankordertransaction_amount >= 12
     * $query->filterByBankordertransactionAmount(array('max' => 12)); // WHERE bankordertransaction_amount <= 12
     * </code>
     *
     * @param     mixed $bankordertransactionAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByBankordertransactionAmount($bankordertransactionAmount = null, $comparison = null)
    {
        if (is_array($bankordertransactionAmount)) {
            $useMinMax = false;
            if (isset($bankordertransactionAmount['min'])) {
                $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT, $bankordertransactionAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankordertransactionAmount['max'])) {
                $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT, $bankordertransactionAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT, $bankordertransactionAmount, $comparison);
    }

    /**
     * Filter the query on the bankordertransaction_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBankordertransactionDate('2011-03-14'); // WHERE bankordertransaction_date = '2011-03-14'
     * $query->filterByBankordertransactionDate('now'); // WHERE bankordertransaction_date = '2011-03-14'
     * $query->filterByBankordertransactionDate(array('max' => 'yesterday')); // WHERE bankordertransaction_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $bankordertransactionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByBankordertransactionDate($bankordertransactionDate = null, $comparison = null)
    {
        if (is_array($bankordertransactionDate)) {
            $useMinMax = false;
            if (isset($bankordertransactionDate['min'])) {
                $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_DATE, $bankordertransactionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankordertransactionDate['max'])) {
                $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_DATE, $bankordertransactionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_DATE, $bankordertransactionDate, $comparison);
    }

    /**
     * Filter the query on the bankordertransaction_paymentmethod column
     *
     * Example usage:
     * <code>
     * $query->filterByBankordertransactionPaymentmethod('fooValue');   // WHERE bankordertransaction_paymentmethod = 'fooValue'
     * $query->filterByBankordertransactionPaymentmethod('%fooValue%'); // WHERE bankordertransaction_paymentmethod LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankordertransactionPaymentmethod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByBankordertransactionPaymentmethod($bankordertransactionPaymentmethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankordertransactionPaymentmethod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankordertransactionPaymentmethod)) {
                $bankordertransactionPaymentmethod = str_replace('*', '%', $bankordertransactionPaymentmethod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD, $bankordertransactionPaymentmethod, $comparison);
    }

    /**
     * Filter the query on the bankordertransaction_last4of_account column
     *
     * Example usage:
     * <code>
     * $query->filterByBankordertransactionLast4ofAccount('fooValue');   // WHERE bankordertransaction_last4of_account = 'fooValue'
     * $query->filterByBankordertransactionLast4ofAccount('%fooValue%'); // WHERE bankordertransaction_last4of_account LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankordertransactionLast4ofAccount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function filterByBankordertransactionLast4ofAccount($bankordertransactionLast4ofAccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankordertransactionLast4ofAccount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankordertransactionLast4ofAccount)) {
                $bankordertransactionLast4ofAccount = str_replace('*', '%', $bankordertransactionLast4ofAccount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankordertransactionPeer::BANKORDERTRANSACTION_LAST4OF_ACCOUNT, $bankordertransactionLast4ofAccount, $comparison);
    }

    /**
     * Filter the query by a related Bankaccount object
     *
     * @param   Bankaccount|PropelObjectCollection $bankaccount The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankordertransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankaccount($bankaccount, $comparison = null)
    {
        if ($bankaccount instanceof Bankaccount) {
            return $this
                ->addUsingAlias(BankordertransactionPeer::IDBANKACCOUNT, $bankaccount->getIdbankaccount(), $comparison);
        } elseif ($bankaccount instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BankordertransactionPeer::IDBANKACCOUNT, $bankaccount->toKeyValue('PrimaryKey', 'Idbankaccount'), $comparison);
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
     * @return BankordertransactionQuery The current query, for fluid interface
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
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankordertransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(BankordertransactionPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BankordertransactionPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type Order or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation Order object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bankordertransaction $bankordertransaction Object to remove from the list of results
     *
     * @return BankordertransactionQuery The current query, for fluid interface
     */
    public function prune($bankordertransaction = null)
    {
        if ($bankordertransaction) {
            $this->addUsingAlias(BankordertransactionPeer::IDBANKORDERTRANSACTION, $bankordertransaction->getIdbankordertransaction(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
