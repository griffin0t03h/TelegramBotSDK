<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\Enum\InputMediaType;

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
     * {@inheritdoc}
     *
     * @var InputMediaType
     */
    protected InputMediaType $type = InputMediaType::Photo;

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
