<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeChat
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'chat_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'chat_id' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::ChatAdministrators;

    /**
     * Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @var int|string
     */
    protected int|string $chatId;

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
}
