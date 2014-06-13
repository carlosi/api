<?php


/**
 * Base class that represents a query for the 'mlitem' table.
 *
 *
 *
 * @method MlitemQuery orderByIdmlitem($order = Criteria::ASC) Order by the idmlitem column
 * @method MlitemQuery orderByIdproductmain($order = Criteria::ASC) Order by the idproductmain column
 * @method MlitemQuery orderByMlitemId($order = Criteria::ASC) Order by the mlitem_id column
 *
 * @method MlitemQuery groupByIdmlitem() Group by the idmlitem column
 * @method MlitemQuery groupByIdproductmain() Group by the idproductmain column
 * @method MlitemQuery groupByMlitemId() Group by the mlitem_id column
 *
 * @method MlitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MlitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MlitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MlitemQuery leftJoinProductmain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Productmain relation
 * @method MlitemQuery rightJoinProductmain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Productmain relation
 * @method MlitemQuery innerJoinProductmain($relationAlias = null) Adds a INNER JOIN clause to the query using the Productmain relation
 *
 * @method MlitemQuery leftJoinMlquestion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mlquestion relation
 * @method MlitemQuery rightJoinMlquestion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mlquestion relation
 * @method MlitemQuery innerJoinMlquestion($relationAlias = null) Adds a INNER JOIN clause to the query using the Mlquestion relation
 *
 * @method Mlitem findOne(PropelPDO $con = null) Return the first Mlitem matching the query
 * @method Mlitem findOneOrCreate(PropelPDO $con = null) Return the first Mlitem matching the query, or a new Mlitem object populated from the query conditions when no match is found
 *
 * @method Mlitem findOneByIdproductmain(int $idproductmain) Return the first Mlitem filtered by the idproductmain column
 * @method Mlitem findOneByMlitemId(int $mlitem_id) Return the first Mlitem filtered by the mlitem_id column
 *
 * @method array findByIdmlitem(int $idmlitem) Return Mlitem objects filtered by the idmlitem column
 * @method array findByIdproductmain(int $idproductmain) Return Mlitem objects filtered by the idproductmain column
 * @method array findByMlitemId(int $mlitem_id) Return Mlitem objects filtered by the mlitem_id column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMlitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMlitemQuery object.
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
            $modelName = 'Mlitem';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MlitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MlitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MlitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MlitemQuery) {
            return $criteria;
        }
        $query = new MlitemQuery(null, null, $modelAlias);

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
     * @return   Mlitem|Mlitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MlitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MlitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mlitem A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmlitem($key, $con = null)
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
     * @return                 Mlitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmlitem`, `idproductmain`, `mlitem_id` FROM `mlitem` WHERE `idmlitem` = :p0';
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
            $obj = new Mlitem();
            $obj->hydrate($row);
            MlitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mlitem|Mlitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mlitem[]|mixed the list of results, formatted by the current formatter
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
     * @return MlitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MlitemPeer::IDMLITEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MlitemPeer::IDMLITEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmlitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmlitem(1234); // WHERE idmlitem = 1234
     * $query->filterByIdmlitem(array(12, 34)); // WHERE idmlitem IN (12, 34)
     * $query->filterByIdmlitem(array('min' => 12)); // WHERE idmlitem >= 12
     * $query->filterByIdmlitem(array('max' => 12)); // WHERE idmlitem <= 12
     * </code>
     *
     * @param     mixed $idmlitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function filterByIdmlitem($idmlitem = null, $comparison = null)
    {
        if (is_array($idmlitem)) {
            $useMinMax = false;
            if (isset($idmlitem['min'])) {
                $this->addUsingAlias(MlitemPeer::IDMLITEM, $idmlitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmlitem['max'])) {
                $this->addUsingAlias(MlitemPeer::IDMLITEM, $idmlitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlitemPeer::IDMLITEM, $idmlitem, $comparison);
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
     * @see       filterByProductmain()
     *
     * @param     mixed $idproductmain The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function filterByIdproductmain($idproductmain = null, $comparison = null)
    {
        if (is_array($idproductmain)) {
            $useMinMax = false;
            if (isset($idproductmain['min'])) {
                $this->addUsingAlias(MlitemPeer::IDPRODUCTMAIN, $idproductmain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproductmain['max'])) {
                $this->addUsingAlias(MlitemPeer::IDPRODUCTMAIN, $idproductmain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlitemPeer::IDPRODUCTMAIN, $idproductmain, $comparison);
    }

    /**
     * Filter the query on the mlitem_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMlitemId(1234); // WHERE mlitem_id = 1234
     * $query->filterByMlitemId(array(12, 34)); // WHERE mlitem_id IN (12, 34)
     * $query->filterByMlitemId(array('min' => 12)); // WHERE mlitem_id >= 12
     * $query->filterByMlitemId(array('max' => 12)); // WHERE mlitem_id <= 12
     * </code>
     *
     * @param     mixed $mlitemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function filterByMlitemId($mlitemId = null, $comparison = null)
    {
        if (is_array($mlitemId)) {
            $useMinMax = false;
            if (isset($mlitemId['min'])) {
                $this->addUsingAlias(MlitemPeer::MLITEM_ID, $mlitemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mlitemId['max'])) {
                $this->addUsingAlias(MlitemPeer::MLITEM_ID, $mlitemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlitemPeer::MLITEM_ID, $mlitemId, $comparison);
    }

    /**
     * Filter the query by a related Productmain object
     *
     * @param   Productmain|PropelObjectCollection $productmain The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MlitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductmain($productmain, $comparison = null)
    {
        if ($productmain instanceof Productmain) {
            return $this
                ->addUsingAlias(MlitemPeer::IDPRODUCTMAIN, $productmain->getIdproductmain(), $comparison);
        } elseif ($productmain instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MlitemPeer::IDPRODUCTMAIN, $productmain->toKeyValue('PrimaryKey', 'Idproductmain'), $comparison);
        } else {
            throw new PropelException('filterByProductmain() only accepts arguments of type Productmain or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Productmain relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function joinProductmain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Productmain');

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
            $this->addJoinObject($join, 'Productmain');
        }

        return $this;
    }

    /**
     * Use the Productmain relation Productmain object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProductmainQuery A secondary query class using the current class as primary query
     */
    public function useProductmainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductmain($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Productmain', 'ProductmainQuery');
    }

    /**
     * Filter the query by a related Mlquestion object
     *
     * @param   Mlquestion|PropelObjectCollection $mlquestion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MlitemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMlquestion($mlquestion, $comparison = null)
    {
        if ($mlquestion instanceof Mlquestion) {
            return $this
                ->addUsingAlias(MlitemPeer::IDMLITEM, $mlquestion->getIdmlitem(), $comparison);
        } elseif ($mlquestion instanceof PropelObjectCollection) {
            return $this
                ->useMlquestionQuery()
                ->filterByPrimaryKeys($mlquestion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMlquestion() only accepts arguments of type Mlquestion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mlquestion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function joinMlquestion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mlquestion');

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
            $this->addJoinObject($join, 'Mlquestion');
        }

        return $this;
    }

    /**
     * Use the Mlquestion relation Mlquestion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MlquestionQuery A secondary query class using the current class as primary query
     */
    public function useMlquestionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMlquestion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mlquestion', 'MlquestionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Mlitem $mlitem Object to remove from the list of results
     *
     * @return MlitemQuery The current query, for fluid interface
     */
    public function prune($mlitem = null)
    {
        if ($mlitem) {
            $this->addUsingAlias(MlitemPeer::IDMLITEM, $mlitem->getIdmlitem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
