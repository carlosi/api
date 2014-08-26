<?php


/**
 * Base class that represents a row from the 'marketingcampaign' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMarketingcampaign extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MarketingcampaignPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MarketingcampaignPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmarketingcampaign field.
     * @var        int
     */
    protected $idmarketingcampaign;

    /**
     * The value for the idmarketingchannel field.
     * @var        int
     */
    protected $idmarketingchannel;

    /**
     * The value for the marketingcampaign_name field.
     * @var        string
     */
    protected $marketingcampaign_name;

    /**
     * The value for the marketingcampaign_created_at field.
     * @var        string
     */
    protected $marketingcampaign_created_at;

    /**
     * @var        Marketingchannel
     */
    protected $aMarketingchannel;

    /**
     * @var        PropelObjectCollection|Marketingcampaignclient[] Collection to store aggregation of Marketingcampaignclient objects.
     */
    protected $collMarketingcampaignclients;
    protected $collMarketingcampaignclientsPartial;

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
    protected $marketingcampaignclientsScheduledForDeletion = null;

    /**
     * Get the [idmarketingcampaign] column value.
     *
     * @return int
     */
    public function getIdmarketingcampaign()
    {

        return $this->idmarketingcampaign;
    }

    /**
     * Get the [idmarketingchannel] column value.
     *
     * @return int
     */
    public function getIdmarketingchannel()
    {

        return $this->idmarketingchannel;
    }

    /**
     * Get the [marketingcampaign_name] column value.
     *
     * @return string
     */
    public function getMarketingcampaignName()
    {

        return $this->marketingcampaign_name;
    }

    /**
     * Get the [optionally formatted] temporal [marketingcampaign_created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMarketingcampaignCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->marketingcampaign_created_at === null) {
            return null;
        }

        if ($this->marketingcampaign_created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->marketingcampaign_created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->marketingcampaign_created_at, true), $x);
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
     * Set the value of [idmarketingcampaign] column.
     *
     * @param  int $v new value
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function setIdmarketingcampaign($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingcampaign !== $v) {
            $this->idmarketingcampaign = $v;
            $this->modifiedColumns[] = MarketingcampaignPeer::IDMARKETINGCAMPAIGN;
        }


        return $this;
    } // setIdmarketingcampaign()

    /**
     * Set the value of [idmarketingchannel] column.
     *
     * @param  int $v new value
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function setIdmarketingchannel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmarketingchannel !== $v) {
            $this->idmarketingchannel = $v;
            $this->modifiedColumns[] = MarketingcampaignPeer::IDMARKETINGCHANNEL;
        }

        if ($this->aMarketingchannel !== null && $this->aMarketingchannel->getIdmarketingchannel() !== $v) {
            $this->aMarketingchannel = null;
        }


        return $this;
    } // setIdmarketingchannel()

    /**
     * Set the value of [marketingcampaign_name] column.
     *
     * @param  string $v new value
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function setMarketingcampaignName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->marketingcampaign_name !== $v) {
            $this->marketingcampaign_name = $v;
            $this->modifiedColumns[] = MarketingcampaignPeer::MARKETINGCAMPAIGN_NAME;
        }


        return $this;
    } // setMarketingcampaignName()

    /**
     * Sets the value of [marketingcampaign_created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function setMarketingcampaignCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->marketingcampaign_created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->marketingcampaign_created_at !== null && $tmpDt = new DateTime($this->marketingcampaign_created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->marketingcampaign_created_at = $newDateAsString;
                $this->modifiedColumns[] = MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setMarketingcampaignCreatedAt()

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

            $this->idmarketingcampaign = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idmarketingchannel = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->marketingcampaign_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->marketingcampaign_created_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = MarketingcampaignPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Marketingcampaign object", $e);
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

        if ($this->aMarketingchannel !== null && $this->idmarketingchannel !== $this->aMarketingchannel->getIdmarketingchannel()) {
            $this->aMarketingchannel = null;
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
            $con = Propel::getConnection(MarketingcampaignPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MarketingcampaignPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMarketingchannel = null;
            $this->collMarketingcampaignclients = null;

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
            $con = Propel::getConnection(MarketingcampaignPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MarketingcampaignQuery::create()
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
            $con = Propel::getConnection(MarketingcampaignPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MarketingcampaignPeer::addInstanceToPool($this);
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

            if ($this->aMarketingchannel !== null) {
                if ($this->aMarketingchannel->isModified() || $this->aMarketingchannel->isNew()) {
                    $affectedRows += $this->aMarketingchannel->save($con);
                }
                $this->setMarketingchannel($this->aMarketingchannel);
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

            if ($this->marketingcampaignclientsScheduledForDeletion !== null) {
                if (!$this->marketingcampaignclientsScheduledForDeletion->isEmpty()) {
                    MarketingcampaignclientQuery::create()
                        ->filterByPrimaryKeys($this->marketingcampaignclientsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->marketingcampaignclientsScheduledForDeletion = null;
                }
            }

            if ($this->collMarketingcampaignclients !== null) {
                foreach ($this->collMarketingcampaignclients as $referrerFK) {
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

        $this->modifiedColumns[] = MarketingcampaignPeer::IDMARKETINGCAMPAIGN;
        if (null !== $this->idmarketingcampaign) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MarketingcampaignPeer::IDMARKETINGCAMPAIGN . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MarketingcampaignPeer::IDMARKETINGCAMPAIGN)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingcampaign`';
        }
        if ($this->isColumnModified(MarketingcampaignPeer::IDMARKETINGCHANNEL)) {
            $modifiedColumns[':p' . $index++]  = '`idmarketingchannel`';
        }
        if ($this->isColumnModified(MarketingcampaignPeer::MARKETINGCAMPAIGN_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`marketingcampaign_name`';
        }
        if ($this->isColumnModified(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`marketingcampaign_created_at`';
        }

        $sql = sprintf(
            'INSERT INTO `marketingcampaign` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmarketingcampaign`':
                        $stmt->bindValue($identifier, $this->idmarketingcampaign, PDO::PARAM_INT);
                        break;
                    case '`idmarketingchannel`':
                        $stmt->bindValue($identifier, $this->idmarketingchannel, PDO::PARAM_INT);
                        break;
                    case '`marketingcampaign_name`':
                        $stmt->bindValue($identifier, $this->marketingcampaign_name, PDO::PARAM_STR);
                        break;
                    case '`marketingcampaign_created_at`':
                        $stmt->bindValue($identifier, $this->marketingcampaign_created_at, PDO::PARAM_STR);
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
        $this->setIdmarketingcampaign($pk);

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

            if ($this->aMarketingchannel !== null) {
                if (!$this->aMarketingchannel->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMarketingchannel->getValidationFailures());
                }
            }


            if (($retval = MarketingcampaignPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMarketingcampaignclients !== null) {
                    foreach ($this->collMarketingcampaignclients as $referrerFK) {
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
        $pos = MarketingcampaignPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmarketingcampaign();
                break;
            case 1:
                return $this->getIdmarketingchannel();
                break;
            case 2:
                return $this->getMarketingcampaignName();
                break;
            case 3:
                return $this->getMarketingcampaignCreatedAt();
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
        if (isset($alreadyDumpedObjects['Marketingcampaign'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Marketingcampaign'][$this->getPrimaryKey()] = true;
        $keys = MarketingcampaignPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmarketingcampaign(),
            $keys[1] => $this->getIdmarketingchannel(),
            $keys[2] => $this->getMarketingcampaignName(),
            $keys[3] => $this->getMarketingcampaignCreatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMarketingchannel) {
                $result['Marketingchannel'] = $this->aMarketingchannel->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMarketingcampaignclients) {
                $result['Marketingcampaignclients'] = $this->collMarketingcampaignclients->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MarketingcampaignPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmarketingcampaign($value);
                break;
            case 1:
                $this->setIdmarketingchannel($value);
                break;
            case 2:
                $this->setMarketingcampaignName($value);
                break;
            case 3:
                $this->setMarketingcampaignCreatedAt($value);
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
        $keys = MarketingcampaignPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmarketingcampaign($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdmarketingchannel($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMarketingcampaignName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMarketingcampaignCreatedAt($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MarketingcampaignPeer::DATABASE_NAME);

        if ($this->isColumnModified(MarketingcampaignPeer::IDMARKETINGCAMPAIGN)) $criteria->add(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $this->idmarketingcampaign);
        if ($this->isColumnModified(MarketingcampaignPeer::IDMARKETINGCHANNEL)) $criteria->add(MarketingcampaignPeer::IDMARKETINGCHANNEL, $this->idmarketingchannel);
        if ($this->isColumnModified(MarketingcampaignPeer::MARKETINGCAMPAIGN_NAME)) $criteria->add(MarketingcampaignPeer::MARKETINGCAMPAIGN_NAME, $this->marketingcampaign_name);
        if ($this->isColumnModified(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT)) $criteria->add(MarketingcampaignPeer::MARKETINGCAMPAIGN_CREATED_AT, $this->marketingcampaign_created_at);

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
        $criteria = new Criteria(MarketingcampaignPeer::DATABASE_NAME);
        $criteria->add(MarketingcampaignPeer::IDMARKETINGCAMPAIGN, $this->idmarketingcampaign);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmarketingcampaign();
    }

    /**
     * Generic method to set the primary key (idmarketingcampaign column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmarketingcampaign($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmarketingcampaign();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Marketingcampaign (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdmarketingchannel($this->getIdmarketingchannel());
        $copyObj->setMarketingcampaignName($this->getMarketingcampaignName());
        $copyObj->setMarketingcampaignCreatedAt($this->getMarketingcampaignCreatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMarketingcampaignclients() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMarketingcampaignclient($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdmarketingcampaign(NULL); // this is a auto-increment column, so set to default value
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
     * @return Marketingcampaign Clone of current object.
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
     * @return MarketingcampaignPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MarketingcampaignPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Marketingchannel object.
     *
     * @param                  Marketingchannel $v
     * @return Marketingcampaign The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMarketingchannel(Marketingchannel $v = null)
    {
        if ($v === null) {
            $this->setIdmarketingchannel(NULL);
        } else {
            $this->setIdmarketingchannel($v->getIdmarketingchannel());
        }

        $this->aMarketingchannel = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Marketingchannel object, it will not be re-added.
        if ($v !== null) {
            $v->addMarketingcampaign($this);
        }


        return $this;
    }


    /**
     * Get the associated Marketingchannel object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Marketingchannel The associated Marketingchannel object.
     * @throws PropelException
     */
    public function getMarketingchannel(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMarketingchannel === null && ($this->idmarketingchannel !== null) && $doQuery) {
            $this->aMarketingchannel = MarketingchannelQuery::create()->findPk($this->idmarketingchannel, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMarketingchannel->addMarketingcampaigns($this);
             */
        }

        return $this->aMarketingchannel;
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
        if ('Marketingcampaignclient' == $relationName) {
            $this->initMarketingcampaignclients();
        }
    }

    /**
     * Clears out the collMarketingcampaignclients collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Marketingcampaign The current object (for fluent API support)
     * @see        addMarketingcampaignclients()
     */
    public function clearMarketingcampaignclients()
    {
        $this->collMarketingcampaignclients = null; // important to set this to null since that means it is uninitialized
        $this->collMarketingcampaignclientsPartial = null;

        return $this;
    }

    /**
     * reset is the collMarketingcampaignclients collection loaded partially
     *
     * @return void
     */
    public function resetPartialMarketingcampaignclients($v = true)
    {
        $this->collMarketingcampaignclientsPartial = $v;
    }

    /**
     * Initializes the collMarketingcampaignclients collection.
     *
     * By default this just sets the collMarketingcampaignclients collection to an empty array (like clearcollMarketingcampaignclients());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMarketingcampaignclients($overrideExisting = true)
    {
        if (null !== $this->collMarketingcampaignclients && !$overrideExisting) {
            return;
        }
        $this->collMarketingcampaignclients = new PropelObjectCollection();
        $this->collMarketingcampaignclients->setModel('Marketingcampaignclient');
    }

    /**
     * Gets an array of Marketingcampaignclient objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Marketingcampaign is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Marketingcampaignclient[] List of Marketingcampaignclient objects
     * @throws PropelException
     */
    public function getMarketingcampaignclients($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMarketingcampaignclientsPartial && !$this->isNew();
        if (null === $this->collMarketingcampaignclients || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMarketingcampaignclients) {
                // return empty collection
                $this->initMarketingcampaignclients();
            } else {
                $collMarketingcampaignclients = MarketingcampaignclientQuery::create(null, $criteria)
                    ->filterByMarketingcampaign($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMarketingcampaignclientsPartial && count($collMarketingcampaignclients)) {
                      $this->initMarketingcampaignclients(false);

                      foreach ($collMarketingcampaignclients as $obj) {
                        if (false == $this->collMarketingcampaignclients->contains($obj)) {
                          $this->collMarketingcampaignclients->append($obj);
                        }
                      }

                      $this->collMarketingcampaignclientsPartial = true;
                    }

                    $collMarketingcampaignclients->getInternalIterator()->rewind();

                    return $collMarketingcampaignclients;
                }

                if ($partial && $this->collMarketingcampaignclients) {
                    foreach ($this->collMarketingcampaignclients as $obj) {
                        if ($obj->isNew()) {
                            $collMarketingcampaignclients[] = $obj;
                        }
                    }
                }

                $this->collMarketingcampaignclients = $collMarketingcampaignclients;
                $this->collMarketingcampaignclientsPartial = false;
            }
        }

        return $this->collMarketingcampaignclients;
    }

    /**
     * Sets a collection of Marketingcampaignclient objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $marketingcampaignclients A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function setMarketingcampaignclients(PropelCollection $marketingcampaignclients, PropelPDO $con = null)
    {
        $marketingcampaignclientsToDelete = $this->getMarketingcampaignclients(new Criteria(), $con)->diff($marketingcampaignclients);


        $this->marketingcampaignclientsScheduledForDeletion = $marketingcampaignclientsToDelete;

        foreach ($marketingcampaignclientsToDelete as $marketingcampaignclientRemoved) {
            $marketingcampaignclientRemoved->setMarketingcampaign(null);
        }

        $this->collMarketingcampaignclients = null;
        foreach ($marketingcampaignclients as $marketingcampaignclient) {
            $this->addMarketingcampaignclient($marketingcampaignclient);
        }

        $this->collMarketingcampaignclients = $marketingcampaignclients;
        $this->collMarketingcampaignclientsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Marketingcampaignclient objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Marketingcampaignclient objects.
     * @throws PropelException
     */
    public function countMarketingcampaignclients(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMarketingcampaignclientsPartial && !$this->isNew();
        if (null === $this->collMarketingcampaignclients || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMarketingcampaignclients) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMarketingcampaignclients());
            }
            $query = MarketingcampaignclientQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMarketingcampaign($this)
                ->count($con);
        }

        return count($this->collMarketingcampaignclients);
    }

    /**
     * Method called to associate a Marketingcampaignclient object to this object
     * through the Marketingcampaignclient foreign key attribute.
     *
     * @param    Marketingcampaignclient $l Marketingcampaignclient
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function addMarketingcampaignclient(Marketingcampaignclient $l)
    {
        if ($this->collMarketingcampaignclients === null) {
            $this->initMarketingcampaignclients();
            $this->collMarketingcampaignclientsPartial = true;
        }

        if (!in_array($l, $this->collMarketingcampaignclients->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMarketingcampaignclient($l);

            if ($this->marketingcampaignclientsScheduledForDeletion and $this->marketingcampaignclientsScheduledForDeletion->contains($l)) {
                $this->marketingcampaignclientsScheduledForDeletion->remove($this->marketingcampaignclientsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Marketingcampaignclient $marketingcampaignclient The marketingcampaignclient object to add.
     */
    protected function doAddMarketingcampaignclient($marketingcampaignclient)
    {
        $this->collMarketingcampaignclients[]= $marketingcampaignclient;
        $marketingcampaignclient->setMarketingcampaign($this);
    }

    /**
     * @param	Marketingcampaignclient $marketingcampaignclient The marketingcampaignclient object to remove.
     * @return Marketingcampaign The current object (for fluent API support)
     */
    public function removeMarketingcampaignclient($marketingcampaignclient)
    {
        if ($this->getMarketingcampaignclients()->contains($marketingcampaignclient)) {
            $this->collMarketingcampaignclients->remove($this->collMarketingcampaignclients->search($marketingcampaignclient));
            if (null === $this->marketingcampaignclientsScheduledForDeletion) {
                $this->marketingcampaignclientsScheduledForDeletion = clone $this->collMarketingcampaignclients;
                $this->marketingcampaignclientsScheduledForDeletion->clear();
            }
            $this->marketingcampaignclientsScheduledForDeletion[]= clone $marketingcampaignclient;
            $marketingcampaignclient->setMarketingcampaign(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Marketingcampaign is new, it will return
     * an empty collection; or if this Marketingcampaign has previously
     * been saved, it will retrieve related Marketingcampaignclients from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Marketingcampaign.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Marketingcampaignclient[] List of Marketingcampaignclient objects
     */
    public function getMarketingcampaignclientsJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MarketingcampaignclientQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getMarketingcampaignclients($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmarketingcampaign = null;
        $this->idmarketingchannel = null;
        $this->marketingcampaign_name = null;
        $this->marketingcampaign_created_at = null;
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
            if ($this->collMarketingcampaignclients) {
                foreach ($this->collMarketingcampaignclients as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMarketingchannel instanceof Persistent) {
              $this->aMarketingchannel->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMarketingcampaignclients instanceof PropelCollection) {
            $this->collMarketingcampaignclients->clearIterator();
        }
        $this->collMarketingcampaignclients = null;
        $this->aMarketingchannel = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MarketingcampaignPeer::DEFAULT_STRING_FORMAT);
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
