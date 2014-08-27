<?php


/**
 * Base class that represents a row from the 'marketingprospectionuser' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectionuser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MarketingprospectionuserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MarketingprospectionuserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmarketingprospectionuser field.
     * @var        int
     */
    protected $idmarketingprospectionuser;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the idmarketingprospection field.
     * @var        int
     */
    protected $idmarketingprospection;

    /**
     * @var        Marketingprospection
     */
    protected $aMarketingprospection;

    /**
     * @var        User
     */
    protected $aUser;

    /**
     * @var        PropelObjectCollection|Marketingprospectioninteraction[] Collection to store aggregation of Marketingprospectioninteraction objects.
     */
    protected $collMarketingprospectioninteractions;
    protected $collMarketingprospectioninteractionsPartial;

    /**
     * @var        PropelObjectCollection|Marketingprospectionnote[] Collection to store aggregation of Marketingprospectionnote objects.
     */
    protected $collMarketingprospectionnotes;
    protected $collMarketingprospectionnotesPartial;

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
    protected $marketingprospectioninteractionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $marketingprospectionnotesScheduledForDeletion = null;

    /**
     * Get the [idmarketingprospectionuser] column value.
     *
     * @return int
     */
    public function getIdmarketingprospectionuser()
    {

        return $this->idmarketingprospectionuser;
    }

    /**
     * Get the [iduser] column value.
     *
     * @return int
     */
    public function getIduser()
    {

        return $this->iduser;
    }

    /**
     * Get the [idmarketingprospection] column value.
     *
     * @return int
     */
    public function getIdmarketingprospection()
    {

        return $this->idmarketingprospection;
    }

    /**
     * Set the value of [idmarketingprospectionuser] column.
     *
     * @param  int $v new value
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function setIdmarketingprospectionuser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingprospectionuser !== $v) {
            $this->idmarketingprospectionuser = $v;
            $this->modifiedColumns[] = MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER;
        }


        return $this;
    } // setIdmarketingprospectionuser()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = MarketingprospectionuserPeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIduser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [idmarketingprospection] column.
     *
     * @param  int $v new value
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function setIdmarketingprospection($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingprospection !== $v) {
            $this->idmarketingprospection = $v;
            $this->modifiedColumns[] = MarketingprospectionuserPeer::IDMARKETINGPROSPECTION;
        }

        if ($this->aMarketingprospection !== null && $this->aMarketingprospection->getIdmarketingprospection() !== $v) {
            $this->aMarketingprospection = null;
        }


        return $this;
    } // setIdmarketingprospection()

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

            $this->idmarketingprospectionuser = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iduser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idmarketingprospection = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = MarketingprospectionuserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Marketingprospectionuser object", $e);
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

        if ($this->aUser !== null && $this->iduser !== $this->aUser->getIduser()) {
            $this->aUser = null;
        }
        if ($this->aMarketingprospection !== null && $this->idmarketingprospection !== $this->aMarketingprospection->getIdmarketingprospection()) {
            $this->aMarketingprospection = null;
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
            $con = Propel::getConnection(MarketingprospectionuserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MarketingprospectionuserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMarketingprospection = null;
            $this->aUser = null;
            $this->collMarketingprospectioninteractions = null;

            $this->collMarketingprospectionnotes = null;

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
            $con = Propel::getConnection(MarketingprospectionuserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MarketingprospectionuserQuery::create()
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
            $con = Propel::getConnection(MarketingprospectionuserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MarketingprospectionuserPeer::addInstanceToPool($this);
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

            if ($this->aMarketingprospection !== null) {
                if ($this->aMarketingprospection->isModified() || $this->aMarketingprospection->isNew()) {
                    $affectedRows += $this->aMarketingprospection->save($con);
                }
                $this->setMarketingprospection($this->aMarketingprospection);
            }

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
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

            if ($this->marketingprospectioninteractionsScheduledForDeletion !== null) {
                if (!$this->marketingprospectioninteractionsScheduledForDeletion->isEmpty()) {
                    MarketingprospectioninteractionQuery::create()
                        ->filterByPrimaryKeys($this->marketingprospectioninteractionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->marketingprospectioninteractionsScheduledForDeletion = null;
                }
            }

            if ($this->collMarketingprospectioninteractions !== null) {
                foreach ($this->collMarketingprospectioninteractions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->marketingprospectionnotesScheduledForDeletion !== null) {
                if (!$this->marketingprospectionnotesScheduledForDeletion->isEmpty()) {
                    MarketingprospectionnoteQuery::create()
                        ->filterByPrimaryKeys($this->marketingprospectionnotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->marketingprospectionnotesScheduledForDeletion = null;
                }
            }

            if ($this->collMarketingprospectionnotes !== null) {
                foreach ($this->collMarketingprospectionnotes as $referrerFK) {
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

        $this->modifiedColumns[] = MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER;
        if (null !== $this->idmarketingprospectionuser) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingprospectionuser`';
        }
        if ($this->isColumnModified(MarketingprospectionuserPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingprospection`';
        }

        $sql = sprintf(
            'INSERT INTO `marketingprospectionuser` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmarketingprospectionuser`':
                        $stmt->bindValue($identifier, $this->idmarketingprospectionuser, PDO::PARAM_INT);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`idmarketingprospection`':
                        $stmt->bindValue($identifier, $this->idmarketingprospection, PDO::PARAM_INT);
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
        $this->setIdmarketingprospectionuser($pk);

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

            if ($this->aMarketingprospection !== null) {
                if (!$this->aMarketingprospection->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMarketingprospection->getValidationFailures());
                }
            }

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = MarketingprospectionuserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMarketingprospectioninteractions !== null) {
                    foreach ($this->collMarketingprospectioninteractions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMarketingprospectionnotes !== null) {
                    foreach ($this->collMarketingprospectionnotes as $referrerFK) {
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
        $pos = MarketingprospectionuserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmarketingprospectionuser();
                break;
            case 1:
                return $this->getIduser();
                break;
            case 2:
                return $this->getIdmarketingprospection();
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
        if (isset($alreadyDumpedObjects['Marketingprospectionuser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Marketingprospectionuser'][$this->getPrimaryKey()] = true;
        $keys = MarketingprospectionuserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmarketingprospectionuser(),
            $keys[1] => $this->getIduser(),
            $keys[2] => $this->getIdmarketingprospection(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMarketingprospection) {
                $result['Marketingprospection'] = $this->aMarketingprospection->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMarketingprospectioninteractions) {
                $result['Marketingprospectioninteractions'] = $this->collMarketingprospectioninteractions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMarketingprospectionnotes) {
                $result['Marketingprospectionnotes'] = $this->collMarketingprospectionnotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MarketingprospectionuserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmarketingprospectionuser($value);
                break;
            case 1:
                $this->setIduser($value);
                break;
            case 2:
                $this->setIdmarketingprospection($value);
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
        $keys = MarketingprospectionuserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmarketingprospectionuser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIduser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdmarketingprospection($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MarketingprospectionuserPeer::DATABASE_NAME);

        if ($this->isColumnModified(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER)) $criteria->add(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $this->idmarketingprospectionuser);
        if ($this->isColumnModified(MarketingprospectionuserPeer::IDUSER)) $criteria->add(MarketingprospectionuserPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION)) $criteria->add(MarketingprospectionuserPeer::IDMARKETINGPROSPECTION, $this->idmarketingprospection);

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
        $criteria = new Criteria(MarketingprospectionuserPeer::DATABASE_NAME);
        $criteria->add(MarketingprospectionuserPeer::IDMARKETINGPROSPECTIONUSER, $this->idmarketingprospectionuser);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmarketingprospectionuser();
    }

    /**
     * Generic method to set the primary key (idmarketingprospectionuser column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmarketingprospectionuser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmarketingprospectionuser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Marketingprospectionuser (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIduser($this->getIduser());
        $copyObj->setIdmarketingprospection($this->getIdmarketingprospection());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMarketingprospectioninteractions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMarketingprospectioninteraction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMarketingprospectionnotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMarketingprospectionnote($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdmarketingprospectionuser(NULL); // this is a auto-increment column, so set to default value
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
     * @return Marketingprospectionuser Clone of current object.
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
     * @return MarketingprospectionuserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MarketingprospectionuserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Marketingprospection object.
     *
     * @param                  Marketingprospection $v
     * @return Marketingprospectionuser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMarketingprospection(Marketingprospection $v = null)
    {
        if ($v === null) {
            $this->setIdmarketingprospection(NULL);
        } else {
            $this->setIdmarketingprospection($v->getIdmarketingprospection());
        }

        $this->aMarketingprospection = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Marketingprospection object, it will not be re-added.
        if ($v !== null) {
            $v->addMarketingprospectionuser($this);
        }


        return $this;
    }


    /**
     * Get the associated Marketingprospection object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Marketingprospection The associated Marketingprospection object.
     * @throws PropelException
     */
    public function getMarketingprospection(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMarketingprospection === null && ($this->idmarketingprospection !== null) && $doQuery) {
            $this->aMarketingprospection = MarketingprospectionQuery::create()->findPk($this->idmarketingprospection, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMarketingprospection->addMarketingprospectionusers($this);
             */
        }

        return $this->aMarketingprospection;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Marketingprospectionuser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setIduser(NULL);
        } else {
            $this->setIduser($v->getIduser());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addMarketingprospectionuser($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && ($this->iduser !== null) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->iduser, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addMarketingprospectionusers($this);
             */
        }

        return $this->aUser;
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
        if ('Marketingprospectioninteraction' == $relationName) {
            $this->initMarketingprospectioninteractions();
        }
        if ('Marketingprospectionnote' == $relationName) {
            $this->initMarketingprospectionnotes();
        }
    }

    /**
     * Clears out the collMarketingprospectioninteractions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Marketingprospectionuser The current object (for fluent API support)
     * @see        addMarketingprospectioninteractions()
     */
    public function clearMarketingprospectioninteractions()
    {
        $this->collMarketingprospectioninteractions = null; // important to set this to null since that means it is uninitialized
        $this->collMarketingprospectioninteractionsPartial = null;

        return $this;
    }

    /**
     * reset is the collMarketingprospectioninteractions collection loaded partially
     *
     * @return void
     */
    public function resetPartialMarketingprospectioninteractions($v = true)
    {
        $this->collMarketingprospectioninteractionsPartial = $v;
    }

    /**
     * Initializes the collMarketingprospectioninteractions collection.
     *
     * By default this just sets the collMarketingprospectioninteractions collection to an empty array (like clearcollMarketingprospectioninteractions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMarketingprospectioninteractions($overrideExisting = true)
    {
        if (null !== $this->collMarketingprospectioninteractions && !$overrideExisting) {
            return;
        }
        $this->collMarketingprospectioninteractions = new PropelObjectCollection();
        $this->collMarketingprospectioninteractions->setModel('Marketingprospectioninteraction');
    }

    /**
     * Gets an array of Marketingprospectioninteraction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Marketingprospectionuser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Marketingprospectioninteraction[] List of Marketingprospectioninteraction objects
     * @throws PropelException
     */
    public function getMarketingprospectioninteractions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMarketingprospectioninteractionsPartial && !$this->isNew();
        if (null === $this->collMarketingprospectioninteractions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMarketingprospectioninteractions) {
                // return empty collection
                $this->initMarketingprospectioninteractions();
            } else {
                $collMarketingprospectioninteractions = MarketingprospectioninteractionQuery::create(null, $criteria)
                    ->filterByMarketingprospectionuser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMarketingprospectioninteractionsPartial && count($collMarketingprospectioninteractions)) {
                      $this->initMarketingprospectioninteractions(false);

                      foreach ($collMarketingprospectioninteractions as $obj) {
                        if (false == $this->collMarketingprospectioninteractions->contains($obj)) {
                          $this->collMarketingprospectioninteractions->append($obj);
                        }
                      }

                      $this->collMarketingprospectioninteractionsPartial = true;
                    }

                    $collMarketingprospectioninteractions->getInternalIterator()->rewind();

                    return $collMarketingprospectioninteractions;
                }

                if ($partial && $this->collMarketingprospectioninteractions) {
                    foreach ($this->collMarketingprospectioninteractions as $obj) {
                        if ($obj->isNew()) {
                            $collMarketingprospectioninteractions[] = $obj;
                        }
                    }
                }

                $this->collMarketingprospectioninteractions = $collMarketingprospectioninteractions;
                $this->collMarketingprospectioninteractionsPartial = false;
            }
        }

        return $this->collMarketingprospectioninteractions;
    }

    /**
     * Sets a collection of Marketingprospectioninteraction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $marketingprospectioninteractions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function setMarketingprospectioninteractions(PropelCollection $marketingprospectioninteractions, PropelPDO $con = null)
    {
        $marketingprospectioninteractionsToDelete = $this->getMarketingprospectioninteractions(new Criteria(), $con)->diff($marketingprospectioninteractions);


        $this->marketingprospectioninteractionsScheduledForDeletion = $marketingprospectioninteractionsToDelete;

        foreach ($marketingprospectioninteractionsToDelete as $marketingprospectioninteractionRemoved) {
            $marketingprospectioninteractionRemoved->setMarketingprospectionuser(null);
        }

        $this->collMarketingprospectioninteractions = null;
        foreach ($marketingprospectioninteractions as $marketingprospectioninteraction) {
            $this->addMarketingprospectioninteraction($marketingprospectioninteraction);
        }

        $this->collMarketingprospectioninteractions = $marketingprospectioninteractions;
        $this->collMarketingprospectioninteractionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Marketingprospectioninteraction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Marketingprospectioninteraction objects.
     * @throws PropelException
     */
    public function countMarketingprospectioninteractions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMarketingprospectioninteractionsPartial && !$this->isNew();
        if (null === $this->collMarketingprospectioninteractions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMarketingprospectioninteractions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMarketingprospectioninteractions());
            }
            $query = MarketingprospectioninteractionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMarketingprospectionuser($this)
                ->count($con);
        }

        return count($this->collMarketingprospectioninteractions);
    }

    /**
     * Method called to associate a Marketingprospectioninteraction object to this object
     * through the Marketingprospectioninteraction foreign key attribute.
     *
     * @param    Marketingprospectioninteraction $l Marketingprospectioninteraction
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function addMarketingprospectioninteraction(Marketingprospectioninteraction $l)
    {
        if ($this->collMarketingprospectioninteractions === null) {
            $this->initMarketingprospectioninteractions();
            $this->collMarketingprospectioninteractionsPartial = true;
        }

        if (!in_array($l, $this->collMarketingprospectioninteractions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMarketingprospectioninteraction($l);

            if ($this->marketingprospectioninteractionsScheduledForDeletion and $this->marketingprospectioninteractionsScheduledForDeletion->contains($l)) {
                $this->marketingprospectioninteractionsScheduledForDeletion->remove($this->marketingprospectioninteractionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Marketingprospectioninteraction $marketingprospectioninteraction The marketingprospectioninteraction object to add.
     */
    protected function doAddMarketingprospectioninteraction($marketingprospectioninteraction)
    {
        $this->collMarketingprospectioninteractions[]= $marketingprospectioninteraction;
        $marketingprospectioninteraction->setMarketingprospectionuser($this);
    }

    /**
     * @param	Marketingprospectioninteraction $marketingprospectioninteraction The marketingprospectioninteraction object to remove.
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function removeMarketingprospectioninteraction($marketingprospectioninteraction)
    {
        if ($this->getMarketingprospectioninteractions()->contains($marketingprospectioninteraction)) {
            $this->collMarketingprospectioninteractions->remove($this->collMarketingprospectioninteractions->search($marketingprospectioninteraction));
            if (null === $this->marketingprospectioninteractionsScheduledForDeletion) {
                $this->marketingprospectioninteractionsScheduledForDeletion = clone $this->collMarketingprospectioninteractions;
                $this->marketingprospectioninteractionsScheduledForDeletion->clear();
            }
            $this->marketingprospectioninteractionsScheduledForDeletion[]= clone $marketingprospectioninteraction;
            $marketingprospectioninteraction->setMarketingprospectionuser(null);
        }

        return $this;
    }

    /**
     * Clears out the collMarketingprospectionnotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Marketingprospectionuser The current object (for fluent API support)
     * @see        addMarketingprospectionnotes()
     */
    public function clearMarketingprospectionnotes()
    {
        $this->collMarketingprospectionnotes = null; // important to set this to null since that means it is uninitialized
        $this->collMarketingprospectionnotesPartial = null;

        return $this;
    }

    /**
     * reset is the collMarketingprospectionnotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialMarketingprospectionnotes($v = true)
    {
        $this->collMarketingprospectionnotesPartial = $v;
    }

    /**
     * Initializes the collMarketingprospectionnotes collection.
     *
     * By default this just sets the collMarketingprospectionnotes collection to an empty array (like clearcollMarketingprospectionnotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMarketingprospectionnotes($overrideExisting = true)
    {
        if (null !== $this->collMarketingprospectionnotes && !$overrideExisting) {
            return;
        }
        $this->collMarketingprospectionnotes = new PropelObjectCollection();
        $this->collMarketingprospectionnotes->setModel('Marketingprospectionnote');
    }

    /**
     * Gets an array of Marketingprospectionnote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Marketingprospectionuser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Marketingprospectionnote[] List of Marketingprospectionnote objects
     * @throws PropelException
     */
    public function getMarketingprospectionnotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMarketingprospectionnotesPartial && !$this->isNew();
        if (null === $this->collMarketingprospectionnotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMarketingprospectionnotes) {
                // return empty collection
                $this->initMarketingprospectionnotes();
            } else {
                $collMarketingprospectionnotes = MarketingprospectionnoteQuery::create(null, $criteria)
                    ->filterByMarketingprospectionuser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMarketingprospectionnotesPartial && count($collMarketingprospectionnotes)) {
                      $this->initMarketingprospectionnotes(false);

                      foreach ($collMarketingprospectionnotes as $obj) {
                        if (false == $this->collMarketingprospectionnotes->contains($obj)) {
                          $this->collMarketingprospectionnotes->append($obj);
                        }
                      }

                      $this->collMarketingprospectionnotesPartial = true;
                    }

                    $collMarketingprospectionnotes->getInternalIterator()->rewind();

                    return $collMarketingprospectionnotes;
                }

                if ($partial && $this->collMarketingprospectionnotes) {
                    foreach ($this->collMarketingprospectionnotes as $obj) {
                        if ($obj->isNew()) {
                            $collMarketingprospectionnotes[] = $obj;
                        }
                    }
                }

                $this->collMarketingprospectionnotes = $collMarketingprospectionnotes;
                $this->collMarketingprospectionnotesPartial = false;
            }
        }

        return $this->collMarketingprospectionnotes;
    }

    /**
     * Sets a collection of Marketingprospectionnote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $marketingprospectionnotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function setMarketingprospectionnotes(PropelCollection $marketingprospectionnotes, PropelPDO $con = null)
    {
        $marketingprospectionnotesToDelete = $this->getMarketingprospectionnotes(new Criteria(), $con)->diff($marketingprospectionnotes);


        $this->marketingprospectionnotesScheduledForDeletion = $marketingprospectionnotesToDelete;

        foreach ($marketingprospectionnotesToDelete as $marketingprospectionnoteRemoved) {
            $marketingprospectionnoteRemoved->setMarketingprospectionuser(null);
        }

        $this->collMarketingprospectionnotes = null;
        foreach ($marketingprospectionnotes as $marketingprospectionnote) {
            $this->addMarketingprospectionnote($marketingprospectionnote);
        }

        $this->collMarketingprospectionnotes = $marketingprospectionnotes;
        $this->collMarketingprospectionnotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Marketingprospectionnote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Marketingprospectionnote objects.
     * @throws PropelException
     */
    public function countMarketingprospectionnotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMarketingprospectionnotesPartial && !$this->isNew();
        if (null === $this->collMarketingprospectionnotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMarketingprospectionnotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMarketingprospectionnotes());
            }
            $query = MarketingprospectionnoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMarketingprospectionuser($this)
                ->count($con);
        }

        return count($this->collMarketingprospectionnotes);
    }

    /**
     * Method called to associate a Marketingprospectionnote object to this object
     * through the Marketingprospectionnote foreign key attribute.
     *
     * @param    Marketingprospectionnote $l Marketingprospectionnote
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function addMarketingprospectionnote(Marketingprospectionnote $l)
    {
        if ($this->collMarketingprospectionnotes === null) {
            $this->initMarketingprospectionnotes();
            $this->collMarketingprospectionnotesPartial = true;
        }

        if (!in_array($l, $this->collMarketingprospectionnotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMarketingprospectionnote($l);

            if ($this->marketingprospectionnotesScheduledForDeletion and $this->marketingprospectionnotesScheduledForDeletion->contains($l)) {
                $this->marketingprospectionnotesScheduledForDeletion->remove($this->marketingprospectionnotesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Marketingprospectionnote $marketingprospectionnote The marketingprospectionnote object to add.
     */
    protected function doAddMarketingprospectionnote($marketingprospectionnote)
    {
        $this->collMarketingprospectionnotes[]= $marketingprospectionnote;
        $marketingprospectionnote->setMarketingprospectionuser($this);
    }

    /**
     * @param	Marketingprospectionnote $marketingprospectionnote The marketingprospectionnote object to remove.
     * @return Marketingprospectionuser The current object (for fluent API support)
     */
    public function removeMarketingprospectionnote($marketingprospectionnote)
    {
        if ($this->getMarketingprospectionnotes()->contains($marketingprospectionnote)) {
            $this->collMarketingprospectionnotes->remove($this->collMarketingprospectionnotes->search($marketingprospectionnote));
            if (null === $this->marketingprospectionnotesScheduledForDeletion) {
                $this->marketingprospectionnotesScheduledForDeletion = clone $this->collMarketingprospectionnotes;
                $this->marketingprospectionnotesScheduledForDeletion->clear();
            }
            $this->marketingprospectionnotesScheduledForDeletion[]= clone $marketingprospectionnote;
            $marketingprospectionnote->setMarketingprospectionuser(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmarketingprospectionuser = null;
        $this->iduser = null;
        $this->idmarketingprospection = null;
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
            if ($this->collMarketingprospectioninteractions) {
                foreach ($this->collMarketingprospectioninteractions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMarketingprospectionnotes) {
                foreach ($this->collMarketingprospectionnotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMarketingprospection instanceof Persistent) {
              $this->aMarketingprospection->clearAllReferences($deep);
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMarketingprospectioninteractions instanceof PropelCollection) {
            $this->collMarketingprospectioninteractions->clearIterator();
        }
        $this->collMarketingprospectioninteractions = null;
        if ($this->collMarketingprospectionnotes instanceof PropelCollection) {
            $this->collMarketingprospectionnotes->clearIterator();
        }
        $this->collMarketingprospectionnotes = null;
        $this->aMarketingprospection = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MarketingprospectionuserPeer::DEFAULT_STRING_FORMAT);
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
