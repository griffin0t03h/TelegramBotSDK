<?php

namespace TelegramBotSDK\Types\Game;

use TelegramBotSDK\InvalidArgumentException;

abstract class ArrayOfGameHighScore
{
    /**
     * @param array $data
     * @return GameHighScore[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        return array_map(function ($gameHighScore): GameHighScore {
            return GameHighScore::fromResponse($gameHighScore);
        }, $data);
    }
}
