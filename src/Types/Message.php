<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Game\Game;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Payments\Invoice;
use TelegramBotSDK\Types\Payments\RefundedPayment;
use TelegramBotSDK\Types\Payments\SuccessfulPayment;
use TelegramBotSDK\Types\Sticker\Sticker;

/**
 * Class Message
 * This object represents a message.
 *
 * @package TelegramBotSDK\Types
 */
class Message extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['message_id', 'date', 'chat'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'message_id' => true,
        'message_thread_id' => true,
        'from' => User::class,
        'sender_chat' => Chat::class,
        'sender_boost_count' => true,
        'sender_business_bot' => User::class,
        'date' => true,
        'business_connection_id' => true,
        'chat' => Chat::class,
        'forward_origin' => MessageOrigin::class,
        'is_topic_message' => true,
        'is_automatic_forward' => true,
        'reply_to_message' => self::class,
        'external_reply' => ExternalReplyInfo::class,
        'quote' => TextQuote::class,
        'reply_to_story' => Story::class,
        'via_bot' => User::class,
        'edit_date' => true,
        'has_protected_content' => true,
        'is_from_offline' => true,
        'media_group_id' => true,
        'author_signature' => true,
        'text' => true,
        'entities' => ArrayOfMessageEntity::class,
        'link_preview_options' => LinkPreviewOptions::class,
        'effect_id' => true,
        'animation' => Animation::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'story' => Story::class,
        'video' => Video::class,
        'video_note' => VideoNote::class,
        'voice' => Voice::class,
        'caption' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'show_caption_above_media' => true,
        'has_media_spoiler' => true,
        'contact' => Contact::class,
        'dice' => Dice::class,
        'game' => Game::class,
        'poll' => Poll::class,
        'venue' => Venue::class,
        'location' => Location::class,
        'new_chat_members' => ArrayOfUser::class,
        'left_chat_member' => User::class,
        'new_chat_title' => true,
        'new_chat_photo' => ArrayOfPhotoSize::class,
        'delete_chat_photo' => true,
        'group_chat_created' => true,
        'supergroup_chat_created' => true,
        'channel_chat_created' => true,
        'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
        'migrate_to_chat_id' => true,
        'migrate_from_chat_id' => true,
        'pinned_message' => MaybeInaccessibleMessage::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'refunded_payment' => RefundedPayment::class,
        'users_shared' => UsersShared::class,
        'chat_shared' => ChatShared::class,
        'connected_website' => true,
        'write_access_allowed' => WriteAccessAllowed::class,
        //        'passport_data' => PassportData::class,
        'proximity_alert_triggered' => ProximityAlertTriggered::class,
        'boost_added' => ChatBoostAdded::class,
        'chat_background_set' => ChatBackground::class,
        'forum_topic_created' => ForumTopicCreated::class,
        'forum_topic_edited' => ForumTopicEdited::class,
        'forum_topic_closed' => ForumTopicClosed::class,
        'forum_topic_reopened' => ForumTopicReopened::class,
        'general_forum_topic_hidden' => GeneralForumTopicHidden::class,
        'general_forum_topic_unhidden' => GeneralForumTopicUnhidden::class,
        'giveaway_created' => GiveawayCreated::class,
        'giveaway' => Giveaway::class,
        'giveaway_winners' => GiveawayWinners::class,
        'giveaway_completed' => GiveawayCompleted::class,
        'video_chat_scheduled' => VideoChatScheduled::class,
        'video_chat_started' => VideoChatStarted::class,
        'video_chat_ended' => VideoChatEnded::class,
        'video_chat_participants_invited' => VideoChatParticipantsInvited::class,
        'web_app_data' => WebAppData::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    /**
     * Unique message identifier inside this chat
     *
     * @var int
     */
    protected int $messageId;

    /**
     * Optional. Unique identifier of a message thread to which the message belongs; for
     * supergroups only
     *
     * @var int|null
     */
    protected ?int $messageThreadId = null;

    /**
     * Optional. Sender of the message; empty for messages sent to channels. For backward
     * compatibility, the field contains a fake sender user in non-channel chats, if the message
     * was sent on behalf of a chat.
     *
     * @var User|null
     */
    protected ?User $from = null;

    /**
     * Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself
     * for channel posts, the supergroup itself for messages from anonymous group administrators,
     * the linked channel for messages automatically forwarded to the discussion group. For
     * backward compatibility, the field from contains a fake sender user in non-channel chats, if
     * the message was sent on behalf of a chat.
     *
     * @var Chat|null
     */
    protected ?Chat $senderChat = null;

    /**
     * Optional. If the sender of the message boosted the chat, the number of boosts added by the
     * user
     *
     * @var int|null
     */
    protected ?int $senderBoostCount = null;

    /**
     * Optional. The bot that actually sent the message on behalf of the business account.
     * Available only for outgoing messages sent on behalf of the connected business account.
     *
     * @var User|null
     */
    protected ?User $senderBusinessBot = null;

    /**
     * Date the message was sent in Unix time. It is always a positive number, representing a valid
     * date.
     *
     * @var int
     */
    protected int $date;

    /**
     * Optional. Unique identifier of the business connection from which the message was received.
     * If non-empty, the message belongs to a chat of the corresponding business account that is
     * independent from any potential bot chat which might share the same identifier.
     *
     * @var string|null
     */
    protected ?string $businessConnectionId = null;

    /**
     * Chat the message belongs to
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Optional. Information about the original message for forwarded messages
     *
     * @var MessageOrigin|null
     */
    protected ?MessageOrigin $forwardOrigin = null;

    /**
     * Optional. True, if the message is sent to a forum topic
     *
     * @var bool|null
     */
    protected ?bool $isTopicMessage = null;

    /**
     * Optional. True, if the message is a channel post that was automatically forwarded to the
     * connected discussion group
     *
     * @var bool|null
     */
    protected ?bool $isAutomaticForward = null;

    /**
     * Optional. For replies in the same chat and message thread, the original message.
     * Note that the Message object in this field will not contain further reply_to_message fields
     * even if it itself is a reply.
     *
     * @var Message|null
     */
    protected ?Message $replyToMessage = null;

    /**
     * Optional. Information about the message that is being replied to, which may come from
     * another chat or forum topic
     *
     * @var ExternalReplyInfo|null
     */
    protected ?ExternalReplyInfo $externalReply = null;

    /**
     * Optional. For replies that quote part of the original message, the quoted part of the message
     *
     * @var TextQuote|null
     */
    protected ?TextQuote $quote = null;

    /**
     * Optional. For replies to a story, the original story
     *
     * @var Story|null
     */
    protected ?Story $replyToStory = null;

    /**
     * Optional. Bot through which the message was sent
     *
     * @var User|null
     */
    protected ?User $viaBot = null;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var int|null
     */
    protected ?int $editDate = null;

    /**
     * Optional. True, if the message can't be forwarded
     *
     * @var bool|null
     */
    protected ?bool $hasProtectedContent = null;

    /**
     * Optional. True, if the message was sent by an implicit action, for example, as an away or a
     * greeting business message, or as a scheduled message
     *
     * @var bool|null
     */
    protected ?bool $isFromOffline = null;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     *
     * @var string|null
     */
    protected ?string $mediaGroupId = null;

    /**
     * Optional. Signature of the post author for messages in channels, or the custom title of an
     * anonymous group administrator
     *
     * @var string|null
     */
    protected ?string $authorSignature = null;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string|null
     */
    protected ?string $text = null;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that
     * appear in the text
     *
     * @var MessageEntity[]|null
     */
    protected ?array $entities = null;

    /**
     * Optional. Options used for link preview generation for the message, if it is a text message
     * and link preview options were changed
     *
     * @var LinkPreviewOptions|null
     */
    protected ?LinkPreviewOptions $linkPreviewOptions = null;

    /**
     * Optional. Unique identifier of the message effect added to the message
     *
     * @var string|null
     */
    protected ?string $effectId = null;

    /**
     * Optional. Message is an animation, information about the animation.
     * For backward compatibility, when this field is set, the document field will also be set
     *
     * @var Animation|null
     */
    protected ?Animation $animation = null;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio|null
     */
    protected ?Audio $audio = null;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document|null
     */
    protected ?Document $document = null;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var PhotoSize[]|null
     */
    protected ?array $photo = null;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    protected ?Sticker $sticker = null;

    /**
     * Optional. Message is a forwarded story
     *
     * @var Story|null
     */
    protected ?Story $story = null;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video|null
     */
    protected ?Video $video = null;

    /**
     * Optional. Message is a [video note](https://telegram.org/blog/video-messages-and-telescope),
     * information about the video message
     *
     * @var VideoNote|null
     */
    protected ?VideoNote $videoNote = null;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    protected ?Voice $voice = null;

    /**
     * Optional. Caption for the animation, audio, document, photo, video or voice
     *
     * @var string|null
     */
    protected ?string $caption = null;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands,
     * etc. that appear in the caption
     *
     * @var MessageEntity[]|null
     */
    protected ?array $captionEntities = null;

    /**
     * Optional. True, if the caption must be shown above the message media
     *
     * @var bool|null
     */
    protected ?bool $showCaptionAboveMedia = null;

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @var bool|null
     */
    protected ?bool $hasMediaSpoiler = null;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    protected ?Contact $contact = null;

    /**
     * Optional. Message is a dice with random value
     *
     * @var Dice|null
     */
    protected ?Dice $dice = null;

    /**
     * Optional. Message is a game, information about the game. [More about games
     * ](https://core.telegram.org/bots/api#games)
     *
     * @var Game|null
     */
    protected ?Game $game = null;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll|null
     */
    protected ?Poll $poll = null;

    /**
     * Optional. Message is a venue, information about the venue.
     * For backward compatibility, when this field is set, the location field will also be set
     *
     * @var Venue|null
     */
    protected ?Venue $venue = null;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     *
     * @var User[]|null
     */
    protected ?array $newChatMembers = null;

    /**
     * Optional. A member was removed from the group, information about them (this member may be
     * the bot itself)
     *
     * @var User|null
     */
    protected ?User $leftChatMember = null;

    /**
     * Optional. A chat title was changed to this value
     *
     * @var string|null
     */
    protected ?string $newChatTitle = null;

    /**
     * Optional. A chat photo was change to this value
     *
     * @var PhotoSize[]|null
     */
    protected ?array $newChatPhoto = null;

    /**
     * Optional. Service message: the chat photo was deleted
     *
     * @var bool|null
     */
    protected ?bool $deleteChatPhoto = null;

    /**
     * Optional. Service message: the group has been created
     *
     * @var bool|null
     */
    protected ?bool $groupChatCreated = null;

    /**
     * Optional. Service message: the supergroup has been created.
     * This field can't be received in a message coming through updates,
     * because bot can't be a member of a supergroup when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a
     * directly created supergroup.
     *
     * @var bool|null
     */
    protected ?bool $supergroupChatCreated = null;

    /**
     * Optional. Service message: the channel has been created.
     * This field can't be received in a message coming through updates,
     * because bot can't be a member of a channel when it is created.
     * It can only be found in reply_to_message if someone replies to a very first message in a
     * channel.
     *
     * @var bool|null
     */
    protected ?bool $channelChatCreated = null;

    /**
     * Optional. Service message: auto-delete timer settings changed in the chat
     *
     * @var MessageAutoDeleteTimerChanged|null
     */
    protected ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged = null;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * signed 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected ?int $migrateToChatId = null;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may have more than 32 significant bits and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * signed 64-bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    protected ?int $migrateFromChatId = null;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will not
     * contain further reply_to_message fields even if it itself is a reply.
     *
     * @var Message|InaccessibleMessage|null
     */
    protected InaccessibleMessage|Message|null $pinnedMessage = null;

    /**
     * Optional. Message is an invoice for a [payment](https://core.telegram.org/bots/api#payments), information about
     * the invoice. [More about payments](https://core.telegram.org/bots/api#payments)
     *
     * @var Invoice|null
     */
    protected ?Invoice $invoice = null;

    /**
     * Optional. Message is a service message about a successful payment, information about the
     * payment. [More about payments](https://core.telegram.org/bots/api#payments)
     *
     * @var SuccessfulPayment|null
     */
    protected ?SuccessfulPayment $successfulPayment = null;

    /**
     * Optional. Message is a service message about a refunded payment, information about the payment.
     * [More about payments](https://core.telegram.org/bots/api#payments)
     *
     * @var RefundedPayment|null
     */
    protected ?RefundedPayment $refundedPayment = null;

    /**
     * Optional. Service message: users were shared with the bot
     *
     * @var UsersShared|null
     */
    protected ?UsersShared $usersShared = null;

    /**
     * Optional. Service message: a chat was shared with the bot
     *
     * @var ChatShared|null
     */
    protected ?ChatShared $chatShared = null;

    /**
     * Optional. The domain name of the website on which the user has logged in. [More about
     * Telegram Login](https://core.telegram.org/widgets/login)
     *
     * @var string|null
     */
    protected ?string $connectedWebsite = null;

    /**
     * Optional. Service message: the user allowed the bot to write messages after adding it to the
     * attachment or side menu, launching a Web App from a link, or accepting an explicit request
     * from a Web App sent by the method requestWriteAccess
     *
     * @var WriteAccessAllowed|null
     */
    protected ?WriteAccessAllowed $writeAccessAllowed = null;

    // /**
    //  * Optional. Telegram Passport data
    //  *
    //  * @var \TelegramBotSDK\Types\PassportData|null
    //  */
    // protected $passportData;

    /**
     * Optional. Service message. A user in the chat triggered another user's proximity alert while
     * sharing Live Location
     *
     * @var ProximityAlertTriggered|null
     */
    protected ?ProximityAlertTriggered $proximityAlertTriggered = null;

    /**
     * Optional. Service message: user boosted the chat
     *
     * @var ChatBoostAdded|null
     */
    protected ?ChatBoostAdded $boostAdded = null;

    /**
     * Optional. Service message: chat background set
     *
     * @var ChatBackground|null
     */
    protected ?ChatBackground $chatBackgroundSet = null;

    /**
     * Optional. Service message: forum topic created
     *
     * @var ForumTopicCreated|null
     */
    protected ?ForumTopicCreated $forumTopicCreated = null;

    /**
     * Optional. Service message: forum topic edited
     *
     * @var ForumTopicEdited|null
     */
    protected ?ForumTopicEdited $forumTopicEdited = null;

    /**
     * Optional. Service message: forum topic closed
     *
     * @var ForumTopicClosed|null
     */
    protected ?ForumTopicClosed $forumTopicClosed = null;

    /**
     * Optional. Service message: forum topic reopened
     *
     * @var ForumTopicReopened|null
     */
    protected ?ForumTopicReopened $forumTopicReopened = null;

    /**
     * Optional. Service message: the 'General' forum topic hidden
     *
     * @var GeneralForumTopicHidden|null
     */
    protected ?GeneralForumTopicHidden $generalForumTopicHidden = null;

    /**
     * Optional. Service message: the 'General' forum topic unhidden
     *
     * @var GeneralForumTopicUnhidden|null
     */
    protected ?GeneralForumTopicUnhidden $generalForumTopicUnhidden = null;

    /**
     * Optional. Service message: a scheduled giveaway was created
     *
     * @var GiveawayCreated|null
     */
    protected ?GiveawayCreated $giveawayCreated = null;

    /**
     * Optional. The message is a scheduled giveaway message
     *
     * @var Giveaway|null
     */
    protected ?Giveaway $giveaway = null;

    /**
     * Optional. A giveaway with public winners was completed
     *
     * @var GiveawayWinners|null
     */
    protected ?GiveawayWinners $giveawayWinners = null;

    /**
     * Optional. Service message: a giveaway without public winners was completed
     *
     * @var GiveawayCompleted|null
     */
    protected ?GiveawayCompleted $giveawayCompleted = null;

    /**
     * Optional. Service message: video chat scheduled
     *
     * @var VideoChatScheduled|null
     */
    protected ?VideoChatScheduled $videoChatScheduled = null;

    /**
     * Optional. Service message: video chat started
     *
     * @var VideoChatStarted|null
     */
    protected ?VideoChatStarted $videoChatStarted = null;

    /**
     * Optional. Service message: video chat ended
     *
     * @var VideoChatEnded|null
     */
    protected ?VideoChatEnded $videoChatEnded = null;

    /**
     * Optional. Service message: new participants invited to a video chat
     *
     * @var VideoChatParticipantsInvited|null
     */
    protected ?VideoChatParticipantsInvited $videoChatParticipantsInvited = null;

    /**
     * Optional. Service message: data sent by a Web App
     *
     * @var WebAppData|null
     */
    protected ?WebAppData $webAppData = null;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as
     * ordinary url buttons
     *
     * @var InlineKeyboardMarkup|null
     */
    protected ?InlineKeyboardMarkup $replyMarkup = null;

    /**
     * @return int
     *
     * @see $messageId
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     *
     * @see $messageId
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return int|null
     *
     * @see $messageThreadId
     */
    public function getMessageThreadId(): ?int
    {
        return $this->messageThreadId;
    }

    /**
     * @param int|null $messageThreadId
     * @return void
     *
     * @see $messageThreadId
     */
    public function setMessageThreadId(?int $messageThreadId): void
    {
        $this->messageThreadId = $messageThreadId;
    }

    /**
     * @return User|null
     *
     * @see $from
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param User|null $from
     * @return void
     *
     * @see $from
     */
    public function setFrom(?User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Chat|null
     *
     * @see $senderChat
     */
    public function getSenderChat(): ?Chat
    {
        return $this->senderChat;
    }

    /**
     * @param Chat|null $senderChat
     * @return void
     *
     * @see $senderChat
     */
    public function setSenderChat(?Chat $senderChat): void
    {
        $this->senderChat = $senderChat;
    }

    /**
     * @return int|null
     *
     * @see $senderBoostCount
     */
    public function getSenderBoostCount(): ?int
    {
        return $this->senderBoostCount;
    }

    /**
     * @param int|null $senderBoostCount
     *
     * @see $senderBoostCount
     */
    public function setSenderBoostCount(?int $senderBoostCount): void
    {
        $this->senderBoostCount = $senderBoostCount;
    }

    /**
     * @return User|null
     *
     * @see $senderBusinessBot
     */
    public function getSenderBusinessBot(): ?User
    {
        return $this->senderBusinessBot;
    }

    /**
     * @param User|null $senderBusinessBot
     *
     * @see $senderBusinessBot
     */
    public function setSenderBusinessBot(?User $senderBusinessBot): void
    {
        $this->senderBusinessBot = $senderBusinessBot;
    }

    /**
     * @return int
     *
     * @see $date
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     *
     * @see $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     *
     * @see $businessConnectionId
     */
    public function getBusinessConnectionId(): ?string
    {
        return $this->businessConnectionId;
    }

    /**
     * @param string|null $businessConnectionId
     *
     * @see $businessConnectionId
     */
    public function setBusinessConnectionId(?string $businessConnectionId): void
    {
        $this->businessConnectionId = $businessConnectionId;
    }

    /**
     * @return Chat
     *
     * @see $chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     *
     * @see $chat
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return MessageOrigin|null
     *
     * @see $forwardOrigin
     */
    public function getForwardOrigin(): ?MessageOrigin
    {
        return $this->forwardOrigin;
    }

    /**
     * @param MessageOrigin|null $forwardOrigin
     *
     * @see $forwardOrigin
     */
    public function setForwardOrigin(?MessageOrigin $forwardOrigin): void
    {
        $this->forwardOrigin = $forwardOrigin;
    }

    /**
     * @return bool|null
     *
     * @see $isTopicMessage
     */
    public function getIsTopicMessage(): ?bool
    {
        return $this->isTopicMessage;
    }

    /**
     * @param bool|null $isTopicMessage
     *
     * @see $isTopicMessage
     */
    public function setIsTopicMessage(?bool $isTopicMessage): void
    {
        $this->isTopicMessage = $isTopicMessage;
    }

    /**
     * @return bool|null
     *
     * @see $isAutomaticForward
     */
    public function getIsAutomaticForward(): ?bool
    {
        return $this->isAutomaticForward;
    }

    /**
     * @param bool|null $isAutomaticForward
     *
     * @see $isAutomaticForward
     */
    public function setIsAutomaticForward(?bool $isAutomaticForward): void
    {
        $this->isAutomaticForward = $isAutomaticForward;
    }

    /**
     * @return Message|null
     *
     * @see $replyToMessage
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param Message|null $replyToMessage
     *
     * @see $replyToMessage
     */
    public function setReplyToMessage(?Message $replyToMessage): void
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return ExternalReplyInfo|null
     *
     * @see $externalReply
     */
    public function getExternalReply(): ?ExternalReplyInfo
    {
        return $this->externalReply;
    }

    /**
     * @param ExternalReplyInfo|null $externalReply
     *
     * @see $externalReply
     */
    public function setExternalReply(?ExternalReplyInfo $externalReply): void
    {
        $this->externalReply = $externalReply;
    }

    /**
     * @return TextQuote|null
     *
     * @see $quote
     */
    public function getQuote(): ?TextQuote
    {
        return $this->quote;
    }

    /**
     * @param TextQuote|null $quote
     *
     * @see $quote
     */
    public function setQuote(?TextQuote $quote): void
    {
        $this->quote = $quote;
    }

    /**
     * @return Story|null
     *
     * @see $replyToStory
     */
    public function getReplyToStory(): ?Story
    {
        return $this->replyToStory;
    }

    /**
     * @param Story|null $replyToStory
     *
     * @see $replyToStory
     */
    public function setReplyToStory(?Story $replyToStory): void
    {
        $this->replyToStory = $replyToStory;
    }

    /**
     * @return User|null
     *
     * @see $viaBot
     */
    public function getViaBot(): ?User
    {
        return $this->viaBot;
    }

    /**
     * @param User|null $viaBot
     *
     * @see $viaBot
     */
    public function setViaBot(?User $viaBot): void
    {
        $this->viaBot = $viaBot;
    }

    /**
     * @return int|null
     *
     * @see $editDate
     */
    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    /**
     * @param int|null $editDate
     * @return void
     *
     * @see $editDate
     */
    public function setEditDate(?int $editDate): void
    {
        $this->editDate = $editDate;
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
     * @see $isFromOffline
     */
    public function getIsFromOffline(): ?bool
    {
        return $this->isFromOffline;
    }

    /**
     * @param bool|null $isFromOffline
     *
     * @see $isFromOffline
     */
    public function setIsFromOffline(?bool $isFromOffline): void
    {
        $this->isFromOffline = $isFromOffline;
    }

    /**
     * @return string|null
     *
     * @see $mediaGroupId
     */
    public function getMediaGroupId(): ?string
    {
        return $this->mediaGroupId;
    }

    /**
     * @param string|null $mediaGroupId
     *
     * @see $mediaGroupId
     */
    public function setMediaGroupId(?string $mediaGroupId): void
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return string|null
     *
     * @see $authorSignature
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    /**
     * @param string|null $authorSignature
     *
     * @see $authorSignature
     */
    public function setAuthorSignature(?string $authorSignature): void
    {
        $this->authorSignature = $authorSignature;
    }

    /**
     * @return string|null
     *
     * @see $text
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @see $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return MessageEntity[]|null
     *
     * @see $entities
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param ArrayOfMessageEntity|MessageEntity[]|null $entities
     *
     * @see $entities
     */
    public function setEntities(ArrayOfMessageEntity|array|null $entities): void
    {
        if ($entities instanceof ArrayOfMessageEntity) {
            $this->entities = (array) $entities;
        } else {
            $this->entities = $entities;
        }
    }

    /**
     * @return LinkPreviewOptions|null
     *
     * @see $linkPreviewOptions
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param LinkPreviewOptions|null $linkPreviewOptions
     *
     * @see $linkPreviewOptions
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $linkPreviewOptions): void
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
    }

    /**
     * @return string|null
     *
     * @see $effectId
     */
    public function getEffectId(): ?string
    {
        return $this->effectId;
    }

    /**
     * @param string|null $effectId
     *
     * @see $effectId
     */
    public function setEffectId(?string $effectId): void
    {
        $this->effectId = $effectId;
    }

    /**
     * @return Animation|null
     *
     * @see $animation
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     *
     * @see $animation
     */
    public function setAnimation(?Animation $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return Audio|null
     *
     * @see $audio
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     *
     * @see $audio
     */
    public function setAudio(?Audio $audio): void
    {
        $this->audio = $audio;
    }

    /**
     * @return Document|null
     *
     * @see $document
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     *
     * @see $document
     */
    public function setDocument(?Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return PhotoSize[]|null
     *
     * @see $photo
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @see $photo
     */
    public function setPhoto(?array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker|null
     *
     * @see $sticker
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     *
     * @see $sticker
     */
    public function setSticker(?Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Story|null
     *
     * @see $story
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     *
     * @see $story
     */
    public function setStory(?Story $story): void
    {
        $this->story = $story;
    }

    /**
     * @return Video|null
     *
     * @see $video
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     *
     * @see $video
     */
    public function setVideo(?Video $video): void
    {
        $this->video = $video;
    }

    /**
     * @return VideoNote|null
     *
     * @see $videoNote
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param VideoNote|null $videoNote
     *
     * @see $videoNote
     */
    public function setVideoNote(?VideoNote $videoNote): void
    {
        $this->videoNote = $videoNote;
    }

    /**
     * @return Voice|null
     *
     * @see $voice
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     *
     * @see $voice
     */
    public function setVoice(?Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return null|string
     *
     * @see $caption
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @see $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return MessageEntity[]|null
     *
     * @see $captionEntities
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param ArrayOfMessageEntity|MessageEntity[]|null $captionEntities
     *
     * @see $captionEntities
     */
    public function setCaptionEntities(ArrayOfMessageEntity|array|null $captionEntities): void
    {
        if ($captionEntities instanceof ArrayOfMessageEntity) {
            $this->captionEntities = (array) $captionEntities;
        } else {
            $this->captionEntities = $captionEntities;
        }
    }

    /**
     * @return bool|null
     *
     * @see $showCaptionAboveMedia
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->showCaptionAboveMedia;
    }

    /**
     * @param bool|null $showCaptionAboveMedia
     *
     * @see $showCaptionAboveMedia
     */
    public function setShowCaptionAboveMedia(?bool $showCaptionAboveMedia): void
    {
        $this->showCaptionAboveMedia = $showCaptionAboveMedia;
    }

    /**
     * @return bool|null
     *
     * @see $hasMediaSpoiler
     */
    public function getHasMediaSpoiler(): ?bool
    {
        return $this->hasMediaSpoiler;
    }

    /**
     * @param bool|null $hasMediaSpoiler
     *
     * @see $hasMediaSpoiler
     */
    public function setHasMediaSpoiler(?bool $hasMediaSpoiler): void
    {
        $this->hasMediaSpoiler = $hasMediaSpoiler;
    }

    /**
     * @return Contact|null
     *
     * @see $contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     *
     * @see $contact
     */
    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return Dice|null
     *
     * @see $dice
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     *
     * @see $dice
     */
    public function setDice(?Dice $dice): void
    {
        $this->dice = $dice;
    }

    /**
     * @return Game|null
     *
     * @see $game
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     *
     * @see $game
     */
    public function setGame(?Game $game): void
    {
        $this->game = $game;
    }

    /**
     * @return Poll|null
     *
     * @see $poll
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     *
     * @see $poll
     */
    public function setPoll(?Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * @return Venue|null
     *
     * @see $venue
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     *
     * @see $venue
     */
    public function setVenue(?Venue $venue): void
    {
        $this->venue = $venue;
    }

    /**
     * @return Location|null
     *
     * @see $location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @see $location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return User[]|null
     *
     * @see $newChatMembers
     */
    public function getNewChatMembers(): ?array
    {
        return $this->newChatMembers;
    }

    /**
     * @param User[]|null $newChatMembers
     * @return void
     *
     * @see $newChatMembers
     */
    public function setNewChatMembers(?array $newChatMembers): void
    {
        $this->newChatMembers = $newChatMembers;
    }

    /**
     * @return User|null
     *
     * @see $leftChatMember
     */
    public function getLeftChatMember(): ?User
    {
        return $this->leftChatMember;
    }

    /**
     * @param User $leftChatMember
     * @return void
     *
     * @see $leftChatMember
     */
    public function setLeftChatMember(User $leftChatMember): void
    {
        $this->leftChatMember = $leftChatMember;
    }

    /**
     * @return string|null
     *
     * @see $newChatTitle
     */
    public function getNewChatTitle(): ?string
    {
        return $this->newChatTitle;
    }

    /**
     * @param string|null $newChatTitle
     * @return void
     *
     * @see $newChatTitle
     */
    public function setNewChatTitle(?string $newChatTitle): void
    {
        $this->newChatTitle = $newChatTitle;
    }

    /**
     * @return PhotoSize[]|null
     *
     * @see $newChatPhoto
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSize[]|null $newChatPhoto
     * @return void
     *
     * @see $newChatPhoto
     */
    public function setNewChatPhoto(?array $newChatPhoto): void
    {
        $this->newChatPhoto = $newChatPhoto;
    }

    /**
     * @return bool|null
     *
     * @see $deleteChatPhoto
     */
    public function isDeleteChatPhoto(): ?bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool|null $deleteChatPhoto
     * @return void
     *
     * @see $deleteChatPhoto
     */
    public function setDeleteChatPhoto(?bool $deleteChatPhoto): void
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
    }

    /**
     * @return bool|null
     *
     * @see $groupChatCreated
     */
    public function isGroupChatCreated(): ?bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool|null $groupChatCreated
     * @return void
     *
     * @see $groupChatCreated
     */
    public function setGroupChatCreated(?bool $groupChatCreated): void
    {
        $this->groupChatCreated = $groupChatCreated;
    }

    /**
     * @return bool|null
     *
     * @see $supergroupChatCreated
     */
    public function isSupergroupChatCreated(): ?bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool|null $supergroupChatCreated
     * @return void
     *
     * @see $supergroupChatCreated
     */
    public function setSupergroupChatCreated(?bool $supergroupChatCreated): void
    {
        $this->supergroupChatCreated = $supergroupChatCreated;
    }

    /**
     * @return bool|null
     *
     * @see $channelChatCreated
     */
    public function isChannelChatCreated(): ?bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool|null $channelChatCreated
     * @return void
     *
     * @see $channelChatCreated
     */
    public function setChannelChatCreated(?bool $channelChatCreated): void
    {
        $this->channelChatCreated = $channelChatCreated;
    }

    /**
     * @return MessageAutoDeleteTimerChanged|null
     *
     * @see $messageAutoDeleteTimerChanged
     */
    public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
    {
        return $this->messageAutoDeleteTimerChanged;
    }

    /**
     * @param MessageAutoDeleteTimerChanged|null $messageAutoDeleteTimerChanged
     * @return void
     *
     * @see $messageAutoDeleteTimerChanged
     */
    public function setMessageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged): void
    {
        $this->messageAutoDeleteTimerChanged = $messageAutoDeleteTimerChanged;
    }

    /**
     * @return int|null
     *
     * @see $migrateToChatId
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int|null $migrateToChatId
     * @return void
     *
     * @see $migrateToChatId
     */
    public function setMigrateToChatId(?int $migrateToChatId): void
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int|null
     *
     * @see $migrateFromChatId
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int|null $migrateFromChatId
     * @return void
     *
     * @see $migrateFromChatId
     */
    public function setMigrateFromChatId(?int $migrateFromChatId): void
    {
        $this->migrateFromChatId = $migrateFromChatId;
    }

    /**
     * @return Message|InaccessibleMessage|null
     *
     * @see $pinnedMessage
     */
    public function getPinnedMessage(): Message|InaccessibleMessage|null
    {
        return $this->pinnedMessage;
    }

    /**
     * @param Message|InaccessibleMessage|null $pinnedMessage
     * @return void
     *
     * @see $pinnedMessage
     */
    public function setPinnedMessage(Message|InaccessibleMessage|null $pinnedMessage): void
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return Invoice|null
     *
     * @see $invoice
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     * @return void
     *
     * @see $invoice
     */
    public function setInvoice(?Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return SuccessfulPayment|null
     *
     * @see $successfulPayment
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @param SuccessfulPayment|null $successfulPayment
     * @return void
     *
     * @see $successfulPayment
     */
    public function setSuccessfulPayment(?SuccessfulPayment $successfulPayment): void
    {
        $this->successfulPayment = $successfulPayment;
    }

    /**
     * @return RefundedPayment|null
     *
     * @see $refundedPayment
     */
    public function getRefundedPayment(): ?RefundedPayment
    {
        return $this->refundedPayment;
    }

    /**
     * @param RefundedPayment|null $refundedPayment
     * @return void
     *
     * @see $refundedPayment
     */
    public function setRefundedPayment(?RefundedPayment $refundedPayment): void
    {
        $this->refundedPayment = $refundedPayment;
    }

    /**
     * @return UsersShared|null
     *
     * @see $usersShared
     */
    public function getUsersShared(): ?UsersShared
    {
        return $this->usersShared;
    }

    /**
     * @param UsersShared|null $usersShared
     * @return void
     *
     * @see $usersShared
     */
    public function setUsersShared(?UsersShared $usersShared): void
    {
        $this->usersShared = $usersShared;
    }

    /**
     * @return ChatShared|null
     *
     * @see $chatShared
     */
    public function getChatShared(): ?ChatShared
    {
        return $this->chatShared;
    }

    /**
     * @param ChatShared|null $chatShared
     * @return void
     *
     * @see $chatShared
     */
    public function setChatShared(?ChatShared $chatShared): void
    {
        $this->chatShared = $chatShared;
    }

    /**
     * @return null|string
     *
     * @see $connectedWebsite
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     * @return void
     *
     * @see $connectedWebsite
     */
    public function setConnectedWebsite(string $connectedWebsite): void
    {
        $this->connectedWebsite = $connectedWebsite;
    }

    /**
     * @return WriteAccessAllowed|null
     *
     * @see $writeAccessAllowed
     */
    public function getWriteAccessAllowed(): ?WriteAccessAllowed
    {
        return $this->writeAccessAllowed;
    }

    /**
     * @param WriteAccessAllowed|null $writeAccessAllowed
     * @return void
     *
     * @see $writeAccessAllowed
     */
    public function setWriteAccessAllowed(?WriteAccessAllowed $writeAccessAllowed): void
    {
        $this->writeAccessAllowed = $writeAccessAllowed;
    }

    /**
     * @return ProximityAlertTriggered|null
     *
     * @see $proximityAlertTriggered
     */
    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximityAlertTriggered;
    }

    /**
     * @param ProximityAlertTriggered|null $proximityAlertTriggered
     * @return void
     *
     * @see $proximityAlertTriggered
     */
    public function setProximityAlertTriggered(?ProximityAlertTriggered $proximityAlertTriggered): void
    {
        $this->proximityAlertTriggered = $proximityAlertTriggered;
    }

    /**
     * @return ChatBoostAdded|null
     *
     * @see $boostAdded
     */
    public function getBoostAdded(): ?ChatBoostAdded
    {
        return $this->boostAdded;
    }

    /**
     * @param ChatBoostAdded|null $boostAdded
     * @return void
     *
     * @see $boostAdded
     */
    public function setBoostAdded(?ChatBoostAdded $boostAdded): void
    {
        $this->boostAdded = $boostAdded;
    }

    /**
     * @return ChatBackground|null
     *
     * @see $chatBackgroundSet
     */
    public function getChatBackgroundSet(): ?ChatBackground
    {
        return $this->chatBackgroundSet;
    }

    /**
     * @param ChatBackground|null $chatBackgroundSet
     * @return void
     *
     * @see $chatBackgroundSet
     */
    public function setChatBackgroundSet(?ChatBackground $chatBackgroundSet): void
    {
        $this->chatBackgroundSet = $chatBackgroundSet;
    }

    /**
     * @return ForumTopicCreated|null
     *
     * @see $forumTopicCreated
     */
    public function getForumTopicCreated(): ?ForumTopicCreated
    {
        return $this->forumTopicCreated;
    }

    /**
     * @param ForumTopicCreated|null $forumTopicCreated
     * @return void
     *
     * @see $forumTopicCreated
     */
    public function setForumTopicCreated(?ForumTopicCreated $forumTopicCreated): void
    {
        $this->forumTopicCreated = $forumTopicCreated;
    }

    /**
     * @return ForumTopicEdited|null
     *
     * @see $forumTopicEdited
     */
    public function getForumTopicEdited(): ?ForumTopicEdited
    {
        return $this->forumTopicEdited;
    }

    /**
     * @param ForumTopicEdited|null $forumTopicEdited
     * @return void
     *
     * @see $forumTopicEdited
     */
    public function setForumTopicEdited(?ForumTopicEdited $forumTopicEdited): void
    {
        $this->forumTopicEdited = $forumTopicEdited;
    }

    /**
     * @return ForumTopicClosed|null
     *
     * @see $forumTopicClosed
     */
    public function getForumTopicClosed(): ?ForumTopicClosed
    {
        return $this->forumTopicClosed;
    }

    /**
     * @param ForumTopicClosed|null $forumTopicClosed
     * @return void
     *
     * @see $forumTopicClosed
     */
    public function setForumTopicClosed(?ForumTopicClosed $forumTopicClosed): void
    {
        $this->forumTopicClosed = $forumTopicClosed;
    }

    /**
     * @return ForumTopicReopened|null
     *
     * @see $forumTopicReopened
     */
    public function getForumTopicReopened(): ?ForumTopicReopened
    {
        return $this->forumTopicReopened;
    }

    /**
     * @param ForumTopicReopened|null $forumTopicReopened
     * @return void
     *
     * @see $forumTopicReopened
     */
    public function setForumTopicReopened(?ForumTopicReopened $forumTopicReopened): void
    {
        $this->forumTopicReopened = $forumTopicReopened;
    }

    /**
     * @return GeneralForumTopicHidden|null
     *
     * @see $generalForumTopicHidden
     */
    public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
    {
        return $this->generalForumTopicHidden;
    }

    /**
     * @param GeneralForumTopicHidden|null $generalForumTopicHidden
     * @return void
     *
     * @see $generalForumTopicHidden
     */
    public function setGeneralForumTopicHidden(?GeneralForumTopicHidden $generalForumTopicHidden): void
    {
        $this->generalForumTopicHidden = $generalForumTopicHidden;
    }

    /**
     * @return GeneralForumTopicUnhidden|null
     *
     * @see $generalForumTopicUnhidden
     */
    public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
    {
        return $this->generalForumTopicUnhidden;
    }

    /**
     * @param GeneralForumTopicUnhidden|null $generalForumTopicUnhidden
     * @return void
     *
     * @see $generalForumTopicUnhidden
     */
    public function setGeneralForumTopicUnhidden(?GeneralForumTopicUnhidden $generalForumTopicUnhidden): void
    {
        $this->generalForumTopicUnhidden = $generalForumTopicUnhidden;
    }

    /**
     * @return GiveawayCreated|null
     *
     * @see $giveawayCreated
     */
    public function getGiveawayCreated(): ?GiveawayCreated
    {
        return $this->giveawayCreated;
    }

    /**
     * @param GiveawayCreated|null $giveawayCreated
     * @return void
     *
     * @see $giveawayCreated
     */
    public function setGiveawayCreated(?GiveawayCreated $giveawayCreated): void
    {
        $this->giveawayCreated = $giveawayCreated;
    }

    /**
     * @return Giveaway|null
     *
     * @see $giveaway
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     * @return void
     *
     * @see $giveaway
     */
    public function setGiveaway(?Giveaway $giveaway): void
    {
        $this->giveaway = $giveaway;
    }

    /**
     * @return GiveawayWinners|null
     *
     * @see $giveawayWinners
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveawayWinners;
    }

    /**
     * @param GiveawayWinners|null $giveawayWinners
     * @return void
     *
     * @see $giveawayWinners
     */
    public function setGiveawayWinners(?GiveawayWinners $giveawayWinners): void
    {
        $this->giveawayWinners = $giveawayWinners;
    }

    /**
     * @return GiveawayCompleted|null
     *
     * @see $giveawayCompleted
     */
    public function getGiveawayCompleted(): ?GiveawayCompleted
    {
        return $this->giveawayCompleted;
    }

    /**
     * @param GiveawayCompleted|null $giveawayCompleted
     * @return void
     *
     * @see $giveawayCompleted
     */
    public function setGiveawayCompleted(?GiveawayCompleted $giveawayCompleted): void
    {
        $this->giveawayCompleted = $giveawayCompleted;
    }

    /**
     * @return VideoChatScheduled|null
     *
     * @see $videoChatScheduled
     */
    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->videoChatScheduled;
    }

    /**
     * @param VideoChatScheduled|null $videoChatScheduled
     * @return void
     *
     * @see $videoChatScheduled
     */
    public function setVideoChatScheduled(?VideoChatScheduled $videoChatScheduled): void
    {
        $this->videoChatScheduled = $videoChatScheduled;
    }

    /**
     * @return VideoChatStarted|null
     *
     * @see $videoChatStarted
     */
    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->videoChatStarted;
    }

    /**
     * @param VideoChatStarted|null $videoChatStarted
     * @return void
     *
     * @see $videoChatStarted
     */
    public function setVideoChatStarted(?VideoChatStarted $videoChatStarted): void
    {
        $this->videoChatStarted = $videoChatStarted;
    }

    /**
     * @return VideoChatEnded|null
     *
     * @see $videoChatEnded
     */
    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->videoChatEnded;
    }

    /**
     * @param VideoChatEnded|null $videoChatEnded
     * @return void
     *
     * @see $videoChatEnded
     */
    public function setVideoChatEnded(?VideoChatEnded $videoChatEnded): void
    {
        $this->videoChatEnded = $videoChatEnded;
    }

    /**
     * @return VideoChatParticipantsInvited|null
     *
     * @see $videoChatParticipantsInvited
     */
    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->videoChatParticipantsInvited;
    }

    /**
     * @param VideoChatParticipantsInvited|null $videoChatParticipantsInvited
     * @return void
     *
     * @see $videoChatParticipantsInvited
     */
    public function setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $videoChatParticipantsInvited): void
    {
        $this->videoChatParticipantsInvited = $videoChatParticipantsInvited;
    }

    /**
     * @return WebAppData|null
     *
     * @see $webAppData
     */
    public function getWebAppData(): ?WebAppData
    {
        return $this->webAppData;
    }

    /**
     * @param WebAppData|null $webAppData
     * @return void
     *
     * @see $webAppData
     */
    public function setWebAppData(?WebAppData $webAppData): void
    {
        $this->webAppData = $webAppData;
    }

    /**
     * @return InlineKeyboardMarkup|null
     *
     * @see $replyMarkup
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     * @return void
     *
     * @see $replyMarkup
     */
    public function setReplyMarkup(InlineKeyboardMarkup $replyMarkup): void
    {
        $this->replyMarkup = $replyMarkup;
    }
}
