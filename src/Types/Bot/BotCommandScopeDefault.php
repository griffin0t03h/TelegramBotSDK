<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Enum\BotCommandScopeType;

/**
 * Class BotCommandScopeDefault
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are
 * specified for the user.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScopeDefault extends BotCommandScope
{
    /**
     * Scope type
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type = BotCommandScopeType::Default;
}
