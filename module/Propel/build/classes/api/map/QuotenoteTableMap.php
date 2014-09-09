<?php



/**
 * This class defines the structure of the 'quotenote' table.
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
class QuotenoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.QuotenoteTableMap';

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
        $this->setName('quotenote');
        $this->setPhpName('Quotenote');
        $this->setClassname('Quotenote');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idquotenote', 'Idquotenote', 'INTEGER', true, null, null);
        $this->addColumn('iduser', 'Iduser', 'INTEGER', true, null, null);
        $this->addColumn('idquote', 'Idquote', 'INTEGER', true, null, null);
        $this->addColumn('quotenote_note', 'QuotenoteNote', 'LONGVARCHAR', true, null, null);
        $this->addColumn('quotenote_date', 'QuotenoteDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // QuotenoteTableMap
