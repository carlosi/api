<?php



/**
 * This class defines the structure of the 'projectactivity' table.
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
class ProjectactivityTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProjectactivityTableMap';

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
        $this->setName('projectactivity');
        $this->setPhpName('Projectactivity');
        $this->setClassname('Projectactivity');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idprojectactivity', 'Idprojectactivity', 'INTEGER', true, null, null);
        $this->addForeignKey('idproject', 'Idproject', 'INTEGER', 'project', 'idproject', true, null, null);
        $this->addColumn('projectactivity_title', 'ProjectactivityTitle', 'VARCHAR', true, 45, null);
        $this->addColumn('projectactivity_description', 'ProjectactivityDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('projectactivity_status', 'ProjectactivityStatus', 'CHAR', true, null, 'pending');
        $this->getColumn('projectactivity_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'rejected',
  2 => 'progress',
  3 => 'completed',
  4 => 'pause',
));
        $this->addColumn('projectactivity_dateinit', 'ProjectactivityDateinit', 'TIMESTAMP', false, null, null);
        $this->addColumn('projectactivity_datetofinish', 'ProjectactivityDatetofinish', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Project', 'Project', RelationMap::MANY_TO_ONE, array('idproject' => 'idproject', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Projectactivitypost', 'Projectactivitypost', RelationMap::ONE_TO_MANY, array('idprojectactivity' => 'idprojectactivity', ), 'CASCADE', 'CASCADE', 'Projectactivityposts');
        $this->addRelation('Projectactivityuser', 'Projectactivityuser', RelationMap::ONE_TO_MANY, array('idprojectactivity' => 'idprojectactivity', ), 'CASCADE', 'CASCADE', 'Projectactivityusers');
    } // buildRelations()

} // ProjectactivityTableMap
