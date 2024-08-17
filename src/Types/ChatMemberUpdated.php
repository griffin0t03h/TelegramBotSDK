<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatMemberUpdated
 * This object represents changes in the status of a chat member.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'from', 'date', 'old_chat_member', 'new_chat_member'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'from' => User::class,
        'date' => true,
        'old_chat_member' => ChatMember::class,
        'new_chat_member' => ChatMember::class,
        'invite_link' => ChatInviteLink::class,
        'via_join_request' => true,
        'via_chat_folder_invite_link' => true,
    ];
    /**
     * Chat the user belongs to
     *
     * @var Chat
     */
    protected Chat $chat;
    /**
     * Performer of the action, which resulted in the change
     *
     * @var User
     */
    protected User $from;
    /**
     * Date the change was done in Unix time
     *
     * @var int
     */
    protected int $date;
    /**
     * Previous information about the chat member
     *
     * @var ChatMember
     */
    protected ChatMember $oldChatMember;
    /**
     * New information about the chat member
     *
     * @var ChatMember
     */
    protected ChatMember $newChatMember;
    /**
     * Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     *
     * @var ChatInviteLink|null
     */
    protected ?ChatInviteLink $inviteLink = null;
    /**
     * Optional. True, if the user joined the chat after sending a direct join request without using an invite link and
     * being approved by an administrator
     *
     * @var bool|null
     */
    protected ?bool $viaChatFolderInviteLink = null;
    /**
     * Optional. True, if the user joined the chat after sending a direct join request without using an invite link and
     * being approved by an administrator
     *
     * @var bool|null
     */
    protected ?bool $viaJoinRequest = null;

    public static function fromResponse(array $data): ChatMemberUpdated|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return void
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ChatMember
     */
    public function getOldChatMember(): ChatMember
    {
        return $this->oldChatMember;
    }

    /**
     * @param ChatMember $oldChatMember
     * @return void
     */
    public function setOldChatMember(ChatMember $oldChatMember): void
    {
        $this->oldChatMember = $oldChatMember;
    }

    /**
     * @return ChatMember
     */
    public function getNewChatMember(): ChatMember
    {
        return $this->newChatMember;
    }

    /**
     * @param ChatMember $newChatMember
     * @return void
     */
    public function setNewChatMember(ChatMember $newChatMember): void
    {
        $this->newChatMember = $newChatMember;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->inviteLink;
    }

    /**
     * @param ChatInviteLink|null $inviteLink
     * @return void
     */
    public function setInviteLink(?ChatInviteLink $inviteLink): void
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return bool|null
     */
    public function getViaChatFolderInviteLink(): ?bool
    {
        return $this->viaChatFolderInviteLink;
    }

    /**
     * @param bool|null $viaChatFolderInviteLink
     * @return void
     */
    public function setViaChatFolderInviteLink(?bool $viaChatFolderInviteLink): void
    {
        $this->viaChatFolderInviteLink = $viaChatFolderInviteLink;
    }

    /**
     * @return bool|null
     */
    public function getViaJoinRequest(): ?bool
    {
        return $this->viaJoinRequest;
    }

    /**
     * @param bool|null $viaJoinRequest
     * @return void
     */
    public function setViaJoinRequest(?bool $viaJoinRequest): void
    {
        $this->viaJoinRequest = $viaJoinRequest;
    }
}
