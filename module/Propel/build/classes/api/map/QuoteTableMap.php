<?php



/**
 * This class defines the structure of the 'quote' table.
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
class QuoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.QuoteTableMap';

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
        $this->setName('quote');
        $this->setPhpName('Quote');
        $this->setClassname('Quote');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idquote', 'Idquote', 'INTEGER', true, null, null);
        $this->addForeignKey('idtriggerprospection', 'Idtriggerprospection', 'INTEGER', 'triggerprospection', 'idtriggerprospection', true, null, null);
        $this->addColumn('quote_dateexpiration', 'QuoteDateexpiration', 'TIMESTAMP', true, null, null);
        $this->addColumn('quote_status', 'QuoteStatus', 'CHAR', true, null, 'active');
        $this->getColumn('quote_status', false)->setValueSet(array (
  0 => 'active',
  1 => 'rejected',
  2 => 'canceled',
  3 => 'sold',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Triggerprospection', 'Triggerprospection', RelationMap::MANY_TO_ONE, array('idtriggerprospection' => 'idtriggerprospection', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Quoteitem', 'Quoteitem', RelationMap::ONE_TO_MANY, array('idquote' => 'idquote', ), 'CASCADE', 'CASCADE', 'Quoteitems');
        $this->addRelation('Quoutenote', 'Quoutenote', RelationMap::ONE_TO_MANY, array('idquote' => 'idquote', ), null, null, 'Quoutenotes');
    } // buildRelations()

} // QuoteTableMap
