<?php



/**
 * This class defines the structure of the 'useracl' table.
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
class UseraclTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.UseraclTableMap';

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
        $this->setName('useracl');
        $this->setPhpName('Useracl');
        $this->setClassname('Useracl');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iduseracl', 'Iduseracl', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('module_name', 'ModuleName', 'CHAR', true, null, 'basic');
        $this->getColumn('module_name', false)->setValueSet(array (
  0 => 'basic',
  1 => 'sales',
  2 => 'company',
  3 => 'manufacture',
  4 => 'contents',
));
        $this->addColumn('user_accesslevel', 'UserAccesslevel', 'CHAR', true, null, '1');
        $this->getColumn('user_accesslevel', false)->setValueSet(array (
  0 => '1',
  1 => '2',
  2 => '3',
  3 => '4',
  4 => '5',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // UseraclTableMap
