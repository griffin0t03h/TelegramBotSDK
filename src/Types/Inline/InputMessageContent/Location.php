<?php

namespace TelegramBotSDK\Types\Inline\InputMessageContent;

use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class Location
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Location extends InputMessageContent implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['latitude', 'longitude'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'latitude' => true,
        'longitude' => true,
    ];

    /**
     * Latitude of the location in degrees
     *
     * @var float
     */
    protected float $latitude;

    /**
     * Longitude of the location in degrees
     *
     * @var float
     */
    protected float $longitude;

    /**
     * Location constructor.
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     *
     * @return void
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     *
     * @return void
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }
}
