<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatPermissions
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatPermissions extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'can_send_messages' => true,
        'can_send_media_messages' => true,
        'can_send_polls' => true,
        'can_send_other_messages' => true,
        'can_add_web_page_previews' => true,
        'can_change_info' => true,
        'can_invite_users' => true,
        'can_pin_messages' => true,
    ];

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues
     *
     * @var bool|null
     */
    protected ?bool $canSendMessages = null;

    /**
     * Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages
     *
     * @var bool|null
     */
    protected ?bool $canSendMediaMessages = null;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages
     *
     * @var bool|null
     */
    protected ?bool $canSendPolls = null;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies
     * can_send_media_messages
     *
     * @var bool|null
     */
    protected ?bool $canSendOtherMessages = null;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages, implies
     * can_send_media_messages
     *
     * @var bool|null
     */
    protected ?bool $canAddWebPagePreviews = null;

    /**
     * Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public
     * supergroups
     *
     * @var bool|null
     */
    protected ?bool $canChangeInfo = null;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat
     *
     * @var bool|null
     */
    protected ?bool $canInviteUsers = null;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     *
     * @var bool|null
     */
    protected ?bool $canPinMessages = null;

    /**
     * @return bool|null
     */
    public function isCanSendMessages(): ?bool
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
     * @return bool|null
     */
    public function isCanSendMediaMessages(): ?bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     * @return void
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): void
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
    }

    /**
     * @return bool|null
     */
    public function isCanSendPolls(): ?bool
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
     * @return bool|null
     */
    public function isCanSendOtherMessages(): ?bool
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
     * @return bool|null
     */
    public function isCanAddWebPagePreviews(): ?bool
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
     * @return bool|null
     */
    public function isCanChangeInfo(): ?bool
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
     * @return bool|null
     */
    public function isCanInviteUsers(): ?bool
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
    public function isCanPinMessages(): ?bool
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
}
