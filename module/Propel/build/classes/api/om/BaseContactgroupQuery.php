<?php


/**
 * Base class that represents a query for the 'contactgroup' table.
 *
 *
 *
 * @method ContactgroupQuery orderByIdcontactgroup($order = Criteria::ASC) Order by the idcontactgroup column
 * @method ContactgroupQuery orderByIdcompany($order = Criteria::ASC) Order by the idcompany column
 * @method ContactgroupQuery orderByContactgroupName($order = Criteria::ASC) Order by the contactgroup_name column
 *
 * @method ContactgroupQuery groupByIdcontactgroup() Group by the idcontactgroup column
 * @method ContactgroupQuery groupByIdcompany() Group by the idcompany column
 * @method ContactgroupQuery groupByContactgroupName() Group by the contactgroup_name column
 *
 * @method ContactgroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContactgroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContactgroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContactgroupQuery leftJoinCompany($relationAlias = null) Adds a LEFT JOIN clause to the query using the Company relation
 * @method ContactgroupQuery rightJoinCompany($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Company relation
 * @method ContactgroupQuery innerJoinCompany($relationAlias = null) Adds a INNER JOIN clause to the query using the Company relation
 *
 * @method ContactgroupQuery leftJoinContactgeneral($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contactgeneral relation
 * @method ContactgroupQuery rightJoinContactgeneral($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contactgeneral relation
 * @method ContactgroupQuery innerJoinContactgeneral($relationAlias = null) Adds a INNER JOIN clause to the query using the Contactgeneral relation
 *
 * @method Contactgroup findOne(PropelPDO $con = null) Return the first Contactgroup matching the query
 * @method Contactgroup findOneOrCreate(PropelPDO $con = null) Return the first Contactgroup matching the query, or a new Contactgroup object populated from the query conditions when no match is found
 *
 * @method Contactgroup findOneByIdcompany(int $idcompany) Return the first Contactgroup filtered by the idcompany column
 * @method Contactgroup findOneByContactgroupName(string $contactgroup_name) Return the first Contactgroup filtered by the contactgroup_name column
 *
 * @method array findByIdcontactgroup(int $idcontactgroup) Return Contactgroup objects filtered by the idcontactgroup column
 * @method array findByIdcompany(int $idcompany) Return Contactgroup objects filtered by the idcompany column
 * @method array findByContactgroupName(string $contactgroup_name) Return Contactgroup objects filtered by the contactgroup_name column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseContactgroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContactgroupQuery object.
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
            $modelName = 'Contactgroup';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactgroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContactgroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactgroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactgroupQuery) {
            return $criteria;
        }
        $query = new ContactgroupQuery(null, null, $modelAlias);

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
     * @return   Contactgroup|Contactgroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactgroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactgroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contactgroup A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcontactgroup($key, $con = null)
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
     * @return                 Contactgroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idcontactgroup`, `idcompany`, `contactgroup_name` FROM `contactgroup` WHERE `idcontactgroup` = :p0';
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
            $obj = new Contactgroup();
            $obj->hydrate($row);
            ContactgroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contactgroup|Contactgroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contactgroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcontactgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcontactgroup(1234); // WHERE idcontactgroup = 1234
     * $query->filterByIdcontactgroup(array(12, 34)); // WHERE idcontactgroup IN (12, 34)
     * $query->filterByIdcontactgroup(array('min' => 12)); // WHERE idcontactgroup >= 12
     * $query->filterByIdcontactgroup(array('max' => 12)); // WHERE idcontactgroup <= 12
     * </code>
     *
     * @param     mixed $idcontactgroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function filterByIdcontactgroup($idcontactgroup = null, $comparison = null)
    {
        if (is_array($idcontactgroup)) {
            $useMinMax = false;
            if (isset($idcontactgroup['min'])) {
                $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $idcontactgroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcontactgroup['max'])) {
                $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $idcontactgroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $idcontactgroup, $comparison);
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
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function filterByIdcompany($idcompany = null, $comparison = null)
    {
        if (is_array($idcompany)) {
            $useMinMax = false;
            if (isset($idcompany['min'])) {
                $this->addUsingAlias(ContactgroupPeer::IDCOMPANY, $idcompany['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcompany['max'])) {
                $this->addUsingAlias(ContactgroupPeer::IDCOMPANY, $idcompany['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactgroupPeer::IDCOMPANY, $idcompany, $comparison);
    }

    /**
     * Filter the query on the contactgroup_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactgroupName('fooValue');   // WHERE contactgroup_name = 'fooValue'
     * $query->filterByContactgroupName('%fooValue%'); // WHERE contactgroup_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactgroupName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function filterByContactgroupName($contactgroupName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactgroupName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactgroupName)) {
                $contactgroupName = str_replace('*', '%', $contactgroupName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactgroupPeer::CONTACTGROUP_NAME, $contactgroupName, $comparison);
    }

    /**
     * Filter the query by a related Company object
     *
     * @param   Company|PropelObjectCollection $company The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContactgroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompany($company, $comparison = null)
    {
        if ($company instanceof Company) {
            return $this
                ->addUsingAlias(ContactgroupPeer::IDCOMPANY, $company->getIdcompany(), $comparison);
        } elseif ($company instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactgroupPeer::IDCOMPANY, $company->toKeyValue('PrimaryKey', 'Idcompany'), $comparison);
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
     * @return ContactgroupQuery The current query, for fluid interface
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
     * Filter the query by a related Contactgeneral object
     *
     * @param   Contactgeneral|PropelObjectCollection $contactgeneral  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContactgroupQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContactgeneral($contactgeneral, $comparison = null)
    {
        if ($contactgeneral instanceof Contactgeneral) {
            return $this
                ->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $contactgeneral->getIdcontactgroup(), $comparison);
        } elseif ($contactgeneral instanceof PropelObjectCollection) {
            return $this
                ->useContactgeneralQuery()
                ->filterByPrimaryKeys($contactgeneral->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactgeneral() only accepts arguments of type Contactgeneral or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contactgeneral relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function joinContactgeneral($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contactgeneral');

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
            $this->addJoinObject($join, 'Contactgeneral');
        }

        return $this;
    }

    /**
     * Use the Contactgeneral relation Contactgeneral object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactgeneralQuery A secondary query class using the current class as primary query
     */
    public function useContactgeneralQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactgeneral($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contactgeneral', 'ContactgeneralQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Contactgroup $contactgroup Object to remove from the list of results
     *
     * @return ContactgroupQuery The current query, for fluid interface
     */
    public function prune($contactgroup = null)
    {
        if ($contactgroup) {
            $this->addUsingAlias(ContactgroupPeer::IDCONTACTGROUP, $contactgroup->getIdcontactgroup(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
