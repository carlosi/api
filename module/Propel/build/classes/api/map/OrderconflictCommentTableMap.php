<?php



/**
 * This class defines the structure of the 'orderconflict_comment' table.
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
class OrderconflictCommentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'api.map.OrderconflictCommentTableMap';

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
        $this->setName('orderconflict_comment');
        $this->setPhpName('OrderconflictComment');
        $this->setClassname('OrderconflictComment');
        $this->setPackage('api');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idorderconflict_comment', 'IdorderconflictComment', 'INTEGER', true, null, null);
        $this->addForeignKey('idorderconflict', 'Idorderconflict', 'INTEGER', 'orderconflict', 'idorderconflict', true, null, null);
        $this->addForeignKey('iduser', 'Iduser', 'INTEGER', 'user', 'iduser', true, null, null);
        $this->addColumn('orderconflict_comment', 'OrderconflictComment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('orderconflict_comment_date', 'OrderconflictCommentDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Orderconflict', 'Orderconflict', RelationMap::MANY_TO_ONE, array('idorderconflict' => 'idorderconflict', ), 'CASCADE', 'CASCADE');
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('iduser' => 'iduser', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // OrderconflictCommentTableMap
