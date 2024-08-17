<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Enum\PaidMediaType;

/**
 * Class PaidMediaPreview
 * The paid media isn't available before the payment.
 *
 * @see https://core.telegram.org/bots/api#paidmediapreview
 *
 * @package TelegramBotSDK\Types\Payments
 */
class PaidMediaPreview extends PaidMedia
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'width' => true,
        'height' => true,
        'duration' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var PaidMediaType
     */
    protected PaidMediaType $type = PaidMediaType::Preview;

    /**
     * Optional. Media width as defined by the sender
     *
     * @var int|null
     */
    protected ?int $width;

    /**
     * Optional. Media height as defined by the sender
     *
     * @var int|null
     */
    protected ?int $height;

    /**
     * Optional. Duration of the media in seconds as defined by the sender
     *
     * @var int|null
     */
    protected ?int $duration;

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     * @return void
     */
    public function setWidth(?int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     * @return void
     */
    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     * @return void
     */
    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
    }
}
