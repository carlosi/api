<?php



/**
 * This class defines the structure of the 'product' table.
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
class ProductTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductTableMap';

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
        $this->setName('product');
        $this->setPhpName('Product');
        $this->setClassname('Product');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproduct', 'Idproduct', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductmain', 'Idproductmain', 'INTEGER', 'productmain', 'idproductmain', true, null, null);
        $this->addColumn('product_status', 'ProductStatus', 'CHAR', true, null, 'active');
        $this->getColumn('product_status', false)->setValueSet(array (
  0 => 'active',
  1 => 'inactive',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productmain', 'Productmain', RelationMap::MANY_TO_ONE, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Orderitem', 'Orderitem', RelationMap::ONE_TO_MANY, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE', 'Orderitems');
        $this->addRelation('Productproperty', 'Productproperty', RelationMap::ONE_TO_MANY, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE', 'Productpropertys');
        $this->addRelation('Quoteitem', 'Quoteitem', RelationMap::ONE_TO_MANY, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE', 'Quoteitems');
    } // buildRelations()

} // ProductTableMap
