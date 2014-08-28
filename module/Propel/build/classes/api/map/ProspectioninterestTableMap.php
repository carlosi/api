<?php



/**
 * This class defines the structure of the 'prospectioninterest' table.
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
class ProspectioninterestTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ProspectioninterestTableMap';

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
        $this->setName('prospectioninterest');
        $this->setPhpName('Prospectioninterest');
        $this->setClassname('Prospectioninterest');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idprospectioninterest', 'Idprospectioninterest', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addForeignKey('idtriggerprospection', 'Idtriggerprospection', 'INTEGER', 'triggerprospection', 'idtriggerprospection', true, null, null);
        $this->addColumn('prospectioninterest_level', 'ProspectioninterestLevel', 'CHAR', true, null, '3');
        $this->getColumn('prospectioninterest_level', false)->setValueSet(array (
  0 => '1',
  1 => '2',
  2 => '3',
  3 => '4',
  4 => '5',
  5 => '6',
  6 => '7',
  7 => '8',
  8 => '9',
  9 => '10',
));
        $this->addColumn('prospectioninterest_date', 'ProspectioninterestDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('prospectioninterest_note', 'ProspectioninterestNote', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Triggerprospection', 'Triggerprospection', RelationMap::MANY_TO_ONE, array('idtriggerprospection' => 'idtriggerprospection', ), 'CASCADE', 'CASCADE');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ProspectioninterestTableMap
