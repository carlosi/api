<?php



/**
 * This class defines the structure of the 'expensecategory' table.
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
class ExpensecategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ExpensecategoryTableMap';

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
        $this->setName('expensecategory');
        $this->setPhpName('Expensecategory');
        $this->setClassname('Expensecategory');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idexpensecategory', 'Idexpensecategory', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addForeignKey('expensecategory_dependency', 'ExpensecategoryDependency', 'INTEGER', 'expensecategory', 'idexpensecategory', true, null, null);
        $this->addColumn('expensecategory_name', 'ExpensecategoryName', 'VARCHAR', true, 255, null);
        $this->addColumn('expensecategory_description', 'ExpensecategoryDescription', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ExpensecategoryRelatedByExpensecategoryDependency', 'Expensecategory', RelationMap::MANY_TO_ONE, array('expensecategory_dependency' => 'idexpensecategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ExpensecategoryRelatedByIdexpensecategory', 'Expensecategory', RelationMap::ONE_TO_MANY, array('idexpensecategory' => 'expensecategory_dependency', ), 'CASCADE', 'CASCADE', 'ExpensecategorysRelatedByIdexpensecategory');
        $this->addRelation('Expenseitem', 'Expenseitem', RelationMap::ONE_TO_MANY, array('idexpensecategory' => 'idexpensecategory', ), 'CASCADE', 'CASCADE', 'Expenseitems');
    } // buildRelations()

} // ExpensecategoryTableMap
