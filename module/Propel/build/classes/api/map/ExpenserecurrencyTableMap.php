<?php



/**
 * This class defines the structure of the 'expenserecurrency' table.
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
class ExpenserecurrencyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ExpenserecurrencyTableMap';

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
        $this->setName('expenserecurrency');
        $this->setPhpName('Expenserecurrency');
        $this->setClassname('Expenserecurrency');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idexpenserecurrency', 'Idexpenserecurrency', 'INTEGER', true, null, null);
        $this->addForeignKey('idexpenseitem', 'Idexpenseitem', 'INTEGER', 'expenseitem', 'idexpenseitem', true, null, null);
        $this->addColumn('expenserecurrency_comment', 'ExpenserecurrencyComment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('expenserecurrency_themequantity', 'ExpenserecurrencyThemequantity', 'DECIMAL', true, 10, 0);
        $this->addColumn('expenserecurrency_themevalue', 'ExpenserecurrencyThemevalue', 'DECIMAL', true, 10, 0);
        $this->addColumn('expenserecurrency_cycle', 'ExpenserecurrencyCycle', 'CHAR', true, null, null);
        $this->getColumn('expenserecurrency_cycle', false)->setValueSet(array (
  0 => 'weekly',
  1 => 'monthly',
  2 => 'annually',
));
        $this->addColumn('expenserecurrency_applyeach', 'ExpenserecurrencyApplyeach', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Expenseitem', 'Expenseitem', RelationMap::MANY_TO_ONE, array('idexpenseitem' => 'idexpenseitem', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ExpenserecurrencyTableMap
