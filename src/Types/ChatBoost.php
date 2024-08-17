<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBoost
 * This object contains information about a chat boost.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoost extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['boost_id', 'add_date', 'expiration_date', 'source'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'boost_id' => true,
        'add_date' => true,
        'expiration_date' => true,
        'source' => ChatBoostSource::class,
    ];

    /**
     * Unique identifier of the boost
     *
     * @var string
     */
    protected string $boostId;

    /**
     * Point in time (Unix timestamp) when the chat was boosted
     *
     * @var int
     */
    protected int $addDate;

    /**
     * Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium
     * subscription is prolonged
     *
     * @var int
     */
    protected int $expirationDate;

    /**
     * Source of the added boost
     *
     * @var ChatBoostSource
     */
    protected ChatBoostSource $source;

    /**
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boostId;
    }

    /**
     * @param string $boostId
     */
    public function setBoostId(string $boostId): void
    {
        $this->boostId = $boostId;
    }

    /**
     * @return int
     */
    public function getAddDate(): int
    {
        return $this->addDate;
    }

    /**
     * @param int $addDate
     */
    public function setAddDate(int $addDate): void
    {
        $this->addDate = $addDate;
    }

    /**
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

    /**
     * @param int $expirationDate
     */
    public function setExpirationDate(int $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return ChatBoostSource
     */
    public function getSource(): ChatBoostSource
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSource $source
     */
    public function setSource(ChatBoostSource $source): void
    {
        $this->source = $source;
    }
}
