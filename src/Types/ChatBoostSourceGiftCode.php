<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatBoostSource as ChatBoostSourceEnum;

/**
 * Class ChatBoostSourceGiftCode
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the
 * chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
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
    protected ChatBoostSourceEnum $source = ChatBoostSourceEnum::GiftCode;

    /**
     * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the
     * chat 4 times for the duration of the corresponding Telegram Premium subscription.
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
