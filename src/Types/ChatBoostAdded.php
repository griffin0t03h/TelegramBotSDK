<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBoostAdded
 * This object represents a service message about a user boosting a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostAdded extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['boost_count'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'boost_count' => true,
    ];

    /**
     * Number of boosts added by the user
     *
     * @var int
     */
    protected int $boostCount;

    /**
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boostCount;
    }

    /**
     * @param int $boostCount
     * @return void
     */
    public function setBoostCount(int $boostCount): void
    {
        $this->boostCount = $boostCount;
    }
}
