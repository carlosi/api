<?php



/**
 * This class defines the structure of the 'productmain' table.
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
class ProductmainTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProductmainTableMap';

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
        $this->setName('productmain');
        $this->setPhpName('Productmain');
        $this->setClassname('Productmain');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproductmain', 'Idproductmain', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addForeignKey('idproductcategory', 'Idproductcategory', 'INTEGER', 'productcategory', 'idproductcategory', true, null, null);
        $this->addColumn('productmain_name', 'ProductmainName', 'VARCHAR', true, 255, null);
        $this->addColumn('productmain_unit', 'ProductmainUnit', 'CHAR', true, null, null);
        $this->getColumn('productmain_unit', false)->setValueSet(array (
  0 => 'KILO',
  1 => 'METRO CUADRADO',
  2 => 'CABEZA',
  3 => 'KILOWATT',
  4 => 'KILOWATT-HORA',
  5 => 'GRAMO NETO',
  6 => 'DOCENAS',
  7 => 'GRAMO',
  8 => 'METRO CÚBICO',
  9 => 'LITRO',
  10 => 'MILLAR',
  11 => 'TONELADA',
  12 => 'DECENAS',
  13 => 'CAJA',
  14 => 'METRO LINEAL',
  15 => 'PIEZA',
  16 => 'PAR',
  17 => 'JUEGO',
  18 => 'BARRIL',
  19 => 'CIENTOS',
  20 => 'BOTELLA',
));
        $this->addColumn('productmain_type', 'ProductmainType', 'CHAR', false, null, 'PRODUCT');
        $this->getColumn('productmain_type', false)->setValueSet(array (
  0 => 'COMPLEMENT',
  1 => 'PRODUCT',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Productcategory', 'Productcategory', RelationMap::MANY_TO_ONE, array('idproductcategory' => 'idproductcategory', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Mlitem', 'Mlitem', RelationMap::ONE_TO_MANY, array('idproductmain' => 'idproductmain', ), null, null, 'Mlitems');
        $this->addRelation('Product', 'Product', RelationMap::ONE_TO_MANY, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE', 'Products');
        $this->addRelation('Productmainphoto', 'Productmainphoto', RelationMap::ONE_TO_MANY, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE', 'Productmainphotos');
        $this->addRelation('Productmainproperty', 'Productmainproperty', RelationMap::ONE_TO_MANY, array('idproductmain' => 'idproductmain', ), 'CASCADE', 'CASCADE', 'Productmainpropertys');
    } // buildRelations()

} // ProductmainTableMap
