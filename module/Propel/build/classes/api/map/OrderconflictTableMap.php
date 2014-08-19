<?php



/**
 * This class defines the structure of the 'orderconflict' table.
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
class OrderconflictTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrderconflictTableMap';

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
        $this->setName('orderconflict');
        $this->setPhpName('Orderconflict');
        $this->setClassname('Orderconflict');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idorderconflict', 'Idorderconflict', 'INTEGER', true, null, null);
        $this->addForeignKey('idorderitem', 'Idorderitem', 'INTEGER', 'orderitem', 'idorderitem', true, null, null);
        $this->addColumn('orderconflict_date', 'OrderconflictDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orderitem', 'Orderitem', RelationMap::MANY_TO_ONE, array('idorderitem' => 'idorderitem', ), 'CASCADE', 'CASCADE');
        $this->addRelation('OrderconflictComment', 'OrderconflictComment', RelationMap::ONE_TO_MANY, array('idorderconflict' => 'idorderconflict', ), 'CASCADE', 'CASCADE', 'OrderconflictComments');
    } // buildRelations()

} // OrderconflictTableMap
