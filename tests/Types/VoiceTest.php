<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Voice;

class VoiceTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ];
    }

    protected static function getType(): string
    {
        return Voice::class;
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        Voice::fromResponse([
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Voice::fromResponse([
            'file_id' => 'testFileId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ]);
    }

    /**
     * @param Voice $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Voice $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
    }
}
