<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Document;

class DocumentTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumbnail' => PhotoSizeTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
        ];
    }

    protected static function getType(): string
    {
        return Document::class;
    }

    /**
     * file_id and file_unique_id are required
     */
    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        Document::fromResponse([
            'file_name' => 'testFileName',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7,
            ],
        ]);
    }

    /**
     * @param Document $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertNull($item->getFileName());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param Document $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals('testFileName', $item->getFileName());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
