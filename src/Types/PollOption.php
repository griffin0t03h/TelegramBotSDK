<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class PollOption
 * This object contains information about one answer option in a poll.
 *
 * @package TelegramBotSDK\Types
 */
class PollOption extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['text', 'voter_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'text' => true,
        'voter_count' => true,
        'text_entities' => ArrayOfMessageEntity::class,
    ];

    /**
     * Option text, 1-100 characters
     *
     * @var string
     */
    protected string $text;

    /**
     * Number of users that voted for this option
     *
     * @var integer
     */
    protected int $voterCount;

    /**
     * Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in
     * poll option texts
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
     * @return int
     *
     * @see $voterCount
     */
    public function getVoterCount(): int
    {
        return $this->voterCount;
    }

    /**
     * @param int $voterCount
     * @return void
     *
     * @see $voterCount
     */
    public function setVoterCount(int $voterCount): void
    {
        $this->voterCount = $voterCount;
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
