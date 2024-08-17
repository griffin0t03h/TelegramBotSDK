<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Enum\ParseMode;
use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\InputMedia\InputMedia;
use TelegramBotSDK\Types\LinkPreviewOptions;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\Poll;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;

class UpdateMessageService extends BaseService
{
    /**
     * Use this method to edit text and game messages.
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is
     * returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can
     * only be edited within 48 hours from the time they were sent.
     *
     * @see https://core.telegram.org/bots/api#editmessagetext
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param string $text
     * @param ParseMode|null $parseMode
     * @param string|null $businessConnectionId
     * @param ArrayOfMessageEntity|null $entities
     * @param LinkPreviewOptions|null $linkPreviewOptions
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message|true
     *
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editMessageText(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        string $text,
        ?ParseMode $parseMode = null,
        ?string $businessConnectionId = null,
        ?ArrayOfMessageEntity $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('editMessageText', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'text' => $text,
            'parse_mode' => $parseMode?->value,
            'business_connection_id' => $businessConnectionId,
            'entities' => $entities?->toJson(),
            'link_preview_options' => $linkPreviewOptions?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit captions of messages.
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is
     * returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can
     * only be edited within 48 hours from the time they were sent.
     *
     * @see https://core.telegram.org/bots/api#editmessagecaption
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param string|null $caption
     * @param ParseMode|null $parseMode
     * @param ArrayOfMessageEntity|null $captionEntities
     * @param string|null $businessConnectionId
     * @param bool $showCaptionAboveMedia
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editMessageCaption(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?ArrayOfMessageEntity $captionEntities = null,
        ?string $businessConnectionId = null,
        bool $showCaptionAboveMedia = false,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('editMessageCaption', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'caption' => $caption,
            'parse_mode' => $parseMode?->value,
            'caption_entities' => $captionEntities,
            'business_connection_id' => $businessConnectionId,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'reply_markup' => $replyMarkup?->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages.
     * If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a
     * document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file
     * can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited
     * message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business
     * messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours
     * from the time they were sent.
     *
     * @see https://core.telegram.org/bots/api#editmessagemedia
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param InputMedia $media
     * @param string|null $businessConnectionId
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editMessageMedia(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        InputMedia $media,
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('editMessageMedia', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'media' => $media->toJson(),
            'business_connection_id' => $businessConnectionId,
            'reply_markup' => $replyMarkup?->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit live location messages.
     * A location can be edited until its live_period expires or editing is explicitly disabled by a call to
     * stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is
     * returned, otherwise True is returned.
     *
     * @see https://core.telegram.org/bots/api#editmessagelivelocation
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param float $latitude
     * @param float $longitude
     * @param float|null $horizontalAccuracy
     * @param int|null $livePeriod
     * @param int|null $heading
     * @param int|null $proximityAlertRadius
     * @param string|null $businessConnectionId
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editMessageLiveLocation(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        float $latitude,
        float $longitude,
        ?float $horizontalAccuracy = null,
        ?int $livePeriod = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
        ?string $businessConnectionId = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('editMessageLiveLocation', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $livePeriod,
            'horizontal_accuracy' => $horizontalAccuracy,
            'heading' => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'business_connection_id' => $businessConnectionId,
            'reply_markup' => is_null($replyMarkup) ? $replyMarkup : $replyMarkup->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to stop updating a live location message before live_period expires.
     * On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @see https://core.telegram.org/bots/api#stopmessagelivelocation
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message with live
     *                            location to stop
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param string|null $businessConnectionId
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function stopMessageLiveLocation(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        ?string $businessConnectionId = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('stopMessageLiveLocation', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'business_connection_id' => $businessConnectionId,
            'reply_markup' => $replyMarkup?->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to edit only the reply markup of messages.
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is
     * returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can
     * only be edited within 48 hours from the time they were sent.
     *
     * @see https://core.telegram.org/bots/api#editmessagereplymarkup
     *
     * @param int|string|null $chatId Required if inline_message_id is not specified. Unique identifier for the target
     *                                chat or username of the target channel (in the format @channelusername)
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     * @param string|null $businessConnectionId
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Message|true
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function editMessageReplyMarkup(
        int|string|null $chatId,
        ?int $messageId,
        ?string $inlineMessageId,
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Message|bool {
        $response = $this->call('editMessageReplyMarkup', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'business_connection_id' => $businessConnectionId,
            'reply_markup' => $replyMarkup?->toJson(),
        ]);
        if ($response === true) {
            return true;
        }

        return Message::fromResponse($response);
    }

    /**
     * Use this method to stop a poll which was sent by the bot.
     * On success, the stopped Poll is returned.
     *
     * @see https://core.telegram.org/bots/api#stoppoll
     *
     * @param int|string $chatId
     * @param int $messageId
     * @param string|null $businessConnectionId
     * @param InlineKeyboardMarkup|null $replyMarkup
     *
     * @return Poll
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function stopPoll(
        int|string $chatId,
        int $messageId,
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
    ): Poll {
        return Poll::fromResponse($this->call('stopPoll', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'business_connection_id' => $businessConnectionId,
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:
     * - A message can only be deleted if it was sent less than 48 hours ago.
     * - Service messages about a supergroup, channel, or forum topic creation can't be deleted.
     * - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
     * - Bots can delete outgoing messages in private chats, groups, and supergroups.
     * - Bots can delete incoming messages in private chats.
     * - Bots granted can_post_messages permissions can delete outgoing messages in channels.
     * - If the bot is an administrator of a group, it can delete any message there.
     * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
     *
     * @see https://core.telegram.org/bots/api#deletemessage
     *
     * @param int|string $chatId
     * @param int $messageId
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteMessage(int|string $chatId, int $messageId): bool
    {
        return $this->call('deleteMessage', [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * Use this method to delete multiple messages simultaneously.
     * If some of the specified messages can't be found, they are skipped.
     *
     * @see https://core.telegram.org/bots/api#deletemessages
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param int[] $messageIds A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage
     *                          for limitations on which messages can be deleted
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteMessages(int|string $chatId, array $messageIds): bool
    {
        return $this->call('deleteMessages', [
            'chat_id' => $chatId,
            'message_ids' => json_encode($messageIds),
        ]);
    }

}
