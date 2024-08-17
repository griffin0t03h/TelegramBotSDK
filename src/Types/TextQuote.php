<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class TextQuote
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @package TelegramBotSDK\Types
 */
class TextQuote extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['text', 'position'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'position' => true,
        'is_manual' => true,
    ];

    /**
     * Text of the quoted part of a message that is replied to by the given message
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough,
     * spoiler, and custom_emoji entities are kept in quotes.
     *
     * @var MessageEntity[]|null
     */
    protected ?array $entities = null;

    /**
     * Approximate quote position in the original message in UTF-16 code units as specified by the sender
     *
     * @var int
     */
    protected int $position;

    /**
     * Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added
     * automatically by the server.
     *
     * @var bool|null
     */
    protected ?bool $isManual = null;

    /**
     * @return string
     *
     * @see $text
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     *
     * @see $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     *
     * @see $entities
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     * @return void
     *
     * @see $entities
     */
    public function setEntities(?array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return int
     *
     * @see $position
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return void
     *
     * @see $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return bool|null
     *
     * @see $isManual
     */
    public function getIsManual(): ?bool
    {
        return $this->isManual;
    }

    /**
     * @param bool|null $isManual
     * @return void
     *
     * @see $isManual
     */
    public function setIsManual(?bool $isManual): void
    {
        $this->isManual = $isManual;
    }
}
