<?php



/**
 * This class defines the structure of the 'chatcorp_attachedfile' table.
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
class ChatcorpAttachedfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ChatcorpAttachedfileTableMap';

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
        $this->setName('chatcorp_attachedfile');
        $this->setPhpName('ChatcorpAttachedfile');
        $this->setClassname('ChatcorpAttachedfile');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idchatcorp_attachedfile', 'IdchatcorpAttachedfile', 'INTEGER', true, null, null);
        $this->addForeignKey('idchatcorp', 'Idchatcorp', 'INTEGER', 'chatcorp', 'idchatcorp', true, null, null);
        $this->addColumn('chatcorp_attachedfile_url', 'ChatcorpAttachedfileUrl', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Chatcorp', 'Chatcorp', RelationMap::MANY_TO_ONE, array('idchatcorp' => 'idchatcorp', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ChatcorpAttachedfileTableMap
