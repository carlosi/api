<?php


/**
 * Base class that represents a row from the 'order' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseOrder extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'OrderPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OrderPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idorder field.
     * @var        int
     */
    protected $idorder;

    /**
     * The value for the idbranch field.
     * @var        int
     */
    protected $idbranch;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the order_status field.
     * @var        string
     */
    protected $order_status;

    /**
     * The value for the order_payment field.
     * @var        string
     */
    protected $order_payment;

    /**
     * The value for the order_paymentmode field.
     * Note: this column has a database default value of: 'UNIQUE'
     * @var        string
     */
    protected $order_paymentmode;

    /**
     * The value for the order_delivery field.
     * Note: this column has a database default value of: 'SHIPMODE'
     * @var        string
     */
    protected $order_delivery;

    /**
     * @var        Branch
     */
    protected $aBranch;

    /**
     * @var        Client
     */
    protected $aClient;

    /**
     * @var        PropelObjectCollection|Bankordertransaction[] Collection to store aggregation of Bankordertransaction objects.
     */
    protected $collBankordertransactions;
    protected $collBankordertransactionsPartial;

    /**
     * @var        PropelObjectCollection|Mxtaxdocument[] Collection to store aggregation of Mxtaxdocument objects.
     */
    protected $collMxtaxdocuments;
    protected $collMxtaxdocumentsPartial;

    /**
     * @var        PropelObjectCollection|Ordercomment[] Collection to store aggregation of Ordercomment objects.
     */
    protected $collOrdercomments;
    protected $collOrdercommentsPartial;

    /**
     * @var        PropelObjectCollection|Orderfile[] Collection to store aggregation of Orderfile objects.
     */
    protected $collOrderfiles;
    protected $collOrderfilesPartial;

    /**
     * @var        PropelObjectCollection|Orderitem[] Collection to store aggregation of Orderitem objects.
     */
    protected $collOrderitems;
    protected $collOrderitemsPartial;

    /**
     * @var        PropelObjectCollection|Orderrecord[] Collection to store aggregation of Orderrecord objects.
     */
    protected $collOrderrecords;
    protected $collOrderrecordsPartial;

    /**
     * @var        PropelObjectCollection|Ordershipping[] Collection to store aggregation of Ordershipping objects.
     */
    protected $collOrdershippings;
    protected $collOrdershippingsPartial;

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
    protected $bankordertransactionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mxtaxdocumentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordercommentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderfilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderitemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderrecordsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordershippingsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->order_paymentmode = 'UNIQUE';
        $this->order_delivery = 'SHIPMODE';
    }

    /**
     * Initializes internal state of BaseOrder object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idorder] column value.
     *
     * @return int
     */
    public function getIdorder()
    {

        return $this->idorder;
    }

    /**
     * Get the [idbranch] column value.
     *
     * @return int
     */
    public function getIdbranch()
    {

        return $this->idbranch;
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
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = '%x')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
     * Get the [order_status] column value.
     *
     * @return string
     */
    public function getOrderStatus()
    {

        return $this->order_status;
    }

    /**
     * Get the [order_payment] column value.
     *
     * @return string
     */
    public function getOrderPayment()
    {

        return $this->order_payment;
    }

    /**
     * Get the [order_paymentmode] column value.
     *
     * @return string
     */
    public function getOrderPaymentmode()
    {

        return $this->order_paymentmode;
    }

    /**
     * Get the [order_delivery] column value.
     *
     * @return string
     */
    public function getOrderDelivery()
    {

        return $this->order_delivery;
    }

    /**
     * Set the value of [idorder] column.
     *
     * @param  int $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setIdorder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idorder !== $v) {
            $this->idorder = $v;
            $this->modifiedColumns[] = OrderPeer::IDORDER;
        }


        return $this;
    } // setIdorder()

    /**
     * Set the value of [idbranch] column.
     *
     * @param  int $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setIdbranch($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbranch !== $v) {
            $this->idbranch = $v;
            $this->modifiedColumns[] = OrderPeer::IDBRANCH;
        }

        if ($this->aBranch !== null && $this->aBranch->getIdbranch() !== $v) {
            $this->aBranch = null;
        }


        return $this;
    } // setIdbranch()

    /**
     * Set the value of [idclient] column.
     *
     * @param  int $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = OrderPeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Order The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = OrderPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Set the value of [order_status] column.
     *
     * @param  string $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setOrderStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_status !== $v) {
            $this->order_status = $v;
            $this->modifiedColumns[] = OrderPeer::ORDER_STATUS;
        }


        return $this;
    } // setOrderStatus()

    /**
     * Set the value of [order_payment] column.
     *
     * @param  string $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setOrderPayment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_payment !== $v) {
            $this->order_payment = $v;
            $this->modifiedColumns[] = OrderPeer::ORDER_PAYMENT;
        }


        return $this;
    } // setOrderPayment()

    /**
     * Set the value of [order_paymentmode] column.
     *
     * @param  string $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setOrderPaymentmode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_paymentmode !== $v) {
            $this->order_paymentmode = $v;
            $this->modifiedColumns[] = OrderPeer::ORDER_PAYMENTMODE;
        }


        return $this;
    } // setOrderPaymentmode()

    /**
     * Set the value of [order_delivery] column.
     *
     * @param  string $v new value
     * @return Order The current object (for fluent API support)
     */
    public function setOrderDelivery($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_delivery !== $v) {
            $this->order_delivery = $v;
            $this->modifiedColumns[] = OrderPeer::ORDER_DELIVERY;
        }


        return $this;
    } // setOrderDelivery()

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
            if ($this->order_paymentmode !== 'UNIQUE') {
                return false;
            }

            if ($this->order_delivery !== 'SHIPMODE') {
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

            $this->idorder = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idbranch = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idclient = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->created_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->order_status = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->order_payment = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->order_paymentmode = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->order_delivery = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = OrderPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Order object", $e);
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

        if ($this->aBranch !== null && $this->idbranch !== $this->aBranch->getIdbranch()) {
            $this->aBranch = null;
        }
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
            $con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OrderPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aBranch = null;
            $this->aClient = null;
            $this->collBankordertransactions = null;

            $this->collMxtaxdocuments = null;

            $this->collOrdercomments = null;

            $this->collOrderfiles = null;

            $this->collOrderitems = null;

            $this->collOrderrecords = null;

            $this->collOrdershippings = null;

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
            $con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OrderQuery::create()
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
            $con = Propel::getConnection(OrderPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OrderPeer::addInstanceToPool($this);
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

            if ($this->aBranch !== null) {
                if ($this->aBranch->isModified() || $this->aBranch->isNew()) {
                    $affectedRows += $this->aBranch->save($con);
                }
                $this->setBranch($this->aBranch);
            }

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

            if ($this->bankordertransactionsScheduledForDeletion !== null) {
                if (!$this->bankordertransactionsScheduledForDeletion->isEmpty()) {
                    BankordertransactionQuery::create()
                        ->filterByPrimaryKeys($this->bankordertransactionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bankordertransactionsScheduledForDeletion = null;
                }
            }

            if ($this->collBankordertransactions !== null) {
                foreach ($this->collBankordertransactions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mxtaxdocumentsScheduledForDeletion !== null) {
                if (!$this->mxtaxdocumentsScheduledForDeletion->isEmpty()) {
                    MxtaxdocumentQuery::create()
                        ->filterByPrimaryKeys($this->mxtaxdocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mxtaxdocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collMxtaxdocuments !== null) {
                foreach ($this->collMxtaxdocuments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ordercommentsScheduledForDeletion !== null) {
                if (!$this->ordercommentsScheduledForDeletion->isEmpty()) {
                    OrdercommentQuery::create()
                        ->filterByPrimaryKeys($this->ordercommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ordercommentsScheduledForDeletion = null;
                }
            }

            if ($this->collOrdercomments !== null) {
                foreach ($this->collOrdercomments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderfilesScheduledForDeletion !== null) {
                if (!$this->orderfilesScheduledForDeletion->isEmpty()) {
                    OrderfileQuery::create()
                        ->filterByPrimaryKeys($this->orderfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orderfilesScheduledForDeletion = null;
                }
            }

            if ($this->collOrderfiles !== null) {
                foreach ($this->collOrderfiles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderitemsScheduledForDeletion !== null) {
                if (!$this->orderitemsScheduledForDeletion->isEmpty()) {
                    OrderitemQuery::create()
                        ->filterByPrimaryKeys($this->orderitemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orderitemsScheduledForDeletion = null;
                }
            }

            if ($this->collOrderitems !== null) {
                foreach ($this->collOrderitems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderrecordsScheduledForDeletion !== null) {
                if (!$this->orderrecordsScheduledForDeletion->isEmpty()) {
                    OrderrecordQuery::create()
                        ->filterByPrimaryKeys($this->orderrecordsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orderrecordsScheduledForDeletion = null;
                }
            }

            if ($this->collOrderrecords !== null) {
                foreach ($this->collOrderrecords as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ordershippingsScheduledForDeletion !== null) {
                if (!$this->ordershippingsScheduledForDeletion->isEmpty()) {
                    OrdershippingQuery::create()
                        ->filterByPrimaryKeys($this->ordershippingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ordershippingsScheduledForDeletion = null;
                }
            }

            if ($this->collOrdershippings !== null) {
                foreach ($this->collOrdershippings as $referrerFK) {
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

        $this->modifiedColumns[] = OrderPeer::IDORDER;
        if (null !== $this->idorder) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrderPeer::IDORDER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OrderPeer::IDORDER)) {
            $modifiedColumns[':p' . $index++]  = '`idorder`';
        }
        if ($this->isColumnModified(OrderPeer::IDBRANCH)) {
            $modifiedColumns[':p' . $index++]  = '`idbranch`';
        }
        if ($this->isColumnModified(OrderPeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = '`idclient`';
        }
        if ($this->isColumnModified(OrderPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(OrderPeer::ORDER_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`order_status`';
        }
        if ($this->isColumnModified(OrderPeer::ORDER_PAYMENT)) {
            $modifiedColumns[':p' . $index++]  = '`order_payment`';
        }
        if ($this->isColumnModified(OrderPeer::ORDER_PAYMENTMODE)) {
            $modifiedColumns[':p' . $index++]  = '`order_paymentmode`';
        }
        if ($this->isColumnModified(OrderPeer::ORDER_DELIVERY)) {
            $modifiedColumns[':p' . $index++]  = '`order_delivery`';
        }

        $sql = sprintf(
            'INSERT INTO `order` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idorder`':
                        $stmt->bindValue($identifier, $this->idorder, PDO::PARAM_INT);
                        break;
                    case '`idbranch`':
                        $stmt->bindValue($identifier, $this->idbranch, PDO::PARAM_INT);
                        break;
                    case '`idclient`':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`order_status`':
                        $stmt->bindValue($identifier, $this->order_status, PDO::PARAM_STR);
                        break;
                    case '`order_payment`':
                        $stmt->bindValue($identifier, $this->order_payment, PDO::PARAM_STR);
                        break;
                    case '`order_paymentmode`':
                        $stmt->bindValue($identifier, $this->order_paymentmode, PDO::PARAM_STR);
                        break;
                    case '`order_delivery`':
                        $stmt->bindValue($identifier, $this->order_delivery, PDO::PARAM_STR);
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
        $this->setIdorder($pk);

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

            if ($this->aBranch !== null) {
                if (!$this->aBranch->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aBranch->getValidationFailures());
                }
            }

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }


            if (($retval = OrderPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBankordertransactions !== null) {
                    foreach ($this->collBankordertransactions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMxtaxdocuments !== null) {
                    foreach ($this->collMxtaxdocuments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrdercomments !== null) {
                    foreach ($this->collOrdercomments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderfiles !== null) {
                    foreach ($this->collOrderfiles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderitems !== null) {
                    foreach ($this->collOrderitems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderrecords !== null) {
                    foreach ($this->collOrderrecords as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrdershippings !== null) {
                    foreach ($this->collOrdershippings as $referrerFK) {
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
        $pos = OrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdorder();
                break;
            case 1:
                return $this->getIdbranch();
                break;
            case 2:
                return $this->getIdclient();
                break;
            case 3:
                return $this->getCreatedAt();
                break;
            case 4:
                return $this->getOrderStatus();
                break;
            case 5:
                return $this->getOrderPayment();
                break;
            case 6:
                return $this->getOrderPaymentmode();
                break;
            case 7:
                return $this->getOrderDelivery();
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
        if (isset($alreadyDumpedObjects['Order'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Order'][$this->getPrimaryKey()] = true;
        $keys = OrderPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdorder(),
            $keys[1] => $this->getIdbranch(),
            $keys[2] => $this->getIdclient(),
            $keys[3] => $this->getCreatedAt(),
            $keys[4] => $this->getOrderStatus(),
            $keys[5] => $this->getOrderPayment(),
            $keys[6] => $this->getOrderPaymentmode(),
            $keys[7] => $this->getOrderDelivery(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aBranch) {
                $result['Branch'] = $this->aBranch->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBankordertransactions) {
                $result['Bankordertransactions'] = $this->collBankordertransactions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMxtaxdocuments) {
                $result['Mxtaxdocuments'] = $this->collMxtaxdocuments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrdercomments) {
                $result['Ordercomments'] = $this->collOrdercomments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderfiles) {
                $result['Orderfiles'] = $this->collOrderfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderitems) {
                $result['Orderitems'] = $this->collOrderitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderrecords) {
                $result['Orderrecords'] = $this->collOrderrecords->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrdershippings) {
                $result['Ordershippings'] = $this->collOrdershippings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = OrderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdorder($value);
                break;
            case 1:
                $this->setIdbranch($value);
                break;
            case 2:
                $this->setIdclient($value);
                break;
            case 3:
                $this->setCreatedAt($value);
                break;
            case 4:
                $this->setOrderStatus($value);
                break;
            case 5:
                $this->setOrderPayment($value);
                break;
            case 6:
                $this->setOrderPaymentmode($value);
                break;
            case 7:
                $this->setOrderDelivery($value);
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
        $keys = OrderPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdorder($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdbranch($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdclient($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOrderStatus($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOrderPayment($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOrderPaymentmode($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setOrderDelivery($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OrderPeer::DATABASE_NAME);

        if ($this->isColumnModified(OrderPeer::IDORDER)) $criteria->add(OrderPeer::IDORDER, $this->idorder);
        if ($this->isColumnModified(OrderPeer::IDBRANCH)) $criteria->add(OrderPeer::IDBRANCH, $this->idbranch);
        if ($this->isColumnModified(OrderPeer::IDCLIENT)) $criteria->add(OrderPeer::IDCLIENT, $this->idclient);
        if ($this->isColumnModified(OrderPeer::CREATED_AT)) $criteria->add(OrderPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(OrderPeer::ORDER_STATUS)) $criteria->add(OrderPeer::ORDER_STATUS, $this->order_status);
        if ($this->isColumnModified(OrderPeer::ORDER_PAYMENT)) $criteria->add(OrderPeer::ORDER_PAYMENT, $this->order_payment);
        if ($this->isColumnModified(OrderPeer::ORDER_PAYMENTMODE)) $criteria->add(OrderPeer::ORDER_PAYMENTMODE, $this->order_paymentmode);
        if ($this->isColumnModified(OrderPeer::ORDER_DELIVERY)) $criteria->add(OrderPeer::ORDER_DELIVERY, $this->order_delivery);

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
        $criteria = new Criteria(OrderPeer::DATABASE_NAME);
        $criteria->add(OrderPeer::IDORDER, $this->idorder);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdorder();
    }

    /**
     * Generic method to set the primary key (idorder column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdorder($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdorder();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Order (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdbranch($this->getIdbranch());
        $copyObj->setIdclient($this->getIdclient());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setOrderStatus($this->getOrderStatus());
        $copyObj->setOrderPayment($this->getOrderPayment());
        $copyObj->setOrderPaymentmode($this->getOrderPaymentmode());
        $copyObj->setOrderDelivery($this->getOrderDelivery());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBankordertransactions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBankordertransaction($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMxtaxdocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMxtaxdocument($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrdercomments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrdercomment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderitem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderrecords() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderrecord($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrdershippings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrdershipping($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdorder(NULL); // this is a auto-increment column, so set to default value
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
     * @return Order Clone of current object.
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
     * @return OrderPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OrderPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Branch object.
     *
     * @param                  Branch $v
     * @return Order The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBranch(Branch $v = null)
    {
        if ($v === null) {
            $this->setIdbranch(NULL);
        } else {
            $this->setIdbranch($v->getIdbranch());
        }

        $this->aBranch = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Branch object, it will not be re-added.
        if ($v !== null) {
            $v->addOrder($this);
        }


        return $this;
    }


    /**
     * Get the associated Branch object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Branch The associated Branch object.
     * @throws PropelException
     */
    public function getBranch(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aBranch === null && ($this->idbranch !== null) && $doQuery) {
            $this->aBranch = BranchQuery::create()->findPk($this->idbranch, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBranch->addOrders($this);
             */
        }

        return $this->aBranch;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Order The current object (for fluent API support)
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
            $v->addOrder($this);
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
                $this->aClient->addOrders($this);
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
        if ('Bankordertransaction' == $relationName) {
            $this->initBankordertransactions();
        }
        if ('Mxtaxdocument' == $relationName) {
            $this->initMxtaxdocuments();
        }
        if ('Ordercomment' == $relationName) {
            $this->initOrdercomments();
        }
        if ('Orderfile' == $relationName) {
            $this->initOrderfiles();
        }
        if ('Orderitem' == $relationName) {
            $this->initOrderitems();
        }
        if ('Orderrecord' == $relationName) {
            $this->initOrderrecords();
        }
        if ('Ordershipping' == $relationName) {
            $this->initOrdershippings();
        }
    }

    /**
     * Clears out the collBankordertransactions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addBankordertransactions()
     */
    public function clearBankordertransactions()
    {
        $this->collBankordertransactions = null; // important to set this to null since that means it is uninitialized
        $this->collBankordertransactionsPartial = null;

        return $this;
    }

    /**
     * reset is the collBankordertransactions collection loaded partially
     *
     * @return void
     */
    public function resetPartialBankordertransactions($v = true)
    {
        $this->collBankordertransactionsPartial = $v;
    }

    /**
     * Initializes the collBankordertransactions collection.
     *
     * By default this just sets the collBankordertransactions collection to an empty array (like clearcollBankordertransactions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBankordertransactions($overrideExisting = true)
    {
        if (null !== $this->collBankordertransactions && !$overrideExisting) {
            return;
        }
        $this->collBankordertransactions = new PropelObjectCollection();
        $this->collBankordertransactions->setModel('Bankordertransaction');
    }

    /**
     * Gets an array of Bankordertransaction objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bankordertransaction[] List of Bankordertransaction objects
     * @throws PropelException
     */
    public function getBankordertransactions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBankordertransactionsPartial && !$this->isNew();
        if (null === $this->collBankordertransactions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBankordertransactions) {
                // return empty collection
                $this->initBankordertransactions();
            } else {
                $collBankordertransactions = BankordertransactionQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBankordertransactionsPartial && count($collBankordertransactions)) {
                      $this->initBankordertransactions(false);

                      foreach ($collBankordertransactions as $obj) {
                        if (false == $this->collBankordertransactions->contains($obj)) {
                          $this->collBankordertransactions->append($obj);
                        }
                      }

                      $this->collBankordertransactionsPartial = true;
                    }

                    $collBankordertransactions->getInternalIterator()->rewind();

                    return $collBankordertransactions;
                }

                if ($partial && $this->collBankordertransactions) {
                    foreach ($this->collBankordertransactions as $obj) {
                        if ($obj->isNew()) {
                            $collBankordertransactions[] = $obj;
                        }
                    }
                }

                $this->collBankordertransactions = $collBankordertransactions;
                $this->collBankordertransactionsPartial = false;
            }
        }

        return $this->collBankordertransactions;
    }

    /**
     * Sets a collection of Bankordertransaction objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bankordertransactions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setBankordertransactions(PropelCollection $bankordertransactions, PropelPDO $con = null)
    {
        $bankordertransactionsToDelete = $this->getBankordertransactions(new Criteria(), $con)->diff($bankordertransactions);


        $this->bankordertransactionsScheduledForDeletion = $bankordertransactionsToDelete;

        foreach ($bankordertransactionsToDelete as $bankordertransactionRemoved) {
            $bankordertransactionRemoved->setOrder(null);
        }

        $this->collBankordertransactions = null;
        foreach ($bankordertransactions as $bankordertransaction) {
            $this->addBankordertransaction($bankordertransaction);
        }

        $this->collBankordertransactions = $bankordertransactions;
        $this->collBankordertransactionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bankordertransaction objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bankordertransaction objects.
     * @throws PropelException
     */
    public function countBankordertransactions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBankordertransactionsPartial && !$this->isNew();
        if (null === $this->collBankordertransactions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBankordertransactions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBankordertransactions());
            }
            $query = BankordertransactionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collBankordertransactions);
    }

    /**
     * Method called to associate a Bankordertransaction object to this object
     * through the Bankordertransaction foreign key attribute.
     *
     * @param    Bankordertransaction $l Bankordertransaction
     * @return Order The current object (for fluent API support)
     */
    public function addBankordertransaction(Bankordertransaction $l)
    {
        if ($this->collBankordertransactions === null) {
            $this->initBankordertransactions();
            $this->collBankordertransactionsPartial = true;
        }

        if (!in_array($l, $this->collBankordertransactions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBankordertransaction($l);

            if ($this->bankordertransactionsScheduledForDeletion and $this->bankordertransactionsScheduledForDeletion->contains($l)) {
                $this->bankordertransactionsScheduledForDeletion->remove($this->bankordertransactionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bankordertransaction $bankordertransaction The bankordertransaction object to add.
     */
    protected function doAddBankordertransaction($bankordertransaction)
    {
        $this->collBankordertransactions[]= $bankordertransaction;
        $bankordertransaction->setOrder($this);
    }

    /**
     * @param	Bankordertransaction $bankordertransaction The bankordertransaction object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeBankordertransaction($bankordertransaction)
    {
        if ($this->getBankordertransactions()->contains($bankordertransaction)) {
            $this->collBankordertransactions->remove($this->collBankordertransactions->search($bankordertransaction));
            if (null === $this->bankordertransactionsScheduledForDeletion) {
                $this->bankordertransactionsScheduledForDeletion = clone $this->collBankordertransactions;
                $this->bankordertransactionsScheduledForDeletion->clear();
            }
            $this->bankordertransactionsScheduledForDeletion[]= clone $bankordertransaction;
            $bankordertransaction->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Order is new, it will return
     * an empty collection; or if this Order has previously
     * been saved, it will retrieve related Bankordertransactions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Order.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Bankordertransaction[] List of Bankordertransaction objects
     */
    public function getBankordertransactionsJoinBankaccount($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BankordertransactionQuery::create(null, $criteria);
        $query->joinWith('Bankaccount', $join_behavior);

        return $this->getBankordertransactions($query, $con);
    }

    /**
     * Clears out the collMxtaxdocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addMxtaxdocuments()
     */
    public function clearMxtaxdocuments()
    {
        $this->collMxtaxdocuments = null; // important to set this to null since that means it is uninitialized
        $this->collMxtaxdocumentsPartial = null;

        return $this;
    }

    /**
     * reset is the collMxtaxdocuments collection loaded partially
     *
     * @return void
     */
    public function resetPartialMxtaxdocuments($v = true)
    {
        $this->collMxtaxdocumentsPartial = $v;
    }

    /**
     * Initializes the collMxtaxdocuments collection.
     *
     * By default this just sets the collMxtaxdocuments collection to an empty array (like clearcollMxtaxdocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMxtaxdocuments($overrideExisting = true)
    {
        if (null !== $this->collMxtaxdocuments && !$overrideExisting) {
            return;
        }
        $this->collMxtaxdocuments = new PropelObjectCollection();
        $this->collMxtaxdocuments->setModel('Mxtaxdocument');
    }

    /**
     * Gets an array of Mxtaxdocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mxtaxdocument[] List of Mxtaxdocument objects
     * @throws PropelException
     */
    public function getMxtaxdocuments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxdocumentsPartial && !$this->isNew();
        if (null === $this->collMxtaxdocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMxtaxdocuments) {
                // return empty collection
                $this->initMxtaxdocuments();
            } else {
                $collMxtaxdocuments = MxtaxdocumentQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMxtaxdocumentsPartial && count($collMxtaxdocuments)) {
                      $this->initMxtaxdocuments(false);

                      foreach ($collMxtaxdocuments as $obj) {
                        if (false == $this->collMxtaxdocuments->contains($obj)) {
                          $this->collMxtaxdocuments->append($obj);
                        }
                      }

                      $this->collMxtaxdocumentsPartial = true;
                    }

                    $collMxtaxdocuments->getInternalIterator()->rewind();

                    return $collMxtaxdocuments;
                }

                if ($partial && $this->collMxtaxdocuments) {
                    foreach ($this->collMxtaxdocuments as $obj) {
                        if ($obj->isNew()) {
                            $collMxtaxdocuments[] = $obj;
                        }
                    }
                }

                $this->collMxtaxdocuments = $collMxtaxdocuments;
                $this->collMxtaxdocumentsPartial = false;
            }
        }

        return $this->collMxtaxdocuments;
    }

    /**
     * Sets a collection of Mxtaxdocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mxtaxdocuments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setMxtaxdocuments(PropelCollection $mxtaxdocuments, PropelPDO $con = null)
    {
        $mxtaxdocumentsToDelete = $this->getMxtaxdocuments(new Criteria(), $con)->diff($mxtaxdocuments);


        $this->mxtaxdocumentsScheduledForDeletion = $mxtaxdocumentsToDelete;

        foreach ($mxtaxdocumentsToDelete as $mxtaxdocumentRemoved) {
            $mxtaxdocumentRemoved->setOrder(null);
        }

        $this->collMxtaxdocuments = null;
        foreach ($mxtaxdocuments as $mxtaxdocument) {
            $this->addMxtaxdocument($mxtaxdocument);
        }

        $this->collMxtaxdocuments = $mxtaxdocuments;
        $this->collMxtaxdocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mxtaxdocument objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mxtaxdocument objects.
     * @throws PropelException
     */
    public function countMxtaxdocuments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxdocumentsPartial && !$this->isNew();
        if (null === $this->collMxtaxdocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMxtaxdocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMxtaxdocuments());
            }
            $query = MxtaxdocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collMxtaxdocuments);
    }

    /**
     * Method called to associate a Mxtaxdocument object to this object
     * through the Mxtaxdocument foreign key attribute.
     *
     * @param    Mxtaxdocument $l Mxtaxdocument
     * @return Order The current object (for fluent API support)
     */
    public function addMxtaxdocument(Mxtaxdocument $l)
    {
        if ($this->collMxtaxdocuments === null) {
            $this->initMxtaxdocuments();
            $this->collMxtaxdocumentsPartial = true;
        }

        if (!in_array($l, $this->collMxtaxdocuments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMxtaxdocument($l);

            if ($this->mxtaxdocumentsScheduledForDeletion and $this->mxtaxdocumentsScheduledForDeletion->contains($l)) {
                $this->mxtaxdocumentsScheduledForDeletion->remove($this->mxtaxdocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Mxtaxdocument $mxtaxdocument The mxtaxdocument object to add.
     */
    protected function doAddMxtaxdocument($mxtaxdocument)
    {
        $this->collMxtaxdocuments[]= $mxtaxdocument;
        $mxtaxdocument->setOrder($this);
    }

    /**
     * @param	Mxtaxdocument $mxtaxdocument The mxtaxdocument object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeMxtaxdocument($mxtaxdocument)
    {
        if ($this->getMxtaxdocuments()->contains($mxtaxdocument)) {
            $this->collMxtaxdocuments->remove($this->collMxtaxdocuments->search($mxtaxdocument));
            if (null === $this->mxtaxdocumentsScheduledForDeletion) {
                $this->mxtaxdocumentsScheduledForDeletion = clone $this->collMxtaxdocuments;
                $this->mxtaxdocumentsScheduledForDeletion->clear();
            }
            $this->mxtaxdocumentsScheduledForDeletion[]= clone $mxtaxdocument;
            $mxtaxdocument->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Order is new, it will return
     * an empty collection; or if this Order has previously
     * been saved, it will retrieve related Mxtaxdocuments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Order.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mxtaxdocument[] List of Mxtaxdocument objects
     */
    public function getMxtaxdocumentsJoinClienttax($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MxtaxdocumentQuery::create(null, $criteria);
        $query->joinWith('Clienttax', $join_behavior);

        return $this->getMxtaxdocuments($query, $con);
    }

    /**
     * Clears out the collOrdercomments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addOrdercomments()
     */
    public function clearOrdercomments()
    {
        $this->collOrdercomments = null; // important to set this to null since that means it is uninitialized
        $this->collOrdercommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrdercomments collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrdercomments($v = true)
    {
        $this->collOrdercommentsPartial = $v;
    }

    /**
     * Initializes the collOrdercomments collection.
     *
     * By default this just sets the collOrdercomments collection to an empty array (like clearcollOrdercomments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrdercomments($overrideExisting = true)
    {
        if (null !== $this->collOrdercomments && !$overrideExisting) {
            return;
        }
        $this->collOrdercomments = new PropelObjectCollection();
        $this->collOrdercomments->setModel('Ordercomment');
    }

    /**
     * Gets an array of Ordercomment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ordercomment[] List of Ordercomment objects
     * @throws PropelException
     */
    public function getOrdercomments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdercommentsPartial && !$this->isNew();
        if (null === $this->collOrdercomments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrdercomments) {
                // return empty collection
                $this->initOrdercomments();
            } else {
                $collOrdercomments = OrdercommentQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdercommentsPartial && count($collOrdercomments)) {
                      $this->initOrdercomments(false);

                      foreach ($collOrdercomments as $obj) {
                        if (false == $this->collOrdercomments->contains($obj)) {
                          $this->collOrdercomments->append($obj);
                        }
                      }

                      $this->collOrdercommentsPartial = true;
                    }

                    $collOrdercomments->getInternalIterator()->rewind();

                    return $collOrdercomments;
                }

                if ($partial && $this->collOrdercomments) {
                    foreach ($this->collOrdercomments as $obj) {
                        if ($obj->isNew()) {
                            $collOrdercomments[] = $obj;
                        }
                    }
                }

                $this->collOrdercomments = $collOrdercomments;
                $this->collOrdercommentsPartial = false;
            }
        }

        return $this->collOrdercomments;
    }

    /**
     * Sets a collection of Ordercomment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ordercomments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setOrdercomments(PropelCollection $ordercomments, PropelPDO $con = null)
    {
        $ordercommentsToDelete = $this->getOrdercomments(new Criteria(), $con)->diff($ordercomments);


        $this->ordercommentsScheduledForDeletion = $ordercommentsToDelete;

        foreach ($ordercommentsToDelete as $ordercommentRemoved) {
            $ordercommentRemoved->setOrder(null);
        }

        $this->collOrdercomments = null;
        foreach ($ordercomments as $ordercomment) {
            $this->addOrdercomment($ordercomment);
        }

        $this->collOrdercomments = $ordercomments;
        $this->collOrdercommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ordercomment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ordercomment objects.
     * @throws PropelException
     */
    public function countOrdercomments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdercommentsPartial && !$this->isNew();
        if (null === $this->collOrdercomments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrdercomments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrdercomments());
            }
            $query = OrdercommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrdercomments);
    }

    /**
     * Method called to associate a Ordercomment object to this object
     * through the Ordercomment foreign key attribute.
     *
     * @param    Ordercomment $l Ordercomment
     * @return Order The current object (for fluent API support)
     */
    public function addOrdercomment(Ordercomment $l)
    {
        if ($this->collOrdercomments === null) {
            $this->initOrdercomments();
            $this->collOrdercommentsPartial = true;
        }

        if (!in_array($l, $this->collOrdercomments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrdercomment($l);

            if ($this->ordercommentsScheduledForDeletion and $this->ordercommentsScheduledForDeletion->contains($l)) {
                $this->ordercommentsScheduledForDeletion->remove($this->ordercommentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Ordercomment $ordercomment The ordercomment object to add.
     */
    protected function doAddOrdercomment($ordercomment)
    {
        $this->collOrdercomments[]= $ordercomment;
        $ordercomment->setOrder($this);
    }

    /**
     * @param	Ordercomment $ordercomment The ordercomment object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeOrdercomment($ordercomment)
    {
        if ($this->getOrdercomments()->contains($ordercomment)) {
            $this->collOrdercomments->remove($this->collOrdercomments->search($ordercomment));
            if (null === $this->ordercommentsScheduledForDeletion) {
                $this->ordercommentsScheduledForDeletion = clone $this->collOrdercomments;
                $this->ordercommentsScheduledForDeletion->clear();
            }
            $this->ordercommentsScheduledForDeletion[]= clone $ordercomment;
            $ordercomment->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrderfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addOrderfiles()
     */
    public function clearOrderfiles()
    {
        $this->collOrderfiles = null; // important to set this to null since that means it is uninitialized
        $this->collOrderfilesPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderfiles collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderfiles($v = true)
    {
        $this->collOrderfilesPartial = $v;
    }

    /**
     * Initializes the collOrderfiles collection.
     *
     * By default this just sets the collOrderfiles collection to an empty array (like clearcollOrderfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderfiles($overrideExisting = true)
    {
        if (null !== $this->collOrderfiles && !$overrideExisting) {
            return;
        }
        $this->collOrderfiles = new PropelObjectCollection();
        $this->collOrderfiles->setModel('Orderfile');
    }

    /**
     * Gets an array of Orderfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Orderfile[] List of Orderfile objects
     * @throws PropelException
     */
    public function getOrderfiles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderfilesPartial && !$this->isNew();
        if (null === $this->collOrderfiles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderfiles) {
                // return empty collection
                $this->initOrderfiles();
            } else {
                $collOrderfiles = OrderfileQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderfilesPartial && count($collOrderfiles)) {
                      $this->initOrderfiles(false);

                      foreach ($collOrderfiles as $obj) {
                        if (false == $this->collOrderfiles->contains($obj)) {
                          $this->collOrderfiles->append($obj);
                        }
                      }

                      $this->collOrderfilesPartial = true;
                    }

                    $collOrderfiles->getInternalIterator()->rewind();

                    return $collOrderfiles;
                }

                if ($partial && $this->collOrderfiles) {
                    foreach ($this->collOrderfiles as $obj) {
                        if ($obj->isNew()) {
                            $collOrderfiles[] = $obj;
                        }
                    }
                }

                $this->collOrderfiles = $collOrderfiles;
                $this->collOrderfilesPartial = false;
            }
        }

        return $this->collOrderfiles;
    }

    /**
     * Sets a collection of Orderfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderfiles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setOrderfiles(PropelCollection $orderfiles, PropelPDO $con = null)
    {
        $orderfilesToDelete = $this->getOrderfiles(new Criteria(), $con)->diff($orderfiles);


        $this->orderfilesScheduledForDeletion = $orderfilesToDelete;

        foreach ($orderfilesToDelete as $orderfileRemoved) {
            $orderfileRemoved->setOrder(null);
        }

        $this->collOrderfiles = null;
        foreach ($orderfiles as $orderfile) {
            $this->addOrderfile($orderfile);
        }

        $this->collOrderfiles = $orderfiles;
        $this->collOrderfilesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Orderfile objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Orderfile objects.
     * @throws PropelException
     */
    public function countOrderfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderfilesPartial && !$this->isNew();
        if (null === $this->collOrderfiles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderfiles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrderfiles());
            }
            $query = OrderfileQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrderfiles);
    }

    /**
     * Method called to associate a Orderfile object to this object
     * through the Orderfile foreign key attribute.
     *
     * @param    Orderfile $l Orderfile
     * @return Order The current object (for fluent API support)
     */
    public function addOrderfile(Orderfile $l)
    {
        if ($this->collOrderfiles === null) {
            $this->initOrderfiles();
            $this->collOrderfilesPartial = true;
        }

        if (!in_array($l, $this->collOrderfiles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderfile($l);

            if ($this->orderfilesScheduledForDeletion and $this->orderfilesScheduledForDeletion->contains($l)) {
                $this->orderfilesScheduledForDeletion->remove($this->orderfilesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Orderfile $orderfile The orderfile object to add.
     */
    protected function doAddOrderfile($orderfile)
    {
        $this->collOrderfiles[]= $orderfile;
        $orderfile->setOrder($this);
    }

    /**
     * @param	Orderfile $orderfile The orderfile object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeOrderfile($orderfile)
    {
        if ($this->getOrderfiles()->contains($orderfile)) {
            $this->collOrderfiles->remove($this->collOrderfiles->search($orderfile));
            if (null === $this->orderfilesScheduledForDeletion) {
                $this->orderfilesScheduledForDeletion = clone $this->collOrderfiles;
                $this->orderfilesScheduledForDeletion->clear();
            }
            $this->orderfilesScheduledForDeletion[]= clone $orderfile;
            $orderfile->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrderitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addOrderitems()
     */
    public function clearOrderitems()
    {
        $this->collOrderitems = null; // important to set this to null since that means it is uninitialized
        $this->collOrderitemsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderitems collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderitems($v = true)
    {
        $this->collOrderitemsPartial = $v;
    }

    /**
     * Initializes the collOrderitems collection.
     *
     * By default this just sets the collOrderitems collection to an empty array (like clearcollOrderitems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderitems($overrideExisting = true)
    {
        if (null !== $this->collOrderitems && !$overrideExisting) {
            return;
        }
        $this->collOrderitems = new PropelObjectCollection();
        $this->collOrderitems->setModel('Orderitem');
    }

    /**
     * Gets an array of Orderitem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Orderitem[] List of Orderitem objects
     * @throws PropelException
     */
    public function getOrderitems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderitemsPartial && !$this->isNew();
        if (null === $this->collOrderitems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderitems) {
                // return empty collection
                $this->initOrderitems();
            } else {
                $collOrderitems = OrderitemQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderitemsPartial && count($collOrderitems)) {
                      $this->initOrderitems(false);

                      foreach ($collOrderitems as $obj) {
                        if (false == $this->collOrderitems->contains($obj)) {
                          $this->collOrderitems->append($obj);
                        }
                      }

                      $this->collOrderitemsPartial = true;
                    }

                    $collOrderitems->getInternalIterator()->rewind();

                    return $collOrderitems;
                }

                if ($partial && $this->collOrderitems) {
                    foreach ($this->collOrderitems as $obj) {
                        if ($obj->isNew()) {
                            $collOrderitems[] = $obj;
                        }
                    }
                }

                $this->collOrderitems = $collOrderitems;
                $this->collOrderitemsPartial = false;
            }
        }

        return $this->collOrderitems;
    }

    /**
     * Sets a collection of Orderitem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderitems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setOrderitems(PropelCollection $orderitems, PropelPDO $con = null)
    {
        $orderitemsToDelete = $this->getOrderitems(new Criteria(), $con)->diff($orderitems);


        $this->orderitemsScheduledForDeletion = $orderitemsToDelete;

        foreach ($orderitemsToDelete as $orderitemRemoved) {
            $orderitemRemoved->setOrder(null);
        }

        $this->collOrderitems = null;
        foreach ($orderitems as $orderitem) {
            $this->addOrderitem($orderitem);
        }

        $this->collOrderitems = $orderitems;
        $this->collOrderitemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Orderitem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Orderitem objects.
     * @throws PropelException
     */
    public function countOrderitems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderitemsPartial && !$this->isNew();
        if (null === $this->collOrderitems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderitems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrderitems());
            }
            $query = OrderitemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrderitems);
    }

    /**
     * Method called to associate a Orderitem object to this object
     * through the Orderitem foreign key attribute.
     *
     * @param    Orderitem $l Orderitem
     * @return Order The current object (for fluent API support)
     */
    public function addOrderitem(Orderitem $l)
    {
        if ($this->collOrderitems === null) {
            $this->initOrderitems();
            $this->collOrderitemsPartial = true;
        }

        if (!in_array($l, $this->collOrderitems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderitem($l);

            if ($this->orderitemsScheduledForDeletion and $this->orderitemsScheduledForDeletion->contains($l)) {
                $this->orderitemsScheduledForDeletion->remove($this->orderitemsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Orderitem $orderitem The orderitem object to add.
     */
    protected function doAddOrderitem($orderitem)
    {
        $this->collOrderitems[]= $orderitem;
        $orderitem->setOrder($this);
    }

    /**
     * @param	Orderitem $orderitem The orderitem object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeOrderitem($orderitem)
    {
        if ($this->getOrderitems()->contains($orderitem)) {
            $this->collOrderitems->remove($this->collOrderitems->search($orderitem));
            if (null === $this->orderitemsScheduledForDeletion) {
                $this->orderitemsScheduledForDeletion = clone $this->collOrderitems;
                $this->orderitemsScheduledForDeletion->clear();
            }
            $this->orderitemsScheduledForDeletion[]= clone $orderitem;
            $orderitem->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Order is new, it will return
     * an empty collection; or if this Order has previously
     * been saved, it will retrieve related Orderitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Order.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Orderitem[] List of Orderitem objects
     */
    public function getOrderitemsJoinProduct($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrderitemQuery::create(null, $criteria);
        $query->joinWith('Product', $join_behavior);

        return $this->getOrderitems($query, $con);
    }

    /**
     * Clears out the collOrderrecords collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addOrderrecords()
     */
    public function clearOrderrecords()
    {
        $this->collOrderrecords = null; // important to set this to null since that means it is uninitialized
        $this->collOrderrecordsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderrecords collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderrecords($v = true)
    {
        $this->collOrderrecordsPartial = $v;
    }

    /**
     * Initializes the collOrderrecords collection.
     *
     * By default this just sets the collOrderrecords collection to an empty array (like clearcollOrderrecords());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderrecords($overrideExisting = true)
    {
        if (null !== $this->collOrderrecords && !$overrideExisting) {
            return;
        }
        $this->collOrderrecords = new PropelObjectCollection();
        $this->collOrderrecords->setModel('Orderrecord');
    }

    /**
     * Gets an array of Orderrecord objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Orderrecord[] List of Orderrecord objects
     * @throws PropelException
     */
    public function getOrderrecords($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderrecordsPartial && !$this->isNew();
        if (null === $this->collOrderrecords || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderrecords) {
                // return empty collection
                $this->initOrderrecords();
            } else {
                $collOrderrecords = OrderrecordQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderrecordsPartial && count($collOrderrecords)) {
                      $this->initOrderrecords(false);

                      foreach ($collOrderrecords as $obj) {
                        if (false == $this->collOrderrecords->contains($obj)) {
                          $this->collOrderrecords->append($obj);
                        }
                      }

                      $this->collOrderrecordsPartial = true;
                    }

                    $collOrderrecords->getInternalIterator()->rewind();

                    return $collOrderrecords;
                }

                if ($partial && $this->collOrderrecords) {
                    foreach ($this->collOrderrecords as $obj) {
                        if ($obj->isNew()) {
                            $collOrderrecords[] = $obj;
                        }
                    }
                }

                $this->collOrderrecords = $collOrderrecords;
                $this->collOrderrecordsPartial = false;
            }
        }

        return $this->collOrderrecords;
    }

    /**
     * Sets a collection of Orderrecord objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderrecords A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setOrderrecords(PropelCollection $orderrecords, PropelPDO $con = null)
    {
        $orderrecordsToDelete = $this->getOrderrecords(new Criteria(), $con)->diff($orderrecords);


        $this->orderrecordsScheduledForDeletion = $orderrecordsToDelete;

        foreach ($orderrecordsToDelete as $orderrecordRemoved) {
            $orderrecordRemoved->setOrder(null);
        }

        $this->collOrderrecords = null;
        foreach ($orderrecords as $orderrecord) {
            $this->addOrderrecord($orderrecord);
        }

        $this->collOrderrecords = $orderrecords;
        $this->collOrderrecordsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Orderrecord objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Orderrecord objects.
     * @throws PropelException
     */
    public function countOrderrecords(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderrecordsPartial && !$this->isNew();
        if (null === $this->collOrderrecords || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderrecords) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrderrecords());
            }
            $query = OrderrecordQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrderrecords);
    }

    /**
     * Method called to associate a Orderrecord object to this object
     * through the Orderrecord foreign key attribute.
     *
     * @param    Orderrecord $l Orderrecord
     * @return Order The current object (for fluent API support)
     */
    public function addOrderrecord(Orderrecord $l)
    {
        if ($this->collOrderrecords === null) {
            $this->initOrderrecords();
            $this->collOrderrecordsPartial = true;
        }

        if (!in_array($l, $this->collOrderrecords->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderrecord($l);

            if ($this->orderrecordsScheduledForDeletion and $this->orderrecordsScheduledForDeletion->contains($l)) {
                $this->orderrecordsScheduledForDeletion->remove($this->orderrecordsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Orderrecord $orderrecord The orderrecord object to add.
     */
    protected function doAddOrderrecord($orderrecord)
    {
        $this->collOrderrecords[]= $orderrecord;
        $orderrecord->setOrder($this);
    }

    /**
     * @param	Orderrecord $orderrecord The orderrecord object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeOrderrecord($orderrecord)
    {
        if ($this->getOrderrecords()->contains($orderrecord)) {
            $this->collOrderrecords->remove($this->collOrderrecords->search($orderrecord));
            if (null === $this->orderrecordsScheduledForDeletion) {
                $this->orderrecordsScheduledForDeletion = clone $this->collOrderrecords;
                $this->orderrecordsScheduledForDeletion->clear();
            }
            $this->orderrecordsScheduledForDeletion[]= clone $orderrecord;
            $orderrecord->setOrder(null);
        }

        return $this;
    }

    /**
     * Clears out the collOrdershippings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Order The current object (for fluent API support)
     * @see        addOrdershippings()
     */
    public function clearOrdershippings()
    {
        $this->collOrdershippings = null; // important to set this to null since that means it is uninitialized
        $this->collOrdershippingsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrdershippings collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrdershippings($v = true)
    {
        $this->collOrdershippingsPartial = $v;
    }

    /**
     * Initializes the collOrdershippings collection.
     *
     * By default this just sets the collOrdershippings collection to an empty array (like clearcollOrdershippings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrdershippings($overrideExisting = true)
    {
        if (null !== $this->collOrdershippings && !$overrideExisting) {
            return;
        }
        $this->collOrdershippings = new PropelObjectCollection();
        $this->collOrdershippings->setModel('Ordershipping');
    }

    /**
     * Gets an array of Ordershipping objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Order is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Ordershipping[] List of Ordershipping objects
     * @throws PropelException
     */
    public function getOrdershippings($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdershippingsPartial && !$this->isNew();
        if (null === $this->collOrdershippings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrdershippings) {
                // return empty collection
                $this->initOrdershippings();
            } else {
                $collOrdershippings = OrdershippingQuery::create(null, $criteria)
                    ->filterByOrder($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdershippingsPartial && count($collOrdershippings)) {
                      $this->initOrdershippings(false);

                      foreach ($collOrdershippings as $obj) {
                        if (false == $this->collOrdershippings->contains($obj)) {
                          $this->collOrdershippings->append($obj);
                        }
                      }

                      $this->collOrdershippingsPartial = true;
                    }

                    $collOrdershippings->getInternalIterator()->rewind();

                    return $collOrdershippings;
                }

                if ($partial && $this->collOrdershippings) {
                    foreach ($this->collOrdershippings as $obj) {
                        if ($obj->isNew()) {
                            $collOrdershippings[] = $obj;
                        }
                    }
                }

                $this->collOrdershippings = $collOrdershippings;
                $this->collOrdershippingsPartial = false;
            }
        }

        return $this->collOrdershippings;
    }

    /**
     * Sets a collection of Ordershipping objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $ordershippings A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Order The current object (for fluent API support)
     */
    public function setOrdershippings(PropelCollection $ordershippings, PropelPDO $con = null)
    {
        $ordershippingsToDelete = $this->getOrdershippings(new Criteria(), $con)->diff($ordershippings);


        $this->ordershippingsScheduledForDeletion = $ordershippingsToDelete;

        foreach ($ordershippingsToDelete as $ordershippingRemoved) {
            $ordershippingRemoved->setOrder(null);
        }

        $this->collOrdershippings = null;
        foreach ($ordershippings as $ordershipping) {
            $this->addOrdershipping($ordershipping);
        }

        $this->collOrdershippings = $ordershippings;
        $this->collOrdershippingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Ordershipping objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Ordershipping objects.
     * @throws PropelException
     */
    public function countOrdershippings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdershippingsPartial && !$this->isNew();
        if (null === $this->collOrdershippings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrdershippings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrdershippings());
            }
            $query = OrdershippingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByOrder($this)
                ->count($con);
        }

        return count($this->collOrdershippings);
    }

    /**
     * Method called to associate a Ordershipping object to this object
     * through the Ordershipping foreign key attribute.
     *
     * @param    Ordershipping $l Ordershipping
     * @return Order The current object (for fluent API support)
     */
    public function addOrdershipping(Ordershipping $l)
    {
        if ($this->collOrdershippings === null) {
            $this->initOrdershippings();
            $this->collOrdershippingsPartial = true;
        }

        if (!in_array($l, $this->collOrdershippings->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrdershipping($l);

            if ($this->ordershippingsScheduledForDeletion and $this->ordershippingsScheduledForDeletion->contains($l)) {
                $this->ordershippingsScheduledForDeletion->remove($this->ordershippingsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Ordershipping $ordershipping The ordershipping object to add.
     */
    protected function doAddOrdershipping($ordershipping)
    {
        $this->collOrdershippings[]= $ordershipping;
        $ordershipping->setOrder($this);
    }

    /**
     * @param	Ordershipping $ordershipping The ordershipping object to remove.
     * @return Order The current object (for fluent API support)
     */
    public function removeOrdershipping($ordershipping)
    {
        if ($this->getOrdershippings()->contains($ordershipping)) {
            $this->collOrdershippings->remove($this->collOrdershippings->search($ordershipping));
            if (null === $this->ordershippingsScheduledForDeletion) {
                $this->ordershippingsScheduledForDeletion = clone $this->collOrdershippings;
                $this->ordershippingsScheduledForDeletion->clear();
            }
            $this->ordershippingsScheduledForDeletion[]= clone $ordershipping;
            $ordershipping->setOrder(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Order is new, it will return
     * an empty collection; or if this Order has previously
     * been saved, it will retrieve related Ordershippings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Order.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Ordershipping[] List of Ordershipping objects
     */
    public function getOrdershippingsJoinShipping($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrdershippingQuery::create(null, $criteria);
        $query->joinWith('Shipping', $join_behavior);

        return $this->getOrdershippings($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idorder = null;
        $this->idbranch = null;
        $this->idclient = null;
        $this->created_at = null;
        $this->order_status = null;
        $this->order_payment = null;
        $this->order_paymentmode = null;
        $this->order_delivery = null;
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
            if ($this->collBankordertransactions) {
                foreach ($this->collBankordertransactions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMxtaxdocuments) {
                foreach ($this->collMxtaxdocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrdercomments) {
                foreach ($this->collOrdercomments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderfiles) {
                foreach ($this->collOrderfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderitems) {
                foreach ($this->collOrderitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderrecords) {
                foreach ($this->collOrderrecords as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrdershippings) {
                foreach ($this->collOrdershippings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aBranch instanceof Persistent) {
              $this->aBranch->clearAllReferences($deep);
            }
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBankordertransactions instanceof PropelCollection) {
            $this->collBankordertransactions->clearIterator();
        }
        $this->collBankordertransactions = null;
        if ($this->collMxtaxdocuments instanceof PropelCollection) {
            $this->collMxtaxdocuments->clearIterator();
        }
        $this->collMxtaxdocuments = null;
        if ($this->collOrdercomments instanceof PropelCollection) {
            $this->collOrdercomments->clearIterator();
        }
        $this->collOrdercomments = null;
        if ($this->collOrderfiles instanceof PropelCollection) {
            $this->collOrderfiles->clearIterator();
        }
        $this->collOrderfiles = null;
        if ($this->collOrderitems instanceof PropelCollection) {
            $this->collOrderitems->clearIterator();
        }
        $this->collOrderitems = null;
        if ($this->collOrderrecords instanceof PropelCollection) {
            $this->collOrderrecords->clearIterator();
        }
        $this->collOrderrecords = null;
        if ($this->collOrdershippings instanceof PropelCollection) {
            $this->collOrdershippings->clearIterator();
        }
        $this->collOrdershippings = null;
        $this->aBranch = null;
        $this->aClient = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OrderPeer::DEFAULT_STRING_FORMAT);
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
