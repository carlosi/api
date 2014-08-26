<?php



/**
 * This class defines the structure of the 'marketingprospection' table.
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
class MarketingprospectionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingprospectionTableMap';

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
        $this->setName('marketingprospection');
        $this->setPhpName('Marketingprospection');
        $this->setClassname('Marketingprospection');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmarketingprospection', 'Idmarketingprospection', 'INTEGER', true, null, null);
        $this->addForeignKey('idmarketingcampaignclient', 'Idmarketingcampaignclient', 'INTEGER', 'marketingcampaignclient', 'idmarketingcampaignclient', true, null, null);
        $this->addColumn('marketingprospection_saleexpectation', 'MarketingprospectionSaleexpectation', 'DECIMAL', true, 10, 0);
        $this->addColumn('marketingprospection_levelexpectation', 'MarketingprospectionLevelexpectation', 'INTEGER', true, null, 3);
        $this->addColumn('marketingprospection_startdate', 'MarketingprospectionStartdate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Marketingcampaignclient', 'Marketingcampaignclient', RelationMap::MANY_TO_ONE, array('idmarketingcampaignclient' => 'idmarketingcampaignclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Marketingprospectionuser', 'Marketingprospectionuser', RelationMap::ONE_TO_MANY, array('idmarketingprospection' => 'idmarketingprospection', ), null, null, 'Marketingprospectionusers');
    } // buildRelations()

} // MarketingprospectionTableMap
