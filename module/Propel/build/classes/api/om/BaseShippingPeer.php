<?php


/**
 * Base static class for performing query and update operations on the 'shipping' table.
 *
 *
 *
 * @package propel.generator.api.om
 */
abstract class BaseShippingPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'api';

    /** the table name for this class */
    const TABLE_NAME = 'shipping';

    /** the related Propel class for this table */
    const OM_CLASS = 'Shipping';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ShippingTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 27;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 27;

    /** the column name for the idshipping field */
    const IDSHIPPING = 'shipping.idshipping';

    /** the column name for the shipping_tracking field */
    const SHIPPING_TRACKING = 'shipping.shipping_tracking';

    /** the column name for the transport_company field */
    const TRANSPORT_COMPANY = 'shipping.transport_company';

    /** the column name for the shipping_date field */
    const SHIPPING_DATE = 'shipping.shipping_date';

    /** the column name for the shipping_datecompromise field */
    const SHIPPING_DATECOMPROMISE = 'shipping.shipping_datecompromise';

    /** the column name for the shipping_daterealdelivery field */
    const SHIPPING_DATEREALDELIVERY = 'shipping.shipping_daterealdelivery';

    /** the column name for the shipping_status field */
    const SHIPPING_STATUS = 'shipping.shipping_status';

    /** the column name for the sender_iso_codecountry field */
    const SENDER_ISO_CODECOUNTRY = 'shipping.sender_iso_codecountry';

    /** the column name for the sender_iso_codephone field */
    const SENDER_ISO_CODEPHONE = 'shipping.sender_iso_codephone';

    /** the column name for the sender_name field */
    const SENDER_NAME = 'shipping.sender_name';

    /** the column name for the sender_addressee_cellular field */
    const SENDER_ADDRESSEE_CELLULAR = 'shipping.sender_addressee_cellular';

    /** the column name for the sender_addressee_phone field */
    const SENDER_ADDRESSEE_PHONE = 'shipping.sender_addressee_phone';

    /** the column name for the sender_address field */
    const SENDER_ADDRESS = 'shipping.sender_address';

    /** the column name for the sender_address2 field */
    const SENDER_ADDRESS2 = 'shipping.sender_address2';

    /** the column name for the sender_city field */
    const SENDER_CITY = 'shipping.sender_city';

    /** the column name for the sender_state field */
    const SENDER_STATE = 'shipping.sender_state';

    /** the column name for the sender_zipcode field */
    const SENDER_ZIPCODE = 'shipping.sender_zipcode';

    /** the column name for the addressee_iso_codecountry field */
    const ADDRESSEE_ISO_CODECOUNTRY = 'shipping.addressee_iso_codecountry';

    /** the column name for the addressee_iso_codephone field */
    const ADDRESSEE_ISO_CODEPHONE = 'shipping.addressee_iso_codephone';

    /** the column name for the addressee_name field */
    const ADDRESSEE_NAME = 'shipping.addressee_name';

    /** the column name for the addressee_addressee_cellular field */
    const ADDRESSEE_ADDRESSEE_CELLULAR = 'shipping.addressee_addressee_cellular';

    /** the column name for the addressee_addressee_phone field */
    const ADDRESSEE_ADDRESSEE_PHONE = 'shipping.addressee_addressee_phone';

    /** the column name for the addressee_address field */
    const ADDRESSEE_ADDRESS = 'shipping.addressee_address';

    /** the column name for the addressee_address2 field */
    const ADDRESSEE_ADDRESS2 = 'shipping.addressee_address2';

    /** the column name for the addressee_city field */
    const ADDRESSEE_CITY = 'shipping.addressee_city';

    /** the column name for the addressee_state field */
    const ADDRESSEE_STATE = 'shipping.addressee_state';

    /** the column name for the addressee_zipcode field */
    const ADDRESSEE_ZIPCODE = 'shipping.addressee_zipcode';

    /** The enumerated values for the transport_company field */
    const TRANSPORT_COMPANY_FEDEX = 'FEDEX';
    const TRANSPORT_COMPANY_ESTAFETA = 'ESTAFETA';
    const TRANSPORT_COMPANY_DHL = 'DHL';
    const TRANSPORT_COMPANY_UPS = 'UPS';
    const TRANSPORT_COMPANY_PRIVATE = 'PRIVATE';
    const TRANSPORT_COMPANY_OTHER = 'OTHER';
    const TRANSPORT_COMPANY_EMS = 'EMS';
    const TRANSPORT_COMPANY_CORREOS_DE_MÉXICO = 'CORREOS DE MÉXICO';
    const TRANSPORT_COMPANY_SEPOMEX = 'SEPOMEX';

    /** The enumerated values for the shipping_status field */
    const SHIPPING_STATUS_PENDING = 'pending';
    const SHIPPING_STATUS_TRANSIT = 'transit';
    const SHIPPING_STATUS_COMPLETE = 'complete';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Shipping objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Shipping[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. ShippingPeer::$fieldNames[ShippingPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idshipping', 'ShippingTracking', 'TransportCompany', 'ShippingDate', 'ShippingDatecompromise', 'ShippingDaterealdelivery', 'ShippingStatus', 'SenderIsoCodecountry', 'SenderIsoCodephone', 'SenderName', 'SenderAddresseeCellular', 'SenderAddresseePhone', 'SenderAddress', 'SenderAddress2', 'SenderCity', 'SenderState', 'SenderZipcode', 'AddresseeIsoCodecountry', 'AddresseeIsoCodephone', 'AddresseeName', 'AddresseeAddresseeCellular', 'AddresseeAddresseePhone', 'AddresseeAddress', 'AddresseeAddress2', 'AddresseeCity', 'AddresseeState', 'AddresseeZipcode', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idshipping', 'shippingTracking', 'transportCompany', 'shippingDate', 'shippingDatecompromise', 'shippingDaterealdelivery', 'shippingStatus', 'senderIsoCodecountry', 'senderIsoCodephone', 'senderName', 'senderAddresseeCellular', 'senderAddresseePhone', 'senderAddress', 'senderAddress2', 'senderCity', 'senderState', 'senderZipcode', 'addresseeIsoCodecountry', 'addresseeIsoCodephone', 'addresseeName', 'addresseeAddresseeCellular', 'addresseeAddresseePhone', 'addresseeAddress', 'addresseeAddress2', 'addresseeCity', 'addresseeState', 'addresseeZipcode', ),
        BasePeer::TYPE_COLNAME => array (ShippingPeer::IDSHIPPING, ShippingPeer::SHIPPING_TRACKING, ShippingPeer::TRANSPORT_COMPANY, ShippingPeer::SHIPPING_DATE, ShippingPeer::SHIPPING_DATECOMPROMISE, ShippingPeer::SHIPPING_DATEREALDELIVERY, ShippingPeer::SHIPPING_STATUS, ShippingPeer::SENDER_ISO_CODECOUNTRY, ShippingPeer::SENDER_ISO_CODEPHONE, ShippingPeer::SENDER_NAME, ShippingPeer::SENDER_ADDRESSEE_CELLULAR, ShippingPeer::SENDER_ADDRESSEE_PHONE, ShippingPeer::SENDER_ADDRESS, ShippingPeer::SENDER_ADDRESS2, ShippingPeer::SENDER_CITY, ShippingPeer::SENDER_STATE, ShippingPeer::SENDER_ZIPCODE, ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY, ShippingPeer::ADDRESSEE_ISO_CODEPHONE, ShippingPeer::ADDRESSEE_NAME, ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR, ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE, ShippingPeer::ADDRESSEE_ADDRESS, ShippingPeer::ADDRESSEE_ADDRESS2, ShippingPeer::ADDRESSEE_CITY, ShippingPeer::ADDRESSEE_STATE, ShippingPeer::ADDRESSEE_ZIPCODE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDSHIPPING', 'SHIPPING_TRACKING', 'TRANSPORT_COMPANY', 'SHIPPING_DATE', 'SHIPPING_DATECOMPROMISE', 'SHIPPING_DATEREALDELIVERY', 'SHIPPING_STATUS', 'SENDER_ISO_CODECOUNTRY', 'SENDER_ISO_CODEPHONE', 'SENDER_NAME', 'SENDER_ADDRESSEE_CELLULAR', 'SENDER_ADDRESSEE_PHONE', 'SENDER_ADDRESS', 'SENDER_ADDRESS2', 'SENDER_CITY', 'SENDER_STATE', 'SENDER_ZIPCODE', 'ADDRESSEE_ISO_CODECOUNTRY', 'ADDRESSEE_ISO_CODEPHONE', 'ADDRESSEE_NAME', 'ADDRESSEE_ADDRESSEE_CELLULAR', 'ADDRESSEE_ADDRESSEE_PHONE', 'ADDRESSEE_ADDRESS', 'ADDRESSEE_ADDRESS2', 'ADDRESSEE_CITY', 'ADDRESSEE_STATE', 'ADDRESSEE_ZIPCODE', ),
        BasePeer::TYPE_FIELDNAME => array ('idshipping', 'shipping_tracking', 'transport_company', 'shipping_date', 'shipping_datecompromise', 'shipping_daterealdelivery', 'shipping_status', 'sender_iso_codecountry', 'sender_iso_codephone', 'sender_name', 'sender_addressee_cellular', 'sender_addressee_phone', 'sender_address', 'sender_address2', 'sender_city', 'sender_state', 'sender_zipcode', 'addressee_iso_codecountry', 'addressee_iso_codephone', 'addressee_name', 'addressee_addressee_cellular', 'addressee_addressee_phone', 'addressee_address', 'addressee_address2', 'addressee_city', 'addressee_state', 'addressee_zipcode', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. ShippingPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idshipping' => 0, 'ShippingTracking' => 1, 'TransportCompany' => 2, 'ShippingDate' => 3, 'ShippingDatecompromise' => 4, 'ShippingDaterealdelivery' => 5, 'ShippingStatus' => 6, 'SenderIsoCodecountry' => 7, 'SenderIsoCodephone' => 8, 'SenderName' => 9, 'SenderAddresseeCellular' => 10, 'SenderAddresseePhone' => 11, 'SenderAddress' => 12, 'SenderAddress2' => 13, 'SenderCity' => 14, 'SenderState' => 15, 'SenderZipcode' => 16, 'AddresseeIsoCodecountry' => 17, 'AddresseeIsoCodephone' => 18, 'AddresseeName' => 19, 'AddresseeAddresseeCellular' => 20, 'AddresseeAddresseePhone' => 21, 'AddresseeAddress' => 22, 'AddresseeAddress2' => 23, 'AddresseeCity' => 24, 'AddresseeState' => 25, 'AddresseeZipcode' => 26, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idshipping' => 0, 'shippingTracking' => 1, 'transportCompany' => 2, 'shippingDate' => 3, 'shippingDatecompromise' => 4, 'shippingDaterealdelivery' => 5, 'shippingStatus' => 6, 'senderIsoCodecountry' => 7, 'senderIsoCodephone' => 8, 'senderName' => 9, 'senderAddresseeCellular' => 10, 'senderAddresseePhone' => 11, 'senderAddress' => 12, 'senderAddress2' => 13, 'senderCity' => 14, 'senderState' => 15, 'senderZipcode' => 16, 'addresseeIsoCodecountry' => 17, 'addresseeIsoCodephone' => 18, 'addresseeName' => 19, 'addresseeAddresseeCellular' => 20, 'addresseeAddresseePhone' => 21, 'addresseeAddress' => 22, 'addresseeAddress2' => 23, 'addresseeCity' => 24, 'addresseeState' => 25, 'addresseeZipcode' => 26, ),
        BasePeer::TYPE_COLNAME => array (ShippingPeer::IDSHIPPING => 0, ShippingPeer::SHIPPING_TRACKING => 1, ShippingPeer::TRANSPORT_COMPANY => 2, ShippingPeer::SHIPPING_DATE => 3, ShippingPeer::SHIPPING_DATECOMPROMISE => 4, ShippingPeer::SHIPPING_DATEREALDELIVERY => 5, ShippingPeer::SHIPPING_STATUS => 6, ShippingPeer::SENDER_ISO_CODECOUNTRY => 7, ShippingPeer::SENDER_ISO_CODEPHONE => 8, ShippingPeer::SENDER_NAME => 9, ShippingPeer::SENDER_ADDRESSEE_CELLULAR => 10, ShippingPeer::SENDER_ADDRESSEE_PHONE => 11, ShippingPeer::SENDER_ADDRESS => 12, ShippingPeer::SENDER_ADDRESS2 => 13, ShippingPeer::SENDER_CITY => 14, ShippingPeer::SENDER_STATE => 15, ShippingPeer::SENDER_ZIPCODE => 16, ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY => 17, ShippingPeer::ADDRESSEE_ISO_CODEPHONE => 18, ShippingPeer::ADDRESSEE_NAME => 19, ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR => 20, ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE => 21, ShippingPeer::ADDRESSEE_ADDRESS => 22, ShippingPeer::ADDRESSEE_ADDRESS2 => 23, ShippingPeer::ADDRESSEE_CITY => 24, ShippingPeer::ADDRESSEE_STATE => 25, ShippingPeer::ADDRESSEE_ZIPCODE => 26, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDSHIPPING' => 0, 'SHIPPING_TRACKING' => 1, 'TRANSPORT_COMPANY' => 2, 'SHIPPING_DATE' => 3, 'SHIPPING_DATECOMPROMISE' => 4, 'SHIPPING_DATEREALDELIVERY' => 5, 'SHIPPING_STATUS' => 6, 'SENDER_ISO_CODECOUNTRY' => 7, 'SENDER_ISO_CODEPHONE' => 8, 'SENDER_NAME' => 9, 'SENDER_ADDRESSEE_CELLULAR' => 10, 'SENDER_ADDRESSEE_PHONE' => 11, 'SENDER_ADDRESS' => 12, 'SENDER_ADDRESS2' => 13, 'SENDER_CITY' => 14, 'SENDER_STATE' => 15, 'SENDER_ZIPCODE' => 16, 'ADDRESSEE_ISO_CODECOUNTRY' => 17, 'ADDRESSEE_ISO_CODEPHONE' => 18, 'ADDRESSEE_NAME' => 19, 'ADDRESSEE_ADDRESSEE_CELLULAR' => 20, 'ADDRESSEE_ADDRESSEE_PHONE' => 21, 'ADDRESSEE_ADDRESS' => 22, 'ADDRESSEE_ADDRESS2' => 23, 'ADDRESSEE_CITY' => 24, 'ADDRESSEE_STATE' => 25, 'ADDRESSEE_ZIPCODE' => 26, ),
        BasePeer::TYPE_FIELDNAME => array ('idshipping' => 0, 'shipping_tracking' => 1, 'transport_company' => 2, 'shipping_date' => 3, 'shipping_datecompromise' => 4, 'shipping_daterealdelivery' => 5, 'shipping_status' => 6, 'sender_iso_codecountry' => 7, 'sender_iso_codephone' => 8, 'sender_name' => 9, 'sender_addressee_cellular' => 10, 'sender_addressee_phone' => 11, 'sender_address' => 12, 'sender_address2' => 13, 'sender_city' => 14, 'sender_state' => 15, 'sender_zipcode' => 16, 'addressee_iso_codecountry' => 17, 'addressee_iso_codephone' => 18, 'addressee_name' => 19, 'addressee_addressee_cellular' => 20, 'addressee_addressee_phone' => 21, 'addressee_address' => 22, 'addressee_address2' => 23, 'addressee_city' => 24, 'addressee_state' => 25, 'addressee_zipcode' => 26, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        ShippingPeer::TRANSPORT_COMPANY => array(
            ShippingPeer::TRANSPORT_COMPANY_FEDEX,
            ShippingPeer::TRANSPORT_COMPANY_ESTAFETA,
            ShippingPeer::TRANSPORT_COMPANY_DHL,
            ShippingPeer::TRANSPORT_COMPANY_UPS,
            ShippingPeer::TRANSPORT_COMPANY_PRIVATE,
            ShippingPeer::TRANSPORT_COMPANY_OTHER,
            ShippingPeer::TRANSPORT_COMPANY_EMS,
            ShippingPeer::TRANSPORT_COMPANY_CORREOS_DE_MÉXICO,
            ShippingPeer::TRANSPORT_COMPANY_SEPOMEX,
        ),
        ShippingPeer::SHIPPING_STATUS => array(
            ShippingPeer::SHIPPING_STATUS_PENDING,
            ShippingPeer::SHIPPING_STATUS_TRANSIT,
            ShippingPeer::SHIPPING_STATUS_COMPLETE,
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
        $toNames = ShippingPeer::getFieldNames($toType);
        $key = isset(ShippingPeer::$fieldKeys[$fromType][$name]) ? ShippingPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(ShippingPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, ShippingPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return ShippingPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return ShippingPeer::$enumValueSets;
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
        $valueSets = ShippingPeer::getValueSets();

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
        $values = ShippingPeer::getValueSet($colname);
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
     * @param      string $column The column name for current table. (i.e. ShippingPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ShippingPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(ShippingPeer::IDSHIPPING);
            $criteria->addSelectColumn(ShippingPeer::SHIPPING_TRACKING);
            $criteria->addSelectColumn(ShippingPeer::TRANSPORT_COMPANY);
            $criteria->addSelectColumn(ShippingPeer::SHIPPING_DATE);
            $criteria->addSelectColumn(ShippingPeer::SHIPPING_DATECOMPROMISE);
            $criteria->addSelectColumn(ShippingPeer::SHIPPING_DATEREALDELIVERY);
            $criteria->addSelectColumn(ShippingPeer::SHIPPING_STATUS);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ISO_CODEPHONE);
            $criteria->addSelectColumn(ShippingPeer::SENDER_NAME);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ADDRESSEE_CELLULAR);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ADDRESSEE_PHONE);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ADDRESS);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ADDRESS2);
            $criteria->addSelectColumn(ShippingPeer::SENDER_CITY);
            $criteria->addSelectColumn(ShippingPeer::SENDER_STATE);
            $criteria->addSelectColumn(ShippingPeer::SENDER_ZIPCODE);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ISO_CODEPHONE);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_NAME);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ADDRESS);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ADDRESS2);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_CITY);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_STATE);
            $criteria->addSelectColumn(ShippingPeer::ADDRESSEE_ZIPCODE);
        } else {
            $criteria->addSelectColumn($alias . '.idshipping');
            $criteria->addSelectColumn($alias . '.shipping_tracking');
            $criteria->addSelectColumn($alias . '.transport_company');
            $criteria->addSelectColumn($alias . '.shipping_date');
            $criteria->addSelectColumn($alias . '.shipping_datecompromise');
            $criteria->addSelectColumn($alias . '.shipping_daterealdelivery');
            $criteria->addSelectColumn($alias . '.shipping_status');
            $criteria->addSelectColumn($alias . '.sender_iso_codecountry');
            $criteria->addSelectColumn($alias . '.sender_iso_codephone');
            $criteria->addSelectColumn($alias . '.sender_name');
            $criteria->addSelectColumn($alias . '.sender_addressee_cellular');
            $criteria->addSelectColumn($alias . '.sender_addressee_phone');
            $criteria->addSelectColumn($alias . '.sender_address');
            $criteria->addSelectColumn($alias . '.sender_address2');
            $criteria->addSelectColumn($alias . '.sender_city');
            $criteria->addSelectColumn($alias . '.sender_state');
            $criteria->addSelectColumn($alias . '.sender_zipcode');
            $criteria->addSelectColumn($alias . '.addressee_iso_codecountry');
            $criteria->addSelectColumn($alias . '.addressee_iso_codephone');
            $criteria->addSelectColumn($alias . '.addressee_name');
            $criteria->addSelectColumn($alias . '.addressee_addressee_cellular');
            $criteria->addSelectColumn($alias . '.addressee_addressee_phone');
            $criteria->addSelectColumn($alias . '.addressee_address');
            $criteria->addSelectColumn($alias . '.addressee_address2');
            $criteria->addSelectColumn($alias . '.addressee_city');
            $criteria->addSelectColumn($alias . '.addressee_state');
            $criteria->addSelectColumn($alias . '.addressee_zipcode');
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
        $criteria->setPrimaryTableName(ShippingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ShippingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(ShippingPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return Shipping
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ShippingPeer::doSelect($critcopy, $con);
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
        return ShippingPeer::populateObjects(ShippingPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ShippingPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(ShippingPeer::DATABASE_NAME);

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
     * @param Shipping $obj A Shipping object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdshipping();
            } // if key === null
            ShippingPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Shipping object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Shipping) {
                $key = (string) $value->getIdshipping();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Shipping object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(ShippingPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Shipping Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(ShippingPeer::$instances[$key])) {
                return ShippingPeer::$instances[$key];
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
        foreach (ShippingPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        ShippingPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to shipping
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in OrdershippingPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        OrdershippingPeer::clearInstancePool();
        // Invalidate objects in ShippingHistoryPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ShippingHistoryPeer::clearInstancePool();
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
        $cls = ShippingPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ShippingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ShippingPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ShippingPeer::addInstanceToPool($obj, $key);
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
     * @return array (Shipping object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ShippingPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ShippingPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ShippingPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ShippingPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ShippingPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        return Propel::getDatabaseMap(ShippingPeer::DATABASE_NAME)->getTable(ShippingPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseShippingPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseShippingPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \ShippingTableMap());
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
        return ShippingPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Shipping or Criteria object.
     *
     * @param      mixed $values Criteria or Shipping object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Shipping object
        }

        if ($criteria->containsKey(ShippingPeer::IDSHIPPING) && $criteria->keyContainsValue(ShippingPeer::IDSHIPPING) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ShippingPeer::IDSHIPPING.')');
        }


        // Set the correct dbName
        $criteria->setDbName(ShippingPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Shipping or Criteria object.
     *
     * @param      mixed $values Criteria or Shipping object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(ShippingPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ShippingPeer::IDSHIPPING);
            $value = $criteria->remove(ShippingPeer::IDSHIPPING);
            if ($value) {
                $selectCriteria->add(ShippingPeer::IDSHIPPING, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ShippingPeer::TABLE_NAME);
            }

        } else { // $values is Shipping object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(ShippingPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the shipping table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += ShippingPeer::doOnDeleteCascade(new Criteria(ShippingPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(ShippingPeer::TABLE_NAME, $con, ShippingPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShippingPeer::clearInstancePool();
            ShippingPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Shipping or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Shipping object or primary key or array of primary keys
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
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Shipping) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ShippingPeer::DATABASE_NAME);
            $criteria->add(ShippingPeer::IDSHIPPING, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(ShippingPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += ShippingPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                ShippingPeer::clearInstancePool();
            } elseif ($values instanceof Shipping) { // it's a model object
                ShippingPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    ShippingPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            ShippingPeer::clearRelatedInstancePool();
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
        $objects = ShippingPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Ordershipping objects
            $criteria = new Criteria(OrdershippingPeer::DATABASE_NAME);

            $criteria->add(OrdershippingPeer::IDSHIPPING, $obj->getIdshipping());
            $affectedRows += OrdershippingPeer::doDelete($criteria, $con);

            // delete related ShippingHistory objects
            $criteria = new Criteria(ShippingHistoryPeer::DATABASE_NAME);

            $criteria->add(ShippingHistoryPeer::IDSHIPPING, $obj->getIdshipping());
            $affectedRows += ShippingHistoryPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Shipping object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Shipping $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ShippingPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ShippingPeer::TABLE_NAME);

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

        return BasePeer::doValidate(ShippingPeer::DATABASE_NAME, ShippingPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Shipping
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = ShippingPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(ShippingPeer::DATABASE_NAME);
        $criteria->add(ShippingPeer::IDSHIPPING, $pk);

        $v = ShippingPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Shipping[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ShippingPeer::DATABASE_NAME);
            $criteria->add(ShippingPeer::IDSHIPPING, $pks, Criteria::IN);
            $objs = ShippingPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseShippingPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseShippingPeer::buildTableMap();

