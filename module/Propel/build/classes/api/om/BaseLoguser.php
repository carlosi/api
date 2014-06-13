<?php


/**
 * Base class that represents a row from the 'loguser' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseLoguser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'LoguserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        LoguserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idloguser field.
     * @var        int
     */
    protected $idloguser;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the table field.
     * @var        string
     */
    protected $table;

    /**
     * The value for the loguser_type field.
     * @var        string
     */
    protected $loguser_type;

    /**
     * The value for the old_data field.
     * @var        string
     */
    protected $old_data;

    /**
     * The value for the new_data field.
     * @var        string
     */
    protected $new_data;

    /**
     * The value for the loguser_date field.
     * @var        string
     */
    protected $loguser_date;

    /**
     * @var        User
     */
    protected $aUser;

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
     * Get the [idloguser] column value.
     *
     * @return int
     */
    public function getIdloguser()
    {

        return $this->idloguser;
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
     * Get the [table] column value.
     *
     * @return string
     */
    public function getTable()
    {

        return $this->table;
    }

    /**
     * Get the [loguser_type] column value.
     *
     * @return string
     */
    public function getLoguserType()
    {

        return $this->loguser_type;
    }

    /**
     * Get the [old_data] column value.
     *
     * @return string
     */
    public function getOldData()
    {

        return $this->old_data;
    }

    /**
     * Get the [new_data] column value.
     *
     * @return string
     */
    public function getNewData()
    {

        return $this->new_data;
    }

    /**
     * Get the [optionally formatted] temporal [loguser_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLoguserDate($format = 'Y-m-d H:i:s')
    {
        if ($this->loguser_date === null) {
            return null;
        }

        if ($this->loguser_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->loguser_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->loguser_date, true), $x);
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
     * Set the value of [idloguser] column.
     *
     * @param  int $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setIdloguser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idloguser !== $v) {
            $this->idloguser = $v;
            $this->modifiedColumns[] = LoguserPeer::IDLOGUSER;
        }


        return $this;
    } // setIdloguser()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = LoguserPeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIdUser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [table] column.
     *
     * @param  string $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setTable($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->table !== $v) {
            $this->table = $v;
            $this->modifiedColumns[] = LoguserPeer::TABLE;
        }


        return $this;
    } // setTable()

    /**
     * Set the value of [loguser_type] column.
     *
     * @param  string $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setLoguserType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->loguser_type !== $v) {
            $this->loguser_type = $v;
            $this->modifiedColumns[] = LoguserPeer::LOGUSER_TYPE;
        }


        return $this;
    } // setLoguserType()

    /**
     * Set the value of [old_data] column.
     *
     * @param  string $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setOldData($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->old_data !== $v) {
            $this->old_data = $v;
            $this->modifiedColumns[] = LoguserPeer::OLD_DATA;
        }


        return $this;
    } // setOldData()

    /**
     * Set the value of [new_data] column.
     *
     * @param  string $v new value
     * @return Loguser The current object (for fluent API support)
     */
    public function setNewData($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->new_data !== $v) {
            $this->new_data = $v;
            $this->modifiedColumns[] = LoguserPeer::NEW_DATA;
        }


        return $this;
    } // setNewData()

    /**
     * Sets the value of [loguser_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Loguser The current object (for fluent API support)
     */
    public function setLoguserDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->loguser_date !== null || $dt !== null) {
            $currentDateAsString = ($this->loguser_date !== null && $tmpDt = new DateTime($this->loguser_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->loguser_date = $newDateAsString;
                $this->modifiedColumns[] = LoguserPeer::LOGUSER_DATE;
            }
        } // if either are not null


        return $this;
    } // setLoguserDate()

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

            $this->idloguser = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iduser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->table = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->loguser_type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->old_data = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->new_data = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->loguser_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = LoguserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Loguser object", $e);
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

        if ($this->aUser !== null && $this->iduser !== $this->aUser->getIdUser()) {
            $this->aUser = null;
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
            $con = Propel::getConnection(LoguserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = LoguserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
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
            $con = Propel::getConnection(LoguserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = LoguserQuery::create()
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
            $con = Propel::getConnection(LoguserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                LoguserPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = LoguserPeer::IDLOGUSER;
        if (null !== $this->idloguser) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . LoguserPeer::IDLOGUSER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(LoguserPeer::IDLOGUSER)) {
            $modifiedColumns[':p' . $index++]  = '`idloguser`';
        }
        if ($this->isColumnModified(LoguserPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(LoguserPeer::TABLE)) {
            $modifiedColumns[':p' . $index++]  = '`table`';
        }
        if ($this->isColumnModified(LoguserPeer::LOGUSER_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`loguser_type`';
        }
        if ($this->isColumnModified(LoguserPeer::OLD_DATA)) {
            $modifiedColumns[':p' . $index++]  = '`old_data`';
        }
        if ($this->isColumnModified(LoguserPeer::NEW_DATA)) {
            $modifiedColumns[':p' . $index++]  = '`new_data`';
        }
        if ($this->isColumnModified(LoguserPeer::LOGUSER_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`loguser_date`';
        }

        $sql = sprintf(
            'INSERT INTO `loguser` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idloguser`':
                        $stmt->bindValue($identifier, $this->idloguser, PDO::PARAM_INT);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`table`':
                        $stmt->bindValue($identifier, $this->table, PDO::PARAM_STR);
                        break;
                    case '`loguser_type`':
                        $stmt->bindValue($identifier, $this->loguser_type, PDO::PARAM_STR);
                        break;
                    case '`old_data`':
                        $stmt->bindValue($identifier, $this->old_data, PDO::PARAM_STR);
                        break;
                    case '`new_data`':
                        $stmt->bindValue($identifier, $this->new_data, PDO::PARAM_STR);
                        break;
                    case '`loguser_date`':
                        $stmt->bindValue($identifier, $this->loguser_date, PDO::PARAM_STR);
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
        $this->setIdloguser($pk);

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

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = LoguserPeer::doValidate($this, $columns)) !== true) {
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
        $pos = LoguserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdloguser();
                break;
            case 1:
                return $this->getIduser();
                break;
            case 2:
                return $this->getTable();
                break;
            case 3:
                return $this->getLoguserType();
                break;
            case 4:
                return $this->getOldData();
                break;
            case 5:
                return $this->getNewData();
                break;
            case 6:
                return $this->getLoguserDate();
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
        if (isset($alreadyDumpedObjects['Loguser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Loguser'][$this->getPrimaryKey()] = true;
        $keys = LoguserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdloguser(),
            $keys[1] => $this->getIduser(),
            $keys[2] => $this->getTable(),
            $keys[3] => $this->getLoguserType(),
            $keys[4] => $this->getOldData(),
            $keys[5] => $this->getNewData(),
            $keys[6] => $this->getLoguserDate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = LoguserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdloguser($value);
                break;
            case 1:
                $this->setIduser($value);
                break;
            case 2:
                $this->setTable($value);
                break;
            case 3:
                $this->setLoguserType($value);
                break;
            case 4:
                $this->setOldData($value);
                break;
            case 5:
                $this->setNewData($value);
                break;
            case 6:
                $this->setLoguserDate($value);
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
        $keys = LoguserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdloguser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIduser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTable($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLoguserType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOldData($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNewData($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLoguserDate($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(LoguserPeer::DATABASE_NAME);

        if ($this->isColumnModified(LoguserPeer::IDLOGUSER)) $criteria->add(LoguserPeer::IDLOGUSER, $this->idloguser);
        if ($this->isColumnModified(LoguserPeer::IDUSER)) $criteria->add(LoguserPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(LoguserPeer::TABLE)) $criteria->add(LoguserPeer::TABLE, $this->table);
        if ($this->isColumnModified(LoguserPeer::LOGUSER_TYPE)) $criteria->add(LoguserPeer::LOGUSER_TYPE, $this->loguser_type);
        if ($this->isColumnModified(LoguserPeer::OLD_DATA)) $criteria->add(LoguserPeer::OLD_DATA, $this->old_data);
        if ($this->isColumnModified(LoguserPeer::NEW_DATA)) $criteria->add(LoguserPeer::NEW_DATA, $this->new_data);
        if ($this->isColumnModified(LoguserPeer::LOGUSER_DATE)) $criteria->add(LoguserPeer::LOGUSER_DATE, $this->loguser_date);

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
        $criteria = new Criteria(LoguserPeer::DATABASE_NAME);
        $criteria->add(LoguserPeer::IDLOGUSER, $this->idloguser);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdloguser();
    }

    /**
     * Generic method to set the primary key (idloguser column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdloguser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdloguser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Loguser (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIduser($this->getIduser());
        $copyObj->setTable($this->getTable());
        $copyObj->setLoguserType($this->getLoguserType());
        $copyObj->setOldData($this->getOldData());
        $copyObj->setNewData($this->getNewData());
        $copyObj->setLoguserDate($this->getLoguserDate());

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
            $copyObj->setIdloguser(NULL); // this is a auto-increment column, so set to default value
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
     * @return Loguser Clone of current object.
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
     * @return LoguserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new LoguserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Loguser The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setIduser(NULL);
        } else {
            $this->setIduser($v->getIdUser());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addLoguser($this);
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
                $this->aUser->addLogusers($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idloguser = null;
        $this->iduser = null;
        $this->table = null;
        $this->loguser_type = null;
        $this->old_data = null;
        $this->new_data = null;
        $this->loguser_date = null;
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
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(LoguserPeer::DEFAULT_STRING_FORMAT);
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
