<?php


/**
 * Base class that represents a query for the 'projectactivitypost' table.
 *
 *
 *
 * @method ProjectactivitypostQuery orderByIdprojectactivitypost($order = Criteria::ASC) Order by the idprojectactivitypost column
 * @method ProjectactivitypostQuery orderByIdprojectactivity($order = Criteria::ASC) Order by the idprojectactivity column
 * @method ProjectactivitypostQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ProjectactivitypostQuery orderByProjectactivitypostDate($order = Criteria::ASC) Order by the projectactivitypost_date column
 * @method ProjectactivitypostQuery orderByProjectactivitypostText($order = Criteria::ASC) Order by the projectactivitypost_text column
 *
 * @method ProjectactivitypostQuery groupByIdprojectactivitypost() Group by the idprojectactivitypost column
 * @method ProjectactivitypostQuery groupByIdprojectactivity() Group by the idprojectactivity column
 * @method ProjectactivitypostQuery groupByIduser() Group by the iduser column
 * @method ProjectactivitypostQuery groupByProjectactivitypostDate() Group by the projectactivitypost_date column
 * @method ProjectactivitypostQuery groupByProjectactivitypostText() Group by the projectactivitypost_text column
 *
 * @method ProjectactivitypostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectactivitypostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectactivitypostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectactivitypostQuery leftJoinProjectactivity($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projectactivity relation
 * @method ProjectactivitypostQuery rightJoinProjectactivity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projectactivity relation
 * @method ProjectactivitypostQuery innerJoinProjectactivity($relationAlias = null) Adds a INNER JOIN clause to the query using the Projectactivity relation
 *
 * @method ProjectactivitypostQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ProjectactivitypostQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ProjectactivitypostQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Projectactivitypost findOne(PropelPDO $con = null) Return the first Projectactivitypost matching the query
 * @method Projectactivitypost findOneOrCreate(PropelPDO $con = null) Return the first Projectactivitypost matching the query, or a new Projectactivitypost object populated from the query conditions when no match is found
 *
 * @method Projectactivitypost findOneByIdprojectactivity(int $idprojectactivity) Return the first Projectactivitypost filtered by the idprojectactivity column
 * @method Projectactivitypost findOneByIduser(int $iduser) Return the first Projectactivitypost filtered by the iduser column
 * @method Projectactivitypost findOneByProjectactivitypostDate(string $projectactivitypost_date) Return the first Projectactivitypost filtered by the projectactivitypost_date column
 * @method Projectactivitypost findOneByProjectactivitypostText(string $projectactivitypost_text) Return the first Projectactivitypost filtered by the projectactivitypost_text column
 *
 * @method array findByIdprojectactivitypost(int $idprojectactivitypost) Return Projectactivitypost objects filtered by the idprojectactivitypost column
 * @method array findByIdprojectactivity(int $idprojectactivity) Return Projectactivitypost objects filtered by the idprojectactivity column
 * @method array findByIduser(int $iduser) Return Projectactivitypost objects filtered by the iduser column
 * @method array findByProjectactivitypostDate(string $projectactivitypost_date) Return Projectactivitypost objects filtered by the projectactivitypost_date column
 * @method array findByProjectactivitypostText(string $projectactivitypost_text) Return Projectactivitypost objects filtered by the projectactivitypost_text column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProjectactivitypostQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProjectactivitypostQuery object.
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
            $modelName = 'Projectactivitypost';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectactivitypostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectactivitypostQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectactivitypostQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectactivitypostQuery) {
            return $criteria;
        }
        $query = new ProjectactivitypostQuery(null, null, $modelAlias);

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
     * @return   Projectactivitypost|Projectactivitypost[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectactivitypostPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectactivitypostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Projectactivitypost A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdprojectactivitypost($key, $con = null)
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
     * @return                 Projectactivitypost A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idprojectactivitypost`, `idprojectactivity`, `iduser`, `projectactivitypost_date`, `projectactivitypost_text` FROM `projectactivitypost` WHERE `idprojectactivitypost` = :p0';
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
            $obj = new Projectactivitypost();
            $obj->hydrate($row);
            ProjectactivitypostPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Projectactivitypost|Projectactivitypost[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Projectactivitypost[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idprojectactivitypost column
     *
     * Example usage:
     * <code>
     * $query->filterByIdprojectactivitypost(1234); // WHERE idprojectactivitypost = 1234
     * $query->filterByIdprojectactivitypost(array(12, 34)); // WHERE idprojectactivitypost IN (12, 34)
     * $query->filterByIdprojectactivitypost(array('min' => 12)); // WHERE idprojectactivitypost >= 12
     * $query->filterByIdprojectactivitypost(array('max' => 12)); // WHERE idprojectactivitypost <= 12
     * </code>
     *
     * @param     mixed $idprojectactivitypost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByIdprojectactivitypost($idprojectactivitypost = null, $comparison = null)
    {
        if (is_array($idprojectactivitypost)) {
            $useMinMax = false;
            if (isset($idprojectactivitypost['min'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $idprojectactivitypost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprojectactivitypost['max'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $idprojectactivitypost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $idprojectactivitypost, $comparison);
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
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByIdprojectactivity($idprojectactivity = null, $comparison = null)
    {
        if (is_array($idprojectactivity)) {
            $useMinMax = false;
            if (isset($idprojectactivity['min'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITY, $idprojectactivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprojectactivity['max'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITY, $idprojectactivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITY, $idprojectactivity, $comparison);
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
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivitypostPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the projectactivitypost_date column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivitypostDate('2011-03-14'); // WHERE projectactivitypost_date = '2011-03-14'
     * $query->filterByProjectactivitypostDate('now'); // WHERE projectactivitypost_date = '2011-03-14'
     * $query->filterByProjectactivitypostDate(array('max' => 'yesterday')); // WHERE projectactivitypost_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $projectactivitypostDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByProjectactivitypostDate($projectactivitypostDate = null, $comparison = null)
    {
        if (is_array($projectactivitypostDate)) {
            $useMinMax = false;
            if (isset($projectactivitypostDate['min'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::PROJECTACTIVITYPOST_DATE, $projectactivitypostDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectactivitypostDate['max'])) {
                $this->addUsingAlias(ProjectactivitypostPeer::PROJECTACTIVITYPOST_DATE, $projectactivitypostDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectactivitypostPeer::PROJECTACTIVITYPOST_DATE, $projectactivitypostDate, $comparison);
    }

    /**
     * Filter the query on the projectactivitypost_text column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectactivitypostText('fooValue');   // WHERE projectactivitypost_text = 'fooValue'
     * $query->filterByProjectactivitypostText('%fooValue%'); // WHERE projectactivitypost_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projectactivitypostText The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function filterByProjectactivitypostText($projectactivitypostText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projectactivitypostText)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projectactivitypostText)) {
                $projectactivitypostText = str_replace('*', '%', $projectactivitypostText);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectactivitypostPeer::PROJECTACTIVITYPOST_TEXT, $projectactivitypostText, $comparison);
    }

    /**
     * Filter the query by a related Projectactivity object
     *
     * @param   Projectactivity|PropelObjectCollection $projectactivity The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectactivitypostQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProjectactivity($projectactivity, $comparison = null)
    {
        if ($projectactivity instanceof Projectactivity) {
            return $this
                ->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITY, $projectactivity->getIdprojectactivity(), $comparison);
        } elseif ($projectactivity instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITY, $projectactivity->toKeyValue('PrimaryKey', 'Idprojectactivity'), $comparison);
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
     * @return ProjectactivitypostQuery The current query, for fluid interface
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
     * @return                 ProjectactivitypostQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ProjectactivitypostPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectactivitypostPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return ProjectactivitypostQuery The current query, for fluid interface
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
     * @param   Projectactivitypost $projectactivitypost Object to remove from the list of results
     *
     * @return ProjectactivitypostQuery The current query, for fluid interface
     */
    public function prune($projectactivitypost = null)
    {
        if ($projectactivitypost) {
            $this->addUsingAlias(ProjectactivitypostPeer::IDPROJECTACTIVITYPOST, $projectactivitypost->getIdprojectactivitypost(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
