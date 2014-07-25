<?php


/**
 * Base class that represents a row from the 'chatcorp' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatcorp extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ChatcorpPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ChatcorpPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idchatcorp field.
     * @var        int
     */
    protected $idchatcorp;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the chatcorp_message field.
     * @var        string
     */
    protected $chatcorp_message;

    /**
     * The value for the chatcorp_date field.
     * @var        string
     */
    protected $chatcorp_date;

    /**
     * @var        User
     */
    protected $aUser;

    /**
     * @var        PropelObjectCollection|ChatcorpAttachedfile[] Collection to store aggregation of ChatcorpAttachedfile objects.
     */
    protected $collChatcorpAttachedfiles;
    protected $collChatcorpAttachedfilesPartial;

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
    protected $chatcorpAttachedfilesScheduledForDeletion = null;

    /**
     * Get the [idchatcorp] column value.
     *
     * @return int
     */
    public function getIdchatcorp()
    {

        return $this->idchatcorp;
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
     * Get the [chatcorp_message] column value.
     *
     * @return string
     */
    public function getChatcorpMessage()
    {

        return $this->chatcorp_message;
    }

    /**
     * Get the [optionally formatted] temporal [chatcorp_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getChatcorpDate($format = 'Y-m-d H:i:s')
    {
        if ($this->chatcorp_date === null) {
            return null;
        }

        if ($this->chatcorp_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->chatcorp_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->chatcorp_date, true), $x);
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
     * Set the value of [idchatcorp] column.
     *
     * @param  int $v new value
     * @return Chatcorp The current object (for fluent API support)
     */
    public function setIdchatcorp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idchatcorp !== $v) {
            $this->idchatcorp = $v;
            $this->modifiedColumns[] = ChatcorpPeer::IDCHATCORP;
        }


        return $this;
    } // setIdchatcorp()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Chatcorp The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = ChatcorpPeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIduser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [chatcorp_message] column.
     *
     * @param  string $v new value
     * @return Chatcorp The current object (for fluent API support)
     */
    public function setChatcorpMessage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chatcorp_message !== $v) {
            $this->chatcorp_message = $v;
            $this->modifiedColumns[] = ChatcorpPeer::CHATCORP_MESSAGE;
        }


        return $this;
    } // setChatcorpMessage()

    /**
     * Sets the value of [chatcorp_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Chatcorp The current object (for fluent API support)
     */
    public function setChatcorpDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->chatcorp_date !== null || $dt !== null) {
            $currentDateAsString = ($this->chatcorp_date !== null && $tmpDt = new DateTime($this->chatcorp_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->chatcorp_date = $newDateAsString;
                $this->modifiedColumns[] = ChatcorpPeer::CHATCORP_DATE;
            }
        } // if either are not null


        return $this;
    } // setChatcorpDate()

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

            $this->idchatcorp = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iduser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->chatcorp_message = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->chatcorp_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ChatcorpPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Chatcorp object", $e);
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
            $con = Propel::getConnection(ChatcorpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ChatcorpPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->collChatcorpAttachedfiles = null;

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
            $con = Propel::getConnection(ChatcorpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChatcorpQuery::create()
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
            $con = Propel::getConnection(ChatcorpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ChatcorpPeer::addInstanceToPool($this);
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

            if ($this->chatcorpAttachedfilesScheduledForDeletion !== null) {
                if (!$this->chatcorpAttachedfilesScheduledForDeletion->isEmpty()) {
                    ChatcorpAttachedfileQuery::create()
                        ->filterByPrimaryKeys($this->chatcorpAttachedfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->chatcorpAttachedfilesScheduledForDeletion = null;
                }
            }

            if ($this->collChatcorpAttachedfiles !== null) {
                foreach ($this->collChatcorpAttachedfiles as $referrerFK) {
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

        $this->modifiedColumns[] = ChatcorpPeer::IDCHATCORP;
        if (null !== $this->idchatcorp) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ChatcorpPeer::IDCHATCORP . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ChatcorpPeer::IDCHATCORP)) {
            $modifiedColumns[':p' . $index++]  = '`idchatcorp`';
        }
        if ($this->isColumnModified(ChatcorpPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(ChatcorpPeer::CHATCORP_MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`chatcorp_message`';
        }
        if ($this->isColumnModified(ChatcorpPeer::CHATCORP_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`chatcorp_date`';
        }

        $sql = sprintf(
            'INSERT INTO `chatcorp` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idchatcorp`':
                        $stmt->bindValue($identifier, $this->idchatcorp, PDO::PARAM_INT);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`chatcorp_message`':
                        $stmt->bindValue($identifier, $this->chatcorp_message, PDO::PARAM_STR);
                        break;
                    case '`chatcorp_date`':
                        $stmt->bindValue($identifier, $this->chatcorp_date, PDO::PARAM_STR);
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
        $this->setIdchatcorp($pk);

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


            if (($retval = ChatcorpPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collChatcorpAttachedfiles !== null) {
                    foreach ($this->collChatcorpAttachedfiles as $referrerFK) {
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
        $pos = ChatcorpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdchatcorp();
                break;
            case 1:
                return $this->getIduser();
                break;
            case 2:
                return $this->getChatcorpMessage();
                break;
            case 3:
                return $this->getChatcorpDate();
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
        if (isset($alreadyDumpedObjects['Chatcorp'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Chatcorp'][$this->getPrimaryKey()] = true;
        $keys = ChatcorpPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdchatcorp(),
            $keys[1] => $this->getIduser(),
            $keys[2] => $this->getChatcorpMessage(),
            $keys[3] => $this->getChatcorpDate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collChatcorpAttachedfiles) {
                $result['ChatcorpAttachedfiles'] = $this->collChatcorpAttachedfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ChatcorpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdchatcorp($value);
                break;
            case 1:
                $this->setIduser($value);
                break;
            case 2:
                $this->setChatcorpMessage($value);
                break;
            case 3:
                $this->setChatcorpDate($value);
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
        $keys = ChatcorpPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdchatcorp($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIduser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setChatcorpMessage($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setChatcorpDate($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ChatcorpPeer::DATABASE_NAME);

        if ($this->isColumnModified(ChatcorpPeer::IDCHATCORP)) $criteria->add(ChatcorpPeer::IDCHATCORP, $this->idchatcorp);
        if ($this->isColumnModified(ChatcorpPeer::IDUSER)) $criteria->add(ChatcorpPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(ChatcorpPeer::CHATCORP_MESSAGE)) $criteria->add(ChatcorpPeer::CHATCORP_MESSAGE, $this->chatcorp_message);
        if ($this->isColumnModified(ChatcorpPeer::CHATCORP_DATE)) $criteria->add(ChatcorpPeer::CHATCORP_DATE, $this->chatcorp_date);

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
        $criteria = new Criteria(ChatcorpPeer::DATABASE_NAME);
        $criteria->add(ChatcorpPeer::IDCHATCORP, $this->idchatcorp);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdchatcorp();
    }

    /**
     * Generic method to set the primary key (idchatcorp column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdchatcorp($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdchatcorp();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Chatcorp (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIduser($this->getIduser());
        $copyObj->setChatcorpMessage($this->getChatcorpMessage());
        $copyObj->setChatcorpDate($this->getChatcorpDate());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getChatcorpAttachedfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addChatcorpAttachedfile($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdchatcorp(NULL); // this is a auto-increment column, so set to default value
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
     * @return Chatcorp Clone of current object.
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
     * @return ChatcorpPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ChatcorpPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Chatcorp The current object (for fluent API support)
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
            $v->addChatcorp($this);
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
                $this->aUser->addChatcorps($this);
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
        if ('ChatcorpAttachedfile' == $relationName) {
            $this->initChatcorpAttachedfiles();
        }
    }

    /**
     * Clears out the collChatcorpAttachedfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Chatcorp The current object (for fluent API support)
     * @see        addChatcorpAttachedfiles()
     */
    public function clearChatcorpAttachedfiles()
    {
        $this->collChatcorpAttachedfiles = null; // important to set this to null since that means it is uninitialized
        $this->collChatcorpAttachedfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collChatcorpAttachedfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialChatcorpAttachedfiles($v = true)
    {
        $this->collChatcorpAttachedfilesPartial = $v;
    }

    /**
     * Initializes the collChatcorpAttachedfiles collection.
     *
     * By default this just sets the collChatcorpAttachedfiles collection to an empty array (like clearcollChatcorpAttachedfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initChatcorpAttachedfiles($overrideExisting = true)
    {
        if (null !== $this->collChatcorpAttachedfiles && !$overrideExisting) {
            return;
        }
        $this->collChatcorpAttachedfiles = new PropelObjectCollection();
        $this->collChatcorpAttachedfiles->setModel('ChatcorpAttachedfile');
    }

    /**
     * Gets an array of ChatcorpAttachedfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Chatcorp is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ChatcorpAttachedfile[] List of ChatcorpAttachedfile objects
     * @throws PropelException
     */
    public function getChatcorpAttachedfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collChatcorpAttachedfilesPartial && !$this->isNew();
        if (null === $this->collChatcorpAttachedfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collChatcorpAttachedfiles) {
                // return empty collection
                $this->initChatcorpAttachedfiles();
            } else {
                $collChatcorpAttachedfiles = ChatcorpAttachedfileQuery::create(null, $criteria)
                    ->filterByChatcorp($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collChatcorpAttachedfilesPartial && count($collChatcorpAttachedfiles)) {
                      $this->initChatcorpAttachedfiles(false);

                      foreach ($collChatcorpAttachedfiles as $obj) {
                        if (false == $this->collChatcorpAttachedfiles->contains($obj)) {
                          $this->collChatcorpAttachedfiles->append($obj);
                        }
                      }

                      $this->collChatcorpAttachedfilesPartial = true;
                    }

                    $collChatcorpAttachedfiles->getInternalIterator()->rewind();

                    return $collChatcorpAttachedfiles;
                }

                if ($partial && $this->collChatcorpAttachedfiles) {
                    foreach ($this->collChatcorpAttachedfiles as $obj) {
                        if ($obj->isNew()) {
                            $collChatcorpAttachedfiles[] = $obj;
                        }
                    }
                }

                $this->collChatcorpAttachedfiles = $collChatcorpAttachedfiles;
                $this->collChatcorpAttachedfilesPartial = false;
            }
        }

        return $this->collChatcorpAttachedfiles;
    }

    /**
     * Sets a collection of ChatcorpAttachedfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $chatcorpAttachedfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Chatcorp The current object (for fluent API support)
     */
    public function setChatcorpAttachedfiles(PropelCollection $chatcorpAttachedfiles, PropelPDO $con = null)
    {
        $chatcorpAttachedfilesToDelete = $this->getChatcorpAttachedfiles(new Criteria(), $con)->diff($chatcorpAttachedfiles);


        $this->chatcorpAttachedfilesScheduledForDeletion = $chatcorpAttachedfilesToDelete;

        foreach ($chatcorpAttachedfilesToDelete as $chatcorpAttachedfileRemoved) {
            $chatcorpAttachedfileRemoved->setChatcorp(null);
        }

        $this->collChatcorpAttachedfiles = null;
        foreach ($chatcorpAttachedfiles as $chatcorpAttachedfile) {
            $this->addChatcorpAttachedfile($chatcorpAttachedfile);
        }

        $this->collChatcorpAttachedfiles = $chatcorpAttachedfiles;
        $this->collChatcorpAttachedfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ChatcorpAttachedfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ChatcorpAttachedfile objects.
     * @throws PropelException
     */
    public function countChatcorpAttachedfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collChatcorpAttachedfilesPartial && !$this->isNew();
        if (null === $this->collChatcorpAttachedfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collChatcorpAttachedfiles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getChatcorpAttachedfiles());
            }
            $query = ChatcorpAttachedfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChatcorp($this)
                ->count($con);
        }

        return count($this->collChatcorpAttachedfiles);
    }

    /**
     * Method called to associate a ChatcorpAttachedfile object to this object
     * through the ChatcorpAttachedfile foreign key attribute.
     *
     * @param    ChatcorpAttachedfile $l ChatcorpAttachedfile
     * @return Chatcorp The current object (for fluent API support)
     */
    public function addChatcorpAttachedfile(ChatcorpAttachedfile $l)
    {
        if ($this->collChatcorpAttachedfiles === null) {
            $this->initChatcorpAttachedfiles();
            $this->collChatcorpAttachedfilesPartial = true;
        }

        if (!in_array($l, $this->collChatcorpAttachedfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddChatcorpAttachedfile($l);

            if ($this->chatcorpAttachedfilesScheduledForDeletion and $this->chatcorpAttachedfilesScheduledForDeletion->contains($l)) {
                $this->chatcorpAttachedfilesScheduledForDeletion->remove($this->chatcorpAttachedfilesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ChatcorpAttachedfile $chatcorpAttachedfile The chatcorpAttachedfile object to add.
     */
    protected function doAddChatcorpAttachedfile($chatcorpAttachedfile)
    {
        $this->collChatcorpAttachedfiles[]= $chatcorpAttachedfile;
        $chatcorpAttachedfile->setChatcorp($this);
    }

    /**
     * @param	ChatcorpAttachedfile $chatcorpAttachedfile The chatcorpAttachedfile object to remove.
     * @return Chatcorp The current object (for fluent API support)
     */
    public function removeChatcorpAttachedfile($chatcorpAttachedfile)
    {
        if ($this->getChatcorpAttachedfiles()->contains($chatcorpAttachedfile)) {
            $this->collChatcorpAttachedfiles->remove($this->collChatcorpAttachedfiles->search($chatcorpAttachedfile));
            if (null === $this->chatcorpAttachedfilesScheduledForDeletion) {
                $this->chatcorpAttachedfilesScheduledForDeletion = clone $this->collChatcorpAttachedfiles;
                $this->chatcorpAttachedfilesScheduledForDeletion->clear();
            }
            $this->chatcorpAttachedfilesScheduledForDeletion[]= clone $chatcorpAttachedfile;
            $chatcorpAttachedfile->setChatcorp(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idchatcorp = null;
        $this->iduser = null;
        $this->chatcorp_message = null;
        $this->chatcorp_date = null;
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
            if ($this->collChatcorpAttachedfiles) {
                foreach ($this->collChatcorpAttachedfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collChatcorpAttachedfiles instanceof PropelCollection) {
            $this->collChatcorpAttachedfiles->clearIterator();
        }
        $this->collChatcorpAttachedfiles = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ChatcorpPeer::DEFAULT_STRING_FORMAT);
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
