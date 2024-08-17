<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Audio;

class AudioTest extends AbstractTypeTest
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
            'performer' => 'testperformer',
            'title' => 'testtitle',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ];
    }

    protected static function getType(): string
    {
        return Audio::class;
    }

    /**
     * file_id is missing
     */
    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_unique_id' => 'testFileUniqueId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ]);
    }

    /**
     * duration is missing
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ]);
    }

    /**
     * file_unique_id is missing
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Audio::fromResponse([
            'file_id' => 'testFileId1',
            'duration' => 1,
            'mime_type' => 'audio/mp3',
            'file_size' => 3,
        ]);
    }

    /**
     * @param Audio $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertNull($item->getPerformer());
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
    }

    /**
     * @param Audio $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getDuration());
        $this->assertEquals('testperformer', $item->getPerformer());
        $this->assertEquals('testtitle', $item->getTitle());
        $this->assertEquals('audio/mp3', $item->getMimeType());
        $this->assertEquals(3, $item->getFileSize());
    }

}
