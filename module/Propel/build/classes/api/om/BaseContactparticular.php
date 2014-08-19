<?php


/**
 * Base class that represents a row from the 'contactparticular' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseContactparticular extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ContactparticularPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ContactparticularPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcontactparticular field.
     * @var        int
     */
    protected $idcontactparticular;

    /**
     * The value for the idcontactgeneral field.
     * @var        int
     */
    protected $idcontactgeneral;

    /**
     * The value for the contactparticular_iso_codecountry field.
     * @var        string
     */
    protected $contactparticular_iso_codecountry;

    /**
     * The value for the contactparticular_name field.
     * @var        string
     */
    protected $contactparticular_name;

    /**
     * The value for the contactparticular_iso_codephone field.
     * @var        string
     */
    protected $contactparticular_iso_codephone;

    /**
     * The value for the contactparticular_cellular field.
     * @var        string
     */
    protected $contactparticular_cellular;

    /**
     * The value for the contactparticular_phone field.
     * @var        string
     */
    protected $contactparticular_phone;

    /**
     * The value for the contactparticular_phone_extention field.
     * @var        string
     */
    protected $contactparticular_phone_extention;

    /**
     * The value for the contactparticular_position field.
     * @var        string
     */
    protected $contactparticular_position;

    /**
     * The value for the contactparticular_note field.
     * @var        string
     */
    protected $contactparticular_note;

    /**
     * The value for the contactparticular_email field.
     * @var        string
     */
    protected $contactparticular_email;

    /**
     * The value for the contactparticular_email2 field.
     * @var        string
     */
    protected $contactparticular_email2;

    /**
     * The value for the contactparticular_address field.
     * @var        string
     */
    protected $contactparticular_address;

    /**
     * The value for the contactparticular_address2 field.
     * @var        string
     */
    protected $contactparticular_address2;

    /**
     * The value for the contactparticular_city field.
     * @var        string
     */
    protected $contactparticular_city;

    /**
     * The value for the contactparticular_state field.
     * @var        string
     */
    protected $contactparticular_state;

    /**
     * The value for the contactparticular_zipcode field.
     * @var        string
     */
    protected $contactparticular_zipcode;

    /**
     * The value for the contactparticular_lastupdate field.
     * @var        string
     */
    protected $contactparticular_lastupdate;

    /**
     * @var        Contactgeneral
     */
    protected $aContactgeneral;

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
     * Get the [idcontactparticular] column value.
     *
     * @return int
     */
    public function getIdcontactparticular()
    {

        return $this->idcontactparticular;
    }

    /**
     * Get the [idcontactgeneral] column value.
     *
     * @return int
     */
    public function getIdcontactgeneral()
    {

        return $this->idcontactgeneral;
    }

    /**
     * Get the [contactparticular_iso_codecountry] column value.
     *
     * @return string
     */
    public function getContactparticularIsoCodecountry()
    {

        return $this->contactparticular_iso_codecountry;
    }

    /**
     * Get the [contactparticular_name] column value.
     *
     * @return string
     */
    public function getContactparticularName()
    {

        return $this->contactparticular_name;
    }

    /**
     * Get the [contactparticular_iso_codephone] column value.
     *
     * @return string
     */
    public function getContactparticularIsoCodephone()
    {

        return $this->contactparticular_iso_codephone;
    }

    /**
     * Get the [contactparticular_cellular] column value.
     *
     * @return string
     */
    public function getContactparticularCellular()
    {

        return $this->contactparticular_cellular;
    }

    /**
     * Get the [contactparticular_phone] column value.
     *
     * @return string
     */
    public function getContactparticularPhone()
    {

        return $this->contactparticular_phone;
    }

    /**
     * Get the [contactparticular_phone_extention] column value.
     *
     * @return string
     */
    public function getContactparticularPhoneExtention()
    {

        return $this->contactparticular_phone_extention;
    }

    /**
     * Get the [contactparticular_position] column value.
     *
     * @return string
     */
    public function getContactparticularPosition()
    {

        return $this->contactparticular_position;
    }

    /**
     * Get the [contactparticular_note] column value.
     *
     * @return string
     */
    public function getContactparticularNote()
    {

        return $this->contactparticular_note;
    }

    /**
     * Get the [contactparticular_email] column value.
     *
     * @return string
     */
    public function getContactparticularEmail()
    {

        return $this->contactparticular_email;
    }

    /**
     * Get the [contactparticular_email2] column value.
     *
     * @return string
     */
    public function getContactparticularEmail2()
    {

        return $this->contactparticular_email2;
    }

    /**
     * Get the [contactparticular_address] column value.
     *
     * @return string
     */
    public function getContactparticularAddress()
    {

        return $this->contactparticular_address;
    }

    /**
     * Get the [contactparticular_address2] column value.
     *
     * @return string
     */
    public function getContactparticularAddress2()
    {

        return $this->contactparticular_address2;
    }

    /**
     * Get the [contactparticular_city] column value.
     *
     * @return string
     */
    public function getContactparticularCity()
    {

        return $this->contactparticular_city;
    }

    /**
     * Get the [contactparticular_state] column value.
     *
     * @return string
     */
    public function getContactparticularState()
    {

        return $this->contactparticular_state;
    }

    /**
     * Get the [contactparticular_zipcode] column value.
     *
     * @return string
     */
    public function getContactparticularZipcode()
    {

        return $this->contactparticular_zipcode;
    }

    /**
     * Get the [optionally formatted] temporal [contactparticular_lastupdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getContactparticularLastupdate($format = 'Y-m-d H:i:s')
    {
        if ($this->contactparticular_lastupdate === null) {
            return null;
        }

        if ($this->contactparticular_lastupdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->contactparticular_lastupdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->contactparticular_lastupdate, true), $x);
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
     * Set the value of [idcontactparticular] column.
     *
     * @param  int $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setIdcontactparticular($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcontactparticular !== $v) {
            $this->idcontactparticular = $v;
            $this->modifiedColumns[] = ContactparticularPeer::IDCONTACTPARTICULAR;
        }


        return $this;
    } // setIdcontactparticular()

    /**
     * Set the value of [idcontactgeneral] column.
     *
     * @param  int $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setIdcontactgeneral($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcontactgeneral !== $v) {
            $this->idcontactgeneral = $v;
            $this->modifiedColumns[] = ContactparticularPeer::IDCONTACTGENERAL;
        }

        if ($this->aContactgeneral !== null && $this->aContactgeneral->getIdcontactgeneral() !== $v) {
            $this->aContactgeneral = null;
        }


        return $this;
    } // setIdcontactgeneral()

    /**
     * Set the value of [contactparticular_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_iso_codecountry !== $v) {
            $this->contactparticular_iso_codecountry = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY;
        }


        return $this;
    } // setContactparticularIsoCodecountry()

    /**
     * Set the value of [contactparticular_name] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_name !== $v) {
            $this->contactparticular_name = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_NAME;
        }


        return $this;
    } // setContactparticularName()

    /**
     * Set the value of [contactparticular_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_iso_codephone !== $v) {
            $this->contactparticular_iso_codephone = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE;
        }


        return $this;
    } // setContactparticularIsoCodephone()

    /**
     * Set the value of [contactparticular_cellular] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_cellular !== $v) {
            $this->contactparticular_cellular = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_CELLULAR;
        }


        return $this;
    } // setContactparticularCellular()

    /**
     * Set the value of [contactparticular_phone] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_phone !== $v) {
            $this->contactparticular_phone = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_PHONE;
        }


        return $this;
    } // setContactparticularPhone()

    /**
     * Set the value of [contactparticular_phone_extention] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularPhoneExtention($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_phone_extention !== $v) {
            $this->contactparticular_phone_extention = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION;
        }


        return $this;
    } // setContactparticularPhoneExtention()

    /**
     * Set the value of [contactparticular_position] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularPosition($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_position !== $v) {
            $this->contactparticular_position = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_POSITION;
        }


        return $this;
    } // setContactparticularPosition()

    /**
     * Set the value of [contactparticular_note] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_note !== $v) {
            $this->contactparticular_note = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_NOTE;
        }


        return $this;
    } // setContactparticularNote()

    /**
     * Set the value of [contactparticular_email] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_email !== $v) {
            $this->contactparticular_email = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_EMAIL;
        }


        return $this;
    } // setContactparticularEmail()

    /**
     * Set the value of [contactparticular_email2] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularEmail2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_email2 !== $v) {
            $this->contactparticular_email2 = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_EMAIL2;
        }


        return $this;
    } // setContactparticularEmail2()

    /**
     * Set the value of [contactparticular_address] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_address !== $v) {
            $this->contactparticular_address = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_ADDRESS;
        }


        return $this;
    } // setContactparticularAddress()

    /**
     * Set the value of [contactparticular_address2] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_address2 !== $v) {
            $this->contactparticular_address2 = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2;
        }


        return $this;
    } // setContactparticularAddress2()

    /**
     * Set the value of [contactparticular_city] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_city !== $v) {
            $this->contactparticular_city = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_CITY;
        }


        return $this;
    } // setContactparticularCity()

    /**
     * Set the value of [contactparticular_state] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_state !== $v) {
            $this->contactparticular_state = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_STATE;
        }


        return $this;
    } // setContactparticularState()

    /**
     * Set the value of [contactparticular_zipcode] column.
     *
     * @param  string $v new value
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactparticular_zipcode !== $v) {
            $this->contactparticular_zipcode = $v;
            $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE;
        }


        return $this;
    } // setContactparticularZipcode()

    /**
     * Sets the value of [contactparticular_lastupdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contactparticular The current object (for fluent API support)
     */
    public function setContactparticularLastupdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->contactparticular_lastupdate !== null || $dt !== null) {
            $currentDateAsString = ($this->contactparticular_lastupdate !== null && $tmpDt = new DateTime($this->contactparticular_lastupdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->contactparticular_lastupdate = $newDateAsString;
                $this->modifiedColumns[] = ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE;
            }
        } // if either are not null


        return $this;
    } // setContactparticularLastupdate()

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

            $this->idcontactparticular = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcontactgeneral = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->contactparticular_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->contactparticular_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->contactparticular_iso_codephone = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->contactparticular_cellular = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->contactparticular_phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->contactparticular_phone_extention = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->contactparticular_position = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->contactparticular_note = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->contactparticular_email = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->contactparticular_email2 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->contactparticular_address = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->contactparticular_address2 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->contactparticular_city = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->contactparticular_state = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->contactparticular_zipcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->contactparticular_lastupdate = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 18; // 18 = ContactparticularPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Contactparticular object", $e);
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

        if ($this->aContactgeneral !== null && $this->idcontactgeneral !== $this->aContactgeneral->getIdcontactgeneral()) {
            $this->aContactgeneral = null;
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
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ContactparticularPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aContactgeneral = null;
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
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ContactparticularQuery::create()
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
            $con = Propel::getConnection(ContactparticularPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ContactparticularPeer::addInstanceToPool($this);
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

            if ($this->aContactgeneral !== null) {
                if ($this->aContactgeneral->isModified() || $this->aContactgeneral->isNew()) {
                    $affectedRows += $this->aContactgeneral->save($con);
                }
                $this->setContactgeneral($this->aContactgeneral);
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

        $this->modifiedColumns[] = ContactparticularPeer::IDCONTACTPARTICULAR;
        if (null !== $this->idcontactparticular) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContactparticularPeer::IDCONTACTPARTICULAR . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContactparticularPeer::IDCONTACTPARTICULAR)) {
            $modifiedColumns[':p' . $index++]  = '`idcontactparticular`';
        }
        if ($this->isColumnModified(ContactparticularPeer::IDCONTACTGENERAL)) {
            $modifiedColumns[':p' . $index++]  = '`idcontactgeneral`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_iso_codecountry`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_name`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_iso_codephone`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_cellular`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_phone`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_phone_extention`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_POSITION)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_position`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_note`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_email`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_EMAIL2)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_email2`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_address`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_address2`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_city`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_state`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_zipcode`';
        }
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE)) {
            $modifiedColumns[':p' . $index++]  = '`contactparticular_lastupdate`';
        }

        $sql = sprintf(
            'INSERT INTO `contactparticular` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcontactparticular`':
                        $stmt->bindValue($identifier, $this->idcontactparticular, PDO::PARAM_INT);
                        break;
                    case '`idcontactgeneral`':
                        $stmt->bindValue($identifier, $this->idcontactgeneral, PDO::PARAM_INT);
                        break;
                    case '`contactparticular_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->contactparticular_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_name`':
                        $stmt->bindValue($identifier, $this->contactparticular_name, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_iso_codephone`':
                        $stmt->bindValue($identifier, $this->contactparticular_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_cellular`':
                        $stmt->bindValue($identifier, $this->contactparticular_cellular, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_phone`':
                        $stmt->bindValue($identifier, $this->contactparticular_phone, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_phone_extention`':
                        $stmt->bindValue($identifier, $this->contactparticular_phone_extention, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_position`':
                        $stmt->bindValue($identifier, $this->contactparticular_position, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_note`':
                        $stmt->bindValue($identifier, $this->contactparticular_note, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_email`':
                        $stmt->bindValue($identifier, $this->contactparticular_email, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_email2`':
                        $stmt->bindValue($identifier, $this->contactparticular_email2, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_address`':
                        $stmt->bindValue($identifier, $this->contactparticular_address, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_address2`':
                        $stmt->bindValue($identifier, $this->contactparticular_address2, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_city`':
                        $stmt->bindValue($identifier, $this->contactparticular_city, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_state`':
                        $stmt->bindValue($identifier, $this->contactparticular_state, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_zipcode`':
                        $stmt->bindValue($identifier, $this->contactparticular_zipcode, PDO::PARAM_STR);
                        break;
                    case '`contactparticular_lastupdate`':
                        $stmt->bindValue($identifier, $this->contactparticular_lastupdate, PDO::PARAM_STR);
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
        $this->setIdcontactparticular($pk);

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

            if ($this->aContactgeneral !== null) {
                if (!$this->aContactgeneral->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aContactgeneral->getValidationFailures());
                }
            }


            if (($retval = ContactparticularPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ContactparticularPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcontactparticular();
                break;
            case 1:
                return $this->getIdcontactgeneral();
                break;
            case 2:
                return $this->getContactparticularIsoCodecountry();
                break;
            case 3:
                return $this->getContactparticularName();
                break;
            case 4:
                return $this->getContactparticularIsoCodephone();
                break;
            case 5:
                return $this->getContactparticularCellular();
                break;
            case 6:
                return $this->getContactparticularPhone();
                break;
            case 7:
                return $this->getContactparticularPhoneExtention();
                break;
            case 8:
                return $this->getContactparticularPosition();
                break;
            case 9:
                return $this->getContactparticularNote();
                break;
            case 10:
                return $this->getContactparticularEmail();
                break;
            case 11:
                return $this->getContactparticularEmail2();
                break;
            case 12:
                return $this->getContactparticularAddress();
                break;
            case 13:
                return $this->getContactparticularAddress2();
                break;
            case 14:
                return $this->getContactparticularCity();
                break;
            case 15:
                return $this->getContactparticularState();
                break;
            case 16:
                return $this->getContactparticularZipcode();
                break;
            case 17:
                return $this->getContactparticularLastupdate();
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
        if (isset($alreadyDumpedObjects['Contactparticular'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Contactparticular'][$this->getPrimaryKey()] = true;
        $keys = ContactparticularPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcontactparticular(),
            $keys[1] => $this->getIdcontactgeneral(),
            $keys[2] => $this->getContactparticularIsoCodecountry(),
            $keys[3] => $this->getContactparticularName(),
            $keys[4] => $this->getContactparticularIsoCodephone(),
            $keys[5] => $this->getContactparticularCellular(),
            $keys[6] => $this->getContactparticularPhone(),
            $keys[7] => $this->getContactparticularPhoneExtention(),
            $keys[8] => $this->getContactparticularPosition(),
            $keys[9] => $this->getContactparticularNote(),
            $keys[10] => $this->getContactparticularEmail(),
            $keys[11] => $this->getContactparticularEmail2(),
            $keys[12] => $this->getContactparticularAddress(),
            $keys[13] => $this->getContactparticularAddress2(),
            $keys[14] => $this->getContactparticularCity(),
            $keys[15] => $this->getContactparticularState(),
            $keys[16] => $this->getContactparticularZipcode(),
            $keys[17] => $this->getContactparticularLastupdate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aContactgeneral) {
                $result['Contactgeneral'] = $this->aContactgeneral->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ContactparticularPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcontactparticular($value);
                break;
            case 1:
                $this->setIdcontactgeneral($value);
                break;
            case 2:
                $this->setContactparticularIsoCodecountry($value);
                break;
            case 3:
                $this->setContactparticularName($value);
                break;
            case 4:
                $this->setContactparticularIsoCodephone($value);
                break;
            case 5:
                $this->setContactparticularCellular($value);
                break;
            case 6:
                $this->setContactparticularPhone($value);
                break;
            case 7:
                $this->setContactparticularPhoneExtention($value);
                break;
            case 8:
                $this->setContactparticularPosition($value);
                break;
            case 9:
                $this->setContactparticularNote($value);
                break;
            case 10:
                $this->setContactparticularEmail($value);
                break;
            case 11:
                $this->setContactparticularEmail2($value);
                break;
            case 12:
                $this->setContactparticularAddress($value);
                break;
            case 13:
                $this->setContactparticularAddress2($value);
                break;
            case 14:
                $this->setContactparticularCity($value);
                break;
            case 15:
                $this->setContactparticularState($value);
                break;
            case 16:
                $this->setContactparticularZipcode($value);
                break;
            case 17:
                $this->setContactparticularLastupdate($value);
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
        $keys = ContactparticularPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcontactparticular($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcontactgeneral($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setContactparticularIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setContactparticularName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setContactparticularIsoCodephone($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setContactparticularCellular($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setContactparticularPhone($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setContactparticularPhoneExtention($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setContactparticularPosition($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setContactparticularNote($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setContactparticularEmail($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setContactparticularEmail2($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setContactparticularAddress($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setContactparticularAddress2($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setContactparticularCity($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setContactparticularState($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setContactparticularZipcode($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setContactparticularLastupdate($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);

        if ($this->isColumnModified(ContactparticularPeer::IDCONTACTPARTICULAR)) $criteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, $this->idcontactparticular);
        if ($this->isColumnModified(ContactparticularPeer::IDCONTACTGENERAL)) $criteria->add(ContactparticularPeer::IDCONTACTGENERAL, $this->idcontactgeneral);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODECOUNTRY, $this->contactparticular_iso_codecountry);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_NAME)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_NAME, $this->contactparticular_name);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_ISO_CODEPHONE, $this->contactparticular_iso_codephone);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_CELLULAR)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_CELLULAR, $this->contactparticular_cellular);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_PHONE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_PHONE, $this->contactparticular_phone);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_PHONE_EXTENTION, $this->contactparticular_phone_extention);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_POSITION)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_POSITION, $this->contactparticular_position);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_NOTE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_NOTE, $this->contactparticular_note);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_EMAIL)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_EMAIL, $this->contactparticular_email);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_EMAIL2)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_EMAIL2, $this->contactparticular_email2);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS, $this->contactparticular_address);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_ADDRESS2, $this->contactparticular_address2);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_CITY)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_CITY, $this->contactparticular_city);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_STATE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_STATE, $this->contactparticular_state);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_ZIPCODE, $this->contactparticular_zipcode);
        if ($this->isColumnModified(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE)) $criteria->add(ContactparticularPeer::CONTACTPARTICULAR_LASTUPDATE, $this->contactparticular_lastupdate);

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
        $criteria = new Criteria(ContactparticularPeer::DATABASE_NAME);
        $criteria->add(ContactparticularPeer::IDCONTACTPARTICULAR, $this->idcontactparticular);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcontactparticular();
    }

    /**
     * Generic method to set the primary key (idcontactparticular column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcontactparticular($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcontactparticular();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Contactparticular (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcontactgeneral($this->getIdcontactgeneral());
        $copyObj->setContactparticularIsoCodecountry($this->getContactparticularIsoCodecountry());
        $copyObj->setContactparticularName($this->getContactparticularName());
        $copyObj->setContactparticularIsoCodephone($this->getContactparticularIsoCodephone());
        $copyObj->setContactparticularCellular($this->getContactparticularCellular());
        $copyObj->setContactparticularPhone($this->getContactparticularPhone());
        $copyObj->setContactparticularPhoneExtention($this->getContactparticularPhoneExtention());
        $copyObj->setContactparticularPosition($this->getContactparticularPosition());
        $copyObj->setContactparticularNote($this->getContactparticularNote());
        $copyObj->setContactparticularEmail($this->getContactparticularEmail());
        $copyObj->setContactparticularEmail2($this->getContactparticularEmail2());
        $copyObj->setContactparticularAddress($this->getContactparticularAddress());
        $copyObj->setContactparticularAddress2($this->getContactparticularAddress2());
        $copyObj->setContactparticularCity($this->getContactparticularCity());
        $copyObj->setContactparticularState($this->getContactparticularState());
        $copyObj->setContactparticularZipcode($this->getContactparticularZipcode());
        $copyObj->setContactparticularLastupdate($this->getContactparticularLastupdate());

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
            $copyObj->setIdcontactparticular(NULL); // this is a auto-increment column, so set to default value
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
     * @return Contactparticular Clone of current object.
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
     * @return ContactparticularPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ContactparticularPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Contactgeneral object.
     *
     * @param                  Contactgeneral $v
     * @return Contactparticular The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContactgeneral(Contactgeneral $v = null)
    {
        if ($v === null) {
            $this->setIdcontactgeneral(NULL);
        } else {
            $this->setIdcontactgeneral($v->getIdcontactgeneral());
        }

        $this->aContactgeneral = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Contactgeneral object, it will not be re-added.
        if ($v !== null) {
            $v->addContactparticular($this);
        }


        return $this;
    }


    /**
     * Get the associated Contactgeneral object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Contactgeneral The associated Contactgeneral object.
     * @throws PropelException
     */
    public function getContactgeneral(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aContactgeneral === null && ($this->idcontactgeneral !== null) && $doQuery) {
            $this->aContactgeneral = ContactgeneralQuery::create()->findPk($this->idcontactgeneral, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContactgeneral->addContactparticulars($this);
             */
        }

        return $this->aContactgeneral;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcontactparticular = null;
        $this->idcontactgeneral = null;
        $this->contactparticular_iso_codecountry = null;
        $this->contactparticular_name = null;
        $this->contactparticular_iso_codephone = null;
        $this->contactparticular_cellular = null;
        $this->contactparticular_phone = null;
        $this->contactparticular_phone_extention = null;
        $this->contactparticular_position = null;
        $this->contactparticular_note = null;
        $this->contactparticular_email = null;
        $this->contactparticular_email2 = null;
        $this->contactparticular_address = null;
        $this->contactparticular_address2 = null;
        $this->contactparticular_city = null;
        $this->contactparticular_state = null;
        $this->contactparticular_zipcode = null;
        $this->contactparticular_lastupdate = null;
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
            if ($this->aContactgeneral instanceof Persistent) {
              $this->aContactgeneral->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aContactgeneral = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ContactparticularPeer::DEFAULT_STRING_FORMAT);
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
