<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeAllChatAdministrators
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    /**
     * Scope type
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::AllChatAdministrators;
}
