<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\ArrayOfMessages;
use TelegramBotSDK\Types\Message;

class ArrayOfMessagesTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfMessages::fromResponse([
            [
                'message_id' => 1,
                'date' => 1682343644,
                'chat' => [
                    'id' => 2,
                    'type' => 'private',
                ],
            ],
        ]);

        $expected = [
            Message::fromResponse([
                'message_id' => 1,
                'date' => 1682343644,
                'chat' => [
                    'id' => 2,
                    'type' => 'private',
                ],
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
