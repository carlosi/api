<?php


/**
 * Base static class for performing query and update operations on the 'productmain' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseProductmainPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'productmain';

    /** the related Propel class for this table */
    const OM_CLASS = 'Productmain';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ProductmainTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the idproductmain field */
    const IDPRODUCTMAIN = 'productmain.idproductmain';

    /** the column name for the idcompany field */
    const IDCOMPANY = 'productmain.idcompany';

    /** the column name for the idproductcategory field */
    const IDPRODUCTCATEGORY = 'productmain.idproductcategory';

    /** the column name for the productmain_name field */
    const PRODUCTMAIN_NAME = 'productmain.productmain_name';

    /** the column name for the productmain_unit field */
    const PRODUCTMAIN_UNIT = 'productmain.productmain_unit';

    /** the column name for the productmain_discount field */
    const PRODUCTMAIN_DISCOUNT = 'productmain.productmain_discount';

    /** the column name for the productmain_eachpieces field */
    const PRODUCTMAIN_EACHPIECES = 'productmain.productmain_eachpieces';

    /** the column name for the productmain_maxdiscount field */
    const PRODUCTMAIN_MAXDISCOUNT = 'productmain.productmain_maxdiscount';

    /** the column name for the productmain_baseproperty field */
    const PRODUCTMAIN_BASEPROPERTY = 'productmain.productmain_baseproperty';

    /** the column name for the productmain_type field */
    const PRODUCTMAIN_TYPE = 'productmain.productmain_type';

    /** The enumerated values for the productmain_unit field */
    const PRODUCTMAIN_UNIT_KILO = 'kilo';
    const PRODUCTMAIN_UNIT_METRO_CUADRADO = 'metro cuadrado';
    const PRODUCTMAIN_UNIT_CABEZA = 'cabeza';
    const PRODUCTMAIN_UNIT_KILOWATT = 'kilowatt';
    const PRODUCTMAIN_UNIT_KILOWATT_HORA = 'kilowatt-hora';
    const PRODUCTMAIN_UNIT_GRAMO_NETO = 'gramo neto';
    const PRODUCTMAIN_UNIT_DOCENAS = 'docenas';
    const PRODUCTMAIN_UNIT_GRAMO = 'gramo';
    const PRODUCTMAIN_UNIT_METRO_CúBICO = 'metro cúbico';
    const PRODUCTMAIN_UNIT_LITRO = 'litro';
    const PRODUCTMAIN_UNIT_MILLAR = 'millar';
    const PRODUCTMAIN_UNIT_TONELADA = 'tonelada';
    const PRODUCTMAIN_UNIT_DECENAS = 'decenas';
    const PRODUCTMAIN_UNIT_CAJA = 'caja';
    const PRODUCTMAIN_UNIT_METRO_LINEAL = 'metro lineal';
    const PRODUCTMAIN_UNIT_PIEZA = 'pieza';
    const PRODUCTMAIN_UNIT_PAR = 'par';
    const PRODUCTMAIN_UNIT_JUEGO = 'juego';
    const PRODUCTMAIN_UNIT_BARRIL = 'barril';
    const PRODUCTMAIN_UNIT_CIENTOS = 'cientos';
    const PRODUCTMAIN_UNIT_BOTELLA = 'botella';

    /** The enumerated values for the productmain_type field */
    const PRODUCTMAIN_TYPE_COMPLEMENT = 'COMPLEMENT';
    const PRODUCTMAIN_TYPE_PRODUCT = 'PRODUCT';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Productmain objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Productmain[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ProductmainPeer::$fieldNames[ProductmainPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductmain', 'Idcompany', 'Idproductcategory', 'ProductmainName', 'ProductmainUnit', 'ProductmainDiscount', 'ProductmainEachpieces', 'ProductmainMaxdiscount', 'ProductmainBaseproperty', 'ProductmainType', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductmain', 'idcompany', 'idproductcategory', 'productmainName', 'productmainUnit', 'productmainDiscount', 'productmainEachpieces', 'productmainMaxdiscount', 'productmainBaseproperty', 'productmainType', ),
        BasePeer::TYPE_COLNAME => array (ProductmainPeer::IDPRODUCTMAIN, ProductmainPeer::IDCOMPANY, ProductmainPeer::IDPRODUCTCATEGORY, ProductmainPeer::PRODUCTMAIN_NAME, ProductmainPeer::PRODUCTMAIN_UNIT, ProductmainPeer::PRODUCTMAIN_DISCOUNT, ProductmainPeer::PRODUCTMAIN_EACHPIECES, ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT, ProductmainPeer::PRODUCTMAIN_BASEPROPERTY, ProductmainPeer::PRODUCTMAIN_TYPE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTMAIN', 'IDCOMPANY', 'IDPRODUCTCATEGORY', 'PRODUCTMAIN_NAME', 'PRODUCTMAIN_UNIT', 'PRODUCTMAIN_DISCOUNT', 'PRODUCTMAIN_EACHPIECES', 'PRODUCTMAIN_MAXDISCOUNT', 'PRODUCTMAIN_BASEPROPERTY', 'PRODUCTMAIN_TYPE', ),
        BasePeer::TYPE_FIELDNAME => array ('idproductmain', 'idcompany', 'idproductcategory', 'productmain_name', 'productmain_unit', 'productmain_discount', 'productmain_eachpieces', 'productmain_maxdiscount', 'productmain_baseproperty', 'productmain_type', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ProductmainPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idproductmain' => 0, 'Idcompany' => 1, 'Idproductcategory' => 2, 'ProductmainName' => 3, 'ProductmainUnit' => 4, 'ProductmainDiscount' => 5, 'ProductmainEachpieces' => 6, 'ProductmainMaxdiscount' => 7, 'ProductmainBaseproperty' => 8, 'ProductmainType' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idproductmain' => 0, 'idcompany' => 1, 'idproductcategory' => 2, 'productmainName' => 3, 'productmainUnit' => 4, 'productmainDiscount' => 5, 'productmainEachpieces' => 6, 'productmainMaxdiscount' => 7, 'productmainBaseproperty' => 8, 'productmainType' => 9, ),
        BasePeer::TYPE_COLNAME => array (ProductmainPeer::IDPRODUCTMAIN => 0, ProductmainPeer::IDCOMPANY => 1, ProductmainPeer::IDPRODUCTCATEGORY => 2, ProductmainPeer::PRODUCTMAIN_NAME => 3, ProductmainPeer::PRODUCTMAIN_UNIT => 4, ProductmainPeer::PRODUCTMAIN_DISCOUNT => 5, ProductmainPeer::PRODUCTMAIN_EACHPIECES => 6, ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT => 7, ProductmainPeer::PRODUCTMAIN_BASEPROPERTY => 8, ProductmainPeer::PRODUCTMAIN_TYPE => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDPRODUCTMAIN' => 0, 'IDCOMPANY' => 1, 'IDPRODUCTCATEGORY' => 2, 'PRODUCTMAIN_NAME' => 3, 'PRODUCTMAIN_UNIT' => 4, 'PRODUCTMAIN_DISCOUNT' => 5, 'PRODUCTMAIN_EACHPIECES' => 6, 'PRODUCTMAIN_MAXDISCOUNT' => 7, 'PRODUCTMAIN_BASEPROPERTY' => 8, 'PRODUCTMAIN_TYPE' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('idproductmain' => 0, 'idcompany' => 1, 'idproductcategory' => 2, 'productmain_name' => 3, 'productmain_unit' => 4, 'productmain_discount' => 5, 'productmain_eachpieces' => 6, 'productmain_maxdiscount' => 7, 'productmain_baseproperty' => 8, 'productmain_type' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ProductmainPeer::PRODUCTMAIN_UNIT => array(
            ProductmainPeer::PRODUCTMAIN_UNIT_KILO,
            ProductmainPeer::PRODUCTMAIN_UNIT_METRO_CUADRADO,
            ProductmainPeer::PRODUCTMAIN_UNIT_CABEZA,
            ProductmainPeer::PRODUCTMAIN_UNIT_KILOWATT,
            ProductmainPeer::PRODUCTMAIN_UNIT_KILOWATT_HORA,
            ProductmainPeer::PRODUCTMAIN_UNIT_GRAMO_NETO,
            ProductmainPeer::PRODUCTMAIN_UNIT_DOCENAS,
            ProductmainPeer::PRODUCTMAIN_UNIT_GRAMO,
            ProductmainPeer::PRODUCTMAIN_UNIT_METRO_CúBICO,
            ProductmainPeer::PRODUCTMAIN_UNIT_LITRO,
            ProductmainPeer::PRODUCTMAIN_UNIT_MILLAR,
            ProductmainPeer::PRODUCTMAIN_UNIT_TONELADA,
            ProductmainPeer::PRODUCTMAIN_UNIT_DECENAS,
            ProductmainPeer::PRODUCTMAIN_UNIT_CAJA,
            ProductmainPeer::PRODUCTMAIN_UNIT_METRO_LINEAL,
            ProductmainPeer::PRODUCTMAIN_UNIT_PIEZA,
            ProductmainPeer::PRODUCTMAIN_UNIT_PAR,
            ProductmainPeer::PRODUCTMAIN_UNIT_JUEGO,
            ProductmainPeer::PRODUCTMAIN_UNIT_BARRIL,
            ProductmainPeer::PRODUCTMAIN_UNIT_CIENTOS,
            ProductmainPeer::PRODUCTMAIN_UNIT_BOTELLA,
        ),
        ProductmainPeer::PRODUCTMAIN_TYPE => array(
            ProductmainPeer::PRODUCTMAIN_TYPE_COMPLEMENT,
            ProductmainPeer::PRODUCTMAIN_TYPE_PRODUCT,
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
        $toNames = ProductmainPeer::getFieldNames($toType);
        $key = isset(ProductmainPeer::$fieldKeys[$fromType][$name]) ? ProductmainPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ProductmainPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ProductmainPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ProductmainPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ProductmainPeer::$enumValueSets;
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
        $valueSets = ProductmainPeer::getValueSets();

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
        $values = ProductmainPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ProductmainPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ProductmainPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ProductmainPeer::IDPRODUCTMAIN);
            $criteria->addSelectColumn(ProductmainPeer::IDCOMPANY);
            $criteria->addSelectColumn(ProductmainPeer::IDPRODUCTCATEGORY);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_NAME);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_UNIT);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_DISCOUNT);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_EACHPIECES);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_BASEPROPERTY);
            $criteria->addSelectColumn(ProductmainPeer::PRODUCTMAIN_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.idproductmain');
            $criteria->addSelectColumn($alias . '.idcompany');
            $criteria->addSelectColumn($alias . '.idproductcategory');
            $criteria->addSelectColumn($alias . '.productmain_name');
            $criteria->addSelectColumn($alias . '.productmain_unit');
            $criteria->addSelectColumn($alias . '.productmain_discount');
            $criteria->addSelectColumn($alias . '.productmain_eachpieces');
            $criteria->addSelectColumn($alias . '.productmain_maxdiscount');
            $criteria->addSelectColumn($alias . '.productmain_baseproperty');
            $criteria->addSelectColumn($alias . '.productmain_type');
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
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Productmain
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ProductmainPeer::doSelect($critcopy, $con);
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
        return ProductmainPeer::populateObjects(ProductmainPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ProductmainPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

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
     * @param Productmain $obj A Productmain object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdproductmain();
            } // if key === null
            ProductmainPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Productmain object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Productmain) {
                $key = (string) $value->getIdproductmain();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Productmain object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ProductmainPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Productmain Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ProductmainPeer::$instances[$key])) {
                return ProductmainPeer::$instances[$key];
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
        foreach (ProductmainPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ProductmainPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to productmain
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ProductPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ProductPeer::clearInstancePool();
        // Invalidate objects in ProductmainphotoPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ProductmainphotoPeer::clearInstancePool();
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
        $cls = ProductmainPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ProductmainPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductmainPeer::addInstanceToPool($obj, $key);
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
     * @return array (Productmain object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ProductmainPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ProductmainPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ProductmainPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductmainPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ProductmainPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productcategory table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinProductcategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);

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
     * Selects a collection of Productmain objects pre-filled with their Company objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productmain objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductmainPeer::DATABASE_NAME);
        }

        ProductmainPeer::addSelectColumns($criteria);
        $startcol = ProductmainPeer::NUM_HYDRATE_COLUMNS;
        CompanyPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductmainPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductmainPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductmainPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Productmain) to $obj2 (Company)
                $obj2->addProductmain($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productmain objects pre-filled with their Productcategory objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productmain objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinProductcategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductmainPeer::DATABASE_NAME);
        }

        ProductmainPeer::addSelectColumns($criteria);
        $startcol = ProductmainPeer::NUM_HYDRATE_COLUMNS;
        ProductcategoryPeer::addSelectColumns($criteria);

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductmainPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = ProductmainPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductmainPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ProductcategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ProductcategoryPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ProductcategoryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ProductcategoryPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Productmain) to $obj2 (Productcategory)
                $obj2->addProductmain($obj1);

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
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);

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
     * Selects a collection of Productmain objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productmain objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductmainPeer::DATABASE_NAME);
        }

        ProductmainPeer::addSelectColumns($criteria);
        $startcol2 = ProductmainPeer::NUM_HYDRATE_COLUMNS;

        CompanyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CompanyPeer::NUM_HYDRATE_COLUMNS;

        ProductcategoryPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ProductcategoryPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductmainPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductmainPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductmainPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Productmain) to the collection in $obj2 (Company)
                $obj2->addProductmain($obj1);
            } // if joined row not null

            // Add objects for joined Productcategory rows

            $key3 = ProductcategoryPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ProductcategoryPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ProductcategoryPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ProductcategoryPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Productmain) to the collection in $obj3 (Productcategory)
                $obj3->addProductmain($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
    public static function doCountJoinAllExceptCompany(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Productcategory table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptProductcategory(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ProductmainPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);

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
     * Selects a collection of Productmain objects pre-filled with all related objects except Company.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productmain objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptCompany(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductmainPeer::DATABASE_NAME);
        }

        ProductmainPeer::addSelectColumns($criteria);
        $startcol2 = ProductmainPeer::NUM_HYDRATE_COLUMNS;

        ProductcategoryPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ProductcategoryPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductmainPeer::IDPRODUCTCATEGORY, ProductcategoryPeer::IDPRODUCTCATEGORY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductmainPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductmainPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductmainPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Productcategory rows

                $key2 = ProductcategoryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ProductcategoryPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = ProductcategoryPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ProductcategoryPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Productmain) to the collection in $obj2 (Productcategory)
                $obj2->addProductmain($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Productmain objects pre-filled with all related objects except Productcategory.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Productmain objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptProductcategory(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(ProductmainPeer::DATABASE_NAME);
        }

        ProductmainPeer::addSelectColumns($criteria);
        $startcol2 = ProductmainPeer::NUM_HYDRATE_COLUMNS;

        CompanyPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CompanyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ProductmainPeer::IDCOMPANY, CompanyPeer::IDCOMPANY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ProductmainPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ProductmainPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = ProductmainPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ProductmainPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Productmain) to the collection in $obj2 (Company)
                $obj2->addProductmain($obj1);

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
        return Propel::getDatabaseMap(ProductmainPeer::DATABASE_NAME)->getTable(ProductmainPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseProductmainPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseProductmainPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ProductmainTableMap());
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
        return ProductmainPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Productmain or Criteria object.
     *
     * @param      mixed $values Criteria or Productmain object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Productmain object
        }

        if ($criteria->containsKey(ProductmainPeer::IDPRODUCTMAIN) && $criteria->keyContainsValue(ProductmainPeer::IDPRODUCTMAIN) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductmainPeer::IDPRODUCTMAIN.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Productmain or Criteria object.
     *
     * @param      mixed $values Criteria or Productmain object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ProductmainPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ProductmainPeer::IDPRODUCTMAIN);
            $value = $criteria->remove(ProductmainPeer::IDPRODUCTMAIN);
            if ($value) {
                $selectCriteria->add(ProductmainPeer::IDPRODUCTMAIN, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ProductmainPeer::TABLE_NAME);
            }

        } else { // $values is Productmain object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the productmain table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ProductmainPeer::doOnDeleteCascade(new Criteria(ProductmainPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ProductmainPeer::TABLE_NAME, $con, ProductmainPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductmainPeer::clearInstancePool();
            ProductmainPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Productmain or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Productmain object or primary key or array of primary keys
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
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Productmain) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductmainPeer::DATABASE_NAME);
            $criteria->add(ProductmainPeer::IDPRODUCTMAIN, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ProductmainPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ProductmainPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ProductmainPeer::clearInstancePool();
            } elseif ($values instanceof Productmain) { // it's a model object
                ProductmainPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ProductmainPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ProductmainPeer::clearRelatedInstancePool();
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
        $objects = ProductmainPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Product objects
            $criteria = new Criteria(ProductPeer::DATABASE_NAME);

            $criteria->add(ProductPeer::IDPRODUCTMAIN, $obj->getIdproductmain());
            $affectedRows += ProductPeer::doDelete($criteria, $con);

            // delete related Productmainphoto objects
            $criteria = new Criteria(ProductmainphotoPeer::DATABASE_NAME);

            $criteria->add(ProductmainphotoPeer::IDPRODUCTMAIN, $obj->getIdproductmain());
            $affectedRows += ProductmainphotoPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Productmain object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Productmain $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ProductmainPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ProductmainPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ProductmainPeer::DATABASE_NAME, ProductmainPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Productmain
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ProductmainPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ProductmainPeer::DATABASE_NAME);
        $criteria->add(ProductmainPeer::IDPRODUCTMAIN, $pk);

        $v = ProductmainPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Productmain[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ProductmainPeer::DATABASE_NAME);
            $criteria->add(ProductmainPeer::IDPRODUCTMAIN, $pks, Criteria::IN);
            $objs = ProductmainPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseProductmainPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProductmainPeer::buildTableMap();

