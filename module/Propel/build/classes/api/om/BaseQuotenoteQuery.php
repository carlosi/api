<?php


/**
 * Base class that represents a query for the 'quotenote' table.
 *
 *
 *
 * @method QuotenoteQuery orderByIdquotenote($order = Criteria::ASC) Order by the idquotenote column
 * @method QuotenoteQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method QuotenoteQuery orderByIdquote($order = Criteria::ASC) Order by the idquote column
 * @method QuotenoteQuery orderByQuotenoteNote($order = Criteria::ASC) Order by the quotenote_note column
 * @method QuotenoteQuery orderByQuotenoteDate($order = Criteria::ASC) Order by the quotenote_date column
 *
 * @method QuotenoteQuery groupByIdquotenote() Group by the idquotenote column
 * @method QuotenoteQuery groupByIduser() Group by the iduser column
 * @method QuotenoteQuery groupByIdquote() Group by the idquote column
 * @method QuotenoteQuery groupByQuotenoteNote() Group by the quotenote_note column
 * @method QuotenoteQuery groupByQuotenoteDate() Group by the quotenote_date column
 *
 * @method QuotenoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuotenoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuotenoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Quotenote findOne(PropelPDO $con = null) Return the first Quotenote matching the query
 * @method Quotenote findOneOrCreate(PropelPDO $con = null) Return the first Quotenote matching the query, or a new Quotenote object populated from the query conditions when no match is found
 *
 * @method Quotenote findOneByIduser(int $iduser) Return the first Quotenote filtered by the iduser column
 * @method Quotenote findOneByIdquote(int $idquote) Return the first Quotenote filtered by the idquote column
 * @method Quotenote findOneByQuotenoteNote(string $quotenote_note) Return the first Quotenote filtered by the quotenote_note column
 * @method Quotenote findOneByQuotenoteDate(string $quotenote_date) Return the first Quotenote filtered by the quotenote_date column
 *
 * @method array findByIdquotenote(int $idquotenote) Return Quotenote objects filtered by the idquotenote column
 * @method array findByIduser(int $iduser) Return Quotenote objects filtered by the iduser column
 * @method array findByIdquote(int $idquote) Return Quotenote objects filtered by the idquote column
 * @method array findByQuotenoteNote(string $quotenote_note) Return Quotenote objects filtered by the quotenote_note column
 * @method array findByQuotenoteDate(string $quotenote_date) Return Quotenote objects filtered by the quotenote_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuotenoteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuotenoteQuery object.
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
            $modelName = 'Quotenote';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuotenoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuotenoteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuotenoteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuotenoteQuery) {
            return $criteria;
        }
        $query = new QuotenoteQuery(null, null, $modelAlias);

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
     * @return   Quotenote|Quotenote[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotenotePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotenotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quotenote A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdquotenote($key, $con = null)
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
     * @return                 Quotenote A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idquotenote`, `iduser`, `idquote`, `quotenote_note`, `quotenote_date` FROM `quotenote` WHERE `idquotenote` = :p0';
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
            $obj = new Quotenote();
            $obj->hydrate($row);
            QuotenotePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quotenote|Quotenote[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quotenote[]|mixed the list of results, formatted by the current formatter
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
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idquotenote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquotenote(1234); // WHERE idquotenote = 1234
     * $query->filterByIdquotenote(array(12, 34)); // WHERE idquotenote IN (12, 34)
     * $query->filterByIdquotenote(array('min' => 12)); // WHERE idquotenote >= 12
     * $query->filterByIdquotenote(array('max' => 12)); // WHERE idquotenote <= 12
     * </code>
     *
     * @param     mixed $idquotenote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByIdquotenote($idquotenote = null, $comparison = null)
    {
        if (is_array($idquotenote)) {
            $useMinMax = false;
            if (isset($idquotenote['min'])) {
                $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $idquotenote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquotenote['max'])) {
                $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $idquotenote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $idquotenote, $comparison);
    }

    /**
     * Filter the query on the iduser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE iduser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE iduser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE iduser >= 12
     * $query->filterByIduser(array('max' => 12)); // WHERE iduser <= 12
     * </code>
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(QuotenotePeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(QuotenotePeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotenotePeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the idquote column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquote(1234); // WHERE idquote = 1234
     * $query->filterByIdquote(array(12, 34)); // WHERE idquote IN (12, 34)
     * $query->filterByIdquote(array('min' => 12)); // WHERE idquote >= 12
     * $query->filterByIdquote(array('max' => 12)); // WHERE idquote <= 12
     * </code>
     *
     * @param     mixed $idquote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByIdquote($idquote = null, $comparison = null)
    {
        if (is_array($idquote)) {
            $useMinMax = false;
            if (isset($idquote['min'])) {
                $this->addUsingAlias(QuotenotePeer::IDQUOTE, $idquote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquote['max'])) {
                $this->addUsingAlias(QuotenotePeer::IDQUOTE, $idquote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotenotePeer::IDQUOTE, $idquote, $comparison);
    }

    /**
     * Filter the query on the quotenote_note column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotenoteNote('fooValue');   // WHERE quotenote_note = 'fooValue'
     * $query->filterByQuotenoteNote('%fooValue%'); // WHERE quotenote_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotenoteNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByQuotenoteNote($quotenoteNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotenoteNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quotenoteNote)) {
                $quotenoteNote = str_replace('*', '%', $quotenoteNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuotenotePeer::QUOTENOTE_NOTE, $quotenoteNote, $comparison);
    }

    /**
     * Filter the query on the quotenote_date column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotenoteDate('2011-03-14'); // WHERE quotenote_date = '2011-03-14'
     * $query->filterByQuotenoteDate('now'); // WHERE quotenote_date = '2011-03-14'
     * $query->filterByQuotenoteDate(array('max' => 'yesterday')); // WHERE quotenote_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $quotenoteDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function filterByQuotenoteDate($quotenoteDate = null, $comparison = null)
    {
        if (is_array($quotenoteDate)) {
            $useMinMax = false;
            if (isset($quotenoteDate['min'])) {
                $this->addUsingAlias(QuotenotePeer::QUOTENOTE_DATE, $quotenoteDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotenoteDate['max'])) {
                $this->addUsingAlias(QuotenotePeer::QUOTENOTE_DATE, $quotenoteDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotenotePeer::QUOTENOTE_DATE, $quotenoteDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Quotenote $quotenote Object to remove from the list of results
     *
     * @return QuotenoteQuery The current query, for fluid interface
     */
    public function prune($quotenote = null)
    {
        if ($quotenote) {
            $this->addUsingAlias(QuotenotePeer::IDQUOTENOTE, $quotenote->getIdquotenote(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
