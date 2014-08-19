<?php



/**
 * This class defines the structure of the 'productmainproperty' table.
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
class ProductmainpropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductmainpropertyTableMap';

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
        $this->setName('productmainproperty');
        $this->setPhpName('Productmainproperty');
        $this->setClassname('Productmainproperty');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductmainproperty', 'Idproductmainproperty', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductmain', 'Idproductmain', 'INTEGER', 'productmain', 'idproductmain', true, null, null);
        $this->addColumn('productmainproperty_key', 'ProductmainpropertyKey', 'VARCHAR', true, 255, null);
        $this->addColumn('productmainproperty_visiblename', 'ProductmainpropertyVisiblename', 'VARCHAR', true, 255, null);
        $this->addColumn('productmainproperty_type', 'ProductmainpropertyType', 'CHAR', true, null, 'private');
        $this->getColumn('productmainproperty_type', false)->setValueSet(array (
  0 => 'public',
  1 => 'private',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productmain', 'Productmain', RelationMap::MANY_TO_ONE, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productproperty', 'Productproperty', RelationMap::ONE_TO_MANY, array('idproductmainproperty' => 'idproductmainproperty', ), 'CASCADE', 'CASCADE', 'Productpropertys');
    } // buildRelations()

} // ProductmainpropertyTableMap
