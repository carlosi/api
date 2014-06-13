<?php



/**
 * This class defines the structure of the 'token' table.
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
class TokenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.TokenTableMap';

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
        $this->setName('token');
        $this->setPhpName('Token');
        $this->setClassname('Token');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idtoken', 'Idtoken', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('token', 'Token', 'LONGVARCHAR', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('expires_in', 'ExpiresIn', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // TokenTableMap
