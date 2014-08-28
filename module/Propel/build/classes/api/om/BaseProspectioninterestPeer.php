<?php


/**
 * Base static class for performing query and update operations on the 'prospectioninterest' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseProspectioninterestPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'prospectioninterest';

    /** the related Propel class for this table */
    const OM_CLASS = 'Prospectioninterest';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProspectioninterestTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 6;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 6;

    /** the column name for the idprospectioninterest field */
    const IDPROSPECTIONINTEREST = 'prospectioninterest.idprospectioninterest';

    /** the column name for the iduser field */
    const IDUSER = 'prospectioninterest.iduser';

    /** the column name for the idtriggerprospection field */
    const IDTRIGGERPROSPECTION = 'prospectioninterest.idtriggerprospection';

    /** the column name for the prospectioninterest_level field */
    const PROSPECTIONINTEREST_LEVEL = 'prospectioninterest.prospectioninterest_level';

    /** the column name for the prospectioninterest_date field */
    const PROSPECTIONINTEREST_DATE = 'prospectioninterest.prospectioninterest_date';

    /** the column name for the prospectioninterest_note field */
    const PROSPECTIONINTEREST_NOTE = 'prospectioninterest.prospectioninterest_note';

    /** The enumerated values for the prospectioninterest_level field */
    const PROSPECTIONINTEREST_LEVEL_1 = '1';
    const PROSPECTIONINTEREST_LEVEL_2 = '2';
    const PROSPECTIONINTEREST_LEVEL_3 = '3';
    const PROSPECTIONINTEREST_LEVEL_4 = '4';
    const PROSPECTIONINTEREST_LEVEL_5 = '5';
    const PROSPECTIONINTEREST_LEVEL_6 = '6';
    const PROSPECTIONINTEREST_LEVEL_7 = '7';
    const PROSPECTIONINTEREST_LEVEL_8 = '8';
    const PROSPECTIONINTEREST_LEVEL_9 = '9';
    const PROSPECTIONINTEREST_LEVEL_10 = '10';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Prospectioninterest objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Prospectioninterest[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProspectioninterestPeer::$fieldNames[ProspectioninterestPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idprospectioninterest', 'Iduser', 'Idtriggerprospection', 'ProspectioninterestLevel', 'ProspectioninterestDate', 'ProspectioninterestNote', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idprospectioninterest', 'iduser', 'idtriggerprospection', 'prospectioninterestLevel', 'prospectioninterestDate', 'prospectioninterestNote', ),
        BasePeer::TYPE_COLNAME => array (ProspectioninterestPeer::IDPROSPECTIONINTEREST, ProspectioninterestPeer::IDUSER, ProspectioninterestPeer::IDTRIGGERPROSPECTION, ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL, ProspectioninterestPeer::PROSPECTIONINTEREST_DATE, ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPROSPECTIONINTEREST', 'IDUSER', 'IDTRIGGERPROSPECTION', 'PROSPECTIONINTEREST_LEVEL', 'PROSPECTIONINTEREST_DATE', 'PROSPECTIONINTEREST_NOTE', ),
        BasePeer::TYPE_FIELDNAME => array ('idprospectioninterest', 'iduser', 'idtriggerprospection', 'prospectioninterest_level', 'prospectioninterest_date', 'prospectioninterest_note', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProspectioninterestPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idprospectioninterest' => 0, 'Iduser' => 1, 'Idtriggerprospection' => 2, 'ProspectioninterestLevel' => 3, 'ProspectioninterestDate' => 4, 'ProspectioninterestNote' => 5, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idprospectioninterest' => 0, 'iduser' => 1, 'idtriggerprospection' => 2, 'prospectioninterestLevel' => 3, 'prospectioninterestDate' => 4, 'prospectioninterestNote' => 5, ),
        BasePeer::TYPE_COLNAME => array (ProspectioninterestPeer::IDPROSPECTIONINTEREST => 0, ProspectioninterestPeer::IDUSER => 1, ProspectioninterestPeer::IDTRIGGERPROSPECTION => 2, ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL => 3, ProspectioninterestPeer::PROSPECTIONINTEREST_DATE => 4, ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE => 5, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPROSPECTIONINTEREST' => 0, 'IDUSER' => 1, 'IDTRIGGERPROSPECTION' => 2, 'PROSPECTIONINTEREST_LEVEL' => 3, 'PROSPECTIONINTEREST_DATE' => 4, 'PROSPECTIONINTEREST_NOTE' => 5, ),
        BasePeer::TYPE_FIELDNAME => array ('idprospectioninterest' => 0, 'iduser' => 1, 'idtriggerprospection' => 2, 'prospectioninterest_level' => 3, 'prospectioninterest_date' => 4, 'prospectioninterest_note' => 5, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL => array(
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_1,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_2,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_3,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_4,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_5,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_6,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_7,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_8,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_9,
            ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL_10,
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
        $toNames = ProspectioninterestPeer::getFieldNames($toType);
        $key = isset(ProspectioninterestPeer::$fieldKeys[$fromType][$name]) ? ProspectioninterestPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProspectioninterestPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProspectioninterestPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProspectioninterestPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ProspectioninterestPeer::$enumValueSets;
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
        $valueSets = ProspectioninterestPeer::getValueSets();

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
        $values = ProspectioninterestPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ProspectioninterestPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProspectioninterestPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProspectioninterestPeer::IDPROSPECTIONINTEREST);
            $criteria->addSelectColumn(ProspectioninterestPeer::IDUSER);
            $criteria->addSelectColumn(ProspectioninterestPeer::IDTRIGGERPROSPECTION);
            $criteria->addSelectColumn(ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL);
            $criteria->addSelectColumn(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE);
            $criteria->addSelectColumn(ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE);
        } else {
            $criteria->addSelectColumn($alias . '.idprospectioninterest');
            $criteria->addSelectColumn($alias . '.iduser');
            $criteria->addSelectColumn($alias . '.idtriggerprospection');
            $criteria->addSelectColumn($alias . '.prospectioninterest_level');
            $criteria->addSelectColumn($alias . '.prospectioninterest_date');
            $criteria->addSelectColumn($alias . '.prospectioninterest_note');
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
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Prospectioninterest
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProspectioninterestPeer::doSelect($critcopy, $con);
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
        return ProspectioninterestPeer::populateObjects(ProspectioninterestPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

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
     * @param Prospectioninterest $obj A Prospectioninterest object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdprospectioninterest();
            } // if key === null
            ProspectioninterestPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Prospectioninterest object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Prospectioninterest) {
                $key = (string) $value->getIdprospectioninterest();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Prospectioninterest object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProspectioninterestPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Prospectioninterest Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProspectioninterestPeer::$instances[$key])) {
                return ProspectioninterestPeer::$instances[$key];
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
        foreach (ProspectioninterestPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProspectioninterestPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to prospectioninterest
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
        $cls = ProspectioninterestPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProspectioninterestPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProspectioninterestPeer::addInstanceToPool($obj, $key);
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
     * @return array (Prospectioninterest object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProspectioninterestPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProspectioninterestPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProspectioninterestPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Triggerprospection table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTriggerprospection(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related User table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);

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
     * Selects a collection of Prospectioninterest objects pre-filled with their Triggerprospection objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prospectioninterest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTriggerprospection(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);
        }

        ProspectioninterestPeer::addSelectColumns($criteria);
        $startcol = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;
        TriggerprospectionPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProspectioninterestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProspectioninterestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProspectioninterestPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TriggerprospectionPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TriggerprospectionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TriggerprospectionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TriggerprospectionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Prospectioninterest) to $obj2 (Triggerprospection)
                $obj2->addProspectioninterest($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prospectioninterest objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prospectioninterest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);
        }

        ProspectioninterestPeer::addSelectColumns($criteria);
        $startcol = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProspectioninterestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProspectioninterestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProspectioninterestPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Prospectioninterest) to $obj2 (User)
                $obj2->addProspectioninterest($obj1);

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
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);

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
     * Selects a collection of Prospectioninterest objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prospectioninterest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);
        }

        ProspectioninterestPeer::addSelectColumns($criteria);
        $startcol2 = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;

        TriggerprospectionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + TriggerprospectionPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProspectioninterestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProspectioninterestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProspectioninterestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Triggerprospection rows

            $key2 = TriggerprospectionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = TriggerprospectionPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TriggerprospectionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    TriggerprospectionPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Prospectioninterest) to the collection in $obj2 (Triggerprospection)
                $obj2->addProspectioninterest($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = UserPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = UserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UserPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Prospectioninterest) to the collection in $obj3 (User)
                $obj3->addProspectioninterest($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Triggerprospection table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTriggerprospection(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related User table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProspectioninterestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);

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
     * Selects a collection of Prospectioninterest objects pre-filled with all related objects except Triggerprospection.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prospectioninterest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTriggerprospection(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);
        }

        ProspectioninterestPeer::addSelectColumns($criteria);
        $startcol2 = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProspectioninterestPeer::IDUSER, UserPeer::IDUSER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProspectioninterestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProspectioninterestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProspectioninterestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined User rows

                $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = UserPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Prospectioninterest) to the collection in $obj2 (User)
                $obj2->addProspectioninterest($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prospectioninterest objects pre-filled with all related objects except User.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prospectioninterest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);
        }

        ProspectioninterestPeer::addSelectColumns($criteria);
        $startcol2 = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS;

        TriggerprospectionPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + TriggerprospectionPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProspectioninterestPeer::IDTRIGGERPROSPECTION, TriggerprospectionPeer::IDTRIGGERPROSPECTION, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProspectioninterestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProspectioninterestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProspectioninterestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProspectioninterestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Triggerprospection rows

                $key2 = TriggerprospectionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = TriggerprospectionPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = TriggerprospectionPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    TriggerprospectionPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Prospectioninterest) to the collection in $obj2 (Triggerprospection)
                $obj2->addProspectioninterest($obj1);

            } // if joined row is not null

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
        return Propel::getDatabaseMap(ProspectioninterestPeer::DATABASE_NAME)->getTable(ProspectioninterestPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProspectioninterestPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProspectioninterestPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ProspectioninterestTableMap());
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
        return ProspectioninterestPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Prospectioninterest or Criteria object.
     *
     * @param      mixed $values Criteria or Prospectioninterest object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Prospectioninterest object
        }


        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Prospectioninterest or Criteria object.
     *
     * @param      mixed $values Criteria or Prospectioninterest object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProspectioninterestPeer::IDPROSPECTIONINTEREST);
            $value = $criteria->remove(ProspectioninterestPeer::IDPROSPECTIONINTEREST);
            if ($value) {
                $selectCriteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProspectioninterestPeer::TABLE_NAME);
            }

        } else { // $values is Prospectioninterest object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the prospectioninterest table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ProspectioninterestPeer::TABLE_NAME, $con, ProspectioninterestPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProspectioninterestPeer::clearInstancePool();
            ProspectioninterestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Prospectioninterest or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Prospectioninterest object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ProspectioninterestPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Prospectioninterest) { // it's a model object
            // invalidate the cache for this single object
            ProspectioninterestPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);
            $criteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ProspectioninterestPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ProspectioninterestPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProspectioninterestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Prospectioninterest object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Prospectioninterest $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProspectioninterestPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProspectioninterestPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProspectioninterestPeer::DATABASE_NAME, ProspectioninterestPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Prospectioninterest
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProspectioninterestPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);
        $criteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $pk);

        $v = ProspectioninterestPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Prospectioninterest[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);
            $criteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $pks, Criteria::IN);
            $objs = ProspectioninterestPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseProspectioninterestPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProspectioninterestPeer::buildTableMap();

