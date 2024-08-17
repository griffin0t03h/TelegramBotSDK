<?php

namespace TelegramBotSDK\Types\Sticker;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

abstract class ArrayOfSticker extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return Sticker[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($sticker): Sticker {
            return Sticker::fromResponse($sticker);
        }, $data);
    }
}
