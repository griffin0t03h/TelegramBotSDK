<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Sticker\Sticker;

/**
 * Class BusinessIntro
 * Contains information about the start page settings of a Telegram Business account.
 *
 * @package TelegramBotSDK\Types
 */
class BusinessIntro extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'title' => true,
        'message' => true,
        'sticker' => Sticker::class,
    ];

    /**
     * Optional. Title text of the business intro
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Optional. Message text of the business intro
     *
     * @var string|null
     */
    protected ?string $message = null;

    /**
     * Optional. Sticker of the business intro
     *
     * @var Sticker|null
     */
    protected ?Sticker $sticker = null;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     * @return void
     */
    public function setSticker(?Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }
}
