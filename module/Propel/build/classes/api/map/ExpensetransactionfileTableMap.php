<?php



/**
 * This class defines the structure of the 'expensetransactionfile' table.
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
class ExpensetransactionfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ExpensetransactionfileTableMap';

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
        $this->setName('expensetransactionfile');
        $this->setPhpName('Expensetransactionfile');
        $this->setClassname('Expensetransactionfile');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idexpensetransactionfile', 'Idexpensetransactionfile', 'INTEGER', true, null, null);
        $this->addForeignKey('idexpensetransaction', 'Idexpensetransaction', 'INTEGER', 'expensetransaction', 'idexpensetransaction', true, null, null);
        $this->addColumn('expensetransactionfile_url', 'ExpensetransactionfileUrl', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Expensetransaction', 'Expensetransaction', RelationMap::MANY_TO_ONE, array('idexpensetransaction' => 'idexpensetransaction', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ExpensetransactionfileTableMap
