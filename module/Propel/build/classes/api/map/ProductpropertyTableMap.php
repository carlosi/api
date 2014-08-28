<?php



/**
 * This class defines the structure of the 'productproperty' table.
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
class ProductpropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductpropertyTableMap';

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
        $this->setName('productproperty');
        $this->setPhpName('Productproperty');
        $this->setClassname('Productproperty');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idproductproperty', 'Idproductproperty', 'INTEGER', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addForeignKey('idproductmainproperty', 'Idproductmainproperty', 'INTEGER', 'productmainproperty', 'idproductmainproperty', true, null, null);
        $this->addColumn('productproperty_value', 'ProductpropertyValue', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productmainproperty', 'Productmainproperty', RelationMap::MANY_TO_ONE, array('idproductmainproperty' => 'idproductmainproperty', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductpropertyTableMap
