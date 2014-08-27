<?php



/**
 * This class defines the structure of the 'useraccesslog' table.
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
class UseraccesslogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.UseraccesslogTableMap';

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
        $this->setName('useraccesslog');
        $this->setPhpName('Useraccesslog');
        $this->setClassname('Useraccesslog');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iduseraccesslog', 'Iduseraccesslog', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('useraccesslog_date', 'UseraccesslogDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('useraccesslog_result', 'UseraccesslogResult', 'CHAR', true, null, null);
        $this->getColumn('useraccesslog_result', false)->setValueSet(array (
  0 => 'success',
  1 => 'failed',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), null, null);
    } // buildRelations()

} // UseraccesslogTableMap
