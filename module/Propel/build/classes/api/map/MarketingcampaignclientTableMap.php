<?php



/**
 * This class defines the structure of the 'marketingcampaignclient' table.
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
class MarketingcampaignclientTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingcampaignclientTableMap';

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
        $this->setName('marketingcampaignclient');
        $this->setPhpName('Marketingcampaignclient');
        $this->setClassname('Marketingcampaignclient');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idmarketingcampaignclient', 'Idmarketingcampaignclient', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addForeignKey('idmarketingcampaign', 'Idmarketingcampaign', 'INTEGER', 'marketingcampaign', 'idmarketingcampaign', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Marketingcampaign', 'Marketingcampaign', RelationMap::MANY_TO_ONE, array('idmarketingcampaign' => 'idmarketingcampaign', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Marketingprospection', 'Marketingprospection', RelationMap::ONE_TO_MANY, array('idmarketingcampaignclient' => 'idmarketingcampaignclient', ), 'CASCADE', 'CASCADE', 'Marketingprospections');
    } // buildRelations()

} // MarketingcampaignclientTableMap
