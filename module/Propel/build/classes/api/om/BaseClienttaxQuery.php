<?php


/**
 * Base class that represents a query for the 'clienttax' table.
 *
 *
 *
 * @method ClienttaxQuery orderByIdclienttax($order = Criteria::ASC) Order by the idclienttax column
 * @method ClienttaxQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClienttaxQuery orderByClienttaxIsoCodecountry($order = Criteria::ASC) Order by the clienttax_iso_codecountry column
 * @method ClienttaxQuery orderByClienttaxIsoCodephone($order = Criteria::ASC) Order by the clienttax_iso_codephone column
 * @method ClienttaxQuery orderByClienttaxName($order = Criteria::ASC) Order by the clienttax_name column
 * @method ClienttaxQuery orderByClienttaxTaxesid($order = Criteria::ASC) Order by the clienttax_taxesid column
 * @method ClienttaxQuery orderByClienttaxAddress($order = Criteria::ASC) Order by the clienttax_address column
 * @method ClienttaxQuery orderByClienttaxAddress2($order = Criteria::ASC) Order by the clienttax_address2 column
 * @method ClienttaxQuery orderByClienttaxCity($order = Criteria::ASC) Order by the clienttax_city column
 * @method ClienttaxQuery orderByClienttaxState($order = Criteria::ASC) Order by the clienttax_state column
 * @method ClienttaxQuery orderByClienttaxZipcode($order = Criteria::ASC) Order by the clienttax_zipcode column
 *
 * @method ClienttaxQuery groupByIdclienttax() Group by the idclienttax column
 * @method ClienttaxQuery groupByIdclient() Group by the idclient column
 * @method ClienttaxQuery groupByClienttaxIsoCodecountry() Group by the clienttax_iso_codecountry column
 * @method ClienttaxQuery groupByClienttaxIsoCodephone() Group by the clienttax_iso_codephone column
 * @method ClienttaxQuery groupByClienttaxName() Group by the clienttax_name column
 * @method ClienttaxQuery groupByClienttaxTaxesid() Group by the clienttax_taxesid column
 * @method ClienttaxQuery groupByClienttaxAddress() Group by the clienttax_address column
 * @method ClienttaxQuery groupByClienttaxAddress2() Group by the clienttax_address2 column
 * @method ClienttaxQuery groupByClienttaxCity() Group by the clienttax_city column
 * @method ClienttaxQuery groupByClienttaxState() Group by the clienttax_state column
 * @method ClienttaxQuery groupByClienttaxZipcode() Group by the clienttax_zipcode column
 *
 * @method ClienttaxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClienttaxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClienttaxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClienttaxQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClienttaxQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClienttaxQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method ClienttaxQuery leftJoinMxtaxdocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mxtaxdocument relation
 * @method ClienttaxQuery rightJoinMxtaxdocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mxtaxdocument relation
 * @method ClienttaxQuery innerJoinMxtaxdocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Mxtaxdocument relation
 *
 * @method Clienttax findOne(PropelPDO $con = null) Return the first Clienttax matching the query
 * @method Clienttax findOneOrCreate(PropelPDO $con = null) Return the first Clienttax matching the query, or a new Clienttax object populated from the query conditions when no match is found
 *
 * @method Clienttax findOneByIdclient(int $idclient) Return the first Clienttax filtered by the idclient column
 * @method Clienttax findOneByClienttaxIsoCodecountry(string $clienttax_iso_codecountry) Return the first Clienttax filtered by the clienttax_iso_codecountry column
 * @method Clienttax findOneByClienttaxIsoCodephone(string $clienttax_iso_codephone) Return the first Clienttax filtered by the clienttax_iso_codephone column
 * @method Clienttax findOneByClienttaxName(string $clienttax_name) Return the first Clienttax filtered by the clienttax_name column
 * @method Clienttax findOneByClienttaxTaxesid(string $clienttax_taxesid) Return the first Clienttax filtered by the clienttax_taxesid column
 * @method Clienttax findOneByClienttaxAddress(string $clienttax_address) Return the first Clienttax filtered by the clienttax_address column
 * @method Clienttax findOneByClienttaxAddress2(string $clienttax_address2) Return the first Clienttax filtered by the clienttax_address2 column
 * @method Clienttax findOneByClienttaxCity(string $clienttax_city) Return the first Clienttax filtered by the clienttax_city column
 * @method Clienttax findOneByClienttaxState(string $clienttax_state) Return the first Clienttax filtered by the clienttax_state column
 * @method Clienttax findOneByClienttaxZipcode(string $clienttax_zipcode) Return the first Clienttax filtered by the clienttax_zipcode column
 *
 * @method array findByIdclienttax(int $idclienttax) Return Clienttax objects filtered by the idclienttax column
 * @method array findByIdclient(int $idclient) Return Clienttax objects filtered by the idclient column
 * @method array findByClienttaxIsoCodecountry(string $clienttax_iso_codecountry) Return Clienttax objects filtered by the clienttax_iso_codecountry column
 * @method array findByClienttaxIsoCodephone(string $clienttax_iso_codephone) Return Clienttax objects filtered by the clienttax_iso_codephone column
 * @method array findByClienttaxName(string $clienttax_name) Return Clienttax objects filtered by the clienttax_name column
 * @method array findByClienttaxTaxesid(string $clienttax_taxesid) Return Clienttax objects filtered by the clienttax_taxesid column
 * @method array findByClienttaxAddress(string $clienttax_address) Return Clienttax objects filtered by the clienttax_address column
 * @method array findByClienttaxAddress2(string $clienttax_address2) Return Clienttax objects filtered by the clienttax_address2 column
 * @method array findByClienttaxCity(string $clienttax_city) Return Clienttax objects filtered by the clienttax_city column
 * @method array findByClienttaxState(string $clienttax_state) Return Clienttax objects filtered by the clienttax_state column
 * @method array findByClienttaxZipcode(string $clienttax_zipcode) Return Clienttax objects filtered by the clienttax_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClienttaxQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClienttaxQuery object.
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
            $modelName = 'Clienttax';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClienttaxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClienttaxQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClienttaxQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClienttaxQuery) {
            return $criteria;
        }
        $query = new ClienttaxQuery(null, null, $modelAlias);

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
     * @return   Clienttax|Clienttax[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClienttaxPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClienttaxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clienttax A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclienttax($key, $con = null)
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
     * @return                 Clienttax A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclienttax`, `idclient`, `clienttax_iso_codecountry`, `clienttax_iso_codephone`, `clienttax_name`, `clienttax_taxesid`, `clienttax_address`, `clienttax_address2`, `clienttax_city`, `clienttax_state`, `clienttax_zipcode` FROM `clienttax` WHERE `idclienttax` = :p0';
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
            $obj = new Clienttax();
            $obj->hydrate($row);
            ClienttaxPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clienttax|Clienttax[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clienttax[]|mixed the list of results, formatted by the current formatter
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
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idclienttax column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclienttax(1234); // WHERE idclienttax = 1234
     * $query->filterByIdclienttax(array(12, 34)); // WHERE idclienttax IN (12, 34)
     * $query->filterByIdclienttax(array('min' => 12)); // WHERE idclienttax >= 12
     * $query->filterByIdclienttax(array('max' => 12)); // WHERE idclienttax <= 12
     * </code>
     *
     * @param     mixed $idclienttax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByIdclienttax($idclienttax = null, $comparison = null)
    {
        if (is_array($idclienttax)) {
            $useMinMax = false;
            if (isset($idclienttax['min'])) {
                $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $idclienttax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclienttax['max'])) {
                $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $idclienttax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $idclienttax, $comparison);
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
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClienttaxPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClienttaxPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the clienttax_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxIsoCodecountry('fooValue');   // WHERE clienttax_iso_codecountry = 'fooValue'
     * $query->filterByClienttaxIsoCodecountry('%fooValue%'); // WHERE clienttax_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxIsoCodecountry($clienttaxIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxIsoCodecountry)) {
                $clienttaxIsoCodecountry = str_replace('*', '%', $clienttaxIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_ISO_CODECOUNTRY, $clienttaxIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the clienttax_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxIsoCodephone('fooValue');   // WHERE clienttax_iso_codephone = 'fooValue'
     * $query->filterByClienttaxIsoCodephone('%fooValue%'); // WHERE clienttax_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxIsoCodephone($clienttaxIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxIsoCodephone)) {
                $clienttaxIsoCodephone = str_replace('*', '%', $clienttaxIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_ISO_CODEPHONE, $clienttaxIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the clienttax_name column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxName('fooValue');   // WHERE clienttax_name = 'fooValue'
     * $query->filterByClienttaxName('%fooValue%'); // WHERE clienttax_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxName($clienttaxName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxName)) {
                $clienttaxName = str_replace('*', '%', $clienttaxName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_NAME, $clienttaxName, $comparison);
    }

    /**
     * Filter the query on the clienttax_taxesid column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxTaxesid('fooValue');   // WHERE clienttax_taxesid = 'fooValue'
     * $query->filterByClienttaxTaxesid('%fooValue%'); // WHERE clienttax_taxesid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxTaxesid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxTaxesid($clienttaxTaxesid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxTaxesid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxTaxesid)) {
                $clienttaxTaxesid = str_replace('*', '%', $clienttaxTaxesid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_TAXESID, $clienttaxTaxesid, $comparison);
    }

    /**
     * Filter the query on the clienttax_address column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxAddress('fooValue');   // WHERE clienttax_address = 'fooValue'
     * $query->filterByClienttaxAddress('%fooValue%'); // WHERE clienttax_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxAddress($clienttaxAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxAddress)) {
                $clienttaxAddress = str_replace('*', '%', $clienttaxAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_ADDRESS, $clienttaxAddress, $comparison);
    }

    /**
     * Filter the query on the clienttax_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxAddress2('fooValue');   // WHERE clienttax_address2 = 'fooValue'
     * $query->filterByClienttaxAddress2('%fooValue%'); // WHERE clienttax_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxAddress2($clienttaxAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxAddress2)) {
                $clienttaxAddress2 = str_replace('*', '%', $clienttaxAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_ADDRESS2, $clienttaxAddress2, $comparison);
    }

    /**
     * Filter the query on the clienttax_city column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxCity('fooValue');   // WHERE clienttax_city = 'fooValue'
     * $query->filterByClienttaxCity('%fooValue%'); // WHERE clienttax_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxCity($clienttaxCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxCity)) {
                $clienttaxCity = str_replace('*', '%', $clienttaxCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_CITY, $clienttaxCity, $comparison);
    }

    /**
     * Filter the query on the clienttax_state column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxState('fooValue');   // WHERE clienttax_state = 'fooValue'
     * $query->filterByClienttaxState('%fooValue%'); // WHERE clienttax_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxState($clienttaxState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxState)) {
                $clienttaxState = str_replace('*', '%', $clienttaxState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_STATE, $clienttaxState, $comparison);
    }

    /**
     * Filter the query on the clienttax_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByClienttaxZipcode('fooValue');   // WHERE clienttax_zipcode = 'fooValue'
     * $query->filterByClienttaxZipcode('%fooValue%'); // WHERE clienttax_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clienttaxZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function filterByClienttaxZipcode($clienttaxZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clienttaxZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clienttaxZipcode)) {
                $clienttaxZipcode = str_replace('*', '%', $clienttaxZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClienttaxPeer::CLIENTTAX_ZIPCODE, $clienttaxZipcode, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienttaxQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClienttaxPeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClienttaxPeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return ClienttaxQuery The current query, for fluid interface
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
     * Filter the query by a related Mxtaxdocument object
     *
     * @param   Mxtaxdocument|PropelObjectCollection $mxtaxdocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClienttaxQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMxtaxdocument($mxtaxdocument, $comparison = null)
    {
        if ($mxtaxdocument instanceof Mxtaxdocument) {
            return $this
                ->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $mxtaxdocument->getIdclienttax(), $comparison);
        } elseif ($mxtaxdocument instanceof PropelObjectCollection) {
            return $this
                ->useMxtaxdocumentQuery()
                ->filterByPrimaryKeys($mxtaxdocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMxtaxdocument() only accepts arguments of type Mxtaxdocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mxtaxdocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function joinMxtaxdocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mxtaxdocument');

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
            $this->addJoinObject($join, 'Mxtaxdocument');
        }

        return $this;
    }

    /**
     * Use the Mxtaxdocument relation Mxtaxdocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MxtaxdocumentQuery A secondary query class using the current class as primary query
     */
    public function useMxtaxdocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMxtaxdocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mxtaxdocument', 'MxtaxdocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Clienttax $clienttax Object to remove from the list of results
     *
     * @return ClienttaxQuery The current query, for fluid interface
     */
    public function prune($clienttax = null)
    {
        if ($clienttax) {
            $this->addUsingAlias(ClienttaxPeer::IDCLIENTTAX, $clienttax->getIdclienttax(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
