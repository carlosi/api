<?php


/**
 * Base class that represents a query for the 'clientaddress' table.
 *
 *
 *
 * @method ClientaddressQuery orderByIdclientaddress($order = Criteria::ASC) Order by the idclientaddress column
 * @method ClientaddressQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClientaddressQuery orderByClientaddressIsoCodecountry($order = Criteria::ASC) Order by the clientaddress_iso_codecountry column
 * @method ClientaddressQuery orderByClientaddressIsoCodephone($order = Criteria::ASC) Order by the clientaddress_iso_codephone column
 * @method ClientaddressQuery orderByClientaddressAddressee($order = Criteria::ASC) Order by the clientaddress_addressee column
 * @method ClientaddressQuery orderByClientaddressAddresseeCellular($order = Criteria::ASC) Order by the clientaddress_addressee_cellular column
 * @method ClientaddressQuery orderByClientaddressAddresseePhone($order = Criteria::ASC) Order by the clientaddress_addressee_phone column
 * @method ClientaddressQuery orderByClientaddressAddress($order = Criteria::ASC) Order by the clientaddress_address column
 * @method ClientaddressQuery orderByClientaddressAddress2($order = Criteria::ASC) Order by the clientaddress_address2 column
 * @method ClientaddressQuery orderByClientaddressCity($order = Criteria::ASC) Order by the clientaddress_city column
 * @method ClientaddressQuery orderByClientaddressState($order = Criteria::ASC) Order by the clientaddress_state column
 * @method ClientaddressQuery orderByClientaddressZipcode($order = Criteria::ASC) Order by the clientaddress_zipcode column
 *
 * @method ClientaddressQuery groupByIdclientaddress() Group by the idclientaddress column
 * @method ClientaddressQuery groupByIdclient() Group by the idclient column
 * @method ClientaddressQuery groupByClientaddressIsoCodecountry() Group by the clientaddress_iso_codecountry column
 * @method ClientaddressQuery groupByClientaddressIsoCodephone() Group by the clientaddress_iso_codephone column
 * @method ClientaddressQuery groupByClientaddressAddressee() Group by the clientaddress_addressee column
 * @method ClientaddressQuery groupByClientaddressAddresseeCellular() Group by the clientaddress_addressee_cellular column
 * @method ClientaddressQuery groupByClientaddressAddresseePhone() Group by the clientaddress_addressee_phone column
 * @method ClientaddressQuery groupByClientaddressAddress() Group by the clientaddress_address column
 * @method ClientaddressQuery groupByClientaddressAddress2() Group by the clientaddress_address2 column
 * @method ClientaddressQuery groupByClientaddressCity() Group by the clientaddress_city column
 * @method ClientaddressQuery groupByClientaddressState() Group by the clientaddress_state column
 * @method ClientaddressQuery groupByClientaddressZipcode() Group by the clientaddress_zipcode column
 *
 * @method ClientaddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientaddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientaddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientaddressQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClientaddressQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClientaddressQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Clientaddress findOne(PropelPDO $con = null) Return the first Clientaddress matching the query
 * @method Clientaddress findOneOrCreate(PropelPDO $con = null) Return the first Clientaddress matching the query, or a new Clientaddress object populated from the query conditions when no match is found
 *
 * @method Clientaddress findOneByIdclient(int $idclient) Return the first Clientaddress filtered by the idclient column
 * @method Clientaddress findOneByClientaddressIsoCodecountry(string $clientaddress_iso_codecountry) Return the first Clientaddress filtered by the clientaddress_iso_codecountry column
 * @method Clientaddress findOneByClientaddressIsoCodephone(string $clientaddress_iso_codephone) Return the first Clientaddress filtered by the clientaddress_iso_codephone column
 * @method Clientaddress findOneByClientaddressAddressee(string $clientaddress_addressee) Return the first Clientaddress filtered by the clientaddress_addressee column
 * @method Clientaddress findOneByClientaddressAddresseeCellular(string $clientaddress_addressee_cellular) Return the first Clientaddress filtered by the clientaddress_addressee_cellular column
 * @method Clientaddress findOneByClientaddressAddresseePhone(string $clientaddress_addressee_phone) Return the first Clientaddress filtered by the clientaddress_addressee_phone column
 * @method Clientaddress findOneByClientaddressAddress(string $clientaddress_address) Return the first Clientaddress filtered by the clientaddress_address column
 * @method Clientaddress findOneByClientaddressAddress2(string $clientaddress_address2) Return the first Clientaddress filtered by the clientaddress_address2 column
 * @method Clientaddress findOneByClientaddressCity(string $clientaddress_city) Return the first Clientaddress filtered by the clientaddress_city column
 * @method Clientaddress findOneByClientaddressState(string $clientaddress_state) Return the first Clientaddress filtered by the clientaddress_state column
 * @method Clientaddress findOneByClientaddressZipcode(string $clientaddress_zipcode) Return the first Clientaddress filtered by the clientaddress_zipcode column
 *
 * @method array findByIdclientaddress(int $idclientaddress) Return Clientaddress objects filtered by the idclientaddress column
 * @method array findByIdclient(int $idclient) Return Clientaddress objects filtered by the idclient column
 * @method array findByClientaddressIsoCodecountry(string $clientaddress_iso_codecountry) Return Clientaddress objects filtered by the clientaddress_iso_codecountry column
 * @method array findByClientaddressIsoCodephone(string $clientaddress_iso_codephone) Return Clientaddress objects filtered by the clientaddress_iso_codephone column
 * @method array findByClientaddressAddressee(string $clientaddress_addressee) Return Clientaddress objects filtered by the clientaddress_addressee column
 * @method array findByClientaddressAddresseeCellular(string $clientaddress_addressee_cellular) Return Clientaddress objects filtered by the clientaddress_addressee_cellular column
 * @method array findByClientaddressAddresseePhone(string $clientaddress_addressee_phone) Return Clientaddress objects filtered by the clientaddress_addressee_phone column
 * @method array findByClientaddressAddress(string $clientaddress_address) Return Clientaddress objects filtered by the clientaddress_address column
 * @method array findByClientaddressAddress2(string $clientaddress_address2) Return Clientaddress objects filtered by the clientaddress_address2 column
 * @method array findByClientaddressCity(string $clientaddress_city) Return Clientaddress objects filtered by the clientaddress_city column
 * @method array findByClientaddressState(string $clientaddress_state) Return Clientaddress objects filtered by the clientaddress_state column
 * @method array findByClientaddressZipcode(string $clientaddress_zipcode) Return Clientaddress objects filtered by the clientaddress_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientaddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientaddressQuery object.
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
            $modelName = 'Clientaddress';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientaddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientaddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientaddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientaddressQuery) {
            return $criteria;
        }
        $query = new ClientaddressQuery(null, null, $modelAlias);

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
     * @return   Clientaddress|Clientaddress[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientaddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientaddress A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclientaddress($key, $con = null)
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
     * @return                 Clientaddress A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclientaddress`, `idclient`, `clientaddress_iso_codecountry`, `clientaddress_iso_codephone`, `clientaddress_addressee`, `clientaddress_addressee_cellular`, `clientaddress_addressee_phone`, `clientaddress_address`, `clientaddress_address2`, `clientaddress_city`, `clientaddress_state`, `clientaddress_zipcode` FROM `clientaddress` WHERE `idclientaddress` = :p0';
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
            $obj = new Clientaddress();
            $obj->hydrate($row);
            ClientaddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientaddress|Clientaddress[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientaddress[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idclientaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclientaddress(1234); // WHERE idclientaddress = 1234
     * $query->filterByIdclientaddress(array(12, 34)); // WHERE idclientaddress IN (12, 34)
     * $query->filterByIdclientaddress(array('min' => 12)); // WHERE idclientaddress >= 12
     * $query->filterByIdclientaddress(array('max' => 12)); // WHERE idclientaddress <= 12
     * </code>
     *
     * @param     mixed $idclientaddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByIdclientaddress($idclientaddress = null, $comparison = null)
    {
        if (is_array($idclientaddress)) {
            $useMinMax = false;
            if (isset($idclientaddress['min'])) {
                $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $idclientaddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclientaddress['max'])) {
                $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $idclientaddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $idclientaddress, $comparison);
    }

    /**
     * Filter the query on the idclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclient(1234); // WHERE idclient = 1234
     * $query->filterByIdclient(array(12, 34)); // WHERE idclient IN (12, 34)
     * $query->filterByIdclient(array('min' => 12)); // WHERE idclient >= 12
     * $query->filterByIdclient(array('max' => 12)); // WHERE idclient <= 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClientaddressPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClientaddressPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the clientaddress_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressIsoCodecountry('fooValue');   // WHERE clientaddress_iso_codecountry = 'fooValue'
     * $query->filterByClientaddressIsoCodecountry('%fooValue%'); // WHERE clientaddress_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressIsoCodecountry($clientaddressIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressIsoCodecountry)) {
                $clientaddressIsoCodecountry = str_replace('*', '%', $clientaddressIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY, $clientaddressIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the clientaddress_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressIsoCodephone('fooValue');   // WHERE clientaddress_iso_codephone = 'fooValue'
     * $query->filterByClientaddressIsoCodephone('%fooValue%'); // WHERE clientaddress_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressIsoCodephone($clientaddressIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressIsoCodephone)) {
                $clientaddressIsoCodephone = str_replace('*', '%', $clientaddressIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE, $clientaddressIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the clientaddress_addressee column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressAddressee('fooValue');   // WHERE clientaddress_addressee = 'fooValue'
     * $query->filterByClientaddressAddressee('%fooValue%'); // WHERE clientaddress_addressee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressAddressee The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressAddressee($clientaddressAddressee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressAddressee)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressAddressee)) {
                $clientaddressAddressee = str_replace('*', '%', $clientaddressAddressee);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE, $clientaddressAddressee, $comparison);
    }

    /**
     * Filter the query on the clientaddress_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressAddresseeCellular('fooValue');   // WHERE clientaddress_addressee_cellular = 'fooValue'
     * $query->filterByClientaddressAddresseeCellular('%fooValue%'); // WHERE clientaddress_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressAddresseeCellular($clientaddressAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressAddresseeCellular)) {
                $clientaddressAddresseeCellular = str_replace('*', '%', $clientaddressAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR, $clientaddressAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the clientaddress_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressAddresseePhone('fooValue');   // WHERE clientaddress_addressee_phone = 'fooValue'
     * $query->filterByClientaddressAddresseePhone('%fooValue%'); // WHERE clientaddress_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressAddresseePhone($clientaddressAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressAddresseePhone)) {
                $clientaddressAddresseePhone = str_replace('*', '%', $clientaddressAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE, $clientaddressAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the clientaddress_address column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressAddress('fooValue');   // WHERE clientaddress_address = 'fooValue'
     * $query->filterByClientaddressAddress('%fooValue%'); // WHERE clientaddress_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressAddress($clientaddressAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressAddress)) {
                $clientaddressAddress = str_replace('*', '%', $clientaddressAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ADDRESS, $clientaddressAddress, $comparison);
    }

    /**
     * Filter the query on the clientaddress_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressAddress2('fooValue');   // WHERE clientaddress_address2 = 'fooValue'
     * $query->filterByClientaddressAddress2('%fooValue%'); // WHERE clientaddress_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressAddress2($clientaddressAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressAddress2)) {
                $clientaddressAddress2 = str_replace('*', '%', $clientaddressAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ADDRESS2, $clientaddressAddress2, $comparison);
    }

    /**
     * Filter the query on the clientaddress_city column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressCity('fooValue');   // WHERE clientaddress_city = 'fooValue'
     * $query->filterByClientaddressCity('%fooValue%'); // WHERE clientaddress_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressCity($clientaddressCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressCity)) {
                $clientaddressCity = str_replace('*', '%', $clientaddressCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_CITY, $clientaddressCity, $comparison);
    }

    /**
     * Filter the query on the clientaddress_state column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressState('fooValue');   // WHERE clientaddress_state = 'fooValue'
     * $query->filterByClientaddressState('%fooValue%'); // WHERE clientaddress_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressState($clientaddressState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressState)) {
                $clientaddressState = str_replace('*', '%', $clientaddressState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_STATE, $clientaddressState, $comparison);
    }

    /**
     * Filter the query on the clientaddress_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressZipcode('fooValue');   // WHERE clientaddress_zipcode = 'fooValue'
     * $query->filterByClientaddressZipcode('%fooValue%'); // WHERE clientaddress_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function filterByClientaddressZipcode($clientaddressZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressZipcode)) {
                $clientaddressZipcode = str_replace('*', '%', $clientaddressZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressPeer::CLIENTADDRESS_ZIPCODE, $clientaddressZipcode, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientaddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClientaddressPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientaddressPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Clientaddress $clientaddress Object to remove from the list of results
     *
     * @return ClientaddressQuery The current query, for fluid interface
     */
    public function prune($clientaddress = null)
    {
        if ($clientaddress) {
            $this->addUsingAlias(ClientaddressPeer::IDCLIENTADDRESS, $clientaddress->getIdclientaddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
