<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class InputMedia
 * This object represents the content of a media message to be sent.
 * It should be one of InputMediaAnimation, InputMediaDocument, InputMediaAudio, InputMediaPhoto, InputMediaVideo.
 *
 * @package TelegramBotSDK\Types
 */
class InputMedia extends BaseType implements TypeInterface, CollectionItemInterface
{
    /**
     * @psalm-suppress LessSpecificImplementedReturnType
     *
     * Factory method to create an instance of the appropriate InputMedia subclass based on the type.
     *
     * @param array $data
     * @return InputMediaAnimation|InputMediaDocument|InputMediaAudio|InputMediaPhoto|InputMediaVideo
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): InputMediaAudio|InputMediaVideo|InputMediaDocument|InputMediaPhoto|InputMediaAnimation
    {
        self::validate($data);
        $type = $data['type'];

        return match ($type) {
            'animation' => InputMediaAnimation::fromResponse($data),
            'document' => InputMediaDocument::fromResponse($data),
            'audio' => InputMediaAudio::fromResponse($data),
            'photo' => InputMediaPhoto::fromResponse($data),
            'video' => InputMediaVideo::fromResponse($data),
            default => throw new InvalidArgumentException('Unknown media type: ' . $data['type']),
        };
    }
}
