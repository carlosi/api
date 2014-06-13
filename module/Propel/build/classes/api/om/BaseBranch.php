<?php


/**
 * Base class that represents a row from the 'branch' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseBranch extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'BranchPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BranchPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idbranch field.
     * @var        int
     */
    protected $idbranch;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the branch_name field.
     * @var        string
     */
    protected $branch_name;

    /**
     * The value for the branch_iso_codecountry field.
     * @var        string
     */
    protected $branch_iso_codecountry;

    /**
     * The value for the branch_address field.
     * @var        string
     */
    protected $branch_address;

    /**
     * The value for the branch_address2 field.
     * @var        string
     */
    protected $branch_address2;

    /**
     * The value for the branch_city field.
     * @var        string
     */
    protected $branch_city;

    /**
     * The value for the branch_state field.
     * @var        string
     */
    protected $branch_state;

    /**
     * The value for the branch_zipcode field.
     * @var        string
     */
    protected $branch_zipcode;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|BranchUser[] Collection to store aggregation of BranchUser objects.
     */
    protected $collBranchUsers;
    protected $collBranchUsersPartial;

    /**
     * @var        PropelObjectCollection|Order[] Collection to store aggregation of Order objects.
     */
    protected $collOrders;
    protected $collOrdersPartial;

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
    protected $branchUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $ordersScheduledForDeletion = null;

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
     * Get the [idcompany] column value.
     *
     * @return int
     */
    public function getIdcompany()
    {

        return $this->idcompany;
    }

    /**
     * Get the [branch_name] column value.
     *
     * @return string
     */
    public function getBranchName()
    {

        return $this->branch_name;
    }

    /**
     * Get the [branch_iso_codecountry] column value.
     *
     * @return string
     */
    public function getBranchIsoCodecountry()
    {

        return $this->branch_iso_codecountry;
    }

    /**
     * Get the [branch_address] column value.
     *
     * @return string
     */
    public function getBranchAddress()
    {

        return $this->branch_address;
    }

    /**
     * Get the [branch_address2] column value.
     *
     * @return string
     */
    public function getBranchAddress2()
    {

        return $this->branch_address2;
    }

    /**
     * Get the [branch_city] column value.
     *
     * @return string
     */
    public function getBranchCity()
    {

        return $this->branch_city;
    }

    /**
     * Get the [branch_state] column value.
     *
     * @return string
     */
    public function getBranchState()
    {

        return $this->branch_state;
    }

    /**
     * Get the [branch_zipcode] column value.
     *
     * @return string
     */
    public function getBranchZipcode()
    {

        return $this->branch_zipcode;
    }

    /**
     * Set the value of [idbranch] column.
     *
     * @param  int $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setIdbranch($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idbranch !== $v) {
            $this->idbranch = $v;
            $this->modifiedColumns[] = BranchPeer::IDBRANCH;
        }


        return $this;
    } // setIdbranch()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = BranchPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [branch_name] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_name !== $v) {
            $this->branch_name = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_NAME;
        }


        return $this;
    } // setBranchName()

    /**
     * Set the value of [branch_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_iso_codecountry !== $v) {
            $this->branch_iso_codecountry = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_ISO_CODECOUNTRY;
        }


        return $this;
    } // setBranchIsoCodecountry()

    /**
     * Set the value of [branch_address] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_address !== $v) {
            $this->branch_address = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_ADDRESS;
        }


        return $this;
    } // setBranchAddress()

    /**
     * Set the value of [branch_address2] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_address2 !== $v) {
            $this->branch_address2 = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_ADDRESS2;
        }


        return $this;
    } // setBranchAddress2()

    /**
     * Set the value of [branch_city] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_city !== $v) {
            $this->branch_city = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_CITY;
        }


        return $this;
    } // setBranchCity()

    /**
     * Set the value of [branch_state] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_state !== $v) {
            $this->branch_state = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_STATE;
        }


        return $this;
    } // setBranchState()

    /**
     * Set the value of [branch_zipcode] column.
     *
     * @param  string $v new value
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->branch_zipcode !== $v) {
            $this->branch_zipcode = $v;
            $this->modifiedColumns[] = BranchPeer::BRANCH_ZIPCODE;
        }


        return $this;
    } // setBranchZipcode()

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

            $this->idbranch = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->branch_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->branch_iso_codecountry = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->branch_address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->branch_address2 = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->branch_city = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->branch_state = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->branch_zipcode = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = BranchPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Branch object", $e);
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

        if ($this->aCompany !== null && $this->idcompany !== $this->aCompany->getIdcompany()) {
            $this->aCompany = null;
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
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BranchPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->collBranchUsers = null;

            $this->collOrders = null;

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
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BranchQuery::create()
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
            $con = Propel::getConnection(BranchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BranchPeer::addInstanceToPool($this);
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

            if ($this->aCompany !== null) {
                if ($this->aCompany->isModified() || $this->aCompany->isNew()) {
                    $affectedRows += $this->aCompany->save($con);
                }
                $this->setCompany($this->aCompany);
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

            if ($this->branchUsersScheduledForDeletion !== null) {
                if (!$this->branchUsersScheduledForDeletion->isEmpty()) {
                    BranchUserQuery::create()
                        ->filterByPrimaryKeys($this->branchUsersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->branchUsersScheduledForDeletion = null;
                }
            }

            if ($this->collBranchUsers !== null) {
                foreach ($this->collBranchUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->ordersScheduledForDeletion !== null) {
                if (!$this->ordersScheduledForDeletion->isEmpty()) {
                    OrderQuery::create()
                        ->filterByPrimaryKeys($this->ordersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->ordersScheduledForDeletion = null;
                }
            }

            if ($this->collOrders !== null) {
                foreach ($this->collOrders as $referrerFK) {
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

        $this->modifiedColumns[] = BranchPeer::IDBRANCH;
        if (null !== $this->idbranch) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BranchPeer::IDBRANCH . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BranchPeer::IDBRANCH)) {
            $modifiedColumns[':p' . $index++]  = '`idbranch`';
        }
        if ($this->isColumnModified(BranchPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`branch_name`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`branch_iso_codecountry`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`branch_address`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`branch_address2`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`branch_city`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`branch_state`';
        }
        if ($this->isColumnModified(BranchPeer::BRANCH_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`branch_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `branch` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idbranch`':
                        $stmt->bindValue($identifier, $this->idbranch, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`branch_name`':
                        $stmt->bindValue($identifier, $this->branch_name, PDO::PARAM_STR);
                        break;
                    case '`branch_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->branch_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`branch_address`':
                        $stmt->bindValue($identifier, $this->branch_address, PDO::PARAM_STR);
                        break;
                    case '`branch_address2`':
                        $stmt->bindValue($identifier, $this->branch_address2, PDO::PARAM_STR);
                        break;
                    case '`branch_city`':
                        $stmt->bindValue($identifier, $this->branch_city, PDO::PARAM_STR);
                        break;
                    case '`branch_state`':
                        $stmt->bindValue($identifier, $this->branch_state, PDO::PARAM_STR);
                        break;
                    case '`branch_zipcode`':
                        $stmt->bindValue($identifier, $this->branch_zipcode, PDO::PARAM_STR);
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
        $this->setIdbranch($pk);

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

            if ($this->aCompany !== null) {
                if (!$this->aCompany->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCompany->getValidationFailures());
                }
            }


            if (($retval = BranchPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBranchUsers !== null) {
                    foreach ($this->collBranchUsers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrders !== null) {
                    foreach ($this->collOrders as $referrerFK) {
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
        $pos = BranchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdbranch();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getBranchName();
                break;
            case 3:
                return $this->getBranchIsoCodecountry();
                break;
            case 4:
                return $this->getBranchAddress();
                break;
            case 5:
                return $this->getBranchAddress2();
                break;
            case 6:
                return $this->getBranchCity();
                break;
            case 7:
                return $this->getBranchState();
                break;
            case 8:
                return $this->getBranchZipcode();
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
        if (isset($alreadyDumpedObjects['Branch'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Branch'][$this->getPrimaryKey()] = true;
        $keys = BranchPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdbranch(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getBranchName(),
            $keys[3] => $this->getBranchIsoCodecountry(),
            $keys[4] => $this->getBranchAddress(),
            $keys[5] => $this->getBranchAddress2(),
            $keys[6] => $this->getBranchCity(),
            $keys[7] => $this->getBranchState(),
            $keys[8] => $this->getBranchZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBranchUsers) {
                $result['BranchUsers'] = $this->collBranchUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrders) {
                $result['Orders'] = $this->collOrders->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BranchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdbranch($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setBranchName($value);
                break;
            case 3:
                $this->setBranchIsoCodecountry($value);
                break;
            case 4:
                $this->setBranchAddress($value);
                break;
            case 5:
                $this->setBranchAddress2($value);
                break;
            case 6:
                $this->setBranchCity($value);
                break;
            case 7:
                $this->setBranchState($value);
                break;
            case 8:
                $this->setBranchZipcode($value);
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
        $keys = BranchPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdbranch($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setBranchName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBranchIsoCodecountry($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setBranchAddress($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBranchAddress2($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBranchCity($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setBranchState($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBranchZipcode($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BranchPeer::DATABASE_NAME);

        if ($this->isColumnModified(BranchPeer::IDBRANCH)) $criteria->add(BranchPeer::IDBRANCH, $this->idbranch);
        if ($this->isColumnModified(BranchPeer::IDCOMPANY)) $criteria->add(BranchPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(BranchPeer::BRANCH_NAME)) $criteria->add(BranchPeer::BRANCH_NAME, $this->branch_name);
        if ($this->isColumnModified(BranchPeer::BRANCH_ISO_CODECOUNTRY)) $criteria->add(BranchPeer::BRANCH_ISO_CODECOUNTRY, $this->branch_iso_codecountry);
        if ($this->isColumnModified(BranchPeer::BRANCH_ADDRESS)) $criteria->add(BranchPeer::BRANCH_ADDRESS, $this->branch_address);
        if ($this->isColumnModified(BranchPeer::BRANCH_ADDRESS2)) $criteria->add(BranchPeer::BRANCH_ADDRESS2, $this->branch_address2);
        if ($this->isColumnModified(BranchPeer::BRANCH_CITY)) $criteria->add(BranchPeer::BRANCH_CITY, $this->branch_city);
        if ($this->isColumnModified(BranchPeer::BRANCH_STATE)) $criteria->add(BranchPeer::BRANCH_STATE, $this->branch_state);
        if ($this->isColumnModified(BranchPeer::BRANCH_ZIPCODE)) $criteria->add(BranchPeer::BRANCH_ZIPCODE, $this->branch_zipcode);

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
        $criteria = new Criteria(BranchPeer::DATABASE_NAME);
        $criteria->add(BranchPeer::IDBRANCH, $this->idbranch);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdbranch();
    }

    /**
     * Generic method to set the primary key (idbranch column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdbranch($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdbranch();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Branch (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setBranchName($this->getBranchName());
        $copyObj->setBranchIsoCodecountry($this->getBranchIsoCodecountry());
        $copyObj->setBranchAddress($this->getBranchAddress());
        $copyObj->setBranchAddress2($this->getBranchAddress2());
        $copyObj->setBranchCity($this->getBranchCity());
        $copyObj->setBranchState($this->getBranchState());
        $copyObj->setBranchZipcode($this->getBranchZipcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBranchUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBranchUser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrders() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrder($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdbranch(NULL); // this is a auto-increment column, so set to default value
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
     * @return Branch Clone of current object.
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
     * @return BranchPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BranchPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Branch The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCompany(Company $v = null)
    {
        if ($v === null) {
            $this->setIdcompany(NULL);
        } else {
            $this->setIdcompany($v->getIdcompany());
        }

        $this->aCompany = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Company object, it will not be re-added.
        if ($v !== null) {
            $v->addBranch($this);
        }


        return $this;
    }


    /**
     * Get the associated Company object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Company The associated Company object.
     * @throws PropelException
     */
    public function getCompany(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCompany === null && ($this->idcompany !== null) && $doQuery) {
            $this->aCompany = CompanyQuery::create()->findPk($this->idcompany, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCompany->addBranchs($this);
             */
        }

        return $this->aCompany;
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
        if ('BranchUser' == $relationName) {
            $this->initBranchUsers();
        }
        if ('Order' == $relationName) {
            $this->initOrders();
        }
    }

    /**
     * Clears out the collBranchUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Branch The current object (for fluent API support)
     * @see        addBranchUsers()
     */
    public function clearBranchUsers()
    {
        $this->collBranchUsers = null; // important to set this to null since that means it is uninitialized
        $this->collBranchUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collBranchUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialBranchUsers($v = true)
    {
        $this->collBranchUsersPartial = $v;
    }

    /**
     * Initializes the collBranchUsers collection.
     *
     * By default this just sets the collBranchUsers collection to an empty array (like clearcollBranchUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBranchUsers($overrideExisting = true)
    {
        if (null !== $this->collBranchUsers && !$overrideExisting) {
            return;
        }
        $this->collBranchUsers = new PropelObjectCollection();
        $this->collBranchUsers->setModel('BranchUser');
    }

    /**
     * Gets an array of BranchUser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Branch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BranchUser[] List of BranchUser objects
     * @throws PropelException
     */
    public function getBranchUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBranchUsersPartial && !$this->isNew();
        if (null === $this->collBranchUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBranchUsers) {
                // return empty collection
                $this->initBranchUsers();
            } else {
                $collBranchUsers = BranchUserQuery::create(null, $criteria)
                    ->filterByBranch($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBranchUsersPartial && count($collBranchUsers)) {
                      $this->initBranchUsers(false);

                      foreach ($collBranchUsers as $obj) {
                        if (false == $this->collBranchUsers->contains($obj)) {
                          $this->collBranchUsers->append($obj);
                        }
                      }

                      $this->collBranchUsersPartial = true;
                    }

                    $collBranchUsers->getInternalIterator()->rewind();

                    return $collBranchUsers;
                }

                if ($partial && $this->collBranchUsers) {
                    foreach ($this->collBranchUsers as $obj) {
                        if ($obj->isNew()) {
                            $collBranchUsers[] = $obj;
                        }
                    }
                }

                $this->collBranchUsers = $collBranchUsers;
                $this->collBranchUsersPartial = false;
            }
        }

        return $this->collBranchUsers;
    }

    /**
     * Sets a collection of BranchUser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $branchUsers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Branch The current object (for fluent API support)
     */
    public function setBranchUsers(PropelCollection $branchUsers, PropelPDO $con = null)
    {
        $branchUsersToDelete = $this->getBranchUsers(new Criteria(), $con)->diff($branchUsers);


        $this->branchUsersScheduledForDeletion = $branchUsersToDelete;

        foreach ($branchUsersToDelete as $branchUserRemoved) {
            $branchUserRemoved->setBranch(null);
        }

        $this->collBranchUsers = null;
        foreach ($branchUsers as $branchUser) {
            $this->addBranchUser($branchUser);
        }

        $this->collBranchUsers = $branchUsers;
        $this->collBranchUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BranchUser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BranchUser objects.
     * @throws PropelException
     */
    public function countBranchUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBranchUsersPartial && !$this->isNew();
        if (null === $this->collBranchUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBranchUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBranchUsers());
            }
            $query = BranchUserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBranch($this)
                ->count($con);
        }

        return count($this->collBranchUsers);
    }

    /**
     * Method called to associate a BranchUser object to this object
     * through the BranchUser foreign key attribute.
     *
     * @param    BranchUser $l BranchUser
     * @return Branch The current object (for fluent API support)
     */
    public function addBranchUser(BranchUser $l)
    {
        if ($this->collBranchUsers === null) {
            $this->initBranchUsers();
            $this->collBranchUsersPartial = true;
        }

        if (!in_array($l, $this->collBranchUsers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBranchUser($l);

            if ($this->branchUsersScheduledForDeletion and $this->branchUsersScheduledForDeletion->contains($l)) {
                $this->branchUsersScheduledForDeletion->remove($this->branchUsersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	BranchUser $branchUser The branchUser object to add.
     */
    protected function doAddBranchUser($branchUser)
    {
        $this->collBranchUsers[]= $branchUser;
        $branchUser->setBranch($this);
    }

    /**
     * @param	BranchUser $branchUser The branchUser object to remove.
     * @return Branch The current object (for fluent API support)
     */
    public function removeBranchUser($branchUser)
    {
        if ($this->getBranchUsers()->contains($branchUser)) {
            $this->collBranchUsers->remove($this->collBranchUsers->search($branchUser));
            if (null === $this->branchUsersScheduledForDeletion) {
                $this->branchUsersScheduledForDeletion = clone $this->collBranchUsers;
                $this->branchUsersScheduledForDeletion->clear();
            }
            $this->branchUsersScheduledForDeletion[]= clone $branchUser;
            $branchUser->setBranch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Branch is new, it will return
     * an empty collection; or if this Branch has previously
     * been saved, it will retrieve related BranchUsers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Branch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BranchUser[] List of BranchUser objects
     */
    public function getBranchUsersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BranchUserQuery::create(null, $criteria);
        $query->joinWith('User', $join_behavior);

        return $this->getBranchUsers($query, $con);
    }

    /**
     * Clears out the collOrders collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Branch The current object (for fluent API support)
     * @see        addOrders()
     */
    public function clearOrders()
    {
        $this->collOrders = null; // important to set this to null since that means it is uninitialized
        $this->collOrdersPartial = null;

        return $this;
    }

    /**
     * reset is the collOrders collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrders($v = true)
    {
        $this->collOrdersPartial = $v;
    }

    /**
     * Initializes the collOrders collection.
     *
     * By default this just sets the collOrders collection to an empty array (like clearcollOrders());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrders($overrideExisting = true)
    {
        if (null !== $this->collOrders && !$overrideExisting) {
            return;
        }
        $this->collOrders = new PropelObjectCollection();
        $this->collOrders->setModel('Order');
    }

    /**
     * Gets an array of Order objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Branch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Order[] List of Order objects
     * @throws PropelException
     */
    public function getOrders($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                // return empty collection
                $this->initOrders();
            } else {
                $collOrders = OrderQuery::create(null, $criteria)
                    ->filterByBranch($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrdersPartial && count($collOrders)) {
                      $this->initOrders(false);

                      foreach ($collOrders as $obj) {
                        if (false == $this->collOrders->contains($obj)) {
                          $this->collOrders->append($obj);
                        }
                      }

                      $this->collOrdersPartial = true;
                    }

                    $collOrders->getInternalIterator()->rewind();

                    return $collOrders;
                }

                if ($partial && $this->collOrders) {
                    foreach ($this->collOrders as $obj) {
                        if ($obj->isNew()) {
                            $collOrders[] = $obj;
                        }
                    }
                }

                $this->collOrders = $collOrders;
                $this->collOrdersPartial = false;
            }
        }

        return $this->collOrders;
    }

    /**
     * Sets a collection of Order objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orders A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Branch The current object (for fluent API support)
     */
    public function setOrders(PropelCollection $orders, PropelPDO $con = null)
    {
        $ordersToDelete = $this->getOrders(new Criteria(), $con)->diff($orders);


        $this->ordersScheduledForDeletion = $ordersToDelete;

        foreach ($ordersToDelete as $orderRemoved) {
            $orderRemoved->setBranch(null);
        }

        $this->collOrders = null;
        foreach ($orders as $order) {
            $this->addOrder($order);
        }

        $this->collOrders = $orders;
        $this->collOrdersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Order objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Order objects.
     * @throws PropelException
     */
    public function countOrders(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrdersPartial && !$this->isNew();
        if (null === $this->collOrders || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrders) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrders());
            }
            $query = OrderQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBranch($this)
                ->count($con);
        }

        return count($this->collOrders);
    }

    /**
     * Method called to associate a Order object to this object
     * through the Order foreign key attribute.
     *
     * @param    Order $l Order
     * @return Branch The current object (for fluent API support)
     */
    public function addOrder(Order $l)
    {
        if ($this->collOrders === null) {
            $this->initOrders();
            $this->collOrdersPartial = true;
        }

        if (!in_array($l, $this->collOrders->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrder($l);

            if ($this->ordersScheduledForDeletion and $this->ordersScheduledForDeletion->contains($l)) {
                $this->ordersScheduledForDeletion->remove($this->ordersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Order $order The order object to add.
     */
    protected function doAddOrder($order)
    {
        $this->collOrders[]= $order;
        $order->setBranch($this);
    }

    /**
     * @param	Order $order The order object to remove.
     * @return Branch The current object (for fluent API support)
     */
    public function removeOrder($order)
    {
        if ($this->getOrders()->contains($order)) {
            $this->collOrders->remove($this->collOrders->search($order));
            if (null === $this->ordersScheduledForDeletion) {
                $this->ordersScheduledForDeletion = clone $this->collOrders;
                $this->ordersScheduledForDeletion->clear();
            }
            $this->ordersScheduledForDeletion[]= clone $order;
            $order->setBranch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Branch is new, it will return
     * an empty collection; or if this Branch has previously
     * been saved, it will retrieve related Orders from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Branch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Order[] List of Order objects
     */
    public function getOrdersJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrderQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getOrders($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idbranch = null;
        $this->idcompany = null;
        $this->branch_name = null;
        $this->branch_iso_codecountry = null;
        $this->branch_address = null;
        $this->branch_address2 = null;
        $this->branch_city = null;
        $this->branch_state = null;
        $this->branch_zipcode = null;
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
            if ($this->collBranchUsers) {
                foreach ($this->collBranchUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrders) {
                foreach ($this->collOrders as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBranchUsers instanceof PropelCollection) {
            $this->collBranchUsers->clearIterator();
        }
        $this->collBranchUsers = null;
        if ($this->collOrders instanceof PropelCollection) {
            $this->collOrders->clearIterator();
        }
        $this->collOrders = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BranchPeer::DEFAULT_STRING_FORMAT);
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
