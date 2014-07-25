<?php



/**
 * This class defines the structure of the 'company' table.
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
class CompanyTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.CompanyTableMap';

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
        $this->setName('company');
        $this->setPhpName('Company');
        $this->setClassname('Company');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcompany', 'Idcompany', 'INTEGER', true, null, null);
        $this->addColumn('company_name', 'CompanyName', 'VARCHAR', true, 65, null);
        $this->addColumn('company_timezone', 'CompanyTimezone', 'VARCHAR', false, 65, null);
        $this->addColumn('company_iso_codecountry', 'CompanyIsoCodecountry', 'VARCHAR', false, 65, null);
        $this->addColumn('company_address', 'CompanyAddress', 'VARCHAR', false, 65, null);
        $this->addColumn('company_address2', 'CompanyAddress2', 'VARCHAR', false, 65, null);
        $this->addColumn('company_city', 'CompanyCity', 'VARCHAR', false, 65, null);
        $this->addColumn('company_state', 'CompanyState', 'VARCHAR', false, 65, null);
        $this->addColumn('company_zipcode', 'CompanyZipcode', 'VARCHAR', false, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Bankaccount', 'Bankaccount', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Bankaccounts');
        $this->addRelation('Branch', 'Branch', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Branchs');
        $this->addRelation('Client', 'Client', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Clients');
        $this->addRelation('Companyaddress', 'Companyaddress', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Companyaddresss');
        $this->addRelation('Contactgroup', 'Contactgroup', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Contactgroups');
        $this->addRelation('Department', 'Department', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Departments');
        $this->addRelation('Expensecategory', 'Expensecategory', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Expensecategorys');
        $this->addRelation('Mxtaxinfo', 'Mxtaxinfo', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Mxtaxinfos');
        $this->addRelation('Productionline', 'Productionline', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Productionlines');
        $this->addRelation('Productionteam', 'Productionteam', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Productionteams');
        $this->addRelation('Productmain', 'Productmain', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Productmains');
        $this->addRelation('User', 'User', RelationMap::ONE_TO_MANY, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE', 'Users');
    } // buildRelations()

} // CompanyTableMap
