<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\ArrayOfChatMemberEntity;
use TelegramBotSDK\Types\ChatMember;

class ArrayOfChatMemberEntityTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function testFromResponse()
    {
        $items = ArrayOfChatMemberEntity::fromResponse([
            [
                'user' => [
                    'id' => 1,
                    'is_bot' => false,
                    'first_name' => 'Griffin T-3H',
                ],
                'status' => 'member',
            ],
        ]);

        $expected = [
            ChatMember::fromResponse([
                'user' => [
                    'id' => 1,
                    'is_bot' => false,
                    'first_name' => 'Griffin T-3H',
                ],
                'status' => 'member',
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
