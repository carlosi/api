<?php



/**
 * This class defines the structure of the 'productionstatus' table.
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
class ProductionstatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductionstatusTableMap';

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
        $this->setName('productionstatus');
        $this->setPhpName('Productionstatus');
        $this->setClassname('Productionstatus');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductionstatus', 'Idproductionstatus', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductionline', 'Idproductionline', 'INTEGER', 'productionline', 'idproductionline', true, null, null);
        $this->addColumn('productionstatus_name', 'ProductionstatusName', 'VARCHAR', true, 245, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productionline', 'Productionline', RelationMap::MANY_TO_ONE, array('idproductionline' => 'idproductionline', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionorderitem', 'Productionorderitem', RelationMap::ONE_TO_MANY, array('idproductionstatus' => 'idproductionstatus', ), null, null, 'Productionorderitems');
    } // buildRelations()

} // ProductionstatusTableMap
