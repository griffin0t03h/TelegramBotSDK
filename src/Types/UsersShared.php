<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class UsersShared
 * This object contains information about the users whose identifiers were shared with the bot using a
 * KeyboardButtonRequestUsers button.
 *
 * @package TelegramBotSDK\Types
 */
class UsersShared extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['request_id', 'users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'request_id' => true,
        'users' => ArrayOfSharedUser::class,
    ];

    /**
     * Identifier of the request
     *
     * @var int
     */
    protected int $requestId;

    /**
     * Information about users shared with the bot.
     *
     * @var SharedUser[]
     */
    protected array $users;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId(int $requestId): void
    {
        $this->requestId = $requestId;
    }

    /**
     * @return SharedUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param SharedUser[] $users
     * @return void
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }
}
