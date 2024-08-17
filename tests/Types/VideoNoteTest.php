<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\VideoNote;

class VideoNoteTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'length' => 1,
            'duration' => 2,
            'thumbnail' => PhotoSizeTest::getMinResponse(),
            'file_size' => 3,
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'file_id',
            'file_unique_id' => 'file_unique_id',
            'length' => 1,
            'duration' => 2,
        ];
    }

    protected static function getType(): string
    {
        return VideoNote::class;
    }

    /**
     * @param VideoNote $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getLength());
        $this->assertEquals(2, $item->getDuration());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param VideoNote $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('file_id', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getLength());
        $this->assertEquals(2, $item->getDuration());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
