<?php


/**
 * Base class that represents a row from the 'prospectioninterest' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProspectioninterest extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProspectioninterestPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProspectioninterestPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idprospectioninterest field.
     * @var        int
     */
    protected $idprospectioninterest;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the idtriggerprospection field.
     * @var        int
     */
    protected $idtriggerprospection;

    /**
     * The value for the prospectioninterest_level field.
     * Note: this column has a database default value of: '3'
     * @var        string
     */
    protected $prospectioninterest_level;

    /**
     * The value for the prospectioninterest_date field.
     * @var        string
     */
    protected $prospectioninterest_date;

    /**
     * The value for the prospectioninterest_note field.
     * @var        string
     */
    protected $prospectioninterest_note;

    /**
     * @var        Triggerprospection
     */
    protected $aTriggerprospection;

    /**
     * @var        User
     */
    protected $aUser;

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
        $this->prospectioninterest_level = '3';
    }

    /**
     * Initializes internal state of BaseProspectioninterest object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idprospectioninterest] column value.
     *
     * @return int
     */
    public function getIdprospectioninterest()
    {

        return $this->idprospectioninterest;
    }

    /**
     * Get the [iduser] column value.
     *
     * @return int
     */
    public function getIduser()
    {

        return $this->iduser;
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
     * Get the [prospectioninterest_level] column value.
     *
     * @return string
     */
    public function getProspectioninterestLevel()
    {

        return $this->prospectioninterest_level;
    }

    /**
     * Get the [optionally formatted] temporal [prospectioninterest_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProspectioninterestDate($format = 'Y-m-d H:i:s')
    {
        if ($this->prospectioninterest_date === null) {
            return null;
        }

        if ($this->prospectioninterest_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->prospectioninterest_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->prospectioninterest_date, true), $x);
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
     * Get the [prospectioninterest_note] column value.
     *
     * @return string
     */
    public function getProspectioninterestNote()
    {

        return $this->prospectioninterest_note;
    }

    /**
     * Set the value of [idprospectioninterest] column.
     *
     * @param  int $v new value
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setIdprospectioninterest($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idprospectioninterest !== $v) {
            $this->idprospectioninterest = $v;
            $this->modifiedColumns[] = ProspectioninterestPeer::IDPROSPECTIONINTEREST;
        }


        return $this;
    } // setIdprospectioninterest()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = ProspectioninterestPeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIduser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [idtriggerprospection] column.
     *
     * @param  int $v new value
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setIdtriggerprospection($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idtriggerprospection !== $v) {
            $this->idtriggerprospection = $v;
            $this->modifiedColumns[] = ProspectioninterestPeer::IDTRIGGERPROSPECTION;
        }

        if ($this->aTriggerprospection !== null && $this->aTriggerprospection->getIdtriggerprospection() !== $v) {
            $this->aTriggerprospection = null;
        }


        return $this;
    } // setIdtriggerprospection()

    /**
     * Set the value of [prospectioninterest_level] column.
     *
     * @param  string $v new value
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setProspectioninterestLevel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prospectioninterest_level !== $v) {
            $this->prospectioninterest_level = $v;
            $this->modifiedColumns[] = ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL;
        }


        return $this;
    } // setProspectioninterestLevel()

    /**
     * Sets the value of [prospectioninterest_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setProspectioninterestDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->prospectioninterest_date !== null || $dt !== null) {
            $currentDateAsString = ($this->prospectioninterest_date !== null && $tmpDt = new DateTime($this->prospectioninterest_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->prospectioninterest_date = $newDateAsString;
                $this->modifiedColumns[] = ProspectioninterestPeer::PROSPECTIONINTEREST_DATE;
            }
        } // if either are not null


        return $this;
    } // setProspectioninterestDate()

    /**
     * Set the value of [prospectioninterest_note] column.
     *
     * @param  string $v new value
     * @return Prospectioninterest The current object (for fluent API support)
     */
    public function setProspectioninterestNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prospectioninterest_note !== $v) {
            $this->prospectioninterest_note = $v;
            $this->modifiedColumns[] = ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE;
        }


        return $this;
    } // setProspectioninterestNote()

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
            if ($this->prospectioninterest_level !== '3') {
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

            $this->idprospectioninterest = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iduser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idtriggerprospection = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->prospectioninterest_level = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->prospectioninterest_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->prospectioninterest_note = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = ProspectioninterestPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Prospectioninterest object", $e);
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

        if ($this->aUser !== null && $this->iduser !== $this->aUser->getIduser()) {
            $this->aUser = null;
        }
        if ($this->aTriggerprospection !== null && $this->idtriggerprospection !== $this->aTriggerprospection->getIdtriggerprospection()) {
            $this->aTriggerprospection = null;
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
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProspectioninterestPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTriggerprospection = null;
            $this->aUser = null;
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
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProspectioninterestQuery::create()
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
            $con = Propel::getConnection(ProspectioninterestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProspectioninterestPeer::addInstanceToPool($this);
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

            if ($this->aTriggerprospection !== null) {
                if ($this->aTriggerprospection->isModified() || $this->aTriggerprospection->isNew()) {
                    $affectedRows += $this->aTriggerprospection->save($con);
                }
                $this->setTriggerprospection($this->aTriggerprospection);
            }

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProspectioninterestPeer::IDPROSPECTIONINTEREST)) {
            $modifiedColumns[':p' . $index++]  = '`idprospectioninterest`';
        }
        if ($this->isColumnModified(ProspectioninterestPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(ProspectioninterestPeer::IDTRIGGERPROSPECTION)) {
            $modifiedColumns[':p' . $index++]  = '`idtriggerprospection`';
        }
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`prospectioninterest_level`';
        }
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`prospectioninterest_date`';
        }
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`prospectioninterest_note`';
        }

        $sql = sprintf(
            'INSERT INTO `prospectioninterest` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idprospectioninterest`':
                        $stmt->bindValue($identifier, $this->idprospectioninterest, PDO::PARAM_INT);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`idtriggerprospection`':
                        $stmt->bindValue($identifier, $this->idtriggerprospection, PDO::PARAM_INT);
                        break;
                    case '`prospectioninterest_level`':
                        $stmt->bindValue($identifier, $this->prospectioninterest_level, PDO::PARAM_STR);
                        break;
                    case '`prospectioninterest_date`':
                        $stmt->bindValue($identifier, $this->prospectioninterest_date, PDO::PARAM_STR);
                        break;
                    case '`prospectioninterest_note`':
                        $stmt->bindValue($identifier, $this->prospectioninterest_note, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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

            if ($this->aTriggerprospection !== null) {
                if (!$this->aTriggerprospection->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTriggerprospection->getValidationFailures());
                }
            }

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = ProspectioninterestPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProspectioninterestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdprospectioninterest();
                break;
            case 1:
                return $this->getIduser();
                break;
            case 2:
                return $this->getIdtriggerprospection();
                break;
            case 3:
                return $this->getProspectioninterestLevel();
                break;
            case 4:
                return $this->getProspectioninterestDate();
                break;
            case 5:
                return $this->getProspectioninterestNote();
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
        if (isset($alreadyDumpedObjects['Prospectioninterest'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Prospectioninterest'][$this->getPrimaryKey()] = true;
        $keys = ProspectioninterestPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdprospectioninterest(),
            $keys[1] => $this->getIduser(),
            $keys[2] => $this->getIdtriggerprospection(),
            $keys[3] => $this->getProspectioninterestLevel(),
            $keys[4] => $this->getProspectioninterestDate(),
            $keys[5] => $this->getProspectioninterestNote(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTriggerprospection) {
                $result['Triggerprospection'] = $this->aTriggerprospection->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProspectioninterestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdprospectioninterest($value);
                break;
            case 1:
                $this->setIduser($value);
                break;
            case 2:
                $this->setIdtriggerprospection($value);
                break;
            case 3:
                $this->setProspectioninterestLevel($value);
                break;
            case 4:
                $this->setProspectioninterestDate($value);
                break;
            case 5:
                $this->setProspectioninterestNote($value);
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
        $keys = ProspectioninterestPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdprospectioninterest($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIduser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdtriggerprospection($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProspectioninterestLevel($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProspectioninterestDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProspectioninterestNote($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProspectioninterestPeer::IDPROSPECTIONINTEREST)) $criteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $this->idprospectioninterest);
        if ($this->isColumnModified(ProspectioninterestPeer::IDUSER)) $criteria->add(ProspectioninterestPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(ProspectioninterestPeer::IDTRIGGERPROSPECTION)) $criteria->add(ProspectioninterestPeer::IDTRIGGERPROSPECTION, $this->idtriggerprospection);
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL)) $criteria->add(ProspectioninterestPeer::PROSPECTIONINTEREST_LEVEL, $this->prospectioninterest_level);
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE)) $criteria->add(ProspectioninterestPeer::PROSPECTIONINTEREST_DATE, $this->prospectioninterest_date);
        if ($this->isColumnModified(ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE)) $criteria->add(ProspectioninterestPeer::PROSPECTIONINTEREST_NOTE, $this->prospectioninterest_note);

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
        $criteria = new Criteria(ProspectioninterestPeer::DATABASE_NAME);
        $criteria->add(ProspectioninterestPeer::IDPROSPECTIONINTEREST, $this->idprospectioninterest);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdprospectioninterest();
    }

    /**
     * Generic method to set the primary key (idprospectioninterest column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdprospectioninterest($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdprospectioninterest();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Prospectioninterest (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIduser($this->getIduser());
        $copyObj->setIdtriggerprospection($this->getIdtriggerprospection());
        $copyObj->setProspectioninterestLevel($this->getProspectioninterestLevel());
        $copyObj->setProspectioninterestDate($this->getProspectioninterestDate());
        $copyObj->setProspectioninterestNote($this->getProspectioninterestNote());

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
            $copyObj->setIdprospectioninterest(NULL); // this is a auto-increment column, so set to default value
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
     * @return Prospectioninterest Clone of current object.
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
     * @return ProspectioninterestPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProspectioninterestPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Triggerprospection object.
     *
     * @param                  Triggerprospection $v
     * @return Prospectioninterest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTriggerprospection(Triggerprospection $v = null)
    {
        if ($v === null) {
            $this->setIdtriggerprospection(NULL);
        } else {
            $this->setIdtriggerprospection($v->getIdtriggerprospection());
        }

        $this->aTriggerprospection = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Triggerprospection object, it will not be re-added.
        if ($v !== null) {
            $v->addProspectioninterest($this);
        }


        return $this;
    }


    /**
     * Get the associated Triggerprospection object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Triggerprospection The associated Triggerprospection object.
     * @throws PropelException
     */
    public function getTriggerprospection(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTriggerprospection === null && ($this->idtriggerprospection !== null) && $doQuery) {
            $this->aTriggerprospection = TriggerprospectionQuery::create()->findPk($this->idtriggerprospection, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTriggerprospection->addProspectioninterests($this);
             */
        }

        return $this->aTriggerprospection;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Prospectioninterest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setIduser(NULL);
        } else {
            $this->setIduser($v->getIduser());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addProspectioninterest($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && ($this->iduser !== null) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->iduser, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addProspectioninterests($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idprospectioninterest = null;
        $this->iduser = null;
        $this->idtriggerprospection = null;
        $this->prospectioninterest_level = null;
        $this->prospectioninterest_date = null;
        $this->prospectioninterest_note = null;
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
            if ($this->aTriggerprospection instanceof Persistent) {
              $this->aTriggerprospection->clearAllReferences($deep);
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aTriggerprospection = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProspectioninterestPeer::DEFAULT_STRING_FORMAT);
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
