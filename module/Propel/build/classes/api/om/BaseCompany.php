<?php


/**
 * Base class that represents a row from the 'company' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseCompany extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CompanyPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CompanyPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the company_name field.
     * @var        string
     */
    protected $company_name;

    /**
     * The value for the company_timezone field.
     * @var        string
     */
    protected $company_timezone;

    /**
     * The value for the company_iso_codecountry field.
     * @var        string
     */
    protected $company_iso_codecountry;

    /**
     * The value for the company_address field.
     * @var        string
     */
    protected $company_address;

    /**
     * The value for the company_address2 field.
     * @var        string
     */
    protected $company_address2;

    /**
     * The value for the company_city field.
     * @var        string
     */
    protected $company_city;

    /**
     * The value for the company_state field.
     * @var        string
     */
    protected $company_state;

    /**
     * The value for the company_zipcode field.
     * @var        string
     */
    protected $company_zipcode;

    /**
     * @var        PropelObjectCollection|Bankaccount[] Collection to store aggregation of Bankaccount objects.
     */
    protected $collBankaccounts;
    protected $collBankaccountsPartial;

    /**
     * @var        PropelObjectCollection|Branch[] Collection to store aggregation of Branch objects.
     */
    protected $collBranchs;
    protected $collBranchsPartial;

    /**
     * @var        PropelObjectCollection|Client[] Collection to store aggregation of Client objects.
     */
    protected $collClients;
    protected $collClientsPartial;

    /**
     * @var        PropelObjectCollection|Department[] Collection to store aggregation of Department objects.
     */
    protected $collDepartments;
    protected $collDepartmentsPartial;

    /**
     * @var        PropelObjectCollection|Expensecategory[] Collection to store aggregation of Expensecategory objects.
     */
    protected $collExpensecategorys;
    protected $collExpensecategorysPartial;

    /**
     * @var        PropelObjectCollection|Mxtaxinfo[] Collection to store aggregation of Mxtaxinfo objects.
     */
    protected $collMxtaxinfos;
    protected $collMxtaxinfosPartial;

    /**
     * @var        PropelObjectCollection|Productionteam[] Collection to store aggregation of Productionteam objects.
     */
    protected $collProductionteams;
    protected $collProductionteamsPartial;

    /**
     * @var        PropelObjectCollection|Productmain[] Collection to store aggregation of Productmain objects.
     */
    protected $collProductmains;
    protected $collProductmainsPartial;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collUsers;
    protected $collUsersPartial;

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
    protected $bankaccountsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $branchsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $departmentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $expensecategorysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mxtaxinfosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productionteamsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productmainsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersScheduledForDeletion = null;

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
     * Get the [company_name] column value.
     *
     * @return string
     */
    public function getCompanyName()
    {

        return $this->company_name;
    }

    /**
     * Get the [company_timezone] column value.
     *
     * @return string
     */
    public function getCompanyTimezone()
    {

        return $this->company_timezone;
    }

    /**
     * Get the [company_iso_codecountry] column value.
     *
     * @return string
     */
    public function getCompanyIsoCodecountry()
    {

        return $this->company_iso_codecountry;
    }

    /**
     * Get the [company_address] column value.
     *
     * @return string
     */
    public function getCompanyAddress()
    {

        return $this->company_address;
    }

    /**
     * Get the [company_address2] column value.
     *
     * @return string
     */
    public function getCompanyAddress2()
    {

        return $this->company_address2;
    }

    /**
     * Get the [company_city] column value.
     *
     * @return string
     */
    public function getCompanyCity()
    {

        return $this->company_city;
    }

    /**
     * Get the [company_state] column value.
     *
     * @return string
     */
    public function getCompanyState()
    {

        return $this->company_state;
    }

    /**
     * Get the [company_zipcode] column value.
     *
     * @return string
     */
    public function getCompanyZipcode()
    {

        return $this->company_zipcode;
    }

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = CompanyPeer::IDCOMPANY;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [company_name] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_name !== $v) {
            $this->company_name = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_NAME;
        }


        return $this;
    } // setCompanyName()

    /**
     * Set the value of [company_timezone] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyTimezone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_timezone !== $v) {
            $this->company_timezone = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_TIMEZONE;
        }


        return $this;
    } // setCompanyTimezone()

    /**
     * Set the value of [company_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_iso_codecountry !== $v) {
            $this->company_iso_codecountry = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_ISO_CODECOUNTRY;
        }


        return $this;
    } // setCompanyIsoCodecountry()

    /**
     * Set the value of [company_address] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_address !== $v) {
            $this->company_address = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_ADDRESS;
        }


        return $this;
    } // setCompanyAddress()

    /**
     * Set the value of [company_address2] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_address2 !== $v) {
            $this->company_address2 = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_ADDRESS2;
        }


        return $this;
    } // setCompanyAddress2()

    /**
     * Set the value of [company_city] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_city !== $v) {
            $this->company_city = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_CITY;
        }


        return $this;
    } // setCompanyCity()

    /**
     * Set the value of [company_state] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_state !== $v) {
            $this->company_state = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_STATE;
        }


        return $this;
    } // setCompanyState()

    /**
     * Set the value of [company_zipcode] column.
     *
     * @param  string $v new value
     * @return Company The current object (for fluent API support)
     */
    public function setCompanyZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->company_zipcode !== $v) {
            $this->company_zipcode = $v;
            $this->modifiedColumns[] = CompanyPeer::COMPANY_ZIPCODE;
        }


        return $this;
    } // setCompanyZipcode()

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

            $this->idcompany = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->company_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->company_timezone = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->company_iso_codecountry = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->company_address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->company_address2 = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->company_city = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->company_state = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->company_zipcode = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = CompanyPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Company object", $e);
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
            $con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CompanyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collBankaccounts = null;

            $this->collBranchs = null;

            $this->collClients = null;

            $this->collDepartments = null;

            $this->collExpensecategorys = null;

            $this->collMxtaxinfos = null;

            $this->collProductionteams = null;

            $this->collProductmains = null;

            $this->collUsers = null;

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
            $con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CompanyQuery::create()
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
            $con = Propel::getConnection(CompanyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CompanyPeer::addInstanceToPool($this);
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

            if ($this->bankaccountsScheduledForDeletion !== null) {
                if (!$this->bankaccountsScheduledForDeletion->isEmpty()) {
                    BankaccountQuery::create()
                        ->filterByPrimaryKeys($this->bankaccountsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bankaccountsScheduledForDeletion = null;
                }
            }

            if ($this->collBankaccounts !== null) {
                foreach ($this->collBankaccounts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->branchsScheduledForDeletion !== null) {
                if (!$this->branchsScheduledForDeletion->isEmpty()) {
                    BranchQuery::create()
                        ->filterByPrimaryKeys($this->branchsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->branchsScheduledForDeletion = null;
                }
            }

            if ($this->collBranchs !== null) {
                foreach ($this->collBranchs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientsScheduledForDeletion !== null) {
                if (!$this->clientsScheduledForDeletion->isEmpty()) {
                    ClientQuery::create()
                        ->filterByPrimaryKeys($this->clientsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientsScheduledForDeletion = null;
                }
            }

            if ($this->collClients !== null) {
                foreach ($this->collClients as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->departmentsScheduledForDeletion !== null) {
                if (!$this->departmentsScheduledForDeletion->isEmpty()) {
                    DepartmentQuery::create()
                        ->filterByPrimaryKeys($this->departmentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->departmentsScheduledForDeletion = null;
                }
            }

            if ($this->collDepartments !== null) {
                foreach ($this->collDepartments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expensecategorysScheduledForDeletion !== null) {
                if (!$this->expensecategorysScheduledForDeletion->isEmpty()) {
                    ExpensecategoryQuery::create()
                        ->filterByPrimaryKeys($this->expensecategorysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expensecategorysScheduledForDeletion = null;
                }
            }

            if ($this->collExpensecategorys !== null) {
                foreach ($this->collExpensecategorys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mxtaxinfosScheduledForDeletion !== null) {
                if (!$this->mxtaxinfosScheduledForDeletion->isEmpty()) {
                    MxtaxinfoQuery::create()
                        ->filterByPrimaryKeys($this->mxtaxinfosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mxtaxinfosScheduledForDeletion = null;
                }
            }

            if ($this->collMxtaxinfos !== null) {
                foreach ($this->collMxtaxinfos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productionteamsScheduledForDeletion !== null) {
                if (!$this->productionteamsScheduledForDeletion->isEmpty()) {
                    ProductionteamQuery::create()
                        ->filterByPrimaryKeys($this->productionteamsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productionteamsScheduledForDeletion = null;
                }
            }

            if ($this->collProductionteams !== null) {
                foreach ($this->collProductionteams as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productmainsScheduledForDeletion !== null) {
                if (!$this->productmainsScheduledForDeletion->isEmpty()) {
                    ProductmainQuery::create()
                        ->filterByPrimaryKeys($this->productmainsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productmainsScheduledForDeletion = null;
                }
            }

            if ($this->collProductmains !== null) {
                foreach ($this->collProductmains as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usersScheduledForDeletion !== null) {
                if (!$this->usersScheduledForDeletion->isEmpty()) {
                    UserQuery::create()
                        ->filterByPrimaryKeys($this->usersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usersScheduledForDeletion = null;
                }
            }

            if ($this->collUsers !== null) {
                foreach ($this->collUsers as $referrerFK) {
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

        $this->modifiedColumns[] = CompanyPeer::IDCOMPANY;
        if (null !== $this->idcompany) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CompanyPeer::IDCOMPANY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CompanyPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`company_name`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_TIMEZONE)) {
            $modifiedColumns[':p' . $index++]  = '`company_timezone`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`company_iso_codecountry`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`company_address`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`company_address2`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`company_city`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`company_state`';
        }
        if ($this->isColumnModified(CompanyPeer::COMPANY_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`company_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `company` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`company_name`':
                        $stmt->bindValue($identifier, $this->company_name, PDO::PARAM_STR);
                        break;
                    case '`company_timezone`':
                        $stmt->bindValue($identifier, $this->company_timezone, PDO::PARAM_STR);
                        break;
                    case '`company_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->company_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`company_address`':
                        $stmt->bindValue($identifier, $this->company_address, PDO::PARAM_STR);
                        break;
                    case '`company_address2`':
                        $stmt->bindValue($identifier, $this->company_address2, PDO::PARAM_STR);
                        break;
                    case '`company_city`':
                        $stmt->bindValue($identifier, $this->company_city, PDO::PARAM_STR);
                        break;
                    case '`company_state`':
                        $stmt->bindValue($identifier, $this->company_state, PDO::PARAM_STR);
                        break;
                    case '`company_zipcode`':
                        $stmt->bindValue($identifier, $this->company_zipcode, PDO::PARAM_STR);
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
        $this->setIdcompany($pk);

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


            if (($retval = CompanyPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBankaccounts !== null) {
                    foreach ($this->collBankaccounts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBranchs !== null) {
                    foreach ($this->collBranchs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClients !== null) {
                    foreach ($this->collClients as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDepartments !== null) {
                    foreach ($this->collDepartments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collExpensecategorys !== null) {
                    foreach ($this->collExpensecategorys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMxtaxinfos !== null) {
                    foreach ($this->collMxtaxinfos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductionteams !== null) {
                    foreach ($this->collProductionteams as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductmains !== null) {
                    foreach ($this->collProductmains as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsers !== null) {
                    foreach ($this->collUsers as $referrerFK) {
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
        $pos = CompanyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcompany();
                break;
            case 1:
                return $this->getCompanyName();
                break;
            case 2:
                return $this->getCompanyTimezone();
                break;
            case 3:
                return $this->getCompanyIsoCodecountry();
                break;
            case 4:
                return $this->getCompanyAddress();
                break;
            case 5:
                return $this->getCompanyAddress2();
                break;
            case 6:
                return $this->getCompanyCity();
                break;
            case 7:
                return $this->getCompanyState();
                break;
            case 8:
                return $this->getCompanyZipcode();
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
        if (isset($alreadyDumpedObjects['Company'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Company'][$this->getPrimaryKey()] = true;
        $keys = CompanyPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcompany(),
            $keys[1] => $this->getCompanyName(),
            $keys[2] => $this->getCompanyTimezone(),
            $keys[3] => $this->getCompanyIsoCodecountry(),
            $keys[4] => $this->getCompanyAddress(),
            $keys[5] => $this->getCompanyAddress2(),
            $keys[6] => $this->getCompanyCity(),
            $keys[7] => $this->getCompanyState(),
            $keys[8] => $this->getCompanyZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collBankaccounts) {
                $result['Bankaccounts'] = $this->collBankaccounts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBranchs) {
                $result['Branchs'] = $this->collBranchs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClients) {
                $result['Clients'] = $this->collClients->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDepartments) {
                $result['Departments'] = $this->collDepartments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpensecategorys) {
                $result['Expensecategorys'] = $this->collExpensecategorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMxtaxinfos) {
                $result['Mxtaxinfos'] = $this->collMxtaxinfos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductionteams) {
                $result['Productionteams'] = $this->collProductionteams->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductmains) {
                $result['Productmains'] = $this->collProductmains->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsers) {
                $result['Users'] = $this->collUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CompanyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcompany($value);
                break;
            case 1:
                $this->setCompanyName($value);
                break;
            case 2:
                $this->setCompanyTimezone($value);
                break;
            case 3:
                $this->setCompanyIsoCodecountry($value);
                break;
            case 4:
                $this->setCompanyAddress($value);
                break;
            case 5:
                $this->setCompanyAddress2($value);
                break;
            case 6:
                $this->setCompanyCity($value);
                break;
            case 7:
                $this->setCompanyState($value);
                break;
            case 8:
                $this->setCompanyZipcode($value);
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
        $keys = CompanyPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcompany($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCompanyName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCompanyTimezone($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCompanyIsoCodecountry($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCompanyAddress($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCompanyAddress2($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCompanyCity($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCompanyState($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCompanyZipcode($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CompanyPeer::DATABASE_NAME);

        if ($this->isColumnModified(CompanyPeer::IDCOMPANY)) $criteria->add(CompanyPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(CompanyPeer::COMPANY_NAME)) $criteria->add(CompanyPeer::COMPANY_NAME, $this->company_name);
        if ($this->isColumnModified(CompanyPeer::COMPANY_TIMEZONE)) $criteria->add(CompanyPeer::COMPANY_TIMEZONE, $this->company_timezone);
        if ($this->isColumnModified(CompanyPeer::COMPANY_ISO_CODECOUNTRY)) $criteria->add(CompanyPeer::COMPANY_ISO_CODECOUNTRY, $this->company_iso_codecountry);
        if ($this->isColumnModified(CompanyPeer::COMPANY_ADDRESS)) $criteria->add(CompanyPeer::COMPANY_ADDRESS, $this->company_address);
        if ($this->isColumnModified(CompanyPeer::COMPANY_ADDRESS2)) $criteria->add(CompanyPeer::COMPANY_ADDRESS2, $this->company_address2);
        if ($this->isColumnModified(CompanyPeer::COMPANY_CITY)) $criteria->add(CompanyPeer::COMPANY_CITY, $this->company_city);
        if ($this->isColumnModified(CompanyPeer::COMPANY_STATE)) $criteria->add(CompanyPeer::COMPANY_STATE, $this->company_state);
        if ($this->isColumnModified(CompanyPeer::COMPANY_ZIPCODE)) $criteria->add(CompanyPeer::COMPANY_ZIPCODE, $this->company_zipcode);

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
        $criteria = new Criteria(CompanyPeer::DATABASE_NAME);
        $criteria->add(CompanyPeer::IDCOMPANY, $this->idcompany);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcompany();
    }

    /**
     * Generic method to set the primary key (idcompany column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcompany($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcompany();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Company (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCompanyName($this->getCompanyName());
        $copyObj->setCompanyTimezone($this->getCompanyTimezone());
        $copyObj->setCompanyIsoCodecountry($this->getCompanyIsoCodecountry());
        $copyObj->setCompanyAddress($this->getCompanyAddress());
        $copyObj->setCompanyAddress2($this->getCompanyAddress2());
        $copyObj->setCompanyCity($this->getCompanyCity());
        $copyObj->setCompanyState($this->getCompanyState());
        $copyObj->setCompanyZipcode($this->getCompanyZipcode());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBankaccounts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBankaccount($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBranchs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBranch($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClients() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClient($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDepartments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDepartment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpensecategorys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpensecategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMxtaxinfos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMxtaxinfo($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductionteams() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductionteam($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductmains() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductmain($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUser($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcompany(NULL); // this is a auto-increment column, so set to default value
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
     * @return Company Clone of current object.
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
     * @return CompanyPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CompanyPeer();
        }

        return self::$peer;
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
        if ('Bankaccount' == $relationName) {
            $this->initBankaccounts();
        }
        if ('Branch' == $relationName) {
            $this->initBranchs();
        }
        if ('Client' == $relationName) {
            $this->initClients();
        }
        if ('Department' == $relationName) {
            $this->initDepartments();
        }
        if ('Expensecategory' == $relationName) {
            $this->initExpensecategorys();
        }
        if ('Mxtaxinfo' == $relationName) {
            $this->initMxtaxinfos();
        }
        if ('Productionteam' == $relationName) {
            $this->initProductionteams();
        }
        if ('Productmain' == $relationName) {
            $this->initProductmains();
        }
        if ('User' == $relationName) {
            $this->initUsers();
        }
    }

    /**
     * Clears out the collBankaccounts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addBankaccounts()
     */
    public function clearBankaccounts()
    {
        $this->collBankaccounts = null; // important to set this to null since that means it is uninitialized
        $this->collBankaccountsPartial = null;

        return $this;
    }

    /**
     * reset is the collBankaccounts collection loaded partially
     *
     * @return void
     */
    public function resetPartialBankaccounts($v = true)
    {
        $this->collBankaccountsPartial = $v;
    }

    /**
     * Initializes the collBankaccounts collection.
     *
     * By default this just sets the collBankaccounts collection to an empty array (like clearcollBankaccounts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBankaccounts($overrideExisting = true)
    {
        if (null !== $this->collBankaccounts && !$overrideExisting) {
            return;
        }
        $this->collBankaccounts = new PropelObjectCollection();
        $this->collBankaccounts->setModel('Bankaccount');
    }

    /**
     * Gets an array of Bankaccount objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bankaccount[] List of Bankaccount objects
     * @throws PropelException
     */
    public function getBankaccounts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBankaccountsPartial && !$this->isNew();
        if (null === $this->collBankaccounts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBankaccounts) {
                // return empty collection
                $this->initBankaccounts();
            } else {
                $collBankaccounts = BankaccountQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBankaccountsPartial && count($collBankaccounts)) {
                      $this->initBankaccounts(false);

                      foreach ($collBankaccounts as $obj) {
                        if (false == $this->collBankaccounts->contains($obj)) {
                          $this->collBankaccounts->append($obj);
                        }
                      }

                      $this->collBankaccountsPartial = true;
                    }

                    $collBankaccounts->getInternalIterator()->rewind();

                    return $collBankaccounts;
                }

                if ($partial && $this->collBankaccounts) {
                    foreach ($this->collBankaccounts as $obj) {
                        if ($obj->isNew()) {
                            $collBankaccounts[] = $obj;
                        }
                    }
                }

                $this->collBankaccounts = $collBankaccounts;
                $this->collBankaccountsPartial = false;
            }
        }

        return $this->collBankaccounts;
    }

    /**
     * Sets a collection of Bankaccount objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bankaccounts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setBankaccounts(PropelCollection $bankaccounts, PropelPDO $con = null)
    {
        $bankaccountsToDelete = $this->getBankaccounts(new Criteria(), $con)->diff($bankaccounts);


        $this->bankaccountsScheduledForDeletion = $bankaccountsToDelete;

        foreach ($bankaccountsToDelete as $bankaccountRemoved) {
            $bankaccountRemoved->setCompany(null);
        }

        $this->collBankaccounts = null;
        foreach ($bankaccounts as $bankaccount) {
            $this->addBankaccount($bankaccount);
        }

        $this->collBankaccounts = $bankaccounts;
        $this->collBankaccountsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bankaccount objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bankaccount objects.
     * @throws PropelException
     */
    public function countBankaccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBankaccountsPartial && !$this->isNew();
        if (null === $this->collBankaccounts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBankaccounts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBankaccounts());
            }
            $query = BankaccountQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collBankaccounts);
    }

    /**
     * Method called to associate a Bankaccount object to this object
     * through the Bankaccount foreign key attribute.
     *
     * @param    Bankaccount $l Bankaccount
     * @return Company The current object (for fluent API support)
     */
    public function addBankaccount(Bankaccount $l)
    {
        if ($this->collBankaccounts === null) {
            $this->initBankaccounts();
            $this->collBankaccountsPartial = true;
        }

        if (!in_array($l, $this->collBankaccounts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBankaccount($l);

            if ($this->bankaccountsScheduledForDeletion and $this->bankaccountsScheduledForDeletion->contains($l)) {
                $this->bankaccountsScheduledForDeletion->remove($this->bankaccountsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bankaccount $bankaccount The bankaccount object to add.
     */
    protected function doAddBankaccount($bankaccount)
    {
        $this->collBankaccounts[]= $bankaccount;
        $bankaccount->setCompany($this);
    }

    /**
     * @param	Bankaccount $bankaccount The bankaccount object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeBankaccount($bankaccount)
    {
        if ($this->getBankaccounts()->contains($bankaccount)) {
            $this->collBankaccounts->remove($this->collBankaccounts->search($bankaccount));
            if (null === $this->bankaccountsScheduledForDeletion) {
                $this->bankaccountsScheduledForDeletion = clone $this->collBankaccounts;
                $this->bankaccountsScheduledForDeletion->clear();
            }
            $this->bankaccountsScheduledForDeletion[]= clone $bankaccount;
            $bankaccount->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collBranchs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addBranchs()
     */
    public function clearBranchs()
    {
        $this->collBranchs = null; // important to set this to null since that means it is uninitialized
        $this->collBranchsPartial = null;

        return $this;
    }

    /**
     * reset is the collBranchs collection loaded partially
     *
     * @return void
     */
    public function resetPartialBranchs($v = true)
    {
        $this->collBranchsPartial = $v;
    }

    /**
     * Initializes the collBranchs collection.
     *
     * By default this just sets the collBranchs collection to an empty array (like clearcollBranchs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBranchs($overrideExisting = true)
    {
        if (null !== $this->collBranchs && !$overrideExisting) {
            return;
        }
        $this->collBranchs = new PropelObjectCollection();
        $this->collBranchs->setModel('Branch');
    }

    /**
     * Gets an array of Branch objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Branch[] List of Branch objects
     * @throws PropelException
     */
    public function getBranchs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBranchsPartial && !$this->isNew();
        if (null === $this->collBranchs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBranchs) {
                // return empty collection
                $this->initBranchs();
            } else {
                $collBranchs = BranchQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBranchsPartial && count($collBranchs)) {
                      $this->initBranchs(false);

                      foreach ($collBranchs as $obj) {
                        if (false == $this->collBranchs->contains($obj)) {
                          $this->collBranchs->append($obj);
                        }
                      }

                      $this->collBranchsPartial = true;
                    }

                    $collBranchs->getInternalIterator()->rewind();

                    return $collBranchs;
                }

                if ($partial && $this->collBranchs) {
                    foreach ($this->collBranchs as $obj) {
                        if ($obj->isNew()) {
                            $collBranchs[] = $obj;
                        }
                    }
                }

                $this->collBranchs = $collBranchs;
                $this->collBranchsPartial = false;
            }
        }

        return $this->collBranchs;
    }

    /**
     * Sets a collection of Branch objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $branchs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setBranchs(PropelCollection $branchs, PropelPDO $con = null)
    {
        $branchsToDelete = $this->getBranchs(new Criteria(), $con)->diff($branchs);


        $this->branchsScheduledForDeletion = $branchsToDelete;

        foreach ($branchsToDelete as $branchRemoved) {
            $branchRemoved->setCompany(null);
        }

        $this->collBranchs = null;
        foreach ($branchs as $branch) {
            $this->addBranch($branch);
        }

        $this->collBranchs = $branchs;
        $this->collBranchsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Branch objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Branch objects.
     * @throws PropelException
     */
    public function countBranchs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBranchsPartial && !$this->isNew();
        if (null === $this->collBranchs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBranchs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBranchs());
            }
            $query = BranchQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collBranchs);
    }

    /**
     * Method called to associate a Branch object to this object
     * through the Branch foreign key attribute.
     *
     * @param    Branch $l Branch
     * @return Company The current object (for fluent API support)
     */
    public function addBranch(Branch $l)
    {
        if ($this->collBranchs === null) {
            $this->initBranchs();
            $this->collBranchsPartial = true;
        }

        if (!in_array($l, $this->collBranchs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBranch($l);

            if ($this->branchsScheduledForDeletion and $this->branchsScheduledForDeletion->contains($l)) {
                $this->branchsScheduledForDeletion->remove($this->branchsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Branch $branch The branch object to add.
     */
    protected function doAddBranch($branch)
    {
        $this->collBranchs[]= $branch;
        $branch->setCompany($this);
    }

    /**
     * @param	Branch $branch The branch object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeBranch($branch)
    {
        if ($this->getBranchs()->contains($branch)) {
            $this->collBranchs->remove($this->collBranchs->search($branch));
            if (null === $this->branchsScheduledForDeletion) {
                $this->branchsScheduledForDeletion = clone $this->collBranchs;
                $this->branchsScheduledForDeletion->clear();
            }
            $this->branchsScheduledForDeletion[]= clone $branch;
            $branch->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collClients collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addClients()
     */
    public function clearClients()
    {
        $this->collClients = null; // important to set this to null since that means it is uninitialized
        $this->collClientsPartial = null;

        return $this;
    }

    /**
     * reset is the collClients collection loaded partially
     *
     * @return void
     */
    public function resetPartialClients($v = true)
    {
        $this->collClientsPartial = $v;
    }

    /**
     * Initializes the collClients collection.
     *
     * By default this just sets the collClients collection to an empty array (like clearcollClients());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClients($overrideExisting = true)
    {
        if (null !== $this->collClients && !$overrideExisting) {
            return;
        }
        $this->collClients = new PropelObjectCollection();
        $this->collClients->setModel('Client');
    }

    /**
     * Gets an array of Client objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Client[] List of Client objects
     * @throws PropelException
     */
    public function getClients($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClientsPartial && !$this->isNew();
        if (null === $this->collClients || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClients) {
                // return empty collection
                $this->initClients();
            } else {
                $collClients = ClientQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClientsPartial && count($collClients)) {
                      $this->initClients(false);

                      foreach ($collClients as $obj) {
                        if (false == $this->collClients->contains($obj)) {
                          $this->collClients->append($obj);
                        }
                      }

                      $this->collClientsPartial = true;
                    }

                    $collClients->getInternalIterator()->rewind();

                    return $collClients;
                }

                if ($partial && $this->collClients) {
                    foreach ($this->collClients as $obj) {
                        if ($obj->isNew()) {
                            $collClients[] = $obj;
                        }
                    }
                }

                $this->collClients = $collClients;
                $this->collClientsPartial = false;
            }
        }

        return $this->collClients;
    }

    /**
     * Sets a collection of Client objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clients A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setClients(PropelCollection $clients, PropelPDO $con = null)
    {
        $clientsToDelete = $this->getClients(new Criteria(), $con)->diff($clients);


        $this->clientsScheduledForDeletion = $clientsToDelete;

        foreach ($clientsToDelete as $clientRemoved) {
            $clientRemoved->setCompany(null);
        }

        $this->collClients = null;
        foreach ($clients as $client) {
            $this->addClient($client);
        }

        $this->collClients = $clients;
        $this->collClientsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Client objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Client objects.
     * @throws PropelException
     */
    public function countClients(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClientsPartial && !$this->isNew();
        if (null === $this->collClients || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClients) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClients());
            }
            $query = ClientQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collClients);
    }

    /**
     * Method called to associate a Client object to this object
     * through the Client foreign key attribute.
     *
     * @param    Client $l Client
     * @return Company The current object (for fluent API support)
     */
    public function addClient(Client $l)
    {
        if ($this->collClients === null) {
            $this->initClients();
            $this->collClientsPartial = true;
        }

        if (!in_array($l, $this->collClients->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClient($l);

            if ($this->clientsScheduledForDeletion and $this->clientsScheduledForDeletion->contains($l)) {
                $this->clientsScheduledForDeletion->remove($this->clientsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Client $client The client object to add.
     */
    protected function doAddClient($client)
    {
        $this->collClients[]= $client;
        $client->setCompany($this);
    }

    /**
     * @param	Client $client The client object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeClient($client)
    {
        if ($this->getClients()->contains($client)) {
            $this->collClients->remove($this->collClients->search($client));
            if (null === $this->clientsScheduledForDeletion) {
                $this->clientsScheduledForDeletion = clone $this->collClients;
                $this->clientsScheduledForDeletion->clear();
            }
            $this->clientsScheduledForDeletion[]= clone $client;
            $client->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collDepartments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addDepartments()
     */
    public function clearDepartments()
    {
        $this->collDepartments = null; // important to set this to null since that means it is uninitialized
        $this->collDepartmentsPartial = null;

        return $this;
    }

    /**
     * reset is the collDepartments collection loaded partially
     *
     * @return void
     */
    public function resetPartialDepartments($v = true)
    {
        $this->collDepartmentsPartial = $v;
    }

    /**
     * Initializes the collDepartments collection.
     *
     * By default this just sets the collDepartments collection to an empty array (like clearcollDepartments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDepartments($overrideExisting = true)
    {
        if (null !== $this->collDepartments && !$overrideExisting) {
            return;
        }
        $this->collDepartments = new PropelObjectCollection();
        $this->collDepartments->setModel('Department');
    }

    /**
     * Gets an array of Department objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Department[] List of Department objects
     * @throws PropelException
     */
    public function getDepartments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentsPartial && !$this->isNew();
        if (null === $this->collDepartments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDepartments) {
                // return empty collection
                $this->initDepartments();
            } else {
                $collDepartments = DepartmentQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDepartmentsPartial && count($collDepartments)) {
                      $this->initDepartments(false);

                      foreach ($collDepartments as $obj) {
                        if (false == $this->collDepartments->contains($obj)) {
                          $this->collDepartments->append($obj);
                        }
                      }

                      $this->collDepartmentsPartial = true;
                    }

                    $collDepartments->getInternalIterator()->rewind();

                    return $collDepartments;
                }

                if ($partial && $this->collDepartments) {
                    foreach ($this->collDepartments as $obj) {
                        if ($obj->isNew()) {
                            $collDepartments[] = $obj;
                        }
                    }
                }

                $this->collDepartments = $collDepartments;
                $this->collDepartmentsPartial = false;
            }
        }

        return $this->collDepartments;
    }

    /**
     * Sets a collection of Department objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $departments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setDepartments(PropelCollection $departments, PropelPDO $con = null)
    {
        $departmentsToDelete = $this->getDepartments(new Criteria(), $con)->diff($departments);


        $this->departmentsScheduledForDeletion = $departmentsToDelete;

        foreach ($departmentsToDelete as $departmentRemoved) {
            $departmentRemoved->setCompany(null);
        }

        $this->collDepartments = null;
        foreach ($departments as $department) {
            $this->addDepartment($department);
        }

        $this->collDepartments = $departments;
        $this->collDepartmentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Department objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Department objects.
     * @throws PropelException
     */
    public function countDepartments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDepartmentsPartial && !$this->isNew();
        if (null === $this->collDepartments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDepartments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDepartments());
            }
            $query = DepartmentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collDepartments);
    }

    /**
     * Method called to associate a Department object to this object
     * through the Department foreign key attribute.
     *
     * @param    Department $l Department
     * @return Company The current object (for fluent API support)
     */
    public function addDepartment(Department $l)
    {
        if ($this->collDepartments === null) {
            $this->initDepartments();
            $this->collDepartmentsPartial = true;
        }

        if (!in_array($l, $this->collDepartments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDepartment($l);

            if ($this->departmentsScheduledForDeletion and $this->departmentsScheduledForDeletion->contains($l)) {
                $this->departmentsScheduledForDeletion->remove($this->departmentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Department $department The department object to add.
     */
    protected function doAddDepartment($department)
    {
        $this->collDepartments[]= $department;
        $department->setCompany($this);
    }

    /**
     * @param	Department $department The department object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeDepartment($department)
    {
        if ($this->getDepartments()->contains($department)) {
            $this->collDepartments->remove($this->collDepartments->search($department));
            if (null === $this->departmentsScheduledForDeletion) {
                $this->departmentsScheduledForDeletion = clone $this->collDepartments;
                $this->departmentsScheduledForDeletion->clear();
            }
            $this->departmentsScheduledForDeletion[]= clone $department;
            $department->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpensecategorys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addExpensecategorys()
     */
    public function clearExpensecategorys()
    {
        $this->collExpensecategorys = null; // important to set this to null since that means it is uninitialized
        $this->collExpensecategorysPartial = null;

        return $this;
    }

    /**
     * reset is the collExpensecategorys collection loaded partially
     *
     * @return void
     */
    public function resetPartialExpensecategorys($v = true)
    {
        $this->collExpensecategorysPartial = $v;
    }

    /**
     * Initializes the collExpensecategorys collection.
     *
     * By default this just sets the collExpensecategorys collection to an empty array (like clearcollExpensecategorys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpensecategorys($overrideExisting = true)
    {
        if (null !== $this->collExpensecategorys && !$overrideExisting) {
            return;
        }
        $this->collExpensecategorys = new PropelObjectCollection();
        $this->collExpensecategorys->setModel('Expensecategory');
    }

    /**
     * Gets an array of Expensecategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Expensecategory[] List of Expensecategory objects
     * @throws PropelException
     */
    public function getExpensecategorys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collExpensecategorysPartial && !$this->isNew();
        if (null === $this->collExpensecategorys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpensecategorys) {
                // return empty collection
                $this->initExpensecategorys();
            } else {
                $collExpensecategorys = ExpensecategoryQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collExpensecategorysPartial && count($collExpensecategorys)) {
                      $this->initExpensecategorys(false);

                      foreach ($collExpensecategorys as $obj) {
                        if (false == $this->collExpensecategorys->contains($obj)) {
                          $this->collExpensecategorys->append($obj);
                        }
                      }

                      $this->collExpensecategorysPartial = true;
                    }

                    $collExpensecategorys->getInternalIterator()->rewind();

                    return $collExpensecategorys;
                }

                if ($partial && $this->collExpensecategorys) {
                    foreach ($this->collExpensecategorys as $obj) {
                        if ($obj->isNew()) {
                            $collExpensecategorys[] = $obj;
                        }
                    }
                }

                $this->collExpensecategorys = $collExpensecategorys;
                $this->collExpensecategorysPartial = false;
            }
        }

        return $this->collExpensecategorys;
    }

    /**
     * Sets a collection of Expensecategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $expensecategorys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setExpensecategorys(PropelCollection $expensecategorys, PropelPDO $con = null)
    {
        $expensecategorysToDelete = $this->getExpensecategorys(new Criteria(), $con)->diff($expensecategorys);


        $this->expensecategorysScheduledForDeletion = $expensecategorysToDelete;

        foreach ($expensecategorysToDelete as $expensecategoryRemoved) {
            $expensecategoryRemoved->setCompany(null);
        }

        $this->collExpensecategorys = null;
        foreach ($expensecategorys as $expensecategory) {
            $this->addExpensecategory($expensecategory);
        }

        $this->collExpensecategorys = $expensecategorys;
        $this->collExpensecategorysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expensecategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Expensecategory objects.
     * @throws PropelException
     */
    public function countExpensecategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collExpensecategorysPartial && !$this->isNew();
        if (null === $this->collExpensecategorys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpensecategorys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpensecategorys());
            }
            $query = ExpensecategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collExpensecategorys);
    }

    /**
     * Method called to associate a Expensecategory object to this object
     * through the Expensecategory foreign key attribute.
     *
     * @param    Expensecategory $l Expensecategory
     * @return Company The current object (for fluent API support)
     */
    public function addExpensecategory(Expensecategory $l)
    {
        if ($this->collExpensecategorys === null) {
            $this->initExpensecategorys();
            $this->collExpensecategorysPartial = true;
        }

        if (!in_array($l, $this->collExpensecategorys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddExpensecategory($l);

            if ($this->expensecategorysScheduledForDeletion and $this->expensecategorysScheduledForDeletion->contains($l)) {
                $this->expensecategorysScheduledForDeletion->remove($this->expensecategorysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Expensecategory $expensecategory The expensecategory object to add.
     */
    protected function doAddExpensecategory($expensecategory)
    {
        $this->collExpensecategorys[]= $expensecategory;
        $expensecategory->setCompany($this);
    }

    /**
     * @param	Expensecategory $expensecategory The expensecategory object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeExpensecategory($expensecategory)
    {
        if ($this->getExpensecategorys()->contains($expensecategory)) {
            $this->collExpensecategorys->remove($this->collExpensecategorys->search($expensecategory));
            if (null === $this->expensecategorysScheduledForDeletion) {
                $this->expensecategorysScheduledForDeletion = clone $this->collExpensecategorys;
                $this->expensecategorysScheduledForDeletion->clear();
            }
            $this->expensecategorysScheduledForDeletion[]= clone $expensecategory;
            $expensecategory->setCompany(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Company is new, it will return
     * an empty collection; or if this Company has previously
     * been saved, it will retrieve related Expensecategorys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Company.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Expensecategory[] List of Expensecategory objects
     */
    public function getExpensecategorysJoinExpensecategoryRelatedByExpensecategoryDependency($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ExpensecategoryQuery::create(null, $criteria);
        $query->joinWith('ExpensecategoryRelatedByExpensecategoryDependency', $join_behavior);

        return $this->getExpensecategorys($query, $con);
    }

    /**
     * Clears out the collMxtaxinfos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addMxtaxinfos()
     */
    public function clearMxtaxinfos()
    {
        $this->collMxtaxinfos = null; // important to set this to null since that means it is uninitialized
        $this->collMxtaxinfosPartial = null;

        return $this;
    }

    /**
     * reset is the collMxtaxinfos collection loaded partially
     *
     * @return void
     */
    public function resetPartialMxtaxinfos($v = true)
    {
        $this->collMxtaxinfosPartial = $v;
    }

    /**
     * Initializes the collMxtaxinfos collection.
     *
     * By default this just sets the collMxtaxinfos collection to an empty array (like clearcollMxtaxinfos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMxtaxinfos($overrideExisting = true)
    {
        if (null !== $this->collMxtaxinfos && !$overrideExisting) {
            return;
        }
        $this->collMxtaxinfos = new PropelObjectCollection();
        $this->collMxtaxinfos->setModel('Mxtaxinfo');
    }

    /**
     * Gets an array of Mxtaxinfo objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mxtaxinfo[] List of Mxtaxinfo objects
     * @throws PropelException
     */
    public function getMxtaxinfos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxinfosPartial && !$this->isNew();
        if (null === $this->collMxtaxinfos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMxtaxinfos) {
                // return empty collection
                $this->initMxtaxinfos();
            } else {
                $collMxtaxinfos = MxtaxinfoQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMxtaxinfosPartial && count($collMxtaxinfos)) {
                      $this->initMxtaxinfos(false);

                      foreach ($collMxtaxinfos as $obj) {
                        if (false == $this->collMxtaxinfos->contains($obj)) {
                          $this->collMxtaxinfos->append($obj);
                        }
                      }

                      $this->collMxtaxinfosPartial = true;
                    }

                    $collMxtaxinfos->getInternalIterator()->rewind();

                    return $collMxtaxinfos;
                }

                if ($partial && $this->collMxtaxinfos) {
                    foreach ($this->collMxtaxinfos as $obj) {
                        if ($obj->isNew()) {
                            $collMxtaxinfos[] = $obj;
                        }
                    }
                }

                $this->collMxtaxinfos = $collMxtaxinfos;
                $this->collMxtaxinfosPartial = false;
            }
        }

        return $this->collMxtaxinfos;
    }

    /**
     * Sets a collection of Mxtaxinfo objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mxtaxinfos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setMxtaxinfos(PropelCollection $mxtaxinfos, PropelPDO $con = null)
    {
        $mxtaxinfosToDelete = $this->getMxtaxinfos(new Criteria(), $con)->diff($mxtaxinfos);


        $this->mxtaxinfosScheduledForDeletion = $mxtaxinfosToDelete;

        foreach ($mxtaxinfosToDelete as $mxtaxinfoRemoved) {
            $mxtaxinfoRemoved->setCompany(null);
        }

        $this->collMxtaxinfos = null;
        foreach ($mxtaxinfos as $mxtaxinfo) {
            $this->addMxtaxinfo($mxtaxinfo);
        }

        $this->collMxtaxinfos = $mxtaxinfos;
        $this->collMxtaxinfosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mxtaxinfo objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mxtaxinfo objects.
     * @throws PropelException
     */
    public function countMxtaxinfos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMxtaxinfosPartial && !$this->isNew();
        if (null === $this->collMxtaxinfos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMxtaxinfos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMxtaxinfos());
            }
            $query = MxtaxinfoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collMxtaxinfos);
    }

    /**
     * Method called to associate a Mxtaxinfo object to this object
     * through the Mxtaxinfo foreign key attribute.
     *
     * @param    Mxtaxinfo $l Mxtaxinfo
     * @return Company The current object (for fluent API support)
     */
    public function addMxtaxinfo(Mxtaxinfo $l)
    {
        if ($this->collMxtaxinfos === null) {
            $this->initMxtaxinfos();
            $this->collMxtaxinfosPartial = true;
        }

        if (!in_array($l, $this->collMxtaxinfos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMxtaxinfo($l);

            if ($this->mxtaxinfosScheduledForDeletion and $this->mxtaxinfosScheduledForDeletion->contains($l)) {
                $this->mxtaxinfosScheduledForDeletion->remove($this->mxtaxinfosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Mxtaxinfo $mxtaxinfo The mxtaxinfo object to add.
     */
    protected function doAddMxtaxinfo($mxtaxinfo)
    {
        $this->collMxtaxinfos[]= $mxtaxinfo;
        $mxtaxinfo->setCompany($this);
    }

    /**
     * @param	Mxtaxinfo $mxtaxinfo The mxtaxinfo object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeMxtaxinfo($mxtaxinfo)
    {
        if ($this->getMxtaxinfos()->contains($mxtaxinfo)) {
            $this->collMxtaxinfos->remove($this->collMxtaxinfos->search($mxtaxinfo));
            if (null === $this->mxtaxinfosScheduledForDeletion) {
                $this->mxtaxinfosScheduledForDeletion = clone $this->collMxtaxinfos;
                $this->mxtaxinfosScheduledForDeletion->clear();
            }
            $this->mxtaxinfosScheduledForDeletion[]= clone $mxtaxinfo;
            $mxtaxinfo->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductionteams collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addProductionteams()
     */
    public function clearProductionteams()
    {
        $this->collProductionteams = null; // important to set this to null since that means it is uninitialized
        $this->collProductionteamsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductionteams collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductionteams($v = true)
    {
        $this->collProductionteamsPartial = $v;
    }

    /**
     * Initializes the collProductionteams collection.
     *
     * By default this just sets the collProductionteams collection to an empty array (like clearcollProductionteams());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductionteams($overrideExisting = true)
    {
        if (null !== $this->collProductionteams && !$overrideExisting) {
            return;
        }
        $this->collProductionteams = new PropelObjectCollection();
        $this->collProductionteams->setModel('Productionteam');
    }

    /**
     * Gets an array of Productionteam objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productionteam[] List of Productionteam objects
     * @throws PropelException
     */
    public function getProductionteams($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductionteamsPartial && !$this->isNew();
        if (null === $this->collProductionteams || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductionteams) {
                // return empty collection
                $this->initProductionteams();
            } else {
                $collProductionteams = ProductionteamQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductionteamsPartial && count($collProductionteams)) {
                      $this->initProductionteams(false);

                      foreach ($collProductionteams as $obj) {
                        if (false == $this->collProductionteams->contains($obj)) {
                          $this->collProductionteams->append($obj);
                        }
                      }

                      $this->collProductionteamsPartial = true;
                    }

                    $collProductionteams->getInternalIterator()->rewind();

                    return $collProductionteams;
                }

                if ($partial && $this->collProductionteams) {
                    foreach ($this->collProductionteams as $obj) {
                        if ($obj->isNew()) {
                            $collProductionteams[] = $obj;
                        }
                    }
                }

                $this->collProductionteams = $collProductionteams;
                $this->collProductionteamsPartial = false;
            }
        }

        return $this->collProductionteams;
    }

    /**
     * Sets a collection of Productionteam objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productionteams A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setProductionteams(PropelCollection $productionteams, PropelPDO $con = null)
    {
        $productionteamsToDelete = $this->getProductionteams(new Criteria(), $con)->diff($productionteams);


        $this->productionteamsScheduledForDeletion = $productionteamsToDelete;

        foreach ($productionteamsToDelete as $productionteamRemoved) {
            $productionteamRemoved->setCompany(null);
        }

        $this->collProductionteams = null;
        foreach ($productionteams as $productionteam) {
            $this->addProductionteam($productionteam);
        }

        $this->collProductionteams = $productionteams;
        $this->collProductionteamsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productionteam objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productionteam objects.
     * @throws PropelException
     */
    public function countProductionteams(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductionteamsPartial && !$this->isNew();
        if (null === $this->collProductionteams || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductionteams) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductionteams());
            }
            $query = ProductionteamQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collProductionteams);
    }

    /**
     * Method called to associate a Productionteam object to this object
     * through the Productionteam foreign key attribute.
     *
     * @param    Productionteam $l Productionteam
     * @return Company The current object (for fluent API support)
     */
    public function addProductionteam(Productionteam $l)
    {
        if ($this->collProductionteams === null) {
            $this->initProductionteams();
            $this->collProductionteamsPartial = true;
        }

        if (!in_array($l, $this->collProductionteams->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductionteam($l);

            if ($this->productionteamsScheduledForDeletion and $this->productionteamsScheduledForDeletion->contains($l)) {
                $this->productionteamsScheduledForDeletion->remove($this->productionteamsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productionteam $productionteam The productionteam object to add.
     */
    protected function doAddProductionteam($productionteam)
    {
        $this->collProductionteams[]= $productionteam;
        $productionteam->setCompany($this);
    }

    /**
     * @param	Productionteam $productionteam The productionteam object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeProductionteam($productionteam)
    {
        if ($this->getProductionteams()->contains($productionteam)) {
            $this->collProductionteams->remove($this->collProductionteams->search($productionteam));
            if (null === $this->productionteamsScheduledForDeletion) {
                $this->productionteamsScheduledForDeletion = clone $this->collProductionteams;
                $this->productionteamsScheduledForDeletion->clear();
            }
            $this->productionteamsScheduledForDeletion[]= clone $productionteam;
            $productionteam->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductmains collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addProductmains()
     */
    public function clearProductmains()
    {
        $this->collProductmains = null; // important to set this to null since that means it is uninitialized
        $this->collProductmainsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductmains collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductmains($v = true)
    {
        $this->collProductmainsPartial = $v;
    }

    /**
     * Initializes the collProductmains collection.
     *
     * By default this just sets the collProductmains collection to an empty array (like clearcollProductmains());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductmains($overrideExisting = true)
    {
        if (null !== $this->collProductmains && !$overrideExisting) {
            return;
        }
        $this->collProductmains = new PropelObjectCollection();
        $this->collProductmains->setModel('Productmain');
    }

    /**
     * Gets an array of Productmain objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productmain[] List of Productmain objects
     * @throws PropelException
     */
    public function getProductmains($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductmainsPartial && !$this->isNew();
        if (null === $this->collProductmains || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductmains) {
                // return empty collection
                $this->initProductmains();
            } else {
                $collProductmains = ProductmainQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductmainsPartial && count($collProductmains)) {
                      $this->initProductmains(false);

                      foreach ($collProductmains as $obj) {
                        if (false == $this->collProductmains->contains($obj)) {
                          $this->collProductmains->append($obj);
                        }
                      }

                      $this->collProductmainsPartial = true;
                    }

                    $collProductmains->getInternalIterator()->rewind();

                    return $collProductmains;
                }

                if ($partial && $this->collProductmains) {
                    foreach ($this->collProductmains as $obj) {
                        if ($obj->isNew()) {
                            $collProductmains[] = $obj;
                        }
                    }
                }

                $this->collProductmains = $collProductmains;
                $this->collProductmainsPartial = false;
            }
        }

        return $this->collProductmains;
    }

    /**
     * Sets a collection of Productmain objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productmains A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setProductmains(PropelCollection $productmains, PropelPDO $con = null)
    {
        $productmainsToDelete = $this->getProductmains(new Criteria(), $con)->diff($productmains);


        $this->productmainsScheduledForDeletion = $productmainsToDelete;

        foreach ($productmainsToDelete as $productmainRemoved) {
            $productmainRemoved->setCompany(null);
        }

        $this->collProductmains = null;
        foreach ($productmains as $productmain) {
            $this->addProductmain($productmain);
        }

        $this->collProductmains = $productmains;
        $this->collProductmainsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productmain objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productmain objects.
     * @throws PropelException
     */
    public function countProductmains(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductmainsPartial && !$this->isNew();
        if (null === $this->collProductmains || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductmains) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductmains());
            }
            $query = ProductmainQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collProductmains);
    }

    /**
     * Method called to associate a Productmain object to this object
     * through the Productmain foreign key attribute.
     *
     * @param    Productmain $l Productmain
     * @return Company The current object (for fluent API support)
     */
    public function addProductmain(Productmain $l)
    {
        if ($this->collProductmains === null) {
            $this->initProductmains();
            $this->collProductmainsPartial = true;
        }

        if (!in_array($l, $this->collProductmains->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductmain($l);

            if ($this->productmainsScheduledForDeletion and $this->productmainsScheduledForDeletion->contains($l)) {
                $this->productmainsScheduledForDeletion->remove($this->productmainsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productmain $productmain The productmain object to add.
     */
    protected function doAddProductmain($productmain)
    {
        $this->collProductmains[]= $productmain;
        $productmain->setCompany($this);
    }

    /**
     * @param	Productmain $productmain The productmain object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeProductmain($productmain)
    {
        if ($this->getProductmains()->contains($productmain)) {
            $this->collProductmains->remove($this->collProductmains->search($productmain));
            if (null === $this->productmainsScheduledForDeletion) {
                $this->productmainsScheduledForDeletion = clone $this->collProductmains;
                $this->productmainsScheduledForDeletion->clear();
            }
            $this->productmainsScheduledForDeletion[]= clone $productmain;
            $productmain->setCompany(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Company is new, it will return
     * an empty collection; or if this Company has previously
     * been saved, it will retrieve related Productmains from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Company.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productmain[] List of Productmain objects
     */
    public function getProductmainsJoinProductcategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductmainQuery::create(null, $criteria);
        $query->joinWith('Productcategory', $join_behavior);

        return $this->getProductmains($query, $con);
    }

    /**
     * Clears out the collUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Company The current object (for fluent API support)
     * @see        addUsers()
     */
    public function clearUsers()
    {
        $this->collUsers = null; // important to set this to null since that means it is uninitialized
        $this->collUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsers($v = true)
    {
        $this->collUsersPartial = $v;
    }

    /**
     * Initializes the collUsers collection.
     *
     * By default this just sets the collUsers collection to an empty array (like clearcollUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsers($overrideExisting = true)
    {
        if (null !== $this->collUsers && !$overrideExisting) {
            return;
        }
        $this->collUsers = new PropelObjectCollection();
        $this->collUsers->setModel('User');
    }

    /**
     * Gets an array of User objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Company is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|User[] List of User objects
     * @throws PropelException
     */
    public function getUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersPartial && !$this->isNew();
        if (null === $this->collUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsers) {
                // return empty collection
                $this->initUsers();
            } else {
                $collUsers = UserQuery::create(null, $criteria)
                    ->filterByCompany($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersPartial && count($collUsers)) {
                      $this->initUsers(false);

                      foreach ($collUsers as $obj) {
                        if (false == $this->collUsers->contains($obj)) {
                          $this->collUsers->append($obj);
                        }
                      }

                      $this->collUsersPartial = true;
                    }

                    $collUsers->getInternalIterator()->rewind();

                    return $collUsers;
                }

                if ($partial && $this->collUsers) {
                    foreach ($this->collUsers as $obj) {
                        if ($obj->isNew()) {
                            $collUsers[] = $obj;
                        }
                    }
                }

                $this->collUsers = $collUsers;
                $this->collUsersPartial = false;
            }
        }

        return $this->collUsers;
    }

    /**
     * Sets a collection of User objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $users A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Company The current object (for fluent API support)
     */
    public function setUsers(PropelCollection $users, PropelPDO $con = null)
    {
        $usersToDelete = $this->getUsers(new Criteria(), $con)->diff($users);


        $this->usersScheduledForDeletion = $usersToDelete;

        foreach ($usersToDelete as $userRemoved) {
            $userRemoved->setCompany(null);
        }

        $this->collUsers = null;
        foreach ($users as $user) {
            $this->addUser($user);
        }

        $this->collUsers = $users;
        $this->collUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related User objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related User objects.
     * @throws PropelException
     */
    public function countUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersPartial && !$this->isNew();
        if (null === $this->collUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsers());
            }
            $query = UserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompany($this)
                ->count($con);
        }

        return count($this->collUsers);
    }

    /**
     * Method called to associate a User object to this object
     * through the User foreign key attribute.
     *
     * @param    User $l User
     * @return Company The current object (for fluent API support)
     */
    public function addUser(User $l)
    {
        if ($this->collUsers === null) {
            $this->initUsers();
            $this->collUsersPartial = true;
        }

        if (!in_array($l, $this->collUsers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUser($l);

            if ($this->usersScheduledForDeletion and $this->usersScheduledForDeletion->contains($l)) {
                $this->usersScheduledForDeletion->remove($this->usersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	User $user The user object to add.
     */
    protected function doAddUser($user)
    {
        $this->collUsers[]= $user;
        $user->setCompany($this);
    }

    /**
     * @param	User $user The user object to remove.
     * @return Company The current object (for fluent API support)
     */
    public function removeUser($user)
    {
        if ($this->getUsers()->contains($user)) {
            $this->collUsers->remove($this->collUsers->search($user));
            if (null === $this->usersScheduledForDeletion) {
                $this->usersScheduledForDeletion = clone $this->collUsers;
                $this->usersScheduledForDeletion->clear();
            }
            $this->usersScheduledForDeletion[]= clone $user;
            $user->setCompany(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcompany = null;
        $this->company_name = null;
        $this->company_timezone = null;
        $this->company_iso_codecountry = null;
        $this->company_address = null;
        $this->company_address2 = null;
        $this->company_city = null;
        $this->company_state = null;
        $this->company_zipcode = null;
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
            if ($this->collBankaccounts) {
                foreach ($this->collBankaccounts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBranchs) {
                foreach ($this->collBranchs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClients) {
                foreach ($this->collClients as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDepartments) {
                foreach ($this->collDepartments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpensecategorys) {
                foreach ($this->collExpensecategorys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMxtaxinfos) {
                foreach ($this->collMxtaxinfos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductionteams) {
                foreach ($this->collProductionteams as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductmains) {
                foreach ($this->collProductmains as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsers) {
                foreach ($this->collUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBankaccounts instanceof PropelCollection) {
            $this->collBankaccounts->clearIterator();
        }
        $this->collBankaccounts = null;
        if ($this->collBranchs instanceof PropelCollection) {
            $this->collBranchs->clearIterator();
        }
        $this->collBranchs = null;
        if ($this->collClients instanceof PropelCollection) {
            $this->collClients->clearIterator();
        }
        $this->collClients = null;
        if ($this->collDepartments instanceof PropelCollection) {
            $this->collDepartments->clearIterator();
        }
        $this->collDepartments = null;
        if ($this->collExpensecategorys instanceof PropelCollection) {
            $this->collExpensecategorys->clearIterator();
        }
        $this->collExpensecategorys = null;
        if ($this->collMxtaxinfos instanceof PropelCollection) {
            $this->collMxtaxinfos->clearIterator();
        }
        $this->collMxtaxinfos = null;
        if ($this->collProductionteams instanceof PropelCollection) {
            $this->collProductionteams->clearIterator();
        }
        $this->collProductionteams = null;
        if ($this->collProductmains instanceof PropelCollection) {
            $this->collProductmains->clearIterator();
        }
        $this->collProductmains = null;
        if ($this->collUsers instanceof PropelCollection) {
            $this->collUsers->clearIterator();
        }
        $this->collUsers = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CompanyPeer::DEFAULT_STRING_FORMAT);
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
