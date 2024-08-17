<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Voice
 * This object represents a voice note.
 *
 * @package TelegramBotSDK\Types
 */
class Voice extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['file_id', 'file_unique_id', 'duration'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'duration' => true,
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
     * Duration of the audio in seconds as defined by sender
     *
     * @var int
     */
    protected int $duration;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string|null
     */
    protected ?string $mimeType = null;

    /**
     * Optional. File size
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
     * @return null|string
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
     * @param int $fileSize
     * @return void
     *
     * @see $fileSize
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
