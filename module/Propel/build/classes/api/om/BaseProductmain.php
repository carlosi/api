<?php


/**
 * Base class that represents a row from the 'productmain' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductmain extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductmainPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductmainPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductmain field.
     * @var        int
     */
    protected $idproductmain;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the idproductcategory field.
     * @var        int
     */
    protected $idproductcategory;

    /**
     * The value for the productmain_name field.
     * @var        string
     */
    protected $productmain_name;

    /**
     * The value for the productmain_unit field.
     * @var        string
     */
    protected $productmain_unit;

    /**
     * The value for the productmain_discount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $productmain_discount;

    /**
     * The value for the productmain_eachpieces field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $productmain_eachpieces;

    /**
     * The value for the productmain_maxdiscount field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $productmain_maxdiscount;

    /**
     * The value for the productmain_baseproperty field.
     * @var        string
     */
    protected $productmain_baseproperty;

    /**
     * The value for the productmain_type field.
     * Note: this column has a database default value of: 'PRODUCT'
     * @var        string
     */
    protected $productmain_type;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        Productcategory
     */
    protected $aProductcategory;

    /**
     * @var        PropelObjectCollection|Mlitem[] Collection to store aggregation of Mlitem objects.
     */
    protected $collMlitems;
    protected $collMlitemsPartial;

    /**
     * @var        PropelObjectCollection|Product[] Collection to store aggregation of Product objects.
     */
    protected $collProducts;
    protected $collProductsPartial;

    /**
     * @var        PropelObjectCollection|Productmainphoto[] Collection to store aggregation of Productmainphoto objects.
     */
    protected $collProductmainphotos;
    protected $collProductmainphotosPartial;

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
    protected $mlitemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productmainphotosScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->productmain_discount = 0;
        $this->productmain_eachpieces = 0;
        $this->productmain_maxdiscount = 0;
        $this->productmain_type = 'PRODUCT';
    }

    /**
     * Initializes internal state of BaseProductmain object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idproductmain] column value.
     *
     * @return int
     */
    public function getIdproductmain()
    {

        return $this->idproductmain;
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
     * Get the [idproductcategory] column value.
     *
     * @return int
     */
    public function getIdproductcategory()
    {

        return $this->idproductcategory;
    }

    /**
     * Get the [productmain_name] column value.
     *
     * @return string
     */
    public function getProductmainName()
    {

        return $this->productmain_name;
    }

    /**
     * Get the [productmain_unit] column value.
     *
     * @return string
     */
    public function getProductmainUnit()
    {

        return $this->productmain_unit;
    }

    /**
     * Get the [productmain_discount] column value.
     *
     * @return int
     */
    public function getProductmainDiscount()
    {

        return $this->productmain_discount;
    }

    /**
     * Get the [productmain_eachpieces] column value.
     *
     * @return int
     */
    public function getProductmainEachpieces()
    {

        return $this->productmain_eachpieces;
    }

    /**
     * Get the [productmain_maxdiscount] column value.
     *
     * @return int
     */
    public function getProductmainMaxdiscount()
    {

        return $this->productmain_maxdiscount;
    }

    /**
     * Get the [productmain_baseproperty] column value.
     *
     * @return string
     */
    public function getProductmainBaseproperty()
    {

        return $this->productmain_baseproperty;
    }

    /**
     * Get the [productmain_type] column value.
     *
     * @return string
     */
    public function getProductmainType()
    {

        return $this->productmain_type;
    }

    /**
     * Set the value of [idproductmain] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setIdproductmain($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductmain !== $v) {
            $this->idproductmain = $v;
            $this->modifiedColumns[] = ProductmainPeer::IDPRODUCTMAIN;
        }


        return $this;
    } // setIdproductmain()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = ProductmainPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [idproductcategory] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setIdproductcategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductcategory !== $v) {
            $this->idproductcategory = $v;
            $this->modifiedColumns[] = ProductmainPeer::IDPRODUCTCATEGORY;
        }

        if ($this->aProductcategory !== null && $this->aProductcategory->getIdproductcategory() !== $v) {
            $this->aProductcategory = null;
        }


        return $this;
    } // setIdproductcategory()

    /**
     * Set the value of [productmain_name] column.
     *
     * @param  string $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productmain_name !== $v) {
            $this->productmain_name = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_NAME;
        }


        return $this;
    } // setProductmainName()

    /**
     * Set the value of [productmain_unit] column.
     *
     * @param  string $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productmain_unit !== $v) {
            $this->productmain_unit = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_UNIT;
        }


        return $this;
    } // setProductmainUnit()

    /**
     * Set the value of [productmain_discount] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainDiscount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->productmain_discount !== $v) {
            $this->productmain_discount = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_DISCOUNT;
        }


        return $this;
    } // setProductmainDiscount()

    /**
     * Set the value of [productmain_eachpieces] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainEachpieces($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->productmain_eachpieces !== $v) {
            $this->productmain_eachpieces = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_EACHPIECES;
        }


        return $this;
    } // setProductmainEachpieces()

    /**
     * Set the value of [productmain_maxdiscount] column.
     *
     * @param  int $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainMaxdiscount($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->productmain_maxdiscount !== $v) {
            $this->productmain_maxdiscount = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT;
        }


        return $this;
    } // setProductmainMaxdiscount()

    /**
     * Set the value of [productmain_baseproperty] column.
     *
     * @param  string $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainBaseproperty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productmain_baseproperty !== $v) {
            $this->productmain_baseproperty = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_BASEPROPERTY;
        }


        return $this;
    } // setProductmainBaseproperty()

    /**
     * Set the value of [productmain_type] column.
     *
     * @param  string $v new value
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productmain_type !== $v) {
            $this->productmain_type = $v;
            $this->modifiedColumns[] = ProductmainPeer::PRODUCTMAIN_TYPE;
        }


        return $this;
    } // setProductmainType()

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
            if ($this->productmain_discount !== 0) {
                return false;
            }

            if ($this->productmain_eachpieces !== 0) {
                return false;
            }

            if ($this->productmain_maxdiscount !== 0) {
                return false;
            }

            if ($this->productmain_type !== 'PRODUCT') {
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

            $this->idproductmain = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idproductcategory = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->productmain_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->productmain_unit = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->productmain_discount = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->productmain_eachpieces = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->productmain_maxdiscount = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->productmain_baseproperty = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->productmain_type = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = ProductmainPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productmain object", $e);
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
        if ($this->aProductcategory !== null && $this->idproductcategory !== $this->aProductcategory->getIdproductcategory()) {
            $this->aProductcategory = null;
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
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductmainPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->aProductcategory = null;
            $this->collMlitems = null;

            $this->collProducts = null;

            $this->collProductmainphotos = null;

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
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductmainQuery::create()
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
            $con = Propel::getConnection(ProductmainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductmainPeer::addInstanceToPool($this);
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

            if ($this->aProductcategory !== null) {
                if ($this->aProductcategory->isModified() || $this->aProductcategory->isNew()) {
                    $affectedRows += $this->aProductcategory->save($con);
                }
                $this->setProductcategory($this->aProductcategory);
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

            if ($this->mlitemsScheduledForDeletion !== null) {
                if (!$this->mlitemsScheduledForDeletion->isEmpty()) {
                    MlitemQuery::create()
                        ->filterByPrimaryKeys($this->mlitemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mlitemsScheduledForDeletion = null;
                }
            }

            if ($this->collMlitems !== null) {
                foreach ($this->collMlitems as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productsScheduledForDeletion !== null) {
                if (!$this->productsScheduledForDeletion->isEmpty()) {
                    ProductQuery::create()
                        ->filterByPrimaryKeys($this->productsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productsScheduledForDeletion = null;
                }
            }

            if ($this->collProducts !== null) {
                foreach ($this->collProducts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productmainphotosScheduledForDeletion !== null) {
                if (!$this->productmainphotosScheduledForDeletion->isEmpty()) {
                    ProductmainphotoQuery::create()
                        ->filterByPrimaryKeys($this->productmainphotosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productmainphotosScheduledForDeletion = null;
                }
            }

            if ($this->collProductmainphotos !== null) {
                foreach ($this->collProductmainphotos as $referrerFK) {
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

        $this->modifiedColumns[] = ProductmainPeer::IDPRODUCTMAIN;
        if (null !== $this->idproductmain) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductmainPeer::IDPRODUCTMAIN . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductmainPeer::IDPRODUCTMAIN)) {
            $modifiedColumns[':p' . $index++]  = '`idproductmain`';
        }
        if ($this->isColumnModified(ProductmainPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(ProductmainPeer::IDPRODUCTCATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`idproductcategory`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_name`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_UNIT)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_unit`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_discount`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_EACHPIECES)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_eachpieces`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_maxdiscount`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_BASEPROPERTY)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_baseproperty`';
        }
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`productmain_type`';
        }

        $sql = sprintf(
            'INSERT INTO `productmain` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductmain`':
                        $stmt->bindValue($identifier, $this->idproductmain, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`idproductcategory`':
                        $stmt->bindValue($identifier, $this->idproductcategory, PDO::PARAM_INT);
                        break;
                    case '`productmain_name`':
                        $stmt->bindValue($identifier, $this->productmain_name, PDO::PARAM_STR);
                        break;
                    case '`productmain_unit`':
                        $stmt->bindValue($identifier, $this->productmain_unit, PDO::PARAM_STR);
                        break;
                    case '`productmain_discount`':
                        $stmt->bindValue($identifier, $this->productmain_discount, PDO::PARAM_INT);
                        break;
                    case '`productmain_eachpieces`':
                        $stmt->bindValue($identifier, $this->productmain_eachpieces, PDO::PARAM_INT);
                        break;
                    case '`productmain_maxdiscount`':
                        $stmt->bindValue($identifier, $this->productmain_maxdiscount, PDO::PARAM_INT);
                        break;
                    case '`productmain_baseproperty`':
                        $stmt->bindValue($identifier, $this->productmain_baseproperty, PDO::PARAM_STR);
                        break;
                    case '`productmain_type`':
                        $stmt->bindValue($identifier, $this->productmain_type, PDO::PARAM_STR);
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
        $this->setIdproductmain($pk);

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

            if ($this->aProductcategory !== null) {
                if (!$this->aProductcategory->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductcategory->getValidationFailures());
                }
            }


            if (($retval = ProductmainPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMlitems !== null) {
                    foreach ($this->collMlitems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProducts !== null) {
                    foreach ($this->collProducts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductmainphotos !== null) {
                    foreach ($this->collProductmainphotos as $referrerFK) {
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
        $pos = ProductmainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductmain();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getIdproductcategory();
                break;
            case 3:
                return $this->getProductmainName();
                break;
            case 4:
                return $this->getProductmainUnit();
                break;
            case 5:
                return $this->getProductmainDiscount();
                break;
            case 6:
                return $this->getProductmainEachpieces();
                break;
            case 7:
                return $this->getProductmainMaxdiscount();
                break;
            case 8:
                return $this->getProductmainBaseproperty();
                break;
            case 9:
                return $this->getProductmainType();
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
        if (isset($alreadyDumpedObjects['Productmain'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productmain'][$this->getPrimaryKey()] = true;
        $keys = ProductmainPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductmain(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getIdproductcategory(),
            $keys[3] => $this->getProductmainName(),
            $keys[4] => $this->getProductmainUnit(),
            $keys[5] => $this->getProductmainDiscount(),
            $keys[6] => $this->getProductmainEachpieces(),
            $keys[7] => $this->getProductmainMaxdiscount(),
            $keys[8] => $this->getProductmainBaseproperty(),
            $keys[9] => $this->getProductmainType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProductcategory) {
                $result['Productcategory'] = $this->aProductcategory->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMlitems) {
                $result['Mlitems'] = $this->collMlitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProducts) {
                $result['Products'] = $this->collProducts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductmainphotos) {
                $result['Productmainphotos'] = $this->collProductmainphotos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProductmainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductmain($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setIdproductcategory($value);
                break;
            case 3:
                $this->setProductmainName($value);
                break;
            case 4:
                $this->setProductmainUnit($value);
                break;
            case 5:
                $this->setProductmainDiscount($value);
                break;
            case 6:
                $this->setProductmainEachpieces($value);
                break;
            case 7:
                $this->setProductmainMaxdiscount($value);
                break;
            case 8:
                $this->setProductmainBaseproperty($value);
                break;
            case 9:
                $this->setProductmainType($value);
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
        $keys = ProductmainPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductmain($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdproductcategory($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProductmainName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProductmainUnit($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProductmainDiscount($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setProductmainEachpieces($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setProductmainMaxdiscount($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setProductmainBaseproperty($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setProductmainType($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductmainPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductmainPeer::IDPRODUCTMAIN)) $criteria->add(ProductmainPeer::IDPRODUCTMAIN, $this->idproductmain);
        if ($this->isColumnModified(ProductmainPeer::IDCOMPANY)) $criteria->add(ProductmainPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(ProductmainPeer::IDPRODUCTCATEGORY)) $criteria->add(ProductmainPeer::IDPRODUCTCATEGORY, $this->idproductcategory);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_NAME)) $criteria->add(ProductmainPeer::PRODUCTMAIN_NAME, $this->productmain_name);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_UNIT)) $criteria->add(ProductmainPeer::PRODUCTMAIN_UNIT, $this->productmain_unit);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_DISCOUNT)) $criteria->add(ProductmainPeer::PRODUCTMAIN_DISCOUNT, $this->productmain_discount);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_EACHPIECES)) $criteria->add(ProductmainPeer::PRODUCTMAIN_EACHPIECES, $this->productmain_eachpieces);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT)) $criteria->add(ProductmainPeer::PRODUCTMAIN_MAXDISCOUNT, $this->productmain_maxdiscount);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_BASEPROPERTY)) $criteria->add(ProductmainPeer::PRODUCTMAIN_BASEPROPERTY, $this->productmain_baseproperty);
        if ($this->isColumnModified(ProductmainPeer::PRODUCTMAIN_TYPE)) $criteria->add(ProductmainPeer::PRODUCTMAIN_TYPE, $this->productmain_type);

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
        $criteria = new Criteria(ProductmainPeer::DATABASE_NAME);
        $criteria->add(ProductmainPeer::IDPRODUCTMAIN, $this->idproductmain);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductmain();
    }

    /**
     * Generic method to set the primary key (idproductmain column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductmain($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductmain();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productmain (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setIdproductcategory($this->getIdproductcategory());
        $copyObj->setProductmainName($this->getProductmainName());
        $copyObj->setProductmainUnit($this->getProductmainUnit());
        $copyObj->setProductmainDiscount($this->getProductmainDiscount());
        $copyObj->setProductmainEachpieces($this->getProductmainEachpieces());
        $copyObj->setProductmainMaxdiscount($this->getProductmainMaxdiscount());
        $copyObj->setProductmainBaseproperty($this->getProductmainBaseproperty());
        $copyObj->setProductmainType($this->getProductmainType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMlitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMlitem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProducts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProduct($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductmainphotos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductmainphoto($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproductmain(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productmain Clone of current object.
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
     * @return ProductmainPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductmainPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return Productmain The current object (for fluent API support)
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
            $v->addProductmain($this);
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
                $this->aCompany->addProductmains($this);
             */
        }

        return $this->aCompany;
    }

    /**
     * Declares an association between this object and a Productcategory object.
     *
     * @param                  Productcategory $v
     * @return Productmain The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductcategory(Productcategory $v = null)
    {
        if ($v === null) {
            $this->setIdproductcategory(NULL);
        } else {
            $this->setIdproductcategory($v->getIdproductcategory());
        }

        $this->aProductcategory = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productcategory object, it will not be re-added.
        if ($v !== null) {
            $v->addProductmain($this);
        }


        return $this;
    }


    /**
     * Get the associated Productcategory object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Productcategory The associated Productcategory object.
     * @throws PropelException
     */
    public function getProductcategory(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductcategory === null && ($this->idproductcategory !== null) && $doQuery) {
            $this->aProductcategory = ProductcategoryQuery::create()->findPk($this->idproductcategory, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductcategory->addProductmains($this);
             */
        }

        return $this->aProductcategory;
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
        if ('Mlitem' == $relationName) {
            $this->initMlitems();
        }
        if ('Product' == $relationName) {
            $this->initProducts();
        }
        if ('Productmainphoto' == $relationName) {
            $this->initProductmainphotos();
        }
    }

    /**
     * Clears out the collMlitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productmain The current object (for fluent API support)
     * @see        addMlitems()
     */
    public function clearMlitems()
    {
        $this->collMlitems = null; // important to set this to null since that means it is uninitialized
        $this->collMlitemsPartial = null;

        return $this;
    }

    /**
     * reset is the collMlitems collection loaded partially
     *
     * @return void
     */
    public function resetPartialMlitems($v = true)
    {
        $this->collMlitemsPartial = $v;
    }

    /**
     * Initializes the collMlitems collection.
     *
     * By default this just sets the collMlitems collection to an empty array (like clearcollMlitems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMlitems($overrideExisting = true)
    {
        if (null !== $this->collMlitems && !$overrideExisting) {
            return;
        }
        $this->collMlitems = new PropelObjectCollection();
        $this->collMlitems->setModel('Mlitem');
    }

    /**
     * Gets an array of Mlitem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productmain is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mlitem[] List of Mlitem objects
     * @throws PropelException
     */
    public function getMlitems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMlitemsPartial && !$this->isNew();
        if (null === $this->collMlitems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMlitems) {
                // return empty collection
                $this->initMlitems();
            } else {
                $collMlitems = MlitemQuery::create(null, $criteria)
                    ->filterByProductmain($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMlitemsPartial && count($collMlitems)) {
                      $this->initMlitems(false);

                      foreach ($collMlitems as $obj) {
                        if (false == $this->collMlitems->contains($obj)) {
                          $this->collMlitems->append($obj);
                        }
                      }

                      $this->collMlitemsPartial = true;
                    }

                    $collMlitems->getInternalIterator()->rewind();

                    return $collMlitems;
                }

                if ($partial && $this->collMlitems) {
                    foreach ($this->collMlitems as $obj) {
                        if ($obj->isNew()) {
                            $collMlitems[] = $obj;
                        }
                    }
                }

                $this->collMlitems = $collMlitems;
                $this->collMlitemsPartial = false;
            }
        }

        return $this->collMlitems;
    }

    /**
     * Sets a collection of Mlitem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mlitems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productmain The current object (for fluent API support)
     */
    public function setMlitems(PropelCollection $mlitems, PropelPDO $con = null)
    {
        $mlitemsToDelete = $this->getMlitems(new Criteria(), $con)->diff($mlitems);


        $this->mlitemsScheduledForDeletion = $mlitemsToDelete;

        foreach ($mlitemsToDelete as $mlitemRemoved) {
            $mlitemRemoved->setProductmain(null);
        }

        $this->collMlitems = null;
        foreach ($mlitems as $mlitem) {
            $this->addMlitem($mlitem);
        }

        $this->collMlitems = $mlitems;
        $this->collMlitemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mlitem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mlitem objects.
     * @throws PropelException
     */
    public function countMlitems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMlitemsPartial && !$this->isNew();
        if (null === $this->collMlitems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMlitems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMlitems());
            }
            $query = MlitemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductmain($this)
                ->count($con);
        }

        return count($this->collMlitems);
    }

    /**
     * Method called to associate a Mlitem object to this object
     * through the Mlitem foreign key attribute.
     *
     * @param    Mlitem $l Mlitem
     * @return Productmain The current object (for fluent API support)
     */
    public function addMlitem(Mlitem $l)
    {
        if ($this->collMlitems === null) {
            $this->initMlitems();
            $this->collMlitemsPartial = true;
        }

        if (!in_array($l, $this->collMlitems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMlitem($l);

            if ($this->mlitemsScheduledForDeletion and $this->mlitemsScheduledForDeletion->contains($l)) {
                $this->mlitemsScheduledForDeletion->remove($this->mlitemsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Mlitem $mlitem The mlitem object to add.
     */
    protected function doAddMlitem($mlitem)
    {
        $this->collMlitems[]= $mlitem;
        $mlitem->setProductmain($this);
    }

    /**
     * @param	Mlitem $mlitem The mlitem object to remove.
     * @return Productmain The current object (for fluent API support)
     */
    public function removeMlitem($mlitem)
    {
        if ($this->getMlitems()->contains($mlitem)) {
            $this->collMlitems->remove($this->collMlitems->search($mlitem));
            if (null === $this->mlitemsScheduledForDeletion) {
                $this->mlitemsScheduledForDeletion = clone $this->collMlitems;
                $this->mlitemsScheduledForDeletion->clear();
            }
            $this->mlitemsScheduledForDeletion[]= clone $mlitem;
            $mlitem->setProductmain(null);
        }

        return $this;
    }

    /**
     * Clears out the collProducts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productmain The current object (for fluent API support)
     * @see        addProducts()
     */
    public function clearProducts()
    {
        $this->collProducts = null; // important to set this to null since that means it is uninitialized
        $this->collProductsPartial = null;

        return $this;
    }

    /**
     * reset is the collProducts collection loaded partially
     *
     * @return void
     */
    public function resetPartialProducts($v = true)
    {
        $this->collProductsPartial = $v;
    }

    /**
     * Initializes the collProducts collection.
     *
     * By default this just sets the collProducts collection to an empty array (like clearcollProducts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProducts($overrideExisting = true)
    {
        if (null !== $this->collProducts && !$overrideExisting) {
            return;
        }
        $this->collProducts = new PropelObjectCollection();
        $this->collProducts->setModel('Product');
    }

    /**
     * Gets an array of Product objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productmain is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Product[] List of Product objects
     * @throws PropelException
     */
    public function getProducts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductsPartial && !$this->isNew();
        if (null === $this->collProducts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProducts) {
                // return empty collection
                $this->initProducts();
            } else {
                $collProducts = ProductQuery::create(null, $criteria)
                    ->filterByProductmain($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductsPartial && count($collProducts)) {
                      $this->initProducts(false);

                      foreach ($collProducts as $obj) {
                        if (false == $this->collProducts->contains($obj)) {
                          $this->collProducts->append($obj);
                        }
                      }

                      $this->collProductsPartial = true;
                    }

                    $collProducts->getInternalIterator()->rewind();

                    return $collProducts;
                }

                if ($partial && $this->collProducts) {
                    foreach ($this->collProducts as $obj) {
                        if ($obj->isNew()) {
                            $collProducts[] = $obj;
                        }
                    }
                }

                $this->collProducts = $collProducts;
                $this->collProductsPartial = false;
            }
        }

        return $this->collProducts;
    }

    /**
     * Sets a collection of Product objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $products A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productmain The current object (for fluent API support)
     */
    public function setProducts(PropelCollection $products, PropelPDO $con = null)
    {
        $productsToDelete = $this->getProducts(new Criteria(), $con)->diff($products);


        $this->productsScheduledForDeletion = $productsToDelete;

        foreach ($productsToDelete as $productRemoved) {
            $productRemoved->setProductmain(null);
        }

        $this->collProducts = null;
        foreach ($products as $product) {
            $this->addProduct($product);
        }

        $this->collProducts = $products;
        $this->collProductsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Product objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Product objects.
     * @throws PropelException
     */
    public function countProducts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductsPartial && !$this->isNew();
        if (null === $this->collProducts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProducts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProducts());
            }
            $query = ProductQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductmain($this)
                ->count($con);
        }

        return count($this->collProducts);
    }

    /**
     * Method called to associate a Product object to this object
     * through the Product foreign key attribute.
     *
     * @param    Product $l Product
     * @return Productmain The current object (for fluent API support)
     */
    public function addProduct(Product $l)
    {
        if ($this->collProducts === null) {
            $this->initProducts();
            $this->collProductsPartial = true;
        }

        if (!in_array($l, $this->collProducts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProduct($l);

            if ($this->productsScheduledForDeletion and $this->productsScheduledForDeletion->contains($l)) {
                $this->productsScheduledForDeletion->remove($this->productsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Product $product The product object to add.
     */
    protected function doAddProduct($product)
    {
        $this->collProducts[]= $product;
        $product->setProductmain($this);
    }

    /**
     * @param	Product $product The product object to remove.
     * @return Productmain The current object (for fluent API support)
     */
    public function removeProduct($product)
    {
        if ($this->getProducts()->contains($product)) {
            $this->collProducts->remove($this->collProducts->search($product));
            if (null === $this->productsScheduledForDeletion) {
                $this->productsScheduledForDeletion = clone $this->collProducts;
                $this->productsScheduledForDeletion->clear();
            }
            $this->productsScheduledForDeletion[]= clone $product;
            $product->setProductmain(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductmainphotos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productmain The current object (for fluent API support)
     * @see        addProductmainphotos()
     */
    public function clearProductmainphotos()
    {
        $this->collProductmainphotos = null; // important to set this to null since that means it is uninitialized
        $this->collProductmainphotosPartial = null;

        return $this;
    }

    /**
     * reset is the collProductmainphotos collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductmainphotos($v = true)
    {
        $this->collProductmainphotosPartial = $v;
    }

    /**
     * Initializes the collProductmainphotos collection.
     *
     * By default this just sets the collProductmainphotos collection to an empty array (like clearcollProductmainphotos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductmainphotos($overrideExisting = true)
    {
        if (null !== $this->collProductmainphotos && !$overrideExisting) {
            return;
        }
        $this->collProductmainphotos = new PropelObjectCollection();
        $this->collProductmainphotos->setModel('Productmainphoto');
    }

    /**
     * Gets an array of Productmainphoto objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productmain is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productmainphoto[] List of Productmainphoto objects
     * @throws PropelException
     */
    public function getProductmainphotos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductmainphotosPartial && !$this->isNew();
        if (null === $this->collProductmainphotos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductmainphotos) {
                // return empty collection
                $this->initProductmainphotos();
            } else {
                $collProductmainphotos = ProductmainphotoQuery::create(null, $criteria)
                    ->filterByProductmain($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductmainphotosPartial && count($collProductmainphotos)) {
                      $this->initProductmainphotos(false);

                      foreach ($collProductmainphotos as $obj) {
                        if (false == $this->collProductmainphotos->contains($obj)) {
                          $this->collProductmainphotos->append($obj);
                        }
                      }

                      $this->collProductmainphotosPartial = true;
                    }

                    $collProductmainphotos->getInternalIterator()->rewind();

                    return $collProductmainphotos;
                }

                if ($partial && $this->collProductmainphotos) {
                    foreach ($this->collProductmainphotos as $obj) {
                        if ($obj->isNew()) {
                            $collProductmainphotos[] = $obj;
                        }
                    }
                }

                $this->collProductmainphotos = $collProductmainphotos;
                $this->collProductmainphotosPartial = false;
            }
        }

        return $this->collProductmainphotos;
    }

    /**
     * Sets a collection of Productmainphoto objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productmainphotos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productmain The current object (for fluent API support)
     */
    public function setProductmainphotos(PropelCollection $productmainphotos, PropelPDO $con = null)
    {
        $productmainphotosToDelete = $this->getProductmainphotos(new Criteria(), $con)->diff($productmainphotos);


        $this->productmainphotosScheduledForDeletion = $productmainphotosToDelete;

        foreach ($productmainphotosToDelete as $productmainphotoRemoved) {
            $productmainphotoRemoved->setProductmain(null);
        }

        $this->collProductmainphotos = null;
        foreach ($productmainphotos as $productmainphoto) {
            $this->addProductmainphoto($productmainphoto);
        }

        $this->collProductmainphotos = $productmainphotos;
        $this->collProductmainphotosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productmainphoto objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productmainphoto objects.
     * @throws PropelException
     */
    public function countProductmainphotos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductmainphotosPartial && !$this->isNew();
        if (null === $this->collProductmainphotos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductmainphotos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductmainphotos());
            }
            $query = ProductmainphotoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductmain($this)
                ->count($con);
        }

        return count($this->collProductmainphotos);
    }

    /**
     * Method called to associate a Productmainphoto object to this object
     * through the Productmainphoto foreign key attribute.
     *
     * @param    Productmainphoto $l Productmainphoto
     * @return Productmain The current object (for fluent API support)
     */
    public function addProductmainphoto(Productmainphoto $l)
    {
        if ($this->collProductmainphotos === null) {
            $this->initProductmainphotos();
            $this->collProductmainphotosPartial = true;
        }

        if (!in_array($l, $this->collProductmainphotos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductmainphoto($l);

            if ($this->productmainphotosScheduledForDeletion and $this->productmainphotosScheduledForDeletion->contains($l)) {
                $this->productmainphotosScheduledForDeletion->remove($this->productmainphotosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productmainphoto $productmainphoto The productmainphoto object to add.
     */
    protected function doAddProductmainphoto($productmainphoto)
    {
        $this->collProductmainphotos[]= $productmainphoto;
        $productmainphoto->setProductmain($this);
    }

    /**
     * @param	Productmainphoto $productmainphoto The productmainphoto object to remove.
     * @return Productmain The current object (for fluent API support)
     */
    public function removeProductmainphoto($productmainphoto)
    {
        if ($this->getProductmainphotos()->contains($productmainphoto)) {
            $this->collProductmainphotos->remove($this->collProductmainphotos->search($productmainphoto));
            if (null === $this->productmainphotosScheduledForDeletion) {
                $this->productmainphotosScheduledForDeletion = clone $this->collProductmainphotos;
                $this->productmainphotosScheduledForDeletion->clear();
            }
            $this->productmainphotosScheduledForDeletion[]= clone $productmainphoto;
            $productmainphoto->setProductmain(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductmain = null;
        $this->idcompany = null;
        $this->idproductcategory = null;
        $this->productmain_name = null;
        $this->productmain_unit = null;
        $this->productmain_discount = null;
        $this->productmain_eachpieces = null;
        $this->productmain_maxdiscount = null;
        $this->productmain_baseproperty = null;
        $this->productmain_type = null;
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
            if ($this->collMlitems) {
                foreach ($this->collMlitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProducts) {
                foreach ($this->collProducts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductmainphotos) {
                foreach ($this->collProductmainphotos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }
            if ($this->aProductcategory instanceof Persistent) {
              $this->aProductcategory->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMlitems instanceof PropelCollection) {
            $this->collMlitems->clearIterator();
        }
        $this->collMlitems = null;
        if ($this->collProducts instanceof PropelCollection) {
            $this->collProducts->clearIterator();
        }
        $this->collProducts = null;
        if ($this->collProductmainphotos instanceof PropelCollection) {
            $this->collProductmainphotos->clearIterator();
        }
        $this->collProductmainphotos = null;
        $this->aCompany = null;
        $this->aProductcategory = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductmainPeer::DEFAULT_STRING_FORMAT);
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
