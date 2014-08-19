<?php



/**
 * This class defines the structure of the 'shipping_history' table.
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
class ShippingHistoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ShippingHistoryTableMap';

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
        $this->setName('shipping_history');
        $this->setPhpName('ShippingHistory');
        $this->setClassname('ShippingHistory');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idshipping_history', 'IdshippingHistory', 'INTEGER', true, null, null);
        $this->addForeignKey('idshipping', 'Idshipping', 'INTEGER', 'shipping', 'idshipping', true, null, null);
        $this->addColumn('idemployee', 'Idemployee', 'INTEGER', true, null, null);
        $this->addColumn('shipping_history_msg', 'ShippingHistoryMsg', 'LONGVARCHAR', true, null, null);
        $this->addColumn('shipping_history_date', 'ShippingHistoryDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Shipping', 'Shipping', RelationMap::MANY_TO_ONE, array('idshipping' => 'idshipping', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ShippingHistoryTableMap
