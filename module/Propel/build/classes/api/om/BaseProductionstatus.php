<?php


/**
 * Base class that represents a row from the 'productionstatus' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseProductionstatus extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ProductionstatusPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ProductionstatusPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idproductionstatus field.
     * @var        int
     */
    protected $idproductionstatus;

    /**
     * The value for the idproductionline field.
     * @var        int
     */
    protected $idproductionline;

    /**
     * The value for the productionstatus_name field.
     * @var        string
     */
    protected $productionstatus_name;

    /**
     * @var        Productionline
     */
    protected $aProductionline;

    /**
     * @var        PropelObjectCollection|Productionorderitem[] Collection to store aggregation of Productionorderitem objects.
     */
    protected $collProductionorderitems;
    protected $collProductionorderitemsPartial;

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
    protected $productionorderitemsScheduledForDeletion = null;

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
     * Get the [idproductionline] column value.
     *
     * @return int
     */
    public function getIdproductionline()
    {

        return $this->idproductionline;
    }

    /**
     * Get the [productionstatus_name] column value.
     *
     * @return string
     */
    public function getProductionstatusName()
    {

        return $this->productionstatus_name;
    }

    /**
     * Set the value of [idproductionstatus] column.
     *
     * @param  int $v new value
     * @return Productionstatus The current object (for fluent API support)
     */
    public function setIdproductionstatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionstatus !== $v) {
            $this->idproductionstatus = $v;
            $this->modifiedColumns[] = ProductionstatusPeer::IDPRODUCTIONSTATUS;
        }


        return $this;
    } // setIdproductionstatus()

    /**
     * Set the value of [idproductionline] column.
     *
     * @param  int $v new value
     * @return Productionstatus The current object (for fluent API support)
     */
    public function setIdproductionline($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproductionline !== $v) {
            $this->idproductionline = $v;
            $this->modifiedColumns[] = ProductionstatusPeer::IDPRODUCTIONLINE;
        }

        if ($this->aProductionline !== null && $this->aProductionline->getIdproductionline() !== $v) {
            $this->aProductionline = null;
        }


        return $this;
    } // setIdproductionline()

    /**
     * Set the value of [productionstatus_name] column.
     *
     * @param  string $v new value
     * @return Productionstatus The current object (for fluent API support)
     */
    public function setProductionstatusName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productionstatus_name !== $v) {
            $this->productionstatus_name = $v;
            $this->modifiedColumns[] = ProductionstatusPeer::PRODUCTIONSTATUS_NAME;
        }


        return $this;
    } // setProductionstatusName()

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

            $this->idproductionstatus = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idproductionline = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->productionstatus_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = ProductionstatusPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Productionstatus object", $e);
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

        if ($this->aProductionline !== null && $this->idproductionline !== $this->aProductionline->getIdproductionline()) {
            $this->aProductionline = null;
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
            $con = Propel::getConnection(ProductionstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ProductionstatusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aProductionline = null;
            $this->collProductionorderitems = null;

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
            $con = Propel::getConnection(ProductionstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ProductionstatusQuery::create()
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
            $con = Propel::getConnection(ProductionstatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ProductionstatusPeer::addInstanceToPool($this);
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

            if ($this->aProductionline !== null) {
                if ($this->aProductionline->isModified() || $this->aProductionline->isNew()) {
                    $affectedRows += $this->aProductionline->save($con);
                }
                $this->setProductionline($this->aProductionline);
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

            if ($this->productionorderitemsScheduledForDeletion !== null) {
                if (!$this->productionorderitemsScheduledForDeletion->isEmpty()) {
                    ProductionorderitemQuery::create()
                        ->filterByPrimaryKeys($this->productionorderitemsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productionorderitemsScheduledForDeletion = null;
                }
            }

            if ($this->collProductionorderitems !== null) {
                foreach ($this->collProductionorderitems as $referrerFK) {
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

        $this->modifiedColumns[] = ProductionstatusPeer::IDPRODUCTIONSTATUS;
        if (null !== $this->idproductionstatus) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductionstatusPeer::IDPRODUCTIONSTATUS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProductionstatusPeer::IDPRODUCTIONSTATUS)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionstatus`';
        }
        if ($this->isColumnModified(ProductionstatusPeer::IDPRODUCTIONLINE)) {
            $modifiedColumns[':p' . $index++]  = '`idproductionline`';
        }
        if ($this->isColumnModified(ProductionstatusPeer::PRODUCTIONSTATUS_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`productionstatus_name`';
        }

        $sql = sprintf(
            'INSERT INTO `productionstatus` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idproductionstatus`':
                        $stmt->bindValue($identifier, $this->idproductionstatus, PDO::PARAM_INT);
                        break;
                    case '`idproductionline`':
                        $stmt->bindValue($identifier, $this->idproductionline, PDO::PARAM_INT);
                        break;
                    case '`productionstatus_name`':
                        $stmt->bindValue($identifier, $this->productionstatus_name, PDO::PARAM_STR);
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
        $this->setIdproductionstatus($pk);

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

            if ($this->aProductionline !== null) {
                if (!$this->aProductionline->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProductionline->getValidationFailures());
                }
            }


            if (($retval = ProductionstatusPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProductionorderitems !== null) {
                    foreach ($this->collProductionorderitems as $referrerFK) {
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
        $pos = ProductionstatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdproductionstatus();
                break;
            case 1:
                return $this->getIdproductionline();
                break;
            case 2:
                return $this->getProductionstatusName();
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
        if (isset($alreadyDumpedObjects['Productionstatus'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Productionstatus'][$this->getPrimaryKey()] = true;
        $keys = ProductionstatusPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdproductionstatus(),
            $keys[1] => $this->getIdproductionline(),
            $keys[2] => $this->getProductionstatusName(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aProductionline) {
                $result['Productionline'] = $this->aProductionline->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProductionorderitems) {
                $result['Productionorderitems'] = $this->collProductionorderitems->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ProductionstatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdproductionstatus($value);
                break;
            case 1:
                $this->setIdproductionline($value);
                break;
            case 2:
                $this->setProductionstatusName($value);
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
        $keys = ProductionstatusPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdproductionstatus($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdproductionline($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setProductionstatusName($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProductionstatusPeer::DATABASE_NAME);

        if ($this->isColumnModified(ProductionstatusPeer::IDPRODUCTIONSTATUS)) $criteria->add(ProductionstatusPeer::IDPRODUCTIONSTATUS, $this->idproductionstatus);
        if ($this->isColumnModified(ProductionstatusPeer::IDPRODUCTIONLINE)) $criteria->add(ProductionstatusPeer::IDPRODUCTIONLINE, $this->idproductionline);
        if ($this->isColumnModified(ProductionstatusPeer::PRODUCTIONSTATUS_NAME)) $criteria->add(ProductionstatusPeer::PRODUCTIONSTATUS_NAME, $this->productionstatus_name);

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
        $criteria = new Criteria(ProductionstatusPeer::DATABASE_NAME);
        $criteria->add(ProductionstatusPeer::IDPRODUCTIONSTATUS, $this->idproductionstatus);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdproductionstatus();
    }

    /**
     * Generic method to set the primary key (idproductionstatus column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdproductionstatus($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdproductionstatus();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Productionstatus (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdproductionline($this->getIdproductionline());
        $copyObj->setProductionstatusName($this->getProductionstatusName());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProductionorderitems() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductionorderitem($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdproductionstatus(NULL); // this is a auto-increment column, so set to default value
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
     * @return Productionstatus Clone of current object.
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
     * @return ProductionstatusPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ProductionstatusPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Productionline object.
     *
     * @param                  Productionline $v
     * @return Productionstatus The current object (for fluent API support)
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
            $v->addProductionstatus($this);
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
                $this->aProductionline->addProductionstatuss($this);
             */
        }

        return $this->aProductionline;
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
        if ('Productionorderitem' == $relationName) {
            $this->initProductionorderitems();
        }
    }

    /**
     * Clears out the collProductionorderitems collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Productionstatus The current object (for fluent API support)
     * @see        addProductionorderitems()
     */
    public function clearProductionorderitems()
    {
        $this->collProductionorderitems = null; // important to set this to null since that means it is uninitialized
        $this->collProductionorderitemsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductionorderitems collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductionorderitems($v = true)
    {
        $this->collProductionorderitemsPartial = $v;
    }

    /**
     * Initializes the collProductionorderitems collection.
     *
     * By default this just sets the collProductionorderitems collection to an empty array (like clearcollProductionorderitems());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductionorderitems($overrideExisting = true)
    {
        if (null !== $this->collProductionorderitems && !$overrideExisting) {
            return;
        }
        $this->collProductionorderitems = new PropelObjectCollection();
        $this->collProductionorderitems->setModel('Productionorderitem');
    }

    /**
     * Gets an array of Productionorderitem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Productionstatus is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productionorderitem[] List of Productionorderitem objects
     * @throws PropelException
     */
    public function getProductionorderitems($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductionorderitemsPartial && !$this->isNew();
        if (null === $this->collProductionorderitems || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductionorderitems) {
                // return empty collection
                $this->initProductionorderitems();
            } else {
                $collProductionorderitems = ProductionorderitemQuery::create(null, $criteria)
                    ->filterByProductionstatus($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductionorderitemsPartial && count($collProductionorderitems)) {
                      $this->initProductionorderitems(false);

                      foreach ($collProductionorderitems as $obj) {
                        if (false == $this->collProductionorderitems->contains($obj)) {
                          $this->collProductionorderitems->append($obj);
                        }
                      }

                      $this->collProductionorderitemsPartial = true;
                    }

                    $collProductionorderitems->getInternalIterator()->rewind();

                    return $collProductionorderitems;
                }

                if ($partial && $this->collProductionorderitems) {
                    foreach ($this->collProductionorderitems as $obj) {
                        if ($obj->isNew()) {
                            $collProductionorderitems[] = $obj;
                        }
                    }
                }

                $this->collProductionorderitems = $collProductionorderitems;
                $this->collProductionorderitemsPartial = false;
            }
        }

        return $this->collProductionorderitems;
    }

    /**
     * Sets a collection of Productionorderitem objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productionorderitems A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Productionstatus The current object (for fluent API support)
     */
    public function setProductionorderitems(PropelCollection $productionorderitems, PropelPDO $con = null)
    {
        $productionorderitemsToDelete = $this->getProductionorderitems(new Criteria(), $con)->diff($productionorderitems);


        $this->productionorderitemsScheduledForDeletion = $productionorderitemsToDelete;

        foreach ($productionorderitemsToDelete as $productionorderitemRemoved) {
            $productionorderitemRemoved->setProductionstatus(null);
        }

        $this->collProductionorderitems = null;
        foreach ($productionorderitems as $productionorderitem) {
            $this->addProductionorderitem($productionorderitem);
        }

        $this->collProductionorderitems = $productionorderitems;
        $this->collProductionorderitemsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productionorderitem objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productionorderitem objects.
     * @throws PropelException
     */
    public function countProductionorderitems(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductionorderitemsPartial && !$this->isNew();
        if (null === $this->collProductionorderitems || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductionorderitems) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductionorderitems());
            }
            $query = ProductionorderitemQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProductionstatus($this)
                ->count($con);
        }

        return count($this->collProductionorderitems);
    }

    /**
     * Method called to associate a Productionorderitem object to this object
     * through the Productionorderitem foreign key attribute.
     *
     * @param    Productionorderitem $l Productionorderitem
     * @return Productionstatus The current object (for fluent API support)
     */
    public function addProductionorderitem(Productionorderitem $l)
    {
        if ($this->collProductionorderitems === null) {
            $this->initProductionorderitems();
            $this->collProductionorderitemsPartial = true;
        }

        if (!in_array($l, $this->collProductionorderitems->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductionorderitem($l);

            if ($this->productionorderitemsScheduledForDeletion and $this->productionorderitemsScheduledForDeletion->contains($l)) {
                $this->productionorderitemsScheduledForDeletion->remove($this->productionorderitemsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productionorderitem $productionorderitem The productionorderitem object to add.
     */
    protected function doAddProductionorderitem($productionorderitem)
    {
        $this->collProductionorderitems[]= $productionorderitem;
        $productionorderitem->setProductionstatus($this);
    }

    /**
     * @param	Productionorderitem $productionorderitem The productionorderitem object to remove.
     * @return Productionstatus The current object (for fluent API support)
     */
    public function removeProductionorderitem($productionorderitem)
    {
        if ($this->getProductionorderitems()->contains($productionorderitem)) {
            $this->collProductionorderitems->remove($this->collProductionorderitems->search($productionorderitem));
            if (null === $this->productionorderitemsScheduledForDeletion) {
                $this->productionorderitemsScheduledForDeletion = clone $this->collProductionorderitems;
                $this->productionorderitemsScheduledForDeletion->clear();
            }
            $this->productionorderitemsScheduledForDeletion[]= clone $productionorderitem;
            $productionorderitem->setProductionstatus(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Productionstatus is new, it will return
     * an empty collection; or if this Productionstatus has previously
     * been saved, it will retrieve related Productionorderitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Productionstatus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionorderitem[] List of Productionorderitem objects
     */
    public function getProductionorderitemsJoinOrderitem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionorderitemQuery::create(null, $criteria);
        $query->joinWith('Orderitem', $join_behavior);

        return $this->getProductionorderitems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Productionstatus is new, it will return
     * an empty collection; or if this Productionstatus has previously
     * been saved, it will retrieve related Productionorderitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Productionstatus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionorderitem[] List of Productionorderitem objects
     */
    public function getProductionorderitemsJoinProductionline($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionorderitemQuery::create(null, $criteria);
        $query->joinWith('Productionline', $join_behavior);

        return $this->getProductionorderitems($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Productionstatus is new, it will return
     * an empty collection; or if this Productionstatus has previously
     * been saved, it will retrieve related Productionorderitems from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Productionstatus.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionorderitem[] List of Productionorderitem objects
     */
    public function getProductionorderitemsJoinProductionteam($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionorderitemQuery::create(null, $criteria);
        $query->joinWith('Productionteam', $join_behavior);

        return $this->getProductionorderitems($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idproductionstatus = null;
        $this->idproductionline = null;
        $this->productionstatus_name = null;
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
            if ($this->collProductionorderitems) {
                foreach ($this->collProductionorderitems as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aProductionline instanceof Persistent) {
              $this->aProductionline->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProductionorderitems instanceof PropelCollection) {
            $this->collProductionorderitems->clearIterator();
        }
        $this->collProductionorderitems = null;
        $this->aProductionline = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProductionstatusPeer::DEFAULT_STRING_FORMAT);
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
