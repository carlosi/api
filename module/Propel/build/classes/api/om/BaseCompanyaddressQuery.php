<?php


/**
 * Base class that represents a query for the 'companyaddress' table.
 *
 *
 *
 * @method CompanyaddressQuery orderByIdcompanyaddress($order = Criteria::ASC) Order by the idcompanyaddress column
 * @method CompanyaddressQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method CompanyaddressQuery orderByCompanyaddressIsoCodecountry($order = Criteria::ASC) Order by the companyaddress_iso_codecountry column
 * @method CompanyaddressQuery orderByCompanyaddressIsoCodephone($order = Criteria::ASC) Order by the companyaddress_iso_codephone column
 * @method CompanyaddressQuery orderByCompanyaddressAddressee($order = Criteria::ASC) Order by the companyaddress_addressee column
 * @method CompanyaddressQuery orderByCompanyaddressAddresseeCellular($order = Criteria::ASC) Order by the companyaddress_addressee_cellular column
 * @method CompanyaddressQuery orderByCompanyaddressAddresseePhone($order = Criteria::ASC) Order by the companyaddress_addressee_phone column
 * @method CompanyaddressQuery orderByCompanyaddressAddress($order = Criteria::ASC) Order by the companyaddress_address column
 * @method CompanyaddressQuery orderByCompanyaddressAddress2($order = Criteria::ASC) Order by the companyaddress_address2 column
 * @method CompanyaddressQuery orderByCompanyaddressCity($order = Criteria::ASC) Order by the companyaddress_city column
 * @method CompanyaddressQuery orderByCompanyaddressState($order = Criteria::ASC) Order by the companyaddress_state column
 * @method CompanyaddressQuery orderByCompanyaddressZipcode($order = Criteria::ASC) Order by the companyaddress_zipcode column
 *
 * @method CompanyaddressQuery groupByIdcompanyaddress() Group by the idcompanyaddress column
 * @method CompanyaddressQuery groupByIdcompany() Group by the idcompany column
 * @method CompanyaddressQuery groupByCompanyaddressIsoCodecountry() Group by the companyaddress_iso_codecountry column
 * @method CompanyaddressQuery groupByCompanyaddressIsoCodephone() Group by the companyaddress_iso_codephone column
 * @method CompanyaddressQuery groupByCompanyaddressAddressee() Group by the companyaddress_addressee column
 * @method CompanyaddressQuery groupByCompanyaddressAddresseeCellular() Group by the companyaddress_addressee_cellular column
 * @method CompanyaddressQuery groupByCompanyaddressAddresseePhone() Group by the companyaddress_addressee_phone column
 * @method CompanyaddressQuery groupByCompanyaddressAddress() Group by the companyaddress_address column
 * @method CompanyaddressQuery groupByCompanyaddressAddress2() Group by the companyaddress_address2 column
 * @method CompanyaddressQuery groupByCompanyaddressCity() Group by the companyaddress_city column
 * @method CompanyaddressQuery groupByCompanyaddressState() Group by the companyaddress_state column
 * @method CompanyaddressQuery groupByCompanyaddressZipcode() Group by the companyaddress_zipcode column
 *
 * @method CompanyaddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompanyaddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompanyaddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CompanyaddressQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method CompanyaddressQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method CompanyaddressQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method Companyaddress findOne(PropelPDO $con = null) Return the first Companyaddress matching the query
 * @method Companyaddress findOneOrCreate(PropelPDO $con = null) Return the first Companyaddress matching the query, or a new Companyaddress object populated from the query conditions when no match is found
 *
 * @method Companyaddress findOneByIdcompany(int $idcompany) Return the first Companyaddress filtered by the idcompany column
 * @method Companyaddress findOneByCompanyaddressIsoCodecountry(string $companyaddress_iso_codecountry) Return the first Companyaddress filtered by the companyaddress_iso_codecountry column
 * @method Companyaddress findOneByCompanyaddressIsoCodephone(string $companyaddress_iso_codephone) Return the first Companyaddress filtered by the companyaddress_iso_codephone column
 * @method Companyaddress findOneByCompanyaddressAddressee(string $companyaddress_addressee) Return the first Companyaddress filtered by the companyaddress_addressee column
 * @method Companyaddress findOneByCompanyaddressAddresseeCellular(string $companyaddress_addressee_cellular) Return the first Companyaddress filtered by the companyaddress_addressee_cellular column
 * @method Companyaddress findOneByCompanyaddressAddresseePhone(string $companyaddress_addressee_phone) Return the first Companyaddress filtered by the companyaddress_addressee_phone column
 * @method Companyaddress findOneByCompanyaddressAddress(string $companyaddress_address) Return the first Companyaddress filtered by the companyaddress_address column
 * @method Companyaddress findOneByCompanyaddressAddress2(string $companyaddress_address2) Return the first Companyaddress filtered by the companyaddress_address2 column
 * @method Companyaddress findOneByCompanyaddressCity(string $companyaddress_city) Return the first Companyaddress filtered by the companyaddress_city column
 * @method Companyaddress findOneByCompanyaddressState(string $companyaddress_state) Return the first Companyaddress filtered by the companyaddress_state column
 * @method Companyaddress findOneByCompanyaddressZipcode(string $companyaddress_zipcode) Return the first Companyaddress filtered by the companyaddress_zipcode column
 *
 * @method array findByIdcompanyaddress(int $idcompanyaddress) Return Companyaddress objects filtered by the idcompanyaddress column
 * @method array findByIdcompany(int $idcompany) Return Companyaddress objects filtered by the idcompany column
 * @method array findByCompanyaddressIsoCodecountry(string $companyaddress_iso_codecountry) Return Companyaddress objects filtered by the companyaddress_iso_codecountry column
 * @method array findByCompanyaddressIsoCodephone(string $companyaddress_iso_codephone) Return Companyaddress objects filtered by the companyaddress_iso_codephone column
 * @method array findByCompanyaddressAddressee(string $companyaddress_addressee) Return Companyaddress objects filtered by the companyaddress_addressee column
 * @method array findByCompanyaddressAddresseeCellular(string $companyaddress_addressee_cellular) Return Companyaddress objects filtered by the companyaddress_addressee_cellular column
 * @method array findByCompanyaddressAddresseePhone(string $companyaddress_addressee_phone) Return Companyaddress objects filtered by the companyaddress_addressee_phone column
 * @method array findByCompanyaddressAddress(string $companyaddress_address) Return Companyaddress objects filtered by the companyaddress_address column
 * @method array findByCompanyaddressAddress2(string $companyaddress_address2) Return Companyaddress objects filtered by the companyaddress_address2 column
 * @method array findByCompanyaddressCity(string $companyaddress_city) Return Companyaddress objects filtered by the companyaddress_city column
 * @method array findByCompanyaddressState(string $companyaddress_state) Return Companyaddress objects filtered by the companyaddress_state column
 * @method array findByCompanyaddressZipcode(string $companyaddress_zipcode) Return Companyaddress objects filtered by the companyaddress_zipcode column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseCompanyaddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompanyaddressQuery object.
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
            $modelName = 'Companyaddress';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompanyaddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CompanyaddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompanyaddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompanyaddressQuery) {
            return $criteria;
        }
        $query = new CompanyaddressQuery(null, null, $modelAlias);

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
     * @return   Companyaddress|Companyaddress[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompanyaddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Companyaddress A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcompanyaddress($key, $con = null)
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
     * @return                 Companyaddress A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcompanyaddress`, `idcompany`, `companyaddress_iso_codecountry`, `companyaddress_iso_codephone`, `companyaddress_addressee`, `companyaddress_addressee_cellular`, `companyaddress_addressee_phone`, `companyaddress_address`, `companyaddress_address2`, `companyaddress_city`, `companyaddress_state`, `companyaddress_zipcode` FROM `companyaddress` WHERE `idcompanyaddress` = :p0';
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
            $obj = new Companyaddress();
            $obj->hydrate($row);
            CompanyaddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Companyaddress|Companyaddress[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Companyaddress[]|mixed the list of results, formatted by the current formatter
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
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcompanyaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcompanyaddress(1234); // WHERE idcompanyaddress = 1234
     * $query->filterByIdcompanyaddress(array(12, 34)); // WHERE idcompanyaddress IN (12, 34)
     * $query->filterByIdcompanyaddress(array('min' => 12)); // WHERE idcompanyaddress >= 12
     * $query->filterByIdcompanyaddress(array('max' => 12)); // WHERE idcompanyaddress <= 12
     * </code>
     *
     * @param     mixed $idcompanyaddress The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByIdcompanyaddress($idcompanyaddress = null, $comparison = null)
    {
        if (is_array($idcompanyaddress)) {
            $useMinMax = false;
            if (isset($idcompanyaddress['min'])) {
                $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $idcompanyaddress['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompanyaddress['max'])) {
                $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $idcompanyaddress['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $idcompanyaddress, $comparison);
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
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(CompanyaddressPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(CompanyaddressPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the companyaddress_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressIsoCodecountry('fooValue');   // WHERE companyaddress_iso_codecountry = 'fooValue'
     * $query->filterByCompanyaddressIsoCodecountry('%fooValue%'); // WHERE companyaddress_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressIsoCodecountry($companyaddressIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressIsoCodecountry)) {
                $companyaddressIsoCodecountry = str_replace('*', '%', $companyaddressIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY, $companyaddressIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the companyaddress_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressIsoCodephone('fooValue');   // WHERE companyaddress_iso_codephone = 'fooValue'
     * $query->filterByCompanyaddressIsoCodephone('%fooValue%'); // WHERE companyaddress_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressIsoCodephone($companyaddressIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressIsoCodephone)) {
                $companyaddressIsoCodephone = str_replace('*', '%', $companyaddressIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE, $companyaddressIsoCodephone, $comparison);
    }

    /**
     * Filter the query on the companyaddress_addressee column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressAddressee('fooValue');   // WHERE companyaddress_addressee = 'fooValue'
     * $query->filterByCompanyaddressAddressee('%fooValue%'); // WHERE companyaddress_addressee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressAddressee The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressAddressee($companyaddressAddressee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressAddressee)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressAddressee)) {
                $companyaddressAddressee = str_replace('*', '%', $companyaddressAddressee);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE, $companyaddressAddressee, $comparison);
    }

    /**
     * Filter the query on the companyaddress_addressee_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressAddresseeCellular('fooValue');   // WHERE companyaddress_addressee_cellular = 'fooValue'
     * $query->filterByCompanyaddressAddresseeCellular('%fooValue%'); // WHERE companyaddress_addressee_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressAddresseeCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressAddresseeCellular($companyaddressAddresseeCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressAddresseeCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressAddresseeCellular)) {
                $companyaddressAddresseeCellular = str_replace('*', '%', $companyaddressAddresseeCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR, $companyaddressAddresseeCellular, $comparison);
    }

    /**
     * Filter the query on the companyaddress_addressee_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressAddresseePhone('fooValue');   // WHERE companyaddress_addressee_phone = 'fooValue'
     * $query->filterByCompanyaddressAddresseePhone('%fooValue%'); // WHERE companyaddress_addressee_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressAddresseePhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressAddresseePhone($companyaddressAddresseePhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressAddresseePhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressAddresseePhone)) {
                $companyaddressAddresseePhone = str_replace('*', '%', $companyaddressAddresseePhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE, $companyaddressAddresseePhone, $comparison);
    }

    /**
     * Filter the query on the companyaddress_address column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressAddress('fooValue');   // WHERE companyaddress_address = 'fooValue'
     * $query->filterByCompanyaddressAddress('%fooValue%'); // WHERE companyaddress_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressAddress($companyaddressAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressAddress)) {
                $companyaddressAddress = str_replace('*', '%', $companyaddressAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ADDRESS, $companyaddressAddress, $comparison);
    }

    /**
     * Filter the query on the companyaddress_address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressAddress2('fooValue');   // WHERE companyaddress_address2 = 'fooValue'
     * $query->filterByCompanyaddressAddress2('%fooValue%'); // WHERE companyaddress_address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressAddress2($companyaddressAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressAddress2)) {
                $companyaddressAddress2 = str_replace('*', '%', $companyaddressAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ADDRESS2, $companyaddressAddress2, $comparison);
    }

    /**
     * Filter the query on the companyaddress_city column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressCity('fooValue');   // WHERE companyaddress_city = 'fooValue'
     * $query->filterByCompanyaddressCity('%fooValue%'); // WHERE companyaddress_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressCity($companyaddressCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressCity)) {
                $companyaddressCity = str_replace('*', '%', $companyaddressCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_CITY, $companyaddressCity, $comparison);
    }

    /**
     * Filter the query on the companyaddress_state column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressState('fooValue');   // WHERE companyaddress_state = 'fooValue'
     * $query->filterByCompanyaddressState('%fooValue%'); // WHERE companyaddress_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressState($companyaddressState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressState)) {
                $companyaddressState = str_replace('*', '%', $companyaddressState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_STATE, $companyaddressState, $comparison);
    }

    /**
     * Filter the query on the companyaddress_zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCompanyaddressZipcode('fooValue');   // WHERE companyaddress_zipcode = 'fooValue'
     * $query->filterByCompanyaddressZipcode('%fooValue%'); // WHERE companyaddress_zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $companyaddressZipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function filterByCompanyaddressZipcode($companyaddressZipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($companyaddressZipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $companyaddressZipcode)) {
                $companyaddressZipcode = str_replace('*', '%', $companyaddressZipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompanyaddressPeer::COMPANYADDRESS_ZIPCODE, $companyaddressZipcode, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompanyaddressQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(CompanyaddressPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompanyaddressPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return CompanyaddressQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Companyaddress $companyaddress Object to remove from the list of results
     *
     * @return CompanyaddressQuery The current query, for fluid interface
     */
    public function prune($companyaddress = null)
    {
        if ($companyaddress) {
            $this->addUsingAlias(CompanyaddressPeer::IDCOMPANYADDRESS, $companyaddress->getIdcompanyaddress(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
