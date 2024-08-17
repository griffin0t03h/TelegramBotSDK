<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

abstract class ArrayOfChatMemberEntity implements TypeInterface
{
    /**
     * @param array $data
     * @return ChatMember[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($chatMemberEntity) {
            return ChatMember::fromResponse($chatMemberEntity);
        }, $data);
    }
}
