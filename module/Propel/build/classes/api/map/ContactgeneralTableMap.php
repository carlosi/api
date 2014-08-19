<?php



/**
 * This class defines the structure of the 'contactgeneral' table.
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
class ContactgeneralTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ContactgeneralTableMap';

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
        $this->setName('contactgeneral');
        $this->setPhpName('Contactgeneral');
        $this->setClassname('Contactgeneral');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idcontactgeneral', 'Idcontactgeneral', 'INTEGER', true, null, null);
        $this->addForeignKey('idcontactgroup', 'Idcontactgroup', 'INTEGER', 'contactgroup', 'idcontactgroup', true, null, null);
        $this->addColumn('contactgeneral_name', 'ContactgeneralName', 'VARCHAR', true, 245, null);
        $this->addColumn('contactgeneral_iso_codephone', 'ContactgeneralIsoCodephone', 'VARCHAR', false, 45, null);
        $this->addColumn('contactgeneral_phone', 'ContactgeneralPhone', 'VARCHAR', false, 145, null);
        $this->addColumn('contactgeneral_email', 'ContactgeneralEmail', 'VARCHAR', false, 145, null);
        $this->addColumn('contactgeneral_address', 'ContactgeneralAddress', 'VARCHAR', false, 245, null);
        $this->addColumn('contactgeneral_address2', 'ContactgeneralAddress2', 'VARCHAR', false, 245, null);
        $this->addColumn('contactgeneral_city', 'ContactgeneralCity', 'VARCHAR', false, 145, null);
        $this->addColumn('contactgeneral_statate', 'ContactgeneralStatate', 'VARCHAR', false, 145, null);
        $this->addColumn('contactgeneral_iso_codecountry', 'ContactgeneralIsoCodecountry', 'VARCHAR', false, 45, null);
        $this->addColumn('contactgeneral_zipcode', 'ContactgeneralZipcode', 'VARCHAR', false, 5, null);
        $this->addColumn('contactgeneral_lastupdate', 'ContactgeneralLastupdate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Contactgroup', 'Contactgroup', RelationMap::MANY_TO_ONE, array('idcontactgroup' => 'idcontactgroup', ), null, null);
        $this->addRelation('Contactparticular', 'Contactparticular', RelationMap::ONE_TO_MANY, array('idcontactgeneral' => 'idcontactgeneral', ), 'CASCADE', 'CASCADE', 'Contactparticulars');
    } // buildRelations()

} // ContactgeneralTableMap
