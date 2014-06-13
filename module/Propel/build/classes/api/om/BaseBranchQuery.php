<?php


/**
 * Base class that represents a query for the 'branch' table.
 *
 *
 *
 * @method BranchQuery orderByIdbranch($order = Criteria::ASC) Order by the idbranch column
 * @method BranchQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method BranchQuery orderByBranchName($order = Criteria::ASC) Order by the branch_name column
 * @method BranchQuery orderByBranchIsoCodecountry($order = Criteria::ASC) Order by the branch_iso_codecountry column
 * @method BranchQuery orderByBranchAddress($order = Criteria::ASC) Order by the branch_address column
 * @method BranchQuery orderByBranchAddress2($order = Criteria::ASC) Order by the branch_address2 column
 * @method BranchQuery orderByBranchCity($order = Criteria::ASC) Order by the branch_city column
 * @method BranchQuery orderByBranchState($order = Criteria::ASC) Order by the branch_state column
 * @method BranchQuery orderByBranchZipcode($order = Criteria::ASC) Order by the branch_zipcode column
 *
 * @method BranchQuery groupByIdbranch() Group by the idbranch column
 * @method BranchQuery groupByIdcompany() Group by the idcompany column
 * @method BranchQuery groupByBranchName() Group by the branch_name column
 * @method BranchQuery groupByBranchIsoCodecountry() Group by the branch_iso_codecountry column
 * @method BranchQuery groupByBranchAddress() Group by the branch_address column
 * @method BranchQuery groupByBranchAddress2() Group by the branch_address2 column
 * @method BranchQuery groupByBranchCity() Group by the branch_city column
 * @method BranchQuery groupByBranchState() Group by the branch_state column
 * @method BranchQuery groupByBranchZipcode() Group by the branch_zipcode column
 *
 * @method BranchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BranchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BranchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BranchQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method BranchQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method BranchQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method BranchQuery leftJoinBranchUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the BranchUser relation
 * @method BranchQuery rightJoinBranchUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BranchUser relation
 * @method BranchQuery innerJoinBranchUser($relationAlias = null) Adds a INNER JOIN clause to the query using the BranchUser relation
 *
 * @method BranchQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method BranchQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method BranchQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Branch findOne(PropelPDO $con = null) Return the first Branch matching the query
 * @method Branch findOneOrCreate(PropelPDO $con = null) Return the first Branch matching the query, or a new Branch object populated from the query conditions when no match is found
 *
 * @method Branch findOneByIdcompany(int $idcompany) Return the first Branch filtered by the idcompany column
 * @method Branch findOneByBranchName(string $branch_name) Return the first Branch filtered by the branch_name column
 * @method Branch findOneByBranchIsoCodecountry(string $branch_iso_codecountry) Return the first Branch filtered by the branch_iso_codecountry column
 * @method Branch findOneByBranchAddress(string $branch_address) Return the first Branch filtered by the branch_address column
 * @method Branch findOneByBranchAddress2(string $branch_address2) Return the first Branch filtered by the branch_address2 column
 * @method Branch findOneByBranchCity(string $branch_city) Return the first Branch filtered by the branch_city column
 * @method Branch findOneByBranchState(string $branch_state) Return the first Branch filtered by the branch_state column
 * @method Branch findOneByBranchZipcode(string $branch_zipcode) Return the first Branch filtered by the branch_zipcode column
 *
 * @method array findByIdbranch(int $idbranch) Return Branch objects filtered by the idbranch column
 * @method array findByIdcompany(int $idcompany) Return Branch objects filtered by the idcompany column
 * @method array findByBranchName(string $branch_name) Return Branch objects filtered by the branch_name column
 * @method array findByBranchIsoCodecountry(string $branch_iso_codecountry) Return Branch objects filtered by the branch_iso_codecountry column
 * @method array findByBranchAddress(string $branch_address) Return Branch objects filtered by the branch_address column
 * @method array findByBranchAddress2(string $branch_address2) Return Branch objects filtered by the branch_address2 column
 * @method array findByBranchCity(string $branch_city) Return Branch objects filtered by the branch_city column
 * @method array findByBranchState(string $branch_state) Return Branch objects filtered by the branch_state column
 * @method array findByBranchZipcode(string $branch_zipcode) Return Branch objects filtered by the branch_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranchQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBranchQuery object.
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
            $modelName = 'Branch';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BranchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BranchQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BranchQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BranchQuery) {
            return $criteria;
        }
        $query = new BranchQuery(null, null, $modelAlias);

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
     * @return   Branch|Branch[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BranchPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Branch A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdbranch($key, $con = null)
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
     * @return                 Branch A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idbranch`, `idcompany`, `branch_name`, `branch_iso_codecountry`, `branch_address`, `branch_address2`, `branch_city`, `branch_state`, `branch_zipcode` FROM `branch` WHERE `idbranch` = :p0';
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
            $obj = new Branch();
            $obj->hydrate($row);
            BranchPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Branch|Branch[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Branch[]|mixed the list of results, formatted by the current formatter
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
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BranchPeer::IDBRANCH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BranchPeer::IDBRANCH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idbranch column
     *
     * Example usage:
     * <code>
     * $query->filterByIdbranch(1234); // WHERE idbranch = 1234
     * $query->filterByIdbranch(array(12, 34)); // WHERE idbranch IN (12, 34)
     * $query->filterByIdbranch(array('min' => 12)); // WHERE idbranch >= 12
     * $query->filterByIdbranch(array('max' => 12)); // WHERE idbranch <= 12
     * </code>
     *
     * @param     mixed $idbranch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByIdbranch($idbranch = null, $comparison = null)
    {
        if (is_array($idbranch)) {
            $useMinMax = false;
            if (isset($idbranch['min'])) {
                $this->addUsingAlias(BranchPeer::IDBRANCH, $idbranch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idbranch['max'])) {
                $this->addUsingAlias(BranchPeer::IDBRANCH, $idbranch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchPeer::IDBRANCH, $idbranch, $comparison);
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
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(BranchPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(BranchPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BranchPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the branch_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchName('fooValue');   // WHERE branch_name = 'fooValue'
     * $query->filterByBranchName('%fooValue%'); // WHERE branch_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchName($branchName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchName)) {
                $branchName = str_replace('*', '%', $branchName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_NAME, $branchName, $comparison);
    }

    /**
     * Filter the query on the branch_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchIsoCodecountry('fooValue');   // WHERE branch_iso_codecountry = 'fooValue'
     * $query->filterByBranchIsoCodecountry('%fooValue%'); // WHERE branch_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchIsoCodecountry($branchIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchIsoCodecountry)) {
                $branchIsoCodecountry = str_replace('*', '%', $branchIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_ISO_CODECOUNTRY, $branchIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the branch_address column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchAddress('fooValue');   // WHERE branch_address = 'fooValue'
     * $query->filterByBranchAddress('%fooValue%'); // WHERE branch_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchAddress($branchAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchAddress)) {
                $branchAddress = str_replace('*', '%', $branchAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_ADDRESS, $branchAddress, $comparison);
    }

    /**
     * Filter the query on the branch_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchAddress2('fooValue');   // WHERE branch_address2 = 'fooValue'
     * $query->filterByBranchAddress2('%fooValue%'); // WHERE branch_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchAddress2($branchAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchAddress2)) {
                $branchAddress2 = str_replace('*', '%', $branchAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_ADDRESS2, $branchAddress2, $comparison);
    }

    /**
     * Filter the query on the branch_city column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchCity('fooValue');   // WHERE branch_city = 'fooValue'
     * $query->filterByBranchCity('%fooValue%'); // WHERE branch_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchCity($branchCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchCity)) {
                $branchCity = str_replace('*', '%', $branchCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_CITY, $branchCity, $comparison);
    }

    /**
     * Filter the query on the branch_state column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchState('fooValue');   // WHERE branch_state = 'fooValue'
     * $query->filterByBranchState('%fooValue%'); // WHERE branch_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchState($branchState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchState)) {
                $branchState = str_replace('*', '%', $branchState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_STATE, $branchState, $comparison);
    }

    /**
     * Filter the query on the branch_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchZipcode('fooValue');   // WHERE branch_zipcode = 'fooValue'
     * $query->filterByBranchZipcode('%fooValue%'); // WHERE branch_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function filterByBranchZipcode($branchZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchZipcode)) {
                $branchZipcode = str_replace('*', '%', $branchZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BranchPeer::BRANCH_ZIPCODE, $branchZipcode, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(BranchPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BranchPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return BranchQuery The current query, for fluid interface
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
     * Filter the query by a related BranchUser object
     *
     * @param   BranchUser|PropelObjectCollection $branchUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBranchUser($branchUser, $comparison = null)
    {
        if ($branchUser instanceof BranchUser) {
            return $this
                ->addUsingAlias(BranchPeer::IDBRANCH, $branchUser->getIdbranch(), $comparison);
        } elseif ($branchUser instanceof PropelObjectCollection) {
            return $this
                ->useBranchUserQuery()
                ->filterByPrimaryKeys($branchUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBranchUser() only accepts arguments of type BranchUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BranchUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function joinBranchUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BranchUser');

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
            $this->addJoinObject($join, 'BranchUser');
        }

        return $this;
    }

    /**
     * Use the BranchUser relation BranchUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   BranchUserQuery A secondary query class using the current class as primary query
     */
    public function useBranchUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBranchUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BranchUser', 'BranchUserQuery');
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BranchQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(BranchPeer::IDBRANCH, $order->getIdbranch(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($order->getPrimaryKeys())
                ->endUse();
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
     * @return BranchQuery The current query, for fluid interface
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
     * @param   Branch $branch Object to remove from the list of results
     *
     * @return BranchQuery The current query, for fluid interface
     */
    public function prune($branch = null)
    {
        if ($branch) {
            $this->addUsingAlias(BranchPeer::IDBRANCH, $branch->getIdbranch(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
