<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\ArrayOfPollOption;
use TelegramBotSDK\Types\PollOption;

class ArrayOfPollOptionTest extends TestCase
{
    public function testFromResponse()
    {
        $items = ArrayOfPollOption::fromResponse([
            [
                'text' => 'text',
                'voter_count' => 3,
            ],
        ]);

        $expected = [
            PollOption::fromResponse([
                'text' => 'text',
                'voter_count' => 3,
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
