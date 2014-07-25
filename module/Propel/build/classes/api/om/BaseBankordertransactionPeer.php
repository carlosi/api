<?php


/**
 * Base static class for performing query and update operations on the 'bankordertransaction' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseBankordertransactionPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'bankordertransaction';

    /** the related Propel class for this table */
    const OM_CLASS = 'Bankordertransaction';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BankordertransactionTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the idbankordertransaction field */
    const IDBANKORDERTRANSACTION = 'bankordertransaction.idbankordertransaction';

    /** the column name for the idbankaccount field */
    const IDBANKACCOUNT = 'bankordertransaction.idbankaccount';

    /** the column name for the idorder field */
    const IDORDER = 'bankordertransaction.idorder';

    /** the column name for the bankordertransaction_amount field */
    const BANKORDERTRANSACTION_AMOUNT = 'bankordertransaction.bankordertransaction_amount';

    /** the column name for the bankordertransaction_date field */
    const BANKORDERTRANSACTION_DATE = 'bankordertransaction.bankordertransaction_date';

    /** the column name for the bankordertransaction_paymentmethod field */
    const BANKORDERTRANSACTION_PAYMENTMETHOD = 'bankordertransaction.bankordertransaction_paymentmethod';

    /** the column name for the bankordertransaction_last4of_account field */
    const BANKORDERTRANSACTION_LAST4OF_ACCOUNT = 'bankordertransaction.bankordertransaction_last4of_account';

    /** The enumerated values for the bankordertransaction_paymentmethod field */
    const BANKORDERTRANSACTION_PAYMENTMETHOD_NO_IDENTIFICADO = 'No identificado';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_TRANSFERENCIA_ELECTRóNICA = 'transferencia electrónica';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_EFECTIVO = 'efectivo';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_TARJETA_DE_CRéDITO = 'Tarjeta de crédito';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_TARJETA_DE_DéBITO = 'Tarjeta de débito';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_CHEQUE_NOMITATIVO = 'Cheque nomitativo';
    const BANKORDERTRANSACTION_PAYMENTMETHOD_MONEDERO_ELECTRóNICO = 'monedero electrónico';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Bankordertransaction objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Bankordertransaction[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BankordertransactionPeer::$fieldNames[BankordertransactionPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idbankordertransaction', 'Idbankaccount', 'Idorder', 'BankordertransactionAmount', 'BankordertransactionDate', 'BankordertransactionPaymentmethod', 'BankordertransactionLast4ofAccount', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbankordertransaction', 'idbankaccount', 'idorder', 'bankordertransactionAmount', 'bankordertransactionDate', 'bankordertransactionPaymentmethod', 'bankordertransactionLast4ofAccount', ),
        BasePeer::TYPE_COLNAME => array (BankordertransactionPeer::IDBANKORDERTRANSACTION, BankordertransactionPeer::IDBANKACCOUNT, BankordertransactionPeer::IDORDER, BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT, BankordertransactionPeer::BANKORDERTRANSACTION_DATE, BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD, BankordertransactionPeer::BANKORDERTRANSACTION_LAST4OF_ACCOUNT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBANKORDERTRANSACTION', 'IDBANKACCOUNT', 'IDORDER', 'BANKORDERTRANSACTION_AMOUNT', 'BANKORDERTRANSACTION_DATE', 'BANKORDERTRANSACTION_PAYMENTMETHOD', 'BANKORDERTRANSACTION_LAST4OF_ACCOUNT', ),
        BasePeer::TYPE_FIELDNAME => array ('idbankordertransaction', 'idbankaccount', 'idorder', 'bankordertransaction_amount', 'bankordertransaction_date', 'bankordertransaction_paymentmethod', 'bankordertransaction_last4of_account', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BankordertransactionPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idbankordertransaction' => 0, 'Idbankaccount' => 1, 'Idorder' => 2, 'BankordertransactionAmount' => 3, 'BankordertransactionDate' => 4, 'BankordertransactionPaymentmethod' => 5, 'BankordertransactionLast4ofAccount' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idbankordertransaction' => 0, 'idbankaccount' => 1, 'idorder' => 2, 'bankordertransactionAmount' => 3, 'bankordertransactionDate' => 4, 'bankordertransactionPaymentmethod' => 5, 'bankordertransactionLast4ofAccount' => 6, ),
        BasePeer::TYPE_COLNAME => array (BankordertransactionPeer::IDBANKORDERTRANSACTION => 0, BankordertransactionPeer::IDBANKACCOUNT => 1, BankordertransactionPeer::IDORDER => 2, BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT => 3, BankordertransactionPeer::BANKORDERTRANSACTION_DATE => 4, BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD => 5, BankordertransactionPeer::BANKORDERTRANSACTION_LAST4OF_ACCOUNT => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDBANKORDERTRANSACTION' => 0, 'IDBANKACCOUNT' => 1, 'IDORDER' => 2, 'BANKORDERTRANSACTION_AMOUNT' => 3, 'BANKORDERTRANSACTION_DATE' => 4, 'BANKORDERTRANSACTION_PAYMENTMETHOD' => 5, 'BANKORDERTRANSACTION_LAST4OF_ACCOUNT' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('idbankordertransaction' => 0, 'idbankaccount' => 1, 'idorder' => 2, 'bankordertransaction_amount' => 3, 'bankordertransaction_date' => 4, 'bankordertransaction_paymentmethod' => 5, 'bankordertransaction_last4of_account' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD => array(
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_NO_IDENTIFICADO,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_TRANSFERENCIA_ELECTRóNICA,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_EFECTIVO,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_TARJETA_DE_CRéDITO,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_TARJETA_DE_DéBITO,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_CHEQUE_NOMITATIVO,
            BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD_MONEDERO_ELECTRóNICO,
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
        $toNames = BankordertransactionPeer::getFieldNames($toType);
        $key = isset(BankordertransactionPeer::$fieldKeys[$fromType][$name]) ? BankordertransactionPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BankordertransactionPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BankordertransactionPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BankordertransactionPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return BankordertransactionPeer::$enumValueSets;
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
        $valueSets = BankordertransactionPeer::getValueSets();

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
        $values = BankordertransactionPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. BankordertransactionPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BankordertransactionPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BankordertransactionPeer::IDBANKORDERTRANSACTION);
            $criteria->addSelectColumn(BankordertransactionPeer::IDBANKACCOUNT);
            $criteria->addSelectColumn(BankordertransactionPeer::IDORDER);
            $criteria->addSelectColumn(BankordertransactionPeer::BANKORDERTRANSACTION_AMOUNT);
            $criteria->addSelectColumn(BankordertransactionPeer::BANKORDERTRANSACTION_DATE);
            $criteria->addSelectColumn(BankordertransactionPeer::BANKORDERTRANSACTION_PAYMENTMETHOD);
            $criteria->addSelectColumn(BankordertransactionPeer::BANKORDERTRANSACTION_LAST4OF_ACCOUNT);
        } else {
            $criteria->addSelectColumn($alias . '.idbankordertransaction');
            $criteria->addSelectColumn($alias . '.idbankaccount');
            $criteria->addSelectColumn($alias . '.idorder');
            $criteria->addSelectColumn($alias . '.bankordertransaction_amount');
            $criteria->addSelectColumn($alias . '.bankordertransaction_date');
            $criteria->addSelectColumn($alias . '.bankordertransaction_paymentmethod');
            $criteria->addSelectColumn($alias . '.bankordertransaction_last4of_account');
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
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Bankordertransaction
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BankordertransactionPeer::doSelect($critcopy, $con);
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
        return BankordertransactionPeer::populateObjects(BankordertransactionPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

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
     * @param Bankordertransaction $obj A Bankordertransaction object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdbankordertransaction();
            } // if key === null
            BankordertransactionPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Bankordertransaction object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Bankordertransaction) {
                $key = (string) $value->getIdbankordertransaction();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Bankordertransaction object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BankordertransactionPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Bankordertransaction Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BankordertransactionPeer::$instances[$key])) {
                return BankordertransactionPeer::$instances[$key];
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
        foreach (BankordertransactionPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        BankordertransactionPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to bankordertransaction
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
        $cls = BankordertransactionPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BankordertransactionPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BankordertransactionPeer::addInstanceToPool($obj, $key);
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
     * @return array (Bankordertransaction object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BankordertransactionPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BankordertransactionPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BankordertransactionPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BankordertransactionPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Bankaccount table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBankaccount(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);

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
     * Selects a collection of Bankordertransaction objects pre-filled with their Order objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bankordertransaction objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinOrder(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);
        }

        BankordertransactionPeer::addSelectColumns($criteria);
        $startcol = BankordertransactionPeer::NUM_HYDRATE_COLUMNS;
        OrderPeer::addSelectColumns($criteria);

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BankordertransactionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BankordertransactionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BankordertransactionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bankordertransaction) to $obj2 (Order)
                $obj2->addBankordertransaction($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bankordertransaction objects pre-filled with their Bankaccount objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bankordertransaction objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBankaccount(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);
        }

        BankordertransactionPeer::addSelectColumns($criteria);
        $startcol = BankordertransactionPeer::NUM_HYDRATE_COLUMNS;
        BankaccountPeer::addSelectColumns($criteria);

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BankordertransactionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BankordertransactionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BankordertransactionPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BankaccountPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BankaccountPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BankaccountPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BankaccountPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Bankordertransaction) to $obj2 (Bankaccount)
                $obj2->addBankordertransaction($obj1);

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
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);

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
     * Selects a collection of Bankordertransaction objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bankordertransaction objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);
        }

        BankordertransactionPeer::addSelectColumns($criteria);
        $startcol2 = BankordertransactionPeer::NUM_HYDRATE_COLUMNS;

        OrderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderPeer::NUM_HYDRATE_COLUMNS;

        BankaccountPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BankaccountPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BankordertransactionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BankordertransactionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BankordertransactionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bankordertransaction) to the collection in $obj2 (Order)
                $obj2->addBankordertransaction($obj1);
            } // if joined row not null

            // Add objects for joined Bankaccount rows

            $key3 = BankaccountPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BankaccountPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BankaccountPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BankaccountPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Bankordertransaction) to the collection in $obj3 (Bankaccount)
                $obj3->addBankordertransaction($obj1);
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
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Bankaccount table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBankaccount(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BankordertransactionPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);

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
     * Selects a collection of Bankordertransaction objects pre-filled with all related objects except Order.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bankordertransaction objects.
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
            $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);
        }

        BankordertransactionPeer::addSelectColumns($criteria);
        $startcol2 = BankordertransactionPeer::NUM_HYDRATE_COLUMNS;

        BankaccountPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BankaccountPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BankordertransactionPeer::IDBANKACCOUNT, BankaccountPeer::IDBANKACCOUNT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BankordertransactionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BankordertransactionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BankordertransactionPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Bankaccount rows

                $key2 = BankaccountPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BankaccountPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = BankaccountPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BankaccountPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Bankordertransaction) to the collection in $obj2 (Bankaccount)
                $obj2->addBankordertransaction($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Bankordertransaction objects pre-filled with all related objects except Bankaccount.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Bankordertransaction objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBankaccount(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);
        }

        BankordertransactionPeer::addSelectColumns($criteria);
        $startcol2 = BankordertransactionPeer::NUM_HYDRATE_COLUMNS;

        OrderPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + OrderPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BankordertransactionPeer::IDORDER, OrderPeer::IDORDER, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BankordertransactionPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BankordertransactionPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BankordertransactionPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BankordertransactionPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Bankordertransaction) to the collection in $obj2 (Order)
                $obj2->addBankordertransaction($obj1);

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
        return Propel::getDatabaseMap(BankordertransactionPeer::DATABASE_NAME)->getTable(BankordertransactionPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBankordertransactionPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBankordertransactionPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \BankordertransactionTableMap());
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
        return BankordertransactionPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Bankordertransaction or Criteria object.
     *
     * @param      mixed $values Criteria or Bankordertransaction object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Bankordertransaction object
        }

        if ($criteria->containsKey(BankordertransactionPeer::IDBANKORDERTRANSACTION) && $criteria->keyContainsValue(BankordertransactionPeer::IDBANKORDERTRANSACTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BankordertransactionPeer::IDBANKORDERTRANSACTION.')');
        }


        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Bankordertransaction or Criteria object.
     *
     * @param      mixed $values Criteria or Bankordertransaction object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BankordertransactionPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BankordertransactionPeer::IDBANKORDERTRANSACTION);
            $value = $criteria->remove(BankordertransactionPeer::IDBANKORDERTRANSACTION);
            if ($value) {
                $selectCriteria->add(BankordertransactionPeer::IDBANKORDERTRANSACTION, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BankordertransactionPeer::TABLE_NAME);
            }

        } else { // $values is Bankordertransaction object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the bankordertransaction table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BankordertransactionPeer::TABLE_NAME, $con, BankordertransactionPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BankordertransactionPeer::clearInstancePool();
            BankordertransactionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Bankordertransaction or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Bankordertransaction object or primary key or array of primary keys
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
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BankordertransactionPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Bankordertransaction) { // it's a model object
            // invalidate the cache for this single object
            BankordertransactionPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BankordertransactionPeer::DATABASE_NAME);
            $criteria->add(BankordertransactionPeer::IDBANKORDERTRANSACTION, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BankordertransactionPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BankordertransactionPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            BankordertransactionPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Bankordertransaction object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Bankordertransaction $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BankordertransactionPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BankordertransactionPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BankordertransactionPeer::DATABASE_NAME, BankordertransactionPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Bankordertransaction
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BankordertransactionPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BankordertransactionPeer::DATABASE_NAME);
        $criteria->add(BankordertransactionPeer::IDBANKORDERTRANSACTION, $pk);

        $v = BankordertransactionPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Bankordertransaction[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BankordertransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BankordertransactionPeer::DATABASE_NAME);
            $criteria->add(BankordertransactionPeer::IDBANKORDERTRANSACTION, $pks, Criteria::IN);
            $objs = BankordertransactionPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBankordertransactionPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBankordertransactionPeer::buildTableMap();

