<?php


/**
 * Base static class for performing query and update operations on the 'companyaddress' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseCompanyaddressPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'companyaddress';

    /** the related Propel class for this table */
    const OM_CLASS = 'Companyaddress';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CompanyaddressTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the idcompanyaddress field */
    const IDCOMPANYADDRESS = 'companyaddress.idcompanyaddress';

    /** the column name for the idcompany field */
    const IDCOMPANY = 'companyaddress.idcompany';

    /** the column name for the companyaddress_iso_codecountry field */
    const COMPANYADDRESS_ISO_CODECOUNTRY = 'companyaddress.companyaddress_iso_codecountry';

    /** the column name for the companyaddress_iso_codephone field */
    const COMPANYADDRESS_ISO_CODEPHONE = 'companyaddress.companyaddress_iso_codephone';

    /** the column name for the companyaddress_addressee field */
    const COMPANYADDRESS_ADDRESSEE = 'companyaddress.companyaddress_addressee';

    /** the column name for the companyaddress_addressee_cellular field */
    const COMPANYADDRESS_ADDRESSEE_CELLULAR = 'companyaddress.companyaddress_addressee_cellular';

    /** the column name for the companyaddress_addressee_phone field */
    const COMPANYADDRESS_ADDRESSEE_PHONE = 'companyaddress.companyaddress_addressee_phone';

    /** the column name for the companyaddress_address field */
    const COMPANYADDRESS_ADDRESS = 'companyaddress.companyaddress_address';

    /** the column name for the companyaddress_address2 field */
    const COMPANYADDRESS_ADDRESS2 = 'companyaddress.companyaddress_address2';

    /** the column name for the companyaddress_city field */
    const COMPANYADDRESS_CITY = 'companyaddress.companyaddress_city';

    /** the column name for the companyaddress_state field */
    const COMPANYADDRESS_STATE = 'companyaddress.companyaddress_state';

    /** the column name for the companyaddress_zipcode field */
    const COMPANYADDRESS_ZIPCODE = 'companyaddress.companyaddress_zipcode';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Companyaddress objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Companyaddress[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. CompanyaddressPeer::$fieldNames[CompanyaddressPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idcompanyaddress', 'Idcompany', 'CompanyaddressIsoCodecountry', 'CompanyaddressIsoCodephone', 'CompanyaddressAddressee', 'CompanyaddressAddresseeCellular', 'CompanyaddressAddresseePhone', 'CompanyaddressAddress', 'CompanyaddressAddress2', 'CompanyaddressCity', 'CompanyaddressState', 'CompanyaddressZipcode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcompanyaddress', 'idcompany', 'companyaddressIsoCodecountry', 'companyaddressIsoCodephone', 'companyaddressAddressee', 'companyaddressAddresseeCellular', 'companyaddressAddresseePhone', 'companyaddressAddress', 'companyaddressAddress2', 'companyaddressCity', 'companyaddressState', 'companyaddressZipcode', ),
        BasePeer::TYPE_COLNAME => array (CompanyaddressPeer::IDCOMPANYADDRESS, CompanyaddressPeer::IDCOMPANY, CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY, CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE, CompanyaddressPeer::COMPANYADDRESS_ADDRESS, CompanyaddressPeer::COMPANYADDRESS_ADDRESS2, CompanyaddressPeer::COMPANYADDRESS_CITY, CompanyaddressPeer::COMPANYADDRESS_STATE, CompanyaddressPeer::COMPANYADDRESS_ZIPCODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCOMPANYADDRESS', 'IDCOMPANY', 'COMPANYADDRESS_ISO_CODECOUNTRY', 'COMPANYADDRESS_ISO_CODEPHONE', 'COMPANYADDRESS_ADDRESSEE', 'COMPANYADDRESS_ADDRESSEE_CELLULAR', 'COMPANYADDRESS_ADDRESSEE_PHONE', 'COMPANYADDRESS_ADDRESS', 'COMPANYADDRESS_ADDRESS2', 'COMPANYADDRESS_CITY', 'COMPANYADDRESS_STATE', 'COMPANYADDRESS_ZIPCODE', ),
        BasePeer::TYPE_FIELDNAME => array ('idcompanyaddress', 'idcompany', 'companyaddress_iso_codecountry', 'companyaddress_iso_codephone', 'companyaddress_addressee', 'companyaddress_addressee_cellular', 'companyaddress_addressee_phone', 'companyaddress_address', 'companyaddress_address2', 'companyaddress_city', 'companyaddress_state', 'companyaddress_zipcode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. CompanyaddressPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idcompanyaddress' => 0, 'Idcompany' => 1, 'CompanyaddressIsoCodecountry' => 2, 'CompanyaddressIsoCodephone' => 3, 'CompanyaddressAddressee' => 4, 'CompanyaddressAddresseeCellular' => 5, 'CompanyaddressAddresseePhone' => 6, 'CompanyaddressAddress' => 7, 'CompanyaddressAddress2' => 8, 'CompanyaddressCity' => 9, 'CompanyaddressState' => 10, 'CompanyaddressZipcode' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idcompanyaddress' => 0, 'idcompany' => 1, 'companyaddressIsoCodecountry' => 2, 'companyaddressIsoCodephone' => 3, 'companyaddressAddressee' => 4, 'companyaddressAddresseeCellular' => 5, 'companyaddressAddresseePhone' => 6, 'companyaddressAddress' => 7, 'companyaddressAddress2' => 8, 'companyaddressCity' => 9, 'companyaddressState' => 10, 'companyaddressZipcode' => 11, ),
        BasePeer::TYPE_COLNAME => array (CompanyaddressPeer::IDCOMPANYADDRESS => 0, CompanyaddressPeer::IDCOMPANY => 1, CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY => 2, CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE => 3, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE => 4, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR => 5, CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE => 6, CompanyaddressPeer::COMPANYADDRESS_ADDRESS => 7, CompanyaddressPeer::COMPANYADDRESS_ADDRESS2 => 8, CompanyaddressPeer::COMPANYADDRESS_CITY => 9, CompanyaddressPeer::COMPANYADDRESS_STATE => 10, CompanyaddressPeer::COMPANYADDRESS_ZIPCODE => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDCOMPANYADDRESS' => 0, 'IDCOMPANY' => 1, 'COMPANYADDRESS_ISO_CODECOUNTRY' => 2, 'COMPANYADDRESS_ISO_CODEPHONE' => 3, 'COMPANYADDRESS_ADDRESSEE' => 4, 'COMPANYADDRESS_ADDRESSEE_CELLULAR' => 5, 'COMPANYADDRESS_ADDRESSEE_PHONE' => 6, 'COMPANYADDRESS_ADDRESS' => 7, 'COMPANYADDRESS_ADDRESS2' => 8, 'COMPANYADDRESS_CITY' => 9, 'COMPANYADDRESS_STATE' => 10, 'COMPANYADDRESS_ZIPCODE' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('idcompanyaddress' => 0, 'idcompany' => 1, 'companyaddress_iso_codecountry' => 2, 'companyaddress_iso_codephone' => 3, 'companyaddress_addressee' => 4, 'companyaddress_addressee_cellular' => 5, 'companyaddress_addressee_phone' => 6, 'companyaddress_address' => 7, 'companyaddress_address2' => 8, 'companyaddress_city' => 9, 'companyaddress_state' => 10, 'companyaddress_zipcode' => 11, ),
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
        $toNames = CompanyaddressPeer::getFieldNames($toType);
        $key = isset(CompanyaddressPeer::$fieldKeys[$fromType][$name]) ? CompanyaddressPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(CompanyaddressPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, CompanyaddressPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return CompanyaddressPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. CompanyaddressPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(CompanyaddressPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(CompanyaddressPeer::IDCOMPANYADDRESS);
            $criteria->addSelectColumn(CompanyaddressPeer::IDCOMPANY);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ADDRESS);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ADDRESS2);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_CITY);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_STATE);
            $criteria->addSelectColumn(CompanyaddressPeer::COMPANYADDRESS_ZIPCODE);
        } else {
            $criteria->addSelectColumn($alias . '.idcompanyaddress');
            $criteria->addSelectColumn($alias . '.idcompany');
            $criteria->addSelectColumn($alias . '.companyaddress_iso_codecountry');
            $criteria->addSelectColumn($alias . '.companyaddress_iso_codephone');
            $criteria->addSelectColumn($alias . '.companyaddress_addressee');
            $criteria->addSelectColumn($alias . '.companyaddress_addressee_cellular');
            $criteria->addSelectColumn($alias . '.companyaddress_addressee_phone');
            $criteria->addSelectColumn($alias . '.companyaddress_address');
            $criteria->addSelectColumn($alias . '.companyaddress_address2');
            $criteria->addSelectColumn($alias . '.companyaddress_city');
            $criteria->addSelectColumn($alias . '.companyaddress_state');
            $criteria->addSelectColumn($alias . '.companyaddress_zipcode');
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
        $criteria->setPrimaryTableName(CompanyaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CompanyaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Companyaddress
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = CompanyaddressPeer::doSelect($critcopy, $con);
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
        return CompanyaddressPeer::populateObjects(CompanyaddressPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            CompanyaddressPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

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
     * @param Companyaddress $obj A Companyaddress object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdcompanyaddress();
            } // if key === null
            CompanyaddressPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Companyaddress object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Companyaddress) {
                $key = (string) $value->getIdcompanyaddress();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Companyaddress object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(CompanyaddressPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Companyaddress Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(CompanyaddressPeer::$instances[$key])) {
                return CompanyaddressPeer::$instances[$key];
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
        foreach (CompanyaddressPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        CompanyaddressPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to companyaddress
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
        $cls = CompanyaddressPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = CompanyaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = CompanyaddressPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CompanyaddressPeer::addInstanceToPool($obj, $key);
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
     * @return array (Companyaddress object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = CompanyaddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = CompanyaddressPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + CompanyaddressPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CompanyaddressPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            CompanyaddressPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(CompanyaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CompanyaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CompanyaddressPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Selects a collection of Companyaddress objects pre-filled with their Company objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Companyaddress objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);
        }

        CompanyaddressPeer::addSelectColumns($criteria);
        $startcol = CompanyaddressPeer::NUM_HYDRATE_COLUMNS;
        CompanyPeer::addSelectColumns($criteria);

        $criteria->addJoin(CompanyaddressPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CompanyaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CompanyaddressPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CompanyaddressPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CompanyaddressPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Companyaddress) to $obj2 (Company)
                $obj2->addCompanyaddress($obj1);

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
        $criteria->setPrimaryTableName(CompanyaddressPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CompanyaddressPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CompanyaddressPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Selects a collection of Companyaddress objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Companyaddress objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);
        }

        CompanyaddressPeer::addSelectColumns($criteria);
        $startcol2 = CompanyaddressPeer::NUM_HYDRATE_COLUMNS;

        CompanyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CompanyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(CompanyaddressPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CompanyaddressPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CompanyaddressPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CompanyaddressPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CompanyaddressPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Companyaddress) to the collection in $obj2 (Company)
                $obj2->addCompanyaddress($obj1);
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
        return Propel::getDatabaseMap(CompanyaddressPeer::DATABASE_NAME)->getTable(CompanyaddressPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseCompanyaddressPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseCompanyaddressPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \CompanyaddressTableMap());
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
        return CompanyaddressPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Companyaddress or Criteria object.
     *
     * @param      mixed $values Criteria or Companyaddress object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Companyaddress object
        }

        if ($criteria->containsKey(CompanyaddressPeer::IDCOMPANYADDRESS) && $criteria->keyContainsValue(CompanyaddressPeer::IDCOMPANYADDRESS) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CompanyaddressPeer::IDCOMPANYADDRESS.')');
        }


        // Set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Companyaddress or Criteria object.
     *
     * @param      mixed $values Criteria or Companyaddress object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(CompanyaddressPeer::IDCOMPANYADDRESS);
            $value = $criteria->remove(CompanyaddressPeer::IDCOMPANYADDRESS);
            if ($value) {
                $selectCriteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(CompanyaddressPeer::TABLE_NAME);
            }

        } else { // $values is Companyaddress object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the companyaddress table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(CompanyaddressPeer::TABLE_NAME, $con, CompanyaddressPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CompanyaddressPeer::clearInstancePool();
            CompanyaddressPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Companyaddress or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Companyaddress object or primary key or array of primary keys
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
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            CompanyaddressPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Companyaddress) { // it's a model object
            // invalidate the cache for this single object
            CompanyaddressPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);
            $criteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                CompanyaddressPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(CompanyaddressPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            CompanyaddressPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Companyaddress object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Companyaddress $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(CompanyaddressPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(CompanyaddressPeer::TABLE_NAME);

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

        return BasePeer::doValidate(CompanyaddressPeer::DATABASE_NAME, CompanyaddressPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Companyaddress
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = CompanyaddressPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);
        $criteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, $pk);

        $v = CompanyaddressPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Companyaddress[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);
            $criteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, $pks, Criteria::IN);
            $objs = CompanyaddressPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseCompanyaddressPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCompanyaddressPeer::buildTableMap();

