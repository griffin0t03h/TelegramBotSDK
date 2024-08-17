<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\Collection\KeyHasUseException;
use TelegramBotSDK\Collection\ReachedMaxSizeException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

final class ArrayOfBotCommand extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return ArrayOfBotCommand
     * @throws InvalidArgumentException|ReachedMaxSizeException|KeyHasUseException
     */
    public static function fromResponse(array $data): ArrayOfBotCommand
    {
        $arrayOfBotCommand = new self();
        foreach ($data as $botCommand) {
            $arrayOfBotCommand->addItem(BotCommand::fromResponse($botCommand));
        }
        return $arrayOfBotCommand;
    }
}
