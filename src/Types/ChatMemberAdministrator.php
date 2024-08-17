<?php

namespace TelegramBotSDK\Types;

/**
 * Class ChatMemberAdministrator
 * Represents a chat member that has some additional privileges.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberAdministrator extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user', 'can_be_edited', 'is_anonymous', 'can_manage_chat', 'can_delete_messages', 'can_manage_video_chats', 'can_restrict_members', 'can_promote_members', 'can_change_info', 'can_invite_users'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'status' => true,
        'user' => User::class,
        'can_be_edited' => true,
        'is_anonymous' => true,
        'can_manage_chat' => true,
        'can_delete_messages' => true,
        'can_manage_video_chats' => true,
        'can_restrict_members' => true,
        'can_promote_members' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_post_stories' => true,
        'can_edit_stories' => true,
        'can_delete_stories' => true,
        'can_post_messages' => true,
        'can_edit_messages' => true,
        'can_pin_messages' => true,
        'can_manage_topics' => true,
        'custom_title' => true,
    ];

    /**
     * True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool
     */
    protected bool $canBeEdited;

    /**
     * True, if the user's presence in the chat is hidden
     *
     * @var bool
     */
    protected bool $isAnonymous;

    /**
     * True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel
     * members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     *
     * @var bool
     */
    protected bool $canManageChat;

    /**
     * True, if the administrator can delete messages of other users
     *
     * @var bool
     */
    protected bool $canDeleteMessages;

    /**
     * True, if the administrator can manage video chats
     *
     * @var bool
     */
    protected bool $canManageVideoChats;

    /**
     * True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     *
     * @var bool
     */
    protected bool $canRestrictMembers;

    /**
     * True, if the administrator can add new administrators with a subset of their own privileges or demote
     * administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed
     * by the user)
     *
     * @var bool
     */
    protected bool $canPromoteMembers;

    /**
     * True, if the user is allowed to change the chat title, photo and other settings
     *
     * @var bool
     */
    protected bool $canChangeInfo;

    /**
     * True, if the user is allowed to invite new users to the chat
     *
     * @var bool
     */
    protected bool $canInviteUsers;

    /**
     * True, if the administrator can post stories to the chat
     *
     * @var bool|null
     */
    protected ?bool $canPostStories = null;

    /**
     * True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat
     * stories, and access the chat's story archive
     *
     * @var bool|null
     */
    protected ?bool $canEditStories = null;

    /**
     * True, if the administrator can delete stories posted by other users
     *
     * @var bool|null
     */
    protected ?bool $canDeleteStories = null;

    /**
     * Optional. True, if the administrator can post messages in the channel, or access channel statistics; for
     * channels only
     *
     * @var bool|null
     */
    protected ?bool $canPostMessages = null;

    /**
     * Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
     *
     * @var bool|null
     */
    protected ?bool $canEditMessages = null;

    /**
     * Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     *
     * @var bool|null
     */
    protected ?bool $canPinMessages = null;

    /**
     * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     *
     * @var bool|null
     */
    protected ?bool $canManageTopics = null;

    /**
     * Optional. Custom title for this user
     *
     * @var string|null
     */
    protected ?string $customTitle = null;

    public static function fromResponse($data): ChatMemberAdministrator|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return bool
     */
    public function canBeEdited(): bool
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $canBeEdited
     * @return void
     */
    public function setCanBeEdited(bool $canBeEdited): void
    {
        $this->canBeEdited = $canBeEdited;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     * @return void
     */
    public function setIsAnonymous(bool $isAnonymous): void
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return bool
     */
    public function canManageChat(): bool
    {
        return $this->canManageChat;
    }

    /**
     * @param bool $canManageChat
     * @return void
     */
    public function setCanManageChat(bool $canManageChat): void
    {
        $this->canManageChat = $canManageChat;
    }

    /**
     * @return bool
     */
    public function canDeleteMessages(): bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canDeleteMessages
     * @return void
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): void
    {
        $this->canDeleteMessages = $canDeleteMessages;
    }

    /**
     * @return bool
     */
    public function canManageVideoChats(): bool
    {
        return $this->canManageVideoChats;
    }

    /**
     * @param bool $canManageVideoChats
     * @return void
     */
    public function setCanManageVideoChats(bool $canManageVideoChats): void
    {
        $this->canManageVideoChats = $canManageVideoChats;
    }

    /**
     * @return bool
     */
    public function canRestrictMembers(): bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canRestrictMembers
     * @return void
     */
    public function setCanRestrictMembers(bool $canRestrictMembers): void
    {
        $this->canRestrictMembers = $canRestrictMembers;
    }

    /**
     * @return bool
     */
    public function canPromoteMembers(): bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canPromoteMembers
     * @return void
     */
    public function setCanPromoteMembers(bool $canPromoteMembers): void
    {
        $this->canPromoteMembers = $canPromoteMembers;
    }

    /**
     * @return bool
     */
    public function canChangeInfo(): bool
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canChangeInfo
     * @return void
     */
    public function setCanChangeInfo(bool $canChangeInfo): void
    {
        $this->canChangeInfo = $canChangeInfo;
    }

    /**
     * @return bool
     */
    public function canInviteUsers(): bool
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canInviteUsers
     * @return void
     */
    public function setCanInviteUsers(bool $canInviteUsers): void
    {
        $this->canInviteUsers = $canInviteUsers;
    }

    /**
     * @return bool|null
     */
    public function canPostStories(): ?bool
    {
        return $this->canPostStories;
    }

    /**
     * @param bool|null $canPostStories
     * @return void
     */
    public function setCanPostStories(?bool $canPostStories): void
    {
        $this->canPostStories = $canPostStories;
    }

    /**
     * @return bool|null
     */
    public function canEditStories(): ?bool
    {
        return $this->canEditStories;
    }

    /**
     * @param bool|null $canEditStories
     * @return void
     */
    public function setCanEditStories(?bool $canEditStories): void
    {
        $this->canEditStories = $canEditStories;
    }

    /**
     * @return bool|null
     */
    public function canDeleteStories(): ?bool
    {
        return $this->canDeleteStories;
    }

    /**
     * @param bool|null $canDeleteStories
     * @return void
     */
    public function setCanDeleteStories(?bool $canDeleteStories): void
    {
        $this->canDeleteStories = $canDeleteStories;
    }

    /**
     * @return bool|null
     */
    public function canPostMessages(): ?bool
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool|null $canPostMessages
     * @return void
     */
    public function setCanPostMessages(?bool $canPostMessages): void
    {
        $this->canPostMessages = $canPostMessages;
    }

    /**
     * @return bool|null
     */
    public function canEditMessages(): ?bool
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool|null $canEditMessages
     * @return void
     */
    public function setCanEditMessages(?bool $canEditMessages): void
    {
        $this->canEditMessages = $canEditMessages;
    }

    /**
     * @return bool|null
     */
    public function canPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool|null $canPinMessages
     * @return void
     */
    public function setCanPinMessages(?bool $canPinMessages): void
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool|null
     */
    public function canManageTopics(): ?bool
    {
        return $this->canManageTopics;
    }

    /**
     * @param bool|null $canManageTopics
     * @return void
     */
    public function setCanManageTopics(?bool $canManageTopics): void
    {
        $this->canManageTopics = $canManageTopics;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): ?string
    {
        return $this->customTitle;
    }

    /**
     * @param string|null $customTitle
     * @return void
     */
    public function setCustomTitle(?string $customTitle): void
    {
        $this->customTitle = $customTitle;
    }
}
