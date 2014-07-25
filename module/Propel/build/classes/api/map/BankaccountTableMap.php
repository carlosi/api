<?php



/**
 * This class defines the structure of the 'bankaccount' table.
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
class BankaccountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BankaccountTableMap';

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
        $this->setName('bankaccount');
        $this->setPhpName('Bankaccount');
        $this->setClassname('Bankaccount');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idbankaccount', 'Idbankaccount', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('bankaccount_name', 'BankaccountName', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Bankexpensetransaction', 'Bankexpensetransaction', RelationMap::ONE_TO_MANY, array('idbankaccount' => 'idbankaccount', ), 'CASCADE', 'CASCADE', 'Bankexpensetransactions');
        $this->addRelation('Bankordertransaction', 'Bankordertransaction', RelationMap::ONE_TO_MANY, array('idbankaccount' => 'idbankaccount', ), 'CASCADE', 'CASCADE', 'Bankordertransactions');
    } // buildRelations()

} // BankaccountTableMap
