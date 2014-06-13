<?php



/**
 * This class defines the structure of the 'shipping' table.
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
class ShippingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.ShippingTableMap';

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
        $this->setName('shipping');
        $this->setPhpName('Shipping');
        $this->setClassname('Shipping');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idshipping', 'Idshipping', 'INTEGER', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addColumn('shipping_address', 'ShippingAddress', 'LONGVARCHAR', false, null, null);
        $this->addColumn('shipping_tracking', 'ShippingTracking', 'VARCHAR', false, 45, null);
        $this->addColumn('transport_company', 'TransportCompany', 'CHAR', false, null, null);
        $this->getColumn('transport_company', false)->setValueSet(array (
  0 => 'FEDEX',
  1 => 'ESTAFETA',
  2 => 'DHL',
  3 => 'UPS',
  4 => 'PRIVATE',
  5 => 'OTHER',
  6 => 'EMS',
  7 => 'CORREOS DE MÉXICO',
  8 => 'SEPOMEX',
));
        $this->addColumn('shipping_date', 'ShippingDate', 'DATE', true, null, null);
        $this->addColumn('shipping_datecompromise', 'ShippingDatecompromise', 'DATE', false, null, null);
        $this->addColumn('shipping_daterealdelivery', 'ShippingDaterealdelivery', 'DATE', false, null, null);
        $this->addColumn('shipping_iso_codecountry', 'ShippingIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('shipping_iso_codephone', 'ShippingIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('shipping_addressee', 'ShippingAddressee', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_addressee_cellular', 'ShippingAddresseeCellular', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_addressee_phone', 'ShippingAddresseePhone', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_address2', 'ShippingAddress2', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_city', 'ShippingCity', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_state', 'ShippingState', 'VARCHAR', false, 145, null);
        $this->addColumn('shipping_zipcode', 'ShippingZipcode', 'VARCHAR', false, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ShippingTableMap
