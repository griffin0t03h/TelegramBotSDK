<?php

namespace TelegramBotSDK\Test\Types\Sticker;

use TelegramBotSDK\Enum\StickerType;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\PhotoSizeTest;
use TelegramBotSDK\Types\Sticker\StickerSet;

class StickerSetTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'name' => 'name',
            'title' => 'title',
            'sticker_type' => StickerType::Regular->value,
            'is_animated' => true,
            'is_video' => true,
            'stickers' => [
                StickerTest::getMinResponse(),
            ],
            'thumbnail' => PhotoSizeTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'name' => 'name',
            'title' => 'title',
            'sticker_type' => StickerType::Regular->value,
            'is_animated' => true,
            'is_video' => true,
            'stickers' => [
                StickerTest::getMinResponse(),
            ],
        ];
    }

    protected static function getType(): string
    {
        return StickerSet::class;
    }

    /**
     * @param StickerSet $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals(StickerType::Regular, $item->getStickerType());
        $this->assertEquals([StickerTest::createMinInstance()], $item->getStickers());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param StickerSet $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('name', $item->getName());
        $this->assertEquals('title', $item->getTitle());
        $this->assertEquals(StickerType::Regular, $item->getStickerType());
        $this->assertEquals([StickerTest::createMinInstance()], $item->getStickers());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
