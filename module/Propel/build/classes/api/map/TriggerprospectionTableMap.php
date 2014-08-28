<?php



/**
 * This class defines the structure of the 'triggerprospection' table.
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
class TriggerprospectionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.TriggerprospectionTableMap';

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
        $this->setName('triggerprospection');
        $this->setPhpName('Triggerprospection');
        $this->setClassname('Triggerprospection');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idtriggerprospection', 'Idtriggerprospection', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('triggerprospection_date', 'TriggerprospectionDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('triggerprospection_by', 'TriggerprospectionBy', 'CHAR', true, null, 'user');
        $this->getColumn('triggerprospection_by', false)->setValueSet(array (
  0 => 'robot',
  1 => 'user',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Prospectioninterest', 'Prospectioninterest', RelationMap::ONE_TO_MANY, array('idtriggerprospection' => 'idtriggerprospection', ), 'CASCADE', 'CASCADE', 'Prospectioninterests');
        $this->addRelation('Quote', 'Quote', RelationMap::ONE_TO_MANY, array('idtriggerprospection' => 'idtriggerprospection', ), 'CASCADE', 'CASCADE', 'Quotes');
        $this->addRelation('Triggerprospectionnote', 'Triggerprospectionnote', RelationMap::ONE_TO_MANY, array('idtriggerprospection' => 'idtriggerprospection', ), null, null, 'Triggerprospectionnotes');
        $this->addRelation('Triggerprospectionuser', 'Triggerprospectionuser', RelationMap::ONE_TO_MANY, array('idtriggerprospection' => 'idtriggerprospection', ), null, null, 'Triggerprospectionusers');
    } // buildRelations()

} // TriggerprospectionTableMap
