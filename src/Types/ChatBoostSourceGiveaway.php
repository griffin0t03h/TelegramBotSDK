<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatBoostSource as ChatBoostSourceEnum;

/**
 * Class ChatBoostSourceGiveaway
 * This object represents a chat boost obtained by the creation of a Telegram Premium giveaway.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['source', 'giveaway_message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'source' => true,
        'giveaway_message_id' => true,
        'user' => User::class,
        'is_unclaimed' => true,
    ];

    /**
     * Source of the boost
     *
     * @var ChatBoostSourceEnum
     */
    protected ChatBoostSourceEnum $source = ChatBoostSourceEnum::Giveaway;

    /**
     * Identifier of a message in the chat with the giveaway
     *
     * @var int|null
     */
    protected ?int $giveawayMessageId;

    /**
     * @psalm-suppress NonInvariantDocblockPropertyType
     *
     * Optional. User that won the prize in the giveaway if any
     *
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * Optional. True, if the giveaway was completed, but there was no user to win the prize
     *
     * @var bool|null
     */
    protected ?bool $isUnclaimed;

    /**
     * @return int|null
     */
    public function getGiveawayMessageId(): ?int
    {
        return $this->giveawayMessageId;
    }

    /**
     * @param int|null $giveawayMessageId
     * @return void
     */
    public function setGiveawayMessageId(?int $giveawayMessageId): void
    {
        $this->giveawayMessageId = $giveawayMessageId;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return bool|null
     */
    public function isUnclaimed(): ?bool
    {
        return $this->isUnclaimed;
    }

    /**
     * @param bool|null $isUnclaimed
     * @return void
     */
    public function setIsUnclaimed(?bool $isUnclaimed): void
    {
        $this->isUnclaimed = $isUnclaimed;
    }
}
