<?php

namespace TelegramBotSDK\Test\Types\Bot;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Collection\KeyHasUseException;
use TelegramBotSDK\Collection\ReachedMaxSizeException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\Bot\ArrayOfBotCommand;
use TelegramBotSDK\Types\Bot\BotCommand;

class ArrayOfBotCommandTest extends TestCase
{
    /**
     * @throws ReachedMaxSizeException|InvalidArgumentException|KeyHasUseException
     */
    public function testFromResponse()
    {
        $items = ArrayOfBotCommand::fromResponse([
            [
                'command' => 'start',
                'description' => 'This is a start command!',
            ],
        ]);

        $expected = [
            BotCommand::fromResponse([
                'command' => 'start',
                'description' => 'This is a start command!',
            ]),
        ];

        foreach ($items as $key => $item) {
            $this->assertEquals($expected[$key], $item);
        }
    }
}
