<?php

namespace TelegramBotSDK\Types\Inline\InputMessageContent;

use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class Venue
 * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Venue extends InputMessageContent implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['latitude', 'longitude', 'title', 'address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'latitude' => true,
        'longitude' => true,
        'title' => true,
        'address' => true,
        'foursquare_id' => true,
    ];

    /**
     * Latitude of the venue in degrees
     *
     * @var float
     */
    protected float $latitude;

    /**
     * Longitude of the venue in degrees
     *
     * @var float
     */
    protected float $longitude;

    /**
     * Name of the venue
     *
     * @var string
     */
    protected string $title;

    /**
     * Address of the venue
     *
     * @var string
     */
    protected string $address;

    /**
     * Optional. Foursquare identifier of the venue, if known
     *
     * @var string|null
     */
    protected ?string $foursquareId = null;

    /**
     * Venue constructor.
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     */
    public function __construct(float $latitude, float $longitude, string $title, string $address, ?string $foursquareId = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        $this->address = $address;
        $this->foursquareId = $foursquareId;
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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     *
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * @param string|null $foursquareId
     *
     * @return void
     */
    public function setFoursquareId(?string $foursquareId): void
    {
        $this->foursquareId = $foursquareId;
    }
}
