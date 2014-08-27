<?php



/**
 * This class defines the structure of the 'clienttax' table.
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
class ClienttaxTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ClienttaxTableMap';

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
        $this->setName('clienttax');
        $this->setPhpName('Clienttax');
        $this->setClassname('Clienttax');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclienttax', 'Idclienttax', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('clienttax_iso_codecountry', 'ClienttaxIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('clienttax_iso_codephone', 'ClienttaxIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('clienttax_name', 'ClienttaxName', 'VARCHAR', true, 90, null);
        $this->addColumn('clienttax_taxesid', 'ClienttaxTaxesid', 'VARCHAR', true, 45, null);
        $this->addColumn('clienttax_address', 'ClienttaxAddress', 'VARCHAR', true, 45, null);
        $this->addColumn('clienttax_address2', 'ClienttaxAddress2', 'VARCHAR', false, 45, null);
        $this->addColumn('clienttax_city', 'ClienttaxCity', 'VARCHAR', true, 45, null);
        $this->addColumn('clienttax_state', 'ClienttaxState', 'VARCHAR', true, 45, null);
        $this->addColumn('clienttax_zipcode', 'ClienttaxZipcode', 'VARCHAR', true, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Mxtaxdocument', 'Mxtaxdocument', RelationMap::ONE_TO_MANY, array('idclienttax' => 'idclienttax', ), 'CASCADE', 'CASCADE', 'Mxtaxdocuments');
    } // buildRelations()

} // ClienttaxTableMap
