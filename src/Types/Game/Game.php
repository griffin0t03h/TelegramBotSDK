<?php

namespace TelegramBotSDK\Types\Game;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Animation;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\ArrayOfPhotoSize;
use TelegramBotSDK\Types\MessageEntity;
use TelegramBotSDK\Types\PhotoSize;

/**
 * Class Game
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique
 * identifiers.
 *
 * @see https://core.telegram.org/bots/api#game
 *
 * @package TelegramBotSDK\Types
 */
class Game extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['title', 'description', 'photo'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'title' => true,
        'description' => true,
        'photo' => ArrayOfPhotoSize::class,
        'text' => true,
        'text_entities' => ArrayOfMessageEntity::class,
        'animation' => Animation::class,
    ];

    /**
     * Title of the game
     *
     * @var string
     */
    protected string $title;

    /**
     * Description of the game
     *
     * @var string
     */
    protected string $description;

    /**
     * Photo that will be displayed in the game message in chats
     *
     * @var PhotoSize[]
     */
    protected array $photo;

    /**
     * Optional. Brief description of the game or high scores included in the game message
     *
     * @var string|null
     */
    protected ?string $text = null;

    /**
     * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntity[]|null
     */
    protected ?array $textEntities = null;

    /**
     * Optional. Animation that will be displayed in the game message in chats
     *
     * @var Animation|null
     */
    protected ?Animation $animation = null;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->textEntities;
    }

    /**
     * @param MessageEntity[]|null $textEntities
     */
    public function setTextEntities(?array $textEntities): void
    {
        $this->textEntities = $textEntities;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     */
    public function setAnimation(?Animation $animation): void
    {
        $this->animation = $animation;
    }
}
