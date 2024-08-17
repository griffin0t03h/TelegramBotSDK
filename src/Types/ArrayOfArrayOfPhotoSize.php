<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfArrayOfPhotoSize
{
    /**
     * @param array $data
     * @return PhotoSize[][]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($photoSize) {
            return ArrayOfPhotoSize::fromResponse($photoSize);
        }, $data);
    }
}
