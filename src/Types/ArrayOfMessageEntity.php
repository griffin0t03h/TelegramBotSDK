<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\Collection\KeyHasUseException;
use TelegramBotSDK\Collection\ReachedMaxSizeException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

class ArrayOfMessageEntity extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return ArrayOfMessageEntity
     * @throws InvalidArgumentException|ReachedMaxSizeException|KeyHasUseException
     */
    public static function fromResponse(array $data): ArrayOfMessageEntity
    {
        $arrayOfBotCommand = new self();
        foreach ($data as $messageEntity) {
            $arrayOfBotCommand->addItem(MessageEntity::fromResponse($messageEntity));
        }
        return $arrayOfBotCommand;
    }
}
