<?php


/**
 * Base class that represents a query for the 'expenseitem' table.
 *
 *
 *
 * @method ExpenseitemQuery orderByIdexpenseitem($order = Criteria::ASC) Order by the idexpenseitem column
 * @method ExpenseitemQuery orderByIdexpensecategory($order = Criteria::ASC) Order by the idexpensecategory column
 * @method ExpenseitemQuery orderByExpenseitemName($order = Criteria::ASC) Order by the expenseitem_name column
 * @method ExpenseitemQuery orderByExpenseitemDescription($order = Criteria::ASC) Order by the expenseitem_description column
 *
 * @method ExpenseitemQuery groupByIdexpenseitem() Group by the idexpenseitem column
 * @method ExpenseitemQuery groupByIdexpensecategory() Group by the idexpensecategory column
 * @method ExpenseitemQuery groupByExpenseitemName() Group by the expenseitem_name column
 * @method ExpenseitemQuery groupByExpenseitemDescription() Group by the expenseitem_description column
 *
 * @method ExpenseitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ExpenseitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ExpenseitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ExpenseitemQuery leftJoinExpensecategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensecategory relation
 * @method ExpenseitemQuery rightJoinExpensecategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensecategory relation
 * @method ExpenseitemQuery innerJoinExpensecategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensecategory relation
 *
 * @method ExpenseitemQuery leftJoinExpenserecurrency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expenserecurrency relation
 * @method ExpenseitemQuery rightJoinExpenserecurrency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expenserecurrency relation
 * @method ExpenseitemQuery innerJoinExpenserecurrency($relationAlias = null) Adds a INNER JOIN clause to the query using the Expenserecurrency relation
 *
 * @method ExpenseitemQuery leftJoinExpensetransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensetransaction relation
 * @method ExpenseitemQuery rightJoinExpensetransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensetransaction relation
 * @method ExpenseitemQuery innerJoinExpensetransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensetransaction relation
 *
 * @method Expenseitem findOne(PropelPDO $con = null) Return the first Expenseitem matching the query
 * @method Expenseitem findOneOrCreate(PropelPDO $con = null) Return the first Expenseitem matching the query, or a new Expenseitem object populated from the query conditions when no match is found
 *
 * @method Expenseitem findOneByIdexpensecategory(int $idexpensecategory) Return the first Expenseitem filtered by the idexpensecategory column
 * @method Expenseitem findOneByExpenseitemName(string $expenseitem_name) Return the first Expenseitem filtered by the expenseitem_name column
 * @method Expenseitem findOneByExpenseitemDescription(string $expenseitem_description) Return the first Expenseitem filtered by the expenseitem_description column
 *
 * @method array findByIdexpenseitem(int $idexpenseitem) Return Expenseitem objects filtered by the idexpenseitem column
 * @method array findByIdexpensecategory(int $idexpensecategory) Return Expenseitem objects filtered by the idexpensecategory column
 * @method array findByExpenseitemName(string $expenseitem_name) Return Expenseitem objects filtered by the expenseitem_name column
 * @method array findByExpenseitemDescription(string $expenseitem_description) Return Expenseitem objects filtered by the expenseitem_description column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpenseitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseExpenseitemQuery object.
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
            $modelName = 'Expenseitem';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ExpenseitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ExpenseitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ExpenseitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ExpenseitemQuery) {
            return $criteria;
        }
        $query = new ExpenseitemQuery(null, null, $modelAlias);

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
     * @return   Expenseitem|Expenseitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ExpenseitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Expenseitem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdexpenseitem($key, $con = null)
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
     * @return                 Expenseitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idexpenseitem`, `idexpensecategory`, `expenseitem_name`, `expenseitem_description` FROM `expenseitem` WHERE `idexpenseitem` = :p0';
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
            $obj = new Expenseitem();
            $obj->hydrate($row);
            ExpenseitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Expenseitem|Expenseitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Expenseitem[]|mixed the list of results, formatted by the current formatter
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
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $keys, Criteria::IN);
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
     * @param     mixed $idexpenseitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByIdexpenseitem($idexpenseitem = null, $comparison = null)
    {
        if (is_array($idexpenseitem)) {
            $useMinMax = false;
            if (isset($idexpenseitem['min'])) {
                $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $idexpenseitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpenseitem['max'])) {
                $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $idexpenseitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $idexpenseitem, $comparison);
    }

    /**
     * Filter the query on the idexpensecategory column
     *
     * Example usage:
     * <code>
     * $query->filterByIdexpensecategory(1234); // WHERE idexpensecategory = 1234
     * $query->filterByIdexpensecategory(array(12, 34)); // WHERE idexpensecategory IN (12, 34)
     * $query->filterByIdexpensecategory(array('min' => 12)); // WHERE idexpensecategory >= 12
     * $query->filterByIdexpensecategory(array('max' => 12)); // WHERE idexpensecategory <= 12
     * </code>
     *
     * @see       filterByExpensecategory()
     *
     * @param     mixed $idexpensecategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByIdexpensecategory($idexpensecategory = null, $comparison = null)
    {
        if (is_array($idexpensecategory)) {
            $useMinMax = false;
            if (isset($idexpensecategory['min'])) {
                $this->addUsingAlias(ExpenseitemPeer::IDEXPENSECATEGORY, $idexpensecategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensecategory['max'])) {
                $this->addUsingAlias(ExpenseitemPeer::IDEXPENSECATEGORY, $idexpensecategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpenseitemPeer::IDEXPENSECATEGORY, $idexpensecategory, $comparison);
    }

    /**
     * Filter the query on the expenseitem_name column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenseitemName('fooValue');   // WHERE expenseitem_name = 'fooValue'
     * $query->filterByExpenseitemName('%fooValue%'); // WHERE expenseitem_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expenseitemName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByExpenseitemName($expenseitemName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expenseitemName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expenseitemName)) {
                $expenseitemName = str_replace('*', '%', $expenseitemName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpenseitemPeer::EXPENSEITEM_NAME, $expenseitemName, $comparison);
    }

    /**
     * Filter the query on the expenseitem_description column
     *
     * Example usage:
     * <code>
     * $query->filterByExpenseitemDescription('fooValue');   // WHERE expenseitem_description = 'fooValue'
     * $query->filterByExpenseitemDescription('%fooValue%'); // WHERE expenseitem_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expenseitemDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function filterByExpenseitemDescription($expenseitemDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expenseitemDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expenseitemDescription)) {
                $expenseitemDescription = str_replace('*', '%', $expenseitemDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpenseitemPeer::EXPENSEITEM_DESCRIPTION, $expenseitemDescription, $comparison);
    }

    /**
     * Filter the query by a related Expensecategory object
     *
     * @param   Expensecategory|PropelObjectCollection $expensecategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpenseitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensecategory($expensecategory, $comparison = null)
    {
        if ($expensecategory instanceof Expensecategory) {
            return $this
                ->addUsingAlias(ExpenseitemPeer::IDEXPENSECATEGORY, $expensecategory->getIdexpensecategory(), $comparison);
        } elseif ($expensecategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpenseitemPeer::IDEXPENSECATEGORY, $expensecategory->toKeyValue('PrimaryKey', 'Idexpensecategory'), $comparison);
        } else {
            throw new PropelException('filterByExpensecategory() only accepts arguments of type Expensecategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expensecategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function joinExpensecategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expensecategory');

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
            $this->addJoinObject($join, 'Expensecategory');
        }

        return $this;
    }

    /**
     * Use the Expensecategory relation Expensecategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpensecategoryQuery A secondary query class using the current class as primary query
     */
    public function useExpensecategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpensecategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expensecategory', 'ExpensecategoryQuery');
    }

    /**
     * Filter the query by a related Expenserecurrency object
     *
     * @param   Expenserecurrency|PropelObjectCollection $expenserecurrency  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpenseitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpenserecurrency($expenserecurrency, $comparison = null)
    {
        if ($expenserecurrency instanceof Expenserecurrency) {
            return $this
                ->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $expenserecurrency->getIdexpenseitem(), $comparison);
        } elseif ($expenserecurrency instanceof PropelObjectCollection) {
            return $this
                ->useExpenserecurrencyQuery()
                ->filterByPrimaryKeys($expenserecurrency->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpenserecurrency() only accepts arguments of type Expenserecurrency or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expenserecurrency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function joinExpenserecurrency($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expenserecurrency');

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
            $this->addJoinObject($join, 'Expenserecurrency');
        }

        return $this;
    }

    /**
     * Use the Expenserecurrency relation Expenserecurrency object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpenserecurrencyQuery A secondary query class using the current class as primary query
     */
    public function useExpenserecurrencyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpenserecurrency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expenserecurrency', 'ExpenserecurrencyQuery');
    }

    /**
     * Filter the query by a related Expensetransaction object
     *
     * @param   Expensetransaction|PropelObjectCollection $expensetransaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpenseitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensetransaction($expensetransaction, $comparison = null)
    {
        if ($expensetransaction instanceof Expensetransaction) {
            return $this
                ->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $expensetransaction->getIdexpenseitem(), $comparison);
        } elseif ($expensetransaction instanceof PropelObjectCollection) {
            return $this
                ->useExpensetransactionQuery()
                ->filterByPrimaryKeys($expensetransaction->getPrimaryKeys())
                ->endUse();
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
     * @return ExpenseitemQuery The current query, for fluid interface
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
     * @param   Expenseitem $expenseitem Object to remove from the list of results
     *
     * @return ExpenseitemQuery The current query, for fluid interface
     */
    public function prune($expenseitem = null)
    {
        if ($expenseitem) {
            $this->addUsingAlias(ExpenseitemPeer::IDEXPENSEITEM, $expenseitem->getIdexpenseitem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
