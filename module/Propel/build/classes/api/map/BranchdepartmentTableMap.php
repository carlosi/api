<?php



/**
 * This class defines the structure of the 'branchdepartment' table.
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
class BranchdepartmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BranchdepartmentTableMap';

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
        $this->setName('branchdepartment');
        $this->setPhpName('Branchdepartment');
        $this->setClassname('Branchdepartment');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idbranchdepartment', 'Idbranchdepartment', 'INTEGER', true, null, null);
        $this->addForeignKey('idbranch', 'Idbranch', 'INTEGER', 'branch', 'idbranch', true, null, null);
        $this->addForeignKey('iddepartament', 'Iddepartament', 'INTEGER', 'department', 'iddepartment', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Department', 'Department', RelationMap::MANY_TO_ONE, array('iddepartament' => 'iddepartment', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Branch', 'Branch', RelationMap::MANY_TO_ONE, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // BranchdepartmentTableMap
