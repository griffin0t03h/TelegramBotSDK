<?php

namespace TelegramBotSDK\Test\Types\Sticker;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\Sticker\ArrayOfSticker;
use TelegramBotSDK\Types\Sticker\Sticker;

class ArrayOfStickerTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfSticker::fromResponse([
            [
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'type' => 'regular',
                'width' => 1,
                'height' => 2,
                'is_animated' => false,
                'is_video' => false,
            ],
        ]);

        $expected = [
            Sticker::fromResponse([
                'file_id' => 'testFileId1',
                'file_unique_id' => 'testFileUniqueId1',
                'type' => 'regular',
                'width' => 1,
                'height' => 2,
                'is_animated' => false,
                'is_video' => false,
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
