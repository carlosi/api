<?php


/**
 * Base class that represents a query for the 'departamentmember' table.
 *
 *
 *
 * @method DepartamentmemberQuery orderByIddepartamentmember($order = Criteria::ASC) Order by the iddepartamentmember column
 * @method DepartamentmemberQuery orderByIddepartament($order = Criteria::ASC) Order by the iddepartament column
 * @method DepartamentmemberQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 *
 * @method DepartamentmemberQuery groupByIddepartamentmember() Group by the iddepartamentmember column
 * @method DepartamentmemberQuery groupByIddepartament() Group by the iddepartament column
 * @method DepartamentmemberQuery groupByIduser() Group by the iduser column
 *
 * @method DepartamentmemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartamentmemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartamentmemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DepartamentmemberQuery leftJoinDepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Department relation
 * @method DepartamentmemberQuery rightJoinDepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Department relation
 * @method DepartamentmemberQuery innerJoinDepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Department relation
 *
 * @method DepartamentmemberQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method DepartamentmemberQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method DepartamentmemberQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Departamentmember findOne(PropelPDO $con = null) Return the first Departamentmember matching the query
 * @method Departamentmember findOneOrCreate(PropelPDO $con = null) Return the first Departamentmember matching the query, or a new Departamentmember object populated from the query conditions when no match is found
 *
 * @method Departamentmember findOneByIddepartament(int $iddepartament) Return the first Departamentmember filtered by the iddepartament column
 * @method Departamentmember findOneByIduser(int $iduser) Return the first Departamentmember filtered by the iduser column
 *
 * @method array findByIddepartamentmember(int $iddepartamentmember) Return Departamentmember objects filtered by the iddepartamentmember column
 * @method array findByIddepartament(int $iddepartament) Return Departamentmember objects filtered by the iddepartament column
 * @method array findByIduser(int $iduser) Return Departamentmember objects filtered by the iduser column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepartamentmemberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepartamentmemberQuery object.
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
            $modelName = 'Departamentmember';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepartamentmemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DepartamentmemberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepartamentmemberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepartamentmemberQuery) {
            return $criteria;
        }
        $query = new DepartamentmemberQuery(null, null, $modelAlias);

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
     * @return   Departamentmember|Departamentmember[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepartamentmemberPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepartamentmemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Departamentmember A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIddepartamentmember($key, $con = null)
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
     * @return                 Departamentmember A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iddepartamentmember`, `iddepartament`, `iduser` FROM `departamentmember` WHERE `iddepartamentmember` = :p0';
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
            $obj = new Departamentmember();
            $obj->hydrate($row);
            DepartamentmemberPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Departamentmember|Departamentmember[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Departamentmember[]|mixed the list of results, formatted by the current formatter
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
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddepartamentmember column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartamentmember(1234); // WHERE iddepartamentmember = 1234
     * $query->filterByIddepartamentmember(array(12, 34)); // WHERE iddepartamentmember IN (12, 34)
     * $query->filterByIddepartamentmember(array('min' => 12)); // WHERE iddepartamentmember >= 12
     * $query->filterByIddepartamentmember(array('max' => 12)); // WHERE iddepartamentmember <= 12
     * </code>
     *
     * @param     mixed $iddepartamentmember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function filterByIddepartamentmember($iddepartamentmember = null, $comparison = null)
    {
        if (is_array($iddepartamentmember)) {
            $useMinMax = false;
            if (isset($iddepartamentmember['min'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $iddepartamentmember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartamentmember['max'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $iddepartamentmember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $iddepartamentmember, $comparison);
    }

    /**
     * Filter the query on the iddepartament column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartament(1234); // WHERE iddepartament = 1234
     * $query->filterByIddepartament(array(12, 34)); // WHERE iddepartament IN (12, 34)
     * $query->filterByIddepartament(array('min' => 12)); // WHERE iddepartament >= 12
     * $query->filterByIddepartament(array('max' => 12)); // WHERE iddepartament <= 12
     * </code>
     *
     * @see       filterByDepartment()
     *
     * @param     mixed $iddepartament The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function filterByIddepartament($iddepartament = null, $comparison = null)
    {
        if (is_array($iddepartament)) {
            $useMinMax = false;
            if (isset($iddepartament['min'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENT, $iddepartament['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartament['max'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENT, $iddepartament['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENT, $iddepartament, $comparison);
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
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(DepartamentmemberPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartamentmemberPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query by a related Department object
     *
     * @param   Department|PropelObjectCollection $department The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DepartamentmemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartment($department, $comparison = null)
    {
        if ($department instanceof Department) {
            return $this
                ->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENT, $department->getIddepartment(), $comparison);
        } elseif ($department instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENT, $department->toKeyValue('PrimaryKey', 'Iddepartment'), $comparison);
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
     * @return DepartamentmemberQuery The current query, for fluid interface
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
     * @return                 DepartamentmemberQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(DepartamentmemberPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DepartamentmemberPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return DepartamentmemberQuery The current query, for fluid interface
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
     * @param   Departamentmember $departamentmember Object to remove from the list of results
     *
     * @return DepartamentmemberQuery The current query, for fluid interface
     */
    public function prune($departamentmember = null)
    {
        if ($departamentmember) {
            $this->addUsingAlias(DepartamentmemberPeer::IDDEPARTAMENTMEMBER, $departamentmember->getIddepartamentmember(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
