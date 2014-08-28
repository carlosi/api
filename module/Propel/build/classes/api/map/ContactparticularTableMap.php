<?php



/**
 * This class defines the structure of the 'contactparticular' table.
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
class ContactparticularTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ContactparticularTableMap';

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
        $this->setName('contactparticular');
        $this->setPhpName('Contactparticular');
        $this->setClassname('Contactparticular');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcontactparticular', 'Idcontactparticular', 'INTEGER', true, null, null);
        $this->addForeignKey('idcontactgeneral', 'Idcontactgeneral', 'INTEGER', 'contactgeneral', 'idcontactgeneral', true, null, null);
        $this->addColumn('contactparticular_iso_codecountry', 'ContactparticularIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('contactparticular_name', 'ContactparticularName', 'VARCHAR', false, 245, null);
        $this->addColumn('contactparticular_iso_codephone', 'ContactparticularIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('contactparticular_cellular', 'ContactparticularCellular', 'VARCHAR', false, 45, null);
        $this->addColumn('contactparticular_phone', 'ContactparticularPhone', 'VARCHAR', false, 45, null);
        $this->addColumn('contactparticular_phone_extention', 'ContactparticularPhoneExtention', 'VARCHAR', false, 45, null);
        $this->addColumn('contactparticular_position', 'ContactparticularPosition', 'VARCHAR', false, 245, null);
        $this->addColumn('contactparticular_note', 'ContactparticularNote', 'LONGVARCHAR', false, null, null);
        $this->addColumn('contactparticular_email', 'ContactparticularEmail', 'VARCHAR', false, 145, null);
        $this->addColumn('contactparticular_email2', 'ContactparticularEmail2', 'VARCHAR', false, 145, null);
        $this->addColumn('contactparticular_address', 'ContactparticularAddress', 'VARCHAR', false, 245, null);
        $this->addColumn('contactparticular_address2', 'ContactparticularAddress2', 'VARCHAR', false, 245, null);
        $this->addColumn('contactparticular_city', 'ContactparticularCity', 'VARCHAR', false, 145, null);
        $this->addColumn('contactparticular_state', 'ContactparticularState', 'VARCHAR', false, 145, null);
        $this->addColumn('contactparticular_zipcode', 'ContactparticularZipcode', 'VARCHAR', false, 5, null);
        $this->addColumn('contactparticular_lastupdate', 'ContactparticularLastupdate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Contactgeneral', 'Contactgeneral', RelationMap::MANY_TO_ONE, array('idcontactgeneral' => 'idcontactgeneral', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ContactparticularTableMap
