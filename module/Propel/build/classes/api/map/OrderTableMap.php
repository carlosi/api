<?php



/**
 * This class defines the structure of the 'order' table.
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
class OrderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrderTableMap';

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
        $this->setName('order');
        $this->setPhpName('Order');
        $this->setClassname('Order');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idorder', 'Idorder', 'INTEGER', true, null, null);
        $this->addForeignKey('idbranch', 'Idbranch', 'INTEGER', 'branch', 'idbranch', true, null, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'DATE', true, null, null);
        $this->addColumn('order_capture', 'OrderCapture', 'CHAR', true, null, 'incomplete');
        $this->getColumn('order_capture', false)->setValueSet(array (
  0 => 'complete',
  1 => 'incomplete',
));
        $this->addColumn('order_payment', 'OrderPayment', 'CHAR', true, null, null);
        $this->getColumn('order_payment', false)->setValueSet(array (
  0 => 'paid',
  1 => 'unpaid',
));
        $this->addColumn('order_paymentmode', 'OrderPaymentmode', 'CHAR', true, null, 'unique');
        $this->getColumn('order_paymentmode', false)->setValueSet(array (
  0 => 'unique',
  1 => 'partial',
));
        $this->addColumn('order_delivery', 'OrderDelivery', 'CHAR', true, null, 'SHIPMODE');
        $this->getColumn('order_delivery', false)->setValueSet(array (
  0 => 'LOCALMODE',
  1 => 'SHIPMODE',
  2 => 'TRANSIT',
  3 => 'FINISHED',
  4 => 'TRANSITTOBRANCH',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Branch', 'Branch', RelationMap::MANY_TO_ONE, array('idbranch' => 'idbranch', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Bankordertransaction', 'Bankordertransaction', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Bankordertransactions');
        $this->addRelation('Mxtaxdocument', 'Mxtaxdocument', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Mxtaxdocuments');
        $this->addRelation('Ordercomment', 'Ordercomment', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Ordercomments');
        $this->addRelation('Orderfile', 'Orderfile', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Orderfiles');
        $this->addRelation('Orderitem', 'Orderitem', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Orderitems');
        $this->addRelation('Orderrecord', 'Orderrecord', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Orderrecords');
        $this->addRelation('Ordershipping', 'Ordershipping', RelationMap::ONE_TO_MANY, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE', 'Ordershippings');
    } // buildRelations()

} // OrderTableMap
