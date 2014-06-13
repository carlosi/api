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
     * The value for the idorder field.
     * @var        int
     */
    protected $idorder;

    /**
     * The value for the shipping_address field.
     * @var        string
     */
    protected $shipping_address;

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
     * The value for the shipping_iso_codecountry field.
     * @var        string
     */
    protected $shipping_iso_codecountry;

    /**
     * The value for the shipping_iso_codephone field.
     * @var        string
     */
    protected $shipping_iso_codephone;

    /**
     * The value for the shipping_addressee field.
     * @var        string
     */
    protected $shipping_addressee;

    /**
     * The value for the shipping_addressee_cellular field.
     * @var        string
     */
    protected $shipping_addressee_cellular;

    /**
     * The value for the shipping_addressee_phone field.
     * @var        string
     */
    protected $shipping_addressee_phone;

    /**
     * The value for the shipping_address2 field.
     * @var        string
     */
    protected $shipping_address2;

    /**
     * The value for the shipping_city field.
     * @var        string
     */
    protected $shipping_city;

    /**
     * The value for the shipping_state field.
     * @var        string
     */
    protected $shipping_state;

    /**
     * The value for the shipping_zipcode field.
     * @var        string
     */
    protected $shipping_zipcode;

    /**
     * @var        Order
     */
    protected $aOrder;

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
     * Get the [idshipping] column value.
     *
     * @return int
     */
    public function getIdshipping()
    {

        return $this->idshipping;
    }

    /**
     * Get the [idorder] column value.
     *
     * @return int
     */
    public function getIdorder()
    {

        return $this->idorder;
    }

    /**
     * Get the [shipping_address] column value.
     *
     * @return string
     */
    public function getShippingAddress()
    {

        return $this->shipping_address;
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
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDate($format = '%x')
    {
        if ($this->shipping_date === null) {
            return null;
        }

        if ($this->shipping_date === '0000-00-00') {
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
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDatecompromise($format = '%x')
    {
        if ($this->shipping_datecompromise === null) {
            return null;
        }

        if ($this->shipping_datecompromise === '0000-00-00') {
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
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getShippingDaterealdelivery($format = '%x')
    {
        if ($this->shipping_daterealdelivery === null) {
            return null;
        }

        if ($this->shipping_daterealdelivery === '0000-00-00') {
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
     * Get the [shipping_iso_codecountry] column value.
     *
     * @return string
     */
    public function getShippingIsoCodecountry()
    {

        return $this->shipping_iso_codecountry;
    }

    /**
     * Get the [shipping_iso_codephone] column value.
     *
     * @return string
     */
    public function getShippingIsoCodephone()
    {

        return $this->shipping_iso_codephone;
    }

    /**
     * Get the [shipping_addressee] column value.
     *
     * @return string
     */
    public function getShippingAddressee()
    {

        return $this->shipping_addressee;
    }

    /**
     * Get the [shipping_addressee_cellular] column value.
     *
     * @return string
     */
    public function getShippingAddresseeCellular()
    {

        return $this->shipping_addressee_cellular;
    }

    /**
     * Get the [shipping_addressee_phone] column value.
     *
     * @return string
     */
    public function getShippingAddresseePhone()
    {

        return $this->shipping_addressee_phone;
    }

    /**
     * Get the [shipping_address2] column value.
     *
     * @return string
     */
    public function getShippingAddress2()
    {

        return $this->shipping_address2;
    }

    /**
     * Get the [shipping_city] column value.
     *
     * @return string
     */
    public function getShippingCity()
    {

        return $this->shipping_city;
    }

    /**
     * Get the [shipping_state] column value.
     *
     * @return string
     */
    public function getShippingState()
    {

        return $this->shipping_state;
    }

    /**
     * Get the [shipping_zipcode] column value.
     *
     * @return string
     */
    public function getShippingZipcode()
    {

        return $this->shipping_zipcode;
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
     * Set the value of [idorder] column.
     *
     * @param  int $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setIdorder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idorder !== $v) {
            $this->idorder = $v;
            $this->modifiedColumns[] = ShippingPeer::IDORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdorder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setIdorder()

    /**
     * Set the value of [shipping_address] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_address !== $v) {
            $this->shipping_address = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ADDRESS;
        }


        return $this;
    } // setShippingAddress()

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
            $currentDateAsString = ($this->shipping_date !== null && $tmpDt = new DateTime($this->shipping_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
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
            $currentDateAsString = ($this->shipping_datecompromise !== null && $tmpDt = new DateTime($this->shipping_datecompromise)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
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
            $currentDateAsString = ($this->shipping_daterealdelivery !== null && $tmpDt = new DateTime($this->shipping_daterealdelivery)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->shipping_daterealdelivery = $newDateAsString;
                $this->modifiedColumns[] = ShippingPeer::SHIPPING_DATEREALDELIVERY;
            }
        } // if either are not null


        return $this;
    } // setShippingDaterealdelivery()

    /**
     * Set the value of [shipping_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_iso_codecountry !== $v) {
            $this->shipping_iso_codecountry = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ISO_CODECOUNTRY;
        }


        return $this;
    } // setShippingIsoCodecountry()

    /**
     * Set the value of [shipping_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_iso_codephone !== $v) {
            $this->shipping_iso_codephone = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ISO_CODEPHONE;
        }


        return $this;
    } // setShippingIsoCodephone()

    /**
     * Set the value of [shipping_addressee] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingAddressee($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_addressee !== $v) {
            $this->shipping_addressee = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ADDRESSEE;
        }


        return $this;
    } // setShippingAddressee()

    /**
     * Set the value of [shipping_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_addressee_cellular !== $v) {
            $this->shipping_addressee_cellular = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setShippingAddresseeCellular()

    /**
     * Set the value of [shipping_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_addressee_phone !== $v) {
            $this->shipping_addressee_phone = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ADDRESSEE_PHONE;
        }


        return $this;
    } // setShippingAddresseePhone()

    /**
     * Set the value of [shipping_address2] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_address2 !== $v) {
            $this->shipping_address2 = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ADDRESS2;
        }


        return $this;
    } // setShippingAddress2()

    /**
     * Set the value of [shipping_city] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_city !== $v) {
            $this->shipping_city = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_CITY;
        }


        return $this;
    } // setShippingCity()

    /**
     * Set the value of [shipping_state] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_state !== $v) {
            $this->shipping_state = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_STATE;
        }


        return $this;
    } // setShippingState()

    /**
     * Set the value of [shipping_zipcode] column.
     *
     * @param  string $v new value
     * @return Shipping The current object (for fluent API support)
     */
    public function setShippingZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipping_zipcode !== $v) {
            $this->shipping_zipcode = $v;
            $this->modifiedColumns[] = ShippingPeer::SHIPPING_ZIPCODE;
        }


        return $this;
    } // setShippingZipcode()

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
            $this->idorder = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->shipping_address = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->shipping_tracking = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->transport_company = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->shipping_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->shipping_datecompromise = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->shipping_daterealdelivery = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->shipping_iso_codecountry = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->shipping_iso_codephone = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->shipping_addressee = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->shipping_addressee_cellular = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->shipping_addressee_phone = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->shipping_address2 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->shipping_city = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->shipping_state = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->shipping_zipcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 17; // 17 = ShippingPeer::NUM_HYDRATE_COLUMNS.

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

        if ($this->aOrder !== null && $this->idorder !== $this->aOrder->getIdorder()) {
            $this->aOrder = null;
        }
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

            $this->aOrder = null;
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

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
        if ($this->isColumnModified(ShippingPeer::IDORDER)) {
            $modifiedColumns[':p' . $index++]  = '`idorder`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_address`';
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
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_iso_codecountry`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_iso_codephone`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_addressee`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_addressee_cellular`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_addressee_phone`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_address2`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_city`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_state`';
        }
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`shipping_zipcode`';
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
                    case '`idorder`':
                        $stmt->bindValue($identifier, $this->idorder, PDO::PARAM_INT);
                        break;
                    case '`shipping_address`':
                        $stmt->bindValue($identifier, $this->shipping_address, PDO::PARAM_STR);
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
                    case '`shipping_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->shipping_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`shipping_iso_codephone`':
                        $stmt->bindValue($identifier, $this->shipping_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`shipping_addressee`':
                        $stmt->bindValue($identifier, $this->shipping_addressee, PDO::PARAM_STR);
                        break;
                    case '`shipping_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->shipping_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`shipping_addressee_phone`':
                        $stmt->bindValue($identifier, $this->shipping_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`shipping_address2`':
                        $stmt->bindValue($identifier, $this->shipping_address2, PDO::PARAM_STR);
                        break;
                    case '`shipping_city`':
                        $stmt->bindValue($identifier, $this->shipping_city, PDO::PARAM_STR);
                        break;
                    case '`shipping_state`':
                        $stmt->bindValue($identifier, $this->shipping_state, PDO::PARAM_STR);
                        break;
                    case '`shipping_zipcode`':
                        $stmt->bindValue($identifier, $this->shipping_zipcode, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }


            if (($retval = ShippingPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
                return $this->getIdorder();
                break;
            case 2:
                return $this->getShippingAddress();
                break;
            case 3:
                return $this->getShippingTracking();
                break;
            case 4:
                return $this->getTransportCompany();
                break;
            case 5:
                return $this->getShippingDate();
                break;
            case 6:
                return $this->getShippingDatecompromise();
                break;
            case 7:
                return $this->getShippingDaterealdelivery();
                break;
            case 8:
                return $this->getShippingIsoCodecountry();
                break;
            case 9:
                return $this->getShippingIsoCodephone();
                break;
            case 10:
                return $this->getShippingAddressee();
                break;
            case 11:
                return $this->getShippingAddresseeCellular();
                break;
            case 12:
                return $this->getShippingAddresseePhone();
                break;
            case 13:
                return $this->getShippingAddress2();
                break;
            case 14:
                return $this->getShippingCity();
                break;
            case 15:
                return $this->getShippingState();
                break;
            case 16:
                return $this->getShippingZipcode();
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
            $keys[1] => $this->getIdorder(),
            $keys[2] => $this->getShippingAddress(),
            $keys[3] => $this->getShippingTracking(),
            $keys[4] => $this->getTransportCompany(),
            $keys[5] => $this->getShippingDate(),
            $keys[6] => $this->getShippingDatecompromise(),
            $keys[7] => $this->getShippingDaterealdelivery(),
            $keys[8] => $this->getShippingIsoCodecountry(),
            $keys[9] => $this->getShippingIsoCodephone(),
            $keys[10] => $this->getShippingAddressee(),
            $keys[11] => $this->getShippingAddresseeCellular(),
            $keys[12] => $this->getShippingAddresseePhone(),
            $keys[13] => $this->getShippingAddress2(),
            $keys[14] => $this->getShippingCity(),
            $keys[15] => $this->getShippingState(),
            $keys[16] => $this->getShippingZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
                $this->setIdorder($value);
                break;
            case 2:
                $this->setShippingAddress($value);
                break;
            case 3:
                $this->setShippingTracking($value);
                break;
            case 4:
                $this->setTransportCompany($value);
                break;
            case 5:
                $this->setShippingDate($value);
                break;
            case 6:
                $this->setShippingDatecompromise($value);
                break;
            case 7:
                $this->setShippingDaterealdelivery($value);
                break;
            case 8:
                $this->setShippingIsoCodecountry($value);
                break;
            case 9:
                $this->setShippingIsoCodephone($value);
                break;
            case 10:
                $this->setShippingAddressee($value);
                break;
            case 11:
                $this->setShippingAddresseeCellular($value);
                break;
            case 12:
                $this->setShippingAddresseePhone($value);
                break;
            case 13:
                $this->setShippingAddress2($value);
                break;
            case 14:
                $this->setShippingCity($value);
                break;
            case 15:
                $this->setShippingState($value);
                break;
            case 16:
                $this->setShippingZipcode($value);
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
        if (array_key_exists($keys[1], $arr)) $this->setIdorder($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setShippingAddress($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setShippingTracking($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTransportCompany($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setShippingDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setShippingDatecompromise($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setShippingDaterealdelivery($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setShippingIsoCodecountry($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setShippingIsoCodephone($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setShippingAddressee($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setShippingAddresseeCellular($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setShippingAddresseePhone($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setShippingAddress2($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setShippingCity($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setShippingState($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setShippingZipcode($arr[$keys[16]]);
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
        if ($this->isColumnModified(ShippingPeer::IDORDER)) $criteria->add(ShippingPeer::IDORDER, $this->idorder);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESS)) $criteria->add(ShippingPeer::SHIPPING_ADDRESS, $this->shipping_address);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_TRACKING)) $criteria->add(ShippingPeer::SHIPPING_TRACKING, $this->shipping_tracking);
        if ($this->isColumnModified(ShippingPeer::TRANSPORT_COMPANY)) $criteria->add(ShippingPeer::TRANSPORT_COMPANY, $this->transport_company);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATE)) $criteria->add(ShippingPeer::SHIPPING_DATE, $this->shipping_date);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATECOMPROMISE)) $criteria->add(ShippingPeer::SHIPPING_DATECOMPROMISE, $this->shipping_datecompromise);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_DATEREALDELIVERY)) $criteria->add(ShippingPeer::SHIPPING_DATEREALDELIVERY, $this->shipping_daterealdelivery);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ISO_CODECOUNTRY)) $criteria->add(ShippingPeer::SHIPPING_ISO_CODECOUNTRY, $this->shipping_iso_codecountry);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ISO_CODEPHONE)) $criteria->add(ShippingPeer::SHIPPING_ISO_CODEPHONE, $this->shipping_iso_codephone);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE)) $criteria->add(ShippingPeer::SHIPPING_ADDRESSEE, $this->shipping_addressee);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE_CELLULAR)) $criteria->add(ShippingPeer::SHIPPING_ADDRESSEE_CELLULAR, $this->shipping_addressee_cellular);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESSEE_PHONE)) $criteria->add(ShippingPeer::SHIPPING_ADDRESSEE_PHONE, $this->shipping_addressee_phone);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ADDRESS2)) $criteria->add(ShippingPeer::SHIPPING_ADDRESS2, $this->shipping_address2);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_CITY)) $criteria->add(ShippingPeer::SHIPPING_CITY, $this->shipping_city);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_STATE)) $criteria->add(ShippingPeer::SHIPPING_STATE, $this->shipping_state);
        if ($this->isColumnModified(ShippingPeer::SHIPPING_ZIPCODE)) $criteria->add(ShippingPeer::SHIPPING_ZIPCODE, $this->shipping_zipcode);

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
        $copyObj->setIdorder($this->getIdorder());
        $copyObj->setShippingAddress($this->getShippingAddress());
        $copyObj->setShippingTracking($this->getShippingTracking());
        $copyObj->setTransportCompany($this->getTransportCompany());
        $copyObj->setShippingDate($this->getShippingDate());
        $copyObj->setShippingDatecompromise($this->getShippingDatecompromise());
        $copyObj->setShippingDaterealdelivery($this->getShippingDaterealdelivery());
        $copyObj->setShippingIsoCodecountry($this->getShippingIsoCodecountry());
        $copyObj->setShippingIsoCodephone($this->getShippingIsoCodephone());
        $copyObj->setShippingAddressee($this->getShippingAddressee());
        $copyObj->setShippingAddresseeCellular($this->getShippingAddresseeCellular());
        $copyObj->setShippingAddresseePhone($this->getShippingAddresseePhone());
        $copyObj->setShippingAddress2($this->getShippingAddress2());
        $copyObj->setShippingCity($this->getShippingCity());
        $copyObj->setShippingState($this->getShippingState());
        $copyObj->setShippingZipcode($this->getShippingZipcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * Declares an association between this object and a Order object.
     *
     * @param                  Order $v
     * @return Shipping The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(Order $v = null)
    {
        if ($v === null) {
            $this->setIdorder(NULL);
        } else {
            $this->setIdorder($v->getIdorder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Order object, it will not be re-added.
        if ($v !== null) {
            $v->addShipping($this);
        }


        return $this;
    }


    /**
     * Get the associated Order object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Order The associated Order object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->idorder !== null) && $doQuery) {
            $this->aOrder = OrderQuery::create()->findPk($this->idorder, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addShippings($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idshipping = null;
        $this->idorder = null;
        $this->shipping_address = null;
        $this->shipping_tracking = null;
        $this->transport_company = null;
        $this->shipping_date = null;
        $this->shipping_datecompromise = null;
        $this->shipping_daterealdelivery = null;
        $this->shipping_iso_codecountry = null;
        $this->shipping_iso_codephone = null;
        $this->shipping_addressee = null;
        $this->shipping_addressee_cellular = null;
        $this->shipping_addressee_phone = null;
        $this->shipping_address2 = null;
        $this->shipping_city = null;
        $this->shipping_state = null;
        $this->shipping_zipcode = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aOrder = null;
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
