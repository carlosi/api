<?php



/**
 * This class defines the structure of the 'quoteitem' table.
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
class QuoteitemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.QuoteitemTableMap';

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
        $this->setName('quoteitem');
        $this->setPhpName('Quoteitem');
        $this->setClassname('Quoteitem');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idquoteitem', 'Idquoteitem', 'INTEGER', true, null, null);
        $this->addForeignKey('idquote', 'Idquote', 'INTEGER', 'quote', 'idquote', true, null, null);
        $this->addForeignKey('idproduct', 'Idproduct', 'INTEGER', 'product', 'idproduct', true, null, null);
        $this->addColumn('orderquote_quantity', 'OrderquoteQuantity', 'DECIMAL', true, 10, 0);
        $this->addColumn('orderquote_officialvalue', 'OrderquoteOfficialvalue', 'DECIMAL', true, 10, 0);
        $this->addColumn('orderquote_endvalue', 'OrderquoteEndvalue', 'DECIMAL', true, 10, 0);
        $this->addColumn('orderquote_note', 'OrderquoteNote', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('idproduct' => 'idproduct', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Quote', 'Quote', RelationMap::MANY_TO_ONE, array('idquote' => 'idquote', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // QuoteitemTableMap
