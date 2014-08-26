<?php


/**
 * Base class that represents a row from the 'expensetransaction' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseExpensetransaction extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ExpensetransactionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ExpensetransactionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idexpensetransaction field.
     * @var        int
     */
    protected $idexpensetransaction;

    /**
     * The value for the idexpenseitem field.
     * @var        int
     */
    protected $idexpenseitem;

    /**
     * The value for the expensetransaction_status field.
     * Note: this column has a database default value of: 'suggestion'
     * @var        string
     */
    protected $expensetransaction_status;

    /**
     * The value for the expensetransaction_comment field.
     * @var        string
     */
    protected $expensetransaction_comment;

    /**
     * The value for the expensetransaction_quantity field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $expensetransaction_quantity;

    /**
     * The value for the expensetransaction_value field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $expensetransaction_value;

    /**
     * The value for the expensetransaction_date field.
     * @var        string
     */
    protected $expensetransaction_date;

    /**
     * The value for the expensetransaction_reason field.
     * Note: this column has a database default value of: 'operationcost'
     * @var        string
     */
    protected $expensetransaction_reason;

    /**
     * @var        Expenseitem
     */
    protected $aExpenseitem;

    /**
     * @var        PropelObjectCollection|Bankexpensetransaction[] Collection to store aggregation of Bankexpensetransaction objects.
     */
    protected $collBankexpensetransactions;
    protected $collBankexpensetransactionsPartial;

    /**
     * @var        PropelObjectCollection|Depreciationappreciation[] Collection to store aggregation of Depreciationappreciation objects.
     */
    protected $collDepreciationappreciations;
    protected $collDepreciationappreciationsPartial;

    /**
     * @var        PropelObjectCollection|Expensetransactionfile[] Collection to store aggregation of Expensetransactionfile objects.
     */
    protected $collExpensetransactionfiles;
    protected $collExpensetransactionfilesPartial;

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
    protected $bankexpensetransactionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $depreciationappreciationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $expensetransactionfilesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->expensetransaction_status = 'suggestion';
        $this->expensetransaction_quantity = '0.00';
        $this->expensetransaction_value = '0.00';
        $this->expensetransaction_reason = 'operationcost';
    }

    /**
     * Initializes internal state of BaseExpensetransaction object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idexpensetransaction] column value.
     *
     * @return int
     */
    public function getIdexpensetransaction()
    {

        return $this->idexpensetransaction;
    }

    /**
     * Get the [idexpenseitem] column value.
     *
     * @return int
     */
    public function getIdexpenseitem()
    {

        return $this->idexpenseitem;
    }

    /**
     * Get the [expensetransaction_status] column value.
     *
     * @return string
     */
    public function getExpensetransactionStatus()
    {

        return $this->expensetransaction_status;
    }

    /**
     * Get the [expensetransaction_comment] column value.
     *
     * @return string
     */
    public function getExpensetransactionComment()
    {

        return $this->expensetransaction_comment;
    }

    /**
     * Get the [expensetransaction_quantity] column value.
     *
     * @return string
     */
    public function getExpensetransactionQuantity()
    {

        return $this->expensetransaction_quantity;
    }

    /**
     * Get the [expensetransaction_value] column value.
     *
     * @return string
     */
    public function getExpensetransactionValue()
    {

        return $this->expensetransaction_value;
    }

    /**
     * Get the [optionally formatted] temporal [expensetransaction_date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpensetransactionDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expensetransaction_date === null) {
            return null;
        }

        if ($this->expensetransaction_date === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->expensetransaction_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expensetransaction_date, true), $x);
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
     * Get the [expensetransaction_reason] column value.
     *
     * @return string
     */
    public function getExpensetransactionReason()
    {

        return $this->expensetransaction_reason;
    }

    /**
     * Set the value of [idexpensetransaction] column.
     *
     * @param  int $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setIdexpensetransaction($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpensetransaction !== $v) {
            $this->idexpensetransaction = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::IDEXPENSETRANSACTION;
        }


        return $this;
    } // setIdexpensetransaction()

    /**
     * Set the value of [idexpenseitem] column.
     *
     * @param  int $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setIdexpenseitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idexpenseitem !== $v) {
            $this->idexpenseitem = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::IDEXPENSEITEM;
        }

        if ($this->aExpenseitem !== null && $this->aExpenseitem->getIdexpenseitem() !== $v) {
            $this->aExpenseitem = null;
        }


        return $this;
    } // setIdexpenseitem()

    /**
     * Set the value of [expensetransaction_status] column.
     *
     * @param  string $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expensetransaction_status !== $v) {
            $this->expensetransaction_status = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_STATUS;
        }


        return $this;
    } // setExpensetransactionStatus()

    /**
     * Set the value of [expensetransaction_comment] column.
     *
     * @param  string $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expensetransaction_comment !== $v) {
            $this->expensetransaction_comment = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_COMMENT;
        }


        return $this;
    } // setExpensetransactionComment()

    /**
     * Set the value of [expensetransaction_quantity] column.
     *
     * @param  string $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionQuantity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->expensetransaction_quantity !== $v) {
            $this->expensetransaction_quantity = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY;
        }


        return $this;
    } // setExpensetransactionQuantity()

    /**
     * Set the value of [expensetransaction_value] column.
     *
     * @param  string $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->expensetransaction_value !== $v) {
            $this->expensetransaction_value = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_VALUE;
        }


        return $this;
    } // setExpensetransactionValue()

    /**
     * Sets the value of [expensetransaction_date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expensetransaction_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expensetransaction_date !== null && $tmpDt = new DateTime($this->expensetransaction_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expensetransaction_date = $newDateAsString;
                $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpensetransactionDate()

    /**
     * Set the value of [expensetransaction_reason] column.
     *
     * @param  string $v new value
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionReason($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->expensetransaction_reason !== $v) {
            $this->expensetransaction_reason = $v;
            $this->modifiedColumns[] = ExpensetransactionPeer::EXPENSETRANSACTION_REASON;
        }


        return $this;
    } // setExpensetransactionReason()

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
            if ($this->expensetransaction_status !== 'suggestion') {
                return false;
            }

            if ($this->expensetransaction_quantity !== '0.00') {
                return false;
            }

            if ($this->expensetransaction_value !== '0.00') {
                return false;
            }

            if ($this->expensetransaction_reason !== 'operationcost') {
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

            $this->idexpensetransaction = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idexpenseitem = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->expensetransaction_status = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->expensetransaction_comment = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->expensetransaction_quantity = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->expensetransaction_value = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->expensetransaction_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->expensetransaction_reason = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = ExpensetransactionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Expensetransaction object", $e);
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

        if ($this->aExpenseitem !== null && $this->idexpenseitem !== $this->aExpenseitem->getIdexpenseitem()) {
            $this->aExpenseitem = null;
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
            $con = Propel::getConnection(ExpensetransactionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ExpensetransactionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aExpenseitem = null;
            $this->collBankexpensetransactions = null;

            $this->collDepreciationappreciations = null;

            $this->collExpensetransactionfiles = null;

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
            $con = Propel::getConnection(ExpensetransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ExpensetransactionQuery::create()
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
            $con = Propel::getConnection(ExpensetransactionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ExpensetransactionPeer::addInstanceToPool($this);
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

            if ($this->aExpenseitem !== null) {
                if ($this->aExpenseitem->isModified() || $this->aExpenseitem->isNew()) {
                    $affectedRows += $this->aExpenseitem->save($con);
                }
                $this->setExpenseitem($this->aExpenseitem);
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

            if ($this->bankexpensetransactionsScheduledForDeletion !== null) {
                if (!$this->bankexpensetransactionsScheduledForDeletion->isEmpty()) {
                    BankexpensetransactionQuery::create()
                        ->filterByPrimaryKeys($this->bankexpensetransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bankexpensetransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collBankexpensetransactions !== null) {
                foreach ($this->collBankexpensetransactions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->depreciationappreciationsScheduledForDeletion !== null) {
                if (!$this->depreciationappreciationsScheduledForDeletion->isEmpty()) {
                    DepreciationappreciationQuery::create()
                        ->filterByPrimaryKeys($this->depreciationappreciationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->depreciationappreciationsScheduledForDeletion = null;
                }
            }

            if ($this->collDepreciationappreciations !== null) {
                foreach ($this->collDepreciationappreciations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expensetransactionfilesScheduledForDeletion !== null) {
                if (!$this->expensetransactionfilesScheduledForDeletion->isEmpty()) {
                    ExpensetransactionfileQuery::create()
                        ->filterByPrimaryKeys($this->expensetransactionfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expensetransactionfilesScheduledForDeletion = null;
                }
            }

            if ($this->collExpensetransactionfiles !== null) {
                foreach ($this->collExpensetransactionfiles as $referrerFK) {
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

        $this->modifiedColumns[] = ExpensetransactionPeer::IDEXPENSETRANSACTION;
        if (null !== $this->idexpensetransaction) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ExpensetransactionPeer::IDEXPENSETRANSACTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ExpensetransactionPeer::IDEXPENSETRANSACTION)) {
            $modifiedColumns[':p' . $index++]  = '`idexpensetransaction`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::IDEXPENSEITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idexpenseitem`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_status`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_comment`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_quantity`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_value`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_date`';
        }
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_REASON)) {
            $modifiedColumns[':p' . $index++]  = '`expensetransaction_reason`';
        }

        $sql = sprintf(
            'INSERT INTO `expensetransaction` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idexpensetransaction`':
                        $stmt->bindValue($identifier, $this->idexpensetransaction, PDO::PARAM_INT);
                        break;
                    case '`idexpenseitem`':
                        $stmt->bindValue($identifier, $this->idexpenseitem, PDO::PARAM_INT);
                        break;
                    case '`expensetransaction_status`':
                        $stmt->bindValue($identifier, $this->expensetransaction_status, PDO::PARAM_STR);
                        break;
                    case '`expensetransaction_comment`':
                        $stmt->bindValue($identifier, $this->expensetransaction_comment, PDO::PARAM_STR);
                        break;
                    case '`expensetransaction_quantity`':
                        $stmt->bindValue($identifier, $this->expensetransaction_quantity, PDO::PARAM_STR);
                        break;
                    case '`expensetransaction_value`':
                        $stmt->bindValue($identifier, $this->expensetransaction_value, PDO::PARAM_STR);
                        break;
                    case '`expensetransaction_date`':
                        $stmt->bindValue($identifier, $this->expensetransaction_date, PDO::PARAM_STR);
                        break;
                    case '`expensetransaction_reason`':
                        $stmt->bindValue($identifier, $this->expensetransaction_reason, PDO::PARAM_STR);
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
        $this->setIdexpensetransaction($pk);

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

            if ($this->aExpenseitem !== null) {
                if (!$this->aExpenseitem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aExpenseitem->getValidationFailures());
                }
            }


            if (($retval = ExpensetransactionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBankexpensetransactions !== null) {
                    foreach ($this->collBankexpensetransactions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDepreciationappreciations !== null) {
                    foreach ($this->collDepreciationappreciations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collExpensetransactionfiles !== null) {
                    foreach ($this->collExpensetransactionfiles as $referrerFK) {
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
        $pos = ExpensetransactionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdexpensetransaction();
                break;
            case 1:
                return $this->getIdexpenseitem();
                break;
            case 2:
                return $this->getExpensetransactionStatus();
                break;
            case 3:
                return $this->getExpensetransactionComment();
                break;
            case 4:
                return $this->getExpensetransactionQuantity();
                break;
            case 5:
                return $this->getExpensetransactionValue();
                break;
            case 6:
                return $this->getExpensetransactionDate();
                break;
            case 7:
                return $this->getExpensetransactionReason();
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
        if (isset($alreadyDumpedObjects['Expensetransaction'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Expensetransaction'][$this->getPrimaryKey()] = true;
        $keys = ExpensetransactionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdexpensetransaction(),
            $keys[1] => $this->getIdexpenseitem(),
            $keys[2] => $this->getExpensetransactionStatus(),
            $keys[3] => $this->getExpensetransactionComment(),
            $keys[4] => $this->getExpensetransactionQuantity(),
            $keys[5] => $this->getExpensetransactionValue(),
            $keys[6] => $this->getExpensetransactionDate(),
            $keys[7] => $this->getExpensetransactionReason(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aExpenseitem) {
                $result['Expenseitem'] = $this->aExpenseitem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBankexpensetransactions) {
                $result['Bankexpensetransactions'] = $this->collBankexpensetransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDepreciationappreciations) {
                $result['Depreciationappreciations'] = $this->collDepreciationappreciations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpensetransactionfiles) {
                $result['Expensetransactionfiles'] = $this->collExpensetransactionfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ExpensetransactionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdexpensetransaction($value);
                break;
            case 1:
                $this->setIdexpenseitem($value);
                break;
            case 2:
                $this->setExpensetransactionStatus($value);
                break;
            case 3:
                $this->setExpensetransactionComment($value);
                break;
            case 4:
                $this->setExpensetransactionQuantity($value);
                break;
            case 5:
                $this->setExpensetransactionValue($value);
                break;
            case 6:
                $this->setExpensetransactionDate($value);
                break;
            case 7:
                $this->setExpensetransactionReason($value);
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
        $keys = ExpensetransactionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdexpensetransaction($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdexpenseitem($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setExpensetransactionStatus($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setExpensetransactionComment($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setExpensetransactionQuantity($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setExpensetransactionValue($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpensetransactionDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExpensetransactionReason($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ExpensetransactionPeer::DATABASE_NAME);

        if ($this->isColumnModified(ExpensetransactionPeer::IDEXPENSETRANSACTION)) $criteria->add(ExpensetransactionPeer::IDEXPENSETRANSACTION, $this->idexpensetransaction);
        if ($this->isColumnModified(ExpensetransactionPeer::IDEXPENSEITEM)) $criteria->add(ExpensetransactionPeer::IDEXPENSEITEM, $this->idexpenseitem);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_STATUS)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_STATUS, $this->expensetransaction_status);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_COMMENT)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_COMMENT, $this->expensetransaction_comment);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_QUANTITY, $this->expensetransaction_quantity);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_VALUE, $this->expensetransaction_value);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_DATE)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_DATE, $this->expensetransaction_date);
        if ($this->isColumnModified(ExpensetransactionPeer::EXPENSETRANSACTION_REASON)) $criteria->add(ExpensetransactionPeer::EXPENSETRANSACTION_REASON, $this->expensetransaction_reason);

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
        $criteria = new Criteria(ExpensetransactionPeer::DATABASE_NAME);
        $criteria->add(ExpensetransactionPeer::IDEXPENSETRANSACTION, $this->idexpensetransaction);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdexpensetransaction();
    }

    /**
     * Generic method to set the primary key (idexpensetransaction column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdexpensetransaction($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdexpensetransaction();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Expensetransaction (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdexpenseitem($this->getIdexpenseitem());
        $copyObj->setExpensetransactionStatus($this->getExpensetransactionStatus());
        $copyObj->setExpensetransactionComment($this->getExpensetransactionComment());
        $copyObj->setExpensetransactionQuantity($this->getExpensetransactionQuantity());
        $copyObj->setExpensetransactionValue($this->getExpensetransactionValue());
        $copyObj->setExpensetransactionDate($this->getExpensetransactionDate());
        $copyObj->setExpensetransactionReason($this->getExpensetransactionReason());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBankexpensetransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBankexpensetransaction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDepreciationappreciations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDepreciationappreciation($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpensetransactionfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpensetransactionfile($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdexpensetransaction(NULL); // this is a auto-increment column, so set to default value
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
     * @return Expensetransaction Clone of current object.
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
     * @return ExpensetransactionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ExpensetransactionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Expenseitem object.
     *
     * @param                  Expenseitem $v
     * @return Expensetransaction The current object (for fluent API support)
     * @throws PropelException
     */
    public function setExpenseitem(Expenseitem $v = null)
    {
        if ($v === null) {
            $this->setIdexpenseitem(NULL);
        } else {
            $this->setIdexpenseitem($v->getIdexpenseitem());
        }

        $this->aExpenseitem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Expenseitem object, it will not be re-added.
        if ($v !== null) {
            $v->addExpensetransaction($this);
        }


        return $this;
    }


    /**
     * Get the associated Expenseitem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Expenseitem The associated Expenseitem object.
     * @throws PropelException
     */
    public function getExpenseitem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aExpenseitem === null && ($this->idexpenseitem !== null) && $doQuery) {
            $this->aExpenseitem = ExpenseitemQuery::create()->findPk($this->idexpenseitem, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aExpenseitem->addExpensetransactions($this);
             */
        }

        return $this->aExpenseitem;
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
        if ('Bankexpensetransaction' == $relationName) {
            $this->initBankexpensetransactions();
        }
        if ('Depreciationappreciation' == $relationName) {
            $this->initDepreciationappreciations();
        }
        if ('Expensetransactionfile' == $relationName) {
            $this->initExpensetransactionfiles();
        }
    }

    /**
     * Clears out the collBankexpensetransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expensetransaction The current object (for fluent API support)
     * @see        addBankexpensetransactions()
     */
    public function clearBankexpensetransactions()
    {
        $this->collBankexpensetransactions = null; // important to set this to null since that means it is uninitialized
        $this->collBankexpensetransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collBankexpensetransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialBankexpensetransactions($v = true)
    {
        $this->collBankexpensetransactionsPartial = $v;
    }

    /**
     * Initializes the collBankexpensetransactions collection.
     *
     * By default this just sets the collBankexpensetransactions collection to an empty array (like clearcollBankexpensetransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBankexpensetransactions($overrideExisting = true)
    {
        if (null !== $this->collBankexpensetransactions && !$overrideExisting) {
            return;
        }
        $this->collBankexpensetransactions = new PropelObjectCollection();
        $this->collBankexpensetransactions->setModel('Bankexpensetransaction');
    }

    /**
     * Gets an array of Bankexpensetransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expensetransaction is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bankexpensetransaction[] List of Bankexpensetransaction objects
     * @throws PropelException
     */
    public function getBankexpensetransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBankexpensetransactionsPartial && !$this->isNew();
        if (null === $this->collBankexpensetransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBankexpensetransactions) {
                // return empty collection
                $this->initBankexpensetransactions();
            } else {
                $collBankexpensetransactions = BankexpensetransactionQuery::create(null, $criteria)
                    ->filterByExpensetransaction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBankexpensetransactionsPartial && count($collBankexpensetransactions)) {
                      $this->initBankexpensetransactions(false);

                      foreach ($collBankexpensetransactions as $obj) {
                        if (false == $this->collBankexpensetransactions->contains($obj)) {
                          $this->collBankexpensetransactions->append($obj);
                        }
                      }

                      $this->collBankexpensetransactionsPartial = true;
                    }

                    $collBankexpensetransactions->getInternalIterator()->rewind();

                    return $collBankexpensetransactions;
                }

                if ($partial && $this->collBankexpensetransactions) {
                    foreach ($this->collBankexpensetransactions as $obj) {
                        if ($obj->isNew()) {
                            $collBankexpensetransactions[] = $obj;
                        }
                    }
                }

                $this->collBankexpensetransactions = $collBankexpensetransactions;
                $this->collBankexpensetransactionsPartial = false;
            }
        }

        return $this->collBankexpensetransactions;
    }

    /**
     * Sets a collection of Bankexpensetransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bankexpensetransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setBankexpensetransactions(PropelCollection $bankexpensetransactions, PropelPDO $con = null)
    {
        $bankexpensetransactionsToDelete = $this->getBankexpensetransactions(new Criteria(), $con)->diff($bankexpensetransactions);


        $this->bankexpensetransactionsScheduledForDeletion = $bankexpensetransactionsToDelete;

        foreach ($bankexpensetransactionsToDelete as $bankexpensetransactionRemoved) {
            $bankexpensetransactionRemoved->setExpensetransaction(null);
        }

        $this->collBankexpensetransactions = null;
        foreach ($bankexpensetransactions as $bankexpensetransaction) {
            $this->addBankexpensetransaction($bankexpensetransaction);
        }

        $this->collBankexpensetransactions = $bankexpensetransactions;
        $this->collBankexpensetransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bankexpensetransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bankexpensetransaction objects.
     * @throws PropelException
     */
    public function countBankexpensetransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBankexpensetransactionsPartial && !$this->isNew();
        if (null === $this->collBankexpensetransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBankexpensetransactions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBankexpensetransactions());
            }
            $query = BankexpensetransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpensetransaction($this)
                ->count($con);
        }

        return count($this->collBankexpensetransactions);
    }

    /**
     * Method called to associate a Bankexpensetransaction object to this object
     * through the Bankexpensetransaction foreign key attribute.
     *
     * @param    Bankexpensetransaction $l Bankexpensetransaction
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function addBankexpensetransaction(Bankexpensetransaction $l)
    {
        if ($this->collBankexpensetransactions === null) {
            $this->initBankexpensetransactions();
            $this->collBankexpensetransactionsPartial = true;
        }

        if (!in_array($l, $this->collBankexpensetransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBankexpensetransaction($l);

            if ($this->bankexpensetransactionsScheduledForDeletion and $this->bankexpensetransactionsScheduledForDeletion->contains($l)) {
                $this->bankexpensetransactionsScheduledForDeletion->remove($this->bankexpensetransactionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bankexpensetransaction $bankexpensetransaction The bankexpensetransaction object to add.
     */
    protected function doAddBankexpensetransaction($bankexpensetransaction)
    {
        $this->collBankexpensetransactions[]= $bankexpensetransaction;
        $bankexpensetransaction->setExpensetransaction($this);
    }

    /**
     * @param	Bankexpensetransaction $bankexpensetransaction The bankexpensetransaction object to remove.
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function removeBankexpensetransaction($bankexpensetransaction)
    {
        if ($this->getBankexpensetransactions()->contains($bankexpensetransaction)) {
            $this->collBankexpensetransactions->remove($this->collBankexpensetransactions->search($bankexpensetransaction));
            if (null === $this->bankexpensetransactionsScheduledForDeletion) {
                $this->bankexpensetransactionsScheduledForDeletion = clone $this->collBankexpensetransactions;
                $this->bankexpensetransactionsScheduledForDeletion->clear();
            }
            $this->bankexpensetransactionsScheduledForDeletion[]= clone $bankexpensetransaction;
            $bankexpensetransaction->setExpensetransaction(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Expensetransaction is new, it will return
     * an empty collection; or if this Expensetransaction has previously
     * been saved, it will retrieve related Bankexpensetransactions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Expensetransaction.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bankexpensetransaction[] List of Bankexpensetransaction objects
     */
    public function getBankexpensetransactionsJoinBankaccount($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BankexpensetransactionQuery::create(null, $criteria);
        $query->joinWith('Bankaccount', $join_behavior);

        return $this->getBankexpensetransactions($query, $con);
    }

    /**
     * Clears out the collDepreciationappreciations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expensetransaction The current object (for fluent API support)
     * @see        addDepreciationappreciations()
     */
    public function clearDepreciationappreciations()
    {
        $this->collDepreciationappreciations = null; // important to set this to null since that means it is uninitialized
        $this->collDepreciationappreciationsPartial = null;

        return $this;
    }

    /**
     * reset is the collDepreciationappreciations collection loaded partially
     *
     * @return void
     */
    public function resetPartialDepreciationappreciations($v = true)
    {
        $this->collDepreciationappreciationsPartial = $v;
    }

    /**
     * Initializes the collDepreciationappreciations collection.
     *
     * By default this just sets the collDepreciationappreciations collection to an empty array (like clearcollDepreciationappreciations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDepreciationappreciations($overrideExisting = true)
    {
        if (null !== $this->collDepreciationappreciations && !$overrideExisting) {
            return;
        }
        $this->collDepreciationappreciations = new PropelObjectCollection();
        $this->collDepreciationappreciations->setModel('Depreciationappreciation');
    }

    /**
     * Gets an array of Depreciationappreciation objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expensetransaction is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Depreciationappreciation[] List of Depreciationappreciation objects
     * @throws PropelException
     */
    public function getDepreciationappreciations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDepreciationappreciationsPartial && !$this->isNew();
        if (null === $this->collDepreciationappreciations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDepreciationappreciations) {
                // return empty collection
                $this->initDepreciationappreciations();
            } else {
                $collDepreciationappreciations = DepreciationappreciationQuery::create(null, $criteria)
                    ->filterByExpensetransaction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDepreciationappreciationsPartial && count($collDepreciationappreciations)) {
                      $this->initDepreciationappreciations(false);

                      foreach ($collDepreciationappreciations as $obj) {
                        if (false == $this->collDepreciationappreciations->contains($obj)) {
                          $this->collDepreciationappreciations->append($obj);
                        }
                      }

                      $this->collDepreciationappreciationsPartial = true;
                    }

                    $collDepreciationappreciations->getInternalIterator()->rewind();

                    return $collDepreciationappreciations;
                }

                if ($partial && $this->collDepreciationappreciations) {
                    foreach ($this->collDepreciationappreciations as $obj) {
                        if ($obj->isNew()) {
                            $collDepreciationappreciations[] = $obj;
                        }
                    }
                }

                $this->collDepreciationappreciations = $collDepreciationappreciations;
                $this->collDepreciationappreciationsPartial = false;
            }
        }

        return $this->collDepreciationappreciations;
    }

    /**
     * Sets a collection of Depreciationappreciation objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $depreciationappreciations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setDepreciationappreciations(PropelCollection $depreciationappreciations, PropelPDO $con = null)
    {
        $depreciationappreciationsToDelete = $this->getDepreciationappreciations(new Criteria(), $con)->diff($depreciationappreciations);


        $this->depreciationappreciationsScheduledForDeletion = $depreciationappreciationsToDelete;

        foreach ($depreciationappreciationsToDelete as $depreciationappreciationRemoved) {
            $depreciationappreciationRemoved->setExpensetransaction(null);
        }

        $this->collDepreciationappreciations = null;
        foreach ($depreciationappreciations as $depreciationappreciation) {
            $this->addDepreciationappreciation($depreciationappreciation);
        }

        $this->collDepreciationappreciations = $depreciationappreciations;
        $this->collDepreciationappreciationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Depreciationappreciation objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Depreciationappreciation objects.
     * @throws PropelException
     */
    public function countDepreciationappreciations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDepreciationappreciationsPartial && !$this->isNew();
        if (null === $this->collDepreciationappreciations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDepreciationappreciations) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDepreciationappreciations());
            }
            $query = DepreciationappreciationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpensetransaction($this)
                ->count($con);
        }

        return count($this->collDepreciationappreciations);
    }

    /**
     * Method called to associate a Depreciationappreciation object to this object
     * through the Depreciationappreciation foreign key attribute.
     *
     * @param    Depreciationappreciation $l Depreciationappreciation
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function addDepreciationappreciation(Depreciationappreciation $l)
    {
        if ($this->collDepreciationappreciations === null) {
            $this->initDepreciationappreciations();
            $this->collDepreciationappreciationsPartial = true;
        }

        if (!in_array($l, $this->collDepreciationappreciations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDepreciationappreciation($l);

            if ($this->depreciationappreciationsScheduledForDeletion and $this->depreciationappreciationsScheduledForDeletion->contains($l)) {
                $this->depreciationappreciationsScheduledForDeletion->remove($this->depreciationappreciationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Depreciationappreciation $depreciationappreciation The depreciationappreciation object to add.
     */
    protected function doAddDepreciationappreciation($depreciationappreciation)
    {
        $this->collDepreciationappreciations[]= $depreciationappreciation;
        $depreciationappreciation->setExpensetransaction($this);
    }

    /**
     * @param	Depreciationappreciation $depreciationappreciation The depreciationappreciation object to remove.
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function removeDepreciationappreciation($depreciationappreciation)
    {
        if ($this->getDepreciationappreciations()->contains($depreciationappreciation)) {
            $this->collDepreciationappreciations->remove($this->collDepreciationappreciations->search($depreciationappreciation));
            if (null === $this->depreciationappreciationsScheduledForDeletion) {
                $this->depreciationappreciationsScheduledForDeletion = clone $this->collDepreciationappreciations;
                $this->depreciationappreciationsScheduledForDeletion->clear();
            }
            $this->depreciationappreciationsScheduledForDeletion[]= clone $depreciationappreciation;
            $depreciationappreciation->setExpensetransaction(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpensetransactionfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Expensetransaction The current object (for fluent API support)
     * @see        addExpensetransactionfiles()
     */
    public function clearExpensetransactionfiles()
    {
        $this->collExpensetransactionfiles = null; // important to set this to null since that means it is uninitialized
        $this->collExpensetransactionfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collExpensetransactionfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpensetransactionfiles($v = true)
    {
        $this->collExpensetransactionfilesPartial = $v;
    }

    /**
     * Initializes the collExpensetransactionfiles collection.
     *
     * By default this just sets the collExpensetransactionfiles collection to an empty array (like clearcollExpensetransactionfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpensetransactionfiles($overrideExisting = true)
    {
        if (null !== $this->collExpensetransactionfiles && !$overrideExisting) {
            return;
        }
        $this->collExpensetransactionfiles = new PropelObjectCollection();
        $this->collExpensetransactionfiles->setModel('Expensetransactionfile');
    }

    /**
     * Gets an array of Expensetransactionfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Expensetransaction is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expensetransactionfile[] List of Expensetransactionfile objects
     * @throws PropelException
     */
    public function getExpensetransactionfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpensetransactionfilesPartial && !$this->isNew();
        if (null === $this->collExpensetransactionfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpensetransactionfiles) {
                // return empty collection
                $this->initExpensetransactionfiles();
            } else {
                $collExpensetransactionfiles = ExpensetransactionfileQuery::create(null, $criteria)
                    ->filterByExpensetransaction($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensetransactionfilesPartial && count($collExpensetransactionfiles)) {
                      $this->initExpensetransactionfiles(false);

                      foreach ($collExpensetransactionfiles as $obj) {
                        if (false == $this->collExpensetransactionfiles->contains($obj)) {
                          $this->collExpensetransactionfiles->append($obj);
                        }
                      }

                      $this->collExpensetransactionfilesPartial = true;
                    }

                    $collExpensetransactionfiles->getInternalIterator()->rewind();

                    return $collExpensetransactionfiles;
                }

                if ($partial && $this->collExpensetransactionfiles) {
                    foreach ($this->collExpensetransactionfiles as $obj) {
                        if ($obj->isNew()) {
                            $collExpensetransactionfiles[] = $obj;
                        }
                    }
                }

                $this->collExpensetransactionfiles = $collExpensetransactionfiles;
                $this->collExpensetransactionfilesPartial = false;
            }
        }

        return $this->collExpensetransactionfiles;
    }

    /**
     * Sets a collection of Expensetransactionfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expensetransactionfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function setExpensetransactionfiles(PropelCollection $expensetransactionfiles, PropelPDO $con = null)
    {
        $expensetransactionfilesToDelete = $this->getExpensetransactionfiles(new Criteria(), $con)->diff($expensetransactionfiles);


        $this->expensetransactionfilesScheduledForDeletion = $expensetransactionfilesToDelete;

        foreach ($expensetransactionfilesToDelete as $expensetransactionfileRemoved) {
            $expensetransactionfileRemoved->setExpensetransaction(null);
        }

        $this->collExpensetransactionfiles = null;
        foreach ($expensetransactionfiles as $expensetransactionfile) {
            $this->addExpensetransactionfile($expensetransactionfile);
        }

        $this->collExpensetransactionfiles = $expensetransactionfiles;
        $this->collExpensetransactionfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expensetransactionfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expensetransactionfile objects.
     * @throws PropelException
     */
    public function countExpensetransactionfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensetransactionfilesPartial && !$this->isNew();
        if (null === $this->collExpensetransactionfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpensetransactionfiles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpensetransactionfiles());
            }
            $query = ExpensetransactionfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByExpensetransaction($this)
                ->count($con);
        }

        return count($this->collExpensetransactionfiles);
    }

    /**
     * Method called to associate a Expensetransactionfile object to this object
     * through the Expensetransactionfile foreign key attribute.
     *
     * @param    Expensetransactionfile $l Expensetransactionfile
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function addExpensetransactionfile(Expensetransactionfile $l)
    {
        if ($this->collExpensetransactionfiles === null) {
            $this->initExpensetransactionfiles();
            $this->collExpensetransactionfilesPartial = true;
        }

        if (!in_array($l, $this->collExpensetransactionfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpensetransactionfile($l);

            if ($this->expensetransactionfilesScheduledForDeletion and $this->expensetransactionfilesScheduledForDeletion->contains($l)) {
                $this->expensetransactionfilesScheduledForDeletion->remove($this->expensetransactionfilesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expensetransactionfile $expensetransactionfile The expensetransactionfile object to add.
     */
    protected function doAddExpensetransactionfile($expensetransactionfile)
    {
        $this->collExpensetransactionfiles[]= $expensetransactionfile;
        $expensetransactionfile->setExpensetransaction($this);
    }

    /**
     * @param	Expensetransactionfile $expensetransactionfile The expensetransactionfile object to remove.
     * @return Expensetransaction The current object (for fluent API support)
     */
    public function removeExpensetransactionfile($expensetransactionfile)
    {
        if ($this->getExpensetransactionfiles()->contains($expensetransactionfile)) {
            $this->collExpensetransactionfiles->remove($this->collExpensetransactionfiles->search($expensetransactionfile));
            if (null === $this->expensetransactionfilesScheduledForDeletion) {
                $this->expensetransactionfilesScheduledForDeletion = clone $this->collExpensetransactionfiles;
                $this->expensetransactionfilesScheduledForDeletion->clear();
            }
            $this->expensetransactionfilesScheduledForDeletion[]= clone $expensetransactionfile;
            $expensetransactionfile->setExpensetransaction(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idexpensetransaction = null;
        $this->idexpenseitem = null;
        $this->expensetransaction_status = null;
        $this->expensetransaction_comment = null;
        $this->expensetransaction_quantity = null;
        $this->expensetransaction_value = null;
        $this->expensetransaction_date = null;
        $this->expensetransaction_reason = null;
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
            if ($this->collBankexpensetransactions) {
                foreach ($this->collBankexpensetransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDepreciationappreciations) {
                foreach ($this->collDepreciationappreciations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpensetransactionfiles) {
                foreach ($this->collExpensetransactionfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aExpenseitem instanceof Persistent) {
              $this->aExpenseitem->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBankexpensetransactions instanceof PropelCollection) {
            $this->collBankexpensetransactions->clearIterator();
        }
        $this->collBankexpensetransactions = null;
        if ($this->collDepreciationappreciations instanceof PropelCollection) {
            $this->collDepreciationappreciations->clearIterator();
        }
        $this->collDepreciationappreciations = null;
        if ($this->collExpensetransactionfiles instanceof PropelCollection) {
            $this->collExpensetransactionfiles->clearIterator();
        }
        $this->collExpensetransactionfiles = null;
        $this->aExpenseitem = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ExpensetransactionPeer::DEFAULT_STRING_FORMAT);
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
