<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatInviteLink
 * Represents an invite link for a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatInviteLink extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['invite_link', 'creator', 'creates_join_request', 'is_primary', 'is_revoked'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'invite_link' => true,
        'creator' => User::class,
        'creates_join_request' => true,
        'is_primary' => true,
        'is_revoked' => true,
        'name' => true,
        'expire_date' => true,
        'member_limit' => true,
        'pending_join_request_count' => true,
    ];

    /**
     * The invite link. If the link was created by another chat administrator, then the second part of the link will be
     * replaced with “…”.
     *
     * @var string
     */
    protected string $inviteLink;

    /**
     * Creator of the link
     *
     * @var User
     */
    protected User $creator;

    /**
     * True, if users joining the chat via the link need to be approved by chat administrators
     *
     * @var bool
     */
    protected bool $createsJoinRequest;

    /**
     * True, if the link is primary
     *
     * @var bool
     */
    protected bool $isPrimary;

    /**
     * True, if the link is revoked
     *
     * @var bool
     */
    protected bool $isRevoked;

    /**
     * Optional. Invite link name
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     *
     * @var int|null
     */
    protected ?int $expireDate = null;

    /**
     * Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via
     * this invite link; 1-99999
     *
     * @var int|null
     */
    protected ?int $memberLimit = null;

    /**
     * Optional. Number of pending join requests created using this link
     *
     * @var int|null
     */
    protected ?int $pendingJoinRequestCount = null;

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->inviteLink;
    }

    /**
     * @param string $inviteLink
     * @return void
     */
    public function setInviteLink(string $inviteLink): void
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     * @return void
     */
    public function setCreator(User $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest(): bool
    {
        return $this->createsJoinRequest;
    }

    /**
     * @param bool $createsJoinRequest
     * @return void
     */
    public function setCreatesJoinRequest(bool $createsJoinRequest): void
    {
        $this->createsJoinRequest = $createsJoinRequest;
    }

    /**
     * @return bool
     */
    public function isPrimary(): bool
    {
        return $this->isPrimary;
    }

    /**
     * @param bool $isPrimary
     * @return void
     */
    public function setIsPrimary(bool $isPrimary): void
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * @return bool
     */
    public function isRevoked(): bool
    {
        return $this->isRevoked;
    }

    /**
     * @param bool $isRevoked
     * @return void
     */
    public function setIsRevoked(bool $isRevoked): void
    {
        $this->isRevoked = $isRevoked;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getExpireDate(): ?int
    {
        return $this->expireDate;
    }

    /**
     * @param int|null $expireDate
     * @return void
     */
    public function setExpireDate(?int $expireDate): void
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return int|null
     */
    public function getMemberLimit(): ?int
    {
        return $this->memberLimit;
    }

    /**
     * @param int|null $memberLimit
     * @return void
     */
    public function setMemberLimit(?int $memberLimit): void
    {
        $this->memberLimit = $memberLimit;
    }

    /**
     * @return int|null
     */
    public function getPendingJoinRequestCount(): ?int
    {
        return $this->pendingJoinRequestCount;
    }

    /**
     * @param int|null $pendingJoinRequestCount
     * @return void
     */
    public function setPendingJoinRequestCount(?int $pendingJoinRequestCount): void
    {
        $this->pendingJoinRequestCount = $pendingJoinRequestCount;
    }
}
