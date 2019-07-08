<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Model\ResourceModel\StoreLocation;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Widgento\StorePickup\StoreLocation;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            StoreLocation::class,
            \Widgento\StorePickup\Model\ResourceModel\StoreLocation::class
        );
    }
}
