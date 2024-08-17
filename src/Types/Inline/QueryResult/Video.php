<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class InlineQueryResultVideo
 * Represents link to a page containing an embedded video player or a video file.
 *
 * @package TelegramBotSDK\Types\Inline
 */
class Video extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'video_url', 'mime_type', 'thumbnail_url', 'title'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'video_url' => true,
        'mime_type' => true,
        'thumbnail_url' => true,
        'title' => true,
        'caption' => true,
        'description' => true,
        'video_width' => true,
        'video_height' => true,
        'video_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected string $type = 'video';

    /**
     * A valid URL for the embedded video player or video file
     *
     * @var string
     */
    protected string $videoUrl;

    /**
     * Mime type of the content of video url, “text/html” or “video/mp4”
     *
     * @var string
     */
    protected string $mimeType;

    /**
     * Optional. Video width
     *
     * @var int|null
     */
    protected ?int $videoWidth = null;

    /**
     * Optional. Video height
     *
     * @var int|null
     */
    protected ?int $videoHeight = null;

    /**
     * Optional. Video duration in seconds
     *
     * @var int|null
     */
    protected ?int $videoDuration = null;

    /**
     * URL of the thumbnail (jpeg only) for the video
     *
     * @var string
     */
    protected string $thumbnailUrl;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. Short description of the result
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * Video constructor
     *
     * @param string $id
     * @param string $videoUrl
     * @param string $thumbnailUrl
     * @param string $mimeType
     * @param string $title
     * @param string|null $caption
     * @param string|null $description
     * @param int|null $videoWidth
     * @param int|null $videoHeight
     * @param int|null $videoDuration
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $videoUrl,
        string $thumbnailUrl,
        string $mimeType,
        string $title,
        ?string $caption = null,
        ?string $description = null,
        ?int $videoWidth = null,
        ?int $videoHeight = null,
        ?int $videoDuration = null,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null,
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->videoUrl = $videoUrl;
        $this->thumbnailUrl = $thumbnailUrl;
        $this->caption = $caption;
        $this->description = $description;
        $this->mimeType = $mimeType;
        $this->videoWidth = $videoWidth;
        $this->videoHeight = $videoHeight;
        $this->videoDuration = $videoDuration;
    }

    /**
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    /**
     * @param string $videoUrl
     *
     * @return void
     */
    public function setVideoUrl(string $videoUrl): void
    {
        $this->videoUrl = $videoUrl;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     *
     * @return void
     */
    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return int|null
     */
    public function getVideoWidth(): ?int
    {
        return $this->videoWidth;
    }

    /**
     * @param int|null $videoWidth
     *
     * @return void
     */
    public function setVideoWidth(?int $videoWidth): void
    {
        $this->videoWidth = $videoWidth;
    }

    /**
     * @return int|null
     */
    public function getVideoHeight(): ?int
    {
        return $this->videoHeight;
    }

    /**
     * @param int|null $videoHeight
     *
     * @return void
     */
    public function setVideoHeight(?int $videoHeight): void
    {
        $this->videoHeight = $videoHeight;
    }

    /**
     * @return int|null
     */
    public function getVideoDuration(): ?int
    {
        return $this->videoDuration;
    }

    /**
     * @param int|null $videoDuration
     *
     * @return void
     */
    public function setVideoDuration(?int $videoDuration): void
    {
        $this->videoDuration = $videoDuration;
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

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
