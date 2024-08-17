<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatLocation
 * Represents a location to which a chat is connected.
 *
 * @package TelegramBotSDK\Types
 */
class ChatLocation extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['location', 'address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'location' => Location::class,
        'address' => true,
    ];

    /**
     * The location to which the supergroup is connected. Can't be a live location.
     *
     * @var Location
     */
    protected Location $location;

    /**
     * Location address; 1-64 characters, as defined by the chat owner
     *
     * @var string
     */
    protected string $address;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return void
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

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
}
