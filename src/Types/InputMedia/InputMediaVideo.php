<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\Enum\InputMediaType;

/**
 * Class InputMediaVideo
 * Represents a video to be sent.
 *
 * @package TelegramBotSDK\Types
 */
class InputMediaVideo extends InputMedia
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
        'supports_streaming' => true,
        'has_spoiler' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var InputMediaType
     */
    protected InputMediaType $type = InputMediaType::Video;

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
     * Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. Mode for parsing entities in the video caption
     *
     * @var string|null
     */
    protected ?string $parseMode = null;

    /**
     * Optional. List of special entities that appear in the caption
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
     * Optional. Video width
     *
     * @var int|null
     */
    protected ?int $width = null;

    /**
     * Optional. Video height
     *
     * @var int|null
     */
    protected ?int $height = null;

    /**
     * Optional. Video duration in seconds
     *
     * @var int|null
     */
    protected ?int $duration = null;

    /**
     * Optional. Pass True if the uploaded video is suitable for streaming
     *
     * @var bool|null
     */
    protected ?bool $supportsStreaming = null;

    /**
     * Optional. Pass True if the video needs to be covered with a spoiler animation
     *
     * @var bool|null
     */
    protected ?bool $hasSpoiler = null;

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
    public function getSupportsStreaming(): ?bool
    {
        return $this->supportsStreaming;
    }

    /**
     * @param bool|null $supportsStreaming
     */
    public function setSupportsStreaming(?bool $supportsStreaming): void
    {
        $this->supportsStreaming = $supportsStreaming;
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
