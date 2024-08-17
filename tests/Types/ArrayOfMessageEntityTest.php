<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\MessageEntity;

class ArrayOfMessageEntityTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfMessageEntity::fromResponse([
            [
                'type' => 'mention',
                'offset' => 0,
                'length' => 10,
            ],
        ]);

        $expected = [
            MessageEntity::fromResponse([
                'type' => 'mention',
                'offset' => 0,
                'length' => 10,
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
