<?php


/**
 * Base static class for performing query and update operations on the 'client' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseClientPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'client';

    /** the related Propel class for this table */
    const OM_CLASS = 'Client';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ClientTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the idclient field */
    const IDCLIENT = 'client.idclient';

    /** the column name for the idcompany field */
    const IDCOMPANY = 'client.idcompany';

    /** the column name for the client_iso_codecountry field */
    const CLIENT_ISO_CODECOUNTRY = 'client.client_iso_codecountry';

    /** the column name for the client_iso_codephone field */
    const CLIENT_ISO_CODEPHONE = 'client.client_iso_codephone';

    /** the column name for the client_fullname field */
    const CLIENT_FULLNAME = 'client.client_fullname';

    /** the column name for the client_email field */
    const CLIENT_EMAIL = 'client.client_email';

    /** the column name for the client_email2 field */
    const CLIENT_EMAIL2 = 'client.client_email2';

    /** the column name for the client_password field */
    const CLIENT_PASSWORD = 'client.client_password';

    /** the column name for the client_cellular field */
    const CLIENT_CELLULAR = 'client.client_cellular';

    /** the column name for the client_phone field */
    const CLIENT_PHONE = 'client.client_phone';

    /** the column name for the client_language field */
    const CLIENT_LANGUAGE = 'client.client_language';

    /** the column name for the client_status field */
    const CLIENT_STATUS = 'client.client_status';

    /** the column name for the client_type field */
    const CLIENT_TYPE = 'client.client_type';

    /** The enumerated values for the client_status field */
    const CLIENT_STATUS_PENDING = 'pending';
    const CLIENT_STATUS_ACTIVE = 'active';
    const CLIENT_STATUS_SUSPENDED = 'suspended';
    const CLIENT_STATUS_FRAUD = 'fraud';

    /** The enumerated values for the client_type field */
    const CLIENT_TYPE_NORMAL = 'NORMAL';
    const CLIENT_TYPE_GENERALPUBLIC = 'GENERALPUBLIC';
    const CLIENT_TYPE_INVENTORYMANAGER = 'INVENTORYMANAGER';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Client objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Client[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ClientPeer::$fieldNames[ClientPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idclient', 'Idcompany', 'ClientIsoCodecountry', 'ClientIsoCodephone', 'ClientFullname', 'ClientEmail', 'ClientEmail2', 'ClientPassword', 'ClientCellular', 'ClientPhone', 'ClientLanguage', 'ClientStatus', 'ClientType', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idclient', 'idcompany', 'clientIsoCodecountry', 'clientIsoCodephone', 'clientFullname', 'clientEmail', 'clientEmail2', 'clientPassword', 'clientCellular', 'clientPhone', 'clientLanguage', 'clientStatus', 'clientType', ),
        BasePeer::TYPE_COLNAME => array (ClientPeer::IDCLIENT, ClientPeer::IDCOMPANY, ClientPeer::CLIENT_ISO_CODECOUNTRY, ClientPeer::CLIENT_ISO_CODEPHONE, ClientPeer::CLIENT_FULLNAME, ClientPeer::CLIENT_EMAIL, ClientPeer::CLIENT_EMAIL2, ClientPeer::CLIENT_PASSWORD, ClientPeer::CLIENT_CELLULAR, ClientPeer::CLIENT_PHONE, ClientPeer::CLIENT_LANGUAGE, ClientPeer::CLIENT_STATUS, ClientPeer::CLIENT_TYPE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCLIENT', 'IDCOMPANY', 'CLIENT_ISO_CODECOUNTRY', 'CLIENT_ISO_CODEPHONE', 'CLIENT_FULLNAME', 'CLIENT_EMAIL', 'CLIENT_EMAIL2', 'CLIENT_PASSWORD', 'CLIENT_CELLULAR', 'CLIENT_PHONE', 'CLIENT_LANGUAGE', 'CLIENT_STATUS', 'CLIENT_TYPE', ),
        BasePeer::TYPE_FIELDNAME => array ('idclient', 'idcompany', 'client_iso_codecountry', 'client_iso_codephone', 'client_fullname', 'client_email', 'client_email2', 'client_password', 'client_cellular', 'client_phone', 'client_language', 'client_status', 'client_type', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ClientPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idclient' => 0, 'Idcompany' => 1, 'ClientIsoCodecountry' => 2, 'ClientIsoCodephone' => 3, 'ClientFullname' => 4, 'ClientEmail' => 5, 'ClientEmail2' => 6, 'ClientPassword' => 7, 'ClientCellular' => 8, 'ClientPhone' => 9, 'ClientLanguage' => 10, 'ClientStatus' => 11, 'ClientType' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idclient' => 0, 'idcompany' => 1, 'clientIsoCodecountry' => 2, 'clientIsoCodephone' => 3, 'clientFullname' => 4, 'clientEmail' => 5, 'clientEmail2' => 6, 'clientPassword' => 7, 'clientCellular' => 8, 'clientPhone' => 9, 'clientLanguage' => 10, 'clientStatus' => 11, 'clientType' => 12, ),
        BasePeer::TYPE_COLNAME => array (ClientPeer::IDCLIENT => 0, ClientPeer::IDCOMPANY => 1, ClientPeer::CLIENT_ISO_CODECOUNTRY => 2, ClientPeer::CLIENT_ISO_CODEPHONE => 3, ClientPeer::CLIENT_FULLNAME => 4, ClientPeer::CLIENT_EMAIL => 5, ClientPeer::CLIENT_EMAIL2 => 6, ClientPeer::CLIENT_PASSWORD => 7, ClientPeer::CLIENT_CELLULAR => 8, ClientPeer::CLIENT_PHONE => 9, ClientPeer::CLIENT_LANGUAGE => 10, ClientPeer::CLIENT_STATUS => 11, ClientPeer::CLIENT_TYPE => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCLIENT' => 0, 'IDCOMPANY' => 1, 'CLIENT_ISO_CODECOUNTRY' => 2, 'CLIENT_ISO_CODEPHONE' => 3, 'CLIENT_FULLNAME' => 4, 'CLIENT_EMAIL' => 5, 'CLIENT_EMAIL2' => 6, 'CLIENT_PASSWORD' => 7, 'CLIENT_CELLULAR' => 8, 'CLIENT_PHONE' => 9, 'CLIENT_LANGUAGE' => 10, 'CLIENT_STATUS' => 11, 'CLIENT_TYPE' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('idclient' => 0, 'idcompany' => 1, 'client_iso_codecountry' => 2, 'client_iso_codephone' => 3, 'client_fullname' => 4, 'client_email' => 5, 'client_email2' => 6, 'client_password' => 7, 'client_cellular' => 8, 'client_phone' => 9, 'client_language' => 10, 'client_status' => 11, 'client_type' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ClientPeer::CLIENT_STATUS => array(
            ClientPeer::CLIENT_STATUS_PENDING,
            ClientPeer::CLIENT_STATUS_ACTIVE,
            ClientPeer::CLIENT_STATUS_SUSPENDED,
            ClientPeer::CLIENT_STATUS_FRAUD,
        ),
        ClientPeer::CLIENT_TYPE => array(
            ClientPeer::CLIENT_TYPE_NORMAL,
            ClientPeer::CLIENT_TYPE_GENERALPUBLIC,
            ClientPeer::CLIENT_TYPE_INVENTORYMANAGER,
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
        $toNames = ClientPeer::getFieldNames($toType);
        $key = isset(ClientPeer::$fieldKeys[$fromType][$name]) ? ClientPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ClientPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ClientPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ClientPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ClientPeer::$enumValueSets;
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
        $valueSets = ClientPeer::getValueSets();

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
        $values = ClientPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ClientPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ClientPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ClientPeer::IDCLIENT);
            $criteria->addSelectColumn(ClientPeer::IDCOMPANY);
            $criteria->addSelectColumn(ClientPeer::CLIENT_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ClientPeer::CLIENT_ISO_CODEPHONE);
            $criteria->addSelectColumn(ClientPeer::CLIENT_FULLNAME);
            $criteria->addSelectColumn(ClientPeer::CLIENT_EMAIL);
            $criteria->addSelectColumn(ClientPeer::CLIENT_EMAIL2);
            $criteria->addSelectColumn(ClientPeer::CLIENT_PASSWORD);
            $criteria->addSelectColumn(ClientPeer::CLIENT_CELLULAR);
            $criteria->addSelectColumn(ClientPeer::CLIENT_PHONE);
            $criteria->addSelectColumn(ClientPeer::CLIENT_LANGUAGE);
            $criteria->addSelectColumn(ClientPeer::CLIENT_STATUS);
            $criteria->addSelectColumn(ClientPeer::CLIENT_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.idclient');
            $criteria->addSelectColumn($alias . '.idcompany');
            $criteria->addSelectColumn($alias . '.client_iso_codecountry');
            $criteria->addSelectColumn($alias . '.client_iso_codephone');
            $criteria->addSelectColumn($alias . '.client_fullname');
            $criteria->addSelectColumn($alias . '.client_email');
            $criteria->addSelectColumn($alias . '.client_email2');
            $criteria->addSelectColumn($alias . '.client_password');
            $criteria->addSelectColumn($alias . '.client_cellular');
            $criteria->addSelectColumn($alias . '.client_phone');
            $criteria->addSelectColumn($alias . '.client_language');
            $criteria->addSelectColumn($alias . '.client_status');
            $criteria->addSelectColumn($alias . '.client_type');
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
        $criteria->setPrimaryTableName(ClientPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ClientPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Client
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ClientPeer::doSelect($critcopy, $con);
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
        return ClientPeer::populateObjects(ClientPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ClientPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

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
     * @param Client $obj A Client object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdclient();
            } // if key === null
            ClientPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Client object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Client) {
                $key = (string) $value->getIdclient();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Client object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ClientPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Client Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ClientPeer::$instances[$key])) {
                return ClientPeer::$instances[$key];
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
        foreach (ClientPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ClientPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to client
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ChatpublicPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ChatpublicPeer::clearInstancePool();
        // Invalidate objects in ClientaddressPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientaddressPeer::clearInstancePool();
        // Invalidate objects in ClientcommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientcommentPeer::clearInstancePool();
        // Invalidate objects in ClientfilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientfilePeer::clearInstancePool();
        // Invalidate objects in ClienttaxPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClienttaxPeer::clearInstancePool();
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
        $cls = ClientPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ClientPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ClientPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientPeer::addInstanceToPool($obj, $key);
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
     * @return array (Client object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ClientPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ClientPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ClientPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ClientPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(ClientPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Selects a collection of Client objects pre-filled with their Company objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Client objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientPeer::DATABASE_NAME);
        }

        ClientPeer::addSelectColumns($criteria);
        $startcol = ClientPeer::NUM_HYDRATE_COLUMNS;
        CompanyPeer::addSelectColumns($criteria);

        $criteria->addJoin(ClientPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ClientPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Client) to $obj2 (Company)
                $obj2->addClient($obj1);

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
        $criteria->setPrimaryTableName(ClientPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ClientPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ClientPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Selects a collection of Client objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Client objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ClientPeer::DATABASE_NAME);
        }

        ClientPeer::addSelectColumns($criteria);
        $startcol2 = ClientPeer::NUM_HYDRATE_COLUMNS;

        CompanyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CompanyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ClientPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ClientPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ClientPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ClientPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ClientPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Client) to the collection in $obj2 (Company)
                $obj2->addClient($obj1);
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
        return Propel::getDatabaseMap(ClientPeer::DATABASE_NAME)->getTable(ClientPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseClientPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseClientPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ClientTableMap());
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
        return ClientPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Client or Criteria object.
     *
     * @param      mixed $values Criteria or Client object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Client object
        }

        if ($criteria->containsKey(ClientPeer::IDCLIENT) && $criteria->keyContainsValue(ClientPeer::IDCLIENT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientPeer::IDCLIENT.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Client or Criteria object.
     *
     * @param      mixed $values Criteria or Client object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ClientPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ClientPeer::IDCLIENT);
            $value = $criteria->remove(ClientPeer::IDCLIENT);
            if ($value) {
                $selectCriteria->add(ClientPeer::IDCLIENT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ClientPeer::TABLE_NAME);
            }

        } else { // $values is Client object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the client table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ClientPeer::doOnDeleteCascade(new Criteria(ClientPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ClientPeer::TABLE_NAME, $con, ClientPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientPeer::clearInstancePool();
            ClientPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Client or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Client object or primary key or array of primary keys
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Client) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientPeer::DATABASE_NAME);
            $criteria->add(ClientPeer::IDCLIENT, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ClientPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ClientPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ClientPeer::clearInstancePool();
            } elseif ($values instanceof Client) { // it's a model object
                ClientPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ClientPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ClientPeer::clearRelatedInstancePool();
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
        $objects = ClientPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Chatpublic objects
            $criteria = new Criteria(ChatpublicPeer::DATABASE_NAME);

            $criteria->add(ChatpublicPeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += ChatpublicPeer::doDelete($criteria, $con);

            // delete related Clientaddress objects
            $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);

            $criteria->add(ClientaddressPeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += ClientaddressPeer::doDelete($criteria, $con);

            // delete related Clientcomment objects
            $criteria = new Criteria(ClientcommentPeer::DATABASE_NAME);

            $criteria->add(ClientcommentPeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += ClientcommentPeer::doDelete($criteria, $con);

            // delete related Clientfile objects
            $criteria = new Criteria(ClientfilePeer::DATABASE_NAME);

            $criteria->add(ClientfilePeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += ClientfilePeer::doDelete($criteria, $con);

            // delete related Clienttax objects
            $criteria = new Criteria(ClienttaxPeer::DATABASE_NAME);

            $criteria->add(ClienttaxPeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += ClienttaxPeer::doDelete($criteria, $con);

            // delete related Order objects
            $criteria = new Criteria(OrderPeer::DATABASE_NAME);

            $criteria->add(OrderPeer::IDCLIENT, $obj->getIdclient());
            $affectedRows += OrderPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Client object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Client $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ClientPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ClientPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ClientPeer::DATABASE_NAME, ClientPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Client
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ClientPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ClientPeer::DATABASE_NAME);
        $criteria->add(ClientPeer::IDCLIENT, $pk);

        $v = ClientPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Client[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ClientPeer::DATABASE_NAME);
            $criteria->add(ClientPeer::IDCLIENT, $pks, Criteria::IN);
            $objs = ClientPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseClientPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientPeer::buildTableMap();

