<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Venue
 * This object represents a venue.
 *
 * @package TelegramBotSDK\Types
 */
class Venue extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['location', 'title', 'address'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'location' => Location::class,
        'title' => true,
        'address' => true,
        'foursquare_id' => true,
        'foursquare_type' => true,
        'google_place_id' => true,
        'google_place_type' => true,
    ];

    /**
     * Venue location. Can't be a live location
     *
     * @var Location
     */
    protected Location $location;

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
     * Optional. Foursquare identifier of the venue
     *
     * @var string|null
     */
    protected ?string $foursquareId = null;

    /**
     * Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     *
     * @var string|null
     */
    protected ?string $foursquareType = null;

    /**
     * Optional. Google Places identifier of the venue
     *
     * @var string|null
     */
    protected ?string $googlePlaceId = null;

    /**
     * Optional. Google Places type of the venue. (See [supported
     * types](https://developers.google.com/places/web-service/supported_types).)
     *
     * @var string|null
     */
    protected ?string $googlePlaceType = null;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return void
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
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
     * @return null|string
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

    /**
     * @return null|string
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquareType;
    }

    /**
     * @param string|null $foursquareType
     *
     * @return void
     */
    public function setFoursquareType(?string $foursquareType): void
    {
        $this->foursquareType = $foursquareType;
    }

    /**
     * @return null|string
     */
    public function getGooglePlaceId(): ?string
    {
        return $this->googlePlaceId;
    }

    /**
     * @param string|null $googlePlaceId
     *
     * @return void
     */
    public function setGooglePlaceId(?string $googlePlaceId): void
    {
        $this->googlePlaceId = $googlePlaceId;
    }

    /**
     * @return null|string
     */
    public function getGooglePlaceType(): ?string
    {
        return $this->googlePlaceType;
    }

    /**
     * @param string|null $googlePlaceType
     *
     * @return void
     */
    public function setGooglePlaceType(?string $googlePlaceType): void
    {
        $this->googlePlaceType = $googlePlaceType;
    }
}
