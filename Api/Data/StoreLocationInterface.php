<?php

declare(strict_types=1);

namespace Widgento\StorePickup\Api\Data;

interface StoreLocationInterface
{
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const ADDRESS = 'address';
    const PHONE_NUMBERS = 'phone_numbers';
    const OPENING_HOURS = 'opening_hours';

    const ATTRIBUTES = [
        self::NAME,
        self::DESCRIPTION,
        self::ADDRESS,
        self::PHONE_NUMBERS,
        self::OPENING_HOURS,
    ];

    public function setId($id);

    public function getId();

    public function setName(string $name): StoreLocationInterface;

    public function getName(): string;

    public function setDescription(string $description): StoreLocationInterface;

    public function getDescription(): string;

    public function setAddress(string $address): StoreLocationInterface;

    public function getAddress(): string;

    /**
     * @param string[] $phoneNumbers
     * @return StoreLocationInterface
     */
    public function setPhoneNumbers(array $phoneNumbers): StoreLocationInterface;

    /**
     * @return string[]
     */
    public function getPhoneNumbers(): array;

    public function setOpeningHours(StoreOpeningHoursInterface $openingHours): StoreLocationInterface;

    public function getOpeningHours(): StoreOpeningHoursInterface;
}
