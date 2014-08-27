<?php


/**
 * Base class that represents a query for the 'expensetransactionfile' table.
 *
 *
 *
 * @method ExpensetransactionfileQuery orderByIdexpensetransactionfile($order = Criteria::ASC) Order by the idexpensetransactionfile column
 * @method ExpensetransactionfileQuery orderByIdexpensetransaction($order = Criteria::ASC) Order by the idexpensetransaction column
 * @method ExpensetransactionfileQuery orderByExpensetransactionfileUrl($order = Criteria::ASC) Order by the expensetransactionfile_url column
 *
 * @method ExpensetransactionfileQuery groupByIdexpensetransactionfile() Group by the idexpensetransactionfile column
 * @method ExpensetransactionfileQuery groupByIdexpensetransaction() Group by the idexpensetransaction column
 * @method ExpensetransactionfileQuery groupByExpensetransactionfileUrl() Group by the expensetransactionfile_url column
 *
 * @method ExpensetransactionfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ExpensetransactionfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ExpensetransactionfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ExpensetransactionfileQuery leftJoinExpensetransaction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expensetransaction relation
 * @method ExpensetransactionfileQuery rightJoinExpensetransaction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expensetransaction relation
 * @method ExpensetransactionfileQuery innerJoinExpensetransaction($relationAlias = null) Adds a INNER JOIN clause to the query using the Expensetransaction relation
 *
 * @method Expensetransactionfile findOne(PropelPDO $con = null) Return the first Expensetransactionfile matching the query
 * @method Expensetransactionfile findOneOrCreate(PropelPDO $con = null) Return the first Expensetransactionfile matching the query, or a new Expensetransactionfile object populated from the query conditions when no match is found
 *
 * @method Expensetransactionfile findOneByIdexpensetransaction(int $idexpensetransaction) Return the first Expensetransactionfile filtered by the idexpensetransaction column
 * @method Expensetransactionfile findOneByExpensetransactionfileUrl(string $expensetransactionfile_url) Return the first Expensetransactionfile filtered by the expensetransactionfile_url column
 *
 * @method array findByIdexpensetransactionfile(int $idexpensetransactionfile) Return Expensetransactionfile objects filtered by the idexpensetransactionfile column
 * @method array findByIdexpensetransaction(int $idexpensetransaction) Return Expensetransactionfile objects filtered by the idexpensetransaction column
 * @method array findByExpensetransactionfileUrl(string $expensetransactionfile_url) Return Expensetransactionfile objects filtered by the expensetransactionfile_url column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpensetransactionfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseExpensetransactionfileQuery object.
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
            $modelName = 'Expensetransactionfile';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ExpensetransactionfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ExpensetransactionfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ExpensetransactionfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ExpensetransactionfileQuery) {
            return $criteria;
        }
        $query = new ExpensetransactionfileQuery(null, null, $modelAlias);

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
     * @return   Expensetransactionfile|Expensetransactionfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ExpensetransactionfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ExpensetransactionfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Expensetransactionfile A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdexpensetransactionfile($key, $con = null)
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
     * @return                 Expensetransactionfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idexpensetransactionfile`, `idexpensetransaction`, `expensetransactionfile_url` FROM `expensetransactionfile` WHERE `idexpensetransactionfile` = :p0';
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
            $obj = new Expensetransactionfile();
            $obj->hydrate($row);
            ExpensetransactionfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Expensetransactionfile|Expensetransactionfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Expensetransactionfile[]|mixed the list of results, formatted by the current formatter
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
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idexpensetransactionfile column
     *
     * Example usage:
     * <code>
     * $query->filterByIdexpensetransactionfile(1234); // WHERE idexpensetransactionfile = 1234
     * $query->filterByIdexpensetransactionfile(array(12, 34)); // WHERE idexpensetransactionfile IN (12, 34)
     * $query->filterByIdexpensetransactionfile(array('min' => 12)); // WHERE idexpensetransactionfile >= 12
     * $query->filterByIdexpensetransactionfile(array('max' => 12)); // WHERE idexpensetransactionfile <= 12
     * </code>
     *
     * @param     mixed $idexpensetransactionfile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function filterByIdexpensetransactionfile($idexpensetransactionfile = null, $comparison = null)
    {
        if (is_array($idexpensetransactionfile)) {
            $useMinMax = false;
            if (isset($idexpensetransactionfile['min'])) {
                $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $idexpensetransactionfile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensetransactionfile['max'])) {
                $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $idexpensetransactionfile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $idexpensetransactionfile, $comparison);
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
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function filterByIdexpensetransaction($idexpensetransaction = null, $comparison = null)
    {
        if (is_array($idexpensetransaction)) {
            $useMinMax = false;
            if (isset($idexpensetransaction['min'])) {
                $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTION, $idexpensetransaction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idexpensetransaction['max'])) {
                $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTION, $idexpensetransaction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTION, $idexpensetransaction, $comparison);
    }

    /**
     * Filter the query on the expensetransactionfile_url column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetransactionfileUrl('fooValue');   // WHERE expensetransactionfile_url = 'fooValue'
     * $query->filterByExpensetransactionfileUrl('%fooValue%'); // WHERE expensetransactionfile_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensetransactionfileUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function filterByExpensetransactionfileUrl($expensetransactionfileUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensetransactionfileUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $expensetransactionfileUrl)) {
                $expensetransactionfileUrl = str_replace('*', '%', $expensetransactionfileUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ExpensetransactionfilePeer::EXPENSETRANSACTIONFILE_URL, $expensetransactionfileUrl, $comparison);
    }

    /**
     * Filter the query by a related Expensetransaction object
     *
     * @param   Expensetransaction|PropelObjectCollection $expensetransaction The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ExpensetransactionfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByExpensetransaction($expensetransaction, $comparison = null)
    {
        if ($expensetransaction instanceof Expensetransaction) {
            return $this
                ->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTION, $expensetransaction->getIdexpensetransaction(), $comparison);
        } elseif ($expensetransaction instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTION, $expensetransaction->toKeyValue('PrimaryKey', 'Idexpensetransaction'), $comparison);
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
     * @return ExpensetransactionfileQuery The current query, for fluid interface
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
     * @param   Expensetransactionfile $expensetransactionfile Object to remove from the list of results
     *
     * @return ExpensetransactionfileQuery The current query, for fluid interface
     */
    public function prune($expensetransactionfile = null)
    {
        if ($expensetransactionfile) {
            $this->addUsingAlias(ExpensetransactionfilePeer::IDEXPENSETRANSACTIONFILE, $expensetransactionfile->getIdexpensetransactionfile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
