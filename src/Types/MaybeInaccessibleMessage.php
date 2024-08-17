<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class MaybeInaccessibleMessage
 * This object describes a message that can be inaccessible to the bot.
 * It can be one of Message or InaccessibleMessage.
 *
 * @package TelegramBotSDK\Types
 */
class MaybeInaccessibleMessage extends BaseType implements TypeInterface
{
    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @param array $data
     * @return Message|InaccessibleMessage|MaybeInaccessibleMessage
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): Message|InaccessibleMessage|MaybeInaccessibleMessage
    {
        self::validate($data);
        if (isset($data['message_id'])) {
            return Message::fromResponse($data);
        } else {
            return InaccessibleMessage::fromResponse($data);
        }
    }
}
