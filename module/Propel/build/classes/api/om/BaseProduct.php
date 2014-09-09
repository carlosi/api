<?php


/**
 * Base class that represents a row from the 'product' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProduct extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproduct field.
     * @var        int
     */
    protected $idproduct;

    /**
     * The value for the idproductmain field.
     * @var        int
     */
    protected $idproductmain;

    /**
     * The value for the product_status field.
     * Note: this column has a database default value of: 'active'
     * @var        string
     */
    protected $product_status;

    /**
     * @var        Productmain
     */
    protected $aProductmain;

    /**
     * @var        PropelObjectCollection|Orderitem[] Collection to store aggregation of Orderitem objects.
     */
    protected $collOrderitems;
    protected $collOrderitemsPartial;

    /**
     * @var        PropelObjectCollection|Productproperty[] Collection to store aggregation of Productproperty objects.
     */
    protected $collProductpropertys;
    protected $collProductpropertysPartial;

    /**
     * @var        PropelObjectCollection|Quoteitem[] Collection to store aggregation of Quoteitem objects.
     */
    protected $collQuoteitems;
    protected $collQuoteitemsPartial;

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
    protected $orderitemsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productpropertysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $quoteitemsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->product_status = 'active';
    }

    /**
     * Initializes internal state of BaseProduct object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idproduct] column value.
     *
     * @return int
     */
    public function getIdproduct()
    {

        return $this->idproduct;
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
     * Get the [product_status] column value.
     *
     * @return string
     */
    public function getProductStatus()
    {

        return $this->product_status;
    }

    /**
     * Set the value of [idproduct] column.
     *
     * @param  int $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setIdproduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproduct !== $v) {
            $this->idproduct = $v;
            $this->modifiedColumns[] = ProductPeer::IDPRODUCT;
        }


        return $this;
    } // setIdproduct()

    /**
     * Set the value of [idproductmain] column.
     *
     * @param  int $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setIdproductmain($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductmain !== $v) {
            $this->idproductmain = $v;
            $this->modifiedColumns[] = ProductPeer::IDPRODUCTMAIN;
        }

        if ($this->aProductmain !== null && $this->aProductmain->getIdproductmain() !== $v) {
            $this->aProductmain = null;
        }


        return $this;
    } // setIdproductmain()

    /**
     * Set the value of [product_status] column.
     *
     * @param  string $v new value
     * @return Product The current object (for fluent API support)
     */
    public function setProductStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->product_status !== $v) {
            $this->product_status = $v;
            $this->modifiedColumns[] = ProductPeer::PRODUCT_STATUS;
        }


        return $this;
    } // setProductStatus()

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
            if ($this->product_status !== 'active') {
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

            $this->idproduct = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproductmain = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->product_status = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = ProductPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Product object", $e);
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

        if ($this->aProductmain !== null && $this->idproductmain !== $this->aProductmain->getIdproductmain()) {
            $this->aProductmain = null;
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
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProductmain = null;
            $this->collOrderitems = null;

            $this->collProductpropertys = null;

            $this->collQuoteitems = null;

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
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductQuery::create()
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
            $con = Propel::getConnection(ProductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductPeer::addInstanceToPool($this);
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

            if ($this->aProductmain !== null) {
                if ($this->aProductmain->isModified() || $this->aProductmain->isNew()) {
                    $affectedRows += $this->aProductmain->save($con);
                }
                $this->setProductmain($this->aProductmain);
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

            if ($this->productpropertysScheduledForDeletion !== null) {
                if (!$this->productpropertysScheduledForDeletion->isEmpty()) {
                    ProductpropertyQuery::create()
                        ->filterByPrimaryKeys($this->productpropertysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productpropertysScheduledForDeletion = null;
                }
            }

            if ($this->collProductpropertys !== null) {
                foreach ($this->collProductpropertys as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = ProductPeer::IDPRODUCT;
        if (null !== $this->idproduct) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductPeer::IDPRODUCT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductPeer::IDPRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`idproduct`';
        }
        if ($this->isColumnModified(ProductPeer::IDPRODUCTMAIN)) {
            $modifiedColumns[':p' . $index++]  = '`idproductmain`';
        }
        if ($this->isColumnModified(ProductPeer::PRODUCT_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`product_status`';
        }

        $sql = sprintf(
            'INSERT INTO `product` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproduct`':
                        $stmt->bindValue($identifier, $this->idproduct, PDO::PARAM_INT);
                        break;
                    case '`idproductmain`':
                        $stmt->bindValue($identifier, $this->idproductmain, PDO::PARAM_INT);
                        break;
                    case '`product_status`':
                        $stmt->bindValue($identifier, $this->product_status, PDO::PARAM_STR);
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
        $this->setIdproduct($pk);

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

            if ($this->aProductmain !== null) {
                if (!$this->aProductmain->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductmain->getValidationFailures());
                }
            }


            if (($retval = ProductPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collOrderitems !== null) {
                    foreach ($this->collOrderitems as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductpropertys !== null) {
                    foreach ($this->collProductpropertys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collQuoteitems !== null) {
                    foreach ($this->collQuoteitems as $referrerFK) {
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
        $pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproduct();
                break;
            case 1:
                return $this->getIdproductmain();
                break;
            case 2:
                return $this->getProductStatus();
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
        if (isset($alreadyDumpedObjects['Product'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Product'][$this->getPrimaryKey()] = true;
        $keys = ProductPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproduct(),
            $keys[1] => $this->getIdproductmain(),
            $keys[2] => $this->getProductStatus(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProductmain) {
                $result['Productmain'] = $this->aProductmain->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collOrderitems) {
                $result['Orderitems'] = $this->collOrderitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductpropertys) {
                $result['Productpropertys'] = $this->collProductpropertys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collQuoteitems) {
                $result['Quoteitems'] = $this->collQuoteitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproduct($value);
                break;
            case 1:
                $this->setIdproductmain($value);
                break;
            case 2:
                $this->setProductStatus($value);
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
        $keys = ProductPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproduct($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproductmain($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProductStatus($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductPeer::IDPRODUCT)) $criteria->add(ProductPeer::IDPRODUCT, $this->idproduct);
        if ($this->isColumnModified(ProductPeer::IDPRODUCTMAIN)) $criteria->add(ProductPeer::IDPRODUCTMAIN, $this->idproductmain);
        if ($this->isColumnModified(ProductPeer::PRODUCT_STATUS)) $criteria->add(ProductPeer::PRODUCT_STATUS, $this->product_status);

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
        $criteria = new Criteria(ProductPeer::DATABASE_NAME);
        $criteria->add(ProductPeer::IDPRODUCT, $this->idproduct);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproduct();
    }

    /**
     * Generic method to set the primary key (idproduct column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproduct($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproduct();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Product (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproductmain($this->getIdproductmain());
        $copyObj->setProductStatus($this->getProductStatus());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getOrderitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderitem($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductpropertys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductproperty($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getQuoteitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addQuoteitem($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproduct(NULL); // this is a auto-increment column, so set to default value
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
     * @return Product Clone of current object.
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
     * @return ProductPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Productmain object.
     *
     * @param                  Productmain $v
     * @return Product The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductmain(Productmain $v = null)
    {
        if ($v === null) {
            $this->setIdproductmain(NULL);
        } else {
            $this->setIdproductmain($v->getIdproductmain());
        }

        $this->aProductmain = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productmain object, it will not be re-added.
        if ($v !== null) {
            $v->addProduct($this);
        }


        return $this;
    }


    /**
     * Get the associated Productmain object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Productmain The associated Productmain object.
     * @throws PropelException
     */
    public function getProductmain(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductmain === null && ($this->idproductmain !== null) && $doQuery) {
            $this->aProductmain = ProductmainQuery::create()->findPk($this->idproductmain, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductmain->addProducts($this);
             */
        }

        return $this->aProductmain;
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
        if ('Orderitem' == $relationName) {
            $this->initOrderitems();
        }
        if ('Productproperty' == $relationName) {
            $this->initProductpropertys();
        }
        if ('Quoteitem' == $relationName) {
            $this->initQuoteitems();
        }
    }

    /**
     * Clears out the collOrderitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Product The current object (for fluent API support)
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
     * If this Product is new, it will return
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
                    ->filterByProduct($this)
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
     * @return Product The current object (for fluent API support)
     */
    public function setOrderitems(PropelCollection $orderitems, PropelPDO $con = null)
    {
        $orderitemsToDelete = $this->getOrderitems(new Criteria(), $con)->diff($orderitems);


        $this->orderitemsScheduledForDeletion = $orderitemsToDelete;

        foreach ($orderitemsToDelete as $orderitemRemoved) {
            $orderitemRemoved->setProduct(null);
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
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collOrderitems);
    }

    /**
     * Method called to associate a Orderitem object to this object
     * through the Orderitem foreign key attribute.
     *
     * @param    Orderitem $l Orderitem
     * @return Product The current object (for fluent API support)
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
        $orderitem->setProduct($this);
    }

    /**
     * @param	Orderitem $orderitem The orderitem object to remove.
     * @return Product The current object (for fluent API support)
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
            $orderitem->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Product is new, it will return
     * an empty collection; or if this Product has previously
     * been saved, it will retrieve related Orderitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Product.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Orderitem[] List of Orderitem objects
     */
    public function getOrderitemsJoinOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrderitemQuery::create(null, $criteria);
        $query->joinWith('Order', $join_behavior);

        return $this->getOrderitems($query, $con);
    }

    /**
     * Clears out the collProductpropertys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Product The current object (for fluent API support)
     * @see        addProductpropertys()
     */
    public function clearProductpropertys()
    {
        $this->collProductpropertys = null; // important to set this to null since that means it is uninitialized
        $this->collProductpropertysPartial = null;

        return $this;
    }

    /**
     * reset is the collProductpropertys collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductpropertys($v = true)
    {
        $this->collProductpropertysPartial = $v;
    }

    /**
     * Initializes the collProductpropertys collection.
     *
     * By default this just sets the collProductpropertys collection to an empty array (like clearcollProductpropertys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductpropertys($overrideExisting = true)
    {
        if (null !== $this->collProductpropertys && !$overrideExisting) {
            return;
        }
        $this->collProductpropertys = new PropelObjectCollection();
        $this->collProductpropertys->setModel('Productproperty');
    }

    /**
     * Gets an array of Productproperty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Product is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productproperty[] List of Productproperty objects
     * @throws PropelException
     */
    public function getProductpropertys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductpropertysPartial && !$this->isNew();
        if (null === $this->collProductpropertys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductpropertys) {
                // return empty collection
                $this->initProductpropertys();
            } else {
                $collProductpropertys = ProductpropertyQuery::create(null, $criteria)
                    ->filterByProduct($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductpropertysPartial && count($collProductpropertys)) {
                      $this->initProductpropertys(false);

                      foreach ($collProductpropertys as $obj) {
                        if (false == $this->collProductpropertys->contains($obj)) {
                          $this->collProductpropertys->append($obj);
                        }
                      }

                      $this->collProductpropertysPartial = true;
                    }

                    $collProductpropertys->getInternalIterator()->rewind();

                    return $collProductpropertys;
                }

                if ($partial && $this->collProductpropertys) {
                    foreach ($this->collProductpropertys as $obj) {
                        if ($obj->isNew()) {
                            $collProductpropertys[] = $obj;
                        }
                    }
                }

                $this->collProductpropertys = $collProductpropertys;
                $this->collProductpropertysPartial = false;
            }
        }

        return $this->collProductpropertys;
    }

    /**
     * Sets a collection of Productproperty objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productpropertys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Product The current object (for fluent API support)
     */
    public function setProductpropertys(PropelCollection $productpropertys, PropelPDO $con = null)
    {
        $productpropertysToDelete = $this->getProductpropertys(new Criteria(), $con)->diff($productpropertys);


        $this->productpropertysScheduledForDeletion = $productpropertysToDelete;

        foreach ($productpropertysToDelete as $productpropertyRemoved) {
            $productpropertyRemoved->setProduct(null);
        }

        $this->collProductpropertys = null;
        foreach ($productpropertys as $productproperty) {
            $this->addProductproperty($productproperty);
        }

        $this->collProductpropertys = $productpropertys;
        $this->collProductpropertysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productproperty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productproperty objects.
     * @throws PropelException
     */
    public function countProductpropertys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductpropertysPartial && !$this->isNew();
        if (null === $this->collProductpropertys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductpropertys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductpropertys());
            }
            $query = ProductpropertyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collProductpropertys);
    }

    /**
     * Method called to associate a Productproperty object to this object
     * through the Productproperty foreign key attribute.
     *
     * @param    Productproperty $l Productproperty
     * @return Product The current object (for fluent API support)
     */
    public function addProductproperty(Productproperty $l)
    {
        if ($this->collProductpropertys === null) {
            $this->initProductpropertys();
            $this->collProductpropertysPartial = true;
        }

        if (!in_array($l, $this->collProductpropertys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductproperty($l);

            if ($this->productpropertysScheduledForDeletion and $this->productpropertysScheduledForDeletion->contains($l)) {
                $this->productpropertysScheduledForDeletion->remove($this->productpropertysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productproperty $productproperty The productproperty object to add.
     */
    protected function doAddProductproperty($productproperty)
    {
        $this->collProductpropertys[]= $productproperty;
        $productproperty->setProduct($this);
    }

    /**
     * @param	Productproperty $productproperty The productproperty object to remove.
     * @return Product The current object (for fluent API support)
     */
    public function removeProductproperty($productproperty)
    {
        if ($this->getProductpropertys()->contains($productproperty)) {
            $this->collProductpropertys->remove($this->collProductpropertys->search($productproperty));
            if (null === $this->productpropertysScheduledForDeletion) {
                $this->productpropertysScheduledForDeletion = clone $this->collProductpropertys;
                $this->productpropertysScheduledForDeletion->clear();
            }
            $this->productpropertysScheduledForDeletion[]= clone $productproperty;
            $productproperty->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Product is new, it will return
     * an empty collection; or if this Product has previously
     * been saved, it will retrieve related Productpropertys from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Product.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productproperty[] List of Productproperty objects
     */
    public function getProductpropertysJoinProductmainproperty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductpropertyQuery::create(null, $criteria);
        $query->joinWith('Productmainproperty', $join_behavior);

        return $this->getProductpropertys($query, $con);
    }

    /**
     * Clears out the collQuoteitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Product The current object (for fluent API support)
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
     * If this Product is new, it will return
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
                    ->filterByProduct($this)
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
     * @return Product The current object (for fluent API support)
     */
    public function setQuoteitems(PropelCollection $quoteitems, PropelPDO $con = null)
    {
        $quoteitemsToDelete = $this->getQuoteitems(new Criteria(), $con)->diff($quoteitems);


        $this->quoteitemsScheduledForDeletion = $quoteitemsToDelete;

        foreach ($quoteitemsToDelete as $quoteitemRemoved) {
            $quoteitemRemoved->setProduct(null);
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
                ->filterByProduct($this)
                ->count($con);
        }

        return count($this->collQuoteitems);
    }

    /**
     * Method called to associate a Quoteitem object to this object
     * through the Quoteitem foreign key attribute.
     *
     * @param    Quoteitem $l Quoteitem
     * @return Product The current object (for fluent API support)
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
        $quoteitem->setProduct($this);
    }

    /**
     * @param	Quoteitem $quoteitem The quoteitem object to remove.
     * @return Product The current object (for fluent API support)
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
            $quoteitem->setProduct(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Product is new, it will return
     * an empty collection; or if this Product has previously
     * been saved, it will retrieve related Quoteitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Product.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Quoteitem[] List of Quoteitem objects
     */
    public function getQuoteitemsJoinQuote($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = QuoteitemQuery::create(null, $criteria);
        $query->joinWith('Quote', $join_behavior);

        return $this->getQuoteitems($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproduct = null;
        $this->idproductmain = null;
        $this->product_status = null;
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
            if ($this->collOrderitems) {
                foreach ($this->collOrderitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductpropertys) {
                foreach ($this->collProductpropertys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collQuoteitems) {
                foreach ($this->collQuoteitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProductmain instanceof Persistent) {
              $this->aProductmain->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collOrderitems instanceof PropelCollection) {
            $this->collOrderitems->clearIterator();
        }
        $this->collOrderitems = null;
        if ($this->collProductpropertys instanceof PropelCollection) {
            $this->collProductpropertys->clearIterator();
        }
        $this->collProductpropertys = null;
        if ($this->collQuoteitems instanceof PropelCollection) {
            $this->collQuoteitems->clearIterator();
        }
        $this->collQuoteitems = null;
        $this->aProductmain = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductPeer::DEFAULT_STRING_FORMAT);
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
