<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfUpdates
{
    /**
     * @param array $data
     * @return Update[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($update): Update {
            return Update::fromResponse($update);
        }, $data);
    }
}
