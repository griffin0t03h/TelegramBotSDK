<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBoostUpdated
 * This object represents a boost added to a chat or changed.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'boost'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'boost' => ChatBoost::class,
    ];

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Information about the chat boost
     *
     * @var ChatBoost
     */
    protected ChatBoost $boost;

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
     * @return ChatBoost
     */
    public function getBoost(): ChatBoost
    {
        return $this->boost;
    }

    /**
     * @param ChatBoost $boost
     */
    public function setBoost(ChatBoost $boost): void
    {
        $this->boost = $boost;
    }
}
