<?php


/**
 * Base static class for performing query and update operations on the 'expenseitem' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseExpenseitemPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'expenseitem';

    /** the related Propel class for this table */
    const OM_CLASS = 'Expenseitem';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ExpenseitemTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 5;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 5;

    /** the column name for the idexpenseitem field */
    const IDEXPENSEITEM = 'expenseitem.idexpenseitem';

    /** the column name for the idexpensecategory field */
    const IDEXPENSECATEGORY = 'expenseitem.idexpensecategory';

    /** the column name for the expenseitem_name field */
    const EXPENSEITEM_NAME = 'expenseitem.expenseitem_name';

    /** the column name for the expenseitem_description field */
    const EXPENSEITEM_DESCRIPTION = 'expenseitem.expenseitem_description';

    /** the column name for the expenseitem_cause field */
    const EXPENSEITEM_CAUSE = 'expenseitem.expenseitem_cause';

    /** The enumerated values for the expenseitem_cause field */
    const EXPENSEITEM_CAUSE_OPERATION = 'operation';
    const EXPENSEITEM_CAUSE_SALE = 'sale';
    const EXPENSEITEM_CAUSE_PURCHASEDGOODS = 'purchasedgoods';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Expenseitem objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Expenseitem[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ExpenseitemPeer::$fieldNames[ExpenseitemPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idexpenseitem', 'Idexpensecategory', 'ExpenseitemName', 'ExpenseitemDescription', 'ExpenseitemCause', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idexpenseitem', 'idexpensecategory', 'expenseitemName', 'expenseitemDescription', 'expenseitemCause', ),
        BasePeer::TYPE_COLNAME => array (ExpenseitemPeer::IDEXPENSEITEM, ExpenseitemPeer::IDEXPENSECATEGORY, ExpenseitemPeer::EXPENSEITEM_NAME, ExpenseitemPeer::EXPENSEITEM_DESCRIPTION, ExpenseitemPeer::EXPENSEITEM_CAUSE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDEXPENSEITEM', 'IDEXPENSECATEGORY', 'EXPENSEITEM_NAME', 'EXPENSEITEM_DESCRIPTION', 'EXPENSEITEM_CAUSE', ),
        BasePeer::TYPE_FIELDNAME => array ('idexpenseitem', 'idexpensecategory', 'expenseitem_name', 'expenseitem_description', 'expenseitem_cause', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ExpenseitemPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idexpenseitem' => 0, 'Idexpensecategory' => 1, 'ExpenseitemName' => 2, 'ExpenseitemDescription' => 3, 'ExpenseitemCause' => 4, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idexpenseitem' => 0, 'idexpensecategory' => 1, 'expenseitemName' => 2, 'expenseitemDescription' => 3, 'expenseitemCause' => 4, ),
        BasePeer::TYPE_COLNAME => array (ExpenseitemPeer::IDEXPENSEITEM => 0, ExpenseitemPeer::IDEXPENSECATEGORY => 1, ExpenseitemPeer::EXPENSEITEM_NAME => 2, ExpenseitemPeer::EXPENSEITEM_DESCRIPTION => 3, ExpenseitemPeer::EXPENSEITEM_CAUSE => 4, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDEXPENSEITEM' => 0, 'IDEXPENSECATEGORY' => 1, 'EXPENSEITEM_NAME' => 2, 'EXPENSEITEM_DESCRIPTION' => 3, 'EXPENSEITEM_CAUSE' => 4, ),
        BasePeer::TYPE_FIELDNAME => array ('idexpenseitem' => 0, 'idexpensecategory' => 1, 'expenseitem_name' => 2, 'expenseitem_description' => 3, 'expenseitem_cause' => 4, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ExpenseitemPeer::EXPENSEITEM_CAUSE => array(
            ExpenseitemPeer::EXPENSEITEM_CAUSE_OPERATION,
            ExpenseitemPeer::EXPENSEITEM_CAUSE_SALE,
            ExpenseitemPeer::EXPENSEITEM_CAUSE_PURCHASEDGOODS,
        ),
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
        $toNames = ExpenseitemPeer::getFieldNames($toType);
        $key = isset(ExpenseitemPeer::$fieldKeys[$fromType][$name]) ? ExpenseitemPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ExpenseitemPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ExpenseitemPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ExpenseitemPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ExpenseitemPeer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = ExpenseitemPeer::getValueSets();

        if (!isset($valueSets[$colname])) {
            throw new PropelException(sprintf('Column "%s" has no ValueSet.', $colname));
        }

        return $valueSets[$colname];
    }

    /**
     * Gets the SQL value for the ENUM column value
     *
     * @param string $colname ENUM column name.
     * @param string $enumVal ENUM value.
     *
     * @return int SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = ExpenseitemPeer::getValueSet($colname);
        if (!in_array($enumVal, $values)) {
            throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $colname));
        }

        return array_search($enumVal, $values);
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
     * @param      string $column The column name for current table. (i.e. ExpenseitemPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ExpenseitemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ExpenseitemPeer::IDEXPENSEITEM);
            $criteria->addSelectColumn(ExpenseitemPeer::IDEXPENSECATEGORY);
            $criteria->addSelectColumn(ExpenseitemPeer::EXPENSEITEM_NAME);
            $criteria->addSelectColumn(ExpenseitemPeer::EXPENSEITEM_DESCRIPTION);
            $criteria->addSelectColumn(ExpenseitemPeer::EXPENSEITEM_CAUSE);
        } else {
            $criteria->addSelectColumn($alias . '.idexpenseitem');
            $criteria->addSelectColumn($alias . '.idexpensecategory');
            $criteria->addSelectColumn($alias . '.expenseitem_name');
            $criteria->addSelectColumn($alias . '.expenseitem_description');
            $criteria->addSelectColumn($alias . '.expenseitem_cause');
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
        $criteria->setPrimaryTableName(ExpenseitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenseitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Expenseitem
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ExpenseitemPeer::doSelect($critcopy, $con);
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
        return ExpenseitemPeer::populateObjects(ExpenseitemPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ExpenseitemPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

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
     * @param Expenseitem $obj A Expenseitem object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdexpenseitem();
            } // if key === null
            ExpenseitemPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Expenseitem object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Expenseitem) {
                $key = (string) $value->getIdexpenseitem();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Expenseitem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ExpenseitemPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Expenseitem Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ExpenseitemPeer::$instances[$key])) {
                return ExpenseitemPeer::$instances[$key];
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
        foreach (ExpenseitemPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ExpenseitemPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to expenseitem
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ExpenserecurrencyPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ExpenserecurrencyPeer::clearInstancePool();
        // Invalidate objects in ExpensetransactionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ExpensetransactionPeer::clearInstancePool();
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
        $cls = ExpenseitemPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ExpenseitemPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ExpenseitemPeer::addInstanceToPool($obj, $key);
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
     * @return array (Expenseitem object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ExpenseitemPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ExpenseitemPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ExpenseitemPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ExpenseitemPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Expensecategory table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinExpensecategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ExpenseitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenseitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ExpenseitemPeer::IDEXPENSECATEGORY, ExpensecategoryPeer::IDEXPENSECATEGORY, $join_behavior);

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
     * Selects a collection of Expenseitem objects pre-filled with their Expensecategory objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Expenseitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinExpensecategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);
        }

        ExpenseitemPeer::addSelectColumns($criteria);
        $startcol = ExpenseitemPeer::NUM_HYDRATE_COLUMNS;
        ExpensecategoryPeer::addSelectColumns($criteria);

        $criteria->addJoin(ExpenseitemPeer::IDEXPENSECATEGORY, ExpensecategoryPeer::IDEXPENSECATEGORY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ExpenseitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ExpenseitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ExpenseitemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ExpensecategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ExpensecategoryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ExpensecategoryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ExpensecategoryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Expenseitem) to $obj2 (Expensecategory)
                $obj2->addExpenseitem($obj1);

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
        $criteria->setPrimaryTableName(ExpenseitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenseitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ExpenseitemPeer::IDEXPENSECATEGORY, ExpensecategoryPeer::IDEXPENSECATEGORY, $join_behavior);

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
     * Selects a collection of Expenseitem objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Expenseitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);
        }

        ExpenseitemPeer::addSelectColumns($criteria);
        $startcol2 = ExpenseitemPeer::NUM_HYDRATE_COLUMNS;

        ExpensecategoryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ExpensecategoryPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ExpenseitemPeer::IDEXPENSECATEGORY, ExpensecategoryPeer::IDEXPENSECATEGORY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ExpenseitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ExpenseitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ExpenseitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Expensecategory rows

            $key2 = ExpensecategoryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ExpensecategoryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ExpensecategoryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ExpensecategoryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Expenseitem) to the collection in $obj2 (Expensecategory)
                $obj2->addExpenseitem($obj1);
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
        return Propel::getDatabaseMap(ExpenseitemPeer::DATABASE_NAME)->getTable(ExpenseitemPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseExpenseitemPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseExpenseitemPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ExpenseitemTableMap());
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
        return ExpenseitemPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Expenseitem or Criteria object.
     *
     * @param      mixed $values Criteria or Expenseitem object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Expenseitem object
        }

        if ($criteria->containsKey(ExpenseitemPeer::IDEXPENSEITEM) && $criteria->keyContainsValue(ExpenseitemPeer::IDEXPENSEITEM) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ExpenseitemPeer::IDEXPENSEITEM.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Expenseitem or Criteria object.
     *
     * @param      mixed $values Criteria or Expenseitem object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ExpenseitemPeer::IDEXPENSEITEM);
            $value = $criteria->remove(ExpenseitemPeer::IDEXPENSEITEM);
            if ($value) {
                $selectCriteria->add(ExpenseitemPeer::IDEXPENSEITEM, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ExpenseitemPeer::TABLE_NAME);
            }

        } else { // $values is Expenseitem object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the expenseitem table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ExpenseitemPeer::doOnDeleteCascade(new Criteria(ExpenseitemPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ExpenseitemPeer::TABLE_NAME, $con, ExpenseitemPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpenseitemPeer::clearInstancePool();
            ExpenseitemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Expenseitem or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Expenseitem object or primary key or array of primary keys
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
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Expenseitem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);
            $criteria->add(ExpenseitemPeer::IDEXPENSEITEM, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ExpenseitemPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ExpenseitemPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ExpenseitemPeer::clearInstancePool();
            } elseif ($values instanceof Expenseitem) { // it's a model object
                ExpenseitemPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ExpenseitemPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ExpenseitemPeer::clearRelatedInstancePool();
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
        $objects = ExpenseitemPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Expenserecurrency objects
            $criteria = new Criteria(ExpenserecurrencyPeer::DATABASE_NAME);

            $criteria->add(ExpenserecurrencyPeer::IDEXPENSEITEM, $obj->getIdexpenseitem());
            $affectedRows += ExpenserecurrencyPeer::doDelete($criteria, $con);

            // delete related Expensetransaction objects
            $criteria = new Criteria(ExpensetransactionPeer::DATABASE_NAME);

            $criteria->add(ExpensetransactionPeer::IDEXPENSEITEM, $obj->getIdexpenseitem());
            $affectedRows += ExpensetransactionPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Expenseitem object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Expenseitem $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ExpenseitemPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ExpenseitemPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ExpenseitemPeer::DATABASE_NAME, ExpenseitemPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Expenseitem
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ExpenseitemPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);
        $criteria->add(ExpenseitemPeer::IDEXPENSEITEM, $pk);

        $v = ExpenseitemPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Expenseitem[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);
            $criteria->add(ExpenseitemPeer::IDEXPENSEITEM, $pks, Criteria::IN);
            $objs = ExpenseitemPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseExpenseitemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseExpenseitemPeer::buildTableMap();

