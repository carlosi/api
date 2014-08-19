<?php


/**
 * Base class that represents a row from the 'contactgeneral' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseContactgeneral extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ContactgeneralPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ContactgeneralPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcontactgeneral field.
     * @var        int
     */
    protected $idcontactgeneral;

    /**
     * The value for the idcontactgroup field.
     * @var        int
     */
    protected $idcontactgroup;

    /**
     * The value for the contactgeneral_name field.
     * @var        string
     */
    protected $contactgeneral_name;

    /**
     * The value for the contactgeneral_iso_codephone field.
     * @var        string
     */
    protected $contactgeneral_iso_codephone;

    /**
     * The value for the contactgeneral_phone field.
     * @var        string
     */
    protected $contactgeneral_phone;

    /**
     * The value for the contactgeneral_email field.
     * @var        string
     */
    protected $contactgeneral_email;

    /**
     * The value for the contactgeneral_address field.
     * @var        string
     */
    protected $contactgeneral_address;

    /**
     * The value for the contactgeneral_address2 field.
     * @var        string
     */
    protected $contactgeneral_address2;

    /**
     * The value for the contactgeneral_city field.
     * @var        string
     */
    protected $contactgeneral_city;

    /**
     * The value for the contactgeneral_statate field.
     * @var        string
     */
    protected $contactgeneral_statate;

    /**
     * The value for the contactgeneral_iso_codecountry field.
     * @var        string
     */
    protected $contactgeneral_iso_codecountry;

    /**
     * The value for the contactgeneral_zipcode field.
     * @var        string
     */
    protected $contactgeneral_zipcode;

    /**
     * The value for the contactgeneral_lastupdate field.
     * @var        string
     */
    protected $contactgeneral_lastupdate;

    /**
     * @var        Contactgroup
     */
    protected $aContactgroup;

    /**
     * @var        PropelObjectCollection|Contactparticular[] Collection to store aggregation of Contactparticular objects.
     */
    protected $collContactparticulars;
    protected $collContactparticularsPartial;

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
    protected $contactparticularsScheduledForDeletion = null;

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
     * Get the [idcontactgroup] column value.
     *
     * @return int
     */
    public function getIdcontactgroup()
    {

        return $this->idcontactgroup;
    }

    /**
     * Get the [contactgeneral_name] column value.
     *
     * @return string
     */
    public function getContactgeneralName()
    {

        return $this->contactgeneral_name;
    }

    /**
     * Get the [contactgeneral_iso_codephone] column value.
     *
     * @return string
     */
    public function getContactgeneralIsoCodephone()
    {

        return $this->contactgeneral_iso_codephone;
    }

    /**
     * Get the [contactgeneral_phone] column value.
     *
     * @return string
     */
    public function getContactgeneralPhone()
    {

        return $this->contactgeneral_phone;
    }

    /**
     * Get the [contactgeneral_email] column value.
     *
     * @return string
     */
    public function getContactgeneralEmail()
    {

        return $this->contactgeneral_email;
    }

    /**
     * Get the [contactgeneral_address] column value.
     *
     * @return string
     */
    public function getContactgeneralAddress()
    {

        return $this->contactgeneral_address;
    }

    /**
     * Get the [contactgeneral_address2] column value.
     *
     * @return string
     */
    public function getContactgeneralAddress2()
    {

        return $this->contactgeneral_address2;
    }

    /**
     * Get the [contactgeneral_city] column value.
     *
     * @return string
     */
    public function getContactgeneralCity()
    {

        return $this->contactgeneral_city;
    }

    /**
     * Get the [contactgeneral_statate] column value.
     *
     * @return string
     */
    public function getContactgeneralStatate()
    {

        return $this->contactgeneral_statate;
    }

    /**
     * Get the [contactgeneral_iso_codecountry] column value.
     *
     * @return string
     */
    public function getContactgeneralIsoCodecountry()
    {

        return $this->contactgeneral_iso_codecountry;
    }

    /**
     * Get the [contactgeneral_zipcode] column value.
     *
     * @return string
     */
    public function getContactgeneralZipcode()
    {

        return $this->contactgeneral_zipcode;
    }

    /**
     * Get the [optionally formatted] temporal [contactgeneral_lastupdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getContactgeneralLastupdate($format = 'Y-m-d H:i:s')
    {
        if ($this->contactgeneral_lastupdate === null) {
            return null;
        }

        if ($this->contactgeneral_lastupdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->contactgeneral_lastupdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->contactgeneral_lastupdate, true), $x);
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
     * Set the value of [idcontactgeneral] column.
     *
     * @param  int $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setIdcontactgeneral($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcontactgeneral !== $v) {
            $this->idcontactgeneral = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::IDCONTACTGENERAL;
        }


        return $this;
    } // setIdcontactgeneral()

    /**
     * Set the value of [idcontactgroup] column.
     *
     * @param  int $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setIdcontactgroup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcontactgroup !== $v) {
            $this->idcontactgroup = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::IDCONTACTGROUP;
        }

        if ($this->aContactgroup !== null && $this->aContactgroup->getIdcontactgroup() !== $v) {
            $this->aContactgroup = null;
        }


        return $this;
    } // setIdcontactgroup()

    /**
     * Set the value of [contactgeneral_name] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_name !== $v) {
            $this->contactgeneral_name = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_NAME;
        }


        return $this;
    } // setContactgeneralName()

    /**
     * Set the value of [contactgeneral_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_iso_codephone !== $v) {
            $this->contactgeneral_iso_codephone = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE;
        }


        return $this;
    } // setContactgeneralIsoCodephone()

    /**
     * Set the value of [contactgeneral_phone] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_phone !== $v) {
            $this->contactgeneral_phone = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_PHONE;
        }


        return $this;
    } // setContactgeneralPhone()

    /**
     * Set the value of [contactgeneral_email] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_email !== $v) {
            $this->contactgeneral_email = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_EMAIL;
        }


        return $this;
    } // setContactgeneralEmail()

    /**
     * Set the value of [contactgeneral_address] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_address !== $v) {
            $this->contactgeneral_address = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_ADDRESS;
        }


        return $this;
    } // setContactgeneralAddress()

    /**
     * Set the value of [contactgeneral_address2] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_address2 !== $v) {
            $this->contactgeneral_address2 = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_ADDRESS2;
        }


        return $this;
    } // setContactgeneralAddress2()

    /**
     * Set the value of [contactgeneral_city] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_city !== $v) {
            $this->contactgeneral_city = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_CITY;
        }


        return $this;
    } // setContactgeneralCity()

    /**
     * Set the value of [contactgeneral_statate] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralStatate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_statate !== $v) {
            $this->contactgeneral_statate = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_STATATE;
        }


        return $this;
    } // setContactgeneralStatate()

    /**
     * Set the value of [contactgeneral_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_iso_codecountry !== $v) {
            $this->contactgeneral_iso_codecountry = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY;
        }


        return $this;
    } // setContactgeneralIsoCodecountry()

    /**
     * Set the value of [contactgeneral_zipcode] column.
     *
     * @param  string $v new value
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contactgeneral_zipcode !== $v) {
            $this->contactgeneral_zipcode = $v;
            $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_ZIPCODE;
        }


        return $this;
    } // setContactgeneralZipcode()

    /**
     * Sets the value of [contactgeneral_lastupdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactgeneralLastupdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->contactgeneral_lastupdate !== null || $dt !== null) {
            $currentDateAsString = ($this->contactgeneral_lastupdate !== null && $tmpDt = new DateTime($this->contactgeneral_lastupdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->contactgeneral_lastupdate = $newDateAsString;
                $this->modifiedColumns[] = ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE;
            }
        } // if either are not null


        return $this;
    } // setContactgeneralLastupdate()

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

            $this->idcontactgeneral = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcontactgroup = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->contactgeneral_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->contactgeneral_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->contactgeneral_phone = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->contactgeneral_email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->contactgeneral_address = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->contactgeneral_address2 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->contactgeneral_city = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->contactgeneral_statate = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->contactgeneral_iso_codecountry = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->contactgeneral_zipcode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->contactgeneral_lastupdate = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = ContactgeneralPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Contactgeneral object", $e);
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

        if ($this->aContactgroup !== null && $this->idcontactgroup !== $this->aContactgroup->getIdcontactgroup()) {
            $this->aContactgroup = null;
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
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ContactgeneralPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aContactgroup = null;
            $this->collContactparticulars = null;

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
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ContactgeneralQuery::create()
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
            $con = Propel::getConnection(ContactgeneralPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ContactgeneralPeer::addInstanceToPool($this);
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

            if ($this->aContactgroup !== null) {
                if ($this->aContactgroup->isModified() || $this->aContactgroup->isNew()) {
                    $affectedRows += $this->aContactgroup->save($con);
                }
                $this->setContactgroup($this->aContactgroup);
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

            if ($this->contactparticularsScheduledForDeletion !== null) {
                if (!$this->contactparticularsScheduledForDeletion->isEmpty()) {
                    ContactparticularQuery::create()
                        ->filterByPrimaryKeys($this->contactparticularsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contactparticularsScheduledForDeletion = null;
                }
            }

            if ($this->collContactparticulars !== null) {
                foreach ($this->collContactparticulars as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContactgeneralPeer::IDCONTACTGENERAL)) {
            $modifiedColumns[':p' . $index++]  = '`idcontactgeneral`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::IDCONTACTGROUP)) {
            $modifiedColumns[':p' . $index++]  = '`idcontactgroup`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_name`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_iso_codephone`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_phone`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_email`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_address`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_address2`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_city`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_STATATE)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_statate`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_iso_codecountry`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_zipcode`';
        }
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE)) {
            $modifiedColumns[':p' . $index++]  = '`contactgeneral_lastupdate`';
        }

        $sql = sprintf(
            'INSERT INTO `contactgeneral` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcontactgeneral`':
                        $stmt->bindValue($identifier, $this->idcontactgeneral, PDO::PARAM_INT);
                        break;
                    case '`idcontactgroup`':
                        $stmt->bindValue($identifier, $this->idcontactgroup, PDO::PARAM_INT);
                        break;
                    case '`contactgeneral_name`':
                        $stmt->bindValue($identifier, $this->contactgeneral_name, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_iso_codephone`':
                        $stmt->bindValue($identifier, $this->contactgeneral_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_phone`':
                        $stmt->bindValue($identifier, $this->contactgeneral_phone, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_email`':
                        $stmt->bindValue($identifier, $this->contactgeneral_email, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_address`':
                        $stmt->bindValue($identifier, $this->contactgeneral_address, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_address2`':
                        $stmt->bindValue($identifier, $this->contactgeneral_address2, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_city`':
                        $stmt->bindValue($identifier, $this->contactgeneral_city, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_statate`':
                        $stmt->bindValue($identifier, $this->contactgeneral_statate, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->contactgeneral_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_zipcode`':
                        $stmt->bindValue($identifier, $this->contactgeneral_zipcode, PDO::PARAM_STR);
                        break;
                    case '`contactgeneral_lastupdate`':
                        $stmt->bindValue($identifier, $this->contactgeneral_lastupdate, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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

            if ($this->aContactgroup !== null) {
                if (!$this->aContactgroup->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aContactgroup->getValidationFailures());
                }
            }


            if (($retval = ContactgeneralPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collContactparticulars !== null) {
                    foreach ($this->collContactparticulars as $referrerFK) {
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
        $pos = ContactgeneralPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcontactgeneral();
                break;
            case 1:
                return $this->getIdcontactgroup();
                break;
            case 2:
                return $this->getContactgeneralName();
                break;
            case 3:
                return $this->getContactgeneralIsoCodephone();
                break;
            case 4:
                return $this->getContactgeneralPhone();
                break;
            case 5:
                return $this->getContactgeneralEmail();
                break;
            case 6:
                return $this->getContactgeneralAddress();
                break;
            case 7:
                return $this->getContactgeneralAddress2();
                break;
            case 8:
                return $this->getContactgeneralCity();
                break;
            case 9:
                return $this->getContactgeneralStatate();
                break;
            case 10:
                return $this->getContactgeneralIsoCodecountry();
                break;
            case 11:
                return $this->getContactgeneralZipcode();
                break;
            case 12:
                return $this->getContactgeneralLastupdate();
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
        if (isset($alreadyDumpedObjects['Contactgeneral'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Contactgeneral'][$this->getPrimaryKey()] = true;
        $keys = ContactgeneralPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcontactgeneral(),
            $keys[1] => $this->getIdcontactgroup(),
            $keys[2] => $this->getContactgeneralName(),
            $keys[3] => $this->getContactgeneralIsoCodephone(),
            $keys[4] => $this->getContactgeneralPhone(),
            $keys[5] => $this->getContactgeneralEmail(),
            $keys[6] => $this->getContactgeneralAddress(),
            $keys[7] => $this->getContactgeneralAddress2(),
            $keys[8] => $this->getContactgeneralCity(),
            $keys[9] => $this->getContactgeneralStatate(),
            $keys[10] => $this->getContactgeneralIsoCodecountry(),
            $keys[11] => $this->getContactgeneralZipcode(),
            $keys[12] => $this->getContactgeneralLastupdate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aContactgroup) {
                $result['Contactgroup'] = $this->aContactgroup->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collContactparticulars) {
                $result['Contactparticulars'] = $this->collContactparticulars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ContactgeneralPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcontactgeneral($value);
                break;
            case 1:
                $this->setIdcontactgroup($value);
                break;
            case 2:
                $this->setContactgeneralName($value);
                break;
            case 3:
                $this->setContactgeneralIsoCodephone($value);
                break;
            case 4:
                $this->setContactgeneralPhone($value);
                break;
            case 5:
                $this->setContactgeneralEmail($value);
                break;
            case 6:
                $this->setContactgeneralAddress($value);
                break;
            case 7:
                $this->setContactgeneralAddress2($value);
                break;
            case 8:
                $this->setContactgeneralCity($value);
                break;
            case 9:
                $this->setContactgeneralStatate($value);
                break;
            case 10:
                $this->setContactgeneralIsoCodecountry($value);
                break;
            case 11:
                $this->setContactgeneralZipcode($value);
                break;
            case 12:
                $this->setContactgeneralLastupdate($value);
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
        $keys = ContactgeneralPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcontactgeneral($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcontactgroup($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setContactgeneralName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setContactgeneralIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setContactgeneralPhone($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setContactgeneralEmail($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setContactgeneralAddress($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setContactgeneralAddress2($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setContactgeneralCity($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setContactgeneralStatate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setContactgeneralIsoCodecountry($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setContactgeneralZipcode($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setContactgeneralLastupdate($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);

        if ($this->isColumnModified(ContactgeneralPeer::IDCONTACTGENERAL)) $criteria->add(ContactgeneralPeer::IDCONTACTGENERAL, $this->idcontactgeneral);
        if ($this->isColumnModified(ContactgeneralPeer::IDCONTACTGROUP)) $criteria->add(ContactgeneralPeer::IDCONTACTGROUP, $this->idcontactgroup);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_NAME)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_NAME, $this->contactgeneral_name);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_ISO_CODEPHONE, $this->contactgeneral_iso_codephone);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_PHONE)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_PHONE, $this->contactgeneral_phone);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_EMAIL)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_EMAIL, $this->contactgeneral_email);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ADDRESS)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_ADDRESS, $this->contactgeneral_address);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ADDRESS2)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_ADDRESS2, $this->contactgeneral_address2);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_CITY)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_CITY, $this->contactgeneral_city);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_STATATE)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_STATATE, $this->contactgeneral_statate);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_ISO_CODECOUNTRY, $this->contactgeneral_iso_codecountry);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_ZIPCODE)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_ZIPCODE, $this->contactgeneral_zipcode);
        if ($this->isColumnModified(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE)) $criteria->add(ContactgeneralPeer::CONTACTGENERAL_LASTUPDATE, $this->contactgeneral_lastupdate);

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
        $criteria = new Criteria(ContactgeneralPeer::DATABASE_NAME);
        $criteria->add(ContactgeneralPeer::IDCONTACTGENERAL, $this->idcontactgeneral);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcontactgeneral();
    }

    /**
     * Generic method to set the primary key (idcontactgeneral column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcontactgeneral($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcontactgeneral();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Contactgeneral (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcontactgroup($this->getIdcontactgroup());
        $copyObj->setContactgeneralName($this->getContactgeneralName());
        $copyObj->setContactgeneralIsoCodephone($this->getContactgeneralIsoCodephone());
        $copyObj->setContactgeneralPhone($this->getContactgeneralPhone());
        $copyObj->setContactgeneralEmail($this->getContactgeneralEmail());
        $copyObj->setContactgeneralAddress($this->getContactgeneralAddress());
        $copyObj->setContactgeneralAddress2($this->getContactgeneralAddress2());
        $copyObj->setContactgeneralCity($this->getContactgeneralCity());
        $copyObj->setContactgeneralStatate($this->getContactgeneralStatate());
        $copyObj->setContactgeneralIsoCodecountry($this->getContactgeneralIsoCodecountry());
        $copyObj->setContactgeneralZipcode($this->getContactgeneralZipcode());
        $copyObj->setContactgeneralLastupdate($this->getContactgeneralLastupdate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getContactparticulars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactparticular($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcontactgeneral(NULL); // this is a auto-increment column, so set to default value
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
     * @return Contactgeneral Clone of current object.
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
     * @return ContactgeneralPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ContactgeneralPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Contactgroup object.
     *
     * @param                  Contactgroup $v
     * @return Contactgeneral The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContactgroup(Contactgroup $v = null)
    {
        if ($v === null) {
            $this->setIdcontactgroup(NULL);
        } else {
            $this->setIdcontactgroup($v->getIdcontactgroup());
        }

        $this->aContactgroup = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Contactgroup object, it will not be re-added.
        if ($v !== null) {
            $v->addContactgeneral($this);
        }


        return $this;
    }


    /**
     * Get the associated Contactgroup object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Contactgroup The associated Contactgroup object.
     * @throws PropelException
     */
    public function getContactgroup(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aContactgroup === null && ($this->idcontactgroup !== null) && $doQuery) {
            $this->aContactgroup = ContactgroupQuery::create()->findPk($this->idcontactgroup, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContactgroup->addContactgenerals($this);
             */
        }

        return $this->aContactgroup;
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
        if ('Contactparticular' == $relationName) {
            $this->initContactparticulars();
        }
    }

    /**
     * Clears out the collContactparticulars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Contactgeneral The current object (for fluent API support)
     * @see        addContactparticulars()
     */
    public function clearContactparticulars()
    {
        $this->collContactparticulars = null; // important to set this to null since that means it is uninitialized
        $this->collContactparticularsPartial = null;

        return $this;
    }

    /**
     * reset is the collContactparticulars collection loaded partially
     *
     * @return void
     */
    public function resetPartialContactparticulars($v = true)
    {
        $this->collContactparticularsPartial = $v;
    }

    /**
     * Initializes the collContactparticulars collection.
     *
     * By default this just sets the collContactparticulars collection to an empty array (like clearcollContactparticulars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactparticulars($overrideExisting = true)
    {
        if (null !== $this->collContactparticulars && !$overrideExisting) {
            return;
        }
        $this->collContactparticulars = new PropelObjectCollection();
        $this->collContactparticulars->setModel('Contactparticular');
    }

    /**
     * Gets an array of Contactparticular objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contactgeneral is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Contactparticular[] List of Contactparticular objects
     * @throws PropelException
     */
    public function getContactparticulars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collContactparticularsPartial && !$this->isNew();
        if (null === $this->collContactparticulars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collContactparticulars) {
                // return empty collection
                $this->initContactparticulars();
            } else {
                $collContactparticulars = ContactparticularQuery::create(null, $criteria)
                    ->filterByContactgeneral($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collContactparticularsPartial && count($collContactparticulars)) {
                      $this->initContactparticulars(false);

                      foreach ($collContactparticulars as $obj) {
                        if (false == $this->collContactparticulars->contains($obj)) {
                          $this->collContactparticulars->append($obj);
                        }
                      }

                      $this->collContactparticularsPartial = true;
                    }

                    $collContactparticulars->getInternalIterator()->rewind();

                    return $collContactparticulars;
                }

                if ($partial && $this->collContactparticulars) {
                    foreach ($this->collContactparticulars as $obj) {
                        if ($obj->isNew()) {
                            $collContactparticulars[] = $obj;
                        }
                    }
                }

                $this->collContactparticulars = $collContactparticulars;
                $this->collContactparticularsPartial = false;
            }
        }

        return $this->collContactparticulars;
    }

    /**
     * Sets a collection of Contactparticular objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $contactparticulars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function setContactparticulars(PropelCollection $contactparticulars, PropelPDO $con = null)
    {
        $contactparticularsToDelete = $this->getContactparticulars(new Criteria(), $con)->diff($contactparticulars);


        $this->contactparticularsScheduledForDeletion = $contactparticularsToDelete;

        foreach ($contactparticularsToDelete as $contactparticularRemoved) {
            $contactparticularRemoved->setContactgeneral(null);
        }

        $this->collContactparticulars = null;
        foreach ($contactparticulars as $contactparticular) {
            $this->addContactparticular($contactparticular);
        }

        $this->collContactparticulars = $contactparticulars;
        $this->collContactparticularsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Contactparticular objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Contactparticular objects.
     * @throws PropelException
     */
    public function countContactparticulars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collContactparticularsPartial && !$this->isNew();
        if (null === $this->collContactparticulars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collContactparticulars) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getContactparticulars());
            }
            $query = ContactparticularQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByContactgeneral($this)
                ->count($con);
        }

        return count($this->collContactparticulars);
    }

    /**
     * Method called to associate a Contactparticular object to this object
     * through the Contactparticular foreign key attribute.
     *
     * @param    Contactparticular $l Contactparticular
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function addContactparticular(Contactparticular $l)
    {
        if ($this->collContactparticulars === null) {
            $this->initContactparticulars();
            $this->collContactparticularsPartial = true;
        }

        if (!in_array($l, $this->collContactparticulars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddContactparticular($l);

            if ($this->contactparticularsScheduledForDeletion and $this->contactparticularsScheduledForDeletion->contains($l)) {
                $this->contactparticularsScheduledForDeletion->remove($this->contactparticularsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Contactparticular $contactparticular The contactparticular object to add.
     */
    protected function doAddContactparticular($contactparticular)
    {
        $this->collContactparticulars[]= $contactparticular;
        $contactparticular->setContactgeneral($this);
    }

    /**
     * @param	Contactparticular $contactparticular The contactparticular object to remove.
     * @return Contactgeneral The current object (for fluent API support)
     */
    public function removeContactparticular($contactparticular)
    {
        if ($this->getContactparticulars()->contains($contactparticular)) {
            $this->collContactparticulars->remove($this->collContactparticulars->search($contactparticular));
            if (null === $this->contactparticularsScheduledForDeletion) {
                $this->contactparticularsScheduledForDeletion = clone $this->collContactparticulars;
                $this->contactparticularsScheduledForDeletion->clear();
            }
            $this->contactparticularsScheduledForDeletion[]= clone $contactparticular;
            $contactparticular->setContactgeneral(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcontactgeneral = null;
        $this->idcontactgroup = null;
        $this->contactgeneral_name = null;
        $this->contactgeneral_iso_codephone = null;
        $this->contactgeneral_phone = null;
        $this->contactgeneral_email = null;
        $this->contactgeneral_address = null;
        $this->contactgeneral_address2 = null;
        $this->contactgeneral_city = null;
        $this->contactgeneral_statate = null;
        $this->contactgeneral_iso_codecountry = null;
        $this->contactgeneral_zipcode = null;
        $this->contactgeneral_lastupdate = null;
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
            if ($this->collContactparticulars) {
                foreach ($this->collContactparticulars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aContactgroup instanceof Persistent) {
              $this->aContactgroup->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collContactparticulars instanceof PropelCollection) {
            $this->collContactparticulars->clearIterator();
        }
        $this->collContactparticulars = null;
        $this->aContactgroup = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ContactgeneralPeer::DEFAULT_STRING_FORMAT);
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
