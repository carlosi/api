<?php


/**
 * Base static class for performing query and update operations on the 'contactparticular' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseContactparticularPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'contactparticular';

    /** the related Propel class for this table */
    const OM_CLASS = 'Contactparticular';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContactparticularTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the idcontactparticular field */
    const IDCONTACTPARTICULAR = 'contactparticular.idcontactparticular';

    /** the column name for the idcontactgeneral field */
    const IDCONTACTGENERAL = 'contactparticular.idcontactgeneral';

    /** the column name for the contactparticular_iso_codecountry field */
    const CONTACTPARTICULAR_ISO_CODECOUNTRY = 'contactparticular.contactparticular_iso_codecountry';

    /** the column name for the contactparticular_name field */
    const CONTACTPARTICULAR_NAME = 'contactparticular.contactparticular_name';

    /** the column name for the contactparticular_iso_codephone field */
    const CONTACTPARTICULAR_ISO_CODEPHONE = 'contactparticular.contactparticular_iso_codephone';

    /** the column name for the contactparticular_cellular field */
    const CONTACTPARTICULAR_CELLULAR = 'contactparticular.contactparticular_cellular';

    /** the column name for the contactparticular_phone field */
    const CONTACTPARTICULAR_PHONE = 'contactparticular.contactparticular_phone';

    /** the column name for the contactparticular_phone_extention field */
    const CONTACTPARTICULAR_PHONE_EXTENTION = 'contactparticular.contactparticular_phone_extention';

    /** the column name for the contactparticular_position field */
    const CONTACTPARTICULAR_POSITION = 'contactparticular.contactparticular_position';

    /** the column name for the contactparticular_note field */
    const CONTACTPARTICULAR_NOTE = 'contactparticular.contactparticular_note';

    /** the column name for the contactparticular_email field */
    const CONTACTPARTICULAR_EMAIL = 'contactparticular.contactparticular_email';

    /** the column name for the contactparticular_email2 field */
    const CONTACTPARTICULAR_EMAIL2 = 'contactparticular.contactparticular_email2';

    /** the column name for the contactparticular_address field */
    const CONTACTPARTICULAR_ADDRESS = 'contactparticular.contactparticular_address';

    /** the column name for the contactparticular_address2 field */
    const CONTACTPARTICULAR_ADDRESS2 = 'contactparticular.contactparticular_address2';

    /** the column name for the contactparticular_city field */
    const CONTACTPARTICULAR_CITY = 'contactparticular.contactparticular_city';

    /** the column name for the contactparticular_state field */
    const CONTACTPARTICULAR_STATE = 'contactparticular.contactparticular_state';

    /** the column name for the contactparticular_zipcode field */
    const CONTACTPARTICULAR_ZIPCODE = 'contactparticular.contactparticular_zipcode';

    /** the column name for the contactparticular_lastupdate field */
    const CONTACTPARTICULAR_LASTUPDATE = 'contactparticular.contactparticular_lastupdate';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Contactparticular objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Contactparticular[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ContactparticularPeer::$fieldNames[ContactparticularPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idcontactparticular', 'Idcontactgeneral', 'ContactparticularIsoCodecountry', 'ContactparticularName', 'ContactparticularIsoCodephone', 'ContactparticularCellular', 'ContactparticularPhone', 'ContactparticularPhoneExtention', 'ContactparticularPosition', 'ContactparticularNote', 'ContactparticularEmail', 'ContactparticularEmail2', 'ContactparticularAddress', 'ContactparticularAddress2', 'ContactparticularCity', 'ContactparticularState', 'ContactparticularZipcode', 'ContactparticularLastupdate', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcontactparticular', 'idcontactgeneral', 'contactparticularIsoCodecountry', 'contactparticularName', 'contactparticularIsoCodephone', 'contactparticularCellular', 'contactparticularPhone', 'contactparticularPhoneExtention', 'contactparticularPosition', 'contactparticularNote', 'contactparticularEmail', 'contactparticularEmail2', 'contactparticularAddress', 'contactparticularAddress2', 'contactparticularCity', 'contactparticularState', 'contactparticularZipcode', 'contactparticularLastupdate', ),
        BasePeer::TYPE_COLNAME => array (ContactparticularPeer::IDCONTACTPARTICULAR, ContactparticularPeer::IDCONTACTGENERAL, ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY, ContactparticularPeer::CONTACTPARTICULAR_NAME, ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE, ContactparticularPeer::CONTACTPARTICULAR_CELLULAR, ContactparticularPeer::CONTACTPARTICULAR_PHONE, ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION, ContactparticularPeer::CONTACTPARTICULAR_POSITION, ContactparticularPeer::CONTACTPARTICULAR_NOTE, ContactparticularPeer::CONTACTPARTICULAR_EMAIL, ContactparticularPeer::CONTACTPARTICULAR_EMAIL2, ContactparticularPeer::CONTACTPARTICULAR_ADDRESS, ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2, ContactparticularPeer::CONTACTPARTICULAR_CITY, ContactparticularPeer::CONTACTPARTICULAR_STATE, ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE, ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCONTACTPARTICULAR', 'IDCONTACTGENERAL', 'CONTACTPARTICULAR_ISO_CODECOUNTRY', 'CONTACTPARTICULAR_NAME', 'CONTACTPARTICULAR_ISO_CODEPHONE', 'CONTACTPARTICULAR_CELLULAR', 'CONTACTPARTICULAR_PHONE', 'CONTACTPARTICULAR_PHONE_EXTENTION', 'CONTACTPARTICULAR_POSITION', 'CONTACTPARTICULAR_NOTE', 'CONTACTPARTICULAR_EMAIL', 'CONTACTPARTICULAR_EMAIL2', 'CONTACTPARTICULAR_ADDRESS', 'CONTACTPARTICULAR_ADDRESS2', 'CONTACTPARTICULAR_CITY', 'CONTACTPARTICULAR_STATE', 'CONTACTPARTICULAR_ZIPCODE', 'CONTACTPARTICULAR_LASTUPDATE', ),
        BasePeer::TYPE_FIELDNAME => array ('idcontactparticular', 'idcontactgeneral', 'contactparticular_iso_codecountry', 'contactparticular_name', 'contactparticular_iso_codephone', 'contactparticular_cellular', 'contactparticular_phone', 'contactparticular_phone_extention', 'contactparticular_position', 'contactparticular_note', 'contactparticular_email', 'contactparticular_email2', 'contactparticular_address', 'contactparticular_address2', 'contactparticular_city', 'contactparticular_state', 'contactparticular_zipcode', 'contactparticular_lastupdate', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ContactparticularPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idcontactparticular' => 0, 'Idcontactgeneral' => 1, 'ContactparticularIsoCodecountry' => 2, 'ContactparticularName' => 3, 'ContactparticularIsoCodephone' => 4, 'ContactparticularCellular' => 5, 'ContactparticularPhone' => 6, 'ContactparticularPhoneExtention' => 7, 'ContactparticularPosition' => 8, 'ContactparticularNote' => 9, 'ContactparticularEmail' => 10, 'ContactparticularEmail2' => 11, 'ContactparticularAddress' => 12, 'ContactparticularAddress2' => 13, 'ContactparticularCity' => 14, 'ContactparticularState' => 15, 'ContactparticularZipcode' => 16, 'ContactparticularLastupdate' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcontactparticular' => 0, 'idcontactgeneral' => 1, 'contactparticularIsoCodecountry' => 2, 'contactparticularName' => 3, 'contactparticularIsoCodephone' => 4, 'contactparticularCellular' => 5, 'contactparticularPhone' => 6, 'contactparticularPhoneExtention' => 7, 'contactparticularPosition' => 8, 'contactparticularNote' => 9, 'contactparticularEmail' => 10, 'contactparticularEmail2' => 11, 'contactparticularAddress' => 12, 'contactparticularAddress2' => 13, 'contactparticularCity' => 14, 'contactparticularState' => 15, 'contactparticularZipcode' => 16, 'contactparticularLastupdate' => 17, ),
        BasePeer::TYPE_COLNAME => array (ContactparticularPeer::IDCONTACTPARTICULAR => 0, ContactparticularPeer::IDCONTACTGENERAL => 1, ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY => 2, ContactparticularPeer::CONTACTPARTICULAR_NAME => 3, ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE => 4, ContactparticularPeer::CONTACTPARTICULAR_CELLULAR => 5, ContactparticularPeer::CONTACTPARTICULAR_PHONE => 6, ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION => 7, ContactparticularPeer::CONTACTPARTICULAR_POSITION => 8, ContactparticularPeer::CONTACTPARTICULAR_NOTE => 9, ContactparticularPeer::CONTACTPARTICULAR_EMAIL => 10, ContactparticularPeer::CONTACTPARTICULAR_EMAIL2 => 11, ContactparticularPeer::CONTACTPARTICULAR_ADDRESS => 12, ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2 => 13, ContactparticularPeer::CONTACTPARTICULAR_CITY => 14, ContactparticularPeer::CONTACTPARTICULAR_STATE => 15, ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE => 16, ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCONTACTPARTICULAR' => 0, 'IDCONTACTGENERAL' => 1, 'CONTACTPARTICULAR_ISO_CODECOUNTRY' => 2, 'CONTACTPARTICULAR_NAME' => 3, 'CONTACTPARTICULAR_ISO_CODEPHONE' => 4, 'CONTACTPARTICULAR_CELLULAR' => 5, 'CONTACTPARTICULAR_PHONE' => 6, 'CONTACTPARTICULAR_PHONE_EXTENTION' => 7, 'CONTACTPARTICULAR_POSITION' => 8, 'CONTACTPARTICULAR_NOTE' => 9, 'CONTACTPARTICULAR_EMAIL' => 10, 'CONTACTPARTICULAR_EMAIL2' => 11, 'CONTACTPARTICULAR_ADDRESS' => 12, 'CONTACTPARTICULAR_ADDRESS2' => 13, 'CONTACTPARTICULAR_CITY' => 14, 'CONTACTPARTICULAR_STATE' => 15, 'CONTACTPARTICULAR_ZIPCODE' => 16, 'CONTACTPARTICULAR_LASTUPDATE' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('idcontactparticular' => 0, 'idcontactgeneral' => 1, 'contactparticular_iso_codecountry' => 2, 'contactparticular_name' => 3, 'contactparticular_iso_codephone' => 4, 'contactparticular_cellular' => 5, 'contactparticular_phone' => 6, 'contactparticular_phone_extention' => 7, 'contactparticular_position' => 8, 'contactparticular_note' => 9, 'contactparticular_email' => 10, 'contactparticular_email2' => 11, 'contactparticular_address' => 12, 'contactparticular_address2' => 13, 'contactparticular_city' => 14, 'contactparticular_state' => 15, 'contactparticular_zipcode' => 16, 'contactparticular_lastupdate' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $toNames = ContactparticularPeer::getFieldNames($toType);
        $key = isset(ContactparticularPeer::$fieldKeys[$fromType][$name]) ? ContactparticularPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ContactparticularPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ContactparticularPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ContactparticularPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ContactparticularPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContactparticularPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ContactparticularPeer::IDCONTACTPARTICULAR);
            $criteria->addSelectColumn(ContactparticularPeer::IDCONTACTGENERAL);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_NAME);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_CELLULAR);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_PHONE);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_POSITION);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_NOTE);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_EMAIL);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_EMAIL2);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_CITY);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_STATE);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE);
            $criteria->addSelectColumn(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE);
        } else {
            $criteria->addSelectColumn($alias . '.idcontactparticular');
            $criteria->addSelectColumn($alias . '.idcontactgeneral');
            $criteria->addSelectColumn($alias . '.contactparticular_iso_codecountry');
            $criteria->addSelectColumn($alias . '.contactparticular_name');
            $criteria->addSelectColumn($alias . '.contactparticular_iso_codephone');
            $criteria->addSelectColumn($alias . '.contactparticular_cellular');
            $criteria->addSelectColumn($alias . '.contactparticular_phone');
            $criteria->addSelectColumn($alias . '.contactparticular_phone_extention');
            $criteria->addSelectColumn($alias . '.contactparticular_position');
            $criteria->addSelectColumn($alias . '.contactparticular_note');
            $criteria->addSelectColumn($alias . '.contactparticular_email');
            $criteria->addSelectColumn($alias . '.contactparticular_email2');
            $criteria->addSelectColumn($alias . '.contactparticular_address');
            $criteria->addSelectColumn($alias . '.contactparticular_address2');
            $criteria->addSelectColumn($alias . '.contactparticular_city');
            $criteria->addSelectColumn($alias . '.contactparticular_state');
            $criteria->addSelectColumn($alias . '.contactparticular_zipcode');
            $criteria->addSelectColumn($alias . '.contactparticular_lastupdate');
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
        $criteria->setPrimaryTableName(ContactparticularPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactparticularPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Contactparticular
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContactparticularPeer::doSelect($critcopy, $con);
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
        return ContactparticularPeer::populateObjects(ContactparticularPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContactparticularPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

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
     * @param Contactparticular $obj A Contactparticular object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdcontactparticular();
            } // if key === null
            ContactparticularPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Contactparticular object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Contactparticular) {
                $key = (string) $value->getIdcontactparticular();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Contactparticular object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ContactparticularPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Contactparticular Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ContactparticularPeer::$instances[$key])) {
                return ContactparticularPeer::$instances[$key];
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
        foreach (ContactparticularPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ContactparticularPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to contactparticular
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
        $cls = ContactparticularPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContactparticularPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContactparticularPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContactparticularPeer::addInstanceToPool($obj, $key);
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
     * @return array (Contactparticular object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContactparticularPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContactparticularPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContactparticularPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContactparticularPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContactparticularPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Contactgeneral table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinContactgeneral(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactparticularPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactparticularPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactparticularPeer::IDCONTACTGENERAL, ContactgeneralPeer::IDCONTACTGENERAL, $join_behavior);

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
     * Selects a collection of Contactparticular objects pre-filled with their Contactgeneral objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contactparticular objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinContactgeneral(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);
        }

        ContactparticularPeer::addSelectColumns($criteria);
        $startcol = ContactparticularPeer::NUM_HYDRATE_COLUMNS;
        ContactgeneralPeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactparticularPeer::IDCONTACTGENERAL, ContactgeneralPeer::IDCONTACTGENERAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactparticularPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactparticularPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ContactparticularPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactparticularPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ContactgeneralPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ContactgeneralPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ContactgeneralPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contactparticular) to $obj2 (Contactgeneral)
                $obj2->addContactparticular($obj1);

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
        $criteria->setPrimaryTableName(ContactparticularPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactparticularPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactparticularPeer::IDCONTACTGENERAL, ContactgeneralPeer::IDCONTACTGENERAL, $join_behavior);

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
     * Selects a collection of Contactparticular objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contactparticular objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);
        }

        ContactparticularPeer::addSelectColumns($criteria);
        $startcol2 = ContactparticularPeer::NUM_HYDRATE_COLUMNS;

        ContactgeneralPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ContactgeneralPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactparticularPeer::IDCONTACTGENERAL, ContactgeneralPeer::IDCONTACTGENERAL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactparticularPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactparticularPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ContactparticularPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactparticularPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Contactgeneral rows

            $key2 = ContactgeneralPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ContactgeneralPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ContactgeneralPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ContactgeneralPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Contactparticular) to the collection in $obj2 (Contactgeneral)
                $obj2->addContactparticular($obj1);
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
        return Propel::getDatabaseMap(ContactparticularPeer::DATABASE_NAME)->getTable(ContactparticularPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContactparticularPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContactparticularPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ContactparticularTableMap());
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
        return ContactparticularPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Contactparticular or Criteria object.
     *
     * @param      mixed $values Criteria or Contactparticular object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Contactparticular object
        }

        if ($criteria->containsKey(ContactparticularPeer::IDCONTACTPARTICULAR) && $criteria->keyContainsValue(ContactparticularPeer::IDCONTACTPARTICULAR) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContactparticularPeer::IDCONTACTPARTICULAR.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Contactparticular or Criteria object.
     *
     * @param      mixed $values Criteria or Contactparticular object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ContactparticularPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContactparticularPeer::IDCONTACTPARTICULAR);
            $value = $criteria->remove(ContactparticularPeer::IDCONTACTPARTICULAR);
            if ($value) {
                $selectCriteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContactparticularPeer::TABLE_NAME);
            }

        } else { // $values is Contactparticular object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the contactparticular table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ContactparticularPeer::TABLE_NAME, $con, ContactparticularPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContactparticularPeer::clearInstancePool();
            ContactparticularPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Contactparticular or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Contactparticular object or primary key or array of primary keys
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
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ContactparticularPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Contactparticular) { // it's a model object
            // invalidate the cache for this single object
            ContactparticularPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);
            $criteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ContactparticularPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ContactparticularPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContactparticularPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Contactparticular object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Contactparticular $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContactparticularPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContactparticularPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ContactparticularPeer::DATABASE_NAME, ContactparticularPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Contactparticular
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ContactparticularPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);
        $criteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, $pk);

        $v = ContactparticularPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Contactparticular[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);
            $criteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, $pks, Criteria::IN);
            $objs = ContactparticularPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseContactparticularPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContactparticularPeer::buildTableMap();

