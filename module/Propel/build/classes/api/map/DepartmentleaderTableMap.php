<?php



/**
 * This class defines the structure of the 'departmentleader' table.
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
class DepartmentleaderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.DepartmentleaderTableMap';

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
        $this->setName('departmentleader');
        $this->setPhpName('Departmentleader');
        $this->setClassname('Departmentleader');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iddepartmentleader', 'Iddepartmentleader', 'INTEGER', true, null, null);
        $this->addForeignKey('iddepartment', 'Iddepartment', 'INTEGER', 'department', 'iddepartment', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('departmentleader_title', 'DepartmentleaderTitle', 'VARCHAR', true, 245, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Department', 'Department', RelationMap::MANY_TO_ONE, array('iddepartment' => 'iddepartment', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // DepartmentleaderTableMap