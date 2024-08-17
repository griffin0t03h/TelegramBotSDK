<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatBoostSource as ChatBoostSourceEnum;

/**
 * Class ChatBoostSourcePremium
 * This object represents a chat boost obtained by subscribing to Telegram Premium or by gifting a Telegram Premium
 * subscription to another user.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['source', 'user'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'source' => true,
        'user' => User::class,
    ];

    /**
     * Source of the boost
     *
     * @var ChatBoostSourceEnum
     */
    protected ChatBoostSourceEnum $source = ChatBoostSourceEnum::Premium;

    /**
     * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to
     * another user.
     *
     * @var User
     */
    protected User $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
