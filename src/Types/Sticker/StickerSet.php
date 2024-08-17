<?php

namespace TelegramBotSDK\Types\Sticker;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\StickerType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\PhotoSize;

/**
 * Class StickerSet
 * This object represents a sticker set.
 *
 * @see https://core.telegram.org/bots/api#stickerset
 *
 * @package TelegramBotSDK\Types
 */
class StickerSet extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [
        'name',
        'title',
        'sticker_type',
        'stickers',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'name' => true,
        'title' => true,
        'sticker_type' => true,
        'stickers' => ArrayOfSticker::class,
        'thumbnail' => PhotoSize::class,
    ];

    /**
     * Sticker set name
     *
     * @var string
     */
    protected string $name;

    /**
     * Sticker set title
     *
     * @var string
     */
    protected string $title;

    /**
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     *
     * @var StickerType
     */
    protected StickerType $stickerType;

    /**
     * List of all set stickers
     *
     * @var Sticker[]
     */
    protected array $stickers;

    /**
     * Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     *
     * @var PhotoSize|null
     */
    protected ?PhotoSize $thumbnail = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return StickerType
     */
    public function getStickerType(): StickerType
    {
        return $this->stickerType;
    }

    /**
     * @param StickerType|string $stickerType
     * @return void
     */
    public function setStickerType(StickerType|string $stickerType): void
    {
        if ($stickerType instanceof StickerType) {
            $this->stickerType = $stickerType;
        } else {
            $this->stickerType = StickerType::tryFrom($stickerType) ?? StickerType::Unknown;
        }
    }

    /**
     * @return Sticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
     * @param Sticker[] $stickers
     *
     * @return void
     */
    public function setStickers(array $stickers): void
    {
        $this->stickers = $stickers;
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
}
