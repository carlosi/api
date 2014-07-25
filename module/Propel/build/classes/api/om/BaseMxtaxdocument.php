<?php


/**
 * Base class that represents a row from the 'mxtaxdocument' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMxtaxdocument extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MxtaxdocumentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MxtaxdocumentPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmxtaxdocument field.
     * @var        int
     */
    protected $idmxtaxdocument;

    /**
     * The value for the idclienttax field.
     * @var        int
     */
    protected $idclienttax;

    /**
     * The value for the idorder field.
     * @var        int
     */
    protected $idorder;

    /**
     * The value for the mxtaxdocument_folio field.
     * @var        string
     */
    protected $mxtaxdocument_folio;

    /**
     * The value for the mxtaxdocument_version field.
     * @var        string
     */
    protected $mxtaxdocument_version;

    /**
     * The value for the mxtaxdocument_type field.
     * @var        string
     */
    protected $mxtaxdocument_type;

    /**
     * The value for the mxtaxdocument_status field.
     * Note: this column has a database default value of: 'CREATED'
     * @var        string
     */
    protected $mxtaxdocument_status;

    /**
     * The value for the mxtaxdocument_url_xml field.
     * @var        string
     */
    protected $mxtaxdocument_url_xml;

    /**
     * The value for the mxtaxdocument_url_pdf field.
     * @var        string
     */
    protected $mxtaxdocument_url_pdf;

    /**
     * @var        Order
     */
    protected $aOrder;

    /**
     * @var        Clienttax
     */
    protected $aClienttax;

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
        $this->mxtaxdocument_status = 'CREATED';
    }

    /**
     * Initializes internal state of BaseMxtaxdocument object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idmxtaxdocument] column value.
     *
     * @return int
     */
    public function getIdmxtaxdocument()
    {

        return $this->idmxtaxdocument;
    }

    /**
     * Get the [idclienttax] column value.
     *
     * @return int
     */
    public function getIdclienttax()
    {

        return $this->idclienttax;
    }

    /**
     * Get the [idorder] column value.
     *
     * @return int
     */
    public function getIdorder()
    {

        return $this->idorder;
    }

    /**
     * Get the [mxtaxdocument_folio] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentFolio()
    {

        return $this->mxtaxdocument_folio;
    }

    /**
     * Get the [mxtaxdocument_version] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentVersion()
    {

        return $this->mxtaxdocument_version;
    }

    /**
     * Get the [mxtaxdocument_type] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentType()
    {

        return $this->mxtaxdocument_type;
    }

    /**
     * Get the [mxtaxdocument_status] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentStatus()
    {

        return $this->mxtaxdocument_status;
    }

    /**
     * Get the [mxtaxdocument_url_xml] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentUrlXml()
    {

        return $this->mxtaxdocument_url_xml;
    }

    /**
     * Get the [mxtaxdocument_url_pdf] column value.
     *
     * @return string
     */
    public function getMxtaxdocumentUrlPdf()
    {

        return $this->mxtaxdocument_url_pdf;
    }

    /**
     * Set the value of [idmxtaxdocument] column.
     *
     * @param  int $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setIdmxtaxdocument($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmxtaxdocument !== $v) {
            $this->idmxtaxdocument = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::IDMXTAXDOCUMENT;
        }


        return $this;
    } // setIdmxtaxdocument()

    /**
     * Set the value of [idclienttax] column.
     *
     * @param  int $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setIdclienttax($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclienttax !== $v) {
            $this->idclienttax = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::IDCLIENTTAX;
        }

        if ($this->aClienttax !== null && $this->aClienttax->getIdclienttax() !== $v) {
            $this->aClienttax = null;
        }


        return $this;
    } // setIdclienttax()

    /**
     * Set the value of [idorder] column.
     *
     * @param  int $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setIdorder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idorder !== $v) {
            $this->idorder = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::IDORDER;
        }

        if ($this->aOrder !== null && $this->aOrder->getIdorder() !== $v) {
            $this->aOrder = null;
        }


        return $this;
    } // setIdorder()

    /**
     * Set the value of [mxtaxdocument_folio] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentFolio($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_folio !== $v) {
            $this->mxtaxdocument_folio = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO;
        }


        return $this;
    } // setMxtaxdocumentFolio()

    /**
     * Set the value of [mxtaxdocument_version] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentVersion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_version !== $v) {
            $this->mxtaxdocument_version = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION;
        }


        return $this;
    } // setMxtaxdocumentVersion()

    /**
     * Set the value of [mxtaxdocument_type] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_type !== $v) {
            $this->mxtaxdocument_type = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE;
        }


        return $this;
    } // setMxtaxdocumentType()

    /**
     * Set the value of [mxtaxdocument_status] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_status !== $v) {
            $this->mxtaxdocument_status = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS;
        }


        return $this;
    } // setMxtaxdocumentStatus()

    /**
     * Set the value of [mxtaxdocument_url_xml] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentUrlXml($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_url_xml !== $v) {
            $this->mxtaxdocument_url_xml = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML;
        }


        return $this;
    } // setMxtaxdocumentUrlXml()

    /**
     * Set the value of [mxtaxdocument_url_pdf] column.
     *
     * @param  string $v new value
     * @return Mxtaxdocument The current object (for fluent API support)
     */
    public function setMxtaxdocumentUrlPdf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mxtaxdocument_url_pdf !== $v) {
            $this->mxtaxdocument_url_pdf = $v;
            $this->modifiedColumns[] = MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF;
        }


        return $this;
    } // setMxtaxdocumentUrlPdf()

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
            if ($this->mxtaxdocument_status !== 'CREATED') {
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

            $this->idmxtaxdocument = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idclienttax = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idorder = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->mxtaxdocument_folio = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->mxtaxdocument_version = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->mxtaxdocument_type = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->mxtaxdocument_status = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->mxtaxdocument_url_xml = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->mxtaxdocument_url_pdf = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = MxtaxdocumentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Mxtaxdocument object", $e);
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

        if ($this->aClienttax !== null && $this->idclienttax !== $this->aClienttax->getIdclienttax()) {
            $this->aClienttax = null;
        }
        if ($this->aOrder !== null && $this->idorder !== $this->aOrder->getIdorder()) {
            $this->aOrder = null;
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
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MxtaxdocumentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aOrder = null;
            $this->aClienttax = null;
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
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MxtaxdocumentQuery::create()
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
            $con = Propel::getConnection(MxtaxdocumentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MxtaxdocumentPeer::addInstanceToPool($this);
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

            if ($this->aOrder !== null) {
                if ($this->aOrder->isModified() || $this->aOrder->isNew()) {
                    $affectedRows += $this->aOrder->save($con);
                }
                $this->setOrder($this->aOrder);
            }

            if ($this->aClienttax !== null) {
                if ($this->aClienttax->isModified() || $this->aClienttax->isNew()) {
                    $affectedRows += $this->aClienttax->save($con);
                }
                $this->setClienttax($this->aClienttax);
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

        $this->modifiedColumns[] = MxtaxdocumentPeer::IDMXTAXDOCUMENT;
        if (null !== $this->idmxtaxdocument) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MxtaxdocumentPeer::IDMXTAXDOCUMENT . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MxtaxdocumentPeer::IDMXTAXDOCUMENT)) {
            $modifiedColumns[':p' . $index++]  = '`idmxtaxdocument`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::IDCLIENTTAX)) {
            $modifiedColumns[':p' . $index++]  = '`idclienttax`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::IDORDER)) {
            $modifiedColumns[':p' . $index++]  = '`idorder`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_folio`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_version`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_type`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_status`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_url_xml`';
        }
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF)) {
            $modifiedColumns[':p' . $index++]  = '`mxtaxdocument_url_pdf`';
        }

        $sql = sprintf(
            'INSERT INTO `mxtaxdocument` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmxtaxdocument`':
                        $stmt->bindValue($identifier, $this->idmxtaxdocument, PDO::PARAM_INT);
                        break;
                    case '`idclienttax`':
                        $stmt->bindValue($identifier, $this->idclienttax, PDO::PARAM_INT);
                        break;
                    case '`idorder`':
                        $stmt->bindValue($identifier, $this->idorder, PDO::PARAM_INT);
                        break;
                    case '`mxtaxdocument_folio`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_folio, PDO::PARAM_STR);
                        break;
                    case '`mxtaxdocument_version`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_version, PDO::PARAM_STR);
                        break;
                    case '`mxtaxdocument_type`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_type, PDO::PARAM_STR);
                        break;
                    case '`mxtaxdocument_status`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_status, PDO::PARAM_STR);
                        break;
                    case '`mxtaxdocument_url_xml`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_url_xml, PDO::PARAM_STR);
                        break;
                    case '`mxtaxdocument_url_pdf`':
                        $stmt->bindValue($identifier, $this->mxtaxdocument_url_pdf, PDO::PARAM_STR);
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
        $this->setIdmxtaxdocument($pk);

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

            if ($this->aOrder !== null) {
                if (!$this->aOrder->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aOrder->getValidationFailures());
                }
            }

            if ($this->aClienttax !== null) {
                if (!$this->aClienttax->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClienttax->getValidationFailures());
                }
            }


            if (($retval = MxtaxdocumentPeer::doValidate($this, $columns)) !== true) {
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
        $pos = MxtaxdocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmxtaxdocument();
                break;
            case 1:
                return $this->getIdclienttax();
                break;
            case 2:
                return $this->getIdorder();
                break;
            case 3:
                return $this->getMxtaxdocumentFolio();
                break;
            case 4:
                return $this->getMxtaxdocumentVersion();
                break;
            case 5:
                return $this->getMxtaxdocumentType();
                break;
            case 6:
                return $this->getMxtaxdocumentStatus();
                break;
            case 7:
                return $this->getMxtaxdocumentUrlXml();
                break;
            case 8:
                return $this->getMxtaxdocumentUrlPdf();
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
        if (isset($alreadyDumpedObjects['Mxtaxdocument'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Mxtaxdocument'][$this->getPrimaryKey()] = true;
        $keys = MxtaxdocumentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmxtaxdocument(),
            $keys[1] => $this->getIdclienttax(),
            $keys[2] => $this->getIdorder(),
            $keys[3] => $this->getMxtaxdocumentFolio(),
            $keys[4] => $this->getMxtaxdocumentVersion(),
            $keys[5] => $this->getMxtaxdocumentType(),
            $keys[6] => $this->getMxtaxdocumentStatus(),
            $keys[7] => $this->getMxtaxdocumentUrlXml(),
            $keys[8] => $this->getMxtaxdocumentUrlPdf(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aOrder) {
                $result['Order'] = $this->aOrder->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aClienttax) {
                $result['Clienttax'] = $this->aClienttax->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = MxtaxdocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmxtaxdocument($value);
                break;
            case 1:
                $this->setIdclienttax($value);
                break;
            case 2:
                $this->setIdorder($value);
                break;
            case 3:
                $this->setMxtaxdocumentFolio($value);
                break;
            case 4:
                $this->setMxtaxdocumentVersion($value);
                break;
            case 5:
                $this->setMxtaxdocumentType($value);
                break;
            case 6:
                $this->setMxtaxdocumentStatus($value);
                break;
            case 7:
                $this->setMxtaxdocumentUrlXml($value);
                break;
            case 8:
                $this->setMxtaxdocumentUrlPdf($value);
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
        $keys = MxtaxdocumentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmxtaxdocument($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdclienttax($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdorder($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMxtaxdocumentFolio($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMxtaxdocumentVersion($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMxtaxdocumentType($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMxtaxdocumentStatus($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMxtaxdocumentUrlXml($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMxtaxdocumentUrlPdf($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);

        if ($this->isColumnModified(MxtaxdocumentPeer::IDMXTAXDOCUMENT)) $criteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $this->idmxtaxdocument);
        if ($this->isColumnModified(MxtaxdocumentPeer::IDCLIENTTAX)) $criteria->add(MxtaxdocumentPeer::IDCLIENTTAX, $this->idclienttax);
        if ($this->isColumnModified(MxtaxdocumentPeer::IDORDER)) $criteria->add(MxtaxdocumentPeer::IDORDER, $this->idorder);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_FOLIO, $this->mxtaxdocument_folio);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_VERSION, $this->mxtaxdocument_version);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_TYPE, $this->mxtaxdocument_type);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_STATUS, $this->mxtaxdocument_status);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_XML, $this->mxtaxdocument_url_xml);
        if ($this->isColumnModified(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF)) $criteria->add(MxtaxdocumentPeer::MXTAXDOCUMENT_URL_PDF, $this->mxtaxdocument_url_pdf);

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
        $criteria = new Criteria(MxtaxdocumentPeer::DATABASE_NAME);
        $criteria->add(MxtaxdocumentPeer::IDMXTAXDOCUMENT, $this->idmxtaxdocument);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmxtaxdocument();
    }

    /**
     * Generic method to set the primary key (idmxtaxdocument column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmxtaxdocument($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmxtaxdocument();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Mxtaxdocument (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdclienttax($this->getIdclienttax());
        $copyObj->setIdorder($this->getIdorder());
        $copyObj->setMxtaxdocumentFolio($this->getMxtaxdocumentFolio());
        $copyObj->setMxtaxdocumentVersion($this->getMxtaxdocumentVersion());
        $copyObj->setMxtaxdocumentType($this->getMxtaxdocumentType());
        $copyObj->setMxtaxdocumentStatus($this->getMxtaxdocumentStatus());
        $copyObj->setMxtaxdocumentUrlXml($this->getMxtaxdocumentUrlXml());
        $copyObj->setMxtaxdocumentUrlPdf($this->getMxtaxdocumentUrlPdf());

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
            $copyObj->setIdmxtaxdocument(NULL); // this is a auto-increment column, so set to default value
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
     * @return Mxtaxdocument Clone of current object.
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
     * @return MxtaxdocumentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MxtaxdocumentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Order object.
     *
     * @param                  Order $v
     * @return Mxtaxdocument The current object (for fluent API support)
     * @throws PropelException
     */
    public function setOrder(Order $v = null)
    {
        if ($v === null) {
            $this->setIdorder(NULL);
        } else {
            $this->setIdorder($v->getIdorder());
        }

        $this->aOrder = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Order object, it will not be re-added.
        if ($v !== null) {
            $v->addMxtaxdocument($this);
        }


        return $this;
    }


    /**
     * Get the associated Order object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Order The associated Order object.
     * @throws PropelException
     */
    public function getOrder(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aOrder === null && ($this->idorder !== null) && $doQuery) {
            $this->aOrder = OrderQuery::create()->findPk($this->idorder, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aOrder->addMxtaxdocuments($this);
             */
        }

        return $this->aOrder;
    }

    /**
     * Declares an association between this object and a Clienttax object.
     *
     * @param                  Clienttax $v
     * @return Mxtaxdocument The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClienttax(Clienttax $v = null)
    {
        if ($v === null) {
            $this->setIdclienttax(NULL);
        } else {
            $this->setIdclienttax($v->getIdclienttax());
        }

        $this->aClienttax = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Clienttax object, it will not be re-added.
        if ($v !== null) {
            $v->addMxtaxdocument($this);
        }


        return $this;
    }


    /**
     * Get the associated Clienttax object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Clienttax The associated Clienttax object.
     * @throws PropelException
     */
    public function getClienttax(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClienttax === null && ($this->idclienttax !== null) && $doQuery) {
            $this->aClienttax = ClienttaxQuery::create()->findPk($this->idclienttax, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClienttax->addMxtaxdocuments($this);
             */
        }

        return $this->aClienttax;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmxtaxdocument = null;
        $this->idclienttax = null;
        $this->idorder = null;
        $this->mxtaxdocument_folio = null;
        $this->mxtaxdocument_version = null;
        $this->mxtaxdocument_type = null;
        $this->mxtaxdocument_status = null;
        $this->mxtaxdocument_url_xml = null;
        $this->mxtaxdocument_url_pdf = null;
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
            if ($this->aOrder instanceof Persistent) {
              $this->aOrder->clearAllReferences($deep);
            }
            if ($this->aClienttax instanceof Persistent) {
              $this->aClienttax->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aOrder = null;
        $this->aClienttax = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MxtaxdocumentPeer::DEFAULT_STRING_FORMAT);
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
