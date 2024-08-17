<?php

namespace TelegramBotSDK\Api\Service;

use CURLFile;
use CURLStringFile;
use TelegramBotSDK\Enum\ParseMode;
use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ArrayOfInputPollOption;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\ArrayOfMessages;
use TelegramBotSDK\Types\ArrayOfReactionType;
use TelegramBotSDK\Types\File;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\InputMedia\ArrayOfInputMedia;
use TelegramBotSDK\Types\LinkPreviewOptions;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\MessageId;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;
use TelegramBotSDK\Types\ReplyParameters;

class ContentService extends BaseService
{
    /**
     * Use this method to send text messages.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendmessage
     *
     * @param float|int|string $chatId Unique identifier for the target chat or username of the target channel (in the
     *                                 format @channelusername)
     * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
     * @param ParseMode|null $parseMode Mode for parsing entities in the message text.
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup Additional
     *                                                                                                  interface
     *                                                                                                  options. A object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or
     *                                                                                                  to force a reply from the user
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the
     *                                          message will be sent
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     *                                     private chats only
     * @param ArrayOfMessageEntity|null $entities list of special entities that appear in message text, which can be
     *                                            specified instead of parse_mode
     * @param LinkPreviewOptions|null $linkPreviewOptions Link preview generation options for the message.
     * @param ReplyParameters|null $replyParameters Description of the message to reply to
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendMessage(
        float|int|string $chatId,
        string $text,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ArrayOfMessageEntity $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'parse_mode' => $parseMode?->value,
            'entities' => $entities?->toJson(),
            'link_preview_options' => $linkPreviewOptions?->toJson(),
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to forward messages of any kind. Service messages can't be forwarded.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#forwardmessage
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel
     *                               username in the format @channelusername)
     * @param string $messageId Message identifier in the chat specified in from_chat_id
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the forwarded message from forwarding and saving
     *
     * @return Message
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function forwardMessage(
        int|string $chatId,
        int|string $fromChatId,
        string $messageId,
        ?int $messageThreadId = null,
        bool $disableNotification = false,
        bool $protectContent = false,
    ): Message {
        return Message::fromResponse($this->call('forwardMessage', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
        ]));
    }

    /**
     * Use this method to forward multiple messages of any kind.
     * If some of the specified messages can't be found or forwarded, they are skipped.
     * Service messages and messages with protected content can't be forwarded.
     * Album grouping is kept for forwarded messages.
     * On success, an array of MessageId of the sent messages is returned.
     *
     * @see https://core.telegram.org/bots/api#forwardmessages
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original messages were sent (or channel
     *                               username in the format @channelusername)
     * @param int[] $messageIds A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to
     *                          forward. The identifiers must be specified in a strictly increasing order.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param bool $disableNotification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the forwarded messages from forwarding and saving
     *
     * @return int[]
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function forwardMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        ?int $messageThreadId = null,
        bool $disableNotification = false,
        bool $protectContent = false,
    ): array {
        return $this->call('forwardMessages', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
        ]);
    }

    /**
     * Use this method to copy messages of any kind.
     * Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't
     * be copied.
     * A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The
     * method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original
     * message.
     * Returns the MessageId of the sent message on success.
     *
     * @see https://core.telegram.org/bots/api#copymessage
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel
     *                               username in the format @channelusername)
     * @param int $messageId Message identifier in the chat specified in from_chat_id
     * @param string|null $caption New caption for media, 0-1024 characters after entities parsing. If not specified,
     *                             the original caption is kept
     * @param ParseMode|null $parseMode Mode for parsing entities in the new caption. See formatting options for more
     *                                  details.
     * @param ArrayOfMessageEntity|null $captionEntities A list of special entities that appear in the new caption,
     *                                                   which can be specified instead of parse_mode
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup Additional
     *                                                                                                  interface
     *                                                                                                  options. A object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or
     *                                                                                                  to force a reply from the user
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param bool $showCaptionAboveMedia Pass True, if the caption must be shown above the message media. Ignored
     *                                    if a new caption isn't specified.
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     *
     * @return MessageId
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function copyMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        bool $disableNotification = false,
        ?int $messageThreadId = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup = null,
        bool $protectContent = false,
        bool $showCaptionAboveMedia = false,
        ?ReplyParameters $replyParameters = null,
    ): MessageId {
        return MessageId::fromResponse($this->call('copyMessage', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities,
            'disable_notification' => $disableNotification,
            'message_thread_id' => $messageThreadId,
            'reply_markup' => $replyMarkup?->toJson(),
            'protect_content' => $protectContent,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'reply_parameters' => $replyParameters?->toJson(),
        ]));
    }

    /**
     * Use this method to copy messages of any kind.
     * If some of the specified messages can't be found or copied, they are skipped.
     * Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't
     * be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The
     * method is analogous to the method forwardMessages, but the copied messages don't have a link to the original
     * message. Album grouping is kept for copied messages.
     * On success, an array of MessageId of the sent messages is returned.
     *
     * @see https://core.telegram.org/bots/api#copymessage
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original messages were sent (or channel
     *                               username in the format @channelusername)
     * @param array $messageIds list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers
     *                          must be specified in a strictly increasing order.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param bool $removeCaption
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     *
     * @return MessageId
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function copyMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        bool $disableNotification = false,
        bool $protectContent = false,
        bool $removeCaption = false,
        ?int $messageThreadId = null,
    ): MessageId {
        return MessageId::fromResponse($this->call('copyMessages', [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_ids' => json_encode($messageIds),
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'remove_caption' => $removeCaption,
        ]));
    }

    /**
     * Use this method to send photos.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendphoto
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $photo Photo to send. Pass a file_id as String to send a photo that exists on the
     *                               Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a
     *                               photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in
     *                               size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most
     *                               20.
     * @param string|null $caption Photo caption (may also be used when resending photos by file_id), 0-1024 characters
     *                             after entities parsing
     * @param ParseMode|null $parseMode Mode for parsing entities in the photo caption.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param bool $showCaptionAboveMedia Pass True, if the caption must be shown above the message media. Ignored
     * @param bool $hasSpoiler Pass True if the photo needs to be covered with a spoiler animation
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the
     *                                          message will be sent
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     * @param ArrayOfMessageEntity|null $captionEntities A list of special entities that appear in the new caption,
     *                                                   which can be specified instead of parse_mode
     *                                                   if a new caption isn't specified.
     *                                                   private chats only
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup Additional
     *                                                                                                  interface
     *                                                                                                  options. A object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or
     *                                                                                                  to force a reply from the user
     *
     * @return Message
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function sendPhoto(
        int|string $chatId,
        CURLFile|string $photo,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        bool $showCaptionAboveMedia = false,
        bool $hasSpoiler = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo,
            'caption' => $caption,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities?->toJson(),
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send audio files,
     * if you want Telegram clients to display them in the music player.
     * Your audio must be in the .MP3 or .M4A format.
     * On success, the sent Message is returned.
     * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     *
     * For backward compatibility, when the fields title and performer are both empty
     * and the mime-type of the file to be sent is not audio/mpeg, the file will be sent as a playable voice message.
     * For this to work, the audio must be in an .ogg file encoded with OPUS.
     * This behavior will be phased out in the future.
     * For sending voice messages, use the sendVoice method instead.
     *
     * @see https://core.telegram.org/bots/api#sendaudio
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $audio
     * @param int|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param string|null $caption
     * @param ParseMode|null $parseMode
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param CURLFile|CURLStringFile|string|null $thumbnail
     * @param ReplyParameters|null $replyParameters
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendAudio(
        int|string $chatId,
        CURLFile|string $audio,
        ?int $duration = null,
        ?string $performer = null,
        ?string $title = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        CURLFile|CURLStringFile|string|null $thumbnail = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendAudio', [
            'chat_id' => $chatId,
            'audio' => $audio,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send general files.
     * On success, the sent Message is returned.
     * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @see https://core.telegram.org/bots/api#senddocument
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|CURLStringFile|string $document
     * @param string|null $caption
     * @param ParseMode|null $parseMode
     * @param bool $disableContentTypeDetection
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param CURLFile|string|CURLStringFile|null $thumbnail
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ReplyParameters|null $replyParameters
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendDocument(
        int|string $chatId,
        CURLFile|CURLStringFile|string $document,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableContentTypeDetection = false,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        CURLFile|CURLStringFile|string|null $thumbnail = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendDocument', [
            'chat_id' => $chatId,
            'document' => $document,
            'thumbnail' => $thumbnail,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities,
            'disable_content_type_detection' => $disableContentTypeDetection,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send video files,
     * Telegram clients support MPEG4 videos (other formats may be sent as Document)
     * On success, the sent Message is returned.
     * Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @see https://core.telegram.org/bots/api#sendvideo
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $video
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param CURLFile|string|CURLStringFile|null $thumbnail
     * @param string|null $caption
     * @param ParseMode|null $parseMode
     * @param bool $supportsStreaming Pass True, if the uploaded video is suitable for streaming
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param bool $showCaptionAboveMedia
     * @param bool $hasSpoiler
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendVideo(
        int|string $chatId,
        CURLFile|string $video,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        CURLFile|CURLStringFile|string $thumbnail = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $supportsStreaming = false,
        bool $disableNotification = false,
        bool $protectContent = false,
        bool $showCaptionAboveMedia = false,
        bool $hasSpoiler = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendVideo', [
            'chat_id' => $chatId,
            'video' => $video,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumbnail' => $thumbnail,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities?->toJson(),
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'supports_streaming' => $supportsStreaming,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound),
     * On success, the sent Message is returned.
     * Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @see https://core.telegram.org/bots/api#sendanimation
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $animation
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param CURLFile|string|CURLStringFile|null $thumbnail
     * @param string|null $caption
     * @param ParseMode|null $parseMode ,
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param bool $showCaptionAboveMedia
     * @param bool $hasSpoiler
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendAnimation(
        int|string $chatId,
        CURLFile|string $animation,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        CURLFile|CURLStringFile|string $thumbnail = null,
        string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        bool $showCaptionAboveMedia = false,
        bool $hasSpoiler = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendAnimation', [
            'chat_id' => $chatId,
            'animation' => $animation,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumbnail' => $thumbnail,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities?->toJson(),
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send audio files,
     * if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format
     * (other formats may be sent as Audio or Document).
     * On success, the sent Message is returned.
     * Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @see https://core.telegram.org/bots/api#sendvoice
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $voice
     * @param int|null $duration
     * @param string|null $caption Voice message caption, 0-1024 characters after entities parsing
     * @param ParseMode|null $parseMode
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendVoice(
        int|string $chatId,
        CURLFile|string $voice,
        ?int $duration = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendVoice', [
            'chat_id' => $chatId,
            'voice' => $voice,
            'duration' => $duration,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities?->toJson(),
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long.
     * Use this method to send video messages.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendvideonote
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $videoNote
     * @param int|null $duration
     * @param int|null $length
     * @param CURLFile|CURLStringFile|string|null $thumbnail
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendVideoNote(
        int|string $chatId,
        CURLFile|string $videoNote,
        ?int $duration = null,
        ?int $length = null,
        CURLFile|CURLStringFile|string $thumbnail = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendVideoNote', [
            'chat_id' => $chatId,
            'video_note' => $videoNote,
            'duration' => $duration,
            'length' => $length,
            'thumbnail' => $thumbnail,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send paid media to channel chats.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendpaidmedia
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param int $starCount
     * @param ArrayOfInputMedia $media
     * @param string|null $caption
     * @param ParseMode|null $parseMode
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param bool $showCaptionAboveMedia
     * @param ReplyParameters|null $replyParameters
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendPaidMedia(
        int|string $chatId,
        int $starCount,
        ArrayOfInputMedia $media,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        bool $showCaptionAboveMedia = false,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendPaidMedia', [
            'chat_id' => $chatId,
            'star_count' => $starCount,
            'media' => $media,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities?->toJson(),
            'show_caption_above_media' => $showCaptionAboveMedia,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send a group of photos or videos as an album.
     * On success, the sent \TelegramBotSDK\Types\Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendmediagroup
     *
     * @param int|string $chatId
     * @param ArrayOfInputMedia $media
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     *
     * @return Message[]
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendMediaGroup(
        int|string $chatId,
        ArrayOfInputMedia $media,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
    ): array {
        return ArrayOfMessages::fromResponse($this->call('sendMediaGroup', [
            'chat_id' => $chatId,
            'media' => $media->toJson(),
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => is_null($replyParameters) ? $replyParameters : $replyParameters->toJson(),
        ]));
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendlocation
     *
     * @param int|string $chatId
     * @param float $latitude
     * @param float $longitude
     * @param float|null $horizontalAccuracy
     * @param int|null $livePeriod
     * @param int|null $heading
     * @param int|null $proximityAlertRadius
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendLocation(
        int|string $chatId,
        float $latitude,
        float $longitude,
        ?float $horizontalAccuracy = null,
        ?int $livePeriod = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendLocation', [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'horizontal_accuracy' => $horizontalAccuracy,
            'live_period' => $livePeriod,
            'heading' => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send information about a venue.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendvenue
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     * @param string|null $foursquareType
     * @param string|null $googlePlaceId
     * @param string|null $googlePlaceType
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendVenue(
        int|string $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendVenue', [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquareId,
            'foursquare_type' => $foursquareType,
            'google_place_id' => $googlePlaceId,
            'google_place_type' => $googlePlaceType,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send phone contacts.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendcontact
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     * @param string|null $vcard
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendContact(
        int|string $chatId,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vcard = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendContact', [
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'vcard' => $vcard,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send a native poll. A native poll can't be sent to a private chat.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendpoll
     *
     * @param int|string $chatId
     * @param string $question Poll question, 1-255 characters
     * @param ArrayOfInputPollOption $options
     * @param bool $isAnonymous
     * @param bool $allowsMultipleAnswers True, if the poll allows multiple answers,
     *                                    ignored for polls in quiz mode
     * @param bool $isClosed Pass True, if the poll needs to be immediately closed. This can be useful for poll
     *                       preview.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent
     * @param int|null $correctOptionId 0-based identifier of the correct answer option, required for polls in quiz
     *                                  mode
     * @param int|null $openPeriod
     * @param int|null $closeDate
     * @param int|null $messageThreadId
     * @param string|null $type Poll type, “quiz” or “regular”, defaults to “regular”
     * @param string|null $explanation
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ParseMode|null $questionParseMode
     * @param ParseMode|null $explanationParseMode
     * @param ReplyParameters|null $replyParameters
     * @param ArrayOfMessageEntity|null $questionEntities
     * @param ArrayOfMessageEntity|null $explanationEntities
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendPoll(
        int|string $chatId,
        string $question,
        ArrayOfInputPollOption $options,
        bool $isAnonymous = true,
        bool $allowsMultipleAnswers = false,
        bool $isClosed = false,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $correctOptionId = null,
        ?int $openPeriod = null,
        ?int $closeDate = null,
        ?int $messageThreadId = null,
        ?string $type = null,
        ?string $explanation = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ParseMode $questionParseMode = null,
        ?ParseMode $explanationParseMode = null,
        ?ReplyParameters $replyParameters = null,
        ?ArrayOfMessageEntity $questionEntities = null,
        ?ArrayOfMessageEntity $explanationEntities = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendPoll', [
            'chat_id' => $chatId,
            'question' => $question,
            'question_parse_mode' => $questionParseMode?->value,
            'question_entities' => $questionEntities,
            'options' => $options->toJson(),
            'is_anonymous' => $isAnonymous,
            'type' => $type,
            'allows_multiple_answers' => $allowsMultipleAnswers,
            'correct_option_id' => $correctOptionId,
            'explanation' => $explanation,
            'explanation_parse_mode' => $explanationParseMode?->value,
            'explanation_entities' => $explanationEntities,
            'open_period' => $openPeriod,
            'close_date' => $closeDate,
            'is_closed' => $isClosed,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to send a dice, which will have a random value from 1 to 6.
     * On success, the sent Message is returned. (Yes, we're aware of the “proper” singular of die.
     * But it's awkward, and we decided to help it change. One dice at a time!)
     *
     * @see https://core.telegram.org/bots/api#senddice
     *
     * @param int|string $chatId
     * @param string $emoji Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”,
     *                      “🏀”, “⚽”, “🎳”, or “🎰”. Dice can have values 1-6 for “🎲”, “🎯” and “🎳”, values 1-5 for
     *                      “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
     * @param bool $disableNotification
     * @param bool $protectContent
     * @param int|null $messageThreadId
     * @param string|null $businessConnectionId
     * @param string|null $messageEffectId
     * @param ReplyParameters|null $replyParameters
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendDice(
        int|string $chatId,
        string $emoji,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendDice', [
            'chat_id' => $chatId,
            'emoji' => $emoji,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * The status is set for 5 seconds or less (when a message arrives from your bot,
     * Telegram clients clear its typing status).
     *
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to
     * arrive.
     *
     * @see https://core.telegram.org/bots/api#sendchataction
     *
     * @param int $chatId
     * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive:
     *                       typing for text messages, upload_photo for photos, record_video or upload_video for
     *                       videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for
     *                       stickers, find_location for location data, record_video_note or upload_video_note for video notes.
     * @param string|null $businessConnectionId
     * @param int|null $messageThreadId
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function sendChatAction(
        int $chatId,
        string $action,
        ?string $businessConnectionId = null,
        ?int $messageThreadId = null,
    ): bool {
        return $this->call('sendChatAction', [
            'chat_id' => $chatId,
            'action' => $action,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * Use this method to change the chosen reactions on a message.
     * Service messages can't be reacted to.
     * Automatically forwarded messages from a channel to its discussion group have the same available reactions as
     * messages in the channel.
     *
     * @see https://core.telegram.org/bots/api#setmessagereaction
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param ArrayOfReactionType|null $reaction A list of reaction types to set on the message.
     * @param bool $isBig the reaction with a big animation
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMessageReaction(
        int|string $chatId,
        int $messageId,
        ?ArrayOfReactionType $reaction,
        bool $isBig = false,
    ): bool {
        return $this->call('setMessageReaction', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reaction' => $reaction?->toJson(),
            'is_big' => $isBig,
        ]);
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards.
     * The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
     *
     * @see https://core.telegram.org/bots/api#answercallbackquery
     *
     * @param string $callbackQueryId
     * @param string|null $text
     * @param bool $showAlert
     * @param string|null $url
     * @param int $cacheTime
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function answerCallbackQuery(
        string $callbackQueryId,
        string $text = null,
        bool $showAlert = false,
        string $url = null,
        int $cacheTime = 0,
    ): bool {
        return $this->call('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
            'url' => $url,
            'cache_time' => $cacheTime,
        ]);
    }

    /**
     * Get file contents via cURL
     *
     * @param string $fileId
     * @return string
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function downloadFile(string $fileId): string
    {
        $file = $this->getFile($fileId);
        if (!$path = $file->getFilePath()) {
            throw new Exception('Empty file_path property');
        }
        if (!$this->fileEndpoint) {
            return file_get_contents($path);
        }

        return $this->httpClient->download($this->fileEndpoint . '/' . $path);
    }

    /**
     * Use this method to get basic info about a file and prepare it for downloading.
     * For the moment, bots can download files of up to 20MB in size.
     * On success, a File object is returned.
     * The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>,
     * where <file_path> is taken from the response.
     * It is guaranteed that the link will be valid for at least 1 hour.
     * When the link expires, a new one can be requested by calling getFile again.
     *
     * @see https://core.telegram.org/bots/api#getfile
     *
     * @param string $fileId
     *
     * @return File
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getFile(string $fileId): File
    {
        return File::fromResponse($this->call('getFile', ['file_id' => $fileId]));
    }
}
