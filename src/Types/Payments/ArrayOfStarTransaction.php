<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\Collection\KeyHasUseException;
use TelegramBotSDK\Collection\ReachedMaxSizeException;
use TelegramBotSDK\InvalidArgumentException;

class ArrayOfStarTransaction extends Collection
{
    /**
     * @param array $data
     * @return ArrayOfStarTransaction
     * @throws InvalidArgumentException|ReachedMaxSizeException|KeyHasUseException
     */
    public static function fromResponse(array $data): ArrayOfStarTransaction
    {
        $arrayOfStarTransaction = new self();
        foreach ($data as $starTransaction) {
            $arrayOfStarTransaction->addItem(StarTransaction::fromResponse($starTransaction));
        }

        return $arrayOfStarTransaction;
    }
}
