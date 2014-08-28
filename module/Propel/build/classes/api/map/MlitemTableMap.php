<?php



/**
 * This class defines the structure of the 'mlitem' table.
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
class MlitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MlitemTableMap';

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
        $this->setName('mlitem');
        $this->setPhpName('Mlitem');
        $this->setClassname('Mlitem');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmlitem', 'Idmlitem', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductmain', 'Idproductmain', 'INTEGER', 'productmain', 'idproductmain', true, null, null);
        $this->addColumn('mlitem_id', 'MlitemId', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productmain', 'Productmain', RelationMap::MANY_TO_ONE, array('idproductmain' => 'idproductmain', ), null, null);
        $this->addRelation('Mlquestion', 'Mlquestion', RelationMap::ONE_TO_MANY, array('idmlitem' => 'idmlitem', ), null, null, 'Mlquestions');
    } // buildRelations()

} // MlitemTableMap
