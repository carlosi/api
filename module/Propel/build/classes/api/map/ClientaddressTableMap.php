<?php



/**
 * This class defines the structure of the 'clientaddress' table.
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
class ClientaddressTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ClientaddressTableMap';

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
        $this->setName('clientaddress');
        $this->setPhpName('Clientaddress');
        $this->setClassname('Clientaddress');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclientaddress', 'Idclientaddress', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('clientaddress_iso_codecountry', 'ClientaddressIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('clientaddress_iso_codephone', 'ClientaddressIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('clientaddress_addressee', 'ClientaddressAddressee', 'VARCHAR', true, 45, null);
        $this->addColumn('clientaddress_addressee_cellular', 'ClientaddressAddresseeCellular', 'VARCHAR', false, 16, null);
        $this->addColumn('clientaddress_addressee_phone', 'ClientaddressAddresseePhone', 'VARCHAR', false, 16, null);
        $this->addColumn('clientaddress_address', 'ClientaddressAddress', 'VARCHAR', true, 45, null);
        $this->addColumn('clientaddress_address2', 'ClientaddressAddress2', 'VARCHAR', false, 45, null);
        $this->addColumn('clientaddress_city', 'ClientaddressCity', 'VARCHAR', true, 45, null);
        $this->addColumn('clientaddress_state', 'ClientaddressState', 'VARCHAR', true, 45, null);
        $this->addColumn('clientaddress_zipcode', 'ClientaddressZipcode', 'VARCHAR', true, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ClientaddressTableMap
