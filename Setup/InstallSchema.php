<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Widgento\StorePickup\Api\Data\StoreLocationInterface;
use Widgento\StorePickup\Model\ResourceModel\StoreLocation;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @var StoreLocation
     */
    private $storeLocation;

    public function __construct(StoreLocation $storeLocation)
    {
        $this->storeLocation = $storeLocation;
    }

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $storeLocationTable = $setup->getConnection()
            ->newTable($this->storeLocation->getMainTable())
            ->addColumn(
                $this->storeLocation->getIdFieldName(),
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
            )
            ->addColumn(
                StoreLocationInterface::NAME,
                Table::TYPE_TEXT,
                250,
                ['nullable' => false]
            )
            ->addColumn(
                StoreLocationInterface::DESCRIPTION,
                Table::TYPE_TEXT,
                null,
                ['nullable' => true]
            )
            ->addColumn(
                StoreLocationInterface::PHONE_NUMBERS,
                Table::TYPE_TEXT,
                250,
                ['nullable' => true]
            )
            ->addColumn(
                StoreLocationInterface::ADDRESS,
                Table::TYPE_TEXT,
                250,
                ['nullable' => false]
            )
            ->addColumn(
                StoreLocationInterface::OPENING_HOURS,
                Table::TYPE_TEXT,
                null,
                ['nullable' => true]
            )
            ->addColumn(
                StoreLocationInterface::IS_ENABLED,
                Table::TYPE_BOOLEAN,
                null,
                ['nullable' => false, 'default' => true]
            )
        ;

        $setup->getConnection()->createTable($storeLocationTable);

        $setup->endSetup();
    }
}