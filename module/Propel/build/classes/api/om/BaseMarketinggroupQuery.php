<?php


/**
 * Base class that represents a query for the 'marketinggroup' table.
 *
 *
 *
 * @method MarketinggroupQuery orderByIdmarketinggroup($order = Criteria::ASC) Order by the idmarketinggroup column
 * @method MarketinggroupQuery orderByMarketinggroupStatus($order = Criteria::ASC) Order by the marketinggroup_status column
 *
 * @method MarketinggroupQuery groupByIdmarketinggroup() Group by the idmarketinggroup column
 * @method MarketinggroupQuery groupByMarketinggroupStatus() Group by the marketinggroup_status column
 *
 * @method MarketinggroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MarketinggroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MarketinggroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Marketinggroup findOne(PropelPDO $con = null) Return the first Marketinggroup matching the query
 * @method Marketinggroup findOneOrCreate(PropelPDO $con = null) Return the first Marketinggroup matching the query, or a new Marketinggroup object populated from the query conditions when no match is found
 *
 * @method Marketinggroup findOneByMarketinggroupStatus(string $marketinggroup_status) Return the first Marketinggroup filtered by the marketinggroup_status column
 *
 * @method array findByIdmarketinggroup(int $idmarketinggroup) Return Marketinggroup objects filtered by the idmarketinggroup column
 * @method array findByMarketinggroupStatus(string $marketinggroup_status) Return Marketinggroup objects filtered by the marketinggroup_status column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketinggroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMarketinggroupQuery object.
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
            $modelName = 'Marketinggroup';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MarketinggroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MarketinggroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MarketinggroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MarketinggroupQuery) {
            return $criteria;
        }
        $query = new MarketinggroupQuery(null, null, $modelAlias);

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
     * @return   Marketinggroup|Marketinggroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MarketinggroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MarketinggroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Marketinggroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmarketinggroup($key, $con = null)
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
     * @return                 Marketinggroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmarketinggroup`, `marketinggroup_status` FROM `marketinggroup` WHERE `idmarketinggroup` = :p0';
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
            $obj = new Marketinggroup();
            $obj->hydrate($row);
            MarketinggroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Marketinggroup|Marketinggroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Marketinggroup[]|mixed the list of results, formatted by the current formatter
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
     * @return MarketinggroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MarketinggroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmarketinggroup column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmarketinggroup(1234); // WHERE idmarketinggroup = 1234
     * $query->filterByIdmarketinggroup(array(12, 34)); // WHERE idmarketinggroup IN (12, 34)
     * $query->filterByIdmarketinggroup(array('min' => 12)); // WHERE idmarketinggroup >= 12
     * $query->filterByIdmarketinggroup(array('max' => 12)); // WHERE idmarketinggroup <= 12
     * </code>
     *
     * @param     mixed $idmarketinggroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketinggroupQuery The current query, for fluid interface
     */
    public function filterByIdmarketinggroup($idmarketinggroup = null, $comparison = null)
    {
        if (is_array($idmarketinggroup)) {
            $useMinMax = false;
            if (isset($idmarketinggroup['min'])) {
                $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $idmarketinggroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmarketinggroup['max'])) {
                $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $idmarketinggroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $idmarketinggroup, $comparison);
    }

    /**
     * Filter the query on the marketinggroup_status column
     *
     * Example usage:
     * <code>
     * $query->filterByMarketinggroupStatus('fooValue');   // WHERE marketinggroup_status = 'fooValue'
     * $query->filterByMarketinggroupStatus('%fooValue%'); // WHERE marketinggroup_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marketinggroupStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MarketinggroupQuery The current query, for fluid interface
     */
    public function filterByMarketinggroupStatus($marketinggroupStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marketinggroupStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $marketinggroupStatus)) {
                $marketinggroupStatus = str_replace('*', '%', $marketinggroupStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MarketinggroupPeer::MARKETINGGROUP_STATUS, $marketinggroupStatus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Marketinggroup $marketinggroup Object to remove from the list of results
     *
     * @return MarketinggroupQuery The current query, for fluid interface
     */
    public function prune($marketinggroup = null)
    {
        if ($marketinggroup) {
            $this->addUsingAlias(MarketinggroupPeer::IDMARKETINGGROUP, $marketinggroup->getIdmarketinggroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
