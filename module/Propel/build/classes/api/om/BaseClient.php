<?php


/**
 * Base class that represents a row from the 'client' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClient extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ClientPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the client_iso_codecountry field.
     * @var        string
     */
    protected $client_iso_codecountry;

    /**
     * The value for the client_iso_codephone field.
     * @var        string
     */
    protected $client_iso_codephone;

    /**
     * The value for the client_fullname field.
     * @var        string
     */
    protected $client_fullname;

    /**
     * The value for the client_email field.
     * @var        string
     */
    protected $client_email;

    /**
     * The value for the client_email2 field.
     * @var        string
     */
    protected $client_email2;

    /**
     * The value for the client_password field.
     * @var        string
     */
    protected $client_password;

    /**
     * The value for the client_cellular field.
     * @var        string
     */
    protected $client_cellular;

    /**
     * The value for the client_phone field.
     * @var        string
     */
    protected $client_phone;

    /**
     * The value for the client_language field.
     * @var        string
     */
    protected $client_language;

    /**
     * The value for the client_status field.
     * @var        string
     */
    protected $client_status;

    /**
     * The value for the client_type field.
     * Note: this column has a database default value of: 'NORMAL'
     * @var        string
     */
    protected $client_type;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|Clientaddress[] Collection to store aggregation of Clientaddress objects.
     */
    protected $collClientaddresss;
    protected $collClientaddresssPartial;

    /**
     * @var        PropelObjectCollection|Clientcomment[] Collection to store aggregation of Clientcomment objects.
     */
    protected $collClientcomments;
    protected $collClientcommentsPartial;

    /**
     * @var        PropelObjectCollection|Clientfile[] Collection to store aggregation of Clientfile objects.
     */
    protected $collClientfiles;
    protected $collClientfilesPartial;

    /**
     * @var        PropelObjectCollection|Clienttax[] Collection to store aggregation of Clienttax objects.
     */
    protected $collClienttaxs;
    protected $collClienttaxsPartial;

    /**
     * @var        PropelObjectCollection|Order[] Collection to store aggregation of Order objects.
     */
    protected $collOrders;
    protected $collOrdersPartial;

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
    protected $clientaddresssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientcommentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientfilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clienttaxsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordersScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->client_type = 'NORMAL';
    }

    /**
     * Initializes internal state of BaseClient object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idclient] column value.
     *
     * @return int
     */
    public function getIdclient()
    {

        return $this->idclient;
    }

    /**
     * Get the [idcompany] column value.
     *
     * @return int
     */
    public function getIdcompany()
    {

        return $this->idcompany;
    }

    /**
     * Get the [client_iso_codecountry] column value.
     *
     * @return string
     */
    public function getClientIsoCodecountry()
    {

        return $this->client_iso_codecountry;
    }

    /**
     * Get the [client_iso_codephone] column value.
     *
     * @return string
     */
    public function getClientIsoCodephone()
    {

        return $this->client_iso_codephone;
    }

    /**
     * Get the [client_fullname] column value.
     *
     * @return string
     */
    public function getClientFullname()
    {

        return $this->client_fullname;
    }

    /**
     * Get the [client_email] column value.
     *
     * @return string
     */
    public function getClientEmail()
    {

        return $this->client_email;
    }

    /**
     * Get the [client_email2] column value.
     *
     * @return string
     */
    public function getClientEmail2()
    {

        return $this->client_email2;
    }

    /**
     * Get the [client_password] column value.
     *
     * @return string
     */
    public function getClientPassword()
    {

        return $this->client_password;
    }

    /**
     * Get the [client_cellular] column value.
     *
     * @return string
     */
    public function getClientCellular()
    {

        return $this->client_cellular;
    }

    /**
     * Get the [client_phone] column value.
     *
     * @return string
     */
    public function getClientPhone()
    {

        return $this->client_phone;
    }

    /**
     * Get the [client_language] column value.
     *
     * @return string
     */
    public function getClientLanguage()
    {

        return $this->client_language;
    }

    /**
     * Get the [client_status] column value.
     *
     * @return string
     */
    public function getClientStatus()
    {

        return $this->client_status;
    }

    /**
     * Get the [client_type] column value.
     *
     * @return string
     */
    public function getClientType()
    {

        return $this->client_type;
    }

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = ClientPeer::IDCLIENT;
        }


        return $this;
    } // setIdclient()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = ClientPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [client_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_iso_codecountry !== $v) {
            $this->client_iso_codecountry = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_ISO_CODECOUNTRY;
        }


        return $this;
    } // setClientIsoCodecountry()

    /**
     * Set the value of [client_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_iso_codephone !== $v) {
            $this->client_iso_codephone = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_ISO_CODEPHONE;
        }


        return $this;
    } // setClientIsoCodephone()

    /**
     * Set the value of [client_fullname] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientFullname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_fullname !== $v) {
            $this->client_fullname = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_FULLNAME;
        }


        return $this;
    } // setClientFullname()

    /**
     * Set the value of [client_email] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_email !== $v) {
            $this->client_email = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_EMAIL;
        }


        return $this;
    } // setClientEmail()

    /**
     * Set the value of [client_email2] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientEmail2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_email2 !== $v) {
            $this->client_email2 = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_EMAIL2;
        }


        return $this;
    } // setClientEmail2()

    /**
     * Set the value of [client_password] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_password !== $v) {
            $this->client_password = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_PASSWORD;
        }


        return $this;
    } // setClientPassword()

    /**
     * Set the value of [client_cellular] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_cellular !== $v) {
            $this->client_cellular = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_CELLULAR;
        }


        return $this;
    } // setClientCellular()

    /**
     * Set the value of [client_phone] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_phone !== $v) {
            $this->client_phone = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_PHONE;
        }


        return $this;
    } // setClientPhone()

    /**
     * Set the value of [client_language] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientLanguage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_language !== $v) {
            $this->client_language = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_LANGUAGE;
        }


        return $this;
    } // setClientLanguage()

    /**
     * Set the value of [client_status] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_status !== $v) {
            $this->client_status = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_STATUS;
        }


        return $this;
    } // setClientStatus()

    /**
     * Set the value of [client_type] column.
     *
     * @param  string $v new value
     * @return Client The current object (for fluent API support)
     */
    public function setClientType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->client_type !== $v) {
            $this->client_type = $v;
            $this->modifiedColumns[] = ClientPeer::CLIENT_TYPE;
        }


        return $this;
    } // setClientType()

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
            if ($this->client_type !== 'NORMAL') {
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

            $this->idclient = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->client_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->client_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->client_fullname = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->client_email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->client_email2 = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->client_password = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->client_cellular = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->client_phone = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->client_language = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->client_status = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->client_type = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = ClientPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Client object", $e);
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

        if ($this->aCompany !== null && $this->idcompany !== $this->aCompany->getIdcompany()) {
            $this->aCompany = null;
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->collClientaddresss = null;

            $this->collClientcomments = null;

            $this->collClientfiles = null;

            $this->collClienttaxs = null;

            $this->collOrders = null;

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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientQuery::create()
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
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientPeer::addInstanceToPool($this);
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

            if ($this->aCompany !== null) {
                if ($this->aCompany->isModified() || $this->aCompany->isNew()) {
                    $affectedRows += $this->aCompany->save($con);
                }
                $this->setCompany($this->aCompany);
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

            if ($this->clientaddresssScheduledForDeletion !== null) {
                if (!$this->clientaddresssScheduledForDeletion->isEmpty()) {
                    ClientaddressQuery::create()
                        ->filterByPrimaryKeys($this->clientaddresssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientaddresssScheduledForDeletion = null;
                }
            }

            if ($this->collClientaddresss !== null) {
                foreach ($this->collClientaddresss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientcommentsScheduledForDeletion !== null) {
                if (!$this->clientcommentsScheduledForDeletion->isEmpty()) {
                    ClientcommentQuery::create()
                        ->filterByPrimaryKeys($this->clientcommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientcommentsScheduledForDeletion = null;
                }
            }

            if ($this->collClientcomments !== null) {
                foreach ($this->collClientcomments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientfilesScheduledForDeletion !== null) {
                if (!$this->clientfilesScheduledForDeletion->isEmpty()) {
                    ClientfileQuery::create()
                        ->filterByPrimaryKeys($this->clientfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientfilesScheduledForDeletion = null;
                }
            }

            if ($this->collClientfiles !== null) {
                foreach ($this->collClientfiles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clienttaxsScheduledForDeletion !== null) {
                if (!$this->clienttaxsScheduledForDeletion->isEmpty()) {
                    ClienttaxQuery::create()
                        ->filterByPrimaryKeys($this->clienttaxsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clienttaxsScheduledForDeletion = null;
                }
            }

            if ($this->collClienttaxs !== null) {
                foreach ($this->collClienttaxs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ordersScheduledForDeletion !== null) {
                if (!$this->ordersScheduledForDeletion->isEmpty()) {
                    OrderQuery::create()
                        ->filterByPrimaryKeys($this->ordersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ordersScheduledForDeletion = null;
                }
            }

            if ($this->collOrders !== null) {
                foreach ($this->collOrders as $referrerFK) {
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

        $this->modifiedColumns[] = ClientPeer::IDCLIENT;
        if (null !== $this->idclient) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientPeer::IDCLIENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(ClientPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`client_iso_codecountry`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`client_iso_codephone`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_FULLNAME)) {
            $modifiedColumns[':p' . $index++]  = '`client_fullname`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`client_email`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_EMAIL2)) {
            $modifiedColumns[':p' . $index++]  = '`client_email2`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`client_password`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`client_cellular`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`client_phone`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = '`client_language`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`client_status`';
        }
        if ($this->isColumnModified(ClientPeer::CLIENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`client_type`';
        }

        $sql = sprintf(
            'INSERT INTO `client` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`client_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->client_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`client_iso_codephone`':
                        $stmt->bindValue($identifier, $this->client_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`client_fullname`':
                        $stmt->bindValue($identifier, $this->client_fullname, PDO::PARAM_STR);
                        break;
                    case '`client_email`':
                        $stmt->bindValue($identifier, $this->client_email, PDO::PARAM_STR);
                        break;
                    case '`client_email2`':
                        $stmt->bindValue($identifier, $this->client_email2, PDO::PARAM_STR);
                        break;
                    case '`client_password`':
                        $stmt->bindValue($identifier, $this->client_password, PDO::PARAM_STR);
                        break;
                    case '`client_cellular`':
                        $stmt->bindValue($identifier, $this->client_cellular, PDO::PARAM_STR);
                        break;
                    case '`client_phone`':
                        $stmt->bindValue($identifier, $this->client_phone, PDO::PARAM_STR);
                        break;
                    case '`client_language`':
                        $stmt->bindValue($identifier, $this->client_language, PDO::PARAM_STR);
                        break;
                    case '`client_status`':
                        $stmt->bindValue($identifier, $this->client_status, PDO::PARAM_STR);
                        break;
                    case '`client_type`':
                        $stmt->bindValue($identifier, $this->client_type, PDO::PARAM_STR);
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
        $this->setIdclient($pk);

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

            if ($this->aCompany !== null) {
                if (!$this->aCompany->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCompany->getValidationFailures());
                }
            }


            if (($retval = ClientPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collClientaddresss !== null) {
                    foreach ($this->collClientaddresss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientcomments !== null) {
                    foreach ($this->collClientcomments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientfiles !== null) {
                    foreach ($this->collClientfiles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClienttaxs !== null) {
                    foreach ($this->collClienttaxs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrders !== null) {
                    foreach ($this->collOrders as $referrerFK) {
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
        $pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdclient();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getClientIsoCodecountry();
                break;
            case 3:
                return $this->getClientIsoCodephone();
                break;
            case 4:
                return $this->getClientFullname();
                break;
            case 5:
                return $this->getClientEmail();
                break;
            case 6:
                return $this->getClientEmail2();
                break;
            case 7:
                return $this->getClientPassword();
                break;
            case 8:
                return $this->getClientCellular();
                break;
            case 9:
                return $this->getClientPhone();
                break;
            case 10:
                return $this->getClientLanguage();
                break;
            case 11:
                return $this->getClientStatus();
                break;
            case 12:
                return $this->getClientType();
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
        if (isset($alreadyDumpedObjects['Client'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Client'][$this->getPrimaryKey()] = true;
        $keys = ClientPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdclient(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getClientIsoCodecountry(),
            $keys[3] => $this->getClientIsoCodephone(),
            $keys[4] => $this->getClientFullname(),
            $keys[5] => $this->getClientEmail(),
            $keys[6] => $this->getClientEmail2(),
            $keys[7] => $this->getClientPassword(),
            $keys[8] => $this->getClientCellular(),
            $keys[9] => $this->getClientPhone(),
            $keys[10] => $this->getClientLanguage(),
            $keys[11] => $this->getClientStatus(),
            $keys[12] => $this->getClientType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collClientaddresss) {
                $result['Clientaddresss'] = $this->collClientaddresss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientcomments) {
                $result['Clientcomments'] = $this->collClientcomments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientfiles) {
                $result['Clientfiles'] = $this->collClientfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClienttaxs) {
                $result['Clienttaxs'] = $this->collClienttaxs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrders) {
                $result['Orders'] = $this->collOrders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ClientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdclient($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setClientIsoCodecountry($value);
                break;
            case 3:
                $this->setClientIsoCodephone($value);
                break;
            case 4:
                $this->setClientFullname($value);
                break;
            case 5:
                $this->setClientEmail($value);
                break;
            case 6:
                $this->setClientEmail2($value);
                break;
            case 7:
                $this->setClientPassword($value);
                break;
            case 8:
                $this->setClientCellular($value);
                break;
            case 9:
                $this->setClientPhone($value);
                break;
            case 10:
                $this->setClientLanguage($value);
                break;
            case 11:
                $this->setClientStatus($value);
                break;
            case 12:
                $this->setClientType($value);
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
        $keys = ClientPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdclient($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClientIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setClientIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setClientFullname($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setClientEmail($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClientEmail2($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setClientPassword($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setClientCellular($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setClientPhone($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClientLanguage($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setClientStatus($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setClientType($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientPeer::IDCLIENT)) $criteria->add(ClientPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(ClientPeer::IDCOMPANY)) $criteria->add(ClientPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(ClientPeer::CLIENT_ISO_CODECOUNTRY)) $criteria->add(ClientPeer::CLIENT_ISO_CODECOUNTRY, $this->client_iso_codecountry);
        if ($this->isColumnModified(ClientPeer::CLIENT_ISO_CODEPHONE)) $criteria->add(ClientPeer::CLIENT_ISO_CODEPHONE, $this->client_iso_codephone);
        if ($this->isColumnModified(ClientPeer::CLIENT_FULLNAME)) $criteria->add(ClientPeer::CLIENT_FULLNAME, $this->client_fullname);
        if ($this->isColumnModified(ClientPeer::CLIENT_EMAIL)) $criteria->add(ClientPeer::CLIENT_EMAIL, $this->client_email);
        if ($this->isColumnModified(ClientPeer::CLIENT_EMAIL2)) $criteria->add(ClientPeer::CLIENT_EMAIL2, $this->client_email2);
        if ($this->isColumnModified(ClientPeer::CLIENT_PASSWORD)) $criteria->add(ClientPeer::CLIENT_PASSWORD, $this->client_password);
        if ($this->isColumnModified(ClientPeer::CLIENT_CELLULAR)) $criteria->add(ClientPeer::CLIENT_CELLULAR, $this->client_cellular);
        if ($this->isColumnModified(ClientPeer::CLIENT_PHONE)) $criteria->add(ClientPeer::CLIENT_PHONE, $this->client_phone);
        if ($this->isColumnModified(ClientPeer::CLIENT_LANGUAGE)) $criteria->add(ClientPeer::CLIENT_LANGUAGE, $this->client_language);
        if ($this->isColumnModified(ClientPeer::CLIENT_STATUS)) $criteria->add(ClientPeer::CLIENT_STATUS, $this->client_status);
        if ($this->isColumnModified(ClientPeer::CLIENT_TYPE)) $criteria->add(ClientPeer::CLIENT_TYPE, $this->client_type);

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
        $criteria = new Criteria(ClientPeer::DATABASE_NAME);
        $criteria->add(ClientPeer::IDCLIENT, $this->idclient);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdclient();
    }

    /**
     * Generic method to set the primary key (idclient column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdclient($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdclient();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Client (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setClientIsoCodecountry($this->getClientIsoCodecountry());
        $copyObj->setClientIsoCodephone($this->getClientIsoCodephone());
        $copyObj->setClientFullname($this->getClientFullname());
        $copyObj->setClientEmail($this->getClientEmail());
        $copyObj->setClientEmail2($this->getClientEmail2());
        $copyObj->setClientPassword($this->getClientPassword());
        $copyObj->setClientCellular($this->getClientCellular());
        $copyObj->setClientPhone($this->getClientPhone());
        $copyObj->setClientLanguage($this->getClientLanguage());
        $copyObj->setClientStatus($this->getClientStatus());
        $copyObj->setClientType($this->getClientType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getClientaddresss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientaddress($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientcomments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientcomment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClienttaxs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClienttax($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrder($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdclient(NULL); // this is a auto-increment column, so set to default value
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
     * @return Client Clone of current object.
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
     * @return ClientPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Client The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCompany(Company $v = null)
    {
        if ($v === null) {
            $this->setIdcompany(NULL);
        } else {
            $this->setIdcompany($v->getIdcompany());
        }

        $this->aCompany = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Company object, it will not be re-added.
        if ($v !== null) {
            $v->addClient($this);
        }


        return $this;
    }


    /**
     * Get the associated Company object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Company The associated Company object.
     * @throws PropelException
     */
    public function getCompany(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCompany === null && ($this->idcompany !== null) && $doQuery) {
            $this->aCompany = CompanyQuery::create()->findPk($this->idcompany, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCompany->addClients($this);
             */
        }

        return $this->aCompany;
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
        if ('Clientaddress' == $relationName) {
            $this->initClientaddresss();
        }
        if ('Clientcomment' == $relationName) {
            $this->initClientcomments();
        }
        if ('Clientfile' == $relationName) {
            $this->initClientfiles();
        }
        if ('Clienttax' == $relationName) {
            $this->initClienttaxs();
        }
        if ('Order' == $relationName) {
            $this->initOrders();
        }
    }

    /**
     * Clears out the collClientaddresss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addClientaddresss()
     */
    public function clearClientaddresss()
    {
        $this->collClientaddresss = null; // important to set this to null since that means it is uninitialized
        $this->collClientaddresssPartial = null;

        return $this;
    }

    /**
     * reset is the collClientaddresss collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientaddresss($v = true)
    {
        $this->collClientaddresssPartial = $v;
    }

    /**
     * Initializes the collClientaddresss collection.
     *
     * By default this just sets the collClientaddresss collection to an empty array (like clearcollClientaddresss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientaddresss($overrideExisting = true)
    {
        if (null !== $this->collClientaddresss && !$overrideExisting) {
            return;
        }
        $this->collClientaddresss = new PropelObjectCollection();
        $this->collClientaddresss->setModel('Clientaddress');
    }

    /**
     * Gets an array of Clientaddress objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientaddress[] List of Clientaddress objects
     * @throws PropelException
     */
    public function getClientaddresss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientaddresssPartial && !$this->isNew();
        if (null === $this->collClientaddresss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientaddresss) {
                // return empty collection
                $this->initClientaddresss();
            } else {
                $collClientaddresss = ClientaddressQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientaddresssPartial && count($collClientaddresss)) {
                      $this->initClientaddresss(false);

                      foreach ($collClientaddresss as $obj) {
                        if (false == $this->collClientaddresss->contains($obj)) {
                          $this->collClientaddresss->append($obj);
                        }
                      }

                      $this->collClientaddresssPartial = true;
                    }

                    $collClientaddresss->getInternalIterator()->rewind();

                    return $collClientaddresss;
                }

                if ($partial && $this->collClientaddresss) {
                    foreach ($this->collClientaddresss as $obj) {
                        if ($obj->isNew()) {
                            $collClientaddresss[] = $obj;
                        }
                    }
                }

                $this->collClientaddresss = $collClientaddresss;
                $this->collClientaddresssPartial = false;
            }
        }

        return $this->collClientaddresss;
    }

    /**
     * Sets a collection of Clientaddress objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientaddresss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setClientaddresss(PropelCollection $clientaddresss, PropelPDO $con = null)
    {
        $clientaddresssToDelete = $this->getClientaddresss(new Criteria(), $con)->diff($clientaddresss);


        $this->clientaddresssScheduledForDeletion = $clientaddresssToDelete;

        foreach ($clientaddresssToDelete as $clientaddressRemoved) {
            $clientaddressRemoved->setClient(null);
        }

        $this->collClientaddresss = null;
        foreach ($clientaddresss as $clientaddress) {
            $this->addClientaddress($clientaddress);
        }

        $this->collClientaddresss = $clientaddresss;
        $this->collClientaddresssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientaddress objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientaddress objects.
     * @throws PropelException
     */
    public function countClientaddresss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientaddresssPartial && !$this->isNew();
        if (null === $this->collClientaddresss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientaddresss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClientaddresss());
            }
            $query = ClientaddressQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collClientaddresss);
    }

    /**
     * Method called to associate a Clientaddress object to this object
     * through the Clientaddress foreign key attribute.
     *
     * @param    Clientaddress $l Clientaddress
     * @return Client The current object (for fluent API support)
     */
    public function addClientaddress(Clientaddress $l)
    {
        if ($this->collClientaddresss === null) {
            $this->initClientaddresss();
            $this->collClientaddresssPartial = true;
        }

        if (!in_array($l, $this->collClientaddresss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientaddress($l);

            if ($this->clientaddresssScheduledForDeletion and $this->clientaddresssScheduledForDeletion->contains($l)) {
                $this->clientaddresssScheduledForDeletion->remove($this->clientaddresssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Clientaddress $clientaddress The clientaddress object to add.
     */
    protected function doAddClientaddress($clientaddress)
    {
        $this->collClientaddresss[]= $clientaddress;
        $clientaddress->setClient($this);
    }

    /**
     * @param	Clientaddress $clientaddress The clientaddress object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeClientaddress($clientaddress)
    {
        if ($this->getClientaddresss()->contains($clientaddress)) {
            $this->collClientaddresss->remove($this->collClientaddresss->search($clientaddress));
            if (null === $this->clientaddresssScheduledForDeletion) {
                $this->clientaddresssScheduledForDeletion = clone $this->collClientaddresss;
                $this->clientaddresssScheduledForDeletion->clear();
            }
            $this->clientaddresssScheduledForDeletion[]= clone $clientaddress;
            $clientaddress->setClient(null);
        }

        return $this;
    }

    /**
     * Clears out the collClientcomments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addClientcomments()
     */
    public function clearClientcomments()
    {
        $this->collClientcomments = null; // important to set this to null since that means it is uninitialized
        $this->collClientcommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collClientcomments collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientcomments($v = true)
    {
        $this->collClientcommentsPartial = $v;
    }

    /**
     * Initializes the collClientcomments collection.
     *
     * By default this just sets the collClientcomments collection to an empty array (like clearcollClientcomments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientcomments($overrideExisting = true)
    {
        if (null !== $this->collClientcomments && !$overrideExisting) {
            return;
        }
        $this->collClientcomments = new PropelObjectCollection();
        $this->collClientcomments->setModel('Clientcomment');
    }

    /**
     * Gets an array of Clientcomment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientcomment[] List of Clientcomment objects
     * @throws PropelException
     */
    public function getClientcomments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientcommentsPartial && !$this->isNew();
        if (null === $this->collClientcomments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientcomments) {
                // return empty collection
                $this->initClientcomments();
            } else {
                $collClientcomments = ClientcommentQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientcommentsPartial && count($collClientcomments)) {
                      $this->initClientcomments(false);

                      foreach ($collClientcomments as $obj) {
                        if (false == $this->collClientcomments->contains($obj)) {
                          $this->collClientcomments->append($obj);
                        }
                      }

                      $this->collClientcommentsPartial = true;
                    }

                    $collClientcomments->getInternalIterator()->rewind();

                    return $collClientcomments;
                }

                if ($partial && $this->collClientcomments) {
                    foreach ($this->collClientcomments as $obj) {
                        if ($obj->isNew()) {
                            $collClientcomments[] = $obj;
                        }
                    }
                }

                $this->collClientcomments = $collClientcomments;
                $this->collClientcommentsPartial = false;
            }
        }

        return $this->collClientcomments;
    }

    /**
     * Sets a collection of Clientcomment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientcomments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setClientcomments(PropelCollection $clientcomments, PropelPDO $con = null)
    {
        $clientcommentsToDelete = $this->getClientcomments(new Criteria(), $con)->diff($clientcomments);


        $this->clientcommentsScheduledForDeletion = $clientcommentsToDelete;

        foreach ($clientcommentsToDelete as $clientcommentRemoved) {
            $clientcommentRemoved->setClient(null);
        }

        $this->collClientcomments = null;
        foreach ($clientcomments as $clientcomment) {
            $this->addClientcomment($clientcomment);
        }

        $this->collClientcomments = $clientcomments;
        $this->collClientcommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientcomment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientcomment objects.
     * @throws PropelException
     */
    public function countClientcomments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientcommentsPartial && !$this->isNew();
        if (null === $this->collClientcomments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientcomments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClientcomments());
            }
            $query = ClientcommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collClientcomments);
    }

    /**
     * Method called to associate a Clientcomment object to this object
     * through the Clientcomment foreign key attribute.
     *
     * @param    Clientcomment $l Clientcomment
     * @return Client The current object (for fluent API support)
     */
    public function addClientcomment(Clientcomment $l)
    {
        if ($this->collClientcomments === null) {
            $this->initClientcomments();
            $this->collClientcommentsPartial = true;
        }

        if (!in_array($l, $this->collClientcomments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientcomment($l);

            if ($this->clientcommentsScheduledForDeletion and $this->clientcommentsScheduledForDeletion->contains($l)) {
                $this->clientcommentsScheduledForDeletion->remove($this->clientcommentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Clientcomment $clientcomment The clientcomment object to add.
     */
    protected function doAddClientcomment($clientcomment)
    {
        $this->collClientcomments[]= $clientcomment;
        $clientcomment->setClient($this);
    }

    /**
     * @param	Clientcomment $clientcomment The clientcomment object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeClientcomment($clientcomment)
    {
        if ($this->getClientcomments()->contains($clientcomment)) {
            $this->collClientcomments->remove($this->collClientcomments->search($clientcomment));
            if (null === $this->clientcommentsScheduledForDeletion) {
                $this->clientcommentsScheduledForDeletion = clone $this->collClientcomments;
                $this->clientcommentsScheduledForDeletion->clear();
            }
            $this->clientcommentsScheduledForDeletion[]= clone $clientcomment;
            $clientcomment->setClient(null);
        }

        return $this;
    }

    /**
     * Clears out the collClientfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addClientfiles()
     */
    public function clearClientfiles()
    {
        $this->collClientfiles = null; // important to set this to null since that means it is uninitialized
        $this->collClientfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collClientfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialClientfiles($v = true)
    {
        $this->collClientfilesPartial = $v;
    }

    /**
     * Initializes the collClientfiles collection.
     *
     * By default this just sets the collClientfiles collection to an empty array (like clearcollClientfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientfiles($overrideExisting = true)
    {
        if (null !== $this->collClientfiles && !$overrideExisting) {
            return;
        }
        $this->collClientfiles = new PropelObjectCollection();
        $this->collClientfiles->setModel('Clientfile');
    }

    /**
     * Gets an array of Clientfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clientfile[] List of Clientfile objects
     * @throws PropelException
     */
    public function getClientfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientfilesPartial && !$this->isNew();
        if (null === $this->collClientfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientfiles) {
                // return empty collection
                $this->initClientfiles();
            } else {
                $collClientfiles = ClientfileQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientfilesPartial && count($collClientfiles)) {
                      $this->initClientfiles(false);

                      foreach ($collClientfiles as $obj) {
                        if (false == $this->collClientfiles->contains($obj)) {
                          $this->collClientfiles->append($obj);
                        }
                      }

                      $this->collClientfilesPartial = true;
                    }

                    $collClientfiles->getInternalIterator()->rewind();

                    return $collClientfiles;
                }

                if ($partial && $this->collClientfiles) {
                    foreach ($this->collClientfiles as $obj) {
                        if ($obj->isNew()) {
                            $collClientfiles[] = $obj;
                        }
                    }
                }

                $this->collClientfiles = $collClientfiles;
                $this->collClientfilesPartial = false;
            }
        }

        return $this->collClientfiles;
    }

    /**
     * Sets a collection of Clientfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clientfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setClientfiles(PropelCollection $clientfiles, PropelPDO $con = null)
    {
        $clientfilesToDelete = $this->getClientfiles(new Criteria(), $con)->diff($clientfiles);


        $this->clientfilesScheduledForDeletion = $clientfilesToDelete;

        foreach ($clientfilesToDelete as $clientfileRemoved) {
            $clientfileRemoved->setClient(null);
        }

        $this->collClientfiles = null;
        foreach ($clientfiles as $clientfile) {
            $this->addClientfile($clientfile);
        }

        $this->collClientfiles = $clientfiles;
        $this->collClientfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clientfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clientfile objects.
     * @throws PropelException
     */
    public function countClientfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientfilesPartial && !$this->isNew();
        if (null === $this->collClientfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientfiles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClientfiles());
            }
            $query = ClientfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collClientfiles);
    }

    /**
     * Method called to associate a Clientfile object to this object
     * through the Clientfile foreign key attribute.
     *
     * @param    Clientfile $l Clientfile
     * @return Client The current object (for fluent API support)
     */
    public function addClientfile(Clientfile $l)
    {
        if ($this->collClientfiles === null) {
            $this->initClientfiles();
            $this->collClientfilesPartial = true;
        }

        if (!in_array($l, $this->collClientfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClientfile($l);

            if ($this->clientfilesScheduledForDeletion and $this->clientfilesScheduledForDeletion->contains($l)) {
                $this->clientfilesScheduledForDeletion->remove($this->clientfilesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Clientfile $clientfile The clientfile object to add.
     */
    protected function doAddClientfile($clientfile)
    {
        $this->collClientfiles[]= $clientfile;
        $clientfile->setClient($this);
    }

    /**
     * @param	Clientfile $clientfile The clientfile object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeClientfile($clientfile)
    {
        if ($this->getClientfiles()->contains($clientfile)) {
            $this->collClientfiles->remove($this->collClientfiles->search($clientfile));
            if (null === $this->clientfilesScheduledForDeletion) {
                $this->clientfilesScheduledForDeletion = clone $this->collClientfiles;
                $this->clientfilesScheduledForDeletion->clear();
            }
            $this->clientfilesScheduledForDeletion[]= clone $clientfile;
            $clientfile->setClient(null);
        }

        return $this;
    }

    /**
     * Clears out the collClienttaxs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addClienttaxs()
     */
    public function clearClienttaxs()
    {
        $this->collClienttaxs = null; // important to set this to null since that means it is uninitialized
        $this->collClienttaxsPartial = null;

        return $this;
    }

    /**
     * reset is the collClienttaxs collection loaded partially
     *
     * @return void
     */
    public function resetPartialClienttaxs($v = true)
    {
        $this->collClienttaxsPartial = $v;
    }

    /**
     * Initializes the collClienttaxs collection.
     *
     * By default this just sets the collClienttaxs collection to an empty array (like clearcollClienttaxs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClienttaxs($overrideExisting = true)
    {
        if (null !== $this->collClienttaxs && !$overrideExisting) {
            return;
        }
        $this->collClienttaxs = new PropelObjectCollection();
        $this->collClienttaxs->setModel('Clienttax');
    }

    /**
     * Gets an array of Clienttax objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Clienttax[] List of Clienttax objects
     * @throws PropelException
     */
    public function getClienttaxs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClienttaxsPartial && !$this->isNew();
        if (null === $this->collClienttaxs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClienttaxs) {
                // return empty collection
                $this->initClienttaxs();
            } else {
                $collClienttaxs = ClienttaxQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClienttaxsPartial && count($collClienttaxs)) {
                      $this->initClienttaxs(false);

                      foreach ($collClienttaxs as $obj) {
                        if (false == $this->collClienttaxs->contains($obj)) {
                          $this->collClienttaxs->append($obj);
                        }
                      }

                      $this->collClienttaxsPartial = true;
                    }

                    $collClienttaxs->getInternalIterator()->rewind();

                    return $collClienttaxs;
                }

                if ($partial && $this->collClienttaxs) {
                    foreach ($this->collClienttaxs as $obj) {
                        if ($obj->isNew()) {
                            $collClienttaxs[] = $obj;
                        }
                    }
                }

                $this->collClienttaxs = $collClienttaxs;
                $this->collClienttaxsPartial = false;
            }
        }

        return $this->collClienttaxs;
    }

    /**
     * Sets a collection of Clienttax objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clienttaxs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setClienttaxs(PropelCollection $clienttaxs, PropelPDO $con = null)
    {
        $clienttaxsToDelete = $this->getClienttaxs(new Criteria(), $con)->diff($clienttaxs);


        $this->clienttaxsScheduledForDeletion = $clienttaxsToDelete;

        foreach ($clienttaxsToDelete as $clienttaxRemoved) {
            $clienttaxRemoved->setClient(null);
        }

        $this->collClienttaxs = null;
        foreach ($clienttaxs as $clienttax) {
            $this->addClienttax($clienttax);
        }

        $this->collClienttaxs = $clienttaxs;
        $this->collClienttaxsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Clienttax objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Clienttax objects.
     * @throws PropelException
     */
    public function countClienttaxs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClienttaxsPartial && !$this->isNew();
        if (null === $this->collClienttaxs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClienttaxs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClienttaxs());
            }
            $query = ClienttaxQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collClienttaxs);
    }

    /**
     * Method called to associate a Clienttax object to this object
     * through the Clienttax foreign key attribute.
     *
     * @param    Clienttax $l Clienttax
     * @return Client The current object (for fluent API support)
     */
    public function addClienttax(Clienttax $l)
    {
        if ($this->collClienttaxs === null) {
            $this->initClienttaxs();
            $this->collClienttaxsPartial = true;
        }

        if (!in_array($l, $this->collClienttaxs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClienttax($l);

            if ($this->clienttaxsScheduledForDeletion and $this->clienttaxsScheduledForDeletion->contains($l)) {
                $this->clienttaxsScheduledForDeletion->remove($this->clienttaxsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Clienttax $clienttax The clienttax object to add.
     */
    protected function doAddClienttax($clienttax)
    {
        $this->collClienttaxs[]= $clienttax;
        $clienttax->setClient($this);
    }

    /**
     * @param	Clienttax $clienttax The clienttax object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeClienttax($clienttax)
    {
        if ($this->getClienttaxs()->contains($clienttax)) {
            $this->collClienttaxs->remove($this->collClienttaxs->search($clienttax));
            if (null === $this->clienttaxsScheduledForDeletion) {
                $this->clienttaxsScheduledForDeletion = clone $this->collClienttaxs;
                $this->clienttaxsScheduledForDeletion->clear();
            }
            $this->clienttaxsScheduledForDeletion[]= clone $clienttax;
            $clienttax->setClient(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Client The current object (for fluent API support)
     * @see        addOrders()
     */
    public function clearOrders()
    {
        $this->collOrders = null; // important to set this to null since that means it is uninitialized
        $this->collOrdersPartial = null;

        return $this;
    }

    /**
     * reset is the collOrders collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrders($v = true)
    {
        $this->collOrdersPartial = $v;
    }

    /**
     * Initializes the collOrders collection.
     *
     * By default this just sets the collOrders collection to an empty array (like clearcollOrders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrders($overrideExisting = true)
    {
        if (null !== $this->collOrders && !$overrideExisting) {
            return;
        }
        $this->collOrders = new PropelObjectCollection();
        $this->collOrders->setModel('Order');
    }

    /**
     * Gets an array of Order objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Client is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Order[] List of Order objects
     * @throws PropelException
     */
    public function getOrders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                // return empty collection
                $this->initOrders();
            } else {
                $collOrders = OrderQuery::create(null, $criteria)
                    ->filterByClient($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdersPartial && count($collOrders)) {
                      $this->initOrders(false);

                      foreach ($collOrders as $obj) {
                        if (false == $this->collOrders->contains($obj)) {
                          $this->collOrders->append($obj);
                        }
                      }

                      $this->collOrdersPartial = true;
                    }

                    $collOrders->getInternalIterator()->rewind();

                    return $collOrders;
                }

                if ($partial && $this->collOrders) {
                    foreach ($this->collOrders as $obj) {
                        if ($obj->isNew()) {
                            $collOrders[] = $obj;
                        }
                    }
                }

                $this->collOrders = $collOrders;
                $this->collOrdersPartial = false;
            }
        }

        return $this->collOrders;
    }

    /**
     * Sets a collection of Order objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orders A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Client The current object (for fluent API support)
     */
    public function setOrders(PropelCollection $orders, PropelPDO $con = null)
    {
        $ordersToDelete = $this->getOrders(new Criteria(), $con)->diff($orders);


        $this->ordersScheduledForDeletion = $ordersToDelete;

        foreach ($ordersToDelete as $orderRemoved) {
            $orderRemoved->setClient(null);
        }

        $this->collOrders = null;
        foreach ($orders as $order) {
            $this->addOrder($order);
        }

        $this->collOrders = $orders;
        $this->collOrdersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Order objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Order objects.
     * @throws PropelException
     */
    public function countOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrders());
            }
            $query = OrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClient($this)
                ->count($con);
        }

        return count($this->collOrders);
    }

    /**
     * Method called to associate a Order object to this object
     * through the Order foreign key attribute.
     *
     * @param    Order $l Order
     * @return Client The current object (for fluent API support)
     */
    public function addOrder(Order $l)
    {
        if ($this->collOrders === null) {
            $this->initOrders();
            $this->collOrdersPartial = true;
        }

        if (!in_array($l, $this->collOrders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrder($l);

            if ($this->ordersScheduledForDeletion and $this->ordersScheduledForDeletion->contains($l)) {
                $this->ordersScheduledForDeletion->remove($this->ordersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Order $order The order object to add.
     */
    protected function doAddOrder($order)
    {
        $this->collOrders[]= $order;
        $order->setClient($this);
    }

    /**
     * @param	Order $order The order object to remove.
     * @return Client The current object (for fluent API support)
     */
    public function removeOrder($order)
    {
        if ($this->getOrders()->contains($order)) {
            $this->collOrders->remove($this->collOrders->search($order));
            if (null === $this->ordersScheduledForDeletion) {
                $this->ordersScheduledForDeletion = clone $this->collOrders;
                $this->ordersScheduledForDeletion->clear();
            }
            $this->ordersScheduledForDeletion[]= clone $order;
            $order->setClient(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Client is new, it will return
     * an empty collection; or if this Client has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Client.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Order[] List of Order objects
     */
    public function getOrdersJoinBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrderQuery::create(null, $criteria);
        $query->joinWith('Branch', $join_behavior);

        return $this->getOrders($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idclient = null;
        $this->idcompany = null;
        $this->client_iso_codecountry = null;
        $this->client_iso_codephone = null;
        $this->client_fullname = null;
        $this->client_email = null;
        $this->client_email2 = null;
        $this->client_password = null;
        $this->client_cellular = null;
        $this->client_phone = null;
        $this->client_language = null;
        $this->client_status = null;
        $this->client_type = null;
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
            if ($this->collClientaddresss) {
                foreach ($this->collClientaddresss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientcomments) {
                foreach ($this->collClientcomments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientfiles) {
                foreach ($this->collClientfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClienttaxs) {
                foreach ($this->collClienttaxs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrders) {
                foreach ($this->collOrders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collClientaddresss instanceof PropelCollection) {
            $this->collClientaddresss->clearIterator();
        }
        $this->collClientaddresss = null;
        if ($this->collClientcomments instanceof PropelCollection) {
            $this->collClientcomments->clearIterator();
        }
        $this->collClientcomments = null;
        if ($this->collClientfiles instanceof PropelCollection) {
            $this->collClientfiles->clearIterator();
        }
        $this->collClientfiles = null;
        if ($this->collClienttaxs instanceof PropelCollection) {
            $this->collClienttaxs->clearIterator();
        }
        $this->collClienttaxs = null;
        if ($this->collOrders instanceof PropelCollection) {
            $this->collOrders->clearIterator();
        }
        $this->collOrders = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientPeer::DEFAULT_STRING_FORMAT);
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
