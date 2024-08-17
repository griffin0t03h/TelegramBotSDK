<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatFullInfo
 * This object contains full information about a chat.
 *
 * @package TelegramBotSDK\Types
 */
class ChatFullInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'type'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'type' => true,
        'title' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'is_forum' => true,
        'accent_color_id' => true,
        'max_reaction_count' => true,
        'photo' => ChatPhoto::class,
        'active_usernames' => true,
        'birthdate' => true,
        'business_intro' => true,
        'business_location' => true,
        'business_opening_hours' => true,
        'personal_chat' => Chat::class,
        'available_reactions' => ArrayOfReactionType::class,
        'background_custom_emoji_id' => true,
        'profile_accent_color_id' => true,
        'profile_background_custom_emoji_id' => true,
        'emoji_status_custom_emoji_id' => true,
        'emoji_status_expiration_date' => true,
        'bio' => true,
        'has_private_forwards' => true,
        'has_restricted_voice_and_video_messages' => true,
        'join_to_send_messages' => true,
        'join_by_request' => true,
        'description' => true,
        'invite_link' => true,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'can_send_paid_media' => true,
        'slow_mode_delay' => true,
        'unrestrict_boost_count' => true,
        'message_auto_delete_time' => true,
        'has_aggressive_anti_spam_enabled' => true,
        'has_hidden_members' => true,
        'has_protected_content' => true,
        'has_visible_history' => true,
        'sticker_set_name' => true,
        'can_set_sticker_set' => true,
        'custom_emoji_sticker_set_name' => true,
        'linked_chat_id' => true,
        'location' => ChatLocation::class,
    ];

    /**
     * Unique identifier for this chat. This number may have more than 32 significant bits and some
     * programming languages may have difficulty/silent defects in interpreting it. But it has at
     * most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe
     * for storing this identifier.
     *
     * @var int|float
     */
    protected int|float $id;

    /**
     * Type of the chat, can be either “private”, “group”, “supergroup” or “channel”.
     *
     * @var string
     */
    protected string $type;

    /**
     * Optional. Title, for supergroups, channels and group chats.
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Optional. Username, for private chats, supergroups and channels if available.
     *
     * @var string|null
     */
    protected ?string $username = null;

    /**
     * Optional. First name of the other party in a private chat.
     *
     * @var string|null
     */
    protected ?string $firstName = null;

    /**
     * Optional. Last name of the other party in a private chat.
     *
     * @var string|null
     */
    protected ?string $lastName = null;

    /**
     * Optional. True, if the supergroup chat is a forum (has
     * [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups)
     * enabled).
     *
     * @var bool|null
     */
    protected ?bool $isForum = null;

    /**
     * Identifier of the accent color for the chat name and backgrounds of the chat photo, reply
     * header, and link preview. See [accent
     * colors](https://core.telegram.org/bots/api#accent-colors) for more details.
     *
     * @var int|null
     */
    protected ?int $accentColorId;

    /**
     * The maximum number of reactions that can be set on a message in the chat.
     *
     * @var int|null
     */
    protected ?int $maxReactionCount;

    /**
     * Optional. Chat photo.
     *
     * @var ChatPhoto|null
     */
    protected ?ChatPhoto $photo = null;

    /**
     * Optional. If non-empty, the list of all [active chat
     * usernames](https://telegram.org/blog/topics-in-groups-collectible-usernames#collectible-usernames);
     * for private chats, supergroups and channels.
     *
     * @var string[]|null
     */
    protected ?array $activeUsernames = null;

    /**
     * Optional. For private chats, the date of birth of the user.
     *
     * @var Birthdate|null
     */
    protected ?Birthdate $birthdate = null;

    /**
     * Optional. For private chats with business accounts, the intro of the business.
     *
     * @var BusinessIntro|null
     */
    protected ?BusinessIntro $businessIntro = null;

    /**
     * Optional. For private chats with business accounts, the location of the business.
     *
     * @var BusinessLocation|null
     */
    protected ?BusinessLocation $businessLocation = null;

    /**
     * Optional. For private chats with business accounts, the opening hours of the business.
     *
     * @var BusinessOpeningHours|null
     */
    protected ?BusinessOpeningHours $businessOpeningHours = null;

    /**
     * Optional. For private chats, the personal channel of the user.
     *
     * @var Chat|null
     */
    protected ?Chat $personalChat = null;

    /**
     * Optional. List of available reactions allowed in the chat. If omitted, then all [emoji
     * reactions](https://core.telegram.org/bots/api#reactiontypeemoji) are allowed.
     *
     * @var ReactionType[]|null
     */
    protected ?array $availableReactions = null;

    /**
     * Optional. Custom emoji identifier of emoji chosen by the chat for the reply header and link
     * preview background.
     *
     * @var string|null
     */
    protected ?string $backgroundCustomEmojiId = null;

    /**
     * Optional. Identifier of the accent color for the chat's profile background. See [profile
     * accent colors](https://core.telegram.org/bots/api#profile-accent-colors) for more details.
     *
     * @var int|null
     */
    protected ?int $profileAccentColorId = null;

    /**
     * Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background.
     *
     * @var string|null
     */
    protected ?string $profileBackgroundCustomEmojiId = null;

    /**
     * Optional. Custom emoji identifier of the emoji status of the chat or the other party in a
     * private chat
     *
     * @var string|null
     */
    protected ?string $emojiStatusCustomEmojiId = null;

    /**
     * Optional. Expiration date of the emoji status of the chat or the other party in a private
     * chat, in Unix time, if any.
     *
     * @var int|null
     */
    protected ?int $emojiStatusExpirationDate = null;

    /**
     * Optional. Bio of the other party in a private chat.
     *
     * @var string|null
     */
    protected ?string $bio = null;

    /**
     * Optional. True, if privacy settings of the other party in the private chat allows to use
     * tg://user?id=<user_id> links only in chats with the user.
     *
     * @var bool|null
     */
    protected ?bool $hasPrivateForwards = null;

    /**
     * Optional. True, if the privacy settings of the other party restrict sending voice and video
     * note messages in the private chat.
     *
     * @var bool|null
     */
    protected ?bool $hasRestrictedVoiceAndVideoMessages = null;

    /**
     * Optional. True, if users need to join the supergroup before they can send messages.
     *
     * @var bool|null
     */
    protected ?bool $joinToSendMessages = null;

    /**
     * Optional. True, if all users directly joining the supergroup need to be approved by
     * supergroup administrators.
     *
     * @var bool|null
     */
    protected ?bool $joinByRequest = null;

    /**
     * Optional. Description, for groups, supergroups and channel chats.
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * Optional. Primary invite link, for groups, supergroups and channel chats.
     *
     * @var string|null
     */
    protected ?string $inviteLink = null;

    /**
     * Optional. The most recent pinned message (by sending date).
     *
     * @var Message|null
     */
    protected ?Message $pinnedMessage = null;

    /**
     * Optional. Default chat member permissions, for groups and supergroups.
     *
     * @var ChatPermissions|null
     */
    protected ?ChatPermissions $permissions = null;

    /**
     * Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is available only
     * for channel chats.
     *
     * @var bool|null
     */
    protected ?bool $canSendPaidMedia = null;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged
     * user; in seconds. Returned only in getChat.
     *
     * @var int|null
     */
    protected ?int $slowModeDelay = null;

    /**
     * Optional. For supergroups, the minimum number of boosts that a non-administrator user needs
     * to add in order to ignore slow mode and chat permissions.
     *
     * @var int|null
     */
    protected ?int $unrestrictBoostCount = null;

    /**
     * Optional. The time after which all messages sent to the chat will be automatically deleted;
     * in seconds.
     *
     * @var int|null
     */
    protected ?int $messageAutoDeleteTime = null;

    /**
     * Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is
     * only available to chat administrators.
     *
     * @var bool|null
     */
    protected ?bool $hasAggressiveAntiSpamEnabled = null;

    /**
     * Optional. True, if non-administrators can only get the list of bots and administrators in
     * the chat.
     *
     * @var bool|null
     */
    protected ?bool $hasHiddenMembers = null;

    /**
     * Optional. True, if messages from the chat can't be forwarded to other chats. Returned only
     * in getChat.
     *
     * @var bool|null
     */
    protected ?bool $hasProtectedContent = null;

    /**
     * Optional. True, if new chat members will have access to old messages; available only to chat
     * administrators.
     *
     * @var bool|null
     */
    protected ?bool $hasVisibleHistory = null;

    /**
     * Optional. For supergroups, name of the group sticker set.
     *
     * @var string|null
     */
    protected ?string $stickerSetName = null;

    /**
     * Optional. True, if the bot can change the group sticker set.
     *
     * @var bool|null
     */
    protected ?bool $canSetStickerSet = null;

    /**
     * Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji
     * from this set can be used by all users and bots in the group.
     *
     * @var string|null
     */
    protected ?string $customEmojiStickerSetName = null;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a
     * channel and vice versa; for supergroups and channel chats. This identifier may be greater
     * than 32 bits and some programming languages may have difficulty/silent defects in
     * interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected ?int $linkedChatId = null;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected.
     *
     * @var ChatLocation|null
     */
    protected ?ChatLocation $location = null;

    /**
     * @return int|float
     * @see $id
     */
    public function getId(): float|int
    {
        return $this->id;
    }

    /**
     * @param float|int $id
     * @return void
     *
     * @see $id
     */
    public function setId(float|int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     *
     * @see $type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @see $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     *
     * @see $title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @see $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     *
     * @see $username
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @see $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     *
     * @see $firstName
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @see $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     *
     * @see $lastName
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @see $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool|null
     *
     * @see $isForum
     */
    public function getIsForum(): ?bool
    {
        return $this->isForum;
    }

    /**
     * @param bool|null $isForum
     *
     * @see $isForum
     */
    public function setIsForum(?bool $isForum): void
    {
        $this->isForum = $isForum;
    }

    /**
     * @return int|null
     *
     * @see $accentColorId
     */
    public function getAccentColorId(): ?int
    {
        return $this->accentColorId;
    }

    /**
     * @param int|null $accentColorId
     *
     * @see $accentColorId
     */
    public function setAccentColorId(?int $accentColorId): void
    {
        $this->accentColorId = $accentColorId;
    }

    /**
     * @return int|null
     *
     * @see $maxReactionCount
     */
    public function getMaxReactionCount(): ?int
    {
        return $this->maxReactionCount;
    }

    /**
     * @param int|null $maxReactionCount
     *
     * @see $maxReactionCount
     */
    public function setMaxReactionCount(?int $maxReactionCount): void
    {
        $this->maxReactionCount = $maxReactionCount;
    }

    /**
     * @return ChatPhoto|null
     *
     * @see $photo
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param ChatPhoto|null $photo
     *
     * @see $photo
     */
    public function setPhoto(?ChatPhoto $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return array|null
     *
     * @see $activeUsernames
     */
    public function getActiveUsernames(): ?array
    {
        return $this->activeUsernames;
    }

    /**
     * @param array|null $activeUsernames
     *
     * @see $activeUsernames
     */
    public function setActiveUsernames(?array $activeUsernames): void
    {
        $this->activeUsernames = $activeUsernames;
    }

    /**
     * @return Birthdate|null
     *
     * @see $birthdate
     */
    public function getBirthdate(): ?Birthdate
    {
        return $this->birthdate;
    }

    /**
     * @param Birthdate|null $birthdate
     *
     * @see $birthdate
     */
    public function setBirthdate(?Birthdate $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return BusinessIntro|null
     *
     * @see $businessIntro
     */
    public function getBusinessIntro(): ?BusinessIntro
    {
        return $this->businessIntro;
    }

    /**
     * @param BusinessIntro|null $businessIntro
     *
     * @see $businessIntro
     */
    public function setBusinessIntro(?BusinessIntro $businessIntro): void
    {
        $this->businessIntro = $businessIntro;
    }

    /**
     * @return BusinessLocation|null
     *
     * @see $businessLocation
     */
    public function getBusinessLocation(): ?BusinessLocation
    {
        return $this->businessLocation;
    }

    /**
     * @param BusinessLocation|null $businessLocation
     *
     * @see $businessLocation
     */
    public function setBusinessLocation(?BusinessLocation $businessLocation): void
    {
        $this->businessLocation = $businessLocation;
    }

    /**
     * @return BusinessOpeningHours|null
     *
     * @see $businessOpeningHours
     */
    public function getBusinessOpeningHours(): ?BusinessOpeningHours
    {
        return $this->businessOpeningHours;
    }

    /**
     * @param BusinessOpeningHours|null $businessOpeningHours
     *
     * @see $businessOpeningHours
     */
    public function setBusinessOpeningHours(?BusinessOpeningHours $businessOpeningHours): void
    {
        $this->businessOpeningHours = $businessOpeningHours;
    }

    /**
     * @return Chat|null
     *
     * @see $personalChat
     */
    public function getPersonalChat(): ?Chat
    {
        return $this->personalChat;
    }

    /**
     * @param Chat|null $personalChat
     *
     * @see $personalChat
     */
    public function setPersonalChat(?Chat $personalChat): void
    {
        $this->personalChat = $personalChat;
    }

    /**
     * @return array|null
     *
     * @see $availableReactions
     */
    public function getAvailableReactions(): ?array
    {
        return $this->availableReactions;
    }

    /**
     * @param array|null $availableReactions
     *
     * @see $availableReactions
     */
    public function setAvailableReactions(?array $availableReactions): void
    {
        $this->availableReactions = $availableReactions;
    }

    /**
     * @return string|null
     *
     * @see $backgroundCustomEmojiId
     */
    public function getBackgroundCustomEmojiId(): ?string
    {
        return $this->backgroundCustomEmojiId;
    }

    /**
     * @param string|null $backgroundCustomEmojiId
     *
     * @see $backgroundCustomEmojiId
     */
    public function setBackgroundCustomEmojiId(?string $backgroundCustomEmojiId): void
    {
        $this->backgroundCustomEmojiId = $backgroundCustomEmojiId;
    }

    /**
     * @return int|null
     *
     * @see $profileAccentColorId
     */
    public function getProfileAccentColorId(): ?int
    {
        return $this->profileAccentColorId;
    }

    /**
     * @param int|null $profileAccentColorId
     *
     * @see $profileAccentColorId
     */
    public function setProfileAccentColorId(?int $profileAccentColorId): void
    {
        $this->profileAccentColorId = $profileAccentColorId;
    }

    /**
     * @return string|null
     *
     * @see $profileBackgroundCustomEmojiId
     */
    public function getProfileBackgroundCustomEmojiId(): ?string
    {
        return $this->profileBackgroundCustomEmojiId;
    }

    /**
     * @param string|null $profileBackgroundCustomEmojiId
     *
     * @see $profileBackgroundCustomEmojiId
     */
    public function setProfileBackgroundCustomEmojiId(?string $profileBackgroundCustomEmojiId): void
    {
        $this->profileBackgroundCustomEmojiId = $profileBackgroundCustomEmojiId;
    }

    /**
     * @return string|null
     *
     * @see $emojiStatusCustomEmojiId
     */
    public function getEmojiStatusCustomEmojiId(): ?string
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @param string|null $emojiStatusCustomEmojiId
     *
     * @see $emojiStatusCustomEmojiId
     */
    public function setEmojiStatusCustomEmojiId(?string $emojiStatusCustomEmojiId): void
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;
    }

    /**
     * @return int|null
     *
     * @see $emojiStatusExpirationDate
     */
    public function getEmojiStatusExpirationDate(): ?int
    {
        return $this->emojiStatusExpirationDate;
    }

    /**
     * @param int|null $emojiStatusExpirationDate
     *
     * @see $emojiStatusExpirationDate
     */
    public function setEmojiStatusExpirationDate(?int $emojiStatusExpirationDate): void
    {
        $this->emojiStatusExpirationDate = $emojiStatusExpirationDate;
    }

    /**
     * @return string|null
     *
     * @see $bio
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     *
     * @see $bio
     */
    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return bool|null
     *
     * @see $hasPrivateForwards
     */
    public function getHasPrivateForwards(): ?bool
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @param bool|null $hasPrivateForwards
     *
     * @see $hasPrivateForwards
     */
    public function setHasPrivateForwards(?bool $hasPrivateForwards): void
    {
        $this->hasPrivateForwards = $hasPrivateForwards;
    }

    /**
     * @return bool|null
     *
     * @see $hasRestrictedVoiceAndVideoMessages
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?bool
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @param bool|null $hasRestrictedVoiceAndVideoMessages
     *
     * @see $hasRestrictedVoiceAndVideoMessages
     */
    public function setHasRestrictedVoiceAndVideoMessages(?bool $hasRestrictedVoiceAndVideoMessages): void
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @return bool|null
     *
     * @see $joinToSendMessages
     */
    public function getJoinToSendMessages(): ?bool
    {
        return $this->joinToSendMessages;
    }

    /**
     * @param bool|null $joinToSendMessages
     *
     * @see $joinToSendMessages
     */
    public function setJoinToSendMessages(?bool $joinToSendMessages): void
    {
        $this->joinToSendMessages = $joinToSendMessages;
    }

    /**
     * @return bool|null
     *
     * @see $joinByRequest
     */
    public function getJoinByRequest(): ?bool
    {
        return $this->joinByRequest;
    }

    /**
     * @param bool|null $joinByRequest
     *
     * @see $joinByRequest
     */
    public function setJoinByRequest(?bool $joinByRequest): void
    {
        $this->joinByRequest = $joinByRequest;
    }

    /**
     * @return string|null
     *
     * @see $description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @see $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     *
     * @see $inviteLink
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * @param string|null $inviteLink
     *
     * @see $inviteLink
     */
    public function setInviteLink(?string $inviteLink): void
    {
        $this->inviteLink = $inviteLink;
    }

    /**
     * @return Message|null
     *
     * @see $pinnedMessage
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message|null $pinnedMessage
     *
     * @see $pinnedMessage
     */
    public function setPinnedMessage(?Message $pinnedMessage): void
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return ChatPermissions|null
     *
     * @see $permissions
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @param ChatPermissions|null $permissions
     *
     * @see $permissions
     */
    public function setPermissions(?ChatPermissions $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return bool|null
     *
     * @see $canSendPaidMedia
     */
    public function getCanSendPaidMedia(): ?bool
    {
        return $this->canSendPaidMedia;
    }

    /**
     * @param bool|null $canSendPaidMedia
     *
     * @see $permissions
     */
    public function setCanSendPaidMedia(?bool $canSendPaidMedia): void
    {
        $this->canSendPaidMedia = $canSendPaidMedia;
    }

    /**
     * @return int|null
     *
     * @see $slowModeDelay
     */
    public function getSlowModeDelay(): ?int
    {
        return $this->slowModeDelay;
    }

    /**
     * @param int|null $slowModeDelay
     *
     * @see $slowModeDelay
     */
    public function setSlowModeDelay(?int $slowModeDelay): void
    {
        $this->slowModeDelay = $slowModeDelay;
    }

    /**
     * @return int|null
     *
     * @see $unrestrictBoostCount
     */
    public function getUnrestrictBoostCount(): ?int
    {
        return $this->unrestrictBoostCount;
    }

    /**
     * @param int|null $unrestrictBoostCount
     *
     * @see $unrestrictBoostCount
     */
    public function setUnrestrictBoostCount(?int $unrestrictBoostCount): void
    {
        $this->unrestrictBoostCount = $unrestrictBoostCount;
    }

    /**
     * @return int|null
     *
     * @see $messageAutoDeleteTime
     */
    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param int|null $messageAutoDeleteTime
     *
     * @see $messageAutoDeleteTime
     */
    public function setMessageAutoDeleteTime(?int $messageAutoDeleteTime): void
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
    }

    /**
     * @return bool|null
     *
     * @see $hasAggressiveAntiSpamEnabled
     */
    public function getHasAggressiveAntiSpamEnabled(): ?bool
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * @param bool|null $hasAggressiveAntiSpamEnabled
     *
     * @see $hasAggressiveAntiSpamEnabled
     */
    public function setHasAggressiveAntiSpamEnabled(?bool $hasAggressiveAntiSpamEnabled): void
    {
        $this->hasAggressiveAntiSpamEnabled = $hasAggressiveAntiSpamEnabled;
    }

    /**
     * @return bool|null
     *
     * @see $hasHiddenMembers
     */
    public function getHasHiddenMembers(): ?bool
    {
        return $this->hasHiddenMembers;
    }

    /**
     * @param bool|null $hasHiddenMembers
     *
     * @see $hasHiddenMembers
     */
    public function setHasHiddenMembers(?bool $hasHiddenMembers): void
    {
        $this->hasHiddenMembers = $hasHiddenMembers;
    }

    /**
     * @return bool|null
     *
     * @see $hasProtectedContent
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->hasProtectedContent;
    }

    /**
     * @param bool|null $hasProtectedContent
     *
     * @see $hasProtectedContent
     */
    public function setHasProtectedContent(?bool $hasProtectedContent): void
    {
        $this->hasProtectedContent = $hasProtectedContent;
    }

    /**
     * @return bool|null
     *
     * @see $hasVisibleHistory
     */
    public function getHasVisibleHistory(): ?bool
    {
        return $this->hasVisibleHistory;
    }

    /**
     * @param bool|null $hasVisibleHistory
     *
     * @see $hasVisibleHistory
     */
    public function setHasVisibleHistory(?bool $hasVisibleHistory): void
    {
        $this->hasVisibleHistory = $hasVisibleHistory;
    }

    /**
     * @return string|null
     *
     * @see $stickerSetName
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * @param string|null $stickerSetName
     *
     * @see $stickerSetName
     */
    public function setStickerSetName(?string $stickerSetName): void
    {
        $this->stickerSetName = $stickerSetName;
    }

    /**
     * @return bool|null
     *
     * @see $canSetStickerSet
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param bool|null $canSetStickerSet
     *
     * @see $canSetStickerSet
     */
    public function setCanSetStickerSet(?bool $canSetStickerSet): void
    {
        $this->canSetStickerSet = $canSetStickerSet;
    }

    /**
     * @return string|null
     *
     * @see $customEmojiStickerSetName
     */
    public function getCustomEmojiStickerSetName(): ?string
    {
        return $this->customEmojiStickerSetName;
    }

    /**
     * @param string|null $customEmojiStickerSetName
     *
     * @see $customEmojiStickerSetName
     */
    public function setCustomEmojiStickerSetName(?string $customEmojiStickerSetName): void
    {
        $this->customEmojiStickerSetName = $customEmojiStickerSetName;
    }

    /**
     * @return int|null
     *
     * @see $linkedChatId
     */
    public function getLinkedChatId(): ?int
    {
        return $this->linkedChatId;
    }

    /**
     * @param int|null $linkedChatId
     *
     * @see $linkedChatId
     */
    public function setLinkedChatId(?int $linkedChatId): void
    {
        $this->linkedChatId = $linkedChatId;
    }

    /**
     * @return ChatLocation|null
     *
     * @see $location
     */
    public function getLocation(): ?ChatLocation
    {
        return $this->location;
    }

    /**
     * @param ChatLocation|null $location
     *
     * @see $location
     */
    public function setLocation(?ChatLocation $location): void
    {
        $this->location = $location;
    }
}
