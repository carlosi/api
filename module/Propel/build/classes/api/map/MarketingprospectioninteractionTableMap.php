<?php



/**
 * This class defines the structure of the 'marketingprospectioninteraction' table.
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
class MarketingprospectioninteractionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingprospectioninteractionTableMap';

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
        $this->setName('marketingprospectioninteraction');
        $this->setPhpName('Marketingprospectioninteraction');
        $this->setClassname('Marketingprospectioninteraction');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idmarketingprospectioninteraction', 'Idmarketingprospectioninteraction', 'INTEGER', true, null, null);
        $this->addForeignKey('idmarketingprospectionuser', 'Idmarketingprospectionuser', 'INTEGER', 'marketingprospectionuser', 'idmarketingprospectionuser', true, null, null);
        $this->addColumn('marketingprospectioninteraction_type', 'MarketingprospectioninteractionType', 'CHAR', true, null, 'undefined');
        $this->getColumn('marketingprospectioninteraction_type', false)->setValueSet(array (
  0 => 'visitfromclient',
  1 => 'call',
  2 => 'chat',
  3 => 'email',
  4 => 'visittoclient',
  5 => 'videocall',
  6 => 'undefined',
));
        $this->addColumn('marketingprospectioninteraction_date', 'MarketingprospectioninteractionDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('marketingprospectioninteraction_comment', 'MarketingprospectioninteractionComment', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Marketingprospectionuser', 'Marketingprospectionuser', RelationMap::MANY_TO_ONE, array('idmarketingprospectionuser' => 'idmarketingprospectionuser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MarketingprospectioninteractionTableMap
