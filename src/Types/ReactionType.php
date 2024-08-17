<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
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
     * @var string
     */
    protected string $type;

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
