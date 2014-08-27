<?php


/**
 * Base class that represents a query for the 'clientaddressship' table.
 *
 *
 *
 * @method ClientaddressshipQuery orderByIdclientaddressship($order = Criteria::ASC) Order by the idclientaddressship column
 * @method ClientaddressshipQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClientaddressshipQuery orderByClientaddressshipIsoCodecountry($order = Criteria::ASC) Order by the clientaddressship_iso_codecountry column
 * @method ClientaddressshipQuery orderByClientaddressshipIsoCodephone($order = Criteria::ASC) Order by the clientaddressship_iso_codephone column
 * @method ClientaddressshipQuery orderByClientaddressshipAddressee($order = Criteria::ASC) Order by the clientaddressship_addressee column
 * @method ClientaddressshipQuery orderByClientaddressshipAddresseeCellular($order = Criteria::ASC) Order by the clientaddressship_addressee_cellular column
 * @method ClientaddressshipQuery orderByClientaddressshipAddresseePhone($order = Criteria::ASC) Order by the clientaddressship_addressee_phone column
 * @method ClientaddressshipQuery orderByClientaddressshipAddress($order = Criteria::ASC) Order by the clientaddressship_address column
 * @method ClientaddressshipQuery orderByClientaddressshipAddress2($order = Criteria::ASC) Order by the clientaddressship_address2 column
 * @method ClientaddressshipQuery orderByClientaddressshipCity($order = Criteria::ASC) Order by the clientaddressship_city column
 * @method ClientaddressshipQuery orderByClientaddressshipState($order = Criteria::ASC) Order by the clientaddressship_state column
 * @method ClientaddressshipQuery orderByClientaddressshipZipcode($order = Criteria::ASC) Order by the clientaddressship_zipcode column
 *
 * @method ClientaddressshipQuery groupByIdclientaddressship() Group by the idclientaddressship column
 * @method ClientaddressshipQuery groupByIdclient() Group by the idclient column
 * @method ClientaddressshipQuery groupByClientaddressshipIsoCodecountry() Group by the clientaddressship_iso_codecountry column
 * @method ClientaddressshipQuery groupByClientaddressshipIsoCodephone() Group by the clientaddressship_iso_codephone column
 * @method ClientaddressshipQuery groupByClientaddressshipAddressee() Group by the clientaddressship_addressee column
 * @method ClientaddressshipQuery groupByClientaddressshipAddresseeCellular() Group by the clientaddressship_addressee_cellular column
 * @method ClientaddressshipQuery groupByClientaddressshipAddresseePhone() Group by the clientaddressship_addressee_phone column
 * @method ClientaddressshipQuery groupByClientaddressshipAddress() Group by the clientaddressship_address column
 * @method ClientaddressshipQuery groupByClientaddressshipAddress2() Group by the clientaddressship_address2 column
 * @method ClientaddressshipQuery groupByClientaddressshipCity() Group by the clientaddressship_city column
 * @method ClientaddressshipQuery groupByClientaddressshipState() Group by the clientaddressship_state column
 * @method ClientaddressshipQuery groupByClientaddressshipZipcode() Group by the clientaddressship_zipcode column
 *
 * @method ClientaddressshipQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientaddressshipQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientaddressshipQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientaddressshipQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClientaddressshipQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClientaddressshipQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Clientaddressship findOne(PropelPDO $con = null) Return the first Clientaddressship matching the query
 * @method Clientaddressship findOneOrCreate(PropelPDO $con = null) Return the first Clientaddressship matching the query, or a new Clientaddressship object populated from the query conditions when no match is found
 *
 * @method Clientaddressship findOneByIdclient(int $idclient) Return the first Clientaddressship filtered by the idclient column
 * @method Clientaddressship findOneByClientaddressshipIsoCodecountry(string $clientaddressship_iso_codecountry) Return the first Clientaddressship filtered by the clientaddressship_iso_codecountry column
 * @method Clientaddressship findOneByClientaddressshipIsoCodephone(string $clientaddressship_iso_codephone) Return the first Clientaddressship filtered by the clientaddressship_iso_codephone column
 * @method Clientaddressship findOneByClientaddressshipAddressee(string $clientaddressship_addressee) Return the first Clientaddressship filtered by the clientaddressship_addressee column
 * @method Clientaddressship findOneByClientaddressshipAddresseeCellular(string $clientaddressship_addressee_cellular) Return the first Clientaddressship filtered by the clientaddressship_addressee_cellular column
 * @method Clientaddressship findOneByClientaddressshipAddresseePhone(string $clientaddressship_addressee_phone) Return the first Clientaddressship filtered by the clientaddressship_addressee_phone column
 * @method Clientaddressship findOneByClientaddressshipAddress(string $clientaddressship_address) Return the first Clientaddressship filtered by the clientaddressship_address column
 * @method Clientaddressship findOneByClientaddressshipAddress2(string $clientaddressship_address2) Return the first Clientaddressship filtered by the clientaddressship_address2 column
 * @method Clientaddressship findOneByClientaddressshipCity(string $clientaddressship_city) Return the first Clientaddressship filtered by the clientaddressship_city column
 * @method Clientaddressship findOneByClientaddressshipState(string $clientaddressship_state) Return the first Clientaddressship filtered by the clientaddressship_state column
 * @method Clientaddressship findOneByClientaddressshipZipcode(string $clientaddressship_zipcode) Return the first Clientaddressship filtered by the clientaddressship_zipcode column
 *
 * @method array findByIdclientaddressship(int $idclientaddressship) Return Clientaddressship objects filtered by the idclientaddressship column
 * @method array findByIdclient(int $idclient) Return Clientaddressship objects filtered by the idclient column
 * @method array findByClientaddressshipIsoCodecountry(string $clientaddressship_iso_codecountry) Return Clientaddressship objects filtered by the clientaddressship_iso_codecountry column
 * @method array findByClientaddressshipIsoCodephone(string $clientaddressship_iso_codephone) Return Clientaddressship objects filtered by the clientaddressship_iso_codephone column
 * @method array findByClientaddressshipAddressee(string $clientaddressship_addressee) Return Clientaddressship objects filtered by the clientaddressship_addressee column
 * @method array findByClientaddressshipAddresseeCellular(string $clientaddressship_addressee_cellular) Return Clientaddressship objects filtered by the clientaddressship_addressee_cellular column
 * @method array findByClientaddressshipAddresseePhone(string $clientaddressship_addressee_phone) Return Clientaddressship objects filtered by the clientaddressship_addressee_phone column
 * @method array findByClientaddressshipAddress(string $clientaddressship_address) Return Clientaddressship objects filtered by the clientaddressship_address column
 * @method array findByClientaddressshipAddress2(string $clientaddressship_address2) Return Clientaddressship objects filtered by the clientaddressship_address2 column
 * @method array findByClientaddressshipCity(string $clientaddressship_city) Return Clientaddressship objects filtered by the clientaddressship_city column
 * @method array findByClientaddressshipState(string $clientaddressship_state) Return Clientaddressship objects filtered by the clientaddressship_state column
 * @method array findByClientaddressshipZipcode(string $clientaddressship_zipcode) Return Clientaddressship objects filtered by the clientaddressship_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientaddressshipQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientaddressshipQuery object.
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
            $modelName = 'Clientaddressship';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientaddressshipQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientaddressshipQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientaddressshipQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientaddressshipQuery) {
            return $criteria;
        }
        $query = new ClientaddressshipQuery(null, null, $modelAlias);

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
     * @return   Clientaddressship|Clientaddressship[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientaddressshipPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressshipPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientaddressship A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclientaddressship($key, $con = null)
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
     * @return                 Clientaddressship A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclientaddressship`, `idclient`, `clientaddressship_iso_codecountry`, `clientaddressship_iso_codephone`, `clientaddressship_addressee`, `clientaddressship_addressee_cellular`, `clientaddressship_addressee_phone`, `clientaddressship_address`, `clientaddressship_address2`, `clientaddressship_city`, `clientaddressship_state`, `clientaddressship_zipcode` FROM `clientaddressship` WHERE `idclientaddressship` = :p0';
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
            $obj = new Clientaddressship();
            $obj->hydrate($row);
            ClientaddressshipPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientaddressship|Clientaddressship[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientaddressship[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idclientaddressship column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclientaddressship(1234); // WHERE idclientaddressship = 1234
     * $query->filterByIdclientaddressship(array(12, 34)); // WHERE idclientaddressship IN (12, 34)
     * $query->filterByIdclientaddressship(array('min' => 12)); // WHERE idclientaddressship >= 12
     * $query->filterByIdclientaddressship(array('max' => 12)); // WHERE idclientaddressship <= 12
     * </code>
     *
     * @param     mixed $idclientaddressship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByIdclientaddressship($idclientaddressship = null, $comparison = null)
    {
        if (is_array($idclientaddressship)) {
            $useMinMax = false;
            if (isset($idclientaddressship['min'])) {
                $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $idclientaddressship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclientaddressship['max'])) {
                $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $idclientaddressship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $idclientaddressship, $comparison);
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
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClientaddressshipPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClientaddressshipPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipIsoCodecountry('fooValue');   // WHERE clientaddressship_iso_codecountry = 'fooValue'
     * $query->filterByClientaddressshipIsoCodecountry('%fooValue%'); // WHERE clientaddressship_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipIsoCodecountry($clientaddressshipIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipIsoCodecountry)) {
                $clientaddressshipIsoCodecountry = str_replace('*', '%', $clientaddressshipIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODECOUNTRY, $clientaddressshipIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipIsoCodephone('fooValue');   // WHERE clientaddressship_iso_codephone = 'fooValue'
     * $query->filterByClientaddressshipIsoCodephone('%fooValue%'); // WHERE clientaddressship_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipIsoCodephone($clientaddressshipIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipIsoCodephone)) {
                $clientaddressshipIsoCodephone = str_replace('*', '%', $clientaddressshipIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODEPHONE, $clientaddressshipIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_addressee column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipAddressee('fooValue');   // WHERE clientaddressship_addressee = 'fooValue'
     * $query->filterByClientaddressshipAddressee('%fooValue%'); // WHERE clientaddressship_addressee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipAddressee The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipAddressee($clientaddressshipAddressee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipAddressee)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipAddressee)) {
                $clientaddressshipAddressee = str_replace('*', '%', $clientaddressshipAddressee);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE, $clientaddressshipAddressee, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipAddresseeCellular('fooValue');   // WHERE clientaddressship_addressee_cellular = 'fooValue'
     * $query->filterByClientaddressshipAddresseeCellular('%fooValue%'); // WHERE clientaddressship_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipAddresseeCellular($clientaddressshipAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipAddresseeCellular)) {
                $clientaddressshipAddresseeCellular = str_replace('*', '%', $clientaddressshipAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_CELLULAR, $clientaddressshipAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipAddresseePhone('fooValue');   // WHERE clientaddressship_addressee_phone = 'fooValue'
     * $query->filterByClientaddressshipAddresseePhone('%fooValue%'); // WHERE clientaddressship_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipAddresseePhone($clientaddressshipAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipAddresseePhone)) {
                $clientaddressshipAddresseePhone = str_replace('*', '%', $clientaddressshipAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_PHONE, $clientaddressshipAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_address column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipAddress('fooValue');   // WHERE clientaddressship_address = 'fooValue'
     * $query->filterByClientaddressshipAddress('%fooValue%'); // WHERE clientaddressship_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipAddress($clientaddressshipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipAddress)) {
                $clientaddressshipAddress = str_replace('*', '%', $clientaddressshipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS, $clientaddressshipAddress, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipAddress2('fooValue');   // WHERE clientaddressship_address2 = 'fooValue'
     * $query->filterByClientaddressshipAddress2('%fooValue%'); // WHERE clientaddressship_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipAddress2($clientaddressshipAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipAddress2)) {
                $clientaddressshipAddress2 = str_replace('*', '%', $clientaddressshipAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS2, $clientaddressshipAddress2, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_city column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipCity('fooValue');   // WHERE clientaddressship_city = 'fooValue'
     * $query->filterByClientaddressshipCity('%fooValue%'); // WHERE clientaddressship_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipCity($clientaddressshipCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipCity)) {
                $clientaddressshipCity = str_replace('*', '%', $clientaddressshipCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_CITY, $clientaddressshipCity, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_state column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipState('fooValue');   // WHERE clientaddressship_state = 'fooValue'
     * $query->filterByClientaddressshipState('%fooValue%'); // WHERE clientaddressship_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipState($clientaddressshipState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipState)) {
                $clientaddressshipState = str_replace('*', '%', $clientaddressshipState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_STATE, $clientaddressshipState, $comparison);
    }

    /**
     * Filter the query on the clientaddressship_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByClientaddressshipZipcode('fooValue');   // WHERE clientaddressship_zipcode = 'fooValue'
     * $query->filterByClientaddressshipZipcode('%fooValue%'); // WHERE clientaddressship_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientaddressshipZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function filterByClientaddressshipZipcode($clientaddressshipZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientaddressshipZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientaddressshipZipcode)) {
                $clientaddressshipZipcode = str_replace('*', '%', $clientaddressshipZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientaddressshipPeer::CLIENTADDRESSSHIP_ZIPCODE, $clientaddressshipZipcode, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientaddressshipQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClientaddressshipPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientaddressshipPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return ClientaddressshipQuery The current query, for fluid interface
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
     * @param   Clientaddressship $clientaddressship Object to remove from the list of results
     *
     * @return ClientaddressshipQuery The current query, for fluid interface
     */
    public function prune($clientaddressship = null)
    {
        if ($clientaddressship) {
            $this->addUsingAlias(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $clientaddressship->getIdclientaddressship(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
