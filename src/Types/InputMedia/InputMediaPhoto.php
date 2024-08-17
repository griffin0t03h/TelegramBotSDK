<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\InvalidArgumentException;

/**
 * Class InputMediaPhoto
 * Represents a photo to be sent.
 *
 * @package TelegramBotSDK\Types
 */
class InputMediaPhoto extends InputMedia
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
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => true,
        'show_caption_above_media' => true,
        'has_spoiler' => true,
    ];

    /**
     * Type of the result, must be photo
     *
     * @var string
     */
    protected string $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL
     * for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using
     * multipart/form-data under <file_attach_name> name.
     *
     * @var string
     */
    protected string $media;

    /**
     * Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
     *
     * @var string|null
     */
    protected ?string $parseMode = null;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     *
     * @var array|null
     */
    protected ?array $captionEntities = null;

    /**
     * Optional. Pass True, if the caption must be shown above the message media
     *
     * @var bool|null
     */
    protected ?bool $showCaptionAboveMedia = null;

    /**
     * Optional. Pass True if the photo needs to be covered with a spoiler animation
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
     * @return array|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param array|null $captionEntities
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
