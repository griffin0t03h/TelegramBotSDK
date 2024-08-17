<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Location
 * This object represents a point on the map.
 *
 * @package TelegramBotSDK\Types
 */
class Location extends BaseType implements TypeInterface
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
        'horizontal_accuracy' => true,
        'live_period' => true,
        'heading' => true,
        'proximity_alert_radius' => true,
    ];

    /**
     * Longitude as defined by sender
     *
     * @var float
     */
    protected float $longitude;

    /**
     * Latitude as defined by sender
     *
     * @var float
     */
    protected float $latitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     *
     * @var float|null
     */
    protected ?float $horizontalAccuracy = null;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated, in seconds. For
     * active live locations only.
     *
     * @var int|null
     */
    protected ?int $livePeriod = null;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     *
     * @var int|null
     */
    protected ?int $heading = null;

    /**
     * Optional. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     *
     * @var int|null
     */
    protected ?int $proximityAlertRadius = null;

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
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
     * @return void
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float|null
     */
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontalAccuracy;
    }

    /**
     * @param float|null $horizontalAccuracy
     * @return void
     */
    public function setHorizontalAccuracy(?float $horizontalAccuracy): void
    {
        $this->horizontalAccuracy = $horizontalAccuracy;
    }

    /**
     * @return int|null
     */
    public function getLivePeriod(): ?int
    {
        return $this->livePeriod;
    }

    /**
     * @param int|null $livePeriod
     * @return void
     */
    public function setLivePeriod(?int $livePeriod): void
    {
        $this->livePeriod = $livePeriod;
    }

    /**
     * @return int|null
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * @param int|null $heading
     * @return void
     */
    public function setHeading(?int $heading): void
    {
        $this->heading = $heading;
    }

    /**
     * @return int|null
     */
    public function getProximityAlertRadius(): ?int
    {
        return $this->proximityAlertRadius;
    }

    /**
     * @param int|null $proximityAlertRadius
     * @return void
     */
    public function setProximityAlertRadius(?int $proximityAlertRadius): void
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
    }
}
