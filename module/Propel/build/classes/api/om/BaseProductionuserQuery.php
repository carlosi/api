<?php


/**
 * Base class that represents a query for the 'productionuser' table.
 *
 *
 *
 * @method ProductionuserQuery orderByIdproductionuser($order = Criteria::ASC) Order by the idproductionuser column
 * @method ProductionuserQuery orderByIdproductionteam($order = Criteria::ASC) Order by the idproductionteam column
 * @method ProductionuserQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 *
 * @method ProductionuserQuery groupByIdproductionuser() Group by the idproductionuser column
 * @method ProductionuserQuery groupByIdproductionteam() Group by the idproductionteam column
 * @method ProductionuserQuery groupByIduser() Group by the iduser column
 *
 * @method ProductionuserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProductionuserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProductionuserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProductionuserQuery leftJoinProductionteam($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productionteam relation
 * @method ProductionuserQuery rightJoinProductionteam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productionteam relation
 * @method ProductionuserQuery innerJoinProductionteam($relationAlias = null) Adds a INNER JOIN clause to the query using the Productionteam relation
 *
 * @method ProductionuserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method ProductionuserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method ProductionuserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Productionuser findOne(PropelPDO $con = null) Return the first Productionuser matching the query
 * @method Productionuser findOneOrCreate(PropelPDO $con = null) Return the first Productionuser matching the query, or a new Productionuser object populated from the query conditions when no match is found
 *
 * @method Productionuser findOneByIdproductionteam(int $idproductionteam) Return the first Productionuser filtered by the idproductionteam column
 * @method Productionuser findOneByIduser(int $iduser) Return the first Productionuser filtered by the iduser column
 *
 * @method array findByIdproductionuser(int $idproductionuser) Return Productionuser objects filtered by the idproductionuser column
 * @method array findByIdproductionteam(int $idproductionteam) Return Productionuser objects filtered by the idproductionteam column
 * @method array findByIduser(int $iduser) Return Productionuser objects filtered by the iduser column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionuserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProductionuserQuery object.
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
            $modelName = 'Productionuser';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProductionuserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProductionuserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProductionuserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProductionuserQuery) {
            return $criteria;
        }
        $query = new ProductionuserQuery(null, null, $modelAlias);

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
     * @return   Productionuser|Productionuser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductionuserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProductionuserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Productionuser A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdproductionuser($key, $con = null)
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
     * @return                 Productionuser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idproductionuser`, `idproductionteam`, `iduser` FROM `productionuser` WHERE `idproductionuser` = :p0';
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
            $obj = new Productionuser();
            $obj->hydrate($row);
            ProductionuserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Productionuser|Productionuser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Productionuser[]|mixed the list of results, formatted by the current formatter
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
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idproductionuser column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproductionuser(1234); // WHERE idproductionuser = 1234
     * $query->filterByIdproductionuser(array(12, 34)); // WHERE idproductionuser IN (12, 34)
     * $query->filterByIdproductionuser(array('min' => 12)); // WHERE idproductionuser >= 12
     * $query->filterByIdproductionuser(array('max' => 12)); // WHERE idproductionuser <= 12
     * </code>
     *
     * @param     mixed $idproductionuser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function filterByIdproductionuser($idproductionuser = null, $comparison = null)
    {
        if (is_array($idproductionuser)) {
            $useMinMax = false;
            if (isset($idproductionuser['min'])) {
                $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $idproductionuser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionuser['max'])) {
                $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $idproductionuser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $idproductionuser, $comparison);
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
     * @see       filterByProductionteam()
     *
     * @param     mixed $idproductionteam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function filterByIdproductionteam($idproductionteam = null, $comparison = null)
    {
        if (is_array($idproductionteam)) {
            $useMinMax = false;
            if (isset($idproductionteam['min'])) {
                $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONTEAM, $idproductionteam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductionteam['max'])) {
                $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONTEAM, $idproductionteam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONTEAM, $idproductionteam, $comparison);
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
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(ProductionuserPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(ProductionuserPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductionuserPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query by a related Productionteam object
     *
     * @param   Productionteam|PropelObjectCollection $productionteam The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductionteam($productionteam, $comparison = null)
    {
        if ($productionteam instanceof Productionteam) {
            return $this
                ->addUsingAlias(ProductionuserPeer::IDPRODUCTIONTEAM, $productionteam->getIdproductionteam(), $comparison);
        } elseif ($productionteam instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionuserPeer::IDPRODUCTIONTEAM, $productionteam->toKeyValue('PrimaryKey', 'Idproductionteam'), $comparison);
        } else {
            throw new PropelException('filterByProductionteam() only accepts arguments of type Productionteam or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productionteam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function joinProductionteam($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productionteam');

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
            $this->addJoinObject($join, 'Productionteam');
        }

        return $this;
    }

    /**
     * Use the Productionteam relation Productionteam object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductionteamQuery A secondary query class using the current class as primary query
     */
    public function useProductionteamQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductionteam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productionteam', 'ProductionteamQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProductionuserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(ProductionuserPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductionuserPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return ProductionuserQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Productionuser $productionuser Object to remove from the list of results
     *
     * @return ProductionuserQuery The current query, for fluid interface
     */
    public function prune($productionuser = null)
    {
        if ($productionuser) {
            $this->addUsingAlias(ProductionuserPeer::IDPRODUCTIONUSER, $productionuser->getIdproductionuser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
