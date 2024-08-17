<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ForumTopicEdited
 * This object represents a service message about an edited forum topic.
 *
 * @package TelegramBotSDK\Types
 */
class ForumTopicEdited extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'name' => true,
        'icon_custom_emoji_id' => true,
    ];

    /**
     * Optional. New name of the topic, if it was edited
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the
     * icon was removed
     *
     * @var string|null
     */
    protected ?string $iconCustomEmojiId = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
