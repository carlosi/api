<?php


/**
 * Base class that represents a row from the 'clienttax' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseClienttax extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ClienttaxPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClienttaxPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idclienttax field.
     * @var        int
     */
    protected $idclienttax;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the clienttax_iso_codecountry field.
     * @var        string
     */
    protected $clienttax_iso_codecountry;

    /**
     * The value for the clienttax_iso_codephone field.
     * @var        string
     */
    protected $clienttax_iso_codephone;

    /**
     * The value for the clienttax_name field.
     * @var        string
     */
    protected $clienttax_name;

    /**
     * The value for the clienttax_taxesid field.
     * @var        string
     */
    protected $clienttax_taxesid;

    /**
     * The value for the clienttax_address field.
     * @var        string
     */
    protected $clienttax_address;

    /**
     * The value for the clienttax_address2 field.
     * @var        string
     */
    protected $clienttax_address2;

    /**
     * The value for the clienttax_city field.
     * @var        string
     */
    protected $clienttax_city;

    /**
     * The value for the clienttax_state field.
     * @var        string
     */
    protected $clienttax_state;

    /**
     * The value for the clienttax_zipcode field.
     * @var        string
     */
    protected $clienttax_zipcode;

    /**
     * @var        Client
     */
    protected $aClient;

    /**
     * @var        PropelObjectCollection|Mxtaxdocument[] Collection to store aggregation of Mxtaxdocument objects.
     */
    protected $collMxtaxdocuments;
    protected $collMxtaxdocumentsPartial;

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
    protected $mxtaxdocumentsScheduledForDeletion = null;

    /**
     * Get the [idclienttax] column value.
     *
     * @return int
     */
    public function getIdclienttax()
    {

        return $this->idclienttax;
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
     * Get the [clienttax_iso_codecountry] column value.
     *
     * @return string
     */
    public function getClienttaxIsoCodecountry()
    {

        return $this->clienttax_iso_codecountry;
    }

    /**
     * Get the [clienttax_iso_codephone] column value.
     *
     * @return string
     */
    public function getClienttaxIsoCodephone()
    {

        return $this->clienttax_iso_codephone;
    }

    /**
     * Get the [clienttax_name] column value.
     *
     * @return string
     */
    public function getClienttaxName()
    {

        return $this->clienttax_name;
    }

    /**
     * Get the [clienttax_taxesid] column value.
     *
     * @return string
     */
    public function getClienttaxTaxesid()
    {

        return $this->clienttax_taxesid;
    }

    /**
     * Get the [clienttax_address] column value.
     *
     * @return string
     */
    public function getClienttaxAddress()
    {

        return $this->clienttax_address;
    }

    /**
     * Get the [clienttax_address2] column value.
     *
     * @return string
     */
    public function getClienttaxAddress2()
    {

        return $this->clienttax_address2;
    }

    /**
     * Get the [clienttax_city] column value.
     *
     * @return string
     */
    public function getClienttaxCity()
    {

        return $this->clienttax_city;
    }

    /**
     * Get the [clienttax_state] column value.
     *
     * @return string
     */
    public function getClienttaxState()
    {

        return $this->clienttax_state;
    }

    /**
     * Get the [clienttax_zipcode] column value.
     *
     * @return string
     */
    public function getClienttaxZipcode()
    {

        return $this->clienttax_zipcode;
    }

    /**
     * Set the value of [idclienttax] column.
     *
     * @param  int $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setIdclienttax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclienttax !== $v) {
            $this->idclienttax = $v;
            $this->modifiedColumns[] = ClienttaxPeer::IDCLIENTTAX;
        }


        return $this;
    } // setIdclienttax()

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = ClienttaxPeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

    /**
     * Set the value of [clienttax_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_iso_codecountry !== $v) {
            $this->clienttax_iso_codecountry = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_ISO_CODECOUNTRY;
        }


        return $this;
    } // setClienttaxIsoCodecountry()

    /**
     * Set the value of [clienttax_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_iso_codephone !== $v) {
            $this->clienttax_iso_codephone = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_ISO_CODEPHONE;
        }


        return $this;
    } // setClienttaxIsoCodephone()

    /**
     * Set the value of [clienttax_name] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_name !== $v) {
            $this->clienttax_name = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_NAME;
        }


        return $this;
    } // setClienttaxName()

    /**
     * Set the value of [clienttax_taxesid] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxTaxesid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_taxesid !== $v) {
            $this->clienttax_taxesid = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_TAXESID;
        }


        return $this;
    } // setClienttaxTaxesid()

    /**
     * Set the value of [clienttax_address] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_address !== $v) {
            $this->clienttax_address = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_ADDRESS;
        }


        return $this;
    } // setClienttaxAddress()

    /**
     * Set the value of [clienttax_address2] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_address2 !== $v) {
            $this->clienttax_address2 = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_ADDRESS2;
        }


        return $this;
    } // setClienttaxAddress2()

    /**
     * Set the value of [clienttax_city] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_city !== $v) {
            $this->clienttax_city = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_CITY;
        }


        return $this;
    } // setClienttaxCity()

    /**
     * Set the value of [clienttax_state] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_state !== $v) {
            $this->clienttax_state = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_STATE;
        }


        return $this;
    } // setClienttaxState()

    /**
     * Set the value of [clienttax_zipcode] column.
     *
     * @param  string $v new value
     * @return Clienttax The current object (for fluent API support)
     */
    public function setClienttaxZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienttax_zipcode !== $v) {
            $this->clienttax_zipcode = $v;
            $this->modifiedColumns[] = ClienttaxPeer::CLIENTTAX_ZIPCODE;
        }


        return $this;
    } // setClienttaxZipcode()

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

            $this->idclienttax = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idclient = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->clienttax_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->clienttax_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->clienttax_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->clienttax_taxesid = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->clienttax_address = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->clienttax_address2 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->clienttax_city = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->clienttax_state = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->clienttax_zipcode = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 11; // 11 = ClienttaxPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Clienttax object", $e);
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
            $con = Propel::getConnection(ClienttaxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClienttaxPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
            $this->collMxtaxdocuments = null;

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
            $con = Propel::getConnection(ClienttaxPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClienttaxQuery::create()
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
            $con = Propel::getConnection(ClienttaxPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClienttaxPeer::addInstanceToPool($this);
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

            if ($this->mxtaxdocumentsScheduledForDeletion !== null) {
                if (!$this->mxtaxdocumentsScheduledForDeletion->isEmpty()) {
                    MxtaxdocumentQuery::create()
                        ->filterByPrimaryKeys($this->mxtaxdocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mxtaxdocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collMxtaxdocuments !== null) {
                foreach ($this->collMxtaxdocuments as $referrerFK) {
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

        $this->modifiedColumns[] = ClienttaxPeer::IDCLIENTTAX;
        if (null !== $this->idclienttax) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClienttaxPeer::IDCLIENTTAX . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClienttaxPeer::IDCLIENTTAX)) {
            $modifiedColumns[':p' . $index++]  = '`idclienttax`';
        }
        if ($this->isColumnModified(ClienttaxPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_iso_codecountry`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_iso_codephone`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_name`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_TAXESID)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_taxesid`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_address`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_address2`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_city`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_state`';
        }
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`clienttax_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `clienttax` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idclienttax`':
                        $stmt->bindValue($identifier, $this->idclienttax, PDO::PARAM_INT);
                        break;
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`clienttax_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->clienttax_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`clienttax_iso_codephone`':
                        $stmt->bindValue($identifier, $this->clienttax_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`clienttax_name`':
                        $stmt->bindValue($identifier, $this->clienttax_name, PDO::PARAM_STR);
                        break;
                    case '`clienttax_taxesid`':
                        $stmt->bindValue($identifier, $this->clienttax_taxesid, PDO::PARAM_STR);
                        break;
                    case '`clienttax_address`':
                        $stmt->bindValue($identifier, $this->clienttax_address, PDO::PARAM_STR);
                        break;
                    case '`clienttax_address2`':
                        $stmt->bindValue($identifier, $this->clienttax_address2, PDO::PARAM_STR);
                        break;
                    case '`clienttax_city`':
                        $stmt->bindValue($identifier, $this->clienttax_city, PDO::PARAM_STR);
                        break;
                    case '`clienttax_state`':
                        $stmt->bindValue($identifier, $this->clienttax_state, PDO::PARAM_STR);
                        break;
                    case '`clienttax_zipcode`':
                        $stmt->bindValue($identifier, $this->clienttax_zipcode, PDO::PARAM_STR);
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
        $this->setIdclienttax($pk);

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


            if (($retval = ClienttaxPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMxtaxdocuments !== null) {
                    foreach ($this->collMxtaxdocuments as $referrerFK) {
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
        $pos = ClienttaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdclienttax();
                break;
            case 1:
                return $this->getIdclient();
                break;
            case 2:
                return $this->getClienttaxIsoCodecountry();
                break;
            case 3:
                return $this->getClienttaxIsoCodephone();
                break;
            case 4:
                return $this->getClienttaxName();
                break;
            case 5:
                return $this->getClienttaxTaxesid();
                break;
            case 6:
                return $this->getClienttaxAddress();
                break;
            case 7:
                return $this->getClienttaxAddress2();
                break;
            case 8:
                return $this->getClienttaxCity();
                break;
            case 9:
                return $this->getClienttaxState();
                break;
            case 10:
                return $this->getClienttaxZipcode();
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
        if (isset($alreadyDumpedObjects['Clienttax'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clienttax'][$this->getPrimaryKey()] = true;
        $keys = ClienttaxPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdclienttax(),
            $keys[1] => $this->getIdclient(),
            $keys[2] => $this->getClienttaxIsoCodecountry(),
            $keys[3] => $this->getClienttaxIsoCodephone(),
            $keys[4] => $this->getClienttaxName(),
            $keys[5] => $this->getClienttaxTaxesid(),
            $keys[6] => $this->getClienttaxAddress(),
            $keys[7] => $this->getClienttaxAddress2(),
            $keys[8] => $this->getClienttaxCity(),
            $keys[9] => $this->getClienttaxState(),
            $keys[10] => $this->getClienttaxZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMxtaxdocuments) {
                $result['Mxtaxdocuments'] = $this->collMxtaxdocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ClienttaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdclienttax($value);
                break;
            case 1:
                $this->setIdclient($value);
                break;
            case 2:
                $this->setClienttaxIsoCodecountry($value);
                break;
            case 3:
                $this->setClienttaxIsoCodephone($value);
                break;
            case 4:
                $this->setClienttaxName($value);
                break;
            case 5:
                $this->setClienttaxTaxesid($value);
                break;
            case 6:
                $this->setClienttaxAddress($value);
                break;
            case 7:
                $this->setClienttaxAddress2($value);
                break;
            case 8:
                $this->setClienttaxCity($value);
                break;
            case 9:
                $this->setClienttaxState($value);
                break;
            case 10:
                $this->setClienttaxZipcode($value);
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
        $keys = ClienttaxPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdclienttax($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdclient($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setClienttaxIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setClienttaxIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setClienttaxName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setClienttaxTaxesid($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setClienttaxAddress($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setClienttaxAddress2($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setClienttaxCity($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setClienttaxState($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setClienttaxZipcode($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClienttaxPeer::DATABASE_NAME);

        if ($this->isColumnModified(ClienttaxPeer::IDCLIENTTAX)) $criteria->add(ClienttaxPeer::IDCLIENTTAX, $this->idclienttax);
        if ($this->isColumnModified(ClienttaxPeer::IDCLIENT)) $criteria->add(ClienttaxPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ISO_CODECOUNTRY)) $criteria->add(ClienttaxPeer::CLIENTTAX_ISO_CODECOUNTRY, $this->clienttax_iso_codecountry);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ISO_CODEPHONE)) $criteria->add(ClienttaxPeer::CLIENTTAX_ISO_CODEPHONE, $this->clienttax_iso_codephone);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_NAME)) $criteria->add(ClienttaxPeer::CLIENTTAX_NAME, $this->clienttax_name);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_TAXESID)) $criteria->add(ClienttaxPeer::CLIENTTAX_TAXESID, $this->clienttax_taxesid);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ADDRESS)) $criteria->add(ClienttaxPeer::CLIENTTAX_ADDRESS, $this->clienttax_address);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ADDRESS2)) $criteria->add(ClienttaxPeer::CLIENTTAX_ADDRESS2, $this->clienttax_address2);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_CITY)) $criteria->add(ClienttaxPeer::CLIENTTAX_CITY, $this->clienttax_city);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_STATE)) $criteria->add(ClienttaxPeer::CLIENTTAX_STATE, $this->clienttax_state);
        if ($this->isColumnModified(ClienttaxPeer::CLIENTTAX_ZIPCODE)) $criteria->add(ClienttaxPeer::CLIENTTAX_ZIPCODE, $this->clienttax_zipcode);

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
        $criteria = new Criteria(ClienttaxPeer::DATABASE_NAME);
        $criteria->add(ClienttaxPeer::IDCLIENTTAX, $this->idclienttax);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdclienttax();
    }

    /**
     * Generic method to set the primary key (idclienttax column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdclienttax($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdclienttax();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Clienttax (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdclient($this->getIdclient());
        $copyObj->setClienttaxIsoCodecountry($this->getClienttaxIsoCodecountry());
        $copyObj->setClienttaxIsoCodephone($this->getClienttaxIsoCodephone());
        $copyObj->setClienttaxName($this->getClienttaxName());
        $copyObj->setClienttaxTaxesid($this->getClienttaxTaxesid());
        $copyObj->setClienttaxAddress($this->getClienttaxAddress());
        $copyObj->setClienttaxAddress2($this->getClienttaxAddress2());
        $copyObj->setClienttaxCity($this->getClienttaxCity());
        $copyObj->setClienttaxState($this->getClienttaxState());
        $copyObj->setClienttaxZipcode($this->getClienttaxZipcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMxtaxdocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMxtaxdocument($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdclienttax(NULL); // this is a auto-increment column, so set to default value
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
     * @return Clienttax Clone of current object.
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
     * @return ClienttaxPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClienttaxPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Clienttax The current object (for fluent API support)
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
            $v->addClienttax($this);
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
                $this->aClient->addClienttaxs($this);
             */
        }

        return $this->aClient;
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
        if ('Mxtaxdocument' == $relationName) {
            $this->initMxtaxdocuments();
        }
    }

    /**
     * Clears out the collMxtaxdocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Clienttax The current object (for fluent API support)
     * @see        addMxtaxdocuments()
     */
    public function clearMxtaxdocuments()
    {
        $this->collMxtaxdocuments = null; // important to set this to null since that means it is uninitialized
        $this->collMxtaxdocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collMxtaxdocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialMxtaxdocuments($v = true)
    {
        $this->collMxtaxdocumentsPartial = $v;
    }

    /**
     * Initializes the collMxtaxdocuments collection.
     *
     * By default this just sets the collMxtaxdocuments collection to an empty array (like clearcollMxtaxdocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMxtaxdocuments($overrideExisting = true)
    {
        if (null !== $this->collMxtaxdocuments && !$overrideExisting) {
            return;
        }
        $this->collMxtaxdocuments = new PropelObjectCollection();
        $this->collMxtaxdocuments->setModel('Mxtaxdocument');
    }

    /**
     * Gets an array of Mxtaxdocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Clienttax is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mxtaxdocument[] List of Mxtaxdocument objects
     * @throws PropelException
     */
    public function getMxtaxdocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxdocumentsPartial && !$this->isNew();
        if (null === $this->collMxtaxdocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMxtaxdocuments) {
                // return empty collection
                $this->initMxtaxdocuments();
            } else {
                $collMxtaxdocuments = MxtaxdocumentQuery::create(null, $criteria)
                    ->filterByClienttax($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMxtaxdocumentsPartial && count($collMxtaxdocuments)) {
                      $this->initMxtaxdocuments(false);

                      foreach ($collMxtaxdocuments as $obj) {
                        if (false == $this->collMxtaxdocuments->contains($obj)) {
                          $this->collMxtaxdocuments->append($obj);
                        }
                      }

                      $this->collMxtaxdocumentsPartial = true;
                    }

                    $collMxtaxdocuments->getInternalIterator()->rewind();

                    return $collMxtaxdocuments;
                }

                if ($partial && $this->collMxtaxdocuments) {
                    foreach ($this->collMxtaxdocuments as $obj) {
                        if ($obj->isNew()) {
                            $collMxtaxdocuments[] = $obj;
                        }
                    }
                }

                $this->collMxtaxdocuments = $collMxtaxdocuments;
                $this->collMxtaxdocumentsPartial = false;
            }
        }

        return $this->collMxtaxdocuments;
    }

    /**
     * Sets a collection of Mxtaxdocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mxtaxdocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Clienttax The current object (for fluent API support)
     */
    public function setMxtaxdocuments(PropelCollection $mxtaxdocuments, PropelPDO $con = null)
    {
        $mxtaxdocumentsToDelete = $this->getMxtaxdocuments(new Criteria(), $con)->diff($mxtaxdocuments);


        $this->mxtaxdocumentsScheduledForDeletion = $mxtaxdocumentsToDelete;

        foreach ($mxtaxdocumentsToDelete as $mxtaxdocumentRemoved) {
            $mxtaxdocumentRemoved->setClienttax(null);
        }

        $this->collMxtaxdocuments = null;
        foreach ($mxtaxdocuments as $mxtaxdocument) {
            $this->addMxtaxdocument($mxtaxdocument);
        }

        $this->collMxtaxdocuments = $mxtaxdocuments;
        $this->collMxtaxdocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mxtaxdocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mxtaxdocument objects.
     * @throws PropelException
     */
    public function countMxtaxdocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxdocumentsPartial && !$this->isNew();
        if (null === $this->collMxtaxdocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMxtaxdocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMxtaxdocuments());
            }
            $query = MxtaxdocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClienttax($this)
                ->count($con);
        }

        return count($this->collMxtaxdocuments);
    }

    /**
     * Method called to associate a Mxtaxdocument object to this object
     * through the Mxtaxdocument foreign key attribute.
     *
     * @param    Mxtaxdocument $l Mxtaxdocument
     * @return Clienttax The current object (for fluent API support)
     */
    public function addMxtaxdocument(Mxtaxdocument $l)
    {
        if ($this->collMxtaxdocuments === null) {
            $this->initMxtaxdocuments();
            $this->collMxtaxdocumentsPartial = true;
        }

        if (!in_array($l, $this->collMxtaxdocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMxtaxdocument($l);

            if ($this->mxtaxdocumentsScheduledForDeletion and $this->mxtaxdocumentsScheduledForDeletion->contains($l)) {
                $this->mxtaxdocumentsScheduledForDeletion->remove($this->mxtaxdocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Mxtaxdocument $mxtaxdocument The mxtaxdocument object to add.
     */
    protected function doAddMxtaxdocument($mxtaxdocument)
    {
        $this->collMxtaxdocuments[]= $mxtaxdocument;
        $mxtaxdocument->setClienttax($this);
    }

    /**
     * @param	Mxtaxdocument $mxtaxdocument The mxtaxdocument object to remove.
     * @return Clienttax The current object (for fluent API support)
     */
    public function removeMxtaxdocument($mxtaxdocument)
    {
        if ($this->getMxtaxdocuments()->contains($mxtaxdocument)) {
            $this->collMxtaxdocuments->remove($this->collMxtaxdocuments->search($mxtaxdocument));
            if (null === $this->mxtaxdocumentsScheduledForDeletion) {
                $this->mxtaxdocumentsScheduledForDeletion = clone $this->collMxtaxdocuments;
                $this->mxtaxdocumentsScheduledForDeletion->clear();
            }
            $this->mxtaxdocumentsScheduledForDeletion[]= clone $mxtaxdocument;
            $mxtaxdocument->setClienttax(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clienttax is new, it will return
     * an empty collection; or if this Clienttax has previously
     * been saved, it will retrieve related Mxtaxdocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clienttax.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mxtaxdocument[] List of Mxtaxdocument objects
     */
    public function getMxtaxdocumentsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MxtaxdocumentQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getMxtaxdocuments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idclienttax = null;
        $this->idclient = null;
        $this->clienttax_iso_codecountry = null;
        $this->clienttax_iso_codephone = null;
        $this->clienttax_name = null;
        $this->clienttax_taxesid = null;
        $this->clienttax_address = null;
        $this->clienttax_address2 = null;
        $this->clienttax_city = null;
        $this->clienttax_state = null;
        $this->clienttax_zipcode = null;
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
            if ($this->collMxtaxdocuments) {
                foreach ($this->collMxtaxdocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMxtaxdocuments instanceof PropelCollection) {
            $this->collMxtaxdocuments->clearIterator();
        }
        $this->collMxtaxdocuments = null;
        $this->aClient = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClienttaxPeer::DEFAULT_STRING_FORMAT);
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
