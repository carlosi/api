<?php


/**
 * Base static class for performing query and update operations on the 'contactgeneral' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseContactgeneralPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'contactgeneral';

    /** the related Propel class for this table */
    const OM_CLASS = 'Contactgeneral';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContactgeneralTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the idcontactgeneral field */
    const IDCONTACTGENERAL = 'contactgeneral.idcontactgeneral';

    /** the column name for the idcontactgroup field */
    const IDCONTACTGROUP = 'contactgeneral.idcontactgroup';

    /** the column name for the contactgeneral_name field */
    const CONTACTGENERAL_NAME = 'contactgeneral.contactgeneral_name';

    /** the column name for the contactgeneral_iso_codephone field */
    const CONTACTGENERAL_ISO_CODEPHONE = 'contactgeneral.contactgeneral_iso_codephone';

    /** the column name for the contactgeneral_phone field */
    const CONTACTGENERAL_PHONE = 'contactgeneral.contactgeneral_phone';

    /** the column name for the contactgeneral_email field */
    const CONTACTGENERAL_EMAIL = 'contactgeneral.contactgeneral_email';

    /** the column name for the contactgeneral_address field */
    const CONTACTGENERAL_ADDRESS = 'contactgeneral.contactgeneral_address';

    /** the column name for the contactgeneral_address2 field */
    const CONTACTGENERAL_ADDRESS2 = 'contactgeneral.contactgeneral_address2';

    /** the column name for the contactgeneral_city field */
    const CONTACTGENERAL_CITY = 'contactgeneral.contactgeneral_city';

    /** the column name for the contactgeneral_statate field */
    const CONTACTGENERAL_STATATE = 'contactgeneral.contactgeneral_statate';

    /** the column name for the contactgeneral_iso_codecountry field */
    const CONTACTGENERAL_ISO_CODECOUNTRY = 'contactgeneral.contactgeneral_iso_codecountry';

    /** the column name for the contactgeneral_zipcode field */
    const CONTACTGENERAL_ZIPCODE = 'contactgeneral.contactgeneral_zipcode';

    /** the column name for the contactgeneral_lastupdate field */
    const CONTACTGENERAL_LASTUPDATE = 'contactgeneral.contactgeneral_lastupdate';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Contactgeneral objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Contactgeneral[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ContactgeneralPeer::$fieldNames[ContactgeneralPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idcontactgeneral', 'Idcontactgroup', 'ContactgeneralName', 'ContactgeneralIsoCodephone', 'ContactgeneralPhone', 'ContactgeneralEmail', 'ContactgeneralAddress', 'ContactgeneralAddress2', 'ContactgeneralCity', 'ContactgeneralStatate', 'ContactgeneralIsoCodecountry', 'ContactgeneralZipcode', 'ContactgeneralLastupdate', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcontactgeneral', 'idcontactgroup', 'contactgeneralName', 'contactgeneralIsoCodephone', 'contactgeneralPhone', 'contactgeneralEmail', 'contactgeneralAddress', 'contactgeneralAddress2', 'contactgeneralCity', 'contactgeneralStatate', 'contactgeneralIsoCodecountry', 'contactgeneralZipcode', 'contactgeneralLastupdate', ),
        BasePeer::TYPE_COLNAME => array (ContactgeneralPeer::IDCONTACTGENERAL, ContactgeneralPeer::IDCONTACTGROUP, ContactgeneralPeer::CONTACTGENERAL_NAME, ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE, ContactgeneralPeer::CONTACTGENERAL_PHONE, ContactgeneralPeer::CONTACTGENERAL_EMAIL, ContactgeneralPeer::CONTACTGENERAL_ADDRESS, ContactgeneralPeer::CONTACTGENERAL_ADDRESS2, ContactgeneralPeer::CONTACTGENERAL_CITY, ContactgeneralPeer::CONTACTGENERAL_STATATE, ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY, ContactgeneralPeer::CONTACTGENERAL_ZIPCODE, ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCONTACTGENERAL', 'IDCONTACTGROUP', 'CONTACTGENERAL_NAME', 'CONTACTGENERAL_ISO_CODEPHONE', 'CONTACTGENERAL_PHONE', 'CONTACTGENERAL_EMAIL', 'CONTACTGENERAL_ADDRESS', 'CONTACTGENERAL_ADDRESS2', 'CONTACTGENERAL_CITY', 'CONTACTGENERAL_STATATE', 'CONTACTGENERAL_ISO_CODECOUNTRY', 'CONTACTGENERAL_ZIPCODE', 'CONTACTGENERAL_LASTUPDATE', ),
        BasePeer::TYPE_FIELDNAME => array ('idcontactgeneral', 'idcontactgroup', 'contactgeneral_name', 'contactgeneral_iso_codephone', 'contactgeneral_phone', 'contactgeneral_email', 'contactgeneral_address', 'contactgeneral_address2', 'contactgeneral_city', 'contactgeneral_statate', 'contactgeneral_iso_codecountry', 'contactgeneral_zipcode', 'contactgeneral_lastupdate', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ContactgeneralPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idcontactgeneral' => 0, 'Idcontactgroup' => 1, 'ContactgeneralName' => 2, 'ContactgeneralIsoCodephone' => 3, 'ContactgeneralPhone' => 4, 'ContactgeneralEmail' => 5, 'ContactgeneralAddress' => 6, 'ContactgeneralAddress2' => 7, 'ContactgeneralCity' => 8, 'ContactgeneralStatate' => 9, 'ContactgeneralIsoCodecountry' => 10, 'ContactgeneralZipcode' => 11, 'ContactgeneralLastupdate' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcontactgeneral' => 0, 'idcontactgroup' => 1, 'contactgeneralName' => 2, 'contactgeneralIsoCodephone' => 3, 'contactgeneralPhone' => 4, 'contactgeneralEmail' => 5, 'contactgeneralAddress' => 6, 'contactgeneralAddress2' => 7, 'contactgeneralCity' => 8, 'contactgeneralStatate' => 9, 'contactgeneralIsoCodecountry' => 10, 'contactgeneralZipcode' => 11, 'contactgeneralLastupdate' => 12, ),
        BasePeer::TYPE_COLNAME => array (ContactgeneralPeer::IDCONTACTGENERAL => 0, ContactgeneralPeer::IDCONTACTGROUP => 1, ContactgeneralPeer::CONTACTGENERAL_NAME => 2, ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE => 3, ContactgeneralPeer::CONTACTGENERAL_PHONE => 4, ContactgeneralPeer::CONTACTGENERAL_EMAIL => 5, ContactgeneralPeer::CONTACTGENERAL_ADDRESS => 6, ContactgeneralPeer::CONTACTGENERAL_ADDRESS2 => 7, ContactgeneralPeer::CONTACTGENERAL_CITY => 8, ContactgeneralPeer::CONTACTGENERAL_STATATE => 9, ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY => 10, ContactgeneralPeer::CONTACTGENERAL_ZIPCODE => 11, ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCONTACTGENERAL' => 0, 'IDCONTACTGROUP' => 1, 'CONTACTGENERAL_NAME' => 2, 'CONTACTGENERAL_ISO_CODEPHONE' => 3, 'CONTACTGENERAL_PHONE' => 4, 'CONTACTGENERAL_EMAIL' => 5, 'CONTACTGENERAL_ADDRESS' => 6, 'CONTACTGENERAL_ADDRESS2' => 7, 'CONTACTGENERAL_CITY' => 8, 'CONTACTGENERAL_STATATE' => 9, 'CONTACTGENERAL_ISO_CODECOUNTRY' => 10, 'CONTACTGENERAL_ZIPCODE' => 11, 'CONTACTGENERAL_LASTUPDATE' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('idcontactgeneral' => 0, 'idcontactgroup' => 1, 'contactgeneral_name' => 2, 'contactgeneral_iso_codephone' => 3, 'contactgeneral_phone' => 4, 'contactgeneral_email' => 5, 'contactgeneral_address' => 6, 'contactgeneral_address2' => 7, 'contactgeneral_city' => 8, 'contactgeneral_statate' => 9, 'contactgeneral_iso_codecountry' => 10, 'contactgeneral_zipcode' => 11, 'contactgeneral_lastupdate' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = ContactgeneralPeer::getFieldNames($toType);
        $key = isset(ContactgeneralPeer::$fieldKeys[$fromType][$name]) ? ContactgeneralPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ContactgeneralPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ContactgeneralPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ContactgeneralPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ContactgeneralPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContactgeneralPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ContactgeneralPeer::IDCONTACTGENERAL);
            $criteria->addSelectColumn(ContactgeneralPeer::IDCONTACTGROUP);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_NAME);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_PHONE);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_EMAIL);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_ADDRESS);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_ADDRESS2);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_CITY);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_STATATE);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_ZIPCODE);
            $criteria->addSelectColumn(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE);
        } else {
            $criteria->addSelectColumn($alias . '.idcontactgeneral');
            $criteria->addSelectColumn($alias . '.idcontactgroup');
            $criteria->addSelectColumn($alias . '.contactgeneral_name');
            $criteria->addSelectColumn($alias . '.contactgeneral_iso_codephone');
            $criteria->addSelectColumn($alias . '.contactgeneral_phone');
            $criteria->addSelectColumn($alias . '.contactgeneral_email');
            $criteria->addSelectColumn($alias . '.contactgeneral_address');
            $criteria->addSelectColumn($alias . '.contactgeneral_address2');
            $criteria->addSelectColumn($alias . '.contactgeneral_city');
            $criteria->addSelectColumn($alias . '.contactgeneral_statate');
            $criteria->addSelectColumn($alias . '.contactgeneral_iso_codecountry');
            $criteria->addSelectColumn($alias . '.contactgeneral_zipcode');
            $criteria->addSelectColumn($alias . '.contactgeneral_lastupdate');
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
        $criteria->setPrimaryTableName(ContactgeneralPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactgeneralPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Contactgeneral
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContactgeneralPeer::doSelect($critcopy, $con);
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
        return ContactgeneralPeer::populateObjects(ContactgeneralPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContactgeneralPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

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
     * @param Contactgeneral $obj A Contactgeneral object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdcontactgeneral();
            } // if key === null
            ContactgeneralPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Contactgeneral object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Contactgeneral) {
                $key = (string) $value->getIdcontactgeneral();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Contactgeneral object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ContactgeneralPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Contactgeneral Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ContactgeneralPeer::$instances[$key])) {
                return ContactgeneralPeer::$instances[$key];
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
        foreach (ContactgeneralPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ContactgeneralPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to contactgeneral
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ContactparticularPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactparticularPeer::clearInstancePool();
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
        $cls = ContactgeneralPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContactgeneralPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContactgeneralPeer::addInstanceToPool($obj, $key);
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
     * @return array (Contactgeneral object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContactgeneralPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContactgeneralPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContactgeneralPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContactgeneralPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Contactgroup table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinContactgroup(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactgeneralPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactgeneralPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactgeneralPeer::IDCONTACTGROUP, ContactgroupPeer::IDCONTACTGROUP, $join_behavior);

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
     * Selects a collection of Contactgeneral objects pre-filled with their Contactgroup objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contactgeneral objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinContactgroup(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);
        }

        ContactgeneralPeer::addSelectColumns($criteria);
        $startcol = ContactgeneralPeer::NUM_HYDRATE_COLUMNS;
        ContactgroupPeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactgeneralPeer::IDCONTACTGROUP, ContactgroupPeer::IDCONTACTGROUP, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactgeneralPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ContactgeneralPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactgeneralPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ContactgroupPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ContactgroupPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ContactgroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ContactgroupPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contactgeneral) to $obj2 (Contactgroup)
                $obj2->addContactgeneral($obj1);

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
        $criteria->setPrimaryTableName(ContactgeneralPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactgeneralPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactgeneralPeer::IDCONTACTGROUP, ContactgroupPeer::IDCONTACTGROUP, $join_behavior);

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
     * Selects a collection of Contactgeneral objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contactgeneral objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);
        }

        ContactgeneralPeer::addSelectColumns($criteria);
        $startcol2 = ContactgeneralPeer::NUM_HYDRATE_COLUMNS;

        ContactgroupPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ContactgroupPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactgeneralPeer::IDCONTACTGROUP, ContactgroupPeer::IDCONTACTGROUP, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactgeneralPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ContactgeneralPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactgeneralPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Contactgroup rows

            $key2 = ContactgroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ContactgroupPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ContactgroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ContactgroupPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Contactgeneral) to the collection in $obj2 (Contactgroup)
                $obj2->addContactgeneral($obj1);
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
        return Propel::getDatabaseMap(ContactgeneralPeer::DATABASE_NAME)->getTable(ContactgeneralPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContactgeneralPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContactgeneralPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ContactgeneralTableMap());
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
        return ContactgeneralPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Contactgeneral or Criteria object.
     *
     * @param      mixed $values Criteria or Contactgeneral object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Contactgeneral object
        }


        // Set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Contactgeneral or Criteria object.
     *
     * @param      mixed $values Criteria or Contactgeneral object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContactgeneralPeer::IDCONTACTGENERAL);
            $value = $criteria->remove(ContactgeneralPeer::IDCONTACTGENERAL);
            if ($value) {
                $selectCriteria->add(ContactgeneralPeer::IDCONTACTGENERAL, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContactgeneralPeer::TABLE_NAME);
            }

        } else { // $values is Contactgeneral object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the contactgeneral table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ContactgeneralPeer::doOnDeleteCascade(new Criteria(ContactgeneralPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ContactgeneralPeer::TABLE_NAME, $con, ContactgeneralPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContactgeneralPeer::clearInstancePool();
            ContactgeneralPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Contactgeneral or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Contactgeneral object or primary key or array of primary keys
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
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Contactgeneral) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);
            $criteria->add(ContactgeneralPeer::IDCONTACTGENERAL, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ContactgeneralPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ContactgeneralPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ContactgeneralPeer::clearInstancePool();
            } elseif ($values instanceof Contactgeneral) { // it's a model object
                ContactgeneralPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ContactgeneralPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContactgeneralPeer::clearRelatedInstancePool();
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
        $objects = ContactgeneralPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Contactparticular objects
            $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);

            $criteria->add(ContactparticularPeer::IDCONTACTGENERAL, $obj->getIdcontactgeneral());
            $affectedRows += ContactparticularPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Contactgeneral object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Contactgeneral $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContactgeneralPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContactgeneralPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ContactgeneralPeer::DATABASE_NAME, ContactgeneralPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Contactgeneral
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ContactgeneralPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);
        $criteria->add(ContactgeneralPeer::IDCONTACTGENERAL, $pk);

        $v = ContactgeneralPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Contactgeneral[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);
            $criteria->add(ContactgeneralPeer::IDCONTACTGENERAL, $pks, Criteria::IN);
            $objs = ContactgeneralPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseContactgeneralPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContactgeneralPeer::buildTableMap();

