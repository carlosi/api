<?php



/**
 * This class defines the structure of the 'clientfile' table.
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
class ClientfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ClientfileTableMap';

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
        $this->setName('clientfile');
        $this->setPhpName('Clientfile');
        $this->setClassname('Clientfile');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclientfile', 'Idclientfile', 'INTEGER', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('clientfile_url', 'ClientfileUrl', 'LONGVARCHAR', true, null, null);
        $this->addColumn('clientfile_note', 'ClientfileNote', 'LONGVARCHAR', false, null, null);
        $this->addColumn('clientfile_uploaddate', 'ClientfileUploaddate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ClientfileTableMap
