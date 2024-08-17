<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\ArrayOfChat;
use TelegramBotSDK\Types\Chat;

class ArrayOfChatTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function testFromResponse()
    {
        $items = ArrayOfChat::fromResponse([
            [
                'id' => 123456789,
                'type' => 'group',
            ],
            [
                'id' => 123456788,
                'type' => 'private',
            ],
        ]);

        $expected = [
            Chat::fromResponse([
                'id' => 123456789,
                'type' => 'group',
            ]),
            Chat::fromResponse([
                'id' => 123456788,
                'type' => 'private',
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
