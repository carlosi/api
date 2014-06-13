<?php


/**
 * Base static class for performing query and update operations on the 'expenserecurrency' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseExpenserecurrencyPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'expenserecurrency';

    /** the related Propel class for this table */
    const OM_CLASS = 'Expenserecurrency';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ExpenserecurrencyTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the idexpenserecurrency field */
    const IDEXPENSERECURRENCY = 'expenserecurrency.idexpenserecurrency';

    /** the column name for the idexpenseitem field */
    const IDEXPENSEITEM = 'expenserecurrency.idexpenseitem';

    /** the column name for the expenserecurrency_comment field */
    const EXPENSERECURRENCY_COMMENT = 'expenserecurrency.expenserecurrency_comment';

    /** the column name for the expenserecurrency_themequantity field */
    const EXPENSERECURRENCY_THEMEQUANTITY = 'expenserecurrency.expenserecurrency_themequantity';

    /** the column name for the expenserecurrency_themevalue field */
    const EXPENSERECURRENCY_THEMEVALUE = 'expenserecurrency.expenserecurrency_themevalue';

    /** the column name for the expenserecurrency_cycle field */
    const EXPENSERECURRENCY_CYCLE = 'expenserecurrency.expenserecurrency_cycle';

    /** the column name for the expenserecurrency_applyeach field */
    const EXPENSERECURRENCY_APPLYEACH = 'expenserecurrency.expenserecurrency_applyeach';

    /** The enumerated values for the expenserecurrency_cycle field */
    const EXPENSERECURRENCY_CYCLE_WEEKLY = 'weekly';
    const EXPENSERECURRENCY_CYCLE_MONTHLY = 'monthly';
    const EXPENSERECURRENCY_CYCLE_ANNUALLY = 'annually';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Expenserecurrency objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Expenserecurrency[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ExpenserecurrencyPeer::$fieldNames[ExpenserecurrencyPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idexpenserecurrency', 'Idexpenseitem', 'ExpenserecurrencyComment', 'ExpenserecurrencyThemequantity', 'ExpenserecurrencyThemevalue', 'ExpenserecurrencyCycle', 'ExpenserecurrencyApplyeach', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idexpenserecurrency', 'idexpenseitem', 'expenserecurrencyComment', 'expenserecurrencyThemequantity', 'expenserecurrencyThemevalue', 'expenserecurrencyCycle', 'expenserecurrencyApplyeach', ),
        BasePeer::TYPE_COLNAME => array (ExpenserecurrencyPeer::IDEXPENSERECURRENCY, ExpenserecurrencyPeer::IDEXPENSEITEM, ExpenserecurrencyPeer::EXPENSERECURRENCY_COMMENT, ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY, ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE, ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE, ExpenserecurrencyPeer::EXPENSERECURRENCY_APPLYEACH, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDEXPENSERECURRENCY', 'IDEXPENSEITEM', 'EXPENSERECURRENCY_COMMENT', 'EXPENSERECURRENCY_THEMEQUANTITY', 'EXPENSERECURRENCY_THEMEVALUE', 'EXPENSERECURRENCY_CYCLE', 'EXPENSERECURRENCY_APPLYEACH', ),
        BasePeer::TYPE_FIELDNAME => array ('idexpenserecurrency', 'idexpenseitem', 'expenserecurrency_comment', 'expenserecurrency_themequantity', 'expenserecurrency_themevalue', 'expenserecurrency_cycle', 'expenserecurrency_applyeach', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ExpenserecurrencyPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idexpenserecurrency' => 0, 'Idexpenseitem' => 1, 'ExpenserecurrencyComment' => 2, 'ExpenserecurrencyThemequantity' => 3, 'ExpenserecurrencyThemevalue' => 4, 'ExpenserecurrencyCycle' => 5, 'ExpenserecurrencyApplyeach' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idexpenserecurrency' => 0, 'idexpenseitem' => 1, 'expenserecurrencyComment' => 2, 'expenserecurrencyThemequantity' => 3, 'expenserecurrencyThemevalue' => 4, 'expenserecurrencyCycle' => 5, 'expenserecurrencyApplyeach' => 6, ),
        BasePeer::TYPE_COLNAME => array (ExpenserecurrencyPeer::IDEXPENSERECURRENCY => 0, ExpenserecurrencyPeer::IDEXPENSEITEM => 1, ExpenserecurrencyPeer::EXPENSERECURRENCY_COMMENT => 2, ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY => 3, ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE => 4, ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE => 5, ExpenserecurrencyPeer::EXPENSERECURRENCY_APPLYEACH => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDEXPENSERECURRENCY' => 0, 'IDEXPENSEITEM' => 1, 'EXPENSERECURRENCY_COMMENT' => 2, 'EXPENSERECURRENCY_THEMEQUANTITY' => 3, 'EXPENSERECURRENCY_THEMEVALUE' => 4, 'EXPENSERECURRENCY_CYCLE' => 5, 'EXPENSERECURRENCY_APPLYEACH' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('idexpenserecurrency' => 0, 'idexpenseitem' => 1, 'expenserecurrency_comment' => 2, 'expenserecurrency_themequantity' => 3, 'expenserecurrency_themevalue' => 4, 'expenserecurrency_cycle' => 5, 'expenserecurrency_applyeach' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE => array(
            ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE_WEEKLY,
            ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE_MONTHLY,
            ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE_ANNUALLY,
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
        $toNames = ExpenserecurrencyPeer::getFieldNames($toType);
        $key = isset(ExpenserecurrencyPeer::$fieldKeys[$fromType][$name]) ? ExpenserecurrencyPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ExpenserecurrencyPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ExpenserecurrencyPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ExpenserecurrencyPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ExpenserecurrencyPeer::$enumValueSets;
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
        $valueSets = ExpenserecurrencyPeer::getValueSets();

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
        $values = ExpenserecurrencyPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ExpenserecurrencyPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ExpenserecurrencyPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ExpenserecurrencyPeer::IDEXPENSERECURRENCY);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::IDEXPENSEITEM);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::EXPENSERECURRENCY_COMMENT);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEQUANTITY);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::EXPENSERECURRENCY_THEMEVALUE);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::EXPENSERECURRENCY_CYCLE);
            $criteria->addSelectColumn(ExpenserecurrencyPeer::EXPENSERECURRENCY_APPLYEACH);
        } else {
            $criteria->addSelectColumn($alias . '.idexpenserecurrency');
            $criteria->addSelectColumn($alias . '.idexpenseitem');
            $criteria->addSelectColumn($alias . '.expenserecurrency_comment');
            $criteria->addSelectColumn($alias . '.expenserecurrency_themequantity');
            $criteria->addSelectColumn($alias . '.expenserecurrency_themevalue');
            $criteria->addSelectColumn($alias . '.expenserecurrency_cycle');
            $criteria->addSelectColumn($alias . '.expenserecurrency_applyeach');
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
        $criteria->setPrimaryTableName(ExpenserecurrencyPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenserecurrencyPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Expenserecurrency
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ExpenserecurrencyPeer::doSelect($critcopy, $con);
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
        return ExpenserecurrencyPeer::populateObjects(ExpenserecurrencyPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ExpenserecurrencyPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

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
     * @param Expenserecurrency $obj A Expenserecurrency object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdexpenserecurrency();
            } // if key === null
            ExpenserecurrencyPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Expenserecurrency object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Expenserecurrency) {
                $key = (string) $value->getIdexpenserecurrency();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Expenserecurrency object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ExpenserecurrencyPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Expenserecurrency Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ExpenserecurrencyPeer::$instances[$key])) {
                return ExpenserecurrencyPeer::$instances[$key];
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
        foreach (ExpenserecurrencyPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ExpenserecurrencyPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to expenserecurrency
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
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
        $cls = ExpenserecurrencyPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ExpenserecurrencyPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ExpenserecurrencyPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ExpenserecurrencyPeer::addInstanceToPool($obj, $key);
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
     * @return array (Expenserecurrency object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ExpenserecurrencyPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ExpenserecurrencyPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ExpenserecurrencyPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ExpenserecurrencyPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ExpenserecurrencyPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Expenseitem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinExpenseitem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ExpenserecurrencyPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenserecurrencyPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ExpenserecurrencyPeer::IDEXPENSEITEM, ExpenseitemPeer::IDEXPENSEITEM, $join_behavior);

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
     * Selects a collection of Expenserecurrency objects pre-filled with their Expenseitem objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Expenserecurrency objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinExpenseitem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);
        }

        ExpenserecurrencyPeer::addSelectColumns($criteria);
        $startcol = ExpenserecurrencyPeer::NUM_HYDRATE_COLUMNS;
        ExpenseitemPeer::addSelectColumns($criteria);

        $criteria->addJoin(ExpenserecurrencyPeer::IDEXPENSEITEM, ExpenseitemPeer::IDEXPENSEITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ExpenserecurrencyPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ExpenserecurrencyPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ExpenserecurrencyPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ExpenserecurrencyPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ExpenseitemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ExpenseitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ExpenseitemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Expenserecurrency) to $obj2 (Expenseitem)
                $obj2->addExpenserecurrency($obj1);

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
        $criteria->setPrimaryTableName(ExpenserecurrencyPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ExpenserecurrencyPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ExpenserecurrencyPeer::IDEXPENSEITEM, ExpenseitemPeer::IDEXPENSEITEM, $join_behavior);

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
     * Selects a collection of Expenserecurrency objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Expenserecurrency objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);
        }

        ExpenserecurrencyPeer::addSelectColumns($criteria);
        $startcol2 = ExpenserecurrencyPeer::NUM_HYDRATE_COLUMNS;

        ExpenseitemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ExpenseitemPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ExpenserecurrencyPeer::IDEXPENSEITEM, ExpenseitemPeer::IDEXPENSEITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ExpenserecurrencyPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ExpenserecurrencyPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ExpenserecurrencyPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ExpenserecurrencyPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Expenseitem rows

            $key2 = ExpenseitemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ExpenseitemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ExpenseitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ExpenseitemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Expenserecurrency) to the collection in $obj2 (Expenseitem)
                $obj2->addExpenserecurrency($obj1);
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
        return Propel::getDatabaseMap(ExpenserecurrencyPeer::DATABASE_NAME)->getTable(ExpenserecurrencyPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseExpenserecurrencyPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseExpenserecurrencyPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ExpenserecurrencyTableMap());
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
        return ExpenserecurrencyPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Expenserecurrency or Criteria object.
     *
     * @param      mixed $values Criteria or Expenserecurrency object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Expenserecurrency object
        }

        if ($criteria->containsKey(ExpenserecurrencyPeer::IDEXPENSERECURRENCY) && $criteria->keyContainsValue(ExpenserecurrencyPeer::IDEXPENSERECURRENCY) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ExpenserecurrencyPeer::IDEXPENSERECURRENCY.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Expenserecurrency or Criteria object.
     *
     * @param      mixed $values Criteria or Expenserecurrency object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ExpenserecurrencyPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ExpenserecurrencyPeer::IDEXPENSERECURRENCY);
            $value = $criteria->remove(ExpenserecurrencyPeer::IDEXPENSERECURRENCY);
            if ($value) {
                $selectCriteria->add(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ExpenserecurrencyPeer::TABLE_NAME);
            }

        } else { // $values is Expenserecurrency object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the expenserecurrency table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ExpenserecurrencyPeer::TABLE_NAME, $con, ExpenserecurrencyPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpenserecurrencyPeer::clearInstancePool();
            ExpenserecurrencyPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Expenserecurrency or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Expenserecurrency object or primary key or array of primary keys
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
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ExpenserecurrencyPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Expenserecurrency) { // it's a model object
            // invalidate the cache for this single object
            ExpenserecurrencyPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ExpenserecurrencyPeer::DATABASE_NAME);
            $criteria->add(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ExpenserecurrencyPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ExpenserecurrencyPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ExpenserecurrencyPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Expenserecurrency object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Expenserecurrency $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ExpenserecurrencyPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ExpenserecurrencyPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ExpenserecurrencyPeer::DATABASE_NAME, ExpenserecurrencyPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Expenserecurrency
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ExpenserecurrencyPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ExpenserecurrencyPeer::DATABASE_NAME);
        $criteria->add(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $pk);

        $v = ExpenserecurrencyPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Expenserecurrency[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ExpenserecurrencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ExpenserecurrencyPeer::DATABASE_NAME);
            $criteria->add(ExpenserecurrencyPeer::IDEXPENSERECURRENCY, $pks, Criteria::IN);
            $objs = ExpenserecurrencyPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseExpenserecurrencyPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseExpenserecurrencyPeer::buildTableMap();

