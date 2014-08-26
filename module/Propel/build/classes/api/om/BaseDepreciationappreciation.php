<?php


/**
 * Base class that represents a row from the 'depreciationappreciation' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepreciationappreciation extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DepreciationappreciationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DepreciationappreciationPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the iddepreciationappreciation field.
     * @var        int
     */
    protected $iddepreciationappreciation;

    /**
     * The value for the idexpensetransaction field.
     * @var        int
     */
    protected $idexpensetransaction;

    /**
     * The value for the depreciationappreciation_amount field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $depreciationappreciation_amount;

    /**
     * The value for the depreciationappreciation_cycle field.
     * Note: this column has a database default value of: 'annually'
     * @var        string
     */
    protected $depreciationappreciation_cycle;

    /**
     * @var        Expensetransaction
     */
    protected $aExpensetransaction;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->depreciationappreciation_amount = '0.00';
        $this->depreciationappreciation_cycle = 'annually';
    }

    /**
     * Initializes internal state of BaseDepreciationappreciation object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [iddepreciationappreciation] column value.
     *
     * @return int
     */
    public function getIddepreciationappreciation()
    {

        return $this->iddepreciationappreciation;
    }

    /**
     * Get the [idexpensetransaction] column value.
     *
     * @return int
     */
    public function getIdexpensetransaction()
    {

        return $this->idexpensetransaction;
    }

    /**
     * Get the [depreciationappreciation_amount] column value.
     *
     * @return string
     */
    public function getDepreciationappreciationAmount()
    {

        return $this->depreciationappreciation_amount;
    }

    /**
     * Get the [depreciationappreciation_cycle] column value.
     *
     * @return string
     */
    public function getDepreciationappreciationCycle()
    {

        return $this->depreciationappreciation_cycle;
    }

    /**
     * Set the value of [iddepreciationappreciation] column.
     *
     * @param  int $v new value
     * @return Depreciationappreciation The current object (for fluent API support)
     */
    public function setIddepreciationappreciation($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iddepreciationappreciation !== $v) {
            $this->iddepreciationappreciation = $v;
            $this->modifiedColumns[] = DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION;
        }


        return $this;
    } // setIddepreciationappreciation()

    /**
     * Set the value of [idexpensetransaction] column.
     *
     * @param  int $v new value
     * @return Depreciationappreciation The current object (for fluent API support)
     */
    public function setIdexpensetransaction($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpensetransaction !== $v) {
            $this->idexpensetransaction = $v;
            $this->modifiedColumns[] = DepreciationappreciationPeer::IDEXPENSETRANSACTION;
        }

        if ($this->aExpensetransaction !== null && $this->aExpensetransaction->getIdexpensetransaction() !== $v) {
            $this->aExpensetransaction = null;
        }


        return $this;
    } // setIdexpensetransaction()

    /**
     * Set the value of [depreciationappreciation_amount] column.
     *
     * @param  string $v new value
     * @return Depreciationappreciation The current object (for fluent API support)
     */
    public function setDepreciationappreciationAmount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->depreciationappreciation_amount !== $v) {
            $this->depreciationappreciation_amount = $v;
            $this->modifiedColumns[] = DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT;
        }


        return $this;
    } // setDepreciationappreciationAmount()

    /**
     * Set the value of [depreciationappreciation_cycle] column.
     *
     * @param  string $v new value
     * @return Depreciationappreciation The current object (for fluent API support)
     */
    public function setDepreciationappreciationCycle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->depreciationappreciation_cycle !== $v) {
            $this->depreciationappreciation_cycle = $v;
            $this->modifiedColumns[] = DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_CYCLE;
        }


        return $this;
    } // setDepreciationappreciationCycle()

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
            if ($this->depreciationappreciation_amount !== '0.00') {
                return false;
            }

            if ($this->depreciationappreciation_cycle !== 'annually') {
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

            $this->iddepreciationappreciation = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idexpensetransaction = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->depreciationappreciation_amount = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->depreciationappreciation_cycle = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = DepreciationappreciationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Depreciationappreciation object", $e);
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

        if ($this->aExpensetransaction !== null && $this->idexpensetransaction !== $this->aExpensetransaction->getIdexpensetransaction()) {
            $this->aExpensetransaction = null;
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
            $con = Propel::getConnection(DepreciationappreciationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DepreciationappreciationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aExpensetransaction = null;
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
            $con = Propel::getConnection(DepreciationappreciationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DepreciationappreciationQuery::create()
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
            $con = Propel::getConnection(DepreciationappreciationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DepreciationappreciationPeer::addInstanceToPool($this);
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

            if ($this->aExpensetransaction !== null) {
                if ($this->aExpensetransaction->isModified() || $this->aExpensetransaction->isNew()) {
                    $affectedRows += $this->aExpensetransaction->save($con);
                }
                $this->setExpensetransaction($this->aExpensetransaction);
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

        $this->modifiedColumns[] = DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION;
        if (null !== $this->iddepreciationappreciation) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION)) {
            $modifiedColumns[':p' . $index++]  = '`iddepreciationappreciation`';
        }
        if ($this->isColumnModified(DepreciationappreciationPeer::IDEXPENSETRANSACTION)) {
            $modifiedColumns[':p' . $index++]  = '`idexpensetransaction`';
        }
        if ($this->isColumnModified(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`depreciationappreciation_amount`';
        }
        if ($this->isColumnModified(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = '`depreciationappreciation_cycle`';
        }

        $sql = sprintf(
            'INSERT INTO `depreciationappreciation` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`iddepreciationappreciation`':
                        $stmt->bindValue($identifier, $this->iddepreciationappreciation, PDO::PARAM_INT);
                        break;
                    case '`idexpensetransaction`':
                        $stmt->bindValue($identifier, $this->idexpensetransaction, PDO::PARAM_INT);
                        break;
                    case '`depreciationappreciation_amount`':
                        $stmt->bindValue($identifier, $this->depreciationappreciation_amount, PDO::PARAM_STR);
                        break;
                    case '`depreciationappreciation_cycle`':
                        $stmt->bindValue($identifier, $this->depreciationappreciation_cycle, PDO::PARAM_STR);
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
        $this->setIddepreciationappreciation($pk);

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

            if ($this->aExpensetransaction !== null) {
                if (!$this->aExpensetransaction->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aExpensetransaction->getValidationFailures());
                }
            }


            if (($retval = DepreciationappreciationPeer::doValidate($this, $columns)) !== true) {
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
        $pos = DepreciationappreciationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIddepreciationappreciation();
                break;
            case 1:
                return $this->getIdexpensetransaction();
                break;
            case 2:
                return $this->getDepreciationappreciationAmount();
                break;
            case 3:
                return $this->getDepreciationappreciationCycle();
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
        if (isset($alreadyDumpedObjects['Depreciationappreciation'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Depreciationappreciation'][$this->getPrimaryKey()] = true;
        $keys = DepreciationappreciationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIddepreciationappreciation(),
            $keys[1] => $this->getIdexpensetransaction(),
            $keys[2] => $this->getDepreciationappreciationAmount(),
            $keys[3] => $this->getDepreciationappreciationCycle(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aExpensetransaction) {
                $result['Expensetransaction'] = $this->aExpensetransaction->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = DepreciationappreciationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIddepreciationappreciation($value);
                break;
            case 1:
                $this->setIdexpensetransaction($value);
                break;
            case 2:
                $this->setDepreciationappreciationAmount($value);
                break;
            case 3:
                $this->setDepreciationappreciationCycle($value);
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
        $keys = DepreciationappreciationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIddepreciationappreciation($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdexpensetransaction($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDepreciationappreciationAmount($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDepreciationappreciationCycle($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DepreciationappreciationPeer::DATABASE_NAME);

        if ($this->isColumnModified(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION)) $criteria->add(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $this->iddepreciationappreciation);
        if ($this->isColumnModified(DepreciationappreciationPeer::IDEXPENSETRANSACTION)) $criteria->add(DepreciationappreciationPeer::IDEXPENSETRANSACTION, $this->idexpensetransaction);
        if ($this->isColumnModified(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT)) $criteria->add(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_AMOUNT, $this->depreciationappreciation_amount);
        if ($this->isColumnModified(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_CYCLE)) $criteria->add(DepreciationappreciationPeer::DEPRECIATIONAPPRECIATION_CYCLE, $this->depreciationappreciation_cycle);

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
        $criteria = new Criteria(DepreciationappreciationPeer::DATABASE_NAME);
        $criteria->add(DepreciationappreciationPeer::IDDEPRECIATIONAPPRECIATION, $this->iddepreciationappreciation);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIddepreciationappreciation();
    }

    /**
     * Generic method to set the primary key (iddepreciationappreciation column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIddepreciationappreciation($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIddepreciationappreciation();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Depreciationappreciation (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdexpensetransaction($this->getIdexpensetransaction());
        $copyObj->setDepreciationappreciationAmount($this->getDepreciationappreciationAmount());
        $copyObj->setDepreciationappreciationCycle($this->getDepreciationappreciationCycle());

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
            $copyObj->setIddepreciationappreciation(NULL); // this is a auto-increment column, so set to default value
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
     * @return Depreciationappreciation Clone of current object.
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
     * @return DepreciationappreciationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DepreciationappreciationPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Expensetransaction object.
     *
     * @param                  Expensetransaction $v
     * @return Depreciationappreciation The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpensetransaction(Expensetransaction $v = null)
    {
        if ($v === null) {
            $this->setIdexpensetransaction(NULL);
        } else {
            $this->setIdexpensetransaction($v->getIdexpensetransaction());
        }

        $this->aExpensetransaction = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Expensetransaction object, it will not be re-added.
        if ($v !== null) {
            $v->addDepreciationappreciation($this);
        }


        return $this;
    }


    /**
     * Get the associated Expensetransaction object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Expensetransaction The associated Expensetransaction object.
     * @throws PropelException
     */
    public function getExpensetransaction(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aExpensetransaction === null && ($this->idexpensetransaction !== null) && $doQuery) {
            $this->aExpensetransaction = ExpensetransactionQuery::create()->findPk($this->idexpensetransaction, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aExpensetransaction->addDepreciationappreciations($this);
             */
        }

        return $this->aExpensetransaction;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->iddepreciationappreciation = null;
        $this->idexpensetransaction = null;
        $this->depreciationappreciation_amount = null;
        $this->depreciationappreciation_cycle = null;
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
            if ($this->aExpensetransaction instanceof Persistent) {
              $this->aExpensetransaction->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aExpensetransaction = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DepreciationappreciationPeer::DEFAULT_STRING_FORMAT);
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
