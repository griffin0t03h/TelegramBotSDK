<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Audio
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @package TelegramBotSDK\Types
 */
class Audio extends BaseType implements TypeInterface
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
        'performer' => true,
        'title' => true,
        'file_name' => true,
        'mime_type' => true,
        'file_size' => true,
        'thumbnail' => PhotoSize::class,
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
     * Optional. Performer of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    protected ?string $performer = null;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Optional. Original filename as defined by sender
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
     * Optional. Thumbnail of the album cover to which the music file belongs
     *
     * @var PhotoSize|null
     */
    protected ?PhotoSize $thumbnail = null;

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
     * @return string|null
     *
     * @see $performer
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     * @return void
     *
     * @see $performer
     */
    public function setPerformer(?string $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return string|null
     *
     * @see $title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     *
     * @see $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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
     * @param string|null $fileName
     * @return void
     *
     * @see $fileName
     */
    public function setFileName(?string $fileName): void
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
     * @param string|null $mimeType
     * @return void
     *
     * @see $mimeType
     */
    public function setMimeType(?string $mimeType): void
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
}
