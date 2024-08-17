<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfSharedUser
{
    /**
     * @param array $data
     * @return SharedUser[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($sharedUser): SharedUser {
            return SharedUser::fromResponse($sharedUser);
        }, $data);
    }
}
