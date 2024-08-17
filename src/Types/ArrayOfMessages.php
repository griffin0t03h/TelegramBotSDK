<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfMessages
{
    /**
     * @param array $data
     * @return Message[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($message): Message {
            return Message::fromResponse($message);
        }, $data);
    }
}
