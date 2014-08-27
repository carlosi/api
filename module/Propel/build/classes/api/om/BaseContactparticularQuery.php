<?php


/**
 * Base class that represents a query for the 'contactparticular' table.
 *
 *
 *
 * @method ContactparticularQuery orderByIdcontactparticular($order = Criteria::ASC) Order by the idcontactparticular column
 * @method ContactparticularQuery orderByIdcontactgeneral($order = Criteria::ASC) Order by the idcontactgeneral column
 * @method ContactparticularQuery orderByContactparticularIsoCodecountry($order = Criteria::ASC) Order by the contactparticular_iso_codecountry column
 * @method ContactparticularQuery orderByContactparticularName($order = Criteria::ASC) Order by the contactparticular_name column
 * @method ContactparticularQuery orderByContactparticularIsoCodephone($order = Criteria::ASC) Order by the contactparticular_iso_codephone column
 * @method ContactparticularQuery orderByContactparticularCellular($order = Criteria::ASC) Order by the contactparticular_cellular column
 * @method ContactparticularQuery orderByContactparticularPhone($order = Criteria::ASC) Order by the contactparticular_phone column
 * @method ContactparticularQuery orderByContactparticularPhoneExtention($order = Criteria::ASC) Order by the contactparticular_phone_extention column
 * @method ContactparticularQuery orderByContactparticularPosition($order = Criteria::ASC) Order by the contactparticular_position column
 * @method ContactparticularQuery orderByContactparticularNote($order = Criteria::ASC) Order by the contactparticular_note column
 * @method ContactparticularQuery orderByContactparticularEmail($order = Criteria::ASC) Order by the contactparticular_email column
 * @method ContactparticularQuery orderByContactparticularEmail2($order = Criteria::ASC) Order by the contactparticular_email2 column
 * @method ContactparticularQuery orderByContactparticularAddress($order = Criteria::ASC) Order by the contactparticular_address column
 * @method ContactparticularQuery orderByContactparticularAddress2($order = Criteria::ASC) Order by the contactparticular_address2 column
 * @method ContactparticularQuery orderByContactparticularCity($order = Criteria::ASC) Order by the contactparticular_city column
 * @method ContactparticularQuery orderByContactparticularState($order = Criteria::ASC) Order by the contactparticular_state column
 * @method ContactparticularQuery orderByContactparticularZipcode($order = Criteria::ASC) Order by the contactparticular_zipcode column
 * @method ContactparticularQuery orderByContactparticularLastupdate($order = Criteria::ASC) Order by the contactparticular_lastupdate column
 *
 * @method ContactparticularQuery groupByIdcontactparticular() Group by the idcontactparticular column
 * @method ContactparticularQuery groupByIdcontactgeneral() Group by the idcontactgeneral column
 * @method ContactparticularQuery groupByContactparticularIsoCodecountry() Group by the contactparticular_iso_codecountry column
 * @method ContactparticularQuery groupByContactparticularName() Group by the contactparticular_name column
 * @method ContactparticularQuery groupByContactparticularIsoCodephone() Group by the contactparticular_iso_codephone column
 * @method ContactparticularQuery groupByContactparticularCellular() Group by the contactparticular_cellular column
 * @method ContactparticularQuery groupByContactparticularPhone() Group by the contactparticular_phone column
 * @method ContactparticularQuery groupByContactparticularPhoneExtention() Group by the contactparticular_phone_extention column
 * @method ContactparticularQuery groupByContactparticularPosition() Group by the contactparticular_position column
 * @method ContactparticularQuery groupByContactparticularNote() Group by the contactparticular_note column
 * @method ContactparticularQuery groupByContactparticularEmail() Group by the contactparticular_email column
 * @method ContactparticularQuery groupByContactparticularEmail2() Group by the contactparticular_email2 column
 * @method ContactparticularQuery groupByContactparticularAddress() Group by the contactparticular_address column
 * @method ContactparticularQuery groupByContactparticularAddress2() Group by the contactparticular_address2 column
 * @method ContactparticularQuery groupByContactparticularCity() Group by the contactparticular_city column
 * @method ContactparticularQuery groupByContactparticularState() Group by the contactparticular_state column
 * @method ContactparticularQuery groupByContactparticularZipcode() Group by the contactparticular_zipcode column
 * @method ContactparticularQuery groupByContactparticularLastupdate() Group by the contactparticular_lastupdate column
 *
 * @method ContactparticularQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContactparticularQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContactparticularQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContactparticularQuery leftJoinContactgeneral($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contactgeneral relation
 * @method ContactparticularQuery rightJoinContactgeneral($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contactgeneral relation
 * @method ContactparticularQuery innerJoinContactgeneral($relationAlias = null) Adds a INNER JOIN clause to the query using the Contactgeneral relation
 *
 * @method Contactparticular findOne(PropelPDO $con = null) Return the first Contactparticular matching the query
 * @method Contactparticular findOneOrCreate(PropelPDO $con = null) Return the first Contactparticular matching the query, or a new Contactparticular object populated from the query conditions when no match is found
 *
 * @method Contactparticular findOneByIdcontactgeneral(int $idcontactgeneral) Return the first Contactparticular filtered by the idcontactgeneral column
 * @method Contactparticular findOneByContactparticularIsoCodecountry(string $contactparticular_iso_codecountry) Return the first Contactparticular filtered by the contactparticular_iso_codecountry column
 * @method Contactparticular findOneByContactparticularName(string $contactparticular_name) Return the first Contactparticular filtered by the contactparticular_name column
 * @method Contactparticular findOneByContactparticularIsoCodephone(string $contactparticular_iso_codephone) Return the first Contactparticular filtered by the contactparticular_iso_codephone column
 * @method Contactparticular findOneByContactparticularCellular(string $contactparticular_cellular) Return the first Contactparticular filtered by the contactparticular_cellular column
 * @method Contactparticular findOneByContactparticularPhone(string $contactparticular_phone) Return the first Contactparticular filtered by the contactparticular_phone column
 * @method Contactparticular findOneByContactparticularPhoneExtention(string $contactparticular_phone_extention) Return the first Contactparticular filtered by the contactparticular_phone_extention column
 * @method Contactparticular findOneByContactparticularPosition(string $contactparticular_position) Return the first Contactparticular filtered by the contactparticular_position column
 * @method Contactparticular findOneByContactparticularNote(string $contactparticular_note) Return the first Contactparticular filtered by the contactparticular_note column
 * @method Contactparticular findOneByContactparticularEmail(string $contactparticular_email) Return the first Contactparticular filtered by the contactparticular_email column
 * @method Contactparticular findOneByContactparticularEmail2(string $contactparticular_email2) Return the first Contactparticular filtered by the contactparticular_email2 column
 * @method Contactparticular findOneByContactparticularAddress(string $contactparticular_address) Return the first Contactparticular filtered by the contactparticular_address column
 * @method Contactparticular findOneByContactparticularAddress2(string $contactparticular_address2) Return the first Contactparticular filtered by the contactparticular_address2 column
 * @method Contactparticular findOneByContactparticularCity(string $contactparticular_city) Return the first Contactparticular filtered by the contactparticular_city column
 * @method Contactparticular findOneByContactparticularState(string $contactparticular_state) Return the first Contactparticular filtered by the contactparticular_state column
 * @method Contactparticular findOneByContactparticularZipcode(string $contactparticular_zipcode) Return the first Contactparticular filtered by the contactparticular_zipcode column
 * @method Contactparticular findOneByContactparticularLastupdate(string $contactparticular_lastupdate) Return the first Contactparticular filtered by the contactparticular_lastupdate column
 *
 * @method array findByIdcontactparticular(int $idcontactparticular) Return Contactparticular objects filtered by the idcontactparticular column
 * @method array findByIdcontactgeneral(int $idcontactgeneral) Return Contactparticular objects filtered by the idcontactgeneral column
 * @method array findByContactparticularIsoCodecountry(string $contactparticular_iso_codecountry) Return Contactparticular objects filtered by the contactparticular_iso_codecountry column
 * @method array findByContactparticularName(string $contactparticular_name) Return Contactparticular objects filtered by the contactparticular_name column
 * @method array findByContactparticularIsoCodephone(string $contactparticular_iso_codephone) Return Contactparticular objects filtered by the contactparticular_iso_codephone column
 * @method array findByContactparticularCellular(string $contactparticular_cellular) Return Contactparticular objects filtered by the contactparticular_cellular column
 * @method array findByContactparticularPhone(string $contactparticular_phone) Return Contactparticular objects filtered by the contactparticular_phone column
 * @method array findByContactparticularPhoneExtention(string $contactparticular_phone_extention) Return Contactparticular objects filtered by the contactparticular_phone_extention column
 * @method array findByContactparticularPosition(string $contactparticular_position) Return Contactparticular objects filtered by the contactparticular_position column
 * @method array findByContactparticularNote(string $contactparticular_note) Return Contactparticular objects filtered by the contactparticular_note column
 * @method array findByContactparticularEmail(string $contactparticular_email) Return Contactparticular objects filtered by the contactparticular_email column
 * @method array findByContactparticularEmail2(string $contactparticular_email2) Return Contactparticular objects filtered by the contactparticular_email2 column
 * @method array findByContactparticularAddress(string $contactparticular_address) Return Contactparticular objects filtered by the contactparticular_address column
 * @method array findByContactparticularAddress2(string $contactparticular_address2) Return Contactparticular objects filtered by the contactparticular_address2 column
 * @method array findByContactparticularCity(string $contactparticular_city) Return Contactparticular objects filtered by the contactparticular_city column
 * @method array findByContactparticularState(string $contactparticular_state) Return Contactparticular objects filtered by the contactparticular_state column
 * @method array findByContactparticularZipcode(string $contactparticular_zipcode) Return Contactparticular objects filtered by the contactparticular_zipcode column
 * @method array findByContactparticularLastupdate(string $contactparticular_lastupdate) Return Contactparticular objects filtered by the contactparticular_lastupdate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseContactparticularQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContactparticularQuery object.
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
            $modelName = 'Contactparticular';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactparticularQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContactparticularQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactparticularQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactparticularQuery) {
            return $criteria;
        }
        $query = new ContactparticularQuery(null, null, $modelAlias);

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
     * @return   Contactparticular|Contactparticular[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactparticularPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contactparticular A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcontactparticular($key, $con = null)
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
     * @return                 Contactparticular A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcontactparticular`, `idcontactgeneral`, `contactparticular_iso_codecountry`, `contactparticular_name`, `contactparticular_iso_codephone`, `contactparticular_cellular`, `contactparticular_phone`, `contactparticular_phone_extention`, `contactparticular_position`, `contactparticular_note`, `contactparticular_email`, `contactparticular_email2`, `contactparticular_address`, `contactparticular_address2`, `contactparticular_city`, `contactparticular_state`, `contactparticular_zipcode`, `contactparticular_lastupdate` FROM `contactparticular` WHERE `idcontactparticular` = :p0';
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
            $obj = new Contactparticular();
            $obj->hydrate($row);
            ContactparticularPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contactparticular|Contactparticular[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contactparticular[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcontactparticular column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcontactparticular(1234); // WHERE idcontactparticular = 1234
     * $query->filterByIdcontactparticular(array(12, 34)); // WHERE idcontactparticular IN (12, 34)
     * $query->filterByIdcontactparticular(array('min' => 12)); // WHERE idcontactparticular >= 12
     * $query->filterByIdcontactparticular(array('max' => 12)); // WHERE idcontactparticular <= 12
     * </code>
     *
     * @param     mixed $idcontactparticular The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByIdcontactparticular($idcontactparticular = null, $comparison = null)
    {
        if (is_array($idcontactparticular)) {
            $useMinMax = false;
            if (isset($idcontactparticular['min'])) {
                $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $idcontactparticular['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontactparticular['max'])) {
                $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $idcontactparticular['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $idcontactparticular, $comparison);
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
     * @see       filterByContactgeneral()
     *
     * @param     mixed $idcontactgeneral The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByIdcontactgeneral($idcontactgeneral = null, $comparison = null)
    {
        if (is_array($idcontactgeneral)) {
            $useMinMax = false;
            if (isset($idcontactgeneral['min'])) {
                $this->addUsingAlias(ContactparticularPeer::IDCONTACTGENERAL, $idcontactgeneral['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontactgeneral['max'])) {
                $this->addUsingAlias(ContactparticularPeer::IDCONTACTGENERAL, $idcontactgeneral['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::IDCONTACTGENERAL, $idcontactgeneral, $comparison);
    }

    /**
     * Filter the query on the contactparticular_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularIsoCodecountry('fooValue');   // WHERE contactparticular_iso_codecountry = 'fooValue'
     * $query->filterByContactparticularIsoCodecountry('%fooValue%'); // WHERE contactparticular_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularIsoCodecountry($contactparticularIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularIsoCodecountry)) {
                $contactparticularIsoCodecountry = str_replace('*', '%', $contactparticularIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY, $contactparticularIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the contactparticular_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularName('fooValue');   // WHERE contactparticular_name = 'fooValue'
     * $query->filterByContactparticularName('%fooValue%'); // WHERE contactparticular_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularName($contactparticularName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularName)) {
                $contactparticularName = str_replace('*', '%', $contactparticularName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_NAME, $contactparticularName, $comparison);
    }

    /**
     * Filter the query on the contactparticular_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularIsoCodephone('fooValue');   // WHERE contactparticular_iso_codephone = 'fooValue'
     * $query->filterByContactparticularIsoCodephone('%fooValue%'); // WHERE contactparticular_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularIsoCodephone($contactparticularIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularIsoCodephone)) {
                $contactparticularIsoCodephone = str_replace('*', '%', $contactparticularIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE, $contactparticularIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the contactparticular_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularCellular('fooValue');   // WHERE contactparticular_cellular = 'fooValue'
     * $query->filterByContactparticularCellular('%fooValue%'); // WHERE contactparticular_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularCellular($contactparticularCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularCellular)) {
                $contactparticularCellular = str_replace('*', '%', $contactparticularCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_CELLULAR, $contactparticularCellular, $comparison);
    }

    /**
     * Filter the query on the contactparticular_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularPhone('fooValue');   // WHERE contactparticular_phone = 'fooValue'
     * $query->filterByContactparticularPhone('%fooValue%'); // WHERE contactparticular_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularPhone($contactparticularPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularPhone)) {
                $contactparticularPhone = str_replace('*', '%', $contactparticularPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_PHONE, $contactparticularPhone, $comparison);
    }

    /**
     * Filter the query on the contactparticular_phone_extention column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularPhoneExtention('fooValue');   // WHERE contactparticular_phone_extention = 'fooValue'
     * $query->filterByContactparticularPhoneExtention('%fooValue%'); // WHERE contactparticular_phone_extention LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularPhoneExtention The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularPhoneExtention($contactparticularPhoneExtention = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularPhoneExtention)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularPhoneExtention)) {
                $contactparticularPhoneExtention = str_replace('*', '%', $contactparticularPhoneExtention);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION, $contactparticularPhoneExtention, $comparison);
    }

    /**
     * Filter the query on the contactparticular_position column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularPosition('fooValue');   // WHERE contactparticular_position = 'fooValue'
     * $query->filterByContactparticularPosition('%fooValue%'); // WHERE contactparticular_position LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularPosition The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularPosition($contactparticularPosition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularPosition)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularPosition)) {
                $contactparticularPosition = str_replace('*', '%', $contactparticularPosition);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_POSITION, $contactparticularPosition, $comparison);
    }

    /**
     * Filter the query on the contactparticular_note column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularNote('fooValue');   // WHERE contactparticular_note = 'fooValue'
     * $query->filterByContactparticularNote('%fooValue%'); // WHERE contactparticular_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularNote($contactparticularNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularNote)) {
                $contactparticularNote = str_replace('*', '%', $contactparticularNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_NOTE, $contactparticularNote, $comparison);
    }

    /**
     * Filter the query on the contactparticular_email column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularEmail('fooValue');   // WHERE contactparticular_email = 'fooValue'
     * $query->filterByContactparticularEmail('%fooValue%'); // WHERE contactparticular_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularEmail($contactparticularEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularEmail)) {
                $contactparticularEmail = str_replace('*', '%', $contactparticularEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_EMAIL, $contactparticularEmail, $comparison);
    }

    /**
     * Filter the query on the contactparticular_email2 column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularEmail2('fooValue');   // WHERE contactparticular_email2 = 'fooValue'
     * $query->filterByContactparticularEmail2('%fooValue%'); // WHERE contactparticular_email2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularEmail2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularEmail2($contactparticularEmail2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularEmail2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularEmail2)) {
                $contactparticularEmail2 = str_replace('*', '%', $contactparticularEmail2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_EMAIL2, $contactparticularEmail2, $comparison);
    }

    /**
     * Filter the query on the contactparticular_address column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularAddress('fooValue');   // WHERE contactparticular_address = 'fooValue'
     * $query->filterByContactparticularAddress('%fooValue%'); // WHERE contactparticular_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularAddress($contactparticularAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularAddress)) {
                $contactparticularAddress = str_replace('*', '%', $contactparticularAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS, $contactparticularAddress, $comparison);
    }

    /**
     * Filter the query on the contactparticular_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularAddress2('fooValue');   // WHERE contactparticular_address2 = 'fooValue'
     * $query->filterByContactparticularAddress2('%fooValue%'); // WHERE contactparticular_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularAddress2($contactparticularAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularAddress2)) {
                $contactparticularAddress2 = str_replace('*', '%', $contactparticularAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2, $contactparticularAddress2, $comparison);
    }

    /**
     * Filter the query on the contactparticular_city column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularCity('fooValue');   // WHERE contactparticular_city = 'fooValue'
     * $query->filterByContactparticularCity('%fooValue%'); // WHERE contactparticular_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularCity($contactparticularCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularCity)) {
                $contactparticularCity = str_replace('*', '%', $contactparticularCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_CITY, $contactparticularCity, $comparison);
    }

    /**
     * Filter the query on the contactparticular_state column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularState('fooValue');   // WHERE contactparticular_state = 'fooValue'
     * $query->filterByContactparticularState('%fooValue%'); // WHERE contactparticular_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularState($contactparticularState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularState)) {
                $contactparticularState = str_replace('*', '%', $contactparticularState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_STATE, $contactparticularState, $comparison);
    }

    /**
     * Filter the query on the contactparticular_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularZipcode('fooValue');   // WHERE contactparticular_zipcode = 'fooValue'
     * $query->filterByContactparticularZipcode('%fooValue%'); // WHERE contactparticular_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactparticularZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularZipcode($contactparticularZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactparticularZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactparticularZipcode)) {
                $contactparticularZipcode = str_replace('*', '%', $contactparticularZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE, $contactparticularZipcode, $comparison);
    }

    /**
     * Filter the query on the contactparticular_lastupdate column
     *
     * Example usage:
     * <code>
     * $query->filterByContactparticularLastupdate('2011-03-14'); // WHERE contactparticular_lastupdate = '2011-03-14'
     * $query->filterByContactparticularLastupdate('now'); // WHERE contactparticular_lastupdate = '2011-03-14'
     * $query->filterByContactparticularLastupdate(array('max' => 'yesterday')); // WHERE contactparticular_lastupdate < '2011-03-13'
     * </code>
     *
     * @param     mixed $contactparticularLastupdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function filterByContactparticularLastupdate($contactparticularLastupdate = null, $comparison = null)
    {
        if (is_array($contactparticularLastupdate)) {
            $useMinMax = false;
            if (isset($contactparticularLastupdate['min'])) {
                $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE, $contactparticularLastupdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactparticularLastupdate['max'])) {
                $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE, $contactparticularLastupdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE, $contactparticularLastupdate, $comparison);
    }

    /**
     * Filter the query by a related Contactgeneral object
     *
     * @param   Contactgeneral|PropelObjectCollection $contactgeneral The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContactparticularQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContactgeneral($contactgeneral, $comparison = null)
    {
        if ($contactgeneral instanceof Contactgeneral) {
            return $this
                ->addUsingAlias(ContactparticularPeer::IDCONTACTGENERAL, $contactgeneral->getIdcontactgeneral(), $comparison);
        } elseif ($contactgeneral instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactparticularPeer::IDCONTACTGENERAL, $contactgeneral->toKeyValue('PrimaryKey', 'Idcontactgeneral'), $comparison);
        } else {
            throw new PropelException('filterByContactgeneral() only accepts arguments of type Contactgeneral or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contactgeneral relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function joinContactgeneral($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contactgeneral');

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
            $this->addJoinObject($join, 'Contactgeneral');
        }

        return $this;
    }

    /**
     * Use the Contactgeneral relation Contactgeneral object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactgeneralQuery A secondary query class using the current class as primary query
     */
    public function useContactgeneralQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactgeneral($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contactgeneral', 'ContactgeneralQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Contactparticular $contactparticular Object to remove from the list of results
     *
     * @return ContactparticularQuery The current query, for fluid interface
     */
    public function prune($contactparticular = null)
    {
        if ($contactparticular) {
            $this->addUsingAlias(ContactparticularPeer::IDCONTACTPARTICULAR, $contactparticular->getIdcontactparticular(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
