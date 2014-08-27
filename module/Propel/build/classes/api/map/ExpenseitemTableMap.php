<?php



/**
 * This class defines the structure of the 'expenseitem' table.
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
class ExpenseitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ExpenseitemTableMap';

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
        $this->setName('expenseitem');
        $this->setPhpName('Expenseitem');
        $this->setClassname('Expenseitem');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idexpenseitem', 'Idexpenseitem', 'INTEGER', true, null, null);
        $this->addForeignKey('idexpensecategory', 'Idexpensecategory', 'INTEGER', 'expensecategory', 'idexpensecategory', true, null, null);
        $this->addColumn('expenseitem_name', 'ExpenseitemName', 'VARCHAR', true, 225, null);
        $this->addColumn('expenseitem_description', 'ExpenseitemDescription', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Expensecategory', 'Expensecategory', RelationMap::MANY_TO_ONE, array('idexpensecategory' => 'idexpensecategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Expenserecurrency', 'Expenserecurrency', RelationMap::ONE_TO_MANY, array('idexpenseitem' => 'idexpenseitem', ), 'CASCADE', 'CASCADE', 'Expenserecurrencys');
        $this->addRelation('Expensetransaction', 'Expensetransaction', RelationMap::ONE_TO_MANY, array('idexpenseitem' => 'idexpenseitem', ), 'CASCADE', 'CASCADE', 'Expensetransactions');
    } // buildRelations()

} // ExpenseitemTableMap
