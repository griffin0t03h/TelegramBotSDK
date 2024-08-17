<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

class ArrayOfChat
{
    /**
     * @param array $data
     * @return Chat[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($chat): Chat {
            return Chat::fromResponse($chat);
        }, $data);
    }
}
