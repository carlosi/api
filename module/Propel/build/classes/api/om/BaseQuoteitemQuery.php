<?php


/**
 * Base class that represents a query for the 'quoteitem' table.
 *
 *
 *
 * @method QuoteitemQuery orderByIdquoteitem($order = Criteria::ASC) Order by the idquoteitem column
 * @method QuoteitemQuery orderByIdquote($order = Criteria::ASC) Order by the idquote column
 * @method QuoteitemQuery orderByIdproduct($order = Criteria::ASC) Order by the idproduct column
 * @method QuoteitemQuery orderByOrderquoteQuantity($order = Criteria::ASC) Order by the orderquote_quantity column
 * @method QuoteitemQuery orderByOrderquoteOfficialvalue($order = Criteria::ASC) Order by the orderquote_officialvalue column
 * @method QuoteitemQuery orderByOrderquoteEndvalue($order = Criteria::ASC) Order by the orderquote_endvalue column
 * @method QuoteitemQuery orderByOrderquoteNote($order = Criteria::ASC) Order by the orderquote_note column
 *
 * @method QuoteitemQuery groupByIdquoteitem() Group by the idquoteitem column
 * @method QuoteitemQuery groupByIdquote() Group by the idquote column
 * @method QuoteitemQuery groupByIdproduct() Group by the idproduct column
 * @method QuoteitemQuery groupByOrderquoteQuantity() Group by the orderquote_quantity column
 * @method QuoteitemQuery groupByOrderquoteOfficialvalue() Group by the orderquote_officialvalue column
 * @method QuoteitemQuery groupByOrderquoteEndvalue() Group by the orderquote_endvalue column
 * @method QuoteitemQuery groupByOrderquoteNote() Group by the orderquote_note column
 *
 * @method QuoteitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuoteitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuoteitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuoteitemQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method QuoteitemQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method QuoteitemQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method QuoteitemQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method QuoteitemQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method QuoteitemQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method Quoteitem findOne(PropelPDO $con = null) Return the first Quoteitem matching the query
 * @method Quoteitem findOneOrCreate(PropelPDO $con = null) Return the first Quoteitem matching the query, or a new Quoteitem object populated from the query conditions when no match is found
 *
 * @method Quoteitem findOneByIdquote(int $idquote) Return the first Quoteitem filtered by the idquote column
 * @method Quoteitem findOneByIdproduct(int $idproduct) Return the first Quoteitem filtered by the idproduct column
 * @method Quoteitem findOneByOrderquoteQuantity(string $orderquote_quantity) Return the first Quoteitem filtered by the orderquote_quantity column
 * @method Quoteitem findOneByOrderquoteOfficialvalue(string $orderquote_officialvalue) Return the first Quoteitem filtered by the orderquote_officialvalue column
 * @method Quoteitem findOneByOrderquoteEndvalue(string $orderquote_endvalue) Return the first Quoteitem filtered by the orderquote_endvalue column
 * @method Quoteitem findOneByOrderquoteNote(string $orderquote_note) Return the first Quoteitem filtered by the orderquote_note column
 *
 * @method array findByIdquoteitem(int $idquoteitem) Return Quoteitem objects filtered by the idquoteitem column
 * @method array findByIdquote(int $idquote) Return Quoteitem objects filtered by the idquote column
 * @method array findByIdproduct(int $idproduct) Return Quoteitem objects filtered by the idproduct column
 * @method array findByOrderquoteQuantity(string $orderquote_quantity) Return Quoteitem objects filtered by the orderquote_quantity column
 * @method array findByOrderquoteOfficialvalue(string $orderquote_officialvalue) Return Quoteitem objects filtered by the orderquote_officialvalue column
 * @method array findByOrderquoteEndvalue(string $orderquote_endvalue) Return Quoteitem objects filtered by the orderquote_endvalue column
 * @method array findByOrderquoteNote(string $orderquote_note) Return Quoteitem objects filtered by the orderquote_note column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuoteitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuoteitemQuery object.
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
            $modelName = 'Quoteitem';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuoteitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuoteitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuoteitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuoteitemQuery) {
            return $criteria;
        }
        $query = new QuoteitemQuery(null, null, $modelAlias);

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
     * @return   Quoteitem|Quoteitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuoteitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuoteitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quoteitem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdquoteitem($key, $con = null)
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
     * @return                 Quoteitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idquoteitem`, `idquote`, `idproduct`, `orderquote_quantity`, `orderquote_officialvalue`, `orderquote_endvalue`, `orderquote_note` FROM `quoteitem` WHERE `idquoteitem` = :p0';
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
            $obj = new Quoteitem();
            $obj->hydrate($row);
            QuoteitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quoteitem|Quoteitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quoteitem[]|mixed the list of results, formatted by the current formatter
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
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idquoteitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdquoteitem(1234); // WHERE idquoteitem = 1234
     * $query->filterByIdquoteitem(array(12, 34)); // WHERE idquoteitem IN (12, 34)
     * $query->filterByIdquoteitem(array('min' => 12)); // WHERE idquoteitem >= 12
     * $query->filterByIdquoteitem(array('max' => 12)); // WHERE idquoteitem <= 12
     * </code>
     *
     * @param     mixed $idquoteitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByIdquoteitem($idquoteitem = null, $comparison = null)
    {
        if (is_array($idquoteitem)) {
            $useMinMax = false;
            if (isset($idquoteitem['min'])) {
                $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $idquoteitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquoteitem['max'])) {
                $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $idquoteitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $idquoteitem, $comparison);
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
     * @see       filterByQuote()
     *
     * @param     mixed $idquote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByIdquote($idquote = null, $comparison = null)
    {
        if (is_array($idquote)) {
            $useMinMax = false;
            if (isset($idquote['min'])) {
                $this->addUsingAlias(QuoteitemPeer::IDQUOTE, $idquote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idquote['max'])) {
                $this->addUsingAlias(QuoteitemPeer::IDQUOTE, $idquote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::IDQUOTE, $idquote, $comparison);
    }

    /**
     * Filter the query on the idproduct column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproduct(1234); // WHERE idproduct = 1234
     * $query->filterByIdproduct(array(12, 34)); // WHERE idproduct IN (12, 34)
     * $query->filterByIdproduct(array('min' => 12)); // WHERE idproduct >= 12
     * $query->filterByIdproduct(array('max' => 12)); // WHERE idproduct <= 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $idproduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByIdproduct($idproduct = null, $comparison = null)
    {
        if (is_array($idproduct)) {
            $useMinMax = false;
            if (isset($idproduct['min'])) {
                $this->addUsingAlias(QuoteitemPeer::IDPRODUCT, $idproduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduct['max'])) {
                $this->addUsingAlias(QuoteitemPeer::IDPRODUCT, $idproduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::IDPRODUCT, $idproduct, $comparison);
    }

    /**
     * Filter the query on the orderquote_quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderquoteQuantity(1234); // WHERE orderquote_quantity = 1234
     * $query->filterByOrderquoteQuantity(array(12, 34)); // WHERE orderquote_quantity IN (12, 34)
     * $query->filterByOrderquoteQuantity(array('min' => 12)); // WHERE orderquote_quantity >= 12
     * $query->filterByOrderquoteQuantity(array('max' => 12)); // WHERE orderquote_quantity <= 12
     * </code>
     *
     * @param     mixed $orderquoteQuantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByOrderquoteQuantity($orderquoteQuantity = null, $comparison = null)
    {
        if (is_array($orderquoteQuantity)) {
            $useMinMax = false;
            if (isset($orderquoteQuantity['min'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_QUANTITY, $orderquoteQuantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderquoteQuantity['max'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_QUANTITY, $orderquoteQuantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_QUANTITY, $orderquoteQuantity, $comparison);
    }

    /**
     * Filter the query on the orderquote_officialvalue column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderquoteOfficialvalue(1234); // WHERE orderquote_officialvalue = 1234
     * $query->filterByOrderquoteOfficialvalue(array(12, 34)); // WHERE orderquote_officialvalue IN (12, 34)
     * $query->filterByOrderquoteOfficialvalue(array('min' => 12)); // WHERE orderquote_officialvalue >= 12
     * $query->filterByOrderquoteOfficialvalue(array('max' => 12)); // WHERE orderquote_officialvalue <= 12
     * </code>
     *
     * @param     mixed $orderquoteOfficialvalue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByOrderquoteOfficialvalue($orderquoteOfficialvalue = null, $comparison = null)
    {
        if (is_array($orderquoteOfficialvalue)) {
            $useMinMax = false;
            if (isset($orderquoteOfficialvalue['min'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE, $orderquoteOfficialvalue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderquoteOfficialvalue['max'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE, $orderquoteOfficialvalue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE, $orderquoteOfficialvalue, $comparison);
    }

    /**
     * Filter the query on the orderquote_endvalue column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderquoteEndvalue(1234); // WHERE orderquote_endvalue = 1234
     * $query->filterByOrderquoteEndvalue(array(12, 34)); // WHERE orderquote_endvalue IN (12, 34)
     * $query->filterByOrderquoteEndvalue(array('min' => 12)); // WHERE orderquote_endvalue >= 12
     * $query->filterByOrderquoteEndvalue(array('max' => 12)); // WHERE orderquote_endvalue <= 12
     * </code>
     *
     * @param     mixed $orderquoteEndvalue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByOrderquoteEndvalue($orderquoteEndvalue = null, $comparison = null)
    {
        if (is_array($orderquoteEndvalue)) {
            $useMinMax = false;
            if (isset($orderquoteEndvalue['min'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_ENDVALUE, $orderquoteEndvalue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderquoteEndvalue['max'])) {
                $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_ENDVALUE, $orderquoteEndvalue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_ENDVALUE, $orderquoteEndvalue, $comparison);
    }

    /**
     * Filter the query on the orderquote_note column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderquoteNote('fooValue');   // WHERE orderquote_note = 'fooValue'
     * $query->filterByOrderquoteNote('%fooValue%'); // WHERE orderquote_note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderquoteNote The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function filterByOrderquoteNote($orderquoteNote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderquoteNote)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderquoteNote)) {
                $orderquoteNote = str_replace('*', '%', $orderquoteNote);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuoteitemPeer::ORDERQUOTE_NOTE, $orderquoteNote, $comparison);
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoteitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(QuoteitemPeer::IDPRODUCT, $product->getIdproduct(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuoteitemPeer::IDPRODUCT, $product->toKeyValue('PrimaryKey', 'Idproduct'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type Product or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', 'ProductQuery');
    }

    /**
     * Filter the query by a related Quote object
     *
     * @param   Quote|PropelObjectCollection $quote The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuoteitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($quote, $comparison = null)
    {
        if ($quote instanceof Quote) {
            return $this
                ->addUsingAlias(QuoteitemPeer::IDQUOTE, $quote->getIdquote(), $comparison);
        } elseif ($quote instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuoteitemPeer::IDQUOTE, $quote->toKeyValue('PrimaryKey', 'Idquote'), $comparison);
        } else {
            throw new PropelException('filterByQuote() only accepts arguments of type Quote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function joinQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quote');

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
            $this->addJoinObject($join, 'Quote');
        }

        return $this;
    }

    /**
     * Use the Quote relation Quote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quote', 'QuoteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Quoteitem $quoteitem Object to remove from the list of results
     *
     * @return QuoteitemQuery The current query, for fluid interface
     */
    public function prune($quoteitem = null)
    {
        if ($quoteitem) {
            $this->addUsingAlias(QuoteitemPeer::IDQUOTEITEM, $quoteitem->getIdquoteitem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
