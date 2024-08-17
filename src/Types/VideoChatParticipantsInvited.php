<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class VideoChatParticipantsInvited
 * This object represents a service message about new members invited to a video chat.
 *
 * @package TelegramBotSDK\Types
 */
class VideoChatParticipantsInvited extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'users' => ArrayOfUser::class,
    ];

    /**
     * New members that were invited to the video chat
     *
     * @var User[]
     */
    protected array $users;

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     * @return void
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }
}
