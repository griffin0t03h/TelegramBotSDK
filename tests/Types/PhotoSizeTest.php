<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\PhotoSize;

class PhotoSizeTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'file_size' => 3,
        ];
    }

    protected static function getType(): string
    {
        return PhotoSize::class;
    }

    /**
     * @param PhotoSize $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param PhotoSize $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getFileSize());
    }
}
