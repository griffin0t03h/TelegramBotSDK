<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class VideoChatScheduled
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @package TelegramBotSDK\Types
 */
class VideoChatScheduled extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['start_date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'start_date' => true,
    ];

    /**
     * Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     *
     * @var int
     */
    protected int $startDate;

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->startDate;
    }

    /**
     * @param int $startDate
     * @return void
     */
    public function setStartDate(int $startDate): void
    {
        $this->startDate = $startDate;
    }
}
