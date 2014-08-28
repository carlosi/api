<?php


/**
 * Base class that represents a query for the 'expenserecurrency' table.
 *
 *
 *
 * @method ExpenserecurrencyQuery orderByIdexpenserecurrency($order = Criteria::ASC) Order by the idexpenserecurrency column
 * @method ExpenserecurrencyQuery orderByIdexpenseitem($order = Criteria::ASC) Order by the idexpenseitem column
 * @method ExpenserecurrencyQuery orderByExpenserecurrencyComment($order = Criteria::ASC) Order by the expenserecurrency_comment column
 * @method ExpenserecurrencyQuery orderByExpenserecurrencyThemequantity($order = Criteria::ASC) Order by the expenserecurrency_themequantity column
 * @method ExpenserecurrencyQuery orderByExpenserecurrencyThemevalue($order = Criteria::ASC) Order by the expenserecurrency_themevalue column
 * @method ExpenserecurrencyQuery orderByExpenserecurrencyCycle($order = Criteria::ASC) Order by the expenserecurrency_cycle column
 * @method ExpenserecurrencyQuery orderByExpenserecurrencyApplyeach($order = Criteria::ASC) Order by the expenserecurrency_applyeach column
 *
 * @method ExpenserecurrencyQuery groupByIdexpenserecurrency() Group by the idexpenserecurrency column
 * @method ExpenserecurrencyQuery groupByIdexpenseitem() Group by the idexpenseitem column
 * @method ExpenserecurrencyQuery groupByExpenserecurrencyComment() Group by the expenserecurrency_comment column
 * @method ExpenserecurrencyQuery groupByExpenserecurrencyThemequantity() Group by the expenserecurrency_themequantity column
 * @method ExpenserecurrencyQuery groupByExpenserecurrencyThemevalue() Group by the expenserecurrency_themevalue column
 * @method ExpenserecurrencyQuery groupByExpenserecurrencyCycle() Group by the expenserecurrency_cycle column
 * @method ExpenserecurrencyQuery groupByExpenserecurrencyApplyeach() Group by the expenserecurrency_applyeach column
 *
 * @method ExpenserecurrencyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ExpenserecurrencyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ExpenserecurrencyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ExpenserecurrencyQuery leftJoinExpenseitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expenseitem relation
 * @method ExpenserecurrencyQuery rightJoinExpenseitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expenseitem relation
 * @method ExpenserecurrencyQuery innerJoinExpenseitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Expenseitem relation
 *
 * @method Expenserecurrency findOne(PropelPDO $con = null) Return the first Expenserecurrency matching the query
 * @method Expenserecurrency findOneOrCreate(PropelPDO $con = null) Return the first Expenserecurrency matching the query, or a new Expenserecurrency object populated from the query conditions when no match is found
 *
 * @method Expenserecurrency findOneByIdexpenseitem(int $idexpenseitem) Return the first Expenserecurrency filtered by the idexpenseitem column
 * @method Expenserecurrency findOneByExpenserecurrencyComment(string $expenserecurrency_comment) Return the first Expenserecurrency filtered by the expenserecurrency_comment column
 * @method Expenserecurrency findOneByExpenserecurrencyThemequantity(string $expenserecurrency_themequantity) Return the first Expenserecurrency filtered by the expenserecurrency_themequantity column
 * @method Expenserecurrency findOneByExpenserecurrencyThemevalue(string $expenserecurrency_themevalue) Return the first Expenserecurrency filtered by the expenserecurrency_themevalue column
 * @method Expenserecurrency findOneByExpenserecurrencyCycle(string $expenserecurrency_cycle) Return the first Expenserecurrency filtered by the expenserecurrency_cycle column
 * @method Expenserecurrency findOneByExpenserecurrencyApplyeach(string $expenserecurrency_applyeach) Return the first Expenserecurrency filtered by the expenserecurrency_applyeach column
 *
 * @method array findByIdexpenserecurrency(int $idexpenserecurrency) Return Expenserecurrency objects filtered by the idexpenserecurrency column
 * @method array findByIdexpenseitem(int $idexpenseitem) Return Expenserecurrency objects filtered by the idexpenseitem column
 * @method array findByExpenserecurrencyComment(string $expenserecurrency_comment) Return Expenserecurrency objects filtered by the expenserecurrency_comment column
 * @method array findByExpenserecurrencyThemequantity(string $expenserecurrency_themequantity) Return Expenserecurrency objects filtered by the expenserecurrency_themequantity column
 * @method array findByExpenserecurrencyThemevalue(string $expenserecurrency_themevalue) Return Expenserecurrency objects filtered by the expenserecurrency_themevalue column
 * @method array findByExpenserecurrencyCycle(string $expenserecurrency_cycle) Return Expenserecurrency objects filtered by the expenserecurrency_cycle column
 * @method array findByExpenserecurrencyApplyeach(string $expenserecurrency_applyeach) Return Expenserecurrency objects filtered by the expenserecurrency_applyeach column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpenserecurrencyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseExpenserecurrencyQuery object.
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
            $modelName = 'Expenserecurrency';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ExpenserecurrencyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ExpenserecurrencyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ExpenserecurrencyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ExpenserecurrencyQuery) {
            return $criteria;
        }
        $query = new ExpenserecurrencyQuery(null, null, $modelAlias);

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
     * @return   Expenserecurrency|Expenserecurrency[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ExpenserecurrencyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Expenserecurrency A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdexpenserecurrency($key, $con = null)
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
     * @return                 Expenserecurrency A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idexpenserecurrency`, `idexpenseitem`, `expenserecurrency_comment`, `expenserecurrency_themequantity`, `expenserecurrency_themevalue`, `expenserecurrency_cycle`, `expenserecurrency_applyeach` FROM `expenserecurrency` WHERE `idexpenserecurrency` = :p0';
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
            $obj = new Expenserecurrency();
            $obj->hydrate($row);
            ExpenserecurrencyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Expenserecurrency|Expenserecurrency[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Expenserecurrency[]|mixed the list of results, formatted by the current formatter
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
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idexpenserecurrency column
     *
     * Example usage:
     * <code>
     * $query->filterByIdexpenserecurrency(1234); // WHERE idexpenserecurrency = 1234
     * $query->filterByIdexpenserecurrency(array(12, 34)); // WHERE idexpenserecurrency IN (12, 34)
     * $query->filterByIdexpenserecurrency(array('min' => 12)); // WHERE idexpenserecurrency >= 12
     * $query->filterByIdexpenserecurrency(array('max' => 12)); // WHERE idexpenserecurrency <= 12
     * </code>
     *
     * @param     mixed $idexpenserecurrency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByIdexpenserecurrency($idexpenserecurrency = null, $comparison = null)
    {
        if (is_array($idexpenserecurrency)) {
            $useMinMax = false;
            if (isset($idexpenserecurrency['min'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $idexpenserecurrency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpenserecurrency['max'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $idexpenserecurrency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $idexpenserecurrency, $comparison);
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
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByIdexpenseitem($idexpenseitem = null, $comparison = null)
    {
        if (is_array($idexpenseitem)) {
            $useMinMax = false;
            if (isset($idexpenseitem['min'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSEITEM, $idexpenseitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpenseitem['max'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSEITEM, $idexpenseitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSEITEM, $idexpenseitem, $comparison);
    }

    /**
     * Filter the query on the expenserecurrency_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenserecurrencyComment('fooValue');   // WHERE expenserecurrency_comment = 'fooValue'
     * $query->filterByExpenserecurrencyComment('%fooValue%'); // WHERE expenserecurrency_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expenserecurrencyComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByExpenserecurrencyComment($expenserecurrencyComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expenserecurrencyComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expenserecurrencyComment)) {
                $expenserecurrencyComment = str_replace('*', '%', $expenserecurrencyComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_COMMENT, $expenserecurrencyComment, $comparison);
    }

    /**
     * Filter the query on the expenserecurrency_themequantity column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenserecurrencyThemequantity(1234); // WHERE expenserecurrency_themequantity = 1234
     * $query->filterByExpenserecurrencyThemequantity(array(12, 34)); // WHERE expenserecurrency_themequantity IN (12, 34)
     * $query->filterByExpenserecurrencyThemequantity(array('min' => 12)); // WHERE expenserecurrency_themequantity >= 12
     * $query->filterByExpenserecurrencyThemequantity(array('max' => 12)); // WHERE expenserecurrency_themequantity <= 12
     * </code>
     *
     * @param     mixed $expenserecurrencyThemequantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByExpenserecurrencyThemequantity($expenserecurrencyThemequantity = null, $comparison = null)
    {
        if (is_array($expenserecurrencyThemequantity)) {
            $useMinMax = false;
            if (isset($expenserecurrencyThemequantity['min'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY, $expenserecurrencyThemequantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expenserecurrencyThemequantity['max'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY, $expenserecurrencyThemequantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY, $expenserecurrencyThemequantity, $comparison);
    }

    /**
     * Filter the query on the expenserecurrency_themevalue column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenserecurrencyThemevalue(1234); // WHERE expenserecurrency_themevalue = 1234
     * $query->filterByExpenserecurrencyThemevalue(array(12, 34)); // WHERE expenserecurrency_themevalue IN (12, 34)
     * $query->filterByExpenserecurrencyThemevalue(array('min' => 12)); // WHERE expenserecurrency_themevalue >= 12
     * $query->filterByExpenserecurrencyThemevalue(array('max' => 12)); // WHERE expenserecurrency_themevalue <= 12
     * </code>
     *
     * @param     mixed $expenserecurrencyThemevalue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByExpenserecurrencyThemevalue($expenserecurrencyThemevalue = null, $comparison = null)
    {
        if (is_array($expenserecurrencyThemevalue)) {
            $useMinMax = false;
            if (isset($expenserecurrencyThemevalue['min'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE, $expenserecurrencyThemevalue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expenserecurrencyThemevalue['max'])) {
                $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE, $expenserecurrencyThemevalue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE, $expenserecurrencyThemevalue, $comparison);
    }

    /**
     * Filter the query on the expenserecurrency_cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenserecurrencyCycle('fooValue');   // WHERE expenserecurrency_cycle = 'fooValue'
     * $query->filterByExpenserecurrencyCycle('%fooValue%'); // WHERE expenserecurrency_cycle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expenserecurrencyCycle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByExpenserecurrencyCycle($expenserecurrencyCycle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expenserecurrencyCycle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expenserecurrencyCycle)) {
                $expenserecurrencyCycle = str_replace('*', '%', $expenserecurrencyCycle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE, $expenserecurrencyCycle, $comparison);
    }

    /**
     * Filter the query on the expenserecurrency_applyeach column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenserecurrencyApplyeach('fooValue');   // WHERE expenserecurrency_applyeach = 'fooValue'
     * $query->filterByExpenserecurrencyApplyeach('%fooValue%'); // WHERE expenserecurrency_applyeach LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expenserecurrencyApplyeach The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function filterByExpenserecurrencyApplyeach($expenserecurrencyApplyeach = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expenserecurrencyApplyeach)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expenserecurrencyApplyeach)) {
                $expenserecurrencyApplyeach = str_replace('*', '%', $expenserecurrencyApplyeach);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpenserecurrencyPeer::EXPENSERECURRENCY_APPLYEACH, $expenserecurrencyApplyeach, $comparison);
    }

    /**
     * Filter the query by a related Expenseitem object
     *
     * @param   Expenseitem|PropelObjectCollection $expenseitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpenserecurrencyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpenseitem($expenseitem, $comparison = null)
    {
        if ($expenseitem instanceof Expenseitem) {
            return $this
                ->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSEITEM, $expenseitem->getIdexpenseitem(), $comparison);
        } elseif ($expenseitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSEITEM, $expenseitem->toKeyValue('PrimaryKey', 'Idexpenseitem'), $comparison);
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
     * @return ExpenserecurrencyQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Expenserecurrency $expenserecurrency Object to remove from the list of results
     *
     * @return ExpenserecurrencyQuery The current query, for fluid interface
     */
    public function prune($expenserecurrency = null)
    {
        if ($expenserecurrency) {
            $this->addUsingAlias(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $expenserecurrency->getIdexpenserecurrency(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
