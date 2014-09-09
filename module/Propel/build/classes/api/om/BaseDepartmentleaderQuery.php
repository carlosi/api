<?php


/**
 * Base class that represents a query for the 'departmentleader' table.
 *
 *
 *
 * @method DepartmentleaderQuery orderByIddepartmentleader($order = Criteria::ASC) Order by the iddepartmentleader column
 * @method DepartmentleaderQuery orderByIddepartment($order = Criteria::ASC) Order by the iddepartment column
 * @method DepartmentleaderQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method DepartmentleaderQuery orderByDepartmentleaderTitle($order = Criteria::ASC) Order by the departmentleader_title column
 *
 * @method DepartmentleaderQuery groupByIddepartmentleader() Group by the iddepartmentleader column
 * @method DepartmentleaderQuery groupByIddepartment() Group by the iddepartment column
 * @method DepartmentleaderQuery groupByIduser() Group by the iduser column
 * @method DepartmentleaderQuery groupByDepartmentleaderTitle() Group by the departmentleader_title column
 *
 * @method DepartmentleaderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartmentleaderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartmentleaderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepartmentleaderQuery leftJoinDepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Department relation
 * @method DepartmentleaderQuery rightJoinDepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Department relation
 * @method DepartmentleaderQuery innerJoinDepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Department relation
 *
 * @method DepartmentleaderQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method DepartmentleaderQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method DepartmentleaderQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Departmentleader findOne(PropelPDO $con = null) Return the first Departmentleader matching the query
 * @method Departmentleader findOneOrCreate(PropelPDO $con = null) Return the first Departmentleader matching the query, or a new Departmentleader object populated from the query conditions when no match is found
 *
 * @method Departmentleader findOneByIddepartment(int $iddepartment) Return the first Departmentleader filtered by the iddepartment column
 * @method Departmentleader findOneByIduser(int $iduser) Return the first Departmentleader filtered by the iduser column
 * @method Departmentleader findOneByDepartmentleaderTitle(string $departmentleader_title) Return the first Departmentleader filtered by the departmentleader_title column
 *
 * @method array findByIddepartmentleader(int $iddepartmentleader) Return Departmentleader objects filtered by the iddepartmentleader column
 * @method array findByIddepartment(int $iddepartment) Return Departmentleader objects filtered by the iddepartment column
 * @method array findByIduser(int $iduser) Return Departmentleader objects filtered by the iduser column
 * @method array findByDepartmentleaderTitle(string $departmentleader_title) Return Departmentleader objects filtered by the departmentleader_title column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepartmentleaderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepartmentleaderQuery object.
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
            $modelName = 'Departmentleader';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepartmentleaderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DepartmentleaderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepartmentleaderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepartmentleaderQuery) {
            return $criteria;
        }
        $query = new DepartmentleaderQuery(null, null, $modelAlias);

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
     * @return   Departmentleader|Departmentleader[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepartmentleaderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepartmentleaderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Departmentleader A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIddepartmentleader($key, $con = null)
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
     * @return                 Departmentleader A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iddepartmentleader`, `iddepartment`, `iduser`, `departmentleader_title` FROM `departmentleader` WHERE `iddepartmentleader` = :p0';
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
            $obj = new Departmentleader();
            $obj->hydrate($row);
            DepartmentleaderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Departmentleader|Departmentleader[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Departmentleader[]|mixed the list of results, formatted by the current formatter
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
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddepartmentleader column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartmentleader(1234); // WHERE iddepartmentleader = 1234
     * $query->filterByIddepartmentleader(array(12, 34)); // WHERE iddepartmentleader IN (12, 34)
     * $query->filterByIddepartmentleader(array('min' => 12)); // WHERE iddepartmentleader >= 12
     * $query->filterByIddepartmentleader(array('max' => 12)); // WHERE iddepartmentleader <= 12
     * </code>
     *
     * @param     mixed $iddepartmentleader The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByIddepartmentleader($iddepartmentleader = null, $comparison = null)
    {
        if (is_array($iddepartmentleader)) {
            $useMinMax = false;
            if (isset($iddepartmentleader['min'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $iddepartmentleader['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartmentleader['max'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $iddepartmentleader['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $iddepartmentleader, $comparison);
    }

    /**
     * Filter the query on the iddepartment column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartment(1234); // WHERE iddepartment = 1234
     * $query->filterByIddepartment(array(12, 34)); // WHERE iddepartment IN (12, 34)
     * $query->filterByIddepartment(array('min' => 12)); // WHERE iddepartment >= 12
     * $query->filterByIddepartment(array('max' => 12)); // WHERE iddepartment <= 12
     * </code>
     *
     * @see       filterByDepartment()
     *
     * @param     mixed $iddepartment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByIddepartment($iddepartment = null, $comparison = null)
    {
        if (is_array($iddepartment)) {
            $useMinMax = false;
            if (isset($iddepartment['min'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENT, $iddepartment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartment['max'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENT, $iddepartment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENT, $iddepartment, $comparison);
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
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(DepartmentleaderPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentleaderPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the departmentleader_title column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartmentleaderTitle('fooValue');   // WHERE departmentleader_title = 'fooValue'
     * $query->filterByDepartmentleaderTitle('%fooValue%'); // WHERE departmentleader_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departmentleaderTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function filterByDepartmentleaderTitle($departmentleaderTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departmentleaderTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departmentleaderTitle)) {
                $departmentleaderTitle = str_replace('*', '%', $departmentleaderTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DepartmentleaderPeer::DEPARTMENTLEADER_TITLE, $departmentleaderTitle, $comparison);
    }

    /**
     * Filter the query by a related Department object
     *
     * @param   Department|PropelObjectCollection $department The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentleaderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartment($department, $comparison = null)
    {
        if ($department instanceof Department) {
            return $this
                ->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENT, $department->getIddepartment(), $comparison);
        } elseif ($department instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENT, $department->toKeyValue('PrimaryKey', 'Iddepartment'), $comparison);
        } else {
            throw new PropelException('filterByDepartment() only accepts arguments of type Department or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Department relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function joinDepartment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Department');

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
            $this->addJoinObject($join, 'Department');
        }

        return $this;
    }

    /**
     * Use the Department relation Department object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DepartmentQuery A secondary query class using the current class as primary query
     */
    public function useDepartmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDepartment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Department', 'DepartmentQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartmentleaderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(DepartmentleaderPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartmentleaderPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return DepartmentleaderQuery The current query, for fluid interface
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
     * @param   Departmentleader $departmentleader Object to remove from the list of results
     *
     * @return DepartmentleaderQuery The current query, for fluid interface
     */
    public function prune($departmentleader = null)
    {
        if ($departmentleader) {
            $this->addUsingAlias(DepartmentleaderPeer::IDDEPARTMENTLEADER, $departmentleader->getIddepartmentleader(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
