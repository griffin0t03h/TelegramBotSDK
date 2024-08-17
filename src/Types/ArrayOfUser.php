<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfUser
{
    /**
     * @param array $data
     * @return User[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($user): User {
            return User::fromResponse($user);
        }, $data);
    }
}
