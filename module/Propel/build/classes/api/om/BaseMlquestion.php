<?php


/**
 * Base class that represents a row from the 'mlquestion' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMlquestion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'MlquestionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MlquestionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idmlquestion field.
     * @var        int
     */
    protected $idmlquestion;

    /**
     * The value for the idmlitem field.
     * @var        int
     */
    protected $idmlitem;

    /**
     * The value for the mlnickname field.
     * @var        string
     */
    protected $mlnickname;

    /**
     * The value for the mlquestion_question field.
     * @var        string
     */
    protected $mlquestion_question;

    /**
     * The value for the mlquestion_questiondate field.
     * @var        string
     */
    protected $mlquestion_questiondate;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the mlquestion_answer field.
     * @var        string
     */
    protected $mlquestion_answer;

    /**
     * The value for the mlquestion_answerdate field.
     * @var        string
     */
    protected $mlquestion_answerdate;

    /**
     * @var        Mlitem
     */
    protected $aMlitem;

    /**
     * @var        User
     */
    protected $aUser;

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
     * Get the [idmlquestion] column value.
     *
     * @return int
     */
    public function getIdmlquestion()
    {

        return $this->idmlquestion;
    }

    /**
     * Get the [idmlitem] column value.
     *
     * @return int
     */
    public function getIdmlitem()
    {

        return $this->idmlitem;
    }

    /**
     * Get the [mlnickname] column value.
     *
     * @return string
     */
    public function getMlnickname()
    {

        return $this->mlnickname;
    }

    /**
     * Get the [mlquestion_question] column value.
     *
     * @return string
     */
    public function getMlquestionQuestion()
    {

        return $this->mlquestion_question;
    }

    /**
     * Get the [optionally formatted] temporal [mlquestion_questiondate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMlquestionQuestiondate($format = 'Y-m-d H:i:s')
    {
        if ($this->mlquestion_questiondate === null) {
            return null;
        }

        if ($this->mlquestion_questiondate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->mlquestion_questiondate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->mlquestion_questiondate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [iduser] column value.
     *
     * @return int
     */
    public function getIduser()
    {

        return $this->iduser;
    }

    /**
     * Get the [mlquestion_answer] column value.
     *
     * @return string
     */
    public function getMlquestionAnswer()
    {

        return $this->mlquestion_answer;
    }

    /**
     * Get the [optionally formatted] temporal [mlquestion_answerdate] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMlquestionAnswerdate($format = 'Y-m-d H:i:s')
    {
        if ($this->mlquestion_answerdate === null) {
            return null;
        }

        if ($this->mlquestion_answerdate === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->mlquestion_answerdate);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->mlquestion_answerdate, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [idmlquestion] column.
     *
     * @param  int $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setIdmlquestion($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmlquestion !== $v) {
            $this->idmlquestion = $v;
            $this->modifiedColumns[] = MlquestionPeer::IDMLQUESTION;
        }


        return $this;
    } // setIdmlquestion()

    /**
     * Set the value of [idmlitem] column.
     *
     * @param  int $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setIdmlitem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idmlitem !== $v) {
            $this->idmlitem = $v;
            $this->modifiedColumns[] = MlquestionPeer::IDMLITEM;
        }

        if ($this->aMlitem !== null && $this->aMlitem->getIdmlitem() !== $v) {
            $this->aMlitem = null;
        }


        return $this;
    } // setIdmlitem()

    /**
     * Set the value of [mlnickname] column.
     *
     * @param  string $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setMlnickname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mlnickname !== $v) {
            $this->mlnickname = $v;
            $this->modifiedColumns[] = MlquestionPeer::MLNICKNAME;
        }


        return $this;
    } // setMlnickname()

    /**
     * Set the value of [mlquestion_question] column.
     *
     * @param  string $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setMlquestionQuestion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mlquestion_question !== $v) {
            $this->mlquestion_question = $v;
            $this->modifiedColumns[] = MlquestionPeer::MLQUESTION_QUESTION;
        }


        return $this;
    } // setMlquestionQuestion()

    /**
     * Sets the value of [mlquestion_questiondate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setMlquestionQuestiondate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->mlquestion_questiondate !== null || $dt !== null) {
            $currentDateAsString = ($this->mlquestion_questiondate !== null && $tmpDt = new DateTime($this->mlquestion_questiondate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->mlquestion_questiondate = $newDateAsString;
                $this->modifiedColumns[] = MlquestionPeer::MLQUESTION_QUESTIONDATE;
            }
        } // if either are not null


        return $this;
    } // setMlquestionQuestiondate()

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = MlquestionPeer::IDUSER;
        }

        if ($this->aUser !== null && $this->aUser->getIdUser() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [mlquestion_answer] column.
     *
     * @param  string $v new value
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setMlquestionAnswer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mlquestion_answer !== $v) {
            $this->mlquestion_answer = $v;
            $this->modifiedColumns[] = MlquestionPeer::MLQUESTION_ANSWER;
        }


        return $this;
    } // setMlquestionAnswer()

    /**
     * Sets the value of [mlquestion_answerdate] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Mlquestion The current object (for fluent API support)
     */
    public function setMlquestionAnswerdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->mlquestion_answerdate !== null || $dt !== null) {
            $currentDateAsString = ($this->mlquestion_answerdate !== null && $tmpDt = new DateTime($this->mlquestion_answerdate)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->mlquestion_answerdate = $newDateAsString;
                $this->modifiedColumns[] = MlquestionPeer::MLQUESTION_ANSWERDATE;
            }
        } // if either are not null


        return $this;
    } // setMlquestionAnswerdate()

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

            $this->idmlquestion = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idmlitem = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->mlnickname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->mlquestion_question = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->mlquestion_questiondate = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->iduser = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->mlquestion_answer = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->mlquestion_answerdate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = MlquestionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Mlquestion object", $e);
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

        if ($this->aMlitem !== null && $this->idmlitem !== $this->aMlitem->getIdmlitem()) {
            $this->aMlitem = null;
        }
        if ($this->aUser !== null && $this->iduser !== $this->aUser->getIdUser()) {
            $this->aUser = null;
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
            $con = Propel::getConnection(MlquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MlquestionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMlitem = null;
            $this->aUser = null;
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
            $con = Propel::getConnection(MlquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MlquestionQuery::create()
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
            $con = Propel::getConnection(MlquestionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MlquestionPeer::addInstanceToPool($this);
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

            if ($this->aMlitem !== null) {
                if ($this->aMlitem->isModified() || $this->aMlitem->isNew()) {
                    $affectedRows += $this->aMlitem->save($con);
                }
                $this->setMlitem($this->aMlitem);
            }

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
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

        $this->modifiedColumns[] = MlquestionPeer::IDMLQUESTION;
        if (null !== $this->idmlquestion) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MlquestionPeer::IDMLQUESTION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MlquestionPeer::IDMLQUESTION)) {
            $modifiedColumns[':p' . $index++]  = '`idmlquestion`';
        }
        if ($this->isColumnModified(MlquestionPeer::IDMLITEM)) {
            $modifiedColumns[':p' . $index++]  = '`idmlitem`';
        }
        if ($this->isColumnModified(MlquestionPeer::MLNICKNAME)) {
            $modifiedColumns[':p' . $index++]  = '`mlnickname`';
        }
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_QUESTION)) {
            $modifiedColumns[':p' . $index++]  = '`mlquestion_question`';
        }
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_QUESTIONDATE)) {
            $modifiedColumns[':p' . $index++]  = '`mlquestion_questiondate`';
        }
        if ($this->isColumnModified(MlquestionPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_ANSWER)) {
            $modifiedColumns[':p' . $index++]  = '`mlquestion_answer`';
        }
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_ANSWERDATE)) {
            $modifiedColumns[':p' . $index++]  = '`mlquestion_answerdate`';
        }

        $sql = sprintf(
            'INSERT INTO `mlquestion` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idmlquestion`':
                        $stmt->bindValue($identifier, $this->idmlquestion, PDO::PARAM_INT);
                        break;
                    case '`idmlitem`':
                        $stmt->bindValue($identifier, $this->idmlitem, PDO::PARAM_INT);
                        break;
                    case '`mlnickname`':
                        $stmt->bindValue($identifier, $this->mlnickname, PDO::PARAM_STR);
                        break;
                    case '`mlquestion_question`':
                        $stmt->bindValue($identifier, $this->mlquestion_question, PDO::PARAM_STR);
                        break;
                    case '`mlquestion_questiondate`':
                        $stmt->bindValue($identifier, $this->mlquestion_questiondate, PDO::PARAM_STR);
                        break;
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`mlquestion_answer`':
                        $stmt->bindValue($identifier, $this->mlquestion_answer, PDO::PARAM_STR);
                        break;
                    case '`mlquestion_answerdate`':
                        $stmt->bindValue($identifier, $this->mlquestion_answerdate, PDO::PARAM_STR);
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
        $this->setIdmlquestion($pk);

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

            if ($this->aMlitem !== null) {
                if (!$this->aMlitem->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMlitem->getValidationFailures());
                }
            }

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }


            if (($retval = MlquestionPeer::doValidate($this, $columns)) !== true) {
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
        $pos = MlquestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdmlquestion();
                break;
            case 1:
                return $this->getIdmlitem();
                break;
            case 2:
                return $this->getMlnickname();
                break;
            case 3:
                return $this->getMlquestionQuestion();
                break;
            case 4:
                return $this->getMlquestionQuestiondate();
                break;
            case 5:
                return $this->getIduser();
                break;
            case 6:
                return $this->getMlquestionAnswer();
                break;
            case 7:
                return $this->getMlquestionAnswerdate();
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
        if (isset($alreadyDumpedObjects['Mlquestion'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Mlquestion'][$this->getPrimaryKey()] = true;
        $keys = MlquestionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdmlquestion(),
            $keys[1] => $this->getIdmlitem(),
            $keys[2] => $this->getMlnickname(),
            $keys[3] => $this->getMlquestionQuestion(),
            $keys[4] => $this->getMlquestionQuestiondate(),
            $keys[5] => $this->getIduser(),
            $keys[6] => $this->getMlquestionAnswer(),
            $keys[7] => $this->getMlquestionAnswerdate(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMlitem) {
                $result['Mlitem'] = $this->aMlitem->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = MlquestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdmlquestion($value);
                break;
            case 1:
                $this->setIdmlitem($value);
                break;
            case 2:
                $this->setMlnickname($value);
                break;
            case 3:
                $this->setMlquestionQuestion($value);
                break;
            case 4:
                $this->setMlquestionQuestiondate($value);
                break;
            case 5:
                $this->setIduser($value);
                break;
            case 6:
                $this->setMlquestionAnswer($value);
                break;
            case 7:
                $this->setMlquestionAnswerdate($value);
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
        $keys = MlquestionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdmlquestion($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdmlitem($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setMlnickname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setMlquestionQuestion($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMlquestionQuestiondate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIduser($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setMlquestionAnswer($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMlquestionAnswerdate($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MlquestionPeer::DATABASE_NAME);

        if ($this->isColumnModified(MlquestionPeer::IDMLQUESTION)) $criteria->add(MlquestionPeer::IDMLQUESTION, $this->idmlquestion);
        if ($this->isColumnModified(MlquestionPeer::IDMLITEM)) $criteria->add(MlquestionPeer::IDMLITEM, $this->idmlitem);
        if ($this->isColumnModified(MlquestionPeer::MLNICKNAME)) $criteria->add(MlquestionPeer::MLNICKNAME, $this->mlnickname);
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_QUESTION)) $criteria->add(MlquestionPeer::MLQUESTION_QUESTION, $this->mlquestion_question);
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_QUESTIONDATE)) $criteria->add(MlquestionPeer::MLQUESTION_QUESTIONDATE, $this->mlquestion_questiondate);
        if ($this->isColumnModified(MlquestionPeer::IDUSER)) $criteria->add(MlquestionPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_ANSWER)) $criteria->add(MlquestionPeer::MLQUESTION_ANSWER, $this->mlquestion_answer);
        if ($this->isColumnModified(MlquestionPeer::MLQUESTION_ANSWERDATE)) $criteria->add(MlquestionPeer::MLQUESTION_ANSWERDATE, $this->mlquestion_answerdate);

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
        $criteria = new Criteria(MlquestionPeer::DATABASE_NAME);
        $criteria->add(MlquestionPeer::IDMLQUESTION, $this->idmlquestion);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdmlquestion();
    }

    /**
     * Generic method to set the primary key (idmlquestion column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdmlquestion($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdmlquestion();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Mlquestion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdmlitem($this->getIdmlitem());
        $copyObj->setMlnickname($this->getMlnickname());
        $copyObj->setMlquestionQuestion($this->getMlquestionQuestion());
        $copyObj->setMlquestionQuestiondate($this->getMlquestionQuestiondate());
        $copyObj->setIduser($this->getIduser());
        $copyObj->setMlquestionAnswer($this->getMlquestionAnswer());
        $copyObj->setMlquestionAnswerdate($this->getMlquestionAnswerdate());

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
            $copyObj->setIdmlquestion(NULL); // this is a auto-increment column, so set to default value
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
     * @return Mlquestion Clone of current object.
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
     * @return MlquestionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MlquestionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Mlitem object.
     *
     * @param                  Mlitem $v
     * @return Mlquestion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMlitem(Mlitem $v = null)
    {
        if ($v === null) {
            $this->setIdmlitem(NULL);
        } else {
            $this->setIdmlitem($v->getIdmlitem());
        }

        $this->aMlitem = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Mlitem object, it will not be re-added.
        if ($v !== null) {
            $v->addMlquestion($this);
        }


        return $this;
    }


    /**
     * Get the associated Mlitem object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Mlitem The associated Mlitem object.
     * @throws PropelException
     */
    public function getMlitem(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMlitem === null && ($this->idmlitem !== null) && $doQuery) {
            $this->aMlitem = MlitemQuery::create()->findPk($this->idmlitem, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMlitem->addMlquestions($this);
             */
        }

        return $this->aMlitem;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return Mlquestion The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setIduser(NULL);
        } else {
            $this->setIduser($v->getIdUser());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addMlquestion($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && ($this->iduser !== null) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->iduser, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addMlquestions($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idmlquestion = null;
        $this->idmlitem = null;
        $this->mlnickname = null;
        $this->mlquestion_question = null;
        $this->mlquestion_questiondate = null;
        $this->iduser = null;
        $this->mlquestion_answer = null;
        $this->mlquestion_answerdate = null;
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
            if ($this->aMlitem instanceof Persistent) {
              $this->aMlitem->clearAllReferences($deep);
            }
            if ($this->aUser instanceof Persistent) {
              $this->aUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aMlitem = null;
        $this->aUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MlquestionPeer::DEFAULT_STRING_FORMAT);
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
