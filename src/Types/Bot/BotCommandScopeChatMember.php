<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeChat
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'chat_id', 'user_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'chat_id' => true,
        'user_id' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::ChatMember;

    /**
     * Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @var int|string
     */
    protected int|string $chatId;

    /**
     * Unique identifier of the target user
     *
     * @var int
     */
    protected int $userId;

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chatId;
    }

    /**
     * @param int|string $chatId
     * @return void
     */
    public function setChatId(int|string $chatId): void
    {
        $this->chatId = $chatId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}
