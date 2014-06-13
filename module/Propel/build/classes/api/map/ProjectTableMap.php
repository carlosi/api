<?php



/**
 * This class defines the structure of the 'project' table.
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
class ProjectTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProjectTableMap';

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
        $this->setName('project');
        $this->setPhpName('Project');
        $this->setClassname('Project');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idproject', 'Idproject', 'INTEGER', true, null, null);
        $this->addForeignKey('iddepartament', 'Iddepartament', 'INTEGER', 'department', 'iddepartment', true, null, null);
        $this->addForeignKey('project_dependency', 'ProjectDependency', 'INTEGER', 'project', 'idproject', true, null, null);
        $this->addColumn('project_name', 'ProjectName', 'VARCHAR', false, 245, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProjectRelatedByProjectDependency', 'Project', RelationMap::MANY_TO_ONE, array('project_dependency' => 'idproject', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Department', 'Department', RelationMap::MANY_TO_ONE, array('iddepartament' => 'iddepartment', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ProjectRelatedByIdproject', 'Project', RelationMap::ONE_TO_MANY, array('idproject' => 'project_dependency', ), 'CASCADE', 'CASCADE', 'ProjectsRelatedByIdproject');
        $this->addRelation('Projectactivity', 'Projectactivity', RelationMap::ONE_TO_MANY, array('idproject' => 'idproject', ), 'CASCADE', 'CASCADE', 'Projectactivitys');
    } // buildRelations()

} // ProjectTableMap
