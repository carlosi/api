<?php


/**
 * Base class that represents a query for the 'projectactivity' table.
 *
 *
 *
 * @method ProjectactivityQuery orderByIdprojectactivity($order = Criteria::ASC) Order by the idprojectactivity column
 * @method ProjectactivityQuery orderByIdproject($order = Criteria::ASC) Order by the idproject column
 * @method ProjectactivityQuery orderByProjectactivityTitle($order = Criteria::ASC) Order by the projectactivity_title column
 * @method ProjectactivityQuery orderByProjectactivityDescription($order = Criteria::ASC) Order by the projectactivity_description column
 * @method ProjectactivityQuery orderByProjectactivityStatus($order = Criteria::ASC) Order by the projectactivity_status column
 * @method ProjectactivityQuery orderByProjectactivityDateinit($order = Criteria::ASC) Order by the projectactivity_dateinit column
 * @method ProjectactivityQuery orderByProjectactivityDatetofinish($order = Criteria::ASC) Order by the projectactivity_datetofinish column
 *
 * @method ProjectactivityQuery groupByIdprojectactivity() Group by the idprojectactivity column
 * @method ProjectactivityQuery groupByIdproject() Group by the idproject column
 * @method ProjectactivityQuery groupByProjectactivityTitle() Group by the projectactivity_title column
 * @method ProjectactivityQuery groupByProjectactivityDescription() Group by the projectactivity_description column
 * @method ProjectactivityQuery groupByProjectactivityStatus() Group by the projectactivity_status column
 * @method ProjectactivityQuery groupByProjectactivityDateinit() Group by the projectactivity_dateinit column
 * @method ProjectactivityQuery groupByProjectactivityDatetofinish() Group by the projectactivity_datetofinish column
 *
 * @method ProjectactivityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectactivityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectactivityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectactivityQuery leftJoinProject($relationAlias = null) Adds a LEFT JOIN clause to the query using the Project relation
 * @method ProjectactivityQuery rightJoinProject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Project relation
 * @method ProjectactivityQuery innerJoinProject($relationAlias = null) Adds a INNER JOIN clause to the query using the Project relation
 *
 * @method ProjectactivityQuery leftJoinProjectactivitypost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivitypost relation
 * @method ProjectactivityQuery rightJoinProjectactivitypost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivitypost relation
 * @method ProjectactivityQuery innerJoinProjectactivitypost($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivitypost relation
 *
 * @method ProjectactivityQuery leftJoinProjectactivityuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivityuser relation
 * @method ProjectactivityQuery rightJoinProjectactivityuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivityuser relation
 * @method ProjectactivityQuery innerJoinProjectactivityuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivityuser relation
 *
 * @method Projectactivity findOne(PropelPDO $con = null) Return the first Projectactivity matching the query
 * @method Projectactivity findOneOrCreate(PropelPDO $con = null) Return the first Projectactivity matching the query, or a new Projectactivity object populated from the query conditions when no match is found
 *
 * @method Projectactivity findOneByIdproject(int $idproject) Return the first Projectactivity filtered by the idproject column
 * @method Projectactivity findOneByProjectactivityTitle(string $projectactivity_title) Return the first Projectactivity filtered by the projectactivity_title column
 * @method Projectactivity findOneByProjectactivityDescription(string $projectactivity_description) Return the first Projectactivity filtered by the projectactivity_description column
 * @method Projectactivity findOneByProjectactivityStatus(string $projectactivity_status) Return the first Projectactivity filtered by the projectactivity_status column
 * @method Projectactivity findOneByProjectactivityDateinit(string $projectactivity_dateinit) Return the first Projectactivity filtered by the projectactivity_dateinit column
 * @method Projectactivity findOneByProjectactivityDatetofinish(string $projectactivity_datetofinish) Return the first Projectactivity filtered by the projectactivity_datetofinish column
 *
 * @method array findByIdprojectactivity(int $idprojectactivity) Return Projectactivity objects filtered by the idprojectactivity column
 * @method array findByIdproject(int $idproject) Return Projectactivity objects filtered by the idproject column
 * @method array findByProjectactivityTitle(string $projectactivity_title) Return Projectactivity objects filtered by the projectactivity_title column
 * @method array findByProjectactivityDescription(string $projectactivity_description) Return Projectactivity objects filtered by the projectactivity_description column
 * @method array findByProjectactivityStatus(string $projectactivity_status) Return Projectactivity objects filtered by the projectactivity_status column
 * @method array findByProjectactivityDateinit(string $projectactivity_dateinit) Return Projectactivity objects filtered by the projectactivity_dateinit column
 * @method array findByProjectactivityDatetofinish(string $projectactivity_datetofinish) Return Projectactivity objects filtered by the projectactivity_datetofinish column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProjectactivityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProjectactivityQuery object.
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
            $modelName = 'Projectactivity';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectactivityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectactivityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectactivityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectactivityQuery) {
            return $criteria;
        }
        $query = new ProjectactivityQuery(null, null, $modelAlias);

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
     * @return   Projectactivity|Projectactivity[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectactivityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectactivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Projectactivity A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdprojectactivity($key, $con = null)
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
     * @return                 Projectactivity A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idprojectactivity`, `idproject`, `projectactivity_title`, `projectactivity_description`, `projectactivity_status`, `projectactivity_dateinit`, `projectactivity_datetofinish` FROM `projectactivity` WHERE `idprojectactivity` = :p0';
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
            $obj = new Projectactivity();
            $obj->hydrate($row);
            ProjectactivityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Projectactivity|Projectactivity[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Projectactivity[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $keys, Criteria::IN);
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
     * @param     mixed $idprojectactivity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByIdprojectactivity($idprojectactivity = null, $comparison = null)
    {
        if (is_array($idprojectactivity)) {
            $useMinMax = false;
            if (isset($idprojectactivity['min'])) {
                $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $idprojectactivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprojectactivity['max'])) {
                $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $idprojectactivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $idprojectactivity, $comparison);
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
     * @see       filterByProject()
     *
     * @param     mixed $idproject The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByIdproject($idproject = null, $comparison = null)
    {
        if (is_array($idproject)) {
            $useMinMax = false;
            if (isset($idproject['min'])) {
                $this->addUsingAlias(ProjectactivityPeer::IDPROJECT, $idproject['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproject['max'])) {
                $this->addUsingAlias(ProjectactivityPeer::IDPROJECT, $idproject['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::IDPROJECT, $idproject, $comparison);
    }

    /**
     * Filter the query on the projectactivity_title column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivityTitle('fooValue');   // WHERE projectactivity_title = 'fooValue'
     * $query->filterByProjectactivityTitle('%fooValue%'); // WHERE projectactivity_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectactivityTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByProjectactivityTitle($projectactivityTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectactivityTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projectactivityTitle)) {
                $projectactivityTitle = str_replace('*', '%', $projectactivityTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_TITLE, $projectactivityTitle, $comparison);
    }

    /**
     * Filter the query on the projectactivity_description column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivityDescription('fooValue');   // WHERE projectactivity_description = 'fooValue'
     * $query->filterByProjectactivityDescription('%fooValue%'); // WHERE projectactivity_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectactivityDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByProjectactivityDescription($projectactivityDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectactivityDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projectactivityDescription)) {
                $projectactivityDescription = str_replace('*', '%', $projectactivityDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DESCRIPTION, $projectactivityDescription, $comparison);
    }

    /**
     * Filter the query on the projectactivity_status column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivityStatus('fooValue');   // WHERE projectactivity_status = 'fooValue'
     * $query->filterByProjectactivityStatus('%fooValue%'); // WHERE projectactivity_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectactivityStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByProjectactivityStatus($projectactivityStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectactivityStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projectactivityStatus)) {
                $projectactivityStatus = str_replace('*', '%', $projectactivityStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_STATUS, $projectactivityStatus, $comparison);
    }

    /**
     * Filter the query on the projectactivity_dateinit column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivityDateinit('2011-03-14'); // WHERE projectactivity_dateinit = '2011-03-14'
     * $query->filterByProjectactivityDateinit('now'); // WHERE projectactivity_dateinit = '2011-03-14'
     * $query->filterByProjectactivityDateinit(array('max' => 'yesterday')); // WHERE projectactivity_dateinit < '2011-03-13'
     * </code>
     *
     * @param     mixed $projectactivityDateinit The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByProjectactivityDateinit($projectactivityDateinit = null, $comparison = null)
    {
        if (is_array($projectactivityDateinit)) {
            $useMinMax = false;
            if (isset($projectactivityDateinit['min'])) {
                $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT, $projectactivityDateinit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectactivityDateinit['max'])) {
                $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT, $projectactivityDateinit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT, $projectactivityDateinit, $comparison);
    }

    /**
     * Filter the query on the projectactivity_datetofinish column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivityDatetofinish('2011-03-14'); // WHERE projectactivity_datetofinish = '2011-03-14'
     * $query->filterByProjectactivityDatetofinish('now'); // WHERE projectactivity_datetofinish = '2011-03-14'
     * $query->filterByProjectactivityDatetofinish(array('max' => 'yesterday')); // WHERE projectactivity_datetofinish < '2011-03-13'
     * </code>
     *
     * @param     mixed $projectactivityDatetofinish The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function filterByProjectactivityDatetofinish($projectactivityDatetofinish = null, $comparison = null)
    {
        if (is_array($projectactivityDatetofinish)) {
            $useMinMax = false;
            if (isset($projectactivityDatetofinish['min'])) {
                $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH, $projectactivityDatetofinish['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectactivityDatetofinish['max'])) {
                $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH, $projectactivityDatetofinish['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH, $projectactivityDatetofinish, $comparison);
    }

    /**
     * Filter the query by a related Project object
     *
     * @param   Project|PropelObjectCollection $project The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProject($project, $comparison = null)
    {
        if ($project instanceof Project) {
            return $this
                ->addUsingAlias(ProjectactivityPeer::IDPROJECT, $project->getIdproject(), $comparison);
        } elseif ($project instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectactivityPeer::IDPROJECT, $project->toKeyValue('PrimaryKey', 'Idproject'), $comparison);
        } else {
            throw new PropelException('filterByProject() only accepts arguments of type Project or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Project relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function joinProject($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Project');

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
            $this->addJoinObject($join, 'Project');
        }

        return $this;
    }

    /**
     * Use the Project relation Project object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectQuery A secondary query class using the current class as primary query
     */
    public function useProjectQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Project', 'ProjectQuery');
    }

    /**
     * Filter the query by a related Projectactivitypost object
     *
     * @param   Projectactivitypost|PropelObjectCollection $projectactivitypost  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivitypost($projectactivitypost, $comparison = null)
    {
        if ($projectactivitypost instanceof Projectactivitypost) {
            return $this
                ->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $projectactivitypost->getIdprojectactivity(), $comparison);
        } elseif ($projectactivitypost instanceof PropelObjectCollection) {
            return $this
                ->useProjectactivitypostQuery()
                ->filterByPrimaryKeys($projectactivitypost->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectactivitypost() only accepts arguments of type Projectactivitypost or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projectactivitypost relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function joinProjectactivitypost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projectactivitypost');

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
            $this->addJoinObject($join, 'Projectactivitypost');
        }

        return $this;
    }

    /**
     * Use the Projectactivitypost relation Projectactivitypost object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectactivitypostQuery A secondary query class using the current class as primary query
     */
    public function useProjectactivitypostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectactivitypost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projectactivitypost', 'ProjectactivitypostQuery');
    }

    /**
     * Filter the query by a related Projectactivityuser object
     *
     * @param   Projectactivityuser|PropelObjectCollection $projectactivityuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivityuser($projectactivityuser, $comparison = null)
    {
        if ($projectactivityuser instanceof Projectactivityuser) {
            return $this
                ->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $projectactivityuser->getIdprojectactivity(), $comparison);
        } elseif ($projectactivityuser instanceof PropelObjectCollection) {
            return $this
                ->useProjectactivityuserQuery()
                ->filterByPrimaryKeys($projectactivityuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectactivityuser() only accepts arguments of type Projectactivityuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projectactivityuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function joinProjectactivityuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projectactivityuser');

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
            $this->addJoinObject($join, 'Projectactivityuser');
        }

        return $this;
    }

    /**
     * Use the Projectactivityuser relation Projectactivityuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectactivityuserQuery A secondary query class using the current class as primary query
     */
    public function useProjectactivityuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectactivityuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projectactivityuser', 'ProjectactivityuserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Projectactivity $projectactivity Object to remove from the list of results
     *
     * @return ProjectactivityQuery The current query, for fluid interface
     */
    public function prune($projectactivity = null)
    {
        if ($projectactivity) {
            $this->addUsingAlias(ProjectactivityPeer::IDPROJECTACTIVITY, $projectactivity->getIdprojectactivity(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
