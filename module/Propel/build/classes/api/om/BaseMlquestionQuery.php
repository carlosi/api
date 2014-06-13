<?php


/**
 * Base class that represents a query for the 'mlquestion' table.
 *
 *
 *
 * @method MlquestionQuery orderByIdmlquestion($order = Criteria::ASC) Order by the idmlquestion column
 * @method MlquestionQuery orderByIdmlitem($order = Criteria::ASC) Order by the idmlitem column
 * @method MlquestionQuery orderByMlnickname($order = Criteria::ASC) Order by the mlnickname column
 * @method MlquestionQuery orderByMlquestionQuestion($order = Criteria::ASC) Order by the mlquestion_question column
 * @method MlquestionQuery orderByMlquestionQuestiondate($order = Criteria::ASC) Order by the mlquestion_questiondate column
 * @method MlquestionQuery orderByIduser($order = Criteria::ASC) Order by the iduser column
 * @method MlquestionQuery orderByMlquestionAnswer($order = Criteria::ASC) Order by the mlquestion_answer column
 * @method MlquestionQuery orderByMlquestionAnswerdate($order = Criteria::ASC) Order by the mlquestion_answerdate column
 *
 * @method MlquestionQuery groupByIdmlquestion() Group by the idmlquestion column
 * @method MlquestionQuery groupByIdmlitem() Group by the idmlitem column
 * @method MlquestionQuery groupByMlnickname() Group by the mlnickname column
 * @method MlquestionQuery groupByMlquestionQuestion() Group by the mlquestion_question column
 * @method MlquestionQuery groupByMlquestionQuestiondate() Group by the mlquestion_questiondate column
 * @method MlquestionQuery groupByIduser() Group by the iduser column
 * @method MlquestionQuery groupByMlquestionAnswer() Group by the mlquestion_answer column
 * @method MlquestionQuery groupByMlquestionAnswerdate() Group by the mlquestion_answerdate column
 *
 * @method MlquestionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MlquestionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MlquestionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MlquestionQuery leftJoinMlitem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mlitem relation
 * @method MlquestionQuery rightJoinMlitem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mlitem relation
 * @method MlquestionQuery innerJoinMlitem($relationAlias = null) Adds a INNER JOIN clause to the query using the Mlitem relation
 *
 * @method MlquestionQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method MlquestionQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method MlquestionQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Mlquestion findOne(PropelPDO $con = null) Return the first Mlquestion matching the query
 * @method Mlquestion findOneOrCreate(PropelPDO $con = null) Return the first Mlquestion matching the query, or a new Mlquestion object populated from the query conditions when no match is found
 *
 * @method Mlquestion findOneByIdmlitem(int $idmlitem) Return the first Mlquestion filtered by the idmlitem column
 * @method Mlquestion findOneByMlnickname(string $mlnickname) Return the first Mlquestion filtered by the mlnickname column
 * @method Mlquestion findOneByMlquestionQuestion(string $mlquestion_question) Return the first Mlquestion filtered by the mlquestion_question column
 * @method Mlquestion findOneByMlquestionQuestiondate(string $mlquestion_questiondate) Return the first Mlquestion filtered by the mlquestion_questiondate column
 * @method Mlquestion findOneByIduser(int $iduser) Return the first Mlquestion filtered by the iduser column
 * @method Mlquestion findOneByMlquestionAnswer(string $mlquestion_answer) Return the first Mlquestion filtered by the mlquestion_answer column
 * @method Mlquestion findOneByMlquestionAnswerdate(string $mlquestion_answerdate) Return the first Mlquestion filtered by the mlquestion_answerdate column
 *
 * @method array findByIdmlquestion(int $idmlquestion) Return Mlquestion objects filtered by the idmlquestion column
 * @method array findByIdmlitem(int $idmlitem) Return Mlquestion objects filtered by the idmlitem column
 * @method array findByMlnickname(string $mlnickname) Return Mlquestion objects filtered by the mlnickname column
 * @method array findByMlquestionQuestion(string $mlquestion_question) Return Mlquestion objects filtered by the mlquestion_question column
 * @method array findByMlquestionQuestiondate(string $mlquestion_questiondate) Return Mlquestion objects filtered by the mlquestion_questiondate column
 * @method array findByIduser(int $iduser) Return Mlquestion objects filtered by the iduser column
 * @method array findByMlquestionAnswer(string $mlquestion_answer) Return Mlquestion objects filtered by the mlquestion_answer column
 * @method array findByMlquestionAnswerdate(string $mlquestion_answerdate) Return Mlquestion objects filtered by the mlquestion_answerdate column
 *
 * @package    propel.generator.api.om
 */
