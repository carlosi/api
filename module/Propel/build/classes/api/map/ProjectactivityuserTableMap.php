<?php



/**
 * This class defines the structure of the 'projectactivityuser' table.
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
class ProjectactivityuserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProjectactivityuserTableMap';

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
        $this->setName('projectactivityuser');
        $this->setPhpName('Projectactivityuser');
        $this->setClassname('Projectactivityuser');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idprojectactivityuser', 'Idprojectactivityuser', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addForeignKey('idprojectactivity', 'Idprojectactivity', 'INTEGER', 'projectactivity', 'idprojectactivity', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Projectactivity', 'Projectactivity', RelationMap::MANY_TO_ONE, array('idprojectactivity' => 'idprojectactivity', ), 'CASCADE', 'CASCADE');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProjectactivityuserTableMap
