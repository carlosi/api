<?php


/**
 * Base class that represents a row from the 'quote' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuote extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'QuotePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        QuotePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idquote field.
     * @var        int
     */
    protected $idquote;

    /**
     * The value for the idtriggerprospection field.
     * @var        int
     */
    protected $idtriggerprospection;

    /**
     * The value for the quote_dateexpiration field.
     * @var        string
     */
    protected $quote_dateexpiration;

    /**
     * The value for the quote_status field.
     * Note: this column has a database default value of: 'active'
     * @var        string
     */
    protected $quote_status;

    /**
     * @var        Triggerprospection
     */
    protected $aTriggerprospection;

    /**
     * @var        PropelObjectCollection|Quoteitem[] Collection to store aggregation of Quoteitem objects.
     */
    protected $collQuoteitems;
    protected $collQuoteitemsPartial;

    /**
     * @var        PropelObjectCollection|Quoutenote[] Collection to store aggregation of Quoutenote objects.
     */
    protected $collQuoutenotes;
    protected $collQuoutenotesPartial;

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
    protected $quoteitemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $quoutenotesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->quote_status = 'active';
    }

    /**
     * Initializes internal state of BaseQuote object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [idtriggerprospection] column value.
     *
     * @return int
     */
    public function getIdtriggerprospection()
    {

        return $this->idtriggerprospection;
    }

    /**
     * Get the [optionally formatted] temporal [quote_dateexpiration] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getQuoteDateexpiration($format = 'Y-m-d H:i:s')
    {
        if ($this->quote_dateexpiration === null) {
            return null;
        }

        if ($this->quote_dateexpiration === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->quote_dateexpiration);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->quote_dateexpiration, true), $x);
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
     * Get the [quote_status] column value.
     *
     * @return string
     */
    public function getQuoteStatus()
    {

        return $this->quote_status;
    }

    /**
     * Set the value of [idquote] column.
     *
     * @param  int $v new value
     * @return Quote The current object (for fluent API support)
     */
    public function setIdquote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idquote !== $v) {
            $this->idquote = $v;
            $this->modifiedColumns[] = QuotePeer::IDQUOTE;
        }


        return $this;
    } // setIdquote()

    /**
     * Set the value of [idtriggerprospection] column.
     *
     * @param  int $v new value
     * @return Quote The current object (for fluent API support)
     */
    public function setIdtriggerprospection($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idtriggerprospection !== $v) {
            $this->idtriggerprospection = $v;
            $this->modifiedColumns[] = QuotePeer::IDTRIGGERPROSPECTION;
        }

        if ($this->aTriggerprospection !== null && $this->aTriggerprospection->getIdtriggerprospection() !== $v) {
            $this->aTriggerprospection = null;
        }


        return $this;
    } // setIdtriggerprospection()

    /**
     * Sets the value of [quote_dateexpiration] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Quote The current object (for fluent API support)
     */
    public function setQuoteDateexpiration($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->quote_dateexpiration !== null || $dt !== null) {
            $currentDateAsString = ($this->quote_dateexpiration !== null && $tmpDt = new DateTime($this->quote_dateexpiration)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->quote_dateexpiration = $newDateAsString;
                $this->modifiedColumns[] = QuotePeer::QUOTE_DATEEXPIRATION;
            }
        } // if either are not null


        return $this;
    } // setQuoteDateexpiration()

    /**
     * Set the value of [quote_status] column.
     *
     * @param  string $v new value
     * @return Quote The current object (for fluent API support)
     */
    public function setQuoteStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quote_status !== $v) {
            $this->quote_status = $v;
            $this->modifiedColumns[] = QuotePeer::QUOTE_STATUS;
        }


        return $this;
    } // setQuoteStatus()

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
            if ($this->quote_status !== 'active') {
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

            $this->idquote = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idtriggerprospection = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->quote_dateexpiration = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->quote_status = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = QuotePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Quote object", $e);
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
            $con = Propel::getConnection(QuotePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = QuotePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTriggerprospection = null;
            $this->collQuoteitems = null;

            $this->collQuoutenotes = null;

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
            $con = Propel::getConnection(QuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = QuoteQuery::create()
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
            $con = Propel::getConnection(QuotePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                QuotePeer::addInstanceToPool($this);
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

            if ($this->quoteitemsScheduledForDeletion !== null) {
                if (!$this->quoteitemsScheduledForDeletion->isEmpty()) {
                    QuoteitemQuery::create()
                        ->filterByPrimaryKeys($this->quoteitemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quoteitemsScheduledForDeletion = null;
                }
            }

            if ($this->collQuoteitems !== null) {
                foreach ($this->collQuoteitems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->quoutenotesScheduledForDeletion !== null) {
                if (!$this->quoutenotesScheduledForDeletion->isEmpty()) {
                    QuoutenoteQuery::create()
                        ->filterByPrimaryKeys($this->quoutenotesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->quoutenotesScheduledForDeletion = null;
                }
            }

            if ($this->collQuoutenotes !== null) {
                foreach ($this->collQuoutenotes as $referrerFK) {
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

        $this->modifiedColumns[] = QuotePeer::IDQUOTE;
        if (null !== $this->idquote) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuotePeer::IDQUOTE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(QuotePeer::IDQUOTE)) {
            $modifiedColumns[':p' . $index++]  = '`idquote`';
        }
        if ($this->isColumnModified(QuotePeer::IDTRIGGERPROSPECTION)) {
            $modifiedColumns[':p' . $index++]  = '`idtriggerprospection`';
        }
        if ($this->isColumnModified(QuotePeer::QUOTE_DATEEXPIRATION)) {
            $modifiedColumns[':p' . $index++]  = '`quote_dateexpiration`';
        }
        if ($this->isColumnModified(QuotePeer::QUOTE_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`quote_status`';
        }

        $sql = sprintf(
            'INSERT INTO `quote` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idquote`':
                        $stmt->bindValue($identifier, $this->idquote, PDO::PARAM_INT);
                        break;
                    case '`idtriggerprospection`':
                        $stmt->bindValue($identifier, $this->idtriggerprospection, PDO::PARAM_INT);
                        break;
                    case '`quote_dateexpiration`':
                        $stmt->bindValue($identifier, $this->quote_dateexpiration, PDO::PARAM_STR);
                        break;
                    case '`quote_status`':
                        $stmt->bindValue($identifier, $this->quote_status, PDO::PARAM_STR);
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
        $this->setIdquote($pk);

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


            if (($retval = QuotePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collQuoteitems !== null) {
                    foreach ($this->collQuoteitems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collQuoutenotes !== null) {
                    foreach ($this->collQuoutenotes as $referrerFK) {
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
        $pos = QuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdquote();
                break;
            case 1:
                return $this->getIdtriggerprospection();
                break;
            case 2:
                return $this->getQuoteDateexpiration();
                break;
            case 3:
                return $this->getQuoteStatus();
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
        if (isset($alreadyDumpedObjects['Quote'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Quote'][$this->getPrimaryKey()] = true;
        $keys = QuotePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdquote(),
            $keys[1] => $this->getIdtriggerprospection(),
            $keys[2] => $this->getQuoteDateexpiration(),
            $keys[3] => $this->getQuoteStatus(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTriggerprospection) {
                $result['Triggerprospection'] = $this->aTriggerprospection->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collQuoteitems) {
                $result['Quoteitems'] = $this->collQuoteitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collQuoutenotes) {
                $result['Quoutenotes'] = $this->collQuoutenotes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = QuotePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdquote($value);
                break;
            case 1:
                $this->setIdtriggerprospection($value);
                break;
            case 2:
                $this->setQuoteDateexpiration($value);
                break;
            case 3:
                $this->setQuoteStatus($value);
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
        $keys = QuotePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdquote($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdtriggerprospection($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setQuoteDateexpiration($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setQuoteStatus($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuotePeer::DATABASE_NAME);

        if ($this->isColumnModified(QuotePeer::IDQUOTE)) $criteria->add(QuotePeer::IDQUOTE, $this->idquote);
        if ($this->isColumnModified(QuotePeer::IDTRIGGERPROSPECTION)) $criteria->add(QuotePeer::IDTRIGGERPROSPECTION, $this->idtriggerprospection);
        if ($this->isColumnModified(QuotePeer::QUOTE_DATEEXPIRATION)) $criteria->add(QuotePeer::QUOTE_DATEEXPIRATION, $this->quote_dateexpiration);
        if ($this->isColumnModified(QuotePeer::QUOTE_STATUS)) $criteria->add(QuotePeer::QUOTE_STATUS, $this->quote_status);

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
        $criteria = new Criteria(QuotePeer::DATABASE_NAME);
        $criteria->add(QuotePeer::IDQUOTE, $this->idquote);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdquote();
    }

    /**
     * Generic method to set the primary key (idquote column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdquote($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdquote();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Quote (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdtriggerprospection($this->getIdtriggerprospection());
        $copyObj->setQuoteDateexpiration($this->getQuoteDateexpiration());
        $copyObj->setQuoteStatus($this->getQuoteStatus());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getQuoteitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuoteitem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getQuoutenotes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuoutenote($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdquote(NULL); // this is a auto-increment column, so set to default value
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
     * @return Quote Clone of current object.
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
     * @return QuotePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new QuotePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Triggerprospection object.
     *
     * @param                  Triggerprospection $v
     * @return Quote The current object (for fluent API support)
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
            $v->addQuote($this);
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
                $this->aTriggerprospection->addQuotes($this);
             */
        }

        return $this->aTriggerprospection;
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
        if ('Quoteitem' == $relationName) {
            $this->initQuoteitems();
        }
        if ('Quoutenote' == $relationName) {
            $this->initQuoutenotes();
        }
    }

    /**
     * Clears out the collQuoteitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Quote The current object (for fluent API support)
     * @see        addQuoteitems()
     */
    public function clearQuoteitems()
    {
        $this->collQuoteitems = null; // important to set this to null since that means it is uninitialized
        $this->collQuoteitemsPartial = null;

        return $this;
    }

    /**
     * reset is the collQuoteitems collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuoteitems($v = true)
    {
        $this->collQuoteitemsPartial = $v;
    }

    /**
     * Initializes the collQuoteitems collection.
     *
     * By default this just sets the collQuoteitems collection to an empty array (like clearcollQuoteitems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuoteitems($overrideExisting = true)
    {
        if (null !== $this->collQuoteitems && !$overrideExisting) {
            return;
        }
        $this->collQuoteitems = new PropelObjectCollection();
        $this->collQuoteitems->setModel('Quoteitem');
    }

    /**
     * Gets an array of Quoteitem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Quote is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Quoteitem[] List of Quoteitem objects
     * @throws PropelException
     */
    public function getQuoteitems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuoteitemsPartial && !$this->isNew();
        if (null === $this->collQuoteitems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuoteitems) {
                // return empty collection
                $this->initQuoteitems();
            } else {
                $collQuoteitems = QuoteitemQuery::create(null, $criteria)
                    ->filterByQuote($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuoteitemsPartial && count($collQuoteitems)) {
                      $this->initQuoteitems(false);

                      foreach ($collQuoteitems as $obj) {
                        if (false == $this->collQuoteitems->contains($obj)) {
                          $this->collQuoteitems->append($obj);
                        }
                      }

                      $this->collQuoteitemsPartial = true;
                    }

                    $collQuoteitems->getInternalIterator()->rewind();

                    return $collQuoteitems;
                }

                if ($partial && $this->collQuoteitems) {
                    foreach ($this->collQuoteitems as $obj) {
                        if ($obj->isNew()) {
                            $collQuoteitems[] = $obj;
                        }
                    }
                }

                $this->collQuoteitems = $collQuoteitems;
                $this->collQuoteitemsPartial = false;
            }
        }

        return $this->collQuoteitems;
    }

    /**
     * Sets a collection of Quoteitem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quoteitems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Quote The current object (for fluent API support)
     */
    public function setQuoteitems(PropelCollection $quoteitems, PropelPDO $con = null)
    {
        $quoteitemsToDelete = $this->getQuoteitems(new Criteria(), $con)->diff($quoteitems);


        $this->quoteitemsScheduledForDeletion = $quoteitemsToDelete;

        foreach ($quoteitemsToDelete as $quoteitemRemoved) {
            $quoteitemRemoved->setQuote(null);
        }

        $this->collQuoteitems = null;
        foreach ($quoteitems as $quoteitem) {
            $this->addQuoteitem($quoteitem);
        }

        $this->collQuoteitems = $quoteitems;
        $this->collQuoteitemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Quoteitem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Quoteitem objects.
     * @throws PropelException
     */
    public function countQuoteitems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuoteitemsPartial && !$this->isNew();
        if (null === $this->collQuoteitems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuoteitems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getQuoteitems());
            }
            $query = QuoteitemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuote($this)
                ->count($con);
        }

        return count($this->collQuoteitems);
    }

    /**
     * Method called to associate a Quoteitem object to this object
     * through the Quoteitem foreign key attribute.
     *
     * @param    Quoteitem $l Quoteitem
     * @return Quote The current object (for fluent API support)
     */
    public function addQuoteitem(Quoteitem $l)
    {
        if ($this->collQuoteitems === null) {
            $this->initQuoteitems();
            $this->collQuoteitemsPartial = true;
        }

        if (!in_array($l, $this->collQuoteitems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuoteitem($l);

            if ($this->quoteitemsScheduledForDeletion and $this->quoteitemsScheduledForDeletion->contains($l)) {
                $this->quoteitemsScheduledForDeletion->remove($this->quoteitemsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Quoteitem $quoteitem The quoteitem object to add.
     */
    protected function doAddQuoteitem($quoteitem)
    {
        $this->collQuoteitems[]= $quoteitem;
        $quoteitem->setQuote($this);
    }

    /**
     * @param	Quoteitem $quoteitem The quoteitem object to remove.
     * @return Quote The current object (for fluent API support)
     */
    public function removeQuoteitem($quoteitem)
    {
        if ($this->getQuoteitems()->contains($quoteitem)) {
            $this->collQuoteitems->remove($this->collQuoteitems->search($quoteitem));
            if (null === $this->quoteitemsScheduledForDeletion) {
                $this->quoteitemsScheduledForDeletion = clone $this->collQuoteitems;
                $this->quoteitemsScheduledForDeletion->clear();
            }
            $this->quoteitemsScheduledForDeletion[]= clone $quoteitem;
            $quoteitem->setQuote(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Quote is new, it will return
     * an empty collection; or if this Quote has previously
     * been saved, it will retrieve related Quoteitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Quote.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Quoteitem[] List of Quoteitem objects
     */
    public function getQuoteitemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = QuoteitemQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getQuoteitems($query, $con);
    }

    /**
     * Clears out the collQuoutenotes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Quote The current object (for fluent API support)
     * @see        addQuoutenotes()
     */
    public function clearQuoutenotes()
    {
        $this->collQuoutenotes = null; // important to set this to null since that means it is uninitialized
        $this->collQuoutenotesPartial = null;

        return $this;
    }

    /**
     * reset is the collQuoutenotes collection loaded partially
     *
     * @return void
     */
    public function resetPartialQuoutenotes($v = true)
    {
        $this->collQuoutenotesPartial = $v;
    }

    /**
     * Initializes the collQuoutenotes collection.
     *
     * By default this just sets the collQuoutenotes collection to an empty array (like clearcollQuoutenotes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initQuoutenotes($overrideExisting = true)
    {
        if (null !== $this->collQuoutenotes && !$overrideExisting) {
            return;
        }
        $this->collQuoutenotes = new PropelObjectCollection();
        $this->collQuoutenotes->setModel('Quoutenote');
    }

    /**
     * Gets an array of Quoutenote objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Quote is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Quoutenote[] List of Quoutenote objects
     * @throws PropelException
     */
    public function getQuoutenotes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collQuoutenotesPartial && !$this->isNew();
        if (null === $this->collQuoutenotes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collQuoutenotes) {
                // return empty collection
                $this->initQuoutenotes();
            } else {
                $collQuoutenotes = QuoutenoteQuery::create(null, $criteria)
                    ->filterByQuote($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collQuoutenotesPartial && count($collQuoutenotes)) {
                      $this->initQuoutenotes(false);

                      foreach ($collQuoutenotes as $obj) {
                        if (false == $this->collQuoutenotes->contains($obj)) {
                          $this->collQuoutenotes->append($obj);
                        }
                      }

                      $this->collQuoutenotesPartial = true;
                    }

                    $collQuoutenotes->getInternalIterator()->rewind();

                    return $collQuoutenotes;
                }

                if ($partial && $this->collQuoutenotes) {
                    foreach ($this->collQuoutenotes as $obj) {
                        if ($obj->isNew()) {
                            $collQuoutenotes[] = $obj;
                        }
                    }
                }

                $this->collQuoutenotes = $collQuoutenotes;
                $this->collQuoutenotesPartial = false;
            }
        }

        return $this->collQuoutenotes;
    }

    /**
     * Sets a collection of Quoutenote objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $quoutenotes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Quote The current object (for fluent API support)
     */
    public function setQuoutenotes(PropelCollection $quoutenotes, PropelPDO $con = null)
    {
        $quoutenotesToDelete = $this->getQuoutenotes(new Criteria(), $con)->diff($quoutenotes);


        $this->quoutenotesScheduledForDeletion = $quoutenotesToDelete;

        foreach ($quoutenotesToDelete as $quoutenoteRemoved) {
            $quoutenoteRemoved->setQuote(null);
        }

        $this->collQuoutenotes = null;
        foreach ($quoutenotes as $quoutenote) {
            $this->addQuoutenote($quoutenote);
        }

        $this->collQuoutenotes = $quoutenotes;
        $this->collQuoutenotesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Quoutenote objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Quoutenote objects.
     * @throws PropelException
     */
    public function countQuoutenotes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collQuoutenotesPartial && !$this->isNew();
        if (null === $this->collQuoutenotes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collQuoutenotes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getQuoutenotes());
            }
            $query = QuoutenoteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByQuote($this)
                ->count($con);
        }

        return count($this->collQuoutenotes);
    }

    /**
     * Method called to associate a Quoutenote object to this object
     * through the Quoutenote foreign key attribute.
     *
     * @param    Quoutenote $l Quoutenote
     * @return Quote The current object (for fluent API support)
     */
    public function addQuoutenote(Quoutenote $l)
    {
        if ($this->collQuoutenotes === null) {
            $this->initQuoutenotes();
            $this->collQuoutenotesPartial = true;
        }

        if (!in_array($l, $this->collQuoutenotes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddQuoutenote($l);

            if ($this->quoutenotesScheduledForDeletion and $this->quoutenotesScheduledForDeletion->contains($l)) {
                $this->quoutenotesScheduledForDeletion->remove($this->quoutenotesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Quoutenote $quoutenote The quoutenote object to add.
     */
    protected function doAddQuoutenote($quoutenote)
    {
        $this->collQuoutenotes[]= $quoutenote;
        $quoutenote->setQuote($this);
    }

    /**
     * @param	Quoutenote $quoutenote The quoutenote object to remove.
     * @return Quote The current object (for fluent API support)
     */
    public function removeQuoutenote($quoutenote)
    {
        if ($this->getQuoutenotes()->contains($quoutenote)) {
            $this->collQuoutenotes->remove($this->collQuoutenotes->search($quoutenote));
            if (null === $this->quoutenotesScheduledForDeletion) {
                $this->quoutenotesScheduledForDeletion = clone $this->collQuoutenotes;
                $this->quoutenotesScheduledForDeletion->clear();
            }
            $this->quoutenotesScheduledForDeletion[]= clone $quoutenote;
            $quoutenote->setQuote(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Quote is new, it will return
     * an empty collection; or if this Quote has previously
     * been saved, it will retrieve related Quoutenotes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Quote.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Quoutenote[] List of Quoutenote objects
     */
    public function getQuoutenotesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = QuoutenoteQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getQuoutenotes($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idquote = null;
        $this->idtriggerprospection = null;
        $this->quote_dateexpiration = null;
        $this->quote_status = null;
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
            if ($this->collQuoteitems) {
                foreach ($this->collQuoteitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collQuoutenotes) {
                foreach ($this->collQuoutenotes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTriggerprospection instanceof Persistent) {
              $this->aTriggerprospection->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collQuoteitems instanceof PropelCollection) {
            $this->collQuoteitems->clearIterator();
        }
        $this->collQuoteitems = null;
        if ($this->collQuoutenotes instanceof PropelCollection) {
            $this->collQuoutenotes->clearIterator();
        }
        $this->collQuoutenotes = null;
        $this->aTriggerprospection = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuotePeer::DEFAULT_STRING_FORMAT);
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
