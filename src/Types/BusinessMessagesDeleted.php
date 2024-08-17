<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BusinessMessagesDeleted
 * This object is received when messages are deleted from a connected business account.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessMessagesDeleted extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['business_connection_id', 'chat', 'message_ids'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'business_connection_id' => true,
        'chat' => Chat::class,
        'message_ids' => true,
    ];

    /**
     * Unique identifier of the business connection
     *
     * @var string
     */
    protected string $businessConnectionId;

    /**
     * Information about a chat in the business account. The bot may not have access to the chat or the corresponding
     * user.
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * The list of identifiers of deleted messages in the chat of the business account
     *
     * @var int[]
     */
    protected array $messageIds;

    /**
     * @return string
     */
    public function getBusinessConnectionId(): string
    {
        return $this->businessConnectionId;
    }

    /**
     * @param string $businessConnectionId
     */
    public function setBusinessConnectionId(string $businessConnectionId): void
    {
        $this->businessConnectionId = $businessConnectionId;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int[]
     */
    public function getMessageIds(): array
    {
        return $this->messageIds;
    }

    /**
     * @param int[] $messageIds
     */
    public function setMessageIds(array $messageIds): void
    {
        $this->messageIds = $messageIds;
    }
}
