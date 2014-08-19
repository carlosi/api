<?php


/**
 * Base class that represents a query for the 'project' table.
 *
 *
 *
 * @method ProjectQuery orderByIdproject($order = Criteria::ASC) Order by the idproject column
 * @method ProjectQuery orderByIddepartament($order = Criteria::ASC) Order by the iddepartament column
 * @method ProjectQuery orderByProjectDependency($order = Criteria::ASC) Order by the project_dependency column
 * @method ProjectQuery orderByProjectName($order = Criteria::ASC) Order by the project_name column
 *
 * @method ProjectQuery groupByIdproject() Group by the idproject column
 * @method ProjectQuery groupByIddepartament() Group by the iddepartament column
 * @method ProjectQuery groupByProjectDependency() Group by the project_dependency column
 * @method ProjectQuery groupByProjectName() Group by the project_name column
 *
 * @method ProjectQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectQuery leftJoinProjectRelatedByProjectDependency($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectRelatedByProjectDependency relation
 * @method ProjectQuery rightJoinProjectRelatedByProjectDependency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectRelatedByProjectDependency relation
 * @method ProjectQuery innerJoinProjectRelatedByProjectDependency($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectRelatedByProjectDependency relation
 *
 * @method ProjectQuery leftJoinDepartment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Department relation
 * @method ProjectQuery rightJoinDepartment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Department relation
 * @method ProjectQuery innerJoinDepartment($relationAlias = null) Adds a INNER JOIN clause to the query using the Department relation
 *
 * @method ProjectQuery leftJoinProjectRelatedByIdproject($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectRelatedByIdproject relation
 * @method ProjectQuery rightJoinProjectRelatedByIdproject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectRelatedByIdproject relation
 * @method ProjectQuery innerJoinProjectRelatedByIdproject($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectRelatedByIdproject relation
 *
 * @method ProjectQuery leftJoinProjectactivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivity relation
 * @method ProjectQuery rightJoinProjectactivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivity relation
 * @method ProjectQuery innerJoinProjectactivity($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivity relation
 *
 * @method Project findOne(PropelPDO $con = null) Return the first Project matching the query
 * @method Project findOneOrCreate(PropelPDO $con = null) Return the first Project matching the query, or a new Project object populated from the query conditions when no match is found
 *
 * @method Project findOneByIddepartament(int $iddepartament) Return the first Project filtered by the iddepartament column
 * @method Project findOneByProjectDependency(int $project_dependency) Return the first Project filtered by the project_dependency column
 * @method Project findOneByProjectName(string $project_name) Return the first Project filtered by the project_name column
 *
 * @method array findByIdproject(int $idproject) Return Project objects filtered by the idproject column
 * @method array findByIddepartament(int $iddepartament) Return Project objects filtered by the iddepartament column
 * @method array findByProjectDependency(int $project_dependency) Return Project objects filtered by the project_dependency column
 * @method array findByProjectName(string $project_name) Return Project objects filtered by the project_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProjectQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProjectQuery object.
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
            $modelName = 'Project';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectQuery) {
            return $criteria;
        }
        $query = new ProjectQuery(null, null, $modelAlias);

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
     * @return   Project|Project[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Project A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproject($key, $con = null)
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
     * @return                 Project A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproject`, `iddepartament`, `project_dependency`, `project_name` FROM `project` WHERE `idproject` = :p0';
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
            $obj = new Project();
            $obj->hydrate($row);
            ProjectPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Project|Project[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Project[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectPeer::IDPROJECT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectPeer::IDPROJECT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproject column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproject(1234); // WHERE idproject = 1234
     * $query->filterByIdproject(array(12, 34)); // WHERE idproject IN (12, 34)
     * $query->filterByIdproject(array('min' => 12)); // WHERE idproject >= 12
     * $query->filterByIdproject(array('max' => 12)); // WHERE idproject <= 12
     * </code>
     *
     * @param     mixed $idproject The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByIdproject($idproject = null, $comparison = null)
    {
        if (is_array($idproject)) {
            $useMinMax = false;
            if (isset($idproject['min'])) {
                $this->addUsingAlias(ProjectPeer::IDPROJECT, $idproject['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproject['max'])) {
                $this->addUsingAlias(ProjectPeer::IDPROJECT, $idproject['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectPeer::IDPROJECT, $idproject, $comparison);
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
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByIddepartament($iddepartament = null, $comparison = null)
    {
        if (is_array($iddepartament)) {
            $useMinMax = false;
            if (isset($iddepartament['min'])) {
                $this->addUsingAlias(ProjectPeer::IDDEPARTAMENT, $iddepartament['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartament['max'])) {
                $this->addUsingAlias(ProjectPeer::IDDEPARTAMENT, $iddepartament['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectPeer::IDDEPARTAMENT, $iddepartament, $comparison);
    }

    /**
     * Filter the query on the project_dependency column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectDependency(1234); // WHERE project_dependency = 1234
     * $query->filterByProjectDependency(array(12, 34)); // WHERE project_dependency IN (12, 34)
     * $query->filterByProjectDependency(array('min' => 12)); // WHERE project_dependency >= 12
     * $query->filterByProjectDependency(array('max' => 12)); // WHERE project_dependency <= 12
     * </code>
     *
     * @see       filterByProjectRelatedByProjectDependency()
     *
     * @param     mixed $projectDependency The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByProjectDependency($projectDependency = null, $comparison = null)
    {
        if (is_array($projectDependency)) {
            $useMinMax = false;
            if (isset($projectDependency['min'])) {
                $this->addUsingAlias(ProjectPeer::PROJECT_DEPENDENCY, $projectDependency['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectDependency['max'])) {
                $this->addUsingAlias(ProjectPeer::PROJECT_DEPENDENCY, $projectDependency['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectPeer::PROJECT_DEPENDENCY, $projectDependency, $comparison);
    }

    /**
     * Filter the query on the project_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectName('fooValue');   // WHERE project_name = 'fooValue'
     * $query->filterByProjectName('%fooValue%'); // WHERE project_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function filterByProjectName($projectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projectName)) {
                $projectName = str_replace('*', '%', $projectName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectPeer::PROJECT_NAME, $projectName, $comparison);
    }

    /**
     * Filter the query by a related Project object
     *
     * @param   Project|PropelObjectCollection $project The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectRelatedByProjectDependency($project, $comparison = null)
    {
        if ($project instanceof Project) {
            return $this
                ->addUsingAlias(ProjectPeer::PROJECT_DEPENDENCY, $project->getIdproject(), $comparison);
        } elseif ($project instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectPeer::PROJECT_DEPENDENCY, $project->toKeyValue('PrimaryKey', 'Idproject'), $comparison);
        } else {
            throw new PropelException('filterByProjectRelatedByProjectDependency() only accepts arguments of type Project or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectRelatedByProjectDependency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function joinProjectRelatedByProjectDependency($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectRelatedByProjectDependency');

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
            $this->addJoinObject($join, 'ProjectRelatedByProjectDependency');
        }

        return $this;
    }

    /**
     * Use the ProjectRelatedByProjectDependency relation Project object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectQuery A secondary query class using the current class as primary query
     */
    public function useProjectRelatedByProjectDependencyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectRelatedByProjectDependency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectRelatedByProjectDependency', 'ProjectQuery');
    }

    /**
     * Filter the query by a related Department object
     *
     * @param   Department|PropelObjectCollection $department The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDepartment($department, $comparison = null)
    {
        if ($department instanceof Department) {
            return $this
                ->addUsingAlias(ProjectPeer::IDDEPARTAMENT, $department->getIddepartment(), $comparison);
        } elseif ($department instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectPeer::IDDEPARTAMENT, $department->toKeyValue('PrimaryKey', 'Iddepartment'), $comparison);
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
     * @return ProjectQuery The current query, for fluid interface
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
     * Filter the query by a related Project object
     *
     * @param   Project|PropelObjectCollection $project  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectRelatedByIdproject($project, $comparison = null)
    {
        if ($project instanceof Project) {
            return $this
                ->addUsingAlias(ProjectPeer::IDPROJECT, $project->getProjectDependency(), $comparison);
        } elseif ($project instanceof PropelObjectCollection) {
            return $this
                ->useProjectRelatedByIdprojectQuery()
                ->filterByPrimaryKeys($project->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectRelatedByIdproject() only accepts arguments of type Project or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectRelatedByIdproject relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function joinProjectRelatedByIdproject($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectRelatedByIdproject');

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
            $this->addJoinObject($join, 'ProjectRelatedByIdproject');
        }

        return $this;
    }

    /**
     * Use the ProjectRelatedByIdproject relation Project object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectQuery A secondary query class using the current class as primary query
     */
    public function useProjectRelatedByIdprojectQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectRelatedByIdproject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectRelatedByIdproject', 'ProjectQuery');
    }

    /**
     * Filter the query by a related Projectactivity object
     *
     * @param   Projectactivity|PropelObjectCollection $projectactivity  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivity($projectactivity, $comparison = null)
    {
        if ($projectactivity instanceof Projectactivity) {
            return $this
                ->addUsingAlias(ProjectPeer::IDPROJECT, $projectactivity->getIdproject(), $comparison);
        } elseif ($projectactivity instanceof PropelObjectCollection) {
            return $this
                ->useProjectactivityQuery()
                ->filterByPrimaryKeys($projectactivity->getPrimaryKeys())
                ->endUse();
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
     * @return ProjectQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Project $project Object to remove from the list of results
     *
     * @return ProjectQuery The current query, for fluid interface
     */
    public function prune($project = null)
    {
        if ($project) {
            $this->addUsingAlias(ProjectPeer::IDPROJECT, $project->getIdproject(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
