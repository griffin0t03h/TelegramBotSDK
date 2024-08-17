<?php

namespace TelegramBotSDK\Types\Bot;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;
use TelegramBotSDK\TypeInterface;

/**
 * Class BotCommand
 * This object represents a bot command.
 *
 * @package TelegramBotSDK\Types
 */
class BotCommand extends BaseType implements TypeInterface, CollectionItemInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['command', 'description'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'command' => true,
        'description' => true,
    ];

    /**
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     *
     * @var string
     */
    protected string $command;

    /**
     * Description of the command; 1-256 characters.
     *
     * @var string
     */
    protected string $description;

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     * @return void
     */
    public function setCommand(string $command): void
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
