<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\Collection\KeyHasUseException;
use TelegramBotSDK\Collection\ReachedMaxSizeException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

class ArrayOfLabeledPrice extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return ArrayOfLabeledPrice
     * @throws InvalidArgumentException|ReachedMaxSizeException|KeyHasUseException
     */
    public static function fromResponse(array $data): ArrayOfLabeledPrice
    {
        $arrayOfLabeledPrice = new self();
        foreach ($data as $labeledPrice) {
            $arrayOfLabeledPrice->addItem(LabeledPrice::fromResponse($labeledPrice));
        }

        return $arrayOfLabeledPrice;
    }
}
