<?php



/**
 * This class defines the structure of the 'bankexpensetransaction' table.
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
class BankexpensetransactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BankexpensetransactionTableMap';

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
        $this->setName('bankexpensetransaction');
        $this->setPhpName('Bankexpensetransaction');
        $this->setClassname('Bankexpensetransaction');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idbankexpensetransaction', 'Idbankexpensetransaction', 'INTEGER', true, null, null);
        $this->addForeignKey('idbankaccount', 'Idbankaccount', 'INTEGER', 'bankaccount', 'idbankaccount', true, null, null);
        $this->addForeignKey('idexpensetransaction', 'Idexpensetransaction', 'INTEGER', 'expensetransaction', 'idexpensetransaction', true, null, null);
        $this->addColumn('bankexpensetransaction_amount', 'BankexpensetransactionAmount', 'DECIMAL', true, 10, 0);
        $this->addColumn('bankexpensetransaction_date', 'BankexpensetransactionDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Bankaccount', 'Bankaccount', RelationMap::MANY_TO_ONE, array('idbankaccount' => 'idbankaccount', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Expensetransaction', 'Expensetransaction', RelationMap::MANY_TO_ONE, array('idexpensetransaction' => 'idexpensetransaction', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // BankexpensetransactionTableMap
