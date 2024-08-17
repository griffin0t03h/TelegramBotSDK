<?php

namespace TelegramBotSDK\Test\Types\Bot;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Bot\BotCommand;

class BotCommandTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return static::getMinResponse();
    }

    public static function getMinResponse(): array
    {
        return [
            'command' => 'start',
            'description' => 'This is a start command!',
        ];
    }

    protected static function getType(): string
    {
        return BotCommand::class;
    }

    /**
     * @param BotCommand $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertMinItem($item);
    }

    /**
     * @param BotCommand $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('start', $item->getCommand());
        $this->assertEquals('This is a start command!', $item->getDescription());
    }
}
