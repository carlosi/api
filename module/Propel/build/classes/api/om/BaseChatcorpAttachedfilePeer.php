<?php


/**
 * Base static class for performing query and update operations on the 'chatcorp_attachedfile' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseChatcorpAttachedfilePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'chatcorp_attachedfile';

    /** the related Propel class for this table */
    const OM_CLASS = 'ChatcorpAttachedfile';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ChatcorpAttachedfileTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 3;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 3;

    /** the column name for the idchatcorp_attachedfile field */
    const IDCHATCORP_ATTACHEDFILE = 'chatcorp_attachedfile.idchatcorp_attachedfile';

    /** the column name for the idchatcorp field */
    const IDCHATCORP = 'chatcorp_attachedfile.idchatcorp';

    /** the column name for the chatcorp_attachedfile_url field */
    const CHATCORP_ATTACHEDFILE_URL = 'chatcorp_attachedfile.chatcorp_attachedfile_url';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of ChatcorpAttachedfile objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array ChatcorpAttachedfile[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ChatcorpAttachedfilePeer::$fieldNames[ChatcorpAttachedfilePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdchatcorpAttachedfile', 'Idchatcorp', 'ChatcorpAttachedfileUrl', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idchatcorpAttachedfile', 'idchatcorp', 'chatcorpAttachedfileUrl', ),
        BasePeer::TYPE_COLNAME => array (ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, ChatcorpAttachedfilePeer::IDCHATCORP, ChatcorpAttachedfilePeer::CHATCORP_ATTACHEDFILE_URL, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCHATCORP_ATTACHEDFILE', 'IDCHATCORP', 'CHATCORP_ATTACHEDFILE_URL', ),
        BasePeer::TYPE_FIELDNAME => array ('idchatcorp_attachedfile', 'idchatcorp', 'chatcorp_attachedfile_url', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ChatcorpAttachedfilePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdchatcorpAttachedfile' => 0, 'Idchatcorp' => 1, 'ChatcorpAttachedfileUrl' => 2, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idchatcorpAttachedfile' => 0, 'idchatcorp' => 1, 'chatcorpAttachedfileUrl' => 2, ),
        BasePeer::TYPE_COLNAME => array (ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE => 0, ChatcorpAttachedfilePeer::IDCHATCORP => 1, ChatcorpAttachedfilePeer::CHATCORP_ATTACHEDFILE_URL => 2, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCHATCORP_ATTACHEDFILE' => 0, 'IDCHATCORP' => 1, 'CHATCORP_ATTACHEDFILE_URL' => 2, ),
        BasePeer::TYPE_FIELDNAME => array ('idchatcorp_attachedfile' => 0, 'idchatcorp' => 1, 'chatcorp_attachedfile_url' => 2, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, )
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
        $toNames = ChatcorpAttachedfilePeer::getFieldNames($toType);
        $key = isset(ChatcorpAttachedfilePeer::$fieldKeys[$fromType][$name]) ? ChatcorpAttachedfilePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ChatcorpAttachedfilePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ChatcorpAttachedfilePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ChatcorpAttachedfilePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ChatcorpAttachedfilePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ChatcorpAttachedfilePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE);
            $criteria->addSelectColumn(ChatcorpAttachedfilePeer::IDCHATCORP);
            $criteria->addSelectColumn(ChatcorpAttachedfilePeer::CHATCORP_ATTACHEDFILE_URL);
        } else {
            $criteria->addSelectColumn($alias . '.idchatcorp_attachedfile');
            $criteria->addSelectColumn($alias . '.idchatcorp');
            $criteria->addSelectColumn($alias . '.chatcorp_attachedfile_url');
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
        $criteria->setPrimaryTableName(ChatcorpAttachedfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return ChatcorpAttachedfile
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ChatcorpAttachedfilePeer::doSelect($critcopy, $con);
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
        return ChatcorpAttachedfilePeer::populateObjects(ChatcorpAttachedfilePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

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
     * @param ChatcorpAttachedfile $obj A ChatcorpAttachedfile object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdchatcorpAttachedfile();
            } // if key === null
            ChatcorpAttachedfilePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A ChatcorpAttachedfile object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof ChatcorpAttachedfile) {
                $key = (string) $value->getIdchatcorpAttachedfile();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ChatcorpAttachedfile object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ChatcorpAttachedfilePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return ChatcorpAttachedfile Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ChatcorpAttachedfilePeer::$instances[$key])) {
                return ChatcorpAttachedfilePeer::$instances[$key];
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
        foreach (ChatcorpAttachedfilePeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ChatcorpAttachedfilePeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to chatcorp_attachedfile
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
        $cls = ChatcorpAttachedfilePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ChatcorpAttachedfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ChatcorpAttachedfilePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChatcorpAttachedfilePeer::addInstanceToPool($obj, $key);
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
     * @return array (ChatcorpAttachedfile object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ChatcorpAttachedfilePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ChatcorpAttachedfilePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ChatcorpAttachedfilePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChatcorpAttachedfilePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ChatcorpAttachedfilePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Chatcorp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinChatcorp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ChatcorpAttachedfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ChatcorpAttachedfilePeer::IDCHATCORP, ChatcorpPeer::IDCHATCORP, $join_behavior);

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
     * Selects a collection of ChatcorpAttachedfile objects pre-filled with their Chatcorp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ChatcorpAttachedfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinChatcorp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);
        }

        ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        $startcol = ChatcorpAttachedfilePeer::NUM_HYDRATE_COLUMNS;
        ChatcorpPeer::addSelectColumns($criteria);

        $criteria->addJoin(ChatcorpAttachedfilePeer::IDCHATCORP, ChatcorpPeer::IDCHATCORP, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ChatcorpAttachedfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ChatcorpAttachedfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ChatcorpAttachedfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ChatcorpAttachedfilePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ChatcorpPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ChatcorpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ChatcorpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ChatcorpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (ChatcorpAttachedfile) to $obj2 (Chatcorp)
                $obj2->addChatcorpAttachedfile($obj1);

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
        $criteria->setPrimaryTableName(ChatcorpAttachedfilePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ChatcorpAttachedfilePeer::IDCHATCORP, ChatcorpPeer::IDCHATCORP, $join_behavior);

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
     * Selects a collection of ChatcorpAttachedfile objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of ChatcorpAttachedfile objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);
        }

        ChatcorpAttachedfilePeer::addSelectColumns($criteria);
        $startcol2 = ChatcorpAttachedfilePeer::NUM_HYDRATE_COLUMNS;

        ChatcorpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ChatcorpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ChatcorpAttachedfilePeer::IDCHATCORP, ChatcorpPeer::IDCHATCORP, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ChatcorpAttachedfilePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ChatcorpAttachedfilePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ChatcorpAttachedfilePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ChatcorpAttachedfilePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Chatcorp rows

            $key2 = ChatcorpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ChatcorpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ChatcorpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ChatcorpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (ChatcorpAttachedfile) to the collection in $obj2 (Chatcorp)
                $obj2->addChatcorpAttachedfile($obj1);
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
        return Propel::getDatabaseMap(ChatcorpAttachedfilePeer::DATABASE_NAME)->getTable(ChatcorpAttachedfilePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseChatcorpAttachedfilePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseChatcorpAttachedfilePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ChatcorpAttachedfileTableMap());
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
        return ChatcorpAttachedfilePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a ChatcorpAttachedfile or Criteria object.
     *
     * @param      mixed $values Criteria or ChatcorpAttachedfile object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from ChatcorpAttachedfile object
        }

        if ($criteria->containsKey(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE) && $criteria->keyContainsValue(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a ChatcorpAttachedfile or Criteria object.
     *
     * @param      mixed $values Criteria or ChatcorpAttachedfile object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ChatcorpAttachedfilePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE);
            $value = $criteria->remove(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE);
            if ($value) {
                $selectCriteria->add(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ChatcorpAttachedfilePeer::TABLE_NAME);
            }

        } else { // $values is ChatcorpAttachedfile object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the chatcorp_attachedfile table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ChatcorpAttachedfilePeer::TABLE_NAME, $con, ChatcorpAttachedfilePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChatcorpAttachedfilePeer::clearInstancePool();
            ChatcorpAttachedfilePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a ChatcorpAttachedfile or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or ChatcorpAttachedfile object or primary key or array of primary keys
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
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ChatcorpAttachedfilePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof ChatcorpAttachedfile) { // it's a model object
            // invalidate the cache for this single object
            ChatcorpAttachedfilePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChatcorpAttachedfilePeer::DATABASE_NAME);
            $criteria->add(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ChatcorpAttachedfilePeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ChatcorpAttachedfilePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ChatcorpAttachedfilePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given ChatcorpAttachedfile object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param ChatcorpAttachedfile $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ChatcorpAttachedfilePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ChatcorpAttachedfilePeer::TABLE_NAME);

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

        return BasePeer::doValidate(ChatcorpAttachedfilePeer::DATABASE_NAME, ChatcorpAttachedfilePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return ChatcorpAttachedfile
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ChatcorpAttachedfilePeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ChatcorpAttachedfilePeer::DATABASE_NAME);
        $criteria->add(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $pk);

        $v = ChatcorpAttachedfilePeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return ChatcorpAttachedfile[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ChatcorpAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ChatcorpAttachedfilePeer::DATABASE_NAME);
            $criteria->add(ChatcorpAttachedfilePeer::IDCHATCORP_ATTACHEDFILE, $pks, Criteria::IN);
            $objs = ChatcorpAttachedfilePeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseChatcorpAttachedfilePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseChatcorpAttachedfilePeer::buildTableMap();

