<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\ArrayOfUser;
use TelegramBotSDK\Types\User;

class ArrayOfUserTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfUser::fromResponse([
            [
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Griffin T-3H',
            ],
        ]);

        $expected = [
            User::fromResponse([
                'id' => 1,
                'is_bot' => false,
                'first_name' => 'Griffin T-3H',
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
