<?php



/**
 * This class defines the structure of the 'marketingcampaign' table.
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
class MarketingcampaignTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingcampaignTableMap';

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
        $this->setName('marketingcampaign');
        $this->setPhpName('Marketingcampaign');
        $this->setClassname('Marketingcampaign');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmarketingcampaign', 'Idmarketingcampaign', 'INTEGER', true, null, null);
        $this->addForeignKey('idmarketingchannel', 'Idmarketingchannel', 'INTEGER', 'marketingchannel', 'idmarketingchannel', true, null, null);
        $this->addColumn('marketingcampaign_name', 'MarketingcampaignName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('marketingcampaign_created_at', 'MarketingcampaignCreatedAt', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Marketingchannel', 'Marketingchannel', RelationMap::MANY_TO_ONE, array('idmarketingchannel' => 'idmarketingchannel', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Marketingcampaignclient', 'Marketingcampaignclient', RelationMap::ONE_TO_MANY, array('idmarketingcampaign' => 'idmarketingcampaign', ), 'CASCADE', 'CASCADE', 'Marketingcampaignclients');
    } // buildRelations()

} // MarketingcampaignTableMap
