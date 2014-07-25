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
        $this->addColumn('shipping_date', 'ShippingDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('shipping_datecompromise', 'ShippingDatecompromise', 'TIMESTAMP', false, null, null);
        $this->addColumn('shipping_daterealdelivery', 'ShippingDaterealdelivery', 'TIMESTAMP', false, null, null);
        $this->addColumn('shipping_status', 'ShippingStatus', 'CHAR', true, null, 'pending');
        $this->getColumn('shipping_status', false)->setValueSet(array (
  0 => 'pending',
  1 => 'transit',
  2 => 'complete',
));
        $this->addColumn('sender_iso_codecountry', 'SenderIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('sender_iso_codephone', 'SenderIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('sender_name', 'SenderName', 'VARCHAR', false, 145, null);
        $this->addColumn('sender_addressee_cellular', 'SenderAddresseeCellular', 'VARCHAR', false, 18, null);
        $this->addColumn('sender_addressee_phone', 'SenderAddresseePhone', 'VARCHAR', false, 18, null);
        $this->addColumn('sender_address', 'SenderAddress', 'VARCHAR', false, 145, null);
        $this->addColumn('sender_address2', 'SenderAddress2', 'VARCHAR', false, 145, null);
        $this->addColumn('sender_city', 'SenderCity', 'VARCHAR', false, 145, null);
        $this->addColumn('sender_state', 'SenderState', 'VARCHAR', false, 145, null);
        $this->addColumn('sender_zipcode', 'SenderZipcode', 'VARCHAR', false, 5, null);
        $this->addColumn('addressee_iso_codecountry', 'AddresseeIsoCodecountry', 'VARCHAR', false, 5, null);
        $this->addColumn('addressee_iso_codephone', 'AddresseeIsoCodephone', 'VARCHAR', false, 5, null);
        $this->addColumn('addressee_name', 'AddresseeName', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_addressee_cellular', 'AddresseeAddresseeCellular', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_addressee_phone', 'AddresseeAddresseePhone', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_address', 'AddresseeAddress', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_address2', 'AddresseeAddress2', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_city', 'AddresseeCity', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_state', 'AddresseeState', 'VARCHAR', false, 145, null);
        $this->addColumn('addressee_zipcode', 'AddresseeZipcode', 'VARCHAR', false, 5, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Ordershipping', 'Ordershipping', RelationMap::ONE_TO_MANY, array('idshipping' => 'idshipping', ), 'CASCADE', 'CASCADE', 'Ordershippings');
        $this->addRelation('ShippingHistory', 'ShippingHistory', RelationMap::ONE_TO_MANY, array('idshipping' => 'idshipping', ), 'CASCADE', 'CASCADE', 'ShippingHistorys');
    } // buildRelations()

} // ShippingTableMap
