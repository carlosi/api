<?php


/**
 * Base class that represents a row from the 'branchdepartment' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranchdepartment extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'BranchdepartmentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BranchdepartmentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idbranchdepartment field.
     * @var        int
     */
    protected $idbranchdepartment;

    /**
     * The value for the idbranch field.
     * @var        int
     */
    protected $idbranch;

    /**
     * The value for the iddepartament field.
     * @var        int
     */
    protected $iddepartament;

    /**
     * @var        Department
     */
    protected $aDepartment;

    /**
     * @var        Branch
     */
    protected $aBranch;

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
     * Get the [idbranchdepartment] column value.
     *
     * @return int
     */
    public function getIdbranchdepartment()
    {

        return $this->idbranchdepartment;
    }

    /**
     * Get the [idbranch] column value.
     *
     * @return int
     */
    public function getIdbranch()
    {

        return $this->idbranch;
    }

    /**
     * Get the [iddepartament] column value.
     *
     * @return int
     */
    public function getIddepartament()
    {

        return $this->iddepartament;
    }

    /**
     * Set the value of [idbranchdepartment] column.
     *
     * @param  int $v new value
     * @return Branchdepartment The current object (for fluent API support)
     */
    public function setIdbranchdepartment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbranchdepartment !== $v) {
            $this->idbranchdepartment = $v;
            $this->modifiedColumns[] = BranchdepartmentPeer::IDBRANCHDEPARTMENT;
        }


        return $this;
    } // setIdbranchdepartment()

    /**
     * Set the value of [idbranch] column.
     *
     * @param  int $v new value
     * @return Branchdepartment The current object (for fluent API support)
     */
    public function setIdbranch($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbranch !== $v) {
            $this->idbranch = $v;
            $this->modifiedColumns[] = BranchdepartmentPeer::IDBRANCH;
        }

        if ($this->aBranch !== null && $this->aBranch->getIdbranch() !== $v) {
            $this->aBranch = null;
        }


        return $this;
    } // setIdbranch()

    /**
     * Set the value of [iddepartament] column.
     *
     * @param  int $v new value
     * @return Branchdepartment The current object (for fluent API support)
     */
    public function setIddepartament($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iddepartament !== $v) {
            $this->iddepartament = $v;
            $this->modifiedColumns[] = BranchdepartmentPeer::IDDEPARTAMENT;
        }

        if ($this->aDepartment !== null && $this->aDepartment->getIddepartment() !== $v) {
            $this->aDepartment = null;
        }


        return $this;
    } // setIddepartament()

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

            $this->idbranchdepartment = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idbranch = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->iddepartament = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = BranchdepartmentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Branchdepartment object", $e);
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

        if ($this->aBranch !== null && $this->idbranch !== $this->aBranch->getIdbranch()) {
            $this->aBranch = null;
        }
        if ($this->aDepartment !== null && $this->iddepartament !== $this->aDepartment->getIddepartment()) {
            $this->aDepartment = null;
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
            $con = Propel::getConnection(BranchdepartmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BranchdepartmentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDepartment = null;
            $this->aBranch = null;
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
            $con = Propel::getConnection(BranchdepartmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BranchdepartmentQuery::create()
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
            $con = Propel::getConnection(BranchdepartmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BranchdepartmentPeer::addInstanceToPool($this);
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

            if ($this->aDepartment !== null) {
                if ($this->aDepartment->isModified() || $this->aDepartment->isNew()) {
                    $affectedRows += $this->aDepartment->save($con);
                }
                $this->setDepartment($this->aDepartment);
            }

            if ($this->aBranch !== null) {
                if ($this->aBranch->isModified() || $this->aBranch->isNew()) {
                    $affectedRows += $this->aBranch->save($con);
                }
                $this->setBranch($this->aBranch);
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

        $this->modifiedColumns[] = BranchdepartmentPeer::IDBRANCHDEPARTMENT;
        if (null !== $this->idbranchdepartment) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BranchdepartmentPeer::IDBRANCHDEPARTMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BranchdepartmentPeer::IDBRANCHDEPARTMENT)) {
            $modifiedColumns[':p' . $index++]  = '`idbranchdepartment`';
        }
        if ($this->isColumnModified(BranchdepartmentPeer::IDBRANCH)) {
            $modifiedColumns[':p' . $index++]  = '`idbranch`';
        }
        if ($this->isColumnModified(BranchdepartmentPeer::IDDEPARTAMENT)) {
            $modifiedColumns[':p' . $index++]  = '`iddepartament`';
        }

        $sql = sprintf(
            'INSERT INTO `branchdepartment` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idbranchdepartment`':
                        $stmt->bindValue($identifier, $this->idbranchdepartment, PDO::PARAM_INT);
                        break;
                    case '`idbranch`':
                        $stmt->bindValue($identifier, $this->idbranch, PDO::PARAM_INT);
                        break;
                    case '`iddepartament`':
                        $stmt->bindValue($identifier, $this->iddepartament, PDO::PARAM_INT);
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
        $this->setIdbranchdepartment($pk);

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

            if ($this->aDepartment !== null) {
                if (!$this->aDepartment->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
                }
            }

            if ($this->aBranch !== null) {
                if (!$this->aBranch->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBranch->getValidationFailures());
                }
            }


            if (($retval = BranchdepartmentPeer::doValidate($this, $columns)) !== true) {
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
        $pos = BranchdepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdbranchdepartment();
                break;
            case 1:
                return $this->getIdbranch();
                break;
            case 2:
                return $this->getIddepartament();
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
        if (isset($alreadyDumpedObjects['Branchdepartment'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Branchdepartment'][$this->getPrimaryKey()] = true;
        $keys = BranchdepartmentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdbranchdepartment(),
            $keys[1] => $this->getIdbranch(),
            $keys[2] => $this->getIddepartament(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aDepartment) {
                $result['Department'] = $this->aDepartment->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBranch) {
                $result['Branch'] = $this->aBranch->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = BranchdepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdbranchdepartment($value);
                break;
            case 1:
                $this->setIdbranch($value);
                break;
            case 2:
                $this->setIddepartament($value);
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
        $keys = BranchdepartmentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdbranchdepartment($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdbranch($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIddepartament($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BranchdepartmentPeer::DATABASE_NAME);

        if ($this->isColumnModified(BranchdepartmentPeer::IDBRANCHDEPARTMENT)) $criteria->add(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $this->idbranchdepartment);
        if ($this->isColumnModified(BranchdepartmentPeer::IDBRANCH)) $criteria->add(BranchdepartmentPeer::IDBRANCH, $this->idbranch);
        if ($this->isColumnModified(BranchdepartmentPeer::IDDEPARTAMENT)) $criteria->add(BranchdepartmentPeer::IDDEPARTAMENT, $this->iddepartament);

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
        $criteria = new Criteria(BranchdepartmentPeer::DATABASE_NAME);
        $criteria->add(BranchdepartmentPeer::IDBRANCHDEPARTMENT, $this->idbranchdepartment);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdbranchdepartment();
    }

    /**
     * Generic method to set the primary key (idbranchdepartment column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdbranchdepartment($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdbranchdepartment();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Branchdepartment (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdbranch($this->getIdbranch());
        $copyObj->setIddepartament($this->getIddepartament());

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
            $copyObj->setIdbranchdepartment(NULL); // this is a auto-increment column, so set to default value
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
     * @return Branchdepartment Clone of current object.
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
     * @return BranchdepartmentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BranchdepartmentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Department object.
     *
     * @param                  Department $v
     * @return Branchdepartment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDepartment(Department $v = null)
    {
        if ($v === null) {
            $this->setIddepartament(NULL);
        } else {
            $this->setIddepartament($v->getIddepartment());
        }

        $this->aDepartment = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Department object, it will not be re-added.
        if ($v !== null) {
            $v->addBranchdepartment($this);
        }


        return $this;
    }


    /**
     * Get the associated Department object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Department The associated Department object.
     * @throws PropelException
     */
    public function getDepartment(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDepartment === null && ($this->iddepartament !== null) && $doQuery) {
            $this->aDepartment = DepartmentQuery::create()->findPk($this->iddepartament, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDepartment->addBranchdepartments($this);
             */
        }

        return $this->aDepartment;
    }

    /**
     * Declares an association between this object and a Branch object.
     *
     * @param                  Branch $v
     * @return Branchdepartment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBranch(Branch $v = null)
    {
        if ($v === null) {
            $this->setIdbranch(NULL);
        } else {
            $this->setIdbranch($v->getIdbranch());
        }

        $this->aBranch = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Branch object, it will not be re-added.
        if ($v !== null) {
            $v->addBranchdepartment($this);
        }


        return $this;
    }


    /**
     * Get the associated Branch object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Branch The associated Branch object.
     * @throws PropelException
     */
    public function getBranch(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBranch === null && ($this->idbranch !== null) && $doQuery) {
            $this->aBranch = BranchQuery::create()->findPk($this->idbranch, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBranch->addBranchdepartments($this);
             */
        }

        return $this->aBranch;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idbranchdepartment = null;
        $this->idbranch = null;
        $this->iddepartament = null;
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
            if ($this->aDepartment instanceof Persistent) {
              $this->aDepartment->clearAllReferences($deep);
            }
            if ($this->aBranch instanceof Persistent) {
              $this->aBranch->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aDepartment = null;
        $this->aBranch = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BranchdepartmentPeer::DEFAULT_STRING_FORMAT);
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
