<?php


/**
 * Base class that represents a query for the 'departmentmember' table.
 *
 *
 *
 * @method DepartmentmemberQuery orderByIddepartmentmember($order = Criteria::ASC) Order by the iddepartmentmember column
 * @method DepartmentmemberQuery orderByIddepartment($order = Criteria::ASC) Order by the iddepartment column
 * @method DepartmentmemberQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 *
 * @method DepartmentmemberQuery groupByIddepartmentmember() Group by the iddepartmentmember column
 * @method DepartmentmemberQuery groupByIddepartment() Group by the iddepartment column
 * @method DepartmentmemberQuery groupByIduser() Group by the iduser column
 *
 * @method DepartmentmemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DepartmentmemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DepartmentmemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Departmentmember findOne(PropelPDO $con = null) Return the first Departmentmember matching the query
 * @method Departmentmember findOneOrCreate(PropelPDO $con = null) Return the first Departmentmember matching the query, or a new Departmentmember object populated from the query conditions when no match is found
 *
 * @method Departmentmember findOneByIddepartment(int $iddepartment) Return the first Departmentmember filtered by the iddepartment column
 * @method Departmentmember findOneByIduser(int $iduser) Return the first Departmentmember filtered by the iduser column
 *
 * @method array findByIddepartmentmember(int $iddepartmentmember) Return Departmentmember objects filtered by the iddepartmentmember column
 * @method array findByIddepartment(int $iddepartment) Return Departmentmember objects filtered by the iddepartment column
 * @method array findByIduser(int $iduser) Return Departmentmember objects filtered by the iduser column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepartmentmemberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDepartmentmemberQuery object.
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
            $modelName = 'Departmentmember';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DepartmentmemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DepartmentmemberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DepartmentmemberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DepartmentmemberQuery) {
            return $criteria;
        }
        $query = new DepartmentmemberQuery(null, null, $modelAlias);

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
     * @return   Departmentmember|Departmentmember[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DepartmentmemberPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DepartmentmemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Departmentmember A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIddepartmentmember($key, $con = null)
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
     * @return                 Departmentmember A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `iddepartmentmember`, `iddepartment`, `iduser` FROM `departmentmember` WHERE `iddepartmentmember` = :p0';
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
            $obj = new Departmentmember();
            $obj->hydrate($row);
            DepartmentmemberPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Departmentmember|Departmentmember[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Departmentmember[]|mixed the list of results, formatted by the current formatter
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
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddepartmentmember column
     *
     * Example usage:
     * <code>
     * $query->filterByIddepartmentmember(1234); // WHERE iddepartmentmember = 1234
     * $query->filterByIddepartmentmember(array(12, 34)); // WHERE iddepartmentmember IN (12, 34)
     * $query->filterByIddepartmentmember(array('min' => 12)); // WHERE iddepartmentmember >= 12
     * $query->filterByIddepartmentmember(array('max' => 12)); // WHERE iddepartmentmember <= 12
     * </code>
     *
     * @param     mixed $iddepartmentmember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function filterByIddepartmentmember($iddepartmentmember = null, $comparison = null)
    {
        if (is_array($iddepartmentmember)) {
            $useMinMax = false;
            if (isset($iddepartmentmember['min'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $iddepartmentmember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartmentmember['max'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $iddepartmentmember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $iddepartmentmember, $comparison);
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
     * @param     mixed $iddepartment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function filterByIddepartment($iddepartment = null, $comparison = null)
    {
        if (is_array($iddepartment)) {
            $useMinMax = false;
            if (isset($iddepartment['min'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENT, $iddepartment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddepartment['max'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENT, $iddepartment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENT, $iddepartment, $comparison);
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
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(DepartmentmemberPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DepartmentmemberPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Departmentmember $departmentmember Object to remove from the list of results
     *
     * @return DepartmentmemberQuery The current query, for fluid interface
     */
    public function prune($departmentmember = null)
    {
        if ($departmentmember) {
            $this->addUsingAlias(DepartmentmemberPeer::IDDEPARTMENTMEMBER, $departmentmember->getIddepartmentmember(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
