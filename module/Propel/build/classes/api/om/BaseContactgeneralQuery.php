<?php


/**
 * Base class that represents a query for the 'contactgeneral' table.
 *
 *
 *
 * @method ContactgeneralQuery orderByIdcontactgeneral($order = Criteria::ASC) Order by the idcontactgeneral column
 * @method ContactgeneralQuery orderByIdcontactgroup($order = Criteria::ASC) Order by the idcontactgroup column
 * @method ContactgeneralQuery orderByContactgeneralName($order = Criteria::ASC) Order by the contactgeneral_name column
 * @method ContactgeneralQuery orderByContactgeneralIsoCodephone($order = Criteria::ASC) Order by the contactgeneral_iso_codephone column
 * @method ContactgeneralQuery orderByContactgeneralPhone($order = Criteria::ASC) Order by the contactgeneral_phone column
 * @method ContactgeneralQuery orderByContactgeneralEmail($order = Criteria::ASC) Order by the contactgeneral_email column
 * @method ContactgeneralQuery orderByContactgeneralAddress($order = Criteria::ASC) Order by the contactgeneral_address column
 * @method ContactgeneralQuery orderByContactgeneralAddress2($order = Criteria::ASC) Order by the contactgeneral_address2 column
 * @method ContactgeneralQuery orderByContactgeneralCity($order = Criteria::ASC) Order by the contactgeneral_city column
 * @method ContactgeneralQuery orderByContactgeneralStatate($order = Criteria::ASC) Order by the contactgeneral_statate column
 * @method ContactgeneralQuery orderByContactgeneralIsoCodecountry($order = Criteria::ASC) Order by the contactgeneral_iso_codecountry column
 * @method ContactgeneralQuery orderByContactgeneralZipcode($order = Criteria::ASC) Order by the contactgeneral_zipcode column
 * @method ContactgeneralQuery orderByContactgeneralLastupdate($order = Criteria::ASC) Order by the contactgeneral_lastupdate column
 *
 * @method ContactgeneralQuery groupByIdcontactgeneral() Group by the idcontactgeneral column
 * @method ContactgeneralQuery groupByIdcontactgroup() Group by the idcontactgroup column
 * @method ContactgeneralQuery groupByContactgeneralName() Group by the contactgeneral_name column
 * @method ContactgeneralQuery groupByContactgeneralIsoCodephone() Group by the contactgeneral_iso_codephone column
 * @method ContactgeneralQuery groupByContactgeneralPhone() Group by the contactgeneral_phone column
 * @method ContactgeneralQuery groupByContactgeneralEmail() Group by the contactgeneral_email column
 * @method ContactgeneralQuery groupByContactgeneralAddress() Group by the contactgeneral_address column
 * @method ContactgeneralQuery groupByContactgeneralAddress2() Group by the contactgeneral_address2 column
 * @method ContactgeneralQuery groupByContactgeneralCity() Group by the contactgeneral_city column
 * @method ContactgeneralQuery groupByContactgeneralStatate() Group by the contactgeneral_statate column
 * @method ContactgeneralQuery groupByContactgeneralIsoCodecountry() Group by the contactgeneral_iso_codecountry column
 * @method ContactgeneralQuery groupByContactgeneralZipcode() Group by the contactgeneral_zipcode column
 * @method ContactgeneralQuery groupByContactgeneralLastupdate() Group by the contactgeneral_lastupdate column
 *
 * @method ContactgeneralQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContactgeneralQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContactgeneralQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContactgeneralQuery leftJoinContactgroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contactgroup relation
 * @method ContactgeneralQuery rightJoinContactgroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contactgroup relation
 * @method ContactgeneralQuery innerJoinContactgroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Contactgroup relation
 *
 * @method ContactgeneralQuery leftJoinContactparticular($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contactparticular relation
 * @method ContactgeneralQuery rightJoinContactparticular($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contactparticular relation
 * @method ContactgeneralQuery innerJoinContactparticular($relationAlias = null) Adds a INNER JOIN clause to the query using the Contactparticular relation
 *
 * @method Contactgeneral findOne(PropelPDO $con = null) Return the first Contactgeneral matching the query
 * @method Contactgeneral findOneOrCreate(PropelPDO $con = null) Return the first Contactgeneral matching the query, or a new Contactgeneral object populated from the query conditions when no match is found
 *
 * @method Contactgeneral findOneByIdcontactgroup(int $idcontactgroup) Return the first Contactgeneral filtered by the idcontactgroup column
 * @method Contactgeneral findOneByContactgeneralName(string $contactgeneral_name) Return the first Contactgeneral filtered by the contactgeneral_name column
 * @method Contactgeneral findOneByContactgeneralIsoCodephone(string $contactgeneral_iso_codephone) Return the first Contactgeneral filtered by the contactgeneral_iso_codephone column
 * @method Contactgeneral findOneByContactgeneralPhone(string $contactgeneral_phone) Return the first Contactgeneral filtered by the contactgeneral_phone column
 * @method Contactgeneral findOneByContactgeneralEmail(string $contactgeneral_email) Return the first Contactgeneral filtered by the contactgeneral_email column
 * @method Contactgeneral findOneByContactgeneralAddress(string $contactgeneral_address) Return the first Contactgeneral filtered by the contactgeneral_address column
 * @method Contactgeneral findOneByContactgeneralAddress2(string $contactgeneral_address2) Return the first Contactgeneral filtered by the contactgeneral_address2 column
 * @method Contactgeneral findOneByContactgeneralCity(string $contactgeneral_city) Return the first Contactgeneral filtered by the contactgeneral_city column
 * @method Contactgeneral findOneByContactgeneralStatate(string $contactgeneral_statate) Return the first Contactgeneral filtered by the contactgeneral_statate column
 * @method Contactgeneral findOneByContactgeneralIsoCodecountry(string $contactgeneral_iso_codecountry) Return the first Contactgeneral filtered by the contactgeneral_iso_codecountry column
 * @method Contactgeneral findOneByContactgeneralZipcode(string $contactgeneral_zipcode) Return the first Contactgeneral filtered by the contactgeneral_zipcode column
 * @method Contactgeneral findOneByContactgeneralLastupdate(string $contactgeneral_lastupdate) Return the first Contactgeneral filtered by the contactgeneral_lastupdate column
 *
 * @method array findByIdcontactgeneral(int $idcontactgeneral) Return Contactgeneral objects filtered by the idcontactgeneral column
 * @method array findByIdcontactgroup(int $idcontactgroup) Return Contactgeneral objects filtered by the idcontactgroup column
 * @method array findByContactgeneralName(string $contactgeneral_name) Return Contactgeneral objects filtered by the contactgeneral_name column
 * @method array findByContactgeneralIsoCodephone(string $contactgeneral_iso_codephone) Return Contactgeneral objects filtered by the contactgeneral_iso_codephone column
 * @method array findByContactgeneralPhone(string $contactgeneral_phone) Return Contactgeneral objects filtered by the contactgeneral_phone column
 * @method array findByContactgeneralEmail(string $contactgeneral_email) Return Contactgeneral objects filtered by the contactgeneral_email column
 * @method array findByContactgeneralAddress(string $contactgeneral_address) Return Contactgeneral objects filtered by the contactgeneral_address column
 * @method array findByContactgeneralAddress2(string $contactgeneral_address2) Return Contactgeneral objects filtered by the contactgeneral_address2 column
 * @method array findByContactgeneralCity(string $contactgeneral_city) Return Contactgeneral objects filtered by the contactgeneral_city column
 * @method array findByContactgeneralStatate(string $contactgeneral_statate) Return Contactgeneral objects filtered by the contactgeneral_statate column
 * @method array findByContactgeneralIsoCodecountry(string $contactgeneral_iso_codecountry) Return Contactgeneral objects filtered by the contactgeneral_iso_codecountry column
 * @method array findByContactgeneralZipcode(string $contactgeneral_zipcode) Return Contactgeneral objects filtered by the contactgeneral_zipcode column
 * @method array findByContactgeneralLastupdate(string $contactgeneral_lastupdate) Return Contactgeneral objects filtered by the contactgeneral_lastupdate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseContactgeneralQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContactgeneralQuery object.
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
            $modelName = 'Contactgeneral';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactgeneralQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContactgeneralQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactgeneralQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactgeneralQuery) {
            return $criteria;
        }
        $query = new ContactgeneralQuery(null, null, $modelAlias);

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
     * @return   Contactgeneral|Contactgeneral[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactgeneralPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contactgeneral A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcontactgeneral($key, $con = null)
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
     * @return                 Contactgeneral A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcontactgeneral`, `idcontactgroup`, `contactgeneral_name`, `contactgeneral_iso_codephone`, `contactgeneral_phone`, `contactgeneral_email`, `contactgeneral_address`, `contactgeneral_address2`, `contactgeneral_city`, `contactgeneral_statate`, `contactgeneral_iso_codecountry`, `contactgeneral_zipcode`, `contactgeneral_lastupdate` FROM `contactgeneral` WHERE `idcontactgeneral` = :p0';
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
            $obj = new Contactgeneral();
            $obj->hydrate($row);
            ContactgeneralPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contactgeneral|Contactgeneral[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contactgeneral[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcontactgeneral column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcontactgeneral(1234); // WHERE idcontactgeneral = 1234
     * $query->filterByIdcontactgeneral(array(12, 34)); // WHERE idcontactgeneral IN (12, 34)
     * $query->filterByIdcontactgeneral(array('min' => 12)); // WHERE idcontactgeneral >= 12
     * $query->filterByIdcontactgeneral(array('max' => 12)); // WHERE idcontactgeneral <= 12
     * </code>
     *
     * @param     mixed $idcontactgeneral The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByIdcontactgeneral($idcontactgeneral = null, $comparison = null)
    {
        if (is_array($idcontactgeneral)) {
            $useMinMax = false;
            if (isset($idcontactgeneral['min'])) {
                $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $idcontactgeneral['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontactgeneral['max'])) {
                $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $idcontactgeneral['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $idcontactgeneral, $comparison);
    }

    /**
     * Filter the query on the idcontactgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcontactgroup(1234); // WHERE idcontactgroup = 1234
     * $query->filterByIdcontactgroup(array(12, 34)); // WHERE idcontactgroup IN (12, 34)
     * $query->filterByIdcontactgroup(array('min' => 12)); // WHERE idcontactgroup >= 12
     * $query->filterByIdcontactgroup(array('max' => 12)); // WHERE idcontactgroup <= 12
     * </code>
     *
     * @see       filterByContactgroup()
     *
     * @param     mixed $idcontactgroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByIdcontactgroup($idcontactgroup = null, $comparison = null)
    {
        if (is_array($idcontactgroup)) {
            $useMinMax = false;
            if (isset($idcontactgroup['min'])) {
                $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGROUP, $idcontactgroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontactgroup['max'])) {
                $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGROUP, $idcontactgroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGROUP, $idcontactgroup, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralName('fooValue');   // WHERE contactgeneral_name = 'fooValue'
     * $query->filterByContactgeneralName('%fooValue%'); // WHERE contactgeneral_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralName($contactgeneralName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralName)) {
                $contactgeneralName = str_replace('*', '%', $contactgeneralName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_NAME, $contactgeneralName, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralIsoCodephone('fooValue');   // WHERE contactgeneral_iso_codephone = 'fooValue'
     * $query->filterByContactgeneralIsoCodephone('%fooValue%'); // WHERE contactgeneral_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralIsoCodephone($contactgeneralIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralIsoCodephone)) {
                $contactgeneralIsoCodephone = str_replace('*', '%', $contactgeneralIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE, $contactgeneralIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralPhone('fooValue');   // WHERE contactgeneral_phone = 'fooValue'
     * $query->filterByContactgeneralPhone('%fooValue%'); // WHERE contactgeneral_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralPhone($contactgeneralPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralPhone)) {
                $contactgeneralPhone = str_replace('*', '%', $contactgeneralPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_PHONE, $contactgeneralPhone, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_email column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralEmail('fooValue');   // WHERE contactgeneral_email = 'fooValue'
     * $query->filterByContactgeneralEmail('%fooValue%'); // WHERE contactgeneral_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralEmail($contactgeneralEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralEmail)) {
                $contactgeneralEmail = str_replace('*', '%', $contactgeneralEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_EMAIL, $contactgeneralEmail, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_address column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralAddress('fooValue');   // WHERE contactgeneral_address = 'fooValue'
     * $query->filterByContactgeneralAddress('%fooValue%'); // WHERE contactgeneral_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralAddress($contactgeneralAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralAddress)) {
                $contactgeneralAddress = str_replace('*', '%', $contactgeneralAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_ADDRESS, $contactgeneralAddress, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralAddress2('fooValue');   // WHERE contactgeneral_address2 = 'fooValue'
     * $query->filterByContactgeneralAddress2('%fooValue%'); // WHERE contactgeneral_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralAddress2($contactgeneralAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralAddress2)) {
                $contactgeneralAddress2 = str_replace('*', '%', $contactgeneralAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_ADDRESS2, $contactgeneralAddress2, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_city column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralCity('fooValue');   // WHERE contactgeneral_city = 'fooValue'
     * $query->filterByContactgeneralCity('%fooValue%'); // WHERE contactgeneral_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralCity($contactgeneralCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralCity)) {
                $contactgeneralCity = str_replace('*', '%', $contactgeneralCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_CITY, $contactgeneralCity, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_statate column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralStatate('fooValue');   // WHERE contactgeneral_statate = 'fooValue'
     * $query->filterByContactgeneralStatate('%fooValue%'); // WHERE contactgeneral_statate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralStatate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralStatate($contactgeneralStatate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralStatate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralStatate)) {
                $contactgeneralStatate = str_replace('*', '%', $contactgeneralStatate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_STATATE, $contactgeneralStatate, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralIsoCodecountry('fooValue');   // WHERE contactgeneral_iso_codecountry = 'fooValue'
     * $query->filterByContactgeneralIsoCodecountry('%fooValue%'); // WHERE contactgeneral_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralIsoCodecountry($contactgeneralIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralIsoCodecountry)) {
                $contactgeneralIsoCodecountry = str_replace('*', '%', $contactgeneralIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY, $contactgeneralIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralZipcode('fooValue');   // WHERE contactgeneral_zipcode = 'fooValue'
     * $query->filterByContactgeneralZipcode('%fooValue%'); // WHERE contactgeneral_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgeneralZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralZipcode($contactgeneralZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgeneralZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgeneralZipcode)) {
                $contactgeneralZipcode = str_replace('*', '%', $contactgeneralZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_ZIPCODE, $contactgeneralZipcode, $comparison);
    }

    /**
     * Filter the query on the contactgeneral_lastupdate column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgeneralLastupdate('2011-03-14'); // WHERE contactgeneral_lastupdate = '2011-03-14'
     * $query->filterByContactgeneralLastupdate('now'); // WHERE contactgeneral_lastupdate = '2011-03-14'
     * $query->filterByContactgeneralLastupdate(array('max' => 'yesterday')); // WHERE contactgeneral_lastupdate < '2011-03-13'
     * </code>
     *
     * @param     mixed $contactgeneralLastupdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function filterByContactgeneralLastupdate($contactgeneralLastupdate = null, $comparison = null)
    {
        if (is_array($contactgeneralLastupdate)) {
            $useMinMax = false;
            if (isset($contactgeneralLastupdate['min'])) {
                $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE, $contactgeneralLastupdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactgeneralLastupdate['max'])) {
                $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE, $contactgeneralLastupdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE, $contactgeneralLastupdate, $comparison);
    }

    /**
     * Filter the query by a related Contactgroup object
     *
     * @param   Contactgroup|PropelObjectCollection $contactgroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContactgeneralQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContactgroup($contactgroup, $comparison = null)
    {
        if ($contactgroup instanceof Contactgroup) {
            return $this
                ->addUsingAlias(ContactgeneralPeer::IDCONTACTGROUP, $contactgroup->getIdcontactgroup(), $comparison);
        } elseif ($contactgroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactgeneralPeer::IDCONTACTGROUP, $contactgroup->toKeyValue('PrimaryKey', 'Idcontactgroup'), $comparison);
        } else {
            throw new PropelException('filterByContactgroup() only accepts arguments of type Contactgroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contactgroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function joinContactgroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contactgroup');

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
            $this->addJoinObject($join, 'Contactgroup');
        }

        return $this;
    }

    /**
     * Use the Contactgroup relation Contactgroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactgroupQuery A secondary query class using the current class as primary query
     */
    public function useContactgroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactgroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contactgroup', 'ContactgroupQuery');
    }

    /**
     * Filter the query by a related Contactparticular object
     *
     * @param   Contactparticular|PropelObjectCollection $contactparticular  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContactgeneralQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContactparticular($contactparticular, $comparison = null)
    {
        if ($contactparticular instanceof Contactparticular) {
            return $this
                ->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $contactparticular->getIdcontactgeneral(), $comparison);
        } elseif ($contactparticular instanceof PropelObjectCollection) {
            return $this
                ->useContactparticularQuery()
                ->filterByPrimaryKeys($contactparticular->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactparticular() only accepts arguments of type Contactparticular or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contactparticular relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function joinContactparticular($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contactparticular');

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
            $this->addJoinObject($join, 'Contactparticular');
        }

        return $this;
    }

    /**
     * Use the Contactparticular relation Contactparticular object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactparticularQuery A secondary query class using the current class as primary query
     */
    public function useContactparticularQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactparticular($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contactparticular', 'ContactparticularQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Contactgeneral $contactgeneral Object to remove from the list of results
     *
     * @return ContactgeneralQuery The current query, for fluid interface
     */
    public function prune($contactgeneral = null)
    {
        if ($contactgeneral) {
            $this->addUsingAlias(ContactgeneralPeer::IDCONTACTGENERAL, $contactgeneral->getIdcontactgeneral(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
