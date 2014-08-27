<?php


/**
 * Base static class for performing query and update operations on the 'productionorderitem' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseProductionorderitemPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'productionorderitem';

    /** the related Propel class for this table */
    const OM_CLASS = 'Productionorderitem';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProductionorderitemTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the idproductionorderitem field */
    const IDPRODUCTIONORDERITEM = 'productionorderitem.idproductionorderitem';

    /** the column name for the idproductionteam field */
    const IDPRODUCTIONTEAM = 'productionorderitem.idproductionteam';

    /** the column name for the idproductionline field */
    const IDPRODUCTIONLINE = 'productionorderitem.idproductionline';

    /** the column name for the idorderitem field */
    const IDORDERITEM = 'productionorderitem.idorderitem';

    /** the column name for the idproductionstatus field */
    const IDPRODUCTIONSTATUS = 'productionorderitem.idproductionstatus';

    /** the column name for the productionorderitem_dateinit field */
    const PRODUCTIONORDERITEM_DATEINIT = 'productionorderitem.productionorderitem_dateinit';

    /** the column name for the productionorderitem_datedelivery field */
    const PRODUCTIONORDERITEM_DATEDELIVERY = 'productionorderitem.productionorderitem_datedelivery';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Productionorderitem objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Productionorderitem[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProductionorderitemPeer::$fieldNames[ProductionorderitemPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductionorderitem', 'Idproductionteam', 'Idproductionline', 'Idorderitem', 'Idproductionstatus', 'ProductionorderitemDateinit', 'ProductionorderitemDatedelivery', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductionorderitem', 'idproductionteam', 'idproductionline', 'idorderitem', 'idproductionstatus', 'productionorderitemDateinit', 'productionorderitemDatedelivery', ),
        BasePeer::TYPE_COLNAME => array (ProductionorderitemPeer::IDPRODUCTIONORDERITEM, ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionorderitemPeer::IDORDERITEM, ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT, ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTIONORDERITEM', 'IDPRODUCTIONTEAM', 'IDPRODUCTIONLINE', 'IDORDERITEM', 'IDPRODUCTIONSTATUS', 'PRODUCTIONORDERITEM_DATEINIT', 'PRODUCTIONORDERITEM_DATEDELIVERY', ),
        BasePeer::TYPE_FIELDNAME => array ('idproductionorderitem', 'idproductionteam', 'idproductionline', 'idorderitem', 'idproductionstatus', 'productionorderitem_dateinit', 'productionorderitem_datedelivery', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProductionorderitemPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductionorderitem' => 0, 'Idproductionteam' => 1, 'Idproductionline' => 2, 'Idorderitem' => 3, 'Idproductionstatus' => 4, 'ProductionorderitemDateinit' => 5, 'ProductionorderitemDatedelivery' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductionorderitem' => 0, 'idproductionteam' => 1, 'idproductionline' => 2, 'idorderitem' => 3, 'idproductionstatus' => 4, 'productionorderitemDateinit' => 5, 'productionorderitemDatedelivery' => 6, ),
        BasePeer::TYPE_COLNAME => array (ProductionorderitemPeer::IDPRODUCTIONORDERITEM => 0, ProductionorderitemPeer::IDPRODUCTIONTEAM => 1, ProductionorderitemPeer::IDPRODUCTIONLINE => 2, ProductionorderitemPeer::IDORDERITEM => 3, ProductionorderitemPeer::IDPRODUCTIONSTATUS => 4, ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT => 5, ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTIONORDERITEM' => 0, 'IDPRODUCTIONTEAM' => 1, 'IDPRODUCTIONLINE' => 2, 'IDORDERITEM' => 3, 'IDPRODUCTIONSTATUS' => 4, 'PRODUCTIONORDERITEM_DATEINIT' => 5, 'PRODUCTIONORDERITEM_DATEDELIVERY' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('idproductionorderitem' => 0, 'idproductionteam' => 1, 'idproductionline' => 2, 'idorderitem' => 3, 'idproductionstatus' => 4, 'productionorderitem_dateinit' => 5, 'productionorderitem_datedelivery' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
        $toNames = ProductionorderitemPeer::getFieldNames($toType);
        $key = isset(ProductionorderitemPeer::$fieldKeys[$fromType][$name]) ? ProductionorderitemPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProductionorderitemPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProductionorderitemPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProductionorderitemPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. ProductionorderitemPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProductionorderitemPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProductionorderitemPeer::IDPRODUCTIONORDERITEM);
            $criteria->addSelectColumn(ProductionorderitemPeer::IDPRODUCTIONTEAM);
            $criteria->addSelectColumn(ProductionorderitemPeer::IDPRODUCTIONLINE);
            $criteria->addSelectColumn(ProductionorderitemPeer::IDORDERITEM);
            $criteria->addSelectColumn(ProductionorderitemPeer::IDPRODUCTIONSTATUS);
            $criteria->addSelectColumn(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT);
            $criteria->addSelectColumn(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY);
        } else {
            $criteria->addSelectColumn($alias . '.idproductionorderitem');
            $criteria->addSelectColumn($alias . '.idproductionteam');
            $criteria->addSelectColumn($alias . '.idproductionline');
            $criteria->addSelectColumn($alias . '.idorderitem');
            $criteria->addSelectColumn($alias . '.idproductionstatus');
            $criteria->addSelectColumn($alias . '.productionorderitem_dateinit');
            $criteria->addSelectColumn($alias . '.productionorderitem_datedelivery');
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
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Productionorderitem
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProductionorderitemPeer::doSelect($critcopy, $con);
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
        return ProductionorderitemPeer::populateObjects(ProductionorderitemPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

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
     * @param Productionorderitem $obj A Productionorderitem object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdproductionorderitem();
            } // if key === null
            ProductionorderitemPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Productionorderitem object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Productionorderitem) {
                $key = (string) $value->getIdproductionorderitem();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Productionorderitem object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProductionorderitemPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Productionorderitem Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProductionorderitemPeer::$instances[$key])) {
                return ProductionorderitemPeer::$instances[$key];
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
        foreach (ProductionorderitemPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProductionorderitemPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to productionorderitem
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ProductionordercommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ProductionordercommentPeer::clearInstancePool();
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
        $cls = ProductionorderitemPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProductionorderitemPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductionorderitemPeer::addInstanceToPool($obj, $key);
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
     * @return array (Productionorderitem object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProductionorderitemPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductionorderitemPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProductionorderitemPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Orderitem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinOrderitem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionline table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProductionline(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionstatus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProductionstatus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionteam table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProductionteam(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

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
     * Selects a collection of Productionorderitem objects pre-filled with their Orderitem objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrderitem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;
        OrderitemPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = OrderitemPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = OrderitemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrderitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    OrderitemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productionorderitem) to $obj2 (Orderitem)
                $obj2->addProductionorderitem($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with their Productionline objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProductionline(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;
        ProductionlinePeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProductionlinePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProductionlinePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductionlinePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProductionlinePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productionorderitem) to $obj2 (Productionline)
                $obj2->addProductionorderitem($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with their Productionstatus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProductionstatus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;
        ProductionstatusPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProductionstatusPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProductionstatusPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductionstatusPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProductionstatusPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productionorderitem) to $obj2 (Productionstatus)
                $obj2->addProductionorderitem($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with their Productionteam objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProductionteam(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;
        ProductionteamPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProductionteamPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProductionteamPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductionteamPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProductionteamPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productionorderitem) to $obj2 (Productionteam)
                $obj2->addProductionorderitem($obj1);

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
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

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
     * Selects a collection of Productionorderitem objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol2 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;

        OrderitemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderitemPeer::NUM_HYDRATE_COLUMNS;

        ProductionlinePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductionlinePeer::NUM_HYDRATE_COLUMNS;

        ProductionstatusPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProductionstatusPeer::NUM_HYDRATE_COLUMNS;

        ProductionteamPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + ProductionteamPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Orderitem rows

            $key2 = OrderitemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = OrderitemPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = OrderitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderitemPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj2 (Orderitem)
                $obj2->addProductionorderitem($obj1);
            } // if joined row not null

            // Add objects for joined Productionline rows

            $key3 = ProductionlinePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProductionlinePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProductionlinePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductionlinePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj3 (Productionline)
                $obj3->addProductionorderitem($obj1);
            } // if joined row not null

            // Add objects for joined Productionstatus rows

            $key4 = ProductionstatusPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = ProductionstatusPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = ProductionstatusPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProductionstatusPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj4 (Productionstatus)
                $obj4->addProductionorderitem($obj1);
            } // if joined row not null

            // Add objects for joined Productionteam rows

            $key5 = ProductionteamPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = ProductionteamPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = ProductionteamPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    ProductionteamPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj5 (Productionteam)
                $obj5->addProductionorderitem($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Orderitem table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptOrderitem(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionline table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProductionline(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionstatus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProductionstatus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productionteam table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProductionteam(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductionorderitemPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

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
     * Selects a collection of Productionorderitem objects pre-filled with all related objects except Orderitem.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptOrderitem(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol2 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;

        ProductionlinePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProductionlinePeer::NUM_HYDRATE_COLUMNS;

        ProductionstatusPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductionstatusPeer::NUM_HYDRATE_COLUMNS;

        ProductionteamPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProductionteamPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Productionline rows

                $key2 = ProductionlinePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProductionlinePeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProductionlinePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProductionlinePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj2 (Productionline)
                $obj2->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionstatus rows

                $key3 = ProductionstatusPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProductionstatusPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProductionstatusPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductionstatusPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj3 (Productionstatus)
                $obj3->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionteam rows

                $key4 = ProductionteamPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProductionteamPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProductionteamPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProductionteamPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj4 (Productionteam)
                $obj4->addProductionorderitem($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with all related objects except Productionline.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProductionline(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol2 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;

        OrderitemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderitemPeer::NUM_HYDRATE_COLUMNS;

        ProductionstatusPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductionstatusPeer::NUM_HYDRATE_COLUMNS;

        ProductionteamPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProductionteamPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Orderitem rows

                $key2 = OrderitemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrderitemPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrderitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderitemPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj2 (Orderitem)
                $obj2->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionstatus rows

                $key3 = ProductionstatusPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProductionstatusPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProductionstatusPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductionstatusPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj3 (Productionstatus)
                $obj3->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionteam rows

                $key4 = ProductionteamPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProductionteamPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProductionteamPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProductionteamPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj4 (Productionteam)
                $obj4->addProductionorderitem($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with all related objects except Productionstatus.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProductionstatus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol2 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;

        OrderitemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderitemPeer::NUM_HYDRATE_COLUMNS;

        ProductionlinePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductionlinePeer::NUM_HYDRATE_COLUMNS;

        ProductionteamPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProductionteamPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONTEAM, ProductionteamPeer::IDPRODUCTIONTEAM, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Orderitem rows

                $key2 = OrderitemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrderitemPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrderitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderitemPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj2 (Orderitem)
                $obj2->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionline rows

                $key3 = ProductionlinePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProductionlinePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProductionlinePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductionlinePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj3 (Productionline)
                $obj3->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionteam rows

                $key4 = ProductionteamPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProductionteamPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProductionteamPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProductionteamPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj4 (Productionteam)
                $obj4->addProductionorderitem($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productionorderitem objects pre-filled with all related objects except Productionteam.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productionorderitem objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProductionteam(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);
        }

        ProductionorderitemPeer::addSelectColumns($criteria);
        $startcol2 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS;

        OrderitemPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderitemPeer::NUM_HYDRATE_COLUMNS;

        ProductionlinePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductionlinePeer::NUM_HYDRATE_COLUMNS;

        ProductionstatusPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + ProductionstatusPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductionorderitemPeer::IDORDERITEM, OrderitemPeer::IDORDERITEM, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONLINE, ProductionlinePeer::IDPRODUCTIONLINE, $join_behavior);

        $criteria->addJoin(ProductionorderitemPeer::IDPRODUCTIONSTATUS, ProductionstatusPeer::IDPRODUCTIONSTATUS, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductionorderitemPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductionorderitemPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductionorderitemPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductionorderitemPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Orderitem rows

                $key2 = OrderitemPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = OrderitemPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = OrderitemPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    OrderitemPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj2 (Orderitem)
                $obj2->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionline rows

                $key3 = ProductionlinePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ProductionlinePeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = ProductionlinePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductionlinePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj3 (Productionline)
                $obj3->addProductionorderitem($obj1);

            } // if joined row is not null

                // Add objects for joined Productionstatus rows

                $key4 = ProductionstatusPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = ProductionstatusPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = ProductionstatusPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    ProductionstatusPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Productionorderitem) to the collection in $obj4 (Productionstatus)
                $obj4->addProductionorderitem($obj1);

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
        return Propel::getDatabaseMap(ProductionorderitemPeer::DATABASE_NAME)->getTable(ProductionorderitemPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProductionorderitemPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProductionorderitemPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ProductionorderitemTableMap());
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
        return ProductionorderitemPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Productionorderitem or Criteria object.
     *
     * @param      mixed $values Criteria or Productionorderitem object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Productionorderitem object
        }

        if ($criteria->containsKey(ProductionorderitemPeer::IDPRODUCTIONORDERITEM) && $criteria->keyContainsValue(ProductionorderitemPeer::IDPRODUCTIONORDERITEM) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductionorderitemPeer::IDPRODUCTIONORDERITEM.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Productionorderitem or Criteria object.
     *
     * @param      mixed $values Criteria or Productionorderitem object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProductionorderitemPeer::IDPRODUCTIONORDERITEM);
            $value = $criteria->remove(ProductionorderitemPeer::IDPRODUCTIONORDERITEM);
            if ($value) {
                $selectCriteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProductionorderitemPeer::TABLE_NAME);
            }

        } else { // $values is Productionorderitem object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the productionorderitem table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ProductionorderitemPeer::doOnDeleteCascade(new Criteria(ProductionorderitemPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ProductionorderitemPeer::TABLE_NAME, $con, ProductionorderitemPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductionorderitemPeer::clearInstancePool();
            ProductionorderitemPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Productionorderitem or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Productionorderitem object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Productionorderitem) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);
            $criteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ProductionorderitemPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ProductionorderitemPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ProductionorderitemPeer::clearInstancePool();
            } elseif ($values instanceof Productionorderitem) { // it's a model object
                ProductionorderitemPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ProductionorderitemPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProductionorderitemPeer::clearRelatedInstancePool();
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
        $objects = ProductionorderitemPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Productionordercomment objects
            $criteria = new Criteria(ProductionordercommentPeer::DATABASE_NAME);

            $criteria->add(ProductionordercommentPeer::IDPRODUCTIONORDERITEM, $obj->getIdproductionorderitem());
            $affectedRows += ProductionordercommentPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Productionorderitem object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Productionorderitem $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProductionorderitemPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProductionorderitemPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProductionorderitemPeer::DATABASE_NAME, ProductionorderitemPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Productionorderitem
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProductionorderitemPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);
        $criteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $pk);

        $v = ProductionorderitemPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Productionorderitem[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);
            $criteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $pks, Criteria::IN);
            $objs = ProductionorderitemPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseProductionorderitemPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProductionorderitemPeer::buildTableMap();

