<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class InputPollOption
 * This object contains information about one answer option in a poll to send.
 *
 * @package TelegramBotSDK\Types
 */
class InputPollOption extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'text' => true,
        'text_parse_mode' => true,
        'text_entities' => ArrayOfMessageEntity::class,
    ];

    /**
     * Option text, 1-100 characters
     *
     * @var string
     */
    protected string $text;

    /**
     * Optional. Mode for parsing entities in the text. See [formatting
     * options](https://core.telegram.org/bots/api#formatting-options) for more details. Currently, only custom emoji
     * entities are allowed
     *
     * @var string|null
     */
    protected ?string $textParseMode = null;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be specified
     * instead of text_parse_mode
     *
     * @var MessageEntity[]|null
     */
    protected ?array $textEntities = null;

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
     * @return string|null
     *
     * @see $textParseMode
     */
    public function getTextParseMode(): ?string
    {
        return $this->textParseMode;
    }

    /**
     * @param string|null $textParseMode
     * @return void
     *
     * @see $textParseMode
     */
    public function setTextParseMode(?string $textParseMode): void
    {
        $this->textParseMode = $textParseMode;
    }

    /**
     * @return MessageEntity[]|null
     *
     * @see $textEntities
     */
    public function getTextEntities(): ?array
    {
        return $this->textEntities;
    }

    /**
     * @param MessageEntity[]|null $textEntities
     * @return void
     *
     * @see $textEntities
     */
    public function setTextEntities(?array $textEntities): void
    {
        $this->textEntities = $textEntities;
    }
}
