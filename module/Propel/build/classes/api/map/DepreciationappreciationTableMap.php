<?php



/**
 * This class defines the structure of the 'depreciationappreciation' table.
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
class DepreciationappreciationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.DepreciationappreciationTableMap';

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
        $this->setName('depreciationappreciation');
        $this->setPhpName('Depreciationappreciation');
        $this->setClassname('Depreciationappreciation');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iddepreciationappreciation', 'Iddepreciationappreciation', 'INTEGER', true, null, null);
        $this->addColumn('idexpensetransaction', 'Idexpensetransaction', 'INTEGER', true, null, null);
        $this->addColumn('depreciationappreciation_amount', 'DepreciationappreciationAmount', 'DECIMAL', true, 10, 0);
        $this->addColumn('depreciationappreciation_cycle', 'DepreciationappreciationCycle', 'CHAR', true, null, 'annually');
        $this->getColumn('depreciationappreciation_cycle', false)->setValueSet(array (
  0 => 'weekly',
  1 => 'monthly',
  2 => 'semiannual',
  3 => 'annually',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // DepreciationappreciationTableMap
