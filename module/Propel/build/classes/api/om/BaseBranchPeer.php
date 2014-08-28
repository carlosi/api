<?php


/**
 * Base static class for performing query and update operations on the 'branch' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseBranchPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'branch';

    /** the related Propel class for this table */
    const OM_CLASS = 'Branch';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BranchTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the idbranch field */
    const IDBRANCH = 'branch.idbranch';

    /** the column name for the idcompany field */
    const IDCOMPANY = 'branch.idcompany';

    /** the column name for the branch_name field */
    const BRANCH_NAME = 'branch.branch_name';

    /** the column name for the branch_timezone field */
    const BRANCH_TIMEZONE = 'branch.branch_timezone';

    /** the column name for the branch_iso_codecountry field */
    const BRANCH_ISO_CODECOUNTRY = 'branch.branch_iso_codecountry';

    /** the column name for the branch_address field */
    const BRANCH_ADDRESS = 'branch.branch_address';

    /** the column name for the branch_address2 field */
    const BRANCH_ADDRESS2 = 'branch.branch_address2';

    /** the column name for the branch_city field */
    const BRANCH_CITY = 'branch.branch_city';

    /** the column name for the branch_state field */
    const BRANCH_STATE = 'branch.branch_state';

    /** the column name for the branch_zipcode field */
    const BRANCH_ZIPCODE = 'branch.branch_zipcode';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Branch objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Branch[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BranchPeer::$fieldNames[BranchPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idbranch', 'Idcompany', 'BranchName', 'BranchTimezone', 'BranchIsoCodecountry', 'BranchAddress', 'BranchAddress2', 'BranchCity', 'BranchState', 'BranchZipcode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbranch', 'idcompany', 'branchName', 'branchTimezone', 'branchIsoCodecountry', 'branchAddress', 'branchAddress2', 'branchCity', 'branchState', 'branchZipcode', ),
        BasePeer::TYPE_COLNAME => array (BranchPeer::IDBRANCH, BranchPeer::IDCOMPANY, BranchPeer::BRANCH_NAME, BranchPeer::BRANCH_TIMEZONE, BranchPeer::BRANCH_ISO_CODECOUNTRY, BranchPeer::BRANCH_ADDRESS, BranchPeer::BRANCH_ADDRESS2, BranchPeer::BRANCH_CITY, BranchPeer::BRANCH_STATE, BranchPeer::BRANCH_ZIPCODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBRANCH', 'IDCOMPANY', 'BRANCH_NAME', 'BRANCH_TIMEZONE', 'BRANCH_ISO_CODECOUNTRY', 'BRANCH_ADDRESS', 'BRANCH_ADDRESS2', 'BRANCH_CITY', 'BRANCH_STATE', 'BRANCH_ZIPCODE', ),
        BasePeer::TYPE_FIELDNAME => array ('idbranch', 'idcompany', 'branch_name', 'branch_timezone', 'branch_iso_codecountry', 'branch_address', 'branch_address2', 'branch_city', 'branch_state', 'branch_zipcode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BranchPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idbranch' => 0, 'Idcompany' => 1, 'BranchName' => 2, 'BranchTimezone' => 3, 'BranchIsoCodecountry' => 4, 'BranchAddress' => 5, 'BranchAddress2' => 6, 'BranchCity' => 7, 'BranchState' => 8, 'BranchZipcode' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbranch' => 0, 'idcompany' => 1, 'branchName' => 2, 'branchTimezone' => 3, 'branchIsoCodecountry' => 4, 'branchAddress' => 5, 'branchAddress2' => 6, 'branchCity' => 7, 'branchState' => 8, 'branchZipcode' => 9, ),
        BasePeer::TYPE_COLNAME => array (BranchPeer::IDBRANCH => 0, BranchPeer::IDCOMPANY => 1, BranchPeer::BRANCH_NAME => 2, BranchPeer::BRANCH_TIMEZONE => 3, BranchPeer::BRANCH_ISO_CODECOUNTRY => 4, BranchPeer::BRANCH_ADDRESS => 5, BranchPeer::BRANCH_ADDRESS2 => 6, BranchPeer::BRANCH_CITY => 7, BranchPeer::BRANCH_STATE => 8, BranchPeer::BRANCH_ZIPCODE => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBRANCH' => 0, 'IDCOMPANY' => 1, 'BRANCH_NAME' => 2, 'BRANCH_TIMEZONE' => 3, 'BRANCH_ISO_CODECOUNTRY' => 4, 'BRANCH_ADDRESS' => 5, 'BRANCH_ADDRESS2' => 6, 'BRANCH_CITY' => 7, 'BRANCH_STATE' => 8, 'BRANCH_ZIPCODE' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('idbranch' => 0, 'idcompany' => 1, 'branch_name' => 2, 'branch_timezone' => 3, 'branch_iso_codecountry' => 4, 'branch_address' => 5, 'branch_address2' => 6, 'branch_city' => 7, 'branch_state' => 8, 'branch_zipcode' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = BranchPeer::getFieldNames($toType);
        $key = isset(BranchPeer::$fieldKeys[$fromType][$name]) ? BranchPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BranchPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, BranchPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BranchPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. BranchPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BranchPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BranchPeer::IDBRANCH);
            $criteria->addSelectColumn(BranchPeer::IDCOMPANY);
            $criteria->addSelectColumn(BranchPeer::BRANCH_NAME);
            $criteria->addSelectColumn(BranchPeer::BRANCH_TIMEZONE);
            $criteria->addSelectColumn(BranchPeer::BRANCH_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(BranchPeer::BRANCH_ADDRESS);
            $criteria->addSelectColumn(BranchPeer::BRANCH_ADDRESS2);
            $criteria->addSelectColumn(BranchPeer::BRANCH_CITY);
            $criteria->addSelectColumn(BranchPeer::BRANCH_STATE);
            $criteria->addSelectColumn(BranchPeer::BRANCH_ZIPCODE);
        } else {
            $criteria->addSelectColumn($alias . '.idbranch');
            $criteria->addSelectColumn($alias . '.idcompany');
            $criteria->addSelectColumn($alias . '.branch_name');
            $criteria->addSelectColumn($alias . '.branch_timezone');
            $criteria->addSelectColumn($alias . '.branch_iso_codecountry');
            $criteria->addSelectColumn($alias . '.branch_address');
            $criteria->addSelectColumn($alias . '.branch_address2');
            $criteria->addSelectColumn($alias . '.branch_city');
            $criteria->addSelectColumn($alias . '.branch_state');
            $criteria->addSelectColumn($alias . '.branch_zipcode');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BranchPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BranchPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BranchPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Branch
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BranchPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return BranchPeer::populateObjects(BranchPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BranchPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Branch $obj A Branch object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdbranch();
            } // if key === null
            BranchPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Branch object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Branch) {
                $key = (string) $value->getIdbranch();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Branch object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BranchPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Branch Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BranchPeer::$instances[$key])) {
                return BranchPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (BranchPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        BranchPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to branch
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in BranchUserAclPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BranchUserAclPeer::clearInstancePool();
        // Invalidate objects in BranchdepartmentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BranchdepartmentPeer::clearInstancePool();
        // Invalidate objects in OrderPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        OrderPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = BranchPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BranchPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BranchPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BranchPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Branch object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BranchPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BranchPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BranchPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BranchPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BranchPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Company table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinCompany(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BranchPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BranchPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BranchPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Branch objects pre-filled with their Company objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Branch objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BranchPeer::DATABASE_NAME);
        }

        BranchPeer::addSelectColumns($criteria);
        $startcol = BranchPeer::NUM_HYDRATE_COLUMNS;
        CompanyPeer::addSelectColumns($criteria);

        $criteria->addJoin(BranchPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BranchPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BranchPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BranchPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BranchPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = CompanyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = CompanyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    CompanyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Branch) to $obj2 (Company)
                $obj2->addBranch($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BranchPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BranchPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BranchPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Branch objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Branch objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BranchPeer::DATABASE_NAME);
        }

        BranchPeer::addSelectColumns($criteria);
        $startcol2 = BranchPeer::NUM_HYDRATE_COLUMNS;

        CompanyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CompanyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BranchPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BranchPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BranchPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BranchPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BranchPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Company rows

            $key2 = CompanyPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = CompanyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = CompanyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CompanyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Branch) to the collection in $obj2 (Company)
                $obj2->addBranch($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(BranchPeer::DATABASE_NAME)->getTable(BranchPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBranchPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBranchPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \BranchTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return BranchPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Branch or Criteria object.
     *
     * @param      mixed $values Criteria or Branch object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Branch object
        }

        if ($criteria->containsKey(BranchPeer::IDBRANCH) && $criteria->keyContainsValue(BranchPeer::IDBRANCH) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BranchPeer::IDBRANCH.')');
        }


        // Set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Branch or Criteria object.
     *
     * @param      mixed $values Criteria or Branch object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BranchPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BranchPeer::IDBRANCH);
            $value = $criteria->remove(BranchPeer::IDBRANCH);
            if ($value) {
                $selectCriteria->add(BranchPeer::IDBRANCH, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BranchPeer::TABLE_NAME);
            }

        } else { // $values is Branch object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the branch table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BranchPeer::doOnDeleteCascade(new Criteria(BranchPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(BranchPeer::TABLE_NAME, $con, BranchPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BranchPeer::clearInstancePool();
            BranchPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Branch or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Branch object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Branch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BranchPeer::DATABASE_NAME);
            $criteria->add(BranchPeer::IDBRANCH, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(BranchPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += BranchPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                BranchPeer::clearInstancePool();
            } elseif ($values instanceof Branch) { // it's a model object
                BranchPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    BranchPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            BranchPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = BranchPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related BranchUserAcl objects
            $criteria = new Criteria(BranchUserAclPeer::DATABASE_NAME);

            $criteria->add(BranchUserAclPeer::IDBRANCH, $obj->getIdbranch());
            $affectedRows += BranchUserAclPeer::doDelete($criteria, $con);

            // delete related Branchdepartment objects
            $criteria = new Criteria(BranchdepartmentPeer::DATABASE_NAME);

            $criteria->add(BranchdepartmentPeer::IDBRANCH, $obj->getIdbranch());
            $affectedRows += BranchdepartmentPeer::doDelete($criteria, $con);

            // delete related Order objects
            $criteria = new Criteria(OrderPeer::DATABASE_NAME);

            $criteria->add(OrderPeer::IDBRANCH, $obj->getIdbranch());
            $affectedRows += OrderPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Branch object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Branch $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BranchPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BranchPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(BranchPeer::DATABASE_NAME, BranchPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Branch
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BranchPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BranchPeer::DATABASE_NAME);
        $criteria->add(BranchPeer::IDBRANCH, $pk);

        $v = BranchPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Branch[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BranchPeer::DATABASE_NAME);
            $criteria->add(BranchPeer::IDBRANCH, $pks, Criteria::IN);
            $objs = BranchPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBranchPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBranchPeer::buildTableMap();

