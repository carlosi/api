<?php


/**
 * Base class that represents a query for the 'projectactivityuser' table.
 *
 *
 *
 * @method ProjectactivityuserQuery orderByIdprojectactivityemployee($order = Criteria::ASC) Order by the idprojectactivityemployee column
 * @method ProjectactivityuserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ProjectactivityuserQuery orderByIdprojectactivity($order = Criteria::ASC) Order by the idprojectactivity column
 *
 * @method ProjectactivityuserQuery groupByIdprojectactivityemployee() Group by the idprojectactivityemployee column
 * @method ProjectactivityuserQuery groupByIduser() Group by the iduser column
 * @method ProjectactivityuserQuery groupByIdprojectactivity() Group by the idprojectactivity column
 *
 * @method ProjectactivityuserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectactivityuserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectactivityuserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectactivityuserQuery leftJoinProjectactivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivity relation
 * @method ProjectactivityuserQuery rightJoinProjectactivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivity relation
 * @method ProjectactivityuserQuery innerJoinProjectactivity($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivity relation
 *
 * @method ProjectactivityuserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ProjectactivityuserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ProjectactivityuserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Projectactivityuser findOne(PropelPDO $con = null) Return the first Projectactivityuser matching the query
 * @method Projectactivityuser findOneOrCreate(PropelPDO $con = null) Return the first Projectactivityuser matching the query, or a new Projectactivityuser object populated from the query conditions when no match is found
 *
 * @method Projectactivityuser findOneByIduser(int $iduser) Return the first Projectactivityuser filtered by the iduser column
 * @method Projectactivityuser findOneByIdprojectactivity(int $idprojectactivity) Return the first Projectactivityuser filtered by the idprojectactivity column
 *
 * @method array findByIdprojectactivityemployee(int $idprojectactivityemployee) Return Projectactivityuser objects filtered by the idprojectactivityemployee column
 * @method array findByIduser(int $iduser) Return Projectactivityuser objects filtered by the iduser column
 * @method array findByIdprojectactivity(int $idprojectactivity) Return Projectactivityuser objects filtered by the idprojectactivity column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProjectactivityuserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProjectactivityuserQuery object.
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
            $modelName = 'Projectactivityuser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectactivityuserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectactivityuserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectactivityuserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectactivityuserQuery) {
            return $criteria;
        }
        $query = new ProjectactivityuserQuery(null, null, $modelAlias);

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
     * @return   Projectactivityuser|Projectactivityuser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectactivityuserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectactivityuserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Projectactivityuser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdprojectactivityemployee($key, $con = null)
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
     * @return                 Projectactivityuser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idprojectactivityemployee`, `iduser`, `idprojectactivity` FROM `projectactivityuser` WHERE `idprojectactivityemployee` = :p0';
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
            $obj = new Projectactivityuser();
            $obj->hydrate($row);
            ProjectactivityuserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Projectactivityuser|Projectactivityuser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Projectactivityuser[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idprojectactivityemployee column
     *
     * Example usage:
     * <code>
     * $query->filterByIdprojectactivityemployee(1234); // WHERE idprojectactivityemployee = 1234
     * $query->filterByIdprojectactivityemployee(array(12, 34)); // WHERE idprojectactivityemployee IN (12, 34)
     * $query->filterByIdprojectactivityemployee(array('min' => 12)); // WHERE idprojectactivityemployee >= 12
     * $query->filterByIdprojectactivityemployee(array('max' => 12)); // WHERE idprojectactivityemployee <= 12
     * </code>
     *
     * @param     mixed $idprojectactivityemployee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function filterByIdprojectactivityemployee($idprojectactivityemployee = null, $comparison = null)
    {
        if (is_array($idprojectactivityemployee)) {
            $useMinMax = false;
            if (isset($idprojectactivityemployee['min'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $idprojectactivityemployee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprojectactivityemployee['max'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $idprojectactivityemployee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $idprojectactivityemployee, $comparison);
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
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityuserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idprojectactivity column
     *
     * Example usage:
     * <code>
     * $query->filterByIdprojectactivity(1234); // WHERE idprojectactivity = 1234
     * $query->filterByIdprojectactivity(array(12, 34)); // WHERE idprojectactivity IN (12, 34)
     * $query->filterByIdprojectactivity(array('min' => 12)); // WHERE idprojectactivity >= 12
     * $query->filterByIdprojectactivity(array('max' => 12)); // WHERE idprojectactivity <= 12
     * </code>
     *
     * @see       filterByProjectactivity()
     *
     * @param     mixed $idprojectactivity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function filterByIdprojectactivity($idprojectactivity = null, $comparison = null)
    {
        if (is_array($idprojectactivity)) {
            $useMinMax = false;
            if (isset($idprojectactivity['min'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITY, $idprojectactivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprojectactivity['max'])) {
                $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITY, $idprojectactivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITY, $idprojectactivity, $comparison);
    }

    /**
     * Filter the query by a related Projectactivity object
     *
     * @param   Projectactivity|PropelObjectCollection $projectactivity The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivityuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivity($projectactivity, $comparison = null)
    {
        if ($projectactivity instanceof Projectactivity) {
            return $this
                ->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITY, $projectactivity->getIdprojectactivity(), $comparison);
        } elseif ($projectactivity instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITY, $projectactivity->toKeyValue('PrimaryKey', 'Idprojectactivity'), $comparison);
        } else {
            throw new PropelException('filterByProjectactivity() only accepts arguments of type Projectactivity or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projectactivity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function joinProjectactivity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projectactivity');

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
            $this->addJoinObject($join, 'Projectactivity');
        }

        return $this;
    }

    /**
     * Use the Projectactivity relation Projectactivity object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectactivityQuery A secondary query class using the current class as primary query
     */
    public function useProjectactivityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectactivity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projectactivity', 'ProjectactivityQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivityuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ProjectactivityuserPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectactivityuserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return ProjectactivityuserQuery The current query, for fluid interface
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
     * @param   Projectactivityuser $projectactivityuser Object to remove from the list of results
     *
     * @return ProjectactivityuserQuery The current query, for fluid interface
     */
    public function prune($projectactivityuser = null)
    {
        if ($projectactivityuser) {
            $this->addUsingAlias(ProjectactivityuserPeer::IDPROJECTACTIVITYEMPLOYEE, $projectactivityuser->getIdprojectactivityemployee(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
