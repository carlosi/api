<?php



/**
 * This class defines the structure of the 'chatpublicp_attachedfile' table.
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
class ChatpublicpAttachedfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ChatpublicpAttachedfileTableMap';

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
        $this->setName('chatpublicp_attachedfile');
        $this->setPhpName('ChatpublicpAttachedfile');
        $this->setClassname('ChatpublicpAttachedfile');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idchatpublicp_attachedfile', 'IdchatpublicpAttachedfile', 'INTEGER', true, null, null);
        $this->addForeignKey('idchatpublic', 'Idchatpublic', 'INTEGER', 'chatpublic', 'idchatpublic', true, null, null);
        $this->addColumn('chatpublicp_attachedfile_url', 'ChatpublicpAttachedfileUrl', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Chatpublic', 'Chatpublic', RelationMap::MANY_TO_ONE, array('idchatpublic' => 'idchatpublic', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ChatpublicpAttachedfileTableMap
