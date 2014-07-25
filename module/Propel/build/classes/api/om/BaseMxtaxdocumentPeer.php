<?php


/**
 * Base static class for performing query and update operations on the 'mxtaxdocument' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseMxtaxdocumentPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'mxtaxdocument';

    /** the related Propel class for this table */
    const OM_CLASS = 'Mxtaxdocument';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MxtaxdocumentTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the idmxtaxdocument field */
    const IDMXTAXDOCUMENT = 'mxtaxdocument.idmxtaxdocument';

    /** the column name for the idclienttax field */
    const IDCLIENTTAX = 'mxtaxdocument.idclienttax';

    /** the column name for the idorder field */
    const IDORDER = 'mxtaxdocument.idorder';

    /** the column name for the mxtaxdocument_folio field */
    const MXTAXDOCUMENT_FOLIO = 'mxtaxdocument.mxtaxdocument_folio';

    /** the column name for the mxtaxdocument_version field */
    const MXTAXDOCUMENT_VERSION = 'mxtaxdocument.mxtaxdocument_version';

    /** the column name for the mxtaxdocument_type field */
    const MXTAXDOCUMENT_TYPE = 'mxtaxdocument.mxtaxdocument_type';

    /** the column name for the mxtaxdocument_status field */
    const MXTAXDOCUMENT_STATUS = 'mxtaxdocument.mxtaxdocument_status';

    /** the column name for the mxtaxdocument_url_xml field */
    const MXTAXDOCUMENT_URL_XML = 'mxtaxdocument.mxtaxdocument_url_xml';

    /** the column name for the mxtaxdocument_url_pdf field */
    const MXTAXDOCUMENT_URL_PDF = 'mxtaxdocument.mxtaxdocument_url_pdf';

    /** The enumerated values for the mxtaxdocument_type field */
    const MXTAXDOCUMENT_TYPE_INGRESO = 'ingreso';
    const MXTAXDOCUMENT_TYPE_EGRESO = 'egreso';

    /** The enumerated values for the mxtaxdocument_status field */
    const MXTAXDOCUMENT_STATUS_CREATED = 'CREATED';
    const MXTAXDOCUMENT_STATUS_CANCELLED = 'CANCELLED';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Mxtaxdocument objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Mxtaxdocument[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MxtaxdocumentPeer::$fieldNames[MxtaxdocumentPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idmxtaxdocument', 'Idclienttax', 'Idorder', 'MxtaxdocumentFolio', 'MxtaxdocumentVersion', 'MxtaxdocumentType', 'MxtaxdocumentStatus', 'MxtaxdocumentUrlXml', 'MxtaxdocumentUrlPdf', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmxtaxdocument', 'idclienttax', 'idorder', 'mxtaxdocumentFolio', 'mxtaxdocumentVersion', 'mxtaxdocumentType', 'mxtaxdocumentStatus', 'mxtaxdocumentUrlXml', 'mxtaxdocumentUrlPdf', ),
        BasePeer::TYPE_COLNAME => array (MxtaxdocumentPeer::IDMXTAXDOCUMENT, MxtaxdocumentPeer::IDCLIENTTAX, MxtaxdocumentPeer::IDORDER, MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO, MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION, MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE, MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS, MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML, MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMXTAXDOCUMENT', 'IDCLIENTTAX', 'IDORDER', 'MXTAXDOCUMENT_FOLIO', 'MXTAXDOCUMENT_VERSION', 'MXTAXDOCUMENT_TYPE', 'MXTAXDOCUMENT_STATUS', 'MXTAXDOCUMENT_URL_XML', 'MXTAXDOCUMENT_URL_PDF', ),
        BasePeer::TYPE_FIELDNAME => array ('idmxtaxdocument', 'idclienttax', 'idorder', 'mxtaxdocument_folio', 'mxtaxdocument_version', 'mxtaxdocument_type', 'mxtaxdocument_status', 'mxtaxdocument_url_xml', 'mxtaxdocument_url_pdf', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MxtaxdocumentPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idmxtaxdocument' => 0, 'Idclienttax' => 1, 'Idorder' => 2, 'MxtaxdocumentFolio' => 3, 'MxtaxdocumentVersion' => 4, 'MxtaxdocumentType' => 5, 'MxtaxdocumentStatus' => 6, 'MxtaxdocumentUrlXml' => 7, 'MxtaxdocumentUrlPdf' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmxtaxdocument' => 0, 'idclienttax' => 1, 'idorder' => 2, 'mxtaxdocumentFolio' => 3, 'mxtaxdocumentVersion' => 4, 'mxtaxdocumentType' => 5, 'mxtaxdocumentStatus' => 6, 'mxtaxdocumentUrlXml' => 7, 'mxtaxdocumentUrlPdf' => 8, ),
        BasePeer::TYPE_COLNAME => array (MxtaxdocumentPeer::IDMXTAXDOCUMENT => 0, MxtaxdocumentPeer::IDCLIENTTAX => 1, MxtaxdocumentPeer::IDORDER => 2, MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO => 3, MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION => 4, MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE => 5, MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS => 6, MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML => 7, MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMXTAXDOCUMENT' => 0, 'IDCLIENTTAX' => 1, 'IDORDER' => 2, 'MXTAXDOCUMENT_FOLIO' => 3, 'MXTAXDOCUMENT_VERSION' => 4, 'MXTAXDOCUMENT_TYPE' => 5, 'MXTAXDOCUMENT_STATUS' => 6, 'MXTAXDOCUMENT_URL_XML' => 7, 'MXTAXDOCUMENT_URL_PDF' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('idmxtaxdocument' => 0, 'idclienttax' => 1, 'idorder' => 2, 'mxtaxdocument_folio' => 3, 'mxtaxdocument_version' => 4, 'mxtaxdocument_type' => 5, 'mxtaxdocument_status' => 6, 'mxtaxdocument_url_xml' => 7, 'mxtaxdocument_url_pdf' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE => array(
            MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE_INGRESO,
            MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE_EGRESO,
        ),
        MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS => array(
            MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS_CREATED,
            MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS_CANCELLED,
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
        $toNames = MxtaxdocumentPeer::getFieldNames($toType);
        $key = isset(MxtaxdocumentPeer::$fieldKeys[$fromType][$name]) ? MxtaxdocumentPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MxtaxdocumentPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MxtaxdocumentPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MxtaxdocumentPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return MxtaxdocumentPeer::$enumValueSets;
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
        $valueSets = MxtaxdocumentPeer::getValueSets();

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
        $values = MxtaxdocumentPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. MxtaxdocumentPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MxtaxdocumentPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MxtaxdocumentPeer::IDMXTAXDOCUMENT);
            $criteria->addSelectColumn(MxtaxdocumentPeer::IDCLIENTTAX);
            $criteria->addSelectColumn(MxtaxdocumentPeer::IDORDER);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML);
            $criteria->addSelectColumn(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF);
        } else {
            $criteria->addSelectColumn($alias . '.idmxtaxdocument');
            $criteria->addSelectColumn($alias . '.idclienttax');
            $criteria->addSelectColumn($alias . '.idorder');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_folio');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_version');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_type');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_status');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_url_xml');
            $criteria->addSelectColumn($alias . '.mxtaxdocument_url_pdf');
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
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Mxtaxdocument
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MxtaxdocumentPeer::doSelect($critcopy, $con);
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
        return MxtaxdocumentPeer::populateObjects(MxtaxdocumentPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

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
     * @param Mxtaxdocument $obj A Mxtaxdocument object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdmxtaxdocument();
            } // if key === null
            MxtaxdocumentPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Mxtaxdocument object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Mxtaxdocument) {
                $key = (string) $value->getIdmxtaxdocument();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Mxtaxdocument object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MxtaxdocumentPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Mxtaxdocument Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MxtaxdocumentPeer::$instances[$key])) {
                return MxtaxdocumentPeer::$instances[$key];
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
        foreach (MxtaxdocumentPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        MxtaxdocumentPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to mxtaxdocument
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
        $cls = MxtaxdocumentPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MxtaxdocumentPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MxtaxdocumentPeer::addInstanceToPool($obj, $key);
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
     * @return array (Mxtaxdocument object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MxtaxdocumentPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MxtaxdocumentPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MxtaxdocumentPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Order table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Clienttax table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinClienttax(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);

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
     * Selects a collection of Mxtaxdocument objects pre-filled with their Order objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mxtaxdocument objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);
        }

        MxtaxdocumentPeer::addSelectColumns($criteria);
        $startcol = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;
        OrderPeer::addSelectColumns($criteria);

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MxtaxdocumentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MxtaxdocumentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MxtaxdocumentPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = OrderPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = OrderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    OrderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Mxtaxdocument) to $obj2 (Order)
                $obj2->addMxtaxdocument($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mxtaxdocument objects pre-filled with their Clienttax objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mxtaxdocument objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinClienttax(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);
        }

        MxtaxdocumentPeer::addSelectColumns($criteria);
        $startcol = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;
        ClienttaxPeer::addSelectColumns($criteria);

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MxtaxdocumentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MxtaxdocumentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MxtaxdocumentPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ClienttaxPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ClienttaxPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ClienttaxPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ClienttaxPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Mxtaxdocument) to $obj2 (Clienttax)
                $obj2->addMxtaxdocument($obj1);

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
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);

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
     * Selects a collection of Mxtaxdocument objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mxtaxdocument objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);
        }

        MxtaxdocumentPeer::addSelectColumns($criteria);
        $startcol2 = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;

        OrderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderPeer::NUM_HYDRATE_COLUMNS;

        ClienttaxPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ClienttaxPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MxtaxdocumentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MxtaxdocumentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MxtaxdocumentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Order rows

            $key2 = OrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = OrderPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Mxtaxdocument) to the collection in $obj2 (Order)
                $obj2->addMxtaxdocument($obj1);
            } // if joined row not null

            // Add objects for joined Clienttax rows

            $key3 = ClienttaxPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ClienttaxPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ClienttaxPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ClienttaxPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Mxtaxdocument) to the collection in $obj3 (Clienttax)
                $obj3->addMxtaxdocument($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Order table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrder(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Clienttax table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptClienttax(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MxtaxdocumentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

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
     * Selects a collection of Mxtaxdocument objects pre-filled with all related objects except Order.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mxtaxdocument objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);
        }

        MxtaxdocumentPeer::addSelectColumns($criteria);
        $startcol2 = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;

        ClienttaxPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ClienttaxPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MxtaxdocumentPeer::IDCLIENTTAX, ClienttaxPeer::IDCLIENTTAX, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MxtaxdocumentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MxtaxdocumentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MxtaxdocumentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Clienttax rows

                $key2 = ClienttaxPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ClienttaxPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ClienttaxPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ClienttaxPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Mxtaxdocument) to the collection in $obj2 (Clienttax)
                $obj2->addMxtaxdocument($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mxtaxdocument objects pre-filled with all related objects except Clienttax.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mxtaxdocument objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptClienttax(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);
        }

        MxtaxdocumentPeer::addSelectColumns($criteria);
        $startcol2 = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS;

        OrderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MxtaxdocumentPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MxtaxdocumentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MxtaxdocumentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MxtaxdocumentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MxtaxdocumentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Order rows

                $key2 = OrderPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrderPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrderPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Mxtaxdocument) to the collection in $obj2 (Order)
                $obj2->addMxtaxdocument($obj1);

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
        return Propel::getDatabaseMap(MxtaxdocumentPeer::DATABASE_NAME)->getTable(MxtaxdocumentPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMxtaxdocumentPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMxtaxdocumentPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \MxtaxdocumentTableMap());
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
        return MxtaxdocumentPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Mxtaxdocument or Criteria object.
     *
     * @param      mixed $values Criteria or Mxtaxdocument object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Mxtaxdocument object
        }

        if ($criteria->containsKey(MxtaxdocumentPeer::IDMXTAXDOCUMENT) && $criteria->keyContainsValue(MxtaxdocumentPeer::IDMXTAXDOCUMENT) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MxtaxdocumentPeer::IDMXTAXDOCUMENT.')');
        }


        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Mxtaxdocument or Criteria object.
     *
     * @param      mixed $values Criteria or Mxtaxdocument object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MxtaxdocumentPeer::IDMXTAXDOCUMENT);
            $value = $criteria->remove(MxtaxdocumentPeer::IDMXTAXDOCUMENT);
            if ($value) {
                $selectCriteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MxtaxdocumentPeer::TABLE_NAME);
            }

        } else { // $values is Mxtaxdocument object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the mxtaxdocument table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MxtaxdocumentPeer::TABLE_NAME, $con, MxtaxdocumentPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MxtaxdocumentPeer::clearInstancePool();
            MxtaxdocumentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Mxtaxdocument or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Mxtaxdocument object or primary key or array of primary keys
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
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MxtaxdocumentPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Mxtaxdocument) { // it's a model object
            // invalidate the cache for this single object
            MxtaxdocumentPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);
            $criteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                MxtaxdocumentPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MxtaxdocumentPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            MxtaxdocumentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Mxtaxdocument object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Mxtaxdocument $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MxtaxdocumentPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MxtaxdocumentPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MxtaxdocumentPeer::DATABASE_NAME, MxtaxdocumentPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Mxtaxdocument
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MxtaxdocumentPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);
        $criteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $pk);

        $v = MxtaxdocumentPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Mxtaxdocument[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);
            $criteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $pks, Criteria::IN);
            $objs = MxtaxdocumentPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMxtaxdocumentPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMxtaxdocumentPeer::buildTableMap();

