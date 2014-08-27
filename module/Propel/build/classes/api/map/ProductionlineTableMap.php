<?php



/**
 * This class defines the structure of the 'productionline' table.
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
class ProductionlineTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductionlineTableMap';

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
        $this->setName('productionline');
        $this->setPhpName('Productionline');
        $this->setClassname('Productionline');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductionline', 'Idproductionline', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('productionline_name', 'ProductionlineName', 'VARCHAR', true, 245, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productionorderitem', 'Productionorderitem', RelationMap::ONE_TO_MANY, array('idproductionline' => 'idproductionline', ), null, null, 'Productionorderitems');
        $this->addRelation('Productionstatus', 'Productionstatus', RelationMap::ONE_TO_MANY, array('idproductionline' => 'idproductionline', ), 'CASCADE', 'CASCADE', 'Productionstatuss');
    } // buildRelations()

} // ProductionlineTableMap
