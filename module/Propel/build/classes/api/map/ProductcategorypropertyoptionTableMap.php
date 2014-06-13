<?php



/**
 * This class defines the structure of the 'productcategorypropertyoption' table.
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
class ProductcategorypropertyoptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductcategorypropertyoptionTableMap';

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
        $this->setName('productcategorypropertyoption');
        $this->setPhpName('Productcategorypropertyoption');
        $this->setClassname('Productcategorypropertyoption');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductcategorypropertyoption', 'Idproductcategorypropertyoption', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductcategoryproperty', 'Idproductcategoryproperty', 'INTEGER', 'productcategoryproperty', 'idproductcategoryproperty', true, null, null);
        $this->addColumn('productcategorypropertyoption_name', 'ProductcategorypropertyoptionName', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productcategoryproperty', 'Productcategoryproperty', RelationMap::MANY_TO_ONE, array('idproductcategoryproperty' => 'idproductcategoryproperty', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProductcategorypropertyoptionTableMap
