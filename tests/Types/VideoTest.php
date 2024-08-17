<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Video;

class VideoTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => PhotoSizeTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
        ];
    }

    protected static function getType(): string
    {
        return Video::class;
    }

    /**
     * file_id is required
     */
    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
            'thumbnail' => [
                'file_id' => 'testFileId1',
                'width' => 5,
                'height' => 6,
                'file_size' => 7,
            ],
        ]);
    }

    /**
     * width is required
     */
    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'height' => 2,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
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
     * height is required
     */
    public function testFromResponseException3()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'duration' => 3,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
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
     * duration is required
     */
    public function testFromResponseException4()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'file_unique_id' => 'testFileUniqueId1',
            'width' => 1,
            'height' => 2,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
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
     * file_unique_id is required
     */
    public function testFromResponseException5()
    {
        $this->expectException(InvalidArgumentException::class);

        Video::fromResponse([
            'file_id' => 'testFileId1',
            'width' => 1,
            'height' => 2,
            'duration' => 1,
            'mime_type' => 'video/mp4',
            'file_size' => 4,
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
     * @param Video $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getDuration());
        $this->assertNull($item->getMimeType());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getThumbnail());
    }

    /**
     * @param Video $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('testFileUniqueId1', $item->getFileUniqueId());
        $this->assertEquals(1, $item->getWidth());
        $this->assertEquals(2, $item->getHeight());
        $this->assertEquals(3, $item->getDuration());
        $this->assertEquals('video/mp4', $item->getMimeType());
        $this->assertEquals(4, $item->getFileSize());
        $this->assertEquals(PhotoSizeTest::createMinInstance(), $item->getThumbnail());
    }
}
