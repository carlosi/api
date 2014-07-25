<?php


/**
 * Base class that represents a query for the 'productionorderitem' table.
 *
 *
 *
 * @method ProductionorderitemQuery orderByIdproductionorderitem($order = Criteria::ASC) Order by the idproductionorderitem column
 * @method ProductionorderitemQuery orderByIdproductionteam($order = Criteria::ASC) Order by the idproductionteam column
 * @method ProductionorderitemQuery orderByIdproductionline($order = Criteria::ASC) Order by the idproductionline column
 * @method ProductionorderitemQuery orderByIdorderitem($order = Criteria::ASC) Order by the idorderitem column
 * @method ProductionorderitemQuery orderByIdproductionstatus($order = Criteria::ASC) Order by the idproductionstatus column
 * @method ProductionorderitemQuery orderByProductionorderitemDateinit($order = Criteria::ASC) Order by the productionorderitem_dateinit column
 * @method ProductionorderitemQuery orderByProductionorderitemDatedelivery($order = Criteria::ASC) Order by the productionorderitem_datedelivery column
 *
 * @method ProductionorderitemQuery groupByIdproductionorderitem() Group by the idproductionorderitem column
 * @method ProductionorderitemQuery groupByIdproductionteam() Group by the idproductionteam column
 * @method ProductionorderitemQuery groupByIdproductionline() Group by the idproductionline column
 * @method ProductionorderitemQuery groupByIdorderitem() Group by the idorderitem column
 * @method ProductionorderitemQuery groupByIdproductionstatus() Group by the idproductionstatus column
 * @method ProductionorderitemQuery groupByProductionorderitemDateinit() Group by the productionorderitem_dateinit column
 * @method ProductionorderitemQuery groupByProductionorderitemDatedelivery() Group by the productionorderitem_datedelivery column
 *
 * @method ProductionorderitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionorderitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionorderitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionorderitemQuery leftJoinOrderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orderitem relation
 * @method ProductionorderitemQuery rightJoinOrderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orderitem relation
 * @method ProductionorderitemQuery innerJoinOrderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Orderitem relation
 *
 * @method ProductionorderitemQuery leftJoinProductionteam($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionteam relation
 * @method ProductionorderitemQuery rightJoinProductionteam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionteam relation
 * @method ProductionorderitemQuery innerJoinProductionteam($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionteam relation
 *
 * @method ProductionorderitemQuery leftJoinProductionline($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionline relation
 * @method ProductionorderitemQuery rightJoinProductionline($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionline relation
 * @method ProductionorderitemQuery innerJoinProductionline($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionline relation
 *
 * @method ProductionorderitemQuery leftJoinProductionstatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionstatus relation
 * @method ProductionorderitemQuery rightJoinProductionstatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionstatus relation
 * @method ProductionorderitemQuery innerJoinProductionstatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionstatus relation
 *
 * @method ProductionorderitemQuery leftJoinProductionordercomment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionordercomment relation
 * @method ProductionorderitemQuery rightJoinProductionordercomment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionordercomment relation
 * @method ProductionorderitemQuery innerJoinProductionordercomment($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionordercomment relation
 *
 * @method Productionorderitem findOne(PropelPDO $con = null) Return the first Productionorderitem matching the query
 * @method Productionorderitem findOneOrCreate(PropelPDO $con = null) Return the first Productionorderitem matching the query, or a new Productionorderitem object populated from the query conditions when no match is found
 *
 * @method Productionorderitem findOneByIdproductionteam(int $idproductionteam) Return the first Productionorderitem filtered by the idproductionteam column
 * @method Productionorderitem findOneByIdproductionline(int $idproductionline) Return the first Productionorderitem filtered by the idproductionline column
 * @method Productionorderitem findOneByIdorderitem(int $idorderitem) Return the first Productionorderitem filtered by the idorderitem column
 * @method Productionorderitem findOneByIdproductionstatus(int $idproductionstatus) Return the first Productionorderitem filtered by the idproductionstatus column
 * @method Productionorderitem findOneByProductionorderitemDateinit(string $productionorderitem_dateinit) Return the first Productionorderitem filtered by the productionorderitem_dateinit column
 * @method Productionorderitem findOneByProductionorderitemDatedelivery(string $productionorderitem_datedelivery) Return the first Productionorderitem filtered by the productionorderitem_datedelivery column
 *
 * @method array findByIdproductionorderitem(int $idproductionorderitem) Return Productionorderitem objects filtered by the idproductionorderitem column
 * @method array findByIdproductionteam(int $idproductionteam) Return Productionorderitem objects filtered by the idproductionteam column
 * @method array findByIdproductionline(int $idproductionline) Return Productionorderitem objects filtered by the idproductionline column
 * @method array findByIdorderitem(int $idorderitem) Return Productionorderitem objects filtered by the idorderitem column
 * @method array findByIdproductionstatus(int $idproductionstatus) Return Productionorderitem objects filtered by the idproductionstatus column
 * @method array findByProductionorderitemDateinit(string $productionorderitem_dateinit) Return Productionorderitem objects filtered by the productionorderitem_dateinit column
 * @method array findByProductionorderitemDatedelivery(string $productionorderitem_datedelivery) Return Productionorderitem objects filtered by the productionorderitem_datedelivery column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionorderitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionorderitemQuery object.
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
            $modelName = 'Productionorderitem';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionorderitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionorderitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionorderitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionorderitemQuery) {
            return $criteria;
        }
        $query = new ProductionorderitemQuery(null, null, $modelAlias);

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
     * @return   Productionorderitem|Productionorderitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionorderitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionorderitem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionorderitem($key, $con = null)
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
     * @return                 Productionorderitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionorderitem`, `idproductionteam`, `idproductionline`, `idorderitem`, `idproductionstatus`, `productionorderitem_dateinit`, `productionorderitem_datedelivery` FROM `productionorderitem` WHERE `idproductionorderitem` = :p0';
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
            $obj = new Productionorderitem();
            $obj->hydrate($row);
            ProductionorderitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionorderitem|Productionorderitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionorderitem[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionorderitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionorderitem(1234); // WHERE idproductionorderitem = 1234
     * $query->filterByIdproductionorderitem(array(12, 34)); // WHERE idproductionorderitem IN (12, 34)
     * $query->filterByIdproductionorderitem(array('min' => 12)); // WHERE idproductionorderitem >= 12
     * $query->filterByIdproductionorderitem(array('max' => 12)); // WHERE idproductionorderitem <= 12
     * </code>
     *
     * @param     mixed $idproductionorderitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByIdproductionorderitem($idproductionorderitem = null, $comparison = null)
    {
        if (is_array($idproductionorderitem)) {
            $useMinMax = false;
            if (isset($idproductionorderitem['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionorderitem['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem, $comparison);
    }

    /**
     * Filter the query on the idproductionteam column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionteam(1234); // WHERE idproductionteam = 1234
     * $query->filterByIdproductionteam(array(12, 34)); // WHERE idproductionteam IN (12, 34)
     * $query->filterByIdproductionteam(array('min' => 12)); // WHERE idproductionteam >= 12
     * $query->filterByIdproductionteam(array('max' => 12)); // WHERE idproductionteam <= 12
     * </code>
     *
     * @see       filterByProductionteam()
     *
     * @param     mixed $idproductionteam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByIdproductionteam($idproductionteam = null, $comparison = null)
    {
        if (is_array($idproductionteam)) {
            $useMinMax = false;
            if (isset($idproductionteam['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONTEAM, $idproductionteam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionteam['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONTEAM, $idproductionteam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONTEAM, $idproductionteam, $comparison);
    }

    /**
     * Filter the query on the idproductionline column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionline(1234); // WHERE idproductionline = 1234
     * $query->filterByIdproductionline(array(12, 34)); // WHERE idproductionline IN (12, 34)
     * $query->filterByIdproductionline(array('min' => 12)); // WHERE idproductionline >= 12
     * $query->filterByIdproductionline(array('max' => 12)); // WHERE idproductionline <= 12
     * </code>
     *
     * @see       filterByProductionline()
     *
     * @param     mixed $idproductionline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByIdproductionline($idproductionline = null, $comparison = null)
    {
        if (is_array($idproductionline)) {
            $useMinMax = false;
            if (isset($idproductionline['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONLINE, $idproductionline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionline['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONLINE, $idproductionline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONLINE, $idproductionline, $comparison);
    }

    /**
     * Filter the query on the idorderitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorderitem(1234); // WHERE idorderitem = 1234
     * $query->filterByIdorderitem(array(12, 34)); // WHERE idorderitem IN (12, 34)
     * $query->filterByIdorderitem(array('min' => 12)); // WHERE idorderitem >= 12
     * $query->filterByIdorderitem(array('max' => 12)); // WHERE idorderitem <= 12
     * </code>
     *
     * @see       filterByOrderitem()
     *
     * @param     mixed $idorderitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByIdorderitem($idorderitem = null, $comparison = null)
    {
        if (is_array($idorderitem)) {
            $useMinMax = false;
            if (isset($idorderitem['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDORDERITEM, $idorderitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorderitem['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDORDERITEM, $idorderitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::IDORDERITEM, $idorderitem, $comparison);
    }

    /**
     * Filter the query on the idproductionstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionstatus(1234); // WHERE idproductionstatus = 1234
     * $query->filterByIdproductionstatus(array(12, 34)); // WHERE idproductionstatus IN (12, 34)
     * $query->filterByIdproductionstatus(array('min' => 12)); // WHERE idproductionstatus >= 12
     * $query->filterByIdproductionstatus(array('max' => 12)); // WHERE idproductionstatus <= 12
     * </code>
     *
     * @see       filterByProductionstatus()
     *
     * @param     mixed $idproductionstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByIdproductionstatus($idproductionstatus = null, $comparison = null)
    {
        if (is_array($idproductionstatus)) {
            $useMinMax = false;
            if (isset($idproductionstatus['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $idproductionstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionstatus['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $idproductionstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $idproductionstatus, $comparison);
    }

    /**
     * Filter the query on the productionorderitem_dateinit column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionorderitemDateinit('2011-03-14'); // WHERE productionorderitem_dateinit = '2011-03-14'
     * $query->filterByProductionorderitemDateinit('now'); // WHERE productionorderitem_dateinit = '2011-03-14'
     * $query->filterByProductionorderitemDateinit(array('max' => 'yesterday')); // WHERE productionorderitem_dateinit < '2011-03-13'
     * </code>
     *
     * @param     mixed $productionorderitemDateinit The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByProductionorderitemDateinit($productionorderitemDateinit = null, $comparison = null)
    {
        if (is_array($productionorderitemDateinit)) {
            $useMinMax = false;
            if (isset($productionorderitemDateinit['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT, $productionorderitemDateinit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productionorderitemDateinit['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT, $productionorderitemDateinit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT, $productionorderitemDateinit, $comparison);
    }

    /**
     * Filter the query on the productionorderitem_datedelivery column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionorderitemDatedelivery('2011-03-14'); // WHERE productionorderitem_datedelivery = '2011-03-14'
     * $query->filterByProductionorderitemDatedelivery('now'); // WHERE productionorderitem_datedelivery = '2011-03-14'
     * $query->filterByProductionorderitemDatedelivery(array('max' => 'yesterday')); // WHERE productionorderitem_datedelivery < '2011-03-13'
     * </code>
     *
     * @param     mixed $productionorderitemDatedelivery The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function filterByProductionorderitemDatedelivery($productionorderitemDatedelivery = null, $comparison = null)
    {
        if (is_array($productionorderitemDatedelivery)) {
            $useMinMax = false;
            if (isset($productionorderitemDatedelivery['min'])) {
                $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY, $productionorderitemDatedelivery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productionorderitemDatedelivery['max'])) {
                $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY, $productionorderitemDatedelivery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY, $productionorderitemDatedelivery, $comparison);
    }

    /**
     * Filter the query by a related Orderitem object
     *
     * @param   Orderitem|PropelObjectCollection $orderitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionorderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrderitem($orderitem, $comparison = null)
    {
        if ($orderitem instanceof Orderitem) {
            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDORDERITEM, $orderitem->getIdorderitem(), $comparison);
        } elseif ($orderitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDORDERITEM, $orderitem->toKeyValue('PrimaryKey', 'Idorderitem'), $comparison);
        } else {
            throw new PropelException('filterByOrderitem() only accepts arguments of type Orderitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orderitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function joinOrderitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orderitem');

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
            $this->addJoinObject($join, 'Orderitem');
        }

        return $this;
    }

    /**
     * Use the Orderitem relation Orderitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderitemQuery A secondary query class using the current class as primary query
     */
    public function useOrderitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orderitem', 'OrderitemQuery');
    }

    /**
     * Filter the query by a related Productionteam object
     *
     * @param   Productionteam|PropelObjectCollection $productionteam The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionorderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionteam($productionteam, $comparison = null)
    {
        if ($productionteam instanceof Productionteam) {
            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONTEAM, $productionteam->getIdproductionteam(), $comparison);
        } elseif ($productionteam instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONTEAM, $productionteam->toKeyValue('PrimaryKey', 'Idproductionteam'), $comparison);
        } else {
            throw new PropelException('filterByProductionteam() only accepts arguments of type Productionteam or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionteam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function joinProductionteam($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionteam');

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
            $this->addJoinObject($join, 'Productionteam');
        }

        return $this;
    }

    /**
     * Use the Productionteam relation Productionteam object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionteamQuery A secondary query class using the current class as primary query
     */
    public function useProductionteamQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionteam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionteam', 'ProductionteamQuery');
    }

    /**
     * Filter the query by a related Productionline object
     *
     * @param   Productionline|PropelObjectCollection $productionline The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionorderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionline($productionline, $comparison = null)
    {
        if ($productionline instanceof Productionline) {
            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONLINE, $productionline->getIdproductionline(), $comparison);
        } elseif ($productionline instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONLINE, $productionline->toKeyValue('PrimaryKey', 'Idproductionline'), $comparison);
        } else {
            throw new PropelException('filterByProductionline() only accepts arguments of type Productionline or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionline relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function joinProductionline($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionline');

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
            $this->addJoinObject($join, 'Productionline');
        }

        return $this;
    }

    /**
     * Use the Productionline relation Productionline object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionlineQuery A secondary query class using the current class as primary query
     */
    public function useProductionlineQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionline($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionline', 'ProductionlineQuery');
    }

    /**
     * Filter the query by a related Productionstatus object
     *
     * @param   Productionstatus|PropelObjectCollection $productionstatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionorderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionstatus($productionstatus, $comparison = null)
    {
        if ($productionstatus instanceof Productionstatus) {
            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $productionstatus->getIdproductionstatus(), $comparison);
        } elseif ($productionstatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $productionstatus->toKeyValue('PrimaryKey', 'Idproductionstatus'), $comparison);
        } else {
            throw new PropelException('filterByProductionstatus() only accepts arguments of type Productionstatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionstatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function joinProductionstatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionstatus');

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
            $this->addJoinObject($join, 'Productionstatus');
        }

        return $this;
    }

    /**
     * Use the Productionstatus relation Productionstatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionstatusQuery A secondary query class using the current class as primary query
     */
    public function useProductionstatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionstatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionstatus', 'ProductionstatusQuery');
    }

    /**
     * Filter the query by a related Productionordercomment object
     *
     * @param   Productionordercomment|PropelObjectCollection $productionordercomment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionorderitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionordercomment($productionordercomment, $comparison = null)
    {
        if ($productionordercomment instanceof Productionordercomment) {
            return $this
                ->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $productionordercomment->getIdproductionorderitem(), $comparison);
        } elseif ($productionordercomment instanceof PropelObjectCollection) {
            return $this
                ->useProductionordercommentQuery()
                ->filterByPrimaryKeys($productionordercomment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionordercomment() only accepts arguments of type Productionordercomment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionordercomment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function joinProductionordercomment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionordercomment');

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
            $this->addJoinObject($join, 'Productionordercomment');
        }

        return $this;
    }

    /**
     * Use the Productionordercomment relation Productionordercomment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionordercommentQuery A secondary query class using the current class as primary query
     */
    public function useProductionordercommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionordercomment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionordercomment', 'ProductionordercommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productionorderitem $productionorderitem Object to remove from the list of results
     *
     * @return ProductionorderitemQuery The current query, for fluid interface
     */
    public function prune($productionorderitem = null)
    {
        if ($productionorderitem) {
            $this->addUsingAlias(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $productionorderitem->getIdproductionorderitem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
