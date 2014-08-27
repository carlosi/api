<?php


/**
 * Base class that represents a row from the 'triggerprospection' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseTriggerprospection extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'TriggerprospectionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TriggerprospectionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idtriggerprospection field.
     * @var        int
     */
    protected $idtriggerprospection;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the triggerprospection_date field.
     * @var        string
     */
    protected $triggerprospection_date;

    /**
     * The value for the triggerprospection_by field.
     * Note: this column has a database default value of: 'user'
     * @var        string
     */
    protected $triggerprospection_by;

    /**
     * @var        Client
     */
    protected $aClient;

    /**
     * @var        PropelObjectCollection|Prospectioninterest[] Collection to store aggregation of Prospectioninterest objects.
     */
    protected $collProspectioninterests;
    protected $collProspectioninterestsPartial;

    /**
     * @var        PropelObjectCollection|Quote[] Collection to store aggregation of Quote objects.
     */
    protected $collQuotes;
    protected $collQuotesPartial;

    /**
     * @var        PropelObjectCollection|Triggerprospectionnote[] Collection to store aggregation of Triggerprospectionnote objects.
     */
    protected $collTriggerprospectionnotes;
    protected $collTriggerprospectionnotesPartial;

    /**
     * @var        PropelObjectCollection|Triggerprospectionuser[] Collection to store aggregation of Triggerprospectionuser objects.
     */
    protected $collTriggerprospectionusers;
    protected $collTriggerprospectionusersPartial;

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
    protected $prospectioninterestsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $quotesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $triggerprospectionnotesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $triggerprospectionusersScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->triggerprospection_by = 'user';
    }

    /**
     * Initializes internal state of BaseTriggerprospection object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idtriggerprospection] column value.
     *
     * @return int
     */
    public function getIdtriggerprospection()
    {

        return $this->idtriggerprospection;
    }

    /**
     * Get the [idclient] column value.
     *
     * @return int
     */
    public function getIdclient()
    {

        return $this->idclient;
    }

    /**
     * Get the [optionally formatted] temporal [triggerprospection_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTriggerprospectionDate($format = 'Y-m-d H:i:s')
    {
        if ($this->triggerprospection_date === null) {
            return null;
        }

        if ($this->triggerprospection_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->triggerprospection_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->triggerprospection_date, true), $x);
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
     * Get the [triggerprospection_by] column value.
     *
     * @return string
     */
    public function getTriggerprospectionBy()
    {

        return $this->triggerprospection_by;
    }

    /**
     * Set the value of [idtriggerprospection] column.
     *
     * @param  int $v new value
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setIdtriggerprospection($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idtriggerprospection !== $v) {
            $this->idtriggerprospection = $v;
            $this->modifiedColumns[] = TriggerprospectionPeer::IDTRIGGERPROSPECTION;
        }


        return $this;
    } // setIdtriggerprospection()

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = TriggerprospectionPeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

    /**
     * Sets the value of [triggerprospection_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setTriggerprospectionDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->triggerprospection_date !== null || $dt !== null) {
            $currentDateAsString = ($this->triggerprospection_date !== null && $tmpDt = new DateTime($this->triggerprospection_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->triggerprospection_date = $newDateAsString;
                $this->modifiedColumns[] = TriggerprospectionPeer::TRIGGERPROSPECTION_DATE;
            }
        } // if either are not null


        return $this;
    } // setTriggerprospectionDate()

    /**
     * Set the value of [triggerprospection_by] column.
     *
     * @param  string $v new value
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setTriggerprospectionBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->triggerprospection_by !== $v) {
            $this->triggerprospection_by = $v;
            $this->modifiedColumns[] = TriggerprospectionPeer::TRIGGERPROSPECTION_BY;
        }


        return $this;
    } // setTriggerprospectionBy()

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
            if ($this->triggerprospection_by !== 'user') {
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

            $this->idtriggerprospection = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idclient = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->triggerprospection_date = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->triggerprospection_by = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = TriggerprospectionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Triggerprospection object", $e);
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

        if ($this->aClient !== null && $this->idclient !== $this->aClient->getIdclient()) {
            $this->aClient = null;
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
            $con = Propel::getConnection(TriggerprospectionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TriggerprospectionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
            $this->collProspectioninterests = null;

            $this->collQuotes = null;

            $this->collTriggerprospectionnotes = null;

            $this->collTriggerprospectionusers = null;

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
            $con = Propel::getConnection(TriggerprospectionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TriggerprospectionQuery::create()
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
            $con = Propel::getConnection(TriggerprospectionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TriggerprospectionPeer::addInstanceToPool($this);
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

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
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

            if ($this->prospectioninterestsScheduledForDeletion !== null) {
                if (!$this->prospectioninterestsScheduledForDeletion->isEmpty()) {
                    ProspectioninterestQuery::create()
                        ->filterByPrimaryKeys($this->prospectioninterestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->prospectioninterestsScheduledForDeletion = null;
                }
            }

            if ($this->collProspectioninterests !== null) {
                foreach ($this->collProspectioninterests as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->quotesScheduledForDeletion !== null) {
                if (!$this->quotesScheduledForDeletion->isEmpty()) {
                    QuoteQuery::create()
                        ->filterByPrimaryKeys($this->quotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quotesScheduledForDeletion = null;
                }
            }

            if ($this->collQuotes !== null) {
                foreach ($this->collQuotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->triggerprospectionnotesScheduledForDeletion !== null) {
                if (!$this->triggerprospectionnotesScheduledForDeletion->isEmpty()) {
                    TriggerprospectionnoteQuery::create()
                        ->filterByPrimaryKeys($this->triggerprospectionnotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->triggerprospectionnotesScheduledForDeletion = null;
                }
            }

            if ($this->collTriggerprospectionnotes !== null) {
                foreach ($this->collTriggerprospectionnotes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->triggerprospectionusersScheduledForDeletion !== null) {
                if (!$this->triggerprospectionusersScheduledForDeletion->isEmpty()) {
                    TriggerprospectionuserQuery::create()
                        ->filterByPrimaryKeys($this->triggerprospectionusersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->triggerprospectionusersScheduledForDeletion = null;
                }
            }

            if ($this->collTriggerprospectionusers !== null) {
                foreach ($this->collTriggerprospectionusers as $referrerFK) {
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

        $this->modifiedColumns[] = TriggerprospectionPeer::IDTRIGGERPROSPECTION;
        if (null !== $this->idtriggerprospection) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TriggerprospectionPeer::IDTRIGGERPROSPECTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TriggerprospectionPeer::IDTRIGGERPROSPECTION)) {
            $modifiedColumns[':p' . $index++]  = '`idtriggerprospection`';
        }
        if ($this->isColumnModified(TriggerprospectionPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`triggerprospection_date`';
        }
        if ($this->isColumnModified(TriggerprospectionPeer::TRIGGERPROSPECTION_BY)) {
            $modifiedColumns[':p' . $index++]  = '`triggerprospection_by`';
        }

        $sql = sprintf(
            'INSERT INTO `triggerprospection` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idtriggerprospection`':
                        $stmt->bindValue($identifier, $this->idtriggerprospection, PDO::PARAM_INT);
                        break;
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`triggerprospection_date`':
                        $stmt->bindValue($identifier, $this->triggerprospection_date, PDO::PARAM_STR);
                        break;
                    case '`triggerprospection_by`':
                        $stmt->bindValue($identifier, $this->triggerprospection_by, PDO::PARAM_STR);
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
        $this->setIdtriggerprospection($pk);

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

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }


            if (($retval = TriggerprospectionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProspectioninterests !== null) {
                    foreach ($this->collProspectioninterests as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collQuotes !== null) {
                    foreach ($this->collQuotes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTriggerprospectionnotes !== null) {
                    foreach ($this->collTriggerprospectionnotes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTriggerprospectionusers !== null) {
                    foreach ($this->collTriggerprospectionusers as $referrerFK) {
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
        $pos = TriggerprospectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdtriggerprospection();
                break;
            case 1:
                return $this->getIdclient();
                break;
            case 2:
                return $this->getTriggerprospectionDate();
                break;
            case 3:
                return $this->getTriggerprospectionBy();
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
        if (isset($alreadyDumpedObjects['Triggerprospection'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Triggerprospection'][$this->getPrimaryKey()] = true;
        $keys = TriggerprospectionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdtriggerprospection(),
            $keys[1] => $this->getIdclient(),
            $keys[2] => $this->getTriggerprospectionDate(),
            $keys[3] => $this->getTriggerprospectionBy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProspectioninterests) {
                $result['Prospectioninterests'] = $this->collProspectioninterests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collQuotes) {
                $result['Quotes'] = $this->collQuotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTriggerprospectionnotes) {
                $result['Triggerprospectionnotes'] = $this->collTriggerprospectionnotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTriggerprospectionusers) {
                $result['Triggerprospectionusers'] = $this->collTriggerprospectionusers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TriggerprospectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdtriggerprospection($value);
                break;
            case 1:
                $this->setIdclient($value);
                break;
            case 2:
                $this->setTriggerprospectionDate($value);
                break;
            case 3:
                $this->setTriggerprospectionBy($value);
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
        $keys = TriggerprospectionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdtriggerprospection($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdclient($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTriggerprospectionDate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTriggerprospectionBy($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TriggerprospectionPeer::DATABASE_NAME);

        if ($this->isColumnModified(TriggerprospectionPeer::IDTRIGGERPROSPECTION)) $criteria->add(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $this->idtriggerprospection);
        if ($this->isColumnModified(TriggerprospectionPeer::IDCLIENT)) $criteria->add(TriggerprospectionPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE)) $criteria->add(TriggerprospectionPeer::TRIGGERPROSPECTION_DATE, $this->triggerprospection_date);
        if ($this->isColumnModified(TriggerprospectionPeer::TRIGGERPROSPECTION_BY)) $criteria->add(TriggerprospectionPeer::TRIGGERPROSPECTION_BY, $this->triggerprospection_by);

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
        $criteria = new Criteria(TriggerprospectionPeer::DATABASE_NAME);
        $criteria->add(TriggerprospectionPeer::IDTRIGGERPROSPECTION, $this->idtriggerprospection);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdtriggerprospection();
    }

    /**
     * Generic method to set the primary key (idtriggerprospection column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdtriggerprospection($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdtriggerprospection();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Triggerprospection (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdclient($this->getIdclient());
        $copyObj->setTriggerprospectionDate($this->getTriggerprospectionDate());
        $copyObj->setTriggerprospectionBy($this->getTriggerprospectionBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProspectioninterests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProspectioninterest($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getQuotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTriggerprospectionnotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTriggerprospectionnote($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTriggerprospectionusers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTriggerprospectionuser($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdtriggerprospection(NULL); // this is a auto-increment column, so set to default value
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
     * @return Triggerprospection Clone of current object.
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
     * @return TriggerprospectionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TriggerprospectionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Triggerprospection The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(Client $v = null)
    {
        if ($v === null) {
            $this->setIdclient(NULL);
        } else {
            $this->setIdclient($v->getIdclient());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Client object, it will not be re-added.
        if ($v !== null) {
            $v->addTriggerprospection($this);
        }


        return $this;
    }


    /**
     * Get the associated Client object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Client The associated Client object.
     * @throws PropelException
     */
    public function getClient(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClient === null && ($this->idclient !== null) && $doQuery) {
            $this->aClient = ClientQuery::create()->findPk($this->idclient, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addTriggerprospections($this);
             */
        }

        return $this->aClient;
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
        if ('Prospectioninterest' == $relationName) {
            $this->initProspectioninterests();
        }
        if ('Quote' == $relationName) {
            $this->initQuotes();
        }
        if ('Triggerprospectionnote' == $relationName) {
            $this->initTriggerprospectionnotes();
        }
        if ('Triggerprospectionuser' == $relationName) {
            $this->initTriggerprospectionusers();
        }
    }

    /**
     * Clears out the collProspectioninterests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Triggerprospection The current object (for fluent API support)
     * @see        addProspectioninterests()
     */
    public function clearProspectioninterests()
    {
        $this->collProspectioninterests = null; // important to set this to null since that means it is uninitialized
        $this->collProspectioninterestsPartial = null;

        return $this;
    }

    /**
     * reset is the collProspectioninterests collection loaded partially
     *
     * @return void
     */
    public function resetPartialProspectioninterests($v = true)
    {
        $this->collProspectioninterestsPartial = $v;
    }

    /**
     * Initializes the collProspectioninterests collection.
     *
     * By default this just sets the collProspectioninterests collection to an empty array (like clearcollProspectioninterests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProspectioninterests($overrideExisting = true)
    {
        if (null !== $this->collProspectioninterests && !$overrideExisting) {
            return;
        }
        $this->collProspectioninterests = new PropelObjectCollection();
        $this->collProspectioninterests->setModel('Prospectioninterest');
    }

    /**
     * Gets an array of Prospectioninterest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Triggerprospection is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Prospectioninterest[] List of Prospectioninterest objects
     * @throws PropelException
     */
    public function getProspectioninterests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProspectioninterestsPartial && !$this->isNew();
        if (null === $this->collProspectioninterests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProspectioninterests) {
                // return empty collection
                $this->initProspectioninterests();
            } else {
                $collProspectioninterests = ProspectioninterestQuery::create(null, $criteria)
                    ->filterByTriggerprospection($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProspectioninterestsPartial && count($collProspectioninterests)) {
                      $this->initProspectioninterests(false);

                      foreach ($collProspectioninterests as $obj) {
                        if (false == $this->collProspectioninterests->contains($obj)) {
                          $this->collProspectioninterests->append($obj);
                        }
                      }

                      $this->collProspectioninterestsPartial = true;
                    }

                    $collProspectioninterests->getInternalIterator()->rewind();

                    return $collProspectioninterests;
                }

                if ($partial && $this->collProspectioninterests) {
                    foreach ($this->collProspectioninterests as $obj) {
                        if ($obj->isNew()) {
                            $collProspectioninterests[] = $obj;
                        }
                    }
                }

                $this->collProspectioninterests = $collProspectioninterests;
                $this->collProspectioninterestsPartial = false;
            }
        }

        return $this->collProspectioninterests;
    }

    /**
     * Sets a collection of Prospectioninterest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $prospectioninterests A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setProspectioninterests(PropelCollection $prospectioninterests, PropelPDO $con = null)
    {
        $prospectioninterestsToDelete = $this->getProspectioninterests(new Criteria(), $con)->diff($prospectioninterests);


        $this->prospectioninterestsScheduledForDeletion = $prospectioninterestsToDelete;

        foreach ($prospectioninterestsToDelete as $prospectioninterestRemoved) {
            $prospectioninterestRemoved->setTriggerprospection(null);
        }

        $this->collProspectioninterests = null;
        foreach ($prospectioninterests as $prospectioninterest) {
            $this->addProspectioninterest($prospectioninterest);
        }

        $this->collProspectioninterests = $prospectioninterests;
        $this->collProspectioninterestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Prospectioninterest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Prospectioninterest objects.
     * @throws PropelException
     */
    public function countProspectioninterests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProspectioninterestsPartial && !$this->isNew();
        if (null === $this->collProspectioninterests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProspectioninterests) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProspectioninterests());
            }
            $query = ProspectioninterestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTriggerprospection($this)
                ->count($con);
        }

        return count($this->collProspectioninterests);
    }

    /**
     * Method called to associate a Prospectioninterest object to this object
     * through the Prospectioninterest foreign key attribute.
     *
     * @param    Prospectioninterest $l Prospectioninterest
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function addProspectioninterest(Prospectioninterest $l)
    {
        if ($this->collProspectioninterests === null) {
            $this->initProspectioninterests();
            $this->collProspectioninterestsPartial = true;
        }

        if (!in_array($l, $this->collProspectioninterests->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProspectioninterest($l);

            if ($this->prospectioninterestsScheduledForDeletion and $this->prospectioninterestsScheduledForDeletion->contains($l)) {
                $this->prospectioninterestsScheduledForDeletion->remove($this->prospectioninterestsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Prospectioninterest $prospectioninterest The prospectioninterest object to add.
     */
    protected function doAddProspectioninterest($prospectioninterest)
    {
        $this->collProspectioninterests[]= $prospectioninterest;
        $prospectioninterest->setTriggerprospection($this);
    }

    /**
     * @param	Prospectioninterest $prospectioninterest The prospectioninterest object to remove.
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function removeProspectioninterest($prospectioninterest)
    {
        if ($this->getProspectioninterests()->contains($prospectioninterest)) {
            $this->collProspectioninterests->remove($this->collProspectioninterests->search($prospectioninterest));
            if (null === $this->prospectioninterestsScheduledForDeletion) {
                $this->prospectioninterestsScheduledForDeletion = clone $this->collProspectioninterests;
                $this->prospectioninterestsScheduledForDeletion->clear();
            }
            $this->prospectioninterestsScheduledForDeletion[]= clone $prospectioninterest;
            $prospectioninterest->setTriggerprospection(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Triggerprospection is new, it will return
     * an empty collection; or if this Triggerprospection has previously
     * been saved, it will retrieve related Prospectioninterests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Triggerprospection.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Prospectioninterest[] List of Prospectioninterest objects
     */
    public function getProspectioninterestsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProspectioninterestQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getProspectioninterests($query, $con);
    }

    /**
     * Clears out the collQuotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Triggerprospection The current object (for fluent API support)
     * @see        addQuotes()
     */
    public function clearQuotes()
    {
        $this->collQuotes = null; // important to set this to null since that means it is uninitialized
        $this->collQuotesPartial = null;

        return $this;
    }

    /**
     * reset is the collQuotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuotes($v = true)
    {
        $this->collQuotesPartial = $v;
    }

    /**
     * Initializes the collQuotes collection.
     *
     * By default this just sets the collQuotes collection to an empty array (like clearcollQuotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuotes($overrideExisting = true)
    {
        if (null !== $this->collQuotes && !$overrideExisting) {
            return;
        }
        $this->collQuotes = new PropelObjectCollection();
        $this->collQuotes->setModel('Quote');
    }

    /**
     * Gets an array of Quote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Triggerprospection is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Quote[] List of Quote objects
     * @throws PropelException
     */
    public function getQuotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                // return empty collection
                $this->initQuotes();
            } else {
                $collQuotes = QuoteQuery::create(null, $criteria)
                    ->filterByTriggerprospection($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuotesPartial && count($collQuotes)) {
                      $this->initQuotes(false);

                      foreach ($collQuotes as $obj) {
                        if (false == $this->collQuotes->contains($obj)) {
                          $this->collQuotes->append($obj);
                        }
                      }

                      $this->collQuotesPartial = true;
                    }

                    $collQuotes->getInternalIterator()->rewind();

                    return $collQuotes;
                }

                if ($partial && $this->collQuotes) {
                    foreach ($this->collQuotes as $obj) {
                        if ($obj->isNew()) {
                            $collQuotes[] = $obj;
                        }
                    }
                }

                $this->collQuotes = $collQuotes;
                $this->collQuotesPartial = false;
            }
        }

        return $this->collQuotes;
    }

    /**
     * Sets a collection of Quote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setQuotes(PropelCollection $quotes, PropelPDO $con = null)
    {
        $quotesToDelete = $this->getQuotes(new Criteria(), $con)->diff($quotes);


        $this->quotesScheduledForDeletion = $quotesToDelete;

        foreach ($quotesToDelete as $quoteRemoved) {
            $quoteRemoved->setTriggerprospection(null);
        }

        $this->collQuotes = null;
        foreach ($quotes as $quote) {
            $this->addQuote($quote);
        }

        $this->collQuotes = $quotes;
        $this->collQuotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Quote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Quote objects.
     * @throws PropelException
     */
    public function countQuotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuotesPartial && !$this->isNew();
        if (null === $this->collQuotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getQuotes());
            }
            $query = QuoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTriggerprospection($this)
                ->count($con);
        }

        return count($this->collQuotes);
    }

    /**
     * Method called to associate a Quote object to this object
     * through the Quote foreign key attribute.
     *
     * @param    Quote $l Quote
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function addQuote(Quote $l)
    {
        if ($this->collQuotes === null) {
            $this->initQuotes();
            $this->collQuotesPartial = true;
        }

        if (!in_array($l, $this->collQuotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuote($l);

            if ($this->quotesScheduledForDeletion and $this->quotesScheduledForDeletion->contains($l)) {
                $this->quotesScheduledForDeletion->remove($this->quotesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Quote $quote The quote object to add.
     */
    protected function doAddQuote($quote)
    {
        $this->collQuotes[]= $quote;
        $quote->setTriggerprospection($this);
    }

    /**
     * @param	Quote $quote The quote object to remove.
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function removeQuote($quote)
    {
        if ($this->getQuotes()->contains($quote)) {
            $this->collQuotes->remove($this->collQuotes->search($quote));
            if (null === $this->quotesScheduledForDeletion) {
                $this->quotesScheduledForDeletion = clone $this->collQuotes;
                $this->quotesScheduledForDeletion->clear();
            }
            $this->quotesScheduledForDeletion[]= clone $quote;
            $quote->setTriggerprospection(null);
        }

        return $this;
    }

    /**
     * Clears out the collTriggerprospectionnotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Triggerprospection The current object (for fluent API support)
     * @see        addTriggerprospectionnotes()
     */
    public function clearTriggerprospectionnotes()
    {
        $this->collTriggerprospectionnotes = null; // important to set this to null since that means it is uninitialized
        $this->collTriggerprospectionnotesPartial = null;

        return $this;
    }

    /**
     * reset is the collTriggerprospectionnotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialTriggerprospectionnotes($v = true)
    {
        $this->collTriggerprospectionnotesPartial = $v;
    }

    /**
     * Initializes the collTriggerprospectionnotes collection.
     *
     * By default this just sets the collTriggerprospectionnotes collection to an empty array (like clearcollTriggerprospectionnotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTriggerprospectionnotes($overrideExisting = true)
    {
        if (null !== $this->collTriggerprospectionnotes && !$overrideExisting) {
            return;
        }
        $this->collTriggerprospectionnotes = new PropelObjectCollection();
        $this->collTriggerprospectionnotes->setModel('Triggerprospectionnote');
    }

    /**
     * Gets an array of Triggerprospectionnote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Triggerprospection is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Triggerprospectionnote[] List of Triggerprospectionnote objects
     * @throws PropelException
     */
    public function getTriggerprospectionnotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTriggerprospectionnotesPartial && !$this->isNew();
        if (null === $this->collTriggerprospectionnotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTriggerprospectionnotes) {
                // return empty collection
                $this->initTriggerprospectionnotes();
            } else {
                $collTriggerprospectionnotes = TriggerprospectionnoteQuery::create(null, $criteria)
                    ->filterByTriggerprospection($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTriggerprospectionnotesPartial && count($collTriggerprospectionnotes)) {
                      $this->initTriggerprospectionnotes(false);

                      foreach ($collTriggerprospectionnotes as $obj) {
                        if (false == $this->collTriggerprospectionnotes->contains($obj)) {
                          $this->collTriggerprospectionnotes->append($obj);
                        }
                      }

                      $this->collTriggerprospectionnotesPartial = true;
                    }

                    $collTriggerprospectionnotes->getInternalIterator()->rewind();

                    return $collTriggerprospectionnotes;
                }

                if ($partial && $this->collTriggerprospectionnotes) {
                    foreach ($this->collTriggerprospectionnotes as $obj) {
                        if ($obj->isNew()) {
                            $collTriggerprospectionnotes[] = $obj;
                        }
                    }
                }

                $this->collTriggerprospectionnotes = $collTriggerprospectionnotes;
                $this->collTriggerprospectionnotesPartial = false;
            }
        }

        return $this->collTriggerprospectionnotes;
    }

    /**
     * Sets a collection of Triggerprospectionnote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $triggerprospectionnotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setTriggerprospectionnotes(PropelCollection $triggerprospectionnotes, PropelPDO $con = null)
    {
        $triggerprospectionnotesToDelete = $this->getTriggerprospectionnotes(new Criteria(), $con)->diff($triggerprospectionnotes);


        $this->triggerprospectionnotesScheduledForDeletion = $triggerprospectionnotesToDelete;

        foreach ($triggerprospectionnotesToDelete as $triggerprospectionnoteRemoved) {
            $triggerprospectionnoteRemoved->setTriggerprospection(null);
        }

        $this->collTriggerprospectionnotes = null;
        foreach ($triggerprospectionnotes as $triggerprospectionnote) {
            $this->addTriggerprospectionnote($triggerprospectionnote);
        }

        $this->collTriggerprospectionnotes = $triggerprospectionnotes;
        $this->collTriggerprospectionnotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Triggerprospectionnote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Triggerprospectionnote objects.
     * @throws PropelException
     */
    public function countTriggerprospectionnotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTriggerprospectionnotesPartial && !$this->isNew();
        if (null === $this->collTriggerprospectionnotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTriggerprospectionnotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTriggerprospectionnotes());
            }
            $query = TriggerprospectionnoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTriggerprospection($this)
                ->count($con);
        }

        return count($this->collTriggerprospectionnotes);
    }

    /**
     * Method called to associate a Triggerprospectionnote object to this object
     * through the Triggerprospectionnote foreign key attribute.
     *
     * @param    Triggerprospectionnote $l Triggerprospectionnote
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function addTriggerprospectionnote(Triggerprospectionnote $l)
    {
        if ($this->collTriggerprospectionnotes === null) {
            $this->initTriggerprospectionnotes();
            $this->collTriggerprospectionnotesPartial = true;
        }

        if (!in_array($l, $this->collTriggerprospectionnotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTriggerprospectionnote($l);

            if ($this->triggerprospectionnotesScheduledForDeletion and $this->triggerprospectionnotesScheduledForDeletion->contains($l)) {
                $this->triggerprospectionnotesScheduledForDeletion->remove($this->triggerprospectionnotesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Triggerprospectionnote $triggerprospectionnote The triggerprospectionnote object to add.
     */
    protected function doAddTriggerprospectionnote($triggerprospectionnote)
    {
        $this->collTriggerprospectionnotes[]= $triggerprospectionnote;
        $triggerprospectionnote->setTriggerprospection($this);
    }

    /**
     * @param	Triggerprospectionnote $triggerprospectionnote The triggerprospectionnote object to remove.
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function removeTriggerprospectionnote($triggerprospectionnote)
    {
        if ($this->getTriggerprospectionnotes()->contains($triggerprospectionnote)) {
            $this->collTriggerprospectionnotes->remove($this->collTriggerprospectionnotes->search($triggerprospectionnote));
            if (null === $this->triggerprospectionnotesScheduledForDeletion) {
                $this->triggerprospectionnotesScheduledForDeletion = clone $this->collTriggerprospectionnotes;
                $this->triggerprospectionnotesScheduledForDeletion->clear();
            }
            $this->triggerprospectionnotesScheduledForDeletion[]= clone $triggerprospectionnote;
            $triggerprospectionnote->setTriggerprospection(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Triggerprospection is new, it will return
     * an empty collection; or if this Triggerprospection has previously
     * been saved, it will retrieve related Triggerprospectionnotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Triggerprospection.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Triggerprospectionnote[] List of Triggerprospectionnote objects
     */
    public function getTriggerprospectionnotesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TriggerprospectionnoteQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getTriggerprospectionnotes($query, $con);
    }

    /**
     * Clears out the collTriggerprospectionusers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Triggerprospection The current object (for fluent API support)
     * @see        addTriggerprospectionusers()
     */
    public function clearTriggerprospectionusers()
    {
        $this->collTriggerprospectionusers = null; // important to set this to null since that means it is uninitialized
        $this->collTriggerprospectionusersPartial = null;

        return $this;
    }

    /**
     * reset is the collTriggerprospectionusers collection loaded partially
     *
     * @return void
     */
    public function resetPartialTriggerprospectionusers($v = true)
    {
        $this->collTriggerprospectionusersPartial = $v;
    }

    /**
     * Initializes the collTriggerprospectionusers collection.
     *
     * By default this just sets the collTriggerprospectionusers collection to an empty array (like clearcollTriggerprospectionusers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTriggerprospectionusers($overrideExisting = true)
    {
        if (null !== $this->collTriggerprospectionusers && !$overrideExisting) {
            return;
        }
        $this->collTriggerprospectionusers = new PropelObjectCollection();
        $this->collTriggerprospectionusers->setModel('Triggerprospectionuser');
    }

    /**
     * Gets an array of Triggerprospectionuser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Triggerprospection is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Triggerprospectionuser[] List of Triggerprospectionuser objects
     * @throws PropelException
     */
    public function getTriggerprospectionusers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTriggerprospectionusersPartial && !$this->isNew();
        if (null === $this->collTriggerprospectionusers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTriggerprospectionusers) {
                // return empty collection
                $this->initTriggerprospectionusers();
            } else {
                $collTriggerprospectionusers = TriggerprospectionuserQuery::create(null, $criteria)
                    ->filterByTriggerprospection($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTriggerprospectionusersPartial && count($collTriggerprospectionusers)) {
                      $this->initTriggerprospectionusers(false);

                      foreach ($collTriggerprospectionusers as $obj) {
                        if (false == $this->collTriggerprospectionusers->contains($obj)) {
                          $this->collTriggerprospectionusers->append($obj);
                        }
                      }

                      $this->collTriggerprospectionusersPartial = true;
                    }

                    $collTriggerprospectionusers->getInternalIterator()->rewind();

                    return $collTriggerprospectionusers;
                }

                if ($partial && $this->collTriggerprospectionusers) {
                    foreach ($this->collTriggerprospectionusers as $obj) {
                        if ($obj->isNew()) {
                            $collTriggerprospectionusers[] = $obj;
                        }
                    }
                }

                $this->collTriggerprospectionusers = $collTriggerprospectionusers;
                $this->collTriggerprospectionusersPartial = false;
            }
        }

        return $this->collTriggerprospectionusers;
    }

    /**
     * Sets a collection of Triggerprospectionuser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $triggerprospectionusers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function setTriggerprospectionusers(PropelCollection $triggerprospectionusers, PropelPDO $con = null)
    {
        $triggerprospectionusersToDelete = $this->getTriggerprospectionusers(new Criteria(), $con)->diff($triggerprospectionusers);


        $this->triggerprospectionusersScheduledForDeletion = $triggerprospectionusersToDelete;

        foreach ($triggerprospectionusersToDelete as $triggerprospectionuserRemoved) {
            $triggerprospectionuserRemoved->setTriggerprospection(null);
        }

        $this->collTriggerprospectionusers = null;
        foreach ($triggerprospectionusers as $triggerprospectionuser) {
            $this->addTriggerprospectionuser($triggerprospectionuser);
        }

        $this->collTriggerprospectionusers = $triggerprospectionusers;
        $this->collTriggerprospectionusersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Triggerprospectionuser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Triggerprospectionuser objects.
     * @throws PropelException
     */
    public function countTriggerprospectionusers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTriggerprospectionusersPartial && !$this->isNew();
        if (null === $this->collTriggerprospectionusers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTriggerprospectionusers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTriggerprospectionusers());
            }
            $query = TriggerprospectionuserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTriggerprospection($this)
                ->count($con);
        }

        return count($this->collTriggerprospectionusers);
    }

    /**
     * Method called to associate a Triggerprospectionuser object to this object
     * through the Triggerprospectionuser foreign key attribute.
     *
     * @param    Triggerprospectionuser $l Triggerprospectionuser
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function addTriggerprospectionuser(Triggerprospectionuser $l)
    {
        if ($this->collTriggerprospectionusers === null) {
            $this->initTriggerprospectionusers();
            $this->collTriggerprospectionusersPartial = true;
        }

        if (!in_array($l, $this->collTriggerprospectionusers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTriggerprospectionuser($l);

            if ($this->triggerprospectionusersScheduledForDeletion and $this->triggerprospectionusersScheduledForDeletion->contains($l)) {
                $this->triggerprospectionusersScheduledForDeletion->remove($this->triggerprospectionusersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Triggerprospectionuser $triggerprospectionuser The triggerprospectionuser object to add.
     */
    protected function doAddTriggerprospectionuser($triggerprospectionuser)
    {
        $this->collTriggerprospectionusers[]= $triggerprospectionuser;
        $triggerprospectionuser->setTriggerprospection($this);
    }

    /**
     * @param	Triggerprospectionuser $triggerprospectionuser The triggerprospectionuser object to remove.
     * @return Triggerprospection The current object (for fluent API support)
     */
    public function removeTriggerprospectionuser($triggerprospectionuser)
    {
        if ($this->getTriggerprospectionusers()->contains($triggerprospectionuser)) {
            $this->collTriggerprospectionusers->remove($this->collTriggerprospectionusers->search($triggerprospectionuser));
            if (null === $this->triggerprospectionusersScheduledForDeletion) {
                $this->triggerprospectionusersScheduledForDeletion = clone $this->collTriggerprospectionusers;
                $this->triggerprospectionusersScheduledForDeletion->clear();
            }
            $this->triggerprospectionusersScheduledForDeletion[]= clone $triggerprospectionuser;
            $triggerprospectionuser->setTriggerprospection(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Triggerprospection is new, it will return
     * an empty collection; or if this Triggerprospection has previously
     * been saved, it will retrieve related Triggerprospectionusers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Triggerprospection.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Triggerprospectionuser[] List of Triggerprospectionuser objects
     */
    public function getTriggerprospectionusersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TriggerprospectionuserQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getTriggerprospectionusers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idtriggerprospection = null;
        $this->idclient = null;
        $this->triggerprospection_date = null;
        $this->triggerprospection_by = null;
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
            if ($this->collProspectioninterests) {
                foreach ($this->collProspectioninterests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collQuotes) {
                foreach ($this->collQuotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTriggerprospectionnotes) {
                foreach ($this->collTriggerprospectionnotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTriggerprospectionusers) {
                foreach ($this->collTriggerprospectionusers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProspectioninterests instanceof PropelCollection) {
            $this->collProspectioninterests->clearIterator();
        }
        $this->collProspectioninterests = null;
        if ($this->collQuotes instanceof PropelCollection) {
            $this->collQuotes->clearIterator();
        }
        $this->collQuotes = null;
        if ($this->collTriggerprospectionnotes instanceof PropelCollection) {
            $this->collTriggerprospectionnotes->clearIterator();
        }
        $this->collTriggerprospectionnotes = null;
        if ($this->collTriggerprospectionusers instanceof PropelCollection) {
            $this->collTriggerprospectionusers->clearIterator();
        }
        $this->collTriggerprospectionusers = null;
        $this->aClient = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TriggerprospectionPeer::DEFAULT_STRING_FORMAT);
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
