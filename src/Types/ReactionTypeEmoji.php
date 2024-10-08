<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ReactionTypeEnum;

/**
 * Class ReactionTypeEmoji
 * This object describes a reaction based on an emoji.
 *
 * @package TelegramBotSDK
 */
class ReactionTypeEmoji extends ReactionType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'emoji' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'emoji'];

    /**
     * {@inheritdoc}
     *
     * @var ReactionTypeEnum
     */
    protected ReactionTypeEnum $type = ReactionTypeEnum::Emoji;

    /**
     * Reaction emoji
     *
     * @var string
     */
    protected string $emoji;

    /**
     * Get the reaction emoji.
     *
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * Set the reaction emoji.
     *
     * @param string $emoji
     */
    protected function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }
}
