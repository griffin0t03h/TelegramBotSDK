<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeAllPrivateChats
 * Represents the scope of bot commands, covering all private chats.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    /**
     * {@inheritdoc}
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::AllPrivateChats;
}
