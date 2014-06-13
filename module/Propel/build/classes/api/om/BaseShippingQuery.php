<?php


/**
 * Base class that represents a query for the 'shipping' table.
 *
 *
 *
 * @method ShippingQuery orderByIdshipping($order = Criteria::ASC) Order by the idshipping column
 * @method ShippingQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method ShippingQuery orderByShippingAddress($order = Criteria::ASC) Order by the shipping_address column
 * @method ShippingQuery orderByShippingTracking($order = Criteria::ASC) Order by the shipping_tracking column
 * @method ShippingQuery orderByTransportCompany($order = Criteria::ASC) Order by the transport_company column
 * @method ShippingQuery orderByShippingDate($order = Criteria::ASC) Order by the shipping_date column
 * @method ShippingQuery orderByShippingDatecompromise($order = Criteria::ASC) Order by the shipping_datecompromise column
 * @method ShippingQuery orderByShippingDaterealdelivery($order = Criteria::ASC) Order by the shipping_daterealdelivery column
 * @method ShippingQuery orderByShippingIsoCodecountry($order = Criteria::ASC) Order by the shipping_iso_codecountry column
 * @method ShippingQuery orderByShippingIsoCodephone($order = Criteria::ASC) Order by the shipping_iso_codephone column
 * @method ShippingQuery orderByShippingAddressee($order = Criteria::ASC) Order by the shipping_addressee column
 * @method ShippingQuery orderByShippingAddresseeCellular($order = Criteria::ASC) Order by the shipping_addressee_cellular column
 * @method ShippingQuery orderByShippingAddresseePhone($order = Criteria::ASC) Order by the shipping_addressee_phone column
 * @method ShippingQuery orderByShippingAddress2($order = Criteria::ASC) Order by the shipping_address2 column
 * @method ShippingQuery orderByShippingCity($order = Criteria::ASC) Order by the shipping_city column
 * @method ShippingQuery orderByShippingState($order = Criteria::ASC) Order by the shipping_state column
 * @method ShippingQuery orderByShippingZipcode($order = Criteria::ASC) Order by the shipping_zipcode column
 *
 * @method ShippingQuery groupByIdshipping() Group by the idshipping column
 * @method ShippingQuery groupByIdorder() Group by the idorder column
 * @method ShippingQuery groupByShippingAddress() Group by the shipping_address column
 * @method ShippingQuery groupByShippingTracking() Group by the shipping_tracking column
 * @method ShippingQuery groupByTransportCompany() Group by the transport_company column
 * @method ShippingQuery groupByShippingDate() Group by the shipping_date column
 * @method ShippingQuery groupByShippingDatecompromise() Group by the shipping_datecompromise column
 * @method ShippingQuery groupByShippingDaterealdelivery() Group by the shipping_daterealdelivery column
 * @method ShippingQuery groupByShippingIsoCodecountry() Group by the shipping_iso_codecountry column
 * @method ShippingQuery groupByShippingIsoCodephone() Group by the shipping_iso_codephone column
 * @method ShippingQuery groupByShippingAddressee() Group by the shipping_addressee column
 * @method ShippingQuery groupByShippingAddresseeCellular() Group by the shipping_addressee_cellular column
 * @method ShippingQuery groupByShippingAddresseePhone() Group by the shipping_addressee_phone column
 * @method ShippingQuery groupByShippingAddress2() Group by the shipping_address2 column
 * @method ShippingQuery groupByShippingCity() Group by the shipping_city column
 * @method ShippingQuery groupByShippingState() Group by the shipping_state column
 * @method ShippingQuery groupByShippingZipcode() Group by the shipping_zipcode column
 *
 * @method ShippingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ShippingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ShippingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ShippingQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ShippingQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ShippingQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Shipping findOne(PropelPDO $con = null) Return the first Shipping matching the query
 * @method Shipping findOneOrCreate(PropelPDO $con = null) Return the first Shipping matching the query, or a new Shipping object populated from the query conditions when no match is found
 *
 * @method Shipping findOneByIdorder(int $idorder) Return the first Shipping filtered by the idorder column
 * @method Shipping findOneByShippingAddress(string $shipping_address) Return the first Shipping filtered by the shipping_address column
 * @method Shipping findOneByShippingTracking(string $shipping_tracking) Return the first Shipping filtered by the shipping_tracking column
 * @method Shipping findOneByTransportCompany(string $transport_company) Return the first Shipping filtered by the transport_company column
 * @method Shipping findOneByShippingDate(string $shipping_date) Return the first Shipping filtered by the shipping_date column
 * @method Shipping findOneByShippingDatecompromise(string $shipping_datecompromise) Return the first Shipping filtered by the shipping_datecompromise column
 * @method Shipping findOneByShippingDaterealdelivery(string $shipping_daterealdelivery) Return the first Shipping filtered by the shipping_daterealdelivery column
 * @method Shipping findOneByShippingIsoCodecountry(string $shipping_iso_codecountry) Return the first Shipping filtered by the shipping_iso_codecountry column
 * @method Shipping findOneByShippingIsoCodephone(string $shipping_iso_codephone) Return the first Shipping filtered by the shipping_iso_codephone column
 * @method Shipping findOneByShippingAddressee(string $shipping_addressee) Return the first Shipping filtered by the shipping_addressee column
 * @method Shipping findOneByShippingAddresseeCellular(string $shipping_addressee_cellular) Return the first Shipping filtered by the shipping_addressee_cellular column
 * @method Shipping findOneByShippingAddresseePhone(string $shipping_addressee_phone) Return the first Shipping filtered by the shipping_addressee_phone column
 * @method Shipping findOneByShippingAddress2(string $shipping_address2) Return the first Shipping filtered by the shipping_address2 column
 * @method Shipping findOneByShippingCity(string $shipping_city) Return the first Shipping filtered by the shipping_city column
 * @method Shipping findOneByShippingState(string $shipping_state) Return the first Shipping filtered by the shipping_state column
 * @method Shipping findOneByShippingZipcode(string $shipping_zipcode) Return the first Shipping filtered by the shipping_zipcode column
 *
 * @method array findByIdshipping(int $idshipping) Return Shipping objects filtered by the idshipping column
 * @method array findByIdorder(int $idorder) Return Shipping objects filtered by the idorder column
 * @method array findByShippingAddress(string $shipping_address) Return Shipping objects filtered by the shipping_address column
 * @method array findByShippingTracking(string $shipping_tracking) Return Shipping objects filtered by the shipping_tracking column
 * @method array findByTransportCompany(string $transport_company) Return Shipping objects filtered by the transport_company column
 * @method array findByShippingDate(string $shipping_date) Return Shipping objects filtered by the shipping_date column
 * @method array findByShippingDatecompromise(string $shipping_datecompromise) Return Shipping objects filtered by the shipping_datecompromise column
 * @method array findByShippingDaterealdelivery(string $shipping_daterealdelivery) Return Shipping objects filtered by the shipping_daterealdelivery column
 * @method array findByShippingIsoCodecountry(string $shipping_iso_codecountry) Return Shipping objects filtered by the shipping_iso_codecountry column
 * @method array findByShippingIsoCodephone(string $shipping_iso_codephone) Return Shipping objects filtered by the shipping_iso_codephone column
 * @method array findByShippingAddressee(string $shipping_addressee) Return Shipping objects filtered by the shipping_addressee column
 * @method array findByShippingAddresseeCellular(string $shipping_addressee_cellular) Return Shipping objects filtered by the shipping_addressee_cellular column
 * @method array findByShippingAddresseePhone(string $shipping_addressee_phone) Return Shipping objects filtered by the shipping_addressee_phone column
 * @method array findByShippingAddress2(string $shipping_address2) Return Shipping objects filtered by the shipping_address2 column
 * @method array findByShippingCity(string $shipping_city) Return Shipping objects filtered by the shipping_city column
 * @method array findByShippingState(string $shipping_state) Return Shipping objects filtered by the shipping_state column
 * @method array findByShippingZipcode(string $shipping_zipcode) Return Shipping objects filtered by the shipping_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseShippingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseShippingQuery object.
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
            $modelName = 'Shipping';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ShippingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ShippingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ShippingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ShippingQuery) {
            return $criteria;
        }
        $query = new ShippingQuery(null, null, $modelAlias);

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
     * @return   Shipping|Shipping[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ShippingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Shipping A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdshipping($key, $con = null)
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
     * @return                 Shipping A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idshipping`, `idorder`, `shipping_address`, `shipping_tracking`, `transport_company`, `shipping_date`, `shipping_datecompromise`, `shipping_daterealdelivery`, `shipping_iso_codecountry`, `shipping_iso_codephone`, `shipping_addressee`, `shipping_addressee_cellular`, `shipping_addressee_phone`, `shipping_address2`, `shipping_city`, `shipping_state`, `shipping_zipcode` FROM `shipping` WHERE `idshipping` = :p0';
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
            $obj = new Shipping();
            $obj->hydrate($row);
            ShippingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Shipping|Shipping[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Shipping[]|mixed the list of results, formatted by the current formatter
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
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ShippingPeer::IDSHIPPING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ShippingPeer::IDSHIPPING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idshipping column
     *
     * Example usage:
     * <code>
     * $query->filterByIdshipping(1234); // WHERE idshipping = 1234
     * $query->filterByIdshipping(array(12, 34)); // WHERE idshipping IN (12, 34)
     * $query->filterByIdshipping(array('min' => 12)); // WHERE idshipping >= 12
     * $query->filterByIdshipping(array('max' => 12)); // WHERE idshipping <= 12
     * </code>
     *
     * @param     mixed $idshipping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByIdshipping($idshipping = null, $comparison = null)
    {
        if (is_array($idshipping)) {
            $useMinMax = false;
            if (isset($idshipping['min'])) {
                $this->addUsingAlias(ShippingPeer::IDSHIPPING, $idshipping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idshipping['max'])) {
                $this->addUsingAlias(ShippingPeer::IDSHIPPING, $idshipping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingPeer::IDSHIPPING, $idshipping, $comparison);
    }

    /**
     * Filter the query on the idorder column
     *
     * Example usage:
     * <code>
     * $query->filterByIdorder(1234); // WHERE idorder = 1234
     * $query->filterByIdorder(array(12, 34)); // WHERE idorder IN (12, 34)
     * $query->filterByIdorder(array('min' => 12)); // WHERE idorder >= 12
     * $query->filterByIdorder(array('max' => 12)); // WHERE idorder <= 12
     * </code>
     *
     * @see       filterByOrder()
     *
     * @param     mixed $idorder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(ShippingPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(ShippingPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the shipping_address column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddress('fooValue');   // WHERE shipping_address = 'fooValue'
     * $query->filterByShippingAddress('%fooValue%'); // WHERE shipping_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingAddress($shippingAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingAddress)) {
                $shippingAddress = str_replace('*', '%', $shippingAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ADDRESS, $shippingAddress, $comparison);
    }

    /**
     * Filter the query on the shipping_tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingTracking('fooValue');   // WHERE shipping_tracking = 'fooValue'
     * $query->filterByShippingTracking('%fooValue%'); // WHERE shipping_tracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingTracking The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingTracking($shippingTracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingTracking)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingTracking)) {
                $shippingTracking = str_replace('*', '%', $shippingTracking);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_TRACKING, $shippingTracking, $comparison);
    }

    /**
     * Filter the query on the transport_company column
     *
     * Example usage:
     * <code>
     * $query->filterByTransportCompany('fooValue');   // WHERE transport_company = 'fooValue'
     * $query->filterByTransportCompany('%fooValue%'); // WHERE transport_company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transportCompany The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByTransportCompany($transportCompany = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transportCompany)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transportCompany)) {
                $transportCompany = str_replace('*', '%', $transportCompany);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::TRANSPORT_COMPANY, $transportCompany, $comparison);
    }

    /**
     * Filter the query on the shipping_date column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingDate('2011-03-14'); // WHERE shipping_date = '2011-03-14'
     * $query->filterByShippingDate('now'); // WHERE shipping_date = '2011-03-14'
     * $query->filterByShippingDate(array('max' => 'yesterday')); // WHERE shipping_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $shippingDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingDate($shippingDate = null, $comparison = null)
    {
        if (is_array($shippingDate)) {
            $useMinMax = false;
            if (isset($shippingDate['min'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATE, $shippingDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingDate['max'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATE, $shippingDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_DATE, $shippingDate, $comparison);
    }

    /**
     * Filter the query on the shipping_datecompromise column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingDatecompromise('2011-03-14'); // WHERE shipping_datecompromise = '2011-03-14'
     * $query->filterByShippingDatecompromise('now'); // WHERE shipping_datecompromise = '2011-03-14'
     * $query->filterByShippingDatecompromise(array('max' => 'yesterday')); // WHERE shipping_datecompromise < '2011-03-13'
     * </code>
     *
     * @param     mixed $shippingDatecompromise The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingDatecompromise($shippingDatecompromise = null, $comparison = null)
    {
        if (is_array($shippingDatecompromise)) {
            $useMinMax = false;
            if (isset($shippingDatecompromise['min'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATECOMPROMISE, $shippingDatecompromise['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingDatecompromise['max'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATECOMPROMISE, $shippingDatecompromise['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_DATECOMPROMISE, $shippingDatecompromise, $comparison);
    }

    /**
     * Filter the query on the shipping_daterealdelivery column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingDaterealdelivery('2011-03-14'); // WHERE shipping_daterealdelivery = '2011-03-14'
     * $query->filterByShippingDaterealdelivery('now'); // WHERE shipping_daterealdelivery = '2011-03-14'
     * $query->filterByShippingDaterealdelivery(array('max' => 'yesterday')); // WHERE shipping_daterealdelivery < '2011-03-13'
     * </code>
     *
     * @param     mixed $shippingDaterealdelivery The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingDaterealdelivery($shippingDaterealdelivery = null, $comparison = null)
    {
        if (is_array($shippingDaterealdelivery)) {
            $useMinMax = false;
            if (isset($shippingDaterealdelivery['min'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATEREALDELIVERY, $shippingDaterealdelivery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingDaterealdelivery['max'])) {
                $this->addUsingAlias(ShippingPeer::SHIPPING_DATEREALDELIVERY, $shippingDaterealdelivery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_DATEREALDELIVERY, $shippingDaterealdelivery, $comparison);
    }

    /**
     * Filter the query on the shipping_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingIsoCodecountry('fooValue');   // WHERE shipping_iso_codecountry = 'fooValue'
     * $query->filterByShippingIsoCodecountry('%fooValue%'); // WHERE shipping_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingIsoCodecountry($shippingIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingIsoCodecountry)) {
                $shippingIsoCodecountry = str_replace('*', '%', $shippingIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ISO_CODECOUNTRY, $shippingIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the shipping_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingIsoCodephone('fooValue');   // WHERE shipping_iso_codephone = 'fooValue'
     * $query->filterByShippingIsoCodephone('%fooValue%'); // WHERE shipping_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingIsoCodephone($shippingIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingIsoCodephone)) {
                $shippingIsoCodephone = str_replace('*', '%', $shippingIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ISO_CODEPHONE, $shippingIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the shipping_addressee column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddressee('fooValue');   // WHERE shipping_addressee = 'fooValue'
     * $query->filterByShippingAddressee('%fooValue%'); // WHERE shipping_addressee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddressee The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingAddressee($shippingAddressee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddressee)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingAddressee)) {
                $shippingAddressee = str_replace('*', '%', $shippingAddressee);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ADDRESSEE, $shippingAddressee, $comparison);
    }

    /**
     * Filter the query on the shipping_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddresseeCellular('fooValue');   // WHERE shipping_addressee_cellular = 'fooValue'
     * $query->filterByShippingAddresseeCellular('%fooValue%'); // WHERE shipping_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingAddresseeCellular($shippingAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingAddresseeCellular)) {
                $shippingAddresseeCellular = str_replace('*', '%', $shippingAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ADDRESSEE_CELLULAR, $shippingAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the shipping_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddresseePhone('fooValue');   // WHERE shipping_addressee_phone = 'fooValue'
     * $query->filterByShippingAddresseePhone('%fooValue%'); // WHERE shipping_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingAddresseePhone($shippingAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingAddresseePhone)) {
                $shippingAddresseePhone = str_replace('*', '%', $shippingAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ADDRESSEE_PHONE, $shippingAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the shipping_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingAddress2('fooValue');   // WHERE shipping_address2 = 'fooValue'
     * $query->filterByShippingAddress2('%fooValue%'); // WHERE shipping_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingAddress2($shippingAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingAddress2)) {
                $shippingAddress2 = str_replace('*', '%', $shippingAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ADDRESS2, $shippingAddress2, $comparison);
    }

    /**
     * Filter the query on the shipping_city column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCity('fooValue');   // WHERE shipping_city = 'fooValue'
     * $query->filterByShippingCity('%fooValue%'); // WHERE shipping_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingCity($shippingCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingCity)) {
                $shippingCity = str_replace('*', '%', $shippingCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_CITY, $shippingCity, $comparison);
    }

    /**
     * Filter the query on the shipping_state column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingState('fooValue');   // WHERE shipping_state = 'fooValue'
     * $query->filterByShippingState('%fooValue%'); // WHERE shipping_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingState($shippingState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingState)) {
                $shippingState = str_replace('*', '%', $shippingState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_STATE, $shippingState, $comparison);
    }

    /**
     * Filter the query on the shipping_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingZipcode('fooValue');   // WHERE shipping_zipcode = 'fooValue'
     * $query->filterByShippingZipcode('%fooValue%'); // WHERE shipping_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingZipcode($shippingZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingZipcode)) {
                $shippingZipcode = str_replace('*', '%', $shippingZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_ZIPCODE, $shippingZipcode, $comparison);
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ShippingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(ShippingPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShippingPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
        } else {
            throw new PropelException('filterByOrder() only accepts arguments of type Order or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Order relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function joinOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Order');

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
            $this->addJoinObject($join, 'Order');
        }

        return $this;
    }

    /**
     * Use the Order relation Order object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrderQuery A secondary query class using the current class as primary query
     */
    public function useOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Order', 'OrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Shipping $shipping Object to remove from the list of results
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function prune($shipping = null)
    {
        if ($shipping) {
            $this->addUsingAlias(ShippingPeer::IDSHIPPING, $shipping->getIdshipping(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
