<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BotShortDescription
 * This object represents the bot's short description.
 *
 * @package TelegramBotSDK\Types
 */
class BotShortDescription extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['short_description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'short_description' => true,
    ];

    /**
     * The bot's short description
     *
     * @var string
     */
    protected string $shortDescription;

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }
}
