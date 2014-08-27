<?php


/**
 * Base class that represents a row from the 'chatpublic_attachedfile' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseChatpublicAttachedfile extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ChatpublicAttachedfilePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ChatpublicAttachedfilePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idchatpublic_attachedfile field.
     * @var        int
     */
    protected $idchatpublic_attachedfile;

    /**
     * The value for the idchatpublic field.
     * @var        int
     */
    protected $idchatpublic;

    /**
     * The value for the chatpublic_attachedfile_url field.
     * @var        string
     */
    protected $chatpublic_attachedfile_url;

    /**
     * @var        Chatpublic
     */
    protected $aChatpublic;

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
     * Get the [idchatpublic_attachedfile] column value.
     *
     * @return int
     */
    public function getIdchatpublicAttachedfile()
    {

        return $this->idchatpublic_attachedfile;
    }

    /**
     * Get the [idchatpublic] column value.
     *
     * @return int
     */
    public function getIdchatpublic()
    {

        return $this->idchatpublic;
    }

    /**
     * Get the [chatpublic_attachedfile_url] column value.
     *
     * @return string
     */
    public function getChatpublicAttachedfileUrl()
    {

        return $this->chatpublic_attachedfile_url;
    }

    /**
     * Set the value of [idchatpublic_attachedfile] column.
     *
     * @param  int $v new value
     * @return ChatpublicAttachedfile The current object (for fluent API support)
     */
    public function setIdchatpublicAttachedfile($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idchatpublic_attachedfile !== $v) {
            $this->idchatpublic_attachedfile = $v;
            $this->modifiedColumns[] = ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE;
        }


        return $this;
    } // setIdchatpublicAttachedfile()

    /**
     * Set the value of [idchatpublic] column.
     *
     * @param  int $v new value
     * @return ChatpublicAttachedfile The current object (for fluent API support)
     */
    public function setIdchatpublic($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idchatpublic !== $v) {
            $this->idchatpublic = $v;
            $this->modifiedColumns[] = ChatpublicAttachedfilePeer::IDCHATPUBLIC;
        }

        if ($this->aChatpublic !== null && $this->aChatpublic->getIdchatpublic() !== $v) {
            $this->aChatpublic = null;
        }


        return $this;
    } // setIdchatpublic()

    /**
     * Set the value of [chatpublic_attachedfile_url] column.
     *
     * @param  string $v new value
     * @return ChatpublicAttachedfile The current object (for fluent API support)
     */
    public function setChatpublicAttachedfileUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chatpublic_attachedfile_url !== $v) {
            $this->chatpublic_attachedfile_url = $v;
            $this->modifiedColumns[] = ChatpublicAttachedfilePeer::CHATPUBLIC_ATTACHEDFILE_URL;
        }


        return $this;
    } // setChatpublicAttachedfileUrl()

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

            $this->idchatpublic_attachedfile = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idchatpublic = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->chatpublic_attachedfile_url = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = ChatpublicAttachedfilePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating ChatpublicAttachedfile object", $e);
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

        if ($this->aChatpublic !== null && $this->idchatpublic !== $this->aChatpublic->getIdchatpublic()) {
            $this->aChatpublic = null;
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
            $con = Propel::getConnection(ChatpublicAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ChatpublicAttachedfilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aChatpublic = null;
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
            $con = Propel::getConnection(ChatpublicAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ChatpublicAttachedfileQuery::create()
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
            $con = Propel::getConnection(ChatpublicAttachedfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ChatpublicAttachedfilePeer::addInstanceToPool($this);
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

            if ($this->aChatpublic !== null) {
                if ($this->aChatpublic->isModified() || $this->aChatpublic->isNew()) {
                    $affectedRows += $this->aChatpublic->save($con);
                }
                $this->setChatpublic($this->aChatpublic);
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

        $this->modifiedColumns[] = ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE;
        if (null !== $this->idchatpublic_attachedfile) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE)) {
            $modifiedColumns[':p' . $index++]  = '`idchatpublic_attachedfile`';
        }
        if ($this->isColumnModified(ChatpublicAttachedfilePeer::IDCHATPUBLIC)) {
            $modifiedColumns[':p' . $index++]  = '`idchatpublic`';
        }
        if ($this->isColumnModified(ChatpublicAttachedfilePeer::CHATPUBLIC_ATTACHEDFILE_URL)) {
            $modifiedColumns[':p' . $index++]  = '`chatpublic_attachedfile_url`';
        }

        $sql = sprintf(
            'INSERT INTO `chatpublic_attachedfile` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idchatpublic_attachedfile`':
                        $stmt->bindValue($identifier, $this->idchatpublic_attachedfile, PDO::PARAM_INT);
                        break;
                    case '`idchatpublic`':
                        $stmt->bindValue($identifier, $this->idchatpublic, PDO::PARAM_INT);
                        break;
                    case '`chatpublic_attachedfile_url`':
                        $stmt->bindValue($identifier, $this->chatpublic_attachedfile_url, PDO::PARAM_STR);
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
        $this->setIdchatpublicAttachedfile($pk);

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

            if ($this->aChatpublic !== null) {
                if (!$this->aChatpublic->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aChatpublic->getValidationFailures());
                }
            }


            if (($retval = ChatpublicAttachedfilePeer::doValidate($this, $columns)) !== true) {
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
        $pos = ChatpublicAttachedfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdchatpublicAttachedfile();
                break;
            case 1:
                return $this->getIdchatpublic();
                break;
            case 2:
                return $this->getChatpublicAttachedfileUrl();
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
        if (isset($alreadyDumpedObjects['ChatpublicAttachedfile'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ChatpublicAttachedfile'][$this->getPrimaryKey()] = true;
        $keys = ChatpublicAttachedfilePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdchatpublicAttachedfile(),
            $keys[1] => $this->getIdchatpublic(),
            $keys[2] => $this->getChatpublicAttachedfileUrl(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aChatpublic) {
                $result['Chatpublic'] = $this->aChatpublic->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ChatpublicAttachedfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdchatpublicAttachedfile($value);
                break;
            case 1:
                $this->setIdchatpublic($value);
                break;
            case 2:
                $this->setChatpublicAttachedfileUrl($value);
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
        $keys = ChatpublicAttachedfilePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdchatpublicAttachedfile($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdchatpublic($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setChatpublicAttachedfileUrl($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ChatpublicAttachedfilePeer::DATABASE_NAME);

        if ($this->isColumnModified(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE)) $criteria->add(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $this->idchatpublic_attachedfile);
        if ($this->isColumnModified(ChatpublicAttachedfilePeer::IDCHATPUBLIC)) $criteria->add(ChatpublicAttachedfilePeer::IDCHATPUBLIC, $this->idchatpublic);
        if ($this->isColumnModified(ChatpublicAttachedfilePeer::CHATPUBLIC_ATTACHEDFILE_URL)) $criteria->add(ChatpublicAttachedfilePeer::CHATPUBLIC_ATTACHEDFILE_URL, $this->chatpublic_attachedfile_url);

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
        $criteria = new Criteria(ChatpublicAttachedfilePeer::DATABASE_NAME);
        $criteria->add(ChatpublicAttachedfilePeer::IDCHATPUBLIC_ATTACHEDFILE, $this->idchatpublic_attachedfile);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdchatpublicAttachedfile();
    }

    /**
     * Generic method to set the primary key (idchatpublic_attachedfile column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdchatpublicAttachedfile($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdchatpublicAttachedfile();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of ChatpublicAttachedfile (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdchatpublic($this->getIdchatpublic());
        $copyObj->setChatpublicAttachedfileUrl($this->getChatpublicAttachedfileUrl());

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
            $copyObj->setIdchatpublicAttachedfile(NULL); // this is a auto-increment column, so set to default value
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
     * @return ChatpublicAttachedfile Clone of current object.
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
     * @return ChatpublicAttachedfilePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ChatpublicAttachedfilePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Chatpublic object.
     *
     * @param                  Chatpublic $v
     * @return ChatpublicAttachedfile The current object (for fluent API support)
     * @throws PropelException
     */
    public function setChatpublic(Chatpublic $v = null)
    {
        if ($v === null) {
            $this->setIdchatpublic(NULL);
        } else {
            $this->setIdchatpublic($v->getIdchatpublic());
        }

        $this->aChatpublic = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Chatpublic object, it will not be re-added.
        if ($v !== null) {
            $v->addChatpublicAttachedfile($this);
        }


        return $this;
    }


    /**
     * Get the associated Chatpublic object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Chatpublic The associated Chatpublic object.
     * @throws PropelException
     */
    public function getChatpublic(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aChatpublic === null && ($this->idchatpublic !== null) && $doQuery) {
            $this->aChatpublic = ChatpublicQuery::create()->findPk($this->idchatpublic, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aChatpublic->addChatpublicAttachedfiles($this);
             */
        }

        return $this->aChatpublic;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idchatpublic_attachedfile = null;
        $this->idchatpublic = null;
        $this->chatpublic_attachedfile_url = null;
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
            if ($this->aChatpublic instanceof Persistent) {
              $this->aChatpublic->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aChatpublic = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ChatpublicAttachedfilePeer::DEFAULT_STRING_FORMAT);
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
