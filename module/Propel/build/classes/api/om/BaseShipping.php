<?php


/**
 * Base class that represents a row from the 'shipping' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseShipping extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ShippingPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ShippingPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idshipping field.
     * @var        int
     */
    protected $idshipping;

    /**
     * The value for the shipping_tracking field.
     * @var        string
     */
    protected $shipping_tracking;

    /**
     * The value for the transport_company field.
     * @var        string
     */
    protected $transport_company;

    /**
     * The value for the shipping_date field.
     * @var        string
     */
    protected $shipping_date;

    /**
     * The value for the shipping_datecompromise field.
     * @var        string
     */
    protected $shipping_datecompromise;

    /**
     * The value for the shipping_daterealdelivery field.
     * @var        string
     */
    protected $shipping_daterealdelivery;

    /**
     * The value for the shipping_status field.
     * Note: this column has a database default value of: 'pending'
     * @var        string
     */
    protected $shipping_status;

    /**
     * The value for the sender_iso_codecountry field.
     * @var        string
     */
    protected $sender_iso_codecountry;

    /**
     * The value for the sender_iso_codephone field.
     * @var        string
     */
    protected $sender_iso_codephone;

    /**
     * The value for the sender_name field.
     * @var        string
     */
    protected $sender_name;

    /**
     * The value for the sender_addressee_cellular field.
     * @var        string
     */
    protected $sender_addressee_cellular;

    /**
     * The value for the sender_addressee_phone field.
     * @var        string
     */
    protected $sender_addressee_phone;

    /**
     * The value for the sender_address field.
     * @var        string
     */
    protected $sender_address;

    /**
     * The value for the sender_address2 field.
     * @var        string
     */
    protected $sender_address2;

    /**
     * The value for the sender_city field.
     * @var        string
     */
    protected $sender_city;

    /**
     * The value for the sender_state field.
     * @var        string
     */
    protected $sender_state;

    /**
     * The value for the sender_zipcode field.
     * @var        string
     */
    protected $sender_zipcode;

    /**
     * The value for the addressee_iso_codecountry field.
     * @var        string
     */
    protected $addressee_iso_codecountry;

    /**
     * The value for the addressee_iso_codephone field.
     * @var        string
     */
    protected $addressee_iso_codephone;

    /**
     * The value for the addressee_name field.
     * @var        string
     */
    protected $addressee_name;

    /**
     * The value for the addressee_addressee_cellular field.
     * @var        string
     */
    protected $addressee_addressee_cellular;

    /**
     * The value for the addressee_addressee_phone field.
     * @var        string
     */
    protected $addressee_addressee_phone;

    /**
     * The value for the addressee_address field.
     * @var        string
     */
    protected $addressee_address;

    /**
     * The value for the addressee_address2 field.
     * @var        string
     */
    protected $addressee_address2;

    /**
     * The value for the addressee_city field.
     * @var        string
     */
    protected $addressee_city;

    /**
     * The value for the addressee_state field.
     * @var        string
     */
    protected $addressee_state;

    /**
     * The value for the addressee_zipcode field.
     * @var        string
     */
    protected $addressee_zipcode;

    /**
     * @var        PropelObjectCollection|Ordershipping[] Collection to store aggregation of Ordershipping objects.
     */
    protected $collOrdershippings;
    protected $collOrdershippingsPartial;

    /**
     * @var        PropelObjectCollection|ShippingHistory[] Collection to store aggregation of ShippingHistory objects.
     */
    protected $collShippingHistorys;
    protected $collShippingHistorysPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordershippingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $shippingHistorysScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->shipping_status = 'pending';
    }

    /**
     * Initializes internal state of BaseShipping object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idshipping] column value.
     *
     * @return int
     */
    public function getIdshipping()
    {

        return $this->idshipping;
    }

    /**
     * Get the [shipping_tracking] column value.
     *
     * @return string
     */
    public function getShippingTracking()
    {

        return $this->shipping_tracking;
    }

    /**
     * Get the [transport_company] column value.
     *
     * @return string
     */
    public function getTransportCompany()
    {

        return $this->transport_company;
    }

    /**
     * Get the [optionally formatted] temporal [shipping_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDate($format = 'Y-m-d H:i:s')
    {
        if ($this->shipping_date === null) {
            return null;
        }

        if ($this->shipping_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->shipping_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->shipping_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [shipping_datecompromise] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDatecompromise($format = 'Y-m-d H:i:s')
    {
        if ($this->shipping_datecompromise === null) {
            return null;
        }

        if ($this->shipping_datecompromise === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->shipping_datecompromise);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->shipping_datecompromise, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [shipping_daterealdelivery] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDaterealdelivery($format = 'Y-m-d H:i:s')
    {
        if ($this->shipping_daterealdelivery === null) {
            return null;
        }

        if ($this->shipping_daterealdelivery === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->shipping_daterealdelivery);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->shipping_daterealdelivery, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [shipping_status] column value.
     *
     * @return string
     */
    public function getShippingStatus()
    {

        return $this->shipping_status;
    }

    /**
     * Get the [sender_iso_codecountry] column value.
     *
     * @return string
     */
    public function getSenderIsoCodecountry()
    {

        return $this->sender_iso_codecountry;
    }

    /**
     * Get the [sender_iso_codephone] column value.
     *
     * @return string
     */
    public function getSenderIsoCodephone()
    {

        return $this->sender_iso_codephone;
    }

    /**
     * Get the [sender_name] column value.
     *
     * @return string
     */
    public function getSenderName()
    {

        return $this->sender_name;
    }

    /**
     * Get the [sender_addressee_cellular] column value.
     *
     * @return string
     */
    public function getSenderAddresseeCellular()
    {

        return $this->sender_addressee_cellular;
    }

    /**
     * Get the [sender_addressee_phone] column value.
     *
     * @return string
     */
    public function getSenderAddresseePhone()
    {

        return $this->sender_addressee_phone;
    }

    /**
     * Get the [sender_address] column value.
     *
     * @return string
     */
    public function getSenderAddress()
    {

        return $this->sender_address;
    }

    /**
     * Get the [sender_address2] column value.
     *
     * @return string
     */
    public function getSenderAddress2()
    {

        return $this->sender_address2;
    }

    /**
     * Get the [sender_city] column value.
     *
     * @return string
     */
    public function getSenderCity()
    {

        return $this->sender_city;
    }

    /**
     * Get the [sender_state] column value.
     *
     * @return string
     */
    public function getSenderState()
    {

        return $this->sender_state;
    }

    /**
     * Get the [sender_zipcode] column value.
     *
     * @return string
     */
    public function getSenderZipcode()
    {

        return $this->sender_zipcode;
    }

    /**
     * Get the [addressee_iso_codecountry] column value.
     *
     * @return string
     */
    public function getAddresseeIsoCodecountry()
    {

        return $this->addressee_iso_codecountry;
    }

    /**
     * Get the [addressee_iso_codephone] column value.
     *
     * @return string
     */
    public function getAddresseeIsoCodephone()
    {

        return $this->addressee_iso_codephone;
    }

    /**
     * Get the [addressee_name] column value.
     *
     * @return string
     */
    public function getAddresseeName()
    {

        return $this->addressee_name;
    }

    /**
     * Get the [addressee_addressee_cellular] column value.
     *
     * @return string
     */
    public function getAddresseeAddresseeCellular()
    {

        return $this->addressee_addressee_cellular;
    }

    /**
     * Get the [addressee_addressee_phone] column value.
     *
     * @return string
     */
    public function getAddresseeAddresseePhone()
    {

        return $this->addressee_addressee_phone;
    }

    /**
     * Get the [addressee_address] column value.
     *
     * @return string
     */
    public function getAddresseeAddress()
    {

        return $this->addressee_address;
    }

    /**
     * Get the [addressee_address2] column value.
     *
     * @return string
     */
    public function getAddresseeAddress2()
    {

        return $this->addressee_address2;
    }

    /**
     * Get the [addressee_city] column value.
     *
     * @return string
     */
    public function getAddresseeCity()
    {

        return $this->addressee_city;
    }

    /**
     * Get the [addressee_state] column value.
     *
     * @return string
     */
    public function getAddresseeState()
    {

        return $this->addressee_state;
    }

    /**
     * Get the [addressee_zipcode] column value.
     *
     * @return string
     */
    public function getAddresseeZipcode()
    {

        return $this->addressee_zipcode;
    }

    /**
     * Set the value of [idshipping] column.
     *
     * @param  int $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setIdshipping($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idshipping !== $v) {
            $this->idshipping = $v;
            $this->modifiedColumns[] = ShippingPeer::IDSHIPPING;
        }


        return $this;
    } // setIdshipping()

    /**
     * Set the value of [shipping_tracking] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingTracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_tracking !== $v) {
            $this->shipping_tracking = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_TRACKING;
        }


        return $this;
    } // setShippingTracking()

    /**
     * Set the value of [transport_company] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setTransportCompany($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->transport_company !== $v) {
            $this->transport_company = $v;
            $this->modifiedColumns[] = ShippingPeer::TRANSPORT_COMPANY;
        }


        return $this;
    } // setTransportCompany()

    /**
     * Sets the value of [shipping_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->shipping_date !== null || $dt !== null) {
            $currentDateAsString = ($this->shipping_date !== null && $tmpDt = new DateTime($this->shipping_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->shipping_date = $newDateAsString;
                $this->modifiedColumns[] = ShippingPeer::SHIPPING_DATE;
            }
        } // if either are not null


        return $this;
    } // setShippingDate()

    /**
     * Sets the value of [shipping_datecompromise] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingDatecompromise($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->shipping_datecompromise !== null || $dt !== null) {
            $currentDateAsString = ($this->shipping_datecompromise !== null && $tmpDt = new DateTime($this->shipping_datecompromise)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->shipping_datecompromise = $newDateAsString;
                $this->modifiedColumns[] = ShippingPeer::SHIPPING_DATECOMPROMISE;
            }
        } // if either are not null


        return $this;
    } // setShippingDatecompromise()

    /**
     * Sets the value of [shipping_daterealdelivery] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingDaterealdelivery($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->shipping_daterealdelivery !== null || $dt !== null) {
            $currentDateAsString = ($this->shipping_daterealdelivery !== null && $tmpDt = new DateTime($this->shipping_daterealdelivery)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->shipping_daterealdelivery = $newDateAsString;
                $this->modifiedColumns[] = ShippingPeer::SHIPPING_DATEREALDELIVERY;
            }
        } // if either are not null


        return $this;
    } // setShippingDaterealdelivery()

    /**
     * Set the value of [shipping_status] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_status !== $v) {
            $this->shipping_status = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_STATUS;
        }


        return $this;
    } // setShippingStatus()

    /**
     * Set the value of [sender_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_iso_codecountry !== $v) {
            $this->sender_iso_codecountry = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ISO_CODECOUNTRY;
        }


        return $this;
    } // setSenderIsoCodecountry()

    /**
     * Set the value of [sender_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_iso_codephone !== $v) {
            $this->sender_iso_codephone = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ISO_CODEPHONE;
        }


        return $this;
    } // setSenderIsoCodephone()

    /**
     * Set the value of [sender_name] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_name !== $v) {
            $this->sender_name = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_NAME;
        }


        return $this;
    } // setSenderName()

    /**
     * Set the value of [sender_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_addressee_cellular !== $v) {
            $this->sender_addressee_cellular = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setSenderAddresseeCellular()

    /**
     * Set the value of [sender_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_addressee_phone !== $v) {
            $this->sender_addressee_phone = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ADDRESSEE_PHONE;
        }


        return $this;
    } // setSenderAddresseePhone()

    /**
     * Set the value of [sender_address] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_address !== $v) {
            $this->sender_address = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ADDRESS;
        }


        return $this;
    } // setSenderAddress()

    /**
     * Set the value of [sender_address2] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_address2 !== $v) {
            $this->sender_address2 = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ADDRESS2;
        }


        return $this;
    } // setSenderAddress2()

    /**
     * Set the value of [sender_city] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_city !== $v) {
            $this->sender_city = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_CITY;
        }


        return $this;
    } // setSenderCity()

    /**
     * Set the value of [sender_state] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_state !== $v) {
            $this->sender_state = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_STATE;
        }


        return $this;
    } // setSenderState()

    /**
     * Set the value of [sender_zipcode] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setSenderZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender_zipcode !== $v) {
            $this->sender_zipcode = $v;
            $this->modifiedColumns[] = ShippingPeer::SENDER_ZIPCODE;
        }


        return $this;
    } // setSenderZipcode()

    /**
     * Set the value of [addressee_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_iso_codecountry !== $v) {
            $this->addressee_iso_codecountry = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY;
        }


        return $this;
    } // setAddresseeIsoCodecountry()

    /**
     * Set the value of [addressee_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_iso_codephone !== $v) {
            $this->addressee_iso_codephone = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ISO_CODEPHONE;
        }


        return $this;
    } // setAddresseeIsoCodephone()

    /**
     * Set the value of [addressee_name] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_name !== $v) {
            $this->addressee_name = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_NAME;
        }


        return $this;
    } // setAddresseeName()

    /**
     * Set the value of [addressee_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_addressee_cellular !== $v) {
            $this->addressee_addressee_cellular = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setAddresseeAddresseeCellular()

    /**
     * Set the value of [addressee_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_addressee_phone !== $v) {
            $this->addressee_addressee_phone = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE;
        }


        return $this;
    } // setAddresseeAddresseePhone()

    /**
     * Set the value of [addressee_address] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_address !== $v) {
            $this->addressee_address = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ADDRESS;
        }


        return $this;
    } // setAddresseeAddress()

    /**
     * Set the value of [addressee_address2] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_address2 !== $v) {
            $this->addressee_address2 = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ADDRESS2;
        }


        return $this;
    } // setAddresseeAddress2()

    /**
     * Set the value of [addressee_city] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_city !== $v) {
            $this->addressee_city = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_CITY;
        }


        return $this;
    } // setAddresseeCity()

    /**
     * Set the value of [addressee_state] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_state !== $v) {
            $this->addressee_state = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_STATE;
        }


        return $this;
    } // setAddresseeState()

    /**
     * Set the value of [addressee_zipcode] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setAddresseeZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->addressee_zipcode !== $v) {
            $this->addressee_zipcode = $v;
            $this->modifiedColumns[] = ShippingPeer::ADDRESSEE_ZIPCODE;
        }


        return $this;
    } // setAddresseeZipcode()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->shipping_status !== 'pending') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->idshipping = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->shipping_tracking = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->transport_company = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->shipping_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->shipping_datecompromise = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->shipping_daterealdelivery = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->shipping_status = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->sender_iso_codecountry = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->sender_iso_codephone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->sender_name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->sender_addressee_cellular = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->sender_addressee_phone = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->sender_address = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->sender_address2 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->sender_city = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->sender_state = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->sender_zipcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->addressee_iso_codecountry = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->addressee_iso_codephone = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->addressee_name = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->addressee_addressee_cellular = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->addressee_addressee_phone = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->addressee_address = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->addressee_address2 = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->addressee_city = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->addressee_state = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->addressee_zipcode = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 27; // 27 = ShippingPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Shipping object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ShippingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collOrdershippings = null;

            $this->collShippingHistorys = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ShippingQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ShippingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ShippingPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->ordershippingsScheduledForDeletion !== null) {
                if (!$this->ordershippingsScheduledForDeletion->isEmpty()) {
                    OrdershippingQuery::create()
                        ->filterByPrimaryKeys($this->ordershippingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ordershippingsScheduledForDeletion = null;
                }
            }

            if ($this->collOrdershippings !== null) {
                foreach ($this->collOrdershippings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->shippingHistorysScheduledForDeletion !== null) {
                if (!$this->shippingHistorysScheduledForDeletion->isEmpty()) {
                    ShippingHistoryQuery::create()
                        ->filterByPrimaryKeys($this->shippingHistorysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->shippingHistorysScheduledForDeletion = null;
                }
            }

            if ($this->collShippingHistorys !== null) {
                foreach ($this->collShippingHistorys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ShippingPeer::IDSHIPPING;
        if (null !== $this->idshipping) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ShippingPeer::IDSHIPPING . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ShippingPeer::IDSHIPPING)) {
            $modifiedColumns[':p' . $index++]  = '`idshipping`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_tracking`';
        }
        if ($this->isColumnModified(ShippingPeer::TRANSPORT_COMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`transport_company`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_date`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATECOMPROMISE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_datecompromise`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATEREALDELIVERY)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_daterealdelivery`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_status`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`sender_iso_codecountry`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`sender_iso_codephone`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`sender_name`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`sender_addressee_cellular`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`sender_addressee_phone`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`sender_address`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`sender_address2`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`sender_city`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`sender_state`';
        }
        if ($this->isColumnModified(ShippingPeer::SENDER_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`sender_zipcode`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_iso_codecountry`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_iso_codephone`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_name`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_addressee_cellular`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_addressee_phone`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_address`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_address2`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_city`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_state`';
        }
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`addressee_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `shipping` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idshipping`':
                        $stmt->bindValue($identifier, $this->idshipping, PDO::PARAM_INT);
                        break;
                    case '`shipping_tracking`':
                        $stmt->bindValue($identifier, $this->shipping_tracking, PDO::PARAM_STR);
                        break;
                    case '`transport_company`':
                        $stmt->bindValue($identifier, $this->transport_company, PDO::PARAM_STR);
                        break;
                    case '`shipping_date`':
                        $stmt->bindValue($identifier, $this->shipping_date, PDO::PARAM_STR);
                        break;
                    case '`shipping_datecompromise`':
                        $stmt->bindValue($identifier, $this->shipping_datecompromise, PDO::PARAM_STR);
                        break;
                    case '`shipping_daterealdelivery`':
                        $stmt->bindValue($identifier, $this->shipping_daterealdelivery, PDO::PARAM_STR);
                        break;
                    case '`shipping_status`':
                        $stmt->bindValue($identifier, $this->shipping_status, PDO::PARAM_STR);
                        break;
                    case '`sender_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->sender_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`sender_iso_codephone`':
                        $stmt->bindValue($identifier, $this->sender_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`sender_name`':
                        $stmt->bindValue($identifier, $this->sender_name, PDO::PARAM_STR);
                        break;
                    case '`sender_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->sender_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`sender_addressee_phone`':
                        $stmt->bindValue($identifier, $this->sender_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`sender_address`':
                        $stmt->bindValue($identifier, $this->sender_address, PDO::PARAM_STR);
                        break;
                    case '`sender_address2`':
                        $stmt->bindValue($identifier, $this->sender_address2, PDO::PARAM_STR);
                        break;
                    case '`sender_city`':
                        $stmt->bindValue($identifier, $this->sender_city, PDO::PARAM_STR);
                        break;
                    case '`sender_state`':
                        $stmt->bindValue($identifier, $this->sender_state, PDO::PARAM_STR);
                        break;
                    case '`sender_zipcode`':
                        $stmt->bindValue($identifier, $this->sender_zipcode, PDO::PARAM_STR);
                        break;
                    case '`addressee_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->addressee_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`addressee_iso_codephone`':
                        $stmt->bindValue($identifier, $this->addressee_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`addressee_name`':
                        $stmt->bindValue($identifier, $this->addressee_name, PDO::PARAM_STR);
                        break;
                    case '`addressee_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->addressee_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`addressee_addressee_phone`':
                        $stmt->bindValue($identifier, $this->addressee_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`addressee_address`':
                        $stmt->bindValue($identifier, $this->addressee_address, PDO::PARAM_STR);
                        break;
                    case '`addressee_address2`':
                        $stmt->bindValue($identifier, $this->addressee_address2, PDO::PARAM_STR);
                        break;
                    case '`addressee_city`':
                        $stmt->bindValue($identifier, $this->addressee_city, PDO::PARAM_STR);
                        break;
                    case '`addressee_state`':
                        $stmt->bindValue($identifier, $this->addressee_state, PDO::PARAM_STR);
                        break;
                    case '`addressee_zipcode`':
                        $stmt->bindValue($identifier, $this->addressee_zipcode, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdshipping($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = ShippingPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collOrdershippings !== null) {
                    foreach ($this->collOrdershippings as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collShippingHistorys !== null) {
                    foreach ($this->collShippingHistorys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ShippingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdshipping();
                break;
            case 1:
                return $this->getShippingTracking();
                break;
            case 2:
                return $this->getTransportCompany();
                break;
            case 3:
                return $this->getShippingDate();
                break;
            case 4:
                return $this->getShippingDatecompromise();
                break;
            case 5:
                return $this->getShippingDaterealdelivery();
                break;
            case 6:
                return $this->getShippingStatus();
                break;
            case 7:
                return $this->getSenderIsoCodecountry();
                break;
            case 8:
                return $this->getSenderIsoCodephone();
                break;
            case 9:
                return $this->getSenderName();
                break;
            case 10:
                return $this->getSenderAddresseeCellular();
                break;
            case 11:
                return $this->getSenderAddresseePhone();
                break;
            case 12:
                return $this->getSenderAddress();
                break;
            case 13:
                return $this->getSenderAddress2();
                break;
            case 14:
                return $this->getSenderCity();
                break;
            case 15:
                return $this->getSenderState();
                break;
            case 16:
                return $this->getSenderZipcode();
                break;
            case 17:
                return $this->getAddresseeIsoCodecountry();
                break;
            case 18:
                return $this->getAddresseeIsoCodephone();
                break;
            case 19:
                return $this->getAddresseeName();
                break;
            case 20:
                return $this->getAddresseeAddresseeCellular();
                break;
            case 21:
                return $this->getAddresseeAddresseePhone();
                break;
            case 22:
                return $this->getAddresseeAddress();
                break;
            case 23:
                return $this->getAddresseeAddress2();
                break;
            case 24:
                return $this->getAddresseeCity();
                break;
            case 25:
                return $this->getAddresseeState();
                break;
            case 26:
                return $this->getAddresseeZipcode();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Shipping'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Shipping'][$this->getPrimaryKey()] = true;
        $keys = ShippingPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdshipping(),
            $keys[1] => $this->getShippingTracking(),
            $keys[2] => $this->getTransportCompany(),
            $keys[3] => $this->getShippingDate(),
            $keys[4] => $this->getShippingDatecompromise(),
            $keys[5] => $this->getShippingDaterealdelivery(),
            $keys[6] => $this->getShippingStatus(),
            $keys[7] => $this->getSenderIsoCodecountry(),
            $keys[8] => $this->getSenderIsoCodephone(),
            $keys[9] => $this->getSenderName(),
            $keys[10] => $this->getSenderAddresseeCellular(),
            $keys[11] => $this->getSenderAddresseePhone(),
            $keys[12] => $this->getSenderAddress(),
            $keys[13] => $this->getSenderAddress2(),
            $keys[14] => $this->getSenderCity(),
            $keys[15] => $this->getSenderState(),
            $keys[16] => $this->getSenderZipcode(),
            $keys[17] => $this->getAddresseeIsoCodecountry(),
            $keys[18] => $this->getAddresseeIsoCodephone(),
            $keys[19] => $this->getAddresseeName(),
            $keys[20] => $this->getAddresseeAddresseeCellular(),
            $keys[21] => $this->getAddresseeAddresseePhone(),
            $keys[22] => $this->getAddresseeAddress(),
            $keys[23] => $this->getAddresseeAddress2(),
            $keys[24] => $this->getAddresseeCity(),
            $keys[25] => $this->getAddresseeState(),
            $keys[26] => $this->getAddresseeZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collOrdershippings) {
                $result['Ordershippings'] = $this->collOrdershippings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collShippingHistorys) {
                $result['ShippingHistorys'] = $this->collShippingHistorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ShippingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdshipping($value);
                break;
            case 1:
                $this->setShippingTracking($value);
                break;
            case 2:
                $this->setTransportCompany($value);
                break;
            case 3:
                $this->setShippingDate($value);
                break;
            case 4:
                $this->setShippingDatecompromise($value);
                break;
            case 5:
                $this->setShippingDaterealdelivery($value);
                break;
            case 6:
                $this->setShippingStatus($value);
                break;
            case 7:
                $this->setSenderIsoCodecountry($value);
                break;
            case 8:
                $this->setSenderIsoCodephone($value);
                break;
            case 9:
                $this->setSenderName($value);
                break;
            case 10:
                $this->setSenderAddresseeCellular($value);
                break;
            case 11:
                $this->setSenderAddresseePhone($value);
                break;
            case 12:
                $this->setSenderAddress($value);
                break;
            case 13:
                $this->setSenderAddress2($value);
                break;
            case 14:
                $this->setSenderCity($value);
                break;
            case 15:
                $this->setSenderState($value);
                break;
            case 16:
                $this->setSenderZipcode($value);
                break;
            case 17:
                $this->setAddresseeIsoCodecountry($value);
                break;
            case 18:
                $this->setAddresseeIsoCodephone($value);
                break;
            case 19:
                $this->setAddresseeName($value);
                break;
            case 20:
                $this->setAddresseeAddresseeCellular($value);
                break;
            case 21:
                $this->setAddresseeAddresseePhone($value);
                break;
            case 22:
                $this->setAddresseeAddress($value);
                break;
            case 23:
                $this->setAddresseeAddress2($value);
                break;
            case 24:
                $this->setAddresseeCity($value);
                break;
            case 25:
                $this->setAddresseeState($value);
                break;
            case 26:
                $this->setAddresseeZipcode($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ShippingPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdshipping($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setShippingTracking($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTransportCompany($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setShippingDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setShippingDatecompromise($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setShippingDaterealdelivery($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setShippingStatus($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSenderIsoCodecountry($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSenderIsoCodephone($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSenderName($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSenderAddresseeCellular($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSenderAddresseePhone($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSenderAddress($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSenderAddress2($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setSenderCity($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setSenderState($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSenderZipcode($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setAddresseeIsoCodecountry($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setAddresseeIsoCodephone($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setAddresseeName($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setAddresseeAddresseeCellular($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setAddresseeAddresseePhone($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setAddresseeAddress($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setAddresseeAddress2($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setAddresseeCity($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setAddresseeState($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setAddresseeZipcode($arr[$keys[26]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ShippingPeer::DATABASE_NAME);

        if ($this->isColumnModified(ShippingPeer::IDSHIPPING)) $criteria->add(ShippingPeer::IDSHIPPING, $this->idshipping);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_TRACKING)) $criteria->add(ShippingPeer::SHIPPING_TRACKING, $this->shipping_tracking);
        if ($this->isColumnModified(ShippingPeer::TRANSPORT_COMPANY)) $criteria->add(ShippingPeer::TRANSPORT_COMPANY, $this->transport_company);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATE)) $criteria->add(ShippingPeer::SHIPPING_DATE, $this->shipping_date);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATECOMPROMISE)) $criteria->add(ShippingPeer::SHIPPING_DATECOMPROMISE, $this->shipping_datecompromise);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATEREALDELIVERY)) $criteria->add(ShippingPeer::SHIPPING_DATEREALDELIVERY, $this->shipping_daterealdelivery);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_STATUS)) $criteria->add(ShippingPeer::SHIPPING_STATUS, $this->shipping_status);
        if ($this->isColumnModified(ShippingPeer::SENDER_ISO_CODECOUNTRY)) $criteria->add(ShippingPeer::SENDER_ISO_CODECOUNTRY, $this->sender_iso_codecountry);
        if ($this->isColumnModified(ShippingPeer::SENDER_ISO_CODEPHONE)) $criteria->add(ShippingPeer::SENDER_ISO_CODEPHONE, $this->sender_iso_codephone);
        if ($this->isColumnModified(ShippingPeer::SENDER_NAME)) $criteria->add(ShippingPeer::SENDER_NAME, $this->sender_name);
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESSEE_CELLULAR)) $criteria->add(ShippingPeer::SENDER_ADDRESSEE_CELLULAR, $this->sender_addressee_cellular);
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESSEE_PHONE)) $criteria->add(ShippingPeer::SENDER_ADDRESSEE_PHONE, $this->sender_addressee_phone);
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESS)) $criteria->add(ShippingPeer::SENDER_ADDRESS, $this->sender_address);
        if ($this->isColumnModified(ShippingPeer::SENDER_ADDRESS2)) $criteria->add(ShippingPeer::SENDER_ADDRESS2, $this->sender_address2);
        if ($this->isColumnModified(ShippingPeer::SENDER_CITY)) $criteria->add(ShippingPeer::SENDER_CITY, $this->sender_city);
        if ($this->isColumnModified(ShippingPeer::SENDER_STATE)) $criteria->add(ShippingPeer::SENDER_STATE, $this->sender_state);
        if ($this->isColumnModified(ShippingPeer::SENDER_ZIPCODE)) $criteria->add(ShippingPeer::SENDER_ZIPCODE, $this->sender_zipcode);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY)) $criteria->add(ShippingPeer::ADDRESSEE_ISO_CODECOUNTRY, $this->addressee_iso_codecountry);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ISO_CODEPHONE)) $criteria->add(ShippingPeer::ADDRESSEE_ISO_CODEPHONE, $this->addressee_iso_codephone);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_NAME)) $criteria->add(ShippingPeer::ADDRESSEE_NAME, $this->addressee_name);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR)) $criteria->add(ShippingPeer::ADDRESSEE_ADDRESSEE_CELLULAR, $this->addressee_addressee_cellular);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE)) $criteria->add(ShippingPeer::ADDRESSEE_ADDRESSEE_PHONE, $this->addressee_addressee_phone);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESS)) $criteria->add(ShippingPeer::ADDRESSEE_ADDRESS, $this->addressee_address);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ADDRESS2)) $criteria->add(ShippingPeer::ADDRESSEE_ADDRESS2, $this->addressee_address2);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_CITY)) $criteria->add(ShippingPeer::ADDRESSEE_CITY, $this->addressee_city);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_STATE)) $criteria->add(ShippingPeer::ADDRESSEE_STATE, $this->addressee_state);
        if ($this->isColumnModified(ShippingPeer::ADDRESSEE_ZIPCODE)) $criteria->add(ShippingPeer::ADDRESSEE_ZIPCODE, $this->addressee_zipcode);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ShippingPeer::DATABASE_NAME);
        $criteria->add(ShippingPeer::IDSHIPPING, $this->idshipping);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdshipping();
    }

    /**
     * Generic method to set the primary key (idshipping column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdshipping($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdshipping();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Shipping (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setShippingTracking($this->getShippingTracking());
        $copyObj->setTransportCompany($this->getTransportCompany());
        $copyObj->setShippingDate($this->getShippingDate());
        $copyObj->setShippingDatecompromise($this->getShippingDatecompromise());
        $copyObj->setShippingDaterealdelivery($this->getShippingDaterealdelivery());
        $copyObj->setShippingStatus($this->getShippingStatus());
        $copyObj->setSenderIsoCodecountry($this->getSenderIsoCodecountry());
        $copyObj->setSenderIsoCodephone($this->getSenderIsoCodephone());
        $copyObj->setSenderName($this->getSenderName());
        $copyObj->setSenderAddresseeCellular($this->getSenderAddresseeCellular());
        $copyObj->setSenderAddresseePhone($this->getSenderAddresseePhone());
        $copyObj->setSenderAddress($this->getSenderAddress());
        $copyObj->setSenderAddress2($this->getSenderAddress2());
        $copyObj->setSenderCity($this->getSenderCity());
        $copyObj->setSenderState($this->getSenderState());
        $copyObj->setSenderZipcode($this->getSenderZipcode());
        $copyObj->setAddresseeIsoCodecountry($this->getAddresseeIsoCodecountry());
        $copyObj->setAddresseeIsoCodephone($this->getAddresseeIsoCodephone());
        $copyObj->setAddresseeName($this->getAddresseeName());
        $copyObj->setAddresseeAddresseeCellular($this->getAddresseeAddresseeCellular());
        $copyObj->setAddresseeAddresseePhone($this->getAddresseeAddresseePhone());
        $copyObj->setAddresseeAddress($this->getAddresseeAddress());
        $copyObj->setAddresseeAddress2($this->getAddresseeAddress2());
        $copyObj->setAddresseeCity($this->getAddresseeCity());
        $copyObj->setAddresseeState($this->getAddresseeState());
        $copyObj->setAddresseeZipcode($this->getAddresseeZipcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getOrdershippings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrdershipping($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getShippingHistorys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShippingHistory($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdshipping(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Shipping Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ShippingPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ShippingPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Ordershipping' == $relationName) {
            $this->initOrdershippings();
        }
        if ('ShippingHistory' == $relationName) {
            $this->initShippingHistorys();
        }
    }

    /**
     * Clears out the collOrdershippings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Shipping The current object (for fluent API support)
     * @see        addOrdershippings()
     */
    public function clearOrdershippings()
    {
        $this->collOrdershippings = null; // important to set this to null since that means it is uninitialized
        $this->collOrdershippingsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrdershippings collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrdershippings($v = true)
    {
        $this->collOrdershippingsPartial = $v;
    }

    /**
     * Initializes the collOrdershippings collection.
     *
     * By default this just sets the collOrdershippings collection to an empty array (like clearcollOrdershippings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrdershippings($overrideExisting = true)
    {
        if (null !== $this->collOrdershippings && !$overrideExisting) {
            return;
        }
        $this->collOrdershippings = new PropelObjectCollection();
        $this->collOrdershippings->setModel('Ordershipping');
    }

    /**
     * Gets an array of Ordershipping objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Shipping is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ordershipping[] List of Ordershipping objects
     * @throws PropelException
     */
    public function getOrdershippings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdershippingsPartial && !$this->isNew();
        if (null === $this->collOrdershippings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrdershippings) {
                // return empty collection
                $this->initOrdershippings();
            } else {
                $collOrdershippings = OrdershippingQuery::create(null, $criteria)
                    ->filterByShipping($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdershippingsPartial && count($collOrdershippings)) {
                      $this->initOrdershippings(false);

                      foreach ($collOrdershippings as $obj) {
                        if (false == $this->collOrdershippings->contains($obj)) {
                          $this->collOrdershippings->append($obj);
                        }
                      }

                      $this->collOrdershippingsPartial = true;
                    }

                    $collOrdershippings->getInternalIterator()->rewind();

                    return $collOrdershippings;
                }

                if ($partial && $this->collOrdershippings) {
                    foreach ($this->collOrdershippings as $obj) {
                        if ($obj->isNew()) {
                            $collOrdershippings[] = $obj;
                        }
                    }
                }

                $this->collOrdershippings = $collOrdershippings;
                $this->collOrdershippingsPartial = false;
            }
        }

        return $this->collOrdershippings;
    }

    /**
     * Sets a collection of Ordershipping objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ordershippings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Shipping The current object (for fluent API support)
     */
    public function setOrdershippings(PropelCollection $ordershippings, PropelPDO $con = null)
    {
        $ordershippingsToDelete = $this->getOrdershippings(new Criteria(), $con)->diff($ordershippings);


        $this->ordershippingsScheduledForDeletion = $ordershippingsToDelete;

        foreach ($ordershippingsToDelete as $ordershippingRemoved) {
            $ordershippingRemoved->setShipping(null);
        }

        $this->collOrdershippings = null;
        foreach ($ordershippings as $ordershipping) {
            $this->addOrdershipping($ordershipping);
        }

        $this->collOrdershippings = $ordershippings;
        $this->collOrdershippingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ordershipping objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ordershipping objects.
     * @throws PropelException
     */
    public function countOrdershippings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdershippingsPartial && !$this->isNew();
        if (null === $this->collOrdershippings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrdershippings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrdershippings());
            }
            $query = OrdershippingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShipping($this)
                ->count($con);
        }

        return count($this->collOrdershippings);
    }

    /**
     * Method called to associate a Ordershipping object to this object
     * through the Ordershipping foreign key attribute.
     *
     * @param    Ordershipping $l Ordershipping
     * @return Shipping The current object (for fluent API support)
     */
    public function addOrdershipping(Ordershipping $l)
    {
        if ($this->collOrdershippings === null) {
            $this->initOrdershippings();
            $this->collOrdershippingsPartial = true;
        }

        if (!in_array($l, $this->collOrdershippings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrdershipping($l);

            if ($this->ordershippingsScheduledForDeletion and $this->ordershippingsScheduledForDeletion->contains($l)) {
                $this->ordershippingsScheduledForDeletion->remove($this->ordershippingsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Ordershipping $ordershipping The ordershipping object to add.
     */
    protected function doAddOrdershipping($ordershipping)
    {
        $this->collOrdershippings[]= $ordershipping;
        $ordershipping->setShipping($this);
    }

    /**
     * @param	Ordershipping $ordershipping The ordershipping object to remove.
     * @return Shipping The current object (for fluent API support)
     */
    public function removeOrdershipping($ordershipping)
    {
        if ($this->getOrdershippings()->contains($ordershipping)) {
            $this->collOrdershippings->remove($this->collOrdershippings->search($ordershipping));
            if (null === $this->ordershippingsScheduledForDeletion) {
                $this->ordershippingsScheduledForDeletion = clone $this->collOrdershippings;
                $this->ordershippingsScheduledForDeletion->clear();
            }
            $this->ordershippingsScheduledForDeletion[]= clone $ordershipping;
            $ordershipping->setShipping(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Shipping is new, it will return
     * an empty collection; or if this Shipping has previously
     * been saved, it will retrieve related Ordershippings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Shipping.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ordershipping[] List of Ordershipping objects
     */
    public function getOrdershippingsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrdershippingQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getOrdershippings($query, $con);
    }

    /**
     * Clears out the collShippingHistorys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Shipping The current object (for fluent API support)
     * @see        addShippingHistorys()
     */
    public function clearShippingHistorys()
    {
        $this->collShippingHistorys = null; // important to set this to null since that means it is uninitialized
        $this->collShippingHistorysPartial = null;

        return $this;
    }

    /**
     * reset is the collShippingHistorys collection loaded partially
     *
     * @return void
     */
    public function resetPartialShippingHistorys($v = true)
    {
        $this->collShippingHistorysPartial = $v;
    }

    /**
     * Initializes the collShippingHistorys collection.
     *
     * By default this just sets the collShippingHistorys collection to an empty array (like clearcollShippingHistorys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShippingHistorys($overrideExisting = true)
    {
        if (null !== $this->collShippingHistorys && !$overrideExisting) {
            return;
        }
        $this->collShippingHistorys = new PropelObjectCollection();
        $this->collShippingHistorys->setModel('ShippingHistory');
    }

    /**
     * Gets an array of ShippingHistory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Shipping is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ShippingHistory[] List of ShippingHistory objects
     * @throws PropelException
     */
    public function getShippingHistorys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collShippingHistorysPartial && !$this->isNew();
        if (null === $this->collShippingHistorys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShippingHistorys) {
                // return empty collection
                $this->initShippingHistorys();
            } else {
                $collShippingHistorys = ShippingHistoryQuery::create(null, $criteria)
                    ->filterByShipping($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collShippingHistorysPartial && count($collShippingHistorys)) {
                      $this->initShippingHistorys(false);

                      foreach ($collShippingHistorys as $obj) {
                        if (false == $this->collShippingHistorys->contains($obj)) {
                          $this->collShippingHistorys->append($obj);
                        }
                      }

                      $this->collShippingHistorysPartial = true;
                    }

                    $collShippingHistorys->getInternalIterator()->rewind();

                    return $collShippingHistorys;
                }

                if ($partial && $this->collShippingHistorys) {
                    foreach ($this->collShippingHistorys as $obj) {
                        if ($obj->isNew()) {
                            $collShippingHistorys[] = $obj;
                        }
                    }
                }

                $this->collShippingHistorys = $collShippingHistorys;
                $this->collShippingHistorysPartial = false;
            }
        }

        return $this->collShippingHistorys;
    }

    /**
     * Sets a collection of ShippingHistory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $shippingHistorys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingHistorys(PropelCollection $shippingHistorys, PropelPDO $con = null)
    {
        $shippingHistorysToDelete = $this->getShippingHistorys(new Criteria(), $con)->diff($shippingHistorys);


        $this->shippingHistorysScheduledForDeletion = $shippingHistorysToDelete;

        foreach ($shippingHistorysToDelete as $shippingHistoryRemoved) {
            $shippingHistoryRemoved->setShipping(null);
        }

        $this->collShippingHistorys = null;
        foreach ($shippingHistorys as $shippingHistory) {
            $this->addShippingHistory($shippingHistory);
        }

        $this->collShippingHistorys = $shippingHistorys;
        $this->collShippingHistorysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ShippingHistory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ShippingHistory objects.
     * @throws PropelException
     */
    public function countShippingHistorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collShippingHistorysPartial && !$this->isNew();
        if (null === $this->collShippingHistorys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShippingHistorys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShippingHistorys());
            }
            $query = ShippingHistoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByShipping($this)
                ->count($con);
        }

        return count($this->collShippingHistorys);
    }

    /**
     * Method called to associate a ShippingHistory object to this object
     * through the ShippingHistory foreign key attribute.
     *
     * @param    ShippingHistory $l ShippingHistory
     * @return Shipping The current object (for fluent API support)
     */
    public function addShippingHistory(ShippingHistory $l)
    {
        if ($this->collShippingHistorys === null) {
            $this->initShippingHistorys();
            $this->collShippingHistorysPartial = true;
        }

        if (!in_array($l, $this->collShippingHistorys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddShippingHistory($l);

            if ($this->shippingHistorysScheduledForDeletion and $this->shippingHistorysScheduledForDeletion->contains($l)) {
                $this->shippingHistorysScheduledForDeletion->remove($this->shippingHistorysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ShippingHistory $shippingHistory The shippingHistory object to add.
     */
    protected function doAddShippingHistory($shippingHistory)
    {
        $this->collShippingHistorys[]= $shippingHistory;
        $shippingHistory->setShipping($this);
    }

    /**
     * @param	ShippingHistory $shippingHistory The shippingHistory object to remove.
     * @return Shipping The current object (for fluent API support)
     */
    public function removeShippingHistory($shippingHistory)
    {
        if ($this->getShippingHistorys()->contains($shippingHistory)) {
            $this->collShippingHistorys->remove($this->collShippingHistorys->search($shippingHistory));
            if (null === $this->shippingHistorysScheduledForDeletion) {
                $this->shippingHistorysScheduledForDeletion = clone $this->collShippingHistorys;
                $this->shippingHistorysScheduledForDeletion->clear();
            }
            $this->shippingHistorysScheduledForDeletion[]= clone $shippingHistory;
            $shippingHistory->setShipping(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idshipping = null;
        $this->shipping_tracking = null;
        $this->transport_company = null;
        $this->shipping_date = null;
        $this->shipping_datecompromise = null;
        $this->shipping_daterealdelivery = null;
        $this->shipping_status = null;
        $this->sender_iso_codecountry = null;
        $this->sender_iso_codephone = null;
        $this->sender_name = null;
        $this->sender_addressee_cellular = null;
        $this->sender_addressee_phone = null;
        $this->sender_address = null;
        $this->sender_address2 = null;
        $this->sender_city = null;
        $this->sender_state = null;
        $this->sender_zipcode = null;
        $this->addressee_iso_codecountry = null;
        $this->addressee_iso_codephone = null;
        $this->addressee_name = null;
        $this->addressee_addressee_cellular = null;
        $this->addressee_addressee_phone = null;
        $this->addressee_address = null;
        $this->addressee_address2 = null;
        $this->addressee_city = null;
        $this->addressee_state = null;
        $this->addressee_zipcode = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collOrdershippings) {
                foreach ($this->collOrdershippings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collShippingHistorys) {
                foreach ($this->collShippingHistorys as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collOrdershippings instanceof PropelCollection) {
            $this->collOrdershippings->clearIterator();
        }
        $this->collOrdershippings = null;
        if ($this->collShippingHistorys instanceof PropelCollection) {
            $this->collShippingHistorys->clearIterator();
        }
        $this->collShippingHistorys = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ShippingPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
