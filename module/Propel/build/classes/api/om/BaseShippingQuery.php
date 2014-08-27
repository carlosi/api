<?php


/**
 * Base class that represents a query for the 'shipping' table.
 *
 *
 *
 * @method ShippingQuery orderByIdshipping($order = Criteria::ASC) Order by the idshipping column
 * @method ShippingQuery orderByShippingTracking($order = Criteria::ASC) Order by the shipping_tracking column
 * @method ShippingQuery orderByTransportCompany($order = Criteria::ASC) Order by the transport_company column
 * @method ShippingQuery orderByShippingDate($order = Criteria::ASC) Order by the shipping_date column
 * @method ShippingQuery orderByShippingDatecompromise($order = Criteria::ASC) Order by the shipping_datecompromise column
 * @method ShippingQuery orderByShippingDaterealdelivery($order = Criteria::ASC) Order by the shipping_daterealdelivery column
 * @method ShippingQuery orderByShippingStatus($order = Criteria::ASC) Order by the shipping_status column
 * @method ShippingQuery orderBySenderIsoCodecountry($order = Criteria::ASC) Order by the sender_iso_codecountry column
 * @method ShippingQuery orderBySenderIsoCodephone($order = Criteria::ASC) Order by the sender_iso_codephone column
 * @method ShippingQuery orderBySenderName($order = Criteria::ASC) Order by the sender_name column
 * @method ShippingQuery orderBySenderAddresseeCellular($order = Criteria::ASC) Order by the sender_addressee_cellular column
 * @method ShippingQuery orderBySenderAddresseePhone($order = Criteria::ASC) Order by the sender_addressee_phone column
 * @method ShippingQuery orderBySenderAddress($order = Criteria::ASC) Order by the sender_address column
 * @method ShippingQuery orderBySenderAddress2($order = Criteria::ASC) Order by the sender_address2 column
 * @method ShippingQuery orderBySenderCity($order = Criteria::ASC) Order by the sender_city column
 * @method ShippingQuery orderBySenderState($order = Criteria::ASC) Order by the sender_state column
 * @method ShippingQuery orderBySenderZipcode($order = Criteria::ASC) Order by the sender_zipcode column
 * @method ShippingQuery orderByAddresseeIsoCodecountry($order = Criteria::ASC) Order by the addressee_iso_codecountry column
 * @method ShippingQuery orderByAddresseeIsoCodephone($order = Criteria::ASC) Order by the addressee_iso_codephone column
 * @method ShippingQuery orderByAddresseeName($order = Criteria::ASC) Order by the addressee_name column
 * @method ShippingQuery orderByAddresseeAddresseeCellular($order = Criteria::ASC) Order by the addressee_addressee_cellular column
 * @method ShippingQuery orderByAddresseeAddresseePhone($order = Criteria::ASC) Order by the addressee_addressee_phone column
 * @method ShippingQuery orderByAddresseeAddress($order = Criteria::ASC) Order by the addressee_address column
 * @method ShippingQuery orderByAddresseeAddress2($order = Criteria::ASC) Order by the addressee_address2 column
 * @method ShippingQuery orderByAddresseeCity($order = Criteria::ASC) Order by the addressee_city column
 * @method ShippingQuery orderByAddresseeState($order = Criteria::ASC) Order by the addressee_state column
 * @method ShippingQuery orderByAddresseeZipcode($order = Criteria::ASC) Order by the addressee_zipcode column
 *
 * @method ShippingQuery groupByIdshipping() Group by the idshipping column
 * @method ShippingQuery groupByShippingTracking() Group by the shipping_tracking column
 * @method ShippingQuery groupByTransportCompany() Group by the transport_company column
 * @method ShippingQuery groupByShippingDate() Group by the shipping_date column
 * @method ShippingQuery groupByShippingDatecompromise() Group by the shipping_datecompromise column
 * @method ShippingQuery groupByShippingDaterealdelivery() Group by the shipping_daterealdelivery column
 * @method ShippingQuery groupByShippingStatus() Group by the shipping_status column
 * @method ShippingQuery groupBySenderIsoCodecountry() Group by the sender_iso_codecountry column
 * @method ShippingQuery groupBySenderIsoCodephone() Group by the sender_iso_codephone column
 * @method ShippingQuery groupBySenderName() Group by the sender_name column
 * @method ShippingQuery groupBySenderAddresseeCellular() Group by the sender_addressee_cellular column
 * @method ShippingQuery groupBySenderAddresseePhone() Group by the sender_addressee_phone column
 * @method ShippingQuery groupBySenderAddress() Group by the sender_address column
 * @method ShippingQuery groupBySenderAddress2() Group by the sender_address2 column
 * @method ShippingQuery groupBySenderCity() Group by the sender_city column
 * @method ShippingQuery groupBySenderState() Group by the sender_state column
 * @method ShippingQuery groupBySenderZipcode() Group by the sender_zipcode column
 * @method ShippingQuery groupByAddresseeIsoCodecountry() Group by the addressee_iso_codecountry column
 * @method ShippingQuery groupByAddresseeIsoCodephone() Group by the addressee_iso_codephone column
 * @method ShippingQuery groupByAddresseeName() Group by the addressee_name column
 * @method ShippingQuery groupByAddresseeAddresseeCellular() Group by the addressee_addressee_cellular column
 * @method ShippingQuery groupByAddresseeAddresseePhone() Group by the addressee_addressee_phone column
 * @method ShippingQuery groupByAddresseeAddress() Group by the addressee_address column
 * @method ShippingQuery groupByAddresseeAddress2() Group by the addressee_address2 column
 * @method ShippingQuery groupByAddresseeCity() Group by the addressee_city column
 * @method ShippingQuery groupByAddresseeState() Group by the addressee_state column
 * @method ShippingQuery groupByAddresseeZipcode() Group by the addressee_zipcode column
 *
 * @method ShippingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ShippingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ShippingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ShippingQuery leftJoinOrdershipping($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ordershipping relation
 * @method ShippingQuery rightJoinOrdershipping($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ordershipping relation
 * @method ShippingQuery innerJoinOrdershipping($relationAlias = null) Adds a INNER JOIN clause to the query using the Ordershipping relation
 *
 * @method ShippingQuery leftJoinShippingHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShippingHistory relation
 * @method ShippingQuery rightJoinShippingHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShippingHistory relation
 * @method ShippingQuery innerJoinShippingHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the ShippingHistory relation
 *
 * @method Shipping findOne(PropelPDO $con = null) Return the first Shipping matching the query
 * @method Shipping findOneOrCreate(PropelPDO $con = null) Return the first Shipping matching the query, or a new Shipping object populated from the query conditions when no match is found
 *
 * @method Shipping findOneByShippingTracking(string $shipping_tracking) Return the first Shipping filtered by the shipping_tracking column
 * @method Shipping findOneByTransportCompany(string $transport_company) Return the first Shipping filtered by the transport_company column
 * @method Shipping findOneByShippingDate(string $shipping_date) Return the first Shipping filtered by the shipping_date column
 * @method Shipping findOneByShippingDatecompromise(string $shipping_datecompromise) Return the first Shipping filtered by the shipping_datecompromise column
 * @method Shipping findOneByShippingDaterealdelivery(string $shipping_daterealdelivery) Return the first Shipping filtered by the shipping_daterealdelivery column
 * @method Shipping findOneByShippingStatus(string $shipping_status) Return the first Shipping filtered by the shipping_status column
 * @method Shipping findOneBySenderIsoCodecountry(string $sender_iso_codecountry) Return the first Shipping filtered by the sender_iso_codecountry column
 * @method Shipping findOneBySenderIsoCodephone(string $sender_iso_codephone) Return the first Shipping filtered by the sender_iso_codephone column
 * @method Shipping findOneBySenderName(string $sender_name) Return the first Shipping filtered by the sender_name column
 * @method Shipping findOneBySenderAddresseeCellular(string $sender_addressee_cellular) Return the first Shipping filtered by the sender_addressee_cellular column
 * @method Shipping findOneBySenderAddresseePhone(string $sender_addressee_phone) Return the first Shipping filtered by the sender_addressee_phone column
 * @method Shipping findOneBySenderAddress(string $sender_address) Return the first Shipping filtered by the sender_address column
 * @method Shipping findOneBySenderAddress2(string $sender_address2) Return the first Shipping filtered by the sender_address2 column
 * @method Shipping findOneBySenderCity(string $sender_city) Return the first Shipping filtered by the sender_city column
 * @method Shipping findOneBySenderState(string $sender_state) Return the first Shipping filtered by the sender_state column
 * @method Shipping findOneBySenderZipcode(string $sender_zipcode) Return the first Shipping filtered by the sender_zipcode column
 * @method Shipping findOneByAddresseeIsoCodecountry(string $addressee_iso_codecountry) Return the first Shipping filtered by the addressee_iso_codecountry column
 * @method Shipping findOneByAddresseeIsoCodephone(string $addressee_iso_codephone) Return the first Shipping filtered by the addressee_iso_codephone column
 * @method Shipping findOneByAddresseeName(string $addressee_name) Return the first Shipping filtered by the addressee_name column
 * @method Shipping findOneByAddresseeAddresseeCellular(string $addressee_addressee_cellular) Return the first Shipping filtered by the addressee_addressee_cellular column
 * @method Shipping findOneByAddresseeAddresseePhone(string $addressee_addressee_phone) Return the first Shipping filtered by the addressee_addressee_phone column
 * @method Shipping findOneByAddresseeAddress(string $addressee_address) Return the first Shipping filtered by the addressee_address column
 * @method Shipping findOneByAddresseeAddress2(string $addressee_address2) Return the first Shipping filtered by the addressee_address2 column
 * @method Shipping findOneByAddresseeCity(string $addressee_city) Return the first Shipping filtered by the addressee_city column
 * @method Shipping findOneByAddresseeState(string $addressee_state) Return the first Shipping filtered by the addressee_state column
 * @method Shipping findOneByAddresseeZipcode(string $addressee_zipcode) Return the first Shipping filtered by the addressee_zipcode column
 *
 * @method array findByIdshipping(int $idshipping) Return Shipping objects filtered by the idshipping column
 * @method array findByShippingTracking(string $shipping_tracking) Return Shipping objects filtered by the shipping_tracking column
 * @method array findByTransportCompany(string $transport_company) Return Shipping objects filtered by the transport_company column
 * @method array findByShippingDate(string $shipping_date) Return Shipping objects filtered by the shipping_date column
 * @method array findByShippingDatecompromise(string $shipping_datecompromise) Return Shipping objects filtered by the shipping_datecompromise column
 * @method array findByShippingDaterealdelivery(string $shipping_daterealdelivery) Return Shipping objects filtered by the shipping_daterealdelivery column
 * @method array findByShippingStatus(string $shipping_status) Return Shipping objects filtered by the shipping_status column
 * @method array findBySenderIsoCodecountry(string $sender_iso_codecountry) Return Shipping objects filtered by the sender_iso_codecountry column
 * @method array findBySenderIsoCodephone(string $sender_iso_codephone) Return Shipping objects filtered by the sender_iso_codephone column
 * @method array findBySenderName(string $sender_name) Return Shipping objects filtered by the sender_name column
 * @method array findBySenderAddresseeCellular(string $sender_addressee_cellular) Return Shipping objects filtered by the sender_addressee_cellular column
 * @method array findBySenderAddresseePhone(string $sender_addressee_phone) Return Shipping objects filtered by the sender_addressee_phone column
 * @method array findBySenderAddress(string $sender_address) Return Shipping objects filtered by the sender_address column
 * @method array findBySenderAddress2(string $sender_address2) Return Shipping objects filtered by the sender_address2 column
 * @method array findBySenderCity(string $sender_city) Return Shipping objects filtered by the sender_city column
 * @method array findBySenderState(string $sender_state) Return Shipping objects filtered by the sender_state column
 * @method array findBySenderZipcode(string $sender_zipcode) Return Shipping objects filtered by the sender_zipcode column
 * @method array findByAddresseeIsoCodecountry(string $addressee_iso_codecountry) Return Shipping objects filtered by the addressee_iso_codecountry column
 * @method array findByAddresseeIsoCodephone(string $addressee_iso_codephone) Return Shipping objects filtered by the addressee_iso_codephone column
 * @method array findByAddresseeName(string $addressee_name) Return Shipping objects filtered by the addressee_name column
 * @method array findByAddresseeAddresseeCellular(string $addressee_addressee_cellular) Return Shipping objects filtered by the addressee_addressee_cellular column
 * @method array findByAddresseeAddresseePhone(string $addressee_addressee_phone) Return Shipping objects filtered by the addressee_addressee_phone column
 * @method array findByAddresseeAddress(string $addressee_address) Return Shipping objects filtered by the addressee_address column
 * @method array findByAddresseeAddress2(string $addressee_address2) Return Shipping objects filtered by the addressee_address2 column
 * @method array findByAddresseeCity(string $addressee_city) Return Shipping objects filtered by the addressee_city column
 * @method array findByAddresseeState(string $addressee_state) Return Shipping objects filtered by the addressee_state column
 * @method array findByAddresseeZipcode(string $addressee_zipcode) Return Shipping objects filtered by the addressee_zipcode column
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
        $sql = 'SELECT `idshipping`, `shipping_tracking`, `transport_company`, `shipping_date`, `shipping_datecompromise`, `shipping_daterealdelivery`, `shipping_status`, `sender_iso_codecountry`, `sender_iso_codephone`, `sender_name`, `sender_addressee_cellular`, `sender_addressee_phone`, `sender_address`, `sender_address2`, `sender_city`, `sender_state`, `sender_zipcode`, `addressee_iso_codecountry`, `addressee_iso_codephone`, `addressee_name`, `addressee_addressee_cellular`, `addressee_addressee_phone`, `addressee_address`, `addressee_address2`, `addressee_city`, `addressee_state`, `addressee_zipcode` FROM `shipping` WHERE `idshipping` = :p0';
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
     * Filter the query on the shipping_status column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingStatus('fooValue');   // WHERE shipping_status = 'fooValue'
     * $query->filterByShippingStatus('%fooValue%'); // WHERE shipping_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByShippingStatus($shippingStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shippingStatus)) {
                $shippingStatus = str_replace('*', '%', $shippingStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SHIPPING_STATUS, $shippingStatus, $comparison);
    }

    /**
     * Filter the query on the sender_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderIsoCodecountry('fooValue');   // WHERE sender_iso_codecountry = 'fooValue'
     * $query->filterBySenderIsoCodecountry('%fooValue%'); // WHERE sender_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderIsoCodecountry($senderIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderIsoCodecountry)) {
                $senderIsoCodecountry = str_replace('*', '%', $senderIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ISO_CODECOUNTRY, $senderIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the sender_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderIsoCodephone('fooValue');   // WHERE sender_iso_codephone = 'fooValue'
     * $query->filterBySenderIsoCodephone('%fooValue%'); // WHERE sender_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderIsoCodephone($senderIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderIsoCodephone)) {
                $senderIsoCodephone = str_replace('*', '%', $senderIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ISO_CODEPHONE, $senderIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the sender_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderName('fooValue');   // WHERE sender_name = 'fooValue'
     * $query->filterBySenderName('%fooValue%'); // WHERE sender_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderName($senderName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderName)) {
                $senderName = str_replace('*', '%', $senderName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_NAME, $senderName, $comparison);
    }

    /**
     * Filter the query on the sender_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderAddresseeCellular('fooValue');   // WHERE sender_addressee_cellular = 'fooValue'
     * $query->filterBySenderAddresseeCellular('%fooValue%'); // WHERE sender_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderAddresseeCellular($senderAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderAddresseeCellular)) {
                $senderAddresseeCellular = str_replace('*', '%', $senderAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ADDRESSEE_CELLULAR, $senderAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the sender_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderAddresseePhone('fooValue');   // WHERE sender_addressee_phone = 'fooValue'
     * $query->filterBySenderAddresseePhone('%fooValue%'); // WHERE sender_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderAddresseePhone($senderAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderAddresseePhone)) {
                $senderAddresseePhone = str_replace('*', '%', $senderAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ADDRESSEE_PHONE, $senderAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the sender_address column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderAddress('fooValue');   // WHERE sender_address = 'fooValue'
     * $query->filterBySenderAddress('%fooValue%'); // WHERE sender_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderAddress($senderAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderAddress)) {
                $senderAddress = str_replace('*', '%', $senderAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ADDRESS, $senderAddress, $comparison);
    }

    /**
     * Filter the query on the sender_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderAddress2('fooValue');   // WHERE sender_address2 = 'fooValue'
     * $query->filterBySenderAddress2('%fooValue%'); // WHERE sender_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderAddress2($senderAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderAddress2)) {
                $senderAddress2 = str_replace('*', '%', $senderAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ADDRESS2, $senderAddress2, $comparison);
    }

    /**
     * Filter the query on the sender_city column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderCity('fooValue');   // WHERE sender_city = 'fooValue'
     * $query->filterBySenderCity('%fooValue%'); // WHERE sender_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderCity($senderCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderCity)) {
                $senderCity = str_replace('*', '%', $senderCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_CITY, $senderCity, $comparison);
    }

    /**
     * Filter the query on the sender_state column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderState('fooValue');   // WHERE sender_state = 'fooValue'
     * $query->filterBySenderState('%fooValue%'); // WHERE sender_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderState($senderState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderState)) {
                $senderState = str_replace('*', '%', $senderState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_STATE, $senderState, $comparison);
    }

    /**
     * Filter the query on the sender_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderZipcode('fooValue');   // WHERE sender_zipcode = 'fooValue'
     * $query->filterBySenderZipcode('%fooValue%'); // WHERE sender_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterBySenderZipcode($senderZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderZipcode)) {
                $senderZipcode = str_replace('*', '%', $senderZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::SENDER_ZIPCODE, $senderZipcode, $comparison);
    }

    /**
     * Filter the query on the addressee_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeIsoCodecountry('fooValue');   // WHERE addressee_iso_codecountry = 'fooValue'
     * $query->filterByAddresseeIsoCodecountry('%fooValue%'); // WHERE addressee_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeIsoCodecountry($addresseeIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeIsoCodecountry)) {
                $addresseeIsoCodecountry = str_replace('*', '%', $addresseeIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY, $addresseeIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the addressee_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeIsoCodephone('fooValue');   // WHERE addressee_iso_codephone = 'fooValue'
     * $query->filterByAddresseeIsoCodephone('%fooValue%'); // WHERE addressee_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeIsoCodephone($addresseeIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeIsoCodephone)) {
                $addresseeIsoCodephone = str_replace('*', '%', $addresseeIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ISO_CODEPHONE, $addresseeIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the addressee_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeName('fooValue');   // WHERE addressee_name = 'fooValue'
     * $query->filterByAddresseeName('%fooValue%'); // WHERE addressee_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeName($addresseeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeName)) {
                $addresseeName = str_replace('*', '%', $addresseeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_NAME, $addresseeName, $comparison);
    }

    /**
     * Filter the query on the addressee_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeAddresseeCellular('fooValue');   // WHERE addressee_addressee_cellular = 'fooValue'
     * $query->filterByAddresseeAddresseeCellular('%fooValue%'); // WHERE addressee_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeAddresseeCellular($addresseeAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeAddresseeCellular)) {
                $addresseeAddresseeCellular = str_replace('*', '%', $addresseeAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR, $addresseeAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the addressee_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeAddresseePhone('fooValue');   // WHERE addressee_addressee_phone = 'fooValue'
     * $query->filterByAddresseeAddresseePhone('%fooValue%'); // WHERE addressee_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeAddresseePhone($addresseeAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeAddresseePhone)) {
                $addresseeAddresseePhone = str_replace('*', '%', $addresseeAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE, $addresseeAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the addressee_address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeAddress('fooValue');   // WHERE addressee_address = 'fooValue'
     * $query->filterByAddresseeAddress('%fooValue%'); // WHERE addressee_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeAddress($addresseeAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeAddress)) {
                $addresseeAddress = str_replace('*', '%', $addresseeAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ADDRESS, $addresseeAddress, $comparison);
    }

    /**
     * Filter the query on the addressee_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeAddress2('fooValue');   // WHERE addressee_address2 = 'fooValue'
     * $query->filterByAddresseeAddress2('%fooValue%'); // WHERE addressee_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeAddress2($addresseeAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeAddress2)) {
                $addresseeAddress2 = str_replace('*', '%', $addresseeAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ADDRESS2, $addresseeAddress2, $comparison);
    }

    /**
     * Filter the query on the addressee_city column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeCity('fooValue');   // WHERE addressee_city = 'fooValue'
     * $query->filterByAddresseeCity('%fooValue%'); // WHERE addressee_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeCity($addresseeCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeCity)) {
                $addresseeCity = str_replace('*', '%', $addresseeCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_CITY, $addresseeCity, $comparison);
    }

    /**
     * Filter the query on the addressee_state column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeState('fooValue');   // WHERE addressee_state = 'fooValue'
     * $query->filterByAddresseeState('%fooValue%'); // WHERE addressee_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeState($addresseeState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeState)) {
                $addresseeState = str_replace('*', '%', $addresseeState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_STATE, $addresseeState, $comparison);
    }

    /**
     * Filter the query on the addressee_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByAddresseeZipcode('fooValue');   // WHERE addressee_zipcode = 'fooValue'
     * $query->filterByAddresseeZipcode('%fooValue%'); // WHERE addressee_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addresseeZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function filterByAddresseeZipcode($addresseeZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addresseeZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addresseeZipcode)) {
                $addresseeZipcode = str_replace('*', '%', $addresseeZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ShippingPeer::ADDRESSEE_ZIPCODE, $addresseeZipcode, $comparison);
    }

    /**
     * Filter the query by a related Ordershipping object
     *
     * @param   Ordershipping|PropelObjectCollection $ordershipping  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ShippingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrdershipping($ordershipping, $comparison = null)
    {
        if ($ordershipping instanceof Ordershipping) {
            return $this
                ->addUsingAlias(ShippingPeer::IDSHIPPING, $ordershipping->getIdshipping(), $comparison);
        } elseif ($ordershipping instanceof PropelObjectCollection) {
            return $this
                ->useOrdershippingQuery()
                ->filterByPrimaryKeys($ordershipping->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrdershipping() only accepts arguments of type Ordershipping or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ordershipping relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function joinOrdershipping($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ordershipping');

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
            $this->addJoinObject($join, 'Ordershipping');
        }

        return $this;
    }

    /**
     * Use the Ordershipping relation Ordershipping object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OrdershippingQuery A secondary query class using the current class as primary query
     */
    public function useOrdershippingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrdershipping($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ordershipping', 'OrdershippingQuery');
    }

    /**
     * Filter the query by a related ShippingHistory object
     *
     * @param   ShippingHistory|PropelObjectCollection $shippingHistory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ShippingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByShippingHistory($shippingHistory, $comparison = null)
    {
        if ($shippingHistory instanceof ShippingHistory) {
            return $this
                ->addUsingAlias(ShippingPeer::IDSHIPPING, $shippingHistory->getIdshipping(), $comparison);
        } elseif ($shippingHistory instanceof PropelObjectCollection) {
            return $this
                ->useShippingHistoryQuery()
                ->filterByPrimaryKeys($shippingHistory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShippingHistory() only accepts arguments of type ShippingHistory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShippingHistory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ShippingQuery The current query, for fluid interface
     */
    public function joinShippingHistory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShippingHistory');

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
            $this->addJoinObject($join, 'ShippingHistory');
        }

        return $this;
    }

    /**
     * Use the ShippingHistory relation ShippingHistory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ShippingHistoryQuery A secondary query class using the current class as primary query
     */
    public function useShippingHistoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShippingHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShippingHistory', 'ShippingHistoryQuery');
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
