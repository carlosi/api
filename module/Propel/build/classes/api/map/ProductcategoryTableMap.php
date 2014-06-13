<?php



/**
 * This class defines the structure of the 'productcategory' table.
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
class ProductcategoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductcategoryTableMap';

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
        $this->setName('productcategory');
        $this->setPhpName('Productcategory');
        $this->setClassname('Productcategory');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductcategory', 'Idproductcategory', 'INTEGER', true, null, null);
        $this->addColumn('category_name', 'CategoryName', 'VARCHAR', true, 45, null);
        $this->addForeignKey('productcategory_dependency', 'ProductcategoryDependency', 'INTEGER', 'productcategory', 'idproductcategory', false, null, null);
        $this->addColumn('productcategory_property', 'ProductcategoryProperty', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductcategoryRelatedByProductcategoryDependency', 'Productcategory', RelationMap::MANY_TO_ONE, array('productcategory_dependency' => 'idproductcategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ProductcategoryRelatedByIdproductcategory', 'Productcategory', RelationMap::ONE_TO_MANY, array('idproductcategory' => 'productcategory_dependency', ), 'CASCADE', 'CASCADE', 'ProductcategorysRelatedByIdproductcategory');
        $this->addRelation('Productcategoryproperty', 'Productcategoryproperty', RelationMap::ONE_TO_MANY, array('idproductcategory' => 'idproductcategory', ), 'CASCADE', 'CASCADE', 'Productcategorypropertys');
        $this->addRelation('Productmain', 'Productmain', RelationMap::ONE_TO_MANY, array('idproductcategory' => 'idproductcategory', ), 'CASCADE', 'CASCADE', 'Productmains');
    } // buildRelations()

} // ProductcategoryTableMap
