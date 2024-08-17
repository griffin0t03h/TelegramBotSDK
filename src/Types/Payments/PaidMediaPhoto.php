<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Types\ArrayOfPhotoSize;
use TelegramBotSDK\Types\PhotoSize;

/**
 * Class PaidMediaPhoto
 * The paid media is a photo.
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @package TelegramBotSDK\Types\Payments
 */
class PaidMediaPhoto extends PaidMedia
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type', 'photo'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'photo' => ArrayOfPhotoSize::class,
    ];

    /**
     * The photo
     *
     * @var PhotoSize[]
     */
    protected array $photo;

    /**
     * @return array
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param array $photo
     * @return void
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }
}
