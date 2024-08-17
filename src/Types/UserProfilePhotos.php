<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class UserProfilePhotos
 * This object represent a user's profile pictures.
 *
 * @package TelegramBotSDK\Types
 */
class UserProfilePhotos extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['total_count', 'photos'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'total_count' => true,
        'photos' => ArrayOfArrayOfPhotoSize::class,
    ];

    /**
     * Total number of profile pictures the target user has
     *
     * @var int
     */
    protected int $totalCount;

    /**
     * Requested profile pictures (in up to 4 sizes each).
     *
     * @var PhotoSize[]
     */
    protected array $photos;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return void
     */
    public function setTotalCount(int $totalCount): void
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param PhotoSize[] $photos
     * @return void
     */
    public function setPhotos(array $photos): void
    {
        $this->photos = $photos;
    }
}
