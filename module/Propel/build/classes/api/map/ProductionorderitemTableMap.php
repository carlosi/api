<?php



/**
 * This class defines the structure of the 'productionorderitem' table.
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
class ProductionorderitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductionorderitemTableMap';

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
        $this->setName('productionorderitem');
        $this->setPhpName('Productionorderitem');
        $this->setClassname('Productionorderitem');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductionorderitem', 'Idproductionorderitem', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductionteam', 'Idproductionteam', 'INTEGER', 'productionteam', 'idproductionteam', true, null, null);
        $this->addForeignKey('idorderitem', 'Idorderitem', 'INTEGER', 'orderitem', 'idorderitem', true, null, null);
        $this->addColumn('productionorderitem_dateinit', 'ProductionorderitemDateinit', 'TIMESTAMP', false, null, null);
        $this->addColumn('productionorderitem_datedelivery', 'ProductionorderitemDatedelivery', 'TIMESTAMP', false, null, null);
        $this->addColumn('productionorderitem_note', 'ProductionorderitemNote', 'LONGVARCHAR', false, null, null);
        $this->addColumn('productionorderitem_status', 'ProductionorderitemStatus', 'CHAR', true, null, null);
        $this->getColumn('productionorderitem_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'initialized',
  2 => 'completed',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orderitem', 'Orderitem', RelationMap::MANY_TO_ONE, array('idorderitem' => 'idorderitem', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionteam', 'Productionteam', RelationMap::MANY_TO_ONE, array('idproductionteam' => 'idproductionteam', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductionorderitemTableMap
