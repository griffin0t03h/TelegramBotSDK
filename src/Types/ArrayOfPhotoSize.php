<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfPhotoSize
{
    /**
     * @param array $data
     * @return PhotoSize[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($photoSizeItem): PhotoSize {
            return PhotoSize::fromResponse($photoSizeItem);
        }, $data);
    }
}
