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
     * @psalm-suppress MoreSpecificReturnType,LessSpecificImplementedReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): ChatMemberLeft|ChatMemberAdministrator|ChatMemberRestricted|ChatMemberMember|ChatMember|ChatMemberOwner|static
    {
        self::validate($data);
        $status = $data['status'];

        return match ($status) {
            ChatMemberStatus::Creator->value => ChatMemberOwner::fromResponse($data),
            ChatMemberStatus::Administrator->value => ChatMemberAdministrator::fromResponse($data),
            ChatMemberStatus::Member->value => ChatMemberMember::fromResponse($data),
            ChatMemberStatus::Restricted->value => ChatMemberRestricted::fromResponse($data),
            ChatMemberStatus::Left->value => ChatMemberLeft::fromResponse($data),
            ChatMemberStatus::Kicked->value => ChatMemberBanned::fromResponse($data),
            default => throw new InvalidArgumentException("Unknown chat member status: $status"),
        };
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