abstract class BaseMlquestionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMlquestionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'api';
        }
        if (null === $modelName) {
            $modelName = 'Mlquestion';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MlquestionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MlquestionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MlquestionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MlquestionQuery) {
            return $criteria;
        }
        $query = new MlquestionQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Mlquestion|Mlquestion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MlquestionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MlquestionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Mlquestion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdmlquestion($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Mlquestion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idmlquestion`, `idmlitem`, `mlnickname`, `mlquestion_question`, `mlquestion_questiondate`, `iduser`, `mlquestion_answer`, `mlquestion_answerdate` FROM `mlquestion` WHERE `idmlquestion` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Mlquestion();
            $obj->hydrate($row);
            MlquestionPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Mlquestion|Mlquestion[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Mlquestion[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idmlquestion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmlquestion(1234); // WHERE idmlquestion = 1234
     * $query->filterByIdmlquestion(array(12, 34)); // WHERE idmlquestion IN (12, 34)
     * $query->filterByIdmlquestion(array('min' => 12)); // WHERE idmlquestion >= 12
     * $query->filterByIdmlquestion(array('max' => 12)); // WHERE idmlquestion <= 12
     * </code>
     *
     * @param     mixed $idmlquestion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByIdmlquestion($idmlquestion = null, $comparison = null)
    {
        if (is_array($idmlquestion)) {
            $useMinMax = false;
            if (isset($idmlquestion['min'])) {
                $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $idmlquestion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmlquestion['max'])) {
                $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $idmlquestion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $idmlquestion, $comparison);
    }

    /**
     * Filter the query on the idmlitem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmlitem(1234); // WHERE idmlitem = 1234
     * $query->filterByIdmlitem(array(12, 34)); // WHERE idmlitem IN (12, 34)
     * $query->filterByIdmlitem(array('min' => 12)); // WHERE idmlitem >= 12
     * $query->filterByIdmlitem(array('max' => 12)); // WHERE idmlitem <= 12
     * </code>
     *
     * @see       filterByMlitem()
     *
     * @param     mixed $idmlitem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByIdmlitem($idmlitem = null, $comparison = null)
    {
        if (is_array($idmlitem)) {
            $useMinMax = false;
            if (isset($idmlitem['min'])) {
                $this->addUsingAlias(MlquestionPeer::IDMLITEM, $idmlitem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmlitem['max'])) {
                $this->addUsingAlias(MlquestionPeer::IDMLITEM, $idmlitem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::IDMLITEM, $idmlitem, $comparison);
    }

    /**
     * Filter the query on the mlnickname column
     *
     * Example usage:
     * <code>
     * $query->filterByMlnickname('fooValue');   // WHERE mlnickname = 'fooValue'
     * $query->filterByMlnickname('%fooValue%'); // WHERE mlnickname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlnickname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByMlnickname($mlnickname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlnickname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mlnickname)) {
                $mlnickname = str_replace('*', '%', $mlnickname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::MLNICKNAME, $mlnickname, $comparison);
    }

    /**
     * Filter the query on the mlquestion_question column
     *
     * Example usage:
     * <code>
     * $query->filterByMlquestionQuestion('fooValue');   // WHERE mlquestion_question = 'fooValue'
     * $query->filterByMlquestionQuestion('%fooValue%'); // WHERE mlquestion_question LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlquestionQuestion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByMlquestionQuestion($mlquestionQuestion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlquestionQuestion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mlquestionQuestion)) {
                $mlquestionQuestion = str_replace('*', '%', $mlquestionQuestion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::MLQUESTION_QUESTION, $mlquestionQuestion, $comparison);
    }

    /**
     * Filter the query on the mlquestion_questiondate column
     *
     * Example usage:
     * <code>
     * $query->filterByMlquestionQuestiondate('2011-03-14'); // WHERE mlquestion_questiondate = '2011-03-14'
     * $query->filterByMlquestionQuestiondate('now'); // WHERE mlquestion_questiondate = '2011-03-14'
     * $query->filterByMlquestionQuestiondate(array('max' => 'yesterday')); // WHERE mlquestion_questiondate < '2011-03-13'
     * </code>
     *
     * @param     mixed $mlquestionQuestiondate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByMlquestionQuestiondate($mlquestionQuestiondate = null, $comparison = null)
    {
        if (is_array($mlquestionQuestiondate)) {
            $useMinMax = false;
            if (isset($mlquestionQuestiondate['min'])) {
                $this->addUsingAlias(MlquestionPeer::MLQUESTION_QUESTIONDATE, $mlquestionQuestiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mlquestionQuestiondate['max'])) {
                $this->addUsingAlias(MlquestionPeer::MLQUESTION_QUESTIONDATE, $mlquestionQuestiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::MLQUESTION_QUESTIONDATE, $mlquestionQuestiondate, $comparison);
    }

    /**
     * Filter the query on the iduser column
     *
     * Example usage:
     * <code>
     * $query->filterByIduser(1234); // WHERE iduser = 1234
     * $query->filterByIduser(array(12, 34)); // WHERE iduser IN (12, 34)
     * $query->filterByIduser(array('min' => 12)); // WHERE iduser >= 12
     * $query->filterByIduser(array('max' => 12)); // WHERE iduser <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $iduser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByIduser($iduser = null, $comparison = null)
    {
        if (is_array($iduser)) {
            $useMinMax = false;
            if (isset($iduser['min'])) {
                $this->addUsingAlias(MlquestionPeer::IDUSER, $iduser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iduser['max'])) {
                $this->addUsingAlias(MlquestionPeer::IDUSER, $iduser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::IDUSER, $iduser, $comparison);
    }

    /**
     * Filter the query on the mlquestion_answer column
     *
     * Example usage:
     * <code>
     * $query->filterByMlquestionAnswer('fooValue');   // WHERE mlquestion_answer = 'fooValue'
     * $query->filterByMlquestionAnswer('%fooValue%'); // WHERE mlquestion_answer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlquestionAnswer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByMlquestionAnswer($mlquestionAnswer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlquestionAnswer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mlquestionAnswer)) {
                $mlquestionAnswer = str_replace('*', '%', $mlquestionAnswer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::MLQUESTION_ANSWER, $mlquestionAnswer, $comparison);
    }

    /**
     * Filter the query on the mlquestion_answerdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMlquestionAnswerdate('2011-03-14'); // WHERE mlquestion_answerdate = '2011-03-14'
     * $query->filterByMlquestionAnswerdate('now'); // WHERE mlquestion_answerdate = '2011-03-14'
     * $query->filterByMlquestionAnswerdate(array('max' => 'yesterday')); // WHERE mlquestion_answerdate < '2011-03-13'
     * </code>
     *
     * @param     mixed $mlquestionAnswerdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function filterByMlquestionAnswerdate($mlquestionAnswerdate = null, $comparison = null)
    {
        if (is_array($mlquestionAnswerdate)) {
            $useMinMax = false;
            if (isset($mlquestionAnswerdate['min'])) {
                $this->addUsingAlias(MlquestionPeer::MLQUESTION_ANSWERDATE, $mlquestionAnswerdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mlquestionAnswerdate['max'])) {
                $this->addUsingAlias(MlquestionPeer::MLQUESTION_ANSWERDATE, $mlquestionAnswerdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MlquestionPeer::MLQUESTION_ANSWERDATE, $mlquestionAnswerdate, $comparison);
    }

    /**
     * Filter the query by a related Mlitem object
     *
     * @param   Mlitem|PropelObjectCollection $mlitem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MlquestionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMlitem($mlitem, $comparison = null)
    {
        if ($mlitem instanceof Mlitem) {
            return $this
                ->addUsingAlias(MlquestionPeer::IDMLITEM, $mlitem->getIdmlitem(), $comparison);
        } elseif ($mlitem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MlquestionPeer::IDMLITEM, $mlitem->toKeyValue('PrimaryKey', 'Idmlitem'), $comparison);
        } else {
            throw new PropelException('filterByMlitem() only accepts arguments of type Mlitem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mlitem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function joinMlitem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mlitem');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Mlitem');
        }

        return $this;
    }

    /**
     * Use the Mlitem relation Mlitem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MlitemQuery A secondary query class using the current class as primary query
     */
    public function useMlitemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMlitem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mlitem', 'MlitemQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MlquestionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(MlquestionPeer::IDUSER, $user->getIdUser(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MlquestionPeer::IDUSER, $user->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Mlquestion $mlquestion Object to remove from the list of results
     *
     * @return MlquestionQuery The current query, for fluid interface
     */
    public function prune($mlquestion = null)
    {
        if ($mlquestion) {
            $this->addUsingAlias(MlquestionPeer::IDMLQUESTION, $mlquestion->getIdmlquestion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
