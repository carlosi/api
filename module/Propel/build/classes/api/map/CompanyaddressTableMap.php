<?php



/**
 * This class defines the structure of the 'companyaddress' table.
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
class CompanyaddressTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.CompanyaddressTableMap';

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
        $this->setName('companyaddress');
        $this->setPhpName('Companyaddress');
        $this->setClassname('Companyaddress');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcompanyaddress', 'Idcompanyaddress', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('companyaddress_iso_codecountry', 'CompanyaddressIsoCodecountry', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_iso_codephone', 'CompanyaddressIsoCodephone', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_addressee', 'CompanyaddressAddressee', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_addressee_cellular', 'CompanyaddressAddresseeCellular', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_addressee_phone', 'CompanyaddressAddresseePhone', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_address', 'CompanyaddressAddress', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_address2', 'CompanyaddressAddress2', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_city', 'CompanyaddressCity', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_state', 'CompanyaddressState', 'VARCHAR', false, 45, null);
        $this->addColumn('companyaddress_zipcode', 'CompanyaddressZipcode', 'VARCHAR', false, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // CompanyaddressTableMap
