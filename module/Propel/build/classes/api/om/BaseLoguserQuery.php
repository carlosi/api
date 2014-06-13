<?php


/**
 * Base class that represents a query for the 'loguser' table.
 *
 *
 *
 * @method LoguserQuery orderByIdloguser($order = Criteria::ASC) Order by the idloguser column
 * @method LoguserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method LoguserQuery orderByTable($order = Criteria::ASC) Order by the table column
 * @method LoguserQuery orderByLoguserType($order = Criteria::ASC) Order by the loguser_type column
 * @method LoguserQuery orderByOldData($order = Criteria::ASC) Order by the old_data column
 * @method LoguserQuery orderByNewData($order = Criteria::ASC) Order by the new_data column
 * @method LoguserQuery orderByLoguserDate($order = Criteria::ASC) Order by the loguser_date column
 *
 * @method LoguserQuery groupByIdloguser() Group by the idloguser column
 * @method LoguserQuery groupByIduser() Group by the iduser column
 * @method LoguserQuery groupByTable() Group by the table column
 * @method LoguserQuery groupByLoguserType() Group by the loguser_type column
 * @method LoguserQuery groupByOldData() Group by the old_data column
 * @method LoguserQuery groupByNewData() Group by the new_data column
 * @method LoguserQuery groupByLoguserDate() Group by the loguser_date column
 *
 * @method LoguserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LoguserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LoguserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LoguserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method LoguserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method LoguserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Loguser findOne(PropelPDO $con = null) Return the first Loguser matching the query
 * @method Loguser findOneOrCreate(PropelPDO $con = null) Return the first Loguser matching the query, or a new Loguser object populated from the query conditions when no match is found
 *
 * @method Loguser findOneByIduser(int $iduser) Return the first Loguser filtered by the iduser column
 * @method Loguser findOneByTable(string $table) Return the first Loguser filtered by the table column
 * @method Loguser findOneByLoguserType(string $loguser_type) Return the first Loguser filtered by the loguser_type column
 * @method Loguser findOneByOldData(string $old_data) Return the first Loguser filtered by the old_data column
 * @method Loguser findOneByNewData(string $new_data) Return the first Loguser filtered by the new_data column
 * @method Loguser findOneByLoguserDate(string $loguser_date) Return the first Loguser filtered by the loguser_date column
 *
 * @method array findByIdloguser(int $idloguser) Return Loguser objects filtered by the idloguser column
 * @method array findByIduser(int $iduser) Return Loguser objects filtered by the iduser column
 * @method array findByTable(string $table) Return Loguser objects filtered by the table column
 * @method array findByLoguserType(string $loguser_type) Return Loguser objects filtered by the loguser_type column
 * @method array findByOldData(string $old_data) Return Loguser objects filtered by the old_data column
 * @method array findByNewData(string $new_data) Return Loguser objects filtered by the new_data column
 * @method array findByLoguserDate(string $loguser_date) Return Loguser objects filtered by the loguser_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseLoguserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLoguserQuery object.
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
            $modelName = 'Loguser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LoguserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LoguserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LoguserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LoguserQuery) {
            return $criteria;
        }
        $query = new LoguserQuery(null, null, $modelAlias);

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
     * @return   Loguser|Loguser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LoguserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LoguserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Loguser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdloguser($key, $con = null)
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
     * @return                 Loguser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idloguser`, `iduser`, `table`, `loguser_type`, `old_data`, `new_data`, `loguser_date` FROM `loguser` WHERE `idloguser` = :p0';
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
            $obj = new Loguser();
            $obj->hydrate($row);
            LoguserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Loguser|Loguser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Loguser[]|mixed the list of results, formatted by the current formatter
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
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoguserPeer::IDLOGUSER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoguserPeer::IDLOGUSER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idloguser column
     *
     * Example usage:
     * <code>
     * $query->filterByIdloguser(1234); // WHERE idloguser = 1234
     * $query->filterByIdloguser(array(12, 34)); // WHERE idloguser IN (12, 34)
     * $query->filterByIdloguser(array('min' => 12)); // WHERE idloguser >= 12
     * $query->filterByIdloguser(array('max' => 12)); // WHERE idloguser <= 12
     * </code>
     *
     * @param     mixed $idloguser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByIdloguser($idloguser = null, $comparison = null)
    {
        if (is_array($idloguser)) {
            $useMinMax = false;
            if (isset($idloguser['min'])) {
                $this->addUsingAlias(LoguserPeer::IDLOGUSER, $idloguser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idloguser['max'])) {
                $this->addUsingAlias(LoguserPeer::IDLOGUSER, $idloguser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoguserPeer::IDLOGUSER, $idloguser, $comparison);
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
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(LoguserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(LoguserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoguserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the table column
     *
     * Example usage:
     * <code>
     * $query->filterByTable('fooValue');   // WHERE table = 'fooValue'
     * $query->filterByTable('%fooValue%'); // WHERE table LIKE '%fooValue%'
     * </code>
     *
     * @param     string $table The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByTable($table = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($table)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $table)) {
                $table = str_replace('*', '%', $table);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LoguserPeer::TABLE, $table, $comparison);
    }

    /**
     * Filter the query on the loguser_type column
     *
     * Example usage:
     * <code>
     * $query->filterByLoguserType('fooValue');   // WHERE loguser_type = 'fooValue'
     * $query->filterByLoguserType('%fooValue%'); // WHERE loguser_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loguserType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByLoguserType($loguserType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loguserType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $loguserType)) {
                $loguserType = str_replace('*', '%', $loguserType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LoguserPeer::LOGUSER_TYPE, $loguserType, $comparison);
    }

    /**
     * Filter the query on the old_data column
     *
     * Example usage:
     * <code>
     * $query->filterByOldData('fooValue');   // WHERE old_data = 'fooValue'
     * $query->filterByOldData('%fooValue%'); // WHERE old_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oldData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByOldData($oldData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oldData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $oldData)) {
                $oldData = str_replace('*', '%', $oldData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LoguserPeer::OLD_DATA, $oldData, $comparison);
    }

    /**
     * Filter the query on the new_data column
     *
     * Example usage:
     * <code>
     * $query->filterByNewData('fooValue');   // WHERE new_data = 'fooValue'
     * $query->filterByNewData('%fooValue%'); // WHERE new_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $newData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByNewData($newData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $newData)) {
                $newData = str_replace('*', '%', $newData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LoguserPeer::NEW_DATA, $newData, $comparison);
    }

    /**
     * Filter the query on the loguser_date column
     *
     * Example usage:
     * <code>
     * $query->filterByLoguserDate('2011-03-14'); // WHERE loguser_date = '2011-03-14'
     * $query->filterByLoguserDate('now'); // WHERE loguser_date = '2011-03-14'
     * $query->filterByLoguserDate(array('max' => 'yesterday')); // WHERE loguser_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $loguserDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function filterByLoguserDate($loguserDate = null, $comparison = null)
    {
        if (is_array($loguserDate)) {
            $useMinMax = false;
            if (isset($loguserDate['min'])) {
                $this->addUsingAlias(LoguserPeer::LOGUSER_DATE, $loguserDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($loguserDate['max'])) {
                $this->addUsingAlias(LoguserPeer::LOGUSER_DATE, $loguserDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoguserPeer::LOGUSER_DATE, $loguserDate, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LoguserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(LoguserPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LoguserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return LoguserQuery The current query, for fluid interface
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
     * @param   Loguser $loguser Object to remove from the list of results
     *
     * @return LoguserQuery The current query, for fluid interface
     */
    public function prune($loguser = null)
    {
        if ($loguser) {
            $this->addUsingAlias(LoguserPeer::IDLOGUSER, $loguser->getIdloguser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
