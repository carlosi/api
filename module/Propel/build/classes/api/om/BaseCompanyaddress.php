<?php


/**
 * Base class that represents a row from the 'companyaddress' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseCompanyaddress extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CompanyaddressPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CompanyaddressPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcompanyaddress field.
     * @var        int
     */
    protected $idcompanyaddress;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the companyaddress_iso_codecountry field.
     * @var        string
     */
    protected $companyaddress_iso_codecountry;

    /**
     * The value for the companyaddress_iso_codephone field.
     * @var        string
     */
    protected $companyaddress_iso_codephone;

    /**
     * The value for the companyaddress_addressee field.
     * @var        string
     */
    protected $companyaddress_addressee;

    /**
     * The value for the companyaddress_addressee_cellular field.
     * @var        string
     */
    protected $companyaddress_addressee_cellular;

    /**
     * The value for the companyaddress_addressee_phone field.
     * @var        string
     */
    protected $companyaddress_addressee_phone;

    /**
     * The value for the companyaddress_address field.
     * @var        string
     */
    protected $companyaddress_address;

    /**
     * The value for the companyaddress_address2 field.
     * @var        string
     */
    protected $companyaddress_address2;

    /**
     * The value for the companyaddress_city field.
     * @var        string
     */
    protected $companyaddress_city;

    /**
     * The value for the companyaddress_state field.
     * @var        string
     */
    protected $companyaddress_state;

    /**
     * The value for the companyaddress_zipcode field.
     * @var        string
     */
    protected $companyaddress_zipcode;

    /**
     * @var        Company
     */
    protected $aCompany;

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
     * Get the [idcompanyaddress] column value.
     *
     * @return int
     */
    public function getIdcompanyaddress()
    {

        return $this->idcompanyaddress;
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
     * Get the [companyaddress_iso_codecountry] column value.
     *
     * @return string
     */
    public function getCompanyaddressIsoCodecountry()
    {

        return $this->companyaddress_iso_codecountry;
    }

    /**
     * Get the [companyaddress_iso_codephone] column value.
     *
     * @return string
     */
    public function getCompanyaddressIsoCodephone()
    {

        return $this->companyaddress_iso_codephone;
    }

    /**
     * Get the [companyaddress_addressee] column value.
     *
     * @return string
     */
    public function getCompanyaddressAddressee()
    {

        return $this->companyaddress_addressee;
    }

    /**
     * Get the [companyaddress_addressee_cellular] column value.
     *
     * @return string
     */
    public function getCompanyaddressAddresseeCellular()
    {

        return $this->companyaddress_addressee_cellular;
    }

    /**
     * Get the [companyaddress_addressee_phone] column value.
     *
     * @return string
     */
    public function getCompanyaddressAddresseePhone()
    {

        return $this->companyaddress_addressee_phone;
    }

    /**
     * Get the [companyaddress_address] column value.
     *
     * @return string
     */
    public function getCompanyaddressAddress()
    {

        return $this->companyaddress_address;
    }

    /**
     * Get the [companyaddress_address2] column value.
     *
     * @return string
     */
    public function getCompanyaddressAddress2()
    {

        return $this->companyaddress_address2;
    }

    /**
     * Get the [companyaddress_city] column value.
     *
     * @return string
     */
    public function getCompanyaddressCity()
    {

        return $this->companyaddress_city;
    }

    /**
     * Get the [companyaddress_state] column value.
     *
     * @return string
     */
    public function getCompanyaddressState()
    {

        return $this->companyaddress_state;
    }

    /**
     * Get the [companyaddress_zipcode] column value.
     *
     * @return string
     */
    public function getCompanyaddressZipcode()
    {

        return $this->companyaddress_zipcode;
    }

    /**
     * Set the value of [idcompanyaddress] column.
     *
     * @param  int $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setIdcompanyaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompanyaddress !== $v) {
            $this->idcompanyaddress = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::IDCOMPANYADDRESS;
        }


        return $this;
    } // setIdcompanyaddress()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [companyaddress_iso_codecountry] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressIsoCodecountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_iso_codecountry !== $v) {
            $this->companyaddress_iso_codecountry = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY;
        }


        return $this;
    } // setCompanyaddressIsoCodecountry()

    /**
     * Set the value of [companyaddress_iso_codephone] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressIsoCodephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_iso_codephone !== $v) {
            $this->companyaddress_iso_codephone = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE;
        }


        return $this;
    } // setCompanyaddressIsoCodephone()

    /**
     * Set the value of [companyaddress_addressee] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressAddressee($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_addressee !== $v) {
            $this->companyaddress_addressee = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE;
        }


        return $this;
    } // setCompanyaddressAddressee()

    /**
     * Set the value of [companyaddress_addressee_cellular] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressAddresseeCellular($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_addressee_cellular !== $v) {
            $this->companyaddress_addressee_cellular = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR;
        }


        return $this;
    } // setCompanyaddressAddresseeCellular()

    /**
     * Set the value of [companyaddress_addressee_phone] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressAddresseePhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_addressee_phone !== $v) {
            $this->companyaddress_addressee_phone = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE;
        }


        return $this;
    } // setCompanyaddressAddresseePhone()

    /**
     * Set the value of [companyaddress_address] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_address !== $v) {
            $this->companyaddress_address = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ADDRESS;
        }


        return $this;
    } // setCompanyaddressAddress()

    /**
     * Set the value of [companyaddress_address2] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_address2 !== $v) {
            $this->companyaddress_address2 = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ADDRESS2;
        }


        return $this;
    } // setCompanyaddressAddress2()

    /**
     * Set the value of [companyaddress_city] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_city !== $v) {
            $this->companyaddress_city = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_CITY;
        }


        return $this;
    } // setCompanyaddressCity()

    /**
     * Set the value of [companyaddress_state] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_state !== $v) {
            $this->companyaddress_state = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_STATE;
        }


        return $this;
    } // setCompanyaddressState()

    /**
     * Set the value of [companyaddress_zipcode] column.
     *
     * @param  string $v new value
     * @return Companyaddress The current object (for fluent API support)
     */
    public function setCompanyaddressZipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->companyaddress_zipcode !== $v) {
            $this->companyaddress_zipcode = $v;
            $this->modifiedColumns[] = CompanyaddressPeer::COMPANYADDRESS_ZIPCODE;
        }


        return $this;
    } // setCompanyaddressZipcode()

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

            $this->idcompanyaddress = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->companyaddress_iso_codecountry = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->companyaddress_iso_codephone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->companyaddress_addressee = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->companyaddress_addressee_cellular = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->companyaddress_addressee_phone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->companyaddress_address = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->companyaddress_address2 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->companyaddress_city = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->companyaddress_state = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->companyaddress_zipcode = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 12; // 12 = CompanyaddressPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Companyaddress object", $e);
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
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CompanyaddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
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
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CompanyaddressQuery::create()
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
            $con = Propel::getConnection(CompanyaddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CompanyaddressPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = CompanyaddressPeer::IDCOMPANYADDRESS;
        if (null !== $this->idcompanyaddress) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CompanyaddressPeer::IDCOMPANYADDRESS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CompanyaddressPeer::IDCOMPANYADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`idcompanyaddress`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_iso_codecountry`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_iso_codephone`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_addressee`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_addressee_cellular`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_addressee_phone`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_address`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_address2`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_city`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_state`';
        }
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = '`companyaddress_zipcode`';
        }

        $sql = sprintf(
            'INSERT INTO `companyaddress` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idcompanyaddress`':
                        $stmt->bindValue($identifier, $this->idcompanyaddress, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`companyaddress_iso_codecountry`':
                        $stmt->bindValue($identifier, $this->companyaddress_iso_codecountry, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_iso_codephone`':
                        $stmt->bindValue($identifier, $this->companyaddress_iso_codephone, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_addressee`':
                        $stmt->bindValue($identifier, $this->companyaddress_addressee, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_addressee_cellular`':
                        $stmt->bindValue($identifier, $this->companyaddress_addressee_cellular, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_addressee_phone`':
                        $stmt->bindValue($identifier, $this->companyaddress_addressee_phone, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_address`':
                        $stmt->bindValue($identifier, $this->companyaddress_address, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_address2`':
                        $stmt->bindValue($identifier, $this->companyaddress_address2, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_city`':
                        $stmt->bindValue($identifier, $this->companyaddress_city, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_state`':
                        $stmt->bindValue($identifier, $this->companyaddress_state, PDO::PARAM_STR);
                        break;
                    case '`companyaddress_zipcode`':
                        $stmt->bindValue($identifier, $this->companyaddress_zipcode, PDO::PARAM_STR);
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
        $this->setIdcompanyaddress($pk);

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


            if (($retval = CompanyaddressPeer::doValidate($this, $columns)) !== true) {
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
        $pos = CompanyaddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcompanyaddress();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getCompanyaddressIsoCodecountry();
                break;
            case 3:
                return $this->getCompanyaddressIsoCodephone();
                break;
            case 4:
                return $this->getCompanyaddressAddressee();
                break;
            case 5:
                return $this->getCompanyaddressAddresseeCellular();
                break;
            case 6:
                return $this->getCompanyaddressAddresseePhone();
                break;
            case 7:
                return $this->getCompanyaddressAddress();
                break;
            case 8:
                return $this->getCompanyaddressAddress2();
                break;
            case 9:
                return $this->getCompanyaddressCity();
                break;
            case 10:
                return $this->getCompanyaddressState();
                break;
            case 11:
                return $this->getCompanyaddressZipcode();
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
        if (isset($alreadyDumpedObjects['Companyaddress'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Companyaddress'][$this->getPrimaryKey()] = true;
        $keys = CompanyaddressPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcompanyaddress(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getCompanyaddressIsoCodecountry(),
            $keys[3] => $this->getCompanyaddressIsoCodephone(),
            $keys[4] => $this->getCompanyaddressAddressee(),
            $keys[5] => $this->getCompanyaddressAddresseeCellular(),
            $keys[6] => $this->getCompanyaddressAddresseePhone(),
            $keys[7] => $this->getCompanyaddressAddress(),
            $keys[8] => $this->getCompanyaddressAddress2(),
            $keys[9] => $this->getCompanyaddressCity(),
            $keys[10] => $this->getCompanyaddressState(),
            $keys[11] => $this->getCompanyaddressZipcode(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = CompanyaddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcompanyaddress($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setCompanyaddressIsoCodecountry($value);
                break;
            case 3:
                $this->setCompanyaddressIsoCodephone($value);
                break;
            case 4:
                $this->setCompanyaddressAddressee($value);
                break;
            case 5:
                $this->setCompanyaddressAddresseeCellular($value);
                break;
            case 6:
                $this->setCompanyaddressAddresseePhone($value);
                break;
            case 7:
                $this->setCompanyaddressAddress($value);
                break;
            case 8:
                $this->setCompanyaddressAddress2($value);
                break;
            case 9:
                $this->setCompanyaddressCity($value);
                break;
            case 10:
                $this->setCompanyaddressState($value);
                break;
            case 11:
                $this->setCompanyaddressZipcode($value);
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
        $keys = CompanyaddressPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcompanyaddress($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCompanyaddressIsoCodecountry($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCompanyaddressIsoCodephone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCompanyaddressAddressee($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCompanyaddressAddresseeCellular($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCompanyaddressAddresseePhone($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCompanyaddressAddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCompanyaddressAddress2($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCompanyaddressCity($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCompanyaddressState($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCompanyaddressZipcode($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);

        if ($this->isColumnModified(CompanyaddressPeer::IDCOMPANYADDRESS)) $criteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, $this->idcompanyaddress);
        if ($this->isColumnModified(CompanyaddressPeer::IDCOMPANY)) $criteria->add(CompanyaddressPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ISO_CODECOUNTRY, $this->companyaddress_iso_codecountry);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ISO_CODEPHONE, $this->companyaddress_iso_codephone);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE, $this->companyaddress_addressee);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_CELLULAR, $this->companyaddress_addressee_cellular);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ADDRESSEE_PHONE, $this->companyaddress_addressee_phone);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESS)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ADDRESS, $this->companyaddress_address);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ADDRESS2)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ADDRESS2, $this->companyaddress_address2);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_CITY)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_CITY, $this->companyaddress_city);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_STATE)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_STATE, $this->companyaddress_state);
        if ($this->isColumnModified(CompanyaddressPeer::COMPANYADDRESS_ZIPCODE)) $criteria->add(CompanyaddressPeer::COMPANYADDRESS_ZIPCODE, $this->companyaddress_zipcode);

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
        $criteria = new Criteria(CompanyaddressPeer::DATABASE_NAME);
        $criteria->add(CompanyaddressPeer::IDCOMPANYADDRESS, $this->idcompanyaddress);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcompanyaddress();
    }

    /**
     * Generic method to set the primary key (idcompanyaddress column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcompanyaddress($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcompanyaddress();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Companyaddress (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setCompanyaddressIsoCodecountry($this->getCompanyaddressIsoCodecountry());
        $copyObj->setCompanyaddressIsoCodephone($this->getCompanyaddressIsoCodephone());
        $copyObj->setCompanyaddressAddressee($this->getCompanyaddressAddressee());
        $copyObj->setCompanyaddressAddresseeCellular($this->getCompanyaddressAddresseeCellular());
        $copyObj->setCompanyaddressAddresseePhone($this->getCompanyaddressAddresseePhone());
        $copyObj->setCompanyaddressAddress($this->getCompanyaddressAddress());
        $copyObj->setCompanyaddressAddress2($this->getCompanyaddressAddress2());
        $copyObj->setCompanyaddressCity($this->getCompanyaddressCity());
        $copyObj->setCompanyaddressState($this->getCompanyaddressState());
        $copyObj->setCompanyaddressZipcode($this->getCompanyaddressZipcode());

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
            $copyObj->setIdcompanyaddress(NULL); // this is a auto-increment column, so set to default value
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
     * @return Companyaddress Clone of current object.
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
     * @return CompanyaddressPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CompanyaddressPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Companyaddress The current object (for fluent API support)
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
            $v->addCompanyaddress($this);
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
                $this->aCompany->addCompanyaddresss($this);
             */
        }

        return $this->aCompany;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcompanyaddress = null;
        $this->idcompany = null;
        $this->companyaddress_iso_codecountry = null;
        $this->companyaddress_iso_codephone = null;
        $this->companyaddress_addressee = null;
        $this->companyaddress_addressee_cellular = null;
        $this->companyaddress_addressee_phone = null;
        $this->companyaddress_address = null;
        $this->companyaddress_address2 = null;
        $this->companyaddress_city = null;
        $this->companyaddress_state = null;
        $this->companyaddress_zipcode = null;
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
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CompanyaddressPeer::DEFAULT_STRING_FORMAT);
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
