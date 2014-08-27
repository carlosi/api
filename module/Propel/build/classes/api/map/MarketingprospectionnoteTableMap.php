<?php



/**
 * This class defines the structure of the 'marketingprospectionnote' table.
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
class MarketingprospectionnoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingprospectionnoteTableMap';

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
        $this->setName('marketingprospectionnote');
        $this->setPhpName('Marketingprospectionnote');
        $this->setClassname('Marketingprospectionnote');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmarketingprospectionnote', 'Idmarketingprospectionnote', 'INTEGER', true, null, null);
        $this->addForeignKey('idmarketingprospectionuser', 'Idmarketingprospectionuser', 'INTEGER', 'marketingprospectionuser', 'idmarketingprospectionuser', true, null, null);
        $this->addColumn('marketingprospectionnote_note', 'MarketingprospectionnoteNote', 'LONGVARCHAR', true, null, null);
        $this->addColumn('marketingprospectionnote_date', 'MarketingprospectionnoteDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Marketingprospectionuser', 'Marketingprospectionuser', RelationMap::MANY_TO_ONE, array('idmarketingprospectionuser' => 'idmarketingprospectionuser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MarketingprospectionnoteTableMap
