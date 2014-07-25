<?php



/**
 * This class defines the structure of the 'chatpublic' table.
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
class ChatpublicTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ChatpublicTableMap';

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
        $this->setName('chatpublic');
        $this->setPhpName('Chatpublic');
        $this->setClassname('Chatpublic');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idchatpublic', 'Idchatpublic', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', false, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', false, null, null);
        $this->addColumn('chatpublic_message', 'ChatpublicMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('chatpublic_date', 'ChatpublicDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ChatpublicpAttachedfile', 'ChatpublicpAttachedfile', RelationMap::ONE_TO_MANY, array('idchatpublic' => 'idchatpublic', ), 'CASCADE', 'CASCADE', 'ChatpublicpAttachedfiles');
    } // buildRelations()

} // ChatpublicTableMap
