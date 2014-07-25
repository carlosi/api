<?php


/**
 * Base class that represents a row from the 'expenseitem' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpenseitem extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ExpenseitemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ExpenseitemPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idexpenseitem field.
     * @var        int
     */
    protected $idexpenseitem;

    /**
     * The value for the idexpensecategory field.
     * @var        int
     */
    protected $idexpensecategory;

    /**
     * The value for the expenseitem_name field.
     * @var        string
     */
    protected $expenseitem_name;

    /**
     * The value for the expenseitem_description field.
     * @var        string
     */
    protected $expenseitem_description;

    /**
     * @var        Expensecategory
     */
    protected $aExpensecategory;

    /**
     * @var        PropelObjectCollection|Expenserecurrency[] Collection to store aggregation of Expenserecurrency objects.
     */
    protected $collExpenserecurrencys;
    protected $collExpenserecurrencysPartial;

    /**
     * @var        PropelObjectCollection|Expensetransaction[] Collection to store aggregation of Expensetransaction objects.
     */
    protected $collExpensetransactions;
    protected $collExpensetransactionsPartial;

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
    protected $expenserecurrencysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $expensetransactionsScheduledForDeletion = null;

    /**
     * Get the [idexpenseitem] column value.
     *
     * @return int
     */
    public function getIdexpenseitem()
    {

        return $this->idexpenseitem;
    }

    /**
     * Get the [idexpensecategory] column value.
     *
     * @return int
     */
    public function getIdexpensecategory()
    {

        return $this->idexpensecategory;
    }

    /**
     * Get the [expenseitem_name] column value.
     *
     * @return string
     */
    public function getExpenseitemName()
    {

        return $this->expenseitem_name;
    }

    /**
     * Get the [expenseitem_description] column value.
     *
     * @return string
     */
    public function getExpenseitemDescription()
    {

        return $this->expenseitem_description;
    }

    /**
     * Set the value of [idexpenseitem] column.
     *
     * @param  int $v new value
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setIdexpenseitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpenseitem !== $v) {
            $this->idexpenseitem = $v;
            $this->modifiedColumns[] = ExpenseitemPeer::IDEXPENSEITEM;
        }


        return $this;
    } // setIdexpenseitem()

    /**
     * Set the value of [idexpensecategory] column.
     *
     * @param  int $v new value
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setIdexpensecategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpensecategory !== $v) {
            $this->idexpensecategory = $v;
            $this->modifiedColumns[] = ExpenseitemPeer::IDEXPENSECATEGORY;
        }

        if ($this->aExpensecategory !== null && $this->aExpensecategory->getIdexpensecategory() !== $v) {
            $this->aExpensecategory = null;
        }


        return $this;
    } // setIdexpensecategory()

    /**
     * Set the value of [expenseitem_name] column.
     *
     * @param  string $v new value
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setExpenseitemName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expenseitem_name !== $v) {
            $this->expenseitem_name = $v;
            $this->modifiedColumns[] = ExpenseitemPeer::EXPENSEITEM_NAME;
        }


        return $this;
    } // setExpenseitemName()

    /**
     * Set the value of [expenseitem_description] column.
     *
     * @param  string $v new value
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setExpenseitemDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expenseitem_description !== $v) {
            $this->expenseitem_description = $v;
            $this->modifiedColumns[] = ExpenseitemPeer::EXPENSEITEM_DESCRIPTION;
        }


        return $this;
    } // setExpenseitemDescription()

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

            $this->idexpenseitem = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idexpensecategory = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->expenseitem_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->expenseitem_description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ExpenseitemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Expenseitem object", $e);
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

        if ($this->aExpensecategory !== null && $this->idexpensecategory !== $this->aExpensecategory->getIdexpensecategory()) {
            $this->aExpensecategory = null;
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
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ExpenseitemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aExpensecategory = null;
            $this->collExpenserecurrencys = null;

            $this->collExpensetransactions = null;

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
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ExpenseitemQuery::create()
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
            $con = Propel::getConnection(ExpenseitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ExpenseitemPeer::addInstanceToPool($this);
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

            if ($this->aExpensecategory !== null) {
                if ($this->aExpensecategory->isModified() || $this->aExpensecategory->isNew()) {
                    $affectedRows += $this->aExpensecategory->save($con);
                }
                $this->setExpensecategory($this->aExpensecategory);
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

            if ($this->expenserecurrencysScheduledForDeletion !== null) {
                if (!$this->expenserecurrencysScheduledForDeletion->isEmpty()) {
                    ExpenserecurrencyQuery::create()
                        ->filterByPrimaryKeys($this->expenserecurrencysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expenserecurrencysScheduledForDeletion = null;
                }
            }

            if ($this->collExpenserecurrencys !== null) {
                foreach ($this->collExpenserecurrencys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expensetransactionsScheduledForDeletion !== null) {
                if (!$this->expensetransactionsScheduledForDeletion->isEmpty()) {
                    ExpensetransactionQuery::create()
                        ->filterByPrimaryKeys($this->expensetransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expensetransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collExpensetransactions !== null) {
                foreach ($this->collExpensetransactions as $referrerFK) {
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

        $this->modifiedColumns[] = ExpenseitemPeer::IDEXPENSEITEM;
        if (null !== $this->idexpenseitem) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ExpenseitemPeer::IDEXPENSEITEM . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ExpenseitemPeer::IDEXPENSEITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idexpenseitem`';
        }
        if ($this->isColumnModified(ExpenseitemPeer::IDEXPENSECATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`idexpensecategory`';
        }
        if ($this->isColumnModified(ExpenseitemPeer::EXPENSEITEM_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`expenseitem_name`';
        }
        if ($this->isColumnModified(ExpenseitemPeer::EXPENSEITEM_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`expenseitem_description`';
        }

        $sql = sprintf(
            'INSERT INTO `expenseitem` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idexpenseitem`':
                        $stmt->bindValue($identifier, $this->idexpenseitem, PDO::PARAM_INT);
                        break;
                    case '`idexpensecategory`':
                        $stmt->bindValue($identifier, $this->idexpensecategory, PDO::PARAM_INT);
                        break;
                    case '`expenseitem_name`':
                        $stmt->bindValue($identifier, $this->expenseitem_name, PDO::PARAM_STR);
                        break;
                    case '`expenseitem_description`':
                        $stmt->bindValue($identifier, $this->expenseitem_description, PDO::PARAM_STR);
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
        $this->setIdexpenseitem($pk);

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

            if ($this->aExpensecategory !== null) {
                if (!$this->aExpensecategory->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aExpensecategory->getValidationFailures());
                }
            }


            if (($retval = ExpenseitemPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collExpenserecurrencys !== null) {
                    foreach ($this->collExpenserecurrencys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collExpensetransactions !== null) {
                    foreach ($this->collExpensetransactions as $referrerFK) {
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
        $pos = ExpenseitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdexpenseitem();
                break;
            case 1:
                return $this->getIdexpensecategory();
                break;
            case 2:
                return $this->getExpenseitemName();
                break;
            case 3:
                return $this->getExpenseitemDescription();
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
        if (isset($alreadyDumpedObjects['Expenseitem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Expenseitem'][$this->getPrimaryKey()] = true;
        $keys = ExpenseitemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdexpenseitem(),
            $keys[1] => $this->getIdexpensecategory(),
            $keys[2] => $this->getExpenseitemName(),
            $keys[3] => $this->getExpenseitemDescription(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aExpensecategory) {
                $result['Expensecategory'] = $this->aExpensecategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collExpenserecurrencys) {
                $result['Expenserecurrencys'] = $this->collExpenserecurrencys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpensetransactions) {
                $result['Expensetransactions'] = $this->collExpensetransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ExpenseitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdexpenseitem($value);
                break;
            case 1:
                $this->setIdexpensecategory($value);
                break;
            case 2:
                $this->setExpenseitemName($value);
                break;
            case 3:
                $this->setExpenseitemDescription($value);
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
        $keys = ExpenseitemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdexpenseitem($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdexpensecategory($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setExpenseitemName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setExpenseitemDescription($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);

        if ($this->isColumnModified(ExpenseitemPeer::IDEXPENSEITEM)) $criteria->add(ExpenseitemPeer::IDEXPENSEITEM, $this->idexpenseitem);
        if ($this->isColumnModified(ExpenseitemPeer::IDEXPENSECATEGORY)) $criteria->add(ExpenseitemPeer::IDEXPENSECATEGORY, $this->idexpensecategory);
        if ($this->isColumnModified(ExpenseitemPeer::EXPENSEITEM_NAME)) $criteria->add(ExpenseitemPeer::EXPENSEITEM_NAME, $this->expenseitem_name);
        if ($this->isColumnModified(ExpenseitemPeer::EXPENSEITEM_DESCRIPTION)) $criteria->add(ExpenseitemPeer::EXPENSEITEM_DESCRIPTION, $this->expenseitem_description);

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
        $criteria = new Criteria(ExpenseitemPeer::DATABASE_NAME);
        $criteria->add(ExpenseitemPeer::IDEXPENSEITEM, $this->idexpenseitem);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdexpenseitem();
    }

    /**
     * Generic method to set the primary key (idexpenseitem column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdexpenseitem($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdexpenseitem();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Expenseitem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdexpensecategory($this->getIdexpensecategory());
        $copyObj->setExpenseitemName($this->getExpenseitemName());
        $copyObj->setExpenseitemDescription($this->getExpenseitemDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getExpenserecurrencys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpenserecurrency($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpensetransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpensetransaction($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdexpenseitem(NULL); // this is a auto-increment column, so set to default value
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
     * @return Expenseitem Clone of current object.
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
     * @return ExpenseitemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ExpenseitemPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Expensecategory object.
     *
     * @param                  Expensecategory $v
     * @return Expenseitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpensecategory(Expensecategory $v = null)
    {
        if ($v === null) {
            $this->setIdexpensecategory(NULL);
        } else {
            $this->setIdexpensecategory($v->getIdexpensecategory());
        }

        $this->aExpensecategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Expensecategory object, it will not be re-added.
        if ($v !== null) {
            $v->addExpenseitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Expensecategory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Expensecategory The associated Expensecategory object.
     * @throws PropelException
     */
    public function getExpensecategory(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aExpensecategory === null && ($this->idexpensecategory !== null) && $doQuery) {
            $this->aExpensecategory = ExpensecategoryQuery::create()->findPk($this->idexpensecategory, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aExpensecategory->addExpenseitems($this);
             */
        }

        return $this->aExpensecategory;
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
        if ('Expenserecurrency' == $relationName) {
            $this->initExpenserecurrencys();
        }
        if ('Expensetransaction' == $relationName) {
            $this->initExpensetransactions();
        }
    }

    /**
     * Clears out the collExpenserecurrencys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expenseitem The current object (for fluent API support)
     * @see        addExpenserecurrencys()
     */
    public function clearExpenserecurrencys()
    {
        $this->collExpenserecurrencys = null; // important to set this to null since that means it is uninitialized
        $this->collExpenserecurrencysPartial = null;

        return $this;
    }

    /**
     * reset is the collExpenserecurrencys collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpenserecurrencys($v = true)
    {
        $this->collExpenserecurrencysPartial = $v;
    }

    /**
     * Initializes the collExpenserecurrencys collection.
     *
     * By default this just sets the collExpenserecurrencys collection to an empty array (like clearcollExpenserecurrencys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpenserecurrencys($overrideExisting = true)
    {
        if (null !== $this->collExpenserecurrencys && !$overrideExisting) {
            return;
        }
        $this->collExpenserecurrencys = new PropelObjectCollection();
        $this->collExpenserecurrencys->setModel('Expenserecurrency');
    }

    /**
     * Gets an array of Expenserecurrency objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expenseitem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expenserecurrency[] List of Expenserecurrency objects
     * @throws PropelException
     */
    public function getExpenserecurrencys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpenserecurrencysPartial && !$this->isNew();
        if (null === $this->collExpenserecurrencys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpenserecurrencys) {
                // return empty collection
                $this->initExpenserecurrencys();
            } else {
                $collExpenserecurrencys = ExpenserecurrencyQuery::create(null, $criteria)
                    ->filterByExpenseitem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpenserecurrencysPartial && count($collExpenserecurrencys)) {
                      $this->initExpenserecurrencys(false);

                      foreach ($collExpenserecurrencys as $obj) {
                        if (false == $this->collExpenserecurrencys->contains($obj)) {
                          $this->collExpenserecurrencys->append($obj);
                        }
                      }

                      $this->collExpenserecurrencysPartial = true;
                    }

                    $collExpenserecurrencys->getInternalIterator()->rewind();

                    return $collExpenserecurrencys;
                }

                if ($partial && $this->collExpenserecurrencys) {
                    foreach ($this->collExpenserecurrencys as $obj) {
                        if ($obj->isNew()) {
                            $collExpenserecurrencys[] = $obj;
                        }
                    }
                }

                $this->collExpenserecurrencys = $collExpenserecurrencys;
                $this->collExpenserecurrencysPartial = false;
            }
        }

        return $this->collExpenserecurrencys;
    }

    /**
     * Sets a collection of Expenserecurrency objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expenserecurrencys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setExpenserecurrencys(PropelCollection $expenserecurrencys, PropelPDO $con = null)
    {
        $expenserecurrencysToDelete = $this->getExpenserecurrencys(new Criteria(), $con)->diff($expenserecurrencys);


        $this->expenserecurrencysScheduledForDeletion = $expenserecurrencysToDelete;

        foreach ($expenserecurrencysToDelete as $expenserecurrencyRemoved) {
            $expenserecurrencyRemoved->setExpenseitem(null);
        }

        $this->collExpenserecurrencys = null;
        foreach ($expenserecurrencys as $expenserecurrency) {
            $this->addExpenserecurrency($expenserecurrency);
        }

        $this->collExpenserecurrencys = $expenserecurrencys;
        $this->collExpenserecurrencysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expenserecurrency objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expenserecurrency objects.
     * @throws PropelException
     */
    public function countExpenserecurrencys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpenserecurrencysPartial && !$this->isNew();
        if (null === $this->collExpenserecurrencys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpenserecurrencys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpenserecurrencys());
            }
            $query = ExpenserecurrencyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpenseitem($this)
                ->count($con);
        }

        return count($this->collExpenserecurrencys);
    }

    /**
     * Method called to associate a Expenserecurrency object to this object
     * through the Expenserecurrency foreign key attribute.
     *
     * @param    Expenserecurrency $l Expenserecurrency
     * @return Expenseitem The current object (for fluent API support)
     */
    public function addExpenserecurrency(Expenserecurrency $l)
    {
        if ($this->collExpenserecurrencys === null) {
            $this->initExpenserecurrencys();
            $this->collExpenserecurrencysPartial = true;
        }

        if (!in_array($l, $this->collExpenserecurrencys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpenserecurrency($l);

            if ($this->expenserecurrencysScheduledForDeletion and $this->expenserecurrencysScheduledForDeletion->contains($l)) {
                $this->expenserecurrencysScheduledForDeletion->remove($this->expenserecurrencysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expenserecurrency $expenserecurrency The expenserecurrency object to add.
     */
    protected function doAddExpenserecurrency($expenserecurrency)
    {
        $this->collExpenserecurrencys[]= $expenserecurrency;
        $expenserecurrency->setExpenseitem($this);
    }

    /**
     * @param	Expenserecurrency $expenserecurrency The expenserecurrency object to remove.
     * @return Expenseitem The current object (for fluent API support)
     */
    public function removeExpenserecurrency($expenserecurrency)
    {
        if ($this->getExpenserecurrencys()->contains($expenserecurrency)) {
            $this->collExpenserecurrencys->remove($this->collExpenserecurrencys->search($expenserecurrency));
            if (null === $this->expenserecurrencysScheduledForDeletion) {
                $this->expenserecurrencysScheduledForDeletion = clone $this->collExpenserecurrencys;
                $this->expenserecurrencysScheduledForDeletion->clear();
            }
            $this->expenserecurrencysScheduledForDeletion[]= clone $expenserecurrency;
            $expenserecurrency->setExpenseitem(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpensetransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expenseitem The current object (for fluent API support)
     * @see        addExpensetransactions()
     */
    public function clearExpensetransactions()
    {
        $this->collExpensetransactions = null; // important to set this to null since that means it is uninitialized
        $this->collExpensetransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collExpensetransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpensetransactions($v = true)
    {
        $this->collExpensetransactionsPartial = $v;
    }

    /**
     * Initializes the collExpensetransactions collection.
     *
     * By default this just sets the collExpensetransactions collection to an empty array (like clearcollExpensetransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpensetransactions($overrideExisting = true)
    {
        if (null !== $this->collExpensetransactions && !$overrideExisting) {
            return;
        }
        $this->collExpensetransactions = new PropelObjectCollection();
        $this->collExpensetransactions->setModel('Expensetransaction');
    }

    /**
     * Gets an array of Expensetransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expenseitem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expensetransaction[] List of Expensetransaction objects
     * @throws PropelException
     */
    public function getExpensetransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpensetransactionsPartial && !$this->isNew();
        if (null === $this->collExpensetransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpensetransactions) {
                // return empty collection
                $this->initExpensetransactions();
            } else {
                $collExpensetransactions = ExpensetransactionQuery::create(null, $criteria)
                    ->filterByExpenseitem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensetransactionsPartial && count($collExpensetransactions)) {
                      $this->initExpensetransactions(false);

                      foreach ($collExpensetransactions as $obj) {
                        if (false == $this->collExpensetransactions->contains($obj)) {
                          $this->collExpensetransactions->append($obj);
                        }
                      }

                      $this->collExpensetransactionsPartial = true;
                    }

                    $collExpensetransactions->getInternalIterator()->rewind();

                    return $collExpensetransactions;
                }

                if ($partial && $this->collExpensetransactions) {
                    foreach ($this->collExpensetransactions as $obj) {
                        if ($obj->isNew()) {
                            $collExpensetransactions[] = $obj;
                        }
                    }
                }

                $this->collExpensetransactions = $collExpensetransactions;
                $this->collExpensetransactionsPartial = false;
            }
        }

        return $this->collExpensetransactions;
    }

    /**
     * Sets a collection of Expensetransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expensetransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expenseitem The current object (for fluent API support)
     */
    public function setExpensetransactions(PropelCollection $expensetransactions, PropelPDO $con = null)
    {
        $expensetransactionsToDelete = $this->getExpensetransactions(new Criteria(), $con)->diff($expensetransactions);


        $this->expensetransactionsScheduledForDeletion = $expensetransactionsToDelete;

        foreach ($expensetransactionsToDelete as $expensetransactionRemoved) {
            $expensetransactionRemoved->setExpenseitem(null);
        }

        $this->collExpensetransactions = null;
        foreach ($expensetransactions as $expensetransaction) {
            $this->addExpensetransaction($expensetransaction);
        }

        $this->collExpensetransactions = $expensetransactions;
        $this->collExpensetransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expensetransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expensetransaction objects.
     * @throws PropelException
     */
    public function countExpensetransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensetransactionsPartial && !$this->isNew();
        if (null === $this->collExpensetransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpensetransactions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpensetransactions());
            }
            $query = ExpensetransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpenseitem($this)
                ->count($con);
        }

        return count($this->collExpensetransactions);
    }

    /**
     * Method called to associate a Expensetransaction object to this object
     * through the Expensetransaction foreign key attribute.
     *
     * @param    Expensetransaction $l Expensetransaction
     * @return Expenseitem The current object (for fluent API support)
     */
    public function addExpensetransaction(Expensetransaction $l)
    {
        if ($this->collExpensetransactions === null) {
            $this->initExpensetransactions();
            $this->collExpensetransactionsPartial = true;
        }

        if (!in_array($l, $this->collExpensetransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpensetransaction($l);

            if ($this->expensetransactionsScheduledForDeletion and $this->expensetransactionsScheduledForDeletion->contains($l)) {
                $this->expensetransactionsScheduledForDeletion->remove($this->expensetransactionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expensetransaction $expensetransaction The expensetransaction object to add.
     */
    protected function doAddExpensetransaction($expensetransaction)
    {
        $this->collExpensetransactions[]= $expensetransaction;
        $expensetransaction->setExpenseitem($this);
    }

    /**
     * @param	Expensetransaction $expensetransaction The expensetransaction object to remove.
     * @return Expenseitem The current object (for fluent API support)
     */
    public function removeExpensetransaction($expensetransaction)
    {
        if ($this->getExpensetransactions()->contains($expensetransaction)) {
            $this->collExpensetransactions->remove($this->collExpensetransactions->search($expensetransaction));
            if (null === $this->expensetransactionsScheduledForDeletion) {
                $this->expensetransactionsScheduledForDeletion = clone $this->collExpensetransactions;
                $this->expensetransactionsScheduledForDeletion->clear();
            }
            $this->expensetransactionsScheduledForDeletion[]= clone $expensetransaction;
            $expensetransaction->setExpenseitem(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idexpenseitem = null;
        $this->idexpensecategory = null;
        $this->expenseitem_name = null;
        $this->expenseitem_description = null;
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
            if ($this->collExpenserecurrencys) {
                foreach ($this->collExpenserecurrencys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpensetransactions) {
                foreach ($this->collExpensetransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aExpensecategory instanceof Persistent) {
              $this->aExpensecategory->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collExpenserecurrencys instanceof PropelCollection) {
            $this->collExpenserecurrencys->clearIterator();
        }
        $this->collExpenserecurrencys = null;
        if ($this->collExpensetransactions instanceof PropelCollection) {
            $this->collExpensetransactions->clearIterator();
        }
        $this->collExpensetransactions = null;
        $this->aExpensecategory = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ExpenseitemPeer::DEFAULT_STRING_FORMAT);
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
