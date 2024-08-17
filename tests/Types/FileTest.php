<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\File;

class FileTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'file_id' => 'testFileId1',
            'file_unique_id' => 'file_unique_id',
            'file_size' => 3,
            'file_path' => 'testfilepath',
        ];
    }

    protected static function getType(): string
    {
        return File::class;
    }

    public function testFromResponseException()
    {
        $this->expectException(InvalidArgumentException::class);

        File::fromResponse([
            'file_size' => 3,
            'file_path' => 'testfilepath',
        ]);
    }

    /**
     * @param File $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertNull($item->getFileUniqueId());
        $this->assertNull($item->getFileSize());
        $this->assertNull($item->getFilePath());
    }

    /**
     * @param File $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('testFileId1', $item->getFileId());
        $this->assertEquals('file_unique_id', $item->getFileUniqueId());
        $this->assertEquals(3, $item->getFileSize());
        $this->assertEquals('testfilepath', $item->getFilePath());
    }
}
