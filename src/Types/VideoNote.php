<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class VideoNote
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @package TelegramBotSDK\Types
 */
class VideoNote extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['file_id', 'file_unique_id', 'length', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'length' => true,
        'duration' => true,
        'thumbnail' => PhotoSize::class,
        'file_size' => true,
    ];

    /**
     * Identifier for this file, which can be used to download or reuse the file
     *
     * @var string
     */
    protected string $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be
     * used to download or reuse the file.
     *
     * @var string
     */
    protected string $fileUniqueId;

    /**
     * Video width and height (diameter of the video message) as defined by sender
     *
     * @var int
     */
    protected int $length;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    protected int $duration;

    /**
     * Optional. Video thumbnail
     *
     * @var PhotoSize|null
     */
    protected ?PhotoSize $thumbnail = null;

    /**
     * Optional. File size in bytes
     *
     * @var int|null
     */
    protected ?int $fileSize = null;

    /**
     * @return string
     *
     * @see $fileId
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return void
     *
     * @see $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string
     *
     * @see $fileUniqueId
     */
    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     * @return void
     *
     * @see $fileUniqueId
     */
    public function setFileUniqueId(string $fileUniqueId): void
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return int
     *
     * @see $length
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return void
     *
     * @see $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return int
     *
     * @see $duration
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return void
     *
     * @see $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return PhotoSize|null
     *
     * @see $thumbnail
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     * @return void
     *
     * @see $thumbnail
     */
    public function setThumbnail(?PhotoSize $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return int|null
     *
     * @see $fileSize
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int|null $fileSize
     * @return void
     *
     * @see $fileSize
     */
    public function setFileSize(?int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
