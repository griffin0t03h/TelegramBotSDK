<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ReactionCount
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @package TelegramBotSDK\Types
 */
class ReactionCount extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'total_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => ReactionType::class,
        'total_count' => true,
    ];

    /**
     * Type of the reaction
     *
     * @var ReactionType
     */
    protected ReactionType $type;

    /**
     * Number of times the reaction was added
     *
     * @var int
     */
    protected int $totalCount;

    /**
     * @return ReactionType
     */
    public function getType(): ReactionType
    {
        return $this->type;
    }

    /**
     * @param ReactionType $type
     * @return void
     */
    public function setType(ReactionType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return void
     */
    public function setTotalCount(int $totalCount): void
    {
        $this->totalCount = $totalCount;
    }
}
