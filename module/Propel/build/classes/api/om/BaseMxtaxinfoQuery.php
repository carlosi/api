<?php


/**
 * Base class that represents a query for the 'mxtaxinfo' table.
 *
 *
 *
 * @method MxtaxinfoQuery orderByIdmxtaxinfo($order = Criteria::ASC) Order by the idmxtaxinfo column
 * @method MxtaxinfoQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method MxtaxinfoQuery orderByMxtaxinfoRfc($order = Criteria::ASC) Order by the mxtaxinfo_rfc column
 * @method MxtaxinfoQuery orderByMxtaxinfoRazonsocial($order = Criteria::ASC) Order by the mxtaxinfo_razonsocial column
 *
 * @method MxtaxinfoQuery groupByIdmxtaxinfo() Group by the idmxtaxinfo column
 * @method MxtaxinfoQuery groupByIdcompany() Group by the idcompany column
 * @method MxtaxinfoQuery groupByMxtaxinfoRfc() Group by the mxtaxinfo_rfc column
 * @method MxtaxinfoQuery groupByMxtaxinfoRazonsocial() Group by the mxtaxinfo_razonsocial column
 *
 * @method MxtaxinfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MxtaxinfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MxtaxinfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MxtaxinfoQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method MxtaxinfoQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method MxtaxinfoQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method Mxtaxinfo findOne(PropelPDO $con = null) Return the first Mxtaxinfo matching the query
 * @method Mxtaxinfo findOneOrCreate(PropelPDO $con = null) Return the first Mxtaxinfo matching the query, or a new Mxtaxinfo object populated from the query conditions when no match is found
 *
 * @method Mxtaxinfo findOneByIdcompany(int $idcompany) Return the first Mxtaxinfo filtered by the idcompany column
 * @method Mxtaxinfo findOneByMxtaxinfoRfc(string $mxtaxinfo_rfc) Return the first Mxtaxinfo filtered by the mxtaxinfo_rfc column
 * @method Mxtaxinfo findOneByMxtaxinfoRazonsocial(string $mxtaxinfo_razonsocial) Return the first Mxtaxinfo filtered by the mxtaxinfo_razonsocial column
 *
 * @method array findByIdmxtaxinfo(int $idmxtaxinfo) Return Mxtaxinfo objects filtered by the idmxtaxinfo column
 * @method array findByIdcompany(int $idcompany) Return Mxtaxinfo objects filtered by the idcompany column
 * @method array findByMxtaxinfoRfc(string $mxtaxinfo_rfc) Return Mxtaxinfo objects filtered by the mxtaxinfo_rfc column
 * @method array findByMxtaxinfoRazonsocial(string $mxtaxinfo_razonsocial) Return Mxtaxinfo objects filtered by the mxtaxinfo_razonsocial column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMxtaxinfoQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMxtaxinfoQuery object.
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
            $modelName = 'Mxtaxinfo';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MxtaxinfoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MxtaxinfoQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MxtaxinfoQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MxtaxinfoQuery) {
            return $criteria;
        }
        $query = new MxtaxinfoQuery(null, null, $modelAlias);

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
     * @return   Mxtaxinfo|Mxtaxinfo[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MxtaxinfoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MxtaxinfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mxtaxinfo A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmxtaxinfo($key, $con = null)
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
     * @return                 Mxtaxinfo A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmxtaxinfo`, `idcompany`, `mxtaxinfo_rfc`, `mxtaxinfo_razonsocial` FROM `mxtaxinfo` WHERE `idmxtaxinfo` = :p0';
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
            $obj = new Mxtaxinfo();
            $obj->hydrate($row);
            MxtaxinfoPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mxtaxinfo|Mxtaxinfo[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mxtaxinfo[]|mixed the list of results, formatted by the current formatter
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
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmxtaxinfo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmxtaxinfo(1234); // WHERE idmxtaxinfo = 1234
     * $query->filterByIdmxtaxinfo(array(12, 34)); // WHERE idmxtaxinfo IN (12, 34)
     * $query->filterByIdmxtaxinfo(array('min' => 12)); // WHERE idmxtaxinfo >= 12
     * $query->filterByIdmxtaxinfo(array('max' => 12)); // WHERE idmxtaxinfo <= 12
     * </code>
     *
     * @param     mixed $idmxtaxinfo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByIdmxtaxinfo($idmxtaxinfo = null, $comparison = null)
    {
        if (is_array($idmxtaxinfo)) {
            $useMinMax = false;
            if (isset($idmxtaxinfo['min'])) {
                $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $idmxtaxinfo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmxtaxinfo['max'])) {
                $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $idmxtaxinfo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $idmxtaxinfo, $comparison);
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
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(MxtaxinfoPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(MxtaxinfoPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MxtaxinfoPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the mxtaxinfo_rfc column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxinfoRfc('fooValue');   // WHERE mxtaxinfo_rfc = 'fooValue'
     * $query->filterByMxtaxinfoRfc('%fooValue%'); // WHERE mxtaxinfo_rfc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxinfoRfc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByMxtaxinfoRfc($mxtaxinfoRfc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxinfoRfc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxinfoRfc)) {
                $mxtaxinfoRfc = str_replace('*', '%', $mxtaxinfoRfc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxinfoPeer::MXTAXINFO_RFC, $mxtaxinfoRfc, $comparison);
    }

    /**
     * Filter the query on the mxtaxinfo_razonsocial column
     *
     * Example usage:
     * <code>
     * $query->filterByMxtaxinfoRazonsocial('fooValue');   // WHERE mxtaxinfo_razonsocial = 'fooValue'
     * $query->filterByMxtaxinfoRazonsocial('%fooValue%'); // WHERE mxtaxinfo_razonsocial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mxtaxinfoRazonsocial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function filterByMxtaxinfoRazonsocial($mxtaxinfoRazonsocial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mxtaxinfoRazonsocial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mxtaxinfoRazonsocial)) {
                $mxtaxinfoRazonsocial = str_replace('*', '%', $mxtaxinfoRazonsocial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MxtaxinfoPeer::MXTAXINFO_RAZONSOCIAL, $mxtaxinfoRazonsocial, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MxtaxinfoQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(MxtaxinfoPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MxtaxinfoPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return MxtaxinfoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Mxtaxinfo $mxtaxinfo Object to remove from the list of results
     *
     * @return MxtaxinfoQuery The current query, for fluid interface
     */
    public function prune($mxtaxinfo = null)
    {
        if ($mxtaxinfo) {
            $this->addUsingAlias(MxtaxinfoPeer::IDMXTAXINFO, $mxtaxinfo->getIdmxtaxinfo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
