<?php


/**
 * Base class that represents a query for the 'depreciationappreciation' table.
 *
 *
 *
 * @method DepreciationappreciationQuery orderByIddepreciationappreciation($order = Criteria::ASC) Order by the iddepreciationappreciation column
 * @method DepreciationappreciationQuery orderByIdexpensetransaction($order = Criteria::ASC) Order by the idexpensetransaction column
 * @method DepreciationappreciationQuery orderByDepreciationappreciationAmount($order = Criteria::ASC) Order by the depreciationappreciation_amount column
 * @method DepreciationappreciationQuery orderByDepreciationappreciationCycle($order = Criteria::ASC) Order by the depreciationappreciation_cycle column
 *
 * @method DepreciationappreciationQuery groupByIddepreciationappreciation() Group by the iddepreciationappreciation column
 * @method DepreciationappreciationQuery groupByIdexpensetransaction() Group by the idexpensetransaction column
 * @method DepreciationappreciationQuery groupByDepreciationappreciationAmount() Group by the depreciationappreciation_amount column
 * @method DepreciationappreciationQuery groupByDepreciationappreciationCycle() Group by the depreciationappreciation_cycle column
 *
 * @method DepreciationappreciationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepreciationappreciationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepreciationappreciationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepreciationappreciationQuery leftJoinExpensetransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensetransaction relation
 * @method DepreciationappreciationQuery rightJoinExpensetransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensetransaction relation
 * @method DepreciationappreciationQuery innerJoinExpensetransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensetransaction relation
 *
 * @method Depreciationappreciation findOne(PropelPDO $con = null) Return the first Depreciationappreciation matching the query
 * @method Depreciationappreciation findOneOrCreate(PropelPDO $con = null) Return the first Depreciationappreciation matching the query, or a new Depreciationappreciation object populated from the query conditions when no match is found
 *
 * @method Depreciationappreciation findOneByIdexpensetransaction(int $idexpensetransaction) Return the first Depreciationappreciation filtered by the idexpensetransaction column
 * @method Depreciationappreciation findOneByDepreciationappreciationAmount(string $depreciationappreciation_amount) Return the first Depreciationappreciation filtered by the depreciationappreciation_amount column
 * @method Depreciationappreciation findOneByDepreciationappreciationCycle(string $depreciationappreciation_cycle) Return the first Depreciationappreciation filtered by the depreciationappreciation_cycle column
 *
 * @method array findByIddepreciationappreciation(int $iddepreciationappreciation) Return Depreciationappreciation objects filtered by the iddepreciationappreciation column
 * @method array findByIdexpensetransaction(int $idexpensetransaction) Return Depreciationappreciation objects filtered by the idexpensetransaction column
 * @method array findByDepreciationappreciationAmount(string $depreciationappreciation_amount) Return Depreciationappreciation objects filtered by the depreciationappreciation_amount column
 * @method array findByDepreciationappreciationCycle(string $depreciationappreciation_cycle) Return Depreciationappreciation objects filtered by the depreciationappreciation_cycle column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepreciationappreciationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepreciationappreciationQuery object.
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
            $modelName = 'Depreciationappreciation';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepreciationappreciationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DepreciationappreciationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepreciationappreciationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepreciationappreciationQuery) {
            return $criteria;
        }
        $query = new DepreciationappreciationQuery(null, null, $modelAlias);

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
     * @return   Depreciationappreciation|Depreciationappreciation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepreciationappreciationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepreciationappreciationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Depreciationappreciation A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIddepreciationappreciation($key, $con = null)
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
     * @return                 Depreciationappreciation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iddepreciationappreciation`, `idexpensetransaction`, `depreciationappreciation_amount`, `depreciationappreciation_cycle` FROM `depreciationappreciation` WHERE `iddepreciationappreciation` = :p0';
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
            $obj = new Depreciationappreciation();
            $obj->hydrate($row);
            DepreciationappreciationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Depreciationappreciation|Depreciationappreciation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Depreciationappreciation[]|mixed the list of results, formatted by the current formatter
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
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddepreciationappreciation column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepreciationappreciation(1234); // WHERE iddepreciationappreciation = 1234
     * $query->filterByIddepreciationappreciation(array(12, 34)); // WHERE iddepreciationappreciation IN (12, 34)
     * $query->filterByIddepreciationappreciation(array('min' => 12)); // WHERE iddepreciationappreciation >= 12
     * $query->filterByIddepreciationappreciation(array('max' => 12)); // WHERE iddepreciationappreciation <= 12
     * </code>
     *
     * @param     mixed $iddepreciationappreciation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByIddepreciationappreciation($iddepreciationappreciation = null, $comparison = null)
    {
        if (is_array($iddepreciationappreciation)) {
            $useMinMax = false;
            if (isset($iddepreciationappreciation['min'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $iddepreciationappreciation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepreciationappreciation['max'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $iddepreciationappreciation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $iddepreciationappreciation, $comparison);
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
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByIdexpensetransaction($idexpensetransaction = null, $comparison = null)
    {
        if (is_array($idexpensetransaction)) {
            $useMinMax = false;
            if (isset($idexpensetransaction['min'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $idexpensetransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensetransaction['max'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $idexpensetransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $idexpensetransaction, $comparison);
    }

    /**
     * Filter the query on the depreciationappreciation_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByDepreciationappreciationAmount(1234); // WHERE depreciationappreciation_amount = 1234
     * $query->filterByDepreciationappreciationAmount(array(12, 34)); // WHERE depreciationappreciation_amount IN (12, 34)
     * $query->filterByDepreciationappreciationAmount(array('min' => 12)); // WHERE depreciationappreciation_amount >= 12
     * $query->filterByDepreciationappreciationAmount(array('max' => 12)); // WHERE depreciationappreciation_amount <= 12
     * </code>
     *
     * @param     mixed $depreciationappreciationAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByDepreciationappreciationAmount($depreciationappreciationAmount = null, $comparison = null)
    {
        if (is_array($depreciationappreciationAmount)) {
            $useMinMax = false;
            if (isset($depreciationappreciationAmount['min'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT, $depreciationappreciationAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($depreciationappreciationAmount['max'])) {
                $this->addUsingAlias(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT, $depreciationappreciationAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT, $depreciationappreciationAmount, $comparison);
    }

    /**
     * Filter the query on the depreciationappreciation_cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByDepreciationappreciationCycle('fooValue');   // WHERE depreciationappreciation_cycle = 'fooValue'
     * $query->filterByDepreciationappreciationCycle('%fooValue%'); // WHERE depreciationappreciation_cycle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $depreciationappreciationCycle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function filterByDepreciationappreciationCycle($depreciationappreciationCycle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($depreciationappreciationCycle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $depreciationappreciationCycle)) {
                $depreciationappreciationCycle = str_replace('*', '%', $depreciationappreciationCycle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_CYCLE, $depreciationappreciationCycle, $comparison);
    }

    /**
     * Filter the query by a related Expensetransaction object
     *
     * @param   Expensetransaction|PropelObjectCollection $expensetransaction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepreciationappreciationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensetransaction($expensetransaction, $comparison = null)
    {
        if ($expensetransaction instanceof Expensetransaction) {
            return $this
                ->addUsingAlias(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $expensetransaction->getIdexpensetransaction(), $comparison);
        } elseif ($expensetransaction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $expensetransaction->toKeyValue('PrimaryKey', 'Idexpensetransaction'), $comparison);
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
     * @return DepreciationappreciationQuery The current query, for fluid interface
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
     * @param   Depreciationappreciation $depreciationappreciation Object to remove from the list of results
     *
     * @return DepreciationappreciationQuery The current query, for fluid interface
     */
    public function prune($depreciationappreciation = null)
    {
        if ($depreciationappreciation) {
            $this->addUsingAlias(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $depreciationappreciation->getIddepreciationappreciation(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
