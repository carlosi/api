<?php


/**
 * Base class that represents a query for the 'productionteam' table.
 *
 *
 *
 * @method ProductionteamQuery orderByIdproductionteam($order = Criteria::ASC) Order by the idproductionteam column
 * @method ProductionteamQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ProductionteamQuery orderByProductionteamName($order = Criteria::ASC) Order by the productionteam_name column
 *
 * @method ProductionteamQuery groupByIdproductionteam() Group by the idproductionteam column
 * @method ProductionteamQuery groupByIdcompany() Group by the idcompany column
 * @method ProductionteamQuery groupByProductionteamName() Group by the productionteam_name column
 *
 * @method ProductionteamQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionteamQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionteamQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionteamQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ProductionteamQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ProductionteamQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ProductionteamQuery leftJoinProductionorderitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionteamQuery rightJoinProductionorderitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionorderitem relation
 * @method ProductionteamQuery innerJoinProductionorderitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionorderitem relation
 *
 * @method ProductionteamQuery leftJoinProductionuser($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionuser relation
 * @method ProductionteamQuery rightJoinProductionuser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionuser relation
 * @method ProductionteamQuery innerJoinProductionuser($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionuser relation
 *
 * @method Productionteam findOne(PropelPDO $con = null) Return the first Productionteam matching the query
 * @method Productionteam findOneOrCreate(PropelPDO $con = null) Return the first Productionteam matching the query, or a new Productionteam object populated from the query conditions when no match is found
 *
 * @method Productionteam findOneByIdcompany(int $idcompany) Return the first Productionteam filtered by the idcompany column
 * @method Productionteam findOneByProductionteamName(string $productionteam_name) Return the first Productionteam filtered by the productionteam_name column
 *
 * @method array findByIdproductionteam(int $idproductionteam) Return Productionteam objects filtered by the idproductionteam column
 * @method array findByIdcompany(int $idcompany) Return Productionteam objects filtered by the idcompany column
 * @method array findByProductionteamName(string $productionteam_name) Return Productionteam objects filtered by the productionteam_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionteamQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionteamQuery object.
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
            $modelName = 'Productionteam';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionteamQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionteamQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionteamQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionteamQuery) {
            return $criteria;
        }
        $query = new ProductionteamQuery(null, null, $modelAlias);

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
     * @return   Productionteam|Productionteam[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionteamPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionteamPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionteam A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionteam($key, $con = null)
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
     * @return                 Productionteam A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionteam`, `idcompany`, `productionteam_name` FROM `productionteam` WHERE `idproductionteam` = :p0';
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
            $obj = new Productionteam();
            $obj->hydrate($row);
            ProductionteamPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionteam|Productionteam[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionteam[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionteam column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionteam(1234); // WHERE idproductionteam = 1234
     * $query->filterByIdproductionteam(array(12, 34)); // WHERE idproductionteam IN (12, 34)
     * $query->filterByIdproductionteam(array('min' => 12)); // WHERE idproductionteam >= 12
     * $query->filterByIdproductionteam(array('max' => 12)); // WHERE idproductionteam <= 12
     * </code>
     *
     * @param     mixed $idproductionteam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function filterByIdproductionteam($idproductionteam = null, $comparison = null)
    {
        if (is_array($idproductionteam)) {
            $useMinMax = false;
            if (isset($idproductionteam['min'])) {
                $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $idproductionteam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionteam['max'])) {
                $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $idproductionteam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $idproductionteam, $comparison);
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
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ProductionteamPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ProductionteamPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionteamPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the productionteam_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductionteamName('fooValue');   // WHERE productionteam_name = 'fooValue'
     * $query->filterByProductionteamName('%fooValue%'); // WHERE productionteam_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productionteamName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function filterByProductionteamName($productionteamName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productionteamName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productionteamName)) {
                $productionteamName = str_replace('*', '%', $productionteamName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductionteamPeer::PRODUCTIONTEAM_NAME, $productionteamName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionteamQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ProductionteamPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionteamPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return ProductionteamQuery The current query, for fluid interface
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
     * @return                 ProductionteamQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionorderitem($productionorderitem, $comparison = null)
    {
        if ($productionorderitem instanceof Productionorderitem) {
            return $this
                ->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $productionorderitem->getIdproductionteam(), $comparison);
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
     * @return ProductionteamQuery The current query, for fluid interface
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
     * Filter the query by a related Productionuser object
     *
     * @param   Productionuser|PropelObjectCollection $productionuser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionteamQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionuser($productionuser, $comparison = null)
    {
        if ($productionuser instanceof Productionuser) {
            return $this
                ->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $productionuser->getIdproductionteam(), $comparison);
        } elseif ($productionuser instanceof PropelObjectCollection) {
            return $this
                ->useProductionuserQuery()
                ->filterByPrimaryKeys($productionuser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductionuser() only accepts arguments of type Productionuser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionuser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function joinProductionuser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionuser');

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
            $this->addJoinObject($join, 'Productionuser');
        }

        return $this;
    }

    /**
     * Use the Productionuser relation Productionuser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionuserQuery A secondary query class using the current class as primary query
     */
    public function useProductionuserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionuser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionuser', 'ProductionuserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productionteam $productionteam Object to remove from the list of results
     *
     * @return ProductionteamQuery The current query, for fluid interface
     */
    public function prune($productionteam = null)
    {
        if ($productionteam) {
            $this->addUsingAlias(ProductionteamPeer::IDPRODUCTIONTEAM, $productionteam->getIdproductionteam(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
