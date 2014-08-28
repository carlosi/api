<?php



/**
 * This class defines the structure of the 'mlquestion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.api.map
 */
class MlquestionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MlquestionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('mlquestion');
        $this->setPhpName('Mlquestion');
        $this->setClassname('Mlquestion');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmlquestion', 'Idmlquestion', 'INTEGER', true, null, null);
        $this->addForeignKey('idmlitem', 'Idmlitem', 'INTEGER', 'mlitem', 'idmlitem', true, null, null);
        $this->addColumn('mlnickname', 'Mlnickname', 'VARCHAR', true, 128, null);
        $this->addColumn('mlquestion_question', 'MlquestionQuestion', 'LONGVARCHAR', true, null, null);
        $this->addColumn('mlquestion_questiondate', 'MlquestionQuestiondate', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('mlquestion_answer', 'MlquestionAnswer', 'LONGVARCHAR', true, null, null);
        $this->addColumn('mlquestion_answerdate', 'MlquestionAnswerdate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Mlitem', 'Mlitem', RelationMap::MANY_TO_ONE, array('idmlitem' => 'idmlitem', ), null, null);
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MlquestionTableMap
