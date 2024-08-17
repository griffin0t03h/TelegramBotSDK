<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Animation;

class AnimationTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'width' => 10,
            'height' => 20,
            'duration' => 30,
            'thumbnail' => PhotoSizeTest::getMinResponse(),
            'file_name' => 'file_name',
            'mime_type' => 'mime_type',
            'file_size' => 100,
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'width' => 10,
            'height' => 20,
            'duration' => 30,
        ];
    }

    protected static function getType(): string
    {
        return Animation::class;
    }

    /**
     * @param Animation $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(10, $item->getWidth());
        $this->assertEquals(20, $item->getHeight());
        $this->assertEquals(30, $item->getDuration());
        $this->assertNull($item->getThumbnail());
        $this->assertNull($item->getFileName());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Animation $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(10, $item->getWidth());
        $this->assertEquals(20, $item->getHeight());
        $this->assertEquals(30, $item->getDuration());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
        $this->assertEquals('file_name', $item->getFileName());
        $this->assertEquals('mime_type', $item->getMimeType());
        $this->assertEquals(100, $item->getFileSize());
    }
}
