<?php


/**
 * Base class that represents a query for the 'useraccesslog' table.
 *
 *
 *
 * @method UseraccesslogQuery orderByIduseraccesslog($order = Criteria::ASC) Order by the iduseraccesslog column
 * @method UseraccesslogQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method UseraccesslogQuery orderByUseraccesslogDate($order = Criteria::ASC) Order by the useraccesslog_date column
 * @method UseraccesslogQuery orderByUseraccesslogResult($order = Criteria::ASC) Order by the useraccesslog_result column
 *
 * @method UseraccesslogQuery groupByIduseraccesslog() Group by the iduseraccesslog column
 * @method UseraccesslogQuery groupByIduser() Group by the iduser column
 * @method UseraccesslogQuery groupByUseraccesslogDate() Group by the useraccesslog_date column
 * @method UseraccesslogQuery groupByUseraccesslogResult() Group by the useraccesslog_result column
 *
 * @method UseraccesslogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UseraccesslogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UseraccesslogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UseraccesslogQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method UseraccesslogQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method UseraccesslogQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Useraccesslog findOne(PropelPDO $con = null) Return the first Useraccesslog matching the query
 * @method Useraccesslog findOneOrCreate(PropelPDO $con = null) Return the first Useraccesslog matching the query, or a new Useraccesslog object populated from the query conditions when no match is found
 *
 * @method Useraccesslog findOneByIduser(int $iduser) Return the first Useraccesslog filtered by the iduser column
 * @method Useraccesslog findOneByUseraccesslogDate(string $useraccesslog_date) Return the first Useraccesslog filtered by the useraccesslog_date column
 * @method Useraccesslog findOneByUseraccesslogResult(string $useraccesslog_result) Return the first Useraccesslog filtered by the useraccesslog_result column
 *
 * @method array findByIduseraccesslog(int $iduseraccesslog) Return Useraccesslog objects filtered by the iduseraccesslog column
 * @method array findByIduser(int $iduser) Return Useraccesslog objects filtered by the iduser column
 * @method array findByUseraccesslogDate(string $useraccesslog_date) Return Useraccesslog objects filtered by the useraccesslog_date column
 * @method array findByUseraccesslogResult(string $useraccesslog_result) Return Useraccesslog objects filtered by the useraccesslog_result column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseUseraccesslogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUseraccesslogQuery object.
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
            $modelName = 'Useraccesslog';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UseraccesslogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UseraccesslogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UseraccesslogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UseraccesslogQuery) {
            return $criteria;
        }
        $query = new UseraccesslogQuery(null, null, $modelAlias);

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
     * @return   Useraccesslog|Useraccesslog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UseraccesslogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UseraccesslogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Useraccesslog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIduseraccesslog($key, $con = null)
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
     * @return                 Useraccesslog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iduseraccesslog`, `iduser`, `useraccesslog_date`, `useraccesslog_result` FROM `useraccesslog` WHERE `iduseraccesslog` = :p0';
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
            $obj = new Useraccesslog();
            $obj->hydrate($row);
            UseraccesslogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Useraccesslog|Useraccesslog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Useraccesslog[]|mixed the list of results, formatted by the current formatter
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
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iduseraccesslog column
     *
     * Example usage:
     * <code>
     * $query->filterByIduseraccesslog(1234); // WHERE iduseraccesslog = 1234
     * $query->filterByIduseraccesslog(array(12, 34)); // WHERE iduseraccesslog IN (12, 34)
     * $query->filterByIduseraccesslog(array('min' => 12)); // WHERE iduseraccesslog >= 12
     * $query->filterByIduseraccesslog(array('max' => 12)); // WHERE iduseraccesslog <= 12
     * </code>
     *
     * @param     mixed $iduseraccesslog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByIduseraccesslog($iduseraccesslog = null, $comparison = null)
    {
        if (is_array($iduseraccesslog)) {
            $useMinMax = false;
            if (isset($iduseraccesslog['min'])) {
                $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $iduseraccesslog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduseraccesslog['max'])) {
                $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $iduseraccesslog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $iduseraccesslog, $comparison);
    }

    /**
     * Filter the query on the iduser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE iduser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE iduser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE iduser >= 12
     * $query->filterByIduser(array('max' => 12)); // WHERE iduser <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(UseraccesslogPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(UseraccesslogPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseraccesslogPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the useraccesslog_date column
     *
     * Example usage:
     * <code>
     * $query->filterByUseraccesslogDate('2011-03-14'); // WHERE useraccesslog_date = '2011-03-14'
     * $query->filterByUseraccesslogDate('now'); // WHERE useraccesslog_date = '2011-03-14'
     * $query->filterByUseraccesslogDate(array('max' => 'yesterday')); // WHERE useraccesslog_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $useraccesslogDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByUseraccesslogDate($useraccesslogDate = null, $comparison = null)
    {
        if (is_array($useraccesslogDate)) {
            $useMinMax = false;
            if (isset($useraccesslogDate['min'])) {
                $this->addUsingAlias(UseraccesslogPeer::USERACCESSLOG_DATE, $useraccesslogDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($useraccesslogDate['max'])) {
                $this->addUsingAlias(UseraccesslogPeer::USERACCESSLOG_DATE, $useraccesslogDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseraccesslogPeer::USERACCESSLOG_DATE, $useraccesslogDate, $comparison);
    }

    /**
     * Filter the query on the useraccesslog_result column
     *
     * Example usage:
     * <code>
     * $query->filterByUseraccesslogResult('fooValue');   // WHERE useraccesslog_result = 'fooValue'
     * $query->filterByUseraccesslogResult('%fooValue%'); // WHERE useraccesslog_result LIKE '%fooValue%'
     * </code>
     *
     * @param     string $useraccesslogResult The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function filterByUseraccesslogResult($useraccesslogResult = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($useraccesslogResult)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $useraccesslogResult)) {
                $useraccesslogResult = str_replace('*', '%', $useraccesslogResult);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UseraccesslogPeer::USERACCESSLOG_RESULT, $useraccesslogResult, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UseraccesslogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(UseraccesslogPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UseraccesslogPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return UseraccesslogQuery The current query, for fluid interface
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
     * @param   Useraccesslog $useraccesslog Object to remove from the list of results
     *
     * @return UseraccesslogQuery The current query, for fluid interface
     */
    public function prune($useraccesslog = null)
    {
        if ($useraccesslog) {
            $this->addUsingAlias(UseraccesslogPeer::IDUSERACCESSLOG, $useraccesslog->getIduseraccesslog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
