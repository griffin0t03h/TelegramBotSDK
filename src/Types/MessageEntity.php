<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Collection\CollectionItemInterface;
use TelegramBotSDK\Enum\MessageEntityType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageEntity
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @package TelegramBotSDK\Types
 */
class MessageEntity extends BaseType implements TypeInterface, CollectionItemInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'offset', 'length'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'offset' => true,
        'length' => true,
        'url' => true,
        'user' => User::class,
        'language' => true,
        'custom_emoji_id' => true,
    ];

    /**
     * Type of the entity.
     * One of mention (@username), hashtag (#hashtag), cashtag ($USD), bot_command, url, email, phone_number,
     * bold (bold text), italic (italic text), underline (underlined text), strikethrough (strikethrough text),
     * code (monowidth string), pre (monowidth block), text_link (for clickable text URLs),
     * text_mention (for users without usernames), custom_emoji (for inline custom emoji stickers)
     *
     * @var MessageEntityType
     */
    protected MessageEntityType $type;

    /**
     * Offset in [UTF-16 code units](https://core.telegram.org/api/entities#entity-length) to the start of the entity
     *
     * @var int
     */
    protected int $offset;

    /**
     * Length of the entity in [UTF-16 code units](https://core.telegram.org/api/entities#entity-length)
     *
     * @var int
     */
    protected int $length;

    /**
     * Optional. For “text_link” only, URL that will be opened after user taps on the text
     *
     * @var string|null
     */
    protected ?string $url = null;

    /**
     * Optional. For “text_mention” only, the mentioned user
     *
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * Optional. For “pre” only, the programming language of the entity text
     *
     * @var string|null
     */
    protected ?string $language = null;

    /**
     * Optional. For “custom_emoji” only, unique identifier of the custom emoji.
     * Use getCustomEmojiStickers to get full information about the sticker
     *
     * @see \TelegramBotSDK\Api\BotApi::getCustomEmojiStickers()
     *
     * @var string|null
     */
    protected ?string $customEmojiId = null;

    /**
     * @return MessageEntityType
     *
     * @see $type
     */
    public function getType(): MessageEntityType
    {
        return $this->type;
    }

    /**
     * @param MessageEntityType|string $type
     * @return void
     *
     * @see $type
     */
    public function setType(MessageEntityType|string $type): void
    {
        if ($type instanceof MessageEntityType) {
            $this->type = $type;
        } else {
            $this->type = MessageEntityType::tryFrom($type) ?? MessageEntityType::Unknown;
        }
    }

    /**
     * @return int
     *
     * @see $offset
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return void
     *
     * @see $offset
     */
    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     *
     * @see length
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return void
     *
     * @see length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return string|null
     *
     * @see $url
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return void
     *
     * @see $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return User|null
     *
     * @see $user
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return void
     *
     * @see $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     *
     * @see $language
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return void
     *
     * @see $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return null|string
     *
     * @see $customEmojiId
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
    }

    /**
     * @param string|null $customEmojiId
     * @return void
     *
     * @see $customEmojiId
     */
    public function setCustomEmojiId(?string $customEmojiId): void
    {
        $this->customEmojiId = $customEmojiId;
    }
}
