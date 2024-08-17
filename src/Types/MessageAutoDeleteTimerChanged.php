<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageAutoDeleteTimerChanged
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @package TelegramBotSDK\Types
 */
class MessageAutoDeleteTimerChanged extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['message_auto_delete_time'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'message_auto_delete_time' => true,
    ];

    /**
     * New auto-delete time for messages in the chat; in seconds
     *
     * @var int
     */
    protected int $messageAutoDeleteTime;

    /**
     * @return int
     */
    public function getMessageAutoDeleteTime(): int
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param int $messageAutoDeleteTime
     * @return void
     */
    public function setMessageAutoDeleteTime(int $messageAutoDeleteTime): void
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }
}
