<?php


/**
 * Base class that represents a query for the 'mxtaxdocument' table.
 *
 *
 *
 * @method MxtaxdocumentQuery orderByIdmxtaxdocument($order = Criteria::ASC) Order by the idmxtaxdocument column
 * @method MxtaxdocumentQuery orderByIdclienttax($order = Criteria::ASC) Order by the idclienttax column
 * @method MxtaxdocumentQuery orderByIdorder($order = Criteria::ASC) Order by the idorder column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentFolio($order = Criteria::ASC) Order by the mxtaxdocument_folio column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentVersion($order = Criteria::ASC) Order by the mxtaxdocument_version column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentType($order = Criteria::ASC) Order by the mxtaxdocument_type column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentStatus($order = Criteria::ASC) Order by the mxtaxdocument_status column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentUrlXml($order = Criteria::ASC) Order by the mxtaxdocument_url_xml column
 * @method MxtaxdocumentQuery orderByMxtaxdocumentUrlPdf($order = Criteria::ASC) Order by the mxtaxdocument_url_pdf column
 *
 * @method MxtaxdocumentQuery groupByIdmxtaxdocument() Group by the idmxtaxdocument column
 * @method MxtaxdocumentQuery groupByIdclienttax() Group by the idclienttax column
 * @method MxtaxdocumentQuery groupByIdorder() Group by the idorder column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentFolio() Group by the mxtaxdocument_folio column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentVersion() Group by the mxtaxdocument_version column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentType() Group by the mxtaxdocument_type column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentStatus() Group by the mxtaxdocument_status column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentUrlXml() Group by the mxtaxdocument_url_xml column
 * @method MxtaxdocumentQuery groupByMxtaxdocumentUrlPdf() Group by the mxtaxdocument_url_pdf column
 *
 * @method MxtaxdocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MxtaxdocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MxtaxdocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MxtaxdocumentQuery leftJoinClienttax($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clienttax relation
 * @method MxtaxdocumentQuery rightJoinClienttax($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clienttax relation
 * @method MxtaxdocumentQuery innerJoinClienttax($relationAlias = null) Adds a INNER JOIN clause to the query using the Clienttax relation
 *
 * @method MxtaxdocumentQuery leftJoinOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the Order relation
 * @method MxtaxdocumentQuery rightJoinOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Order relation
 * @method MxtaxdocumentQuery innerJoinOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the Order relation
 *
 * @method Mxtaxdocument findOne(PropelPDO $con = null) Return the first Mxtaxdocument matching the query
 * @method Mxtaxdocument findOneOrCreate(PropelPDO $con = null) Return the first Mxtaxdocument matching the query, or a new Mxtaxdocument object populated from the query conditions when no match is found
 *
 * @method Mxtaxdocument findOneByIdclienttax(int $idclienttax) Return the first Mxtaxdocument filtered by the idclienttax column
 * @method Mxtaxdocument findOneByIdorder(int $idorder) Return the first Mxtaxdocument filtered by the idorder column
 * @method Mxtaxdocument findOneByMxtaxdocumentFolio(string $mxtaxdocument_folio) Return the first Mxtaxdocument filtered by the mxtaxdocument_folio column
 * @method Mxtaxdocument findOneByMxtaxdocumentVersion(string $mxtaxdocument_version) Return the first Mxtaxdocument filtered by the mxtaxdocument_version column
 * @method Mxtaxdocument findOneByMxtaxdocumentType(string $mxtaxdocument_type) Return the first Mxtaxdocument filtered by the mxtaxdocument_type column
 * @method Mxtaxdocument findOneByMxtaxdocumentStatus(string $mxtaxdocument_status) Return the first Mxtaxdocument filtered by the mxtaxdocument_status column
 * @method Mxtaxdocument findOneByMxtaxdocumentUrlXml(string $mxtaxdocument_url_xml) Return the first Mxtaxdocument filtered by the mxtaxdocument_url_xml column
 * @method Mxtaxdocument findOneByMxtaxdocumentUrlPdf(string $mxtaxdocument_url_pdf) Return the first Mxtaxdocument filtered by the mxtaxdocument_url_pdf column
 *
 * @method array findByIdmxtaxdocument(int $idmxtaxdocument) Return Mxtaxdocument objects filtered by the idmxtaxdocument column
 * @method array findByIdclienttax(int $idclienttax) Return Mxtaxdocument objects filtered by the idclienttax column
 * @method array findByIdorder(int $idorder) Return Mxtaxdocument objects filtered by the idorder column
 * @method array findByMxtaxdocumentFolio(string $mxtaxdocument_folio) Return Mxtaxdocument objects filtered by the mxtaxdocument_folio column
 * @method array findByMxtaxdocumentVersion(string $mxtaxdocument_version) Return Mxtaxdocument objects filtered by the mxtaxdocument_version column
 * @method array findByMxtaxdocumentType(string $mxtaxdocument_type) Return Mxtaxdocument objects filtered by the mxtaxdocument_type column
 * @method array findByMxtaxdocumentStatus(string $mxtaxdocument_status) Return Mxtaxdocument objects filtered by the mxtaxdocument_status column
 * @method array findByMxtaxdocumentUrlXml(string $mxtaxdocument_url_xml) Return Mxtaxdocument objects filtered by the mxtaxdocument_url_xml column
 * @method array findByMxtaxdocumentUrlPdf(string $mxtaxdocument_url_pdf) Return Mxtaxdocument objects filtered by the mxtaxdocument_url_pdf column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMxtaxdocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMxtaxdocumentQuery object.
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
            $modelName = 'Mxtaxdocument';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MxtaxdocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MxtaxdocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MxtaxdocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MxtaxdocumentQuery) {
            return $criteria;
        }
        $query = new MxtaxdocumentQuery(null, null, $modelAlias);

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
     * @return   Mxtaxdocument|Mxtaxdocument[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MxtaxdocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mxtaxdocument A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmxtaxdocument($key, $con = null)
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
     * @return                 Mxtaxdocument A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmxtaxdocument`, `idclienttax`, `idorder`, `mxtaxdocument_folio`, `mxtaxdocument_version`, `mxtaxdocument_type`, `mxtaxdocument_status`, `mxtaxdocument_url_xml`, `mxtaxdocument_url_pdf` FROM `mxtaxdocument` WHERE `idmxtaxdocument` = :p0';
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
            $obj = new Mxtaxdocument();
            $obj->hydrate($row);
            MxtaxdocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mxtaxdocument|Mxtaxdocument[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mxtaxdocument[]|mixed the list of results, formatted by the current formatter
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
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmxtaxdocument column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmxtaxdocument(1234); // WHERE idmxtaxdocument = 1234
     * $query->filterByIdmxtaxdocument(array(12, 34)); // WHERE idmxtaxdocument IN (12, 34)
     * $query->filterByIdmxtaxdocument(array('min' => 12)); // WHERE idmxtaxdocument >= 12
     * $query->filterByIdmxtaxdocument(array('max' => 12)); // WHERE idmxtaxdocument <= 12
     * </code>
     *
     * @param     mixed $idmxtaxdocument The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByIdmxtaxdocument($idmxtaxdocument = null, $comparison = null)
    {
        if (is_array($idmxtaxdocument)) {
            $useMinMax = false;
            if (isset($idmxtaxdocument['min'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $idmxtaxdocument['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmxtaxdocument['max'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $idmxtaxdocument['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $idmxtaxdocument, $comparison);
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
     * @see       filterByClienttax()
     *
     * @param     mixed $idclienttax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByIdclienttax($idclienttax = null, $comparison = null)
    {
        if (is_array($idclienttax)) {
            $useMinMax = false;
            if (isset($idclienttax['min'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDCLIENTTAX, $idclienttax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclienttax['max'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDCLIENTTAX, $idclienttax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::IDCLIENTTAX, $idclienttax, $comparison);
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
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByIdorder($idorder = null, $comparison = null)
    {
        if (is_array($idorder)) {
            $useMinMax = false;
            if (isset($idorder['min'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDORDER, $idorder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idorder['max'])) {
                $this->addUsingAlias(MxtaxdocumentPeer::IDORDER, $idorder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::IDORDER, $idorder, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_folio column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentFolio('fooValue');   // WHERE mxtaxdocument_folio = 'fooValue'
     * $query->filterByMxtaxdocumentFolio('%fooValue%'); // WHERE mxtaxdocument_folio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentFolio The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentFolio($mxtaxdocumentFolio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentFolio)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentFolio)) {
                $mxtaxdocumentFolio = str_replace('*', '%', $mxtaxdocumentFolio);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO, $mxtaxdocumentFolio, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_version column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentVersion('fooValue');   // WHERE mxtaxdocument_version = 'fooValue'
     * $query->filterByMxtaxdocumentVersion('%fooValue%'); // WHERE mxtaxdocument_version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentVersion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentVersion($mxtaxdocumentVersion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentVersion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentVersion)) {
                $mxtaxdocumentVersion = str_replace('*', '%', $mxtaxdocumentVersion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION, $mxtaxdocumentVersion, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentType('fooValue');   // WHERE mxtaxdocument_type = 'fooValue'
     * $query->filterByMxtaxdocumentType('%fooValue%'); // WHERE mxtaxdocument_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentType($mxtaxdocumentType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentType)) {
                $mxtaxdocumentType = str_replace('*', '%', $mxtaxdocumentType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE, $mxtaxdocumentType, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_status column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentStatus('fooValue');   // WHERE mxtaxdocument_status = 'fooValue'
     * $query->filterByMxtaxdocumentStatus('%fooValue%'); // WHERE mxtaxdocument_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentStatus($mxtaxdocumentStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentStatus)) {
                $mxtaxdocumentStatus = str_replace('*', '%', $mxtaxdocumentStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS, $mxtaxdocumentStatus, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_url_xml column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentUrlXml('fooValue');   // WHERE mxtaxdocument_url_xml = 'fooValue'
     * $query->filterByMxtaxdocumentUrlXml('%fooValue%'); // WHERE mxtaxdocument_url_xml LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentUrlXml The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentUrlXml($mxtaxdocumentUrlXml = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentUrlXml)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentUrlXml)) {
                $mxtaxdocumentUrlXml = str_replace('*', '%', $mxtaxdocumentUrlXml);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML, $mxtaxdocumentUrlXml, $comparison);
    }

    /**
     * Filter the query on the mxtaxdocument_url_pdf column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxdocumentUrlPdf('fooValue');   // WHERE mxtaxdocument_url_pdf = 'fooValue'
     * $query->filterByMxtaxdocumentUrlPdf('%fooValue%'); // WHERE mxtaxdocument_url_pdf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxdocumentUrlPdf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function filterByMxtaxdocumentUrlPdf($mxtaxdocumentUrlPdf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxdocumentUrlPdf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxdocumentUrlPdf)) {
                $mxtaxdocumentUrlPdf = str_replace('*', '%', $mxtaxdocumentUrlPdf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF, $mxtaxdocumentUrlPdf, $comparison);
    }

    /**
     * Filter the query by a related Clienttax object
     *
     * @param   Clienttax|PropelObjectCollection $clienttax The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MxtaxdocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClienttax($clienttax, $comparison = null)
    {
        if ($clienttax instanceof Clienttax) {
            return $this
                ->addUsingAlias(MxtaxdocumentPeer::IDCLIENTTAX, $clienttax->getIdclienttax(), $comparison);
        } elseif ($clienttax instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MxtaxdocumentPeer::IDCLIENTTAX, $clienttax->toKeyValue('PrimaryKey', 'Idclienttax'), $comparison);
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
     * @return MxtaxdocumentQuery The current query, for fluid interface
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
     * Filter the query by a related Order object
     *
     * @param   Order|PropelObjectCollection $order The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MxtaxdocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrder($order, $comparison = null)
    {
        if ($order instanceof Order) {
            return $this
                ->addUsingAlias(MxtaxdocumentPeer::IDORDER, $order->getIdorder(), $comparison);
        } elseif ($order instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MxtaxdocumentPeer::IDORDER, $order->toKeyValue('PrimaryKey', 'Idorder'), $comparison);
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
     * @return MxtaxdocumentQuery The current query, for fluid interface
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
     * @param   Mxtaxdocument $mxtaxdocument Object to remove from the list of results
     *
     * @return MxtaxdocumentQuery The current query, for fluid interface
     */
    public function prune($mxtaxdocument = null)
    {
        if ($mxtaxdocument) {
            $this->addUsingAlias(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $mxtaxdocument->getIdmxtaxdocument(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
