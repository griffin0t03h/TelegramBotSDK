<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatPhoto;

class ChatPhotoTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'small_file_id' => 'small_file_id',
            'small_file_unique_id' => 'small_file_unique_id',
            'big_file_id' => 'big_file_id',
            'big_file_unique_id' => 'big_file_unique_id',
        ];
    }

    protected static function getType(): string
    {
        return ChatPhoto::class;
    }

    /**
     * @param ChatPhoto $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param ChatPhoto $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('small_file_id', $item->getSmallFileId());
        $this->assertEquals('small_file_unique_id', $item->getSmallFileUniqueId());
        $this->assertEquals('big_file_id', $item->getBigFileId());
        $this->assertEquals('big_file_unique_id', $item->getBigFileUniqueId());
    }
}
