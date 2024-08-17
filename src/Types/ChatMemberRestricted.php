<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ChatMemberStatus;

/**
 * Class ChatMemberRestricted
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 *
 * @package TelegramBotSDK\Types
 */
class ChatMemberRestricted extends ChatMember
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['status', 'user', 'is_member', 'can_send_messages', 'can_send_audios', 'can_send_documents', 'can_send_photos', 'can_send_videos', 'can_send_video_notes', 'can_send_voice_notes', 'can_send_polls', 'can_send_other_messages', 'can_add_web_page_previews', 'can_change_info', 'can_invite_users', 'can_pin_messages', 'can_manage_topics', 'until_date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'status' => true,
        'user' => User::class,
        'is_member' => true,
        'can_send_messages' => true,
        'can_send_audios' => true,
        'can_send_documents' => true,
        'can_send_photos' => true,
        'can_send_videos' => true,
        'can_send_video_notes' => true,
        'can_send_voice_notes' => true,
        'can_send_polls' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_pin_messages' => true,
        'can_manage_topics' => true,
        'until_date' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var ChatMemberStatus
     */
    protected ChatMemberStatus $status = ChatMemberStatus::Restricted;

    /**
     * True, if the user is a member of the chat at the moment of the request
     *
     * @var bool
     */
    protected bool $isMember;

    /**
     * True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations
     * and venues
     *
     * @var bool
     */
    protected bool $canSendMessages;

    /**
     * True, if the user is allowed to send audios
     *
     * @var bool
     */
    protected bool $canSendAudios;

    /**
     * True, if the user is allowed to send documents
     *
     * @var bool
     */
    protected bool $canSendDocuments;

    /**
     * True, if the user is allowed to send photos
     *
     * @var bool
     */
    protected bool $canSendPhotos;

    /**
     * True, if the user is allowed to send videos
     *
     * @var bool
     */
    protected bool $canSendVideos;

    /**
     * True, if the user is allowed to send video notes
     *
     * @var bool
     */
    protected bool $canSendVideoNotes;

    /**
     * True, if the user is allowed to send voice notes
     *
     * @var bool
     */
    protected bool $canSendVoiceNotes;

    /**
     * True, if the user is allowed to send polls
     *
     * @var bool
     */
    protected bool $canSendPolls;

    /**
     * True, if the user is allowed to send animations, games, stickers and use inline bots
     *
     * @var bool
     */
    protected bool $canSendOtherMessages;

    /**
     * True, if the user is allowed to add web page previews to their messages
     *
     * @var bool
     */
    protected bool $canAddWebPagePreviews;

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
     * True, if the user is allowed to pin messages
     *
     * @var bool
     */
    protected bool $canPinMessages;

    /**
     * True, if the user is allowed to create forum topics
     *
     * @var bool
     */
    protected bool $canManageTopics;

    /**
     * Date when restrictions will be lifted for this user; Unix time.
     * If 0, then the user is restricted forever
     *
     * @var int
     */
    protected int $untilDate;

    /**
     * @return bool
     */
    public function isMember(): bool
    {
        return $this->isMember;
    }

    /**
     * @param bool $isMember
     * @return void
     */
    public function setIsMember(bool $isMember): void
    {
        $this->isMember = $isMember;
    }

    /**
     * @return bool
     */
    public function canSendMessages(): bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMessages
     * @return void
     */
    public function setCanSendMessages(bool $canSendMessages): void
    {
        $this->canSendMessages = $canSendMessages;
    }

    /**
     * @return bool
     */
    public function canSendAudios(): bool
    {
        return $this->canSendAudios;
    }

    /**
     * @param bool $canSendAudios
     * @return void
     */
    public function setCanSendAudios(bool $canSendAudios): void
    {
        $this->canSendAudios = $canSendAudios;
    }

    /**
     * @return bool
     */
    public function canSendDocuments(): bool
    {
        return $this->canSendDocuments;
    }

    /**
     * @param bool $canSendDocuments
     * @return void
     */
    public function setCanSendDocuments(bool $canSendDocuments): void
    {
        $this->canSendDocuments = $canSendDocuments;
    }

    /**
     * @return bool
     */
    public function canSendPhotos(): bool
    {
        return $this->canSendPhotos;
    }

    /**
     * @param bool $canSendPhotos
     * @return void
     */
    public function setCanSendPhotos(bool $canSendPhotos): void
    {
        $this->canSendPhotos = $canSendPhotos;
    }

    /**
     * @return bool
     */
    public function canSendVideos(): bool
    {
        return $this->canSendVideos;
    }

    /**
     * @param bool $canSendVideos
     * @return void
     */
    public function setCanSendVideos(bool $canSendVideos): void
    {
        $this->canSendVideos = $canSendVideos;
    }

    /**
     * @return bool
     */
    public function canSendVideoNotes(): bool
    {
        return $this->canSendVideoNotes;
    }

    /**
     * @param bool $canSendVideoNotes
     * @return void
     */
    public function setCanSendVideoNotes(bool $canSendVideoNotes): void
    {
        $this->canSendVideoNotes = $canSendVideoNotes;
    }

    /**
     * @return bool
     */
    public function canSendVoiceNotes(): bool
    {
        return $this->canSendVoiceNotes;
    }

    /**
     * @param bool $canSendVoiceNotes
     * @return void
     */
    public function setCanSendVoiceNotes(bool $canSendVoiceNotes): void
    {
        $this->canSendVoiceNotes = $canSendVoiceNotes;
    }

    /**
     * @return bool
     */
    public function canSendPolls(): bool
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendPolls
     * @return void
     */
    public function setCanSendPolls(bool $canSendPolls): void
    {
        $this->canSendPolls = $canSendPolls;
    }

    /**
     * @return bool
     */
    public function canSendOtherMessages(): bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canSendOtherMessages
     * @return void
     */
    public function setCanSendOtherMessages(bool $canSendOtherMessages): void
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
    }

    /**
     * @return bool
     */
    public function canAddWebPagePreviews(): bool
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * @param bool $canAddWebPagePreviews
     * @return void
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): void
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
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
     * @return bool
     */
    public function canPinMessages(): bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param bool $canPinMessages
     * @return void
     */
    public function setCanPinMessages(bool $canPinMessages): void
    {
        $this->canPinMessages = $canPinMessages;
    }

    /**
     * @return bool
     */
    public function canManageTopics(): bool
    {
        return $this->canManageTopics;
    }

    /**
     * @param bool $canManageTopics
     * @return void
     */
    public function setCanManageTopics(bool $canManageTopics): void
    {
        $this->canManageTopics = $canManageTopics;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->untilDate;
    }

    /**
     * @param int $untilDate
     * @return void
     */
    public function setUntilDate(int $untilDate): void
    {
        $this->untilDate = $untilDate;
    }
}
