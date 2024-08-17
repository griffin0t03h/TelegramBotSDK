<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberMember
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberMember extends ChatMember
{
    public static function fromResponse($data): ChatMemberMember|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }
}
