<?php


/**
 * Base class that represents a query for the 'productionordercomment' table.
 *
 *
 *
 * @method ProductionordercommentQuery orderByIdproductionordercomment($order = Criteria::ASC) Order by the idproductionordercomment column
 * @method ProductionordercommentQuery orderByIdproductionorderitem($order = Criteria::ASC) Order by the idproductionorderitem column
 * @method ProductionordercommentQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method ProductionordercommentQuery orderByProductionordercommentComment($order = Criteria::ASC) Order by the productionordercomment_comment column
 * @method ProductionordercommentQuery orderByProductionordercommentDate($order = Criteria::ASC) Order by the productionordercomment_date column
 *
 * @method ProductionordercommentQuery groupByIdproductionordercomment() Group by the idproductionordercomment column
 * @method ProductionordercommentQuery groupByIdproductionorderitem() Group by the idproductionorderitem column
 * @method ProductionordercommentQuery groupByIduser() Group by the iduser column
 * @method ProductionordercommentQuery groupByProductionordercommentComment() Group by the productionordercomment_comment column
 * @method ProductionordercommentQuery groupByProductionordercommentDate() Group by the productionordercomment_date column
 *
 * @method ProductionordercommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionordercommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionordercommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionordercommentQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ProductionordercommentQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ProductionordercommentQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method ProductionordercommentQuery leftJoinProductionorderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionordercommentQuery rightJoinProductionorderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionordercommentQuery innerJoinProductionorderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionorderitem relation
 *
 * @method Productionordercomment findOne(PropelPDO $con = null) Return the first Productionordercomment matching the query
 * @method Productionordercomment findOneOrCreate(PropelPDO $con = null) Return the first Productionordercomment matching the query, or a new Productionordercomment object populated from the query conditions when no match is found
 *
 * @method Productionordercomment findOneByIdproductionorderitem(int $idproductionorderitem) Return the first Productionordercomment filtered by the idproductionorderitem column
 * @method Productionordercomment findOneByIduser(int $iduser) Return the first Productionordercomment filtered by the iduser column
 * @method Productionordercomment findOneByProductionordercommentComment(string $productionordercomment_comment) Return the first Productionordercomment filtered by the productionordercomment_comment column
 * @method Productionordercomment findOneByProductionordercommentDate(string $productionordercomment_date) Return the first Productionordercomment filtered by the productionordercomment_date column
 *
 * @method array findByIdproductionordercomment(int $idproductionordercomment) Return Productionordercomment objects filtered by the idproductionordercomment column
 * @method array findByIdproductionorderitem(int $idproductionorderitem) Return Productionordercomment objects filtered by the idproductionorderitem column
 * @method array findByIduser(int $iduser) Return Productionordercomment objects filtered by the iduser column
 * @method array findByProductionordercommentComment(string $productionordercomment_comment) Return Productionordercomment objects filtered by the productionordercomment_comment column
 * @method array findByProductionordercommentDate(string $productionordercomment_date) Return Productionordercomment objects filtered by the productionordercomment_date column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionordercommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionordercommentQuery object.
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
            $modelName = 'Productionordercomment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionordercommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionordercommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionordercommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionordercommentQuery) {
            return $criteria;
        }
        $query = new ProductionordercommentQuery(null, null, $modelAlias);

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
     * @return   Productionordercomment|Productionordercomment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionordercommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionordercommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionordercomment A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionordercomment($key, $con = null)
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
     * @return                 Productionordercomment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionordercomment`, `idproductionorderitem`, `iduser`, `productionordercomment_comment`, `productionordercomment_date` FROM `productionordercomment` WHERE `idproductionordercomment` = :p0';
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
            $obj = new Productionordercomment();
            $obj->hydrate($row);
            ProductionordercommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionordercomment|Productionordercomment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionordercomment[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionordercomment column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionordercomment(1234); // WHERE idproductionordercomment = 1234
     * $query->filterByIdproductionordercomment(array(12, 34)); // WHERE idproductionordercomment IN (12, 34)
     * $query->filterByIdproductionordercomment(array('min' => 12)); // WHERE idproductionordercomment >= 12
     * $query->filterByIdproductionordercomment(array('max' => 12)); // WHERE idproductionordercomment <= 12
     * </code>
     *
     * @param     mixed $idproductionordercomment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByIdproductionordercomment($idproductionordercomment = null, $comparison = null)
    {
        if (is_array($idproductionordercomment)) {
            $useMinMax = false;
            if (isset($idproductionordercomment['min'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $idproductionordercomment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionordercomment['max'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $idproductionordercomment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $idproductionordercomment, $comparison);
    }

    /**
     * Filter the query on the idproductionorderitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionorderitem(1234); // WHERE idproductionorderitem = 1234
     * $query->filterByIdproductionorderitem(array(12, 34)); // WHERE idproductionorderitem IN (12, 34)
     * $query->filterByIdproductionorderitem(array('min' => 12)); // WHERE idproductionorderitem >= 12
     * $query->filterByIdproductionorderitem(array('max' => 12)); // WHERE idproductionorderitem <= 12
     * </code>
     *
     * @see       filterByProductionorderitem()
     *
     * @param     mixed $idproductionorderitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByIdproductionorderitem($idproductionorderitem = null, $comparison = null)
    {
        if (is_array($idproductionorderitem)) {
            $useMinMax = false;
            if (isset($idproductionorderitem['min'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionorderitem['max'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $idproductionorderitem, $comparison);
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
     * @see       filterByUser()
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ProductionordercommentPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionordercommentPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the productionordercomment_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionordercommentComment('fooValue');   // WHERE productionordercomment_comment = 'fooValue'
     * $query->filterByProductionordercommentComment('%fooValue%'); // WHERE productionordercomment_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productionordercommentComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByProductionordercommentComment($productionordercommentComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productionordercommentComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productionordercommentComment)) {
                $productionordercommentComment = str_replace('*', '%', $productionordercommentComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductionordercommentPeer::PRODUCTIONORDERCOMMENT_COMMENT, $productionordercommentComment, $comparison);
    }

    /**
     * Filter the query on the productionordercomment_date column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionordercommentDate('2011-03-14'); // WHERE productionordercomment_date = '2011-03-14'
     * $query->filterByProductionordercommentDate('now'); // WHERE productionordercomment_date = '2011-03-14'
     * $query->filterByProductionordercommentDate(array('max' => 'yesterday')); // WHERE productionordercomment_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $productionordercommentDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function filterByProductionordercommentDate($productionordercommentDate = null, $comparison = null)
    {
        if (is_array($productionordercommentDate)) {
            $useMinMax = false;
            if (isset($productionordercommentDate['min'])) {
                $this->addUsingAlias(ProductionordercommentPeer::PRODUCTIONORDERCOMMENT_DATE, $productionordercommentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productionordercommentDate['max'])) {
                $this->addUsingAlias(ProductionordercommentPeer::PRODUCTIONORDERCOMMENT_DATE, $productionordercommentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionordercommentPeer::PRODUCTIONORDERCOMMENT_DATE, $productionordercommentDate, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionordercommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ProductionordercommentPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionordercommentPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

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
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Filter the query by a related Productionorderitem object
     *
     * @param   Productionorderitem|PropelObjectCollection $productionorderitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionordercommentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionorderitem($productionorderitem, $comparison = null)
    {
        if ($productionorderitem instanceof Productionorderitem) {
            return $this
                ->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $productionorderitem->getIdproductionorderitem(), $comparison);
        } elseif ($productionorderitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $productionorderitem->toKeyValue('PrimaryKey', 'Idproductionorderitem'), $comparison);
        } else {
            throw new PropelException('filterByProductionorderitem() only accepts arguments of type Productionorderitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionorderitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function joinProductionorderitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionorderitem');

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
            $this->addJoinObject($join, 'Productionorderitem');
        }

        return $this;
    }

    /**
     * Use the Productionorderitem relation Productionorderitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionorderitemQuery A secondary query class using the current class as primary query
     */
    public function useProductionorderitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionorderitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionorderitem', 'ProductionorderitemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productionordercomment $productionordercomment Object to remove from the list of results
     *
     * @return ProductionordercommentQuery The current query, for fluid interface
     */
    public function prune($productionordercomment = null)
    {
        if ($productionordercomment) {
            $this->addUsingAlias(ProductionordercommentPeer::IDPRODUCTIONORDERCOMMENT, $productionordercomment->getIdproductionordercomment(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
