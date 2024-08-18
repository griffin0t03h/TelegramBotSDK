<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\ReactionTypeEnum;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class ReactionType
 * This object describes the type of a reaction.
 *
 * @package TelegramBotSDK\Types
 */
abstract class ReactionType extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
    ];

    /**
     * Type of the reaction
     *
     * @var ReactionTypeEnum
     */
    protected ReactionTypeEnum $type;

    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): ReactionType|ReactionTypeEmoji|ReactionTypeCustomEmoji|ReactionTypePaid|static
    {
        self::validate($data);

        $class = match ($data['type']) {
            ReactionTypeEnum::Emoji->value => ReactionTypeEmoji::class,
            ReactionTypeEnum::CustomEmoji->value => ReactionTypeCustomEmoji::class,
            ReactionTypeEnum::Paid->value => ReactionTypePaid::class,
            default => ReactionType::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * Get the type of the reaction.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the type of the reaction.
     *
     * @param string $type
     */
    protected function setType(string $type): void
    {
        $this->type = $type;
    }
}
