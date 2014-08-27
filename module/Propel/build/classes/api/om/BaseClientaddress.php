<?php


/**
 * Base class that represents a row from the 'clientaddress' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClientaddress extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ClientaddressPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientaddressPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idclientaddress field.
     * @var        int
     */
    protected $idclientaddress;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the clientaddress_iso_codecountry field.
     * @var        string
     */
    protected $clientaddress_iso_codecountry;

    /**
     * The value for the clientaddress_iso_codephone field.
     * @var        string
     */
    protected $clientaddress_iso_codephone;

    /**
     * The value for the clientaddress_addressee field.
     * @var        string
     */
    protected $clientaddress_addressee;

    /**
     * The value for the clientaddress_addressee_cellular field.
     * @var        string
     */
    protected $clientaddress_addressee_cellular;

    /**
     * The value for the clientaddress_addressee_phone field.
     * @var        string
     */
    protected $clientaddress_addressee_phone;

    /**
     * The value for the clientaddress_address field.
     * @var        string
     */
    protected $clientaddress_address;

    /**
     * The value for the clientaddress_address2 field.
     * @var        string
     */
    protected $clientaddress_address2;

    /**
     * The value for the clientaddress_city field.
     * @var        string
     */
    protected $clientaddress_city;

    /**
     * The value for the clientaddress_state field.
     * @var        string
     */
    protected $clientaddress_state;

    /**
     * The value for the clientaddress_zipcode field.
     * @var        string
     */
    protected $clientaddress_zipcode;

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
     * Get the [idclientaddress] column value.
     *
     * @return int
     */
    public function getIdclientaddress()
    {

        return $this->idclientaddress;
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
     * Get the [clientaddress_iso_codecountry] column value.
     *
     * @return string
     */
    public function getClientaddressIsoCodecountry()
    {

        return $this->clientaddress_iso_codecountry;
    }

    /**
     * Get the [clientaddress_iso_codephone] column value.
     *
     * @return string
     */
    public function getClientaddressIsoCodephone()
    {

        return $this->clientaddress_iso_codephone;
    }

    /**
     * Get the [clientaddress_addressee] column value.
     *
     * @return string
     */
    public function getClientaddressAddressee()
    {

        return $this->clientaddress_addressee;
    }

    /**
     * Get the [clientaddress_addressee_cellular] column value.
     *
     * @return string
     */
    public function getClientaddressAddresseeCellular()
    {

        return $this->clientaddress_addressee_cellular;
    }

    /**
     * Get the [clientaddress_addressee_phone] column value.
     *
     * @return string
     */
    public function getClientaddressAddresseePhone()
    {

        return $this->clientaddress_addressee_phone;
    }

    /**
     * Get the [clientaddress_address] column value.
     *
     * @return string
     */
    public function getClientaddressAddress()
    {

        return $this->clientaddress_address;
    }

    /**
     * Get the [clientaddress_address2] column value.
     *
     * @return string
     */
    public function getClientaddressAddress2()
    {

        return $this->clientaddress_address2;
    }

    /**
     * Get the [clientaddress_city] column value.
     *
     * @return string
     */
    public function getClientaddressCity()
    {

        return $this->clientaddress_city;
    }

    /**
     * Get the [clientaddress_state] column value.
     *
     * @return string
     */
    public function getClientaddressState()
    {

        return $this->clientaddress_state;
    }

    /**
     * Get the [clientaddress_zipcode] column value.
     *
     * @return string
     */
    public function getClientaddressZipcode()
    {

        return $this->clientaddress_zipcode;
    }

    /**
     * Set the value of [idclientaddress] column.
     *
     * @param  int $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setIdclientaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclientaddress !== $v) {
            $this->idclientaddress = $v;
            $this->modifiedColumns[] = ClientaddressPeer::IDCLIENTADDRESS;
        }


        return $this;
    } // setIdclientaddress()

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = ClientaddressPeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

    /**
     * Set the value of [clientaddress_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_iso_codecountry !== $v) {
            $this->clientaddress_iso_codecountry = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY;
        }


        return $this;
    } // setClientaddressIsoCodecountry()

    /**
     * Set the value of [clientaddress_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_iso_codephone !== $v) {
            $this->clientaddress_iso_codephone = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE;
        }


        return $this;
    } // setClientaddressIsoCodephone()

    /**
     * Set the value of [clientaddress_addressee] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressAddressee($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_addressee !== $v) {
            $this->clientaddress_addressee = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ADDRESSEE;
        }


        return $this;
    } // setClientaddressAddressee()

    /**
     * Set the value of [clientaddress_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_addressee_cellular !== $v) {
            $this->clientaddress_addressee_cellular = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setClientaddressAddresseeCellular()

    /**
     * Set the value of [clientaddress_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_addressee_phone !== $v) {
            $this->clientaddress_addressee_phone = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE;
        }


        return $this;
    } // setClientaddressAddresseePhone()

    /**
     * Set the value of [clientaddress_address] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_address !== $v) {
            $this->clientaddress_address = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ADDRESS;
        }


        return $this;
    } // setClientaddressAddress()

    /**
     * Set the value of [clientaddress_address2] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_address2 !== $v) {
            $this->clientaddress_address2 = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ADDRESS2;
        }


        return $this;
    } // setClientaddressAddress2()

    /**
     * Set the value of [clientaddress_city] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_city !== $v) {
            $this->clientaddress_city = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_CITY;
        }


        return $this;
    } // setClientaddressCity()

    /**
     * Set the value of [clientaddress_state] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_state !== $v) {
            $this->clientaddress_state = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_STATE;
        }


        return $this;
    } // setClientaddressState()

    /**
     * Set the value of [clientaddress_zipcode] column.
     *
     * @param  string $v new value
     * @return Clientaddress The current object (for fluent API support)
     */
    public function setClientaddressZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clientaddress_zipcode !== $v) {
            $this->clientaddress_zipcode = $v;
            $this->modifiedColumns[] = ClientaddressPeer::CLIENTADDRESS_ZIPCODE;
        }


        return $this;
    } // setClientaddressZipcode()

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

            $this->idclientaddress = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idclient = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->clientaddress_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->clientaddress_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->clientaddress_addressee = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->clientaddress_addressee_cellular = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->clientaddress_addressee_phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->clientaddress_address = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->clientaddress_address2 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->clientaddress_city = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->clientaddress_state = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->clientaddress_zipcode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 12; // 12 = ClientaddressPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Clientaddress object", $e);
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
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientaddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClientaddressQuery::create()
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
            $con = Propel::getConnection(ClientaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientaddressPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = ClientaddressPeer::IDCLIENTADDRESS;
        if (null !== $this->idclientaddress) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientaddressPeer::IDCLIENTADDRESS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientaddressPeer::IDCLIENTADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`idclientaddress`';
        }
        if ($this->isColumnModified(ClientaddressPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_iso_codecountry`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_iso_codephone`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_addressee`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_addressee_cellular`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_addressee_phone`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_address`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_address2`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_city`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_state`';
        }
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`clientaddress_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `clientaddress` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idclientaddress`':
                        $stmt->bindValue($identifier, $this->idclientaddress, PDO::PARAM_INT);
                        break;
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`clientaddress_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->clientaddress_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_iso_codephone`':
                        $stmt->bindValue($identifier, $this->clientaddress_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_addressee`':
                        $stmt->bindValue($identifier, $this->clientaddress_addressee, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->clientaddress_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_addressee_phone`':
                        $stmt->bindValue($identifier, $this->clientaddress_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_address`':
                        $stmt->bindValue($identifier, $this->clientaddress_address, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_address2`':
                        $stmt->bindValue($identifier, $this->clientaddress_address2, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_city`':
                        $stmt->bindValue($identifier, $this->clientaddress_city, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_state`':
                        $stmt->bindValue($identifier, $this->clientaddress_state, PDO::PARAM_STR);
                        break;
                    case '`clientaddress_zipcode`':
                        $stmt->bindValue($identifier, $this->clientaddress_zipcode, PDO::PARAM_STR);
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
        $this->setIdclientaddress($pk);

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


            if (($retval = ClientaddressPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ClientaddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdclientaddress();
                break;
            case 1:
                return $this->getIdclient();
                break;
            case 2:
                return $this->getClientaddressIsoCodecountry();
                break;
            case 3:
                return $this->getClientaddressIsoCodephone();
                break;
            case 4:
                return $this->getClientaddressAddressee();
                break;
            case 5:
                return $this->getClientaddressAddresseeCellular();
                break;
            case 6:
                return $this->getClientaddressAddresseePhone();
                break;
            case 7:
                return $this->getClientaddressAddress();
                break;
            case 8:
                return $this->getClientaddressAddress2();
                break;
            case 9:
                return $this->getClientaddressCity();
                break;
            case 10:
                return $this->getClientaddressState();
                break;
            case 11:
                return $this->getClientaddressZipcode();
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
        if (isset($alreadyDumpedObjects['Clientaddress'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clientaddress'][$this->getPrimaryKey()] = true;
        $keys = ClientaddressPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdclientaddress(),
            $keys[1] => $this->getIdclient(),
            $keys[2] => $this->getClientaddressIsoCodecountry(),
            $keys[3] => $this->getClientaddressIsoCodephone(),
            $keys[4] => $this->getClientaddressAddressee(),
            $keys[5] => $this->getClientaddressAddresseeCellular(),
            $keys[6] => $this->getClientaddressAddresseePhone(),
            $keys[7] => $this->getClientaddressAddress(),
            $keys[8] => $this->getClientaddressAddress2(),
            $keys[9] => $this->getClientaddressCity(),
            $keys[10] => $this->getClientaddressState(),
            $keys[11] => $this->getClientaddressZipcode(),
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
        $pos = ClientaddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdclientaddress($value);
                break;
            case 1:
                $this->setIdclient($value);
                break;
            case 2:
                $this->setClientaddressIsoCodecountry($value);
                break;
            case 3:
                $this->setClientaddressIsoCodephone($value);
                break;
            case 4:
                $this->setClientaddressAddressee($value);
                break;
            case 5:
                $this->setClientaddressAddresseeCellular($value);
                break;
            case 6:
                $this->setClientaddressAddresseePhone($value);
                break;
            case 7:
                $this->setClientaddressAddress($value);
                break;
            case 8:
                $this->setClientaddressAddress2($value);
                break;
            case 9:
                $this->setClientaddressCity($value);
                break;
            case 10:
                $this->setClientaddressState($value);
                break;
            case 11:
                $this->setClientaddressZipcode($value);
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
        $keys = ClientaddressPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdclientaddress($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdclient($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClientaddressIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setClientaddressIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setClientaddressAddressee($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setClientaddressAddresseeCellular($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClientaddressAddresseePhone($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setClientaddressAddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setClientaddressAddress2($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setClientaddressCity($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClientaddressState($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setClientaddressZipcode($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientaddressPeer::IDCLIENTADDRESS)) $criteria->add(ClientaddressPeer::IDCLIENTADDRESS, $this->idclientaddress);
        if ($this->isColumnModified(ClientaddressPeer::IDCLIENT)) $criteria->add(ClientaddressPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ISO_CODECOUNTRY, $this->clientaddress_iso_codecountry);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ISO_CODEPHONE, $this->clientaddress_iso_codephone);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE, $this->clientaddress_addressee);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_CELLULAR, $this->clientaddress_addressee_cellular);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ADDRESSEE_PHONE, $this->clientaddress_addressee_phone);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESS)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ADDRESS, $this->clientaddress_address);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ADDRESS2)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ADDRESS2, $this->clientaddress_address2);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_CITY)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_CITY, $this->clientaddress_city);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_STATE)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_STATE, $this->clientaddress_state);
        if ($this->isColumnModified(ClientaddressPeer::CLIENTADDRESS_ZIPCODE)) $criteria->add(ClientaddressPeer::CLIENTADDRESS_ZIPCODE, $this->clientaddress_zipcode);

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
        $criteria = new Criteria(ClientaddressPeer::DATABASE_NAME);
        $criteria->add(ClientaddressPeer::IDCLIENTADDRESS, $this->idclientaddress);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdclientaddress();
    }

    /**
     * Generic method to set the primary key (idclientaddress column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdclientaddress($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdclientaddress();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Clientaddress (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdclient($this->getIdclient());
        $copyObj->setClientaddressIsoCodecountry($this->getClientaddressIsoCodecountry());
        $copyObj->setClientaddressIsoCodephone($this->getClientaddressIsoCodephone());
        $copyObj->setClientaddressAddressee($this->getClientaddressAddressee());
        $copyObj->setClientaddressAddresseeCellular($this->getClientaddressAddresseeCellular());
        $copyObj->setClientaddressAddresseePhone($this->getClientaddressAddresseePhone());
        $copyObj->setClientaddressAddress($this->getClientaddressAddress());
        $copyObj->setClientaddressAddress2($this->getClientaddressAddress2());
        $copyObj->setClientaddressCity($this->getClientaddressCity());
        $copyObj->setClientaddressState($this->getClientaddressState());
        $copyObj->setClientaddressZipcode($this->getClientaddressZipcode());

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
            $copyObj->setIdclientaddress(NULL); // this is a auto-increment column, so set to default value
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
     * @return Clientaddress Clone of current object.
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
     * @return ClientaddressPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientaddressPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Clientaddress The current object (for fluent API support)
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
            $v->addClientaddress($this);
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
                $this->aClient->addClientaddresss($this);
             */
        }

        return $this->aClient;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idclientaddress = null;
        $this->idclient = null;
        $this->clientaddress_iso_codecountry = null;
        $this->clientaddress_iso_codephone = null;
        $this->clientaddress_addressee = null;
        $this->clientaddress_addressee_cellular = null;
        $this->clientaddress_addressee_phone = null;
        $this->clientaddress_address = null;
        $this->clientaddress_address2 = null;
        $this->clientaddress_city = null;
        $this->clientaddress_state = null;
        $this->clientaddress_zipcode = null;
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
        return (string) $this->exportTo(ClientaddressPeer::DEFAULT_STRING_FORMAT);
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
