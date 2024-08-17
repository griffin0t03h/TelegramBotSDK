<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\ChatMemberStatus;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatMember
 * This object contains information about one member of a chat.
 *
 * @package TelegramBotSDK\Types
 */
abstract class ChatMember extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user'];
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'status' => true,
        'user' => User::class,
    ];

    /**
     * The member's status in the chat
     *
     * @var ChatMemberStatus
     */
    protected ChatMemberStatus $status;

    /**
     * Information about the user
     *
     * @var User
     */
    protected User $user;

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): ChatMember|ChatMemberLeft|ChatMemberAdministrator|ChatMemberRestricted|ChatMemberMember|ChatMemberOwner|static
    {
        self::validate($data);

        $class = match ($data['status']) {
            ChatMemberStatus::Creator->value => ChatMemberOwner::class,
            ChatMemberStatus::Administrator->value => ChatMemberAdministrator::class,
            ChatMemberStatus::Member->value => ChatMemberMember::class,
            ChatMemberStatus::Restricted->value => ChatMemberRestricted::class,
            ChatMemberStatus::Left->value => ChatMemberLeft::class,
            ChatMemberStatus::Kicked->value => ChatMemberBanned::class,
            default => ChatMember::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return ChatMemberStatus
     */
    public function getStatus(): ChatMemberStatus
    {
        return $this->status;
    }

    /**
     * @param ChatMemberStatus|string $status
     * @return void
     */
    public function setStatus(ChatMemberStatus|string $status): void
    {
        if ($status instanceof ChatMemberStatus) {
            $this->status = $status;
        } else {
            $this->status = ChatMemberStatus::tryFrom($status) ?? ChatMemberStatus::Unknown;
        }
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
