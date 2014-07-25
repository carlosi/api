<?php


/**
 * Base class that represents a query for the 'staff' table.
 *
 *
 *
 * @method StaffQuery orderByIdstaff($order = Criteria::ASC) Order by the idstaff column
 * @method StaffQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method StaffQuery orderByStaffName($order = Criteria::ASC) Order by the staff_name column
 * @method StaffQuery orderByStaffEmail($order = Criteria::ASC) Order by the staff_email column
 * @method StaffQuery orderByStaffEmail2($order = Criteria::ASC) Order by the staff_email2 column
 * @method StaffQuery orderByStaffPhone($order = Criteria::ASC) Order by the staff_phone column
 * @method StaffQuery orderByStaffCellular($order = Criteria::ASC) Order by the staff_cellular column
 * @method StaffQuery orderByStaffLanguage($order = Criteria::ASC) Order by the staff_language column
 * @method StaffQuery orderByStaffIsoCodecountry($order = Criteria::ASC) Order by the staff_iso_codecountry column
 * @method StaffQuery orderByStaffIsoCodephone($order = Criteria::ASC) Order by the staff_iso_codephone column
 *
 * @method StaffQuery groupByIdstaff() Group by the idstaff column
 * @method StaffQuery groupByIduser() Group by the iduser column
 * @method StaffQuery groupByStaffName() Group by the staff_name column
 * @method StaffQuery groupByStaffEmail() Group by the staff_email column
 * @method StaffQuery groupByStaffEmail2() Group by the staff_email2 column
 * @method StaffQuery groupByStaffPhone() Group by the staff_phone column
 * @method StaffQuery groupByStaffCellular() Group by the staff_cellular column
 * @method StaffQuery groupByStaffLanguage() Group by the staff_language column
 * @method StaffQuery groupByStaffIsoCodecountry() Group by the staff_iso_codecountry column
 * @method StaffQuery groupByStaffIsoCodephone() Group by the staff_iso_codephone column
 *
 * @method StaffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StaffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StaffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StaffQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method StaffQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method StaffQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Staff findOne(PropelPDO $con = null) Return the first Staff matching the query
 * @method Staff findOneOrCreate(PropelPDO $con = null) Return the first Staff matching the query, or a new Staff object populated from the query conditions when no match is found
 *
 * @method Staff findOneByIduser(int $iduser) Return the first Staff filtered by the iduser column
 * @method Staff findOneByStaffName(string $staff_name) Return the first Staff filtered by the staff_name column
 * @method Staff findOneByStaffEmail(string $staff_email) Return the first Staff filtered by the staff_email column
 * @method Staff findOneByStaffEmail2(string $staff_email2) Return the first Staff filtered by the staff_email2 column
 * @method Staff findOneByStaffPhone(string $staff_phone) Return the first Staff filtered by the staff_phone column
 * @method Staff findOneByStaffCellular(string $staff_cellular) Return the first Staff filtered by the staff_cellular column
 * @method Staff findOneByStaffLanguage(string $staff_language) Return the first Staff filtered by the staff_language column
 * @method Staff findOneByStaffIsoCodecountry(string $staff_iso_codecountry) Return the first Staff filtered by the staff_iso_codecountry column
 * @method Staff findOneByStaffIsoCodephone(string $staff_iso_codephone) Return the first Staff filtered by the staff_iso_codephone column
 *
 * @method array findByIdstaff(int $idstaff) Return Staff objects filtered by the idstaff column
 * @method array findByIduser(int $iduser) Return Staff objects filtered by the iduser column
 * @method array findByStaffName(string $staff_name) Return Staff objects filtered by the staff_name column
 * @method array findByStaffEmail(string $staff_email) Return Staff objects filtered by the staff_email column
 * @method array findByStaffEmail2(string $staff_email2) Return Staff objects filtered by the staff_email2 column
 * @method array findByStaffPhone(string $staff_phone) Return Staff objects filtered by the staff_phone column
 * @method array findByStaffCellular(string $staff_cellular) Return Staff objects filtered by the staff_cellular column
 * @method array findByStaffLanguage(string $staff_language) Return Staff objects filtered by the staff_language column
 * @method array findByStaffIsoCodecountry(string $staff_iso_codecountry) Return Staff objects filtered by the staff_iso_codecountry column
 * @method array findByStaffIsoCodephone(string $staff_iso_codephone) Return Staff objects filtered by the staff_iso_codephone column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseStaffQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStaffQuery object.
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
            $modelName = 'Staff';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StaffQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StaffQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StaffQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StaffQuery) {
            return $criteria;
        }
        $query = new StaffQuery(null, null, $modelAlias);

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
     * @return   Staff|Staff[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StaffPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StaffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Staff A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdstaff($key, $con = null)
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
     * @return                 Staff A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idstaff`, `iduser`, `staff_name`, `staff_email`, `staff_email2`, `staff_phone`, `staff_cellular`, `staff_language`, `staff_iso_codecountry`, `staff_iso_codephone` FROM `staff` WHERE `idstaff` = :p0';
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
            $obj = new Staff();
            $obj->hydrate($row);
            StaffPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Staff|Staff[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Staff[]|mixed the list of results, formatted by the current formatter
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
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StaffPeer::IDSTAFF, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StaffPeer::IDSTAFF, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idstaff column
     *
     * Example usage:
     * <code>
     * $query->filterByIdstaff(1234); // WHERE idstaff = 1234
     * $query->filterByIdstaff(array(12, 34)); // WHERE idstaff IN (12, 34)
     * $query->filterByIdstaff(array('min' => 12)); // WHERE idstaff >= 12
     * $query->filterByIdstaff(array('max' => 12)); // WHERE idstaff <= 12
     * </code>
     *
     * @param     mixed $idstaff The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByIdstaff($idstaff = null, $comparison = null)
    {
        if (is_array($idstaff)) {
            $useMinMax = false;
            if (isset($idstaff['min'])) {
                $this->addUsingAlias(StaffPeer::IDSTAFF, $idstaff['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idstaff['max'])) {
                $this->addUsingAlias(StaffPeer::IDSTAFF, $idstaff['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffPeer::IDSTAFF, $idstaff, $comparison);
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
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(StaffPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(StaffPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the staff_name column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffName('fooValue');   // WHERE staff_name = 'fooValue'
     * $query->filterByStaffName('%fooValue%'); // WHERE staff_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffName($staffName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffName)) {
                $staffName = str_replace('*', '%', $staffName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_NAME, $staffName, $comparison);
    }

    /**
     * Filter the query on the staff_email column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffEmail('fooValue');   // WHERE staff_email = 'fooValue'
     * $query->filterByStaffEmail('%fooValue%'); // WHERE staff_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffEmail($staffEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffEmail)) {
                $staffEmail = str_replace('*', '%', $staffEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_EMAIL, $staffEmail, $comparison);
    }

    /**
     * Filter the query on the staff_email2 column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffEmail2('fooValue');   // WHERE staff_email2 = 'fooValue'
     * $query->filterByStaffEmail2('%fooValue%'); // WHERE staff_email2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffEmail2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffEmail2($staffEmail2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffEmail2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffEmail2)) {
                $staffEmail2 = str_replace('*', '%', $staffEmail2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_EMAIL2, $staffEmail2, $comparison);
    }

    /**
     * Filter the query on the staff_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffPhone('fooValue');   // WHERE staff_phone = 'fooValue'
     * $query->filterByStaffPhone('%fooValue%'); // WHERE staff_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffPhone($staffPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffPhone)) {
                $staffPhone = str_replace('*', '%', $staffPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_PHONE, $staffPhone, $comparison);
    }

    /**
     * Filter the query on the staff_cellular column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffCellular('fooValue');   // WHERE staff_cellular = 'fooValue'
     * $query->filterByStaffCellular('%fooValue%'); // WHERE staff_cellular LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffCellular The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffCellular($staffCellular = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffCellular)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffCellular)) {
                $staffCellular = str_replace('*', '%', $staffCellular);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_CELLULAR, $staffCellular, $comparison);
    }

    /**
     * Filter the query on the staff_language column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffLanguage('fooValue');   // WHERE staff_language = 'fooValue'
     * $query->filterByStaffLanguage('%fooValue%'); // WHERE staff_language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffLanguage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffLanguage($staffLanguage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffLanguage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffLanguage)) {
                $staffLanguage = str_replace('*', '%', $staffLanguage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_LANGUAGE, $staffLanguage, $comparison);
    }

    /**
     * Filter the query on the staff_iso_codecountry column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffIsoCodecountry('fooValue');   // WHERE staff_iso_codecountry = 'fooValue'
     * $query->filterByStaffIsoCodecountry('%fooValue%'); // WHERE staff_iso_codecountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffIsoCodecountry The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffIsoCodecountry($staffIsoCodecountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffIsoCodecountry)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffIsoCodecountry)) {
                $staffIsoCodecountry = str_replace('*', '%', $staffIsoCodecountry);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_ISO_CODECOUNTRY, $staffIsoCodecountry, $comparison);
    }

    /**
     * Filter the query on the staff_iso_codephone column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffIsoCodephone('fooValue');   // WHERE staff_iso_codephone = 'fooValue'
     * $query->filterByStaffIsoCodephone('%fooValue%'); // WHERE staff_iso_codephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staffIsoCodephone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function filterByStaffIsoCodephone($staffIsoCodephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staffIsoCodephone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $staffIsoCodephone)) {
                $staffIsoCodephone = str_replace('*', '%', $staffIsoCodephone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StaffPeer::STAFF_ISO_CODEPHONE, $staffIsoCodephone, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StaffQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(StaffPeer::IDUSER, $user->getIduser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StaffPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'Iduser'), $comparison);
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
     * @return StaffQuery The current query, for fluid interface
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
     * @param   Staff $staff Object to remove from the list of results
     *
     * @return StaffQuery The current query, for fluid interface
     */
    public function prune($staff = null)
    {
        if ($staff) {
            $this->addUsingAlias(StaffPeer::IDSTAFF, $staff->getIdstaff(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
