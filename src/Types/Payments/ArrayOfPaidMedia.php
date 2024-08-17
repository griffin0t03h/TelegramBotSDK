<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

class ArrayOfPaidMedia extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return PaidMedia[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($paidMedia): PaidMedia {
            return PaidMedia::fromResponse($paidMedia);
        }, $data);
    }
}
