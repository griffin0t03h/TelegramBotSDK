<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfChatBoost
{
    /**
     * @param array $data
     * @return ChatBoost[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($chatBoost): ChatBoost {
            return ChatBoost::fromResponse($chatBoost);
        }, $data);
    }
}
