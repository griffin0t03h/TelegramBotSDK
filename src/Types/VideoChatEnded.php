<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class VideoChatEnded
 * This object represents a service message about a video chat ended in the chat.
 *
 * @package TelegramBotSDK\Types
 */
class VideoChatEnded extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'duration' => true,
    ];

    /**
     * Video chat duration in seconds
     *
     * @var int
     */
    protected int $duration;

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return void
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }
}
