<?php



/**
 * This class defines the structure of the 'department' table.
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
class DepartmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.DepartmentTableMap';

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
        $this->setName('department');
        $this->setPhpName('Department');
        $this->setClassname('Department');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iddepartment', 'Iddepartment', 'INTEGER', true, null, null);
        $this->addColumn('department_name', 'DepartmentName', 'VARCHAR', true, 245, null);
        $this->addColumn('department_type', 'DepartmentType', 'CHAR', true, null, 'local');
        $this->getColumn('department_type', false)->setValueSet(array (
  0 => 'global',
  1 => 'local',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Branchdepartment', 'Branchdepartment', RelationMap::ONE_TO_MANY, array('iddepartment' => 'iddepartment', ), 'CASCADE', 'CASCADE', 'Branchdepartments');
        $this->addRelation('Departmentleader', 'Departmentleader', RelationMap::ONE_TO_MANY, array('iddepartment' => 'iddepartment', ), 'CASCADE', 'CASCADE', 'Departmentleaders');
        $this->addRelation('Departmentmember', 'Departmentmember', RelationMap::ONE_TO_MANY, array('iddepartment' => 'iddepartment', ), 'CASCADE', 'CASCADE', 'Departmentmembers');
        $this->addRelation('Project', 'Project', RelationMap::ONE_TO_MANY, array('iddepartment' => 'iddepartment', ), 'CASCADE', 'CASCADE', 'Projects');
    } // buildRelations()

} // DepartmentTableMap
