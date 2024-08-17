<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultMpeg4Gif
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound).
 * By default, this animated MPEG-4 file will be sent by the user with optional caption.
 * Alternatively, you can provide message_text to send it instead of the animation.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Mpeg4Gif extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'mpeg4_url', 'thumbnail_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'mpeg4_url' => true,
        'mpeg4_width' => true,
        'mpeg4_height' => true,
        'thumbnail_url' => true,
        'title' => true,
        'caption' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected string $type = 'mpeg4_gif';

    /**
     * A valid URL for the MP4 file. File size must not exceed 1MB
     *
     * @var string
     */
    protected string $mpeg4Url;

    /**
     * Optional. Video width
     *
     * @var int|null
     */
    protected ?int $mpeg4Width = null;

    /**
     * Optional. Video height
     *
     * @var int|null
     */
    protected ?int $mpeg4Height = null;

    /**
     * URL of the static thumbnail (jpeg or gif) for the result
     *
     * @var string
     */
    protected string $thumbnailUrl;

    /**
     * Optional. Caption of the MPEG-4 file to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * InlineQueryResultMpeg4Gif constructor.
     *
     * @param string $id
     * @param string $mpeg4Url
     * @param string $thumbnailUrl
     * @param int|null $mpeg4Width
     * @param int|null $mpeg4Height
     * @param string|null $caption
     * @param string|null $title
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $mpeg4Url,
        string $thumbnailUrl,
        ?string $title = null,
        string $caption = null,
        int $mpeg4Width = null,
        int $mpeg4Height = null,
        InputMessageContent $inputMessageContent = null,
        InlineKeyboardMarkup $inlineKeyboardMarkup = null,
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->mpeg4Url = $mpeg4Url;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->mpeg4Width = $mpeg4Width;
        $this->mpeg4Height = $mpeg4Height;
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getMpeg4Url(): string
    {
        return $this->mpeg4Url;
    }

    /**
     * @param string $mpeg4Url
     *
     * @return void
     */
    public function setMpeg4Url(string $mpeg4Url): void
    {
        $this->mpeg4Url = $mpeg4Url;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Width(): ?int
    {
        return $this->mpeg4Width;
    }

    /**
     * @param int|null $mpeg4Width
     *
     * @return void
     */
    public function setMpeg4Width(?int $mpeg4Width): void
    {
        $this->mpeg4Width = $mpeg4Width;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Height(): ?int
    {
        return $this->mpeg4Height;
    }

    /**
     * @param int|null $mpeg4Height
     *
     * @return void
     */
    public function setMpeg4Height(?int $mpeg4Height): void
    {
        $this->mpeg4Height = $mpeg4Height;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     *
     * @return void
     */
    public function setThumbnailUrl(string $thumbnailUrl): void
    {
        $this->thumbnailUrl = $thumbnailUrl;
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
     *
     * @return void
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }
}
