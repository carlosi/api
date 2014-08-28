<?php


/**
 * Base class that represents a query for the 'bankaccount' table.
 *
 *
 *
 * @method BankaccountQuery orderByIdbankaccount($order = Criteria::ASC) Order by the idbankaccount column
 * @method BankaccountQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method BankaccountQuery orderByBankaccountName($order = Criteria::ASC) Order by the bankaccount_name column
 *
 * @method BankaccountQuery groupByIdbankaccount() Group by the idbankaccount column
 * @method BankaccountQuery groupByIdcompany() Group by the idcompany column
 * @method BankaccountQuery groupByBankaccountName() Group by the bankaccount_name column
 *
 * @method BankaccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BankaccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BankaccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BankaccountQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method BankaccountQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method BankaccountQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method BankaccountQuery leftJoinBankexpensetransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankexpensetransaction relation
 * @method BankaccountQuery rightJoinBankexpensetransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankexpensetransaction relation
 * @method BankaccountQuery innerJoinBankexpensetransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankexpensetransaction relation
 *
 * @method BankaccountQuery leftJoinBankordertransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankordertransaction relation
 * @method BankaccountQuery rightJoinBankordertransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankordertransaction relation
 * @method BankaccountQuery innerJoinBankordertransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankordertransaction relation
 *
 * @method Bankaccount findOne(PropelPDO $con = null) Return the first Bankaccount matching the query
 * @method Bankaccount findOneOrCreate(PropelPDO $con = null) Return the first Bankaccount matching the query, or a new Bankaccount object populated from the query conditions when no match is found
 *
 * @method Bankaccount findOneByIdcompany(int $idcompany) Return the first Bankaccount filtered by the idcompany column
 * @method Bankaccount findOneByBankaccountName(string $bankaccount_name) Return the first Bankaccount filtered by the bankaccount_name column
 *
 * @method array findByIdbankaccount(int $idbankaccount) Return Bankaccount objects filtered by the idbankaccount column
 * @method array findByIdcompany(int $idcompany) Return Bankaccount objects filtered by the idcompany column
 * @method array findByBankaccountName(string $bankaccount_name) Return Bankaccount objects filtered by the bankaccount_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBankaccountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBankaccountQuery object.
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
            $modelName = 'Bankaccount';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BankaccountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BankaccountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BankaccountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BankaccountQuery) {
            return $criteria;
        }
        $query = new BankaccountQuery(null, null, $modelAlias);

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
     * @return   Bankaccount|Bankaccount[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BankaccountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BankaccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bankaccount A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbankaccount($key, $con = null)
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
     * @return                 Bankaccount A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbankaccount`, `idcompany`, `bankaccount_name` FROM `bankaccount` WHERE `idbankaccount` = :p0';
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
            $obj = new Bankaccount();
            $obj->hydrate($row);
            BankaccountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bankaccount|Bankaccount[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bankaccount[]|mixed the list of results, formatted by the current formatter
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
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $keys, Criteria::IN);
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
     * @param     mixed $idbankaccount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function filterByIdbankaccount($idbankaccount = null, $comparison = null)
    {
        if (is_array($idbankaccount)) {
            $useMinMax = false;
            if (isset($idbankaccount['min'])) {
                $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $idbankaccount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbankaccount['max'])) {
                $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $idbankaccount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $idbankaccount, $comparison);
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
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(BankaccountPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(BankaccountPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankaccountPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the bankaccount_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBankaccountName('fooValue');   // WHERE bankaccount_name = 'fooValue'
     * $query->filterByBankaccountName('%fooValue%'); // WHERE bankaccount_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankaccountName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function filterByBankaccountName($bankaccountName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankaccountName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankaccountName)) {
                $bankaccountName = str_replace('*', '%', $bankaccountName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankaccountPeer::BANKACCOUNT_NAME, $bankaccountName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankaccountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(BankaccountPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BankaccountPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return BankaccountQuery The current query, for fluid interface
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
     * Filter the query by a related Bankexpensetransaction object
     *
     * @param   Bankexpensetransaction|PropelObjectCollection $bankexpensetransaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankaccountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankexpensetransaction($bankexpensetransaction, $comparison = null)
    {
        if ($bankexpensetransaction instanceof Bankexpensetransaction) {
            return $this
                ->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $bankexpensetransaction->getIdbankaccount(), $comparison);
        } elseif ($bankexpensetransaction instanceof PropelObjectCollection) {
            return $this
                ->useBankexpensetransactionQuery()
                ->filterByPrimaryKeys($bankexpensetransaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBankexpensetransaction() only accepts arguments of type Bankexpensetransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bankexpensetransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function joinBankexpensetransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bankexpensetransaction');

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
            $this->addJoinObject($join, 'Bankexpensetransaction');
        }

        return $this;
    }

    /**
     * Use the Bankexpensetransaction relation Bankexpensetransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BankexpensetransactionQuery A secondary query class using the current class as primary query
     */
    public function useBankexpensetransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBankexpensetransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bankexpensetransaction', 'BankexpensetransactionQuery');
    }

    /**
     * Filter the query by a related Bankordertransaction object
     *
     * @param   Bankordertransaction|PropelObjectCollection $bankordertransaction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BankaccountQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankordertransaction($bankordertransaction, $comparison = null)
    {
        if ($bankordertransaction instanceof Bankordertransaction) {
            return $this
                ->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $bankordertransaction->getIdbankaccount(), $comparison);
        } elseif ($bankordertransaction instanceof PropelObjectCollection) {
            return $this
                ->useBankordertransactionQuery()
                ->filterByPrimaryKeys($bankordertransaction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBankordertransaction() only accepts arguments of type Bankordertransaction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bankordertransaction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function joinBankordertransaction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bankordertransaction');

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
            $this->addJoinObject($join, 'Bankordertransaction');
        }

        return $this;
    }

    /**
     * Use the Bankordertransaction relation Bankordertransaction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BankordertransactionQuery A secondary query class using the current class as primary query
     */
    public function useBankordertransactionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBankordertransaction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bankordertransaction', 'BankordertransactionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bankaccount $bankaccount Object to remove from the list of results
     *
     * @return BankaccountQuery The current query, for fluid interface
     */
    public function prune($bankaccount = null)
    {
        if ($bankaccount) {
            $this->addUsingAlias(BankaccountPeer::IDBANKACCOUNT, $bankaccount->getIdbankaccount(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
