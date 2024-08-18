<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\MessageOriginType;

/**
 * Class MessageOriginUser
 * The message was originally sent by a known user.
 *
 * @package TelegramBotSDK\Types
 */
class MessageOriginUser extends MessageOrigin
{
    protected static array $requiredParams = ['type', 'date', 'sender_user'];

    protected static array $map = [
        'type' => true,
        'date' => true,
        'sender_user' => User::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var MessageOriginType
     */
    protected MessageOriginType $type = MessageOriginType::User;

    /**
     * User that sent the message originally
     *
     * @var User
     */
    protected User $senderUser;

    /**
     * @return User
     *
     * @see $senderUser
     */
    public function getSenderUser(): User
    {
        return $this->senderUser;
    }

    /**
     * @param User $senderUser
     * @return void
     *
     * @see $senderUser
     */
    public function setSenderUser(User $senderUser): void
    {
        $this->senderUser = $senderUser;
    }
}
