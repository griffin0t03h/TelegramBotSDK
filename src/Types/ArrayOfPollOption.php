<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfPollOption
{
    /**
     * @param array $data
     * @return PollOption[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($pollOptionItem): PollOption {
            return PollOption::fromResponse($pollOptionItem);
        }, $data);
    }
}
