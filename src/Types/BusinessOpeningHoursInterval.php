<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatMemberOwner
 * Describes an interval of time during which a business is open.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessOpeningHoursInterval extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['opening_minute', 'closing_minute'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'opening_minute' => true,
        'closing_minute' => true,
    ];

    /**
     * The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which
     * the business is open; 0 - 7 * 24 * 60
     *
     * @var int
     */
    protected int $openingMinute;

    /**
     * The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which
     * the business is open; 0 - 8 * 24 * 60
     *
     * @var int
     */
    protected int $closingMinute;

    /**
     * @return int
     */
    public function getOpeningMinute(): int
    {
        return $this->openingMinute;
    }

    /**
     * @param int $openingMinute
     * @return void
     */
    public function setOpeningMinute(int $openingMinute): void
    {
        $this->openingMinute = $openingMinute;
    }

    /**
     * @return int
     */
    public function getClosingMinute(): int
    {
        return $this->closingMinute;
    }

    /**
     * @param int $closingMinute
     * @return void
     */
    public function setClosingMinute(int $closingMinute): void
    {
        $this->closingMinute = $closingMinute;
    }
}
