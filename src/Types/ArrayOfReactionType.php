<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Collection\Collection;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

class ArrayOfReactionType extends Collection implements TypeInterface
{
    /**
     * @param array $data
     * @return ReactionType[]
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): array
    {
        $arrayOfReactionType = [];
        foreach ($data as $reactionType) {
            switch ($reactionType['type']) {
                case 'emoji':
                    $arrayOfReactionType[] = ReactionTypeEmoji::fromResponse($reactionType);
                    break;
                case 'custom_emoji':
                    $arrayOfReactionType[] = ReactionTypeCustomEmoji::fromResponse($reactionType);
                    break;
            }
        }
        return $arrayOfReactionType;
    }
}
