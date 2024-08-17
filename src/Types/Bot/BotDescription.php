<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BotDescription
 * This object represents the bot's description.
 *
 * @package TelegramBotSDK\Types
 */
class BotDescription extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'description' => true,
    ];

    /**
     * The bot's description
     *
     * @var string
     */
    protected string $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
