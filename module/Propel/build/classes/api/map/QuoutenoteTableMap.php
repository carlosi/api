<?php



/**
 * This class defines the structure of the 'quoutenote' table.
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
class QuoutenoteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.QuoutenoteTableMap';

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
        $this->setName('quoutenote');
        $this->setPhpName('Quoutenote');
        $this->setClassname('Quoutenote');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idquoutenote', 'Idquoutenote', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addForeignKey('idquote', 'Idquote', 'INTEGER', 'quote', 'idquote', true, null, null);
        $this->addColumn('quoutenote_note', 'QuoutenoteNote', 'LONGVARCHAR', true, null, null);
        $this->addColumn('quoutenote_date', 'QuoutenoteDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Quote', 'Quote', RelationMap::MANY_TO_ONE, array('idquote' => 'idquote', ), null, null);
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // QuoutenoteTableMap
