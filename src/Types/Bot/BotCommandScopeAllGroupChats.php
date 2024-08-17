<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeAllGroupChats
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    /**
     * Scope type
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::AllGroupChats;
}
