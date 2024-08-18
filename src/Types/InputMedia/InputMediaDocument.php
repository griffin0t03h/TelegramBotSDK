<?php

namespace TelegramBotSDK\Types\InputMedia;

use TelegramBotSDK\Enum\InputMediaType;

/**
 * Class InputMediaDocument
 * Represents a general file to be sent.
 *
 * @package TelegramBotSDK\Types
 */
class InputMediaDocument extends InputMedia
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
        'disable_content_type_detection' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var InputMediaType
     */
    protected InputMediaType $type = InputMediaType::Document;

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
     * Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. Mode for parsing entities in the document caption
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
     * Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data.
     * Always True, if the document is sent as part of an album.
     *
     * @var bool|null
     */
    protected ?bool $disableContentTypeDetection = null;

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
    public function getDisableContentTypeDetection(): ?bool
    {
        return $this->disableContentTypeDetection;
    }

    /**
     * @param bool|null $disableContentTypeDetection
     */
    public function setDisableContentTypeDetection(?bool $disableContentTypeDetection): void
    {
        $this->disableContentTypeDetection = $disableContentTypeDetection;
    }
}
