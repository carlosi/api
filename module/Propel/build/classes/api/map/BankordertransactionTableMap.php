<?php



/**
 * This class defines the structure of the 'bankordertransaction' table.
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
class BankordertransactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.BankordertransactionTableMap';

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
        $this->setName('bankordertransaction');
        $this->setPhpName('Bankordertransaction');
        $this->setClassname('Bankordertransaction');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idbankordertransaction', 'Idbankordertransaction', 'INTEGER', true, null, null);
        $this->addForeignKey('idbankaccount', 'Idbankaccount', 'INTEGER', 'bankaccount', 'idbankaccount', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addColumn('bankordertransaction_amount', 'BankordertransactionAmount', 'DECIMAL', true, 10, 0);
        $this->addColumn('bankordertransaction_date', 'BankordertransactionDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('bankordertransaction_paymentmethod', 'BankordertransactionPaymentmethod', 'CHAR', true, null, 'No identificado');
        $this->getColumn('bankordertransaction_paymentmethod', false)->setValueSet(array (
  0 => 'No identificado',
  1 => 'transferencia electrónica',
  2 => 'efectivo',
  3 => 'Tarjeta de crédito',
  4 => 'Tarjeta de débito',
  5 => 'Cheque nomitativo',
  6 => 'monedero electrónico',
));
        $this->addColumn('bankordertransaction_last4of_account', 'BankordertransactionLast4ofAccount', 'VARCHAR', true, 4, '0000');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Bankaccount', 'Bankaccount', RelationMap::MANY_TO_ONE, array('idbankaccount' => 'idbankaccount', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // BankordertransactionTableMap
