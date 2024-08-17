<?php

namespace TelegramBotSDK\Api\Service;

use CURLFile;
use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ArrayOfChatMemberEntity;
use TelegramBotSDK\Types\ChatAdministratorRights;
use TelegramBotSDK\Types\ChatFullInfo;
use TelegramBotSDK\Types\ChatInviteLink;
use TelegramBotSDK\Types\ChatMember;
use TelegramBotSDK\Types\ChatPermissions;
use TelegramBotSDK\Types\ForumTopic;
use TelegramBotSDK\Types\Sticker\ArrayOfSticker;
use TelegramBotSDK\Types\Sticker\Sticker;
use TelegramBotSDK\Types\UserChatBoosts;

class ChatManagementService extends BaseService
{
    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels,
     * the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator
     * rights.
     * Returns True on success.
     *
     * @see https://core.telegram.org/bots/api#banchatmember
     *
     * @param int|string $chatId Unique identifier for the target group or username of the
     *                           target supergroup or channel (in the format @channelusername)
     * @param int $userId Unique identifier of the target user
     * @param int|null $untilDate Date when the user will be unbanned, unix time.
     *                            If user is banned for more than 366 days or less than 30 seconds from the current
     *                            time they are considered to be banned forever. Applied for supergroups and channels
     *                            only.
     * @param bool|null $revokeMessages Pass True to delete all messages from the chat for the user that is being
     *                                  removed. If False, the user will be able to see messages in the group that were
     *                                  sent before the user was removed. Always True for supergroups and channels.
     *
     * @return bool
     * @throws Exception
     */
    public function banChatMember(
        int|string $chatId,
        int $userId,
        ?int $untilDate = null,
        ?bool $revokeMessages = null,
    ): bool
    {
        return $this->call('banChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'until_date' => $untilDate,
            'revoke_messages' => $revokeMessages,
        ]);
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the
     * group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for
     * this to work. By default, this method guarantees that after the call the user is not a member of the chat, but
     * will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you
     * don't want this, use the parameter only_if_banned. Returns True on success.
     *
     * @see https://core.telegram.org/bots/api#unbanchatmember
     *
     * @param int|string $chatId
     * @param int $userId
     * @param bool|null $onlyIfBanned Do nothing if the user is not banned
     *
     * @return bool
     * @throws Exception
     */
    public function unbanChatMember(
        int|string $chatId,
        int $userId,
        ?bool $onlyIfBanned = null,
    ): bool
    {
        return $this->call('unbanChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'only_if_banned' => $onlyIfBanned,
        ]);
    }

    /**
     * Use this method to restrict a user in a supergroup.
     * The bot must be an administrator in the supergroup for this to work and must have the appropriate admin rights.
     * Pass True for all boolean parameters to lift restrictions from a user.
     *
     * @see https://core.telegram.org/bots/api#restrictchatmember
     *
     * @param int|string $chatId
     * @param int $userId
     * @param ChatPermissions $permissions
     * @param integer|null $untilDate Date when restrictions will be lifted for the user, unix time.
     *                                If user is restricted for more than 366 days or less than 30 seconds from the
     *                                current time, they are considered to be restricted forever
     * @param bool|null $useIndependentChatPermissions Pass True if chat permissions are set independently. Otherwise,
     *                                                 the can_send_other_messages and can_add_web_page_previews
     *                                                 permissions will imply the can_send_messages, can_send_audios,
     *     can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes
     *     permissions; the can_send_polls permission will imply the can_send_messages permission.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function restrictChatMember(
        int|string $chatId,
        int $userId,
        ChatPermissions $permissions,
        ?int $untilDate = null,
        ?bool $useIndependentChatPermissions = null,
    ): bool
    {
        return $this->call('restrictChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'permissions' => $permissions->toJson(),
            'until_date' => $untilDate,
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
        ]);
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     * Pass False for all boolean parameters to demote a user.
     *
     * @see https://core.telegram.org/bots/api#promotechatmember
     *
     * @param int|string $chatId
     * @param int $userId
     * @param bool $isAnonymous Pass True if the administrator's presence in the chat is hidden
     * @param bool $canManageChat Pass True if the administrator can access the chat event log, get boost list, see
     *                            hidden supergroup and channel members, report spam messages and ignore slow mode.
     *                            Implied by any other administrator privilege.
     * @param bool $canDeleteMessages Pass True, if the administrator can delete messages of other users
     * @param bool $canManageVideoChats Pass True if the administrator can manage video chats
     * @param bool $canRestrictMembers Pass True, if the administrator can restrict, ban or unban chat members
     * @param bool $canPromoteMembers Pass True, if the administrator can add new administrators with a subset of his
     *                                own privileges or demote administrators that he has promoted,directly or
     *                                indirectly (promoted by administrators that were appointed by him)
     * @param bool $canChangeInfo Pass True, if the administrator can change chat title, photo and other settings
     * @param bool $canInviteUsers Pass True, if the administrator can invite new users to the chat
     * @param bool $canPostStories Pass True if the administrator can post stories to the chat
     * @param bool $canEditStories Pass True if the administrator can edit stories posted by other users, post stories
     *                             to the chat page, pin chat stories, and access the chat's story archive
     * @param bool $canDeleteStories Pass True if the administrator can delete stories posted by other users
     * @param bool $canPostMessages Pass True, if the administrator can create channel posts, channels only
     * @param bool $canEditMessages Pass True, if the administrator can edit messages of other users, channels only
     * @param bool $canPinMessages Pass True, if the administrator can pin messages, supergroups only
     * @param bool $canManageTopics Pass True if the user is allowed to create, rename, close, and reopen forum topics,
     *                              supergroups only
     * @return bool
     *
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function promoteChatMember(
        int|string $chatId,
        int $userId,
        bool $isAnonymous = false,
        bool $canManageChat = true,
        bool $canDeleteMessages = true,
        bool $canManageVideoChats = true,
        bool $canRestrictMembers = true,
        bool $canPromoteMembers = true,
        bool $canChangeInfo = true,
        bool $canInviteUsers = true,
        bool $canPostStories = true,
        bool $canEditStories = true,
        bool $canDeleteStories = true,
        bool $canPostMessages = true,
        bool $canEditMessages = true,
        bool $canPinMessages = true,
        bool $canManageTopics = true,
    ): bool
    {
        return $this->call('promoteChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'is_anonymous' => $isAnonymous,
            'can_manage_chat' => $canManageChat,
            'can_delete_messages' => $canDeleteMessages,
            'can_manage_video_chats' => $canManageVideoChats,
            'can_restrict_members' => $canRestrictMembers,
            'can_promote_members' => $canPromoteMembers,
            'can_change_info' => $canChangeInfo,
            'can_invite_users' => $canInviteUsers,
            'can_post_stories' => $canPostStories,
            'can_edit_stories' => $canEditStories,
            'can_delete_stories' => $canDeleteStories,
            'can_post_messages' => $canPostMessages,
            'can_edit_messages' => $canEditMessages,
            'can_pin_messages' => $canPinMessages,
            'can_manage_topics' => $canManageTopics,
        ]);
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot.
     *
     * @see https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     *
     * @param int|string $chatId
     * @param int $userId
     * @param string $customTitle New custom title for the administrator; 0-16 characters, emoji are not allowed
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int $userId,
        string $customTitle,
    ): bool
    {
        return $this->call('setChatAdministratorCustomTitle', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'custom_title' => $customTitle,
        ]);
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the
     * banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator
     * in the supergroup or channel for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#banchatsenderchat
     *
     * @param int|string $chatId
     * @param int $senderChatId Unique identifier of the target sender chat
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function banChatSenderChat(
        int|string $chatId,
        int $senderChatId,
    ): bool
    {
        return $this->call('banChatSenderChat', [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId,
        ]);
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an
     * administrator for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#unbanchatsenderchat
     *
     * @param int|string $chatId
     * @param int $senderChatId Unique identifier of the target sender chat
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function unbanChatSenderChat(
        int|string $chatId,
        int $senderChatId,
    ): bool
    {
        return $this->call('unbanChatSenderChat', [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId,
        ]);
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an
     * administrator for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#unbanchatsenderchat
     *
     * @param int|string $chatId
     * @param ChatPermissions $permissions
     * @param bool|null $useIndependentChatPermissions Pass True if chat permissions are set independently. Otherwise,
     *                                                 the can_send_other_messages and can_add_web_page_previews
     *                                                 permissions will imply the can_send_messages, can_send_audios,
     *     can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes
     *     permissions; the can_send_polls permission will imply the can_send_messages permission.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setChatPermissions(
        int|string $chatId,
        ChatPermissions $permissions,
        ?bool $useIndependentChatPermissions = null,
    ): bool
    {
        return $this->call('setChatPermissions', [
            'chat_id' => $chatId,
            'permissions' => $permissions->toJson(),
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
        ]);
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is
     * revoked. The bot must be an administrator in the chat for this to work and must have the appropriate
     * administrator rights. Returns the new invite link as String on success.
     *
     * @see https://core.telegram.org/bots/api#exportchatinvitelink
     *
     * @param int|string $chatId
     *
     * @return string
     * @throws Exception
     */
    public function exportChatInviteLink(int|string $chatId): string
    {
        return $this->call('exportChatInviteLink', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for
     * this to work and must have the appropriate administrator rights. The link can be revoked using the method
     * revokeChatInviteLink.
     *
     * @see https://core.telegram.org/bots/api#createchatinvitelink
     *
     * @param int|string $chatId
     * @param string|null $name Invite link name; 0-32 characters
     * @param int|null $expireDate Point in time (Unix timestamp) when the link will expire
     * @param int|null $memberLimit The maximum number of users that can be members of the chat simultaneously
     *                              after joining the chat via this invite link; 1-99999
     * @param bool|null $createsJoinRequest True, if users joining the chat via the link need to be approved by chat
     *                                      administrators. If True, member_limit can't be specified
     *
     * @return ChatInviteLink
     * @throws Exception
     */
    public function createChatInviteLink(
        int|string $chatId,
        string $name = null,
        int $expireDate = null,
        int $memberLimit = null,
        bool $createsJoinRequest = null,
    ): ChatInviteLink
    {
        return ChatInviteLink::fromResponse($this->call('createChatInviteLink', [
            'chat_id' => $chatId,
            'name' => $name,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ]));
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator
     * rights.
     *
     * @see https://core.telegram.org/bots/api#editchatinvitelink
     *
     * @param int|string $chatId
     * @param string $inviteLink The invite link to edit
     * @param string|null $name Invite link name; 0-32 characters
     * @param int|null $expireDate Point in time (Unix timestamp) when the link will expire
     * @param int|null $memberLimit The maximum number of users that can be members of the chat simultaneously
     *                              after joining the chat via this invite link; 1-99999
     * @param bool|null $createsJoinRequest True, if users joining the chat via the link need to be approved by chat
     *                                      administrators. If True, member_limit can't be specified
     * @return ChatInviteLink
     * @throws Exception
     */
    public function editChatInviteLink(int|string $chatId, string $inviteLink, string $name = null, int $expireDate = null, int $memberLimit = null, bool $createsJoinRequest = null): ChatInviteLink
    {
        return ChatInviteLink::fromResponse($this->call('editChatInviteLink', [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
            'name' => $name,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ]));
    }

    /**
     * Use this method to revoke an invite link created by the bot.
     * If the primary link is revoked, a new link is automatically generated.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#revokechatinvitelink
     *
     * @param int|string $chatId
     * @param string $inviteLink The invite link to edit
     *
     * @return ChatInviteLink
     * @throws Exception
     */
    public function revokeChatInviteLink(int|string $chatId, string $inviteLink): ChatInviteLink
    {
        return ChatInviteLink::fromResponse($this->call('revokeChatInviteLink', [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
        ]));
    }

    /**
     * Use this method to revoke an invite link created by the bot.
     * If the primary link is revoked, a new link is automatically generated.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#approvechatjoinrequest
     *
     * @param int|string $chatId
     * @param int $userId
     * @return bool
     * @throws Exception
     */
    public function approveChatJoinRequest(int|string $chatId, int $userId): bool
    {
        return $this->call('approveChatJoinRequest', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);
    }

    /**
     * Use this method to decline a chat join request.
     * The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator
     * right.
     *
     * @see https://core.telegram.org/bots/api#declinechatjoinrequest
     *
     * @param int|string $chatId
     * @param int $userId
     * @return bool
     * @throws Exception
     */
    public function declineChatJoinRequest(int|string $chatId, int $userId): bool
    {
        return $this->call('declineChatJoinRequest', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);
    }

    /**
     * Use this method to create a subscription invite link for a channel chat.
     * The bot must have the can_invite_users administrator rights.
     * The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method
     * revokeChatInviteLink.
     *
     * @see https://core.telegram.org/bots/api#createchatsubscriptioninvitelink
     *
     * @param int|string $chatId Unique identifier for the target channel chat or username of the target channel (in
     *     the format @channelusername)
     * @param int $subscriptionPeriod The number of seconds the subscription will be active for before the next
     *     payment. Currently, it must always be 2592000 (30 days).
     * @param int $subscriptionPrice The amount of Telegram Stars a user must pay initially and after each subsequent
     *     subscription period to be a member of the chat; 1-2500
     * @param string|null $name Invite link name; 0-32 characters
     *
     * @return ChatInviteLink
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function createChatSubscriptionInviteLink(
        int|string $chatId,
        int $subscriptionPeriod,
        int $subscriptionPrice,
        string $name = null,
    ): ChatInviteLink
    {
        return ChatInviteLink::fromResponse($this->call('createChatSubscriptionInviteLink', [
            'chat_id' => $chatId,
            'name' => $name,
            'subscription_period' => $subscriptionPeriod,
            'subscription_price' => $subscriptionPrice
        ]));
    }

    /**
     * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users
     * administrator rights.
     *
     * @see https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param string $inviteLink The invite link to edit
     * @param string|null $name Invite link name; 0-32 characters
     *
     * @return ChatInviteLink
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editChatSubscriptionInviteLink(
        int|string $chatId,
        string $inviteLink,
        string $name = null,
    ): ChatInviteLink
    {
        return ChatInviteLink::fromResponse($this->call('editChatSubscriptionInviteLink', [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
            'name' => $name
        ]));
    }

    /**
     * Use this method to set a new profile photo for the chat.
     * Photos can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#setchatphoto
     *
     * @param int|string $chatId
     * @param CURLFile|string $photo New chat photo, uploaded using multipart/form-data
     *
     * @return bool
     * @throws Exception
     */
    public function setChatPhoto(int|string $chatId, CURLFile|string $photo): bool
    {
        return $this->call('setChatPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo,
        ]);
    }

    /**
     * Use this method to delete a chat photo.
     * Photos can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#deletechatphoto
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function deleteChatPhoto(int|string $chatId): bool
    {
        return $this->call('deleteChatPhoto', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to change the title of a chat.
     * Titles can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#setchattitle
     *
     * @param int|string $chatId
     * @param string $title New chat title, 1-255 characters
     *
     * @return bool
     * @throws Exception
     */
    public function setChatTitle(int|string $chatId, string $title): bool
    {
        return $this->call('setChatTitle', [
            'chat_id' => $chatId,
            'title' => $title,
        ]);
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#setchatdescription
     *
     * @param int|string $chatId
     * @param string|null $description New chat description, 0-255 characters
     *
     * @return bool
     * @throws Exception
     */
    public function setChatDescription(int|string $chatId, string $description = null): bool
    {
        return $this->call('setChatDescription', [
            'chat_id' => $chatId,
            'description' => $description,
        ]);
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat.
     * If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have
     * the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a
     * channel.
     *
     * @see https://core.telegram.org/bots/api#pinchatmessage
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param bool $disableNotification
     * @param string|null $businessConnectionId
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function pinChatMessage(
        int|string $chatId,
        int $messageId,
        bool $disableNotification = false,
        ?string $businessConnectionId = null,
    ): bool
    {
        return $this->call('pinChatMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'disable_notification' => $disableNotification,
            'business_connection_id' => $businessConnectionId,
        ]);
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat.
     * If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have
     * the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a
     * channel.
     *
     * @see https://core.telegram.org/bots/api#unpinchatmessage
     *
     * @param int|string $chatId
     * @param int|null $messageId
     * @param string|null $businessConnectionId
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function unpinChatMessage(
        int|string $chatId,
        int $messageId = null,
        ?string $businessConnectionId = null,
    ): bool
    {
        return $this->call('unpinChatMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'business_connection_id' => $businessConnectionId,
        ]);
    }

    /**
     * Use this method to clear the list of pinned messages in a chat.
     * If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have
     * the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a
     * channel.
     *
     * @see https://core.telegram.org/bots/api#unpinallchatmessages
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function unpinAllChatMessages(int|string $chatId): bool
    {
        return $this->call('unpinAllChatMessages', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel.
     *
     * @see https://core.telegram.org/bots/api#leavechat
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function leaveChat(int|string $chatId): bool
    {
        return $this->call('leaveChat', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to get up to date information about the chat
     * (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.).
     *
     * @see https://core.telegram.org/bots/api#getchat
     *
     * @param int|string $chatId
     *
     * @return ChatFullInfo
     * @throws Exception
     */
    public function getChat(int|string $chatId): ChatFullInfo
    {
        return ChatFullInfo::fromResponse($this->call('getChat', [
            'chat_id' => $chatId,
        ]));
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots.
     *
     * @see https://core.telegram.org/bots/api#getchatadministrators
     *
     * @param int|string $chatId
     *
     * @return ChatMember[]
     * @throws Exception|InvalidArgumentException
     */
    public function getChatAdministrators(int|string $chatId): array
    {
        return ArrayOfChatMemberEntity::fromResponse(
            $this->call(
                'getChatAdministrators',
                [
                    'chat_id' => $chatId,
                ],
            ),
        );
    }

    /**
     * Use this method to get the number of members in a chat.
     *
     * @see https://core.telegram.org/bots/api#getchatmembercount
     *
     * @param int|string $chatId
     *
     * @return int
     * @throws Exception
     */
    public function getChatMemberCount(int|string $chatId): int
    {
        return $this->call('getChatMemberCount', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to get information about a member of a chat.
     * The method is only guaranteed to work for other users if the bot is an administrator in the chat.
     *
     * @see https://core.telegram.org/bots/api#getchatmember
     *
     * @param int|string $chatId
     * @param int $userId
     *
     * @return ChatMember
     * @throws Exception
     */
    public function getChatMember(int|string $chatId, int $userId): ChatMember
    {
        return ChatMember::fromResponse($this->call('getChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]));
    }

    /**
     * Use this method to set a new group sticker set for a supergroup.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator
     * rights.
     * Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this
     * method.
     *
     * @see https://core.telegram.org/bots/api#setchatstickerset
     *
     * @param int|string $chatId
     * @param int $stickerSetName Name of the sticker set to be set as the group sticker set
     *
     * @return ChatMember
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function setChatStickerSet(int|string $chatId, int $stickerSetName): ChatMember
    {
        return ChatMember::fromResponse($this->call('setChatStickerSet', [
            'chat_id' => $chatId,
            'sticker_set_name' => $stickerSetName,
        ]));
    }

    /**
     * Use this method to delete a group sticker set from a supergroup.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator
     * rights.
     * Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this
     * method.
     *
     * @see https://core.telegram.org/bots/api#deletechatstickerset
     *
     * @param int|string $chatId
     * @return ChatMember
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function deleteChatStickerSet(int|string $chatId): ChatMember
    {
        return ChatMember::fromResponse($this->call('deleteChatStickerSet', [
            'chat_id' => $chatId,
        ]));
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user.
     *
     * @see https://core.telegram.org/bots/api#getforumtopiciconstickers
     *
     * @return Sticker[]
     * @throws Exception
     */
    public function getForumTopicIconStickers(): array
    {
        return ArrayOfSticker::fromResponse($this->call('getForumTopicIconStickers'));
    }

    /**
     * Use this method to create a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights.
     *
     * @see https://core.telegram.org/bots/api#createforumtopic
     *
     * @param int|string $chatId
     * @param string $name Topic name, 1-128 characters
     * @param int $iconColor Color of the topic icon in RGB format.
     *                       Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB),
     *                       9367192 (0x8EEE98),
     *                       16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param int|null $iconCustomEmojiId Unique identifier of the custom emoji shown as the topic icon.
     *                                    Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
     *
     * @return ForumTopic
     * @throws Exception
     */
    public function createForumTopic(
        int|string $chatId,
        string $name,
        int $iconColor,
        int $iconCustomEmojiId = null,
    ): ForumTopic
    {
        return ForumTopic::fromResponse($this->call('createForumTopic', [
            'chat_id' => $chatId,
            'name' => $name,
            'icon_color' => $iconColor,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ]));
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator
     * rights, unless it is the creator of the topic.
     *
     * @see https://core.telegram.org/bots/api#editforumtopic
     *
     * @param int|string $chatId
     * @param int $messageThreadId
     * @param string $name Topic name, 1-128 characters
     * @param int|null $iconCustomEmojiId
     *
     * @return bool
     * @throws Exception
     */
    public function editForumTopic(
        int|string $chatId,
        int $messageThreadId,
        string $name,
        int $iconCustomEmojiId = null,
    ): bool
    {
        return $this->call('editForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'name' => $name,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ]);
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights, unless it is the creator of the topic.
     *
     * @see https://core.telegram.org/bots/api#closeforumtopic
     *
     * @param int|string $chatId
     * @param int $messageThreadId
     *
     * @return bool
     * @throws Exception
     */
    public function closeForumTopic(int|string $chatId, int $messageThreadId): bool
    {
        return $this->call('closeForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights, unless it is the creator of the topic.
     *
     * @see https://core.telegram.org/bots/api#reopenforumtopic
     *
     * @param int|string $chatId
     * @param int $messageThreadId
     *
     * @return bool
     * @throws Exception
     */
    public function reopenForumTopic(int|string $chatId, int $messageThreadId): bool
    {
        return $this->call('reopenForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_delete_messages
     * administrator rights.
     *
     * @see https://core.telegram.org/bots/api#deleteforumtopic
     *
     * @param int|string $chatId
     * @param int $messageThreadId
     *
     * @return bool
     * @throws Exception
     */
    public function deleteForumTopic(int|string $chatId, int $messageThreadId): bool
    {
        return $this->call('deleteForumTopic', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic.
     * The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator
     * right in the supergroup.
     *
     * @see https://core.telegram.org/bots/api#unpinallforumtopicmessages
     *
     * @param int|string $chatId
     * @param int $messageThreadId
     *
     * @return bool
     * @throws Exception
     */
    public function unpinAllForumTopicMessages(int|string $chatId, int $messageThreadId): bool
    {
        return $this->call('unpinAllForumTopicMessages', [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator
     * rights.
     *
     * @see https://core.telegram.org/bots/api#editgeneralforumtopic
     *
     * @param int|string $chatId
     * @param string $name New topic name, 1-128 characters
     *
     * @return bool
     * @throws Exception
     */
    public function editGeneralForumTopic(int|string $chatId, string $name): bool
    {
        return $this->call('editGeneralForumTopic', [
            'chat_id' => $chatId,
            'name' => $name,
        ]);
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights.
     *
     * @see https://core.telegram.org/bots/api#closegeneralforumtopic
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function closeGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call('closeGeneralForumTopic', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights. The topic will be automatically unhidden if it was hidden.
     *
     * @see https://core.telegram.org/bots/api#reopengeneralforumtopic
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function reopenGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call('reopenGeneralForumTopic', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights. The topic will be automatically closed if it was open.
     *
     * @see https://core.telegram.org/bots/api#hidegeneralforumtopic
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function hideGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call('hideGeneralForumTopic', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights.
     *
     * @see https://core.telegram.org/bots/api#unhidegeneralforumtopic
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function unhideGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call('unhideGeneralForumTopic', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic.
     * The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator
     * right in the supergroup.
     *
     * @see https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
     *
     * @param int|string $chatId
     *
     * @return bool
     * @throws Exception
     */
    public function unpinAllGeneralForumTopicMessages(int|string $chatId): bool
    {
        return $this->call('unpinAllGeneralForumTopicMessages', [
            'chat_id' => $chatId,
        ]);
    }

    /**
     * Use this method to get the list of boosts added to a chat by a user.
     * Requires administrator rights in the chat.
     *
     * @see https://core.telegram.org/bots/api#getuserchatboosts
     *
     * @param int|string $chatId
     * @param int $userId
     *
     * @return UserChatBoosts
     * @throws Exception
     */
    public function getUserChatBoosts(int|string $chatId, int $userId): UserChatBoosts
    {
        return UserChatBoosts::fromResponse($this->call('getUserChatBoosts', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]));
    }

    /**
     * Use this method to get the list of boosts added to a chat by a user.
     * Requires administrator rights in the chat.
     *
     * @see https://core.telegram.org/bots/api#getbusinessconnection
     *
     * @param string $businessConnectionId
     *
     * @return UserChatBoosts
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getBusinessConnection(string $businessConnectionId): UserChatBoosts
    {
        return UserChatBoosts::fromResponse($this->call('getBusinessConnection', [
            'business_connection_id' => $businessConnectionId,
        ]));
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an
     * administrator to groups or channels. These rights will be suggested to users, but they are free to modify the
     * list before adding the bot.
     *
     * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
     *
     * @param ChatAdministratorRights|null $rights Unique identifier for the target private chat. If not specified,
     *                                             default bot's menu button will be changed
     * @param bool|null $forChannels Pass True to change the default administrator rights of the bot in channels.
     *                               Otherwise, the default administrator rights of the bot for groups and supergroups
     *                               will be changed.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMyDefaultAdministratorRights(
        ?ChatAdministratorRights $rights = null,
        ?bool $forChannels = null,
    ): bool
    {
        return $this->call('setMyDefaultAdministratorRights', [
            'rights' => $rights?->toJson(),
            'for_channels' => $forChannels,
        ]);
    }

    /**
     * Use this method to get the current default administrator rights of the bot.
     *
     * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
     *
     * @param bool|null $forChannels
     *
     * @return ChatAdministratorRights
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getMyDefaultAdministratorRights(?bool $forChannels = null): ChatAdministratorRights
    {
        return ChatAdministratorRights::fromResponse(
            $this->call('getMyDefaultAdministratorRights', [
                'for_channels' => $forChannels,
            ]),
        );
    }

}
