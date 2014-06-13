<?php


/**
 * Base class that represents a row from the 'productcategory' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductcategory extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductcategoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductcategoryPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductcategory field.
     * @var        int
     */
    protected $idproductcategory;

    /**
     * The value for the category_name field.
     * @var        string
     */
    protected $category_name;

    /**
     * The value for the productcategory_dependency field.
     * @var        int
     */
    protected $productcategory_dependency;

    /**
     * The value for the productcategory_property field.
     * @var        string
     */
    protected $productcategory_property;

    /**
     * @var        Productcategory
     */
    protected $aProductcategoryRelatedByProductcategoryDependency;

    /**
     * @var        PropelObjectCollection|Productcategory[] Collection to store aggregation of Productcategory objects.
     */
    protected $collProductcategorysRelatedByIdproductcategory;
    protected $collProductcategorysRelatedByIdproductcategoryPartial;

    /**
     * @var        PropelObjectCollection|Productcategoryproperty[] Collection to store aggregation of Productcategoryproperty objects.
     */
    protected $collProductcategorypropertys;
    protected $collProductcategorypropertysPartial;

    /**
     * @var        PropelObjectCollection|Productmain[] Collection to store aggregation of Productmain objects.
     */
    protected $collProductmains;
    protected $collProductmainsPartial;

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
    protected $productcategorysRelatedByIdproductcategoryScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productcategorypropertysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productmainsScheduledForDeletion = null;

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
     * Get the [category_name] column value.
     *
     * @return string
     */
    public function getCategoryName()
    {

        return $this->category_name;
    }

    /**
     * Get the [productcategory_dependency] column value.
     *
     * @return int
     */
    public function getProductcategoryDependency()
    {

        return $this->productcategory_dependency;
    }

    /**
     * Get the [productcategory_property] column value.
     *
     * @return string
     */
    public function getProductcategoryProperty()
    {

        return $this->productcategory_property;
    }

    /**
     * Set the value of [idproductcategory] column.
     *
     * @param  int $v new value
     * @return Productcategory The current object (for fluent API support)
     */
    public function setIdproductcategory($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductcategory !== $v) {
            $this->idproductcategory = $v;
            $this->modifiedColumns[] = ProductcategoryPeer::IDPRODUCTCATEGORY;
        }


        return $this;
    } // setIdproductcategory()

    /**
     * Set the value of [category_name] column.
     *
     * @param  string $v new value
     * @return Productcategory The current object (for fluent API support)
     */
    public function setCategoryName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->category_name !== $v) {
            $this->category_name = $v;
            $this->modifiedColumns[] = ProductcategoryPeer::CATEGORY_NAME;
        }


        return $this;
    } // setCategoryName()

    /**
     * Set the value of [productcategory_dependency] column.
     *
     * @param  int $v new value
     * @return Productcategory The current object (for fluent API support)
     */
    public function setProductcategoryDependency($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->productcategory_dependency !== $v) {
            $this->productcategory_dependency = $v;
            $this->modifiedColumns[] = ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY;
        }

        if ($this->aProductcategoryRelatedByProductcategoryDependency !== null && $this->aProductcategoryRelatedByProductcategoryDependency->getIdproductcategory() !== $v) {
            $this->aProductcategoryRelatedByProductcategoryDependency = null;
        }


        return $this;
    } // setProductcategoryDependency()

    /**
     * Set the value of [productcategory_property] column.
     *
     * @param  string $v new value
     * @return Productcategory The current object (for fluent API support)
     */
    public function setProductcategoryProperty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productcategory_property !== $v) {
            $this->productcategory_property = $v;
            $this->modifiedColumns[] = ProductcategoryPeer::PRODUCTCATEGORY_PROPERTY;
        }


        return $this;
    } // setProductcategoryProperty()

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

            $this->idproductcategory = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->category_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->productcategory_dependency = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->productcategory_property = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = ProductcategoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productcategory object", $e);
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

        if ($this->aProductcategoryRelatedByProductcategoryDependency !== null && $this->productcategory_dependency !== $this->aProductcategoryRelatedByProductcategoryDependency->getIdproductcategory()) {
            $this->aProductcategoryRelatedByProductcategoryDependency = null;
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
            $con = Propel::getConnection(ProductcategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductcategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProductcategoryRelatedByProductcategoryDependency = null;
            $this->collProductcategorysRelatedByIdproductcategory = null;

            $this->collProductcategorypropertys = null;

            $this->collProductmains = null;

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
            $con = Propel::getConnection(ProductcategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductcategoryQuery::create()
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
            $con = Propel::getConnection(ProductcategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductcategoryPeer::addInstanceToPool($this);
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

            if ($this->aProductcategoryRelatedByProductcategoryDependency !== null) {
                if ($this->aProductcategoryRelatedByProductcategoryDependency->isModified() || $this->aProductcategoryRelatedByProductcategoryDependency->isNew()) {
                    $affectedRows += $this->aProductcategoryRelatedByProductcategoryDependency->save($con);
                }
                $this->setProductcategoryRelatedByProductcategoryDependency($this->aProductcategoryRelatedByProductcategoryDependency);
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

            if ($this->productcategorysRelatedByIdproductcategoryScheduledForDeletion !== null) {
                if (!$this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->isEmpty()) {
                    ProductcategoryQuery::create()
                        ->filterByPrimaryKeys($this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion = null;
                }
            }

            if ($this->collProductcategorysRelatedByIdproductcategory !== null) {
                foreach ($this->collProductcategorysRelatedByIdproductcategory as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productcategorypropertysScheduledForDeletion !== null) {
                if (!$this->productcategorypropertysScheduledForDeletion->isEmpty()) {
                    ProductcategorypropertyQuery::create()
                        ->filterByPrimaryKeys($this->productcategorypropertysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productcategorypropertysScheduledForDeletion = null;
                }
            }

            if ($this->collProductcategorypropertys !== null) {
                foreach ($this->collProductcategorypropertys as $referrerFK) {
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

        $this->modifiedColumns[] = ProductcategoryPeer::IDPRODUCTCATEGORY;
        if (null !== $this->idproductcategory) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductcategoryPeer::IDPRODUCTCATEGORY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductcategoryPeer::IDPRODUCTCATEGORY)) {
            $modifiedColumns[':p' . $index++]  = '`idproductcategory`';
        }
        if ($this->isColumnModified(ProductcategoryPeer::CATEGORY_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`category_name`';
        }
        if ($this->isColumnModified(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY)) {
            $modifiedColumns[':p' . $index++]  = '`productcategory_dependency`';
        }
        if ($this->isColumnModified(ProductcategoryPeer::PRODUCTCATEGORY_PROPERTY)) {
            $modifiedColumns[':p' . $index++]  = '`productcategory_property`';
        }

        $sql = sprintf(
            'INSERT INTO `productcategory` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductcategory`':
                        $stmt->bindValue($identifier, $this->idproductcategory, PDO::PARAM_INT);
                        break;
                    case '`category_name`':
                        $stmt->bindValue($identifier, $this->category_name, PDO::PARAM_STR);
                        break;
                    case '`productcategory_dependency`':
                        $stmt->bindValue($identifier, $this->productcategory_dependency, PDO::PARAM_INT);
                        break;
                    case '`productcategory_property`':
                        $stmt->bindValue($identifier, $this->productcategory_property, PDO::PARAM_STR);
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
        $this->setIdproductcategory($pk);

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

            if ($this->aProductcategoryRelatedByProductcategoryDependency !== null) {
                if (!$this->aProductcategoryRelatedByProductcategoryDependency->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductcategoryRelatedByProductcategoryDependency->getValidationFailures());
                }
            }


            if (($retval = ProductcategoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProductcategorysRelatedByIdproductcategory !== null) {
                    foreach ($this->collProductcategorysRelatedByIdproductcategory as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductcategorypropertys !== null) {
                    foreach ($this->collProductcategorypropertys as $referrerFK) {
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
        $pos = ProductcategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductcategory();
                break;
            case 1:
                return $this->getCategoryName();
                break;
            case 2:
                return $this->getProductcategoryDependency();
                break;
            case 3:
                return $this->getProductcategoryProperty();
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
        if (isset($alreadyDumpedObjects['Productcategory'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productcategory'][$this->getPrimaryKey()] = true;
        $keys = ProductcategoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductcategory(),
            $keys[1] => $this->getCategoryName(),
            $keys[2] => $this->getProductcategoryDependency(),
            $keys[3] => $this->getProductcategoryProperty(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProductcategoryRelatedByProductcategoryDependency) {
                $result['ProductcategoryRelatedByProductcategoryDependency'] = $this->aProductcategoryRelatedByProductcategoryDependency->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProductcategorysRelatedByIdproductcategory) {
                $result['ProductcategorysRelatedByIdproductcategory'] = $this->collProductcategorysRelatedByIdproductcategory->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductcategorypropertys) {
                $result['Productcategorypropertys'] = $this->collProductcategorypropertys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductmains) {
                $result['Productmains'] = $this->collProductmains->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProductcategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductcategory($value);
                break;
            case 1:
                $this->setCategoryName($value);
                break;
            case 2:
                $this->setProductcategoryDependency($value);
                break;
            case 3:
                $this->setProductcategoryProperty($value);
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
        $keys = ProductcategoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductcategory($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCategoryName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProductcategoryDependency($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProductcategoryProperty($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductcategoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductcategoryPeer::IDPRODUCTCATEGORY)) $criteria->add(ProductcategoryPeer::IDPRODUCTCATEGORY, $this->idproductcategory);
        if ($this->isColumnModified(ProductcategoryPeer::CATEGORY_NAME)) $criteria->add(ProductcategoryPeer::CATEGORY_NAME, $this->category_name);
        if ($this->isColumnModified(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY)) $criteria->add(ProductcategoryPeer::PRODUCTCATEGORY_DEPENDENCY, $this->productcategory_dependency);
        if ($this->isColumnModified(ProductcategoryPeer::PRODUCTCATEGORY_PROPERTY)) $criteria->add(ProductcategoryPeer::PRODUCTCATEGORY_PROPERTY, $this->productcategory_property);

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
        $criteria = new Criteria(ProductcategoryPeer::DATABASE_NAME);
        $criteria->add(ProductcategoryPeer::IDPRODUCTCATEGORY, $this->idproductcategory);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductcategory();
    }

    /**
     * Generic method to set the primary key (idproductcategory column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductcategory($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductcategory();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productcategory (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCategoryName($this->getCategoryName());
        $copyObj->setProductcategoryDependency($this->getProductcategoryDependency());
        $copyObj->setProductcategoryProperty($this->getProductcategoryProperty());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProductcategorysRelatedByIdproductcategory() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductcategoryRelatedByIdproductcategory($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductcategorypropertys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductcategoryproperty($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductmains() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductmain($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproductcategory(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productcategory Clone of current object.
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
     * @return ProductcategoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductcategoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Productcategory object.
     *
     * @param                  Productcategory $v
     * @return Productcategory The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProductcategoryRelatedByProductcategoryDependency(Productcategory $v = null)
    {
        if ($v === null) {
            $this->setProductcategoryDependency(NULL);
        } else {
            $this->setProductcategoryDependency($v->getIdproductcategory());
        }

        $this->aProductcategoryRelatedByProductcategoryDependency = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Productcategory object, it will not be re-added.
        if ($v !== null) {
            $v->addProductcategoryRelatedByIdproductcategory($this);
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
    public function getProductcategoryRelatedByProductcategoryDependency(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aProductcategoryRelatedByProductcategoryDependency === null && ($this->productcategory_dependency !== null) && $doQuery) {
            $this->aProductcategoryRelatedByProductcategoryDependency = ProductcategoryQuery::create()->findPk($this->productcategory_dependency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProductcategoryRelatedByProductcategoryDependency->addProductcategorysRelatedByIdproductcategory($this);
             */
        }

        return $this->aProductcategoryRelatedByProductcategoryDependency;
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
        if ('ProductcategoryRelatedByIdproductcategory' == $relationName) {
            $this->initProductcategorysRelatedByIdproductcategory();
        }
        if ('Productcategoryproperty' == $relationName) {
            $this->initProductcategorypropertys();
        }
        if ('Productmain' == $relationName) {
            $this->initProductmains();
        }
    }

    /**
     * Clears out the collProductcategorysRelatedByIdproductcategory collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productcategory The current object (for fluent API support)
     * @see        addProductcategorysRelatedByIdproductcategory()
     */
    public function clearProductcategorysRelatedByIdproductcategory()
    {
        $this->collProductcategorysRelatedByIdproductcategory = null; // important to set this to null since that means it is uninitialized
        $this->collProductcategorysRelatedByIdproductcategoryPartial = null;

        return $this;
    }

    /**
     * reset is the collProductcategorysRelatedByIdproductcategory collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductcategorysRelatedByIdproductcategory($v = true)
    {
        $this->collProductcategorysRelatedByIdproductcategoryPartial = $v;
    }

    /**
     * Initializes the collProductcategorysRelatedByIdproductcategory collection.
     *
     * By default this just sets the collProductcategorysRelatedByIdproductcategory collection to an empty array (like clearcollProductcategorysRelatedByIdproductcategory());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductcategorysRelatedByIdproductcategory($overrideExisting = true)
    {
        if (null !== $this->collProductcategorysRelatedByIdproductcategory && !$overrideExisting) {
            return;
        }
        $this->collProductcategorysRelatedByIdproductcategory = new PropelObjectCollection();
        $this->collProductcategorysRelatedByIdproductcategory->setModel('Productcategory');
    }

    /**
     * Gets an array of Productcategory objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productcategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productcategory[] List of Productcategory objects
     * @throws PropelException
     */
    public function getProductcategorysRelatedByIdproductcategory($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductcategorysRelatedByIdproductcategoryPartial && !$this->isNew();
        if (null === $this->collProductcategorysRelatedByIdproductcategory || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductcategorysRelatedByIdproductcategory) {
                // return empty collection
                $this->initProductcategorysRelatedByIdproductcategory();
            } else {
                $collProductcategorysRelatedByIdproductcategory = ProductcategoryQuery::create(null, $criteria)
                    ->filterByProductcategoryRelatedByProductcategoryDependency($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductcategorysRelatedByIdproductcategoryPartial && count($collProductcategorysRelatedByIdproductcategory)) {
                      $this->initProductcategorysRelatedByIdproductcategory(false);

                      foreach ($collProductcategorysRelatedByIdproductcategory as $obj) {
                        if (false == $this->collProductcategorysRelatedByIdproductcategory->contains($obj)) {
                          $this->collProductcategorysRelatedByIdproductcategory->append($obj);
                        }
                      }

                      $this->collProductcategorysRelatedByIdproductcategoryPartial = true;
                    }

                    $collProductcategorysRelatedByIdproductcategory->getInternalIterator()->rewind();

                    return $collProductcategorysRelatedByIdproductcategory;
                }

                if ($partial && $this->collProductcategorysRelatedByIdproductcategory) {
                    foreach ($this->collProductcategorysRelatedByIdproductcategory as $obj) {
                        if ($obj->isNew()) {
                            $collProductcategorysRelatedByIdproductcategory[] = $obj;
                        }
                    }
                }

                $this->collProductcategorysRelatedByIdproductcategory = $collProductcategorysRelatedByIdproductcategory;
                $this->collProductcategorysRelatedByIdproductcategoryPartial = false;
            }
        }

        return $this->collProductcategorysRelatedByIdproductcategory;
    }

    /**
     * Sets a collection of ProductcategoryRelatedByIdproductcategory objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productcategorysRelatedByIdproductcategory A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productcategory The current object (for fluent API support)
     */
    public function setProductcategorysRelatedByIdproductcategory(PropelCollection $productcategorysRelatedByIdproductcategory, PropelPDO $con = null)
    {
        $productcategorysRelatedByIdproductcategoryToDelete = $this->getProductcategorysRelatedByIdproductcategory(new Criteria(), $con)->diff($productcategorysRelatedByIdproductcategory);


        $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion = $productcategorysRelatedByIdproductcategoryToDelete;

        foreach ($productcategorysRelatedByIdproductcategoryToDelete as $productcategoryRelatedByIdproductcategoryRemoved) {
            $productcategoryRelatedByIdproductcategoryRemoved->setProductcategoryRelatedByProductcategoryDependency(null);
        }

        $this->collProductcategorysRelatedByIdproductcategory = null;
        foreach ($productcategorysRelatedByIdproductcategory as $productcategoryRelatedByIdproductcategory) {
            $this->addProductcategoryRelatedByIdproductcategory($productcategoryRelatedByIdproductcategory);
        }

        $this->collProductcategorysRelatedByIdproductcategory = $productcategorysRelatedByIdproductcategory;
        $this->collProductcategorysRelatedByIdproductcategoryPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productcategory objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productcategory objects.
     * @throws PropelException
     */
    public function countProductcategorysRelatedByIdproductcategory(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductcategorysRelatedByIdproductcategoryPartial && !$this->isNew();
        if (null === $this->collProductcategorysRelatedByIdproductcategory || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductcategorysRelatedByIdproductcategory) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductcategorysRelatedByIdproductcategory());
            }
            $query = ProductcategoryQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductcategoryRelatedByProductcategoryDependency($this)
                ->count($con);
        }

        return count($this->collProductcategorysRelatedByIdproductcategory);
    }

    /**
     * Method called to associate a Productcategory object to this object
     * through the Productcategory foreign key attribute.
     *
     * @param    Productcategory $l Productcategory
     * @return Productcategory The current object (for fluent API support)
     */
    public function addProductcategoryRelatedByIdproductcategory(Productcategory $l)
    {
        if ($this->collProductcategorysRelatedByIdproductcategory === null) {
            $this->initProductcategorysRelatedByIdproductcategory();
            $this->collProductcategorysRelatedByIdproductcategoryPartial = true;
        }

        if (!in_array($l, $this->collProductcategorysRelatedByIdproductcategory->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductcategoryRelatedByIdproductcategory($l);

            if ($this->productcategorysRelatedByIdproductcategoryScheduledForDeletion and $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->contains($l)) {
                $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->remove($this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ProductcategoryRelatedByIdproductcategory $productcategoryRelatedByIdproductcategory The productcategoryRelatedByIdproductcategory object to add.
     */
    protected function doAddProductcategoryRelatedByIdproductcategory($productcategoryRelatedByIdproductcategory)
    {
        $this->collProductcategorysRelatedByIdproductcategory[]= $productcategoryRelatedByIdproductcategory;
        $productcategoryRelatedByIdproductcategory->setProductcategoryRelatedByProductcategoryDependency($this);
    }

    /**
     * @param	ProductcategoryRelatedByIdproductcategory $productcategoryRelatedByIdproductcategory The productcategoryRelatedByIdproductcategory object to remove.
     * @return Productcategory The current object (for fluent API support)
     */
    public function removeProductcategoryRelatedByIdproductcategory($productcategoryRelatedByIdproductcategory)
    {
        if ($this->getProductcategorysRelatedByIdproductcategory()->contains($productcategoryRelatedByIdproductcategory)) {
            $this->collProductcategorysRelatedByIdproductcategory->remove($this->collProductcategorysRelatedByIdproductcategory->search($productcategoryRelatedByIdproductcategory));
            if (null === $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion) {
                $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion = clone $this->collProductcategorysRelatedByIdproductcategory;
                $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion->clear();
            }
            $this->productcategorysRelatedByIdproductcategoryScheduledForDeletion[]= $productcategoryRelatedByIdproductcategory;
            $productcategoryRelatedByIdproductcategory->setProductcategoryRelatedByProductcategoryDependency(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductcategorypropertys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productcategory The current object (for fluent API support)
     * @see        addProductcategorypropertys()
     */
    public function clearProductcategorypropertys()
    {
        $this->collProductcategorypropertys = null; // important to set this to null since that means it is uninitialized
        $this->collProductcategorypropertysPartial = null;

        return $this;
    }

    /**
     * reset is the collProductcategorypropertys collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductcategorypropertys($v = true)
    {
        $this->collProductcategorypropertysPartial = $v;
    }

    /**
     * Initializes the collProductcategorypropertys collection.
     *
     * By default this just sets the collProductcategorypropertys collection to an empty array (like clearcollProductcategorypropertys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductcategorypropertys($overrideExisting = true)
    {
        if (null !== $this->collProductcategorypropertys && !$overrideExisting) {
            return;
        }
        $this->collProductcategorypropertys = new PropelObjectCollection();
        $this->collProductcategorypropertys->setModel('Productcategoryproperty');
    }

    /**
     * Gets an array of Productcategoryproperty objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productcategory is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productcategoryproperty[] List of Productcategoryproperty objects
     * @throws PropelException
     */
    public function getProductcategorypropertys($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductcategorypropertysPartial && !$this->isNew();
        if (null === $this->collProductcategorypropertys || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductcategorypropertys) {
                // return empty collection
                $this->initProductcategorypropertys();
            } else {
                $collProductcategorypropertys = ProductcategorypropertyQuery::create(null, $criteria)
                    ->filterByProductcategory($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductcategorypropertysPartial && count($collProductcategorypropertys)) {
                      $this->initProductcategorypropertys(false);

                      foreach ($collProductcategorypropertys as $obj) {
                        if (false == $this->collProductcategorypropertys->contains($obj)) {
                          $this->collProductcategorypropertys->append($obj);
                        }
                      }

                      $this->collProductcategorypropertysPartial = true;
                    }

                    $collProductcategorypropertys->getInternalIterator()->rewind();

                    return $collProductcategorypropertys;
                }

                if ($partial && $this->collProductcategorypropertys) {
                    foreach ($this->collProductcategorypropertys as $obj) {
                        if ($obj->isNew()) {
                            $collProductcategorypropertys[] = $obj;
                        }
                    }
                }

                $this->collProductcategorypropertys = $collProductcategorypropertys;
                $this->collProductcategorypropertysPartial = false;
            }
        }

        return $this->collProductcategorypropertys;
    }

    /**
     * Sets a collection of Productcategoryproperty objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productcategorypropertys A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productcategory The current object (for fluent API support)
     */
    public function setProductcategorypropertys(PropelCollection $productcategorypropertys, PropelPDO $con = null)
    {
        $productcategorypropertysToDelete = $this->getProductcategorypropertys(new Criteria(), $con)->diff($productcategorypropertys);


        $this->productcategorypropertysScheduledForDeletion = $productcategorypropertysToDelete;

        foreach ($productcategorypropertysToDelete as $productcategorypropertyRemoved) {
            $productcategorypropertyRemoved->setProductcategory(null);
        }

        $this->collProductcategorypropertys = null;
        foreach ($productcategorypropertys as $productcategoryproperty) {
            $this->addProductcategoryproperty($productcategoryproperty);
        }

        $this->collProductcategorypropertys = $productcategorypropertys;
        $this->collProductcategorypropertysPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productcategoryproperty objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productcategoryproperty objects.
     * @throws PropelException
     */
    public function countProductcategorypropertys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductcategorypropertysPartial && !$this->isNew();
        if (null === $this->collProductcategorypropertys || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductcategorypropertys) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductcategorypropertys());
            }
            $query = ProductcategorypropertyQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductcategory($this)
                ->count($con);
        }

        return count($this->collProductcategorypropertys);
    }

    /**
     * Method called to associate a Productcategoryproperty object to this object
     * through the Productcategoryproperty foreign key attribute.
     *
     * @param    Productcategoryproperty $l Productcategoryproperty
     * @return Productcategory The current object (for fluent API support)
     */
    public function addProductcategoryproperty(Productcategoryproperty $l)
    {
        if ($this->collProductcategorypropertys === null) {
            $this->initProductcategorypropertys();
            $this->collProductcategorypropertysPartial = true;
        }

        if (!in_array($l, $this->collProductcategorypropertys->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductcategoryproperty($l);

            if ($this->productcategorypropertysScheduledForDeletion and $this->productcategorypropertysScheduledForDeletion->contains($l)) {
                $this->productcategorypropertysScheduledForDeletion->remove($this->productcategorypropertysScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productcategoryproperty $productcategoryproperty The productcategoryproperty object to add.
     */
    protected function doAddProductcategoryproperty($productcategoryproperty)
    {
        $this->collProductcategorypropertys[]= $productcategoryproperty;
        $productcategoryproperty->setProductcategory($this);
    }

    /**
     * @param	Productcategoryproperty $productcategoryproperty The productcategoryproperty object to remove.
     * @return Productcategory The current object (for fluent API support)
     */
    public function removeProductcategoryproperty($productcategoryproperty)
    {
        if ($this->getProductcategorypropertys()->contains($productcategoryproperty)) {
            $this->collProductcategorypropertys->remove($this->collProductcategorypropertys->search($productcategoryproperty));
            if (null === $this->productcategorypropertysScheduledForDeletion) {
                $this->productcategorypropertysScheduledForDeletion = clone $this->collProductcategorypropertys;
                $this->productcategorypropertysScheduledForDeletion->clear();
            }
            $this->productcategorypropertysScheduledForDeletion[]= clone $productcategoryproperty;
            $productcategoryproperty->setProductcategory(null);
        }

        return $this;
    }

    /**
     * Clears out the collProductmains collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productcategory The current object (for fluent API support)
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
     * If this Productcategory is new, it will return
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
                    ->filterByProductcategory($this)
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
     * @return Productcategory The current object (for fluent API support)
     */
    public function setProductmains(PropelCollection $productmains, PropelPDO $con = null)
    {
        $productmainsToDelete = $this->getProductmains(new Criteria(), $con)->diff($productmains);


        $this->productmainsScheduledForDeletion = $productmainsToDelete;

        foreach ($productmainsToDelete as $productmainRemoved) {
            $productmainRemoved->setProductcategory(null);
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
                ->filterByProductcategory($this)
                ->count($con);
        }

        return count($this->collProductmains);
    }

    /**
     * Method called to associate a Productmain object to this object
     * through the Productmain foreign key attribute.
     *
     * @param    Productmain $l Productmain
     * @return Productcategory The current object (for fluent API support)
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
        $productmain->setProductcategory($this);
    }

    /**
     * @param	Productmain $productmain The productmain object to remove.
     * @return Productcategory The current object (for fluent API support)
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
            $productmain->setProductcategory(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Productcategory is new, it will return
     * an empty collection; or if this Productcategory has previously
     * been saved, it will retrieve related Productmains from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Productcategory.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productmain[] List of Productmain objects
     */
    public function getProductmainsJoinCompany($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductmainQuery::create(null, $criteria);
        $query->joinWith('Company', $join_behavior);

        return $this->getProductmains($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductcategory = null;
        $this->category_name = null;
        $this->productcategory_dependency = null;
        $this->productcategory_property = null;
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
            if ($this->collProductcategorysRelatedByIdproductcategory) {
                foreach ($this->collProductcategorysRelatedByIdproductcategory as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductcategorypropertys) {
                foreach ($this->collProductcategorypropertys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductmains) {
                foreach ($this->collProductmains as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProductcategoryRelatedByProductcategoryDependency instanceof Persistent) {
              $this->aProductcategoryRelatedByProductcategoryDependency->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProductcategorysRelatedByIdproductcategory instanceof PropelCollection) {
            $this->collProductcategorysRelatedByIdproductcategory->clearIterator();
        }
        $this->collProductcategorysRelatedByIdproductcategory = null;
        if ($this->collProductcategorypropertys instanceof PropelCollection) {
            $this->collProductcategorypropertys->clearIterator();
        }
        $this->collProductcategorypropertys = null;
        if ($this->collProductmains instanceof PropelCollection) {
            $this->collProductmains->clearIterator();
        }
        $this->collProductmains = null;
        $this->aProductcategoryRelatedByProductcategoryDependency = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductcategoryPeer::DEFAULT_STRING_FORMAT);
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
