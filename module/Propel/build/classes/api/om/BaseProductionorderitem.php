<?php


/**
 * Base class that represents a row from the 'productionorderitem' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionorderitem extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductionorderitemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductionorderitemPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductionorderitem field.
     * @var        int
     */
    protected $idproductionorderitem;

    /**
     * The value for the idproductionteam field.
     * @var        int
     */
    protected $idproductionteam;

    /**
     * The value for the idproductionline field.
     * @var        int
     */
    protected $idproductionline;

    /**
     * The value for the idorderitem field.
     * @var        int
     */
    protected $idorderitem;

    /**
     * The value for the idproductionstatus field.
     * @var        int
     */
    protected $idproductionstatus;

    /**
     * The value for the productionorderitem_dateinit field.
     * @var        string
     */
    protected $productionorderitem_dateinit;

    /**
     * The value for the productionorderitem_datedelivery field.
     * @var        string
     */
    protected $productionorderitem_datedelivery;

    /**
     * @var        Orderitem
     */
    protected $aOrderitem;

    /**
     * @var        Productionline
     */
    protected $aProductionline;

    /**
     * @var        Productionstatus
     */
    protected $aProductionstatus;

    /**
     * @var        Productionteam
     */
    protected $aProductionteam;

    /**
     * @var        PropelObjectCollection|Productionordercomment[] Collection to store aggregation of Productionordercomment objects.
     */
    protected $collProductionordercomments;
    protected $collProductionordercommentsPartial;

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
    protected $productionordercommentsScheduledForDeletion = null;

    /**
     * Get the [idproductionorderitem] column value.
     *
     * @return int
     */
    public function getIdproductionorderitem()
    {

        return $this->idproductionorderitem;
    }

    /**
     * Get the [idproductionteam] column value.
     *
     * @return int
     */
    public function getIdproductionteam()
    {

        return $this->idproductionteam;
    }

    /**
     * Get the [idproductionline] column value.
     *
     * @return int
     */
    public function getIdproductionline()
    {

        return $this->idproductionline;
    }

    /**
     * Get the [idorderitem] column value.
     *
     * @return int
     */
    public function getIdorderitem()
    {

        return $this->idorderitem;
    }

    /**
     * Get the [idproductionstatus] column value.
     *
     * @return int
     */
    public function getIdproductionstatus()
    {

        return $this->idproductionstatus;
    }

    /**
     * Get the [optionally formatted] temporal [productionorderitem_dateinit] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProductionorderitemDateinit($format = 'Y-m-d H:i:s')
    {
        if ($this->productionorderitem_dateinit === null) {
            return null;
        }

        if ($this->productionorderitem_dateinit === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->productionorderitem_dateinit);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->productionorderitem_dateinit, true), $x);
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
     * Get the [optionally formatted] temporal [productionorderitem_datedelivery] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getProductionorderitemDatedelivery($format = 'Y-m-d H:i:s')
    {
        if ($this->productionorderitem_datedelivery === null) {
            return null;
        }

        if ($this->productionorderitem_datedelivery === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->productionorderitem_datedelivery);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->productionorderitem_datedelivery, true), $x);
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
     * Set the value of [idproductionorderitem] column.
     *
     * @param  int $v new value
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setIdproductionorderitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionorderitem !== $v) {
            $this->idproductionorderitem = $v;
            $this->modifiedColumns[] = ProductionorderitemPeer::IDPRODUCTIONORDERITEM;
        }


        return $this;
    } // setIdproductionorderitem()

    /**
     * Set the value of [idproductionteam] column.
     *
     * @param  int $v new value
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setIdproductionteam($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionteam !== $v) {
            $this->idproductionteam = $v;
            $this->modifiedColumns[] = ProductionorderitemPeer::IDPRODUCTIONTEAM;
        }

        if ($this->aProductionteam !== null && $this->aProductionteam->getIdproductionteam() !== $v) {
            $this->aProductionteam = null;
        }


        return $this;
    } // setIdproductionteam()

    /**
     * Set the value of [idproductionline] column.
     *
     * @param  int $v new value
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setIdproductionline($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionline !== $v) {
            $this->idproductionline = $v;
            $this->modifiedColumns[] = ProductionorderitemPeer::IDPRODUCTIONLINE;
        }

        if ($this->aProductionline !== null && $this->aProductionline->getIdproductionline() !== $v) {
            $this->aProductionline = null;
        }


        return $this;
    } // setIdproductionline()

    /**
     * Set the value of [idorderitem] column.
     *
     * @param  int $v new value
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setIdorderitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idorderitem !== $v) {
            $this->idorderitem = $v;
            $this->modifiedColumns[] = ProductionorderitemPeer::IDORDERITEM;
        }

        if ($this->aOrderitem !== null && $this->aOrderitem->getIdorderitem() !== $v) {
            $this->aOrderitem = null;
        }


        return $this;
    } // setIdorderitem()

    /**
     * Set the value of [idproductionstatus] column.
     *
     * @param  int $v new value
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setIdproductionstatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionstatus !== $v) {
            $this->idproductionstatus = $v;
            $this->modifiedColumns[] = ProductionorderitemPeer::IDPRODUCTIONSTATUS;
        }

        if ($this->aProductionstatus !== null && $this->aProductionstatus->getIdproductionstatus() !== $v) {
            $this->aProductionstatus = null;
        }


        return $this;
    } // setIdproductionstatus()

    /**
     * Sets the value of [productionorderitem_dateinit] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setProductionorderitemDateinit($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->productionorderitem_dateinit !== null || $dt !== null) {
            $currentDateAsString = ($this->productionorderitem_dateinit !== null && $tmpDt = new DateTime($this->productionorderitem_dateinit)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->productionorderitem_dateinit = $newDateAsString;
                $this->modifiedColumns[] = ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT;
            }
        } // if either are not null


        return $this;
    } // setProductionorderitemDateinit()

    /**
     * Sets the value of [productionorderitem_datedelivery] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setProductionorderitemDatedelivery($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->productionorderitem_datedelivery !== null || $dt !== null) {
            $currentDateAsString = ($this->productionorderitem_datedelivery !== null && $tmpDt = new DateTime($this->productionorderitem_datedelivery)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->productionorderitem_datedelivery = $newDateAsString;
                $this->modifiedColumns[] = ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY;
            }
        } // if either are not null


        return $this;
    } // setProductionorderitemDatedelivery()

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

            $this->idproductionorderitem = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproductionteam = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idproductionline = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->idorderitem = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->idproductionstatus = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->productionorderitem_dateinit = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->productionorderitem_datedelivery = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProductionorderitemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productionorderitem object", $e);
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

        if ($this->aProductionteam !== null && $this->idproductionteam !== $this->aProductionteam->getIdproductionteam()) {
            $this->aProductionteam = null;
        }
        if ($this->aProductionline !== null && $this->idproductionline !== $this->aProductionline->getIdproductionline()) {
            $this->aProductionline = null;
        }
        if ($this->aOrderitem !== null && $this->idorderitem !== $this->aOrderitem->getIdorderitem()) {
            $this->aOrderitem = null;
        }
        if ($this->aProductionstatus !== null && $this->idproductionstatus !== $this->aProductionstatus->getIdproductionstatus()) {
            $this->aProductionstatus = null;
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
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductionorderitemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrderitem = null;
            $this->aProductionline = null;
            $this->aProductionstatus = null;
            $this->aProductionteam = null;
            $this->collProductionordercomments = null;

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
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductionorderitemQuery::create()
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
            $con = Propel::getConnection(ProductionorderitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductionorderitemPeer::addInstanceToPool($this);
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

            if ($this->aOrderitem !== null) {
                if ($this->aOrderitem->isModified() || $this->aOrderitem->isNew()) {
                    $affectedRows += $this->aOrderitem->save($con);
                }
                $this->setOrderitem($this->aOrderitem);
            }

            if ($this->aProductionline !== null) {
                if ($this->aProductionline->isModified() || $this->aProductionline->isNew()) {
                    $affectedRows += $this->aProductionline->save($con);
                }
                $this->setProductionline($this->aProductionline);
            }

            if ($this->aProductionstatus !== null) {
                if ($this->aProductionstatus->isModified() || $this->aProductionstatus->isNew()) {
                    $affectedRows += $this->aProductionstatus->save($con);
                }
                $this->setProductionstatus($this->aProductionstatus);
            }

            if ($this->aProductionteam !== null) {
                if ($this->aProductionteam->isModified() || $this->aProductionteam->isNew()) {
                    $affectedRows += $this->aProductionteam->save($con);
                }
                $this->setProductionteam($this->aProductionteam);
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

            if ($this->productionordercommentsScheduledForDeletion !== null) {
                if (!$this->productionordercommentsScheduledForDeletion->isEmpty()) {
                    ProductionordercommentQuery::create()
                        ->filterByPrimaryKeys($this->productionordercommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productionordercommentsScheduledForDeletion = null;
                }
            }

            if ($this->collProductionordercomments !== null) {
                foreach ($this->collProductionordercomments as $referrerFK) {
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

        $this->modifiedColumns[] = ProductionorderitemPeer::IDPRODUCTIONORDERITEM;
        if (null !== $this->idproductionorderitem) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductionorderitemPeer::IDPRODUCTIONORDERITEM . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONORDERITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionorderitem`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONTEAM)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionteam`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONLINE)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionline`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::IDORDERITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idorderitem`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionstatus`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT)) {
            $modifiedColumns[':p' . $index++]  = '`productionorderitem_dateinit`';
        }
        if ($this->isColumnModified(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY)) {
            $modifiedColumns[':p' . $index++]  = '`productionorderitem_datedelivery`';
        }

        $sql = sprintf(
            'INSERT INTO `productionorderitem` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductionorderitem`':
                        $stmt->bindValue($identifier, $this->idproductionorderitem, PDO::PARAM_INT);
                        break;
                    case '`idproductionteam`':
                        $stmt->bindValue($identifier, $this->idproductionteam, PDO::PARAM_INT);
                        break;
                    case '`idproductionline`':
                        $stmt->bindValue($identifier, $this->idproductionline, PDO::PARAM_INT);
                        break;
                    case '`idorderitem`':
                        $stmt->bindValue($identifier, $this->idorderitem, PDO::PARAM_INT);
                        break;
                    case '`idproductionstatus`':
                        $stmt->bindValue($identifier, $this->idproductionstatus, PDO::PARAM_INT);
                        break;
                    case '`productionorderitem_dateinit`':
                        $stmt->bindValue($identifier, $this->productionorderitem_dateinit, PDO::PARAM_STR);
                        break;
                    case '`productionorderitem_datedelivery`':
                        $stmt->bindValue($identifier, $this->productionorderitem_datedelivery, PDO::PARAM_STR);
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
        $this->setIdproductionorderitem($pk);

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

            if ($this->aOrderitem !== null) {
                if (!$this->aOrderitem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrderitem->getValidationFailures());
                }
            }

            if ($this->aProductionline !== null) {
                if (!$this->aProductionline->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductionline->getValidationFailures());
                }
            }

            if ($this->aProductionstatus !== null) {
                if (!$this->aProductionstatus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductionstatus->getValidationFailures());
                }
            }

            if ($this->aProductionteam !== null) {
                if (!$this->aProductionteam->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductionteam->getValidationFailures());
                }
            }


            if (($retval = ProductionorderitemPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProductionordercomments !== null) {
                    foreach ($this->collProductionordercomments as $referrerFK) {
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
        $pos = ProductionorderitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductionorderitem();
                break;
            case 1:
                return $this->getIdproductionteam();
                break;
            case 2:
                return $this->getIdproductionline();
                break;
            case 3:
                return $this->getIdorderitem();
                break;
            case 4:
                return $this->getIdproductionstatus();
                break;
            case 5:
                return $this->getProductionorderitemDateinit();
                break;
            case 6:
                return $this->getProductionorderitemDatedelivery();
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
        if (isset($alreadyDumpedObjects['Productionorderitem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productionorderitem'][$this->getPrimaryKey()] = true;
        $keys = ProductionorderitemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductionorderitem(),
            $keys[1] => $this->getIdproductionteam(),
            $keys[2] => $this->getIdproductionline(),
            $keys[3] => $this->getIdorderitem(),
            $keys[4] => $this->getIdproductionstatus(),
            $keys[5] => $this->getProductionorderitemDateinit(),
            $keys[6] => $this->getProductionorderitemDatedelivery(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrderitem) {
                $result['Orderitem'] = $this->aOrderitem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProductionline) {
                $result['Productionline'] = $this->aProductionline->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProductionstatus) {
                $result['Productionstatus'] = $this->aProductionstatus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProductionteam) {
                $result['Productionteam'] = $this->aProductionteam->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProductionordercomments) {
                $result['Productionordercomments'] = $this->collProductionordercomments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProductionorderitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductionorderitem($value);
                break;
            case 1:
                $this->setIdproductionteam($value);
                break;
            case 2:
                $this->setIdproductionline($value);
                break;
            case 3:
                $this->setIdorderitem($value);
                break;
            case 4:
                $this->setIdproductionstatus($value);
                break;
            case 5:
                $this->setProductionorderitemDateinit($value);
                break;
            case 6:
                $this->setProductionorderitemDatedelivery($value);
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
        $keys = ProductionorderitemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductionorderitem($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproductionteam($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdproductionline($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIdorderitem($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdproductionstatus($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProductionorderitemDateinit($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setProductionorderitemDatedelivery($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONORDERITEM)) $criteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $this->idproductionorderitem);
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONTEAM)) $criteria->add(ProductionorderitemPeer::IDPRODUCTIONTEAM, $this->idproductionteam);
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONLINE)) $criteria->add(ProductionorderitemPeer::IDPRODUCTIONLINE, $this->idproductionline);
        if ($this->isColumnModified(ProductionorderitemPeer::IDORDERITEM)) $criteria->add(ProductionorderitemPeer::IDORDERITEM, $this->idorderitem);
        if ($this->isColumnModified(ProductionorderitemPeer::IDPRODUCTIONSTATUS)) $criteria->add(ProductionorderitemPeer::IDPRODUCTIONSTATUS, $this->idproductionstatus);
        if ($this->isColumnModified(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT)) $criteria->add(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEINIT, $this->productionorderitem_dateinit);
        if ($this->isColumnModified(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY)) $criteria->add(ProductionorderitemPeer::PRODUCTIONORDERITEM_DATEDELIVERY, $this->productionorderitem_datedelivery);

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
        $criteria = new Criteria(ProductionorderitemPeer::DATABASE_NAME);
        $criteria->add(ProductionorderitemPeer::IDPRODUCTIONORDERITEM, $this->idproductionorderitem);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductionorderitem();
    }

    /**
     * Generic method to set the primary key (idproductionorderitem column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductionorderitem($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductionorderitem();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productionorderitem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproductionteam($this->getIdproductionteam());
        $copyObj->setIdproductionline($this->getIdproductionline());
        $copyObj->setIdorderitem($this->getIdorderitem());
        $copyObj->setIdproductionstatus($this->getIdproductionstatus());
        $copyObj->setProductionorderitemDateinit($this->getProductionorderitemDateinit());
        $copyObj->setProductionorderitemDatedelivery($this->getProductionorderitemDatedelivery());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProductionordercomments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductionordercomment($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproductionorderitem(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productionorderitem Clone of current object.
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
     * @return ProductionorderitemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductionorderitemPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Orderitem object.
     *
     * @param                  Orderitem $v
     * @return Productionorderitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrderitem(Orderitem $v = null)
    {
        if ($v === null) {
            $this->setIdorderitem(NULL);
        } else {
            $this->setIdorderitem($v->getIdorderitem());
        }

        $this->aOrderitem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Orderitem object, it will not be re-added.
        if ($v !== null) {
            $v->addProductionorderitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Orderitem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Orderitem The associated Orderitem object.
     * @throws PropelException
     */
    public function getOrderitem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrderitem === null && ($this->idorderitem !== null) && $doQuery) {
            $this->aOrderitem = OrderitemQuery::create()->findPk($this->idorderitem, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrderitem->addProductionorderitems($this);
             */
        }

        return $this->aOrderitem;
    }

    /**
     * Declares an association between this object and a Productionline object.
     *
     * @param                  Productionline $v
     * @return Productionorderitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductionline(Productionline $v = null)
    {
        if ($v === null) {
            $this->setIdproductionline(NULL);
        } else {
            $this->setIdproductionline($v->getIdproductionline());
        }

        $this->aProductionline = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productionline object, it will not be re-added.
        if ($v !== null) {
            $v->addProductionorderitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Productionline object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Productionline The associated Productionline object.
     * @throws PropelException
     */
    public function getProductionline(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductionline === null && ($this->idproductionline !== null) && $doQuery) {
            $this->aProductionline = ProductionlineQuery::create()->findPk($this->idproductionline, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductionline->addProductionorderitems($this);
             */
        }

        return $this->aProductionline;
    }

    /**
     * Declares an association between this object and a Productionstatus object.
     *
     * @param                  Productionstatus $v
     * @return Productionorderitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductionstatus(Productionstatus $v = null)
    {
        if ($v === null) {
            $this->setIdproductionstatus(NULL);
        } else {
            $this->setIdproductionstatus($v->getIdproductionstatus());
        }

        $this->aProductionstatus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productionstatus object, it will not be re-added.
        if ($v !== null) {
            $v->addProductionorderitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Productionstatus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Productionstatus The associated Productionstatus object.
     * @throws PropelException
     */
    public function getProductionstatus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductionstatus === null && ($this->idproductionstatus !== null) && $doQuery) {
            $this->aProductionstatus = ProductionstatusQuery::create()->findPk($this->idproductionstatus, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductionstatus->addProductionorderitems($this);
             */
        }

        return $this->aProductionstatus;
    }

    /**
     * Declares an association between this object and a Productionteam object.
     *
     * @param                  Productionteam $v
     * @return Productionorderitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductionteam(Productionteam $v = null)
    {
        if ($v === null) {
            $this->setIdproductionteam(NULL);
        } else {
            $this->setIdproductionteam($v->getIdproductionteam());
        }

        $this->aProductionteam = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productionteam object, it will not be re-added.
        if ($v !== null) {
            $v->addProductionorderitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Productionteam object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Productionteam The associated Productionteam object.
     * @throws PropelException
     */
    public function getProductionteam(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductionteam === null && ($this->idproductionteam !== null) && $doQuery) {
            $this->aProductionteam = ProductionteamQuery::create()->findPk($this->idproductionteam, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductionteam->addProductionorderitems($this);
             */
        }

        return $this->aProductionteam;
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
        if ('Productionordercomment' == $relationName) {
            $this->initProductionordercomments();
        }
    }

    /**
     * Clears out the collProductionordercomments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productionorderitem The current object (for fluent API support)
     * @see        addProductionordercomments()
     */
    public function clearProductionordercomments()
    {
        $this->collProductionordercomments = null; // important to set this to null since that means it is uninitialized
        $this->collProductionordercommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductionordercomments collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductionordercomments($v = true)
    {
        $this->collProductionordercommentsPartial = $v;
    }

    /**
     * Initializes the collProductionordercomments collection.
     *
     * By default this just sets the collProductionordercomments collection to an empty array (like clearcollProductionordercomments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductionordercomments($overrideExisting = true)
    {
        if (null !== $this->collProductionordercomments && !$overrideExisting) {
            return;
        }
        $this->collProductionordercomments = new PropelObjectCollection();
        $this->collProductionordercomments->setModel('Productionordercomment');
    }

    /**
     * Gets an array of Productionordercomment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productionorderitem is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productionordercomment[] List of Productionordercomment objects
     * @throws PropelException
     */
    public function getProductionordercomments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductionordercommentsPartial && !$this->isNew();
        if (null === $this->collProductionordercomments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductionordercomments) {
                // return empty collection
                $this->initProductionordercomments();
            } else {
                $collProductionordercomments = ProductionordercommentQuery::create(null, $criteria)
                    ->filterByProductionorderitem($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductionordercommentsPartial && count($collProductionordercomments)) {
                      $this->initProductionordercomments(false);

                      foreach ($collProductionordercomments as $obj) {
                        if (false == $this->collProductionordercomments->contains($obj)) {
                          $this->collProductionordercomments->append($obj);
                        }
                      }

                      $this->collProductionordercommentsPartial = true;
                    }

                    $collProductionordercomments->getInternalIterator()->rewind();

                    return $collProductionordercomments;
                }

                if ($partial && $this->collProductionordercomments) {
                    foreach ($this->collProductionordercomments as $obj) {
                        if ($obj->isNew()) {
                            $collProductionordercomments[] = $obj;
                        }
                    }
                }

                $this->collProductionordercomments = $collProductionordercomments;
                $this->collProductionordercommentsPartial = false;
            }
        }

        return $this->collProductionordercomments;
    }

    /**
     * Sets a collection of Productionordercomment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productionordercomments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function setProductionordercomments(PropelCollection $productionordercomments, PropelPDO $con = null)
    {
        $productionordercommentsToDelete = $this->getProductionordercomments(new Criteria(), $con)->diff($productionordercomments);


        $this->productionordercommentsScheduledForDeletion = $productionordercommentsToDelete;

        foreach ($productionordercommentsToDelete as $productionordercommentRemoved) {
            $productionordercommentRemoved->setProductionorderitem(null);
        }

        $this->collProductionordercomments = null;
        foreach ($productionordercomments as $productionordercomment) {
            $this->addProductionordercomment($productionordercomment);
        }

        $this->collProductionordercomments = $productionordercomments;
        $this->collProductionordercommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productionordercomment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productionordercomment objects.
     * @throws PropelException
     */
    public function countProductionordercomments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductionordercommentsPartial && !$this->isNew();
        if (null === $this->collProductionordercomments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductionordercomments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductionordercomments());
            }
            $query = ProductionordercommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductionorderitem($this)
                ->count($con);
        }

        return count($this->collProductionordercomments);
    }

    /**
     * Method called to associate a Productionordercomment object to this object
     * through the Productionordercomment foreign key attribute.
     *
     * @param    Productionordercomment $l Productionordercomment
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function addProductionordercomment(Productionordercomment $l)
    {
        if ($this->collProductionordercomments === null) {
            $this->initProductionordercomments();
            $this->collProductionordercommentsPartial = true;
        }

        if (!in_array($l, $this->collProductionordercomments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductionordercomment($l);

            if ($this->productionordercommentsScheduledForDeletion and $this->productionordercommentsScheduledForDeletion->contains($l)) {
                $this->productionordercommentsScheduledForDeletion->remove($this->productionordercommentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productionordercomment $productionordercomment The productionordercomment object to add.
     */
    protected function doAddProductionordercomment($productionordercomment)
    {
        $this->collProductionordercomments[]= $productionordercomment;
        $productionordercomment->setProductionorderitem($this);
    }

    /**
     * @param	Productionordercomment $productionordercomment The productionordercomment object to remove.
     * @return Productionorderitem The current object (for fluent API support)
     */
    public function removeProductionordercomment($productionordercomment)
    {
        if ($this->getProductionordercomments()->contains($productionordercomment)) {
            $this->collProductionordercomments->remove($this->collProductionordercomments->search($productionordercomment));
            if (null === $this->productionordercommentsScheduledForDeletion) {
                $this->productionordercommentsScheduledForDeletion = clone $this->collProductionordercomments;
                $this->productionordercommentsScheduledForDeletion->clear();
            }
            $this->productionordercommentsScheduledForDeletion[]= clone $productionordercomment;
            $productionordercomment->setProductionorderitem(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Productionorderitem is new, it will return
     * an empty collection; or if this Productionorderitem has previously
     * been saved, it will retrieve related Productionordercomments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Productionorderitem.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionordercomment[] List of Productionordercomment objects
     */
    public function getProductionordercommentsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionordercommentQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getProductionordercomments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductionorderitem = null;
        $this->idproductionteam = null;
        $this->idproductionline = null;
        $this->idorderitem = null;
        $this->idproductionstatus = null;
        $this->productionorderitem_dateinit = null;
        $this->productionorderitem_datedelivery = null;
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
            if ($this->collProductionordercomments) {
                foreach ($this->collProductionordercomments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aOrderitem instanceof Persistent) {
              $this->aOrderitem->clearAllReferences($deep);
            }
            if ($this->aProductionline instanceof Persistent) {
              $this->aProductionline->clearAllReferences($deep);
            }
            if ($this->aProductionstatus instanceof Persistent) {
              $this->aProductionstatus->clearAllReferences($deep);
            }
            if ($this->aProductionteam instanceof Persistent) {
              $this->aProductionteam->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProductionordercomments instanceof PropelCollection) {
            $this->collProductionordercomments->clearIterator();
        }
        $this->collProductionordercomments = null;
        $this->aOrderitem = null;
        $this->aProductionline = null;
        $this->aProductionstatus = null;
        $this->aProductionteam = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductionorderitemPeer::DEFAULT_STRING_FORMAT);
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
