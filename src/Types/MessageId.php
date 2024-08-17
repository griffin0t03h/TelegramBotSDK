<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageId
 * This object represents a unique message identifier.
 *
 * @package TelegramBotSDK\Types
 */
class MessageId extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'message_id' => true,
    ];

    /**
     * Unique message identifier
     *
     * @var int
     */
    protected int $messageId;

    /**
     * @return int
     *
     * @see $messageId
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     *
     * @see $messageId
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }
}
