<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Api\Data;

interface StoreOpeningHoursInterface extends \JsonSerializable
{
    public function getText(): ?string;
}
