<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberLeft
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberLeft extends ChatMember
{
    public static function fromResponse($data): ChatMemberLeft|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
