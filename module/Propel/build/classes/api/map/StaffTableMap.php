<?php



/**
 * This class defines the structure of the 'staff' table.
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
class StaffTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.StaffTableMap';

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
        $this->setName('staff');
        $this->setPhpName('Staff');
        $this->setClassname('Staff');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idstaff', 'Idstaff', 'INTEGER', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('staff_firstname', 'StaffFirstname', 'VARCHAR', false, 145, null);
        $this->addColumn('staff_lastname', 'StaffLastname', 'VARCHAR', false, 145, null);
        $this->addColumn('staff_email', 'StaffEmail', 'VARCHAR', false, 45, null);
        $this->addColumn('staff_email2', 'StaffEmail2', 'VARCHAR', false, 45, null);
        $this->addColumn('staff_phone', 'StaffPhone', 'VARCHAR', false, 45, null);
        $this->addColumn('staff_cellular', 'StaffCellular', 'VARCHAR', false, 45, null);
        $this->addColumn('staff_language', 'StaffLanguage', 'VARCHAR', true, 45, 'es_MX');
        $this->addColumn('staff_iso_codecountry', 'StaffIsoCodecountry', 'VARCHAR', true, 5, 'MX');
        $this->addColumn('staff_iso_codephone', 'StaffIsoCodephone', 'VARCHAR', true, 5, '+52');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // StaffTableMap
