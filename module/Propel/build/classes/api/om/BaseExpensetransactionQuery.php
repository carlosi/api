<?php


/**
 * Base class that represents a query for the 'expensetransaction' table.
 *
 *
 *
 * @method ExpensetransactionQuery orderByIdexpensetransaction($order = Criteria::ASC) Order by the idexpensetransaction column
 * @method ExpensetransactionQuery orderByIdexpenseitem($order = Criteria::ASC) Order by the idexpenseitem column
 * @method ExpensetransactionQuery orderByExpensetransactionStatus($order = Criteria::ASC) Order by the expensetransaction_status column
 * @method ExpensetransactionQuery orderByExpensetransactionComment($order = Criteria::ASC) Order by the expensetransaction_comment column
 * @method ExpensetransactionQuery orderByExpensetransactionQuantity($order = Criteria::ASC) Order by the expensetransaction_quantity column
 * @method ExpensetransactionQuery orderByExpensetransactionValue($order = Criteria::ASC) Order by the expensetransaction_value column
 * @method ExpensetransactionQuery orderByExpensetransactionDate($order = Criteria::ASC) Order by the expensetransaction_date column
 *
 * @method ExpensetransactionQuery groupByIdexpensetransaction() Group by the idexpensetransaction column
 * @method ExpensetransactionQuery groupByIdexpenseitem() Group by the idexpenseitem column
 * @method ExpensetransactionQuery groupByExpensetransactionStatus() Group by the expensetransaction_status column
 * @method ExpensetransactionQuery groupByExpensetransactionComment() Group by the expensetransaction_comment column
 * @method ExpensetransactionQuery groupByExpensetransactionQuantity() Group by the expensetransaction_quantity column
 * @method ExpensetransactionQuery groupByExpensetransactionValue() Group by the expensetransaction_value column
 * @method ExpensetransactionQuery groupByExpensetransactionDate() Group by the expensetransaction_date column
 *
 * @method ExpensetransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ExpensetransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ExpensetransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ExpensetransactionQuery leftJoinExpenseitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expenseitem relation
 * @method ExpensetransactionQuery rightJoinExpenseitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expenseitem relation
 * @method ExpensetransactionQuery innerJoinExpenseitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Expenseitem relation
 *
 * @method ExpensetransactionQuery leftJoinExpensetransactionfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensetransactionfile relation
 * @method ExpensetransactionQuery rightJoinExpensetransactionfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensetransactionfile relation
 * @method ExpensetransactionQuery innerJoinExpensetransactionfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensetransactionfile relation
 *
 * @method Expensetransaction findOne(PropelPDO $con = null) Return the first Expensetransaction matching the query
 * @method Expensetransaction findOneOrCreate(PropelPDO $con = null) Return the first Expensetransaction matching the query, or a new Expensetransaction object populated from the query conditions when no match is found
 *
 * @method Expensetransaction findOneByIdexpenseitem(int $idexpenseitem) Return the first Expensetransaction filtered by the idexpenseitem column
 * @method Expensetransaction findOneByExpensetransactionStatus(string $expensetransaction_status) Return the first Expensetransaction filtered by the expensetransaction_status column
 * @method Expensetransaction findOneByExpensetransactionComment(string $expensetransaction_comment) Return the first Expensetransaction filtered by the expensetransaction_comment column
 * @method Expensetransaction findOneByExpensetransactionQuantity(string $expensetransaction_quantity) Return the first Expensetransaction filtered by the expensetransaction_quantity column
 * @method Expensetransaction findOneByExpensetransactionValue(string $expensetransaction_value) Return the first Expensetransaction filtered by the expensetransaction_value column
 * @method Expensetransaction findOneByExpensetransactionDate(string $expensetransaction_date) Return the first Expensetransaction filtered by the expensetransaction_date column
 *
 * @method array findByIdexpensetransaction(int $idexpensetransaction) Return Expensetransaction objects filtered by the idexpensetransaction column
 * @method array findByIdexpenseitem(int $idexpenseitem) Return Expensetransaction objects filtered by the idexpenseitem column
 * @method array findByExpensetransactionStatus(string $expensetransaction_status) Return Expensetransaction objects filtered by the expensetransaction_status column
 * @method array findByExpensetransactionComment(string $expensetransaction_comment) Return Expensetransaction objects filtered by the expensetransaction_comment column
 * @method array findByExpensetransactionQuantity(string $expensetransaction_quantity) Return Expensetransaction objects filtered by the expensetransaction_quantity column
 * @method array findByExpensetransactionValue(string $expensetransaction_value) Return Expensetransaction objects filtered by the expensetransaction_value column
 * @method array findByExpensetransactionDate(string $expensetransaction_date) Return Expensetransaction objects filtered by the expensetransaction_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpensetransactionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseExpensetransactionQuery object.
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
            $modelName = 'Expensetransaction';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ExpensetransactionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ExpensetransactionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ExpensetransactionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ExpensetransactionQuery) {
            return $criteria;
        }
        $query = new ExpensetransactionQuery(null, null, $modelAlias);

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
     * @return   Expensetransaction|Expensetransaction[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ExpensetransactionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ExpensetransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Expensetransaction A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdexpensetransaction($key, $con = null)
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
     * @return                 Expensetransaction A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idexpensetransaction`, `idexpenseitem`, `expensetransaction_status`, `expensetransaction_comment`, `expensetransaction_quantity`, `expensetransaction_value`, `expensetransaction_date` FROM `expensetransaction` WHERE `idexpensetransaction` = :p0';
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
            $obj = new Expensetransaction();
            $obj->hydrate($row);
            ExpensetransactionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Expensetransaction|Expensetransaction[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Expensetransaction[]|mixed the list of results, formatted by the current formatter
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
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $keys, Criteria::IN);
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
     * @param     mixed $idexpensetransaction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByIdexpensetransaction($idexpensetransaction = null, $comparison = null)
    {
        if (is_array($idexpensetransaction)) {
            $useMinMax = false;
            if (isset($idexpensetransaction['min'])) {
                $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensetransaction['max'])) {
                $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $idexpensetransaction, $comparison);
    }

    /**
     * Filter the query on the idexpenseitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdexpenseitem(1234); // WHERE idexpenseitem = 1234
     * $query->filterByIdexpenseitem(array(12, 34)); // WHERE idexpenseitem IN (12, 34)
     * $query->filterByIdexpenseitem(array('min' => 12)); // WHERE idexpenseitem >= 12
     * $query->filterByIdexpenseitem(array('max' => 12)); // WHERE idexpenseitem <= 12
     * </code>
     *
     * @see       filterByExpenseitem()
     *
     * @param     mixed $idexpenseitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByIdexpenseitem($idexpenseitem = null, $comparison = null)
    {
        if (is_array($idexpenseitem)) {
            $useMinMax = false;
            if (isset($idexpenseitem['min'])) {
                $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSEITEM, $idexpenseitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpenseitem['max'])) {
                $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSEITEM, $idexpenseitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSEITEM, $idexpenseitem, $comparison);
    }

    /**
     * Filter the query on the expensetransaction_status column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionStatus('fooValue');   // WHERE expensetransaction_status = 'fooValue'
     * $query->filterByExpensetransactionStatus('%fooValue%'); // WHERE expensetransaction_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensetransactionStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionStatus($expensetransactionStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensetransactionStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expensetransactionStatus)) {
                $expensetransactionStatus = str_replace('*', '%', $expensetransactionStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_STATUS, $expensetransactionStatus, $comparison);
    }

    /**
     * Filter the query on the expensetransaction_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionComment('fooValue');   // WHERE expensetransaction_comment = 'fooValue'
     * $query->filterByExpensetransactionComment('%fooValue%'); // WHERE expensetransaction_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensetransactionComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionComment($expensetransactionComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensetransactionComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expensetransactionComment)) {
                $expensetransactionComment = str_replace('*', '%', $expensetransactionComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_COMMENT, $expensetransactionComment, $comparison);
    }

    /**
     * Filter the query on the expensetransaction_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionQuantity(1234); // WHERE expensetransaction_quantity = 1234
     * $query->filterByExpensetransactionQuantity(array(12, 34)); // WHERE expensetransaction_quantity IN (12, 34)
     * $query->filterByExpensetransactionQuantity(array('min' => 12)); // WHERE expensetransaction_quantity >= 12
     * $query->filterByExpensetransactionQuantity(array('max' => 12)); // WHERE expensetransaction_quantity <= 12
     * </code>
     *
     * @param     mixed $expensetransactionQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionQuantity($expensetransactionQuantity = null, $comparison = null)
    {
        if (is_array($expensetransactionQuantity)) {
            $useMinMax = false;
            if (isset($expensetransactionQuantity['min'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY, $expensetransactionQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expensetransactionQuantity['max'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY, $expensetransactionQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY, $expensetransactionQuantity, $comparison);
    }

    /**
     * Filter the query on the expensetransaction_value column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionValue(1234); // WHERE expensetransaction_value = 1234
     * $query->filterByExpensetransactionValue(array(12, 34)); // WHERE expensetransaction_value IN (12, 34)
     * $query->filterByExpensetransactionValue(array('min' => 12)); // WHERE expensetransaction_value >= 12
     * $query->filterByExpensetransactionValue(array('max' => 12)); // WHERE expensetransaction_value <= 12
     * </code>
     *
     * @param     mixed $expensetransactionValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionValue($expensetransactionValue = null, $comparison = null)
    {
        if (is_array($expensetransactionValue)) {
            $useMinMax = false;
            if (isset($expensetransactionValue['min'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE, $expensetransactionValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expensetransactionValue['max'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE, $expensetransactionValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE, $expensetransactionValue, $comparison);
    }

    /**
     * Filter the query on the expensetransaction_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionDate('2011-03-14'); // WHERE expensetransaction_date = '2011-03-14'
     * $query->filterByExpensetransactionDate('now'); // WHERE expensetransaction_date = '2011-03-14'
     * $query->filterByExpensetransactionDate(array('max' => 'yesterday')); // WHERE expensetransaction_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $expensetransactionDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionDate($expensetransactionDate = null, $comparison = null)
    {
        if (is_array($expensetransactionDate)) {
            $useMinMax = false;
            if (isset($expensetransactionDate['min'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_DATE, $expensetransactionDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expensetransactionDate['max'])) {
                $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_DATE, $expensetransactionDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionPeer::EXPENSETRANSACTION_DATE, $expensetransactionDate, $comparison);
    }

    /**
     * Filter the query by a related Expenseitem object
     *
     * @param   Expenseitem|PropelObjectCollection $expenseitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensetransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpenseitem($expenseitem, $comparison = null)
    {
        if ($expenseitem instanceof Expenseitem) {
            return $this
                ->addUsingAlias(ExpensetransactionPeer::IDEXPENSEITEM, $expenseitem->getIdexpenseitem(), $comparison);
        } elseif ($expenseitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpensetransactionPeer::IDEXPENSEITEM, $expenseitem->toKeyValue('PrimaryKey', 'Idexpenseitem'), $comparison);
        } else {
            throw new PropelException('filterByExpenseitem() only accepts arguments of type Expenseitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expenseitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function joinExpenseitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expenseitem');

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
            $this->addJoinObject($join, 'Expenseitem');
        }

        return $this;
    }

    /**
     * Use the Expenseitem relation Expenseitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpenseitemQuery A secondary query class using the current class as primary query
     */
    public function useExpenseitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpenseitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expenseitem', 'ExpenseitemQuery');
    }

    /**
     * Filter the query by a related Expensetransactionfile object
     *
     * @param   Expensetransactionfile|PropelObjectCollection $expensetransactionfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensetransactionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensetransactionfile($expensetransactionfile, $comparison = null)
    {
        if ($expensetransactionfile instanceof Expensetransactionfile) {
            return $this
                ->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $expensetransactionfile->getIdexpensetransaction(), $comparison);
        } elseif ($expensetransactionfile instanceof PropelObjectCollection) {
            return $this
                ->useExpensetransactionfileQuery()
                ->filterByPrimaryKeys($expensetransactionfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpensetransactionfile() only accepts arguments of type Expensetransactionfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expensetransactionfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function joinExpensetransactionfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expensetransactionfile');

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
            $this->addJoinObject($join, 'Expensetransactionfile');
        }

        return $this;
    }

    /**
     * Use the Expensetransactionfile relation Expensetransactionfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpensetransactionfileQuery A secondary query class using the current class as primary query
     */
    public function useExpensetransactionfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpensetransactionfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expensetransactionfile', 'ExpensetransactionfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Expensetransaction $expensetransaction Object to remove from the list of results
     *
     * @return ExpensetransactionQuery The current query, for fluid interface
     */
    public function prune($expensetransaction = null)
    {
        if ($expensetransaction) {
            $this->addUsingAlias(ExpensetransactionPeer::IDEXPENSETRANSACTION, $expensetransaction->getIdexpensetransaction(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
