<?php


/**
 * Base class that represents a row from the 'department' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseDepartment extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DepartmentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DepartmentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the iddepartment field.
     * @var        int
     */
    protected $iddepartment;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the department_name field.
     * @var        string
     */
    protected $department_name;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|Departmentleader[] Collection to store aggregation of Departmentleader objects.
     */
    protected $collDepartmentleaders;
    protected $collDepartmentleadersPartial;

    /**
     * @var        PropelObjectCollection|Departmentmember[] Collection to store aggregation of Departmentmember objects.
     */
    protected $collDepartmentmembers;
    protected $collDepartmentmembersPartial;

    /**
     * @var        PropelObjectCollection|Project[] Collection to store aggregation of Project objects.
     */
    protected $collProjects;
    protected $collProjectsPartial;

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
    protected $departmentleadersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $departmentmembersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $projectsScheduledForDeletion = null;

    /**
     * Get the [iddepartment] column value.
     *
     * @return int
     */
    public function getIddepartment()
    {

        return $this->iddepartment;
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
     * Get the [department_name] column value.
     *
     * @return string
     */
    public function getDepartmentName()
    {

        return $this->department_name;
    }

    /**
     * Set the value of [iddepartment] column.
     *
     * @param  int $v new value
     * @return Department The current object (for fluent API support)
     */
    public function setIddepartment($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iddepartment !== $v) {
            $this->iddepartment = $v;
            $this->modifiedColumns[] = DepartmentPeer::IDDEPARTMENT;
        }


        return $this;
    } // setIddepartment()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Department The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = DepartmentPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [department_name] column.
     *
     * @param  string $v new value
     * @return Department The current object (for fluent API support)
     */
    public function setDepartmentName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->department_name !== $v) {
            $this->department_name = $v;
            $this->modifiedColumns[] = DepartmentPeer::DEPARTMENT_NAME;
        }


        return $this;
    } // setDepartmentName()

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

            $this->iddepartment = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->department_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = DepartmentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Department object", $e);
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
            $con = Propel::getConnection(DepartmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DepartmentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->collDepartmentleaders = null;

            $this->collDepartmentmembers = null;

            $this->collProjects = null;

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
            $con = Propel::getConnection(DepartmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DepartmentQuery::create()
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
            $con = Propel::getConnection(DepartmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DepartmentPeer::addInstanceToPool($this);
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

            if ($this->departmentleadersScheduledForDeletion !== null) {
                if (!$this->departmentleadersScheduledForDeletion->isEmpty()) {
                    DepartmentleaderQuery::create()
                        ->filterByPrimaryKeys($this->departmentleadersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->departmentleadersScheduledForDeletion = null;
                }
            }

            if ($this->collDepartmentleaders !== null) {
                foreach ($this->collDepartmentleaders as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->departmentmembersScheduledForDeletion !== null) {
                if (!$this->departmentmembersScheduledForDeletion->isEmpty()) {
                    DepartmentmemberQuery::create()
                        ->filterByPrimaryKeys($this->departmentmembersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->departmentmembersScheduledForDeletion = null;
                }
            }

            if ($this->collDepartmentmembers !== null) {
                foreach ($this->collDepartmentmembers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectsScheduledForDeletion !== null) {
                if (!$this->projectsScheduledForDeletion->isEmpty()) {
                    ProjectQuery::create()
                        ->filterByPrimaryKeys($this->projectsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectsScheduledForDeletion = null;
                }
            }

            if ($this->collProjects !== null) {
                foreach ($this->collProjects as $referrerFK) {
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

        $this->modifiedColumns[] = DepartmentPeer::IDDEPARTMENT;
        if (null !== $this->iddepartment) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DepartmentPeer::IDDEPARTMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DepartmentPeer::IDDEPARTMENT)) {
            $modifiedColumns[':p' . $index++]  = '`iddepartment`';
        }
        if ($this->isColumnModified(DepartmentPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(DepartmentPeer::DEPARTMENT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`department_name`';
        }

        $sql = sprintf(
            'INSERT INTO `department` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`iddepartment`':
                        $stmt->bindValue($identifier, $this->iddepartment, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`department_name`':
                        $stmt->bindValue($identifier, $this->department_name, PDO::PARAM_STR);
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
        $this->setIddepartment($pk);

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


            if (($retval = DepartmentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDepartmentleaders !== null) {
                    foreach ($this->collDepartmentleaders as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDepartmentmembers !== null) {
                    foreach ($this->collDepartmentmembers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProjects !== null) {
                    foreach ($this->collProjects as $referrerFK) {
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
        $pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIddepartment();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getDepartmentName();
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
        if (isset($alreadyDumpedObjects['Department'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Department'][$this->getPrimaryKey()] = true;
        $keys = DepartmentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIddepartment(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getDepartmentName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDepartmentleaders) {
                $result['Departmentleaders'] = $this->collDepartmentleaders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDepartmentmembers) {
                $result['Departmentmembers'] = $this->collDepartmentmembers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjects) {
                $result['Projects'] = $this->collProjects->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIddepartment($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setDepartmentName($value);
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
        $keys = DepartmentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIddepartment($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDepartmentName($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DepartmentPeer::DATABASE_NAME);

        if ($this->isColumnModified(DepartmentPeer::IDDEPARTMENT)) $criteria->add(DepartmentPeer::IDDEPARTMENT, $this->iddepartment);
        if ($this->isColumnModified(DepartmentPeer::IDCOMPANY)) $criteria->add(DepartmentPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(DepartmentPeer::DEPARTMENT_NAME)) $criteria->add(DepartmentPeer::DEPARTMENT_NAME, $this->department_name);

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
        $criteria = new Criteria(DepartmentPeer::DATABASE_NAME);
        $criteria->add(DepartmentPeer::IDDEPARTMENT, $this->iddepartment);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIddepartment();
    }

    /**
     * Generic method to set the primary key (iddepartment column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIddepartment($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIddepartment();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Department (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setDepartmentName($this->getDepartmentName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDepartmentleaders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDepartmentleader($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDepartmentmembers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDepartmentmember($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjects() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProject($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIddepartment(NULL); // this is a auto-increment column, so set to default value
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
     * @return Department Clone of current object.
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
     * @return DepartmentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DepartmentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Department The current object (for fluent API support)
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
            $v->addDepartment($this);
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
                $this->aCompany->addDepartments($this);
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
        if ('Departmentleader' == $relationName) {
            $this->initDepartmentleaders();
        }
        if ('Departmentmember' == $relationName) {
            $this->initDepartmentmembers();
        }
        if ('Project' == $relationName) {
            $this->initProjects();
        }
    }

    /**
     * Clears out the collDepartmentleaders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Department The current object (for fluent API support)
     * @see        addDepartmentleaders()
     */
    public function clearDepartmentleaders()
    {
        $this->collDepartmentleaders = null; // important to set this to null since that means it is uninitialized
        $this->collDepartmentleadersPartial = null;

        return $this;
    }

    /**
     * reset is the collDepartmentleaders collection loaded partially
     *
     * @return void
     */
    public function resetPartialDepartmentleaders($v = true)
    {
        $this->collDepartmentleadersPartial = $v;
    }

    /**
     * Initializes the collDepartmentleaders collection.
     *
     * By default this just sets the collDepartmentleaders collection to an empty array (like clearcollDepartmentleaders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDepartmentleaders($overrideExisting = true)
    {
        if (null !== $this->collDepartmentleaders && !$overrideExisting) {
            return;
        }
        $this->collDepartmentleaders = new PropelObjectCollection();
        $this->collDepartmentleaders->setModel('Departmentleader');
    }

    /**
     * Gets an array of Departmentleader objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Department is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Departmentleader[] List of Departmentleader objects
     * @throws PropelException
     */
    public function getDepartmentleaders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentleadersPartial && !$this->isNew();
        if (null === $this->collDepartmentleaders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDepartmentleaders) {
                // return empty collection
                $this->initDepartmentleaders();
            } else {
                $collDepartmentleaders = DepartmentleaderQuery::create(null, $criteria)
                    ->filterByDepartment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDepartmentleadersPartial && count($collDepartmentleaders)) {
                      $this->initDepartmentleaders(false);

                      foreach ($collDepartmentleaders as $obj) {
                        if (false == $this->collDepartmentleaders->contains($obj)) {
                          $this->collDepartmentleaders->append($obj);
                        }
                      }

                      $this->collDepartmentleadersPartial = true;
                    }

                    $collDepartmentleaders->getInternalIterator()->rewind();

                    return $collDepartmentleaders;
                }

                if ($partial && $this->collDepartmentleaders) {
                    foreach ($this->collDepartmentleaders as $obj) {
                        if ($obj->isNew()) {
                            $collDepartmentleaders[] = $obj;
                        }
                    }
                }

                $this->collDepartmentleaders = $collDepartmentleaders;
                $this->collDepartmentleadersPartial = false;
            }
        }

        return $this->collDepartmentleaders;
    }

    /**
     * Sets a collection of Departmentleader objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $departmentleaders A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Department The current object (for fluent API support)
     */
    public function setDepartmentleaders(PropelCollection $departmentleaders, PropelPDO $con = null)
    {
        $departmentleadersToDelete = $this->getDepartmentleaders(new Criteria(), $con)->diff($departmentleaders);


        $this->departmentleadersScheduledForDeletion = $departmentleadersToDelete;

        foreach ($departmentleadersToDelete as $departmentleaderRemoved) {
            $departmentleaderRemoved->setDepartment(null);
        }

        $this->collDepartmentleaders = null;
        foreach ($departmentleaders as $departmentleader) {
            $this->addDepartmentleader($departmentleader);
        }

        $this->collDepartmentleaders = $departmentleaders;
        $this->collDepartmentleadersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Departmentleader objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Departmentleader objects.
     * @throws PropelException
     */
    public function countDepartmentleaders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentleadersPartial && !$this->isNew();
        if (null === $this->collDepartmentleaders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDepartmentleaders) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDepartmentleaders());
            }
            $query = DepartmentleaderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDepartment($this)
                ->count($con);
        }

        return count($this->collDepartmentleaders);
    }

    /**
     * Method called to associate a Departmentleader object to this object
     * through the Departmentleader foreign key attribute.
     *
     * @param    Departmentleader $l Departmentleader
     * @return Department The current object (for fluent API support)
     */
    public function addDepartmentleader(Departmentleader $l)
    {
        if ($this->collDepartmentleaders === null) {
            $this->initDepartmentleaders();
            $this->collDepartmentleadersPartial = true;
        }

        if (!in_array($l, $this->collDepartmentleaders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDepartmentleader($l);

            if ($this->departmentleadersScheduledForDeletion and $this->departmentleadersScheduledForDeletion->contains($l)) {
                $this->departmentleadersScheduledForDeletion->remove($this->departmentleadersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Departmentleader $departmentleader The departmentleader object to add.
     */
    protected function doAddDepartmentleader($departmentleader)
    {
        $this->collDepartmentleaders[]= $departmentleader;
        $departmentleader->setDepartment($this);
    }

    /**
     * @param	Departmentleader $departmentleader The departmentleader object to remove.
     * @return Department The current object (for fluent API support)
     */
    public function removeDepartmentleader($departmentleader)
    {
        if ($this->getDepartmentleaders()->contains($departmentleader)) {
            $this->collDepartmentleaders->remove($this->collDepartmentleaders->search($departmentleader));
            if (null === $this->departmentleadersScheduledForDeletion) {
                $this->departmentleadersScheduledForDeletion = clone $this->collDepartmentleaders;
                $this->departmentleadersScheduledForDeletion->clear();
            }
            $this->departmentleadersScheduledForDeletion[]= clone $departmentleader;
            $departmentleader->setDepartment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Department is new, it will return
     * an empty collection; or if this Department has previously
     * been saved, it will retrieve related Departmentleaders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Department.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Departmentleader[] List of Departmentleader objects
     */
    public function getDepartmentleadersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DepartmentleaderQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getDepartmentleaders($query, $con);
    }

    /**
     * Clears out the collDepartmentmembers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Department The current object (for fluent API support)
     * @see        addDepartmentmembers()
     */
    public function clearDepartmentmembers()
    {
        $this->collDepartmentmembers = null; // important to set this to null since that means it is uninitialized
        $this->collDepartmentmembersPartial = null;

        return $this;
    }

    /**
     * reset is the collDepartmentmembers collection loaded partially
     *
     * @return void
     */
    public function resetPartialDepartmentmembers($v = true)
    {
        $this->collDepartmentmembersPartial = $v;
    }

    /**
     * Initializes the collDepartmentmembers collection.
     *
     * By default this just sets the collDepartmentmembers collection to an empty array (like clearcollDepartmentmembers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDepartmentmembers($overrideExisting = true)
    {
        if (null !== $this->collDepartmentmembers && !$overrideExisting) {
            return;
        }
        $this->collDepartmentmembers = new PropelObjectCollection();
        $this->collDepartmentmembers->setModel('Departmentmember');
    }

    /**
     * Gets an array of Departmentmember objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Department is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Departmentmember[] List of Departmentmember objects
     * @throws PropelException
     */
    public function getDepartmentmembers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentmembersPartial && !$this->isNew();
        if (null === $this->collDepartmentmembers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDepartmentmembers) {
                // return empty collection
                $this->initDepartmentmembers();
            } else {
                $collDepartmentmembers = DepartmentmemberQuery::create(null, $criteria)
                    ->filterByDepartment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDepartmentmembersPartial && count($collDepartmentmembers)) {
                      $this->initDepartmentmembers(false);

                      foreach ($collDepartmentmembers as $obj) {
                        if (false == $this->collDepartmentmembers->contains($obj)) {
                          $this->collDepartmentmembers->append($obj);
                        }
                      }

                      $this->collDepartmentmembersPartial = true;
                    }

                    $collDepartmentmembers->getInternalIterator()->rewind();

                    return $collDepartmentmembers;
                }

                if ($partial && $this->collDepartmentmembers) {
                    foreach ($this->collDepartmentmembers as $obj) {
                        if ($obj->isNew()) {
                            $collDepartmentmembers[] = $obj;
                        }
                    }
                }

                $this->collDepartmentmembers = $collDepartmentmembers;
                $this->collDepartmentmembersPartial = false;
            }
        }

        return $this->collDepartmentmembers;
    }

    /**
     * Sets a collection of Departmentmember objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $departmentmembers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Department The current object (for fluent API support)
     */
    public function setDepartmentmembers(PropelCollection $departmentmembers, PropelPDO $con = null)
    {
        $departmentmembersToDelete = $this->getDepartmentmembers(new Criteria(), $con)->diff($departmentmembers);


        $this->departmentmembersScheduledForDeletion = $departmentmembersToDelete;

        foreach ($departmentmembersToDelete as $departmentmemberRemoved) {
            $departmentmemberRemoved->setDepartment(null);
        }

        $this->collDepartmentmembers = null;
        foreach ($departmentmembers as $departmentmember) {
            $this->addDepartmentmember($departmentmember);
        }

        $this->collDepartmentmembers = $departmentmembers;
        $this->collDepartmentmembersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Departmentmember objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Departmentmember objects.
     * @throws PropelException
     */
    public function countDepartmentmembers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentmembersPartial && !$this->isNew();
        if (null === $this->collDepartmentmembers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDepartmentmembers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDepartmentmembers());
            }
            $query = DepartmentmemberQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDepartment($this)
                ->count($con);
        }

        return count($this->collDepartmentmembers);
    }

    /**
     * Method called to associate a Departmentmember object to this object
     * through the Departmentmember foreign key attribute.
     *
     * @param    Departmentmember $l Departmentmember
     * @return Department The current object (for fluent API support)
     */
    public function addDepartmentmember(Departmentmember $l)
    {
        if ($this->collDepartmentmembers === null) {
            $this->initDepartmentmembers();
            $this->collDepartmentmembersPartial = true;
        }

        if (!in_array($l, $this->collDepartmentmembers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDepartmentmember($l);

            if ($this->departmentmembersScheduledForDeletion and $this->departmentmembersScheduledForDeletion->contains($l)) {
                $this->departmentmembersScheduledForDeletion->remove($this->departmentmembersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Departmentmember $departmentmember The departmentmember object to add.
     */
    protected function doAddDepartmentmember($departmentmember)
    {
        $this->collDepartmentmembers[]= $departmentmember;
        $departmentmember->setDepartment($this);
    }

    /**
     * @param	Departmentmember $departmentmember The departmentmember object to remove.
     * @return Department The current object (for fluent API support)
     */
    public function removeDepartmentmember($departmentmember)
    {
        if ($this->getDepartmentmembers()->contains($departmentmember)) {
            $this->collDepartmentmembers->remove($this->collDepartmentmembers->search($departmentmember));
            if (null === $this->departmentmembersScheduledForDeletion) {
                $this->departmentmembersScheduledForDeletion = clone $this->collDepartmentmembers;
                $this->departmentmembersScheduledForDeletion->clear();
            }
            $this->departmentmembersScheduledForDeletion[]= clone $departmentmember;
            $departmentmember->setDepartment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Department is new, it will return
     * an empty collection; or if this Department has previously
     * been saved, it will retrieve related Departmentmembers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Department.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Departmentmember[] List of Departmentmember objects
     */
    public function getDepartmentmembersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DepartmentmemberQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getDepartmentmembers($query, $con);
    }

    /**
     * Clears out the collProjects collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Department The current object (for fluent API support)
     * @see        addProjects()
     */
    public function clearProjects()
    {
        $this->collProjects = null; // important to set this to null since that means it is uninitialized
        $this->collProjectsPartial = null;

        return $this;
    }

    /**
     * reset is the collProjects collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjects($v = true)
    {
        $this->collProjectsPartial = $v;
    }

    /**
     * Initializes the collProjects collection.
     *
     * By default this just sets the collProjects collection to an empty array (like clearcollProjects());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjects($overrideExisting = true)
    {
        if (null !== $this->collProjects && !$overrideExisting) {
            return;
        }
        $this->collProjects = new PropelObjectCollection();
        $this->collProjects->setModel('Project');
    }

    /**
     * Gets an array of Project objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Department is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Project[] List of Project objects
     * @throws PropelException
     */
    public function getProjects($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectsPartial && !$this->isNew();
        if (null === $this->collProjects || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjects) {
                // return empty collection
                $this->initProjects();
            } else {
                $collProjects = ProjectQuery::create(null, $criteria)
                    ->filterByDepartment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectsPartial && count($collProjects)) {
                      $this->initProjects(false);

                      foreach ($collProjects as $obj) {
                        if (false == $this->collProjects->contains($obj)) {
                          $this->collProjects->append($obj);
                        }
                      }

                      $this->collProjectsPartial = true;
                    }

                    $collProjects->getInternalIterator()->rewind();

                    return $collProjects;
                }

                if ($partial && $this->collProjects) {
                    foreach ($this->collProjects as $obj) {
                        if ($obj->isNew()) {
                            $collProjects[] = $obj;
                        }
                    }
                }

                $this->collProjects = $collProjects;
                $this->collProjectsPartial = false;
            }
        }

        return $this->collProjects;
    }

    /**
     * Sets a collection of Project objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projects A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Department The current object (for fluent API support)
     */
    public function setProjects(PropelCollection $projects, PropelPDO $con = null)
    {
        $projectsToDelete = $this->getProjects(new Criteria(), $con)->diff($projects);


        $this->projectsScheduledForDeletion = $projectsToDelete;

        foreach ($projectsToDelete as $projectRemoved) {
            $projectRemoved->setDepartment(null);
        }

        $this->collProjects = null;
        foreach ($projects as $project) {
            $this->addProject($project);
        }

        $this->collProjects = $projects;
        $this->collProjectsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Project objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Project objects.
     * @throws PropelException
     */
    public function countProjects(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectsPartial && !$this->isNew();
        if (null === $this->collProjects || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjects) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjects());
            }
            $query = ProjectQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDepartment($this)
                ->count($con);
        }

        return count($this->collProjects);
    }

    /**
     * Method called to associate a Project object to this object
     * through the Project foreign key attribute.
     *
     * @param    Project $l Project
     * @return Department The current object (for fluent API support)
     */
    public function addProject(Project $l)
    {
        if ($this->collProjects === null) {
            $this->initProjects();
            $this->collProjectsPartial = true;
        }

        if (!in_array($l, $this->collProjects->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProject($l);

            if ($this->projectsScheduledForDeletion and $this->projectsScheduledForDeletion->contains($l)) {
                $this->projectsScheduledForDeletion->remove($this->projectsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Project $project The project object to add.
     */
    protected function doAddProject($project)
    {
        $this->collProjects[]= $project;
        $project->setDepartment($this);
    }

    /**
     * @param	Project $project The project object to remove.
     * @return Department The current object (for fluent API support)
     */
    public function removeProject($project)
    {
        if ($this->getProjects()->contains($project)) {
            $this->collProjects->remove($this->collProjects->search($project));
            if (null === $this->projectsScheduledForDeletion) {
                $this->projectsScheduledForDeletion = clone $this->collProjects;
                $this->projectsScheduledForDeletion->clear();
            }
            $this->projectsScheduledForDeletion[]= clone $project;
            $project->setDepartment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Department is new, it will return
     * an empty collection; or if this Department has previously
     * been saved, it will retrieve related Projects from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Department.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Project[] List of Project objects
     */
    public function getProjectsJoinProjectRelatedByProjectDependency($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectQuery::create(null, $criteria);
        $query->joinWith('ProjectRelatedByProjectDependency', $join_behavior);

        return $this->getProjects($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->iddepartment = null;
        $this->idcompany = null;
        $this->department_name = null;
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
            if ($this->collDepartmentleaders) {
                foreach ($this->collDepartmentleaders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDepartmentmembers) {
                foreach ($this->collDepartmentmembers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjects) {
                foreach ($this->collProjects as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDepartmentleaders instanceof PropelCollection) {
            $this->collDepartmentleaders->clearIterator();
        }
        $this->collDepartmentleaders = null;
        if ($this->collDepartmentmembers instanceof PropelCollection) {
            $this->collDepartmentmembers->clearIterator();
        }
        $this->collDepartmentmembers = null;
        if ($this->collProjects instanceof PropelCollection) {
            $this->collProjects->clearIterator();
        }
        $this->collProjects = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DepartmentPeer::DEFAULT_STRING_FORMAT);
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
