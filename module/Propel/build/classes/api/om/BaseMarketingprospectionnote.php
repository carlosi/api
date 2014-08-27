<?php


/**
 * Base class that represents a row from the 'marketingprospectionnote' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingprospectionnote extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MarketingprospectionnotePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MarketingprospectionnotePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmarketingprospectionnote field.
     * @var        int
     */
    protected $idmarketingprospectionnote;

    /**
     * The value for the idmarketingprospectionuser field.
     * @var        int
     */
    protected $idmarketingprospectionuser;

    /**
     * The value for the marketingprospectionnote_note field.
     * @var        string
     */
    protected $marketingprospectionnote_note;

    /**
     * The value for the marketingprospectionnote_date field.
     * @var        string
     */
    protected $marketingprospectionnote_date;

    /**
     * @var        Marketingprospectionuser
     */
    protected $aMarketingprospectionuser;

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
     * Get the [idmarketingprospectionnote] column value.
     *
     * @return int
     */
    public function getIdmarketingprospectionnote()
    {

        return $this->idmarketingprospectionnote;
    }

    /**
     * Get the [idmarketingprospectionuser] column value.
     *
     * @return int
     */
    public function getIdmarketingprospectionuser()
    {

        return $this->idmarketingprospectionuser;
    }

    /**
     * Get the [marketingprospectionnote_note] column value.
     *
     * @return string
     */
    public function getMarketingprospectionnoteNote()
    {

        return $this->marketingprospectionnote_note;
    }

    /**
     * Get the [optionally formatted] temporal [marketingprospectionnote_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMarketingprospectionnoteDate($format = 'Y-m-d H:i:s')
    {
        if ($this->marketingprospectionnote_date === null) {
            return null;
        }

        if ($this->marketingprospectionnote_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->marketingprospectionnote_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->marketingprospectionnote_date, true), $x);
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
     * Set the value of [idmarketingprospectionnote] column.
     *
     * @param  int $v new value
     * @return Marketingprospectionnote The current object (for fluent API support)
     */
    public function setIdmarketingprospectionnote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingprospectionnote !== $v) {
            $this->idmarketingprospectionnote = $v;
            $this->modifiedColumns[] = MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE;
        }


        return $this;
    } // setIdmarketingprospectionnote()

    /**
     * Set the value of [idmarketingprospectionuser] column.
     *
     * @param  int $v new value
     * @return Marketingprospectionnote The current object (for fluent API support)
     */
    public function setIdmarketingprospectionuser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingprospectionuser !== $v) {
            $this->idmarketingprospectionuser = $v;
            $this->modifiedColumns[] = MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER;
        }

        if ($this->aMarketingprospectionuser !== null && $this->aMarketingprospectionuser->getIdmarketingprospectionuser() !== $v) {
            $this->aMarketingprospectionuser = null;
        }


        return $this;
    } // setIdmarketingprospectionuser()

    /**
     * Set the value of [marketingprospectionnote_note] column.
     *
     * @param  string $v new value
     * @return Marketingprospectionnote The current object (for fluent API support)
     */
    public function setMarketingprospectionnoteNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->marketingprospectionnote_note !== $v) {
            $this->marketingprospectionnote_note = $v;
            $this->modifiedColumns[] = MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_NOTE;
        }


        return $this;
    } // setMarketingprospectionnoteNote()

    /**
     * Sets the value of [marketingprospectionnote_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Marketingprospectionnote The current object (for fluent API support)
     */
    public function setMarketingprospectionnoteDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->marketingprospectionnote_date !== null || $dt !== null) {
            $currentDateAsString = ($this->marketingprospectionnote_date !== null && $tmpDt = new DateTime($this->marketingprospectionnote_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->marketingprospectionnote_date = $newDateAsString;
                $this->modifiedColumns[] = MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE;
            }
        } // if either are not null


        return $this;
    } // setMarketingprospectionnoteDate()

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

            $this->idmarketingprospectionnote = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idmarketingprospectionuser = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->marketingprospectionnote_note = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->marketingprospectionnote_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = MarketingprospectionnotePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Marketingprospectionnote object", $e);
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

        if ($this->aMarketingprospectionuser !== null && $this->idmarketingprospectionuser !== $this->aMarketingprospectionuser->getIdmarketingprospectionuser()) {
            $this->aMarketingprospectionuser = null;
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
            $con = Propel::getConnection(MarketingprospectionnotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MarketingprospectionnotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMarketingprospectionuser = null;
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
            $con = Propel::getConnection(MarketingprospectionnotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MarketingprospectionnoteQuery::create()
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
            $con = Propel::getConnection(MarketingprospectionnotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MarketingprospectionnotePeer::addInstanceToPool($this);
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

            if ($this->aMarketingprospectionuser !== null) {
                if ($this->aMarketingprospectionuser->isModified() || $this->aMarketingprospectionuser->isNew()) {
                    $affectedRows += $this->aMarketingprospectionuser->save($con);
                }
                $this->setMarketingprospectionuser($this->aMarketingprospectionuser);
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

        $this->modifiedColumns[] = MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE;
        if (null !== $this->idmarketingprospectionnote) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingprospectionnote`';
        }
        if ($this->isColumnModified(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingprospectionuser`';
        }
        if ($this->isColumnModified(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`marketingprospectionnote_note`';
        }
        if ($this->isColumnModified(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`marketingprospectionnote_date`';
        }

        $sql = sprintf(
            'INSERT INTO `marketingprospectionnote` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmarketingprospectionnote`':
                        $stmt->bindValue($identifier, $this->idmarketingprospectionnote, PDO::PARAM_INT);
                        break;
                    case '`idmarketingprospectionuser`':
                        $stmt->bindValue($identifier, $this->idmarketingprospectionuser, PDO::PARAM_INT);
                        break;
                    case '`marketingprospectionnote_note`':
                        $stmt->bindValue($identifier, $this->marketingprospectionnote_note, PDO::PARAM_STR);
                        break;
                    case '`marketingprospectionnote_date`':
                        $stmt->bindValue($identifier, $this->marketingprospectionnote_date, PDO::PARAM_STR);
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
        $this->setIdmarketingprospectionnote($pk);

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

            if ($this->aMarketingprospectionuser !== null) {
                if (!$this->aMarketingprospectionuser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMarketingprospectionuser->getValidationFailures());
                }
            }


            if (($retval = MarketingprospectionnotePeer::doValidate($this, $columns)) !== true) {
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
        $pos = MarketingprospectionnotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmarketingprospectionnote();
                break;
            case 1:
                return $this->getIdmarketingprospectionuser();
                break;
            case 2:
                return $this->getMarketingprospectionnoteNote();
                break;
            case 3:
                return $this->getMarketingprospectionnoteDate();
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
        if (isset($alreadyDumpedObjects['Marketingprospectionnote'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Marketingprospectionnote'][$this->getPrimaryKey()] = true;
        $keys = MarketingprospectionnotePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmarketingprospectionnote(),
            $keys[1] => $this->getIdmarketingprospectionuser(),
            $keys[2] => $this->getMarketingprospectionnoteNote(),
            $keys[3] => $this->getMarketingprospectionnoteDate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMarketingprospectionuser) {
                $result['Marketingprospectionuser'] = $this->aMarketingprospectionuser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = MarketingprospectionnotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmarketingprospectionnote($value);
                break;
            case 1:
                $this->setIdmarketingprospectionuser($value);
                break;
            case 2:
                $this->setMarketingprospectionnoteNote($value);
                break;
            case 3:
                $this->setMarketingprospectionnoteDate($value);
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
        $keys = MarketingprospectionnotePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmarketingprospectionnote($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdmarketingprospectionuser($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMarketingprospectionnoteNote($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMarketingprospectionnoteDate($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MarketingprospectionnotePeer::DATABASE_NAME);

        if ($this->isColumnModified(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE)) $criteria->add(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $this->idmarketingprospectionnote);
        if ($this->isColumnModified(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER)) $criteria->add(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONUSER, $this->idmarketingprospectionuser);
        if ($this->isColumnModified(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_NOTE)) $criteria->add(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_NOTE, $this->marketingprospectionnote_note);
        if ($this->isColumnModified(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE)) $criteria->add(MarketingprospectionnotePeer::MARKETINGPROSPECTIONNOTE_DATE, $this->marketingprospectionnote_date);

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
        $criteria = new Criteria(MarketingprospectionnotePeer::DATABASE_NAME);
        $criteria->add(MarketingprospectionnotePeer::IDMARKETINGPROSPECTIONNOTE, $this->idmarketingprospectionnote);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmarketingprospectionnote();
    }

    /**
     * Generic method to set the primary key (idmarketingprospectionnote column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmarketingprospectionnote($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmarketingprospectionnote();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Marketingprospectionnote (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdmarketingprospectionuser($this->getIdmarketingprospectionuser());
        $copyObj->setMarketingprospectionnoteNote($this->getMarketingprospectionnoteNote());
        $copyObj->setMarketingprospectionnoteDate($this->getMarketingprospectionnoteDate());

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
            $copyObj->setIdmarketingprospectionnote(NULL); // this is a auto-increment column, so set to default value
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
     * @return Marketingprospectionnote Clone of current object.
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
     * @return MarketingprospectionnotePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MarketingprospectionnotePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Marketingprospectionuser object.
     *
     * @param                  Marketingprospectionuser $v
     * @return Marketingprospectionnote The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMarketingprospectionuser(Marketingprospectionuser $v = null)
    {
        if ($v === null) {
            $this->setIdmarketingprospectionuser(NULL);
        } else {
            $this->setIdmarketingprospectionuser($v->getIdmarketingprospectionuser());
        }

        $this->aMarketingprospectionuser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Marketingprospectionuser object, it will not be re-added.
        if ($v !== null) {
            $v->addMarketingprospectionnote($this);
        }


        return $this;
    }


    /**
     * Get the associated Marketingprospectionuser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Marketingprospectionuser The associated Marketingprospectionuser object.
     * @throws PropelException
     */
    public function getMarketingprospectionuser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMarketingprospectionuser === null && ($this->idmarketingprospectionuser !== null) && $doQuery) {
            $this->aMarketingprospectionuser = MarketingprospectionuserQuery::create()->findPk($this->idmarketingprospectionuser, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMarketingprospectionuser->addMarketingprospectionnotes($this);
             */
        }

        return $this->aMarketingprospectionuser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmarketingprospectionnote = null;
        $this->idmarketingprospectionuser = null;
        $this->marketingprospectionnote_note = null;
        $this->marketingprospectionnote_date = null;
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
            if ($this->aMarketingprospectionuser instanceof Persistent) {
              $this->aMarketingprospectionuser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aMarketingprospectionuser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MarketingprospectionnotePeer::DEFAULT_STRING_FORMAT);
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
