<?php



/**
 * This class defines the structure of the 'marketingprospectionuser' table.
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
class MarketingprospectionuserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MarketingprospectionuserTableMap';

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
        $this->setName('marketingprospectionuser');
        $this->setPhpName('Marketingprospectionuser');
        $this->setClassname('Marketingprospectionuser');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmarketingprospectionuser', 'Idmarketingprospectionuser', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addForeignKey('idmarketingprospection', 'Idmarketingprospection', 'INTEGER', 'marketingprospection', 'idmarketingprospection', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Marketingprospection', 'Marketingprospection', RelationMap::MANY_TO_ONE, array('idmarketingprospection' => 'idmarketingprospection', ), null, null);
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Marketingprospectioninteraction', 'Marketingprospectioninteraction', RelationMap::ONE_TO_MANY, array('idmarketingprospectionuser' => 'idmarketingprospectionuser', ), 'CASCADE', 'CASCADE', 'Marketingprospectioninteractions');
        $this->addRelation('Marketingprospectionnote', 'Marketingprospectionnote', RelationMap::ONE_TO_MANY, array('idmarketingprospectionuser' => 'idmarketingprospectionuser', ), 'CASCADE', 'CASCADE', 'Marketingprospectionnotes');
    } // buildRelations()

} // MarketingprospectionuserTableMap
