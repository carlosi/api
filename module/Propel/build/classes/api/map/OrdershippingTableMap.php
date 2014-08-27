<?php



/**
 * This class defines the structure of the 'ordershipping' table.
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
class OrdershippingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrdershippingTableMap';

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
        $this->setName('ordershipping');
        $this->setPhpName('Ordershipping');
        $this->setClassname('Ordershipping');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idordershipping', 'Idordershipping', 'INTEGER', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addForeignKey('idshipping', 'Idshipping', 'INTEGER', 'shipping', 'idshipping', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Shipping', 'Shipping', RelationMap::MANY_TO_ONE, array('idshipping' => 'idshipping', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // OrdershippingTableMap
