<?php



/**
 * This class defines the structure of the 'marketinggroup' table.
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
class MarketinggroupTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketinggroupTableMap';

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
        $this->setName('marketinggroup');
        $this->setPhpName('Marketinggroup');
        $this->setClassname('Marketinggroup');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmarketinggroup', 'Idmarketinggroup', 'INTEGER', true, null, null);
        $this->addColumn('marketinggroup_status', 'MarketinggroupStatus', 'CHAR', true, null, 'progress');
        $this->getColumn('marketinggroup_status', false)->setValueSet(array (
  0 => 'positive',
  1 => 'negative',
  2 => 'progress',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // MarketinggroupTableMap
