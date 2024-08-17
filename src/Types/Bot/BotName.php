<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class BotName
 * This object represents the bot's name.
 *
 * @package TelegramBotSDK\Types
 */
class BotName extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'name' => true,
    ];

    /**
     * The bot's name
     *
     * @var string
     */
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
