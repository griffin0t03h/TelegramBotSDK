<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Dice
 * This object represents an animated emoji that displays a random value.
 *
 * @package TelegramBotSDK\Types
 */
class Dice extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['emoji', 'value'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'emoji' => true,
        'value' => true,
    ];

    /**
     * Emoji on which the dice throw animation is based
     *
     * @var string
     */
    protected string $emoji;

    /**
     * Value of the dice, 1-6 for “🎲” and “🎯” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     *
     * @var int
     */
    protected int $value;

    /**
     * @return string
     *
     * @see $emoji
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     * @return void
     *
     * @see $emoji
     */
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    /**
     * @return int
     *
     * @see $value
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return void
     *
     * @see $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
}
