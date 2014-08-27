<?php


/**
 * Base class that represents a row from the 'expensecategory' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpensecategory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ExpensecategoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ExpensecategoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idexpensecategory field.
     * @var        int
     */
    protected $idexpensecategory;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the expensecategory_dependency field.
     * @var        int
     */
    protected $expensecategory_dependency;

    /**
     * The value for the expensecategory_name field.
     * @var        string
     */
    protected $expensecategory_name;

    /**
     * The value for the expensecategory_description field.
     * @var        string
     */
    protected $expensecategory_description;

    /**
     * @var        Expensecategory
     */
    protected $aExpensecategoryRelatedByExpensecategoryDependency;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|Expensecategory[] Collection to store aggregation of Expensecategory objects.
     */
    protected $collExpensecategorysRelatedByIdexpensecategory;
    protected $collExpensecategorysRelatedByIdexpensecategoryPartial;

    /**
     * @var        PropelObjectCollection|Expenseitem[] Collection to store aggregation of Expenseitem objects.
     */
    protected $collExpenseitems;
    protected $collExpenseitemsPartial;

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
    protected $expensecategorysRelatedByIdexpensecategoryScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $expenseitemsScheduledForDeletion = null;

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
     * Get the [idcompany] column value.
     *
     * @return int
     */
    public function getIdcompany()
    {

        return $this->idcompany;
    }

    /**
     * Get the [expensecategory_dependency] column value.
     *
     * @return int
     */
    public function getExpensecategoryDependency()
    {

        return $this->expensecategory_dependency;
    }

    /**
     * Get the [expensecategory_name] column value.
     *
     * @return string
     */
    public function getExpensecategoryName()
    {

        return $this->expensecategory_name;
    }

    /**
     * Get the [expensecategory_description] column value.
     *
     * @return string
     */
    public function getExpensecategoryDescription()
    {

        return $this->expensecategory_description;
    }

    /**
     * Set the value of [idexpensecategory] column.
     *
     * @param  int $v new value
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setIdexpensecategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpensecategory !== $v) {
            $this->idexpensecategory = $v;
            $this->modifiedColumns[] = ExpensecategoryPeer::IDEXPENSECATEGORY;
        }


        return $this;
    } // setIdexpensecategory()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = ExpensecategoryPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [expensecategory_dependency] column.
     *
     * @param  int $v new value
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setExpensecategoryDependency($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->expensecategory_dependency !== $v) {
            $this->expensecategory_dependency = $v;
            $this->modifiedColumns[] = ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY;
        }

        if ($this->aExpensecategoryRelatedByExpensecategoryDependency !== null && $this->aExpensecategoryRelatedByExpensecategoryDependency->getIdexpensecategory() !== $v) {
            $this->aExpensecategoryRelatedByExpensecategoryDependency = null;
        }


        return $this;
    } // setExpensecategoryDependency()

    /**
     * Set the value of [expensecategory_name] column.
     *
     * @param  string $v new value
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setExpensecategoryName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expensecategory_name !== $v) {
            $this->expensecategory_name = $v;
            $this->modifiedColumns[] = ExpensecategoryPeer::EXPENSECATEGORY_NAME;
        }


        return $this;
    } // setExpensecategoryName()

    /**
     * Set the value of [expensecategory_description] column.
     *
     * @param  string $v new value
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setExpensecategoryDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expensecategory_description !== $v) {
            $this->expensecategory_description = $v;
            $this->modifiedColumns[] = ExpensecategoryPeer::EXPENSECATEGORY_DESCRIPTION;
        }


        return $this;
    } // setExpensecategoryDescription()

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

            $this->idexpensecategory = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->expensecategory_dependency = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->expensecategory_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->expensecategory_description = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 5; // 5 = ExpensecategoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Expensecategory object", $e);
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
        if ($this->aExpensecategoryRelatedByExpensecategoryDependency !== null && $this->expensecategory_dependency !== $this->aExpensecategoryRelatedByExpensecategoryDependency->getIdexpensecategory()) {
            $this->aExpensecategoryRelatedByExpensecategoryDependency = null;
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
            $con = Propel::getConnection(ExpensecategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ExpensecategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aExpensecategoryRelatedByExpensecategoryDependency = null;
            $this->aCompany = null;
            $this->collExpensecategorysRelatedByIdexpensecategory = null;

            $this->collExpenseitems = null;

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
            $con = Propel::getConnection(ExpensecategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ExpensecategoryQuery::create()
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
            $con = Propel::getConnection(ExpensecategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ExpensecategoryPeer::addInstanceToPool($this);
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

            if ($this->aExpensecategoryRelatedByExpensecategoryDependency !== null) {
                if ($this->aExpensecategoryRelatedByExpensecategoryDependency->isModified() || $this->aExpensecategoryRelatedByExpensecategoryDependency->isNew()) {
                    $affectedRows += $this->aExpensecategoryRelatedByExpensecategoryDependency->save($con);
                }
                $this->setExpensecategoryRelatedByExpensecategoryDependency($this->aExpensecategoryRelatedByExpensecategoryDependency);
            }

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

            if ($this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion !== null) {
                if (!$this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->isEmpty()) {
                    ExpensecategoryQuery::create()
                        ->filterByPrimaryKeys($this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion = null;
                }
            }

            if ($this->collExpensecategorysRelatedByIdexpensecategory !== null) {
                foreach ($this->collExpensecategorysRelatedByIdexpensecategory as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expenseitemsScheduledForDeletion !== null) {
                if (!$this->expenseitemsScheduledForDeletion->isEmpty()) {
                    ExpenseitemQuery::create()
                        ->filterByPrimaryKeys($this->expenseitemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expenseitemsScheduledForDeletion = null;
                }
            }

            if ($this->collExpenseitems !== null) {
                foreach ($this->collExpenseitems as $referrerFK) {
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

        $this->modifiedColumns[] = ExpensecategoryPeer::IDEXPENSECATEGORY;
        if (null !== $this->idexpensecategory) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ExpensecategoryPeer::IDEXPENSECATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ExpensecategoryPeer::IDEXPENSECATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`idexpensecategory`';
        }
        if ($this->isColumnModified(ExpensecategoryPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY)) {
            $modifiedColumns[':p' . $index++]  = '`expensecategory_dependency`';
        }
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`expensecategory_name`';
        }
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`expensecategory_description`';
        }

        $sql = sprintf(
            'INSERT INTO `expensecategory` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idexpensecategory`':
                        $stmt->bindValue($identifier, $this->idexpensecategory, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`expensecategory_dependency`':
                        $stmt->bindValue($identifier, $this->expensecategory_dependency, PDO::PARAM_INT);
                        break;
                    case '`expensecategory_name`':
                        $stmt->bindValue($identifier, $this->expensecategory_name, PDO::PARAM_STR);
                        break;
                    case '`expensecategory_description`':
                        $stmt->bindValue($identifier, $this->expensecategory_description, PDO::PARAM_STR);
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
        $this->setIdexpensecategory($pk);

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

            if ($this->aExpensecategoryRelatedByExpensecategoryDependency !== null) {
                if (!$this->aExpensecategoryRelatedByExpensecategoryDependency->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aExpensecategoryRelatedByExpensecategoryDependency->getValidationFailures());
                }
            }

            if ($this->aCompany !== null) {
                if (!$this->aCompany->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCompany->getValidationFailures());
                }
            }


            if (($retval = ExpensecategoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collExpensecategorysRelatedByIdexpensecategory !== null) {
                    foreach ($this->collExpensecategorysRelatedByIdexpensecategory as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collExpenseitems !== null) {
                    foreach ($this->collExpenseitems as $referrerFK) {
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
        $pos = ExpensecategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdexpensecategory();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getExpensecategoryDependency();
                break;
            case 3:
                return $this->getExpensecategoryName();
                break;
            case 4:
                return $this->getExpensecategoryDescription();
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
        if (isset($alreadyDumpedObjects['Expensecategory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Expensecategory'][$this->getPrimaryKey()] = true;
        $keys = ExpensecategoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdexpensecategory(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getExpensecategoryDependency(),
            $keys[3] => $this->getExpensecategoryName(),
            $keys[4] => $this->getExpensecategoryDescription(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aExpensecategoryRelatedByExpensecategoryDependency) {
                $result['ExpensecategoryRelatedByExpensecategoryDependency'] = $this->aExpensecategoryRelatedByExpensecategoryDependency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collExpensecategorysRelatedByIdexpensecategory) {
                $result['ExpensecategorysRelatedByIdexpensecategory'] = $this->collExpensecategorysRelatedByIdexpensecategory->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpenseitems) {
                $result['Expenseitems'] = $this->collExpenseitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ExpensecategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdexpensecategory($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setExpensecategoryDependency($value);
                break;
            case 3:
                $this->setExpensecategoryName($value);
                break;
            case 4:
                $this->setExpensecategoryDescription($value);
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
        $keys = ExpensecategoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdexpensecategory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setExpensecategoryDependency($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setExpensecategoryName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setExpensecategoryDescription($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ExpensecategoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ExpensecategoryPeer::IDEXPENSECATEGORY)) $criteria->add(ExpensecategoryPeer::IDEXPENSECATEGORY, $this->idexpensecategory);
        if ($this->isColumnModified(ExpensecategoryPeer::IDCOMPANY)) $criteria->add(ExpensecategoryPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY)) $criteria->add(ExpensecategoryPeer::EXPENSECATEGORY_DEPENDENCY, $this->expensecategory_dependency);
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_NAME)) $criteria->add(ExpensecategoryPeer::EXPENSECATEGORY_NAME, $this->expensecategory_name);
        if ($this->isColumnModified(ExpensecategoryPeer::EXPENSECATEGORY_DESCRIPTION)) $criteria->add(ExpensecategoryPeer::EXPENSECATEGORY_DESCRIPTION, $this->expensecategory_description);

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
        $criteria = new Criteria(ExpensecategoryPeer::DATABASE_NAME);
        $criteria->add(ExpensecategoryPeer::IDEXPENSECATEGORY, $this->idexpensecategory);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdexpensecategory();
    }

    /**
     * Generic method to set the primary key (idexpensecategory column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdexpensecategory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdexpensecategory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Expensecategory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setExpensecategoryDependency($this->getExpensecategoryDependency());
        $copyObj->setExpensecategoryName($this->getExpensecategoryName());
        $copyObj->setExpensecategoryDescription($this->getExpensecategoryDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getExpensecategorysRelatedByIdexpensecategory() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpensecategoryRelatedByIdexpensecategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpenseitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpenseitem($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdexpensecategory(NULL); // this is a auto-increment column, so set to default value
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
     * @return Expensecategory Clone of current object.
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
     * @return ExpensecategoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ExpensecategoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Expensecategory object.
     *
     * @param                  Expensecategory $v
     * @return Expensecategory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpensecategoryRelatedByExpensecategoryDependency(Expensecategory $v = null)
    {
        if ($v === null) {
            $this->setExpensecategoryDependency(NULL);
        } else {
            $this->setExpensecategoryDependency($v->getIdexpensecategory());
        }

        $this->aExpensecategoryRelatedByExpensecategoryDependency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Expensecategory object, it will not be re-added.
        if ($v !== null) {
            $v->addExpensecategoryRelatedByIdexpensecategory($this);
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
    public function getExpensecategoryRelatedByExpensecategoryDependency(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aExpensecategoryRelatedByExpensecategoryDependency === null && ($this->expensecategory_dependency !== null) && $doQuery) {
            $this->aExpensecategoryRelatedByExpensecategoryDependency = ExpensecategoryQuery::create()->findPk($this->expensecategory_dependency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aExpensecategoryRelatedByExpensecategoryDependency->addExpensecategorysRelatedByIdexpensecategory($this);
             */
        }

        return $this->aExpensecategoryRelatedByExpensecategoryDependency;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Expensecategory The current object (for fluent API support)
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
            $v->addExpensecategory($this);
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
                $this->aCompany->addExpensecategorys($this);
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
        if ('ExpensecategoryRelatedByIdexpensecategory' == $relationName) {
            $this->initExpensecategorysRelatedByIdexpensecategory();
        }
        if ('Expenseitem' == $relationName) {
            $this->initExpenseitems();
        }
    }

    /**
     * Clears out the collExpensecategorysRelatedByIdexpensecategory collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expensecategory The current object (for fluent API support)
     * @see        addExpensecategorysRelatedByIdexpensecategory()
     */
    public function clearExpensecategorysRelatedByIdexpensecategory()
    {
        $this->collExpensecategorysRelatedByIdexpensecategory = null; // important to set this to null since that means it is uninitialized
        $this->collExpensecategorysRelatedByIdexpensecategoryPartial = null;

        return $this;
    }

    /**
     * reset is the collExpensecategorysRelatedByIdexpensecategory collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpensecategorysRelatedByIdexpensecategory($v = true)
    {
        $this->collExpensecategorysRelatedByIdexpensecategoryPartial = $v;
    }

    /**
     * Initializes the collExpensecategorysRelatedByIdexpensecategory collection.
     *
     * By default this just sets the collExpensecategorysRelatedByIdexpensecategory collection to an empty array (like clearcollExpensecategorysRelatedByIdexpensecategory());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpensecategorysRelatedByIdexpensecategory($overrideExisting = true)
    {
        if (null !== $this->collExpensecategorysRelatedByIdexpensecategory && !$overrideExisting) {
            return;
        }
        $this->collExpensecategorysRelatedByIdexpensecategory = new PropelObjectCollection();
        $this->collExpensecategorysRelatedByIdexpensecategory->setModel('Expensecategory');
    }

    /**
     * Gets an array of Expensecategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expensecategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expensecategory[] List of Expensecategory objects
     * @throws PropelException
     */
    public function getExpensecategorysRelatedByIdexpensecategory($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpensecategorysRelatedByIdexpensecategoryPartial && !$this->isNew();
        if (null === $this->collExpensecategorysRelatedByIdexpensecategory || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpensecategorysRelatedByIdexpensecategory) {
                // return empty collection
                $this->initExpensecategorysRelatedByIdexpensecategory();
            } else {
                $collExpensecategorysRelatedByIdexpensecategory = ExpensecategoryQuery::create(null, $criteria)
                    ->filterByExpensecategoryRelatedByExpensecategoryDependency($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensecategorysRelatedByIdexpensecategoryPartial && count($collExpensecategorysRelatedByIdexpensecategory)) {
                      $this->initExpensecategorysRelatedByIdexpensecategory(false);

                      foreach ($collExpensecategorysRelatedByIdexpensecategory as $obj) {
                        if (false == $this->collExpensecategorysRelatedByIdexpensecategory->contains($obj)) {
                          $this->collExpensecategorysRelatedByIdexpensecategory->append($obj);
                        }
                      }

                      $this->collExpensecategorysRelatedByIdexpensecategoryPartial = true;
                    }

                    $collExpensecategorysRelatedByIdexpensecategory->getInternalIterator()->rewind();

                    return $collExpensecategorysRelatedByIdexpensecategory;
                }

                if ($partial && $this->collExpensecategorysRelatedByIdexpensecategory) {
                    foreach ($this->collExpensecategorysRelatedByIdexpensecategory as $obj) {
                        if ($obj->isNew()) {
                            $collExpensecategorysRelatedByIdexpensecategory[] = $obj;
                        }
                    }
                }

                $this->collExpensecategorysRelatedByIdexpensecategory = $collExpensecategorysRelatedByIdexpensecategory;
                $this->collExpensecategorysRelatedByIdexpensecategoryPartial = false;
            }
        }

        return $this->collExpensecategorysRelatedByIdexpensecategory;
    }

    /**
     * Sets a collection of ExpensecategoryRelatedByIdexpensecategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expensecategorysRelatedByIdexpensecategory A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setExpensecategorysRelatedByIdexpensecategory(PropelCollection $expensecategorysRelatedByIdexpensecategory, PropelPDO $con = null)
    {
        $expensecategorysRelatedByIdexpensecategoryToDelete = $this->getExpensecategorysRelatedByIdexpensecategory(new Criteria(), $con)->diff($expensecategorysRelatedByIdexpensecategory);


        $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion = $expensecategorysRelatedByIdexpensecategoryToDelete;

        foreach ($expensecategorysRelatedByIdexpensecategoryToDelete as $expensecategoryRelatedByIdexpensecategoryRemoved) {
            $expensecategoryRelatedByIdexpensecategoryRemoved->setExpensecategoryRelatedByExpensecategoryDependency(null);
        }

        $this->collExpensecategorysRelatedByIdexpensecategory = null;
        foreach ($expensecategorysRelatedByIdexpensecategory as $expensecategoryRelatedByIdexpensecategory) {
            $this->addExpensecategoryRelatedByIdexpensecategory($expensecategoryRelatedByIdexpensecategory);
        }

        $this->collExpensecategorysRelatedByIdexpensecategory = $expensecategorysRelatedByIdexpensecategory;
        $this->collExpensecategorysRelatedByIdexpensecategoryPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expensecategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expensecategory objects.
     * @throws PropelException
     */
    public function countExpensecategorysRelatedByIdexpensecategory(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensecategorysRelatedByIdexpensecategoryPartial && !$this->isNew();
        if (null === $this->collExpensecategorysRelatedByIdexpensecategory || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpensecategorysRelatedByIdexpensecategory) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpensecategorysRelatedByIdexpensecategory());
            }
            $query = ExpensecategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpensecategoryRelatedByExpensecategoryDependency($this)
                ->count($con);
        }

        return count($this->collExpensecategorysRelatedByIdexpensecategory);
    }

    /**
     * Method called to associate a Expensecategory object to this object
     * through the Expensecategory foreign key attribute.
     *
     * @param    Expensecategory $l Expensecategory
     * @return Expensecategory The current object (for fluent API support)
     */
    public function addExpensecategoryRelatedByIdexpensecategory(Expensecategory $l)
    {
        if ($this->collExpensecategorysRelatedByIdexpensecategory === null) {
            $this->initExpensecategorysRelatedByIdexpensecategory();
            $this->collExpensecategorysRelatedByIdexpensecategoryPartial = true;
        }

        if (!in_array($l, $this->collExpensecategorysRelatedByIdexpensecategory->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpensecategoryRelatedByIdexpensecategory($l);

            if ($this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion and $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->contains($l)) {
                $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->remove($this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ExpensecategoryRelatedByIdexpensecategory $expensecategoryRelatedByIdexpensecategory The expensecategoryRelatedByIdexpensecategory object to add.
     */
    protected function doAddExpensecategoryRelatedByIdexpensecategory($expensecategoryRelatedByIdexpensecategory)
    {
        $this->collExpensecategorysRelatedByIdexpensecategory[]= $expensecategoryRelatedByIdexpensecategory;
        $expensecategoryRelatedByIdexpensecategory->setExpensecategoryRelatedByExpensecategoryDependency($this);
    }

    /**
     * @param	ExpensecategoryRelatedByIdexpensecategory $expensecategoryRelatedByIdexpensecategory The expensecategoryRelatedByIdexpensecategory object to remove.
     * @return Expensecategory The current object (for fluent API support)
     */
    public function removeExpensecategoryRelatedByIdexpensecategory($expensecategoryRelatedByIdexpensecategory)
    {
        if ($this->getExpensecategorysRelatedByIdexpensecategory()->contains($expensecategoryRelatedByIdexpensecategory)) {
            $this->collExpensecategorysRelatedByIdexpensecategory->remove($this->collExpensecategorysRelatedByIdexpensecategory->search($expensecategoryRelatedByIdexpensecategory));
            if (null === $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion) {
                $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion = clone $this->collExpensecategorysRelatedByIdexpensecategory;
                $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion->clear();
            }
            $this->expensecategorysRelatedByIdexpensecategoryScheduledForDeletion[]= clone $expensecategoryRelatedByIdexpensecategory;
            $expensecategoryRelatedByIdexpensecategory->setExpensecategoryRelatedByExpensecategoryDependency(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Expensecategory is new, it will return
     * an empty collection; or if this Expensecategory has previously
     * been saved, it will retrieve related ExpensecategorysRelatedByIdexpensecategory from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Expensecategory.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Expensecategory[] List of Expensecategory objects
     */
    public function getExpensecategorysRelatedByIdexpensecategoryJoinCompany($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ExpensecategoryQuery::create(null, $criteria);
        $query->joinWith('Company', $join_behavior);

        return $this->getExpensecategorysRelatedByIdexpensecategory($query, $con);
    }

    /**
     * Clears out the collExpenseitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expensecategory The current object (for fluent API support)
     * @see        addExpenseitems()
     */
    public function clearExpenseitems()
    {
        $this->collExpenseitems = null; // important to set this to null since that means it is uninitialized
        $this->collExpenseitemsPartial = null;

        return $this;
    }

    /**
     * reset is the collExpenseitems collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpenseitems($v = true)
    {
        $this->collExpenseitemsPartial = $v;
    }

    /**
     * Initializes the collExpenseitems collection.
     *
     * By default this just sets the collExpenseitems collection to an empty array (like clearcollExpenseitems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpenseitems($overrideExisting = true)
    {
        if (null !== $this->collExpenseitems && !$overrideExisting) {
            return;
        }
        $this->collExpenseitems = new PropelObjectCollection();
        $this->collExpenseitems->setModel('Expenseitem');
    }

    /**
     * Gets an array of Expenseitem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expensecategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expenseitem[] List of Expenseitem objects
     * @throws PropelException
     */
    public function getExpenseitems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpenseitemsPartial && !$this->isNew();
        if (null === $this->collExpenseitems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpenseitems) {
                // return empty collection
                $this->initExpenseitems();
            } else {
                $collExpenseitems = ExpenseitemQuery::create(null, $criteria)
                    ->filterByExpensecategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpenseitemsPartial && count($collExpenseitems)) {
                      $this->initExpenseitems(false);

                      foreach ($collExpenseitems as $obj) {
                        if (false == $this->collExpenseitems->contains($obj)) {
                          $this->collExpenseitems->append($obj);
                        }
                      }

                      $this->collExpenseitemsPartial = true;
                    }

                    $collExpenseitems->getInternalIterator()->rewind();

                    return $collExpenseitems;
                }

                if ($partial && $this->collExpenseitems) {
                    foreach ($this->collExpenseitems as $obj) {
                        if ($obj->isNew()) {
                            $collExpenseitems[] = $obj;
                        }
                    }
                }

                $this->collExpenseitems = $collExpenseitems;
                $this->collExpenseitemsPartial = false;
            }
        }

        return $this->collExpenseitems;
    }

    /**
     * Sets a collection of Expenseitem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expenseitems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expensecategory The current object (for fluent API support)
     */
    public function setExpenseitems(PropelCollection $expenseitems, PropelPDO $con = null)
    {
        $expenseitemsToDelete = $this->getExpenseitems(new Criteria(), $con)->diff($expenseitems);


        $this->expenseitemsScheduledForDeletion = $expenseitemsToDelete;

        foreach ($expenseitemsToDelete as $expenseitemRemoved) {
            $expenseitemRemoved->setExpensecategory(null);
        }

        $this->collExpenseitems = null;
        foreach ($expenseitems as $expenseitem) {
            $this->addExpenseitem($expenseitem);
        }

        $this->collExpenseitems = $expenseitems;
        $this->collExpenseitemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expenseitem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expenseitem objects.
     * @throws PropelException
     */
    public function countExpenseitems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpenseitemsPartial && !$this->isNew();
        if (null === $this->collExpenseitems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpenseitems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpenseitems());
            }
            $query = ExpenseitemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpensecategory($this)
                ->count($con);
        }

        return count($this->collExpenseitems);
    }

    /**
     * Method called to associate a Expenseitem object to this object
     * through the Expenseitem foreign key attribute.
     *
     * @param    Expenseitem $l Expenseitem
     * @return Expensecategory The current object (for fluent API support)
     */
    public function addExpenseitem(Expenseitem $l)
    {
        if ($this->collExpenseitems === null) {
            $this->initExpenseitems();
            $this->collExpenseitemsPartial = true;
        }

        if (!in_array($l, $this->collExpenseitems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpenseitem($l);

            if ($this->expenseitemsScheduledForDeletion and $this->expenseitemsScheduledForDeletion->contains($l)) {
                $this->expenseitemsScheduledForDeletion->remove($this->expenseitemsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expenseitem $expenseitem The expenseitem object to add.
     */
    protected function doAddExpenseitem($expenseitem)
    {
        $this->collExpenseitems[]= $expenseitem;
        $expenseitem->setExpensecategory($this);
    }

    /**
     * @param	Expenseitem $expenseitem The expenseitem object to remove.
     * @return Expensecategory The current object (for fluent API support)
     */
    public function removeExpenseitem($expenseitem)
    {
        if ($this->getExpenseitems()->contains($expenseitem)) {
            $this->collExpenseitems->remove($this->collExpenseitems->search($expenseitem));
            if (null === $this->expenseitemsScheduledForDeletion) {
                $this->expenseitemsScheduledForDeletion = clone $this->collExpenseitems;
                $this->expenseitemsScheduledForDeletion->clear();
            }
            $this->expenseitemsScheduledForDeletion[]= clone $expenseitem;
            $expenseitem->setExpensecategory(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idexpensecategory = null;
        $this->idcompany = null;
        $this->expensecategory_dependency = null;
        $this->expensecategory_name = null;
        $this->expensecategory_description = null;
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
            if ($this->collExpensecategorysRelatedByIdexpensecategory) {
                foreach ($this->collExpensecategorysRelatedByIdexpensecategory as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpenseitems) {
                foreach ($this->collExpenseitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aExpensecategoryRelatedByExpensecategoryDependency instanceof Persistent) {
              $this->aExpensecategoryRelatedByExpensecategoryDependency->clearAllReferences($deep);
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collExpensecategorysRelatedByIdexpensecategory instanceof PropelCollection) {
            $this->collExpensecategorysRelatedByIdexpensecategory->clearIterator();
        }
        $this->collExpensecategorysRelatedByIdexpensecategory = null;
        if ($this->collExpenseitems instanceof PropelCollection) {
            $this->collExpenseitems->clearIterator();
        }
        $this->collExpenseitems = null;
        $this->aExpensecategoryRelatedByExpensecategoryDependency = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ExpensecategoryPeer::DEFAULT_STRING_FORMAT);
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
