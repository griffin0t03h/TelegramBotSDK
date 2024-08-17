<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ForumTopicCreated
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @package TelegramBotSDK\Types
 */
class ForumTopicCreated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['name', 'icon_color'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'name' => true,
        'icon_color' => true,
        'icon_custom_emoji_id' => true,
    ];

    /**
     * Name of the forum topic
     *
     * @var string
     */
    protected string $name;

    /**
     * Color of the topic icon in RGB format
     *
     * @var int
     */
    protected int $iconColor;

    /**
     * Optional. Unique identifier of the custom emoji shown as the topic icon
     *
     * @var string|null
     */
    protected ?string $iconCustomEmojiId = null;

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

    /**
     * @return int
     */
    public function getIconColor(): int
    {
        return $this->iconColor;
    }

    /**
     * @param int $iconColor
     * @return void
     */
    public function setIconColor(int $iconColor): void
    {
        $this->iconColor = $iconColor;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->iconCustomEmojiId;
    }

    /**
     * @param string|null $iconCustomEmojiId
     * @return void
     */
    public function setIconCustomEmojiId(?string $iconCustomEmojiId): void
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
    }
}
