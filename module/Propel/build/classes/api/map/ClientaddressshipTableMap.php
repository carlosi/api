<?php



/**
 * This class defines the structure of the 'clientaddressship' table.
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
class ClientaddressshipTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ClientaddressshipTableMap';

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
        $this->setName('clientaddressship');
        $this->setPhpName('Clientaddressship');
        $this->setClassname('Clientaddressship');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclientaddressship', 'Idclientaddressship', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('clientaddressship_iso_codecountry', 'ClientaddressshipIsoCodecountry', 'VARCHAR', true, 5, null);
        $this->addColumn('clientaddressship_iso_codephone', 'ClientaddressshipIsoCodephone', 'VARCHAR', true, 5, null);
        $this->addColumn('clientaddressship_addressee', 'ClientaddressshipAddressee', 'VARCHAR', true, 145, null);
        $this->addColumn('clientaddressship_addressee_cellular', 'ClientaddressshipAddresseeCellular', 'VARCHAR', true, 18, null);
        $this->addColumn('clientaddressship_addressee_phone', 'ClientaddressshipAddresseePhone', 'VARCHAR', true, 18, null);
        $this->addColumn('clientaddressship_address', 'ClientaddressshipAddress', 'VARCHAR', true, 145, null);
        $this->addColumn('clientaddressship_address2', 'ClientaddressshipAddress2', 'VARCHAR', true, 145, null);
        $this->addColumn('clientaddressship_city', 'ClientaddressshipCity', 'VARCHAR', true, 145, null);
        $this->addColumn('clientaddressship_state', 'ClientaddressshipState', 'VARCHAR', true, 145, null);
        $this->addColumn('clientaddressship_zipcode', 'ClientaddressshipZipcode', 'VARCHAR', true, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ClientaddressshipTableMap
