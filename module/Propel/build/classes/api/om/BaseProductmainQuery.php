<?php


/**
 * Base class that represents a query for the 'productmain' table.
 *
 *
 *
 * @method ProductmainQuery orderByIdproductmain($order = Criteria::ASC) Order by the idproductmain column
 * @method ProductmainQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ProductmainQuery orderByIdproductcategory($order = Criteria::ASC) Order by the idproductcategory column
 * @method ProductmainQuery orderByProductmainName($order = Criteria::ASC) Order by the productmain_name column
 * @method ProductmainQuery orderByProductmainUnit($order = Criteria::ASC) Order by the productmain_unit column
 * @method ProductmainQuery orderByProductmainType($order = Criteria::ASC) Order by the productmain_type column
 *
 * @method ProductmainQuery groupByIdproductmain() Group by the idproductmain column
 * @method ProductmainQuery groupByIdcompany() Group by the idcompany column
 * @method ProductmainQuery groupByIdproductcategory() Group by the idproductcategory column
 * @method ProductmainQuery groupByProductmainName() Group by the productmain_name column
 * @method ProductmainQuery groupByProductmainUnit() Group by the productmain_unit column
 * @method ProductmainQuery groupByProductmainType() Group by the productmain_type column
 *
 * @method ProductmainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductmainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductmainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductmainQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ProductmainQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ProductmainQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ProductmainQuery leftJoinProductcategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productcategory relation
 * @method ProductmainQuery rightJoinProductcategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productcategory relation
 * @method ProductmainQuery innerJoinProductcategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Productcategory relation
 *
 * @method ProductmainQuery leftJoinMlitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mlitem relation
 * @method ProductmainQuery rightJoinMlitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mlitem relation
 * @method ProductmainQuery innerJoinMlitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Mlitem relation
 *
 * @method ProductmainQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method ProductmainQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method ProductmainQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method ProductmainQuery leftJoinProductmainphoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmainphoto relation
 * @method ProductmainQuery rightJoinProductmainphoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmainphoto relation
 * @method ProductmainQuery innerJoinProductmainphoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmainphoto relation
 *
 * @method ProductmainQuery leftJoinProductmainproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmainproperty relation
 * @method ProductmainQuery rightJoinProductmainproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmainproperty relation
 * @method ProductmainQuery innerJoinProductmainproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmainproperty relation
 *
 * @method Productmain findOne(PropelPDO $con = null) Return the first Productmain matching the query
 * @method Productmain findOneOrCreate(PropelPDO $con = null) Return the first Productmain matching the query, or a new Productmain object populated from the query conditions when no match is found
 *
 * @method Productmain findOneByIdcompany(int $idcompany) Return the first Productmain filtered by the idcompany column
 * @method Productmain findOneByIdproductcategory(int $idproductcategory) Return the first Productmain filtered by the idproductcategory column
 * @method Productmain findOneByProductmainName(string $productmain_name) Return the first Productmain filtered by the productmain_name column
 * @method Productmain findOneByProductmainUnit(string $productmain_unit) Return the first Productmain filtered by the productmain_unit column
 * @method Productmain findOneByProductmainType(string $productmain_type) Return the first Productmain filtered by the productmain_type column
 *
 * @method array findByIdproductmain(int $idproductmain) Return Productmain objects filtered by the idproductmain column
 * @method array findByIdcompany(int $idcompany) Return Productmain objects filtered by the idcompany column
 * @method array findByIdproductcategory(int $idproductcategory) Return Productmain objects filtered by the idproductcategory column
 * @method array findByProductmainName(string $productmain_name) Return Productmain objects filtered by the productmain_name column
 * @method array findByProductmainUnit(string $productmain_unit) Return Productmain objects filtered by the productmain_unit column
 * @method array findByProductmainType(string $productmain_type) Return Productmain objects filtered by the productmain_type column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductmainQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductmainQuery object.
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
            $modelName = 'Productmain';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductmainQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductmainQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductmainQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductmainQuery) {
            return $criteria;
        }
        $query = new ProductmainQuery(null, null, $modelAlias);

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
     * @return   Productmain|Productmain[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductmainPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productmain A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductmain($key, $con = null)
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
     * @return                 Productmain A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductmain`, `idcompany`, `idproductcategory`, `productmain_name`, `productmain_unit`, `productmain_type` FROM `productmain` WHERE `idproductmain` = :p0';
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
            $obj = new Productmain();
            $obj->hydrate($row);
            ProductmainPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productmain|Productmain[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productmain[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductmain column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductmain(1234); // WHERE idproductmain = 1234
     * $query->filterByIdproductmain(array(12, 34)); // WHERE idproductmain IN (12, 34)
     * $query->filterByIdproductmain(array('min' => 12)); // WHERE idproductmain >= 12
     * $query->filterByIdproductmain(array('max' => 12)); // WHERE idproductmain <= 12
     * </code>
     *
     * @param     mixed $idproductmain The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByIdproductmain($idproductmain = null, $comparison = null)
    {
        if (is_array($idproductmain)) {
            $useMinMax = false;
            if (isset($idproductmain['min'])) {
                $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $idproductmain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmain['max'])) {
                $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $idproductmain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $idproductmain, $comparison);
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
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ProductmainPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ProductmainPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the idproductcategory column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductcategory(1234); // WHERE idproductcategory = 1234
     * $query->filterByIdproductcategory(array(12, 34)); // WHERE idproductcategory IN (12, 34)
     * $query->filterByIdproductcategory(array('min' => 12)); // WHERE idproductcategory >= 12
     * $query->filterByIdproductcategory(array('max' => 12)); // WHERE idproductcategory <= 12
     * </code>
     *
     * @see       filterByProductcategory()
     *
     * @param     mixed $idproductcategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByIdproductcategory($idproductcategory = null, $comparison = null)
    {
        if (is_array($idproductcategory)) {
            $useMinMax = false;
            if (isset($idproductcategory['min'])) {
                $this->addUsingAlias(ProductmainPeer::IDPRODUCTCATEGORY, $idproductcategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductcategory['max'])) {
                $this->addUsingAlias(ProductmainPeer::IDPRODUCTCATEGORY, $idproductcategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::IDPRODUCTCATEGORY, $idproductcategory, $comparison);
    }

    /**
     * Filter the query on the productmain_name column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainName('fooValue');   // WHERE productmain_name = 'fooValue'
     * $query->filterByProductmainName('%fooValue%'); // WHERE productmain_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByProductmainName($productmainName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainName)) {
                $productmainName = str_replace('*', '%', $productmainName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::PRODUCTMAIN_NAME, $productmainName, $comparison);
    }

    /**
     * Filter the query on the productmain_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainUnit('fooValue');   // WHERE productmain_unit = 'fooValue'
     * $query->filterByProductmainUnit('%fooValue%'); // WHERE productmain_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainUnit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByProductmainUnit($productmainUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainUnit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainUnit)) {
                $productmainUnit = str_replace('*', '%', $productmainUnit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::PRODUCTMAIN_UNIT, $productmainUnit, $comparison);
    }

    /**
     * Filter the query on the productmain_type column
     *
     * Example usage:
     * <code>
     * $query->filterByProductmainType('fooValue');   // WHERE productmain_type = 'fooValue'
     * $query->filterByProductmainType('%fooValue%'); // WHERE productmain_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productmainType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function filterByProductmainType($productmainType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productmainType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productmainType)) {
                $productmainType = str_replace('*', '%', $productmainType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductmainPeer::PRODUCTMAIN_TYPE, $productmainType, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductmainPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return ProductmainQuery The current query, for fluid interface
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
     * Filter the query by a related Productcategory object
     *
     * @param   Productcategory|PropelObjectCollection $productcategory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductcategory($productcategory, $comparison = null)
    {
        if ($productcategory instanceof Productcategory) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTCATEGORY, $productcategory->getIdproductcategory(), $comparison);
        } elseif ($productcategory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTCATEGORY, $productcategory->toKeyValue('PrimaryKey', 'Idproductcategory'), $comparison);
        } else {
            throw new PropelException('filterByProductcategory() only accepts arguments of type Productcategory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productcategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function joinProductcategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productcategory');

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
            $this->addJoinObject($join, 'Productcategory');
        }

        return $this;
    }

    /**
     * Use the Productcategory relation Productcategory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductcategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductcategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductcategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productcategory', 'ProductcategoryQuery');
    }

    /**
     * Filter the query by a related Mlitem object
     *
     * @param   Mlitem|PropelObjectCollection $mlitem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMlitem($mlitem, $comparison = null)
    {
        if ($mlitem instanceof Mlitem) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $mlitem->getIdproductmain(), $comparison);
        } elseif ($mlitem instanceof PropelObjectCollection) {
            return $this
                ->useMlitemQuery()
                ->filterByPrimaryKeys($mlitem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMlitem() only accepts arguments of type Mlitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mlitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function joinMlitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mlitem');

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
            $this->addJoinObject($join, 'Mlitem');
        }

        return $this;
    }

    /**
     * Use the Mlitem relation Mlitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MlitemQuery A secondary query class using the current class as primary query
     */
    public function useMlitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMlitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mlitem', 'MlitemQuery');
    }

    /**
     * Filter the query by a related Product object
     *
     * @param   Product|PropelObjectCollection $product  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof Product) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $product->getIdproductmain(), $comparison);
        } elseif ($product instanceof PropelObjectCollection) {
            return $this
                ->useProductQuery()
                ->filterByPrimaryKeys($product->getPrimaryKeys())
                ->endUse();
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
     * @return ProductmainQuery The current query, for fluid interface
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
     * Filter the query by a related Productmainphoto object
     *
     * @param   Productmainphoto|PropelObjectCollection $productmainphoto  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmainphoto($productmainphoto, $comparison = null)
    {
        if ($productmainphoto instanceof Productmainphoto) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $productmainphoto->getIdproductmain(), $comparison);
        } elseif ($productmainphoto instanceof PropelObjectCollection) {
            return $this
                ->useProductmainphotoQuery()
                ->filterByPrimaryKeys($productmainphoto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductmainphoto() only accepts arguments of type Productmainphoto or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmainphoto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function joinProductmainphoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmainphoto');

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
            $this->addJoinObject($join, 'Productmainphoto');
        }

        return $this;
    }

    /**
     * Use the Productmainphoto relation Productmainphoto object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainphotoQuery A secondary query class using the current class as primary query
     */
    public function useProductmainphotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmainphoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmainphoto', 'ProductmainphotoQuery');
    }

    /**
     * Filter the query by a related Productmainproperty object
     *
     * @param   Productmainproperty|PropelObjectCollection $productmainproperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductmainQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmainproperty($productmainproperty, $comparison = null)
    {
        if ($productmainproperty instanceof Productmainproperty) {
            return $this
                ->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $productmainproperty->getIdproductmain(), $comparison);
        } elseif ($productmainproperty instanceof PropelObjectCollection) {
            return $this
                ->useProductmainpropertyQuery()
                ->filterByPrimaryKeys($productmainproperty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProductmainproperty() only accepts arguments of type Productmainproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmainproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function joinProductmainproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmainproperty');

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
            $this->addJoinObject($join, 'Productmainproperty');
        }

        return $this;
    }

    /**
     * Use the Productmainproperty relation Productmainproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainpropertyQuery A secondary query class using the current class as primary query
     */
    public function useProductmainpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmainproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmainproperty', 'ProductmainpropertyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Productmain $productmain Object to remove from the list of results
     *
     * @return ProductmainQuery The current query, for fluid interface
     */
    public function prune($productmain = null)
    {
        if ($productmain) {
            $this->addUsingAlias(ProductmainPeer::IDPRODUCTMAIN, $productmain->getIdproductmain(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
