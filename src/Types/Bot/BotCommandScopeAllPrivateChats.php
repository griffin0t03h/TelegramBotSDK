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
     * Scope type
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::AllPrivateChats;
}
