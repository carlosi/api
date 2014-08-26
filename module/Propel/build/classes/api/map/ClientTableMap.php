<?php



/**
 * This class defines the structure of the 'client' table.
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
class ClientTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ClientTableMap';

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
        $this->setName('client');
        $this->setPhpName('Client');
        $this->setClassname('Client');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclient', 'Idclient', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('client_iso_codecountry', 'ClientIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('client_iso_codephone', 'ClientIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('client_fullname', 'ClientFullname', 'VARCHAR', true, 245, null);
        $this->addColumn('client_email', 'ClientEmail', 'VARCHAR', false, 65, null);
        $this->addColumn('client_email2', 'ClientEmail2', 'VARCHAR', false, 65, null);
        $this->addColumn('client_password', 'ClientPassword', 'LONGVARCHAR', false, null, null);
        $this->addColumn('client_cellular', 'ClientCellular', 'VARCHAR', false, 16, null);
        $this->addColumn('client_phone', 'ClientPhone', 'VARCHAR', false, 16, null);
        $this->addColumn('client_language', 'ClientLanguage', 'VARCHAR', false, 6, null);
        $this->addColumn('client_status', 'ClientStatus', 'CHAR', true, null, null);
        $this->getColumn('client_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'active',
  2 => 'suspended',
  3 => 'fraud',
));
        $this->addColumn('client_type', 'ClientType', 'CHAR', false, null, 'NORMAL');
        $this->getColumn('client_type', false)->setValueSet(array (
  0 => 'NORMAL',
  1 => 'GENERALPUBLIC',
  2 => 'INVENTORYMANAGER',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Chatpublic', 'Chatpublic', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Chatpublics');
        $this->addRelation('Clientaddress', 'Clientaddress', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Clientaddresss');
        $this->addRelation('Clientcomment', 'Clientcomment', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Clientcomments');
        $this->addRelation('Clientfile', 'Clientfile', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Clientfiles');
        $this->addRelation('Clienttax', 'Clienttax', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Clienttaxs');
        $this->addRelation('Marketingcampaignclient', 'Marketingcampaignclient', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Marketingcampaignclients');
        $this->addRelation('Marketingcandidate', 'Marketingcandidate', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Marketingcandidates');
        $this->addRelation('Order', 'Order', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE', 'Orders');
    } // buildRelations()

} // ClientTableMap
