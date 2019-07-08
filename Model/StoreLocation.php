<?php

declare(strict_types=1);

namespace Widgento\StorePickup;

use Magento\Framework\Model\AbstractModel;
use Widgento\StorePickup\Api\Data\StoreLocationInterface;
use Widgento\StorePickup\Api\Data\StoreOpeningHoursInterface;
use Widgento\StorePickup\Model\StoreOpeningHours;

class StoreLocation extends AbstractModel implements StoreLocationInterface
{
    protected function _construct()
    {
        $this->_init(\Widgento\StorePickup\Model\ResourceModel\StoreLocation::class);
    }

    public function setName(string $name): StoreLocationInterface
    {
        return $this->setData(self::NAME, $name);
    }

    public function getName(): string
    {
        return $this->_getData(self::NAME);
    }

    public function setDescription(string $description): StoreLocationInterface
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getDescription(): string
    {
        return $this->_getData(self::DESCRIPTION);
    }

    public function setAddress(string $address): StoreLocationInterface
    {
        return $this->setData(self::ADDRESS, $address);
    }


    public function getAddress(): string
    {
        return $this->_getData(self::ADDRESS);
    }

    /**
     * @param string[] $phoneNumbers
     * @return StoreLocationInterface
     */
    public function setPhoneNumbers(array $phoneNumbers): StoreLocationInterface
    {
        // Validate the array contains not empty strings
        $phoneNumbers = array_filter(
            $phoneNumbers,
            function(string $phoneNumber) {
                return (bool) strlen($phoneNumber);
            }
            );

        return $this->setData(self::PHONE_NUMBERS, json_encode($phoneNumbers));
    }

    /**
     * @return string[]
     */
    public function getPhoneNumbers(): array
    {
        return json_decode($this->_getData(self::PHONE_NUMBERS) ?? '[]', true);
    }

    public function setOpeningHours(StoreOpeningHoursInterface $openingHours): StoreLocationInterface
    {
        return $this->setData(self::OPENING_HOURS, json_encode($openingHours));
    }

    public function getOpeningHours(): StoreOpeningHoursInterface
    {
        $savedData = $this->_getData(self::OPENING_HOURS);

        return StoreOpeningHours::createFromArray(
            $savedData ? json_decode($savedData, true) : []
        );
    }
}
