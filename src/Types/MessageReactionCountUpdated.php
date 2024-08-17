<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageReactionCountUpdated
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @package TelegramBotSDK\Types
 */
class MessageReactionCountUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'message_id', 'date', 'reactions'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'date' => true,
        'reactions' => ArrayOfReactionType::class,
    ];

    /**
     * The chat containing the message
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Unique message identifier inside the chat
     *
     * @var int
     */
    protected int $messageId;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * List of reactions that are present on the message
     *
     * @var ReactionCount[]
     */
    protected array $reactions;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ReactionCount[]
     */
    public function getReactions(): array
    {
        return $this->reactions;
    }

    /**
     * @param ReactionCount[] $reactions
     * @return void
     */
    public function setReactions(array $reactions): void
    {
        $this->reactions = $reactions;
    }
}
