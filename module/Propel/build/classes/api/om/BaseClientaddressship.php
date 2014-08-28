<?php


/**
 * Base class that represents a row from the 'clientaddressship' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientaddressship extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ClientaddressshipPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientaddressshipPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idclientaddressship field.
     * @var        int
     */
    protected $idclientaddressship;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the clientaddressship_iso_codecountry field.
     * @var        string
     */
    protected $clientaddressship_iso_codecountry;

    /**
     * The value for the clientaddressship_iso_codephone field.
     * @var        string
     */
    protected $clientaddressship_iso_codephone;

    /**
     * The value for the clientaddressship_addressee field.
     * @var        string
     */
    protected $clientaddressship_addressee;

    /**
     * The value for the clientaddressship_addressee_cellular field.
     * @var        string
     */
    protected $clientaddressship_addressee_cellular;

    /**
     * The value for the clientaddressship_addressee_phone field.
     * @var        string
     */
    protected $clientaddressship_addressee_phone;

    /**
     * The value for the clientaddressship_address field.
     * @var        string
     */
    protected $clientaddressship_address;

    /**
     * The value for the clientaddressship_address2 field.
     * @var        string
     */
    protected $clientaddressship_address2;

    /**
     * The value for the clientaddressship_city field.
     * @var        string
     */
    protected $clientaddressship_city;

    /**
     * The value for the clientaddressship_state field.
     * @var        string
     */
    protected $clientaddressship_state;

    /**
     * The value for the clientaddressship_zipcode field.
     * @var        string
     */
    protected $clientaddressship_zipcode;

    /**
     * @var        Client
     */
    protected $aClient;

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
     * Get the [idclientaddressship] column value.
     *
     * @return int
     */
    public function getIdclientaddressship()
    {

        return $this->idclientaddressship;
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
     * Get the [clientaddressship_iso_codecountry] column value.
     *
     * @return string
     */
    public function getClientaddressshipIsoCodecountry()
    {

        return $this->clientaddressship_iso_codecountry;
    }

    /**
     * Get the [clientaddressship_iso_codephone] column value.
     *
     * @return string
     */
    public function getClientaddressshipIsoCodephone()
    {

        return $this->clientaddressship_iso_codephone;
    }

    /**
     * Get the [clientaddressship_addressee] column value.
     *
     * @return string
     */
    public function getClientaddressshipAddressee()
    {

        return $this->clientaddressship_addressee;
    }

    /**
     * Get the [clientaddressship_addressee_cellular] column value.
     *
     * @return string
     */
    public function getClientaddressshipAddresseeCellular()
    {

        return $this->clientaddressship_addressee_cellular;
    }

    /**
     * Get the [clientaddressship_addressee_phone] column value.
     *
     * @return string
     */
    public function getClientaddressshipAddresseePhone()
    {

        return $this->clientaddressship_addressee_phone;
    }

    /**
     * Get the [clientaddressship_address] column value.
     *
     * @return string
     */
    public function getClientaddressshipAddress()
    {

        return $this->clientaddressship_address;
    }

    /**
     * Get the [clientaddressship_address2] column value.
     *
     * @return string
     */
    public function getClientaddressshipAddress2()
    {

        return $this->clientaddressship_address2;
    }

    /**
     * Get the [clientaddressship_city] column value.
     *
     * @return string
     */
    public function getClientaddressshipCity()
    {

        return $this->clientaddressship_city;
    }

    /**
     * Get the [clientaddressship_state] column value.
     *
     * @return string
     */
    public function getClientaddressshipState()
    {

        return $this->clientaddressship_state;
    }

    /**
     * Get the [clientaddressship_zipcode] column value.
     *
     * @return string
     */
    public function getClientaddressshipZipcode()
    {

        return $this->clientaddressship_zipcode;
    }

    /**
     * Set the value of [idclientaddressship] column.
     *
     * @param  int $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setIdclientaddressship($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclientaddressship !== $v) {
            $this->idclientaddressship = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::IDCLIENTADDRESSSHIP;
        }


        return $this;
    } // setIdclientaddressship()

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

    /**
     * Set the value of [clientaddressship_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_iso_codecountry !== $v) {
            $this->clientaddressship_iso_codecountry = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODECOUNTRY;
        }


        return $this;
    } // setClientaddressshipIsoCodecountry()

    /**
     * Set the value of [clientaddressship_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_iso_codephone !== $v) {
            $this->clientaddressship_iso_codephone = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODEPHONE;
        }


        return $this;
    } // setClientaddressshipIsoCodephone()

    /**
     * Set the value of [clientaddressship_addressee] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipAddressee($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_addressee !== $v) {
            $this->clientaddressship_addressee = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE;
        }


        return $this;
    } // setClientaddressshipAddressee()

    /**
     * Set the value of [clientaddressship_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_addressee_cellular !== $v) {
            $this->clientaddressship_addressee_cellular = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setClientaddressshipAddresseeCellular()

    /**
     * Set the value of [clientaddressship_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_addressee_phone !== $v) {
            $this->clientaddressship_addressee_phone = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_PHONE;
        }


        return $this;
    } // setClientaddressshipAddresseePhone()

    /**
     * Set the value of [clientaddressship_address] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_address !== $v) {
            $this->clientaddressship_address = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS;
        }


        return $this;
    } // setClientaddressshipAddress()

    /**
     * Set the value of [clientaddressship_address2] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_address2 !== $v) {
            $this->clientaddressship_address2 = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS2;
        }


        return $this;
    } // setClientaddressshipAddress2()

    /**
     * Set the value of [clientaddressship_city] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_city !== $v) {
            $this->clientaddressship_city = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_CITY;
        }


        return $this;
    } // setClientaddressshipCity()

    /**
     * Set the value of [clientaddressship_state] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_state !== $v) {
            $this->clientaddressship_state = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_STATE;
        }


        return $this;
    } // setClientaddressshipState()

    /**
     * Set the value of [clientaddressship_zipcode] column.
     *
     * @param  string $v new value
     * @return Clientaddressship The current object (for fluent API support)
     */
    public function setClientaddressshipZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddressship_zipcode !== $v) {
            $this->clientaddressship_zipcode = $v;
            $this->modifiedColumns[] = ClientaddressshipPeer::CLIENTADDRESSSHIP_ZIPCODE;
        }


        return $this;
    } // setClientaddressshipZipcode()

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

            $this->idclientaddressship = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idclient = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->clientaddressship_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->clientaddressship_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->clientaddressship_addressee = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->clientaddressship_addressee_cellular = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->clientaddressship_addressee_phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->clientaddressship_address = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->clientaddressship_address2 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->clientaddressship_city = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->clientaddressship_state = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->clientaddressship_zipcode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 12; // 12 = ClientaddressshipPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Clientaddressship object", $e);
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

        if ($this->aClient !== null && $this->idclient !== $this->aClient->getIdclient()) {
            $this->aClient = null;
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
            $con = Propel::getConnection(ClientaddressshipPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientaddressshipPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
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
            $con = Propel::getConnection(ClientaddressshipPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientaddressshipQuery::create()
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
            $con = Propel::getConnection(ClientaddressshipPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientaddressshipPeer::addInstanceToPool($this);
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

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
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

        $this->modifiedColumns[] = ClientaddressshipPeer::IDCLIENTADDRESSSHIP;
        if (null !== $this->idclientaddressship) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientaddressshipPeer::IDCLIENTADDRESSSHIP . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientaddressshipPeer::IDCLIENTADDRESSSHIP)) {
            $modifiedColumns[':p' . $index++]  = '`idclientaddressship`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_iso_codecountry`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_iso_codephone`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_addressee`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_addressee_cellular`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_addressee_phone`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_address`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_address2`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_city`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_state`';
        }
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddressship_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `clientaddressship` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idclientaddressship`':
                        $stmt->bindValue($identifier, $this->idclientaddressship, PDO::PARAM_INT);
                        break;
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`clientaddressship_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->clientaddressship_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_iso_codephone`':
                        $stmt->bindValue($identifier, $this->clientaddressship_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_addressee`':
                        $stmt->bindValue($identifier, $this->clientaddressship_addressee, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->clientaddressship_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_addressee_phone`':
                        $stmt->bindValue($identifier, $this->clientaddressship_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_address`':
                        $stmt->bindValue($identifier, $this->clientaddressship_address, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_address2`':
                        $stmt->bindValue($identifier, $this->clientaddressship_address2, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_city`':
                        $stmt->bindValue($identifier, $this->clientaddressship_city, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_state`':
                        $stmt->bindValue($identifier, $this->clientaddressship_state, PDO::PARAM_STR);
                        break;
                    case '`clientaddressship_zipcode`':
                        $stmt->bindValue($identifier, $this->clientaddressship_zipcode, PDO::PARAM_STR);
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
        $this->setIdclientaddressship($pk);

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

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }


            if (($retval = ClientaddressshipPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ClientaddressshipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdclientaddressship();
                break;
            case 1:
                return $this->getIdclient();
                break;
            case 2:
                return $this->getClientaddressshipIsoCodecountry();
                break;
            case 3:
                return $this->getClientaddressshipIsoCodephone();
                break;
            case 4:
                return $this->getClientaddressshipAddressee();
                break;
            case 5:
                return $this->getClientaddressshipAddresseeCellular();
                break;
            case 6:
                return $this->getClientaddressshipAddresseePhone();
                break;
            case 7:
                return $this->getClientaddressshipAddress();
                break;
            case 8:
                return $this->getClientaddressshipAddress2();
                break;
            case 9:
                return $this->getClientaddressshipCity();
                break;
            case 10:
                return $this->getClientaddressshipState();
                break;
            case 11:
                return $this->getClientaddressshipZipcode();
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
        if (isset($alreadyDumpedObjects['Clientaddressship'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clientaddressship'][$this->getPrimaryKey()] = true;
        $keys = ClientaddressshipPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdclientaddressship(),
            $keys[1] => $this->getIdclient(),
            $keys[2] => $this->getClientaddressshipIsoCodecountry(),
            $keys[3] => $this->getClientaddressshipIsoCodephone(),
            $keys[4] => $this->getClientaddressshipAddressee(),
            $keys[5] => $this->getClientaddressshipAddresseeCellular(),
            $keys[6] => $this->getClientaddressshipAddresseePhone(),
            $keys[7] => $this->getClientaddressshipAddress(),
            $keys[8] => $this->getClientaddressshipAddress2(),
            $keys[9] => $this->getClientaddressshipCity(),
            $keys[10] => $this->getClientaddressshipState(),
            $keys[11] => $this->getClientaddressshipZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ClientaddressshipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdclientaddressship($value);
                break;
            case 1:
                $this->setIdclient($value);
                break;
            case 2:
                $this->setClientaddressshipIsoCodecountry($value);
                break;
            case 3:
                $this->setClientaddressshipIsoCodephone($value);
                break;
            case 4:
                $this->setClientaddressshipAddressee($value);
                break;
            case 5:
                $this->setClientaddressshipAddresseeCellular($value);
                break;
            case 6:
                $this->setClientaddressshipAddresseePhone($value);
                break;
            case 7:
                $this->setClientaddressshipAddress($value);
                break;
            case 8:
                $this->setClientaddressshipAddress2($value);
                break;
            case 9:
                $this->setClientaddressshipCity($value);
                break;
            case 10:
                $this->setClientaddressshipState($value);
                break;
            case 11:
                $this->setClientaddressshipZipcode($value);
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
        $keys = ClientaddressshipPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdclientaddressship($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdclient($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClientaddressshipIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setClientaddressshipIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setClientaddressshipAddressee($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setClientaddressshipAddresseeCellular($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClientaddressshipAddresseePhone($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setClientaddressshipAddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setClientaddressshipAddress2($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setClientaddressshipCity($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClientaddressshipState($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setClientaddressshipZipcode($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientaddressshipPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientaddressshipPeer::IDCLIENTADDRESSSHIP)) $criteria->add(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $this->idclientaddressship);
        if ($this->isColumnModified(ClientaddressshipPeer::IDCLIENT)) $criteria->add(ClientaddressshipPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODECOUNTRY)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODECOUNTRY, $this->clientaddressship_iso_codecountry);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODEPHONE)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ISO_CODEPHONE, $this->clientaddressship_iso_codephone);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE, $this->clientaddressship_addressee);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_CELLULAR)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_CELLULAR, $this->clientaddressship_addressee_cellular);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_PHONE)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESSEE_PHONE, $this->clientaddressship_addressee_phone);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS, $this->clientaddressship_address);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS2)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ADDRESS2, $this->clientaddressship_address2);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_CITY)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_CITY, $this->clientaddressship_city);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_STATE)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_STATE, $this->clientaddressship_state);
        if ($this->isColumnModified(ClientaddressshipPeer::CLIENTADDRESSSHIP_ZIPCODE)) $criteria->add(ClientaddressshipPeer::CLIENTADDRESSSHIP_ZIPCODE, $this->clientaddressship_zipcode);

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
        $criteria = new Criteria(ClientaddressshipPeer::DATABASE_NAME);
        $criteria->add(ClientaddressshipPeer::IDCLIENTADDRESSSHIP, $this->idclientaddressship);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdclientaddressship();
    }

    /**
     * Generic method to set the primary key (idclientaddressship column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdclientaddressship($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdclientaddressship();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Clientaddressship (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdclient($this->getIdclient());
        $copyObj->setClientaddressshipIsoCodecountry($this->getClientaddressshipIsoCodecountry());
        $copyObj->setClientaddressshipIsoCodephone($this->getClientaddressshipIsoCodephone());
        $copyObj->setClientaddressshipAddressee($this->getClientaddressshipAddressee());
        $copyObj->setClientaddressshipAddresseeCellular($this->getClientaddressshipAddresseeCellular());
        $copyObj->setClientaddressshipAddresseePhone($this->getClientaddressshipAddresseePhone());
        $copyObj->setClientaddressshipAddress($this->getClientaddressshipAddress());
        $copyObj->setClientaddressshipAddress2($this->getClientaddressshipAddress2());
        $copyObj->setClientaddressshipCity($this->getClientaddressshipCity());
        $copyObj->setClientaddressshipState($this->getClientaddressshipState());
        $copyObj->setClientaddressshipZipcode($this->getClientaddressshipZipcode());

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
            $copyObj->setIdclientaddressship(NULL); // this is a auto-increment column, so set to default value
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
     * @return Clientaddressship Clone of current object.
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
     * @return ClientaddressshipPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientaddressshipPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Clientaddressship The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(Client $v = null)
    {
        if ($v === null) {
            $this->setIdclient(NULL);
        } else {
            $this->setIdclient($v->getIdclient());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Client object, it will not be re-added.
        if ($v !== null) {
            $v->addClientaddressship($this);
        }


        return $this;
    }


    /**
     * Get the associated Client object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Client The associated Client object.
     * @throws PropelException
     */
    public function getClient(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClient === null && ($this->idclient !== null) && $doQuery) {
            $this->aClient = ClientQuery::create()->findPk($this->idclient, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addClientaddressships($this);
             */
        }

        return $this->aClient;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idclientaddressship = null;
        $this->idclient = null;
        $this->clientaddressship_iso_codecountry = null;
        $this->clientaddressship_iso_codephone = null;
        $this->clientaddressship_addressee = null;
        $this->clientaddressship_addressee_cellular = null;
        $this->clientaddressship_addressee_phone = null;
        $this->clientaddressship_address = null;
        $this->clientaddressship_address2 = null;
        $this->clientaddressship_city = null;
        $this->clientaddressship_state = null;
        $this->clientaddressship_zipcode = null;
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
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aClient = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientaddressshipPeer::DEFAULT_STRING_FORMAT);
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
