<?php



/**
 * This class defines the structure of the 'loguser' table.
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
class LoguserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.LoguserTableMap';

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
        $this->setName('loguser');
        $this->setPhpName('Loguser');
        $this->setClassname('Loguser');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idloguser', 'Idloguser', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('table', 'Table', 'VARCHAR', false, 125, null);
        $this->addColumn('loguser_type', 'LoguserType', 'CHAR', false, null, null);
        $this->getColumn('loguser_type', false)->setValueSet(array (
  0 => 'insert',
  1 => 'update',
  2 => 'delete',
));
        $this->addColumn('old_data', 'OldData', 'LONGVARCHAR', false, null, null);
        $this->addColumn('new_data', 'NewData', 'LONGVARCHAR', false, null, null);
        $this->addColumn('loguser_date', 'LoguserDate', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // LoguserTableMap
