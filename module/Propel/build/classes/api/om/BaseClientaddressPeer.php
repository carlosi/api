<?php


/**
 * Base static class for performing query and update operations on the 'clientaddress' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseClientaddressPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'clientaddress';

    /** the related Propel class for this table */
    const OM_CLASS = 'Clientaddress';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ClientaddressTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the idclientaddress field */
    const IDCLIENTADDRESS = 'clientaddress.idclientaddress';

    /** the column name for the idclient field */
    const IDCLIENT = 'clientaddress.idclient';

    /** the column name for the clientaddress_iso_codecountry field */
    const CLIENTADDRESS_ISO_CODECOUNTRY = 'clientaddress.clientaddress_iso_codecountry';

    /** the column name for the clientaddress_iso_codephone field */
    const CLIENTADDRESS_ISO_CODEPHONE = 'clientaddress.clientaddress_iso_codephone';

    /** the column name for the clientaddress_addressee field */
    const CLIENTADDRESS_ADDRESSEE = 'clientaddress.clientaddress_addressee';

    /** the column name for the clientaddress_addressee_cellular field */
    const CLIENTADDRESS_ADDRESSEE_CELLULAR = 'clientaddress.clientaddress_addressee_cellular';

    /** the column name for the clientaddress_addressee_phone field */
    const CLIENTADDRESS_ADDRESSEE_PHONE = 'clientaddress.clientaddress_addressee_phone';

    /** the column name for the clientaddress_address field */
    const CLIENTADDRESS_ADDRESS = 'clientaddress.clientaddress_address';

    /** the column name for the clientaddress_address2 field */
    const CLIENTADDRESS_ADDRESS2 = 'clientaddress.clientaddress_address2';

    /** the column name for the clientaddress_city field */
    const CLIENTADDRESS_CITY = 'clientaddress.clientaddress_city';

    /** the column name for the clientaddress_state field */
    const CLIENTADDRESS_STATE = 'clientaddress.clientaddress_state';

    /** the column name for the clientaddress_zipcode field */
    const CLIENTADDRESS_ZIPCODE = 'clientaddress.clientaddress_zipcode';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Clientaddress objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Clientaddress[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ClientaddressPeer::$fieldNames[ClientaddressPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idclientaddress', 'Idclient', 'ClientaddressIsoCodecountry', 'ClientaddressIsoCodephone', 'ClientaddressAddressee', 'ClientaddressAddresseeCellular', 'ClientaddressAddresseePhone', 'ClientaddressAddress', 'ClientaddressAddress2', 'ClientaddressCity', 'ClientaddressState', 'ClientaddressZipcode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idclientaddress', 'idclient', 'clientaddressIsoCodecountry', 'clientaddressIsoCodephone', 'clientaddressAddressee', 'clientaddressAddresseeCellular', 'clientaddressAddresseePhone', 'clientaddressAddress', 'clientaddressAddress2', 'clientaddressCity', 'clientaddressState', 'clientaddressZipcode', ),
        BasePeer::TYPE_COLNAME => array (ClientaddressPeer::IDCLIENTADDRESS, ClientaddressPeer::IDCLIENT, ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY, ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE, ClientaddressPeer::CLIENTADDRESS_ADDRESS, ClientaddressPeer::CLIENTADDRESS_ADDRESS2, ClientaddressPeer::CLIENTADDRESS_CITY, ClientaddressPeer::CLIENTADDRESS_STATE, ClientaddressPeer::CLIENTADDRESS_ZIPCODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCLIENTADDRESS', 'IDCLIENT', 'CLIENTADDRESS_ISO_CODECOUNTRY', 'CLIENTADDRESS_ISO_CODEPHONE', 'CLIENTADDRESS_ADDRESSEE', 'CLIENTADDRESS_ADDRESSEE_CELLULAR', 'CLIENTADDRESS_ADDRESSEE_PHONE', 'CLIENTADDRESS_ADDRESS', 'CLIENTADDRESS_ADDRESS2', 'CLIENTADDRESS_CITY', 'CLIENTADDRESS_STATE', 'CLIENTADDRESS_ZIPCODE', ),
        BasePeer::TYPE_FIELDNAME => array ('idclientaddress', 'idclient', 'clientaddress_iso_codecountry', 'clientaddress_iso_codephone', 'clientaddress_addressee', 'clientaddress_addressee_cellular', 'clientaddress_addressee_phone', 'clientaddress_address', 'clientaddress_address2', 'clientaddress_city', 'clientaddress_state', 'clientaddress_zipcode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ClientaddressPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idclientaddress' => 0, 'Idclient' => 1, 'ClientaddressIsoCodecountry' => 2, 'ClientaddressIsoCodephone' => 3, 'ClientaddressAddressee' => 4, 'ClientaddressAddresseeCellular' => 5, 'ClientaddressAddresseePhone' => 6, 'ClientaddressAddress' => 7, 'ClientaddressAddress2' => 8, 'ClientaddressCity' => 9, 'ClientaddressState' => 10, 'ClientaddressZipcode' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idclientaddress' => 0, 'idclient' => 1, 'clientaddressIsoCodecountry' => 2, 'clientaddressIsoCodephone' => 3, 'clientaddressAddressee' => 4, 'clientaddressAddresseeCellular' => 5, 'clientaddressAddresseePhone' => 6, 'clientaddressAddress' => 7, 'clientaddressAddress2' => 8, 'clientaddressCity' => 9, 'clientaddressState' => 10, 'clientaddressZipcode' => 11, ),
        BasePeer::TYPE_COLNAME => array (ClientaddressPeer::IDCLIENTADDRESS => 0, ClientaddressPeer::IDCLIENT => 1, ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY => 2, ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE => 3, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE => 4, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR => 5, ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE => 6, ClientaddressPeer::CLIENTADDRESS_ADDRESS => 7, ClientaddressPeer::CLIENTADDRESS_ADDRESS2 => 8, ClientaddressPeer::CLIENTADDRESS_CITY => 9, ClientaddressPeer::CLIENTADDRESS_STATE => 10, ClientaddressPeer::CLIENTADDRESS_ZIPCODE => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCLIENTADDRESS' => 0, 'IDCLIENT' => 1, 'CLIENTADDRESS_ISO_CODECOUNTRY' => 2, 'CLIENTADDRESS_ISO_CODEPHONE' => 3, 'CLIENTADDRESS_ADDRESSEE' => 4, 'CLIENTADDRESS_ADDRESSEE_CELLULAR' => 5, 'CLIENTADDRESS_ADDRESSEE_PHONE' => 6, 'CLIENTADDRESS_ADDRESS' => 7, 'CLIENTADDRESS_ADDRESS2' => 8, 'CLIENTADDRESS_CITY' => 9, 'CLIENTADDRESS_STATE' => 10, 'CLIENTADDRESS_ZIPCODE' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('idclientaddress' => 0, 'idclient' => 1, 'clientaddress_iso_codecountry' => 2, 'clientaddress_iso_codephone' => 3, 'clientaddress_addressee' => 4, 'clientaddress_addressee_cellular' => 5, 'clientaddress_addressee_phone' => 6, 'clientaddress_address' => 7, 'clientaddress_address2' => 8, 'clientaddress_city' => 9, 'clientaddress_state' => 10, 'clientaddress_zipcode' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = ClientaddressPeer::getFieldNames($toType);
        $key = isset(ClientaddressPeer::$fieldKeys[$fromType][$name]) ? ClientaddressPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ClientaddressPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ClientaddressPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ClientaddressPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ClientaddressPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ClientaddressPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ClientaddressPeer::IDCLIENTADDRESS);
            $criteria->addSelectColumn(ClientaddressPeer::IDCLIENT);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ADDRESS);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ADDRESS2);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_CITY);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_STATE);
            $criteria->addSelectColumn(ClientaddressPeer::CLIENTADDRESS_ZIPCODE);
        } else {
            $criteria->addSelectColumn($alias . '.idclientaddress');
            $criteria->addSelectColumn($alias . '.idclient');
            $criteria->addSelectColumn($alias . '.clientaddress_iso_codecountry');
            $criteria->addSelectColumn($alias . '.clientaddress_iso_codephone');
            $criteria->addSelectColumn($alias . '.clientaddress_addressee');
            $criteria->addSelectColumn($alias . '.clientaddress_addressee_cellular');
            $criteria->addSelectColumn($alias . '.clientaddress_addressee_phone');
            $criteria->addSelectColumn($alias . '.clientaddress_address');
            $criteria->addSelectColumn($alias . '.clientaddress_address2');
            $criteria->addSelectColumn($alias . '.clientaddress_city');
            $criteria->addSelectColumn($alias . '.clientaddress_state');
            $criteria->addSelectColumn($alias . '.clientaddress_zipcode');
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
        $criteria->setPrimaryTableName(ClientaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Clientaddress
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ClientaddressPeer::doSelect($critcopy, $con);
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
        return ClientaddressPeer::populateObjects(ClientaddressPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ClientaddressPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

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
     * @param Clientaddress $obj A Clientaddress object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdclientaddress();
            } // if key === null
            ClientaddressPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Clientaddress object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Clientaddress) {
                $key = (string) $value->getIdclientaddress();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Clientaddress object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ClientaddressPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Clientaddress Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ClientaddressPeer::$instances[$key])) {
                return ClientaddressPeer::$instances[$key];
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
        foreach (ClientaddressPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ClientaddressPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to clientaddress
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
        $cls = ClientaddressPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ClientaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ClientaddressPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientaddressPeer::addInstanceToPool($obj, $key);
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
     * @return array (Clientaddress object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ClientaddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ClientaddressPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ClientaddressPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientaddressPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ClientaddressPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Client table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClient(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ClientaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientaddressPeer::IDCLIENT, ClientPeer::IDCLIENT, $join_behavior);

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
     * Selects a collection of Clientaddress objects pre-filled with their Client objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientaddress objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClient(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);
        }

        ClientaddressPeer::addSelectColumns($criteria);
        $startcol = ClientaddressPeer::NUM_HYDRATE_COLUMNS;
        ClientPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientaddressPeer::IDCLIENT, ClientPeer::IDCLIENT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientaddressPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientaddressPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientaddressPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClientPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Clientaddress) to $obj2 (Client)
                $obj2->addClientaddress($obj1);

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
        $criteria->setPrimaryTableName(ClientaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientaddressPeer::IDCLIENT, ClientPeer::IDCLIENT, $join_behavior);

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
     * Selects a collection of Clientaddress objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Clientaddress objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);
        }

        ClientaddressPeer::addSelectColumns($criteria);
        $startcol2 = ClientaddressPeer::NUM_HYDRATE_COLUMNS;

        ClientPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClientPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientaddressPeer::IDCLIENT, ClientPeer::IDCLIENT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientaddressPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientaddressPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientaddressPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Client rows

            $key2 = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ClientPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClientPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClientPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Clientaddress) to the collection in $obj2 (Client)
                $obj2->addClientaddress($obj1);
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
        return Propel::getDatabaseMap(ClientaddressPeer::DATABASE_NAME)->getTable(ClientaddressPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseClientaddressPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseClientaddressPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ClientaddressTableMap());
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
        return ClientaddressPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Clientaddress or Criteria object.
     *
     * @param      mixed $values Criteria or Clientaddress object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Clientaddress object
        }

        if ($criteria->containsKey(ClientaddressPeer::IDCLIENTADDRESS) && $criteria->keyContainsValue(ClientaddressPeer::IDCLIENTADDRESS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientaddressPeer::IDCLIENTADDRESS.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Clientaddress or Criteria object.
     *
     * @param      mixed $values Criteria or Clientaddress object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ClientaddressPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ClientaddressPeer::IDCLIENTADDRESS);
            $value = $criteria->remove(ClientaddressPeer::IDCLIENTADDRESS);
            if ($value) {
                $selectCriteria->add(ClientaddressPeer::IDCLIENTADDRESS, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ClientaddressPeer::TABLE_NAME);
            }

        } else { // $values is Clientaddress object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the clientaddress table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ClientaddressPeer::TABLE_NAME, $con, ClientaddressPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientaddressPeer::clearInstancePool();
            ClientaddressPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Clientaddress or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Clientaddress object or primary key or array of primary keys
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
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ClientaddressPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Clientaddress) { // it's a model object
            // invalidate the cache for this single object
            ClientaddressPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);
            $criteria->add(ClientaddressPeer::IDCLIENTADDRESS, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ClientaddressPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(ClientaddressPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ClientaddressPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Clientaddress object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Clientaddress $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ClientaddressPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ClientaddressPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ClientaddressPeer::DATABASE_NAME, ClientaddressPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Clientaddress
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ClientaddressPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);
        $criteria->add(ClientaddressPeer::IDCLIENTADDRESS, $pk);

        $v = ClientaddressPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Clientaddress[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);
            $criteria->add(ClientaddressPeer::IDCLIENTADDRESS, $pks, Criteria::IN);
            $objs = ClientaddressPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseClientaddressPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientaddressPeer::buildTableMap();

