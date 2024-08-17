<?php

namespace TelegramBotSDK\Test\Types;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Types\ArrayOfUpdates;
use TelegramBotSDK\Types\Update;

class ArrayOfUpdatesTest extends TestCase
{
    public function data(): array
    {
        return [
            // item 1
            [
                [
                    [
                        'update_id' => 123456,
                        'message' => [
                            'message_id' => 13948,
                            'from' => [
                                'id' => 123,
                                'is_bot' => false,
                                'username' => 'griffin0t03h',
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                            ],
                            'chat' => [
                                'id' => 123,
                                'type' => 'private',
                                'username' => 'griffin0t03h',
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                            ],
                            'date' => 1440169809,
                            'text' => 'testText',
                        ],

                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider data
     */
    public function testFromResponse($data)
    {
        $items = ArrayOfUpdates::fromResponse($data);

        $this->assertIsArray($items);

        foreach ($items as $item) {
            $this->assertInstanceOf(Update::class, $item);
        }
    }
}
