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
        $this->addForeignKey('idproductionline', 'Idproductionline', 'INTEGER', 'productionline', 'idproductionline', true, null, null);
        $this->addForeignKey('idorderitem', 'Idorderitem', 'INTEGER', 'orderitem', 'idorderitem', true, null, null);
        $this->addForeignKey('idproductionstatus', 'Idproductionstatus', 'INTEGER', 'productionstatus', 'idproductionstatus', true, null, null);
        $this->addColumn('productionorderitem_dateinit', 'ProductionorderitemDateinit', 'TIMESTAMP', false, null, null);
        $this->addColumn('productionorderitem_datedelivery', 'ProductionorderitemDatedelivery', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orderitem', 'Orderitem', RelationMap::MANY_TO_ONE, array('idorderitem' => 'idorderitem', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionline', 'Productionline', RelationMap::MANY_TO_ONE, array('idproductionline' => 'idproductionline', ), null, null);
        $this->addRelation('Productionstatus', 'Productionstatus', RelationMap::MANY_TO_ONE, array('idproductionstatus' => 'idproductionstatus', ), null, null);
        $this->addRelation('Productionteam', 'Productionteam', RelationMap::MANY_TO_ONE, array('idproductionteam' => 'idproductionteam', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionordercomment', 'Productionordercomment', RelationMap::ONE_TO_MANY, array('idproductionorderitem' => 'idproductionorderitem', ), 'CASCADE', 'CASCADE', 'Productionordercomments');
    } // buildRelations()

} // ProductionorderitemTableMap
