<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

class ArrayOfBusinessOpeningHoursInterval
{
    /**
     * @param array $data
     * @return BusinessOpeningHoursInterval[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($item): BusinessOpeningHoursInterval {
            return BusinessOpeningHoursInterval::fromResponse($item);
        }, $data);
    }
}
