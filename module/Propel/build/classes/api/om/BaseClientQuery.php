<?php


/**
 * Base class that represents a query for the 'client' table.
 *
 *
 *
 * @method ClientQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 * @method ClientQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ClientQuery orderByClientIsoCodecountry($order = Criteria::ASC) Order by the client_iso_codecountry column
 * @method ClientQuery orderByClientIsoCodephone($order = Criteria::ASC) Order by the client_iso_codephone column
 * @method ClientQuery orderByClientFullname($order = Criteria::ASC) Order by the client_fullname column
 * @method ClientQuery orderByClientEmail($order = Criteria::ASC) Order by the client_email column
 * @method ClientQuery orderByClientEmail2($order = Criteria::ASC) Order by the client_email2 column
 * @method ClientQuery orderByClientPassword($order = Criteria::ASC) Order by the client_password column
 * @method ClientQuery orderByClientCellular($order = Criteria::ASC) Order by the client_cellular column
 * @method ClientQuery orderByClientPhone($order = Criteria::ASC) Order by the client_phone column
 * @method ClientQuery orderByClientLanguage($order = Criteria::ASC) Order by the client_language column
 * @method ClientQuery orderByClientStatus($order = Criteria::ASC) Order by the client_status column
 * @method ClientQuery orderByClientType($order = Criteria::ASC) Order by the client_type column
 *
 * @method ClientQuery groupByIdclient() Group by the idclient column
 * @method ClientQuery groupByIdcompany() Group by the idcompany column
 * @method ClientQuery groupByClientIsoCodecountry() Group by the client_iso_codecountry column
 * @method ClientQuery groupByClientIsoCodephone() Group by the client_iso_codephone column
 * @method ClientQuery groupByClientFullname() Group by the client_fullname column
 * @method ClientQuery groupByClientEmail() Group by the client_email column
 * @method ClientQuery groupByClientEmail2() Group by the client_email2 column
 * @method ClientQuery groupByClientPassword() Group by the client_password column
 * @method ClientQuery groupByClientCellular() Group by the client_cellular column
 * @method ClientQuery groupByClientPhone() Group by the client_phone column
 * @method ClientQuery groupByClientLanguage() Group by the client_language column
 * @method ClientQuery groupByClientStatus() Group by the client_status column
 * @method ClientQuery groupByClientType() Group by the client_type column
 *
 * @method ClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ClientQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ClientQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ClientQuery leftJoinChatpublic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Chatpublic relation
 * @method ClientQuery rightJoinChatpublic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Chatpublic relation
 * @method ClientQuery innerJoinChatpublic($relationAlias = null) Adds a INNER JOIN clause to the query using the Chatpublic relation
 *
 * @method ClientQuery leftJoinClientaddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientaddress relation
 * @method ClientQuery rightJoinClientaddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientaddress relation
 * @method ClientQuery innerJoinClientaddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientaddress relation
 *
 * @method ClientQuery leftJoinClientcomment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientcomment relation
 * @method ClientQuery rightJoinClientcomment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientcomment relation
 * @method ClientQuery innerJoinClientcomment($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientcomment relation
 *
 * @method ClientQuery leftJoinClientfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientfile relation
 * @method ClientQuery rightJoinClientfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientfile relation
 * @method ClientQuery innerJoinClientfile($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientfile relation
 *
 * @method ClientQuery leftJoinClienttax($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clienttax relation
 * @method ClientQuery rightJoinClienttax($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clienttax relation
 * @method ClientQuery innerJoinClienttax($relationAlias = null) Adds a INNER JOIN clause to the query using the Clienttax relation
 *
 * @method ClientQuery leftJoinMarketingcampaignclient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcampaignclient relation
 * @method ClientQuery rightJoinMarketingcampaignclient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcampaignclient relation
 * @method ClientQuery innerJoinMarketingcampaignclient($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcampaignclient relation
 *
 * @method ClientQuery leftJoinMarketingcandidate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Marketingcandidate relation
 * @method ClientQuery rightJoinMarketingcandidate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Marketingcandidate relation
 * @method ClientQuery innerJoinMarketingcandidate($relationAlias = null) Adds a INNER JOIN clause to the query using the Marketingcandidate relation
 *
 * @method ClientQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method ClientQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method ClientQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Client findOne(PropelPDO $con = null) Return the first Client matching the query
 * @method Client findOneOrCreate(PropelPDO $con = null) Return the first Client matching the query, or a new Client object populated from the query conditions when no match is found
 *
 * @method Client findOneByIdcompany(int $idcompany) Return the first Client filtered by the idcompany column
 * @method Client findOneByClientIsoCodecountry(string $client_iso_codecountry) Return the first Client filtered by the client_iso_codecountry column
 * @method Client findOneByClientIsoCodephone(string $client_iso_codephone) Return the first Client filtered by the client_iso_codephone column
 * @method Client findOneByClientFullname(string $client_fullname) Return the first Client filtered by the client_fullname column
 * @method Client findOneByClientEmail(string $client_email) Return the first Client filtered by the client_email column
 * @method Client findOneByClientEmail2(string $client_email2) Return the first Client filtered by the client_email2 column
 * @method Client findOneByClientPassword(string $client_password) Return the first Client filtered by the client_password column
 * @method Client findOneByClientCellular(string $client_cellular) Return the first Client filtered by the client_cellular column
 * @method Client findOneByClientPhone(string $client_phone) Return the first Client filtered by the client_phone column
 * @method Client findOneByClientLanguage(string $client_language) Return the first Client filtered by the client_language column
 * @method Client findOneByClientStatus(string $client_status) Return the first Client filtered by the client_status column
 * @method Client findOneByClientType(string $client_type) Return the first Client filtered by the client_type column
 *
 * @method array findByIdclient(int $idclient) Return Client objects filtered by the idclient column
 * @method array findByIdcompany(int $idcompany) Return Client objects filtered by the idcompany column
 * @method array findByClientIsoCodecountry(string $client_iso_codecountry) Return Client objects filtered by the client_iso_codecountry column
 * @method array findByClientIsoCodephone(string $client_iso_codephone) Return Client objects filtered by the client_iso_codephone column
 * @method array findByClientFullname(string $client_fullname) Return Client objects filtered by the client_fullname column
 * @method array findByClientEmail(string $client_email) Return Client objects filtered by the client_email column
 * @method array findByClientEmail2(string $client_email2) Return Client objects filtered by the client_email2 column
 * @method array findByClientPassword(string $client_password) Return Client objects filtered by the client_password column
 * @method array findByClientCellular(string $client_cellular) Return Client objects filtered by the client_cellular column
 * @method array findByClientPhone(string $client_phone) Return Client objects filtered by the client_phone column
 * @method array findByClientLanguage(string $client_language) Return Client objects filtered by the client_language column
 * @method array findByClientStatus(string $client_status) Return Client objects filtered by the client_status column
 * @method array findByClientType(string $client_type) Return Client objects filtered by the client_type column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientQuery object.
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
            $modelName = 'Client';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientQuery) {
            return $criteria;
        }
        $query = new ClientQuery(null, null, $modelAlias);

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
     * @return   Client|Client[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Client A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdclient($key, $con = null)
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
     * @return                 Client A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idclient`, `idcompany`, `client_iso_codecountry`, `client_iso_codephone`, `client_fullname`, `client_email`, `client_email2`, `client_password`, `client_cellular`, `client_phone`, `client_language`, `client_status`, `client_type` FROM `client` WHERE `idclient` = :p0';
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
            $obj = new Client();
            $obj->hydrate($row);
            ClientPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Client|Client[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Client[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientPeer::IDCLIENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientPeer::IDCLIENT, $keys, Criteria::IN);
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
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(ClientPeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(ClientPeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query on the idcompany column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompany(1234); // WHERE idcompany = 1234
     * $query->filterByIdcompany(array(12, 34)); // WHERE idcompany IN (12, 34)
     * $query->filterByIdcompany(array('min' => 12)); // WHERE idcompany >= 12
     * $query->filterByIdcompany(array('max' => 12)); // WHERE idcompany <= 12
     * </code>
     *
     * @see       filterByCompany()
     *
     * @param     mixed $idcompany The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ClientPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ClientPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the client_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByClientIsoCodecountry('fooValue');   // WHERE client_iso_codecountry = 'fooValue'
     * $query->filterByClientIsoCodecountry('%fooValue%'); // WHERE client_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientIsoCodecountry($clientIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientIsoCodecountry)) {
                $clientIsoCodecountry = str_replace('*', '%', $clientIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_ISO_CODECOUNTRY, $clientIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the client_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientIsoCodephone('fooValue');   // WHERE client_iso_codephone = 'fooValue'
     * $query->filterByClientIsoCodephone('%fooValue%'); // WHERE client_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientIsoCodephone($clientIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientIsoCodephone)) {
                $clientIsoCodephone = str_replace('*', '%', $clientIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_ISO_CODEPHONE, $clientIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the client_fullname column
     *
     * Example usage:
     * <code>
     * $query->filterByClientFullname('fooValue');   // WHERE client_fullname = 'fooValue'
     * $query->filterByClientFullname('%fooValue%'); // WHERE client_fullname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientFullname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientFullname($clientFullname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientFullname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientFullname)) {
                $clientFullname = str_replace('*', '%', $clientFullname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_FULLNAME, $clientFullname, $comparison);
    }

    /**
     * Filter the query on the client_email column
     *
     * Example usage:
     * <code>
     * $query->filterByClientEmail('fooValue');   // WHERE client_email = 'fooValue'
     * $query->filterByClientEmail('%fooValue%'); // WHERE client_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientEmail($clientEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientEmail)) {
                $clientEmail = str_replace('*', '%', $clientEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_EMAIL, $clientEmail, $comparison);
    }

    /**
     * Filter the query on the client_email2 column
     *
     * Example usage:
     * <code>
     * $query->filterByClientEmail2('fooValue');   // WHERE client_email2 = 'fooValue'
     * $query->filterByClientEmail2('%fooValue%'); // WHERE client_email2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientEmail2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientEmail2($clientEmail2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientEmail2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientEmail2)) {
                $clientEmail2 = str_replace('*', '%', $clientEmail2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_EMAIL2, $clientEmail2, $comparison);
    }

    /**
     * Filter the query on the client_password column
     *
     * Example usage:
     * <code>
     * $query->filterByClientPassword('fooValue');   // WHERE client_password = 'fooValue'
     * $query->filterByClientPassword('%fooValue%'); // WHERE client_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientPassword The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientPassword($clientPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientPassword)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientPassword)) {
                $clientPassword = str_replace('*', '%', $clientPassword);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_PASSWORD, $clientPassword, $comparison);
    }

    /**
     * Filter the query on the client_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByClientCellular('fooValue');   // WHERE client_cellular = 'fooValue'
     * $query->filterByClientCellular('%fooValue%'); // WHERE client_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientCellular($clientCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientCellular)) {
                $clientCellular = str_replace('*', '%', $clientCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_CELLULAR, $clientCellular, $comparison);
    }

    /**
     * Filter the query on the client_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByClientPhone('fooValue');   // WHERE client_phone = 'fooValue'
     * $query->filterByClientPhone('%fooValue%'); // WHERE client_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientPhone($clientPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientPhone)) {
                $clientPhone = str_replace('*', '%', $clientPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_PHONE, $clientPhone, $comparison);
    }

    /**
     * Filter the query on the client_language column
     *
     * Example usage:
     * <code>
     * $query->filterByClientLanguage('fooValue');   // WHERE client_language = 'fooValue'
     * $query->filterByClientLanguage('%fooValue%'); // WHERE client_language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientLanguage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientLanguage($clientLanguage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientLanguage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientLanguage)) {
                $clientLanguage = str_replace('*', '%', $clientLanguage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_LANGUAGE, $clientLanguage, $comparison);
    }

    /**
     * Filter the query on the client_status column
     *
     * Example usage:
     * <code>
     * $query->filterByClientStatus('fooValue');   // WHERE client_status = 'fooValue'
     * $query->filterByClientStatus('%fooValue%'); // WHERE client_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientStatus($clientStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientStatus)) {
                $clientStatus = str_replace('*', '%', $clientStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_STATUS, $clientStatus, $comparison);
    }

    /**
     * Filter the query on the client_type column
     *
     * Example usage:
     * <code>
     * $query->filterByClientType('fooValue');   // WHERE client_type = 'fooValue'
     * $query->filterByClientType('%fooValue%'); // WHERE client_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clientType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByClientType($clientType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clientType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clientType)) {
                $clientType = str_replace('*', '%', $clientType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::CLIENT_TYPE, $clientType, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ClientPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
        } else {
            throw new PropelException('filterByCompany() only accepts arguments of type Company or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Company relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinCompany($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Company');

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
            $this->addJoinObject($join, 'Company');
        }

        return $this;
    }

    /**
     * Use the Company relation Company object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CompanyQuery A secondary query class using the current class as primary query
     */
    public function useCompanyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompany($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Company', 'CompanyQuery');
    }

    /**
     * Filter the query by a related Chatpublic object
     *
     * @param   Chatpublic|PropelObjectCollection $chatpublic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByChatpublic($chatpublic, $comparison = null)
    {
        if ($chatpublic instanceof Chatpublic) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $chatpublic->getIdclient(), $comparison);
        } elseif ($chatpublic instanceof PropelObjectCollection) {
            return $this
                ->useChatpublicQuery()
                ->filterByPrimaryKeys($chatpublic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChatpublic() only accepts arguments of type Chatpublic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Chatpublic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinChatpublic($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Chatpublic');

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
            $this->addJoinObject($join, 'Chatpublic');
        }

        return $this;
    }

    /**
     * Use the Chatpublic relation Chatpublic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ChatpublicQuery A secondary query class using the current class as primary query
     */
    public function useChatpublicQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinChatpublic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Chatpublic', 'ChatpublicQuery');
    }

    /**
     * Filter the query by a related Clientaddress object
     *
     * @param   Clientaddress|PropelObjectCollection $clientaddress  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientaddress($clientaddress, $comparison = null)
    {
        if ($clientaddress instanceof Clientaddress) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $clientaddress->getIdclient(), $comparison);
        } elseif ($clientaddress instanceof PropelObjectCollection) {
            return $this
                ->useClientaddressQuery()
                ->filterByPrimaryKeys($clientaddress->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientaddress() only accepts arguments of type Clientaddress or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientaddress relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinClientaddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientaddress');

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
            $this->addJoinObject($join, 'Clientaddress');
        }

        return $this;
    }

    /**
     * Use the Clientaddress relation Clientaddress object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientaddressQuery A secondary query class using the current class as primary query
     */
    public function useClientaddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientaddress($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientaddress', 'ClientaddressQuery');
    }

    /**
     * Filter the query by a related Clientcomment object
     *
     * @param   Clientcomment|PropelObjectCollection $clientcomment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientcomment($clientcomment, $comparison = null)
    {
        if ($clientcomment instanceof Clientcomment) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $clientcomment->getIdclient(), $comparison);
        } elseif ($clientcomment instanceof PropelObjectCollection) {
            return $this
                ->useClientcommentQuery()
                ->filterByPrimaryKeys($clientcomment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientcomment() only accepts arguments of type Clientcomment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientcomment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinClientcomment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientcomment');

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
            $this->addJoinObject($join, 'Clientcomment');
        }

        return $this;
    }

    /**
     * Use the Clientcomment relation Clientcomment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientcommentQuery A secondary query class using the current class as primary query
     */
    public function useClientcommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientcomment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientcomment', 'ClientcommentQuery');
    }

    /**
     * Filter the query by a related Clientfile object
     *
     * @param   Clientfile|PropelObjectCollection $clientfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientfile($clientfile, $comparison = null)
    {
        if ($clientfile instanceof Clientfile) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $clientfile->getIdclient(), $comparison);
        } elseif ($clientfile instanceof PropelObjectCollection) {
            return $this
                ->useClientfileQuery()
                ->filterByPrimaryKeys($clientfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientfile() only accepts arguments of type Clientfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinClientfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientfile');

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
            $this->addJoinObject($join, 'Clientfile');
        }

        return $this;
    }

    /**
     * Use the Clientfile relation Clientfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientfileQuery A secondary query class using the current class as primary query
     */
    public function useClientfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientfile', 'ClientfileQuery');
    }

    /**
     * Filter the query by a related Clienttax object
     *
     * @param   Clienttax|PropelObjectCollection $clienttax  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClienttax($clienttax, $comparison = null)
    {
        if ($clienttax instanceof Clienttax) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $clienttax->getIdclient(), $comparison);
        } elseif ($clienttax instanceof PropelObjectCollection) {
            return $this
                ->useClienttaxQuery()
                ->filterByPrimaryKeys($clienttax->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClienttax() only accepts arguments of type Clienttax or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clienttax relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinClienttax($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clienttax');

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
            $this->addJoinObject($join, 'Clienttax');
        }

        return $this;
    }

    /**
     * Use the Clienttax relation Clienttax object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClienttaxQuery A secondary query class using the current class as primary query
     */
    public function useClienttaxQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClienttax($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clienttax', 'ClienttaxQuery');
    }

    /**
     * Filter the query by a related Marketingcampaignclient object
     *
     * @param   Marketingcampaignclient|PropelObjectCollection $marketingcampaignclient  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcampaignclient($marketingcampaignclient, $comparison = null)
    {
        if ($marketingcampaignclient instanceof Marketingcampaignclient) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $marketingcampaignclient->getIdclient(), $comparison);
        } elseif ($marketingcampaignclient instanceof PropelObjectCollection) {
            return $this
                ->useMarketingcampaignclientQuery()
                ->filterByPrimaryKeys($marketingcampaignclient->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingcampaignclient() only accepts arguments of type Marketingcampaignclient or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingcampaignclient relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinMarketingcampaignclient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingcampaignclient');

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
            $this->addJoinObject($join, 'Marketingcampaignclient');
        }

        return $this;
    }

    /**
     * Use the Marketingcampaignclient relation Marketingcampaignclient object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingcampaignclientQuery A secondary query class using the current class as primary query
     */
    public function useMarketingcampaignclientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingcampaignclient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingcampaignclient', 'MarketingcampaignclientQuery');
    }

    /**
     * Filter the query by a related Marketingcandidate object
     *
     * @param   Marketingcandidate|PropelObjectCollection $marketingcandidate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMarketingcandidate($marketingcandidate, $comparison = null)
    {
        if ($marketingcandidate instanceof Marketingcandidate) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $marketingcandidate->getIdclient(), $comparison);
        } elseif ($marketingcandidate instanceof PropelObjectCollection) {
            return $this
                ->useMarketingcandidateQuery()
                ->filterByPrimaryKeys($marketingcandidate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMarketingcandidate() only accepts arguments of type Marketingcandidate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Marketingcandidate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinMarketingcandidate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Marketingcandidate');

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
            $this->addJoinObject($join, 'Marketingcandidate');
        }

        return $this;
    }

    /**
     * Use the Marketingcandidate relation Marketingcandidate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MarketingcandidateQuery A secondary query class using the current class as primary query
     */
    public function useMarketingcandidateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMarketingcandidate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Marketingcandidate', 'MarketingcandidateQuery');
    }

    /**
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(ClientPeer::IDCLIENT, $order->getIdclient(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            return $this
                ->useOrderQuery()
                ->filterByPrimaryKeys($order->getPrimaryKeys())
                ->endUse();
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
     * @return ClientQuery The current query, for fluid interface
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
     * @param   Client $client Object to remove from the list of results
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function prune($client = null)
    {
        if ($client) {
            $this->addUsingAlias(ClientPeer::IDCLIENT, $client->getIdclient(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
