<?php


/**
 * Base class that represents a row from the 'productphoto' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductphoto extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductphotoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductphotoPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductphoto field.
     * @var        int
     */
    protected $idproductphoto;

    /**
     * The value for the idproduct field.
     * @var        int
     */
    protected $idproduct;

    /**
     * The value for the productphoto_url field.
     * @var        string
     */
    protected $productphoto_url;

    /**
     * The value for the productphoto_width field.
     * @var        string
     */
    protected $productphoto_width;

    /**
     * The value for the productphoto_height field.
     * @var        string
     */
    protected $productphoto_height;

    /**
     * The value for the productphoto_status field.
     * @var        string
     */
    protected $productphoto_status;

    /**
     * The value for the productphoto_type field.
     * Note: this column has a database default value of: 'private'
     * @var        string
     */
    protected $productphoto_type;

    /**
     * @var        Product
     */
    protected $aProduct;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->productphoto_type = 'private';
    }

    /**
     * Initializes internal state of BaseProductphoto object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idproductphoto] column value.
     *
     * @return int
     */
    public function getIdproductphoto()
    {

        return $this->idproductphoto;
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
     * Get the [productphoto_url] column value.
     *
     * @return string
     */
    public function getProductphotoUrl()
    {

        return $this->productphoto_url;
    }

    /**
     * Get the [productphoto_width] column value.
     *
     * @return string
     */
    public function getProductphotoWidth()
    {

        return $this->productphoto_width;
    }

    /**
     * Get the [productphoto_height] column value.
     *
     * @return string
     */
    public function getProductphotoHeight()
    {

        return $this->productphoto_height;
    }

    /**
     * Get the [productphoto_status] column value.
     *
     * @return string
     */
    public function getProductphotoStatus()
    {

        return $this->productphoto_status;
    }

    /**
     * Get the [productphoto_type] column value.
     *
     * @return string
     */
    public function getProductphotoType()
    {

        return $this->productphoto_type;
    }

    /**
     * Set the value of [idproductphoto] column.
     *
     * @param  int $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setIdproductphoto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductphoto !== $v) {
            $this->idproductphoto = $v;
            $this->modifiedColumns[] = ProductphotoPeer::IDPRODUCTPHOTO;
        }


        return $this;
    } // setIdproductphoto()

    /**
     * Set the value of [idproduct] column.
     *
     * @param  int $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setIdproduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproduct !== $v) {
            $this->idproduct = $v;
            $this->modifiedColumns[] = ProductphotoPeer::IDPRODUCT;
        }

        if ($this->aProduct !== null && $this->aProduct->getIdproduct() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setIdproduct()

    /**
     * Set the value of [productphoto_url] column.
     *
     * @param  string $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setProductphotoUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productphoto_url !== $v) {
            $this->productphoto_url = $v;
            $this->modifiedColumns[] = ProductphotoPeer::PRODUCTPHOTO_URL;
        }


        return $this;
    } // setProductphotoUrl()

    /**
     * Set the value of [productphoto_width] column.
     *
     * @param  string $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setProductphotoWidth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productphoto_width !== $v) {
            $this->productphoto_width = $v;
            $this->modifiedColumns[] = ProductphotoPeer::PRODUCTPHOTO_WIDTH;
        }


        return $this;
    } // setProductphotoWidth()

    /**
     * Set the value of [productphoto_height] column.
     *
     * @param  string $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setProductphotoHeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productphoto_height !== $v) {
            $this->productphoto_height = $v;
            $this->modifiedColumns[] = ProductphotoPeer::PRODUCTPHOTO_HEIGHT;
        }


        return $this;
    } // setProductphotoHeight()

    /**
     * Set the value of [productphoto_status] column.
     *
     * @param  string $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setProductphotoStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productphoto_status !== $v) {
            $this->productphoto_status = $v;
            $this->modifiedColumns[] = ProductphotoPeer::PRODUCTPHOTO_STATUS;
        }


        return $this;
    } // setProductphotoStatus()

    /**
     * Set the value of [productphoto_type] column.
     *
     * @param  string $v new value
     * @return Productphoto The current object (for fluent API support)
     */
    public function setProductphotoType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productphoto_type !== $v) {
            $this->productphoto_type = $v;
            $this->modifiedColumns[] = ProductphotoPeer::PRODUCTPHOTO_TYPE;
        }


        return $this;
    } // setProductphotoType()

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
            if ($this->productphoto_type !== 'private') {
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

            $this->idproductphoto = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproduct = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->productphoto_url = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->productphoto_width = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->productphoto_height = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->productphoto_status = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->productphoto_type = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = ProductphotoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productphoto object", $e);
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

        if ($this->aProduct !== null && $this->idproduct !== $this->aProduct->getIdproduct()) {
            $this->aProduct = null;
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
            $con = Propel::getConnection(ProductphotoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductphotoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProduct = null;
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
            $con = Propel::getConnection(ProductphotoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductphotoQuery::create()
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
            $con = Propel::getConnection(ProductphotoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductphotoPeer::addInstanceToPool($this);
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

            if ($this->aProduct !== null) {
                if ($this->aProduct->isModified() || $this->aProduct->isNew()) {
                    $affectedRows += $this->aProduct->save($con);
                }
                $this->setProduct($this->aProduct);
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

        $this->modifiedColumns[] = ProductphotoPeer::IDPRODUCTPHOTO;
        if (null !== $this->idproductphoto) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductphotoPeer::IDPRODUCTPHOTO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductphotoPeer::IDPRODUCTPHOTO)) {
            $modifiedColumns[':p' . $index++]  = '`idproductphoto`';
        }
        if ($this->isColumnModified(ProductphotoPeer::IDPRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`idproduct`';
        }
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_URL)) {
            $modifiedColumns[':p' . $index++]  = '`productphoto_url`';
        }
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = '`productphoto_width`';
        }
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`productphoto_height`';
        }
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`productphoto_status`';
        }
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`productphoto_type`';
        }

        $sql = sprintf(
            'INSERT INTO `productphoto` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductphoto`':
                        $stmt->bindValue($identifier, $this->idproductphoto, PDO::PARAM_INT);
                        break;
                    case '`idproduct`':
                        $stmt->bindValue($identifier, $this->idproduct, PDO::PARAM_INT);
                        break;
                    case '`productphoto_url`':
                        $stmt->bindValue($identifier, $this->productphoto_url, PDO::PARAM_STR);
                        break;
                    case '`productphoto_width`':
                        $stmt->bindValue($identifier, $this->productphoto_width, PDO::PARAM_STR);
                        break;
                    case '`productphoto_height`':
                        $stmt->bindValue($identifier, $this->productphoto_height, PDO::PARAM_STR);
                        break;
                    case '`productphoto_status`':
                        $stmt->bindValue($identifier, $this->productphoto_status, PDO::PARAM_STR);
                        break;
                    case '`productphoto_type`':
                        $stmt->bindValue($identifier, $this->productphoto_type, PDO::PARAM_STR);
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
        $this->setIdproductphoto($pk);

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

            if ($this->aProduct !== null) {
                if (!$this->aProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
                }
            }


            if (($retval = ProductphotoPeer::doValidate($this, $columns)) !== true) {
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
        $pos = ProductphotoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductphoto();
                break;
            case 1:
                return $this->getIdproduct();
                break;
            case 2:
                return $this->getProductphotoUrl();
                break;
            case 3:
                return $this->getProductphotoWidth();
                break;
            case 4:
                return $this->getProductphotoHeight();
                break;
            case 5:
                return $this->getProductphotoStatus();
                break;
            case 6:
                return $this->getProductphotoType();
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
        if (isset($alreadyDumpedObjects['Productphoto'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productphoto'][$this->getPrimaryKey()] = true;
        $keys = ProductphotoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductphoto(),
            $keys[1] => $this->getIdproduct(),
            $keys[2] => $this->getProductphotoUrl(),
            $keys[3] => $this->getProductphotoWidth(),
            $keys[4] => $this->getProductphotoHeight(),
            $keys[5] => $this->getProductphotoStatus(),
            $keys[6] => $this->getProductphotoType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProduct) {
                $result['Product'] = $this->aProduct->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = ProductphotoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductphoto($value);
                break;
            case 1:
                $this->setIdproduct($value);
                break;
            case 2:
                $this->setProductphotoUrl($value);
                break;
            case 3:
                $this->setProductphotoWidth($value);
                break;
            case 4:
                $this->setProductphotoHeight($value);
                break;
            case 5:
                $this->setProductphotoStatus($value);
                break;
            case 6:
                $this->setProductphotoType($value);
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
        $keys = ProductphotoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductphoto($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproduct($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProductphotoUrl($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProductphotoWidth($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setProductphotoHeight($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setProductphotoStatus($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setProductphotoType($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductphotoPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductphotoPeer::IDPRODUCTPHOTO)) $criteria->add(ProductphotoPeer::IDPRODUCTPHOTO, $this->idproductphoto);
        if ($this->isColumnModified(ProductphotoPeer::IDPRODUCT)) $criteria->add(ProductphotoPeer::IDPRODUCT, $this->idproduct);
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_URL)) $criteria->add(ProductphotoPeer::PRODUCTPHOTO_URL, $this->productphoto_url);
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_WIDTH)) $criteria->add(ProductphotoPeer::PRODUCTPHOTO_WIDTH, $this->productphoto_width);
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_HEIGHT)) $criteria->add(ProductphotoPeer::PRODUCTPHOTO_HEIGHT, $this->productphoto_height);
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_STATUS)) $criteria->add(ProductphotoPeer::PRODUCTPHOTO_STATUS, $this->productphoto_status);
        if ($this->isColumnModified(ProductphotoPeer::PRODUCTPHOTO_TYPE)) $criteria->add(ProductphotoPeer::PRODUCTPHOTO_TYPE, $this->productphoto_type);

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
        $criteria = new Criteria(ProductphotoPeer::DATABASE_NAME);
        $criteria->add(ProductphotoPeer::IDPRODUCTPHOTO, $this->idproductphoto);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductphoto();
    }

    /**
     * Generic method to set the primary key (idproductphoto column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductphoto($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductphoto();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productphoto (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproduct($this->getIdproduct());
        $copyObj->setProductphotoUrl($this->getProductphotoUrl());
        $copyObj->setProductphotoWidth($this->getProductphotoWidth());
        $copyObj->setProductphotoHeight($this->getProductphotoHeight());
        $copyObj->setProductphotoStatus($this->getProductphotoStatus());
        $copyObj->setProductphotoType($this->getProductphotoType());

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
            $copyObj->setIdproductphoto(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productphoto Clone of current object.
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
     * @return ProductphotoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductphotoPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Product object.
     *
     * @param                  Product $v
     * @return Productphoto The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProduct(Product $v = null)
    {
        if ($v === null) {
            $this->setIdproduct(NULL);
        } else {
            $this->setIdproduct($v->getIdproduct());
        }

        $this->aProduct = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Product object, it will not be re-added.
        if ($v !== null) {
            $v->addProductphoto($this);
        }


        return $this;
    }


    /**
     * Get the associated Product object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Product The associated Product object.
     * @throws PropelException
     */
    public function getProduct(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProduct === null && ($this->idproduct !== null) && $doQuery) {
            $this->aProduct = ProductQuery::create()->findPk($this->idproduct, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProduct->addProductphotos($this);
             */
        }

        return $this->aProduct;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductphoto = null;
        $this->idproduct = null;
        $this->productphoto_url = null;
        $this->productphoto_width = null;
        $this->productphoto_height = null;
        $this->productphoto_status = null;
        $this->productphoto_type = null;
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
            if ($this->aProduct instanceof Persistent) {
              $this->aProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductphotoPeer::DEFAULT_STRING_FORMAT);
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
