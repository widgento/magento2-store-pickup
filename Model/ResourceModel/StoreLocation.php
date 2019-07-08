<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class StoreLocation extends AbstractDb
{
    private const TABLE_NAME = 'widgento_store_location';
    private const ID_FIELD_NAME = 'store_location_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
