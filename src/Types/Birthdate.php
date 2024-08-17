<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Birthdate
 * Describes the birthdate of a user.
 *
 * @package TelegramBotSDK\Types
 */
class Birthdate extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['day', 'month'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'day' => true,
        'month' => true,
        'year' => true,
    ];

    /**
     * Day of the user's birth; 1-31
     *
     * @var int
     */
    protected int $day;

    /**
     * Month of the user's birth; 1-12
     *
     * @var int
     */
    protected int $month;

    /**
     * Optional. Year of the user's birth
     *
     * @var int|null
     */
    protected ?int $year = null;

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param int $day
     * @return void
     */
    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return void
     */
    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    /**
     * @return int|null
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param int|null $year
     * @return void
     */
    public function setYear(?int $year): void
    {
        $this->year = $year;
    }
}
