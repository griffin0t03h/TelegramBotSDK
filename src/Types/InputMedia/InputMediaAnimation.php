<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\MessageEntity;

/**
 * Class InputMediaAnimation
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 *
 * @package TelegramBotSDK\Types
 */
class InputMediaAnimation extends InputMedia
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'media'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'media' => true,
        'thumbnail' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => true,
        'show_caption_above_media' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'has_spoiler' => true,
    ];

    /**
     * Type of the result, must be animation
     *
     * @var string
     */
    protected string $type = 'animation';

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL
     * for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using
     * multipart/form-data under <file_attach_name> name.
     *
     * @var string
     */
    protected string $media;

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     * server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height
     * should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused
     * and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was
     * uploaded using multipart/form-data under <file_attach_name>.
     *
     * @var string|null
     */
    protected ?string $thumbnail = null;

    /**
     * Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. Mode for parsing entities in the animation caption. See [formatting
     * options](https://core.telegram.org/bots/api#formatting-options) for more details.
     *
     * @var string|null
     */
    protected ?string $parseMode = null;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     *
     * @var MessageEntity[]|null
     */
    protected ?array $captionEntities = null;

    /**
     * Optional. Pass True, if the caption must be shown above the message media
     *
     * @var bool|null
     */
    protected ?bool $showCaptionAboveMedia = null;

    /**
     * Optional. Animation width
     *
     * @var int|null
     */
    protected ?int $width = null;

    /**
     * Optional. Animation height
     *
     * @var int|null
     */
    protected ?int $height = null;

    /**
     * Optional. Animation duration in seconds
     *
     * @var int|null
     */
    protected ?int $duration = null;

    /**
     * Optional. Pass True if the animation needs to be covered with a spoiler animation
     *
     * @var bool|null
     */
    protected ?bool $hasSpoiler = null;

    /**
     * @param array $data
     * @return static
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * @param string|null $thumbnail
     */
    public function setThumbnail(?string $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param MessageEntity[]|null $captionEntities
     */
    public function setCaptionEntities(?array $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->showCaptionAboveMedia;
    }

    /**
     * @param bool|null $showCaptionAboveMedia
     */
    public function setShowCaptionAboveMedia(?bool $showCaptionAboveMedia): void
    {
        $this->showCaptionAboveMedia = $showCaptionAboveMedia;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     */
    public function setWidth(?int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     */
    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     */
    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->hasSpoiler;
    }

    /**
     * @param bool|null $hasSpoiler
     */
    public function setHasSpoiler(?bool $hasSpoiler): void
    {
        $this->hasSpoiler = $hasSpoiler;
    }
}
