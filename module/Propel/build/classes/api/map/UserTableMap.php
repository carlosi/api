<?php



/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iduser', 'IdUser', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'IdCompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('user_nickname', 'UserNickname', 'VARCHAR', true, 245, null);
        $this->addColumn('user_password', 'UserPassword', 'LONGVARCHAR', true, null, null);
        $this->addColumn('user_type', 'UserType', 'CHAR', true, null, 'human');
        $this->getColumn('user_type', false)->setValueSet(array (
  0 => 'human',
  1 => 'system',
));
        $this->addColumn('user_status', 'UserStatus', 'CHAR', true, null, 'pending');
        $this->getColumn('user_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'active',
  2 => 'suspended',
  3 => 'inactive',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('BranchUser', 'BranchUser', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'BranchUsers');
        $this->addRelation('Departamentmember', 'Departamentmember', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Departamentmembers');
        $this->addRelation('Loguser', 'Loguser', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Logusers');
        $this->addRelation('Mlquestion', 'Mlquestion', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Mlquestions');
        $this->addRelation('Productionuser', 'Productionuser', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Productionusers');
        $this->addRelation('Projectactivitypost', 'Projectactivitypost', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Projectactivityposts');
        $this->addRelation('Projectactivityuser', 'Projectactivityuser', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Projectactivityusers');
        $this->addRelation('Staff', 'Staff', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Staffs');
        $this->addRelation('Token', 'Token', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Tokens');
        $this->addRelation('Useraccesslog', 'Useraccesslog', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), null, null, 'Useraccesslogs');
        $this->addRelation('Useracl', 'Useracl', RelationMap::ONE_TO_MANY, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE', 'Useracls');
    } // buildRelations()

} // UserTableMap
