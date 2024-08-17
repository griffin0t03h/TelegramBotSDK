<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BusinessLocation
 * Contains information about the location of a Telegram Business account.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessLocation extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'address' => true,
        'location' => Location::class,
    ];

    /**
     * Address of the business
     *
     * @var string
     */
    protected string $address;

    /**
     * Optional. Location of the business
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     * @return void
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }
}
