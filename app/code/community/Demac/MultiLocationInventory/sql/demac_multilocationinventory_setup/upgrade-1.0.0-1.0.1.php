<?php
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('demac_multilocationinventory/stock'))
    ->addColumn('stock_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Stock Id')
    ->addColumn('location_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
    ), 'Location ID')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false,
        'unsigned' => true,
    ), 'Product ID')
    ->addColumn('qty', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        'nullable' => false,
        'default'  => '0.0000',
    ), 'Qty')
    ->addColumn('backorders', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned' => true,
        'nullable' => false,
        'default'  => '0',
    ), 'Backorders')
    ->addColumn('use_config_backorders', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned' => true,
        'nullable' => false,
        'default'  => '1',
    ), 'Use Config Backorders')
    ->addColumn('is_in_stock', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned' => true,
        'nullable' => false,
        'default'  => '0',
    ), 'Is In Stock')
    ->addColumn('manage_stock', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned' => true,
        'nullable' => false,
        'default'  => '0',
    ), 'Manage Stock')
    ->addColumn('use_config_manage_stock', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned' => true,
        'nullable' => false,
        'default'  => '1',
    ), 'Use Config Manage Stock')
    ->addIndex($installer->getIdxName('demac_multilocationinventory/stock', array('product_id', 'location_id'), Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
               array('product_id', 'location_id'), array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
    )
    ->addForeignKey(
        $installer->getFkName('demac_multilocationinventory/stock', 'location_id',
                              'demac_multilocationinventory/location', 'id'), 'location_id',
        $installer->getTable('demac_multilocationinventory/location'), 'id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($installer->getFkName('demac_multilocationinventory/stock', 'product_id',
                                          'catalog/product', 'entity_id'), 'product_id',
                    $installer->getTable('catalog/product'), 'entity_id',
                    Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
    );

$installer->getConnection()->createTable($table);

$installer->endSetup();
