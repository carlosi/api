<?php


/**
 * Base class that represents a query for the 'prospectiongroup' table.
 *
 *
 *
 * @method ProspectiongroupQuery orderByIdprospectiongroup($order = Criteria::ASC) Order by the idprospectiongroup column
 *
 * @method ProspectiongroupQuery groupByIdprospectiongroup() Group by the idprospectiongroup column
 *
 * @method ProspectiongroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProspectiongroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProspectiongroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Prospectiongroup findOne(PropelPDO $con = null) Return the first Prospectiongroup matching the query
 * @method Prospectiongroup findOneOrCreate(PropelPDO $con = null) Return the first Prospectiongroup matching the query, or a new Prospectiongroup object populated from the query conditions when no match is found
 *
 *
 * @method array findByIdprospectiongroup(int $idprospectiongroup) Return Prospectiongroup objects filtered by the idprospectiongroup column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProspectiongroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProspectiongroupQuery object.
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
            $modelName = 'Prospectiongroup';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProspectiongroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProspectiongroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProspectiongroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProspectiongroupQuery) {
            return $criteria;
        }
        $query = new ProspectiongroupQuery(null, null, $modelAlias);

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
     * @return   Prospectiongroup|Prospectiongroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProspectiongroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProspectiongroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Prospectiongroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdprospectiongroup($key, $con = null)
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
     * @return                 Prospectiongroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idprospectiongroup` FROM `prospectiongroup` WHERE `idprospectiongroup` = :p0';
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
            $obj = new Prospectiongroup();
            $obj->hydrate($row);
            ProspectiongroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Prospectiongroup|Prospectiongroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Prospectiongroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ProspectiongroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProspectiongroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idprospectiongroup column
     *
     * Example usage:
     * <code>
     * $query->filterByIdprospectiongroup(1234); // WHERE idprospectiongroup = 1234
     * $query->filterByIdprospectiongroup(array(12, 34)); // WHERE idprospectiongroup IN (12, 34)
     * $query->filterByIdprospectiongroup(array('min' => 12)); // WHERE idprospectiongroup >= 12
     * $query->filterByIdprospectiongroup(array('max' => 12)); // WHERE idprospectiongroup <= 12
     * </code>
     *
     * @param     mixed $idprospectiongroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProspectiongroupQuery The current query, for fluid interface
     */
    public function filterByIdprospectiongroup($idprospectiongroup = null, $comparison = null)
    {
        if (is_array($idprospectiongroup)) {
            $useMinMax = false;
            if (isset($idprospectiongroup['min'])) {
                $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $idprospectiongroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idprospectiongroup['max'])) {
                $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $idprospectiongroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $idprospectiongroup, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Prospectiongroup $prospectiongroup Object to remove from the list of results
     *
     * @return ProspectiongroupQuery The current query, for fluid interface
     */
    public function prune($prospectiongroup = null)
    {
        if ($prospectiongroup) {
            $this->addUsingAlias(ProspectiongroupPeer::IDPROSPECTIONGROUP, $prospectiongroup->getIdprospectiongroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
