<?php


/**
 * Base class that represents a query for the 'productionstatus' table.
 *
 *
 *
 * @method ProductionstatusQuery orderByIdproductionstatus($order = Criteria::ASC) Order by the idproductionstatus column
 * @method ProductionstatusQuery orderByIdproductionline($order = Criteria::ASC) Order by the idproductionline column
 * @method ProductionstatusQuery orderByProductionstatusName($order = Criteria::ASC) Order by the productionstatus_name column
 *
 * @method ProductionstatusQuery groupByIdproductionstatus() Group by the idproductionstatus column
 * @method ProductionstatusQuery groupByIdproductionline() Group by the idproductionline column
 * @method ProductionstatusQuery groupByProductionstatusName() Group by the productionstatus_name column
 *
 * @method ProductionstatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionstatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionstatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionstatusQuery leftJoinProductionline($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionline relation
 * @method ProductionstatusQuery rightJoinProductionline($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionline relation
 * @method ProductionstatusQuery innerJoinProductionline($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionline relation
 *
 * @method ProductionstatusQuery leftJoinProductionorderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionstatusQuery rightJoinProductionorderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionstatusQuery innerJoinProductionorderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionorderitem relation
 *
 * @method Productionstatus findOne(PropelPDO $con = null) Return the first Productionstatus matching the query
 * @method Productionstatus findOneOrCreate(PropelPDO $con = null) Return the first Productionstatus matching the query, or a new Productionstatus object populated from the query conditions when no match is found
 *
 * @method Productionstatus findOneByIdproductionline(int $idproductionline) Return the first Productionstatus filtered by the idproductionline column
 * @method Productionstatus findOneByProductionstatusName(string $productionstatus_name) Return the first Productionstatus filtered by the productionstatus_name column
 *
 * @method array findByIdproductionstatus(int $idproductionstatus) Return Productionstatus objects filtered by the idproductionstatus column
 * @method array findByIdproductionline(int $idproductionline) Return Productionstatus objects filtered by the idproductionline column
 * @method array findByProductionstatusName(string $productionstatus_name) Return Productionstatus objects filtered by the productionstatus_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionstatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionstatusQuery object.
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
            $modelName = 'Productionstatus';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionstatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionstatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionstatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionstatusQuery) {
            return $criteria;
        }
        $query = new ProductionstatusQuery(null, null, $modelAlias);

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
     * @return   Productionstatus|Productionstatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionstatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionstatus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionstatus($key, $con = null)
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
     * @return                 Productionstatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionstatus`, `idproductionline`, `productionstatus_name` FROM `productionstatus` WHERE `idproductionstatus` = :p0';
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
            $obj = new Productionstatus();
            $obj->hydrate($row);
            ProductionstatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionstatus|Productionstatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionstatus[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionstatus(1234); // WHERE idproductionstatus = 1234
     * $query->filterByIdproductionstatus(array(12, 34)); // WHERE idproductionstatus IN (12, 34)
     * $query->filterByIdproductionstatus(array('min' => 12)); // WHERE idproductionstatus >= 12
     * $query->filterByIdproductionstatus(array('max' => 12)); // WHERE idproductionstatus <= 12
     * </code>
     *
     * @param     mixed $idproductionstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function filterByIdproductionstatus($idproductionstatus = null, $comparison = null)
    {
        if (is_array($idproductionstatus)) {
            $useMinMax = false;
            if (isset($idproductionstatus['min'])) {
                $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $idproductionstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionstatus['max'])) {
                $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $idproductionstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $idproductionstatus, $comparison);
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
     * @see       filterByProductionline()
     *
     * @param     mixed $idproductionline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function filterByIdproductionline($idproductionline = null, $comparison = null)
    {
        if (is_array($idproductionline)) {
            $useMinMax = false;
            if (isset($idproductionline['min'])) {
                $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONLINE, $idproductionline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionline['max'])) {
                $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONLINE, $idproductionline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONLINE, $idproductionline, $comparison);
    }

    /**
     * Filter the query on the productionstatus_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionstatusName('fooValue');   // WHERE productionstatus_name = 'fooValue'
     * $query->filterByProductionstatusName('%fooValue%'); // WHERE productionstatus_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productionstatusName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function filterByProductionstatusName($productionstatusName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productionstatusName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productionstatusName)) {
                $productionstatusName = str_replace('*', '%', $productionstatusName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductionstatusPeer::PRODUCTIONSTATUS_NAME, $productionstatusName, $comparison);
    }

    /**
     * Filter the query by a related Productionline object
     *
     * @param   Productionline|PropelObjectCollection $productionline The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionstatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionline($productionline, $comparison = null)
    {
        if ($productionline instanceof Productionline) {
            return $this
                ->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONLINE, $productionline->getIdproductionline(), $comparison);
        } elseif ($productionline instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONLINE, $productionline->toKeyValue('PrimaryKey', 'Idproductionline'), $comparison);
        } else {
            throw new PropelException('filterByProductionline() only accepts arguments of type Productionline or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionline relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function joinProductionline($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionline');

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
            $this->addJoinObject($join, 'Productionline');
        }

        return $this;
    }

    /**
     * Use the Productionline relation Productionline object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionlineQuery A secondary query class using the current class as primary query
     */
    public function useProductionlineQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionline($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionline', 'ProductionlineQuery');
    }

    /**
     * Filter the query by a related Productionorderitem object
     *
     * @param   Productionorderitem|PropelObjectCollection $productionorderitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionstatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionorderitem($productionorderitem, $comparison = null)
    {
        if ($productionorderitem instanceof Productionorderitem) {
            return $this
                ->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $productionorderitem->getIdproductionstatus(), $comparison);
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
     * @return ProductionstatusQuery The current query, for fluid interface
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
     * @param   Productionstatus $productionstatus Object to remove from the list of results
     *
     * @return ProductionstatusQuery The current query, for fluid interface
     */
    public function prune($productionstatus = null)
    {
        if ($productionstatus) {
            $this->addUsingAlias(ProductionstatusPeer::IDPRODUCTIONSTATUS, $productionstatus->getIdproductionstatus(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
