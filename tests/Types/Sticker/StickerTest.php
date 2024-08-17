<?php

namespace TelegramBotSDK\Test\Types\Sticker;

use TelegramBotSDK\Enum\StickerType;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\FileTest;
use TelegramBotSDK\Test\Types\MaskPositionTest;
use TelegramBotSDK\Test\Types\PhotoSizeTest;
use TelegramBotSDK\Types\Sticker\Sticker;

class StickerTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'type' => StickerType::Regular->value,
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
            'file_size' => 3,
            'premium_animation' => FileTest::getMinResponse(),
            'emoji' => '🎉',
            'thumbnail' => PhotoSizeTest::getMinResponse(),
            'set_name' => 'set',
            'custom_emoji_id' => 'custom_emoji_id',
            'mask_position' => MaskPositionTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'type' => StickerType::Regular->value,
            'width' => 1,
            'height' => 2,
            'is_animated' => false,
            'is_video' => false,
        ];
    }

    /**
     * @param Sticker $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(StickerType::Regular, $item->getType());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertFalse($item->isAnimated());
        $this->assertFalse($item->isVideo());
    }

    protected static function getType(): string
    {
        return Sticker::class;
    }

    /**
     * @param Sticker $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(StickerType::Regular, $item->getType());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertFalse($item->isAnimated());
        $this->assertEquals(FileTest::createMinInstance(), $item->getPremiumAnimation());
        $this->assertFalse($item->isVideo());
        $this->assertEquals('🎉', $item->getEmoji());
        $this->assertEquals('set', $item->getSetName());
        $this->assertEquals('custom_emoji_id', $item->getCustomEmojiId());
        $this->assertEquals(MaskPositionTest::createMinInstance(), $item->getMaskPosition());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
