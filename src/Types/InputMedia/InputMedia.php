<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;
use TelegramBotSDK\Enum\InputMediaType;
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
     * Type of the result
     *
     * @var InputMediaType
     */
    protected InputMediaType $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL
     * for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using
     * multipart/form-data under <file_attach_name> name.
     *
     * @var string
     */
    protected string $media;

    /**
     * @psalm-suppress LessSpecificImplementedReturnType
     *
     * Factory method to create an instance of the appropriate InputMedia subclass based on the type.
     *
     * @param array $data
     * @return InputMedia|InputMediaAudio|InputMediaVideo|InputMediaDocument|InputMediaPhoto|InputMediaAnimation
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): InputMedia|InputMediaAudio|InputMediaVideo|InputMediaDocument|InputMediaPhoto|InputMediaAnimation
    {
        self::validate($data);

        $class = match ($data['type']) {
            InputMediaType::Animation->value => InputMediaAnimation::class,
            InputMediaType::Document->value => InputMediaDocument::class,
            InputMediaType::Audio->value => InputMediaAudio::class,
            InputMediaType::Photo->value => InputMediaPhoto::class,
            InputMediaType::Video->value => InputMediaVideo::class,
            default => InputMedia::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return InputMediaType
     */
    public function getType(): InputMediaType
    {
        return $this->type;
    }

    /**
     * @param InputMediaType|string $type
     */
    public function setType(InputMediaType|string $type): void
    {
        if ($type instanceof InputMediaType) {
            $this->type = $type;
        } else {
            $this->type = InputMediaType::tryFrom($type) ?? InputMediaType::Unknown;
        }
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param string $media
     */
    public function setMedia(string $media): void
    {
        $this->media = $media;
    }

}
