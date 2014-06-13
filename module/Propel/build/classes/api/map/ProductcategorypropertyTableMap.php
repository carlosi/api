<?php



/**
 * This class defines the structure of the 'productcategoryproperty' table.
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
class ProductcategorypropertyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductcategorypropertyTableMap';

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
        $this->setName('productcategoryproperty');
        $this->setPhpName('Productcategoryproperty');
        $this->setClassname('Productcategoryproperty');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductcategoryproperty', 'Idproductcategoryproperty', 'INTEGER', true, null, null);
        $this->addForeignKey('idproductcategory', 'Idproductcategory', 'INTEGER', 'productcategory', 'idproductcategory', true, null, null);
        $this->addColumn('productcategoryproperty_name', 'ProductcategorypropertyName', 'VARCHAR', true, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Productcategory', 'Productcategory', RelationMap::MANY_TO_ONE, array('idproductcategory' => 'idproductcategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productcategorypropertyoption', 'Productcategorypropertyoption', RelationMap::ONE_TO_MANY, array('idproductcategoryproperty' => 'idproductcategoryproperty', ), 'CASCADE', 'CASCADE', 'Productcategorypropertyoptions');
    } // buildRelations()

} // ProductcategorypropertyTableMap
