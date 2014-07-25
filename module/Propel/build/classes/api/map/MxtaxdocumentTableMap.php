<?php



/**
 * This class defines the structure of the 'mxtaxdocument' table.
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
class MxtaxdocumentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.MxtaxdocumentTableMap';

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
        $this->setName('mxtaxdocument');
        $this->setPhpName('Mxtaxdocument');
        $this->setClassname('Mxtaxdocument');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idmxtaxdocument', 'Idmxtaxdocument', 'INTEGER', true, null, null);
        $this->addForeignKey('idclienttax', 'Idclienttax', 'INTEGER', 'clienttax', 'idclienttax', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addColumn('mxtaxdocument_folio', 'MxtaxdocumentFolio', 'VARCHAR', false, 45, null);
        $this->addColumn('mxtaxdocument_version', 'MxtaxdocumentVersion', 'VARCHAR', true, 45, null);
        $this->addColumn('mxtaxdocument_type', 'MxtaxdocumentType', 'CHAR', true, null, null);
        $this->getColumn('mxtaxdocument_type', false)->setValueSet(array (
  0 => 'ingreso',
  1 => 'egreso',
));
        $this->addColumn('mxtaxdocument_status', 'MxtaxdocumentStatus', 'CHAR', true, null, 'CREATED');
        $this->getColumn('mxtaxdocument_status', false)->setValueSet(array (
  0 => 'CREATED',
  1 => 'CANCELLED',
));
        $this->addColumn('mxtaxdocument_url_xml', 'MxtaxdocumentUrlXml', 'LONGVARCHAR', false, null, null);
        $this->addColumn('mxtaxdocument_url_pdf', 'MxtaxdocumentUrlPdf', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Clienttax', 'Clienttax', RelationMap::MANY_TO_ONE, array('idclienttax' => 'idclienttax', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // MxtaxdocumentTableMap
