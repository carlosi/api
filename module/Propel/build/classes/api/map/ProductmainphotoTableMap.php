<?php



/**
 * This class defines the structure of the 'productmainphoto' table.
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
class ProductmainphotoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductmainphotoTableMap';

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
        $this->setName('productmainphoto');
        $this->setPhpName('Productmainphoto');
        $this->setClassname('Productmainphoto');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductmainphoto', 'Idproductmainphoto', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductmain', 'Idproductmain', 'INTEGER', 'productmain', 'idproductmain', true, null, null);
        $this->addColumn('productmainphoto_url', 'ProductmainphotoUrl', 'LONGVARCHAR', true, null, null);
        $this->addColumn('productmainphoto_width', 'ProductmainphotoWidth', 'VARCHAR', false, 35, null);
        $this->addColumn('productmainphoto_height', 'ProductmainphotoHeight', 'VARCHAR', false, 35, null);
        $this->addColumn('productmainphoto_status', 'ProductmainphotoStatus', 'CHAR', false, null, null);
        $this->getColumn('productmainphoto_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'rejected',
  2 => 'active',
  3 => 'revision',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productmain', 'Productmain', RelationMap::MANY_TO_ONE, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductmainphotoTableMap
