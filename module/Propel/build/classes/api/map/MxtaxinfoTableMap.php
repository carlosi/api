<?php



/**
 * This class defines the structure of the 'mxtaxinfo' table.
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
class MxtaxinfoTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MxtaxinfoTableMap';

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
        $this->setName('mxtaxinfo');
        $this->setPhpName('Mxtaxinfo');
        $this->setClassname('Mxtaxinfo');
        $this->setPackage('api');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idmxtaxinfo', 'Idmxtaxinfo', 'INTEGER', true, null, null);
        $this->addForeignKey('idcompany', 'Idcompany', 'INTEGER', 'company', 'idcompany', true, null, null);
        $this->addColumn('mxtaxinfo_rfc', 'MxtaxinfoRfc', 'VARCHAR', true, 45, null);
        $this->addColumn('mxtaxinfo_razonsocial', 'MxtaxinfoRazonsocial', 'VARCHAR', true, 65, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Company', 'Company', RelationMap::MANY_TO_ONE, array('idcompany' => 'idcompany', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MxtaxinfoTableMap
