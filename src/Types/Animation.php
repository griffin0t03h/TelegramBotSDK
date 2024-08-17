<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Animation
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @package TelegramBotSDK\Types
 */
class Animation extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['file_id', 'file_unique_id', 'width', 'height', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
        'thumbnail' => PhotoSize::class,
        'file_name' => true,
        'mime_type' => true,
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
     * Video width as defined by sender
     *
     * @var int
     */
    protected int $width;

    /**
     * Video height as defined by sender
     *
     * @var int
     */
    protected int $height;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    protected int $duration;

    /**
     * Optional. Animation thumbnail as defined by sender
     *
     * @var PhotoSize|null
     */
    protected ?PhotoSize $thumbnail = null;

    /**
     * Optional. Original animation filename as defined by sender
     *
     * @var string|null
     */
    protected ?string $fileName = null;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string|null
     */
    protected ?string $mimeType = null;

    /**
     * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer
     * or double-precision float type are safe for storing this value.
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
     * @see $width
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return void
     *
     * @see $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     *
     * @see $height
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return void
     *
     * @see $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
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
     * @return string|null
     *
     * @see $fileName
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return void
     *
     * @see $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string|null
     *
     * @see $mimeType
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return void
     *
     * @see $mimeType
     */
    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
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
