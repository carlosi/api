<?php


/**
 * Base class that represents a query for the 'productionline' table.
 *
 *
 *
 * @method ProductionlineQuery orderByIdproductionline($order = Criteria::ASC) Order by the idproductionline column
 * @method ProductionlineQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ProductionlineQuery orderByProductionlineName($order = Criteria::ASC) Order by the productionline_name column
 *
 * @method ProductionlineQuery groupByIdproductionline() Group by the idproductionline column
 * @method ProductionlineQuery groupByIdcompany() Group by the idcompany column
 * @method ProductionlineQuery groupByProductionlineName() Group by the productionline_name column
 *
 * @method ProductionlineQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionlineQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionlineQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionlineQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ProductionlineQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ProductionlineQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ProductionlineQuery leftJoinProductionorderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionlineQuery rightJoinProductionorderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionlineQuery innerJoinProductionorderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionorderitem relation
 *
 * @method ProductionlineQuery leftJoinProductionstatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionstatus relation
 * @method ProductionlineQuery rightJoinProductionstatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionstatus relation
 * @method ProductionlineQuery innerJoinProductionstatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionstatus relation
 *
 * @method Productionline findOne(PropelPDO $con = null) Return the first Productionline matching the query
 * @method Productionline findOneOrCreate(PropelPDO $con = null) Return the first Productionline matching the query, or a new Productionline object populated from the query conditions when no match is found
 *
 * @method Productionline findOneByIdcompany(int $idcompany) Return the first Productionline filtered by the idcompany column
 * @method Productionline findOneByProductionlineName(string $productionline_name) Return the first Productionline filtered by the productionline_name column
 *
 * @method array findByIdproductionline(int $idproductionline) Return Productionline objects filtered by the idproductionline column
 * @method array findByIdcompany(int $idcompany) Return Productionline objects filtered by the idcompany column
 * @method array findByProductionlineName(string $productionline_name) Return Productionline objects filtered by the productionline_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionlineQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionlineQuery object.
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
            $modelName = 'Productionline';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionlineQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionlineQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionlineQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionlineQuery) {
            return $criteria;
        }
        $query = new ProductionlineQuery(null, null, $modelAlias);

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
     * @return   Productionline|Productionline[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionlinePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionlinePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionline A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionline($key, $con = null)
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
     * @return                 Productionline A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionline`, `idcompany`, `productionline_name` FROM `productionline` WHERE `idproductionline` = :p0';
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
            $obj = new Productionline();
            $obj->hydrate($row);
            ProductionlinePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionline|Productionline[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionline[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionline column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionline(1234); // WHERE idproductionline = 1234
     * $query->filterByIdproductionline(array(12, 34)); // WHERE idproductionline IN (12, 34)
     * $query->filterByIdproductionline(array('min' => 12)); // WHERE idproductionline >= 12
     * $query->filterByIdproductionline(array('max' => 12)); // WHERE idproductionline <= 12
     * </code>
     *
     * @param     mixed $idproductionline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function filterByIdproductionline($idproductionline = null, $comparison = null)
    {
        if (is_array($idproductionline)) {
            $useMinMax = false;
            if (isset($idproductionline['min'])) {
                $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $idproductionline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionline['max'])) {
                $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $idproductionline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $idproductionline, $comparison);
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
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ProductionlinePeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ProductionlinePeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionlinePeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the productionline_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionlineName('fooValue');   // WHERE productionline_name = 'fooValue'
     * $query->filterByProductionlineName('%fooValue%'); // WHERE productionline_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productionlineName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function filterByProductionlineName($productionlineName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productionlineName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productionlineName)) {
                $productionlineName = str_replace('*', '%', $productionlineName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductionlinePeer::PRODUCTIONLINE_NAME, $productionlineName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionlineQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ProductionlinePeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionlinePeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return ProductionlineQuery The current query, for fluid interface
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
     * Filter the query by a related Productionorderitem object
     *
     * @param   Productionorderitem|PropelObjectCollection $productionorderitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionlineQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionorderitem($productionorderitem, $comparison = null)
    {
        if ($productionorderitem instanceof Productionorderitem) {
            return $this
                ->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $productionorderitem->getIdproductionline(), $comparison);
        } elseif ($productionorderitem instanceof PropelObjectCollection) {
            return $this
                ->useProductionorderitemQuery()
                ->filterByPrimaryKeys($productionorderitem->getPrimaryKeys())
                ->endUse();
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
     * @return ProductionlineQuery The current query, for fluid interface
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
     * Filter the query by a related Productionstatus object
     *
     * @param   Productionstatus|PropelObjectCollection $productionstatus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionlineQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionstatus($productionstatus, $comparison = null)
    {
        if ($productionstatus instanceof Productionstatus) {
            return $this
                ->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $productionstatus->getIdproductionline(), $comparison);
        } elseif ($productionstatus instanceof PropelObjectCollection) {
            return $this
                ->useProductionstatusQuery()
                ->filterByPrimaryKeys($productionstatus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionstatus() only accepts arguments of type Productionstatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionstatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function joinProductionstatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionstatus');

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
            $this->addJoinObject($join, 'Productionstatus');
        }

        return $this;
    }

    /**
     * Use the Productionstatus relation Productionstatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionstatusQuery A secondary query class using the current class as primary query
     */
    public function useProductionstatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionstatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionstatus', 'ProductionstatusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productionline $productionline Object to remove from the list of results
     *
     * @return ProductionlineQuery The current query, for fluid interface
     */
    public function prune($productionline = null)
    {
        if ($productionline) {
            $this->addUsingAlias(ProductionlinePeer::IDPRODUCTIONLINE, $productionline->getIdproductionline(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
