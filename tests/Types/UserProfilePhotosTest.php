<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\UserProfilePhotos;

class UserProfilePhotosTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'total_count' => 1,
            'photos' => [
                [
                    PhotoSizeTest::getMinResponse(),
                ],
            ],
        ];
    }

    protected static function getType(): string
    {
        return UserProfilePhotos::class;
    }

    /**
     * @param UserProfilePhotos $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param UserProfilePhotos $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(1, $item->getTotalCount());
        $this->assertEquals([[PhotoSizeTest::createMinInstance()]], $item->getPhotos());
    }
}
