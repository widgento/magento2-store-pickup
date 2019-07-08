<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Model;

use Widgento\StorePickup\Api\Data\StoreOpeningHoursInterface;

class StoreOpeningHours implements StoreOpeningHoursInterface
{
    /**
     * @var string
     */
    private $text;

    public static function createFromArray(array $data): StoreOpeningHours
    {
        $storeOpeningHours = new self();

        if (isset($data['text'])) {
            $storeOpeningHours->setText($data['text']);
        }

        return $storeOpeningHours;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text = null): self
    {
        $this->text = $text;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'text' => $this->getText(),
        ];
    }
}