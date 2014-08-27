<?php



/**
 * This class defines the structure of the 'branch_user' table.
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
class BranchUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BranchUserTableMap';

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
        $this->setName('branch_user');
        $this->setPhpName('BranchUser');
        $this->setClassname('BranchUser');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idbranch_user', 'IdbranchUser', 'INTEGER', true, null, null);
        $this->addForeignKey('idbranch', 'Idbranch', 'INTEGER', 'branch', 'idbranch', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Branch', 'Branch', RelationMap::MANY_TO_ONE, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // BranchUserTableMap
