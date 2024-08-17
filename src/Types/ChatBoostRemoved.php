<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBoostRemoved
 * This object represents a boost removed from a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostRemoved extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'boost_id', 'remove_date', 'source'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'boost_id' => true,
        'remove_date' => true,
        'source' => ChatBoostSource::class,
    ];

    /**
     * Chat which was boosted
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    protected string $boostId;

    /**
     * Point in time (Unix timestamp) when the boost was removed
     *
     * @var int
     */
    protected int $removeDate;

    /**
     * Source of the removed boost
     *
     * @var ChatBoostSource
     */
    protected ChatBoostSource $source;

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
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boostId;
    }

    /**
     * @param string $boostId
     */
    public function setBoostId(string $boostId): void
    {
        $this->boostId = $boostId;
    }

    /**
     * @return int
     */
    public function getRemoveDate(): int
    {
        return $this->removeDate;
    }

    /**
     * @param int $removeDate
     */
    public function setRemoveDate(int $removeDate): void
    {
        $this->removeDate = $removeDate;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource(): ChatBoostSource
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource(ChatBoostSource $source): void
    {
        $this->source = $source;
    }
}
