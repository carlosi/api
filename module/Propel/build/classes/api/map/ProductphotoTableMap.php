<?php



/**
 * This class defines the structure of the 'productphoto' table.
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
class ProductphotoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductphotoTableMap';

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
        $this->setName('productphoto');
        $this->setPhpName('Productphoto');
        $this->setClassname('Productphoto');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductphoto', 'Idproductphoto', 'INTEGER', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addColumn('productphoto_url', 'ProductphotoUrl', 'LONGVARCHAR', true, null, null);
        $this->addColumn('productphoto_width', 'ProductphotoWidth', 'VARCHAR', false, 35, null);
        $this->addColumn('productphoto_height', 'ProductphotoHeight', 'VARCHAR', false, 35, null);
        $this->addColumn('productphoto_status', 'ProductphotoStatus', 'CHAR', false, null, null);
        $this->getColumn('productphoto_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'rejected',
  2 => 'active',
  3 => 'revision',
));
        $this->addColumn('productphoto_type', 'ProductphotoType', 'CHAR', true, null, 'private');
        $this->getColumn('productphoto_type', false)->setValueSet(array (
  0 => 'private',
  1 => 'public',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductphotoTableMap
