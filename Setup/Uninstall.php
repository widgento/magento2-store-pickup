<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Widgento\StorePickup\Model\ResourceModel\StoreLocation;

class Uninstall implements UninstallInterface
{
    /**
     * @var StoreLocation
     */
    private $storeLocation;

    public function __construct(StoreLocation $storeLocation)
    {
        $this->storeLocation = $storeLocation;
    }

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->getConnection()->dropTable($this->storeLocation->getMainTable());
    }
}
