<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\BotCommandScopeType;
use TelegramBotSDK\InvalidArgumentException;
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
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): BotCommandScope|BotCommandScopeDefault|BotCommandScopeAllPrivateChats|BotCommandScopeAllGroupChats|BotCommandScopeAllChatAdministrators|BotCommandScopeChat|BotCommandScopeChatAdministrators|BotCommandScopeChatMember
    {
        self::validate($data);
        $class = match ($data['type']) {
            BotCommandScopeType::Default->value => BotCommandScopeDefault::class,
            BotCommandScopeType::AllPrivateChats->value => BotCommandScopeAllPrivateChats::class,
            BotCommandScopeType::AllGroupChats->value => BotCommandScopeAllGroupChats::class,
            BotCommandScopeType::AllChatAdministrators->value => BotCommandScopeAllChatAdministrators::class,
            BotCommandScopeType::Chat->value => BotCommandScopeChat::class,
            BotCommandScopeType::ChatAdministrators->value => BotCommandScopeChatAdministrators::class,
            BotCommandScopeType::ChatMember->value => BotCommandScopeChatMember::class,
            default => BotCommandScope::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

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
