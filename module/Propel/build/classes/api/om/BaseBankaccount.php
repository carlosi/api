<?php


/**
 * Base class that represents a row from the 'bankaccount' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBankaccount extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'BankaccountPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BankaccountPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idbankaccount field.
     * @var        int
     */
    protected $idbankaccount;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the bankaccount_name field.
     * @var        string
     */
    protected $bankaccount_name;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|Bankexpensetransaction[] Collection to store aggregation of Bankexpensetransaction objects.
     */
    protected $collBankexpensetransactions;
    protected $collBankexpensetransactionsPartial;

    /**
     * @var        PropelObjectCollection|Bankordertransaction[] Collection to store aggregation of Bankordertransaction objects.
     */
    protected $collBankordertransactions;
    protected $collBankordertransactionsPartial;

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
    protected $bankexpensetransactionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bankordertransactionsScheduledForDeletion = null;

    /**
     * Get the [idbankaccount] column value.
     *
     * @return int
     */
    public function getIdbankaccount()
    {

        return $this->idbankaccount;
    }

    /**
     * Get the [idcompany] column value.
     *
     * @return int
     */
    public function getIdcompany()
    {

        return $this->idcompany;
    }

    /**
     * Get the [bankaccount_name] column value.
     *
     * @return string
     */
    public function getBankaccountName()
    {

        return $this->bankaccount_name;
    }

    /**
     * Set the value of [idbankaccount] column.
     *
     * @param  int $v new value
     * @return Bankaccount The current object (for fluent API support)
     */
    public function setIdbankaccount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbankaccount !== $v) {
            $this->idbankaccount = $v;
            $this->modifiedColumns[] = BankaccountPeer::IDBANKACCOUNT;
        }


        return $this;
    } // setIdbankaccount()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Bankaccount The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = BankaccountPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [bankaccount_name] column.
     *
     * @param  string $v new value
     * @return Bankaccount The current object (for fluent API support)
     */
    public function setBankaccountName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bankaccount_name !== $v) {
            $this->bankaccount_name = $v;
            $this->modifiedColumns[] = BankaccountPeer::BANKACCOUNT_NAME;
        }


        return $this;
    } // setBankaccountName()

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

            $this->idbankaccount = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->bankaccount_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = BankaccountPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Bankaccount object", $e);
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

        if ($this->aCompany !== null && $this->idcompany !== $this->aCompany->getIdcompany()) {
            $this->aCompany = null;
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
            $con = Propel::getConnection(BankaccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BankaccountPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->collBankexpensetransactions = null;

            $this->collBankordertransactions = null;

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
            $con = Propel::getConnection(BankaccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BankaccountQuery::create()
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
            $con = Propel::getConnection(BankaccountPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BankaccountPeer::addInstanceToPool($this);
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

            if ($this->aCompany !== null) {
                if ($this->aCompany->isModified() || $this->aCompany->isNew()) {
                    $affectedRows += $this->aCompany->save($con);
                }
                $this->setCompany($this->aCompany);
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

            if ($this->bankexpensetransactionsScheduledForDeletion !== null) {
                if (!$this->bankexpensetransactionsScheduledForDeletion->isEmpty()) {
                    BankexpensetransactionQuery::create()
                        ->filterByPrimaryKeys($this->bankexpensetransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bankexpensetransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collBankexpensetransactions !== null) {
                foreach ($this->collBankexpensetransactions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bankordertransactionsScheduledForDeletion !== null) {
                if (!$this->bankordertransactionsScheduledForDeletion->isEmpty()) {
                    BankordertransactionQuery::create()
                        ->filterByPrimaryKeys($this->bankordertransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bankordertransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collBankordertransactions !== null) {
                foreach ($this->collBankordertransactions as $referrerFK) {
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

        $this->modifiedColumns[] = BankaccountPeer::IDBANKACCOUNT;
        if (null !== $this->idbankaccount) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BankaccountPeer::IDBANKACCOUNT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BankaccountPeer::IDBANKACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`idbankaccount`';
        }
        if ($this->isColumnModified(BankaccountPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(BankaccountPeer::BANKACCOUNT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`bankaccount_name`';
        }

        $sql = sprintf(
            'INSERT INTO `bankaccount` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idbankaccount`':
                        $stmt->bindValue($identifier, $this->idbankaccount, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`bankaccount_name`':
                        $stmt->bindValue($identifier, $this->bankaccount_name, PDO::PARAM_STR);
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
        $this->setIdbankaccount($pk);

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

            if ($this->aCompany !== null) {
                if (!$this->aCompany->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCompany->getValidationFailures());
                }
            }


            if (($retval = BankaccountPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBankexpensetransactions !== null) {
                    foreach ($this->collBankexpensetransactions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBankordertransactions !== null) {
                    foreach ($this->collBankordertransactions as $referrerFK) {
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
        $pos = BankaccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdbankaccount();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getBankaccountName();
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
        if (isset($alreadyDumpedObjects['Bankaccount'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bankaccount'][$this->getPrimaryKey()] = true;
        $keys = BankaccountPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdbankaccount(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getBankaccountName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBankexpensetransactions) {
                $result['Bankexpensetransactions'] = $this->collBankexpensetransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBankordertransactions) {
                $result['Bankordertransactions'] = $this->collBankordertransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BankaccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdbankaccount($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setBankaccountName($value);
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
        $keys = BankaccountPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdbankaccount($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setBankaccountName($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BankaccountPeer::DATABASE_NAME);

        if ($this->isColumnModified(BankaccountPeer::IDBANKACCOUNT)) $criteria->add(BankaccountPeer::IDBANKACCOUNT, $this->idbankaccount);
        if ($this->isColumnModified(BankaccountPeer::IDCOMPANY)) $criteria->add(BankaccountPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(BankaccountPeer::BANKACCOUNT_NAME)) $criteria->add(BankaccountPeer::BANKACCOUNT_NAME, $this->bankaccount_name);

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
        $criteria = new Criteria(BankaccountPeer::DATABASE_NAME);
        $criteria->add(BankaccountPeer::IDBANKACCOUNT, $this->idbankaccount);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdbankaccount();
    }

    /**
     * Generic method to set the primary key (idbankaccount column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdbankaccount($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdbankaccount();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Bankaccount (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setBankaccountName($this->getBankaccountName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBankexpensetransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBankexpensetransaction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBankordertransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBankordertransaction($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdbankaccount(NULL); // this is a auto-increment column, so set to default value
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
     * @return Bankaccount Clone of current object.
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
     * @return BankaccountPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BankaccountPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Bankaccount The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCompany(Company $v = null)
    {
        if ($v === null) {
            $this->setIdcompany(NULL);
        } else {
            $this->setIdcompany($v->getIdcompany());
        }

        $this->aCompany = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Company object, it will not be re-added.
        if ($v !== null) {
            $v->addBankaccount($this);
        }


        return $this;
    }


    /**
     * Get the associated Company object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Company The associated Company object.
     * @throws PropelException
     */
    public function getCompany(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCompany === null && ($this->idcompany !== null) && $doQuery) {
            $this->aCompany = CompanyQuery::create()->findPk($this->idcompany, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCompany->addBankaccounts($this);
             */
        }

        return $this->aCompany;
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
        if ('Bankexpensetransaction' == $relationName) {
            $this->initBankexpensetransactions();
        }
        if ('Bankordertransaction' == $relationName) {
            $this->initBankordertransactions();
        }
    }

    /**
     * Clears out the collBankexpensetransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bankaccount The current object (for fluent API support)
     * @see        addBankexpensetransactions()
     */
    public function clearBankexpensetransactions()
    {
        $this->collBankexpensetransactions = null; // important to set this to null since that means it is uninitialized
        $this->collBankexpensetransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collBankexpensetransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialBankexpensetransactions($v = true)
    {
        $this->collBankexpensetransactionsPartial = $v;
    }

    /**
     * Initializes the collBankexpensetransactions collection.
     *
     * By default this just sets the collBankexpensetransactions collection to an empty array (like clearcollBankexpensetransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBankexpensetransactions($overrideExisting = true)
    {
        if (null !== $this->collBankexpensetransactions && !$overrideExisting) {
            return;
        }
        $this->collBankexpensetransactions = new PropelObjectCollection();
        $this->collBankexpensetransactions->setModel('Bankexpensetransaction');
    }

    /**
     * Gets an array of Bankexpensetransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bankaccount is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bankexpensetransaction[] List of Bankexpensetransaction objects
     * @throws PropelException
     */
    public function getBankexpensetransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBankexpensetransactionsPartial && !$this->isNew();
        if (null === $this->collBankexpensetransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBankexpensetransactions) {
                // return empty collection
                $this->initBankexpensetransactions();
            } else {
                $collBankexpensetransactions = BankexpensetransactionQuery::create(null, $criteria)
                    ->filterByBankaccount($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBankexpensetransactionsPartial && count($collBankexpensetransactions)) {
                      $this->initBankexpensetransactions(false);

                      foreach ($collBankexpensetransactions as $obj) {
                        if (false == $this->collBankexpensetransactions->contains($obj)) {
                          $this->collBankexpensetransactions->append($obj);
                        }
                      }

                      $this->collBankexpensetransactionsPartial = true;
                    }

                    $collBankexpensetransactions->getInternalIterator()->rewind();

                    return $collBankexpensetransactions;
                }

                if ($partial && $this->collBankexpensetransactions) {
                    foreach ($this->collBankexpensetransactions as $obj) {
                        if ($obj->isNew()) {
                            $collBankexpensetransactions[] = $obj;
                        }
                    }
                }

                $this->collBankexpensetransactions = $collBankexpensetransactions;
                $this->collBankexpensetransactionsPartial = false;
            }
        }

        return $this->collBankexpensetransactions;
    }

    /**
     * Sets a collection of Bankexpensetransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bankexpensetransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bankaccount The current object (for fluent API support)
     */
    public function setBankexpensetransactions(PropelCollection $bankexpensetransactions, PropelPDO $con = null)
    {
        $bankexpensetransactionsToDelete = $this->getBankexpensetransactions(new Criteria(), $con)->diff($bankexpensetransactions);


        $this->bankexpensetransactionsScheduledForDeletion = $bankexpensetransactionsToDelete;

        foreach ($bankexpensetransactionsToDelete as $bankexpensetransactionRemoved) {
            $bankexpensetransactionRemoved->setBankaccount(null);
        }

        $this->collBankexpensetransactions = null;
        foreach ($bankexpensetransactions as $bankexpensetransaction) {
            $this->addBankexpensetransaction($bankexpensetransaction);
        }

        $this->collBankexpensetransactions = $bankexpensetransactions;
        $this->collBankexpensetransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bankexpensetransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bankexpensetransaction objects.
     * @throws PropelException
     */
    public function countBankexpensetransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBankexpensetransactionsPartial && !$this->isNew();
        if (null === $this->collBankexpensetransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBankexpensetransactions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBankexpensetransactions());
            }
            $query = BankexpensetransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBankaccount($this)
                ->count($con);
        }

        return count($this->collBankexpensetransactions);
    }

    /**
     * Method called to associate a Bankexpensetransaction object to this object
     * through the Bankexpensetransaction foreign key attribute.
     *
     * @param    Bankexpensetransaction $l Bankexpensetransaction
     * @return Bankaccount The current object (for fluent API support)
     */
    public function addBankexpensetransaction(Bankexpensetransaction $l)
    {
        if ($this->collBankexpensetransactions === null) {
            $this->initBankexpensetransactions();
            $this->collBankexpensetransactionsPartial = true;
        }

        if (!in_array($l, $this->collBankexpensetransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBankexpensetransaction($l);

            if ($this->bankexpensetransactionsScheduledForDeletion and $this->bankexpensetransactionsScheduledForDeletion->contains($l)) {
                $this->bankexpensetransactionsScheduledForDeletion->remove($this->bankexpensetransactionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bankexpensetransaction $bankexpensetransaction The bankexpensetransaction object to add.
     */
    protected function doAddBankexpensetransaction($bankexpensetransaction)
    {
        $this->collBankexpensetransactions[]= $bankexpensetransaction;
        $bankexpensetransaction->setBankaccount($this);
    }

    /**
     * @param	Bankexpensetransaction $bankexpensetransaction The bankexpensetransaction object to remove.
     * @return Bankaccount The current object (for fluent API support)
     */
    public function removeBankexpensetransaction($bankexpensetransaction)
    {
        if ($this->getBankexpensetransactions()->contains($bankexpensetransaction)) {
            $this->collBankexpensetransactions->remove($this->collBankexpensetransactions->search($bankexpensetransaction));
            if (null === $this->bankexpensetransactionsScheduledForDeletion) {
                $this->bankexpensetransactionsScheduledForDeletion = clone $this->collBankexpensetransactions;
                $this->bankexpensetransactionsScheduledForDeletion->clear();
            }
            $this->bankexpensetransactionsScheduledForDeletion[]= clone $bankexpensetransaction;
            $bankexpensetransaction->setBankaccount(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bankaccount is new, it will return
     * an empty collection; or if this Bankaccount has previously
     * been saved, it will retrieve related Bankexpensetransactions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bankaccount.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bankexpensetransaction[] List of Bankexpensetransaction objects
     */
    public function getBankexpensetransactionsJoinExpensetransaction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BankexpensetransactionQuery::create(null, $criteria);
        $query->joinWith('Expensetransaction', $join_behavior);

        return $this->getBankexpensetransactions($query, $con);
    }

    /**
     * Clears out the collBankordertransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Bankaccount The current object (for fluent API support)
     * @see        addBankordertransactions()
     */
    public function clearBankordertransactions()
    {
        $this->collBankordertransactions = null; // important to set this to null since that means it is uninitialized
        $this->collBankordertransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collBankordertransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialBankordertransactions($v = true)
    {
        $this->collBankordertransactionsPartial = $v;
    }

    /**
     * Initializes the collBankordertransactions collection.
     *
     * By default this just sets the collBankordertransactions collection to an empty array (like clearcollBankordertransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBankordertransactions($overrideExisting = true)
    {
        if (null !== $this->collBankordertransactions && !$overrideExisting) {
            return;
        }
        $this->collBankordertransactions = new PropelObjectCollection();
        $this->collBankordertransactions->setModel('Bankordertransaction');
    }

    /**
     * Gets an array of Bankordertransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Bankaccount is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bankordertransaction[] List of Bankordertransaction objects
     * @throws PropelException
     */
    public function getBankordertransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBankordertransactionsPartial && !$this->isNew();
        if (null === $this->collBankordertransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBankordertransactions) {
                // return empty collection
                $this->initBankordertransactions();
            } else {
                $collBankordertransactions = BankordertransactionQuery::create(null, $criteria)
                    ->filterByBankaccount($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBankordertransactionsPartial && count($collBankordertransactions)) {
                      $this->initBankordertransactions(false);

                      foreach ($collBankordertransactions as $obj) {
                        if (false == $this->collBankordertransactions->contains($obj)) {
                          $this->collBankordertransactions->append($obj);
                        }
                      }

                      $this->collBankordertransactionsPartial = true;
                    }

                    $collBankordertransactions->getInternalIterator()->rewind();

                    return $collBankordertransactions;
                }

                if ($partial && $this->collBankordertransactions) {
                    foreach ($this->collBankordertransactions as $obj) {
                        if ($obj->isNew()) {
                            $collBankordertransactions[] = $obj;
                        }
                    }
                }

                $this->collBankordertransactions = $collBankordertransactions;
                $this->collBankordertransactionsPartial = false;
            }
        }

        return $this->collBankordertransactions;
    }

    /**
     * Sets a collection of Bankordertransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bankordertransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Bankaccount The current object (for fluent API support)
     */
    public function setBankordertransactions(PropelCollection $bankordertransactions, PropelPDO $con = null)
    {
        $bankordertransactionsToDelete = $this->getBankordertransactions(new Criteria(), $con)->diff($bankordertransactions);


        $this->bankordertransactionsScheduledForDeletion = $bankordertransactionsToDelete;

        foreach ($bankordertransactionsToDelete as $bankordertransactionRemoved) {
            $bankordertransactionRemoved->setBankaccount(null);
        }

        $this->collBankordertransactions = null;
        foreach ($bankordertransactions as $bankordertransaction) {
            $this->addBankordertransaction($bankordertransaction);
        }

        $this->collBankordertransactions = $bankordertransactions;
        $this->collBankordertransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bankordertransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bankordertransaction objects.
     * @throws PropelException
     */
    public function countBankordertransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBankordertransactionsPartial && !$this->isNew();
        if (null === $this->collBankordertransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBankordertransactions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBankordertransactions());
            }
            $query = BankordertransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBankaccount($this)
                ->count($con);
        }

        return count($this->collBankordertransactions);
    }

    /**
     * Method called to associate a Bankordertransaction object to this object
     * through the Bankordertransaction foreign key attribute.
     *
     * @param    Bankordertransaction $l Bankordertransaction
     * @return Bankaccount The current object (for fluent API support)
     */
    public function addBankordertransaction(Bankordertransaction $l)
    {
        if ($this->collBankordertransactions === null) {
            $this->initBankordertransactions();
            $this->collBankordertransactionsPartial = true;
        }

        if (!in_array($l, $this->collBankordertransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBankordertransaction($l);

            if ($this->bankordertransactionsScheduledForDeletion and $this->bankordertransactionsScheduledForDeletion->contains($l)) {
                $this->bankordertransactionsScheduledForDeletion->remove($this->bankordertransactionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bankordertransaction $bankordertransaction The bankordertransaction object to add.
     */
    protected function doAddBankordertransaction($bankordertransaction)
    {
        $this->collBankordertransactions[]= $bankordertransaction;
        $bankordertransaction->setBankaccount($this);
    }

    /**
     * @param	Bankordertransaction $bankordertransaction The bankordertransaction object to remove.
     * @return Bankaccount The current object (for fluent API support)
     */
    public function removeBankordertransaction($bankordertransaction)
    {
        if ($this->getBankordertransactions()->contains($bankordertransaction)) {
            $this->collBankordertransactions->remove($this->collBankordertransactions->search($bankordertransaction));
            if (null === $this->bankordertransactionsScheduledForDeletion) {
                $this->bankordertransactionsScheduledForDeletion = clone $this->collBankordertransactions;
                $this->bankordertransactionsScheduledForDeletion->clear();
            }
            $this->bankordertransactionsScheduledForDeletion[]= clone $bankordertransaction;
            $bankordertransaction->setBankaccount(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Bankaccount is new, it will return
     * an empty collection; or if this Bankaccount has previously
     * been saved, it will retrieve related Bankordertransactions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Bankaccount.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bankordertransaction[] List of Bankordertransaction objects
     */
    public function getBankordertransactionsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BankordertransactionQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getBankordertransactions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idbankaccount = null;
        $this->idcompany = null;
        $this->bankaccount_name = null;
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
            if ($this->collBankexpensetransactions) {
                foreach ($this->collBankexpensetransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBankordertransactions) {
                foreach ($this->collBankordertransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBankexpensetransactions instanceof PropelCollection) {
            $this->collBankexpensetransactions->clearIterator();
        }
        $this->collBankexpensetransactions = null;
        if ($this->collBankordertransactions instanceof PropelCollection) {
            $this->collBankordertransactions->clearIterator();
        }
        $this->collBankordertransactions = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BankaccountPeer::DEFAULT_STRING_FORMAT);
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
