<?php


/**
 * Base class that represents a query for the 'company' table.
 *
 *
 *
 * @method CompanyQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method CompanyQuery orderByCompanyName($order = Criteria::ASC) Order by the company_name column
 *
 * @method CompanyQuery groupByIdcompany() Group by the idcompany column
 * @method CompanyQuery groupByCompanyName() Group by the company_name column
 *
 * @method CompanyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompanyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompanyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CompanyQuery leftJoinBankaccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bankaccount relation
 * @method CompanyQuery rightJoinBankaccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bankaccount relation
 * @method CompanyQuery innerJoinBankaccount($relationAlias = null) Adds a INNER JOIN clause to the query using the Bankaccount relation
 *
 * @method CompanyQuery leftJoinBranch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Branch relation
 * @method CompanyQuery rightJoinBranch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Branch relation
 * @method CompanyQuery innerJoinBranch($relationAlias = null) Adds a INNER JOIN clause to the query using the Branch relation
 *
 * @method CompanyQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method CompanyQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method CompanyQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method CompanyQuery leftJoinCompanyaddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Companyaddress relation
 * @method CompanyQuery rightJoinCompanyaddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Companyaddress relation
 * @method CompanyQuery innerJoinCompanyaddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Companyaddress relation
 *
 * @method CompanyQuery leftJoinContactgroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contactgroup relation
 * @method CompanyQuery rightJoinContactgroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contactgroup relation
 * @method CompanyQuery innerJoinContactgroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Contactgroup relation
 *
 * @method CompanyQuery leftJoinExpensecategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensecategory relation
 * @method CompanyQuery rightJoinExpensecategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensecategory relation
 * @method CompanyQuery innerJoinExpensecategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensecategory relation
 *
 * @method CompanyQuery leftJoinMarketingchannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingchannel relation
 * @method CompanyQuery rightJoinMarketingchannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingchannel relation
 * @method CompanyQuery innerJoinMarketingchannel($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingchannel relation
 *
 * @method CompanyQuery leftJoinMxtaxinfo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mxtaxinfo relation
 * @method CompanyQuery rightJoinMxtaxinfo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mxtaxinfo relation
 * @method CompanyQuery innerJoinMxtaxinfo($relationAlias = null) Adds a INNER JOIN clause to the query using the Mxtaxinfo relation
 *
 * @method CompanyQuery leftJoinProductionline($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionline relation
 * @method CompanyQuery rightJoinProductionline($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionline relation
 * @method CompanyQuery innerJoinProductionline($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionline relation
 *
 * @method CompanyQuery leftJoinProductionteam($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionteam relation
 * @method CompanyQuery rightJoinProductionteam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionteam relation
 * @method CompanyQuery innerJoinProductionteam($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionteam relation
 *
 * @method CompanyQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method CompanyQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method CompanyQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method CompanyQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method CompanyQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method CompanyQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Company findOne(PropelPDO $con = null) Return the first Company matching the query
 * @method Company findOneOrCreate(PropelPDO $con = null) Return the first Company matching the query, or a new Company object populated from the query conditions when no match is found
 *
 * @method Company findOneByCompanyName(string $company_name) Return the first Company filtered by the company_name column
 *
 * @method array findByIdcompany(int $idcompany) Return Company objects filtered by the idcompany column
 * @method array findByCompanyName(string $company_name) Return Company objects filtered by the company_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseCompanyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompanyQuery object.
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
            $modelName = 'Company';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompanyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CompanyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompanyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompanyQuery) {
            return $criteria;
        }
        $query = new CompanyQuery(null, null, $modelAlias);

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
     * @return   Company|Company[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompanyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Company A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcompany($key, $con = null)
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
     * @return                 Company A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcompany`, `company_name` FROM `company` WHERE `idcompany` = :p0';
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
            $obj = new Company();
            $obj->hydrate($row);
            CompanyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Company|Company[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Company[]|mixed the list of results, formatted by the current formatter
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
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CompanyPeer::IDCOMPANY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CompanyPeer::IDCOMPANY, $keys, Criteria::IN);
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
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(CompanyPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(CompanyPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the company_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyName('fooValue');   // WHERE company_name = 'fooValue'
     * $query->filterByCompanyName('%fooValue%'); // WHERE company_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function filterByCompanyName($companyName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyName)) {
                $companyName = str_replace('*', '%', $companyName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyPeer::COMPANY_NAME, $companyName, $comparison);
    }

    /**
     * Filter the query by a related Bankaccount object
     *
     * @param   Bankaccount|PropelObjectCollection $bankaccount  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBankaccount($bankaccount, $comparison = null)
    {
        if ($bankaccount instanceof Bankaccount) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $bankaccount->getIdcompany(), $comparison);
        } elseif ($bankaccount instanceof PropelObjectCollection) {
            return $this
                ->useBankaccountQuery()
                ->filterByPrimaryKeys($bankaccount->getPrimaryKeys())
                ->endUse();
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
     * @return CompanyQuery The current query, for fluid interface
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
     * Filter the query by a related Branch object
     *
     * @param   Branch|PropelObjectCollection $branch  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranch($branch, $comparison = null)
    {
        if ($branch instanceof Branch) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $branch->getIdcompany(), $comparison);
        } elseif ($branch instanceof PropelObjectCollection) {
            return $this
                ->useBranchQuery()
                ->filterByPrimaryKeys($branch->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBranch() only accepts arguments of type Branch or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Branch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinBranch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Branch');

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
            $this->addJoinObject($join, 'Branch');
        }

        return $this;
    }

    /**
     * Use the Branch relation Branch object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchQuery A secondary query class using the current class as primary query
     */
    public function useBranchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Branch', 'BranchQuery');
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $client->getIdcompany(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            return $this
                ->useClientQuery()
                ->filterByPrimaryKeys($client->getPrimaryKeys())
                ->endUse();
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
     * @return CompanyQuery The current query, for fluid interface
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
     * Filter the query by a related Companyaddress object
     *
     * @param   Companyaddress|PropelObjectCollection $companyaddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompanyaddress($companyaddress, $comparison = null)
    {
        if ($companyaddress instanceof Companyaddress) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $companyaddress->getIdcompany(), $comparison);
        } elseif ($companyaddress instanceof PropelObjectCollection) {
            return $this
                ->useCompanyaddressQuery()
                ->filterByPrimaryKeys($companyaddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCompanyaddress() only accepts arguments of type Companyaddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Companyaddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinCompanyaddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Companyaddress');

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
            $this->addJoinObject($join, 'Companyaddress');
        }

        return $this;
    }

    /**
     * Use the Companyaddress relation Companyaddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyaddressQuery A secondary query class using the current class as primary query
     */
    public function useCompanyaddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompanyaddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Companyaddress', 'CompanyaddressQuery');
    }

    /**
     * Filter the query by a related Contactgroup object
     *
     * @param   Contactgroup|PropelObjectCollection $contactgroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContactgroup($contactgroup, $comparison = null)
    {
        if ($contactgroup instanceof Contactgroup) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $contactgroup->getIdcompany(), $comparison);
        } elseif ($contactgroup instanceof PropelObjectCollection) {
            return $this
                ->useContactgroupQuery()
                ->filterByPrimaryKeys($contactgroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactgroup() only accepts arguments of type Contactgroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contactgroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinContactgroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contactgroup');

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
            $this->addJoinObject($join, 'Contactgroup');
        }

        return $this;
    }

    /**
     * Use the Contactgroup relation Contactgroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactgroupQuery A secondary query class using the current class as primary query
     */
    public function useContactgroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactgroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contactgroup', 'ContactgroupQuery');
    }

    /**
     * Filter the query by a related Expensecategory object
     *
     * @param   Expensecategory|PropelObjectCollection $expensecategory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensecategory($expensecategory, $comparison = null)
    {
        if ($expensecategory instanceof Expensecategory) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $expensecategory->getIdcompany(), $comparison);
        } elseif ($expensecategory instanceof PropelObjectCollection) {
            return $this
                ->useExpensecategoryQuery()
                ->filterByPrimaryKeys($expensecategory->getPrimaryKeys())
                ->endUse();
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
     * @return CompanyQuery The current query, for fluid interface
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
     * Filter the query by a related Marketingchannel object
     *
     * @param   Marketingchannel|PropelObjectCollection $marketingchannel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingchannel($marketingchannel, $comparison = null)
    {
        if ($marketingchannel instanceof Marketingchannel) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $marketingchannel->getIdcompany(), $comparison);
        } elseif ($marketingchannel instanceof PropelObjectCollection) {
            return $this
                ->useMarketingchannelQuery()
                ->filterByPrimaryKeys($marketingchannel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingchannel() only accepts arguments of type Marketingchannel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingchannel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinMarketingchannel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingchannel');

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
            $this->addJoinObject($join, 'Marketingchannel');
        }

        return $this;
    }

    /**
     * Use the Marketingchannel relation Marketingchannel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingchannelQuery A secondary query class using the current class as primary query
     */
    public function useMarketingchannelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingchannel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingchannel', 'MarketingchannelQuery');
    }

    /**
     * Filter the query by a related Mxtaxinfo object
     *
     * @param   Mxtaxinfo|PropelObjectCollection $mxtaxinfo  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMxtaxinfo($mxtaxinfo, $comparison = null)
    {
        if ($mxtaxinfo instanceof Mxtaxinfo) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $mxtaxinfo->getIdcompany(), $comparison);
        } elseif ($mxtaxinfo instanceof PropelObjectCollection) {
            return $this
                ->useMxtaxinfoQuery()
                ->filterByPrimaryKeys($mxtaxinfo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMxtaxinfo() only accepts arguments of type Mxtaxinfo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mxtaxinfo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinMxtaxinfo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mxtaxinfo');

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
            $this->addJoinObject($join, 'Mxtaxinfo');
        }

        return $this;
    }

    /**
     * Use the Mxtaxinfo relation Mxtaxinfo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MxtaxinfoQuery A secondary query class using the current class as primary query
     */
    public function useMxtaxinfoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMxtaxinfo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mxtaxinfo', 'MxtaxinfoQuery');
    }

    /**
     * Filter the query by a related Productionline object
     *
     * @param   Productionline|PropelObjectCollection $productionline  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionline($productionline, $comparison = null)
    {
        if ($productionline instanceof Productionline) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $productionline->getIdcompany(), $comparison);
        } elseif ($productionline instanceof PropelObjectCollection) {
            return $this
                ->useProductionlineQuery()
                ->filterByPrimaryKeys($productionline->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionline() only accepts arguments of type Productionline or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionline relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinProductionline($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionline');

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
            $this->addJoinObject($join, 'Productionline');
        }

        return $this;
    }

    /**
     * Use the Productionline relation Productionline object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionlineQuery A secondary query class using the current class as primary query
     */
    public function useProductionlineQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionline($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionline', 'ProductionlineQuery');
    }

    /**
     * Filter the query by a related Productionteam object
     *
     * @param   Productionteam|PropelObjectCollection $productionteam  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionteam($productionteam, $comparison = null)
    {
        if ($productionteam instanceof Productionteam) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $productionteam->getIdcompany(), $comparison);
        } elseif ($productionteam instanceof PropelObjectCollection) {
            return $this
                ->useProductionteamQuery()
                ->filterByPrimaryKeys($productionteam->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionteam() only accepts arguments of type Productionteam or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionteam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinProductionteam($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionteam');

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
            $this->addJoinObject($join, 'Productionteam');
        }

        return $this;
    }

    /**
     * Use the Productionteam relation Productionteam object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionteamQuery A secondary query class using the current class as primary query
     */
    public function useProductionteamQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionteam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionteam', 'ProductionteamQuery');
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $productmain->getIdcompany(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            return $this
                ->useProductmainQuery()
                ->filterByPrimaryKeys($productmain->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductmain() only accepts arguments of type Productmain or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmain relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinProductmain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmain');

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
            $this->addJoinObject($join, 'Productmain');
        }

        return $this;
    }

    /**
     * Use the Productmain relation Productmain object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainQuery A secondary query class using the current class as primary query
     */
    public function useProductmainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmain($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmain', 'ProductmainQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CompanyPeer::IDCOMPANY, $user->getIdcompany(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            return $this
                ->useUserQuery()
                ->filterByPrimaryKeys($user->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Company $company Object to remove from the list of results
     *
     * @return CompanyQuery The current query, for fluid interface
     */
    public function prune($company = null)
    {
        if ($company) {
            $this->addUsingAlias(CompanyPeer::IDCOMPANY, $company->getIdcompany(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
