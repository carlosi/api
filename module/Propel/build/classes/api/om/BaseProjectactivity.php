<?php


/**
 * Base class that represents a row from the 'projectactivity' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProjectactivity extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProjectactivityPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProjectactivityPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idprojectactivity field.
     * @var        int
     */
    protected $idprojectactivity;

    /**
     * The value for the idproject field.
     * @var        int
     */
    protected $idproject;

    /**
     * The value for the projectactivity_title field.
     * @var        string
     */
    protected $projectactivity_title;

    /**
     * The value for the projectactivity_description field.
     * @var        string
     */
    protected $projectactivity_description;

    /**
     * The value for the projectactivity_status field.
     * Note: this column has a database default value of: 'pending'
     * @var        string
     */
    protected $projectactivity_status;

    /**
     * The value for the projectactivity_dateinit field.
     * @var        string
     */
    protected $projectactivity_dateinit;

    /**
     * The value for the projectactivity_datetofinish field.
     * @var        string
     */
    protected $projectactivity_datetofinish;

    /**
     * @var        Project
     */
    protected $aProject;

    /**
     * @var        PropelObjectCollection|Projectactivitypost[] Collection to store aggregation of Projectactivitypost objects.
     */
    protected $collProjectactivityposts;
    protected $collProjectactivitypostsPartial;

    /**
     * @var        PropelObjectCollection|Projectactivityuser[] Collection to store aggregation of Projectactivityuser objects.
     */
    protected $collProjectactivityusers;
    protected $collProjectactivityusersPartial;

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
    protected $projectactivitypostsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $projectactivityusersScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->projectactivity_status = 'pending';
    }

    /**
     * Initializes internal state of BaseProjectactivity object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idprojectactivity] column value.
     *
     * @return int
     */
    public function getIdprojectactivity()
    {

        return $this->idprojectactivity;
    }

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
     * Get the [projectactivity_title] column value.
     *
     * @return string
     */
    public function getProjectactivityTitle()
    {

        return $this->projectactivity_title;
    }

    /**
     * Get the [projectactivity_description] column value.
     *
     * @return string
     */
    public function getProjectactivityDescription()
    {

        return $this->projectactivity_description;
    }

    /**
     * Get the [projectactivity_status] column value.
     *
     * @return string
     */
    public function getProjectactivityStatus()
    {

        return $this->projectactivity_status;
    }

    /**
     * Get the [optionally formatted] temporal [projectactivity_dateinit] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProjectactivityDateinit($format = 'Y-m-d H:i:s')
    {
        if ($this->projectactivity_dateinit === null) {
            return null;
        }

        if ($this->projectactivity_dateinit === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->projectactivity_dateinit);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->projectactivity_dateinit, true), $x);
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
     * Get the [optionally formatted] temporal [projectactivity_datetofinish] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProjectactivityDatetofinish($format = 'Y-m-d H:i:s')
    {
        if ($this->projectactivity_datetofinish === null) {
            return null;
        }

        if ($this->projectactivity_datetofinish === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->projectactivity_datetofinish);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->projectactivity_datetofinish, true), $x);
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
     * Set the value of [idprojectactivity] column.
     *
     * @param  int $v new value
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setIdprojectactivity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idprojectactivity !== $v) {
            $this->idprojectactivity = $v;
            $this->modifiedColumns[] = ProjectactivityPeer::IDPROJECTACTIVITY;
        }


        return $this;
    } // setIdprojectactivity()

    /**
     * Set the value of [idproject] column.
     *
     * @param  int $v new value
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setIdproject($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproject !== $v) {
            $this->idproject = $v;
            $this->modifiedColumns[] = ProjectactivityPeer::IDPROJECT;
        }

        if ($this->aProject !== null && $this->aProject->getIdproject() !== $v) {
            $this->aProject = null;
        }


        return $this;
    } // setIdproject()

    /**
     * Set the value of [projectactivity_title] column.
     *
     * @param  string $v new value
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->projectactivity_title !== $v) {
            $this->projectactivity_title = $v;
            $this->modifiedColumns[] = ProjectactivityPeer::PROJECTACTIVITY_TITLE;
        }


        return $this;
    } // setProjectactivityTitle()

    /**
     * Set the value of [projectactivity_description] column.
     *
     * @param  string $v new value
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->projectactivity_description !== $v) {
            $this->projectactivity_description = $v;
            $this->modifiedColumns[] = ProjectactivityPeer::PROJECTACTIVITY_DESCRIPTION;
        }


        return $this;
    } // setProjectactivityDescription()

    /**
     * Set the value of [projectactivity_status] column.
     *
     * @param  string $v new value
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->projectactivity_status !== $v) {
            $this->projectactivity_status = $v;
            $this->modifiedColumns[] = ProjectactivityPeer::PROJECTACTIVITY_STATUS;
        }


        return $this;
    } // setProjectactivityStatus()

    /**
     * Sets the value of [projectactivity_dateinit] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityDateinit($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->projectactivity_dateinit !== null || $dt !== null) {
            $currentDateAsString = ($this->projectactivity_dateinit !== null && $tmpDt = new DateTime($this->projectactivity_dateinit)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->projectactivity_dateinit = $newDateAsString;
                $this->modifiedColumns[] = ProjectactivityPeer::PROJECTACTIVITY_DATEINIT;
            }
        } // if either are not null


        return $this;
    } // setProjectactivityDateinit()

    /**
     * Sets the value of [projectactivity_datetofinish] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityDatetofinish($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->projectactivity_datetofinish !== null || $dt !== null) {
            $currentDateAsString = ($this->projectactivity_datetofinish !== null && $tmpDt = new DateTime($this->projectactivity_datetofinish)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->projectactivity_datetofinish = $newDateAsString;
                $this->modifiedColumns[] = ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH;
            }
        } // if either are not null


        return $this;
    } // setProjectactivityDatetofinish()

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
            if ($this->projectactivity_status !== 'pending') {
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

            $this->idprojectactivity = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproject = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->projectactivity_title = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->projectactivity_description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->projectactivity_status = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->projectactivity_dateinit = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->projectactivity_datetofinish = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProjectactivityPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Projectactivity object", $e);
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

        if ($this->aProject !== null && $this->idproject !== $this->aProject->getIdproject()) {
            $this->aProject = null;
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
            $con = Propel::getConnection(ProjectactivityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProjectactivityPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProject = null;
            $this->collProjectactivityposts = null;

            $this->collProjectactivityusers = null;

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
            $con = Propel::getConnection(ProjectactivityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProjectactivityQuery::create()
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
            $con = Propel::getConnection(ProjectactivityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProjectactivityPeer::addInstanceToPool($this);
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

            if ($this->aProject !== null) {
                if ($this->aProject->isModified() || $this->aProject->isNew()) {
                    $affectedRows += $this->aProject->save($con);
                }
                $this->setProject($this->aProject);
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

            if ($this->projectactivitypostsScheduledForDeletion !== null) {
                if (!$this->projectactivitypostsScheduledForDeletion->isEmpty()) {
                    ProjectactivitypostQuery::create()
                        ->filterByPrimaryKeys($this->projectactivitypostsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectactivitypostsScheduledForDeletion = null;
                }
            }

            if ($this->collProjectactivityposts !== null) {
                foreach ($this->collProjectactivityposts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectactivityusersScheduledForDeletion !== null) {
                if (!$this->projectactivityusersScheduledForDeletion->isEmpty()) {
                    ProjectactivityuserQuery::create()
                        ->filterByPrimaryKeys($this->projectactivityusersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectactivityusersScheduledForDeletion = null;
                }
            }

            if ($this->collProjectactivityusers !== null) {
                foreach ($this->collProjectactivityusers as $referrerFK) {
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

        $this->modifiedColumns[] = ProjectactivityPeer::IDPROJECTACTIVITY;
        if (null !== $this->idprojectactivity) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectactivityPeer::IDPROJECTACTIVITY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectactivityPeer::IDPROJECTACTIVITY)) {
            $modifiedColumns[':p' . $index++]  = '`idprojectactivity`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::IDPROJECT)) {
            $modifiedColumns[':p' . $index++]  = '`idproject`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`projectactivity_title`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`projectactivity_description`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`projectactivity_status`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT)) {
            $modifiedColumns[':p' . $index++]  = '`projectactivity_dateinit`';
        }
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH)) {
            $modifiedColumns[':p' . $index++]  = '`projectactivity_datetofinish`';
        }

        $sql = sprintf(
            'INSERT INTO `projectactivity` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idprojectactivity`':
                        $stmt->bindValue($identifier, $this->idprojectactivity, PDO::PARAM_INT);
                        break;
                    case '`idproject`':
                        $stmt->bindValue($identifier, $this->idproject, PDO::PARAM_INT);
                        break;
                    case '`projectactivity_title`':
                        $stmt->bindValue($identifier, $this->projectactivity_title, PDO::PARAM_STR);
                        break;
                    case '`projectactivity_description`':
                        $stmt->bindValue($identifier, $this->projectactivity_description, PDO::PARAM_STR);
                        break;
                    case '`projectactivity_status`':
                        $stmt->bindValue($identifier, $this->projectactivity_status, PDO::PARAM_STR);
                        break;
                    case '`projectactivity_dateinit`':
                        $stmt->bindValue($identifier, $this->projectactivity_dateinit, PDO::PARAM_STR);
                        break;
                    case '`projectactivity_datetofinish`':
                        $stmt->bindValue($identifier, $this->projectactivity_datetofinish, PDO::PARAM_STR);
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
        $this->setIdprojectactivity($pk);

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

            if ($this->aProject !== null) {
                if (!$this->aProject->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProject->getValidationFailures());
                }
            }


            if (($retval = ProjectactivityPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProjectactivityposts !== null) {
                    foreach ($this->collProjectactivityposts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProjectactivityusers !== null) {
                    foreach ($this->collProjectactivityusers as $referrerFK) {
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
        $pos = ProjectactivityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdprojectactivity();
                break;
            case 1:
                return $this->getIdproject();
                break;
            case 2:
                return $this->getProjectactivityTitle();
                break;
            case 3:
                return $this->getProjectactivityDescription();
                break;
            case 4:
                return $this->getProjectactivityStatus();
                break;
            case 5:
                return $this->getProjectactivityDateinit();
                break;
            case 6:
                return $this->getProjectactivityDatetofinish();
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
        if (isset($alreadyDumpedObjects['Projectactivity'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Projectactivity'][$this->getPrimaryKey()] = true;
        $keys = ProjectactivityPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdprojectactivity(),
            $keys[1] => $this->getIdproject(),
            $keys[2] => $this->getProjectactivityTitle(),
            $keys[3] => $this->getProjectactivityDescription(),
            $keys[4] => $this->getProjectactivityStatus(),
            $keys[5] => $this->getProjectactivityDateinit(),
            $keys[6] => $this->getProjectactivityDatetofinish(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProject) {
                $result['Project'] = $this->aProject->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProjectactivityposts) {
                $result['Projectactivityposts'] = $this->collProjectactivityposts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectactivityusers) {
                $result['Projectactivityusers'] = $this->collProjectactivityusers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProjectactivityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdprojectactivity($value);
                break;
            case 1:
                $this->setIdproject($value);
                break;
            case 2:
                $this->setProjectactivityTitle($value);
                break;
            case 3:
                $this->setProjectactivityDescription($value);
                break;
            case 4:
                $this->setProjectactivityStatus($value);
                break;
            case 5:
                $this->setProjectactivityDateinit($value);
                break;
            case 6:
                $this->setProjectactivityDatetofinish($value);
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
        $keys = ProjectactivityPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdprojectactivity($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproject($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProjectactivityTitle($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProjectactivityDescription($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProjectactivityStatus($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProjectactivityDateinit($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setProjectactivityDatetofinish($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectactivityPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProjectactivityPeer::IDPROJECTACTIVITY)) $criteria->add(ProjectactivityPeer::IDPROJECTACTIVITY, $this->idprojectactivity);
        if ($this->isColumnModified(ProjectactivityPeer::IDPROJECT)) $criteria->add(ProjectactivityPeer::IDPROJECT, $this->idproject);
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_TITLE)) $criteria->add(ProjectactivityPeer::PROJECTACTIVITY_TITLE, $this->projectactivity_title);
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DESCRIPTION)) $criteria->add(ProjectactivityPeer::PROJECTACTIVITY_DESCRIPTION, $this->projectactivity_description);
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_STATUS)) $criteria->add(ProjectactivityPeer::PROJECTACTIVITY_STATUS, $this->projectactivity_status);
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT)) $criteria->add(ProjectactivityPeer::PROJECTACTIVITY_DATEINIT, $this->projectactivity_dateinit);
        if ($this->isColumnModified(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH)) $criteria->add(ProjectactivityPeer::PROJECTACTIVITY_DATETOFINISH, $this->projectactivity_datetofinish);

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
        $criteria = new Criteria(ProjectactivityPeer::DATABASE_NAME);
        $criteria->add(ProjectactivityPeer::IDPROJECTACTIVITY, $this->idprojectactivity);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdprojectactivity();
    }

    /**
     * Generic method to set the primary key (idprojectactivity column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdprojectactivity($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdprojectactivity();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Projectactivity (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproject($this->getIdproject());
        $copyObj->setProjectactivityTitle($this->getProjectactivityTitle());
        $copyObj->setProjectactivityDescription($this->getProjectactivityDescription());
        $copyObj->setProjectactivityStatus($this->getProjectactivityStatus());
        $copyObj->setProjectactivityDateinit($this->getProjectactivityDateinit());
        $copyObj->setProjectactivityDatetofinish($this->getProjectactivityDatetofinish());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProjectactivityposts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectactivitypost($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectactivityusers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectactivityuser($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdprojectactivity(NULL); // this is a auto-increment column, so set to default value
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
     * @return Projectactivity Clone of current object.
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
     * @return ProjectactivityPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProjectactivityPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Project object.
     *
     * @param                  Project $v
     * @return Projectactivity The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProject(Project $v = null)
    {
        if ($v === null) {
            $this->setIdproject(NULL);
        } else {
            $this->setIdproject($v->getIdproject());
        }

        $this->aProject = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Project object, it will not be re-added.
        if ($v !== null) {
            $v->addProjectactivity($this);
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
    public function getProject(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProject === null && ($this->idproject !== null) && $doQuery) {
            $this->aProject = ProjectQuery::create()->findPk($this->idproject, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProject->addProjectactivitys($this);
             */
        }

        return $this->aProject;
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
        if ('Projectactivitypost' == $relationName) {
            $this->initProjectactivityposts();
        }
        if ('Projectactivityuser' == $relationName) {
            $this->initProjectactivityusers();
        }
    }

    /**
     * Clears out the collProjectactivityposts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Projectactivity The current object (for fluent API support)
     * @see        addProjectactivityposts()
     */
    public function clearProjectactivityposts()
    {
        $this->collProjectactivityposts = null; // important to set this to null since that means it is uninitialized
        $this->collProjectactivitypostsPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectactivityposts collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectactivityposts($v = true)
    {
        $this->collProjectactivitypostsPartial = $v;
    }

    /**
     * Initializes the collProjectactivityposts collection.
     *
     * By default this just sets the collProjectactivityposts collection to an empty array (like clearcollProjectactivityposts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectactivityposts($overrideExisting = true)
    {
        if (null !== $this->collProjectactivityposts && !$overrideExisting) {
            return;
        }
        $this->collProjectactivityposts = new PropelObjectCollection();
        $this->collProjectactivityposts->setModel('Projectactivitypost');
    }

    /**
     * Gets an array of Projectactivitypost objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Projectactivity is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Projectactivitypost[] List of Projectactivitypost objects
     * @throws PropelException
     */
    public function getProjectactivityposts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitypostsPartial && !$this->isNew();
        if (null === $this->collProjectactivityposts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityposts) {
                // return empty collection
                $this->initProjectactivityposts();
            } else {
                $collProjectactivityposts = ProjectactivitypostQuery::create(null, $criteria)
                    ->filterByProjectactivity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectactivitypostsPartial && count($collProjectactivityposts)) {
                      $this->initProjectactivityposts(false);

                      foreach ($collProjectactivityposts as $obj) {
                        if (false == $this->collProjectactivityposts->contains($obj)) {
                          $this->collProjectactivityposts->append($obj);
                        }
                      }

                      $this->collProjectactivitypostsPartial = true;
                    }

                    $collProjectactivityposts->getInternalIterator()->rewind();

                    return $collProjectactivityposts;
                }

                if ($partial && $this->collProjectactivityposts) {
                    foreach ($this->collProjectactivityposts as $obj) {
                        if ($obj->isNew()) {
                            $collProjectactivityposts[] = $obj;
                        }
                    }
                }

                $this->collProjectactivityposts = $collProjectactivityposts;
                $this->collProjectactivitypostsPartial = false;
            }
        }

        return $this->collProjectactivityposts;
    }

    /**
     * Sets a collection of Projectactivitypost objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectactivityposts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityposts(PropelCollection $projectactivityposts, PropelPDO $con = null)
    {
        $projectactivitypostsToDelete = $this->getProjectactivityposts(new Criteria(), $con)->diff($projectactivityposts);


        $this->projectactivitypostsScheduledForDeletion = $projectactivitypostsToDelete;

        foreach ($projectactivitypostsToDelete as $projectactivitypostRemoved) {
            $projectactivitypostRemoved->setProjectactivity(null);
        }

        $this->collProjectactivityposts = null;
        foreach ($projectactivityposts as $projectactivitypost) {
            $this->addProjectactivitypost($projectactivitypost);
        }

        $this->collProjectactivityposts = $projectactivityposts;
        $this->collProjectactivitypostsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projectactivitypost objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Projectactivitypost objects.
     * @throws PropelException
     */
    public function countProjectactivityposts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitypostsPartial && !$this->isNew();
        if (null === $this->collProjectactivityposts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityposts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectactivityposts());
            }
            $query = ProjectactivitypostQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjectactivity($this)
                ->count($con);
        }

        return count($this->collProjectactivityposts);
    }

    /**
     * Method called to associate a Projectactivitypost object to this object
     * through the Projectactivitypost foreign key attribute.
     *
     * @param    Projectactivitypost $l Projectactivitypost
     * @return Projectactivity The current object (for fluent API support)
     */
    public function addProjectactivitypost(Projectactivitypost $l)
    {
        if ($this->collProjectactivityposts === null) {
            $this->initProjectactivityposts();
            $this->collProjectactivitypostsPartial = true;
        }

        if (!in_array($l, $this->collProjectactivityposts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectactivitypost($l);

            if ($this->projectactivitypostsScheduledForDeletion and $this->projectactivitypostsScheduledForDeletion->contains($l)) {
                $this->projectactivitypostsScheduledForDeletion->remove($this->projectactivitypostsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Projectactivitypost $projectactivitypost The projectactivitypost object to add.
     */
    protected function doAddProjectactivitypost($projectactivitypost)
    {
        $this->collProjectactivityposts[]= $projectactivitypost;
        $projectactivitypost->setProjectactivity($this);
    }

    /**
     * @param	Projectactivitypost $projectactivitypost The projectactivitypost object to remove.
     * @return Projectactivity The current object (for fluent API support)
     */
    public function removeProjectactivitypost($projectactivitypost)
    {
        if ($this->getProjectactivityposts()->contains($projectactivitypost)) {
            $this->collProjectactivityposts->remove($this->collProjectactivityposts->search($projectactivitypost));
            if (null === $this->projectactivitypostsScheduledForDeletion) {
                $this->projectactivitypostsScheduledForDeletion = clone $this->collProjectactivityposts;
                $this->projectactivitypostsScheduledForDeletion->clear();
            }
            $this->projectactivitypostsScheduledForDeletion[]= clone $projectactivitypost;
            $projectactivitypost->setProjectactivity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projectactivity is new, it will return
     * an empty collection; or if this Projectactivity has previously
     * been saved, it will retrieve related Projectactivityposts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projectactivity.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Projectactivitypost[] List of Projectactivitypost objects
     */
    public function getProjectactivitypostsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectactivitypostQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getProjectactivityposts($query, $con);
    }

    /**
     * Clears out the collProjectactivityusers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Projectactivity The current object (for fluent API support)
     * @see        addProjectactivityusers()
     */
    public function clearProjectactivityusers()
    {
        $this->collProjectactivityusers = null; // important to set this to null since that means it is uninitialized
        $this->collProjectactivityusersPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectactivityusers collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectactivityusers($v = true)
    {
        $this->collProjectactivityusersPartial = $v;
    }

    /**
     * Initializes the collProjectactivityusers collection.
     *
     * By default this just sets the collProjectactivityusers collection to an empty array (like clearcollProjectactivityusers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectactivityusers($overrideExisting = true)
    {
        if (null !== $this->collProjectactivityusers && !$overrideExisting) {
            return;
        }
        $this->collProjectactivityusers = new PropelObjectCollection();
        $this->collProjectactivityusers->setModel('Projectactivityuser');
    }

    /**
     * Gets an array of Projectactivityuser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Projectactivity is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Projectactivityuser[] List of Projectactivityuser objects
     * @throws PropelException
     */
    public function getProjectactivityusers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivityusersPartial && !$this->isNew();
        if (null === $this->collProjectactivityusers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityusers) {
                // return empty collection
                $this->initProjectactivityusers();
            } else {
                $collProjectactivityusers = ProjectactivityuserQuery::create(null, $criteria)
                    ->filterByProjectactivity($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectactivityusersPartial && count($collProjectactivityusers)) {
                      $this->initProjectactivityusers(false);

                      foreach ($collProjectactivityusers as $obj) {
                        if (false == $this->collProjectactivityusers->contains($obj)) {
                          $this->collProjectactivityusers->append($obj);
                        }
                      }

                      $this->collProjectactivityusersPartial = true;
                    }

                    $collProjectactivityusers->getInternalIterator()->rewind();

                    return $collProjectactivityusers;
                }

                if ($partial && $this->collProjectactivityusers) {
                    foreach ($this->collProjectactivityusers as $obj) {
                        if ($obj->isNew()) {
                            $collProjectactivityusers[] = $obj;
                        }
                    }
                }

                $this->collProjectactivityusers = $collProjectactivityusers;
                $this->collProjectactivityusersPartial = false;
            }
        }

        return $this->collProjectactivityusers;
    }

    /**
     * Sets a collection of Projectactivityuser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectactivityusers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Projectactivity The current object (for fluent API support)
     */
    public function setProjectactivityusers(PropelCollection $projectactivityusers, PropelPDO $con = null)
    {
        $projectactivityusersToDelete = $this->getProjectactivityusers(new Criteria(), $con)->diff($projectactivityusers);


        $this->projectactivityusersScheduledForDeletion = $projectactivityusersToDelete;

        foreach ($projectactivityusersToDelete as $projectactivityuserRemoved) {
            $projectactivityuserRemoved->setProjectactivity(null);
        }

        $this->collProjectactivityusers = null;
        foreach ($projectactivityusers as $projectactivityuser) {
            $this->addProjectactivityuser($projectactivityuser);
        }

        $this->collProjectactivityusers = $projectactivityusers;
        $this->collProjectactivityusersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projectactivityuser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Projectactivityuser objects.
     * @throws PropelException
     */
    public function countProjectactivityusers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivityusersPartial && !$this->isNew();
        if (null === $this->collProjectactivityusers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityusers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectactivityusers());
            }
            $query = ProjectactivityuserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjectactivity($this)
                ->count($con);
        }

        return count($this->collProjectactivityusers);
    }

    /**
     * Method called to associate a Projectactivityuser object to this object
     * through the Projectactivityuser foreign key attribute.
     *
     * @param    Projectactivityuser $l Projectactivityuser
     * @return Projectactivity The current object (for fluent API support)
     */
    public function addProjectactivityuser(Projectactivityuser $l)
    {
        if ($this->collProjectactivityusers === null) {
            $this->initProjectactivityusers();
            $this->collProjectactivityusersPartial = true;
        }

        if (!in_array($l, $this->collProjectactivityusers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectactivityuser($l);

            if ($this->projectactivityusersScheduledForDeletion and $this->projectactivityusersScheduledForDeletion->contains($l)) {
                $this->projectactivityusersScheduledForDeletion->remove($this->projectactivityusersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Projectactivityuser $projectactivityuser The projectactivityuser object to add.
     */
    protected function doAddProjectactivityuser($projectactivityuser)
    {
        $this->collProjectactivityusers[]= $projectactivityuser;
        $projectactivityuser->setProjectactivity($this);
    }

    /**
     * @param	Projectactivityuser $projectactivityuser The projectactivityuser object to remove.
     * @return Projectactivity The current object (for fluent API support)
     */
    public function removeProjectactivityuser($projectactivityuser)
    {
        if ($this->getProjectactivityusers()->contains($projectactivityuser)) {
            $this->collProjectactivityusers->remove($this->collProjectactivityusers->search($projectactivityuser));
            if (null === $this->projectactivityusersScheduledForDeletion) {
                $this->projectactivityusersScheduledForDeletion = clone $this->collProjectactivityusers;
                $this->projectactivityusersScheduledForDeletion->clear();
            }
            $this->projectactivityusersScheduledForDeletion[]= clone $projectactivityuser;
            $projectactivityuser->setProjectactivity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projectactivity is new, it will return
     * an empty collection; or if this Projectactivity has previously
     * been saved, it will retrieve related Projectactivityusers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projectactivity.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Projectactivityuser[] List of Projectactivityuser objects
     */
    public function getProjectactivityusersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectactivityuserQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getProjectactivityusers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idprojectactivity = null;
        $this->idproject = null;
        $this->projectactivity_title = null;
        $this->projectactivity_description = null;
        $this->projectactivity_status = null;
        $this->projectactivity_dateinit = null;
        $this->projectactivity_datetofinish = null;
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
            if ($this->collProjectactivityposts) {
                foreach ($this->collProjectactivityposts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectactivityusers) {
                foreach ($this->collProjectactivityusers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProject instanceof Persistent) {
              $this->aProject->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProjectactivityposts instanceof PropelCollection) {
            $this->collProjectactivityposts->clearIterator();
        }
        $this->collProjectactivityposts = null;
        if ($this->collProjectactivityusers instanceof PropelCollection) {
            $this->collProjectactivityusers->clearIterator();
        }
        $this->collProjectactivityusers = null;
        $this->aProject = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectactivityPeer::DEFAULT_STRING_FORMAT);
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
