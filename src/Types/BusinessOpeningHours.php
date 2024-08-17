<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BusinessOpeningHours
 * Describes the opening hours of a business.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessOpeningHours extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['time_zone_name', 'opening_hours'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'time_zone_name' => true,
        'opening_hours' => ArrayOfBusinessOpeningHoursInterval::class,
    ];

    /**
     * Unique name of the time zone for which the opening hours are defined
     *
     * @var string
     */
    protected string $timeZoneName;

    /**
     * List of time intervals describing business opening hours
     *
     * @var array
     */
    protected array $openingHours;

    /**
     * @return string
     */
    public function getTimeZoneName(): string
    {
        return $this->timeZoneName;
    }

    /**
     * @param string $timeZoneName
     * @return void
     */
    public function setTimeZoneName(string $timeZoneName): void
    {
        $this->timeZoneName = $timeZoneName;
    }

    /**
     * @return array
     */
    public function getOpeningHours(): array
    {
        return $this->openingHours;
    }

    /**
     * @param array $openingHours
     * @return void
     */
    public function setOpeningHours(array $openingHours): void
    {
        $this->openingHours = $openingHours;
    }
}
