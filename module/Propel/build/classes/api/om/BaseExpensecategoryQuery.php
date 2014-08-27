<?php


/**
 * Base class that represents a query for the 'expensecategory' table.
 *
 *
 *
 * @method ExpensecategoryQuery orderByIdexpensecategory($order = Criteria::ASC) Order by the idexpensecategory column
 * @method ExpensecategoryQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ExpensecategoryQuery orderByExpensecategoryDependency($order = Criteria::ASC) Order by the expensecategory_dependency column
 * @method ExpensecategoryQuery orderByExpensecategoryName($order = Criteria::ASC) Order by the expensecategory_name column
 * @method ExpensecategoryQuery orderByExpensecategoryDescription($order = Criteria::ASC) Order by the expensecategory_description column
 *
 * @method ExpensecategoryQuery groupByIdexpensecategory() Group by the idexpensecategory column
 * @method ExpensecategoryQuery groupByIdcompany() Group by the idcompany column
 * @method ExpensecategoryQuery groupByExpensecategoryDependency() Group by the expensecategory_dependency column
 * @method ExpensecategoryQuery groupByExpensecategoryName() Group by the expensecategory_name column
 * @method ExpensecategoryQuery groupByExpensecategoryDescription() Group by the expensecategory_description column
 *
 * @method ExpensecategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ExpensecategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ExpensecategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ExpensecategoryQuery leftJoinExpensecategoryRelatedByExpensecategoryDependency($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpensecategoryRelatedByExpensecategoryDependency relation
 * @method ExpensecategoryQuery rightJoinExpensecategoryRelatedByExpensecategoryDependency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpensecategoryRelatedByExpensecategoryDependency relation
 * @method ExpensecategoryQuery innerJoinExpensecategoryRelatedByExpensecategoryDependency($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpensecategoryRelatedByExpensecategoryDependency relation
 *
 * @method ExpensecategoryQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ExpensecategoryQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ExpensecategoryQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ExpensecategoryQuery leftJoinExpensecategoryRelatedByIdexpensecategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpensecategoryRelatedByIdexpensecategory relation
 * @method ExpensecategoryQuery rightJoinExpensecategoryRelatedByIdexpensecategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpensecategoryRelatedByIdexpensecategory relation
 * @method ExpensecategoryQuery innerJoinExpensecategoryRelatedByIdexpensecategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpensecategoryRelatedByIdexpensecategory relation
 *
 * @method ExpensecategoryQuery leftJoinExpenseitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expenseitem relation
 * @method ExpensecategoryQuery rightJoinExpenseitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expenseitem relation
 * @method ExpensecategoryQuery innerJoinExpenseitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Expenseitem relation
 *
 * @method Expensecategory findOne(PropelPDO $con = null) Return the first Expensecategory matching the query
 * @method Expensecategory findOneOrCreate(PropelPDO $con = null) Return the first Expensecategory matching the query, or a new Expensecategory object populated from the query conditions when no match is found
 *
 * @method Expensecategory findOneByIdcompany(int $idcompany) Return the first Expensecategory filtered by the idcompany column
 * @method Expensecategory findOneByExpensecategoryDependency(int $expensecategory_dependency) Return the first Expensecategory filtered by the expensecategory_dependency column
 * @method Expensecategory findOneByExpensecategoryName(string $expensecategory_name) Return the first Expensecategory filtered by the expensecategory_name column
 * @method Expensecategory findOneByExpensecategoryDescription(string $expensecategory_description) Return the first Expensecategory filtered by the expensecategory_description column
 *
 * @method array findByIdexpensecategory(int $idexpensecategory) Return Expensecategory objects filtered by the idexpensecategory column
 * @method array findByIdcompany(int $idcompany) Return Expensecategory objects filtered by the idcompany column
 * @method array findByExpensecategoryDependency(int $expensecategory_dependency) Return Expensecategory objects filtered by the expensecategory_dependency column
 * @method array findByExpensecategoryName(string $expensecategory_name) Return Expensecategory objects filtered by the expensecategory_name column
 * @method array findByExpensecategoryDescription(string $expensecategory_description) Return Expensecategory objects filtered by the expensecategory_description column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpensecategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseExpensecategoryQuery object.
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
            $modelName = 'Expensecategory';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ExpensecategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ExpensecategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ExpensecategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ExpensecategoryQuery) {
            return $criteria;
        }
        $query = new ExpensecategoryQuery(null, null, $modelAlias);

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
     * @return   Expensecategory|Expensecategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ExpensecategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ExpensecategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Expensecategory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdexpensecategory($key, $con = null)
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
     * @return                 Expensecategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idexpensecategory`, `idcompany`, `expensecategory_dependency`, `expensecategory_name`, `expensecategory_description` FROM `expensecategory` WHERE `idexpensecategory` = :p0';
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
            $obj = new Expensecategory();
            $obj->hydrate($row);
            ExpensecategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Expensecategory|Expensecategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Expensecategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $keys, Criteria::IN);
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
     * @param     mixed $idexpensecategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByIdexpensecategory($idexpensecategory = null, $comparison = null)
    {
        if (is_array($idexpensecategory)) {
            $useMinMax = false;
            if (isset($idexpensecategory['min'])) {
                $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $idexpensecategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensecategory['max'])) {
                $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $idexpensecategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $idexpensecategory, $comparison);
    }

    /**
     * Filter the query on the idcompany column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompany(1234); // WHERE idcompany = 1234
     * $query->filterByIdcompany(array(12, 34)); // WHERE idcompany IN (12, 34)
     * $query->filterByIdcompany(array('min' => 12)); // WHERE idcompany >= 12
     * $query->filterByIdcompany(array('max' => 12)); // WHERE idcompany <= 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ExpensecategoryPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ExpensecategoryPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensecategoryPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the expensecategory_dependency column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensecategoryDependency(1234); // WHERE expensecategory_dependency = 1234
     * $query->filterByExpensecategoryDependency(array(12, 34)); // WHERE expensecategory_dependency IN (12, 34)
     * $query->filterByExpensecategoryDependency(array('min' => 12)); // WHERE expensecategory_dependency >= 12
     * $query->filterByExpensecategoryDependency(array('max' => 12)); // WHERE expensecategory_dependency <= 12
     * </code>
     *
     * @see       filterByExpensecategoryRelatedByExpensecategoryDependency()
     *
     * @param     mixed $expensecategoryDependency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByExpensecategoryDependency($expensecategoryDependency = null, $comparison = null)
    {
        if (is_array($expensecategoryDependency)) {
            $useMinMax = false;
            if (isset($expensecategoryDependency['min'])) {
                $this->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $expensecategoryDependency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expensecategoryDependency['max'])) {
                $this->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $expensecategoryDependency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $expensecategoryDependency, $comparison);
    }

    /**
     * Filter the query on the expensecategory_name column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensecategoryName('fooValue');   // WHERE expensecategory_name = 'fooValue'
     * $query->filterByExpensecategoryName('%fooValue%'); // WHERE expensecategory_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensecategoryName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByExpensecategoryName($expensecategoryName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensecategoryName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expensecategoryName)) {
                $expensecategoryName = str_replace('*', '%', $expensecategoryName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_NAME, $expensecategoryName, $comparison);
    }

    /**
     * Filter the query on the expensecategory_description column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensecategoryDescription('fooValue');   // WHERE expensecategory_description = 'fooValue'
     * $query->filterByExpensecategoryDescription('%fooValue%'); // WHERE expensecategory_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensecategoryDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function filterByExpensecategoryDescription($expensecategoryDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensecategoryDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expensecategoryDescription)) {
                $expensecategoryDescription = str_replace('*', '%', $expensecategoryDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DESCRIPTION, $expensecategoryDescription, $comparison);
    }

    /**
     * Filter the query by a related Expensecategory object
     *
     * @param   Expensecategory|PropelObjectCollection $expensecategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensecategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensecategoryRelatedByExpensecategoryDependency($expensecategory, $comparison = null)
    {
        if ($expensecategory instanceof Expensecategory) {
            return $this
                ->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $expensecategory->getIdexpensecategory(), $comparison);
        } elseif ($expensecategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $expensecategory->toKeyValue('PrimaryKey', 'Idexpensecategory'), $comparison);
        } else {
            throw new PropelException('filterByExpensecategoryRelatedByExpensecategoryDependency() only accepts arguments of type Expensecategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpensecategoryRelatedByExpensecategoryDependency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function joinExpensecategoryRelatedByExpensecategoryDependency($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpensecategoryRelatedByExpensecategoryDependency');

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
            $this->addJoinObject($join, 'ExpensecategoryRelatedByExpensecategoryDependency');
        }

        return $this;
    }

    /**
     * Use the ExpensecategoryRelatedByExpensecategoryDependency relation Expensecategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpensecategoryQuery A secondary query class using the current class as primary query
     */
    public function useExpensecategoryRelatedByExpensecategoryDependencyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpensecategoryRelatedByExpensecategoryDependency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpensecategoryRelatedByExpensecategoryDependency', 'ExpensecategoryQuery');
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensecategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ExpensecategoryPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpensecategoryPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type Company or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

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
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
    }

    /**
     * Filter the query by a related Expensecategory object
     *
     * @param   Expensecategory|PropelObjectCollection $expensecategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensecategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensecategoryRelatedByIdexpensecategory($expensecategory, $comparison = null)
    {
        if ($expensecategory instanceof Expensecategory) {
            return $this
                ->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $expensecategory->getExpensecategoryDependency(), $comparison);
        } elseif ($expensecategory instanceof PropelObjectCollection) {
            return $this
                ->useExpensecategoryRelatedByIdexpensecategoryQuery()
                ->filterByPrimaryKeys($expensecategory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpensecategoryRelatedByIdexpensecategory() only accepts arguments of type Expensecategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ExpensecategoryRelatedByIdexpensecategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function joinExpensecategoryRelatedByIdexpensecategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ExpensecategoryRelatedByIdexpensecategory');

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
            $this->addJoinObject($join, 'ExpensecategoryRelatedByIdexpensecategory');
        }

        return $this;
    }

    /**
     * Use the ExpensecategoryRelatedByIdexpensecategory relation Expensecategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ExpensecategoryQuery A secondary query class using the current class as primary query
     */
    public function useExpensecategoryRelatedByIdexpensecategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpensecategoryRelatedByIdexpensecategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ExpensecategoryRelatedByIdexpensecategory', 'ExpensecategoryQuery');
    }

    /**
     * Filter the query by a related Expenseitem object
     *
     * @param   Expenseitem|PropelObjectCollection $expenseitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensecategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpenseitem($expenseitem, $comparison = null)
    {
        if ($expenseitem instanceof Expenseitem) {
            return $this
                ->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $expenseitem->getIdexpensecategory(), $comparison);
        } elseif ($expenseitem instanceof PropelObjectCollection) {
            return $this
                ->useExpenseitemQuery()
                ->filterByPrimaryKeys($expenseitem->getPrimaryKeys())
                ->endUse();
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
     * @return ExpensecategoryQuery The current query, for fluid interface
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
     * @param   Expensecategory $expensecategory Object to remove from the list of results
     *
     * @return ExpensecategoryQuery The current query, for fluid interface
     */
    public function prune($expensecategory = null)
    {
        if ($expensecategory) {
            $this->addUsingAlias(ExpensecategoryPeer::IDEXPENSECATEGORY, $expensecategory->getIdexpensecategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
