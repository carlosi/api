<?php



/**
 * This class defines the structure of the 'ordercomment' table.
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
class OrdercommentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrdercommentTableMap';

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
        $this->setName('ordercomment');
        $this->setPhpName('Ordercomment');
        $this->setClassname('Ordercomment');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idordercomment', 'Idordercomment', 'INTEGER', true, null, null);
        $this->addForeignKey('idorder', 'Idorder', 'INTEGER', 'order', 'idorder', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('ordercomment_note', 'OrdercommentNote', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ordercomment_date', 'OrdercommentDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Order', 'Order', RelationMap::MANY_TO_ONE, array('idorder' => 'idorder', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // OrdercommentTableMap
