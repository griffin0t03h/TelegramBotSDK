<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ReactionTypeEnum;

/**
 * Class ReactionTypeCustomEmoji
 * This object describes a reaction based on a custom emoji.
 *
 * @package TelegramBotSDK
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'custom_emoji_id' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'custom_emoji_id'];

    /**
     * {@inheritdoc}
     *
     * @var ReactionTypeEnum
     */
    protected ReactionTypeEnum $type = ReactionTypeEnum::CustomEmoji;

    /**
     * Custom emoji identifier
     *
     * @var string
     */
    protected string $customEmojiId;

    /**
     * Get the custom emoji identifier.
     *
     * @return string
     */
    public function getCustomEmojiId(): string
    {
        return $this->customEmojiId;
    }

    /**
     * Set the custom emoji identifier.
     *
     * @param string $customEmojiId
     */
    protected function setCustomEmojiId(string $customEmojiId): void
    {
        $this->customEmojiId = $customEmojiId;
    }
}
