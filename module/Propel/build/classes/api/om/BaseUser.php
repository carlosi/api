<?php


/**
 * Base class that represents a row from the 'user' table.
 *
 *
 *
 * @package    propel.generator.api.om
 */
abstract class BaseUser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'UserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the iduser field.
     * @var        int
     */
    protected $iduser;

    /**
     * The value for the idcompany field.
     * @var        int
     */
    protected $idcompany;

    /**
     * The value for the user_nickname field.
     * @var        string
     */
    protected $user_nickname;

    /**
     * The value for the user_password field.
     * @var        string
     */
    protected $user_password;

    /**
     * The value for the user_type field.
     * Note: this column has a database default value of: 'human'
     * @var        string
     */
    protected $user_type;

    /**
     * The value for the user_status field.
     * Note: this column has a database default value of: 'pending'
     * @var        string
     */
    protected $user_status;

    /**
     * @var        Company
     */
    protected $aCompany;

    /**
     * @var        PropelObjectCollection|BranchUser[] Collection to store aggregation of BranchUser objects.
     */
    protected $collBranchUsers;
    protected $collBranchUsersPartial;

    /**
     * @var        PropelObjectCollection|Chatcorp[] Collection to store aggregation of Chatcorp objects.
     */
    protected $collChatcorps;
    protected $collChatcorpsPartial;

    /**
     * @var        PropelObjectCollection|Chatpublic[] Collection to store aggregation of Chatpublic objects.
     */
    protected $collChatpublics;
    protected $collChatpublicsPartial;

    /**
     * @var        PropelObjectCollection|Loguser[] Collection to store aggregation of Loguser objects.
     */
    protected $collLogusers;
    protected $collLogusersPartial;

    /**
     * @var        PropelObjectCollection|Mlquestion[] Collection to store aggregation of Mlquestion objects.
     */
    protected $collMlquestions;
    protected $collMlquestionsPartial;

    /**
     * @var        PropelObjectCollection|OrderconflictComment[] Collection to store aggregation of OrderconflictComment objects.
     */
    protected $collOrderconflictComments;
    protected $collOrderconflictCommentsPartial;

    /**
     * @var        PropelObjectCollection|Productionordercomment[] Collection to store aggregation of Productionordercomment objects.
     */
    protected $collProductionordercomments;
    protected $collProductionordercommentsPartial;

    /**
     * @var        PropelObjectCollection|Productionuser[] Collection to store aggregation of Productionuser objects.
     */
    protected $collProductionusers;
    protected $collProductionusersPartial;

    /**
     * @var        PropelObjectCollection|Projectactivitypost[] Collection to store aggregation of Projectactivitypost objects.
     */
    protected $collProjectactivityposts;
    protected $collProjectactivitypostsPartial;

    /**
     * @var        PropelObjectCollection|Projectactivityuser[] Collection to store aggregation of Projectactivityuser objects.
     */
    protected $collProjectactivityusers;
    protected $collProjectactivityusersPartial;

    /**
     * @var        PropelObjectCollection|Staff[] Collection to store aggregation of Staff objects.
     */
    protected $collStaffs;
    protected $collStaffsPartial;

    /**
     * @var        PropelObjectCollection|Token[] Collection to store aggregation of Token objects.
     */
    protected $collTokens;
    protected $collTokensPartial;

    /**
     * @var        PropelObjectCollection|Useraccesslog[] Collection to store aggregation of Useraccesslog objects.
     */
    protected $collUseraccesslogs;
    protected $collUseraccesslogsPartial;

    /**
     * @var        PropelObjectCollection|Useracl[] Collection to store aggregation of Useracl objects.
     */
    protected $collUseracls;
    protected $collUseraclsPartial;

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
    protected $branchUsersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $chatcorpsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $chatpublicsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $logusersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mlquestionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $orderconflictCommentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productionordercommentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $productionusersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $projectactivitypostsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $projectactivityusersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $staffsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tokensScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $useraccesslogsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $useraclsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->user_type = 'human';
        $this->user_status = 'pending';
    }

    /**
     * Initializes internal state of BaseUser object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [idcompany] column value.
     *
     * @return int
     */
    public function getIdcompany()
    {

        return $this->idcompany;
    }

    /**
     * Get the [user_nickname] column value.
     *
     * @return string
     */
    public function getUserNickname()
    {

        return $this->user_nickname;
    }

    /**
     * Get the [user_password] column value.
     *
     * @return string
     */
    public function getUserPassword()
    {

        return $this->user_password;
    }

    /**
     * Get the [user_type] column value.
     *
     * @return string
     */
    public function getUserType()
    {

        return $this->user_type;
    }

    /**
     * Get the [user_status] column value.
     *
     * @return string
     */
    public function getUserStatus()
    {

        return $this->user_status;
    }

    /**
     * Set the value of [iduser] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setIduser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->iduser !== $v) {
            $this->iduser = $v;
            $this->modifiedColumns[] = UserPeer::IDUSER;
        }


        return $this;
    } // setIduser()

    /**
     * Set the value of [idcompany] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setIdcompany($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcompany !== $v) {
            $this->idcompany = $v;
            $this->modifiedColumns[] = UserPeer::IDCOMPANY;
        }

        if ($this->aCompany !== null && $this->aCompany->getIdcompany() !== $v) {
            $this->aCompany = null;
        }


        return $this;
    } // setIdcompany()

    /**
     * Set the value of [user_nickname] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUserNickname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_nickname !== $v) {
            $this->user_nickname = $v;
            $this->modifiedColumns[] = UserPeer::USER_NICKNAME;
        }


        return $this;
    } // setUserNickname()

    /**
     * Set the value of [user_password] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUserPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_password !== $v) {
            $this->user_password = $v;
            $this->modifiedColumns[] = UserPeer::USER_PASSWORD;
        }


        return $this;
    } // setUserPassword()

    /**
     * Set the value of [user_type] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUserType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_type !== $v) {
            $this->user_type = $v;
            $this->modifiedColumns[] = UserPeer::USER_TYPE;
        }


        return $this;
    } // setUserType()

    /**
     * Set the value of [user_status] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUserStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_status !== $v) {
            $this->user_status = $v;
            $this->modifiedColumns[] = UserPeer::USER_STATUS;
        }


        return $this;
    } // setUserStatus()

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
            if ($this->user_type !== 'human') {
                return false;
            }

            if ($this->user_status !== 'pending') {
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

            $this->iduser = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idcompany = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->user_nickname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->user_password = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->user_type = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->user_status = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = UserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating User object", $e);
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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCompany = null;
            $this->collBranchUsers = null;

            $this->collChatcorps = null;

            $this->collChatpublics = null;

            $this->collLogusers = null;

            $this->collMlquestions = null;

            $this->collOrderconflictComments = null;

            $this->collProductionordercomments = null;

            $this->collProductionusers = null;

            $this->collProjectactivityposts = null;

            $this->collProjectactivityusers = null;

            $this->collStaffs = null;

            $this->collTokens = null;

            $this->collUseraccesslogs = null;

            $this->collUseracls = null;

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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UserQuery::create()
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
            $con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                UserPeer::addInstanceToPool($this);
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

            if ($this->branchUsersScheduledForDeletion !== null) {
                if (!$this->branchUsersScheduledForDeletion->isEmpty()) {
                    BranchUserQuery::create()
                        ->filterByPrimaryKeys($this->branchUsersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->branchUsersScheduledForDeletion = null;
                }
            }

            if ($this->collBranchUsers !== null) {
                foreach ($this->collBranchUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->chatcorpsScheduledForDeletion !== null) {
                if (!$this->chatcorpsScheduledForDeletion->isEmpty()) {
                    ChatcorpQuery::create()
                        ->filterByPrimaryKeys($this->chatcorpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->chatcorpsScheduledForDeletion = null;
                }
            }

            if ($this->collChatcorps !== null) {
                foreach ($this->collChatcorps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->chatpublicsScheduledForDeletion !== null) {
                if (!$this->chatpublicsScheduledForDeletion->isEmpty()) {
                    ChatpublicQuery::create()
                        ->filterByPrimaryKeys($this->chatpublicsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->chatpublicsScheduledForDeletion = null;
                }
            }

            if ($this->collChatpublics !== null) {
                foreach ($this->collChatpublics as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->logusersScheduledForDeletion !== null) {
                if (!$this->logusersScheduledForDeletion->isEmpty()) {
                    LoguserQuery::create()
                        ->filterByPrimaryKeys($this->logusersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->logusersScheduledForDeletion = null;
                }
            }

            if ($this->collLogusers !== null) {
                foreach ($this->collLogusers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mlquestionsScheduledForDeletion !== null) {
                if (!$this->mlquestionsScheduledForDeletion->isEmpty()) {
                    MlquestionQuery::create()
                        ->filterByPrimaryKeys($this->mlquestionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mlquestionsScheduledForDeletion = null;
                }
            }

            if ($this->collMlquestions !== null) {
                foreach ($this->collMlquestions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->orderconflictCommentsScheduledForDeletion !== null) {
                if (!$this->orderconflictCommentsScheduledForDeletion->isEmpty()) {
                    OrderconflictCommentQuery::create()
                        ->filterByPrimaryKeys($this->orderconflictCommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->orderconflictCommentsScheduledForDeletion = null;
                }
            }

            if ($this->collOrderconflictComments !== null) {
                foreach ($this->collOrderconflictComments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productionordercommentsScheduledForDeletion !== null) {
                if (!$this->productionordercommentsScheduledForDeletion->isEmpty()) {
                    ProductionordercommentQuery::create()
                        ->filterByPrimaryKeys($this->productionordercommentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productionordercommentsScheduledForDeletion = null;
                }
            }

            if ($this->collProductionordercomments !== null) {
                foreach ($this->collProductionordercomments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->productionusersScheduledForDeletion !== null) {
                if (!$this->productionusersScheduledForDeletion->isEmpty()) {
                    ProductionuserQuery::create()
                        ->filterByPrimaryKeys($this->productionusersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->productionusersScheduledForDeletion = null;
                }
            }

            if ($this->collProductionusers !== null) {
                foreach ($this->collProductionusers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectactivitypostsScheduledForDeletion !== null) {
                if (!$this->projectactivitypostsScheduledForDeletion->isEmpty()) {
                    ProjectactivitypostQuery::create()
                        ->filterByPrimaryKeys($this->projectactivitypostsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectactivitypostsScheduledForDeletion = null;
                }
            }

            if ($this->collProjectactivityposts !== null) {
                foreach ($this->collProjectactivityposts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectactivityusersScheduledForDeletion !== null) {
                if (!$this->projectactivityusersScheduledForDeletion->isEmpty()) {
                    ProjectactivityuserQuery::create()
                        ->filterByPrimaryKeys($this->projectactivityusersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectactivityusersScheduledForDeletion = null;
                }
            }

            if ($this->collProjectactivityusers !== null) {
                foreach ($this->collProjectactivityusers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->staffsScheduledForDeletion !== null) {
                if (!$this->staffsScheduledForDeletion->isEmpty()) {
                    StaffQuery::create()
                        ->filterByPrimaryKeys($this->staffsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->staffsScheduledForDeletion = null;
                }
            }

            if ($this->collStaffs !== null) {
                foreach ($this->collStaffs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tokensScheduledForDeletion !== null) {
                if (!$this->tokensScheduledForDeletion->isEmpty()) {
                    TokenQuery::create()
                        ->filterByPrimaryKeys($this->tokensScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tokensScheduledForDeletion = null;
                }
            }

            if ($this->collTokens !== null) {
                foreach ($this->collTokens as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->useraccesslogsScheduledForDeletion !== null) {
                if (!$this->useraccesslogsScheduledForDeletion->isEmpty()) {
                    UseraccesslogQuery::create()
                        ->filterByPrimaryKeys($this->useraccesslogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->useraccesslogsScheduledForDeletion = null;
                }
            }

            if ($this->collUseraccesslogs !== null) {
                foreach ($this->collUseraccesslogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->useraclsScheduledForDeletion !== null) {
                if (!$this->useraclsScheduledForDeletion->isEmpty()) {
                    UseraclQuery::create()
                        ->filterByPrimaryKeys($this->useraclsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->useraclsScheduledForDeletion = null;
                }
            }

            if ($this->collUseracls !== null) {
                foreach ($this->collUseracls as $referrerFK) {
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

        $this->modifiedColumns[] = UserPeer::IDUSER;
        if (null !== $this->iduser) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPeer::IDUSER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPeer::IDUSER)) {
            $modifiedColumns[':p' . $index++]  = '`iduser`';
        }
        if ($this->isColumnModified(UserPeer::IDCOMPANY)) {
            $modifiedColumns[':p' . $index++]  = '`idcompany`';
        }
        if ($this->isColumnModified(UserPeer::USER_NICKNAME)) {
            $modifiedColumns[':p' . $index++]  = '`user_nickname`';
        }
        if ($this->isColumnModified(UserPeer::USER_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`user_password`';
        }
        if ($this->isColumnModified(UserPeer::USER_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`user_type`';
        }
        if ($this->isColumnModified(UserPeer::USER_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`user_status`';
        }

        $sql = sprintf(
            'INSERT INTO `user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`iduser`':
                        $stmt->bindValue($identifier, $this->iduser, PDO::PARAM_INT);
                        break;
                    case '`idcompany`':
                        $stmt->bindValue($identifier, $this->idcompany, PDO::PARAM_INT);
                        break;
                    case '`user_nickname`':
                        $stmt->bindValue($identifier, $this->user_nickname, PDO::PARAM_STR);
                        break;
                    case '`user_password`':
                        $stmt->bindValue($identifier, $this->user_password, PDO::PARAM_STR);
                        break;
                    case '`user_type`':
                        $stmt->bindValue($identifier, $this->user_type, PDO::PARAM_STR);
                        break;
                    case '`user_status`':
                        $stmt->bindValue($identifier, $this->user_status, PDO::PARAM_STR);
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
        $this->setIduser($pk);

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


            if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBranchUsers !== null) {
                    foreach ($this->collBranchUsers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collChatcorps !== null) {
                    foreach ($this->collChatcorps as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collChatpublics !== null) {
                    foreach ($this->collChatpublics as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLogusers !== null) {
                    foreach ($this->collLogusers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMlquestions !== null) {
                    foreach ($this->collMlquestions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOrderconflictComments !== null) {
                    foreach ($this->collOrderconflictComments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductionordercomments !== null) {
                    foreach ($this->collProductionordercomments as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProductionusers !== null) {
                    foreach ($this->collProductionusers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProjectactivityposts !== null) {
                    foreach ($this->collProjectactivityposts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collProjectactivityusers !== null) {
                    foreach ($this->collProjectactivityusers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStaffs !== null) {
                    foreach ($this->collStaffs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTokens !== null) {
                    foreach ($this->collTokens as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUseraccesslogs !== null) {
                    foreach ($this->collUseraccesslogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUseracls !== null) {
                    foreach ($this->collUseracls as $referrerFK) {
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
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIduser();
                break;
            case 1:
                return $this->getIdcompany();
                break;
            case 2:
                return $this->getUserNickname();
                break;
            case 3:
                return $this->getUserPassword();
                break;
            case 4:
                return $this->getUserType();
                break;
            case 5:
                return $this->getUserStatus();
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
        if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
        $keys = UserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIduser(),
            $keys[1] => $this->getIdcompany(),
            $keys[2] => $this->getUserNickname(),
            $keys[3] => $this->getUserPassword(),
            $keys[4] => $this->getUserType(),
            $keys[5] => $this->getUserStatus(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCompany) {
                $result['Company'] = $this->aCompany->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBranchUsers) {
                $result['BranchUsers'] = $this->collBranchUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collChatcorps) {
                $result['Chatcorps'] = $this->collChatcorps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collChatpublics) {
                $result['Chatpublics'] = $this->collChatpublics->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLogusers) {
                $result['Logusers'] = $this->collLogusers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMlquestions) {
                $result['Mlquestions'] = $this->collMlquestions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOrderconflictComments) {
                $result['OrderconflictComments'] = $this->collOrderconflictComments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductionordercomments) {
                $result['Productionordercomments'] = $this->collProductionordercomments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProductionusers) {
                $result['Productionusers'] = $this->collProductionusers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectactivityposts) {
                $result['Projectactivityposts'] = $this->collProjectactivityposts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectactivityusers) {
                $result['Projectactivityusers'] = $this->collProjectactivityusers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStaffs) {
                $result['Staffs'] = $this->collStaffs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTokens) {
                $result['Tokens'] = $this->collTokens->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUseraccesslogs) {
                $result['Useraccesslogs'] = $this->collUseraccesslogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUseracls) {
                $result['Useracls'] = $this->collUseracls->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIduser($value);
                break;
            case 1:
                $this->setIdcompany($value);
                break;
            case 2:
                $this->setUserNickname($value);
                break;
            case 3:
                $this->setUserPassword($value);
                break;
            case 4:
                $this->setUserType($value);
                break;
            case 5:
                $this->setUserStatus($value);
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
        $keys = UserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIduser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdcompany($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUserNickname($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUserPassword($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUserType($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUserStatus($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserPeer::IDUSER)) $criteria->add(UserPeer::IDUSER, $this->iduser);
        if ($this->isColumnModified(UserPeer::IDCOMPANY)) $criteria->add(UserPeer::IDCOMPANY, $this->idcompany);
        if ($this->isColumnModified(UserPeer::USER_NICKNAME)) $criteria->add(UserPeer::USER_NICKNAME, $this->user_nickname);
        if ($this->isColumnModified(UserPeer::USER_PASSWORD)) $criteria->add(UserPeer::USER_PASSWORD, $this->user_password);
        if ($this->isColumnModified(UserPeer::USER_TYPE)) $criteria->add(UserPeer::USER_TYPE, $this->user_type);
        if ($this->isColumnModified(UserPeer::USER_STATUS)) $criteria->add(UserPeer::USER_STATUS, $this->user_status);

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
        $criteria = new Criteria(UserPeer::DATABASE_NAME);
        $criteria->add(UserPeer::IDUSER, $this->iduser);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIduser();
    }

    /**
     * Generic method to set the primary key (iduser column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIduser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIduser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of User (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdcompany($this->getIdcompany());
        $copyObj->setUserNickname($this->getUserNickname());
        $copyObj->setUserPassword($this->getUserPassword());
        $copyObj->setUserType($this->getUserType());
        $copyObj->setUserStatus($this->getUserStatus());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBranchUsers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBranchUser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getChatcorps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addChatcorp($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getChatpublics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addChatpublic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLogusers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLoguser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMlquestions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMlquestion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOrderconflictComments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOrderconflictComment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductionordercomments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductionordercomment($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProductionusers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProductionuser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectactivityposts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectactivitypost($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectactivityusers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectactivityuser($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStaffs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStaff($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTokens() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addToken($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUseraccesslogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUseraccesslog($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUseracls() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUseracl($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIduser(NULL); // this is a auto-increment column, so set to default value
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
     * @return User Clone of current object.
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
     * @return UserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Company object.
     *
     * @param                  Company $v
     * @return User The current object (for fluent API support)
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
            $v->addUser($this);
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
                $this->aCompany->addUsers($this);
             */
        }

        return $this->aCompany;
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
        if ('BranchUser' == $relationName) {
            $this->initBranchUsers();
        }
        if ('Chatcorp' == $relationName) {
            $this->initChatcorps();
        }
        if ('Chatpublic' == $relationName) {
            $this->initChatpublics();
        }
        if ('Loguser' == $relationName) {
            $this->initLogusers();
        }
        if ('Mlquestion' == $relationName) {
            $this->initMlquestions();
        }
        if ('OrderconflictComment' == $relationName) {
            $this->initOrderconflictComments();
        }
        if ('Productionordercomment' == $relationName) {
            $this->initProductionordercomments();
        }
        if ('Productionuser' == $relationName) {
            $this->initProductionusers();
        }
        if ('Projectactivitypost' == $relationName) {
            $this->initProjectactivityposts();
        }
        if ('Projectactivityuser' == $relationName) {
            $this->initProjectactivityusers();
        }
        if ('Staff' == $relationName) {
            $this->initStaffs();
        }
        if ('Token' == $relationName) {
            $this->initTokens();
        }
        if ('Useraccesslog' == $relationName) {
            $this->initUseraccesslogs();
        }
        if ('Useracl' == $relationName) {
            $this->initUseracls();
        }
    }

    /**
     * Clears out the collBranchUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addBranchUsers()
     */
    public function clearBranchUsers()
    {
        $this->collBranchUsers = null; // important to set this to null since that means it is uninitialized
        $this->collBranchUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collBranchUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialBranchUsers($v = true)
    {
        $this->collBranchUsersPartial = $v;
    }

    /**
     * Initializes the collBranchUsers collection.
     *
     * By default this just sets the collBranchUsers collection to an empty array (like clearcollBranchUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBranchUsers($overrideExisting = true)
    {
        if (null !== $this->collBranchUsers && !$overrideExisting) {
            return;
        }
        $this->collBranchUsers = new PropelObjectCollection();
        $this->collBranchUsers->setModel('BranchUser');
    }

    /**
     * Gets an array of BranchUser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BranchUser[] List of BranchUser objects
     * @throws PropelException
     */
    public function getBranchUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBranchUsersPartial && !$this->isNew();
        if (null === $this->collBranchUsers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBranchUsers) {
                // return empty collection
                $this->initBranchUsers();
            } else {
                $collBranchUsers = BranchUserQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBranchUsersPartial && count($collBranchUsers)) {
                      $this->initBranchUsers(false);

                      foreach ($collBranchUsers as $obj) {
                        if (false == $this->collBranchUsers->contains($obj)) {
                          $this->collBranchUsers->append($obj);
                        }
                      }

                      $this->collBranchUsersPartial = true;
                    }

                    $collBranchUsers->getInternalIterator()->rewind();

                    return $collBranchUsers;
                }

                if ($partial && $this->collBranchUsers) {
                    foreach ($this->collBranchUsers as $obj) {
                        if ($obj->isNew()) {
                            $collBranchUsers[] = $obj;
                        }
                    }
                }

                $this->collBranchUsers = $collBranchUsers;
                $this->collBranchUsersPartial = false;
            }
        }

        return $this->collBranchUsers;
    }

    /**
     * Sets a collection of BranchUser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $branchUsers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setBranchUsers(PropelCollection $branchUsers, PropelPDO $con = null)
    {
        $branchUsersToDelete = $this->getBranchUsers(new Criteria(), $con)->diff($branchUsers);


        $this->branchUsersScheduledForDeletion = $branchUsersToDelete;

        foreach ($branchUsersToDelete as $branchUserRemoved) {
            $branchUserRemoved->setUser(null);
        }

        $this->collBranchUsers = null;
        foreach ($branchUsers as $branchUser) {
            $this->addBranchUser($branchUser);
        }

        $this->collBranchUsers = $branchUsers;
        $this->collBranchUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BranchUser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BranchUser objects.
     * @throws PropelException
     */
    public function countBranchUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBranchUsersPartial && !$this->isNew();
        if (null === $this->collBranchUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBranchUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBranchUsers());
            }
            $query = BranchUserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collBranchUsers);
    }

    /**
     * Method called to associate a BranchUser object to this object
     * through the BranchUser foreign key attribute.
     *
     * @param    BranchUser $l BranchUser
     * @return User The current object (for fluent API support)
     */
    public function addBranchUser(BranchUser $l)
    {
        if ($this->collBranchUsers === null) {
            $this->initBranchUsers();
            $this->collBranchUsersPartial = true;
        }

        if (!in_array($l, $this->collBranchUsers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBranchUser($l);

            if ($this->branchUsersScheduledForDeletion and $this->branchUsersScheduledForDeletion->contains($l)) {
                $this->branchUsersScheduledForDeletion->remove($this->branchUsersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	BranchUser $branchUser The branchUser object to add.
     */
    protected function doAddBranchUser($branchUser)
    {
        $this->collBranchUsers[]= $branchUser;
        $branchUser->setUser($this);
    }

    /**
     * @param	BranchUser $branchUser The branchUser object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeBranchUser($branchUser)
    {
        if ($this->getBranchUsers()->contains($branchUser)) {
            $this->collBranchUsers->remove($this->collBranchUsers->search($branchUser));
            if (null === $this->branchUsersScheduledForDeletion) {
                $this->branchUsersScheduledForDeletion = clone $this->collBranchUsers;
                $this->branchUsersScheduledForDeletion->clear();
            }
            $this->branchUsersScheduledForDeletion[]= clone $branchUser;
            $branchUser->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related BranchUsers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BranchUser[] List of BranchUser objects
     */
    public function getBranchUsersJoinBranch($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BranchUserQuery::create(null, $criteria);
        $query->joinWith('Branch', $join_behavior);

        return $this->getBranchUsers($query, $con);
    }

    /**
     * Clears out the collChatcorps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addChatcorps()
     */
    public function clearChatcorps()
    {
        $this->collChatcorps = null; // important to set this to null since that means it is uninitialized
        $this->collChatcorpsPartial = null;

        return $this;
    }

    /**
     * reset is the collChatcorps collection loaded partially
     *
     * @return void
     */
    public function resetPartialChatcorps($v = true)
    {
        $this->collChatcorpsPartial = $v;
    }

    /**
     * Initializes the collChatcorps collection.
     *
     * By default this just sets the collChatcorps collection to an empty array (like clearcollChatcorps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initChatcorps($overrideExisting = true)
    {
        if (null !== $this->collChatcorps && !$overrideExisting) {
            return;
        }
        $this->collChatcorps = new PropelObjectCollection();
        $this->collChatcorps->setModel('Chatcorp');
    }

    /**
     * Gets an array of Chatcorp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Chatcorp[] List of Chatcorp objects
     * @throws PropelException
     */
    public function getChatcorps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collChatcorpsPartial && !$this->isNew();
        if (null === $this->collChatcorps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collChatcorps) {
                // return empty collection
                $this->initChatcorps();
            } else {
                $collChatcorps = ChatcorpQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collChatcorpsPartial && count($collChatcorps)) {
                      $this->initChatcorps(false);

                      foreach ($collChatcorps as $obj) {
                        if (false == $this->collChatcorps->contains($obj)) {
                          $this->collChatcorps->append($obj);
                        }
                      }

                      $this->collChatcorpsPartial = true;
                    }

                    $collChatcorps->getInternalIterator()->rewind();

                    return $collChatcorps;
                }

                if ($partial && $this->collChatcorps) {
                    foreach ($this->collChatcorps as $obj) {
                        if ($obj->isNew()) {
                            $collChatcorps[] = $obj;
                        }
                    }
                }

                $this->collChatcorps = $collChatcorps;
                $this->collChatcorpsPartial = false;
            }
        }

        return $this->collChatcorps;
    }

    /**
     * Sets a collection of Chatcorp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $chatcorps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setChatcorps(PropelCollection $chatcorps, PropelPDO $con = null)
    {
        $chatcorpsToDelete = $this->getChatcorps(new Criteria(), $con)->diff($chatcorps);


        $this->chatcorpsScheduledForDeletion = $chatcorpsToDelete;

        foreach ($chatcorpsToDelete as $chatcorpRemoved) {
            $chatcorpRemoved->setUser(null);
        }

        $this->collChatcorps = null;
        foreach ($chatcorps as $chatcorp) {
            $this->addChatcorp($chatcorp);
        }

        $this->collChatcorps = $chatcorps;
        $this->collChatcorpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Chatcorp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Chatcorp objects.
     * @throws PropelException
     */
    public function countChatcorps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collChatcorpsPartial && !$this->isNew();
        if (null === $this->collChatcorps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collChatcorps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getChatcorps());
            }
            $query = ChatcorpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collChatcorps);
    }

    /**
     * Method called to associate a Chatcorp object to this object
     * through the Chatcorp foreign key attribute.
     *
     * @param    Chatcorp $l Chatcorp
     * @return User The current object (for fluent API support)
     */
    public function addChatcorp(Chatcorp $l)
    {
        if ($this->collChatcorps === null) {
            $this->initChatcorps();
            $this->collChatcorpsPartial = true;
        }

        if (!in_array($l, $this->collChatcorps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddChatcorp($l);

            if ($this->chatcorpsScheduledForDeletion and $this->chatcorpsScheduledForDeletion->contains($l)) {
                $this->chatcorpsScheduledForDeletion->remove($this->chatcorpsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Chatcorp $chatcorp The chatcorp object to add.
     */
    protected function doAddChatcorp($chatcorp)
    {
        $this->collChatcorps[]= $chatcorp;
        $chatcorp->setUser($this);
    }

    /**
     * @param	Chatcorp $chatcorp The chatcorp object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeChatcorp($chatcorp)
    {
        if ($this->getChatcorps()->contains($chatcorp)) {
            $this->collChatcorps->remove($this->collChatcorps->search($chatcorp));
            if (null === $this->chatcorpsScheduledForDeletion) {
                $this->chatcorpsScheduledForDeletion = clone $this->collChatcorps;
                $this->chatcorpsScheduledForDeletion->clear();
            }
            $this->chatcorpsScheduledForDeletion[]= clone $chatcorp;
            $chatcorp->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collChatpublics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addChatpublics()
     */
    public function clearChatpublics()
    {
        $this->collChatpublics = null; // important to set this to null since that means it is uninitialized
        $this->collChatpublicsPartial = null;

        return $this;
    }

    /**
     * reset is the collChatpublics collection loaded partially
     *
     * @return void
     */
    public function resetPartialChatpublics($v = true)
    {
        $this->collChatpublicsPartial = $v;
    }

    /**
     * Initializes the collChatpublics collection.
     *
     * By default this just sets the collChatpublics collection to an empty array (like clearcollChatpublics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initChatpublics($overrideExisting = true)
    {
        if (null !== $this->collChatpublics && !$overrideExisting) {
            return;
        }
        $this->collChatpublics = new PropelObjectCollection();
        $this->collChatpublics->setModel('Chatpublic');
    }

    /**
     * Gets an array of Chatpublic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Chatpublic[] List of Chatpublic objects
     * @throws PropelException
     */
    public function getChatpublics($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collChatpublicsPartial && !$this->isNew();
        if (null === $this->collChatpublics || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collChatpublics) {
                // return empty collection
                $this->initChatpublics();
            } else {
                $collChatpublics = ChatpublicQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collChatpublicsPartial && count($collChatpublics)) {
                      $this->initChatpublics(false);

                      foreach ($collChatpublics as $obj) {
                        if (false == $this->collChatpublics->contains($obj)) {
                          $this->collChatpublics->append($obj);
                        }
                      }

                      $this->collChatpublicsPartial = true;
                    }

                    $collChatpublics->getInternalIterator()->rewind();

                    return $collChatpublics;
                }

                if ($partial && $this->collChatpublics) {
                    foreach ($this->collChatpublics as $obj) {
                        if ($obj->isNew()) {
                            $collChatpublics[] = $obj;
                        }
                    }
                }

                $this->collChatpublics = $collChatpublics;
                $this->collChatpublicsPartial = false;
            }
        }

        return $this->collChatpublics;
    }

    /**
     * Sets a collection of Chatpublic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $chatpublics A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setChatpublics(PropelCollection $chatpublics, PropelPDO $con = null)
    {
        $chatpublicsToDelete = $this->getChatpublics(new Criteria(), $con)->diff($chatpublics);


        $this->chatpublicsScheduledForDeletion = $chatpublicsToDelete;

        foreach ($chatpublicsToDelete as $chatpublicRemoved) {
            $chatpublicRemoved->setUser(null);
        }

        $this->collChatpublics = null;
        foreach ($chatpublics as $chatpublic) {
            $this->addChatpublic($chatpublic);
        }

        $this->collChatpublics = $chatpublics;
        $this->collChatpublicsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Chatpublic objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Chatpublic objects.
     * @throws PropelException
     */
    public function countChatpublics(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collChatpublicsPartial && !$this->isNew();
        if (null === $this->collChatpublics || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collChatpublics) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getChatpublics());
            }
            $query = ChatpublicQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collChatpublics);
    }

    /**
     * Method called to associate a Chatpublic object to this object
     * through the Chatpublic foreign key attribute.
     *
     * @param    Chatpublic $l Chatpublic
     * @return User The current object (for fluent API support)
     */
    public function addChatpublic(Chatpublic $l)
    {
        if ($this->collChatpublics === null) {
            $this->initChatpublics();
            $this->collChatpublicsPartial = true;
        }

        if (!in_array($l, $this->collChatpublics->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddChatpublic($l);

            if ($this->chatpublicsScheduledForDeletion and $this->chatpublicsScheduledForDeletion->contains($l)) {
                $this->chatpublicsScheduledForDeletion->remove($this->chatpublicsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Chatpublic $chatpublic The chatpublic object to add.
     */
    protected function doAddChatpublic($chatpublic)
    {
        $this->collChatpublics[]= $chatpublic;
        $chatpublic->setUser($this);
    }

    /**
     * @param	Chatpublic $chatpublic The chatpublic object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeChatpublic($chatpublic)
    {
        if ($this->getChatpublics()->contains($chatpublic)) {
            $this->collChatpublics->remove($this->collChatpublics->search($chatpublic));
            if (null === $this->chatpublicsScheduledForDeletion) {
                $this->chatpublicsScheduledForDeletion = clone $this->collChatpublics;
                $this->chatpublicsScheduledForDeletion->clear();
            }
            $this->chatpublicsScheduledForDeletion[]= $chatpublic;
            $chatpublic->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Chatpublics from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Chatpublic[] List of Chatpublic objects
     */
    public function getChatpublicsJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ChatpublicQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getChatpublics($query, $con);
    }

    /**
     * Clears out the collLogusers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addLogusers()
     */
    public function clearLogusers()
    {
        $this->collLogusers = null; // important to set this to null since that means it is uninitialized
        $this->collLogusersPartial = null;

        return $this;
    }

    /**
     * reset is the collLogusers collection loaded partially
     *
     * @return void
     */
    public function resetPartialLogusers($v = true)
    {
        $this->collLogusersPartial = $v;
    }

    /**
     * Initializes the collLogusers collection.
     *
     * By default this just sets the collLogusers collection to an empty array (like clearcollLogusers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLogusers($overrideExisting = true)
    {
        if (null !== $this->collLogusers && !$overrideExisting) {
            return;
        }
        $this->collLogusers = new PropelObjectCollection();
        $this->collLogusers->setModel('Loguser');
    }

    /**
     * Gets an array of Loguser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Loguser[] List of Loguser objects
     * @throws PropelException
     */
    public function getLogusers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLogusersPartial && !$this->isNew();
        if (null === $this->collLogusers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLogusers) {
                // return empty collection
                $this->initLogusers();
            } else {
                $collLogusers = LoguserQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLogusersPartial && count($collLogusers)) {
                      $this->initLogusers(false);

                      foreach ($collLogusers as $obj) {
                        if (false == $this->collLogusers->contains($obj)) {
                          $this->collLogusers->append($obj);
                        }
                      }

                      $this->collLogusersPartial = true;
                    }

                    $collLogusers->getInternalIterator()->rewind();

                    return $collLogusers;
                }

                if ($partial && $this->collLogusers) {
                    foreach ($this->collLogusers as $obj) {
                        if ($obj->isNew()) {
                            $collLogusers[] = $obj;
                        }
                    }
                }

                $this->collLogusers = $collLogusers;
                $this->collLogusersPartial = false;
            }
        }

        return $this->collLogusers;
    }

    /**
     * Sets a collection of Loguser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $logusers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setLogusers(PropelCollection $logusers, PropelPDO $con = null)
    {
        $logusersToDelete = $this->getLogusers(new Criteria(), $con)->diff($logusers);


        $this->logusersScheduledForDeletion = $logusersToDelete;

        foreach ($logusersToDelete as $loguserRemoved) {
            $loguserRemoved->setUser(null);
        }

        $this->collLogusers = null;
        foreach ($logusers as $loguser) {
            $this->addLoguser($loguser);
        }

        $this->collLogusers = $logusers;
        $this->collLogusersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Loguser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Loguser objects.
     * @throws PropelException
     */
    public function countLogusers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLogusersPartial && !$this->isNew();
        if (null === $this->collLogusers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLogusers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLogusers());
            }
            $query = LoguserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collLogusers);
    }

    /**
     * Method called to associate a Loguser object to this object
     * through the Loguser foreign key attribute.
     *
     * @param    Loguser $l Loguser
     * @return User The current object (for fluent API support)
     */
    public function addLoguser(Loguser $l)
    {
        if ($this->collLogusers === null) {
            $this->initLogusers();
            $this->collLogusersPartial = true;
        }

        if (!in_array($l, $this->collLogusers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLoguser($l);

            if ($this->logusersScheduledForDeletion and $this->logusersScheduledForDeletion->contains($l)) {
                $this->logusersScheduledForDeletion->remove($this->logusersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Loguser $loguser The loguser object to add.
     */
    protected function doAddLoguser($loguser)
    {
        $this->collLogusers[]= $loguser;
        $loguser->setUser($this);
    }

    /**
     * @param	Loguser $loguser The loguser object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeLoguser($loguser)
    {
        if ($this->getLogusers()->contains($loguser)) {
            $this->collLogusers->remove($this->collLogusers->search($loguser));
            if (null === $this->logusersScheduledForDeletion) {
                $this->logusersScheduledForDeletion = clone $this->collLogusers;
                $this->logusersScheduledForDeletion->clear();
            }
            $this->logusersScheduledForDeletion[]= clone $loguser;
            $loguser->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collMlquestions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addMlquestions()
     */
    public function clearMlquestions()
    {
        $this->collMlquestions = null; // important to set this to null since that means it is uninitialized
        $this->collMlquestionsPartial = null;

        return $this;
    }

    /**
     * reset is the collMlquestions collection loaded partially
     *
     * @return void
     */
    public function resetPartialMlquestions($v = true)
    {
        $this->collMlquestionsPartial = $v;
    }

    /**
     * Initializes the collMlquestions collection.
     *
     * By default this just sets the collMlquestions collection to an empty array (like clearcollMlquestions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMlquestions($overrideExisting = true)
    {
        if (null !== $this->collMlquestions && !$overrideExisting) {
            return;
        }
        $this->collMlquestions = new PropelObjectCollection();
        $this->collMlquestions->setModel('Mlquestion');
    }

    /**
     * Gets an array of Mlquestion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Mlquestion[] List of Mlquestion objects
     * @throws PropelException
     */
    public function getMlquestions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMlquestionsPartial && !$this->isNew();
        if (null === $this->collMlquestions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMlquestions) {
                // return empty collection
                $this->initMlquestions();
            } else {
                $collMlquestions = MlquestionQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMlquestionsPartial && count($collMlquestions)) {
                      $this->initMlquestions(false);

                      foreach ($collMlquestions as $obj) {
                        if (false == $this->collMlquestions->contains($obj)) {
                          $this->collMlquestions->append($obj);
                        }
                      }

                      $this->collMlquestionsPartial = true;
                    }

                    $collMlquestions->getInternalIterator()->rewind();

                    return $collMlquestions;
                }

                if ($partial && $this->collMlquestions) {
                    foreach ($this->collMlquestions as $obj) {
                        if ($obj->isNew()) {
                            $collMlquestions[] = $obj;
                        }
                    }
                }

                $this->collMlquestions = $collMlquestions;
                $this->collMlquestionsPartial = false;
            }
        }

        return $this->collMlquestions;
    }

    /**
     * Sets a collection of Mlquestion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mlquestions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setMlquestions(PropelCollection $mlquestions, PropelPDO $con = null)
    {
        $mlquestionsToDelete = $this->getMlquestions(new Criteria(), $con)->diff($mlquestions);


        $this->mlquestionsScheduledForDeletion = $mlquestionsToDelete;

        foreach ($mlquestionsToDelete as $mlquestionRemoved) {
            $mlquestionRemoved->setUser(null);
        }

        $this->collMlquestions = null;
        foreach ($mlquestions as $mlquestion) {
            $this->addMlquestion($mlquestion);
        }

        $this->collMlquestions = $mlquestions;
        $this->collMlquestionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Mlquestion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Mlquestion objects.
     * @throws PropelException
     */
    public function countMlquestions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMlquestionsPartial && !$this->isNew();
        if (null === $this->collMlquestions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMlquestions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMlquestions());
            }
            $query = MlquestionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collMlquestions);
    }

    /**
     * Method called to associate a Mlquestion object to this object
     * through the Mlquestion foreign key attribute.
     *
     * @param    Mlquestion $l Mlquestion
     * @return User The current object (for fluent API support)
     */
    public function addMlquestion(Mlquestion $l)
    {
        if ($this->collMlquestions === null) {
            $this->initMlquestions();
            $this->collMlquestionsPartial = true;
        }

        if (!in_array($l, $this->collMlquestions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMlquestion($l);

            if ($this->mlquestionsScheduledForDeletion and $this->mlquestionsScheduledForDeletion->contains($l)) {
                $this->mlquestionsScheduledForDeletion->remove($this->mlquestionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Mlquestion $mlquestion The mlquestion object to add.
     */
    protected function doAddMlquestion($mlquestion)
    {
        $this->collMlquestions[]= $mlquestion;
        $mlquestion->setUser($this);
    }

    /**
     * @param	Mlquestion $mlquestion The mlquestion object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeMlquestion($mlquestion)
    {
        if ($this->getMlquestions()->contains($mlquestion)) {
            $this->collMlquestions->remove($this->collMlquestions->search($mlquestion));
            if (null === $this->mlquestionsScheduledForDeletion) {
                $this->mlquestionsScheduledForDeletion = clone $this->collMlquestions;
                $this->mlquestionsScheduledForDeletion->clear();
            }
            $this->mlquestionsScheduledForDeletion[]= clone $mlquestion;
            $mlquestion->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Mlquestions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Mlquestion[] List of Mlquestion objects
     */
    public function getMlquestionsJoinMlitem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MlquestionQuery::create(null, $criteria);
        $query->joinWith('Mlitem', $join_behavior);

        return $this->getMlquestions($query, $con);
    }

    /**
     * Clears out the collOrderconflictComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addOrderconflictComments()
     */
    public function clearOrderconflictComments()
    {
        $this->collOrderconflictComments = null; // important to set this to null since that means it is uninitialized
        $this->collOrderconflictCommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collOrderconflictComments collection loaded partially
     *
     * @return void
     */
    public function resetPartialOrderconflictComments($v = true)
    {
        $this->collOrderconflictCommentsPartial = $v;
    }

    /**
     * Initializes the collOrderconflictComments collection.
     *
     * By default this just sets the collOrderconflictComments collection to an empty array (like clearcollOrderconflictComments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOrderconflictComments($overrideExisting = true)
    {
        if (null !== $this->collOrderconflictComments && !$overrideExisting) {
            return;
        }
        $this->collOrderconflictComments = new PropelObjectCollection();
        $this->collOrderconflictComments->setModel('OrderconflictComment');
    }

    /**
     * Gets an array of OrderconflictComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|OrderconflictComment[] List of OrderconflictComment objects
     * @throws PropelException
     */
    public function getOrderconflictComments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOrderconflictCommentsPartial && !$this->isNew();
        if (null === $this->collOrderconflictComments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOrderconflictComments) {
                // return empty collection
                $this->initOrderconflictComments();
            } else {
                $collOrderconflictComments = OrderconflictCommentQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOrderconflictCommentsPartial && count($collOrderconflictComments)) {
                      $this->initOrderconflictComments(false);

                      foreach ($collOrderconflictComments as $obj) {
                        if (false == $this->collOrderconflictComments->contains($obj)) {
                          $this->collOrderconflictComments->append($obj);
                        }
                      }

                      $this->collOrderconflictCommentsPartial = true;
                    }

                    $collOrderconflictComments->getInternalIterator()->rewind();

                    return $collOrderconflictComments;
                }

                if ($partial && $this->collOrderconflictComments) {
                    foreach ($this->collOrderconflictComments as $obj) {
                        if ($obj->isNew()) {
                            $collOrderconflictComments[] = $obj;
                        }
                    }
                }

                $this->collOrderconflictComments = $collOrderconflictComments;
                $this->collOrderconflictCommentsPartial = false;
            }
        }

        return $this->collOrderconflictComments;
    }

    /**
     * Sets a collection of OrderconflictComment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $orderconflictComments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setOrderconflictComments(PropelCollection $orderconflictComments, PropelPDO $con = null)
    {
        $orderconflictCommentsToDelete = $this->getOrderconflictComments(new Criteria(), $con)->diff($orderconflictComments);


        $this->orderconflictCommentsScheduledForDeletion = $orderconflictCommentsToDelete;

        foreach ($orderconflictCommentsToDelete as $orderconflictCommentRemoved) {
            $orderconflictCommentRemoved->setUser(null);
        }

        $this->collOrderconflictComments = null;
        foreach ($orderconflictComments as $orderconflictComment) {
            $this->addOrderconflictComment($orderconflictComment);
        }

        $this->collOrderconflictComments = $orderconflictComments;
        $this->collOrderconflictCommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related OrderconflictComment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related OrderconflictComment objects.
     * @throws PropelException
     */
    public function countOrderconflictComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOrderconflictCommentsPartial && !$this->isNew();
        if (null === $this->collOrderconflictComments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOrderconflictComments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOrderconflictComments());
            }
            $query = OrderconflictCommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collOrderconflictComments);
    }

    /**
     * Method called to associate a OrderconflictComment object to this object
     * through the OrderconflictComment foreign key attribute.
     *
     * @param    OrderconflictComment $l OrderconflictComment
     * @return User The current object (for fluent API support)
     */
    public function addOrderconflictComment(OrderconflictComment $l)
    {
        if ($this->collOrderconflictComments === null) {
            $this->initOrderconflictComments();
            $this->collOrderconflictCommentsPartial = true;
        }

        if (!in_array($l, $this->collOrderconflictComments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOrderconflictComment($l);

            if ($this->orderconflictCommentsScheduledForDeletion and $this->orderconflictCommentsScheduledForDeletion->contains($l)) {
                $this->orderconflictCommentsScheduledForDeletion->remove($this->orderconflictCommentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	OrderconflictComment $orderconflictComment The orderconflictComment object to add.
     */
    protected function doAddOrderconflictComment($orderconflictComment)
    {
        $this->collOrderconflictComments[]= $orderconflictComment;
        $orderconflictComment->setUser($this);
    }

    /**
     * @param	OrderconflictComment $orderconflictComment The orderconflictComment object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeOrderconflictComment($orderconflictComment)
    {
        if ($this->getOrderconflictComments()->contains($orderconflictComment)) {
            $this->collOrderconflictComments->remove($this->collOrderconflictComments->search($orderconflictComment));
            if (null === $this->orderconflictCommentsScheduledForDeletion) {
                $this->orderconflictCommentsScheduledForDeletion = clone $this->collOrderconflictComments;
                $this->orderconflictCommentsScheduledForDeletion->clear();
            }
            $this->orderconflictCommentsScheduledForDeletion[]= clone $orderconflictComment;
            $orderconflictComment->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related OrderconflictComments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|OrderconflictComment[] List of OrderconflictComment objects
     */
    public function getOrderconflictCommentsJoinOrderconflict($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = OrderconflictCommentQuery::create(null, $criteria);
        $query->joinWith('Orderconflict', $join_behavior);

        return $this->getOrderconflictComments($query, $con);
    }

    /**
     * Clears out the collProductionordercomments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addProductionordercomments()
     */
    public function clearProductionordercomments()
    {
        $this->collProductionordercomments = null; // important to set this to null since that means it is uninitialized
        $this->collProductionordercommentsPartial = null;

        return $this;
    }

    /**
     * reset is the collProductionordercomments collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductionordercomments($v = true)
    {
        $this->collProductionordercommentsPartial = $v;
    }

    /**
     * Initializes the collProductionordercomments collection.
     *
     * By default this just sets the collProductionordercomments collection to an empty array (like clearcollProductionordercomments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductionordercomments($overrideExisting = true)
    {
        if (null !== $this->collProductionordercomments && !$overrideExisting) {
            return;
        }
        $this->collProductionordercomments = new PropelObjectCollection();
        $this->collProductionordercomments->setModel('Productionordercomment');
    }

    /**
     * Gets an array of Productionordercomment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productionordercomment[] List of Productionordercomment objects
     * @throws PropelException
     */
    public function getProductionordercomments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductionordercommentsPartial && !$this->isNew();
        if (null === $this->collProductionordercomments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductionordercomments) {
                // return empty collection
                $this->initProductionordercomments();
            } else {
                $collProductionordercomments = ProductionordercommentQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductionordercommentsPartial && count($collProductionordercomments)) {
                      $this->initProductionordercomments(false);

                      foreach ($collProductionordercomments as $obj) {
                        if (false == $this->collProductionordercomments->contains($obj)) {
                          $this->collProductionordercomments->append($obj);
                        }
                      }

                      $this->collProductionordercommentsPartial = true;
                    }

                    $collProductionordercomments->getInternalIterator()->rewind();

                    return $collProductionordercomments;
                }

                if ($partial && $this->collProductionordercomments) {
                    foreach ($this->collProductionordercomments as $obj) {
                        if ($obj->isNew()) {
                            $collProductionordercomments[] = $obj;
                        }
                    }
                }

                $this->collProductionordercomments = $collProductionordercomments;
                $this->collProductionordercommentsPartial = false;
            }
        }

        return $this->collProductionordercomments;
    }

    /**
     * Sets a collection of Productionordercomment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productionordercomments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setProductionordercomments(PropelCollection $productionordercomments, PropelPDO $con = null)
    {
        $productionordercommentsToDelete = $this->getProductionordercomments(new Criteria(), $con)->diff($productionordercomments);


        $this->productionordercommentsScheduledForDeletion = $productionordercommentsToDelete;

        foreach ($productionordercommentsToDelete as $productionordercommentRemoved) {
            $productionordercommentRemoved->setUser(null);
        }

        $this->collProductionordercomments = null;
        foreach ($productionordercomments as $productionordercomment) {
            $this->addProductionordercomment($productionordercomment);
        }

        $this->collProductionordercomments = $productionordercomments;
        $this->collProductionordercommentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productionordercomment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productionordercomment objects.
     * @throws PropelException
     */
    public function countProductionordercomments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductionordercommentsPartial && !$this->isNew();
        if (null === $this->collProductionordercomments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductionordercomments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductionordercomments());
            }
            $query = ProductionordercommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProductionordercomments);
    }

    /**
     * Method called to associate a Productionordercomment object to this object
     * through the Productionordercomment foreign key attribute.
     *
     * @param    Productionordercomment $l Productionordercomment
     * @return User The current object (for fluent API support)
     */
    public function addProductionordercomment(Productionordercomment $l)
    {
        if ($this->collProductionordercomments === null) {
            $this->initProductionordercomments();
            $this->collProductionordercommentsPartial = true;
        }

        if (!in_array($l, $this->collProductionordercomments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductionordercomment($l);

            if ($this->productionordercommentsScheduledForDeletion and $this->productionordercommentsScheduledForDeletion->contains($l)) {
                $this->productionordercommentsScheduledForDeletion->remove($this->productionordercommentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productionordercomment $productionordercomment The productionordercomment object to add.
     */
    protected function doAddProductionordercomment($productionordercomment)
    {
        $this->collProductionordercomments[]= $productionordercomment;
        $productionordercomment->setUser($this);
    }

    /**
     * @param	Productionordercomment $productionordercomment The productionordercomment object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeProductionordercomment($productionordercomment)
    {
        if ($this->getProductionordercomments()->contains($productionordercomment)) {
            $this->collProductionordercomments->remove($this->collProductionordercomments->search($productionordercomment));
            if (null === $this->productionordercommentsScheduledForDeletion) {
                $this->productionordercommentsScheduledForDeletion = clone $this->collProductionordercomments;
                $this->productionordercommentsScheduledForDeletion->clear();
            }
            $this->productionordercommentsScheduledForDeletion[]= clone $productionordercomment;
            $productionordercomment->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Productionordercomments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionordercomment[] List of Productionordercomment objects
     */
    public function getProductionordercommentsJoinProductionorderitem($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionordercommentQuery::create(null, $criteria);
        $query->joinWith('Productionorderitem', $join_behavior);

        return $this->getProductionordercomments($query, $con);
    }

    /**
     * Clears out the collProductionusers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addProductionusers()
     */
    public function clearProductionusers()
    {
        $this->collProductionusers = null; // important to set this to null since that means it is uninitialized
        $this->collProductionusersPartial = null;

        return $this;
    }

    /**
     * reset is the collProductionusers collection loaded partially
     *
     * @return void
     */
    public function resetPartialProductionusers($v = true)
    {
        $this->collProductionusersPartial = $v;
    }

    /**
     * Initializes the collProductionusers collection.
     *
     * By default this just sets the collProductionusers collection to an empty array (like clearcollProductionusers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProductionusers($overrideExisting = true)
    {
        if (null !== $this->collProductionusers && !$overrideExisting) {
            return;
        }
        $this->collProductionusers = new PropelObjectCollection();
        $this->collProductionusers->setModel('Productionuser');
    }

    /**
     * Gets an array of Productionuser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Productionuser[] List of Productionuser objects
     * @throws PropelException
     */
    public function getProductionusers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProductionusersPartial && !$this->isNew();
        if (null === $this->collProductionusers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProductionusers) {
                // return empty collection
                $this->initProductionusers();
            } else {
                $collProductionusers = ProductionuserQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProductionusersPartial && count($collProductionusers)) {
                      $this->initProductionusers(false);

                      foreach ($collProductionusers as $obj) {
                        if (false == $this->collProductionusers->contains($obj)) {
                          $this->collProductionusers->append($obj);
                        }
                      }

                      $this->collProductionusersPartial = true;
                    }

                    $collProductionusers->getInternalIterator()->rewind();

                    return $collProductionusers;
                }

                if ($partial && $this->collProductionusers) {
                    foreach ($this->collProductionusers as $obj) {
                        if ($obj->isNew()) {
                            $collProductionusers[] = $obj;
                        }
                    }
                }

                $this->collProductionusers = $collProductionusers;
                $this->collProductionusersPartial = false;
            }
        }

        return $this->collProductionusers;
    }

    /**
     * Sets a collection of Productionuser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $productionusers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setProductionusers(PropelCollection $productionusers, PropelPDO $con = null)
    {
        $productionusersToDelete = $this->getProductionusers(new Criteria(), $con)->diff($productionusers);


        $this->productionusersScheduledForDeletion = $productionusersToDelete;

        foreach ($productionusersToDelete as $productionuserRemoved) {
            $productionuserRemoved->setUser(null);
        }

        $this->collProductionusers = null;
        foreach ($productionusers as $productionuser) {
            $this->addProductionuser($productionuser);
        }

        $this->collProductionusers = $productionusers;
        $this->collProductionusersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Productionuser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Productionuser objects.
     * @throws PropelException
     */
    public function countProductionusers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProductionusersPartial && !$this->isNew();
        if (null === $this->collProductionusers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProductionusers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProductionusers());
            }
            $query = ProductionuserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProductionusers);
    }

    /**
     * Method called to associate a Productionuser object to this object
     * through the Productionuser foreign key attribute.
     *
     * @param    Productionuser $l Productionuser
     * @return User The current object (for fluent API support)
     */
    public function addProductionuser(Productionuser $l)
    {
        if ($this->collProductionusers === null) {
            $this->initProductionusers();
            $this->collProductionusersPartial = true;
        }

        if (!in_array($l, $this->collProductionusers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProductionuser($l);

            if ($this->productionusersScheduledForDeletion and $this->productionusersScheduledForDeletion->contains($l)) {
                $this->productionusersScheduledForDeletion->remove($this->productionusersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Productionuser $productionuser The productionuser object to add.
     */
    protected function doAddProductionuser($productionuser)
    {
        $this->collProductionusers[]= $productionuser;
        $productionuser->setUser($this);
    }

    /**
     * @param	Productionuser $productionuser The productionuser object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeProductionuser($productionuser)
    {
        if ($this->getProductionusers()->contains($productionuser)) {
            $this->collProductionusers->remove($this->collProductionusers->search($productionuser));
            if (null === $this->productionusersScheduledForDeletion) {
                $this->productionusersScheduledForDeletion = clone $this->collProductionusers;
                $this->productionusersScheduledForDeletion->clear();
            }
            $this->productionusersScheduledForDeletion[]= clone $productionuser;
            $productionuser->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Productionusers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Productionuser[] List of Productionuser objects
     */
    public function getProductionusersJoinProductionteam($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProductionuserQuery::create(null, $criteria);
        $query->joinWith('Productionteam', $join_behavior);

        return $this->getProductionusers($query, $con);
    }

    /**
     * Clears out the collProjectactivityposts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addProjectactivityposts()
     */
    public function clearProjectactivityposts()
    {
        $this->collProjectactivityposts = null; // important to set this to null since that means it is uninitialized
        $this->collProjectactivitypostsPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectactivityposts collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectactivityposts($v = true)
    {
        $this->collProjectactivitypostsPartial = $v;
    }

    /**
     * Initializes the collProjectactivityposts collection.
     *
     * By default this just sets the collProjectactivityposts collection to an empty array (like clearcollProjectactivityposts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectactivityposts($overrideExisting = true)
    {
        if (null !== $this->collProjectactivityposts && !$overrideExisting) {
            return;
        }
        $this->collProjectactivityposts = new PropelObjectCollection();
        $this->collProjectactivityposts->setModel('Projectactivitypost');
    }

    /**
     * Gets an array of Projectactivitypost objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Projectactivitypost[] List of Projectactivitypost objects
     * @throws PropelException
     */
    public function getProjectactivityposts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitypostsPartial && !$this->isNew();
        if (null === $this->collProjectactivityposts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityposts) {
                // return empty collection
                $this->initProjectactivityposts();
            } else {
                $collProjectactivityposts = ProjectactivitypostQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectactivitypostsPartial && count($collProjectactivityposts)) {
                      $this->initProjectactivityposts(false);

                      foreach ($collProjectactivityposts as $obj) {
                        if (false == $this->collProjectactivityposts->contains($obj)) {
                          $this->collProjectactivityposts->append($obj);
                        }
                      }

                      $this->collProjectactivitypostsPartial = true;
                    }

                    $collProjectactivityposts->getInternalIterator()->rewind();

                    return $collProjectactivityposts;
                }

                if ($partial && $this->collProjectactivityposts) {
                    foreach ($this->collProjectactivityposts as $obj) {
                        if ($obj->isNew()) {
                            $collProjectactivityposts[] = $obj;
                        }
                    }
                }

                $this->collProjectactivityposts = $collProjectactivityposts;
                $this->collProjectactivitypostsPartial = false;
            }
        }

        return $this->collProjectactivityposts;
    }

    /**
     * Sets a collection of Projectactivitypost objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectactivityposts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setProjectactivityposts(PropelCollection $projectactivityposts, PropelPDO $con = null)
    {
        $projectactivitypostsToDelete = $this->getProjectactivityposts(new Criteria(), $con)->diff($projectactivityposts);


        $this->projectactivitypostsScheduledForDeletion = $projectactivitypostsToDelete;

        foreach ($projectactivitypostsToDelete as $projectactivitypostRemoved) {
            $projectactivitypostRemoved->setUser(null);
        }

        $this->collProjectactivityposts = null;
        foreach ($projectactivityposts as $projectactivitypost) {
            $this->addProjectactivitypost($projectactivitypost);
        }

        $this->collProjectactivityposts = $projectactivityposts;
        $this->collProjectactivitypostsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projectactivitypost objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Projectactivitypost objects.
     * @throws PropelException
     */
    public function countProjectactivityposts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivitypostsPartial && !$this->isNew();
        if (null === $this->collProjectactivityposts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityposts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectactivityposts());
            }
            $query = ProjectactivitypostQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProjectactivityposts);
    }

    /**
     * Method called to associate a Projectactivitypost object to this object
     * through the Projectactivitypost foreign key attribute.
     *
     * @param    Projectactivitypost $l Projectactivitypost
     * @return User The current object (for fluent API support)
     */
    public function addProjectactivitypost(Projectactivitypost $l)
    {
        if ($this->collProjectactivityposts === null) {
            $this->initProjectactivityposts();
            $this->collProjectactivitypostsPartial = true;
        }

        if (!in_array($l, $this->collProjectactivityposts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectactivitypost($l);

            if ($this->projectactivitypostsScheduledForDeletion and $this->projectactivitypostsScheduledForDeletion->contains($l)) {
                $this->projectactivitypostsScheduledForDeletion->remove($this->projectactivitypostsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Projectactivitypost $projectactivitypost The projectactivitypost object to add.
     */
    protected function doAddProjectactivitypost($projectactivitypost)
    {
        $this->collProjectactivityposts[]= $projectactivitypost;
        $projectactivitypost->setUser($this);
    }

    /**
     * @param	Projectactivitypost $projectactivitypost The projectactivitypost object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeProjectactivitypost($projectactivitypost)
    {
        if ($this->getProjectactivityposts()->contains($projectactivitypost)) {
            $this->collProjectactivityposts->remove($this->collProjectactivityposts->search($projectactivitypost));
            if (null === $this->projectactivitypostsScheduledForDeletion) {
                $this->projectactivitypostsScheduledForDeletion = clone $this->collProjectactivityposts;
                $this->projectactivitypostsScheduledForDeletion->clear();
            }
            $this->projectactivitypostsScheduledForDeletion[]= clone $projectactivitypost;
            $projectactivitypost->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Projectactivityposts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Projectactivitypost[] List of Projectactivitypost objects
     */
    public function getProjectactivitypostsJoinProjectactivity($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectactivitypostQuery::create(null, $criteria);
        $query->joinWith('Projectactivity', $join_behavior);

        return $this->getProjectactivityposts($query, $con);
    }

    /**
     * Clears out the collProjectactivityusers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addProjectactivityusers()
     */
    public function clearProjectactivityusers()
    {
        $this->collProjectactivityusers = null; // important to set this to null since that means it is uninitialized
        $this->collProjectactivityusersPartial = null;

        return $this;
    }

    /**
     * reset is the collProjectactivityusers collection loaded partially
     *
     * @return void
     */
    public function resetPartialProjectactivityusers($v = true)
    {
        $this->collProjectactivityusersPartial = $v;
    }

    /**
     * Initializes the collProjectactivityusers collection.
     *
     * By default this just sets the collProjectactivityusers collection to an empty array (like clearcollProjectactivityusers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectactivityusers($overrideExisting = true)
    {
        if (null !== $this->collProjectactivityusers && !$overrideExisting) {
            return;
        }
        $this->collProjectactivityusers = new PropelObjectCollection();
        $this->collProjectactivityusers->setModel('Projectactivityuser');
    }

    /**
     * Gets an array of Projectactivityuser objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Projectactivityuser[] List of Projectactivityuser objects
     * @throws PropelException
     */
    public function getProjectactivityusers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivityusersPartial && !$this->isNew();
        if (null === $this->collProjectactivityusers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityusers) {
                // return empty collection
                $this->initProjectactivityusers();
            } else {
                $collProjectactivityusers = ProjectactivityuserQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProjectactivityusersPartial && count($collProjectactivityusers)) {
                      $this->initProjectactivityusers(false);

                      foreach ($collProjectactivityusers as $obj) {
                        if (false == $this->collProjectactivityusers->contains($obj)) {
                          $this->collProjectactivityusers->append($obj);
                        }
                      }

                      $this->collProjectactivityusersPartial = true;
                    }

                    $collProjectactivityusers->getInternalIterator()->rewind();

                    return $collProjectactivityusers;
                }

                if ($partial && $this->collProjectactivityusers) {
                    foreach ($this->collProjectactivityusers as $obj) {
                        if ($obj->isNew()) {
                            $collProjectactivityusers[] = $obj;
                        }
                    }
                }

                $this->collProjectactivityusers = $collProjectactivityusers;
                $this->collProjectactivityusersPartial = false;
            }
        }

        return $this->collProjectactivityusers;
    }

    /**
     * Sets a collection of Projectactivityuser objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $projectactivityusers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setProjectactivityusers(PropelCollection $projectactivityusers, PropelPDO $con = null)
    {
        $projectactivityusersToDelete = $this->getProjectactivityusers(new Criteria(), $con)->diff($projectactivityusers);


        $this->projectactivityusersScheduledForDeletion = $projectactivityusersToDelete;

        foreach ($projectactivityusersToDelete as $projectactivityuserRemoved) {
            $projectactivityuserRemoved->setUser(null);
        }

        $this->collProjectactivityusers = null;
        foreach ($projectactivityusers as $projectactivityuser) {
            $this->addProjectactivityuser($projectactivityuser);
        }

        $this->collProjectactivityusers = $projectactivityusers;
        $this->collProjectactivityusersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projectactivityuser objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Projectactivityuser objects.
     * @throws PropelException
     */
    public function countProjectactivityusers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProjectactivityusersPartial && !$this->isNew();
        if (null === $this->collProjectactivityusers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectactivityusers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectactivityusers());
            }
            $query = ProjectactivityuserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collProjectactivityusers);
    }

    /**
     * Method called to associate a Projectactivityuser object to this object
     * through the Projectactivityuser foreign key attribute.
     *
     * @param    Projectactivityuser $l Projectactivityuser
     * @return User The current object (for fluent API support)
     */
    public function addProjectactivityuser(Projectactivityuser $l)
    {
        if ($this->collProjectactivityusers === null) {
            $this->initProjectactivityusers();
            $this->collProjectactivityusersPartial = true;
        }

        if (!in_array($l, $this->collProjectactivityusers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProjectactivityuser($l);

            if ($this->projectactivityusersScheduledForDeletion and $this->projectactivityusersScheduledForDeletion->contains($l)) {
                $this->projectactivityusersScheduledForDeletion->remove($this->projectactivityusersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Projectactivityuser $projectactivityuser The projectactivityuser object to add.
     */
    protected function doAddProjectactivityuser($projectactivityuser)
    {
        $this->collProjectactivityusers[]= $projectactivityuser;
        $projectactivityuser->setUser($this);
    }

    /**
     * @param	Projectactivityuser $projectactivityuser The projectactivityuser object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeProjectactivityuser($projectactivityuser)
    {
        if ($this->getProjectactivityusers()->contains($projectactivityuser)) {
            $this->collProjectactivityusers->remove($this->collProjectactivityusers->search($projectactivityuser));
            if (null === $this->projectactivityusersScheduledForDeletion) {
                $this->projectactivityusersScheduledForDeletion = clone $this->collProjectactivityusers;
                $this->projectactivityusersScheduledForDeletion->clear();
            }
            $this->projectactivityusersScheduledForDeletion[]= clone $projectactivityuser;
            $projectactivityuser->setUser(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this User is new, it will return
     * an empty collection; or if this User has previously
     * been saved, it will retrieve related Projectactivityusers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in User.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Projectactivityuser[] List of Projectactivityuser objects
     */
    public function getProjectactivityusersJoinProjectactivity($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProjectactivityuserQuery::create(null, $criteria);
        $query->joinWith('Projectactivity', $join_behavior);

        return $this->getProjectactivityusers($query, $con);
    }

    /**
     * Clears out the collStaffs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addStaffs()
     */
    public function clearStaffs()
    {
        $this->collStaffs = null; // important to set this to null since that means it is uninitialized
        $this->collStaffsPartial = null;

        return $this;
    }

    /**
     * reset is the collStaffs collection loaded partially
     *
     * @return void
     */
    public function resetPartialStaffs($v = true)
    {
        $this->collStaffsPartial = $v;
    }

    /**
     * Initializes the collStaffs collection.
     *
     * By default this just sets the collStaffs collection to an empty array (like clearcollStaffs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStaffs($overrideExisting = true)
    {
        if (null !== $this->collStaffs && !$overrideExisting) {
            return;
        }
        $this->collStaffs = new PropelObjectCollection();
        $this->collStaffs->setModel('Staff');
    }

    /**
     * Gets an array of Staff objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Staff[] List of Staff objects
     * @throws PropelException
     */
    public function getStaffs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStaffsPartial && !$this->isNew();
        if (null === $this->collStaffs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStaffs) {
                // return empty collection
                $this->initStaffs();
            } else {
                $collStaffs = StaffQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStaffsPartial && count($collStaffs)) {
                      $this->initStaffs(false);

                      foreach ($collStaffs as $obj) {
                        if (false == $this->collStaffs->contains($obj)) {
                          $this->collStaffs->append($obj);
                        }
                      }

                      $this->collStaffsPartial = true;
                    }

                    $collStaffs->getInternalIterator()->rewind();

                    return $collStaffs;
                }

                if ($partial && $this->collStaffs) {
                    foreach ($this->collStaffs as $obj) {
                        if ($obj->isNew()) {
                            $collStaffs[] = $obj;
                        }
                    }
                }

                $this->collStaffs = $collStaffs;
                $this->collStaffsPartial = false;
            }
        }

        return $this->collStaffs;
    }

    /**
     * Sets a collection of Staff objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $staffs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setStaffs(PropelCollection $staffs, PropelPDO $con = null)
    {
        $staffsToDelete = $this->getStaffs(new Criteria(), $con)->diff($staffs);


        $this->staffsScheduledForDeletion = $staffsToDelete;

        foreach ($staffsToDelete as $staffRemoved) {
            $staffRemoved->setUser(null);
        }

        $this->collStaffs = null;
        foreach ($staffs as $staff) {
            $this->addStaff($staff);
        }

        $this->collStaffs = $staffs;
        $this->collStaffsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Staff objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Staff objects.
     * @throws PropelException
     */
    public function countStaffs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStaffsPartial && !$this->isNew();
        if (null === $this->collStaffs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStaffs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getStaffs());
            }
            $query = StaffQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collStaffs);
    }

    /**
     * Method called to associate a Staff object to this object
     * through the Staff foreign key attribute.
     *
     * @param    Staff $l Staff
     * @return User The current object (for fluent API support)
     */
    public function addStaff(Staff $l)
    {
        if ($this->collStaffs === null) {
            $this->initStaffs();
            $this->collStaffsPartial = true;
        }

        if (!in_array($l, $this->collStaffs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStaff($l);

            if ($this->staffsScheduledForDeletion and $this->staffsScheduledForDeletion->contains($l)) {
                $this->staffsScheduledForDeletion->remove($this->staffsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Staff $staff The staff object to add.
     */
    protected function doAddStaff($staff)
    {
        $this->collStaffs[]= $staff;
        $staff->setUser($this);
    }

    /**
     * @param	Staff $staff The staff object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeStaff($staff)
    {
        if ($this->getStaffs()->contains($staff)) {
            $this->collStaffs->remove($this->collStaffs->search($staff));
            if (null === $this->staffsScheduledForDeletion) {
                $this->staffsScheduledForDeletion = clone $this->collStaffs;
                $this->staffsScheduledForDeletion->clear();
            }
            $this->staffsScheduledForDeletion[]= clone $staff;
            $staff->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collTokens collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addTokens()
     */
    public function clearTokens()
    {
        $this->collTokens = null; // important to set this to null since that means it is uninitialized
        $this->collTokensPartial = null;

        return $this;
    }

    /**
     * reset is the collTokens collection loaded partially
     *
     * @return void
     */
    public function resetPartialTokens($v = true)
    {
        $this->collTokensPartial = $v;
    }

    /**
     * Initializes the collTokens collection.
     *
     * By default this just sets the collTokens collection to an empty array (like clearcollTokens());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTokens($overrideExisting = true)
    {
        if (null !== $this->collTokens && !$overrideExisting) {
            return;
        }
        $this->collTokens = new PropelObjectCollection();
        $this->collTokens->setModel('Token');
    }

    /**
     * Gets an array of Token objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Token[] List of Token objects
     * @throws PropelException
     */
    public function getTokens($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTokensPartial && !$this->isNew();
        if (null === $this->collTokens || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTokens) {
                // return empty collection
                $this->initTokens();
            } else {
                $collTokens = TokenQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTokensPartial && count($collTokens)) {
                      $this->initTokens(false);

                      foreach ($collTokens as $obj) {
                        if (false == $this->collTokens->contains($obj)) {
                          $this->collTokens->append($obj);
                        }
                      }

                      $this->collTokensPartial = true;
                    }

                    $collTokens->getInternalIterator()->rewind();

                    return $collTokens;
                }

                if ($partial && $this->collTokens) {
                    foreach ($this->collTokens as $obj) {
                        if ($obj->isNew()) {
                            $collTokens[] = $obj;
                        }
                    }
                }

                $this->collTokens = $collTokens;
                $this->collTokensPartial = false;
            }
        }

        return $this->collTokens;
    }

    /**
     * Sets a collection of Token objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tokens A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setTokens(PropelCollection $tokens, PropelPDO $con = null)
    {
        $tokensToDelete = $this->getTokens(new Criteria(), $con)->diff($tokens);


        $this->tokensScheduledForDeletion = $tokensToDelete;

        foreach ($tokensToDelete as $tokenRemoved) {
            $tokenRemoved->setUser(null);
        }

        $this->collTokens = null;
        foreach ($tokens as $token) {
            $this->addToken($token);
        }

        $this->collTokens = $tokens;
        $this->collTokensPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Token objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Token objects.
     * @throws PropelException
     */
    public function countTokens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTokensPartial && !$this->isNew();
        if (null === $this->collTokens || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTokens) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTokens());
            }
            $query = TokenQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collTokens);
    }

    /**
     * Method called to associate a Token object to this object
     * through the Token foreign key attribute.
     *
     * @param    Token $l Token
     * @return User The current object (for fluent API support)
     */
    public function addToken(Token $l)
    {
        if ($this->collTokens === null) {
            $this->initTokens();
            $this->collTokensPartial = true;
        }

        if (!in_array($l, $this->collTokens->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddToken($l);

            if ($this->tokensScheduledForDeletion and $this->tokensScheduledForDeletion->contains($l)) {
                $this->tokensScheduledForDeletion->remove($this->tokensScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Token $token The token object to add.
     */
    protected function doAddToken($token)
    {
        $this->collTokens[]= $token;
        $token->setUser($this);
    }

    /**
     * @param	Token $token The token object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeToken($token)
    {
        if ($this->getTokens()->contains($token)) {
            $this->collTokens->remove($this->collTokens->search($token));
            if (null === $this->tokensScheduledForDeletion) {
                $this->tokensScheduledForDeletion = clone $this->collTokens;
                $this->tokensScheduledForDeletion->clear();
            }
            $this->tokensScheduledForDeletion[]= clone $token;
            $token->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collUseraccesslogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUseraccesslogs()
     */
    public function clearUseraccesslogs()
    {
        $this->collUseraccesslogs = null; // important to set this to null since that means it is uninitialized
        $this->collUseraccesslogsPartial = null;

        return $this;
    }

    /**
     * reset is the collUseraccesslogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialUseraccesslogs($v = true)
    {
        $this->collUseraccesslogsPartial = $v;
    }

    /**
     * Initializes the collUseraccesslogs collection.
     *
     * By default this just sets the collUseraccesslogs collection to an empty array (like clearcollUseraccesslogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUseraccesslogs($overrideExisting = true)
    {
        if (null !== $this->collUseraccesslogs && !$overrideExisting) {
            return;
        }
        $this->collUseraccesslogs = new PropelObjectCollection();
        $this->collUseraccesslogs->setModel('Useraccesslog');
    }

    /**
     * Gets an array of Useraccesslog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Useraccesslog[] List of Useraccesslog objects
     * @throws PropelException
     */
    public function getUseraccesslogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUseraccesslogsPartial && !$this->isNew();
        if (null === $this->collUseraccesslogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUseraccesslogs) {
                // return empty collection
                $this->initUseraccesslogs();
            } else {
                $collUseraccesslogs = UseraccesslogQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUseraccesslogsPartial && count($collUseraccesslogs)) {
                      $this->initUseraccesslogs(false);

                      foreach ($collUseraccesslogs as $obj) {
                        if (false == $this->collUseraccesslogs->contains($obj)) {
                          $this->collUseraccesslogs->append($obj);
                        }
                      }

                      $this->collUseraccesslogsPartial = true;
                    }

                    $collUseraccesslogs->getInternalIterator()->rewind();

                    return $collUseraccesslogs;
                }

                if ($partial && $this->collUseraccesslogs) {
                    foreach ($this->collUseraccesslogs as $obj) {
                        if ($obj->isNew()) {
                            $collUseraccesslogs[] = $obj;
                        }
                    }
                }

                $this->collUseraccesslogs = $collUseraccesslogs;
                $this->collUseraccesslogsPartial = false;
            }
        }

        return $this->collUseraccesslogs;
    }

    /**
     * Sets a collection of Useraccesslog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $useraccesslogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setUseraccesslogs(PropelCollection $useraccesslogs, PropelPDO $con = null)
    {
        $useraccesslogsToDelete = $this->getUseraccesslogs(new Criteria(), $con)->diff($useraccesslogs);


        $this->useraccesslogsScheduledForDeletion = $useraccesslogsToDelete;

        foreach ($useraccesslogsToDelete as $useraccesslogRemoved) {
            $useraccesslogRemoved->setUser(null);
        }

        $this->collUseraccesslogs = null;
        foreach ($useraccesslogs as $useraccesslog) {
            $this->addUseraccesslog($useraccesslog);
        }

        $this->collUseraccesslogs = $useraccesslogs;
        $this->collUseraccesslogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Useraccesslog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Useraccesslog objects.
     * @throws PropelException
     */
    public function countUseraccesslogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUseraccesslogsPartial && !$this->isNew();
        if (null === $this->collUseraccesslogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUseraccesslogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUseraccesslogs());
            }
            $query = UseraccesslogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collUseraccesslogs);
    }

    /**
     * Method called to associate a Useraccesslog object to this object
     * through the Useraccesslog foreign key attribute.
     *
     * @param    Useraccesslog $l Useraccesslog
     * @return User The current object (for fluent API support)
     */
    public function addUseraccesslog(Useraccesslog $l)
    {
        if ($this->collUseraccesslogs === null) {
            $this->initUseraccesslogs();
            $this->collUseraccesslogsPartial = true;
        }

        if (!in_array($l, $this->collUseraccesslogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUseraccesslog($l);

            if ($this->useraccesslogsScheduledForDeletion and $this->useraccesslogsScheduledForDeletion->contains($l)) {
                $this->useraccesslogsScheduledForDeletion->remove($this->useraccesslogsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Useraccesslog $useraccesslog The useraccesslog object to add.
     */
    protected function doAddUseraccesslog($useraccesslog)
    {
        $this->collUseraccesslogs[]= $useraccesslog;
        $useraccesslog->setUser($this);
    }

    /**
     * @param	Useraccesslog $useraccesslog The useraccesslog object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUseraccesslog($useraccesslog)
    {
        if ($this->getUseraccesslogs()->contains($useraccesslog)) {
            $this->collUseraccesslogs->remove($this->collUseraccesslogs->search($useraccesslog));
            if (null === $this->useraccesslogsScheduledForDeletion) {
                $this->useraccesslogsScheduledForDeletion = clone $this->collUseraccesslogs;
                $this->useraccesslogsScheduledForDeletion->clear();
            }
            $this->useraccesslogsScheduledForDeletion[]= clone $useraccesslog;
            $useraccesslog->setUser(null);
        }

        return $this;
    }

    /**
     * Clears out the collUseracls collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUseracls()
     */
    public function clearUseracls()
    {
        $this->collUseracls = null; // important to set this to null since that means it is uninitialized
        $this->collUseraclsPartial = null;

        return $this;
    }

    /**
     * reset is the collUseracls collection loaded partially
     *
     * @return void
     */
    public function resetPartialUseracls($v = true)
    {
        $this->collUseraclsPartial = $v;
    }

    /**
     * Initializes the collUseracls collection.
     *
     * By default this just sets the collUseracls collection to an empty array (like clearcollUseracls());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUseracls($overrideExisting = true)
    {
        if (null !== $this->collUseracls && !$overrideExisting) {
            return;
        }
        $this->collUseracls = new PropelObjectCollection();
        $this->collUseracls->setModel('Useracl');
    }

    /**
     * Gets an array of Useracl objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Useracl[] List of Useracl objects
     * @throws PropelException
     */
    public function getUseracls($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUseraclsPartial && !$this->isNew();
        if (null === $this->collUseracls || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUseracls) {
                // return empty collection
                $this->initUseracls();
            } else {
                $collUseracls = UseraclQuery::create(null, $criteria)
                    ->filterByUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUseraclsPartial && count($collUseracls)) {
                      $this->initUseracls(false);

                      foreach ($collUseracls as $obj) {
                        if (false == $this->collUseracls->contains($obj)) {
                          $this->collUseracls->append($obj);
                        }
                      }

                      $this->collUseraclsPartial = true;
                    }

                    $collUseracls->getInternalIterator()->rewind();

                    return $collUseracls;
                }

                if ($partial && $this->collUseracls) {
                    foreach ($this->collUseracls as $obj) {
                        if ($obj->isNew()) {
                            $collUseracls[] = $obj;
                        }
                    }
                }

                $this->collUseracls = $collUseracls;
                $this->collUseraclsPartial = false;
            }
        }

        return $this->collUseracls;
    }

    /**
     * Sets a collection of Useracl objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $useracls A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setUseracls(PropelCollection $useracls, PropelPDO $con = null)
    {
        $useraclsToDelete = $this->getUseracls(new Criteria(), $con)->diff($useracls);


        $this->useraclsScheduledForDeletion = $useraclsToDelete;

        foreach ($useraclsToDelete as $useraclRemoved) {
            $useraclRemoved->setUser(null);
        }

        $this->collUseracls = null;
        foreach ($useracls as $useracl) {
            $this->addUseracl($useracl);
        }

        $this->collUseracls = $useracls;
        $this->collUseraclsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Useracl objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Useracl objects.
     * @throws PropelException
     */
    public function countUseracls(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUseraclsPartial && !$this->isNew();
        if (null === $this->collUseracls || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUseracls) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUseracls());
            }
            $query = UseraclQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUser($this)
                ->count($con);
        }

        return count($this->collUseracls);
    }

    /**
     * Method called to associate a Useracl object to this object
     * through the Useracl foreign key attribute.
     *
     * @param    Useracl $l Useracl
     * @return User The current object (for fluent API support)
     */
    public function addUseracl(Useracl $l)
    {
        if ($this->collUseracls === null) {
            $this->initUseracls();
            $this->collUseraclsPartial = true;
        }

        if (!in_array($l, $this->collUseracls->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUseracl($l);

            if ($this->useraclsScheduledForDeletion and $this->useraclsScheduledForDeletion->contains($l)) {
                $this->useraclsScheduledForDeletion->remove($this->useraclsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Useracl $useracl The useracl object to add.
     */
    protected function doAddUseracl($useracl)
    {
        $this->collUseracls[]= $useracl;
        $useracl->setUser($this);
    }

    /**
     * @param	Useracl $useracl The useracl object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUseracl($useracl)
    {
        if ($this->getUseracls()->contains($useracl)) {
            $this->collUseracls->remove($this->collUseracls->search($useracl));
            if (null === $this->useraclsScheduledForDeletion) {
                $this->useraclsScheduledForDeletion = clone $this->collUseracls;
                $this->useraclsScheduledForDeletion->clear();
            }
            $this->useraclsScheduledForDeletion[]= clone $useracl;
            $useracl->setUser(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->iduser = null;
        $this->idcompany = null;
        $this->user_nickname = null;
        $this->user_password = null;
        $this->user_type = null;
        $this->user_status = null;
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
            if ($this->collBranchUsers) {
                foreach ($this->collBranchUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collChatcorps) {
                foreach ($this->collChatcorps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collChatpublics) {
                foreach ($this->collChatpublics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLogusers) {
                foreach ($this->collLogusers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMlquestions) {
                foreach ($this->collMlquestions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOrderconflictComments) {
                foreach ($this->collOrderconflictComments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductionordercomments) {
                foreach ($this->collProductionordercomments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProductionusers) {
                foreach ($this->collProductionusers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectactivityposts) {
                foreach ($this->collProjectactivityposts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectactivityusers) {
                foreach ($this->collProjectactivityusers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStaffs) {
                foreach ($this->collStaffs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTokens) {
                foreach ($this->collTokens as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUseraccesslogs) {
                foreach ($this->collUseraccesslogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUseracls) {
                foreach ($this->collUseracls as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCompany instanceof Persistent) {
              $this->aCompany->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBranchUsers instanceof PropelCollection) {
            $this->collBranchUsers->clearIterator();
        }
        $this->collBranchUsers = null;
        if ($this->collChatcorps instanceof PropelCollection) {
            $this->collChatcorps->clearIterator();
        }
        $this->collChatcorps = null;
        if ($this->collChatpublics instanceof PropelCollection) {
            $this->collChatpublics->clearIterator();
        }
        $this->collChatpublics = null;
        if ($this->collLogusers instanceof PropelCollection) {
            $this->collLogusers->clearIterator();
        }
        $this->collLogusers = null;
        if ($this->collMlquestions instanceof PropelCollection) {
            $this->collMlquestions->clearIterator();
        }
        $this->collMlquestions = null;
        if ($this->collOrderconflictComments instanceof PropelCollection) {
            $this->collOrderconflictComments->clearIterator();
        }
        $this->collOrderconflictComments = null;
        if ($this->collProductionordercomments instanceof PropelCollection) {
            $this->collProductionordercomments->clearIterator();
        }
        $this->collProductionordercomments = null;
        if ($this->collProductionusers instanceof PropelCollection) {
            $this->collProductionusers->clearIterator();
        }
        $this->collProductionusers = null;
        if ($this->collProjectactivityposts instanceof PropelCollection) {
            $this->collProjectactivityposts->clearIterator();
        }
        $this->collProjectactivityposts = null;
        if ($this->collProjectactivityusers instanceof PropelCollection) {
            $this->collProjectactivityusers->clearIterator();
        }
        $this->collProjectactivityusers = null;
        if ($this->collStaffs instanceof PropelCollection) {
            $this->collStaffs->clearIterator();
        }
        $this->collStaffs = null;
        if ($this->collTokens instanceof PropelCollection) {
            $this->collTokens->clearIterator();
        }
        $this->collTokens = null;
        if ($this->collUseraccesslogs instanceof PropelCollection) {
            $this->collUseraccesslogs->clearIterator();
        }
        $this->collUseraccesslogs = null;
        if ($this->collUseracls instanceof PropelCollection) {
            $this->collUseracls->clearIterator();
        }
        $this->collUseracls = null;
        $this->aCompany = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
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
