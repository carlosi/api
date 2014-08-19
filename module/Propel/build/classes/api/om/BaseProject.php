<?php


/**
 * Base class that represents a row from the 'project' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProject extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproject field.
     * @var        int
     */
    protected $idproject;

    /**
     * The value for the iddepartament field.
     * @var        int
     */
    protected $iddepartament;

    /**
     * The value for the project_dependency field.
     * @var        int
     */
    protected $project_dependency;

    /**
     * The value for the project_name field.
     * @var        string
     */
    protected $project_name;

    /**
     * @var        Project
     */
    protected $aProjectRelatedByProjectDependency;

    /**
     * @var        Department
     */
    protected $aDepartment;

    /**
     * @var        PropelObjectCollection|Project[] Collection to store aggregation of Project objects.
     */
    protected $collProjectsRelatedByIdproject;
    protected $collProjectsRelatedByIdprojectPartial;

    /**
     * @var        PropelObjectCollection|Projectactivity[] Collection to store aggregation of Projectactivity objects.
     */
    protected $collProjectactivitys;
    protected $collProjectactivitysPartial;

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
    protected $projectsRelatedByIdprojectScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $projectactivitysScheduledForDeletion = null;

    /**
     * Get the [idproject] column value.
     *
     * @return int
     */
    public function getIdproject()
    {

        return $this->idproject;
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
     * Get the [project_dependency] column value.
     *
     * @return int
     */
    public function getProjectDependency()
    {

        return $this->project_dependency;
    }

    /**
     * Get the [project_name] column value.
     *
     * @return string
     */
    public function getProjectName()
    {

        return $this->project_name;
    }

    /**
     * Set the value of [idproject] column.
     *
     * @param  int $v new value
     * @return Project The current object (for fluent API support)
     */
    public function setIdproject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproject !== $v) {
            $this->idproject = $v;
            $this->modifiedColumns[] = ProjectPeer::IDPROJECT;
        }


        return $this;
    } // setIdproject()

    /**
     * Set the value of [iddepartament] column.
     *
     * @param  int $v new value
     * @return Project The current object (for fluent API support)
     */
    public function setIddepartament($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iddepartament !== $v) {
            $this->iddepartament = $v;
            $this->modifiedColumns[] = ProjectPeer::IDDEPARTAMENT;
        }

        if ($this->aDepartment !== null && $this->aDepartment->getIddepartment() !== $v) {
            $this->aDepartment = null;
        }


        return $this;
    } // setIddepartament()

    /**
     * Set the value of [project_dependency] column.
     *
     * @param  int $v new value
     * @return Project The current object (for fluent API support)
     */
    public function setProjectDependency($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->project_dependency !== $v) {
            $this->project_dependency = $v;
            $this->modifiedColumns[] = ProjectPeer::PROJECT_DEPENDENCY;
        }

        if ($this->aProjectRelatedByProjectDependency !== null && $this->aProjectRelatedByProjectDependency->getIdproject() !== $v) {
            $this->aProjectRelatedByProjectDependency = null;
        }


        return $this;
    } // setProjectDependency()

    /**
     * Set the value of [project_name] column.
     *
     * @param  string $v new value
     * @return Project The current object (for fluent API support)
     */
    public function setProjectName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->project_name !== $v) {
            $this->project_name = $v;
            $this->modifiedColumns[] = ProjectPeer::PROJECT_NAME;
        }


        return $this;
    } // setProjectName()

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

            $this->idproject = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iddepartament = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->project_dependency = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->project_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProjectPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Project object", $e);
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

        if ($this->aDepartment !== null && $this->iddepartament !== $this->aDepartment->getIddepartment()) {
            $this->aDepartment = null;
        }
        if ($this->aProjectRelatedByProjectDependency !== null && $this->project_dependency !== $this->aProjectRelatedByProjectDependency->getIdproject()) {
            $this->aProjectRelatedByProjectDependency = null;
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
            $con = Propel::getConnection(ProjectPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProjectRelatedByProjectDependency = null;
            $this->aDepartment = null;
            $this->collProjectsRelatedByIdproject = null;

            $this->collProjectactivitys = null;

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
            $con = Propel::getConnection(ProjectPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectQuery::create()
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
            $con = Propel::getConnection(ProjectPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProjectPeer::addInstanceToPool($this);
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

            if ($this->aProjectRelatedByProjectDependency !== null) {
                if ($this->aProjectRelatedByProjectDependency->isModified() || $this->aProjectRelatedByProjectDependency->isNew()) {
                    $affectedRows += $this->aProjectRelatedByProjectDependency->save($con);
                }
                $this->setProjectRelatedByProjectDependency($this->aProjectRelatedByProjectDependency);
            }

            if ($this->aDepartment !== null) {
                if ($this->aDepartment->isModified() || $this->aDepartment->isNew()) {
                    $affectedRows += $this->aDepartment->save($con);
                }
                $this->setDepartment($this->aDepartment);
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

            if ($this->projectsRelatedByIdprojectScheduledForDeletion !== null) {
                if (!$this->projectsRelatedByIdprojectScheduledForDeletion->isEmpty()) {
                    ProjectQuery::create()
                        ->filterByPrimaryKeys($this->projectsRelatedByIdprojectScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectsRelatedByIdprojectScheduledForDeletion = null;
                }
            }

            if ($this->collProjectsRelatedByIdproject !== null) {
                foreach ($this->collProjectsRelatedByIdproject as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectactivitysScheduledForDeletion !== null) {
                if (!$this->projectactivitysScheduledForDeletion->isEmpty()) {
                    ProjectactivityQuery::create()
                        ->filterByPrimaryKeys($this->projectactivitysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectactivitysScheduledForDeletion = null;
                }
            }

            if ($this->collProjectactivitys !== null) {
                foreach ($this->collProjectactivitys as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectPeer::IDPROJECT;
        if (null !== $this->idproject) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectPeer::IDPROJECT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectPeer::IDPROJECT)) {
            $modifiedColumns[':p' . $index++]  = '`idproject`';
        }
        if ($this->isColumnModified(ProjectPeer::IDDEPARTAMENT)) {
            $modifiedColumns[':p' . $index++]  = '`iddepartament`';
        }
        if ($this->isColumnModified(ProjectPeer::PROJECT_DEPENDENCY)) {
            $modifiedColumns[':p' . $index++]  = '`project_dependency`';
        }
        if ($this->isColumnModified(ProjectPeer::PROJECT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`project_name`';
        }

        $sql = sprintf(
            'INSERT INTO `project` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproject`':
                        $stmt->bindValue($identifier, $this->idproject, PDO::PARAM_INT);
                        break;
                    case '`iddepartament`':
                        $stmt->bindValue($identifier, $this->iddepartament, PDO::PARAM_INT);
                        break;
                    case '`project_dependency`':
                        $stmt->bindValue($identifier, $this->project_dependency, PDO::PARAM_INT);
                        break;
                    case '`project_name`':
                        $stmt->bindValue($identifier, $this->project_name, PDO::PARAM_STR);
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
        $this->setIdproject($pk);

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

            if ($this->aProjectRelatedByProjectDependency !== null) {
                if (!$this->aProjectRelatedByProjectDependency->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProjectRelatedByProjectDependency->getValidationFailures());
                }
            }

            if ($this->aDepartment !== null) {
                if (!$this->aDepartment->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
                }
            }


            if (($retval = ProjectPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProjectsRelatedByIdproject !== null) {
                    foreach ($this->collProjectsRelatedByIdproject as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProjectactivitys !== null) {
                    foreach ($this->collProjectactivitys as $referrerFK) {
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
        $pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproject();
                break;
            case 1:
                return $this->getIddepartament();
                break;
            case 2:
                return $this->getProjectDependency();
                break;
            case 3:
                return $this->getProjectName();
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
        if (isset($alreadyDumpedObjects['Project'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Project'][$this->getPrimaryKey()] = true;
        $keys = ProjectPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproject(),
            $keys[1] => $this->getIddepartament(),
            $keys[2] => $this->getProjectDependency(),
            $keys[3] => $this->getProjectName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProjectRelatedByProjectDependency) {
                $result['ProjectRelatedByProjectDependency'] = $this->aProjectRelatedByProjectDependency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDepartment) {
                $result['Department'] = $this->aDepartment->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProjectsRelatedByIdproject) {
                $result['ProjectsRelatedByIdproject'] = $this->collProjectsRelatedByIdproject->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectactivitys) {
                $result['Projectactivitys'] = $this->collProjectactivitys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproject($value);
                break;
            case 1:
                $this->setIddepartament($value);
                break;
            case 2:
                $this->setProjectDependency($value);
                break;
            case 3:
                $this->setProjectName($value);
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
        $keys = ProjectPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproject($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIddepartament($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProjectDependency($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProjectName($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectPeer::IDPROJECT)) $criteria->add(ProjectPeer::IDPROJECT, $this->idproject);
        if ($this->isColumnModified(ProjectPeer::IDDEPARTAMENT)) $criteria->add(ProjectPeer::IDDEPARTAMENT, $this->iddepartament);
        if ($this->isColumnModified(ProjectPeer::PROJECT_DEPENDENCY)) $criteria->add(ProjectPeer::PROJECT_DEPENDENCY, $this->project_dependency);
        if ($this->isColumnModified(ProjectPeer::PROJECT_NAME)) $criteria->add(ProjectPeer::PROJECT_NAME, $this->project_name);

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
        $criteria = new Criteria(ProjectPeer::DATABASE_NAME);
        $criteria->add(ProjectPeer::IDPROJECT, $this->idproject);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproject();
    }

    /**
     * Generic method to set the primary key (idproject column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproject($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproject();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Project (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIddepartament($this->getIddepartament());
        $copyObj->setProjectDependency($this->getProjectDependency());
        $copyObj->setProjectName($this->getProjectName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProjectsRelatedByIdproject() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectRelatedByIdproject($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectactivitys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectactivity($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproject(NULL); // this is a auto-increment column, so set to default value
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
     * @return Project Clone of current object.
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
     * @return ProjectPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Project object.
     *
     * @param                  Project $v
     * @return Project The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProjectRelatedByProjectDependency(Project $v = null)
    {
        if ($v === null) {
            $this->setProjectDependency(NULL);
        } else {
            $this->setProjectDependency($v->getIdproject());
        }

        $this->aProjectRelatedByProjectDependency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Project object, it will not be re-added.
        if ($v !== null) {
            $v->addProjectRelatedByIdproject($this);
        }


        return $this;
    }


    /**
     * Get the associated Project object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Project The associated Project object.
     * @throws PropelException
     */
    public function getProjectRelatedByProjectDependency(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProjectRelatedByProjectDependency === null && ($this->project_dependency !== null) && $doQuery) {
            $this->aProjectRelatedByProjectDependency = ProjectQuery::create()->findPk($this->project_dependency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProjectRelatedByProjectDependency->addProjectsRelatedByIdproject($this);
             */
        }

        return $this->aProjectRelatedByProjectDependency;
    }

    /**
     * Declares an association between this object and a Department object.
     *
     * @param                  Department $v
     * @return Project The current object (for fluent API support)
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
            $v->addProject($this);
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
                $this->aDepartment->addProjects($this);
             */
        }

        return $this->aDepartment;
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
        if ('ProjectRelatedByIdproject' == $relationName) {
            $this->initProjectsRelatedByIdproject();
        }
        if ('Projectactivity' == $relationName) {
            $this->initProjectactivitys();
        }
    }

    /**
     * Clears out the collProjectsRelatedByIdproject collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Project The current object (for fluent API support)
     * @see        addProjectsRelatedByIdproject()
     */
    public function clearProjectsRelatedByIdproject()
    {
        $this->collProjectsRelatedByIdproject = null; // important to set this to null since that means it is uninitialized
        $this->collProjectsRelatedByIdprojectPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectsRelatedByIdproject collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectsRelatedByIdproject($v = true)
    {
        $this->collProjectsRelatedByIdprojectPartial = $v;
    }

    /**
     * Initializes the collProjectsRelatedByIdproject collection.
     *
     * By default this just sets the collProjectsRelatedByIdproject collection to an empty array (like clearcollProjectsRelatedByIdproject());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectsRelatedByIdproject($overrideExisting = true)
    {
        if (null !== $this->collProjectsRelatedByIdproject && !$overrideExisting) {
            return;
        }
        $this->collProjectsRelatedByIdproject = new PropelObjectCollection();
        $this->collProjectsRelatedByIdproject->setModel('Project');
    }

    /**
     * Gets an array of Project objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Project is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Project[] List of Project objects
     * @throws PropelException
     */
    public function getProjectsRelatedByIdproject($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectsRelatedByIdprojectPartial && !$this->isNew();
        if (null === $this->collProjectsRelatedByIdproject || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectsRelatedByIdproject) {
                // return empty collection
                $this->initProjectsRelatedByIdproject();
            } else {
                $collProjectsRelatedByIdproject = ProjectQuery::create(null, $criteria)
                    ->filterByProjectRelatedByProjectDependency($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectsRelatedByIdprojectPartial && count($collProjectsRelatedByIdproject)) {
                      $this->initProjectsRelatedByIdproject(false);

                      foreach ($collProjectsRelatedByIdproject as $obj) {
                        if (false == $this->collProjectsRelatedByIdproject->contains($obj)) {
                          $this->collProjectsRelatedByIdproject->append($obj);
                        }
                      }

                      $this->collProjectsRelatedByIdprojectPartial = true;
                    }

                    $collProjectsRelatedByIdproject->getInternalIterator()->rewind();

                    return $collProjectsRelatedByIdproject;
                }

                if ($partial && $this->collProjectsRelatedByIdproject) {
                    foreach ($this->collProjectsRelatedByIdproject as $obj) {
                        if ($obj->isNew()) {
                            $collProjectsRelatedByIdproject[] = $obj;
                        }
                    }
                }

                $this->collProjectsRelatedByIdproject = $collProjectsRelatedByIdproject;
                $this->collProjectsRelatedByIdprojectPartial = false;
            }
        }

        return $this->collProjectsRelatedByIdproject;
    }

    /**
     * Sets a collection of ProjectRelatedByIdproject objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectsRelatedByIdproject A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Project The current object (for fluent API support)
     */
    public function setProjectsRelatedByIdproject(PropelCollection $projectsRelatedByIdproject, PropelPDO $con = null)
    {
        $projectsRelatedByIdprojectToDelete = $this->getProjectsRelatedByIdproject(new Criteria(), $con)->diff($projectsRelatedByIdproject);


        $this->projectsRelatedByIdprojectScheduledForDeletion = $projectsRelatedByIdprojectToDelete;

        foreach ($projectsRelatedByIdprojectToDelete as $projectRelatedByIdprojectRemoved) {
            $projectRelatedByIdprojectRemoved->setProjectRelatedByProjectDependency(null);
        }

        $this->collProjectsRelatedByIdproject = null;
        foreach ($projectsRelatedByIdproject as $projectRelatedByIdproject) {
            $this->addProjectRelatedByIdproject($projectRelatedByIdproject);
        }

        $this->collProjectsRelatedByIdproject = $projectsRelatedByIdproject;
        $this->collProjectsRelatedByIdprojectPartial = false;

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
    public function countProjectsRelatedByIdproject(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectsRelatedByIdprojectPartial && !$this->isNew();
        if (null === $this->collProjectsRelatedByIdproject || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectsRelatedByIdproject) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectsRelatedByIdproject());
            }
            $query = ProjectQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjectRelatedByProjectDependency($this)
                ->count($con);
        }

        return count($this->collProjectsRelatedByIdproject);
    }

    /**
     * Method called to associate a Project object to this object
     * through the Project foreign key attribute.
     *
     * @param    Project $l Project
     * @return Project The current object (for fluent API support)
     */
    public function addProjectRelatedByIdproject(Project $l)
    {
        if ($this->collProjectsRelatedByIdproject === null) {
            $this->initProjectsRelatedByIdproject();
            $this->collProjectsRelatedByIdprojectPartial = true;
        }

        if (!in_array($l, $this->collProjectsRelatedByIdproject->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectRelatedByIdproject($l);

            if ($this->projectsRelatedByIdprojectScheduledForDeletion and $this->projectsRelatedByIdprojectScheduledForDeletion->contains($l)) {
                $this->projectsRelatedByIdprojectScheduledForDeletion->remove($this->projectsRelatedByIdprojectScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProjectRelatedByIdproject $projectRelatedByIdproject The projectRelatedByIdproject object to add.
     */
    protected function doAddProjectRelatedByIdproject($projectRelatedByIdproject)
    {
        $this->collProjectsRelatedByIdproject[]= $projectRelatedByIdproject;
        $projectRelatedByIdproject->setProjectRelatedByProjectDependency($this);
    }

    /**
     * @param	ProjectRelatedByIdproject $projectRelatedByIdproject The projectRelatedByIdproject object to remove.
     * @return Project The current object (for fluent API support)
     */
    public function removeProjectRelatedByIdproject($projectRelatedByIdproject)
    {
        if ($this->getProjectsRelatedByIdproject()->contains($projectRelatedByIdproject)) {
            $this->collProjectsRelatedByIdproject->remove($this->collProjectsRelatedByIdproject->search($projectRelatedByIdproject));
            if (null === $this->projectsRelatedByIdprojectScheduledForDeletion) {
                $this->projectsRelatedByIdprojectScheduledForDeletion = clone $this->collProjectsRelatedByIdproject;
                $this->projectsRelatedByIdprojectScheduledForDeletion->clear();
            }
            $this->projectsRelatedByIdprojectScheduledForDeletion[]= clone $projectRelatedByIdproject;
            $projectRelatedByIdproject->setProjectRelatedByProjectDependency(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Project is new, it will return
     * an empty collection; or if this Project has previously
     * been saved, it will retrieve related ProjectsRelatedByIdproject from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Project.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Project[] List of Project objects
     */
    public function getProjectsRelatedByIdprojectJoinDepartment($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectQuery::create(null, $criteria);
        $query->joinWith('Department', $join_behavior);

        return $this->getProjectsRelatedByIdproject($query, $con);
    }

    /**
     * Clears out the collProjectactivitys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Project The current object (for fluent API support)
     * @see        addProjectactivitys()
     */
    public function clearProjectactivitys()
    {
        $this->collProjectactivitys = null; // important to set this to null since that means it is uninitialized
        $this->collProjectactivitysPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectactivitys collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectactivitys($v = true)
    {
        $this->collProjectactivitysPartial = $v;
    }

    /**
     * Initializes the collProjectactivitys collection.
     *
     * By default this just sets the collProjectactivitys collection to an empty array (like clearcollProjectactivitys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectactivitys($overrideExisting = true)
    {
        if (null !== $this->collProjectactivitys && !$overrideExisting) {
            return;
        }
        $this->collProjectactivitys = new PropelObjectCollection();
        $this->collProjectactivitys->setModel('Projectactivity');
    }

    /**
     * Gets an array of Projectactivity objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Project is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Projectactivity[] List of Projectactivity objects
     * @throws PropelException
     */
    public function getProjectactivitys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitysPartial && !$this->isNew();
        if (null === $this->collProjectactivitys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectactivitys) {
                // return empty collection
                $this->initProjectactivitys();
            } else {
                $collProjectactivitys = ProjectactivityQuery::create(null, $criteria)
                    ->filterByProject($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectactivitysPartial && count($collProjectactivitys)) {
                      $this->initProjectactivitys(false);

                      foreach ($collProjectactivitys as $obj) {
                        if (false == $this->collProjectactivitys->contains($obj)) {
                          $this->collProjectactivitys->append($obj);
                        }
                      }

                      $this->collProjectactivitysPartial = true;
                    }

                    $collProjectactivitys->getInternalIterator()->rewind();

                    return $collProjectactivitys;
                }

                if ($partial && $this->collProjectactivitys) {
                    foreach ($this->collProjectactivitys as $obj) {
                        if ($obj->isNew()) {
                            $collProjectactivitys[] = $obj;
                        }
                    }
                }

                $this->collProjectactivitys = $collProjectactivitys;
                $this->collProjectactivitysPartial = false;
            }
        }

        return $this->collProjectactivitys;
    }

    /**
     * Sets a collection of Projectactivity objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectactivitys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Project The current object (for fluent API support)
     */
    public function setProjectactivitys(PropelCollection $projectactivitys, PropelPDO $con = null)
    {
        $projectactivitysToDelete = $this->getProjectactivitys(new Criteria(), $con)->diff($projectactivitys);


        $this->projectactivitysScheduledForDeletion = $projectactivitysToDelete;

        foreach ($projectactivitysToDelete as $projectactivityRemoved) {
            $projectactivityRemoved->setProject(null);
        }

        $this->collProjectactivitys = null;
        foreach ($projectactivitys as $projectactivity) {
            $this->addProjectactivity($projectactivity);
        }

        $this->collProjectactivitys = $projectactivitys;
        $this->collProjectactivitysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projectactivity objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Projectactivity objects.
     * @throws PropelException
     */
    public function countProjectactivitys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitysPartial && !$this->isNew();
        if (null === $this->collProjectactivitys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectactivitys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectactivitys());
            }
            $query = ProjectactivityQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProject($this)
                ->count($con);
        }

        return count($this->collProjectactivitys);
    }

    /**
     * Method called to associate a Projectactivity object to this object
     * through the Projectactivity foreign key attribute.
     *
     * @param    Projectactivity $l Projectactivity
     * @return Project The current object (for fluent API support)
     */
    public function addProjectactivity(Projectactivity $l)
    {
        if ($this->collProjectactivitys === null) {
            $this->initProjectactivitys();
            $this->collProjectactivitysPartial = true;
        }

        if (!in_array($l, $this->collProjectactivitys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectactivity($l);

            if ($this->projectactivitysScheduledForDeletion and $this->projectactivitysScheduledForDeletion->contains($l)) {
                $this->projectactivitysScheduledForDeletion->remove($this->projectactivitysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Projectactivity $projectactivity The projectactivity object to add.
     */
    protected function doAddProjectactivity($projectactivity)
    {
        $this->collProjectactivitys[]= $projectactivity;
        $projectactivity->setProject($this);
    }

    /**
     * @param	Projectactivity $projectactivity The projectactivity object to remove.
     * @return Project The current object (for fluent API support)
     */
    public function removeProjectactivity($projectactivity)
    {
        if ($this->getProjectactivitys()->contains($projectactivity)) {
            $this->collProjectactivitys->remove($this->collProjectactivitys->search($projectactivity));
            if (null === $this->projectactivitysScheduledForDeletion) {
                $this->projectactivitysScheduledForDeletion = clone $this->collProjectactivitys;
                $this->projectactivitysScheduledForDeletion->clear();
            }
            $this->projectactivitysScheduledForDeletion[]= clone $projectactivity;
            $projectactivity->setProject(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproject = null;
        $this->iddepartament = null;
        $this->project_dependency = null;
        $this->project_name = null;
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
            if ($this->collProjectsRelatedByIdproject) {
                foreach ($this->collProjectsRelatedByIdproject as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectactivitys) {
                foreach ($this->collProjectactivitys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProjectRelatedByProjectDependency instanceof Persistent) {
              $this->aProjectRelatedByProjectDependency->clearAllReferences($deep);
            }
            if ($this->aDepartment instanceof Persistent) {
              $this->aDepartment->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProjectsRelatedByIdproject instanceof PropelCollection) {
            $this->collProjectsRelatedByIdproject->clearIterator();
        }
        $this->collProjectsRelatedByIdproject = null;
        if ($this->collProjectactivitys instanceof PropelCollection) {
            $this->collProjectactivitys->clearIterator();
        }
        $this->collProjectactivitys = null;
        $this->aProjectRelatedByProjectDependency = null;
        $this->aDepartment = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectPeer::DEFAULT_STRING_FORMAT);
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
