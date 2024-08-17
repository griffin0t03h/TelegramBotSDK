<?php

namespace TelegramBotSDK\Types\Sticker;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\StickerType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\File;
use TelegramBotSDK\Types\MaskPosition;
use TelegramBotSDK\Types\PhotoSize;

/**
 * Class Sticker
 * This object represents a sticker.
 *
 * @package TelegramBotSDK\Types
 */
class Sticker extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [
        'file_id',
        'file_unique_id',
        'type',
        'width',
        'height',
        'is_animated',
        'is_video',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'file_id' => true,
        'file_unique_id' => true,
        'type' => true,
        'width' => true,
        'height' => true,
        'is_animated' => true,
        'is_video' => true,
        'thumbnail' => PhotoSize::class,
        'emoji' => true,
        'set_name' => true,
        'premium_animation' => File::class,
        'mask_position' => MaskPosition::class,
        'custom_emoji_id' => true,
        'needs_repainting' => true,
        'file_size' => true,
    ];

    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected string $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    protected string $fileUniqueId;

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”.
     * The type of the sticker is independent from its format,
     * which is determined by the fields is_animated and is_video.
     *
     * @var StickerType
     */
    protected StickerType $type;

    /**
     * Sticker width
     *
     * @var int
     */
    protected int $width;

    /**
     * Sticker height
     *
     * @var int
     */
    protected int $height;

    /**
     * True, if the sticker is animated
     *
     * @var bool
     */
    protected bool $isAnimated;

    /**
     * True, if the sticker is a video sticker
     *
     * @var bool
     */
    protected bool $isVideo;

    /**
     * Optional. Sticker thumbnail in the .WEBP or .JPG format
     *
     * @var PhotoSize|null
     */
    protected ?PhotoSize $thumbnail = null;

    /**
     * Optional. Emoji associated with the sticker
     *
     * @var string|null
     */
    protected ?string $emoji = null;

    /**
     * Optional. Name of the sticker set to which the sticker belongs
     *
     * @var string|null
     */
    protected ?string $setName = null;

    /**
     * Optional. For premium regular stickers, premium animation for the sticker
     *
     * @var File|null
     */
    protected ?File $premiumAnimation = null;

    /**
     * Optional. For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition|null
     */
    protected ?MaskPosition $maskPosition = null;

    /**
     * Optional. For custom emoji stickers, unique identifier of the custom emoji
     *
     * @var string|null
     */
    protected ?string $customEmojiId = null;

    /**
     * Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium
     * badge in emoji status, white color on chat photos, or another appropriate color in other places
     *
     * @var bool|null
     */
    protected ?bool $needsRepainting = null;

    /**
     * Optional. File size in bytes
     *
     * @var int|null
     */
    protected ?int $fileSize = null;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     *
     * @return void
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    /**
     * @param string $fileUniqueId
     *
     * @return void
     */
    public function setFileUniqueId(string $fileUniqueId): void
    {
        $this->fileUniqueId = $fileUniqueId;
    }

    /**
     * @return StickerType
     */
    public function getType(): StickerType
    {
        return $this->type;
    }

    /**
     * @param StickerType|string $type
     * @return void
     */
    public function setType(StickerType|string $type): void
    {
        if ($type instanceof StickerType) {
            $this->type = $type;
        } else {
            $this->type = StickerType::tryFrom($type) ?? StickerType::Unknown;
        }
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return void
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return void
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return bool
     */
    public function isAnimated(): bool
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isAnimated
     *
     * @return void
     */
    public function setIsAnimated(bool $isAnimated): void
    {
        $this->isAnimated = $isAnimated;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->isVideo;
    }

    /**
     * @param bool $isVideo
     *
     * @return void
     */
    public function setIsVideo(bool $isVideo): void
    {
        $this->isVideo = $isVideo;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize $thumbnail
     *
     * @return void
     */
    public function setThumbnail(PhotoSize $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return null|string
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     *
     * @return void
     */
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    /**
     * @return null|string
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * @param string $setName
     *
     * @return void
     */
    public function setSetName(string $setName): void
    {
        $this->setName = $setName;
    }

    /**
     * @return File|null
     */
    public function getPremiumAnimation(): ?File
    {
        return $this->premiumAnimation;
    }

    /**
     * @param File $premiumAnimation
     *
     * @return void
     */
    public function setPremiumAnimation(File $premiumAnimation): void
    {
        $this->premiumAnimation = $premiumAnimation;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * @param MaskPosition $maskPosition
     *
     * @return void
     */
    public function setMaskPosition(MaskPosition $maskPosition): void
    {
        $this->maskPosition = $maskPosition;
    }

    /**
     * @return null|string
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
    }

    /**
     * @param string $customEmojiId
     *
     * @return void
     */
    public function setCustomEmojiId(string $customEmojiId): void
    {
        $this->customEmojiId = $customEmojiId;
    }

    /**
     * @return bool|null
     */
    public function getNeedsRepainting(): ?bool
    {
        return $this->needsRepainting;
    }

    /**
     * @param bool $needsRepainting
     *
     * @return void
     */
    public function setNeedsRepainting(?bool $needsRepainting): void
    {
        $this->needsRepainting = $needsRepainting;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     *
     * @return void
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }
}
