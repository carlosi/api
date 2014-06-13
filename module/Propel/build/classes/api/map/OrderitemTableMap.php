<?php



/**
 * This class defines the structure of the 'orderitem' table.
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
class OrderitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrderitemTableMap';

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
        $this->setName('orderitem');
        $this->setPhpName('Orderitem');
        $this->setClassname('Orderitem');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idorderitem', 'Idorderitem', 'INTEGER', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addColumn('orderitem_note', 'OrderitemNote', 'LONGVARCHAR', false, null, null);
        $this->addColumn('quantity', 'Quantity', 'DECIMAL', true, 10, null);
        $this->addColumn('value', 'Value', 'DECIMAL', true, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionorderitem', 'Productionorderitem', RelationMap::ONE_TO_MANY, array('idorderitem' => 'idorderitem', ), 'CASCADE', 'CASCADE', 'Productionorderitems');
    } // buildRelations()

} // OrderitemTableMap
