<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;

/**
 * Class PaidMediaInfo
 * Describes the paid media added to a message.
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 *
 * @package TelegramBotSDK\Types\Payments
 */
class PaidMediaInfo extends BaseType
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['star_count', 'paid_media'];

    /**
     * @var array
     */
    protected static array $map = [
        'star_count' => true,
        'paid_media' => ArrayOfPaidMedia::class,
    ];

    /**
     * The number of Telegram Stars that must be paid to buy access to the media
     *
     * @var int
     */
    protected int $starCount;

    /**
     * Information about the paid media
     *
     * @var PaidMedia[]
     */
    protected array $paidMedia;

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->starCount;
    }

    /**
     * @param int $starCount
     * @return void
     */
    public function setStarCount(int $starCount): void
    {
        $this->starCount = $starCount;
    }

    /**
     * @return PaidMedia[]
     */
    public function getPaidMedia(): array
    {
        return $this->paidMedia;
    }

    /**
     * @param PaidMedia[] $paidMedia
     * @return void
     */
    public function setPaidMedia(array $paidMedia): void
    {
        $this->paidMedia = $paidMedia;
    }
}
