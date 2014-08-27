<?php


/**
 * Base class that represents a row from the 'quoutenote' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuoutenote extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'QuoutenotePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        QuoutenotePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idquoutenote field.
     * @var        int
     */
    protected $idquoutenote;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the idquote field.
     * @var        int
     */
    protected $idquote;

    /**
     * The value for the quoutenote_note field.
     * @var        string
     */
    protected $quoutenote_note;

    /**
     * The value for the quoutenote_date field.
     * @var        string
     */
    protected $quoutenote_date;

    /**
     * @var        Quote
     */
    protected $aQuote;

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
     * Get the [idquoutenote] column value.
     *
     * @return int
     */
    public function getIdquoutenote()
    {

        return $this->idquoutenote;
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
     * Get the [idquote] column value.
     *
     * @return int
     */
    public function getIdquote()
    {

        return $this->idquote;
    }

    /**
     * Get the [quoutenote_note] column value.
     *
     * @return string
     */
    public function getQuoutenoteNote()
    {

        return $this->quoutenote_note;
    }

    /**
     * Get the [optionally formatted] temporal [quoutenote_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getQuoutenoteDate($format = 'Y-m-d H:i:s')
    {
        if ($this->quoutenote_date === null) {
            return null;
        }

        if ($this->quoutenote_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->quoutenote_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->quoutenote_date, true), $x);
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
     * Set the value of [idquoutenote] column.
     *
     * @param  int $v new value
     * @return Quoutenote The current object (for fluent API support)
     */
    public function setIdquoutenote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idquoutenote !== $v) {
            $this->idquoutenote = $v;
            $this->modifiedColumns[] = QuoutenotePeer::IDQUOUTENOTE;
        }


        return $this;
    } // setIdquoutenote()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Quoutenote The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = QuoutenotePeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIduser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [idquote] column.
     *
     * @param  int $v new value
     * @return Quoutenote The current object (for fluent API support)
     */
    public function setIdquote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idquote !== $v) {
            $this->idquote = $v;
            $this->modifiedColumns[] = QuoutenotePeer::IDQUOTE;
        }

        if ($this->aQuote !== null && $this->aQuote->getIdquote() !== $v) {
            $this->aQuote = null;
        }


        return $this;
    } // setIdquote()

    /**
     * Set the value of [quoutenote_note] column.
     *
     * @param  string $v new value
     * @return Quoutenote The current object (for fluent API support)
     */
    public function setQuoutenoteNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quoutenote_note !== $v) {
            $this->quoutenote_note = $v;
            $this->modifiedColumns[] = QuoutenotePeer::QUOUTENOTE_NOTE;
        }


        return $this;
    } // setQuoutenoteNote()

    /**
     * Sets the value of [quoutenote_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Quoutenote The current object (for fluent API support)
     */
    public function setQuoutenoteDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->quoutenote_date !== null || $dt !== null) {
            $currentDateAsString = ($this->quoutenote_date !== null && $tmpDt = new DateTime($this->quoutenote_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->quoutenote_date = $newDateAsString;
                $this->modifiedColumns[] = QuoutenotePeer::QUOUTENOTE_DATE;
            }
        } // if either are not null


        return $this;
    } // setQuoutenoteDate()

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

            $this->idquoutenote = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->iduser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idquote = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->quoutenote_note = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->quoutenote_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 5; // 5 = QuoutenotePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Quoutenote object", $e);
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
        if ($this->aQuote !== null && $this->idquote !== $this->aQuote->getIdquote()) {
            $this->aQuote = null;
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
            $con = Propel::getConnection(QuoutenotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = QuoutenotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aQuote = null;
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
            $con = Propel::getConnection(QuoutenotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = QuoutenoteQuery::create()
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
            $con = Propel::getConnection(QuoutenotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                QuoutenotePeer::addInstanceToPool($this);
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

            if ($this->aQuote !== null) {
                if ($this->aQuote->isModified() || $this->aQuote->isNew()) {
                    $affectedRows += $this->aQuote->save($con);
                }
                $this->setQuote($this->aQuote);
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
        if ($this->isColumnModified(QuoutenotePeer::IDQUOUTENOTE)) {
            $modifiedColumns[':p' . $index++]  = '`idquoutenote`';
        }
        if ($this->isColumnModified(QuoutenotePeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(QuoutenotePeer::IDQUOTE)) {
            $modifiedColumns[':p' . $index++]  = '`idquote`';
        }
        if ($this->isColumnModified(QuoutenotePeer::QUOUTENOTE_NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`quoutenote_note`';
        }
        if ($this->isColumnModified(QuoutenotePeer::QUOUTENOTE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`quoutenote_date`';
        }

        $sql = sprintf(
            'INSERT INTO `quoutenote` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idquoutenote`':
                        $stmt->bindValue($identifier, $this->idquoutenote, PDO::PARAM_INT);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`idquote`':
                        $stmt->bindValue($identifier, $this->idquote, PDO::PARAM_INT);
                        break;
                    case '`quoutenote_note`':
                        $stmt->bindValue($identifier, $this->quoutenote_note, PDO::PARAM_STR);
                        break;
                    case '`quoutenote_date`':
                        $stmt->bindValue($identifier, $this->quoutenote_date, PDO::PARAM_STR);
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

            if ($this->aQuote !== null) {
                if (!$this->aQuote->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aQuote->getValidationFailures());
                }
            }

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = QuoutenotePeer::doValidate($this, $columns)) !== true) {
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
        $pos = QuoutenotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdquoutenote();
                break;
            case 1:
                return $this->getIduser();
                break;
            case 2:
                return $this->getIdquote();
                break;
            case 3:
                return $this->getQuoutenoteNote();
                break;
            case 4:
                return $this->getQuoutenoteDate();
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
        if (isset($alreadyDumpedObjects['Quoutenote'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Quoutenote'][$this->getPrimaryKey()] = true;
        $keys = QuoutenotePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdquoutenote(),
            $keys[1] => $this->getIduser(),
            $keys[2] => $this->getIdquote(),
            $keys[3] => $this->getQuoutenoteNote(),
            $keys[4] => $this->getQuoutenoteDate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aQuote) {
                $result['Quote'] = $this->aQuote->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = QuoutenotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdquoutenote($value);
                break;
            case 1:
                $this->setIduser($value);
                break;
            case 2:
                $this->setIdquote($value);
                break;
            case 3:
                $this->setQuoutenoteNote($value);
                break;
            case 4:
                $this->setQuoutenoteDate($value);
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
        $keys = QuoutenotePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdquoutenote($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIduser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdquote($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setQuoutenoteNote($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setQuoutenoteDate($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuoutenotePeer::DATABASE_NAME);

        if ($this->isColumnModified(QuoutenotePeer::IDQUOUTENOTE)) $criteria->add(QuoutenotePeer::IDQUOUTENOTE, $this->idquoutenote);
        if ($this->isColumnModified(QuoutenotePeer::IDUSER)) $criteria->add(QuoutenotePeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(QuoutenotePeer::IDQUOTE)) $criteria->add(QuoutenotePeer::IDQUOTE, $this->idquote);
        if ($this->isColumnModified(QuoutenotePeer::QUOUTENOTE_NOTE)) $criteria->add(QuoutenotePeer::QUOUTENOTE_NOTE, $this->quoutenote_note);
        if ($this->isColumnModified(QuoutenotePeer::QUOUTENOTE_DATE)) $criteria->add(QuoutenotePeer::QUOUTENOTE_DATE, $this->quoutenote_date);

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
        $criteria = new Criteria(QuoutenotePeer::DATABASE_NAME);
        $criteria->add(QuoutenotePeer::IDQUOUTENOTE, $this->idquoutenote);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdquoutenote();
    }

    /**
     * Generic method to set the primary key (idquoutenote column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdquoutenote($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdquoutenote();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Quoutenote (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIduser($this->getIduser());
        $copyObj->setIdquote($this->getIdquote());
        $copyObj->setQuoutenoteNote($this->getQuoutenoteNote());
        $copyObj->setQuoutenoteDate($this->getQuoutenoteDate());

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
            $copyObj->setIdquoutenote(NULL); // this is a auto-increment column, so set to default value
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
     * @return Quoutenote Clone of current object.
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
     * @return QuoutenotePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new QuoutenotePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Quote object.
     *
     * @param                  Quote $v
     * @return Quoutenote The current object (for fluent API support)
     * @throws PropelException
     */
    public function setQuote(Quote $v = null)
    {
        if ($v === null) {
            $this->setIdquote(NULL);
        } else {
            $this->setIdquote($v->getIdquote());
        }

        $this->aQuote = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Quote object, it will not be re-added.
        if ($v !== null) {
            $v->addQuoutenote($this);
        }


        return $this;
    }


    /**
     * Get the associated Quote object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Quote The associated Quote object.
     * @throws PropelException
     */
    public function getQuote(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aQuote === null && ($this->idquote !== null) && $doQuery) {
            $this->aQuote = QuoteQuery::create()->findPk($this->idquote, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aQuote->addQuoutenotes($this);
             */
        }

        return $this->aQuote;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Quoutenote The current object (for fluent API support)
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
            $v->addQuoutenote($this);
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
                $this->aUser->addQuoutenotes($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idquoutenote = null;
        $this->iduser = null;
        $this->idquote = null;
        $this->quoutenote_note = null;
        $this->quoutenote_date = null;
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
            if ($this->aQuote instanceof Persistent) {
              $this->aQuote->clearAllReferences($deep);
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aQuote = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuoutenotePeer::DEFAULT_STRING_FORMAT);
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
