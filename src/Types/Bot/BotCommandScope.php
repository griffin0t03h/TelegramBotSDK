<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\BotCommandScopeType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BotCommandScope
 * This object represents the scope to which bot commands are applied.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommandScope extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
    ];

    /**
     * Scope type
     *
     * @var BotCommandScopeType
     */
    protected BotCommandScopeType $type;

    /**
     * @return BotCommandScopeType
     */
    public function getType(): BotCommandScopeType
    {
        return $this->type;
    }

    /**
     * @param BotCommandScopeType|string $type
     * @return void
     */
    public function setType(BotCommandScopeType|string $type): void
    {
        if ($type instanceof BotCommandScopeType) {
            $this->type = $type;
        } else {
            $this->type = BotCommandScopeType::tryFrom($type) ?? BotCommandScopeType::Unknown;
        }
    }
}
