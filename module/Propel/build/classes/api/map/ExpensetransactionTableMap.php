<?php



/**
 * This class defines the structure of the 'expensetransaction' table.
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
class ExpensetransactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ExpensetransactionTableMap';

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
        $this->setName('expensetransaction');
        $this->setPhpName('Expensetransaction');
        $this->setClassname('Expensetransaction');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idexpensetransaction', 'Idexpensetransaction', 'INTEGER', true, null, null);
        $this->addForeignKey('idexpenseitem', 'Idexpenseitem', 'INTEGER', 'expenseitem', 'idexpenseitem', true, null, null);
        $this->addColumn('expensetransaction_status', 'ExpensetransactionStatus', 'CHAR', true, null, 'suggestion');
        $this->getColumn('expensetransaction_status', false)->setValueSet(array (
  0 => 'suggestion',
  1 => 'pending',
  2 => 'completed',
));
        $this->addColumn('expensetransaction_comment', 'ExpensetransactionComment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('expensetransaction_quantity', 'ExpensetransactionQuantity', 'DECIMAL', true, 10, 0);
        $this->addColumn('expensetransaction_value', 'ExpensetransactionValue', 'DECIMAL', true, 10, 0);
        $this->addColumn('expensetransaction_date', 'ExpensetransactionDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Expenseitem', 'Expenseitem', RelationMap::MANY_TO_ONE, array('idexpenseitem' => 'idexpenseitem', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Expensetransactionfile', 'Expensetransactionfile', RelationMap::ONE_TO_MANY, array('idexpensetransaction' => 'idexpensetransaction', ), 'CASCADE', 'CASCADE', 'Expensetransactionfiles');
    } // buildRelations()

} // ExpensetransactionTableMap
