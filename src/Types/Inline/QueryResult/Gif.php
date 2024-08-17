<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultGif
 * Represents a link to an animated GIF file.
 * By default, this animated GIF file will be sent by the user with optional caption.
 * Alternatively, you can provide InputMessageContent to send it instead of the animation.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Gif extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'gif_url', 'thumbnail_url'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'gif_url' => true,
        'gif_width' => true,
        'gif_height' => true,
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
    protected string $type = 'gif';

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @var string
     */
    protected string $gifUrl;

    /**
     * Optional. Width of the GIF
     *
     * @var int|null
     */
    protected ?int $gifWidth = null;

    /**
     * Optional. Height of the GIF
     *
     * @var int|null
     */
    protected ?int $gifHeight = null;

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @var string
     */
    protected string $thumbnailUrl;

    /**
     * Optional. Caption of the GIF file to be sent, 0-200 characters
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * InlineQueryResultGif constructor.
     *
     * @param string $id
     * @param string $gifUrl
     * @param string|null $thumbnailUrl
     * @param int|null $gifWidth
     * @param int|null $gifHeight
     * @param string|null $title
     * @param string|null $caption
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $gifUrl,
        ?string $thumbnailUrl = null,
        ?string $title = null,
        ?string $caption = null,
        ?int $gifWidth = null,
        ?int $gifHeight = null,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null,
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->gifUrl = $gifUrl;
        $this->thumbnailUrl = is_null($thumbnailUrl) ? $gifUrl : $thumbnailUrl;
        $this->gifWidth = $gifWidth;
        $this->gifHeight = $gifHeight;
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getGifUrl(): string
    {
        return $this->gifUrl;
    }

    /**
     * @param string $gifUrl
     *
     * @return void
     */
    public function setGifUrl(string $gifUrl): void
    {
        $this->gifUrl = $gifUrl;
    }

    /**
     * @return int|null
     */
    public function getGifWidth(): ?int
    {
        return $this->gifWidth;
    }

    /**
     * @param int|null $gifWidth
     *
     * @return void
     */
    public function setGifWidth(?int $gifWidth): void
    {
        $this->gifWidth = $gifWidth;
    }

    /**
     * @return int|null
     */
    public function getGifHeight(): ?int
    {
        return $this->gifHeight;
    }

    /**
     * @param int|null $gifHeight
     *
     * @return void
     */
    public function setGifHeight(?int $gifHeight): void
    {
        $this->gifHeight = $gifHeight;
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
