<?php


/**
 * Base class that represents a row from the 'quoteitem' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseQuoteitem extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'QuoteitemPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        QuoteitemPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idquoteitem field.
     * @var        int
     */
    protected $idquoteitem;

    /**
     * The value for the idquote field.
     * @var        int
     */
    protected $idquote;

    /**
     * The value for the idproduct field.
     * @var        int
     */
    protected $idproduct;

    /**
     * The value for the orderquote_quantity field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $orderquote_quantity;

    /**
     * The value for the orderquote_officialvalue field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $orderquote_officialvalue;

    /**
     * The value for the orderquote_endvalue field.
     * Note: this column has a database default value of: '0.00'
     * @var        string
     */
    protected $orderquote_endvalue;

    /**
     * The value for the orderquote_note field.
     * @var        string
     */
    protected $orderquote_note;

    /**
     * @var        Quote
     */
    protected $aQuote;

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
        $this->orderquote_quantity = '0.00';
        $this->orderquote_officialvalue = '0.00';
        $this->orderquote_endvalue = '0.00';
    }

    /**
     * Initializes internal state of BaseQuoteitem object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idquoteitem] column value.
     *
     * @return int
     */
    public function getIdquoteitem()
    {

        return $this->idquoteitem;
    }

    /**
     * Get the [idquote] column value.
     *
     * @return int
     */
    public function getIdquote()
    {

        return $this->idquote;
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
     * Get the [orderquote_quantity] column value.
     *
     * @return string
     */
    public function getOrderquoteQuantity()
    {

        return $this->orderquote_quantity;
    }

    /**
     * Get the [orderquote_officialvalue] column value.
     *
     * @return string
     */
    public function getOrderquoteOfficialvalue()
    {

        return $this->orderquote_officialvalue;
    }

    /**
     * Get the [orderquote_endvalue] column value.
     *
     * @return string
     */
    public function getOrderquoteEndvalue()
    {

        return $this->orderquote_endvalue;
    }

    /**
     * Get the [orderquote_note] column value.
     *
     * @return string
     */
    public function getOrderquoteNote()
    {

        return $this->orderquote_note;
    }

    /**
     * Set the value of [idquoteitem] column.
     *
     * @param  int $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setIdquoteitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idquoteitem !== $v) {
            $this->idquoteitem = $v;
            $this->modifiedColumns[] = QuoteitemPeer::IDQUOTEITEM;
        }


        return $this;
    } // setIdquoteitem()

    /**
     * Set the value of [idquote] column.
     *
     * @param  int $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setIdquote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idquote !== $v) {
            $this->idquote = $v;
            $this->modifiedColumns[] = QuoteitemPeer::IDQUOTE;
        }

        if ($this->aQuote !== null && $this->aQuote->getIdquote() !== $v) {
            $this->aQuote = null;
        }


        return $this;
    } // setIdquote()

    /**
     * Set the value of [idproduct] column.
     *
     * @param  int $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setIdproduct($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idproduct !== $v) {
            $this->idproduct = $v;
            $this->modifiedColumns[] = QuoteitemPeer::IDPRODUCT;
        }

        if ($this->aProduct !== null && $this->aProduct->getIdproduct() !== $v) {
            $this->aProduct = null;
        }


        return $this;
    } // setIdproduct()

    /**
     * Set the value of [orderquote_quantity] column.
     *
     * @param  string $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setOrderquoteQuantity($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->orderquote_quantity !== $v) {
            $this->orderquote_quantity = $v;
            $this->modifiedColumns[] = QuoteitemPeer::ORDERQUOTE_QUANTITY;
        }


        return $this;
    } // setOrderquoteQuantity()

    /**
     * Set the value of [orderquote_officialvalue] column.
     *
     * @param  string $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setOrderquoteOfficialvalue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->orderquote_officialvalue !== $v) {
            $this->orderquote_officialvalue = $v;
            $this->modifiedColumns[] = QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE;
        }


        return $this;
    } // setOrderquoteOfficialvalue()

    /**
     * Set the value of [orderquote_endvalue] column.
     *
     * @param  string $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setOrderquoteEndvalue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->orderquote_endvalue !== $v) {
            $this->orderquote_endvalue = $v;
            $this->modifiedColumns[] = QuoteitemPeer::ORDERQUOTE_ENDVALUE;
        }


        return $this;
    } // setOrderquoteEndvalue()

    /**
     * Set the value of [orderquote_note] column.
     *
     * @param  string $v new value
     * @return Quoteitem The current object (for fluent API support)
     */
    public function setOrderquoteNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orderquote_note !== $v) {
            $this->orderquote_note = $v;
            $this->modifiedColumns[] = QuoteitemPeer::ORDERQUOTE_NOTE;
        }


        return $this;
    } // setOrderquoteNote()

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
            if ($this->orderquote_quantity !== '0.00') {
                return false;
            }

            if ($this->orderquote_officialvalue !== '0.00') {
                return false;
            }

            if ($this->orderquote_endvalue !== '0.00') {
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

            $this->idquoteitem = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idquote = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idproduct = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->orderquote_quantity = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->orderquote_officialvalue = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->orderquote_endvalue = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->orderquote_note = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = QuoteitemPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Quoteitem object", $e);
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

        if ($this->aQuote !== null && $this->idquote !== $this->aQuote->getIdquote()) {
            $this->aQuote = null;
        }
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
            $con = Propel::getConnection(QuoteitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = QuoteitemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aQuote = null;
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
            $con = Propel::getConnection(QuoteitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = QuoteitemQuery::create()
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
            $con = Propel::getConnection(QuoteitemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                QuoteitemPeer::addInstanceToPool($this);
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

            if ($this->aQuote !== null) {
                if ($this->aQuote->isModified() || $this->aQuote->isNew()) {
                    $affectedRows += $this->aQuote->save($con);
                }
                $this->setQuote($this->aQuote);
            }

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

        $this->modifiedColumns[] = QuoteitemPeer::IDQUOTEITEM;
        if (null !== $this->idquoteitem) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuoteitemPeer::IDQUOTEITEM . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(QuoteitemPeer::IDQUOTEITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idquoteitem`';
        }
        if ($this->isColumnModified(QuoteitemPeer::IDQUOTE)) {
            $modifiedColumns[':p' . $index++]  = '`idquote`';
        }
        if ($this->isColumnModified(QuoteitemPeer::IDPRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`idproduct`';
        }
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_QUANTITY)) {
            $modifiedColumns[':p' . $index++]  = '`orderquote_quantity`';
        }
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE)) {
            $modifiedColumns[':p' . $index++]  = '`orderquote_officialvalue`';
        }
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_ENDVALUE)) {
            $modifiedColumns[':p' . $index++]  = '`orderquote_endvalue`';
        }
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_NOTE)) {
            $modifiedColumns[':p' . $index++]  = '`orderquote_note`';
        }

        $sql = sprintf(
            'INSERT INTO `quoteitem` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idquoteitem`':
                        $stmt->bindValue($identifier, $this->idquoteitem, PDO::PARAM_INT);
                        break;
                    case '`idquote`':
                        $stmt->bindValue($identifier, $this->idquote, PDO::PARAM_INT);
                        break;
                    case '`idproduct`':
                        $stmt->bindValue($identifier, $this->idproduct, PDO::PARAM_INT);
                        break;
                    case '`orderquote_quantity`':
                        $stmt->bindValue($identifier, $this->orderquote_quantity, PDO::PARAM_STR);
                        break;
                    case '`orderquote_officialvalue`':
                        $stmt->bindValue($identifier, $this->orderquote_officialvalue, PDO::PARAM_STR);
                        break;
                    case '`orderquote_endvalue`':
                        $stmt->bindValue($identifier, $this->orderquote_endvalue, PDO::PARAM_STR);
                        break;
                    case '`orderquote_note`':
                        $stmt->bindValue($identifier, $this->orderquote_note, PDO::PARAM_STR);
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
        $this->setIdquoteitem($pk);

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

            if ($this->aQuote !== null) {
                if (!$this->aQuote->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aQuote->getValidationFailures());
                }
            }

            if ($this->aProduct !== null) {
                if (!$this->aProduct->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aProduct->getValidationFailures());
                }
            }


            if (($retval = QuoteitemPeer::doValidate($this, $columns)) !== true) {
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
        $pos = QuoteitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdquoteitem();
                break;
            case 1:
                return $this->getIdquote();
                break;
            case 2:
                return $this->getIdproduct();
                break;
            case 3:
                return $this->getOrderquoteQuantity();
                break;
            case 4:
                return $this->getOrderquoteOfficialvalue();
                break;
            case 5:
                return $this->getOrderquoteEndvalue();
                break;
            case 6:
                return $this->getOrderquoteNote();
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
        if (isset($alreadyDumpedObjects['Quoteitem'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Quoteitem'][$this->getPrimaryKey()] = true;
        $keys = QuoteitemPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdquoteitem(),
            $keys[1] => $this->getIdquote(),
            $keys[2] => $this->getIdproduct(),
            $keys[3] => $this->getOrderquoteQuantity(),
            $keys[4] => $this->getOrderquoteOfficialvalue(),
            $keys[5] => $this->getOrderquoteEndvalue(),
            $keys[6] => $this->getOrderquoteNote(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aQuote) {
                $result['Quote'] = $this->aQuote->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
        $pos = QuoteitemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdquoteitem($value);
                break;
            case 1:
                $this->setIdquote($value);
                break;
            case 2:
                $this->setIdproduct($value);
                break;
            case 3:
                $this->setOrderquoteQuantity($value);
                break;
            case 4:
                $this->setOrderquoteOfficialvalue($value);
                break;
            case 5:
                $this->setOrderquoteEndvalue($value);
                break;
            case 6:
                $this->setOrderquoteNote($value);
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
        $keys = QuoteitemPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdquoteitem($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdquote($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdproduct($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setOrderquoteQuantity($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOrderquoteOfficialvalue($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOrderquoteEndvalue($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOrderquoteNote($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(QuoteitemPeer::DATABASE_NAME);

        if ($this->isColumnModified(QuoteitemPeer::IDQUOTEITEM)) $criteria->add(QuoteitemPeer::IDQUOTEITEM, $this->idquoteitem);
        if ($this->isColumnModified(QuoteitemPeer::IDQUOTE)) $criteria->add(QuoteitemPeer::IDQUOTE, $this->idquote);
        if ($this->isColumnModified(QuoteitemPeer::IDPRODUCT)) $criteria->add(QuoteitemPeer::IDPRODUCT, $this->idproduct);
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_QUANTITY)) $criteria->add(QuoteitemPeer::ORDERQUOTE_QUANTITY, $this->orderquote_quantity);
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE)) $criteria->add(QuoteitemPeer::ORDERQUOTE_OFFICIALVALUE, $this->orderquote_officialvalue);
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_ENDVALUE)) $criteria->add(QuoteitemPeer::ORDERQUOTE_ENDVALUE, $this->orderquote_endvalue);
        if ($this->isColumnModified(QuoteitemPeer::ORDERQUOTE_NOTE)) $criteria->add(QuoteitemPeer::ORDERQUOTE_NOTE, $this->orderquote_note);

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
        $criteria = new Criteria(QuoteitemPeer::DATABASE_NAME);
        $criteria->add(QuoteitemPeer::IDQUOTEITEM, $this->idquoteitem);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdquoteitem();
    }

    /**
     * Generic method to set the primary key (idquoteitem column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdquoteitem($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdquoteitem();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Quoteitem (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdquote($this->getIdquote());
        $copyObj->setIdproduct($this->getIdproduct());
        $copyObj->setOrderquoteQuantity($this->getOrderquoteQuantity());
        $copyObj->setOrderquoteOfficialvalue($this->getOrderquoteOfficialvalue());
        $copyObj->setOrderquoteEndvalue($this->getOrderquoteEndvalue());
        $copyObj->setOrderquoteNote($this->getOrderquoteNote());

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
            $copyObj->setIdquoteitem(NULL); // this is a auto-increment column, so set to default value
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
     * @return Quoteitem Clone of current object.
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
     * @return QuoteitemPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new QuoteitemPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Quote object.
     *
     * @param                  Quote $v
     * @return Quoteitem The current object (for fluent API support)
     * @throws PropelException
     */
    public function setQuote(Quote $v = null)
    {
        if ($v === null) {
            $this->setIdquote(NULL);
        } else {
            $this->setIdquote($v->getIdquote());
        }

        $this->aQuote = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Quote object, it will not be re-added.
        if ($v !== null) {
            $v->addQuoteitem($this);
        }


        return $this;
    }


    /**
     * Get the associated Quote object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Quote The associated Quote object.
     * @throws PropelException
     */
    public function getQuote(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aQuote === null && ($this->idquote !== null) && $doQuery) {
            $this->aQuote = QuoteQuery::create()->findPk($this->idquote, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aQuote->addQuoteitems($this);
             */
        }

        return $this->aQuote;
    }

    /**
     * Declares an association between this object and a Product object.
     *
     * @param                  Product $v
     * @return Quoteitem The current object (for fluent API support)
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
            $v->addQuoteitem($this);
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
                $this->aProduct->addQuoteitems($this);
             */
        }

        return $this->aProduct;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idquoteitem = null;
        $this->idquote = null;
        $this->idproduct = null;
        $this->orderquote_quantity = null;
        $this->orderquote_officialvalue = null;
        $this->orderquote_endvalue = null;
        $this->orderquote_note = null;
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
            if ($this->aQuote instanceof Persistent) {
              $this->aQuote->clearAllReferences($deep);
            }
            if ($this->aProduct instanceof Persistent) {
              $this->aProduct->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aQuote = null;
        $this->aProduct = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(QuoteitemPeer::DEFAULT_STRING_FORMAT);
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
