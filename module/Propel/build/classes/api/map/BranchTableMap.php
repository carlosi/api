<?php



/**
 * This class defines the structure of the 'branch' table.
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
class BranchTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BranchTableMap';

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
        $this->setName('branch');
        $this->setPhpName('Branch');
        $this->setClassname('Branch');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idbranch', 'Idbranch', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('branch_name', 'BranchName', 'VARCHAR', true, 255, null);
        $this->addColumn('branch_timezone', 'BranchTimezone', 'VARCHAR', false, 45, null);
        $this->addColumn('branch_iso_codecountry', 'BranchIsoCodecountry', 'VARCHAR', false, 45, null);
        $this->addColumn('branch_address', 'BranchAddress', 'VARCHAR', false, 65, null);
        $this->addColumn('branch_address2', 'BranchAddress2', 'VARCHAR', false, 65, null);
        $this->addColumn('branch_city', 'BranchCity', 'VARCHAR', false, 65, null);
        $this->addColumn('branch_state', 'BranchState', 'VARCHAR', false, 45, null);
        $this->addColumn('branch_zipcode', 'BranchZipcode', 'VARCHAR', false, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('BranchUserAcl', 'BranchUserAcl', RelationMap::ONE_TO_MANY, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE', 'BranchUserAcls');
        $this->addRelation('Branchdepartment', 'Branchdepartment', RelationMap::ONE_TO_MANY, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE', 'Branchdepartments');
        $this->addRelation('Order', 'Order', RelationMap::ONE_TO_MANY, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE', 'Orders');
    } // buildRelations()

} // BranchTableMap
